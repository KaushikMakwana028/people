<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  :root {
    --primary: #6366F1;
    --primary-dark: #4f46e5;
    --primary-light: rgba(99, 102, 241, 0.1);
    --secondary: #8B5CF6;
    --success: #22c55e;
    --danger: #ef4444;
    --warning: #f59e0b;
    --text-primary: #0f172a;
    --text-secondary: #64748b;
    --text-tertiary: #94a3b8;
    --bg-primary: #ffffff;
    --bg-secondary: #f8fafc;
    --bg-tertiary: #f1f5f9;
    --border-color: #e2e8f0;
    --shadow: rgba(0, 0, 0, 0.1);
    --shadow-lg: rgba(0, 0, 0, 0.15);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
    --radius-xl: 20px;
  }

  [data-bs-theme="dark"],
  [data-bs-theme="semi-dark"] {
    --bg-primary: #0f172a;
    --bg-secondary: #1e293b;
    --bg-tertiary: #334155;
    --text-primary: #f1f5f9;
    --text-secondary: #cbd5e1;
    --text-tertiary: #94a3b8;
    --border-color: rgba(255, 255, 255, 0.08);
    --shadow: rgba(0, 0, 0, 0.3);
    --shadow-lg: rgba(0, 0, 0, 0.5);
  }

  /* ─── KEY FIX: contain the page inside the page-wrapper ─── */
  .edit-lead-page {
    background: var(--bg-secondary);
    min-height: 100vh;
    /* Do NOT set width:100% or overflow:hidden — let the parent layout own that */
  }

  .edit-lead-page .page-content {
    /* Use padding only; avoid fixed widths that fight the sidebar offset */
    padding: 1.5rem 1.75rem !important;
    margin: 0 !important;
    max-width: 100% !important;
    /* Prevent horizontal scroll caused by grid bleed */
    overflow-x: hidden !important;
  }

  /* ─── Breadcrumb ─── */
  .edit-breadcrumb {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    border-radius: 16px;
    padding: 14px 24px;
    margin-bottom: 24px;
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
  }

  .breadcrumb-left a,
  .breadcrumb-left span {
    color: rgba(255, 255, 255, 0.85);
    font-size: 13px;
    text-decoration: none;
  }

  .breadcrumb-left a:hover {
    color: #fff;
  }

  .breadcrumb-left i {
    font-size: 13px;
    margin: 0 6px;
    vertical-align: middle;
  }

  .lead-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    color: #fff;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
  }

  /* ─── Main Card ─── */
  .edit-card {
    background: var(--bg-primary);
    border-radius: var(--radius-xl);
    box-shadow: 0 4px 20px var(--shadow);
    border: 1px solid var(--border-color);
    /* CRITICAL: prevent the card itself from overflowing */
    width: 100%;
    min-width: 0;
    overflow: hidden;
  }

  .edit-card-header {
    padding: 24px 28px;
    border-bottom: 1px solid var(--border-color);
    background: var(--bg-primary);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
  }

  .header-left {
    display: flex;
    align-items: center;
    gap: 16px;
    min-width: 0;
  }

  .header-icon {
    width: 52px;
    height: 52px;
    flex-shrink: 0;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 26px;
  }

  .header-left h2 {
    font-size: 20px;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 4px 0;
    white-space: nowrap;
  }

  .header-left p {
    font-size: 13px;
    color: var(--text-secondary);
    margin: 0;
  }

  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
    flex-shrink: 0;
  }

  .status-in-progress {
    background: rgba(99, 102, 241, 0.1);
    color: #6366f1;
    border: 1px solid rgba(99, 102, 241, 0.3);
  }

  .status-converted {
    background: rgba(34, 197, 94, 0.1);
    color: #22c55e;
    border: 1px solid rgba(34, 197, 94, 0.3);
  }

  .status-not-interested {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
  }

  /* ─── Form Sections ─── */
  .form-section {
    padding: 24px 28px;
    border-bottom: 1px solid var(--border-color);
  }

  .form-section:last-child {
    border-bottom: none;
  }

  .section-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid var(--border-color);
  }

  .section-title i {
    font-size: 20px;
    color: var(--primary);
    flex-shrink: 0;
  }

  .section-title h3 {
    font-size: 13px;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  /* ─── THE MAIN FIX: grid respects container ─── */
  .form-grid {
    display: grid;
    /* minmax(0,1fr) prevents cells from exceeding available width */
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
    width: 100%;
  }

  .form-field {
    display: flex;
    flex-direction: column;
    gap: 7px;
    /* Prevent any child from blowing out the cell */
    min-width: 0;
  }

  .form-field.full-width {
    grid-column: span 2;
  }

  .form-field label {
    font-size: 11px;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: flex;
    align-items: center;
    gap: 7px;
  }

  .form-field label i {
    font-size: 14px;
    color: var(--primary);
    flex-shrink: 0;
  }

  .form-field label .required {
    color: var(--danger);
  }

  .form-field input,
  .form-field select,
  .form-field textarea {
    /* width:100% inside a minmax(0,1fr) cell will never overflow */
    width: 100%;
    min-width: 0;
    padding: 11px 14px;
    border: 2px solid var(--border-color);
    border-radius: var(--radius-md);
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: var(--text-primary);
    background: var(--bg-secondary);
    outline: none;
    transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
  }

  .form-field input:focus,
  .form-field select:focus,
  .form-field textarea:focus {
    border-color: var(--primary);
    background: var(--bg-primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
  }

  .form-field input:hover,
  .form-field select:hover,
  .form-field textarea:hover {
    border-color: var(--text-tertiary);
  }

  .form-field textarea {
    resize: vertical;
    min-height: 110px;
    font-family: 'Inter', sans-serif;
  }

  .form-field select {
    cursor: pointer;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 36px;
  }

  .field-hint {
    font-size: 11px;
    color: var(--text-tertiary);
    display: flex;
    align-items: center;
    gap: 5px;
  }

  /* ─── Avatar Preview ─── */
  .avatar-preview {
    display: flex;
    align-items: center;
    gap: 18px;
    flex-wrap: wrap;
  }

  .avatar-circle {
    width: 64px;
    height: 64px;
    flex-shrink: 0;
    border-radius: 16px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 22px;
    font-weight: 700;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
  }

  .avatar-info p {
    margin: 0;
    font-size: 13px;
    color: var(--text-secondary);
  }

  .avatar-info p:first-child {
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 5px;
    font-size: 15px;
  }

  /* ─── Footer ─── */
  .edit-card-footer {
    padding: 20px 28px;
    border-top: 1px solid var(--border-color);
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 14px;
    background: var(--bg-secondary);
    flex-wrap: wrap;
  }

  .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 11px 26px;
    border-radius: var(--radius-md);
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
    border: none;
    white-space: nowrap;
  }

  .btn-primary {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    box-shadow: 0 2px 8px rgba(99, 102, 241, 0.3);
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(99, 102, 241, 0.4);
    color: #fff;
  }

  .btn-secondary {
    background: var(--bg-secondary);
    color: var(--text-secondary);
    border: 2px solid var(--border-color);
  }

  .btn-secondary:hover {
    border-color: var(--text-tertiary);
    background: var(--bg-tertiary);
    color: var(--text-primary);
  }

  /* ─── Alert ─── */
  .alert-custom {
    padding: 14px 18px;
    border-radius: var(--radius-md);
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 12px;
    animation: slideDown 0.3s ease;
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-8px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .alert-danger {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border-left: 3px solid #ef4444;
  }

  .alert-danger i {
    font-size: 18px;
  }

  /* ─── Responsive ─── */
  @media (max-width: 1100px) {
    .form-grid {
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 16px;
    }
  }

  @media (max-width: 768px) {
    .edit-lead-page .page-content {
      padding: 1rem !important;
    }

    .form-grid {
      grid-template-columns: 1fr;
    }

    .form-field.full-width {
      grid-column: span 1;
    }

    .form-section,
    .edit-card-header,
    .edit-card-footer {
      padding: 18px 16px;
    }

    .edit-card-header {
      flex-direction: column;
      align-items: flex-start;
    }

    .edit-card-footer {
      flex-direction: column-reverse;
    }

    .btn {
      width: 100%;
    }

    .header-left h2 {
      font-size: 17px;
    }
  }

  @media (max-width: 480px) {
    .edit-breadcrumb {
      flex-direction: column;
      align-items: flex-start;
    }

    .avatar-preview {
      flex-direction: column;
    }
  }
</style>

<div class="page-wrapper edit-lead-page">
  <div class="page-content">

    <!-- Breadcrumb -->
    <div class="edit-breadcrumb">
      <div class="breadcrumb-left">
        <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Dashboard</a>
        <i class='bx bx-chevron-right'></i>
        <a href="<?= base_url('admin/leads') ?>">Leads</a>
        <i class='bx bx-chevron-right'></i>
        <span>Edit Lead</span>
      </div>
      <div class="lead-badge">
        <i class='bx bx-id-card'></i>
        Lead ID: <?= $lead['id'] ?>
      </div>
    </div>

    <!-- Flash Messages -->
    <?php if ($this->session->flashdata('error')): ?>
      <div class="alert-custom alert-danger">
        <i class='bx bx-error-circle'></i>
        <span><?= $this->session->flashdata('error') ?></span>
      </div>
    <?php endif; ?>

    <!-- Main Edit Card -->
    <div class="edit-card">

      <!-- Card Header -->
      <div class="edit-card-header">
        <div class="header-left">
          <div class="header-icon">
            <i class='bx bx-edit-alt'></i>
          </div>
          <div>
            <h2>Edit Lead</h2>
            <p>Update lead information and track progress</p>
          </div>
        </div>

        <?php
        $statusClass = 'status-not-interested';
        $statusIcon  = 'bx bx-x-circle';
        if ($lead['status'] === 'in-progress') {
          $statusClass = 'status-in-progress';
          $statusIcon  = 'bx bx-trending-up';
        } elseif ($lead['status'] === 'converted') {
          $statusClass = 'status-converted';
          $statusIcon  = 'bx bx-check-circle';
        }
        ?>
        <div class="status-badge <?= $statusClass ?>">
          <i class='<?= $statusIcon ?>'></i>
          <?= ucfirst(str_replace('-', ' ', $lead['status'])) ?>
        </div>
      </div>

      <form method="POST" action="<?= base_url('admin/leads/update/' . $lead['id']) ?>">

        <!-- Avatar Preview -->
        <div class="form-section">
          <?php
          $nameParts = explode(' ', trim($lead['name']));
          $initials  = strtoupper(
            substr($nameParts[0], 0, 1) .
              (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : '')
          );
          ?>
          <div class="avatar-preview">
            <div class="avatar-circle"><?= $initials ?></div>
            <div class="avatar-info">
              <p><?= htmlspecialchars($lead['name']) ?></p>
              <p><i class='bx bx-calendar-alt'></i> Created: <?= date('M j, Y', strtotime($lead['created_at'])) ?></p>
            </div>
          </div>
        </div>

        <!-- Basic Information -->
        <div class="form-section">
          <div class="section-title">
            <i class='bx bx-info-circle'></i>
            <h3>Basic Information</h3>
          </div>

          <div class="form-grid">
            <div class="form-field">
              <label><i class='bx bx-user'></i> Full Name <span class="required">*</span></label>
              <input type="text" name="name"
                value="<?= htmlspecialchars($lead['name']) ?>"
                required placeholder="Enter full name">
            </div>

            <div class="form-field">
              <label><i class='bx bx-envelope'></i> Email Address</label>
              <input type="email" name="email"
                value="<?= htmlspecialchars($lead['email'] ?? '') ?>"
                placeholder="example@company.com">
            </div>

            <div class="form-field">
              <label><i class='bx bx-phone'></i> Phone Number</label>
              <input type="tel" name="phone"
                value="<?= htmlspecialchars($lead['phone'] ?? '') ?>"
                placeholder="+91 98765 43210">
            </div>

            <div class="form-field">
              <label><i class='bx bx-building'></i> Company Name</label>
              <input type="text" name="company"
                value="<?= htmlspecialchars($lead['company'] ?? '') ?>"
                placeholder="Company name">
            </div>
          </div>
        </div>

        <!-- Lead Details -->
        <div class="form-section">
          <div class="section-title">
            <i class='bx bx-detail'></i>
            <h3>Lead Details</h3>
          </div>

          <div class="form-grid">
            <div class="form-field">
              <label><i class='bx bx-source'></i> Lead Source</label>
              <select name="source">
                <option value="">— Select Source —</option>
                <?php foreach (['Website', 'Referral', 'LinkedIn', 'Cold Call', 'Email Campaign', 'Other'] as $src): ?>
                  <option value="<?= $src ?>" <?= ($lead['source'] ?? '') === $src ? 'selected' : '' ?>>
                    <?= $src ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="form-field">
              <label><i class='bx bx-flag'></i> Status <span class="required">*</span></label>
              <select name="status" required>
                <option value="in-progress" <?= $lead['status'] === 'in-progress'    ? 'selected' : '' ?>>In Progress</option>
                <option value="converted" <?= $lead['status'] === 'converted'      ? 'selected' : '' ?>>Converted</option>
                <option value="not-interested" <?= $lead['status'] === 'not-interested' ? 'selected' : '' ?>>Not Interested</option>
              </select>
            </div>

            <div class="form-field">
              <label><i class='bx bx-rupee'></i> Deal Value</label>
              <input type="number" name="value"
                value="<?= $lead['value'] ?? 0 ?>"
                min="0" step="0.01" placeholder="0.00">
              <div class="field-hint">
                <i class='bx bx-info-circle'></i> Amount in Rupees (₹)
              </div>
            </div>

            <div class="form-field">
              <label><i class='bx bx-user-check'></i> Assign To</label>
              <select name="assignee_id">
                <option value="">— Unassigned —</option>
                <?php foreach ($users as $u): ?>
                  <option value="<?= $u['id'] ?>"
                    <?= ($lead['assignee_id'] ?? '') == $u['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($u['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <!-- Notes -->
        <div class="form-section">
          <div class="section-title">
            <i class='bx bx-note'></i>
            <h3>Notes &amp; Comments</h3>
          </div>

          <div class="form-field full-width">
            <textarea name="notes"
              placeholder="Add any additional notes or comments about this lead..."><?= htmlspecialchars($lead['notes'] ?? '') ?></textarea>
            <div class="field-hint">
              <i class='bx bx-bulb'></i> Include important details, follow-up dates, or conversation notes
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="edit-card-footer">
          <a href="<?= base_url('admin/leads') ?>" class="btn btn-secondary">
            <i class='bx bx-x'></i> Cancel
          </a>
          <button type="submit" class="btn btn-primary">
            <i class='bx bx-save'></i> Update Lead
          </button>
        </div>

      </form>
    </div><!-- /.edit-card -->

  </div><!-- /.page-content -->
</div><!-- /.edit-lead-page -->

<script>
  // Auto-hide flash messages after 5 s
  setTimeout(function() {
    document.querySelectorAll('.alert-custom').forEach(function(el) {
      el.style.transition = 'opacity 0.5s ease';
      el.style.opacity = '0';
      setTimeout(function() {
        if (el && el.parentNode) el.parentNode.removeChild(el);
      }, 500);
    });
  }, 5000);
</script>