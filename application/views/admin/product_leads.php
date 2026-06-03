<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<?php
function pl_status_pill($status)
{
  $colors = [
    'New' => 'background: rgba(99, 102, 241, 0.12); color: #6366f1; border: 1px solid rgba(99, 102, 241, 0.3);',
    'Contacted' => 'background: rgba(59, 130, 246, 0.12); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.3);',
    'Follow Up' => 'background: rgba(245, 158, 11, 0.12); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.3);',
    'Converted' => 'background: rgba(16, 185, 129, 0.12); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.3);',
    'Not Interested' => 'background: rgba(239, 68, 68, 0.12); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.3);'
  ];
  $style = isset($colors[$status]) ? $colors[$status] : 'background: var(--pm-soft); color: var(--pm-muted);';
  return '<span class="pm-pill" style="' . $style . '">' . htmlspecialchars($status) . '</span>';
}
?>

<style>
  /* ─── Premium Theme Variables ─── */
  .pm-page,
  .pm-modal {
    --pm-primary: #6366f1;
    --pm-secondary: #8b5cf6;
    --pm-success: #22c55e;
    --pm-warning: #f59e0b;
    --pm-danger: #ef4444;
    --pm-info: #3b82f6;
    --pm-text: var(--text-primary, #0f172a);
    --pm-muted: var(--text-secondary, #64748b);
    --pm-faint: var(--text-tertiary, #94a3b8);
    --pm-bg: var(--bg-secondary, #f8fafc);
    --pm-card: var(--bg-primary, #ffffff);
    --pm-soft: var(--bg-tertiary, #f1f5f9);
    --pm-border: var(--border-color, #e2e8f0);
    --pm-shadow: 0 4px 20px var(--shadow, rgba(0, 0, 0, 0.1));
    --pm-shadow-lg: 0 12px 28px var(--shadow-lg, rgba(0, 0, 0, 0.15));
  }

  [data-bs-theme=dark] .pm-page,
  [data-bs-theme=dark] .pm-modal {
    --pm-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    --pm-shadow-lg: 0 12px 28px rgba(0, 0, 0, 0.4);
  }

  .pm-page {
    background: var(--pm-bg);
    min-height: calc(100vh - 73px);
  }

  .pm-page .page-content {
    padding: 24px !important;
    max-width: 100% !important;
  }

  .pm-shell {
    max-width: 1400px;
    margin: 0 auto;
  }

  /* ─── Breadcrumb ─── */
  .pm-breadcrumb {
    background: linear-gradient(135deg, var(--pm-primary), var(--pm-secondary));
    border-radius: 14px;
    padding: 12px 20px;
    margin-bottom: 24px;
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
  }

  .pm-breadcrumb a,
  .pm-breadcrumb span {
    color: rgba(255, 255, 255, 0.85);
    font-size: 13px;
    text-decoration: none;
  }

  .pm-breadcrumb a:hover {
    color: #fff;
  }

  .pm-breadcrumb i {
    font-size: 13px;
    margin: 0 6px;
    vertical-align: middle;
  }

  /* ─── Header ─── */
  .pm-head {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 24px;
    flex-wrap: wrap;
  }

  .pm-head h1 {
    font-size: 24px;
    font-weight: 800;
    color: var(--pm-text);
    letter-spacing: -0.02em;
    margin: 0 0 4px;
  }

  .pm-head p {
    color: var(--pm-muted);
    font-size: 13px;
    margin: 0;
  }

  .pm-head-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
  }

  /* ─── Buttons ─── */
  .pm-btn {
    border: none;
    border-radius: 12px;
    padding: 10px 18px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, var(--pm-primary), var(--pm-secondary));
    color: #fff;
    font-weight: 600;
    font-size: 13px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .pm-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
    color: #fff;
  }

  .pm-btn.light {
    background: var(--pm-soft);
    color: var(--pm-text);
    border: 1px solid var(--pm-border);
  }

  .pm-btn.light:hover {
    background: var(--pm-card);
    border-color: var(--pm-primary);
    color: var(--pm-primary);
    transform: translateY(-2px);
  }

  /* ─── Product Selector Card ─── */
  .pm-selector-card {
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 24px;
    box-shadow: var(--pm-shadow);
  }

  .pm-selector-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
    align-items: flex-end;
  }

  .pm-field {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .pm-field label {
    font-size: 12px;
    font-weight: 700;
    color: var(--pm-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .pm-select,
  .pm-input {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid var(--pm-border);
    border-radius: 12px;
    background: var(--pm-soft);
    color: var(--pm-text);
    font-size: 13px;
    outline: none;
    transition: all 0.2s;
    font-family: inherit;
  }

  .pm-select:focus,
  .pm-input:focus {
    border-color: var(--pm-primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    background: var(--pm-card);
  }

  .search-group {
    display: flex;
    gap: 8px;
  }

  .search-group .pm-input {
    flex: 1;
  }

  /* ─── KPI Cards Grid ─── */
  .pm-kpi-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 16px;
    margin-bottom: 24px;
  }

  .pm-kpi-card {
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    border-radius: 16px;
    padding: 18px;
    transition: all 0.3s ease;
    box-shadow: var(--pm-shadow);
    position: relative;
    overflow: hidden;
  }

  .pm-kpi-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--pm-shadow-lg);
  }

  .pm-kpi-card::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
    background-color: var(--kpi-color);
  }

  .pm-kpi-label {
    font-size: 11px;
    font-weight: 700;
    color: var(--pm-muted);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .pm-kpi-value {
    font-size: 28px;
    font-weight: 800;
    color: var(--kpi-color);
    margin-top: 8px;
    line-height: 1;
  }

  /* ─── Leads Section ─── */
  .pm-leads-card {
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: var(--pm-shadow);
  }

  .pm-leads-header {
    padding: 16px 20px;
    border-bottom: 1px solid var(--pm-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
  }

  .pm-leads-header h2 {
    font-size: 16px;
    font-weight: 700;
    color: var(--pm-text);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .pm-leads-header h2 i {
    color: var(--pm-primary);
    font-size: 20px;
  }

  .pm-record-badge {
    background: var(--pm-soft);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    color: var(--pm-muted);
  }

  /* ─── Table Styles ─── */
  .pm-table-wrap {
    overflow-x: auto;
  }

  .pm-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px;
  }

  .pm-table th,
  .pm-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--pm-border);
    vertical-align: middle;
  }

  .pm-table th {
    background: var(--pm-soft);
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--pm-muted);
  }

  .pm-table td {
    font-size: 13px;
    color: var(--pm-text);
  }

  .pm-table tbody tr {
    transition: background 0.2s;
  }

  .pm-table tbody tr:hover {
    background: var(--pm-soft);
  }

  .pm-name {
    font-weight: 700;
    color: var(--pm-text);
  }

  .pm-pill {
    display: inline-flex;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
  }

  .pm-notes {
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .pm-date {
    font-size: 11px;
    color: var(--pm-muted);
    white-space: nowrap;
  }

  /* ─── Action Icons ─── */
  .pm-actions {
    display: flex;
    gap: 8px;
    justify-content: center;
  }

  .pm-icon {
    width: 32px;
    height: 32px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    border: 1px solid var(--pm-border);
    background: var(--pm-soft);
    color: var(--pm-muted);
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
  }

  .pm-icon:hover {
    background: var(--pm-danger);
    border-color: var(--pm-danger);
    color: #fff;
    transform: translateY(-2px);
  }

  /* ─── Empty State ─── */
  .pm-empty {
    padding: 60px 20px;
    text-align: center;
    color: var(--pm-muted);
  }

  .pm-empty i {
    font-size: 48px;
    margin-bottom: 12px;
    display: block;
    opacity: 0.5;
  }

  .pm-empty h5 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 6px;
    color: var(--pm-text);
  }

  /* ─── Mobile List View ─── */
  .pm-mobile-list {
    display: none;
    padding: 16px;
  }

  .pm-mobile-card {
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    border-radius: 16px;
    padding: 16px;
    margin-bottom: 12px;
    box-shadow: var(--pm-shadow);
  }

  .pm-mobile-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
    padding-bottom: 12px;
    border-bottom: 1px solid var(--pm-border);
  }

  .pm-mobile-name {
    font-weight: 700;
    font-size: 15px;
    color: var(--pm-text);
  }

  .pm-mobile-row {
    display: flex;
    justify-content: space-between;
    padding: 8px 0;
    font-size: 13px;
    border-top: 1px solid var(--pm-border);
  }

  .pm-mobile-row span:first-child {
    color: var(--pm-muted);
  }

  .pm-mobile-row span:last-child {
    font-weight: 600;
    color: var(--pm-text);
  }

  .pm-mobile-actions {
    display: flex;
    gap: 12px;
    justify-content: flex-end;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid var(--pm-border);
  }

  /* ─── Modal Styles ─── */
  .pm-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 16px;
    background: rgba(0, 0, 0, 0.65);
    backdrop-filter: blur(4px);
  }

  .pm-modal.active {
    display: flex;
  }

  .pm-modal-box {
    width: 100%;
    max-width: 520px;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
    border-radius: 20px;
    background: var(--pm-card);
    border: 1px solid var(--pm-border);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    overflow: hidden;
  }

  .pm-modal-header {
    padding: 16px 20px;
    border-bottom: 1px solid var(--pm-border);
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .pm-modal-title {
    font-size: 18px;
    font-weight: 700;
    color: var(--pm-text);
  }

  .pm-modal-close {
    width: 32px;
    height: 32px;
    border: none;
    border-radius: 10px;
    background: var(--pm-soft);
    color: var(--pm-muted);
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: all 0.2s;
  }

  .pm-modal-close:hover {
    background: var(--pm-border);
    color: var(--pm-text);
  }

  .pm-modal-body {
    padding: 20px;
    overflow-y: auto;
  }

  .pm-modal-footer {
    padding: 16px 20px;
    border-top: 1px solid var(--pm-border);
    display: flex;
    justify-content: flex-end;
    gap: 12px;
  }

  .pm-form-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 16px;
  }

  .pm-textarea {
    width: 100%;
    min-height: 90px;
    padding: 10px 14px;
    border: 1.5px solid var(--pm-border);
    border-radius: 12px;
    background: var(--pm-soft);
    color: var(--pm-text);
    font-size: 13px;
    outline: none;
    resize: vertical;
    font-family: inherit;
  }

  .pm-textarea:focus {
    border-color: var(--pm-primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    background: var(--pm-card);
  }

  .pm-alert {
    padding: 12px 16px;
    border-radius: 12px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
  }

  /* ─── Responsive ─── */
  @media (max-width: 1024px) {
    .pm-kpi-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  @media (max-width: 768px) {
    .pm-page .page-content {
      padding: 16px !important;
    }

    .pm-head {
      flex-direction: column;
    }

    .pm-head-actions {
      width: 100%;
    }

    .pm-head-actions .pm-btn {
      flex: 1;
      justify-content: center;
    }

    .pm-kpi-grid {
      grid-template-columns: repeat(2, 1fr);
    }

    .pm-table-wrap {
      display: none;
    }

    .pm-mobile-list {
      display: block;
    }

    .pm-selector-grid {
      grid-template-columns: 1fr;
    }
  }

  @media (max-width: 576px) {
    .pm-kpi-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="page-wrapper pm-page">
  <div class="page-content">
    <div class="pm-shell">

      <!-- Breadcrumb -->
      <div class="pm-breadcrumb">
        <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Dashboard</a>
        <i class='bx bx-chevron-right'></i>
        <span>Product Leads</span>
      </div>

      <!-- Flash Messages -->
      <?php if ($this->session->flashdata('success')): ?>
        <div class="pm-alert" style="background: rgba(34, 197, 94, 0.1); color: #22c55e; border-left: 3px solid #22c55e;">
          <i class='bx bx-check-circle'></i> <?= htmlspecialchars($this->session->flashdata('success')) ?>
        </div>
      <?php endif; ?>
      <?php if ($this->session->flashdata('error')): ?>
        <div class="pm-alert" style="background: rgba(239, 68, 68, 0.1); color: #ef4444; border-left: 3px solid #ef4444;">
          <i class='bx bx-error-circle'></i> <?= $this->session->flashdata('error') ?>
        </div>
      <?php endif; ?>

      <!-- Header -->
      <div class="pm-head">
        <div>
          <h1><i class='bx bx-package' style="color: var(--pm-primary);"></i> Product Leads</h1>
          <p>Import, export, and manually record leads connected directly to individual products.</p>
        </div>
        <?php if ($selected_product_id): ?>
          <div class="pm-head-actions">
            <button class="pm-btn light" onclick="openModal('importModal')"><i class='bx bx-upload'></i> Import CSV/XLSX</button>
            <a href="<?= site_url('admin/product_leads/export/' . $selected_product_id) ?>" class="pm-btn light"><i class='bx bx-download'></i> Export CSV</a>
            <button class="pm-btn" onclick="openModal('addLeadModal')"><i class='bx bx-plus'></i> Add Lead</button>
          </div>
        <?php endif; ?>
      </div>

      <!-- Product Selector -->
      <div class="pm-selector-card">
        <form method="get" action="<?= site_url('admin/product_leads') ?>" id="productFilterForm">
          <div class="pm-selector-grid">
            <div class="pm-field">
              <label><i class='bx bx-box'></i> Select Product</label>
              <select class="pm-select" name="product_id" onchange="document.getElementById('productFilterForm').submit()">
                <option value="">-- Choose a Product --</option>
                <?php foreach ($products as $prod): ?>
                  <option value="<?= $prod->id ?>" <?= ($selected_product_id == $prod->id) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($prod->name) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <?php if ($selected_product_id): ?>
              <div class="pm-field">
                <label><i class='bx bx-filter'></i> Status Filter</label>
                <select class="pm-select" name="status" onchange="document.getElementById('productFilterForm').submit()">
                  <option value="">All Statuses</option>
                  <option value="New" <?= ($status_filter == 'New') ? 'selected' : '' ?>>New</option>
                  <option value="Contacted" <?= ($status_filter == 'Contacted') ? 'selected' : '' ?>>Contacted</option>
                  <option value="Follow Up" <?= ($status_filter == 'Follow Up') ? 'selected' : '' ?>>Follow Up</option>
                  <option value="Converted" <?= ($status_filter == 'Converted') ? 'selected' : '' ?>>Converted</option>
                  <option value="Not Interested" <?= ($status_filter == 'Not Interested') ? 'selected' : '' ?>>Not Interested</option>
                </select>
              </div>
              <div class="pm-field">
                <label><i class='bx bx-search'></i> Search Lead</label>
                <div class="search-group">
                  <input class="pm-input" name="search" placeholder="Search by name, mobile, city..." value="<?= htmlspecialchars($search) ?>">
                  <button type="submit" class="pm-btn"><i class='bx bx-search'></i></button>
                  <?php if ($search || $status_filter): ?>
                    <a href="<?= site_url('admin/product_leads?product_id=' . $selected_product_id) ?>" class="pm-btn light"><i class='bx bx-reset'></i></a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </form>
      </div>

      <?php if (!$selected_product_id): ?>
        <!-- No Product Selected -->
        <div class="pm-leads-card">
          <div class="pm-empty">
            <i class='bx bx-folder-open'></i>
            <h5>No Product Selected</h5>
            <p>Please choose a product from the dropdown above to view, import, or manage its leads.</p>
          </div>
        </div>
      <?php else: ?>

        <!-- KPI Cards -->
        <div class="pm-kpi-grid">
          <div class="pm-kpi-card" style="--kpi-color: #6366f1;">
            <div class="pm-kpi-label">New</div>
            <div class="pm-kpi-value"><?= (int)($kpis['New'] ?? 0) ?></div>
          </div>
          <div class="pm-kpi-card" style="--kpi-color: #3b82f6;">
            <div class="pm-kpi-label">Contacted</div>
            <div class="pm-kpi-value"><?= (int)($kpis['Contacted'] ?? 0) ?></div>
          </div>
          <div class="pm-kpi-card" style="--kpi-color: #f59e0b;">
            <div class="pm-kpi-label">Follow Up</div>
            <div class="pm-kpi-value"><?= (int)($kpis['Follow Up'] ?? 0) ?></div>
          </div>
          <div class="pm-kpi-card" style="--kpi-color: #22c55e;">
            <div class="pm-kpi-label">Converted</div>
            <div class="pm-kpi-value"><?= (int)($kpis['Converted'] ?? 0) ?></div>
          </div>
          <div class="pm-kpi-card" style="--kpi-color: #ef4444;">
            <div class="pm-kpi-label">Not Interested</div>
            <div class="pm-kpi-value"><?= (int)($kpis['Not Interested'] ?? 0) ?></div>
          </div>
        </div>

        <!-- Leads List -->
        <div class="pm-leads-card">
          <div class="pm-leads-header">
            <h2><i class='bx bx-data'></i> Leads Storage</h2>
            <span class="pm-record-badge"><?= count($leads) ?> records found</span>
          </div>

          <?php if (empty($leads)): ?>
            <div class="pm-empty">
              <i class='bx bx-message-alt-x'></i>
              <h5>No Leads Found</h5>
              <p>No leads found for this product matching the criteria. Upload a CSV file or add manually.</p>
            </div>
          <?php else: ?>

            <!-- Desktop Table View -->
            <div class="pm-table-wrap">
              <table class="pm-table">
                <thead>
                  <tr>
                    <th>Lead Name</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Notes</th>
                    <th>Created At</th>
                    <th style="text-align: center;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($leads as $lead): ?>
                    <tr>
                      <td class="pm-name"><?= htmlspecialchars($lead->name) ?></td>
                      <td><?= htmlspecialchars($lead->mobile) ?></td>
                      <td><?= htmlspecialchars($lead->city) ?></td>
                      <td><?= pl_status_pill($lead->status) ?></td>
                      <td class="pm-notes" title="<?= htmlspecialchars($lead->notes ?? '') ?>">
                        <?= htmlspecialchars($lead->notes ?: '—') ?>
                      </td>
                      <td class="pm-date"><?= date('d M Y h:i A', strtotime($lead->created_at)) ?></td>
                      <td style="text-align: center;">
                        <div class="pm-actions">
                          <a href="<?= site_url('admin/product_leads/delete/' . $lead->id) ?>"
                            class="pm-icon"
                            onclick="return confirm('Are you sure you want to delete this lead?')"
                            title="Delete Lead">
                            <i class='bx bx-trash'></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

            <!-- Mobile List View -->
            <div class="pm-mobile-list">
              <?php foreach ($leads as $lead): ?>
                <div class="pm-mobile-card">
                  <div class="pm-mobile-header">
                    <span class="pm-mobile-name"><?= htmlspecialchars($lead->name) ?></span>
                    <?= pl_status_pill($lead->status) ?>
                  </div>
                  <div class="pm-mobile-row">
                    <span>Mobile</span>
                    <span><?= htmlspecialchars($lead->mobile) ?></span>
                  </div>
                  <div class="pm-mobile-row">
                    <span>City</span>
                    <span><?= htmlspecialchars($lead->city) ?></span>
                  </div>
                  <?php if ($lead->notes): ?>
                    <div class="pm-mobile-row" style="flex-direction: column; gap: 4px;">
                      <span>Notes</span>
                      <span style="font-weight: normal;"><?= htmlspecialchars($lead->notes) ?></span>
                    </div>
                  <?php endif; ?>
                  <div class="pm-mobile-actions">
                    <a href="<?= site_url('admin/product_leads/delete/' . $lead->id) ?>"
                      class="pm-icon"
                      onclick="return confirm('Are you sure you want to delete this lead?')"
                      title="Delete Lead">
                      <i class='bx bx-trash'></i>
                    </a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

          <?php endif; ?>
        </div>

      <?php endif; ?>

    </div>
  </div>
</div>

<!-- Import Modal -->
<?php if ($selected_product_id): ?>
  <div class="pm-modal" id="importModal">
    <div class="pm-modal-box">
      <form method="post" action="<?= site_url('admin/product_leads/import/' . $selected_product_id) ?>" enctype="multipart/form-data">
        <div class="pm-modal-header">
          <h5 class="pm-modal-title"><i class='bx bx-upload'></i> Import CSV / XLSX Leads</h5>
          <button type="button" class="pm-modal-close" onclick="closeModal('importModal')"><i class='bx bx-x'></i></button>
        </div>
        <div class="pm-modal-body">
          <div class="pm-form-grid">
            <div class="pm-field">
              <label>Upload File (CSV or XLSX)</label>
              <input type="file" name="csv_file" class="pm-input" accept=".csv,.xlsx" required>
            </div>
            <div class="pm-field">
              <div style="background: var(--pm-soft); padding: 12px; border-radius: 12px; font-size: 12px; display: flex; flex-direction: column; gap: 8px;">
                <div>
                  <i class='bx bx-info-circle'></i> <strong>File format:</strong><br>
                  The CSV or XLSX file should contain columns: Name, Mobile, City (or in order: Name, Mobile, City).
                </div>
                <div style="margin-top: 4px;">
                  <a href="<?= site_url('admin/product_leads/download_template') ?>" class="pm-btn light" style="padding: 6px 12px; font-size: 11px; border-radius: 8px; width: 100%; justify-content: center; display: inline-flex; box-sizing: border-box;">
                    <i class='bx bx-download'></i> Download Sample Template
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="pm-modal-footer">
          <button type="button" class="pm-btn light" onclick="closeModal('importModal')">Cancel</button>
          <button type="submit" class="pm-btn">Upload & Import</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Add Lead Modal -->
  <div class="pm-modal" id="addLeadModal">
    <div class="pm-modal-box">
      <form method="post" action="<?= site_url('admin/product_leads/add_lead') ?>">
        <input type="hidden" name="product_id" value="<?= $selected_product_id ?>">
        <div class="pm-modal-header">
          <h5 class="pm-modal-title"><i class='bx bx-plus'></i> Add Lead Manually</h5>
          <button type="button" class="pm-modal-close" onclick="closeModal('addLeadModal')"><i class='bx bx-x'></i></button>
        </div>
        <div class="pm-modal-body">
          <div class="pm-form-grid">
            <div class="pm-field">
              <label>Lead Name <span style="color: #ef4444;">*</span></label>
              <input class="pm-input" name="name" required placeholder="Enter lead name">
            </div>
            <div class="pm-field">
              <label>Mobile Number <span style="color: #ef4444;">*</span></label>
              <input class="pm-input" name="mobile" required placeholder="Enter mobile number">
            </div>
            <div class="pm-field">
              <label>City <span style="color: #ef4444;">*</span></label>
              <input class="pm-input" name="city" required placeholder="Enter city">
            </div>
            <div class="pm-field">
              <label>Notes (Optional)</label>
              <textarea class="pm-textarea" name="notes" placeholder="Add notes about this lead..."></textarea>
            </div>
          </div>
        </div>
        <div class="pm-modal-footer">
          <button type="button" class="pm-btn light" onclick="closeModal('addLeadModal')">Cancel</button>
          <button type="submit" class="pm-btn">Save Lead</button>
        </div>
      </form>
    </div>
  </div>
<?php endif; ?>

<script>
  function openModal(id) {
    document.getElementById(id).classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeModal(id) {
    document.getElementById(id).classList.remove('active');
    document.body.style.overflow = '';
  }

  document.querySelectorAll('.pm-modal').forEach(modal => {
    modal.addEventListener('click', e => {
      if (e.target === modal) closeModal(modal.id);
    });
  });
</script>