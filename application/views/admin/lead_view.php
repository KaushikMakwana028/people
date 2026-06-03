<?php
// ── Helpers ──────────────────────────────────────────────────────────────────
function status_badge($status)
{
  $map = [
    'in-progress'    => ['label' => 'In Progress',    'color' => '#6366f1', 'bg' => 'rgba(99,102,241,.12)', 'dot' => '#6366f1'],
    'converted'      => ['label' => 'Converted',      'color' => '#22c55e', 'bg' => 'rgba(34,197,94,.12)', 'dot' => '#22c55e'],
    'not-interested' => ['label' => 'Not Interested', 'color' => '#ef4444', 'bg' => 'rgba(239,68,68,.12)', 'dot' => '#ef4444'],
  ];
  $s = $map[$status] ?? ['label' => ucwords(str_replace('-', ' ', $status)), 'color' => '#64748b', 'bg' => 'rgba(148,163,184,.12)', 'dot' => '#94a3b8'];
  return sprintf(
    '<span class="sbadge" style="background:%s;color:%s"><span class="sdot" style="background:%s"></span>%s</span>',
    $s['bg'],
    $s['color'],
    $s['dot'],
    $s['label']
  );
}
function avatar_initials($name)
{
  $p = explode(' ', trim($name));
  return strtoupper(substr($p[0], 0, 1) . (isset($p[1]) ? substr($p[1], 0, 1) : ''));
}
function avatar_color($name)
{
  $c = ['#3b82f6', '#8b5cf6', '#10b981', '#f97316', '#ef4444', '#0ea5e9', '#ec4899'];
  return $c[abs(crc32($name)) % count($c)];
}
function format_value($val)
{
  if ($val >= 100000) return '₹' . number_format($val / 100000, 1) . 'L';
  if ($val >= 1000)   return '₹' . number_format($val / 1000, 0) . 'K';
  return '₹' . number_format($val, 0);
}
?>

<!-- Boxicons CSS (replacing Font Awesome) -->
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<style>
  /* ── Global Reset for Full Width ── */
  .lead-page {
    --primary: #6366f1;
    --primary-dark: #4f46e5;
    --secondary: #8b5cf6;
    --success: #22c55e;
    --danger: #ef4444;
    --warning: #f59e0b;
  }

  .lead-page .page-content {
    padding: 1.25rem 1.5rem !important;
    max-width: 100% !important;
  }

  .lead-page .page {
    max-width: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }

  /* ── Breadcrumb ── */
  .lead-breadcrumb {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    border-radius: 14px;
    padding: 12px 20px;
    margin-bottom: 24px;
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
  }

  .lead-breadcrumb a,
  .lead-breadcrumb span {
    color: rgba(255, 255, 255, 0.8);
    font-size: 12px;
    text-decoration: none;
  }

  .lead-breadcrumb a:hover {
    color: #fff;
  }

  .lead-breadcrumb i {
    font-size: 12px;
    margin: 0 4px;
    vertical-align: middle;
  }

  /* ── Page Header ── */
  .lead-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--border-color);
  }

  .lead-header h1 {
    font-size: 20px;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 4px 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .lead-header h1 i {
    color: var(--primary);
    font-size: 24px;
  }

  .lead-header p {
    font-size: 13px;
    color: var(--text-secondary);
    margin: 0;
  }

  .lead-header-actions {
    display: flex;
    gap: 12px;
  }

  /* ── Buttons ── */
  .btn-lead {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    border: none;
    font-family: inherit;
    text-decoration: none;
  }

  .btn-lead-primary {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
  }

  .btn-lead-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
    color: #fff;
  }

  .btn-lead-outline {
    background: transparent;
    border: 2px solid var(--border-color);
    color: var(--text-secondary);
  }

  .btn-lead-outline:hover {
    border-color: var(--primary);
    color: var(--primary);
    background: var(--bg-secondary);
  }

  /* ── Stat Cards Grid ── */
  .lead-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 24px;
  }

  .lead-stat-card {
    background: var(--bg-primary);
    border-radius: 16px;
    padding: 20px;
    box-shadow: 0 2px 12px var(--shadow);
    border: 1px solid var(--border-color);
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .lead-stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px var(--shadow-lg);
  }

  .lead-stat-left .stat-number {
    font-size: 32px;
    font-weight: 800;
    line-height: 1.2;
  }

  .lead-stat-left .stat-label {
    font-size: 11px;
    color: var(--text-secondary);
    margin-top: 4px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .lead-stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
  }

  .stat-total .lead-stat-icon {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
  }

  .stat-total .stat-number {
    color: var(--primary);
  }

  .stat-progress .lead-stat-icon {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
  }

  .stat-progress .stat-number {
    color: var(--primary);
  }

  .stat-converted .lead-stat-icon {
    background: rgba(34, 197, 94, 0.1);
    color: #22c55e;
  }

  .stat-converted .stat-number {
    color: #22c55e;
  }

  .stat-rejected .lead-stat-icon {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
  }

  .stat-rejected .stat-number {
    color: #ef4444;
  }

  /* ── Filter Bar ── */
  .lead-filter-bar {
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 16px 20px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
  }

  .lead-search {
    flex: 1;
    min-width: 200px;
    position: relative;
  }

  .lead-search i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-tertiary);
    font-size: 18px;
  }

  .lead-search input {
    width: 100%;
    padding: 10px 12px 10px 42px;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-size: 13px;
    background: var(--bg-secondary);
    color: var(--text-primary);
    transition: all 0.2s;
  }

  .lead-search input:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
  }

  .lead-filter-select {
    padding: 10px 32px 10px 14px;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-size: 13px;
    background: var(--bg-secondary);
    color: var(--text-primary);
    cursor: pointer;
    min-width: 140px;
  }

  .lead-filter-select:focus {
    border-color: var(--primary);
    outline: none;
  }

  .lead-filter-actions {
    display: flex;
    gap: 8px;
    margin-left: auto;
  }

  .btn-clear {
    padding: 8px 16px;
    background: transparent;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    color: var(--text-secondary);
    font-size: 12px;
    cursor: pointer;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 6px;
  }

  .btn-clear:hover {
    border-color: var(--primary);
    color: var(--primary);
  }

  /* ── Table Card ── */
  .lead-table-card {
    background: var(--bg-primary);
    border-radius: 20px;
    box-shadow: 0 4px 20px var(--shadow);
    overflow: hidden;
  }

  .lead-table-header {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
  }

  .lead-table-header h3 {
    font-size: 15px;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .lead-table-header h3 i {
    color: var(--primary);
    font-size: 18px;
  }

  .lead-table-count {
    font-size: 12px;
    color: var(--text-secondary);
    background: var(--bg-secondary);
    padding: 4px 12px;
    border-radius: 20px;
  }

  .lead-table-wrapper {
    overflow-x: auto;
  }

  .lead-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;
  }

  .lead-table th {
    padding: 14px 16px;
    text-align: left;
    font-size: 11px;
    font-weight: 700;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background: var(--bg-secondary);
    border-bottom: 1px solid var(--border-color);
  }

  .lead-table th i {
    font-size: 12px;
    margin-right: 6px;
    vertical-align: middle;
  }

  .lead-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-color);
    font-size: 13px;
    color: var(--text-primary);
  }

  .lead-table tbody tr {
    transition: background 0.15s;
  }

  .lead-table tbody tr:hover {
    background: var(--bg-secondary);
  }

  .lead-table tbody tr:last-child td {
    border-bottom: none;
  }

  /* Lead Cell */
  .lead-cell {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .lead-avatar {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 14px;
    color: #fff;
    flex-shrink: 0;
  }

  .lead-info .lead-name {
    font-weight: 600;
    color: var(--text-primary);
  }

  .lead-info .lead-email {
    font-size: 11px;
    color: var(--text-secondary);
    margin-top: 2px;
  }

  /* Status Badge */
  .sbadge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
  }

  .sdot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
  }

  /* Value Chip */
  .value-chip {
    font-weight: 700;
    color: var(--primary);
  }

  /* Action Buttons */
  .lead-actions {
    display: flex;
    gap: 8px;
  }

  .lead-action-btn {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    border: none;
    font-size: 16px;
    text-decoration: none;
  }

  .action-view {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
  }

  .action-view:hover {
    background: var(--primary);
    color: #fff;
    transform: translateY(-1px);
  }

  .action-edit {
    background: rgba(245, 158, 11, 0.1);
    color: #f59e0b;
  }

  .action-edit:hover {
    background: #f59e0b;
    color: #fff;
    transform: translateY(-1px);
  }

  .action-delete {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
  }

  .action-delete:hover {
    background: #ef4444;
    color: #fff;
    transform: translateY(-1px);
  }

  /* Empty State */
  .lead-empty {
    text-align: center;
    padding: 60px 20px;
  }

  .lead-empty i {
    font-size: 64px;
    color: var(--text-tertiary);
    opacity: 0.5;
    margin-bottom: 16px;
  }

  .lead-empty h4 {
    font-size: 16px;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 8px;
  }

  .lead-empty p {
    font-size: 13px;
    color: var(--text-secondary);
  }

  /* Flash Messages */
  .lead-flash {
    padding: 12px 16px;
    border-radius: 12px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
  }

  .flash-success {
    background: rgba(34, 197, 94, 0.1);
    color: #22c55e;
    border-left: 3px solid #22c55e;
  }

  .flash-error {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border-left: 3px solid #ef4444;
  }

  .flash-success i,
  .flash-error i {
    font-size: 18px;
  }

  /* Responsive */
  @media (max-width: 1024px) {
    .lead-stats {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 768px) {
    .lead-page .page-content {
      padding: 1rem !important;
    }

    .lead-filter-bar {
      flex-direction: column;
      align-items: stretch;
    }

    .lead-filter-actions {
      margin-left: 0;
      justify-content: flex-end;
    }

    .lead-filter-select {
      width: 100%;
    }
  }

  @media (max-width: 640px) {
    .lead-stats {
      grid-template-columns: 1fr;
    }

    .lead-header {
      flex-direction: column;
      align-items: flex-start;
    }
  }
</style>

<div class="page-wrapper lead-page">
  <div class="page-content">

    <!-- Breadcrumb -->
    <div class="lead-breadcrumb">
      <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Dashboard</a>
      <i class='bx bx-chevron-right'></i>
      <span>Lead Management</span>
    </div>

    <!-- Flash Messages -->
    <?php if ($this->session->flashdata('success')): ?>
      <div class="lead-flash flash-success">
        <i class='bx bx-check-circle'></i>
        <?= $this->session->flashdata('success') ?>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="lead-flash flash-error">
        <i class='bx bx-error-circle'></i>
        <?= $this->session->flashdata('error') ?>
      </div>
    <?php endif; ?>

    <!-- Page Header -->
    <div class="lead-header">
      <div>
        <h1>
          <i class='bx bx-line-chart'></i>
          Lead Management
        </h1>
        <p>Track and manage all your sales leads</p>
      </div>
      <div class="lead-header-actions">
        <button class="btn-lead btn-lead-primary" onclick="openAddLeadModal()">
          <i class='bx bx-plus-circle'></i> Add Lead
        </button>
      </div>
    </div>

    <!-- Stat Cards -->
    <div class="lead-stats">
      <div class="lead-stat-card stat-total">
        <div class="lead-stat-left">
          <div class="stat-number"><?= $total_leads ?></div>
          <div class="stat-label">Total Leads</div>
        </div>
        <div class="lead-stat-icon"><i class='bx bx-group'></i></div>
      </div>
      <div class="lead-stat-card stat-progress">
        <div class="lead-stat-left">
          <div class="stat-number"><?= $in_progress_leads ?></div>
          <div class="stat-label">In Progress</div>
        </div>
        <div class="lead-stat-icon"><i class='bx bx-trending-up'></i></div>
      </div>
      <div class="lead-stat-card stat-converted">
        <div class="lead-stat-left">
          <div class="stat-number"><?= $converted_leads ?></div>
          <div class="stat-label">Converted</div>
        </div>
        <div class="lead-stat-icon"><i class='bx bx-check-circle'></i></div>
      </div>
      <div class="lead-stat-card stat-rejected">
        <div class="lead-stat-left">
          <div class="stat-number"><?= $not_interested_leads ?></div>
          <div class="stat-label">Not Interested</div>
        </div>
        <div class="lead-stat-icon"><i class='bx bx-x-circle'></i></div>
      </div>
    </div>

    <!-- Filter Bar -->
    <form method="GET" action="<?= base_url('admin/leads') ?>" id="filterForm">
      <div class="lead-filter-bar">
        <div class="lead-search">
          <i class='bx bx-search'></i>
          <input type="text" name="search" placeholder="Search by name, email, company..."
            value="<?= htmlspecialchars($search ?? '') ?>" oninput="debounceSubmit()">
        </div>
        <select name="status" class="lead-filter-select" onchange="this.form.submit()">
          <option value="">All Status</option>
          <option value="in-progress" <?= ($active_status ?? '') === 'in-progress' ? 'selected' : '' ?>>In Progress</option>
          <option value="converted" <?= ($active_status ?? '') === 'converted' ? 'selected' : '' ?>>Converted</option>
          <option value="not-interested" <?= ($active_status ?? '') === 'not-interested' ? 'selected' : '' ?>>Not Interested</option>
        </select>
        <select name="source" class="lead-filter-select" onchange="this.form.submit()">
          <option value="">All Sources</option>
          <?php foreach (['Website', 'Referral', 'LinkedIn', 'Cold Call', 'Email Campaign', 'Other'] as $src): ?>
            <option value="<?= $src ?>" <?= ($active_source ?? '') === $src ? 'selected' : '' ?>><?= $src ?></option>
          <?php endforeach; ?>
        </select>
        <div class="lead-filter-actions">
          <?php if (($search ?? '') || ($active_status ?? '') || ($active_source ?? '')): ?>
            <a href="<?= base_url('admin/leads') ?>" class="btn-clear">
              <i class='bx bx-x'></i> Clear
            </a>
          <?php endif; ?>
        </div>
      </div>
    </form>

    <!-- Table Card -->
    <div class="lead-table-card">
      <div class="lead-table-header">
        <h3>
          <i class='bx bx-list-ul'></i>
          All Leads
        </h3>
        <span class="lead-table-count"><?= count($leads) ?> records</span>
      </div>

      <?php if (empty($leads)): ?>
        <div class="lead-empty">
          <i class='bx bx-user-x'></i>
          <h4>No leads found</h4>
          <p>Try adjusting your filters or add a new lead.</p>
        </div>
      <?php else: ?>
        <div class="lead-table-wrapper">
          <table class="lead-table">
            <thead>
              <tr>
                <th><i class='bx bx-user'></i> Lead</th>
                <th><i class='bx bx-building'></i> Company</th>
                <th><i class='bx bx-phone'></i> Phone</th>
                <th><i class='bx bx-source'></i> Source</th>
                <th><i class='bx bx-flag'></i> Status</th>
                <th><i class='bx bx-calendar'></i> Date</th>
                <th><i class='bx bx-cog'></i> Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($leads as $lead): ?>
                <tr>
                  <td>
                    <div class="lead-cell">
                      <div class="lead-avatar" style="background:<?= avatar_color($lead['name']) ?>">
                        <?= avatar_initials($lead['name']) ?>
                      </div>
                      <div class="lead-info">
                        <div class="lead-name"><?= htmlspecialchars($lead['name']) ?></div>
                        <div class="lead-email"><?= htmlspecialchars($lead['email'] ?? '') ?></div>
                      </div>
                    </div>
                  </td>
                  <td style="color:var(--text-secondary)"><?= htmlspecialchars($lead['company'] ?? '—') ?></td>
                  <td style="color:var(--text-secondary)"><?= htmlspecialchars($lead['phone'] ?? '—') ?></td>
                  <td style="color:var(--text-secondary)"><?= htmlspecialchars($lead['source'] ?? '—') ?></td>
                  <td><?= status_badge($lead['status']) ?></td>
                  <td style="font-size:12px;color:var(--text-secondary)"><?= date('M j, Y', strtotime($lead['created_at'])) ?></td>
                  <td>
                    <div class="lead-actions">
                      <a href="javascript:;" onclick="viewLead(<?= (int) $lead['id'] ?>)" class="lead-action-btn action-view" title="View">
                        <i class='bx bx-show'></i>
                      </a>
                      <a href="<?= base_url('admin/leads/edit/' . $lead['id']) ?>" class="lead-action-btn action-edit" title="Edit">
                        <i class='bx bx-edit'></i>
                      </a>
                      <button class="lead-action-btn action-delete" onclick="confirmDelete(<?= $lead['id'] ?>)" title="Delete">
                        <i class='bx bx-trash'></i>
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

  </div>
</div>

<!-- Add Lead Modal -->
<div class="modal fade" id="addLeadModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius:20px;background:var(--bg-primary);">
      <form method="post" action="<?= base_url('admin/leads/store') ?>">
        <div class="modal-header" style="border-bottom-color:var(--border-color);padding:20px 24px;">
          <h5 class="modal-title" style="color:var(--text-primary);font-weight:700;">
            <i class='bx bx-user-plus' style="color:var(--primary);margin-right:8px;"></i>
            Add New Lead
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body" style="padding:24px;">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-secondary);">
                <i class='bx bx-user'></i> Full Name <span style="color:#ef4444;">*</span>
              </label>
              <input type="text" name="name" class="form-control" required style="border-radius:12px;border:2px solid var(--border-color);background:var(--bg-secondary);color:var(--text-primary);">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-secondary);">
                <i class='bx bx-envelope'></i> Email
              </label>
              <input type="email" name="email" class="form-control" style="border-radius:12px;border:2px solid var(--border-color);background:var(--bg-secondary);color:var(--text-primary);">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-secondary);">
                <i class='bx bx-phone'></i> Phone
              </label>
              <input type="text" name="phone" class="form-control" style="border-radius:12px;border:2px solid var(--border-color);background:var(--bg-secondary);color:var(--text-primary);">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-secondary);">
                <i class='bx bx-building'></i> Company
              </label>
              <input type="text" name="company" class="form-control" style="border-radius:12px;border:2px solid var(--border-color);background:var(--bg-secondary);color:var(--text-primary);">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-secondary);">
                <i class='bx bx-source'></i> Source
              </label>
              <select name="source" class="form-select" style="border-radius:12px;border:2px solid var(--border-color);background:var(--bg-secondary);color:var(--text-primary);">
                <option value="">Select Source</option>
                <option value="Website">Website</option>
                <option value="Referral">Referral</option>
                <option value="LinkedIn">LinkedIn</option>
                <option value="Cold Call">Cold Call</option>
                <option value="Email Campaign">Email Campaign</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-secondary);">
                <i class='bx bx-flag'></i> Status <span style="color:#ef4444;">*</span>
              </label>
              <select name="status" class="form-select" required style="border-radius:12px;border:2px solid var(--border-color);background:var(--bg-secondary);color:var(--text-primary);">
                <option value="in-progress">In Progress</option>
                <option value="converted">Converted</option>
                <option value="not-interested">Not Interested</option>
              </select>
            </div>

            <div class="col-12">
              <label class="form-label" style="font-size:12px;font-weight:600;color:var(--text-secondary);">
                <i class='bx bx-note'></i> Notes
              </label>
              <textarea name="notes" rows="3" class="form-control" placeholder="Add any additional notes..." style="border-radius:12px;border:2px solid var(--border-color);background:var(--bg-secondary);color:var(--text-primary);"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer" style="border-top-color:var(--border-color);padding:16px 24px;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:12px;">Cancel</button>
          <button type="submit" class="btn" style="background:linear-gradient(135deg,var(--primary),var(--secondary));color:#fff;border-radius:12px;padding:8px 24px;">
            <i class='bx bx-plus-circle'></i> Add Lead
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- View Lead Modal -->
<div class="modal fade" id="viewLeadModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius:20px;background:var(--bg-primary);">
      <div class="modal-header" style="border-bottom-color:var(--border-color);padding:20px 24px;">
        <h5 class="modal-title" style="color:var(--text-primary);font-weight:700;">
          <i class='bx bx-show' style="color:var(--primary);margin-right:8px;"></i>
          Lead Details
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" style="padding:24px;color:var(--text-primary);">
        <div class="row g-3">
          <div class="col-md-6">
            <div style="font-size:11px;font-weight:600;color:var(--text-secondary);text-transform:uppercase;"><i class='bx bx-user'></i> Full Name</div>
            <div id="v_name" style="font-size:15px;font-weight:600;margin-top:4px;"></div>
          </div>
          <div class="col-md-6">
            <div style="font-size:11px;font-weight:600;color:var(--text-secondary);text-transform:uppercase;"><i class='bx bx-envelope'></i> Email</div>
            <div id="v_email" style="font-size:15px;margin-top:4px;"></div>
          </div>
          <div class="col-md-6">
            <div style="font-size:11px;font-weight:600;color:var(--text-secondary);text-transform:uppercase;"><i class='bx bx-phone'></i> Phone</div>
            <div id="v_phone" style="font-size:15px;margin-top:4px;"></div>
          </div>
          <div class="col-md-6">
            <div style="font-size:11px;font-weight:600;color:var(--text-secondary);text-transform:uppercase;"><i class='bx bx-building'></i> Company</div>
            <div id="v_company" style="font-size:15px;margin-top:4px;"></div>
          </div>
          <div class="col-md-6">
            <div style="font-size:11px;font-weight:600;color:var(--text-secondary);text-transform:uppercase;"><i class='bx bx-source'></i> Source</div>
            <div id="v_source" style="font-size:15px;margin-top:4px;"></div>
          </div>
          <div class="col-md-6">
            <div style="font-size:11px;font-weight:600;color:var(--text-secondary);text-transform:uppercase;"><i class='bx bx-flag'></i> Status</div>
            <div id="v_status" style="margin-top:4px;"></div>
          </div>
          <div class="col-12">
            <div style="font-size:11px;font-weight:600;color:var(--text-secondary);text-transform:uppercase;"><i class='bx bx-note'></i> Notes</div>
            <div id="v_notes" style="font-size:14px;background:var(--bg-secondary);padding:12px;border-radius:12px;border:1px solid var(--border-color);margin-top:4px;min-height:80px;white-space:pre-wrap;"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="border-top-color:var(--border-color);padding:16px 24px;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:12px;">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  const BASE = '<?= base_url() ?>';
  let debounceTimer;

  function debounceSubmit() {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
      document.getElementById('filterForm').submit();
    }, 500);
  }

  function openAddLeadModal() {
    new bootstrap.Modal(document.getElementById('addLeadModal')).show();
  }

  function viewLead(id) {
    fetch(BASE + 'admin/leads/view/' + id)
      .then(res => res.json())
      .then(data => {
        document.getElementById('v_name').textContent = data.name || '—';
        document.getElementById('v_email').textContent = data.email || '—';
        document.getElementById('v_phone').textContent = data.phone || '—';
        document.getElementById('v_company').textContent = data.company || '—';
        document.getElementById('v_source').textContent = data.source || '—';
        
        let badgeHtml = '';
        if (data.status === 'in-progress') {
          badgeHtml = '<span class="sbadge" style="background:rgba(99,102,241,.12);color:#6366f1"><span class="sdot" style="background:#6366f1"></span>In Progress</span>';
        } else if (data.status === 'converted') {
          badgeHtml = '<span class="sbadge" style="background:rgba(34,197,94,.12);color:#22c55e"><span class="sdot" style="background:#22c55e"></span>Converted</span>';
        } else if (data.status === 'not-interested') {
          badgeHtml = '<span class="sbadge" style="background:rgba(239,68,68,.12);color:#ef4444"><span class="sdot" style="background:#ef4444"></span>Not Interested</span>';
        } else {
          badgeHtml = `<span class="sbadge" style="background:rgba(148,163,184,.12);color:#64748b"><span class="sdot" style="background:#94a3b8"></span>${data.status || '—'}</span>`;
        }
        document.getElementById('v_status').innerHTML = badgeHtml;
        document.getElementById('v_notes').textContent = data.notes || 'No notes added.';
        
        new bootstrap.Modal(document.getElementById('viewLeadModal')).show();
      })
      .catch(err => {
        console.error('Error fetching lead details:', err);
        alert('Failed to load lead details.');
      });
  }

  function confirmDelete(id) {
    if (confirm('Are you sure you want to delete this lead? This action cannot be undone.')) {
      window.location.href = BASE + 'admin/leads/delete/' + id;
    }
  }

  // Auto-hide flash messages
  setTimeout(() => {
    document.querySelectorAll('.lead-flash').forEach(el => {
      el.style.transition = 'opacity 0.5s';
      el.style.opacity = '0';
      setTimeout(() => el.remove(), 500);
    });
  }, 5000);
</script>