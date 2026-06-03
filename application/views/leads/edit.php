<!DOCTYPE html>
<?php
/*
 * Edit Lead View
 * Loaded from: application/views/leads/edit.php
 * Include inside your existing layout template.
 */
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Lead — Vision TechnoLabs</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<style>
:root{
  --primary:#0A84FF;--primary-dark:#0066CC;
  --success:#30D158;--danger:#FF453A;
  --bg:#F6F8FB;--card-bg:#fff;
  --text:#0D1117;--text-muted:#6E7781;--border:#E1E4E8;
  --radius:12px;--radius-sm:8px;
  --shadow:0 1px 3px rgba(0,0,0,.06),0 4px 16px rgba(0,0,0,.04);
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{font-size:14px}
body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text)}
h1,h2,h3{font-family:'Syne',sans-serif}
a{text-decoration:none;color:inherit}

.page-wrapper{padding:24px 28px;max-width:720px}
.breadcrumb{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--text-muted);margin-bottom:20px}
.breadcrumb a{color:var(--text-muted)}.breadcrumb a:hover{color:var(--primary)}
.breadcrumb i{font-size:11px}

.card{background:var(--card-bg);border:1px solid var(--border);border-radius:var(--radius);box-shadow:var(--shadow);overflow:hidden}
.card-header{padding:20px 24px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:10px}
.card-header h2{font-size:17px;font-weight:700}
.card-body{padding:24px}

.form-row{display:grid;grid-template-columns:1fr 1fr;gap:16px}
@media(max-width:600px){.form-row{grid-template-columns:1fr}}
.form-field{display:flex;flex-direction:column;gap:5px;margin-bottom:4px}
.form-field label{font-size:11.5px;font-weight:600;color:var(--text-muted);text-transform:uppercase;letter-spacing:.04em}
.form-field input,.form-field select,.form-field textarea{
  padding:10px 13px;border:1px solid var(--border);border-radius:var(--radius-sm);
  font-family:'DM Sans',sans-serif;font-size:13.5px;color:var(--text);
  outline:none;transition:border-color .2s;background:#fff}
.form-field input:focus,.form-field select:focus,.form-field textarea:focus{border-color:var(--primary)}
.form-field textarea{resize:vertical;min-height:90px}

.btn{display:inline-flex;align-items:center;gap:6px;padding:9px 18px;border-radius:var(--radius-sm);border:none;font-family:'DM Sans',sans-serif;font-size:13.5px;font-weight:500;cursor:pointer;transition:all .18s;text-decoration:none}
.btn-primary{background:var(--primary);color:#fff}.btn-primary:hover{background:var(--primary-dark)}
.btn-secondary{background:var(--bg);color:var(--text);border:1px solid var(--border)}.btn-secondary:hover{background:#eef1f5}

.card-footer{padding:16px 24px;border-top:1px solid var(--border);display:flex;justify-content:flex-end;gap:10px}

.alert{padding:12px 16px;border-radius:var(--radius-sm);margin-bottom:16px;font-size:13.5px;display:flex;align-items:center;gap:10px}
.alert-danger{background:#FFF0EF;color:#c0281f;border:1px solid #ffc5c2}
</style>
</head>
<body>

<div class="page-wrapper">

  <div class="breadcrumb">
    <a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i></a>
    <i class="fas fa-chevron-right"></i>
    <a href="<?= base_url('admin/leads') ?>">Leads</a>
    <i class="fas fa-chevron-right"></i>
    <span>Edit Lead</span>
  </div>

  <?php if($this->session->flashdata('error')): ?>
    <div class="alert alert-danger"><i class="fas fa-exclamation-circle"></i> <?= $this->session->flashdata('error') ?></div>
  <?php endif; ?>

  <div class="card">
    <div class="card-header">
      <i class="fas fa-pen" style="color:var(--primary)"></i>
      <h2>Edit Lead — <?= htmlspecialchars($lead['name']) ?></h2>
    </div>

    <form method="POST" action="<?= base_url('admin/leads/update/'.$lead['id']) ?>">
      <?= form_open('') ?>
      <div class="card-body">
        <div class="form-row" style="margin-bottom:16px">
          <div class="form-field">
            <label>Full Name *</label>
            <input type="text" name="name" value="<?= htmlspecialchars($lead['name']) ?>" required>
          </div>
          <div class="form-field">
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($lead['email']??'') ?>">
          </div>
          <div class="form-field">
            <label>Phone</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($lead['phone']??'') ?>">
          </div>
          <div class="form-field">
            <label>Company</label>
            <input type="text" name="company" value="<?= htmlspecialchars($lead['company']??'') ?>">
          </div>
          <div class="form-field">
            <label>Source</label>
            <select name="source">
              <?php foreach(['Website','Referral','LinkedIn','Cold Call','Email Campaign','Other'] as $src): ?>
                <option value="<?= $src ?>" <?= ($lead['source']??'')===$src?'selected':'' ?>><?= $src ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-field">
            <label>Status *</label>
            <select name="status" required>
              <?php foreach(['new','contacted','qualified','lost','converted'] as $s): ?>
                <option value="<?= $s ?>" <?= $lead['status']===$s?'selected':'' ?>><?= ucfirst($s) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-field">
            <label>Deal Value (₹)</label>
            <input type="number" name="value" value="<?= $lead['value']??0 ?>" min="0" step="0.01">
          </div>
          <div class="form-field">
            <label>Assignee</label>
            <select name="assignee_id">
              <option value="">— Unassigned —</option>
              <?php foreach($users as $u): ?>
                <option value="<?= $u['id'] ?>" <?= ($lead['assignee_id']??'')==$u['id']?'selected':'' ?>>
                  <?= htmlspecialchars($u['name']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-field">
          <label>Notes</label>
          <textarea name="notes"><?= htmlspecialchars($lead['notes']??'') ?></textarea>
        </div>
      </div>
      <div class="card-footer">
        <a href="<?= base_url('admin/leads') ?>" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Lead</button>
      </div>
    </form>
  </div>

</div>

</body>
</html>
