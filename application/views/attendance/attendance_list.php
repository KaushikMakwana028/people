<?php
// attendance_list.php — Enhanced Employee Attendance Page
// Compatible with CodeIgniter. Drop this in your views folder.
// Variables expected: $employees (array), $present_today (int), $absent_today (int)
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&family=Sora:wght@400;600;700;800&display=swap');

  /* ── Reset & Root ── */
  .att-page *,
  .att-page *::before,
  .att-page *::after {
    box-sizing: border-box;
  }

  .att-page {
    --p: #5b5ef4;
    --p2: #7c3aed;
    --p-soft: rgba(91, 94, 244, .10);
    --p-glow: rgba(91, 94, 244, .22);
    --ok: #0ea572;
    --ok-soft: rgba(14, 165, 114, .10);
    --err: #f04755;
    --err-soft: rgba(240, 71, 85, .10);
    --warn: #f59e0b;
    --warn-soft: rgba(245, 158, 11, .10);

    --text: #0d1117;
    --sub: #4b5563;
    --faint: #9ca3af;
    --bg: #f0f2f8;
    --card: #ffffff;
    --soft: #f7f8fc;
    --border: #e4e7ef;
    --sh: 0 2px 16px rgba(15, 20, 50, .07);
    --sh-md: 0 8px 32px rgba(15, 20, 50, .10);
    --sh-lg: 0 20px 56px rgba(15, 20, 50, .13);

    font-family: 'Nunito', sans-serif;
    background: var(--bg);
    min-height: 100vh;
    color: var(--text);
  }

  [data-bs-theme=dark] .att-page {
    --text: #f1f5f9;
    --sub: #94a3b8;
    --faint: #64748b;
    --bg: #0e1117;
    --card: #161b27;
    --soft: #1a2030;
    --border: #252d40;
    --sh: 0 2px 16px rgba(0, 0, 0, .35);
    --sh-md: 0 8px 32px rgba(0, 0, 0, .45);
    --sh-lg: 0 20px 56px rgba(0, 0, 0, .55);
  }

  .att-page .page-content {
    padding: 28px 24px;
  }

  .att-shell {
    max-width: 1280px;
    margin: 0 auto;
  }

  /* ── Breadcrumb ── */
  .att-bc {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 12.5px;
    color: var(--faint);
    margin-bottom: 24px;
    font-weight: 600;
  }

  .att-bc a {
    color: var(--p);
    text-decoration: none;
    transition: opacity .15s;
  }

  .att-bc a:hover {
    opacity: .75;
  }

  .att-bc i {
    font-size: 14px;
  }

  /* ── Page Header ── */
  .att-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 28px;
    animation: fadeUp .5s ease both;
  }

  .att-header-left {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .att-hicon {
    width: 58px;
    height: 58px;
    border-radius: 18px;
    flex-shrink: 0;
    background: linear-gradient(135deg, var(--p), var(--p2));
    display: grid;
    place-items: center;
    color: #fff;
    font-size: 27px;
    box-shadow: 0 10px 28px var(--p-glow);
  }

  .att-htitle {
    font-family: 'Sora', sans-serif;
  }

  .att-htitle h1 {
    font-size: 24px;
    font-weight: 800;
    color: var(--text);
    letter-spacing: -.03em;
    margin: 0 0 4px;
  }

  .att-htitle p {
    font-size: 13px;
    color: var(--sub);
    margin: 0;
  }

  .att-header-right {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
  }

  .btn-export {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    height: 40px;
    padding: 0 18px;
    border-radius: 11px;
    border: 1.5px solid var(--border);
    background: var(--card);
    color: var(--sub);
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    font-family: inherit;
    transition: all .2s;
  }

  .btn-export:hover {
    border-color: var(--p);
    color: var(--p);
    background: var(--p-soft);
  }

  .btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    height: 40px;
    padding: 0 18px;
    border-radius: 11px;
    border: none;
    background: linear-gradient(135deg, var(--p), var(--p2));
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    font-family: inherit;
    box-shadow: 0 4px 14px var(--p-glow);
    transition: all .2s;
  }

  .btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 8px 20px var(--p-glow);
  }

  /* ── Stats Grid ── */
  .att-stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 24px;
  }

  .att-stat {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 18px;
    box-shadow: var(--sh);
    padding: 20px;
    position: relative;
    overflow: hidden;
    animation: fadeUp .5s ease both;
    transition: transform .2s, box-shadow .2s;
  }

  .att-stat:hover {
    transform: translateY(-3px);
    box-shadow: var(--sh-md);
  }

  .att-stat:nth-child(1) {
    animation-delay: .05s;
  }

  .att-stat:nth-child(2) {
    animation-delay: .10s;
  }

  .att-stat:nth-child(3) {
    animation-delay: .15s;
  }

  .att-stat:nth-child(4) {
    animation-delay: .20s;
  }

  .att-stat::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--sc), transparent);
    border-radius: 18px 18px 0 0;
  }

  .att-stat::after {
    content: '';
    position: absolute;
    top: -18px;
    right: -18px;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: var(--sb);
    pointer-events: none;
  }

  .stat-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
  }

  .stat-icon {
    width: 46px;
    height: 46px;
    border-radius: 14px;
    background: var(--sb);
    color: var(--sc);
    font-size: 22px;
    display: grid;
    place-items: center;
  }

  .stat-trend {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 11.5px;
    font-weight: 700;
    padding: 4px 9px;
    border-radius: 999px;
    background: var(--sb);
    color: var(--sc);
  }

  .stat-num {
    font-family: 'Sora', sans-serif;
    font-size: 32px;
    font-weight: 800;
    color: var(--text);
    line-height: 1;
    margin: 14px 0 6px;
  }

  .stat-label {
    font-size: 11.5px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .07em;
    color: var(--faint);
  }

  /* ── Main Card ── */
  .att-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 20px;
    box-shadow: var(--sh);
    overflow: hidden;
    animation: fadeUp .5s .25s ease both;
  }

  .att-card-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    padding: 20px 24px;
    border-bottom: 1px solid var(--border);
  }

  .att-card-title {
    display: flex;
    align-items: center;
    gap: 10px;
    font-family: 'Sora', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: var(--text);
  }

  .att-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 26px;
    height: 26px;
    padding: 0 8px;
    border-radius: 999px;
    background: linear-gradient(135deg, var(--p), var(--p2));
    color: #fff;
    font-size: 12px;
    font-weight: 800;
  }

  .att-tools {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .att-search {
    position: relative;
  }

  .att-search i {
    position: absolute;
    left: 13px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--faint);
    font-size: 16px;
    pointer-events: none;
  }

  .att-search input {
    height: 40px;
    width: 260px;
    border: 1.5px solid var(--border);
    border-radius: 11px;
    background: var(--soft);
    color: var(--text);
    padding: 0 13px 0 38px;
    font-size: 13px;
    font-weight: 600;
    outline: none;
    font-family: inherit;
    transition: all .2s;
  }

  .att-search input:focus {
    border-color: var(--p);
    background: var(--card);
    box-shadow: 0 0 0 3px var(--p-soft);
  }

  .att-search input::placeholder {
    color: var(--faint);
    font-weight: 500;
  }

  .att-select {
    height: 40px;
    padding: 0 14px;
    border-radius: 11px;
    border: 1.5px solid var(--border);
    background: var(--soft);
    color: var(--sub);
    font-size: 13px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
    outline: none;
    transition: border-color .2s;
  }

  .att-select:focus {
    border-color: var(--p);
  }

  /* ── Date bar ── */
  .att-datebar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 24px;
    background: var(--soft);
    border-bottom: 1px solid var(--border);
    font-size: 13px;
    font-weight: 600;
    color: var(--sub);
  }

  .att-datebar-left {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .att-datebar strong {
    color: var(--text);
  }

  /* ── Table ── */
  .att-table-wrap {
    overflow-x: auto;
  }

  .att-table {
    width: 100%;
    min-width: 680px;
    border-collapse: collapse;
  }

  .att-table thead th {
    background: var(--soft);
    padding: 13px 24px;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: var(--faint);
    text-align: left;
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
  }

  .att-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background .15s;
  }

  .att-table tbody tr:last-child {
    border-bottom: none;
  }

  .att-table tbody tr:hover {
    background: var(--soft);
  }

  .att-table td {
    padding: 14px 24px;
    vertical-align: middle;
  }

  /* Serial */
  .t-serial {
    width: 30px;
    height: 30px;
    border-radius: 9px;
    background: var(--soft);
    border: 1px solid var(--border);
    display: grid;
    place-items: center;
    font-size: 12px;
    font-weight: 800;
    color: var(--faint);
  }

  /* Employee cell */
  .t-emp {
    display: flex;
    align-items: center;
    gap: 13px;
  }

  .t-avatar {
    position: relative;
    width: 42px;
    height: 42px;
    flex-shrink: 0;
  }

  .t-avatar img,
  .t-avatar-init {
    width: 42px;
    height: 42px;
    border-radius: 13px;
    object-fit: cover;
  }

  .t-avatar-init {
    display: grid;
    place-items: center;
    background: linear-gradient(135deg, var(--p), var(--p2));
    color: #fff;
    font-size: 14px;
    font-weight: 800;
  }

  .t-dot {
    position: absolute;
    right: -2px;
    bottom: -2px;
    width: 11px;
    height: 11px;
    border-radius: 50%;
    border: 2px solid var(--card);
    background: var(--ok);
  }

  .t-name {
    font-weight: 700;
    font-size: 14px;
    color: var(--text);
  }

  .t-role {
    font-size: 12px;
    color: var(--faint);
    margin-top: 2px;
    font-weight: 500;
  }

  /* Department chip */
  .t-dept {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    border-radius: 7px;
    background: var(--p-soft);
    color: var(--p);
    font-size: 11.5px;
    font-weight: 700;
  }

  /* Status pill */
  .t-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
  }

  .t-status .sdot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: currentColor;
  }

  .t-status.present {
    background: var(--ok-soft);
    color: var(--ok);
  }

  .t-status.absent {
    background: var(--err-soft);
    color: var(--err);
  }

  .t-status.late {
    background: var(--warn-soft);
    color: var(--warn);
  }

  .t-status.not-marked {
    background: rgba(148, 163, 184, 0.15);
    color: var(--faint);
  }

  /* Time chip */
  .t-time {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 13px;
    font-weight: 600;
    color: var(--sub);
  }

  .t-time i {
    color: var(--faint);
  }

  .t-time.no-time {
    color: var(--faint);
    font-style: italic;
  }

  /* ✅ Action button — compact & refined */
  .t-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 14px;
    border-radius: 10px;
    background: linear-gradient(135deg, var(--p), var(--p2));
    color: #fff;
    font-size: 12.5px;
    font-weight: 700;
    text-decoration: none;
    white-space: nowrap;
    box-shadow: 0 3px 10px var(--p-glow);
    transition: all .2s;
    border: none;
    cursor: pointer;
    font-family: inherit;
  }

  .t-btn:hover {
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 6px 18px var(--p-glow);
  }

  .t-btn:active {
    transform: translateY(0);
  }

  /* ── Footer ── */
  .att-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 24px;
    border-top: 1px solid var(--border);
    font-size: 13px;
    color: var(--sub);
    font-weight: 600;
    background: var(--soft);
  }

  .att-footer strong {
    color: var(--text);
  }

  .att-pagination {
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .pg-btn {
    width: 32px;
    height: 32px;
    border-radius: 9px;
    border: 1.5px solid var(--border);
    background: var(--card);
    color: var(--sub);
    font-size: 12px;
    font-weight: 700;
    display: grid;
    place-items: center;
    cursor: pointer;
    transition: all .15s;
    font-family: inherit;
  }

  .pg-btn:hover {
    border-color: var(--p);
    color: var(--p);
    background: var(--p-soft);
  }

  .pg-btn.active {
    background: linear-gradient(135deg, var(--p), var(--p2));
    border-color: transparent;
    color: #fff;
    box-shadow: 0 3px 10px var(--p-glow);
  }

  /* ── Empty state ── */
  .att-empty {
    text-align: center;
    padding: 64px 32px;
    color: var(--faint);
  }

  .att-empty-icon {
    width: 72px;
    height: 72px;
    border-radius: 20px;
    background: var(--soft);
    border: 2px dashed var(--border);
    display: grid;
    place-items: center;
    margin: 0 auto 18px;
    font-size: 32px;
    color: var(--faint);
  }

  .att-empty h5 {
    font-size: 17px;
    font-weight: 700;
    color: var(--sub);
    margin: 0 0 6px;
  }

  .att-empty p {
    font-size: 13px;
    margin: 0;
  }

  /* ── Animations ── */
  @keyframes fadeUp {
    from {
      opacity: 0;
      transform: translateY(16px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* ── Responsive ── */
  @media (max-width: 1024px) {
    .att-stats {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 768px) {
    .att-page .page-content {
      padding: 16px 14px;
    }

    .att-header {
      flex-direction: column;
    }

    .att-header-right {
      width: 100%;
    }

    .att-header-right button {
      flex: 1;
      justify-content: center;
    }

    .att-stats {
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .att-card-head {
      flex-direction: column;
      align-items: stretch;
      gap: 12px;
    }

    .att-tools {
      flex-direction: column;
    }

    .att-search,
    .att-search input,
    .att-select {
      width: 100%;
    }

    .att-footer {
      flex-direction: column;
      gap: 10px;
      align-items: flex-start;
    }

    .att-datebar {
      flex-direction: column;
      align-items: flex-start;
      gap: 4px;
    }
  }

  @media (max-width: 480px) {
    .att-stats {
      grid-template-columns: 1fr;
    }
  }
</style>

<div class="page-wrapper att-page">
  <div class="page-content">
    <div class="att-shell">

      <!-- Breadcrumb -->
      <div class="att-bc">
        <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Home</a>
        <i class='bx bx-chevron-right'></i>
        <span>Attendance</span>
        <i class='bx bx-chevron-right'></i>
        <span>Employee List</span>
      </div>

      <!-- Header -->
      <div class="att-header">
        <div class="att-header-left">
          <div class="att-hicon"><i class='bx bx-calendar-check'></i></div>
          <div class="att-htitle">
            <h1>Employee Attendance</h1>
            <p>Track and manage daily attendance records for all employees</p>
          </div>
        </div>
        <div class="att-header-right">
          <button type="button" class="btn-export">
            <i class='bx bx-download'></i> Export
          </button>
          <button type="button" class="btn-primary">
            <i class='bx bx-plus'></i> Mark Attendance
          </button>
        </div>
      </div>

      <!-- Stats -->
      <div class="att-stats">
        <div class="att-stat" style="--sc:var(--p);--sb:var(--p-soft)">
          <div class="stat-row">
            <div class="stat-icon"><i class='bx bx-group'></i></div>
            <span class="stat-trend"><i class='bx bx-trending-up'></i> All</span>
          </div>
          <div class="stat-num"><?= !empty($employees) ? count($employees) : 0 ?></div>
          <div class="stat-label">Total Employees</div>
        </div>

        <div class="att-stat" style="--sc:var(--ok);--sb:var(--ok-soft)">
          <div class="stat-row">
            <div class="stat-icon"><i class='bx bx-check-circle'></i></div>
            <span class="stat-trend"><i class='bx bx-user-check'></i> Today</span>
          </div>
          <div class="stat-num"><?= (int)($present_today ?? 0) ?></div>
          <div class="stat-label">Present Today</div>
        </div>

        <div class="att-stat" style="--sc:var(--err);--sb:var(--err-soft)">
          <div class="stat-row">
            <div class="stat-icon"><i class='bx bx-x-circle'></i></div>
            <span class="stat-trend"><i class='bx bx-user-x'></i> Today</span>
          </div>
          <div class="stat-num"><?= (int)($absent_today ?? 0) ?></div>
          <div class="stat-label">Absent Today</div>
        </div>

        <div class="att-stat" style="--sc:var(--warn);--sb:var(--warn-soft)">
          <div class="stat-row">
            <div class="stat-icon"><i class='bx bx-time-five'></i></div>
            <span class="stat-trend"><i class='bx bx-alarm'></i> Today</span>
          </div>
          <div class="stat-num"><?= (int)($late_today ?? 0) ?: '—' ?></div>
          <div class="stat-label">Late Arrivals</div>
        </div>
      </div>

      <!-- Main Card -->
      <div class="att-card">

        <!-- Card Header -->
        <div class="att-card-head">
          <div class="att-card-title">
            <i class='bx bx-list-ul' style="color:var(--p)"></i>
            Employee List
            <span class="att-badge" id="empCount"><?= !empty($employees) ? count($employees) : 0 ?></span>
          </div>
          <div class="att-tools">
            <div class="att-search">
              <i class='bx bx-search'></i>
              <input type="text" id="attSearch" placeholder="Search by name..." autocomplete="off">
            </div>
            <select class="att-select" id="attFilter">
              <option value="">All Status</option>
              <option value="present">Present</option>
              <option value="absent">Absent</option>
              <option value="late">Late</option>
              <option value="not marked">Not Marked</option>
            </select>
          </div>
        </div>

        <!-- Date bar -->
        <div class="att-datebar">
          <div class="att-datebar-left">
            <i class='bx bx-calendar' style="color:var(--p)"></i>
            <span>Attendance for <strong id="todayDate"></strong></span>
          </div>
          <span style="font-size:12px; color:var(--faint)">Auto-refreshes every minute</span>
        </div>

        <!-- Table -->
        <?php if (!empty($employees)): ?>
          <div class="att-table-wrap">
            <table class="att-table" id="attTable">
              <thead>
                <tr>
                  <th style="width:64px">#</th>
                  <th>Employee</th>
                  <th>Department</th>
                  <th>Check-in</th>
                  <th>Status</th>
                  <th style="width:130px; text-align:center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $index = 0;
                foreach ($employees as $emp):
                  $index++;
                  $name    = trim($emp->emp_name ?? '');
                  $parts   = preg_split('/\s+/', $name);
                  $initials = count($parts) > 1
                    ? strtoupper(substr($parts[0], 0, 1) . substr(end($parts), 0, 1))
                    : strtoupper(substr($name ?: '-', 0, 1));
                  $status  = $emp->today_status ?? 'Not Marked';
                  $dept    = $emp->department ?? 'General';
                  $checkin = $emp->check_in_time ?? null;

                  $pillClass = match ($status) {
                    'Present'    => 'present',
                    'Late'       => 'late',
                    'Not Marked' => 'not-marked',
                    default      => 'absent',
                  };
                ?>
                  <tr class="att-row" data-status="<?= strtolower($status) ?>">
                    <td><span class="t-serial"><?= $index ?></span></td>

                    <td>
                      <div class="t-emp">
                        <div class="t-avatar">
                          <?php if (!empty($emp->photo)): ?>
                            <img src="<?= base_url('uploads/profile/' . $emp->photo) ?>"
                              alt="<?= htmlspecialchars($name) ?>">
                          <?php else: ?>
                            <div class="t-avatar-init"><?= htmlspecialchars($initials) ?></div>
                          <?php endif; ?>
                          <span class="t-dot"></span>
                        </div>
                        <div>
                          <div class="t-name"><?= htmlspecialchars(ucwords(strtolower($name))) ?></div>
                          <div class="t-role">Employee · #<?= str_pad($emp->id ?? $index, 4, '0', STR_PAD_LEFT) ?></div>
                        </div>
                      </div>
                    </td>

                    <td>
                      <span class="t-dept">
                        <i class='bx bx-buildings'></i>
                        <?= htmlspecialchars($dept) ?>
                      </span>
                    </td>

                    <td>
                      <?php if ($checkin): ?>
                        <span class="t-time"><i class='bx bx-time-five'></i><?= htmlspecialchars($checkin) ?></span>
                      <?php else: ?>
                        <span class="t-time no-time">—</span>
                      <?php endif; ?>
                    </td>

                    <td>
                      <span class="t-status <?= $pillClass ?>">
                        <span class="sdot"></span>
                        <?= htmlspecialchars($status) ?>
                      </span>
                    </td>

                    <td style="text-align:center">
                      <a href="<?= site_url('admin/attendance/view_details/' . ($emp->id ?? 0)) ?>"
                        class="t-btn">
                        Details <i class='bx bx-right-arrow-alt'></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- Footer -->
          <div class="att-footer">
            <span>
              Showing <strong id="visCount"><?= count($employees) ?></strong>
              of <strong><?= count($employees) ?></strong> employees
            </span>
            <div class="att-pagination">
              <button class="pg-btn"><i class='bx bx-chevron-left'></i></button>
              <button class="pg-btn active">1</button>
              <button class="pg-btn"><i class='bx bx-chevron-right'></i></button>
            </div>
          </div>

        <?php else: ?>
          <div class="att-empty">
            <div class="att-empty-icon"><i class='bx bx-calendar-x'></i></div>
            <h5>No Attendance Data Found</h5>
            <p>No employee attendance records are available for today.</p>
          </div>
        <?php endif; ?>

      </div><!-- /.att-card -->
    </div><!-- /.att-shell -->
  </div><!-- /.page-content -->
</div><!-- /.att-page -->

<script>
  document.addEventListener('DOMContentLoaded', function() {

    // Set today's date in date bar
    const dateEl = document.getElementById('todayDate');
    if (dateEl) {
      const d = new Date();
      dateEl.textContent = d.toLocaleDateString('en-IN', {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      });
    }

    const searchInput = document.getElementById('attSearch');
    const filterSelect = document.getElementById('attFilter');
    const rows = document.querySelectorAll('.att-row');
    const empCount = document.getElementById('empCount');
    const visCount = document.getElementById('visCount');

    function applyFilters() {
      const query = (searchInput?.value || '').toLowerCase().trim();
      const status = (filterSelect?.value || '').toLowerCase();
      let count = 0;

      rows.forEach(function(row) {
        const nameEl = row.querySelector('.t-name');
        const rowStatus = (row.dataset.status || '').toLowerCase();
        const nameMatch = !query || (nameEl && nameEl.textContent.toLowerCase().includes(query));
        const statMatch = !status || rowStatus === status;
        const show = nameMatch && statMatch;
        row.style.display = show ? '' : 'none';
        if (show) count++;
      });

      if (empCount) empCount.textContent = count;
      if (visCount) visCount.textContent = count;
    }

    searchInput?.addEventListener('input', applyFilters);
    filterSelect?.addEventListener('change', applyFilters);
  });
</script>