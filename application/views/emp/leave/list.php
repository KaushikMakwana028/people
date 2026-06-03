<style>
  /* ── CSS Variables ── */
  :root {
    --grad-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --grad-success: linear-gradient(135deg, #10b981 0%, #059669 100%);
    --grad-danger: linear-gradient(135deg, #f43f5e 0%, #e11d48 100%);
    --grad-warning: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    --grad-info: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
    --soft-primary: #eef2ff;
    --soft-success: #ecfdf5;
    --soft-danger: #fff1f2;
    --soft-warning: #fffbeb;
    --soft-info: #ecfeff;
    --soft-purple: #faf5ff;
    --radius-lg: 20px;
    --radius-md: 14px;
    --radius-sm: 10px;
    --shadow-card: 0 4px 24px rgba(0, 0, 0, .06);
    --shadow-hover: 0 12px 40px rgba(0, 0, 0, .12);
    --text-dark: #0f172a;
    --text-mid: #475569;
    --text-light: #94a3b8;
    --border-light: #f1f5f9;
  }

  /* ── Hero Banner ── */
  .leave-list-hero {
    background: var(--grad-primary);
    border-radius: var(--radius-lg);
    padding: 36px 34px;
    color: #fff;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 12px 45px rgba(102, 126, 234, .35);
  }

  .leave-list-hero::before,
  .leave-list-hero::after {
    content: '';
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, .07);
  }

  .leave-list-hero::before {
    width: 280px;
    height: 280px;
    top: -120px;
    right: -80px;
  }

  .leave-list-hero::after {
    width: 180px;
    height: 180px;
    bottom: -80px;
    left: -60px;
  }

  .leave-list-hero .hero-content {
    position: relative;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
  }

  .leave-list-hero .hero-left h3 {
    font-weight: 800;
    font-size: 24px;
    margin-bottom: 6px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .leave-list-hero .hero-left p {
    margin: 0;
    opacity: .85;
    font-size: 14px;
  }

  .leave-list-hero .hero-stats {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
  }

  .hero-stat-chip {
    background: rgba(255, 255, 255, .18);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, .25);
    border-radius: 50px;
    padding: 10px 22px;
    font-weight: 700;
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .hero-stat-chip .chip-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    flex-shrink: 0;
  }

  .chip-dot.green {
    background: #4ade80;
  }

  .chip-dot.red {
    background: #fb7185;
  }

  .chip-dot.yellow {
    background: #fbbf24;
  }

  /* ── Summary Cards ── */
  .summary-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 18px;
    margin-bottom: 28px;
  }

  @media (max-width: 992px) {
    .summary-row {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 576px) {
    .summary-row {
      grid-template-columns: 1fr;
    }
  }

  .summary-card {
    background: #fff;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-card);
    padding: 0;
    overflow: hidden;
    transition: all .35s cubic-bezier(.4, 0, .2, 1);
    position: relative;
    border: 1px solid transparent;
  }

  .summary-card:hover {
    transform: translateY(-5px);
  }

  .summary-card.sc-total:hover {
    box-shadow: 0 10px 35px rgba(102, 126, 234, .25);
    border-color: rgba(102, 126, 234, .15);
  }

  .summary-card.sc-approved:hover {
    box-shadow: 0 10px 35px rgba(16, 185, 129, .25);
    border-color: rgba(16, 185, 129, .15);
  }

  .summary-card.sc-pending:hover {
    box-shadow: 0 10px 35px rgba(245, 158, 11, .25);
    border-color: rgba(245, 158, 11, .15);
  }

  .summary-card.sc-rejected:hover {
    box-shadow: 0 10px 35px rgba(244, 63, 94, .25);
    border-color: rgba(244, 63, 94, .15);
  }

  .summary-card .sc-accent {
    height: 4px;
    width: 100%;
  }

  .sc-total .sc-accent {
    background: var(--grad-primary);
  }

  .sc-approved .sc-accent {
    background: var(--grad-success);
  }

  .sc-pending .sc-accent {
    background: var(--grad-warning);
  }

  .sc-rejected .sc-accent {
    background: var(--grad-danger);
  }

  .summary-card .sc-body {
    padding: 22px;
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .sc-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    flex-shrink: 0;
  }

  .sc-total .sc-icon {
    background: var(--soft-primary);
    color: #667eea;
  }

  .sc-approved .sc-icon {
    background: var(--soft-success);
    color: #059669;
  }

  .sc-pending .sc-icon {
    background: var(--soft-warning);
    color: #d97706;
  }

  .sc-rejected .sc-icon {
    background: var(--soft-danger);
    color: #e11d48;
  }

  .sc-info .sc-label {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--text-light);
    margin-bottom: 4px;
  }

  .sc-info .sc-value {
    font-size: 28px;
    font-weight: 800;
    line-height: 1;
  }

  .sc-total .sc-value {
    color: #667eea;
  }

  .sc-approved .sc-value {
    color: #059669;
  }

  .sc-pending .sc-value {
    color: #d97706;
  }

  .sc-rejected .sc-value {
    color: #e11d48;
  }

  /* ── Filter / Search Bar ── */
  .filter-bar {
    background: #fff;
    border-radius: var(--radius-md);
    padding: 16px 22px;
    box-shadow: var(--shadow-card);
    margin-bottom: 24px;
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
    border: 1px solid var(--border-light);
  }

  .filter-bar .filter-icon-box {
    width: 40px;
    height: 40px;
    border-radius: var(--radius-sm);
    background: var(--soft-primary);
    color: #667eea;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
  }

  .filter-bar .search-input {
    flex: 1;
    min-width: 200px;
    border: 2px solid #e2e8f0;
    border-radius: var(--radius-sm);
    padding: 10px 16px 10px 40px;
    font-size: 14px;
    font-weight: 500;
    color: var(--text-dark);
    background: #fafbfd url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%2394a3b8' viewBox='0 0 24 24'%3E%3Cpath d='M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z'/%3E%3C/svg%3E") no-repeat 14px center;
    transition: all .3s ease;
  }

  .filter-bar .search-input:focus {
    outline: none;
    border-color: #667eea;
    background-color: #fff;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, .12);
  }

  .filter-bar .filter-select {
    border: 2px solid #e2e8f0;
    border-radius: var(--radius-sm);
    padding: 10px 36px 10px 14px;
    font-size: 13px;
    font-weight: 600;
    color: var(--text-mid);
    background: #fafbfd url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%2394a3b8' viewBox='0 0 16 16'%3E%3Cpath d='M8 11L3 6h10l-5 5z'/%3E%3C/svg%3E") no-repeat right 14px center;
    appearance: none;
    -webkit-appearance: none;
    cursor: pointer;
    transition: all .3s ease;
  }

  .filter-bar .filter-select:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, .12);
  }

  /* ── Table Card ── */
  .leave-table-card {
    background: #fff;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-card);
    overflow: hidden;
    border: 1px solid var(--border-light);
    animation: fadeSlideUp .5s ease both;
  }

  @keyframes fadeSlideUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .table-card-header {
    padding: 22px 28px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--border-light);
    flex-wrap: wrap;
    gap: 12px;
  }

  .table-card-header .table-title {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 16px;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0;
  }

  .table-card-header .title-icon {
    width: 36px;
    height: 36px;
    border-radius: var(--radius-sm);
    background: var(--soft-primary);
    color: #667eea;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
  }

  .table-card-header .count-badge {
    background: var(--soft-primary);
    color: #667eea;
    font-size: 12px;
    font-weight: 700;
    padding: 6px 16px;
    border-radius: 50px;
    letter-spacing: .3px;
  }

  /* Table */
  .leave-table {
    width: 100%;
    border-collapse: collapse;
  }

  .leave-table thead th {
    background: #fafbfd;
    color: var(--text-light);
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    padding: 16px 24px;
    border-bottom: 2px solid var(--border-light);
    white-space: nowrap;
  }

  .leave-table tbody tr {
    transition: all .25s ease;
    border-bottom: 1px solid #f8fafc;
  }

  .leave-table tbody tr:last-child {
    border-bottom: none;
  }

  .leave-table tbody tr:hover {
    background: #fafaff;
  }

  .leave-table tbody td {
    padding: 16px 24px;
    font-size: 14px;
    color: var(--text-mid);
    vertical-align: middle;
  }

  /* Serial Number */
  .serial-num {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: var(--soft-primary);
    color: #667eea;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 13px;
  }

  /* Date Cell */
  .leave-date-cell {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .leave-date-tile {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    background: linear-gradient(135deg, #eef2ff, #dbeafe);
    border: 1px solid #c7d2fe;
    transition: all .3s ease;
  }

  tr:hover .leave-date-tile {
    transform: scale(1.05);
  }

  .leave-date-tile .tile-day {
    font-size: 18px;
    font-weight: 800;
    line-height: 1;
    color: #4f46e5;
  }

  .leave-date-tile .tile-month {
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .5px;
    color: #818cf8;
    margin-top: 2px;
  }

  .leave-date-text .date-full {
    font-weight: 600;
    color: var(--text-dark);
    font-size: 14px;
  }

  .leave-date-text .date-weekday {
    font-size: 12px;
    color: var(--text-light);
    margin-top: 2px;
  }

  /* Type Chip */
  .type-chip {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 16px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: .3px;
  }

  .type-chip.full-day {
    background: linear-gradient(135deg, #ecfdf5, #d1fae5);
    color: #059669;
    border: 1px solid #a7f3d0;
  }

  .type-chip.half-1 {
    background: linear-gradient(135deg, #fffbeb, #fef3c7);
    color: #d97706;
    border: 1px solid #fde68a;
  }

  .type-chip.half-2 {
    background: linear-gradient(135deg, #ecfeff, #cffafe);
    color: #0891b2;
    border: 1px solid #a5f3fc;
  }

  .type-chip i {
    font-size: 15px;
  }

  /* Reason Cell */
  .reason-cell {
    max-width: 250px;
  }

  .reason-text {
    font-size: 13px;
    color: var(--text-mid);
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .reason-empty {
    font-size: 13px;
    color: #cbd5e1;
    font-style: italic;
  }

  /* Status Pill */
  .status-pill {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 18px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: .4px;
    transition: all .3s ease;
  }

  tr:hover .status-pill {
    transform: scale(1.04);
  }

  .status-pill.approved {
    background: linear-gradient(135deg, #ecfdf5, #d1fae5);
    color: #059669;
    border: 1px solid #a7f3d0;
  }

  .status-pill.pending {
    background: linear-gradient(135deg, #fffbeb, #fef3c7);
    color: #d97706;
    border: 1px solid #fde68a;
    animation: subtlePulse 2s ease-in-out infinite;
  }

  @keyframes subtlePulse {

    0%,
    100% {
      box-shadow: 0 0 0 0 rgba(245, 158, 11, .2);
    }

    50% {
      box-shadow: 0 0 0 6px rgba(245, 158, 11, 0);
    }
  }

  .status-pill.rejected {
    background: linear-gradient(135deg, #fff1f2, #ffe4e6);
    color: #e11d48;
    border: 1px solid #fecdd3;
  }

  .status-pill i {
    font-size: 15px;
  }

  /* ── Empty State ── */
  .empty-state {
    text-align: center;
    padding: 70px 20px;
  }

  .empty-illustration {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    animation: floatBounce 3s ease-in-out infinite;
  }

  @keyframes floatBounce {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-8px);
    }
  }

  .empty-illustration i {
    font-size: 44px;
    color: #cbd5e1;
  }

  .empty-state h5 {
    color: var(--text-dark);
    font-weight: 700;
    margin-bottom: 8px;
  }

  .empty-state p {
    color: var(--text-light);
    font-size: 14px;
    max-width: 320px;
    margin: 0 auto;
  }

  /* ── Legend Bar ── */
  .legend-bar {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 16px 28px;
    background: #fafbfd;
    border-top: 1px solid var(--border-light);
    flex-wrap: wrap;
  }

  .legend-item {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    font-weight: 600;
    color: var(--text-light);
  }

  .legend-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    flex-shrink: 0;
  }

  .legend-dot.approved {
    background: #10b981;
  }

  .legend-dot.pending {
    background: #f59e0b;
  }

  .legend-dot.rejected {
    background: #f43f5e;
  }

  /* ── Responsive ── */
  @media (max-width: 992px) {
    .leave-list-hero .hero-content {
      flex-direction: column;
      align-items: flex-start;
    }

    .leave-list-hero .hero-stats {
      width: 100%;
    }
  }

  @media (max-width: 768px) {
    .leave-list-hero {
      padding: 26px 22px;
    }

    .leave-list-hero .hero-left h3 {
      font-size: 20px;
    }

    .leave-table thead th,
    .leave-table tbody td {
      padding: 14px 16px;
    }

    .table-card-header {
      padding: 18px 20px;
    }

    .filter-bar {
      padding: 14px 18px;
    }

    .leave-date-tile {
      width: 40px;
      height: 40px;
      border-radius: 10px;
    }

    .leave-date-tile .tile-day {
      font-size: 15px;
    }
  }

  @media (max-width: 576px) {
    .hero-stat-chip {
      font-size: 12px;
      padding: 8px 16px;
    }

    .table-card-header {
      flex-direction: column;
      align-items: flex-start;
    }

    .legend-bar {
      justify-content: center;
    }

    .filter-bar .search-input {
      min-width: 100%;
    }
  }
</style>

<!-- ══════════ Start Page Wrapper ══════════ -->
<div class="page-wrapper">
  <div class="page-content">

    <!-- ── Hero Banner ── -->
    <div class="leave-list-hero">
      <div class="hero-content">
        <div class="hero-left">
          <h3>
            <i class="bx bx-list-check"></i>
            Leave Records
          </h3>
          <p>View and track all your submitted leave requests at a glance</p>
        </div>
        <div class="hero-stats">
          <?php
          $total_leaves = count($leaves);
          $approved_count = 0;
          $pending_count = 0;
          $rejected_count = 0;
          foreach ($leaves as $l) {
            if ($l->status == 'Approved') $approved_count++;
            elseif ($l->status == 'Rejected') $rejected_count++;
            else $pending_count++;
          }
          ?>
          <div class="hero-stat-chip">
            <span class="chip-dot green"></span>
            <?= $approved_count ?> Approved
          </div>
          <div class="hero-stat-chip">
            <span class="chip-dot yellow"></span>
            <?= $pending_count ?> Pending
          </div>
          <div class="hero-stat-chip">
            <span class="chip-dot red"></span>
            <?= $rejected_count ?> Rejected
          </div>
        </div>
      </div>
    </div>

    <!-- ── Summary Cards ── -->
    <div class="summary-row">

      <div class="summary-card sc-total">
        <div class="sc-accent"></div>
        <div class="sc-body">
          <div class="sc-icon"><i class="bx bx-calendar-event"></i></div>
          <div class="sc-info">
            <div class="sc-label">Total Leaves</div>
            <div class="sc-value"><?= $total_leaves ?></div>
          </div>
        </div>
      </div>

      <div class="summary-card sc-approved">
        <div class="sc-accent"></div>
        <div class="sc-body">
          <div class="sc-icon"><i class="bx bx-check-circle"></i></div>
          <div class="sc-info">
            <div class="sc-label">Approved</div>
            <div class="sc-value"><?= $approved_count ?></div>
          </div>
        </div>
      </div>

      <div class="summary-card sc-pending">
        <div class="sc-accent"></div>
        <div class="sc-body">
          <div class="sc-icon"><i class="bx bx-time-five"></i></div>
          <div class="sc-info">
            <div class="sc-label">Pending</div>
            <div class="sc-value"><?= $pending_count ?></div>
          </div>
        </div>
      </div>

      <div class="summary-card sc-rejected">
        <div class="sc-accent"></div>
        <div class="sc-body">
          <div class="sc-icon"><i class="bx bx-x-circle"></i></div>
          <div class="sc-info">
            <div class="sc-label">Rejected</div>
            <div class="sc-value"><?= $rejected_count ?></div>
          </div>
        </div>
      </div>

    </div>

    <!-- ── Filter / Search Bar ── -->
    <div class="filter-bar">
      <div class="filter-icon-box">
        <i class="bx bx-search-alt"></i>
      </div>
      <input type="text"
        class="search-input"
        id="tableSearch"
        placeholder="Search by reason, date, type...">
      <select class="filter-select" id="statusFilter">
        <option value="">All Status</option>
        <option value="Approved">✅ Approved</option>
        <option value="Pending">⏳ Pending</option>
        <option value="Rejected">❌ Rejected</option>
      </select>
      <select class="filter-select" id="typeFilter">
        <option value="">All Types</option>
        <option value="full_day">Full Day</option>
        <option value="half_day_1">Half Day (1st)</option>
        <option value="half_day_2">Half Day (2nd)</option>
      </select>
    </div>

    <!-- ── Table Card ── -->
    <div class="leave-table-card">

      <div class="table-card-header">
        <h6 class="table-title">
          <span class="title-icon"><i class="bx bx-table"></i></span>
          Leave Applications
        </h6>
        <span class="count-badge">
          <i class="bx bx-data me-1"></i>
          <span id="visibleCount"><?= $total_leaves ?></span> Records
        </span>
      </div>

      <div class="table-responsive">
        <table class="leave-table" id="leaveTable">
          <thead>
            <tr>
              <th>#</th>
              <th>Date</th>
              <th>Type</th>
              <th>Reason</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($leaves)): ?>
              <?php $i = 1;
              foreach ($leaves as $row):
                $ts       = strtotime($row->leave_date);
                $dayNum   = date('d', $ts);
                $monthAbbr = strtoupper(date('M', $ts));
                $dateFull = date('d M Y', $ts);
                $weekday  = date('l', $ts);

                // Leave type
                $typeClass = 'full-day';
                $typeLabel = 'Full Day';
                $typeIcon  = 'bx-sun';
                if ($row->leave_type == 'half_day_1') {
                  $typeClass = 'half-1';
                  $typeLabel = '1st Half';
                  $typeIcon  = 'bx-cloud-light-rain';
                } elseif ($row->leave_type == 'half_day_2') {
                  $typeClass = 'half-2';
                  $typeLabel = '2nd Half';
                  $typeIcon  = 'bx-moon';
                }

                // Status
                $statusClass = 'pending';
                $statusIcon  = 'bx-time-five';
                if ($row->status == 'Approved') {
                  $statusClass = 'approved';
                  $statusIcon  = 'bx-check-circle';
                } elseif ($row->status == 'Rejected') {
                  $statusClass = 'rejected';
                  $statusIcon  = 'bx-x-circle';
                }
              ?>
                <tr data-status="<?= $row->status ?>" data-type="<?= $row->leave_type ?>">
                  <!-- # -->
                  <td>
                    <span class="serial-num"><?= $i++ ?></span>
                  </td>

                  <!-- Date -->
                  <td>
                    <div class="leave-date-cell">
                      <div class="leave-date-tile">
                        <span class="tile-day"><?= $dayNum ?></span>
                        <span class="tile-month"><?= $monthAbbr ?></span>
                      </div>
                      <div class="leave-date-text">
                        <div class="date-full"><?= $dateFull ?></div>
                        <div class="date-weekday"><?= $weekday ?></div>
                      </div>
                    </div>
                  </td>

                  <!-- Type -->
                  <td>
                    <span class="type-chip <?= $typeClass ?>">
                      <i class="bx <?= $typeIcon ?>"></i>
                      <?= $typeLabel ?>
                    </span>
                  </td>

                  <!-- Reason -->
                  <td>
                    <div class="reason-cell">
                      <?php if (!empty($row->reason)): ?>
                        <div class="reason-text"><?= htmlspecialchars($row->reason) ?></div>
                      <?php else: ?>
                        <span class="reason-empty">No reason provided</span>
                      <?php endif; ?>
                    </div>
                  </td>

                  <!-- Status -->
                  <td>
                    <span class="status-pill <?= $statusClass ?>">
                      <i class="bx <?= $statusIcon ?>"></i>
                      <?= $row->status ?>
                    </span>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr id="emptyRow">
                <td colspan="5">
                  <div class="empty-state">
                    <div class="empty-illustration">
                      <i class="bx bx-calendar-x"></i>
                    </div>
                    <h5>No Leave Records</h5>
                    <p>You haven't submitted any leave requests yet. Start by applying for a leave.</p>
                  </div>
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <!-- Legend -->
      <?php if (!empty($leaves)): ?>
        <div class="legend-bar">
          <div class="legend-item">
            <span class="legend-dot approved"></span> Approved
          </div>
          <div class="legend-item">
            <span class="legend-dot pending"></span> Pending
          </div>
          <div class="legend-item">
            <span class="legend-dot rejected"></span> Rejected
          </div>
        </div>
      <?php endif; ?>

    </div>
    <!-- /table card -->

  </div>
</div>

<!-- Overlay & Back-to-top -->
<div class="overlay toggle-icon"></div>
<a href="javascript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>

<!-- ══════════ Scripts ══════════ -->
<script>
  document.addEventListener('DOMContentLoaded', function() {

    const searchInput = document.getElementById('tableSearch');
    const statusFilter = document.getElementById('statusFilter');
    const typeFilter = document.getElementById('typeFilter');
    const table = document.getElementById('leaveTable');
    const countBadge = document.getElementById('visibleCount');

    if (!table) return;

    function filterTable() {
      const searchVal = searchInput ? searchInput.value.toLowerCase() : '';
      const statusVal = statusFilter ? statusFilter.value : '';
      const typeVal = typeFilter ? typeFilter.value : '';
      const rows = table.querySelectorAll('tbody tr[data-status]');
      let visible = 0;

      rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        const status = row.getAttribute('data-status') || '';
        const type = row.getAttribute('data-type') || '';

        const matchSearch = !searchVal || text.includes(searchVal);
        const matchStatus = !statusVal || status === statusVal;
        const matchType = !typeVal || type === typeVal;

        if (matchSearch && matchStatus && matchType) {
          row.style.display = '';
          visible++;
        } else {
          row.style.display = 'none';
        }
      });

      if (countBadge) countBadge.textContent = visible;

      // Show/hide empty message
      let noResultRow = document.getElementById('noResultRow');
      if (visible === 0 && rows.length > 0) {
        if (!noResultRow) {
          noResultRow = document.createElement('tr');
          noResultRow.id = 'noResultRow';
          noResultRow.innerHTML = `
          <td colspan="5">
            <div class="empty-state" style="padding: 50px 20px;">
              <div class="empty-illustration">
                <i class="bx bx-search-alt" style="font-size:36px;"></i>
              </div>
              <h5>No Matching Records</h5>
              <p>Try adjusting your search or filter criteria.</p>
            </div>
          </td>
        `;
          table.querySelector('tbody').appendChild(noResultRow);
        }
        noResultRow.style.display = '';
      } else if (noResultRow) {
        noResultRow.style.display = 'none';
      }
    }

    if (searchInput) searchInput.addEventListener('input', filterTable);
    if (statusFilter) statusFilter.addEventListener('change', filterTable);
    if (typeFilter) typeFilter.addEventListener('change', filterTable);

  });
</script>