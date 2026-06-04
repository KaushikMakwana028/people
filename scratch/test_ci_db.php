<?php
define('BASEPATH', dirname(__DIR__) . '/system/');
define('APPPATH', dirname(__DIR__) . '/application/');
define('VIEWPATH', APPPATH . 'views/');

// Mocking required CI environment
class CI_Controller {
    private static $instance;
    public function __construct() {
        self::$instance = $this;
    }
    public static function &get_instance() {
        return self::$instance;
    }
}
$CI = new CI_Controller();

require_once BASEPATH . 'core/Common.php';
$config =& get_config();
// Load database
require_once BASEPATH . 'database/DB.php';
$db =& DB();
$CI->db = $db;

// Let's test the query builder for NULL
$db->select('pl.*, p.name as product_name');
$db->from('product_leads pl');
$db->join('products p', 'p.id = pl.product_id', 'left');
$db->where('pl.product_id', 2);
$db->where('pl.status', 'New');
$db->where('pl.sales_id IS NULL', null, false);
$db->order_by('pl.id', 'DESC');
$db->limit(10, 0);

$query = $db->get();
echo "Compiled Query:\n" . $db->last_query() . "\n\n";
echo "Number of rows returned: " . $query->num_rows() . "\n";
print_r($query->result());
?>
