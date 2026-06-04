<!-- Boxicons CSS -->
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<style>
  .salary-page {
    --primary: #6366f1;
    --primary-dark: #4f46e5;
    --secondary: #8b5cf6;
    --success: #22c55e;
    --danger: #ef4444;
    --warning: #f59e0b;
    --info: #0ea5e9;
  }

  .salary-page .page-content {
    padding: 1.25rem 1.5rem !important;
    max-width: 100% !important;
  }

  /* Breadcrumb */
  .salary-breadcrumb {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    border-radius: 14px;
    padding: 12px 20px;
    margin-bottom: 24px;
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
  }

  .salary-breadcrumb a,
  .salary-breadcrumb span {
    color: rgba(255, 255, 255, 0.8);
    font-size: 12px;
    text-decoration: none;
  }

  .salary-breadcrumb a:hover {
    color: #fff;
  }

  .salary-breadcrumb i {
    font-size: 12px;
    margin: 0 4px;
    vertical-align: middle;
  }

  /* Page Header */
  .salary-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--border-color);
  }

  .salary-header h1 {
    font-size: 20px;
    font-weight: 700;
    color: var(--text-primary);
    margin: 0 0 4px 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .salary-header h1 i {
    color: var(--primary);
    font-size: 24px;
  }

  .salary-header p {
    font-size: 13px;
    color: var(--text-secondary);
    margin: 0;
  }

  .salary-header-actions {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  /* Buttons */
  .btn-salary {
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

  .btn-salary-primary {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
  }

  .btn-salary-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
    color: #fff;
  }

  /* Stat Cards */
  .salary-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 24px;
  }

  .salary-stat-card {
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

  .salary-stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px var(--shadow-lg);
  }

  .salary-stat-left .stat-number {
    font-size: 28px;
    font-weight: 800;
    line-height: 1.2;
  }

  .salary-stat-left .stat-label {
    font-size: 11px;
    color: var(--text-secondary);
    margin-top: 4px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .salary-stat-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
  }

  .stat-devs .salary-stat-icon {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
  }

  .stat-devs .stat-number {
    color: var(--primary);
  }

  .stat-paid .salary-stat-icon {
    background: rgba(34, 197, 94, 0.1);
    color: var(--success);
  }

  .stat-paid .stat-number {
    color: var(--success);
  }

  .stat-month .salary-stat-icon {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
  }

  .stat-month .stat-number {
    color: var(--warning);
  }

  .stat-pending .salary-stat-icon {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
  }

  .stat-pending .stat-number {
    color: var(--danger);
  }

  /* Filters & Month Selector */
  .salary-filter-bar {
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 14px 20px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
  }

  .salary-month-picker {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .salary-month-picker label {
    font-size: 12px;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
  }

  .salary-month-picker input {
    padding: 8px 12px;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-size: 13px;
    background: var(--bg-secondary);
    color: var(--text-primary);
    outline: none;
    cursor: pointer;
  }

  .salary-month-picker input:focus {
    border-color: var(--primary);
  }

  /* Tabs */
  .salary-tabs-card {
    background: var(--bg-primary);
    border-radius: 20px;
    box-shadow: 0 4px 20px var(--shadow);
    border: 1px solid var(--border-color);
    overflow: hidden;
  }

  .salary-tabs-header {
    background: var(--bg-secondary);
    padding: 10px 20px 0 20px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
  }

  .salary-nav-tabs {
    border-bottom: none !important;
    display: flex;
    gap: 8px;
  }

  .salary-nav-tabs .nav-link {
    border: none !important;
    padding: 12px 20px;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-secondary) !important;
    background: transparent !important;
    border-radius: 12px 12px 0 0 !important;
    position: relative;
    cursor: pointer;
  }

  .salary-nav-tabs .nav-link.active {
    color: var(--primary) !important;
    background: var(--bg-primary) !important;
    border: 1px solid var(--border-color) !important;
    border-bottom: 1px solid var(--bg-primary) !important;
  }

  /* Table Wrapper */
  .salary-table-wrapper {
    overflow-x: auto;
  }

  .salary-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;
  }

  .salary-table th {
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

  .salary-table th i {
    font-size: 12px;
    margin-right: 6px;
    vertical-align: middle;
  }

  .salary-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-color);
    font-size: 13px;
    color: var(--text-primary);
  }

  .salary-table tbody tr {
    transition: background 0.15s;
  }

  .salary-table tbody tr:hover {
    background: var(--bg-secondary);
  }

  .salary-table tbody tr:last-child td {
    border-bottom: none;
  }

  /* Developer Cell */
  .dev-cell {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .dev-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
  }

  .dev-info .dev-name {
    font-weight: 600;
    color: var(--text-primary);
  }

  .dev-info .dev-email {
    font-size: 11px;
    color: var(--text-secondary);
    margin-top: 2px;
  }

  /* Badges & Chips */
  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
  }

  .status-paid {
    background: rgba(34, 197, 94, 0.12);
    color: #22c55e;
  }

  .status-pending {
    background: rgba(239, 68, 68, 0.12);
    color: #ef4444;
  }

  .status-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: currentColor;
  }

  .days-chip {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 3px 8px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 600;
  }

  .days-present {
    background: rgba(34, 197, 94, 0.08);
    color: #22c55e;
  }

  .days-absent {
    background: rgba(239, 68, 68, 0.08);
    color: #ef4444;
  }

  /* Actions Buttons */
  .salary-actions {
    display: flex;
    gap: 8px;
  }

  .salary-action-btn {
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

  .action-pay {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
  }

  .action-pay:hover {
    background: var(--primary);
    color: #fff;
    transform: translateY(-1px);
  }

  .action-edit {
    background: rgba(14, 165, 233, 0.1);
    color: var(--info);
  }

  .action-edit:hover {
    background: var(--info);
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

  .action-view {
    background: rgba(99, 102, 241, 0.1);
    color: var(--primary);
  }

  .action-view:hover {
    background: var(--primary);
    color: #fff;
    transform: translateY(-1px);
  }

  /* Detailed View Modal Styles */
  .modal-view-header-profile {
    display: flex;
    align-items: center;
    gap: 16px;
    padding-bottom: 20px;
    border-bottom: 1.5px solid var(--border-color);
    margin-bottom: 20px;
  }

  .modal-view-avatar {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid rgba(99, 102, 241, 0.2);
  }

  .modal-view-name {
    font-size: 18px;
    font-weight: 700;
    color: var(--text-primary);
  }

  .modal-view-designation {
    font-size: 12px;
    color: var(--text-secondary);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .detail-section-title {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--primary);
    margin-top: 20px;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .detail-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px 20px;
  }

  .detail-item-label {
    font-size: 11px;
    font-weight: 600;
    color: var(--text-secondary);
    text-transform: uppercase;
    margin-bottom: 3px;
  }

  .detail-item-val {
    font-size: 13px;
    font-weight: 600;
    color: var(--text-primary);
  }

  /* Modal Tabs */
  .modal-nav-tabs {
    border-bottom: 1.5px solid var(--border-color) !important;
    gap: 4px;
    margin-bottom: 20px;
  }

  .modal-nav-tabs .nav-link {
    border: none !important;
    padding: 10px 16px;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-secondary) !important;
    background: transparent !important;
    border-radius: 8px 8px 0 0 !important;
    position: relative;
  }

  .modal-nav-tabs .nav-link.active {
    color: var(--primary) !important;
    border-bottom: 3px solid var(--primary) !important;
  }


  /* Empty State */
  .salary-empty {
    text-align: center;
    padding: 60px 20px;
  }

  .salary-empty i {
    font-size: 50px;
    color: var(--text-tertiary);
    opacity: 0.5;
    margin-bottom: 16px;
  }

  .salary-empty h4 {
    font-size: 15px;
    font-weight: 600;
    color: var(--text-primary);
    margin-bottom: 6px;
  }

  .salary-empty p {
    font-size: 12px;
    color: var(--text-secondary);
  }

  /* Flash Alert */
  .salary-flash {
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

  /* ── Salary Explainer ── */
  .salary-calc-explainer {
    background: var(--bg-secondary);
    border: 1.5px solid var(--border-color);
    border-radius: 14px;
    margin-bottom: 20px;
    overflow: hidden;
  }

  .sce-header {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 16px;
    font-size: 12px;
    font-weight: 700;
    color: var(--primary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .sce-header i {
    font-size: 16px;
  }

  .sce-toggle-btn {
    margin-left: auto;
    background: rgba(99, 102, 241, 0.1);
    border: none;
    border-radius: 8px;
    color: var(--primary);
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;
    transition: background 0.2s;
  }

  .sce-toggle-btn:hover {
    background: rgba(99, 102, 241, 0.2);
  }

  .sce-body {
    padding: 4px 16px 16px;
  }

  .sce-formula-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 12px;
  }

  .sce-formula-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
    border-radius: 10px;
    padding: 10px 12px;
  }

  .sce-fi-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
  }

  .sce-fi-label {
    font-size: 11px;
    font-weight: 700;
    color: var(--text-primary);
    text-transform: uppercase;
    letter-spacing: 0.4px;
  }

  .sce-fi-desc {
    font-size: 11px;
    color: var(--text-secondary);
    margin-top: 2px;
    line-height: 1.4;
  }

  .sce-note {
    background: rgba(245, 158, 11, 0.08);
    border: 1px solid rgba(245, 158, 11, 0.2);
    border-radius: 10px;
    padding: 10px 14px;
    font-size: 11px;
    color: var(--text-secondary);
    display: flex;
    gap: 8px;
    align-items: flex-start;
  }

  .sce-note i {
    color: var(--warning);
    font-size: 16px;
    flex-shrink: 0;
    margin-top: 1px;
  }

  /* ── Status Banner ── */
  .vd-status-banner {
    background: var(--bg-secondary);
    border: 1.5px solid var(--border-color);
    border-radius: 14px;
    padding: 14px 18px;
    display: flex;
    align-items: flex-start;
    gap: 16px;
    flex-wrap: wrap;
    margin-bottom: 16px;
  }

  .vsb-left {
    display: flex;
    align-items: center;
  }

  .vsb-right {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    margin-left: auto;
  }

  .vsb-status-wrap {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .vsb-status-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
  }

  .vsb-paid {
    background: rgba(34, 197, 94, 0.15);
    color: #22c55e;
  }

  .vsb-pending {
    background: rgba(239, 68, 68, 0.15);
    color: #ef4444;
  }

  .vsb-label {
    font-size: 10px;
    font-weight: 700;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .vsb-val {
    font-size: 14px;
    font-weight: 700;
    color: var(--text-primary);
    margin-top: 2px;
  }

  .vsb-notes {
    font-size: 12px;
    font-style: italic;
    font-weight: 400;
    color: var(--text-secondary);
  }

  .vsb-meta-item {
    min-width: 80px;
  }

  /* ── Salary Breakdown Cards ── */
  .vd-salary-breakdown {
    background: var(--bg-secondary);
    border: 1.5px solid var(--border-color);
    border-radius: 16px;
    padding: 16px 18px;
    margin-bottom: 8px;
  }

  .vsb-cards-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 4px;
    flex-wrap: wrap;
  }

  .vsb-card {
    flex: 1;
    min-width: 80px;
    background: var(--bg-primary);
    border: 1.5px solid var(--border-color);
    border-radius: 12px;
    padding: 10px 8px;
    text-align: center;
    transition: transform 0.2s;
  }

  .vsb-card:hover {
    transform: translateY(-2px);
  }

  .vsbc-icon {
    font-size: 18px;
    margin-bottom: 4px;
  }

  .vsbc-val {
    font-size: 15px;
    font-weight: 800;
    line-height: 1.2;
  }

  .vsbc-lbl {
    font-size: 9px;
    font-weight: 700;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.4px;
    margin-top: 3px;
  }

  .vsb-card-primary .vsbc-icon {
    color: var(--primary);
  }

  .vsb-card-primary .vsbc-val {
    color: var(--primary);
  }

  .vsb-card-info .vsbc-icon {
    color: var(--info);
  }

  .vsb-card-info .vsbc-val {
    color: var(--info);
  }

  .vsb-card-warning .vsbc-icon {
    color: var(--warning);
  }

  .vsb-card-warning .vsbc-val {
    color: var(--warning);
  }

  .vsb-card-danger .vsbc-icon {
    color: var(--danger);
  }

  .vsb-card-danger .vsbc-val {
    color: var(--danger);
  }

  .vsb-card-success .vsbc-icon {
    color: var(--success);
  }

  .vsb-card-success .vsbc-val {
    color: var(--success);
  }

  .vsb-arrow {
    font-size: 20px;
    color: var(--text-secondary);
    flex-shrink: 0;
  }

  .vsb-arrow-danger {
    color: var(--danger);
  }

  .vsb-formula-line {
    text-align: center;
    font-size: 11px;
    font-weight: 600;
    padding: 4px 0 12px;
    border-bottom: 1px dashed var(--border-color);
    margin-bottom: 12px;
  }

  .vsb-result-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: rgba(34, 197, 94, 0.06);
    border: 1.5px solid rgba(34, 197, 94, 0.2);
    border-radius: 12px;
    padding: 12px 16px;
    margin-top: 12px;
    flex-wrap: wrap;
    gap: 8px;
  }

  .vsb-result-formula {
    font-size: 13px;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 2px;
  }

  .vsb-result-net {
    text-align: right;
  }

  .vsb-result-net-label {
    font-size: 10px;
    font-weight: 700;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .vsb-result-net-val {
    font-size: 22px;
    font-weight: 900;
    color: var(--success);
    line-height: 1.1;
  }

  .vsb-paid-row {
    margin-top: 10px;
    background: rgba(34, 197, 94, 0.08);
    border: 1px solid rgba(34, 197, 94, 0.2);
    border-radius: 10px;
    padding: 8px 14px;
    font-size: 12px;
    font-weight: 600;
    color: var(--text-secondary);
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .vsb-paid-row i {
    color: var(--success);
    font-size: 16px;
  }

  .vsb-paid-row strong {
    color: var(--success);
    font-size: 14px;
  }

  /* Dynamic Preview Card inside Modal */
  .stats-preview-card {
    background: var(--bg-secondary);
    border: 1.5px solid var(--border-color);
    border-radius: 14px;
    padding: 14px 18px;
    margin-bottom: 16px;
    display: none;
    /* Shown dynamically via JS */
  }

  .stats-preview-title {
    font-size: 11px;
    font-weight: 700;
    color: var(--text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 10px;
  }

  .stats-preview-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 12px;
  }

  .stats-preview-item {
    text-align: center;
  }

  .stats-preview-val {
    font-size: 16px;
    font-weight: 700;
    color: var(--text-primary);
  }

  .stats-preview-lbl {
    font-size: 10px;
    color: var(--text-secondary);
    margin-top: 2px;
  }
</style>

<div class="page-wrapper salary-page">
  <div class="page-content">

    <!-- Breadcrumb -->
    <div class="salary-breadcrumb">
      <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Dashboard</a>
      <i class='bx bx-chevron-right'></i>
      <span>Salary Management</span>
    </div>

    <!-- Flash Alerts -->
    <?php if ($this->session->flashdata('success')): ?>
      <div class="salary-flash flash-success">
        <i class='bx bx-check-circle'></i>
        <?= $this->session->flashdata('success') ?>
      </div>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')): ?>
      <div class="salary-flash flash-error">
        <i class='bx bx-error-circle'></i>
        <?= $this->session->flashdata('error') ?>
      </div>
    <?php endif; ?>

    <!-- Page Header -->
    <div class="salary-header">
      <div>
        <h1>
          <i class='bx bx-wallet'></i>
          Salary Management
        </h1>
        <p>Manage developer salaries and monthly payments</p>
      </div>
      <div class="salary-header-actions">
        <button class="btn-salary btn-salary-primary" onclick="openAddPaymentModal()">
          <i class='bx bx-plus-circle'></i> Add Salary Payment
        </button>
      </div>
    </div>

    <!-- Month Filter Bar -->
    <div class="salary-filter-bar">
      <form method="GET" action="<?= base_url('admin/salaries') ?>" id="monthFilterForm">
        <div class="salary-month-picker">
          <label for="monthInput">For Month:</label>
          <input type="month" name="month" id="monthInput" value="<?= $selected_month ?>" onchange="this.form.submit()">
        </div>
      </form>
      <div style="font-size: 13px; font-weight: 600; color: var(--text-secondary);">
        Active Filter: <span style="color: var(--primary);"><?= date('F, Y', strtotime($selected_month . '-01')) ?></span>
      </div>
    </div>

    <!-- Statistics Cards -->
    <div class="salary-stats">
      <div class="salary-stat-card stat-devs">
        <div class="salary-stat-left">
          <div class="stat-number"><?= $stats['total_devs'] ?></div>
          <div class="stat-label">Total Developers</div>
        </div>
        <div class="salary-stat-icon"><i class='bx bx-group'></i></div>
      </div>
      <div class="salary-stat-card stat-paid">
        <div class="salary-stat-left">
          <div class="stat-number">₹<?= number_format($stats['total_paid'], 2) ?></div>
          <div class="stat-label">Total Salary Paid</div>
        </div>
        <div class="salary-stat-icon"><i class='bx bx-badge-check'></i></div>
      </div>
      <div class="salary-stat-card stat-month">
        <div class="salary-stat-left">
          <div class="stat-number">₹<?= number_format($stats['monthly_paid'], 2) ?></div>
          <div class="stat-label">Monthly Salary</div>
        </div>
        <div class="salary-stat-icon"><i class='bx bx-calendar'></i></div>
      </div>
      <div class="salary-stat-card stat-pending">
        <div class="salary-stat-left">
          <div class="stat-number"><?= $stats['pending_count'] ?></div>
          <div class="stat-label">Pending Salaries</div>
        </div>
        <div class="salary-stat-icon"><i class='bx bx-time-five'></i></div>
      </div>
    </div>

    <!-- Tabbed Content Section -->
    <div class="salary-tabs-card">
      <div class="salary-tabs-header">
        <ul class="nav nav-tabs salary-nav-tabs" id="salaryTabs" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="devs-tab" data-bs-toggle="tab" data-bs-target="#devs" type="button" role="tab" aria-controls="devs" aria-selected="true">
              <i class='bx bx-list-ul' style="margin-right:6px;"></i>Developer List
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="logs-tab" data-bs-toggle="tab" data-bs-target="#logs" type="button" role="tab" aria-controls="logs" aria-selected="false">
              <i class='bx bx-history' style="margin-right:6px;"></i>Payment History
            </button>
          </li>
        </ul>
        <span style="font-size:12px; color:var(--text-secondary); font-weight:600; padding-bottom:8px;">
          <?= date('F, Y', strtotime($selected_month . '-01')) ?> overview
        </span>
      </div>

      <div class="tab-content" id="salaryTabsContent">
        <!-- Tab 1: Developer Overview -->
        <div class="tab-pane fade show active" id="devs" role="tabpanel" aria-labelledby="devs-tab">
          <?php if (empty($developers)): ?>
            <div class="salary-empty">
              <i class='bx bx-user-x'></i>
              <h4>No developers found</h4>
              <p>Add employees with the Developer role to see them here.</p>
            </div>
          <?php else: ?>
            <div class="salary-table-wrapper">
              <table class="salary-table">
                <thead>
                  <tr>
                    <th><i class='bx bx-user'></i> Developer</th>
                    <th><i class='bx bx-money'></i> Monthly Salary</th>
                    <th><i class='bx bx-calendar-check'></i> Present / Absent</th>
                    <th><i class='bx bx-line-chart'></i> Total Paid</th>
                    <th><i class='bx bx-time'></i> Last Payment</th>
                    <th><i class='bx bx-flag'></i> Status</th>
                    <th><i class='bx bx-cog'></i> Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($developers as $dev): ?>
                    <tr>
                      <td>
                        <div class="dev-cell">
                          <img src="<?= (!empty($dev['photo']) && file_exists(FCPATH . 'uploads/profile/' . $dev['photo']))
                                      ? base_url('uploads/profile/' . $dev['photo'])
                                      : base_url('assets/default.jpg') ?>"
                            class="dev-avatar" alt="Avatar">
                          <div class="dev-info">
                            <div class="dev-name"><?= htmlspecialchars($dev['name']) ?></div>
                            <div class="dev-email"><?= htmlspecialchars($dev['email'] ?? '—') ?></div>
                          </div>
                        </div>
                      </td>
                      <td style="font-weight:600;">
                        ₹<?= number_format($dev['monthly_salary'], 2) ?>
                        <span style="cursor: pointer; margin-left: 6px; color: var(--primary);"
                          title="Edit Base Salary"
                          onclick="openEditBaseSalary(<?= $dev['id'] ?>, '<?= htmlspecialchars($dev['name']) ?>', <?= $dev['monthly_salary'] ?>)">
                          <i class='bx bx-edit-alt'></i>
                        </span>
                      </td>
                      <td>
                        <span class="days-chip days-present">
                          <i class='bx bx-check'></i> <?= $dev['present_days'] ?> Present
                        </span>
                        <span class="days-chip days-absent ms-2">
                          <i class='bx bx-x'></i> <?= $dev['absent_days'] ?> Absent
                        </span>
                      </td>
                      <td style="color:var(--text-secondary)">₹<?= number_format($dev['total_paid'], 2) ?></td>
                      <td style="color:var(--text-secondary)">
                        <?= $dev['last_payment_date'] ? date('M j, Y', strtotime($dev['last_payment_date'])) : '—' ?>
                      </td>
                      <td>
                        <?php if ($dev['payment_status'] === 'Paid'): ?>
                          <span class="status-badge status-paid"><span class="status-dot"></span>Paid</span>
                        <?php else: ?>
                          <span class="status-badge status-pending"><span class="status-dot"></span>Pending</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <div class="salary-actions">
                          <button class="salary-action-btn action-view" title="View Details"
                            onclick="openViewSalaryDetails(<?= $dev['id'] ?>, '<?= $selected_month ?>')">
                            <i class='bx bx-show'></i>
                          </button>
                          <button class="salary-action-btn action-pay" title="Record Payment"
                            onclick="openQuickPay(<?= $dev['id'] ?>, '<?= htmlspecialchars($dev['name']) ?>', <?= $dev['monthly_salary'] ?>)">
                            <i class='bx bx-credit-card'></i>
                          </button>
                          <button class="salary-action-btn action-edit" title="Edit Base Salary"
                            onclick="openEditBaseSalary(<?= $dev['id'] ?>, '<?= htmlspecialchars($dev['name']) ?>', <?= $dev['monthly_salary'] ?>)">
                            <i class='bx bx-edit-alt'></i>
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

        <!-- Tab 2: Payment Logs / History -->
        <div class="tab-pane fade" id="logs" role="tabpanel" aria-labelledby="logs-tab">
          <?php if (empty($history)): ?>
            <div class="salary-empty">
              <i class='bx bx-history'></i>
              <h4>No salary payment logs found</h4>
              <p>Record a payment using the buttons above to populate this log.</p>
            </div>
          <?php else: ?>
            <div class="salary-table-wrapper">
              <table class="salary-table">
                <thead>
                  <tr>
                    <th><i class='bx bx-user'></i> Developer</th>
                    <th><i class='bx bx-money'></i> Amount Paid</th>
                    <th><i class='bx bx-calendar'></i> For Month</th>
                    <th><i class='bx bx-calendar-event'></i> Payment Date</th>
                    <th><i class='bx bx-wallet'></i> Mode</th>
                    <th><i class='bx bx-note'></i> Notes</th>
                    <th><i class='bx bx-cog'></i> Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($history as $h): ?>
                    <tr>
                      <td>
                        <div class="dev-cell">
                          <img src="<?= (!empty($h['developer_photo']) && file_exists(FCPATH . 'uploads/profile/' . $h['developer_photo']))
                                      ? base_url('uploads/profile/' . $h['developer_photo'])
                                      : base_url('assets/default.jpg') ?>"
                            class="dev-avatar" alt="Avatar">
                          <div class="dev-info">
                            <div class="dev-name"><?= htmlspecialchars($h['developer_name']) ?></div>
                            <div class="dev-email"><?= htmlspecialchars($h['developer_email'] ?? '—') ?></div>
                          </div>
                        </div>
                      </td>
                      <td style="font-weight:700; color:var(--success)">₹<?= number_format($h['amount'], 2) ?></td>
                      <td style="font-weight:600; color:var(--primary)">
                        <?= date('F, Y', strtotime($h['month_year'] . '-01')) ?>
                      </td>
                      <td style="color:var(--text-secondary)"><?= date('M j, Y', strtotime($h['payment_date'])) ?></td>
                      <td>
                        <span class="badge bg-light text-dark border" style="font-weight: 600; padding: 4px 10px; border-radius: 8px;">
                          <?= htmlspecialchars($h['payment_mode']) ?>
                        </span>
                      </td>
                      <td style="color:var(--text-secondary); max-width:200px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;" title="<?= htmlspecialchars($h['notes'] ?? '') ?>">
                        <?= htmlspecialchars($h['notes'] ?? '—') ?>
                      </td>
                      <td>
                        <div class="salary-actions">
                          <a href="<?= base_url('admin/salaries/delete/' . $h['id']) ?>"
                            class="salary-action-btn action-delete"
                            onclick="return confirmSweetAction(this, 'Are you sure you want to delete this payment log? This cannot be undone.')"
                            title="Delete Payment Log">
                            <i class='bx bx-trash'></i>
                          </a>
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

  </div>
</div>

<!-- Add Salary Payment Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:20px; background:var(--bg-primary);">
      <form method="post" action="<?= base_url('admin/salaries/store') ?>" id="addPaymentForm">

        <div class="modal-header" style="border-bottom-color:var(--border-color); padding:20px 24px;">
          <h5 class="modal-title" style="color:var(--text-primary); font-weight:700;">
            <i class='bx bx-plus-circle' style="color:var(--primary); margin-right:8px;"></i>
            Add Salary Payment
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body" style="padding:24px;">

          <!-- Developer Selection -->
          <div class="mb-3">
            <label class="form-label" style="font-size:12px; font-weight:600; color:var(--text-secondary);">
              Developer *
            </label>
            <select name="user_id" id="modal_user_id" class="form-select" required style="border-radius:12px; border:2px solid var(--border-color); background:var(--bg-secondary); color:var(--text-primary);" onchange="fetchDeveloperStats()">
              <option value="">Select Developer</option>
              <?php foreach ($active_devs as $dev): ?>
                <option value="<?= $dev['id'] ?>"><?= htmlspecialchars($dev['name']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- Dynamic Statistics Preview Card -->
          <div class="stats-preview-card" id="modal_stats_preview">
            <div class="stats-preview-title">Monthly Summary Preview</div>
            <div class="stats-preview-grid" style="grid-template-columns: repeat(3, 1fr);">
              <div class="stats-preview-item">
                <div class="stats-preview-val" id="preview_base_salary">₹0.00</div>
                <div class="stats-preview-lbl">Base Salary</div>
              </div>
              <div class="stats-preview-item">
                <div class="stats-preview-val" id="preview_working_days" style="color:var(--primary);">0</div>
                <div class="stats-preview-lbl">Working Days</div>
              </div>
              <div class="stats-preview-item">
                <div class="stats-preview-val" id="preview_absent_days" style="color:var(--danger);">0</div>
                <div class="stats-preview-lbl">Absent Days</div>
              </div>
            </div>
            <!-- Salary breakdown row -->
            <div style="margin-top:12px; padding-top:12px; border-top:1px dashed var(--border-color);">
              <div class="stats-preview-grid" style="grid-template-columns: repeat(3, 1fr);">
                <div class="stats-preview-item">
                  <div class="stats-preview-val" id="preview_daily_rate" style="color:var(--text-secondary); font-size:13px;">₹0.00</div>
                  <div class="stats-preview-lbl">Daily Rate</div>
                </div>
                <div class="stats-preview-item">
                  <div class="stats-preview-val" id="preview_deduction" style="color:var(--danger); font-size:13px;">₹0.00</div>
                  <div class="stats-preview-lbl">Deduction</div>
                </div>
                <div class="stats-preview-item">
                  <div class="stats-preview-val" id="preview_net_payable" style="color:var(--success);">₹0.00</div>
                  <div class="stats-preview-lbl">Net Payable</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Month Selector -->
          <div class="mb-3">
            <label class="form-label" style="font-size:12px; font-weight:600; color:var(--text-secondary);">
              For Month *
            </label>
            <input type="month" name="month_year" id="modal_month_year" class="form-control" required
              style="border-radius:12px; border:2px solid var(--border-color); background:var(--bg-secondary); color:var(--text-primary);"
              value="<?= $selected_month ?>" onchange="fetchDeveloperStats()">
          </div>

          <!-- Amount Paid -->
          <div class="mb-3">
            <label class="form-label" style="font-size:12px; font-weight:600; color:var(--text-secondary);">
              Amount Paid *
            </label>
            <input type="number" name="amount" id="modal_amount" class="form-control" required min="0" step="0.01"
              style="border-radius:12px; border:2px solid var(--border-color); background:var(--bg-secondary); color:var(--text-primary);"
              placeholder="Enter paid amount">
          </div>

          <!-- Payment Date -->
          <div class="mb-3">
            <label class="form-label" style="font-size:12px; font-weight:600; color:var(--text-secondary);">
              Payment Date *
            </label>
            <input type="date" name="payment_date" id="modal_payment_date" class="form-control" required
              style="border-radius:12px; border:2px solid var(--border-color); background:var(--bg-secondary); color:var(--text-primary);"
              value="<?= date('Y-m-d') ?>">
          </div>

          <!-- Payment Mode -->
          <div class="mb-3">
            <label class="form-label" style="font-size:12px; font-weight:600; color:var(--text-secondary);">
              Payment Mode *
            </label>
            <select name="payment_mode" class="form-select" required
              style="border-radius:12px; border:2px solid var(--border-color); background:var(--bg-secondary); color:var(--text-primary);">
              <option value="">Select Mode</option>
              <option value="Bank Transfer">Bank Transfer</option>
              <option value="Cash">Cash</option>
              <option value="Cheque">Cheque</option>
              <option value="UPI">UPI</option>
            </select>
          </div>

          <!-- Notes -->
          <div class="mb-3">
            <label class="form-label" style="font-size:12px; font-weight:600; color:var(--text-secondary);">
              Notes
            </label>
            <textarea name="notes" rows="3" class="form-control" placeholder="Add payment notes, e.g. 'Bonus included' or 'Deductions for absences'..."
              style="border-radius:12px; border:2px solid var(--border-color); background:var(--bg-secondary); color:var(--text-primary);"></textarea>
          </div>

        </div>

        <div class="modal-footer" style="border-top-color:var(--border-color); padding:16px 24px;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:12px;">Cancel</button>
          <button type="submit" class="btn" style="background:linear-gradient(135deg,var(--primary),var(--secondary)); color:#fff; border-radius:12px; padding:8px 24px;">
            Add Payment
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- Edit Base Salary Modal -->
<div class="modal fade" id="editBaseSalaryModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-sm">
    <div class="modal-content" style="border-radius:20px; background:var(--bg-primary);">
      <form method="post" action="<?= base_url('admin/salaries/update_base_salary') ?>" id="editBaseSalaryForm">

        <div class="modal-header" style="border-bottom-color:var(--border-color); padding:20px 24px;">
          <h5 class="modal-title" style="color:var(--text-primary); font-weight:700;">
            <i class='bx bx-edit-alt' style="color:var(--primary); margin-right:8px;"></i>
            Edit Base Salary
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body" style="padding:24px;">
          <input type="hidden" name="user_id" id="edit_salary_user_id">
          <input type="hidden" name="redirect_month" value="<?= $selected_month ?>">

          <div class="mb-3">
            <label class="form-label" style="font-size:12px; font-weight:600; color:var(--text-secondary);">
              Developer
            </label>
            <div id="edit_salary_dev_name" style="font-size:14px; font-weight:700; color:var(--text-primary); padding: 8px 12px; background: var(--bg-secondary); border-radius: 12px; border: 1.5px solid var(--border-color);">
              -
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" style="font-size:12px; font-weight:600; color:var(--text-secondary);">
              Monthly Salary (Base) *
            </label>
            <input type="number" name="monthly_salary" id="edit_salary_amount" class="form-control" required min="0" step="0.01"
              style="border-radius:12px; border:2px solid var(--border-color); background:var(--bg-secondary); color:var(--text-primary);"
              placeholder="Enter base salary">
          </div>
        </div>

        <div class="modal-footer" style="border-top-color:var(--border-color); padding:16px 24px;">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:12px;">Cancel</button>
          <button type="submit" class="btn" style="background:linear-gradient(135deg,var(--primary),var(--secondary)); color:#fff; border-radius:12px; padding:8px 24px;">
            Update Salary
          </button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- View Developer Details Modal -->
<div class="modal fade" id="viewSalaryDetailsModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="border-radius:20px; background:var(--bg-primary); overflow: hidden;">

      <div class="modal-header" style="border-bottom-color:var(--border-color); padding:20px 24px;">
        <h5 class="modal-title" style="color:var(--text-primary); font-weight:700; display:flex; align-items:center; gap:8px;">
          <i class='bx bx-info-circle' style="color:var(--primary); font-size:22px;"></i>
          Developer Salary & Profile Details
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body" style="padding:24px; position:relative; min-height:300px;">
        <!-- Loading Spinner -->
        <div id="view_details_loader" style="position:absolute; top:0; left:0; right:0; bottom:0; background:rgba(255,255,255,0.8); z-index:10; display:flex; align-items:center; justify-content:center; border-radius:0 0 20px 20px;">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>

        <!-- Details Container (hidden until loaded) -->
        <div id="view_details_content" style="display:none;">
          <!-- Profile Card -->
          <div class="modal-view-header-profile">
            <img src="" id="vd_avatar" class="modal-view-avatar" alt="Avatar">
            <div>
              <div class="modal-view-name" id="vd_name">-</div>
              <div class="modal-view-designation" id="vd_designation">-</div>
            </div>
          </div>

          <!-- Nav Tabs -->
          <ul class="nav nav-tabs modal-nav-tabs" id="modalDetailTabs" role="tablist">
            <li class="nav-item">
              <button class="nav-link active" id="vd-profile-tab" data-bs-toggle="tab" data-bs-target="#vd-profile" type="button" role="tab">
                <i class='bx bx-user' style="margin-right:4px;"></i>Profile & Bank
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="vd-attendance-tab" data-bs-toggle="tab" data-bs-target="#vd-attendance" type="button" role="tab">
                <i class='bx bx-calendar-check' style="margin-right:4px;"></i>Attendance (<span id="vd_active_month">-</span>)
              </button>
            </li>
            <li class="nav-item">
              <button class="nav-link" id="vd-salary-tab" data-bs-toggle="tab" data-bs-target="#vd-salary" type="button" role="tab">
                <i class='bx bx-wallet' style="margin-right:4px;"></i>Salary & Payments
              </button>
            </li>
          </ul>

          <!-- Tab Content -->
          <div class="tab-content" id="modalDetailTabsContent" style="max-height:450px; overflow-y:auto; padding-right:4px;">

            <!-- Tab 1: Profile & Bank Details -->
            <div class="tab-pane fade show active" id="vd-profile" role="tabpanel">
              <div class="detail-section-title"><i class='bx bx-id-card'></i> Personal Information</div>
              <div class="detail-grid">
                <div>
                  <div class="detail-item-label">Email</div>
                  <div class="detail-item-val" id="vd_email">-</div>
                </div>
                <div>
                  <div class="detail-item-label">Phone</div>
                  <div class="detail-item-val" id="vd_phone">-</div>
                </div>
                <div>
                  <div class="detail-item-label">Skills</div>
                  <div class="detail-item-val" id="vd_skills">-</div>
                </div>

                <div>
                  <div class="detail-item-label">Date of Birth</div>
                  <div class="detail-item-val" id="vd_dob">-</div>
                </div>
                <div>
                  <div class="detail-item-label">Address</div>
                  <div class="detail-item-val" id="vd_address">-</div>
                </div>
              </div>

              <div class="detail-section-title"><i class='bx bx-credit-card-front'></i> Bank Account Information</div>
              <div class="detail-grid">
                <div>
                  <div class="detail-item-label">Bank Name</div>
                  <div class="detail-item-val" id="vd_bank_name">-</div>
                </div>
                <div>
                  <div class="detail-item-label">Account Holder Name</div>
                  <div class="detail-item-val" id="vd_account_holder">-</div>
                </div>
                <div>
                  <div class="detail-item-label">Account Number</div>
                  <div class="detail-item-val" id="vd_account_num">-</div>
                </div>
                <div>
                  <div class="detail-item-label">IFSC Code</div>
                  <div class="detail-item-val" id="vd_ifsc">-</div>
                </div>
                <div>
                  <div class="detail-item-label">Bank Branch</div>
                  <div class="detail-item-val" id="vd_bank_branch">-</div>
                </div>
              </div>
            </div>

            <!-- Tab 2: Attendance Details for Selected Month -->
            <div class="tab-pane fade" id="vd-attendance" role="tabpanel">
              <!-- Month Filter inside Modal -->
              <div class="mb-3 d-flex align-items-center justify-content-between p-2" style="background:var(--bg-secondary); border-radius:12px; border:1px solid var(--border-color);">
                <label for="vd_attendance_month" style="font-size:11px; font-weight:700; color:var(--text-secondary); text-transform:uppercase; letter-spacing:0.5px; margin:0;">
                  <i class='bx bx-filter-alt' style="color:var(--primary); font-size:14px; margin-right:4px;"></i> Select Month
                </label>
                <input type="month" id="vd_attendance_month" class="form-control" style="width:180px; border-radius:8px; padding:6px 12px; font-size:13px; background:var(--bg-primary); border:1.5px solid var(--border-color); color:var(--text-primary); outline:none;" onchange="onModalMonthChange()">
              </div>

              <!-- Stats summary cards -->
              <div class="row g-3 mb-3">
                <div class="col-6">
                  <div style="background:rgba(34,197,94,0.08); border:1px solid rgba(34,197,94,0.15); border-radius:12px; padding:12px; text-align:center;">
                    <div style="font-size:24px; font-weight:800; color:#22c55e;" id="vd_present_count">0</div>
                    <div style="font-size:11px; font-weight:600; color:var(--text-secondary); text-transform:uppercase;">Present Days</div>
                  </div>
                </div>
                <div class="col-6">
                  <div style="background:rgba(239,68,68,0.08); border:1px solid rgba(239,68,68,0.15); border-radius:12px; padding:12px; text-align:center;">
                    <div style="font-size:24px; font-weight:800; color:#ef4444;" id="vd_absent_count">0</div>
                    <div style="font-size:11px; font-weight:600; color:var(--text-secondary); text-transform:uppercase;">Absent Days</div>
                  </div>
                </div>
              </div>

              <!-- Attendance Logs table -->
              <div class="detail-section-title"><i class='bx bx-calendar'></i> Day-by-Day Logs</div>
              <div class="table-responsive">
                <table class="table table-sm border align-middle" style="font-size:12px; border-radius:8px; overflow:hidden;">
                  <thead class="table-light">
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody id="vd_attendance_tbody">
                    <!-- Dynamic Rows -->
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Tab 3: Salary & Payments History -->
            <div class="tab-pane fade" id="vd-salary" role="tabpanel">

              <!-- ── HOW SALARY IS CALCULATED EXPLANATION ── -->
              <div class="salary-calc-explainer">
                <div class="sce-header">
                  <i class='bx bx-info-circle'></i>
                  <span>How is this salary calculated?</span>
                  <button class="sce-toggle-btn" onclick="toggleSalaryExplainer(this)">
                    <i class='bx bx-chevron-down'></i> Show
                  </button>
                </div>
                <div class="sce-body" id="salaryExplainerBody" style="display:none;">
                  <div class="sce-formula-row">
                    <div class="sce-formula-item">
                      <div class="sce-fi-icon" style="background:rgba(99,102,241,0.1); color:var(--primary);">
                        <i class='bx bx-calendar-week'></i>
                      </div>
                      <div>
                        <div class="sce-fi-label">Working Days</div>
                        <div class="sce-fi-desc">Total weekdays (Mon–Fri) in the month <strong>minus</strong> holidays added by admin</div>
                      </div>
                    </div>
                    <div class="sce-formula-item">
                      <div class="sce-fi-icon" style="background:rgba(245,158,11,0.1); color:var(--warning);">
                        <i class='bx bx-calculator'></i>
                      </div>
                      <div>
                        <div class="sce-fi-label">Daily Rate</div>
                        <div class="sce-fi-desc"><strong>Base Salary ÷ Working Days</strong> — each absent day costs this amount</div>
                      </div>
                    </div>
                    <div class="sce-formula-item">
                      <div class="sce-fi-icon" style="background:rgba(239,68,68,0.1); color:var(--danger);">
                        <i class='bx bx-minus-circle'></i>
                      </div>
                      <div>
                        <div class="sce-fi-label">Deduction</div>
                        <div class="sce-fi-desc"><strong>Daily Rate × Absent Days</strong> — weekends &amp; holidays are NOT counted as absent</div>
                      </div>
                    </div>
                    <div class="sce-formula-item">
                      <div class="sce-fi-icon" style="background:rgba(34,197,94,0.1); color:var(--success);">
                        <i class='bx bx-badge-check'></i>
                      </div>
                      <div>
                        <div class="sce-fi-label">Net Payable</div>
                        <div class="sce-fi-desc"><strong>Base Salary − Deduction</strong> — final amount to be paid this month</div>
                      </div>
                    </div>
                  </div>
                  <div class="sce-note">
                    <i class='bx bx-bulb'></i>
                    <strong>Note:</strong> Base salary stays fixed regardless of working days in the month. Only absences on valid working days cause deductions.
                  </div>
                </div>
              </div>

              <!-- ── SELECTED MONTH PAYMENT STATUS ── -->
              <div class="detail-section-title"><i class='bx bx-money'></i> Selected Month Payment Status</div>

              <!-- Status Banner -->
              <div class="vd-status-banner" id="vd_status_banner">
                <div class="vsb-left">
                  <div class="vsb-status-wrap">
                    <span id="vd_curr_payment_status_icon" class="vsb-status-icon vsb-pending">
                      <i class='bx bx-time-five'></i>
                    </span>
                    <div>
                      <div class="vsb-label">Payment Status</div>
                      <div class="vsb-val" id="vd_curr_payment_status_text">Pending</div>
                    </div>
                  </div>
                </div>
                <div class="vsb-right">
                  <div class="vsb-meta-item vd-curr-pay-detail" style="display:none;">
                    <div class="vsb-label">Paid On</div>
                    <div class="vsb-val" id="vd_curr_paid_date">—</div>
                  </div>
                  <div class="vsb-meta-item vd-curr-pay-detail" style="display:none;">
                    <div class="vsb-label">Mode</div>
                    <div class="vsb-val" id="vd_curr_payment_mode">—</div>
                  </div>
                  <div class="vsb-meta-item vd-curr-pay-detail" style="display:none;">
                    <div class="vsb-label">Notes</div>
                    <div class="vsb-val vsb-notes" id="vd_curr_payment_notes">—</div>
                  </div>
                </div>
              </div>

              <!-- Salary Breakdown Cards -->
              <div class="vd-salary-breakdown">

                <!-- Row 1: Base → Working Days → Daily Rate -->
                <div class="vsb-cards-row">
                  <div class="vsb-card vsb-card-primary">
                    <div class="vsbc-icon"><i class='bx bx-wallet'></i></div>
                    <div class="vsbc-val" id="vd_curr_base_salary">—</div>
                    <div class="vsbc-lbl">Base Salary</div>
                  </div>
                  <div class="vsb-arrow"><i class='bx bx-right-arrow-alt'></i></div>
                  <div class="vsb-card vsb-card-info">
                    <div class="vsbc-icon"><i class='bx bx-calendar-week'></i></div>
                    <div class="vsbc-val" id="vd_working_days">—</div>
                    <div class="vsbc-lbl">Working Days</div>
                  </div>
                  <div class="vsb-arrow"><i class='bx bx-right-arrow-alt'></i></div>
                  <div class="vsb-card vsb-card-warning">
                    <div class="vsbc-icon"><i class='bx bx-calculator'></i></div>
                    <div class="vsbc-val" id="vd_daily_rate">—</div>
                    <div class="vsbc-lbl">Daily Rate</div>
                  </div>
                </div>

                <!-- Formula line -->
                <div class="vsb-formula-line">
                  <span id="vd_formula_text" style="color:var(--text-secondary);">
                    Base Salary ÷ Working Days = Daily Rate
                  </span>
                </div>

                <!-- Row 2: Absent Days × Daily Rate = Deduction -->
                <div class="vsb-cards-row">
                  <div class="vsb-card vsb-card-danger">
                    <div class="vsbc-icon"><i class='bx bx-x-circle'></i></div>
                    <div class="vsbc-val" id="vd_calc_absent">—</div>
                    <div class="vsbc-lbl">Absent Days</div>
                  </div>
                  <div class="vsb-arrow vsb-arrow-danger"><i class='bx bx-x'></i></div>
                  <div class="vsb-card vsb-card-warning">
                    <div class="vsbc-icon"><i class='bx bx-calculator'></i></div>
                    <div class="vsbc-val" id="vd_daily_rate_2">—</div>
                    <div class="vsbc-lbl">Daily Rate</div>
                  </div>
                  <div class="vsb-arrow vsb-arrow-danger"><i class='bx bx-right-arrow-alt'></i></div>
                  <div class="vsb-card vsb-card-danger">
                    <div class="vsbc-icon"><i class='bx bx-minus-circle'></i></div>
                    <div class="vsbc-val" id="vd_deduction">—</div>
                    <div class="vsbc-lbl">Total Deduction</div>
                  </div>
                </div>

                <!-- Final Result -->
                <div class="vsb-result-row">
                  <div class="vsb-result-formula">
                    <span id="vd_result_formula_base" style="color:var(--primary); font-weight:700;">—</span>
                    <span style="color:var(--text-secondary); margin:0 8px;">−</span>
                    <span id="vd_result_formula_ded" style="color:var(--danger); font-weight:700;">—</span>
                    <span style="color:var(--text-secondary); margin:0 8px;">=</span>
                  </div>
                  <div class="vsb-result-net">
                    <div class="vsb-result-net-label">Net Payable</div>
                    <div class="vsb-result-net-val" id="vd_net_payable">—</div>
                  </div>
                </div>

                <!-- Amount Actually Paid (shown only if paid) -->
                <div class="vd-curr-pay-detail vsb-paid-row" style="display:none;">
                  <i class='bx bx-check-circle'></i>
                  Amount Actually Paid: <strong id="vd_curr_amount_paid">—</strong>
                </div>

              </div>

              <!-- Payment History -->
              <div class="detail-section-title" style="display:flex; justify-content:space-between; align-items:center; margin-top:24px;">
                <span><i class='bx bx-history'></i> Payment History</span>
                <span style="font-size:11px; font-weight:600; color:var(--text-secondary);">
                  Total Paid All Time: <strong style="color:var(--success);" id="vd_total_paid">—</strong>
                </span>
              </div>
              <div class="table-responsive">
                <table class="table table-sm border align-middle" style="font-size:12px; border-radius:8px; overflow:hidden;">
                  <thead class="table-light">
                    <tr>
                      <th>Month</th>
                      <th>Paid Amount</th>
                      <th>Payment Date</th>
                      <th>Mode</th>
                      <th>Notes</th>
                    </tr>
                  </thead>
                  <tbody id="vd_history_tbody"></tbody>
                </table>
              </div>

            </div>

          </div>
        </div>
      </div>

      <div class="modal-footer" style="border-top-color:var(--border-color); padding:16px 24px;">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius:12px; padding:8px 24px;">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
  const AJAX_BASE = '<?= base_url() ?>';

  function openEditBaseSalary(userId, name, currentSalary) {
    document.getElementById('edit_salary_user_id').value = userId;
    document.getElementById('edit_salary_dev_name').textContent = name;
    document.getElementById('edit_salary_amount').value = currentSalary;

    new bootstrap.Modal(document.getElementById('editBaseSalaryModal')).show();
  }

  function openAddPaymentModal() {
    // Reset modal form
    document.getElementById('addPaymentForm').reset();
    document.getElementById('modal_month_year').value = '<?= $selected_month ?>';
    document.getElementById('modal_payment_date').value = '<?= date("Y-m-d") ?>';
    document.getElementById('modal_stats_preview').style.display = 'none';

    new bootstrap.Modal(document.getElementById('addPaymentModal')).show();
  }

  function openQuickPay(userId, name, baseSalary) {
    openAddPaymentModal();

    // Select the developer in the dropdown
    const select = document.getElementById('modal_user_id');
    select.value = userId;

    // Prefill the base salary as default amount
    document.getElementById('modal_amount').value = baseSalary;

    // Fetch and display their present/absent stats automatically
    fetchDeveloperStats();
  }

  function fetchDeveloperStats() {
    const userId = document.getElementById('modal_user_id').value;
    const monthYear = document.getElementById('modal_month_year').value;
    const previewCard = document.getElementById('modal_stats_preview');

    if (!userId || !monthYear) {
      previewCard.style.display = 'none';
      return;
    }

    // Call AJAX endpoint to fetch base salary, present, and absent counts
    const formData = new FormData();
    formData.append('user_id', userId);
    formData.append('month_year', monthYear);

    fetch(AJAX_BASE + 'admin/salaries/get_developer_stats', {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(res => res.json())
      .then(res => {
        if (res.success) {
          const fmt = (val) => '₹' + parseFloat(val).toLocaleString('en-IN', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
          });

          document.getElementById('preview_base_salary').textContent = fmt(res.data.base_salary);
          document.getElementById('preview_working_days').textContent = res.data.working_days;
          document.getElementById('preview_absent_days').textContent = res.data.absent_days;
          document.getElementById('preview_daily_rate').textContent = fmt(res.data.daily_rate);
          document.getElementById('preview_deduction').textContent = fmt(res.data.deduction);
          document.getElementById('preview_net_payable').textContent = fmt(res.data.net_payable);

          // Auto-prefill Amount with net payable
          const amtInput = document.getElementById('modal_amount');
          if (!amtInput.value || amtInput.value == 0 || amtInput.dataset.autoPrefilled === "true") {
            amtInput.value = res.data.net_payable;
            amtInput.dataset.autoPrefilled = "true";
          }

          previewCard.style.display = 'block';
        } else {
          previewCard.style.display = 'none';
        }
      })
      .catch(err => {
        console.error('Error fetching developer stats:', err);
        previewCard.style.display = 'none';
      });
  }

  // If the user manually changes the Amount input, mark it as not auto-prefilled
  document.getElementById('modal_amount').addEventListener('input', function() {
    this.dataset.autoPrefilled = "false";
  });


  let currentVdUserId = null;

  function openViewSalaryDetails(userId, monthYear) {
    currentVdUserId = userId;
    const modalEl = document.getElementById('viewSalaryDetailsModal');
    const loader = document.getElementById('view_details_loader');
    const content = document.getElementById('view_details_content');

    // Show modal and loader, hide content
    loader.style.display = 'flex';
    content.style.display = 'none';

    // Reset active tab to profile tab
    const firstTabEl = document.querySelector('#vd-profile-tab');
    const firstTab = new bootstrap.Tab(firstTabEl);
    firstTab.show();

    // Set the month filter input inside modal
    document.getElementById('vd_attendance_month').value = monthYear;

    const modal = new bootstrap.Modal(modalEl);
    modal.show();

    // Load dynamic data
    loadVdDetails(userId, monthYear);
  }

  function loadVdDetails(userId, monthYear) {
    const loader = document.getElementById('view_details_loader');
    const content = document.getElementById('view_details_content');

    loader.style.display = 'flex';

    // Format active month label for view (e.g. "June 2026")
    const dateParts = monthYear.split('-');
    const opt = {
      month: 'long',
      year: 'numeric'
    };
    const dateLabel = new Date(dateParts[0], dateParts[1] - 1, 1).toLocaleDateString('en-US', opt);
    document.getElementById('vd_active_month').textContent = dateLabel;

    // Call AJAX endpoint
    const formData = new FormData();
    formData.append('user_id', userId);
    formData.append('month_year', monthYear);

    fetch(AJAX_BASE + 'admin/salaries/get_salary_details_ajax', {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      })
      .then(res => res.json())
      .then(res => {
        if (res.success) {
          const d = res.data;

          // Profile
          document.getElementById('vd_name').textContent = d.user.name || '—';
          document.getElementById('vd_designation').textContent = d.user.designation || 'Developer';
          document.getElementById('vd_email').textContent = d.user.email || '—';
          document.getElementById('vd_phone').textContent = d.user.phone || '—';
          document.getElementById('vd_skills').textContent = d.user.skills || '—';
          document.getElementById('vd_dob').textContent = d.user.dob ? new Date(d.user.dob).toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
          }) : '—';
          document.getElementById('vd_address').textContent = d.user.address || '—';

          // Avatar
          const avatarUrl = d.user.photo ? AJAX_BASE + 'uploads/profile/' + d.user.photo : AJAX_BASE + 'assets/default.jpg';
          document.getElementById('vd_avatar').src = avatarUrl;

          // Bank info
          document.getElementById('vd_bank_name').textContent = d.user.bank_name || '—';
          document.getElementById('vd_account_holder').textContent = d.user.account_holder_name || '—';
          document.getElementById('vd_account_num').textContent = d.user.account_number || '—';
          document.getElementById('vd_ifsc').textContent = d.user.ifsc_code || '—';
          document.getElementById('vd_bank_branch').textContent = d.user.bank_branch || '—';

          // Attendance stats
          document.getElementById('vd_present_count').textContent = d.attendance.present;
          document.getElementById('vd_absent_count').textContent = d.attendance.absent;

          // Attendance logs list (ONLY SHOW ABSENT dates)
          const attTbody = document.getElementById('vd_attendance_tbody');
          attTbody.innerHTML = '';
          let absentRowsCount = 0;

          if (d.attendance.records.length > 0) {
            d.attendance.records.forEach(r => {
              const statusLower = r.status.toLowerCase();
              if (statusLower !== 'absent') {
                return; // Filter out present and other non-absent rows
              }
              absentRowsCount++;

              attTbody.innerHTML += `
              <tr>
                <td><strong>${r.formatted_date}</strong> <span class="text-muted text-xs">(${r.day_name})</span></td>
                <td>—</td>
                <td><span class="badge bg-danger">${r.status}</span></td>
              </tr>
            `;
            });
          }

          if (absentRowsCount === 0) {
            attTbody.innerHTML = '<tr><td colspan="3" class="text-center text-muted italic py-3">No absent records found for this month.</td></tr>';
          }

          // ── Salary Calculation Breakdown ──
          const fmtv = (val) => '₹' + parseInt(val || 0).toLocaleString('en-IN');
          const sc = d.salary_calc || {};

          // Cards
          document.getElementById('vd_curr_base_salary').textContent = fmtv(d.user.monthly_salary);
          document.getElementById('vd_working_days').textContent = (sc.working_days ?? '—') + ' days';
          document.getElementById('vd_daily_rate').textContent = fmtv(sc.daily_rate);
          document.getElementById('vd_daily_rate_2').textContent = fmtv(sc.daily_rate);
          document.getElementById('vd_calc_absent').textContent = (sc.absent_days ?? 0) + ' days';
          document.getElementById('vd_deduction').textContent = fmtv(sc.deduction);
          document.getElementById('vd_net_payable').textContent = fmtv(sc.net_payable);

          // Formula line
          document.getElementById('vd_formula_text').innerHTML =
            `<strong style="color:var(--primary);">${fmtv(d.user.monthly_salary)}</strong>` +
            ` <span style="color:var(--text-secondary);">÷</span> ` +
            `<strong style="color:var(--info);">${sc.working_days} days</strong>` +
            ` <span style="color:var(--text-secondary);">=</span> ` +
            `<strong style="color:var(--warning);">${fmtv(sc.daily_rate)} / day</strong>`;

          // Final result formula
          document.getElementById('vd_result_formula_base').textContent = fmtv(d.user.monthly_salary);
          document.getElementById('vd_result_formula_ded').textContent = fmtv(sc.deduction);

          const payDetailBlocks = document.querySelectorAll('.vd-curr-pay-detail');
          const statusIcon = document.getElementById('vd_curr_payment_status_icon');
          const statusText = document.getElementById('vd_curr_payment_status_text');

          if (d.selected_month_payment) {
            // Paid state
            statusIcon.className = 'vsb-status-icon vsb-paid';
            statusIcon.innerHTML = "<i class='bx bx-check-circle'></i>";
            statusText.textContent = 'Paid';
            statusText.style.color = 'var(--success)';

            document.getElementById('vd_curr_amount_paid').textContent = fmtv(d.selected_month_payment.amount);
            document.getElementById('vd_curr_paid_date').textContent = d.selected_month_payment.formatted_payment_date;
            document.getElementById('vd_curr_payment_mode').textContent = d.selected_month_payment.payment_mode;
            document.getElementById('vd_curr_payment_notes').textContent = d.selected_month_payment.notes || '—';

            payDetailBlocks.forEach(b => b.style.display = 'flex');
          } else {
            // Pending state
            statusIcon.className = 'vsb-status-icon vsb-pending';
            statusIcon.innerHTML = "<i class='bx bx-time-five'></i>";
            statusText.textContent = 'Pending';
            statusText.style.color = 'var(--danger)';

            payDetailBlocks.forEach(b => b.style.display = 'none');
          }

          // Salary History
          document.getElementById('vd_total_paid').textContent = '₹' + parseFloat(d.total_paid).toLocaleString('en-IN', {
            minimumFractionDigits: 2
          });
          const histTbody = document.getElementById('vd_history_tbody');
          histTbody.innerHTML = '';
          if (d.payments_history.length === 0) {
            histTbody.innerHTML = '<tr><td colspan="5" class="text-center text-muted italic py-3">No payments recorded.</td></tr>';
          } else {
            d.payments_history.forEach(h => {
              histTbody.innerHTML += `
              <tr>
                <td><strong>${h.formatted_month}</strong></td>
                <td style="color:var(--success); font-weight:700;">₹${parseFloat(h.amount).toLocaleString('en-IN', { minimumFractionDigits: 2 })}</td>
                <td>${h.formatted_payment_date}</td>
                <td><span class="badge bg-light text-dark border">${h.payment_mode}</span></td>
                <td style="max-width:180px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;" title="${h.notes || ''}">${h.notes || '—'}</td>
              </tr>
            `;
            });
          }

          // Display contents and hide loader
          loader.style.display = 'none';
          content.style.display = 'block';
        } else {
          showSweetAlert(res.message || 'Failed to load details.', 'error');
          loader.style.display = 'none';
        }
      })
      .catch(err => {
        console.error(err);
        showSweetAlert('Error fetching developer details.', 'error');
        loader.style.display = 'none';
      });
  }

  function onModalMonthChange() {
    const selectedMonth = document.getElementById('vd_attendance_month').value;
    if (currentVdUserId && selectedMonth) {
      loadVdDetails(currentVdUserId, selectedMonth);
    }
  }

  function toggleSalaryExplainer(btn) {
    const body = document.getElementById('salaryExplainerBody');
    const isHidden = body.style.display === 'none';
    body.style.display = isHidden ? 'block' : 'none';
    btn.innerHTML = isHidden ?
      "<i class='bx bx-chevron-up'></i> Hide" :
      "<i class='bx bx-chevron-down'></i> Show";
  }

  // Auto-hide flash alerts
  setTimeout(() => {
    document.querySelectorAll('.salary-flash').forEach(el => {
      el.style.transition = 'opacity 0.5s';
      el.style.opacity = '0';
      setTimeout(() => el.remove(), 500);
    });
  }, 5000);
</script>
