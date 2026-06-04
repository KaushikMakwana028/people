<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
  /* ── General ── */
  .holiday-page .card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 4px 20px var(--shadow);
    overflow: hidden;
    background: var(--bg-primary);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  /* ── Breadcrumb Compact ── */
  .holiday-page .page-breadcrumb {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    border-radius: 14px;
    padding: 12px 20px;
    margin-bottom: 24px;
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
  }

  .holiday-page .page-breadcrumb .breadcrumb-title {
    color: #fff;
    font-weight: 700;
    font-size: 18px;
  }

  .holiday-page .page-breadcrumb .breadcrumb-item a,
  .holiday-page .page-breadcrumb .breadcrumb-item.active {
    color: rgba(255, 255, 255, 0.85);
  }

  .holiday-page .page-breadcrumb .breadcrumb-item a:hover {
    color: #fff;
  }

  /* ── Page Header ── */
  .page-header-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 28px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--border-color);
  }

  .page-header-wrap .title-section h4 {
    font-size: 20px;
    font-weight: 800;
    color: var(--text-primary);
    margin: 0 0 4px 0;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .page-header-wrap .title-section h4 i {
    font-size: 24px;
    color: var(--primary);
  }

  .page-header-wrap .title-section p {
    margin: 0;
    font-size: 12px;
    color: var(--text-secondary);
  }

  .header-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
  }

  /* Year Selector */
  .year-selector {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--bg-secondary);
    padding: 6px 16px;
    border-radius: 12px;
    border: 1px solid var(--border-color);
  }

  .year-selector i {
    font-size: 20px;
    color: var(--primary);
  }

  .year-selector select {
    border: none;
    background: transparent;
    font-weight: 700;
    font-size: 14px;
    color: var(--text-primary);
    outline: none;
    cursor: pointer;
    padding: 4px 8px;
  }

  /* Add Button */
  .btn-add-holiday {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 22px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 700;
    border: none;
    cursor: pointer;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    box-shadow: 0 4px 16px rgba(99, 102, 241, 0.35);
    transition: all 0.25s ease;
    text-decoration: none;
  }

  .btn-add-holiday:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 24px rgba(99, 102, 241, 0.45);
    color: #fff;
  }

  .btn-add-holiday i {
    font-size: 18px;
  }

  /* ── Summary Strip ── */
  .summary-strip {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 24px;
  }

  .strip-card {
    border-radius: 16px;
    padding: 18px 20px;
    position: relative;
    overflow: hidden;
    transition: all 0.25s ease;
    cursor: default;
    box-shadow: 0 4px 12px var(--shadow);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .strip-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 28px var(--shadow-lg);
  }

  .strip-card::before {
    content: '';
    position: absolute;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    top: -40px;
    right: -30px;
    background: rgba(255, 255, 255, 0.1);
  }

  .strip-left {
    flex: 1;
  }

  .strip-card .strip-count {
    font-size: 34px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 6px;
  }

  .strip-card .strip-label {
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    opacity: 0.85;
  }

  .strip-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    background: rgba(255, 255, 255, 0.2);
  }

  .strip-total {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
  }

  .strip-upcoming {
    background: linear-gradient(135deg, rgba(34, 197, 94, 0.12) 0%, rgba(22, 163, 74, 0.2) 100%);
    color: #22c55e;
    border-left: 4px solid #22c55e;
  }

  .strip-past {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.12) 0%, rgba(217, 119, 6, 0.2) 100%);
    color: #f59e0b;
    border-left: 4px solid #f59e0b;
  }

  /* ── Holiday Table ── */
  .holiday-table {
    border-collapse: separate;
    border-spacing: 0 10px;
    width: 100%;
  }

  .holiday-table thead th {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    border: none;
    padding: 14px 18px;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    font-weight: 700;
    white-space: nowrap;
  }

  .holiday-table thead th:first-child {
    border-radius: 12px 0 0 12px;
  }

  .holiday-table thead th:last-child {
    border-radius: 0 12px 12px 0;
  }

  .holiday-table thead th i {
    margin-right: 6px;
    font-size: 14px;
  }

  .holiday-table tbody tr {
    background: var(--bg-primary);
    box-shadow: 0 2px 8px var(--shadow);
    transition: all 0.2s ease;
  }

  .holiday-table tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px var(--shadow-lg);
  }

  .holiday-table tbody tr.past-holiday {
    opacity: 0.65;
  }

  .holiday-table tbody tr.today-holiday {
    border-left: 4px solid var(--primary);
    background: rgba(99, 102, 241, 0.05);
  }

  .holiday-table tbody td {
    padding: 16px 18px;
    border: none;
    vertical-align: middle;
    font-size: 13px;
    color: var(--text-primary);
    background: var(--bg-primary);
  }

  .holiday-table tbody td:first-child {
    border-radius: 14px 0 0 14px;
  }

  .holiday-table tbody td:last-child {
    border-radius: 0 14px 14px 0;
  }

  /* Date cell */
  .date-cell {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .date-box {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    line-height: 1;
    flex-shrink: 0;
    box-shadow: 0 2px 8px rgba(99, 102, 241, 0.3);
  }

  .date-box .d-num {
    font-size: 20px;
  }

  .date-box .d-mon {
    font-size: 9px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    opacity: 0.9;
    margin-top: 2px;
  }

  .date-full {
    font-size: 12px;
    color: var(--text-secondary);
  }

  /* Day pill */
  .day-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    background: var(--bg-secondary);
    color: var(--primary);
    border: 1px solid var(--border-color);
  }

  .day-pill i {
    font-size: 14px;
  }

  /* Holiday name cell */
  .holiday-name-cell {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
    color: var(--text-primary);
  }

  .holiday-emoji {
    font-size: 24px;
    line-height: 1;
  }

  /* Status indicator */
  .status-dot {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    font-weight: 600;
    padding: 5px 12px;
    border-radius: 20px;
  }

  .status-dot.upcoming {
    background: rgba(34, 197, 94, 0.12);
    color: #22c55e;
    border: 1px solid rgba(34, 197, 94, 0.3);
  }

  .status-dot.passed {
    background: rgba(245, 158, 11, 0.12);
    color: #f59e0b;
    border: 1px solid rgba(245, 158, 11, 0.3);
  }

  .status-dot.is-today {
    background: rgba(99, 102, 241, 0.12);
    color: var(--primary);
    border: 1px solid rgba(99, 102, 241, 0.3);
  }

  /* Action Buttons */
  .action-buttons {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
  }

  .btn-action {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 10px;
    font-size: 11px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.2s ease;
  }

  .btn-edit {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: #fff;
    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
  }

  .btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(59, 130, 246, 0.4);
    color: #fff;
  }

  .btn-delete {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: #fff;
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
  }

  .btn-delete:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(239, 68, 68, 0.4);
    color: #fff;
  }

  /* ── Modal Styles ── */
  .modal-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    z-index: 9998;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(4px);
  }

  .modal-overlay.active {
    display: flex;
  }

  .modal-custom {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    width: 90%;
    max-width: 500px;
  }

  .modal-custom.active {
    display: block;
  }

  .modal-content.enhanced {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px var(--shadow-lg);
    background: var(--bg-primary);
  }

  .modal-header.enhanced {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    border: none;
    padding: 18px 24px;
  }

  .modal-header.enhanced .modal-title {
    color: #fff;
    font-weight: 700;
    font-size: 18px;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .modal-header.enhanced .btn-close-custom {
    background: rgba(255, 255, 255, 0.2);
    border: none;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    color: #fff;
    font-size: 18px;
  }

  .modal-header.enhanced .btn-close-custom:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: rotate(90deg);
  }

  .modal-body.enhanced {
    padding: 28px 24px;
  }

  .modal-body.enhanced .form-label {
    font-weight: 600;
    font-size: 13px;
    color: var(--text-secondary);
    margin-bottom: 8px;
  }

  .modal-body.enhanced .form-label i {
    margin-right: 6px;
    color: var(--primary);
  }

  .modal-body.enhanced .form-control {
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 10px 14px;
    font-size: 13px;
    transition: all 0.3s ease;
    background: var(--bg-secondary);
    color: var(--text-primary);
    width: 100%;
  }

  .modal-body.enhanced .form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
    background: var(--bg-primary);
    outline: none;
  }

  .modal-footer.enhanced {
    border: none;
    padding: 16px 24px 24px;
    gap: 12px;
    display: flex;
    justify-content: flex-end;
  }

  .btn-save-holiday {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 28px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 700;
    border: none;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    box-shadow: 0 4px 16px rgba(99, 102, 241, 0.35);
    transition: all 0.25s ease;
    cursor: pointer;
  }

  .btn-save-holiday:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.45);
  }

  .btn-cancel {
    padding: 10px 22px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 600;
    border: 2px solid var(--border-color);
    background: var(--bg-secondary);
    color: var(--text-secondary);
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .btn-cancel:hover {
    border-color: var(--text-tertiary);
    background: var(--bg-tertiary);
    color: var(--text-primary);
  }

  /* ── Empty State ── */
  .empty-state {
    text-align: center;
    padding: 80px 20px;
  }

  .empty-state .empty-icon {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: var(--bg-secondary);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
    border: 2px dashed var(--border-color);
  }

  .empty-state .empty-icon i {
    font-size: 48px;
    color: var(--text-tertiary);
  }

  .empty-state h6 {
    color: var(--text-primary);
    font-weight: 700;
    font-size: 18px;
    margin-bottom: 8px;
  }

  .empty-state p {
    color: var(--text-secondary);
    font-size: 14px;
    margin: 0;
  }

  /* ── Animations ── */
  @keyframes fadeUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .fade-up {
    animation: fadeUp 0.5s ease forwards;
  }

  .fade-d1 {
    animation-delay: 0.08s;
    opacity: 0;
  }

  .fade-d2 {
    animation-delay: 0.15s;
    opacity: 0;
  }

  .fade-d3 {
    animation-delay: 0.22s;
    opacity: 0;
  }

  .fade-d4 {
    animation-delay: 0.29s;
    opacity: 0;
  }

  /* ── Responsive ── */
  @media (max-width: 768px) {
    .summary-strip {
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 12px;
    }

    .strip-card {
      padding: 14px 16px;
    }

    .strip-card .strip-count {
      font-size: 28px;
    }

    .holiday-table thead th {
      padding: 10px 12px;
      font-size: 10px;
    }

    .holiday-table tbody td {
      padding: 12px 12px;
    }

    .date-box {
      width: 42px;
      height: 42px;
    }

    .date-box .d-num {
      font-size: 16px;
    }

    .page-header-wrap {
      flex-direction: column;
      align-items: flex-start;
    }

    .header-actions {
      width: 100%;
    }

    .year-selector {
      flex: 1;
    }
  }

  @media (max-width: 576px) {
    .date-cell {
      flex-direction: column;
      align-items: flex-start;
      gap: 6px;
    }

    .action-buttons {
      flex-direction: column;
    }

    .btn-action {
      width: 100%;
      justify-content: center;
    }
  }
</style>

<div class="page-wrapper holiday-page">
  <div class="page-content">

    <!-- Enhanced Breadcrumb -->
    <div class="page-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2 fade-up">
      <div class="d-flex align-items-center">
        <div class="breadcrumb-title pe-2">
          <i class="bx bx-calendar-star me-1"></i> Holiday Management
        </div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="<?= base_url('admin/dashboard') ?>"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active">Company Holidays</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Page Header -->
    <div class="page-header-wrap fade-up fade-d1">
      <div class="title-section">
        <h4><i class="bx bx-party"></i> Company Holidays – <?= $year ?></h4>
        <p>Manage and track all company holidays for the year</p>
      </div>
      <div class="header-actions">
        <form method="get" id="yearForm">
          <div class="year-selector">
            <i class="bx bx-calendar"></i>
            <select name="year" onchange="document.getElementById('yearForm').submit()">
              <?php for ($y = date('Y') - 1; $y <= date('Y') + 2; $y++): ?>
                <option value="<?= $y ?>" <?= ($y == $year) ? 'selected' : '' ?>>
                  <?= $y ?>
                </option>
              <?php endfor; ?>
            </select>
          </div>
        </form>
        <button class="btn-add-holiday" onclick="openAddHolidayModal()">
          <i class="bx bx-plus-circle"></i> Add Holiday
        </button>
      </div>
    </div>

    <!-- Summary Strip -->
    <?php
    $total_holidays = count($holidays);
    $upcoming_c = 0;
    $past_c = 0;
    $today = date('Y-m-d');
    if (!empty($holidays)) {
      foreach ($holidays as $h) {
        if ($h->holiday_date >= $today) $upcoming_c++;
        else $past_c++;
      }
    }
    ?>
    <div class="summary-strip">
      <div class="strip-card strip-total fade-up fade-d2">
        <div class="strip-left">
          <div class="strip-count"><?= $total_holidays ?></div>
          <div class="strip-label">Total Holidays</div>
        </div>
        <div class="strip-icon"><i class="bx bx-calendar-star"></i></div>
      </div>
      <div class="strip-card strip-upcoming fade-up fade-d3">
        <div class="strip-left">
          <div class="strip-count"><?= $upcoming_c ?></div>
          <div class="strip-label">Upcoming</div>
        </div>
        <div class="strip-icon"><i class="bx bx-calendar-check"></i></div>
      </div>
      <div class="strip-card strip-past fade-up fade-d4">
        <div class="strip-left">
          <div class="strip-count"><?= $past_c ?></div>
          <div class="strip-label">Passed</div>
        </div>
        <div class="strip-icon"><i class="bx bx-calendar-minus"></i></div>
      </div>
    </div>

    <!-- Holidays Table Card -->
    <div class="card fade-up fade-d4">
      <div class="card-body" style="padding: 24px;">

        <div class="table-responsive">
          <table class="holiday-table">
            <thead>
              <tr>
                <th><i class="bx bx-calendar"></i> Date</th>
                <th><i class="bx bx-calendar-week"></i> Day</th>
                <th><i class="bx bx-star"></i> Holiday Name</th>
                <th><i class="bx bx-info-circle"></i> Status</th>
                <th><i class="bx bx-cog"></i> Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($holidays)): ?>
                <?php foreach ($holidays as $h):
                  $hDate    = strtotime($h->holiday_date);
                  $dayNum   = date('d', $hDate);
                  $monthAbr = date('M', $hDate);
                  $fullDate = date('d M Y', $hDate);
                  $dayName  = $h->day;
                  $isToday  = (date('Y-m-d', $hDate) == $today);
                  $isPast   = (date('Y-m-d', $hDate) < $today);

                  $rowClass = '';
                  if ($isToday) $rowClass = 'today-holiday';
                  elseif ($isPast) $rowClass = 'past-holiday';
                ?>
                  <tr class="<?= $rowClass ?>">
                    <td>
                      <div class="date-cell">
                        <div class="date-box">
                          <span class="d-num"><?= $dayNum ?></span>
                          <span class="d-mon"><?= $monthAbr ?></span>
                        </div>
                        <span class="date-full"><?= $fullDate ?></span>
                      </div>
                    </td>
                    <td>
                      <span class="day-pill">
                        <i class="bx bx-calendar-week"></i>
                        <?= $dayName ?>
                      </span>
                    </td>
                    <td>
                      <div class="holiday-name-cell">
                        <span class="holiday-emoji">🎉</span>
                        <?= htmlspecialchars($h->holiday_name) ?>
                      </div>
                    </td>
                    <td>
                      <?php if ($isToday): ?>
                        <span class="status-dot is-today">
                          <i class="bx bxs-circle" style="font-size: 8px;"></i> Today
                        </span>
                      <?php elseif ($isPast): ?>
                        <span class="status-dot passed">
                          <i class="bx bxs-circle" style="font-size: 8px;"></i> Passed
                        </span>
                      <?php else: ?>
                        <span class="status-dot upcoming">
                          <i class="bx bxs-circle" style="font-size: 8px;"></i> Upcoming
                        </span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <div class="action-buttons">
                        <button class="btn-action btn-edit" onclick="openEditModal(<?= $h->id ?>, '<?= date('Y-m-d', strtotime($h->holiday_date)) ?>', '<?= htmlspecialchars($h->holiday_name) ?>')">
                          <i class="bx bx-edit"></i> Edit
                        </button>
                        <a href="<?= base_url('admin/holidays/delete/' . $h->id) ?>"
                          class="btn-action btn-delete"
                          onclick="return confirmSweetAction(this, 'Are you sure you want to delete this holiday?')">
                          <i class="bx bx-trash"></i> Delete
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5">
                    <div class="empty-state">
                      <div class="empty-icon">
                        <i class="bx bx-calendar-x"></i>
                      </div>
                      <h6>No Holidays Found</h6>
                      <p>No holidays have been added for <?= $year ?> yet.</p>
                      <button class="btn-add-holiday" style="margin-top: 16px;" onclick="openAddHolidayModal()">
                        <i class="bx bx-plus-circle"></i> Add First Holiday
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>

  </div>
</div>

<!-- Modal Overlay -->
<div id="modalOverlay" class="modal-overlay" onclick="closeAllModals()"></div>

<!-- Add Holiday Modal -->
<div id="addHolidayModal" class="modal-custom">
  <div class="modal-dialog modal-dialog-centered" style="margin: 0;">
    <form method="post" action="<?= base_url('admin/holidays/add') ?>" class="modal-content enhanced">
      <div class="modal-header enhanced">
        <h5 class="modal-title">
          <i class="bx bx-calendar-plus"></i> Add New Holiday
        </h5>
        <button type="button" class="btn-close-custom" onclick="closeAddHolidayModal()">✕</button>
      </div>
      <div class="modal-body enhanced">
        <div class="mb-3">
          <label class="form-label">
            <i class="bx bx-calendar"></i> Holiday Date
          </label>
          <input type="date" name="holiday_date" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">
            <i class="bx bx-edit-alt"></i> Holiday Name
          </label>
          <input type="text" name="holiday_name" class="form-control" placeholder="e.g. Independence Day, Christmas, New Year" required>
        </div>
      </div>
      <div class="modal-footer enhanced">
        <button type="button" class="btn-cancel" onclick="closeAddHolidayModal()">Cancel</button>
        <button type="submit" class="btn-save-holiday">
          <i class="bx bx-save"></i> Save Holiday
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Edit Holiday Modal -->
<div id="editHolidayModal" class="modal-custom">
  <div class="modal-dialog modal-dialog-centered" style="margin: 0;">
    <form method="post" action="" id="editHolidayForm" class="modal-content enhanced">
      <div class="modal-header enhanced">
        <h5 class="modal-title">
          <i class="bx bx-edit-alt"></i> Edit Holiday
        </h5>
        <button type="button" class="btn-close-custom" onclick="closeEditModal()">✕</button>
      </div>
      <div class="modal-body enhanced">
        <div class="mb-3">
          <label class="form-label">
            <i class="bx bx-calendar"></i> Holiday Date
          </label>
          <input type="date" name="holiday_date" id="editHolidayDate" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">
            <i class="bx bx-edit"></i> Holiday Name
          </label>
          <input type="text" name="holiday_name" id="editHolidayName" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer enhanced">
        <button type="button" class="btn-cancel" onclick="closeEditModal()">Cancel</button>
        <button type="submit" class="btn-save-holiday">
          <i class="bx bx-check-circle"></i> Update Holiday
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  // Modal functions
  function openAddHolidayModal() {
    document.getElementById('addHolidayModal').style.display = 'block';
    document.getElementById('modalOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeAddHolidayModal() {
    document.getElementById('addHolidayModal').style.display = 'none';
    document.getElementById('modalOverlay').classList.remove('active');
    document.body.style.overflow = '';
  }

  function openEditModal(id, date, name) {
    var form = document.getElementById('editHolidayForm');
    form.action = '<?= base_url('admin/holidays/update/') ?>' + id;
    document.getElementById('editHolidayDate').value = date;
    document.getElementById('editHolidayName').value = name;
    document.getElementById('editHolidayModal').style.display = 'block';
    document.getElementById('modalOverlay').classList.add('active');
    document.body.style.overflow = 'hidden';
  }

  function closeEditModal() {
    document.getElementById('editHolidayModal').style.display = 'none';
    document.getElementById('modalOverlay').classList.remove('active');
    document.body.style.overflow = '';
  }

  function closeAllModals() {
    closeAddHolidayModal();
    closeEditModal();
  }

  // Auto-dismiss flash messages
  setTimeout(function() {
    document.querySelectorAll('.custom-alert, .alert-custom, .alert').forEach(function(el) {
      if (el) {
        el.style.transition = 'opacity 0.5s';
        el.style.opacity = '0';
        setTimeout(function() {
          if (el && el.remove) el.remove();
        }, 500);
      }
    });
  }, 5000);
</script>
