<!DOCTYPE html>
<?php
// ── Helpers ──────────────────────────────────────────────────────────────────
function status_badge($status) {
    $map = [
        'new'       => ['label'=>'New',       'color'=>'#0A84FF', 'bg'=>'#E8F4FF'],
        'contacted' => ['label'=>'Contacted', 'color'=>'#BF5AF2', 'bg'=>'#F5EDFF'],
        'qualified' => ['label'=>'Qualified', 'color'=>'#30D158', 'bg'=>'#E8FAF0'],
        'lost'      => ['label'=>'Lost',      'color'=>'#FF453A', 'bg'=>'#FFF0EF'],
        'converted' => ['label'=>'Converted', 'color'=>'#FF6B35', 'bg'=>'#FFF0EB'],
    ];
    $s = $map[$status] ?? ['label'=>ucfirst($status),'color'=>'#6E7781','bg'=>'#F0F0F0'];
    return '<span class="status-badge" style="background:'.$s['bg'].';color:'.$s['color'].'">'.$s['label'].'</span>';
}

function avatar_initials($name) {
    $parts = explode(' ', trim($name));
    return strtoupper(substr($parts[0],0,1) . (isset($parts[1]) ? substr($parts[1],0,1) : ''));
}

function avatar_color($name) {
    $colors = ['#0A84FF','#BF5AF2','#30D158','#FF6B35','#FF453A','#FFD60A','#32D74B'];
    return $colors[crc32($name) % count($colors)];
}

function format_value($val) {
    if ($val >= 100000) return '₹' . number_format($val/100000, 1) . 'L';
    if ($val >= 1000)   return '₹' . number_format($val/1000, 0) . 'K';
    return '₹' . number_format($val, 0);
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lead Management — Vision TechnoLabs</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
:root{
  --primary:#0A84FF;--primary-dark:#0066CC;--primary-light:#E8F4FF;
  --accent:#FF6B35;--accent-light:#FFF0EB;
  --success:#30D158;--success-light:#E8FAF0;
  --warning:#FFD60A;--warning-light:#FFFBE6;
  --danger:#FF453A;--danger-light:#FFF0EF;
  --purple:#BF5AF2;--purple-light:#F5EDFF;
  --bg:#F6F8FB;--card-bg:#fff;
  --text:#0D1117;--text-muted:#6E7781;--border:#E1E4E8;
  --shadow:0 1px 3px rgba(0,0,0,.06),0 4px 16px rgba(0,0,0,.04);
  --shadow-md:0 4px 12px rgba(0,0,0,.08),0 12px 40px rgba(0,0,0,.06);
  --radius:12px;--radius-sm:8px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{font-size:14px}
body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text);min-height:100vh}
h1,h2,h3,h4,h5{font-family:'Syne',sans-serif}
a{text-decoration:none;color:inherit}

/* ── PAGE WRAPPER ── */
.page-wrapper{padding:24px 28px;max-width:1400px}

/* ── BREADCRUMB ── */
.breadcrumb{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--text-muted);margin-bottom:20px}
.breadcrumb a{color:var(--text-muted);transition:color .15s}.breadcrumb a:hover{color:var(--primary)}
.breadcrumb i{font-size:11px}

/* ── PAGE TITLE ROW ── */
.page-title-row{display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;gap:12px;flex-wrap:wrap}
.page-title-row h2{font-size:22px;font-weight:700}
.page-title-row p{font-size:13px;color:var(--text-muted);margin-top:2px}
.btn-row{display:flex;gap:10px;align-items:center;flex-wrap:wrap}

/* ── STAT CARDS ── */
.stats-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:14px;margin-bottom:24px}
@media(max-width:900px){.stats-grid{grid-template-columns:repeat(3,1fr)}}
@media(max-width:600px){.stats-grid{grid-template-columns:1fr 1fr}}
.stat-card{background:var(--card-bg);border-radius:var(--radius);padding:18px 20px;box-shadow:var(--shadow);border:1px solid var(--border)}
.stat-card .stat-num{font-family:'Syne',sans-serif;font-size:28px;font-weight:800;line-height:1}
.stat-card .stat-lbl{font-size:12px;color:var(--text-muted);margin-top:4px}
.stat-num.blue{color:var(--primary)}
.stat-num.green{color:var(--success)}
.stat-num.purple{color:var(--purple)}
.stat-num.orange{color:var(--accent)}
.stat-num.red{color:var(--danger)}

/* ── FILTER BAR ── */
.filter-bar{background:var(--card-bg);border:1px solid var(--border);border-radius:var(--radius);padding:14px 18px;display:flex;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:18px;box-shadow:var(--shadow)}
.search-wrap{position:relative;flex:1;min-width:200px}
.search-wrap i{position:absolute;left:12px;top:50%;transform:translateY(-50%);color:var(--text-muted);font-size:13px}
.search-input{width:100%;padding:8px 12px 8px 34px;border:1px solid var(--border);border-radius:var(--radius-sm);font-size:13.5px;font-family:'DM Sans',sans-serif;outline:none;transition:border-color .2s;background:var(--bg)}
.search-input:focus{border-color:var(--primary);background:#fff}
.filter-select{padding:8px 14px;border:1px solid var(--border);border-radius:var(--radius-sm);font-size:13px;font-family:'DM Sans',sans-serif;outline:none;background:var(--bg);color:var(--text);cursor:pointer;min-width:130px}
.filter-select:focus{border-color:var(--primary)}

/* ── TABLE CARD ── */
.table-card{background:var(--card-bg);border:1px solid var(--border);border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden}
.table-card-header{padding:16px 20px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--border)}
.table-card-header h3{font-size:15px;font-weight:700}

table{width:100%;border-collapse:collapse}
thead tr{background:var(--bg)}
th{padding:11px 16px;text-align:left;font-size:11.5px;font-weight:600;color:var(--text-muted);text-transform:uppercase;letter-spacing:.04em;white-space:nowrap}
td{padding:13px 16px;border-bottom:1px solid var(--border);font-size:13.5px;vertical-align:middle}
tbody tr:last-child td{border-bottom:none}
tbody tr{transition:background .15s}
tbody tr:hover{background:#F9FBFF}

/* ── AVATAR ── */
.av{width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-family:'Syne',sans-serif;font-size:12px;font-weight:700;color:#fff;flex-shrink:0}
.lead-cell{display:flex;align-items:center;gap:10px}
.lead-name{font-weight:600;font-size:13.5px}
.lead-email{font-size:12px;color:var(--text-muted);margin-top:1px}

/* ── STATUS BADGE ── */
.status-badge{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:20px;font-size:12px;font-weight:600;white-space:nowrap}
.status-badge::before{content:'';width:6px;height:6px;border-radius:50%;background:currentColor;display:inline-block}

/* ── BUTTONS ── */
.btn{display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:var(--radius-sm);border:none;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:all .18s;text-decoration:none}
.btn-primary{background:var(--primary);color:#fff}.btn-primary:hover{background:var(--primary-dark)}
.btn-secondary{background:var(--bg);color:var(--text);border:1px solid var(--border)}.btn-secondary:hover{background:#eef1f5}
.btn-danger{background:var(--danger);color:#fff}.btn-danger:hover{background:#e03020}
.btn-success{background:var(--success);color:#fff}.btn-success:hover{background:#28b84a}
.btn-xs{padding:5px 10px;font-size:12px;border-radius:6px}
.btn-icon{padding:7px;border-radius:6px}

.action-btns{display:flex;gap:6px}

/* ── FLASH MESSAGES ── */
.alert{padding:12px 16px;border-radius:var(--radius-sm);margin-bottom:16px;font-size:13.5px;display:flex;align-items:center;gap:10px}
.alert-success{background:var(--success-light);color:#1a7a35;border:1px solid #b4f0c8}
.alert-danger{background:var(--danger-light);color:#c0281f;border:1px solid #ffc5c2}

/* ── EMPTY STATE ── */
.empty-state{text-align:center;padding:60px 24px;color:var(--text-muted)}
.empty-state i{font-size:40px;margin-bottom:14px;color:#d0d5dd}
.empty-state h4{font-size:16px;color:var(--text);margin-bottom:6px}
.empty-state p{font-size:13px}

/* ── MODAL ── */
.modal-overlay{position:fixed;inset:0;background:rgba(13,17,23,.55);backdrop-filter:blur(4px);z-index:1000;display:none;align-items:center;justify-content:center}
.modal-overlay.active{display:flex}
.modal{background:#fff;border-radius:16px;width:540px;max-width:95vw;max-height:90vh;overflow-y:auto;box-shadow:0 24px 80px rgba(0,0,0,.25);animation:modalIn .22s ease}
@keyframes modalIn{from{transform:scale(.95) translateY(8px);opacity:0}to{transform:scale(1) translateY(0);opacity:1}}
.modal-header{display:flex;align-items:center;justify-content:space-between;padding:20px 24px 16px;border-bottom:1px solid var(--border)}
.modal-title{font-family:'Syne',sans-serif;font-size:16px;font-weight:700}
.modal-close{width:30px;height:30px;border-radius:6px;border:none;background:var(--bg);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:13px;color:var(--text-muted);transition:background .15s}
.modal-close:hover{background:var(--border)}
.modal-body{padding:20px 24px}
.modal-footer{padding:16px 24px;border-top:1px solid var(--border);display:flex;justify-content:flex-end;gap:10px}

/* ── FORM ── */
.form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}
.form-field{display:flex;flex-direction:column;gap:5px;margin-bottom:14px}
.form-field label{font-size:12px;font-weight:600;color:var(--text-muted);text-transform:uppercase;letter-spacing:.04em}
.form-field input,.form-field select,.form-field textarea{
  padding:9px 12px;border:1px solid var(--border);border-radius:var(--radius-sm);
  font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--text);
  outline:none;transition:border-color .2s;background:#fff}
.form-field input:focus,.form-field select:focus,.form-field textarea:focus{border-color:var(--primary)}
.form-field textarea{resize:vertical;min-height:80px}

/* ── LEAD DETAIL PANEL ── */
.detail-header{display:flex;align-items:center;gap:14px;padding:16px;background:var(--bg);border-radius:10px;margin-bottom:18px}
.detail-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:16px}
.detail-item{padding:10px 12px;background:var(--bg);border-radius:var(--radius-sm)}
.detail-item .di-label{font-size:11px;color:var(--text-muted);margin-bottom:3px;display:flex;align-items:center;gap:5px}
.detail-item .di-val{font-size:13.5px;font-weight:500}

/* ── RESPONSIVE TABLE ── */
@media(max-width:768px){
  .hide-mobile{display:none}
  .page-wrapper{padding:16px}
}
</style>
</head>
<body>

<?php
/*
 * ─────────────────────────────────────────────────────────────────
 *  NOTE: This file is the MAIN CONTENT VIEW only.
 *  It should be loaded inside your existing layout/template.
 *  If your project uses $this->load->view('layout/header', $data)
 *  before this file, remove the <body> tags at top/bottom.
 *
 *  Adjust the sidebar/header include below to match YOUR project:
 *  e.g.  $this->load->view('includes/sidebar', $data);
 * ─────────────────────────────────────────────────────────────────
 */
?>

<div class="page-wrapper">

  <!-- Breadcrumb -->
  <div class="breadcrumb">
    <a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i></a>
    <i class="fas fa-chevron-right"></i>
    <span>Leads</span>
  </div>

  <!-- Flash messages -->
  <?php if($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><i class="fas fa-check-circle"></i> <?= $this->session->flashdata('success') ?></div>
  <?php endif; ?>
  <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> <?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>

  <!-- Page Title Row -->
  <div class="page-title-row">
    <div>
      <h2>Lead Management</h2>
      <p>Track and manage all your sales leads</p>
    </div>
    <div class="btn-row">
      <button class="btn btn-secondary" onclick="openImportModal()">
        <i class="fas fa-file-import"></i> Import
      </button>
      <button class="btn btn-primary" onclick="openAddModal()">
        <i class="fas fa-plus"></i> Add Lead
      </button>
    </div>
  </div>

  <!-- Stat Cards -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-num blue"><?= $total_leads ?></div>
      <div class="stat-lbl">Total</div>
    </div>
    <div class="stat-card">
      <div class="stat-num blue"><?= $new_leads ?></div>
      <div class="stat-lbl">New</div>
    </div>
    <div class="stat-card">
      <div class="stat-num purple"><?= $contacted_leads ?></div>
      <div class="stat-lbl">Contacted</div>
    </div>
    <div class="stat-card">
      <div class="stat-num green"><?= $qualified_leads ?></div>
      <div class="stat-lbl">Qualified</div>
    </div>
    <div class="stat-card">
      <div class="stat-num orange"><?= $converted_leads ?></div>
      <div class="stat-lbl">Converted</div>
    </div>
  </div>

  <!-- Filter Bar -->
  <form method="GET" action="<?= base_url('admin/leads') ?>" id="filterForm">
    <div class="filter-bar">
      <div class="search-wrap">
        <i class="fas fa-search"></i>
        <input type="text" name="search" class="search-input"
               placeholder="Search leads..."
               value="<?= htmlspecialchars($search) ?>"
               oninput="debounceSubmit()">
      </div>

      <select name="status" class="filter-select" onchange="this.form.submit()">
        <option value="">All Status</option>
        <?php foreach(['new','contacted','qualified','lost','converted'] as $s): ?>
          <option value="<?= $s ?>" <?= $active_status===$s?'selected':'' ?>>
            <?= ucfirst($s) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <select name="source" class="filter-select" onchange="this.form.submit()">
        <option value="">All Sources</option>
        <?php foreach(['Website','Referral','LinkedIn','Cold Call','Email Campaign','Other'] as $src): ?>
          <option value="<?= $src ?>" <?= $active_source===$src?'selected':'' ?>>
            <?= $src ?>
          </option>
        <?php endforeach; ?>
      </select>

      <?php if($search || $active_status || $active_source): ?>
        <a href="<?= base_url('admin/leads') ?>" class="btn btn-secondary btn-xs">
          <i class="fas fa-times"></i> Clear
        </a>
      <?php endif; ?>
    </div>
  </form>

  <!-- Leads Table -->
  <div class="table-card">
    <div class="table-card-header">
      <h3>All Leads</h3>
      <span style="font-size:12px;color:var(--text-muted)"><?= count($leads) ?> records</span>
    </div>

    <?php if(empty($leads)): ?>
      <div class="empty-state">
        <i class="fas fa-user-plus"></i>
        <h4>No leads found</h4>
        <p>Try adjusting your filters or add a new lead.</p>
      </div>
    <?php else: ?>
    <div style="overflow-x:auto">
    <table>
      <thead>
        <tr>
          <th>LEAD</th>
          <th class="hide-mobile">COMPANY</th>
          <th class="hide-mobile">PHONE</th>
          <th class="hide-mobile">SOURCE</th>
          <th>STATUS</th>
          <th class="hide-mobile">VALUE</th>
          <th class="hide-mobile">ASSIGNEE</th>
          <th class="hide-mobile">DATE</th>
          <th>ACTIONS</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($leads as $lead): ?>
        <tr>
          <td>
            <div class="lead-cell">
              <div class="av" style="background:<?= avatar_color($lead['name']) ?>">
                <?= avatar_initials($lead['name']) ?>
              </div>
              <div>
                <div class="lead-name"><?= htmlspecialchars($lead['name']) ?></div>
                <div class="lead-email"><?= htmlspecialchars($lead['email'] ?? '') ?></div>
              </div>
            </div>
          </td>
          <td class="hide-mobile"><?= htmlspecialchars($lead['company'] ?? '—') ?></td>
          <td class="hide-mobile"><?= htmlspecialchars($lead['phone'] ?? '—') ?></td>
          <td class="hide-mobile">
            <span style="font-size:12.5px"><?= htmlspecialchars($lead['source'] ?? '—') ?></span>
          </td>
          <td><?= status_badge($lead['status']) ?></td>
          <td class="hide-mobile" style="font-weight:600;color:var(--primary)">
            <?= format_value($lead['value'] ?? 0) ?>
          </td>
          <td class="hide-mobile" style="font-size:12.5px">
            <?= htmlspecialchars($lead['assignee_name'] ?? 'Unassigned') ?>
          </td>
          <td class="hide-mobile" style="font-size:12.5px;color:var(--text-muted)">
            <?= date('Y-m-d', strtotime($lead['created_at'])) ?>
          </td>
          <td>
            <div class="action-btns">
              <button class="btn btn-secondary btn-icon btn-xs"
                      title="View"
                      onclick="viewLead(<?= $lead['id'] ?>)">
                <i class="fas fa-eye"></i>
              </button>
              <a href="<?= base_url('admin/leads/edit/'.$lead['id']) ?>"
                 class="btn btn-secondary btn-icon btn-xs" title="Edit">
                <i class="fas fa-pen"></i>
              </a>
              <button class="btn btn-danger btn-icon btn-xs"
                      title="Delete"
                      onclick="confirmDelete(<?= $lead['id'] ?>)">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
    <?php endif; ?>
  </div>

</div><!-- /.page-wrapper -->

<!-- ═══════════════════════════════════════════════ -->
<!--  MODALS                                         -->
<!-- ═══════════════════════════════════════════════ -->

<!-- Add Lead Modal -->
<div class="modal-overlay" id="addModal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title"><i class="fas fa-user-plus" style="color:var(--primary);margin-right:8px"></i>Add New Lead</span>
      <button class="modal-close" onclick="closeModal('addModal')"><i class="fas fa-times"></i></button>
    </div>
    <form method="POST" action="<?= base_url('admin/leads/store') ?>">
      <?= form_open('') /* CSRF token */ ?>
      <div class="modal-body">
        <div class="form-row">
          <div class="form-field">
            <label>Full Name *</label>
            <input type="text" name="name" placeholder="Priya Sharma" required>
          </div>
          <div class="form-field">
            <label>Email</label>
            <input type="email" name="email" placeholder="priya@company.com">
          </div>
          <div class="form-field">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="+91 98765 43210">
          </div>
          <div class="form-field">
            <label>Company</label>
            <input type="text" name="company" placeholder="Tech Solutions Pvt Ltd">
          </div>
          <div class="form-field">
            <label>Source</label>
            <select name="source">
              <?php foreach(['Website','Referral','LinkedIn','Cold Call','Email Campaign','Other'] as $src): ?>
                <option value="<?= $src ?>"><?= $src ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-field">
            <label>Status *</label>
            <select name="status" required>
              <?php foreach(['new','contacted','qualified','lost','converted'] as $s): ?>
                <option value="<?= $s ?>"><?= ucfirst($s) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-field">
            <label>Deal Value (₹)</label>
            <input type="number" name="value" placeholder="250000" min="0" step="0.01">
          </div>
          <div class="form-field">
            <label>Assign To</label>
            <select name="assignee_id">
              <option value="">— Unassigned —</option>
              <?php
                // Load users for dropdown — adjust query to your users table
                $users = $this->db->get('users')->result_array();
                foreach($users as $u): ?>
                <option value="<?= $u['id'] ?>"><?= htmlspecialchars($u['name']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-field">
          <label>Notes</label>
          <textarea name="notes" placeholder="Initial remarks about this lead…"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModal('addModal')">Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Add Lead</button>
      </div>
    </form>
  </div>
</div>

<!-- View Lead Modal -->
<div class="modal-overlay" id="viewModal">
  <div class="modal">
    <div class="modal-header">
      <span class="modal-title" id="viewModalTitle"><i class="fas fa-user" style="color:var(--primary);margin-right:8px"></i>Lead Details</span>
      <button class="modal-close" onclick="closeModal('viewModal')"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body" id="viewModalBody">
      <div style="text-align:center;padding:30px;color:var(--text-muted)">
        <i class="fas fa-spinner fa-spin" style="font-size:24px"></i><br>Loading…
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="closeModal('viewModal')">Close</button>
      <button class="btn btn-primary" id="viewEditBtn"><i class="fas fa-pen"></i> Edit</button>
    </div>
  </div>
</div>

<!-- Delete Confirm Modal -->
<div class="modal-overlay" id="deleteModal">
  <div class="modal" style="width:400px">
    <div class="modal-header">
      <span class="modal-title" style="color:var(--danger)"><i class="fas fa-trash" style="margin-right:8px"></i>Delete Lead</span>
      <button class="modal-close" onclick="closeModal('deleteModal')"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body">
      <p style="font-size:14px">Are you sure you want to delete this lead? This action cannot be undone.</p>
    </div>
    <div class="modal-footer">
      <button class="btn btn-secondary" onclick="closeModal('deleteModal')">Cancel</button>
      <a href="#" id="confirmDeleteBtn" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
    </div>
  </div>
</div>

<script>
const BASE_URL = '<?= base_url() ?>';

// ── Modal helpers ───────────────────────────────────
function openModal(id){ document.getElementById(id).classList.add('active'); }
function closeModal(id){ document.getElementById(id).classList.remove('active'); }

// Close on overlay click
document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', e => {
    if(e.target === overlay) overlay.classList.remove('active');
  });
});

function openAddModal(){ openModal('addModal'); }

// ── View Lead via AJAX ──────────────────────────────
function viewLead(id) {
  openModal('viewModal');
  document.getElementById('viewModalBody').innerHTML =
    '<div style="text-align:center;padding:30px;color:var(--text-muted)"><i class="fas fa-spinner fa-spin" style="font-size:24px"></i><br>Loading…</div>';
  document.getElementById('viewEditBtn').href = BASE_URL + 'admin/leads/edit/' + id;

  fetch(BASE_URL + 'admin/leads/view/' + id, {
    headers:{'X-Requested-With':'XMLHttpRequest'}
  })
  .then(r => r.json())
  .then(l => {
    const statusColors = {
      new:'#0A84FF',contacted:'#BF5AF2',qualified:'#30D158',lost:'#FF453A',converted:'#FF6B35'
    };
    const statusBg = {
      new:'#E8F4FF',contacted:'#F5EDFF',qualified:'#E8FAF0',lost:'#FFF0EF',converted:'#FFF0EB'
    };
    const initials = l.name.split(' ').map(x=>x[0]).join('').toUpperCase();
    const colors = ['#0A84FF','#BF5AF2','#30D158','#FF6B35','#FF453A'];
    const avatarColor = colors[Math.abs(l.name.charCodeAt(0)) % colors.length];
    const valNum = parseFloat(l.value||0);
    const valFmt = valNum>=100000 ? '₹'+(valNum/100000).toFixed(1)+'L'
                 : valNum>=1000   ? '₹'+(valNum/1000).toFixed(0)+'K'
                 : '₹'+valNum.toLocaleString('en-IN');
    const statusLabel = l.status.charAt(0).toUpperCase()+l.status.slice(1);

    document.getElementById('viewModalTitle').innerHTML =
      `<i class="fas fa-user" style="color:var(--primary);margin-right:8px"></i>Lead — #${l.id}`;

    document.getElementById('viewModalBody').innerHTML = `
      <div class="detail-header">
        <div class="av" style="width:48px;height:48px;font-size:16px;background:${avatarColor}">${initials}</div>
        <div>
          <div style="font-size:18px;font-weight:700">${l.name}</div>
          <div style="font-size:13px;color:var(--text-muted)">${l.company||''} ${l.company&&l.email?'·':''} ${l.email||''}</div>
          <div style="margin-top:5px">
            <span class="status-badge" style="background:${statusBg[l.status]||'#eee'};color:${statusColors[l.status]||'#666'}">${statusLabel}</span>
          </div>
        </div>
        <div style="margin-left:auto;text-align:right">
          <div style="font-family:'Syne',sans-serif;font-size:22px;font-weight:800;color:var(--primary)">${valFmt}</div>
          <div style="font-size:12px;color:var(--text-muted)">Deal Value</div>
        </div>
      </div>
      <div class="detail-grid">
        ${[
          ['fas fa-envelope','Email',    l.email||'—'],
          ['fas fa-phone',   'Phone',    l.phone||'—'],
          ['fas fa-tag',     'Source',   l.source||'—'],
          ['fas fa-user',    'Assignee', l.assignee_name||'Unassigned'],
          ['fas fa-calendar','Date Added',l.created_at?l.created_at.substring(0,10):'—'],
          ['fas fa-hashtag', 'ID',       '#'+l.id],
        ].map(([ic,lbl,val])=>`
          <div class="detail-item">
            <div class="di-label"><i class="${ic}"></i>${lbl}</div>
            <div class="di-val">${val}</div>
          </div>`).join('')}
      </div>
      ${l.notes ? `<div class="form-field"><label>Notes</label><div style="font-size:13.5px;padding:10px 12px;background:var(--bg);border-radius:var(--radius-sm)">${l.notes}</div></div>` : ''}
      <div style="margin-top:12px">
        <label style="font-size:11px;font-weight:600;color:var(--text-muted);text-transform:uppercase;letter-spacing:.04em;display:block;margin-bottom:8px">CHANGE STATUS</label>
        <div style="display:flex;gap:8px;flex-wrap:wrap">
          ${['new','contacted','qualified','lost','converted'].map(s=>`
            <button class="btn btn-secondary btn-xs"
                    style="${l.status===s?'border-color:var(--primary);color:var(--primary);font-weight:700':''}"
                    onclick="quickStatus(${l.id},'${s}',this)">
              ${s.charAt(0).toUpperCase()+s.slice(1)}
            </button>`).join('')}
        </div>
      </div>
    `;
  })
  .catch(()=>{
    document.getElementById('viewModalBody').innerHTML =
      '<div style="text-align:center;padding:30px;color:var(--danger)"><i class="fas fa-exclamation-triangle"></i> Failed to load lead data.</div>';
  });
}

// ── Quick status update ─────────────────────────────
function quickStatus(id, status, btn) {
  fetch(BASE_URL + 'admin/leads/update_status', {
    method:'POST',
    headers:{'Content-Type':'application/x-www-form-urlencoded','X-Requested-With':'XMLHttpRequest'},
    body:`id=${id}&status=${status}`
  })
  .then(r=>r.json())
  .then(data=>{
    if(data.success){
      btn.closest('div').querySelectorAll('button').forEach(b=>{
        b.style.borderColor=''; b.style.color=''; b.style.fontWeight='';
      });
      btn.style.borderColor='var(--primary)';
      btn.style.color='var(--primary)';
      btn.style.fontWeight='700';
      // Reload table row status badge
      setTimeout(()=>location.reload(), 600);
    }
  });
}

// ── Delete confirm ──────────────────────────────────
function confirmDelete(id){
  document.getElementById('confirmDeleteBtn').href = BASE_URL + 'admin/leads/delete/' + id;
  openModal('deleteModal');
}

// ── Import modal (placeholder) ──────────────────────
function openImportModal(){
  alert('CSV Import feature — connect this to your upload controller!');
}

// ── Search debounce ─────────────────────────────────
let searchTimer;
function debounceSubmit(){
  clearTimeout(searchTimer);
  searchTimer = setTimeout(()=>document.getElementById('filterForm').submit(), 450);
}
</script>

</body>
</html>
