<style>
  /* ── General ── */
  .att-page .card {
    border: none;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    overflow: hidden;
  }

  /* ── Summary Cards ── */
  .summary-card {
    position: relative;
    border: none;
    border-radius: 16px;
    overflow: hidden;
    transition: transform .25s ease, box-shadow .25s ease;
  }
  .summary-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 32px rgba(0,0,0,.12);
  }
  .summary-card .card-body {
    padding: 28px 20px;
    z-index: 1;
    position: relative;
  }
  .summary-card.present {
    background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
  }
  .summary-card.absent {
    background: linear-gradient(135deg, #fbc2eb 0%, #f8a4a4 100%);
  }
  .summary-card .icon-circle {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 12px;
  }
  .summary-card.present .icon-circle {
    background: rgba(255,255,255,.45);
    color: #1b7a2b;
  }
  .summary-card.absent .icon-circle {
    background: rgba(255,255,255,.45);
    color: #c0392b;
  }
  .summary-card .count {
    font-size: 42px;
    font-weight: 800;
    line-height: 1;
    margin-bottom: 4px;
  }
  .summary-card.present .count { color: #145a20; }
  .summary-card.absent  .count { color: #8b1a1a; }
  .summary-card .label {
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .8px;
  }
  .summary-card.present .label { color: #1b7a2b; }
  .summary-card.absent  .label { color: #a12222; }
  .summary-card .month-text {
    font-size: 12px;
    margin-top: 6px;
    opacity: .7;
  }
  /* decorative blob */
  .summary-card::before {
    content: '';
    position: absolute;
    width: 140px;
    height: 140px;
    border-radius: 50%;
    top: -40px;
    right: -30px;
    background: rgba(255,255,255,.25);
  }
  .summary-card::after {
    content: '';
    position: absolute;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    bottom: -20px;
    left: -20px;
    background: rgba(255,255,255,.2);
  }

  /* ── Month Picker ── */
  .month-picker-wrap {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #f0f4ff;
    padding: 6px 16px;
    border-radius: 12px;
  }
  .month-picker-wrap i {
    font-size: 20px;
    color: #5b73e8;
  }
  .month-picker-wrap input[type="month"] {
    border: none;
    background: transparent;
    font-weight: 600;
    font-size: 14px;
    color: #333;
    outline: none;
    cursor: pointer;
  }

  /* ── Table ── */
  .att-table {
    border-collapse: separate;
    border-spacing: 0 8px;
    width: 100%;
  }
  .att-table thead th {
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    border: none;
    padding: 14px 18px;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: .6px;
    font-weight: 700;
  }
  .att-table thead th:first-child { border-radius: 12px 0 0 12px; }
  .att-table thead th:last-child  { border-radius: 0 12px 12px 0; }

  .att-table tbody tr {
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,.04);
    transition: transform .2s ease, box-shadow .2s ease;
  }
  .att-table tbody tr:hover {
    transform: scale(1.01);
    box-shadow: 0 4px 16px rgba(0,0,0,.09);
  }
  .att-table tbody td {
    padding: 14px 18px;
    border: none;
    vertical-align: middle;
    font-size: 14px;
    color: #444;
  }
  .att-table tbody td:first-child { border-radius: 12px 0 0 12px; }
  .att-table tbody td:last-child  { border-radius: 0 12px 12px 0; }

  /* Status badges */
  .status-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 14px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
  }
  .status-pill.present {
    background: #e6f9ee;
    color: #1b7a2b;
  }
  .status-pill.absent {
    background: #fde8e8;
    color: #c0392b;
  }
  .status-pill i { font-size: 14px; }

  /* Date & time cells */
  .date-cell {
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 600;
  }
  .date-cell .day-box {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 15px;
  }
  .date-cell .date-text span {
    display: block;
    font-size: 11px;
    color: #999;
    font-weight: 400;
  }

  .time-cell {
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .time-cell i {
    color: #5b73e8;
    font-size: 18px;
  }

  /* Empty state */
  .empty-state {
    text-align: center;
    padding: 50px 20px;
  }
  .empty-state i {
    font-size: 52px;
    color: #ccc;
    margin-bottom: 14px;
  }
  .empty-state p {
    color: #999;
    font-size: 15px;
  }

  /* Fade-in animation */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(18px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  .fade-up {
    animation: fadeUp .5s ease forwards;
  }
  .fade-up-d1 { animation-delay: .1s; opacity: 0; }
  .fade-up-d2 { animation-delay: .2s; opacity: 0; }
  .fade-up-d3 { animation-delay: .3s; opacity: 0; }
</style>

<div class="page-wrapper att-page">
  <div class="page-content">

    <!-- Breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3 fade-up">
      <div class="breadcrumb-title pe-3" style="font-weight:700;font-size:18px;">
        <i class="bx bx-calendar-check me-1" style="color:#667eea;"></i>
        Attendance Details
      </div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item">
              <a href="<?= base_url('admin/dashboard') ?>">
                <i class="bx bx-home-alt"></i>
              </a>
            </li>
            <li class="breadcrumb-item active">View Details</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Summary Cards -->
    <div class="row mb-4 g-3">

      <!-- Present -->
      <div class="col-sm-6 fade-up fade-up-d1">
        <div class="card summary-card present">
          <div class="card-body text-center">
            <div class="icon-circle">
              <i class="bx bx-check-circle"></i>
            </div>
            <div class="count"><?= $present_count ?></div>
            <div class="label">Present</div>
            <div class="month-text">
              <?= date('F Y', strtotime($year.'-'.$month.'-01')) ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Absent -->
      <div class="col-sm-6 fade-up fade-up-d2">
        <div class="card summary-card absent">
          <div class="card-body text-center">
            <div class="icon-circle">
              <i class="bx bx-x-circle"></i>
            </div>
            <div class="count"><?= $absent_count ?></div>
            <div class="label">Absent</div>
            <div class="month-text">
              <?= date('F Y', strtotime($year.'-'.$month.'-01')) ?>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Main Card -->
    <div class="card fade-up fade-up-d3">
      <div class="card-body" style="padding:28px;">

        <!-- Month Picker -->
        <form method="get" class="mb-4">
          <div class="month-picker-wrap">
            <i class="bx bx-calendar"></i>
            <input
              type="month"
              name="month_year"
              value="<?= $year.'-'.$month ?>"
              onchange="this.form.submit()"
            >
          </div>
        </form>

        <!-- Table -->
        <div class="table-responsive">
          <table class="att-table">
            <thead>
              <tr>
                <th><i class="bx bx-calendar me-1"></i>Date</th>
                <th><i class="bx bx-time me-1"></i>Time</th>
                <th><i class="bx bx-info-circle me-1"></i>Status</th>
              </tr>
            </thead>
            <tbody>
<?php if(!empty($rows)): ?>
  <?php foreach($rows as $r):
    $dateObj   = strtotime($r->attendance_date);
    $day       = date('d', $dateObj);
    $monthYear = date('M Y', $dateObj);
    $dayName   = date('l', $dateObj);
    $isPres    = ($r->status == 'Present');
  ?>
              <tr>
                <td>
                  <div class="date-cell">
                    <div class="day-box"><?= $day ?></div>
                    <div class="date-text">
                      <?= $dayName ?>
                      <span><?= $monthYear ?></span>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="time-cell">
                    <i class="bx bx-time-five"></i>
                    <?= date('h:i A', strtotime($r->created_at)) ?>
                  </div>
                </td>
                <td>
                  <span class="status-pill <?= $isPres ? 'present' : 'absent' ?>">
                    <i class="bx <?= $isPres ? 'bx-check' : 'bx-x' ?>"></i>
                    <?= $r->status ?>
                  </span>
                </td>
              </tr>
  <?php endforeach; ?>
<?php else: ?>
              <tr>
                <td colspan="3">
                  <div class="empty-state">
                    <i class="bx bx-calendar-x d-block"></i>
                    <p class="mb-0">No attendance records found for this month.</p>
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