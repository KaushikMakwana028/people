<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_leads extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_lead_model');
        $this->load->model('Product_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);

        // Check if admin is logged in (role = 1)
        if (!$this->session->userdata('logged_in') || $this->session->userdata('user_role') != 1) {
            redirect('sign_in');
        }
    }

    /**
     * Show leads list for products
     */
    public function index($product_id = null)
    {
        $product_id = $product_id ?: $this->input->get('product_id');
        $data['products'] = $this->Product_model->get_all_products();
        $data['selected_product_id'] = $product_id;
        
        $filters = [];
        if ($this->input->get('status')) {
            $filters['status'] = $this->input->get('status');
        }
        $search = $this->input->get('search') ?? '';

        $data['leads'] = $this->Product_lead_model->get_leads($product_id, $filters, $search);
        $data['kpis'] = $this->Product_lead_model->get_kpi_counts($product_id);

        $data['status_filter'] = $this->input->get('status') ?? '';
        $data['search'] = $search;

        $this->load->view('admin/header');
        $this->load->view('admin/product_leads', $data);
        $this->load->view('admin/footer');
    }

    /**
     * Add single lead manually
     */
    public function add_lead()
    {
        $product_id = $this->input->post('product_id');
        
        $this->form_validation->set_rules('product_id', 'Product', 'required|numeric');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required|trim');
        $this->form_validation->set_rules('city', 'City', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/product_leads' . ($product_id ? '?product_id=' . $product_id : ''));
        }

        $leadData = [
            'product_id' => (int)$product_id,
            'name' => $this->input->post('name'),
            'mobile' => $this->input->post('mobile'),
            'city' => $this->input->post('city'),
            'status' => 'New',
            'notes' => $this->input->post('notes'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->Product_lead_model->insert_lead($leadData);
        $this->session->set_flashdata('success', 'Lead added successfully!');
        redirect('admin/product_leads?product_id=' . $product_id);
    }

    /**
     * Import leads from CSV or XLSX file
     */
    public function import($product_id)
    {
        if (empty($_FILES['csv_file']['name'])) {
            $this->session->set_flashdata('error', 'Please select a CSV or XLSX file to upload.');
            redirect('admin/product_leads?product_id=' . $product_id);
        }

        $config['upload_path']   = FCPATH . 'uploads/';
        $config['allowed_types'] = 'csv|txt|xlsx';
        $config['max_size']      = 2048;
        $config['encrypt_name']  = TRUE;

        // Ensure uploads directory exists
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('csv_file')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('admin/product_leads?product_id=' . $product_id);
        }

        $file_data = $this->upload->data();
        $file_path = FCPATH . 'uploads/' . $file_data['file_name'];
        $file_ext = strtolower($file_data['file_ext']);

        $rows = [];
        if ($file_ext === '.xlsx') {
            $rows = $this->parse_xlsx($file_path);
            unlink($file_path); // remove file after import
        } else {
            if (($handle = fopen($file_path, 'r')) !== FALSE) {
                while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                    $rows[] = $row;
                }
                fclose($handle);
                unlink($file_path); // remove file after import
            }
        }

        $csv_data = [];
        if (!empty($rows)) {
            // Find the first non-empty row to be the header row
            $header_row_idx = 0;
            for ($i = 0; $i < count($rows); $i++) {
                $has_data = false;
                if (!empty($rows[$i])) {
                    foreach ($rows[$i] as $cell) {
                        if (trim($cell ?? '') !== '') {
                            $has_data = true;
                            break;
                        }
                    }
                }
                if ($has_data) {
                    $header_row_idx = $i;
                    break;
                }
            }

            $headers = $rows[$header_row_idx] ?? [];
            
            // Clean headers (trim, lowercase)
            $cleaned_headers = [];
            foreach ($headers as $k => $v) {
                $cleaned_headers[$k] = strtolower(trim($v ?? ''));
            }

            // Find column positions based on keywords
            $name_idx = false;
            $mobile_idx = false;
            $city_idx = false;

            foreach ($cleaned_headers as $idx => $header) {
                if ($name_idx === false && strpos($header, 'name') !== false) {
                    $name_idx = $idx;
                }
                if ($mobile_idx === false && (strpos($header, 'mobile') !== false || strpos($header, 'phone') !== false || strpos($header, 'contact') !== false || strpos($header, 'number') !== false)) {
                    $mobile_idx = $idx;
                }
                if ($city_idx === false && (strpos($header, 'city') !== false || strpos($header, 'location') !== false || strpos($header, 'address') !== false || strpos($header, 'town') !== false)) {
                    $city_idx = $idx;
                }
            }

            // Detect if this first row is actually a header row or contains data
            $is_header = false;
            if ($name_idx !== false || $mobile_idx !== false || $city_idx !== false) {
                $is_header = true;
            }

            // Fallback to column index order if headers don't match
            if ($name_idx === false) $name_idx = 0;
            if ($mobile_idx === false) $mobile_idx = 1;
            if ($city_idx === false) $city_idx = 2;

            // Start processing rows: if it was a header row, start from next row. Otherwise, start from this row.
            $start_idx = $is_header ? ($header_row_idx + 1) : $header_row_idx;

            for ($i = $start_idx; $i < count($rows); $i++) {
                $row = $rows[$i];
                // Skip empty rows
                if (empty($row)) {
                    continue;
                }

                $name = trim($row[$name_idx] ?? '');
                $mobile = trim($row[$mobile_idx] ?? '');
                $city = trim($row[$city_idx] ?? '');

                // skip if all three fields are empty
                if (empty($name) && empty($mobile) && empty($city)) {
                    continue;
                }

                $csv_data[] = [
                    'product_id' => (int)$product_id,
                    'name' => $name,
                    'mobile' => $mobile,
                    'city' => $city,
                    'status' => 'New',
                    'created_at' => date('Y-m-d H:i:s')
                ];
            }
        }

        if (!empty($csv_data)) {
            $this->Product_lead_model->insert_batch($csv_data);
            $this->session->set_flashdata('success', count($csv_data) . ' leads imported successfully!');
        } else {
            $this->session->set_flashdata('error', 'No valid leads found in the uploaded file.');
        }

        redirect('admin/product_leads?product_id=' . $product_id);
    }

    /**
     * Download CSV template for importing leads
     */
    public function download_template()
    {
        $filename = 'leads_import_template.csv';
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Name', 'Mobile', 'City']);
        fclose($output);
        exit;
    }

    /**
     * Parse XLSX file into simple array of rows
     */
    private function parse_xlsx($file_path)
    {
        $rows = [];
        if (!class_exists('ZipArchive')) {
            log_message('error', 'ZipArchive class not found in PHP installation.');
            return [];
        }

        $zip = new ZipArchive();
        if ($zip->open($file_path) === TRUE) {
            // Read shared strings
            $sharedStrings = [];
            $sharedStringsXml = $zip->getFromName('xl/sharedStrings.xml');
            if ($sharedStringsXml !== false) {
                // Strip namespaces (both single and double quotes)
                $cleanXml = preg_replace('/xmlns[^=]*=("[^"]*"|\'[^\']*\')/', '', $sharedStringsXml);
                $cleanXml = preg_replace('/<(\/?[a-zA-Z0-9_]+):/', '<$1', $cleanXml);
                $xml = @simplexml_load_string($cleanXml);
                if ($xml && isset($xml->si)) {
                    foreach ($xml->si as $si) {
                        if (isset($si->t)) {
                            $sharedStrings[] = (string)$si->t;
                        } elseif (isset($si->r)) {
                            $text = '';
                            foreach ($si->r as $r) {
                                if (isset($r->t)) {
                                    $text .= (string)$r->t;
                                }
                            }
                            $sharedStrings[] = $text;
                        } else {
                            $sharedStrings[] = '';
                        }
                    }
                }
            }

            // Find the first worksheet XML in xl/worksheets/
            $sheetName = '';
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $name = $zip->getNameIndex($i);
                if (strpos($name, 'xl/worksheets/sheet') === 0 && substr($name, -4) === '.xml') {
                    $sheetName = $name;
                    break;
                }
            }
            if (empty($sheetName)) {
                $sheetName = 'xl/worksheets/sheet1.xml'; // fallback
            }

            // Read worksheet XML
            $sheetXml = $zip->getFromName($sheetName);
            if ($sheetXml !== false) {
                $cleanXml = preg_replace('/xmlns[^=]*=("[^"]*"|\'[^\']*\')/', '', $sheetXml);
                $cleanXml = preg_replace('/<(\/?[a-zA-Z0-9_]+):/', '<$1', $cleanXml);
                $xml = @simplexml_load_string($cleanXml);
                if ($xml && isset($xml->sheetData->row)) {
                    foreach ($xml->sheetData->row as $row) {
                        $rowData = [];
                        if (isset($row->c)) {
                            foreach ($row->c as $c) {
                                $cellRef = (string)$c['r']; // e.g. "A1", "B1"
                                preg_match('/^[A-Z]+/', $cellRef, $matches);
                                if (!empty($matches)) {
                                    $colLetter = $matches[0];
                                    $colIndex = $this->coordinate_to_col_index($colLetter);
                                    
                                    $value = '';
                                    $type = (string)$c['t'];
                                    if ($type === 'inlineStr' && isset($c->is->t)) {
                                        $value = (string)$c->is->t;
                                    } elseif (isset($c->v)) {
                                        $val = (string)$c->v;
                                        if ($type === 's') {
                                            $value = isset($sharedStrings[$val]) ? $sharedStrings[$val] : '';
                                        } else {
                                            $value = $val;
                                            // Handle scientific notation for long numbers like phone numbers
                                            if (is_numeric($value) && stripos($value, 'e') !== false) {
                                                $value = number_format((float)$value, 0, '.', '');
                                            }
                                        }
                                    }
                                    $rowData[$colIndex] = $value;
                                }
                            }
                        }
                        
                        // Fill in missing columns to have a continuous array
                        if (!empty($rowData)) {
                            $maxIndex = max(array_keys($rowData));
                            $filledRow = [];
                            for ($i = 0; $i <= $maxIndex; $i++) {
                                $filledRow[$i] = isset($rowData[$i]) ? $rowData[$i] : '';
                            }
                            $rows[] = $filledRow;
                        } else {
                            $rows[] = [];
                        }
                    }
                }
            }
            $zip->close();
        }
        return $rows;
    }

    /**
     * Helper to convert coordinate like A -> 0, B -> 1, Z -> 25, AA -> 26 etc.
     */
    private function coordinate_to_col_index($colLetter)
    {
        $colLetter = strtoupper($colLetter);
        $len = strlen($colLetter);
        $index = 0;
        for ($i = 0; $i < $len; $i++) {
            $index = $index * 26 + (ord($colLetter[$i]) - 64);
        }
        return $index - 1;
    }

    /**
     * Export leads to CSV file
     */
    public function export($product_id)
    {
        $product = $this->Product_model->get_product($product_id);
        if (!$product) show_404();

        $leads = $this->Product_lead_model->get_leads($product_id);

        $filename = 'Leads_' . preg_replace('/[^a-zA-Z0-9]/', '_', $product->name) . '_' . date('Ymd_His') . '.csv';

        header('Content-Description: File Transfer');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=' . $filename);
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        $output = fopen('php://output', 'w');

        // Column headers
        fputcsv($output, ['Name', 'Mobile', 'City', 'Status', 'Notes', 'Created At']);

        foreach ($leads as $lead) {
            fputcsv($output, [
                $lead->name,
                $lead->mobile,
                $lead->city,
                $lead->status,
                $lead->notes ?: '',
                $lead->created_at
            ]);
        }

        fclose($output);
        exit;
    }

    /**
     * Delete lead
     */
    public function delete($id)
    {
        $lead = $this->Product_lead_model->get_lead($id);
        if (!$lead) show_404();

        $this->Product_lead_model->delete_lead($id);
        $this->session->set_flashdata('success', 'Lead deleted.');
        redirect('admin/product_leads?product_id=' . $lead->product_id);
    }
}
