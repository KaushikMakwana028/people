<div class="page-wrapper">
  <div class="page-content">
    <div class="container-fluid">

      <!-- Page Header Section -->
      <div class="row align-items-center mb-4">
        <div class="col-md-6">
          <div class="d-flex align-items-center">
            <div class="page-icon me-3">
              <i class="bx bx-calendar-star"></i>
            </div>
            <div>
              <h4 class="page-title mb-1">Company Holidays</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i> Home</a></li>
                  <li class="breadcrumb-item active"><?= $year ?> Holidays</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <form method="get" class="d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <div class="year-filter-wrapper">
              <i class="bx bx-filter-alt filter-icon"></i>
              <select name="year" class="year-select" onchange="this.form.submit()">
                <?php for ($y = date('Y') - 1; $y <= date('Y') + 2; $y++): ?>
                  <option value="<?= $y ?>" <?= ($y == $year) ? 'selected' : '' ?>>
                    <?= $y ?>
                  </option>
                <?php endfor; ?>
              </select>
            </div>
          </form>
        </div>
      </div>

      <!-- Stats Row -->
      <div class="row g-3 mb-4">
        <?php
        $total = !empty($holidays) ? count($holidays) : 0;
        $upcoming = 0;
        $past = 0;
        $nextHoliday = null;
        if (!empty($holidays)) {
          foreach ($holidays as $h) {
            if (strtotime($h->holiday_date) >= strtotime(date('Y-m-d'))) {
              $upcoming++;
              if (!$nextHoliday) $nextHoliday = $h;
            } else {
              $past++;
            }
          }
        }
        ?>
        <div class="col-6 col-lg-3">
          <div class="stat-card stat-total">
            <div class="stat-card-body">
              <div class="stat-icon-box">
                <i class="bx bx-calendar"></i>
              </div>
              <div class="stat-info">
                <span class="stat-label">Total Holidays</span>
                <h3 class="stat-value"><?= $total ?></h3>
              </div>
            </div>
            <div class="stat-wave"></div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="stat-card stat-upcoming">
            <div class="stat-card-body">
              <div class="stat-icon-box">
                <i class="bx bx-right-arrow-circle"></i>
              </div>
              <div class="stat-info">
                <span class="stat-label">Upcoming</span>
                <h3 class="stat-value"><?= $upcoming ?></h3>
              </div>
            </div>
            <div class="stat-wave"></div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="stat-card stat-past">
            <div class="stat-card-body">
              <div class="stat-icon-box">
                <i class="bx bx-check-circle"></i>
              </div>
              <div class="stat-info">
                <span class="stat-label">Passed</span>
                <h3 class="stat-value"><?= $past ?></h3>
              </div>
            </div>
            <div class="stat-wave"></div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="stat-card stat-next">
            <div class="stat-card-body">
              <div class="stat-icon-box">
                <i class="bx bx-gift"></i>
              </div>
              <div class="stat-info">
                <span class="stat-label">Next Holiday</span>
                <h5 class="stat-value" style="font-size: 16px;">
                  <?= $nextHoliday ? date('d M Y', strtotime($nextHoliday->holiday_date)) : 'N/A' ?>
                </h5>
              </div>
            </div>
            <div class="stat-wave"></div>
          </div>
        </div>
      </div>

      <!-- Main Holiday Table Card -->
      <div class="card holiday-card">
        <div class="card-header holiday-card-header">
          <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center">
              <div class="header-icon me-2">
                <i class="bx bx-list-ul"></i>
              </div>
              <h6 class="mb-0 fw-bold text-white">Holiday Schedule – <?= $year ?></h6>
            </div>
            <span class="holiday-count-badge">
              <i class="bx bx-calendar-check me-1"></i>
              <?= $total ?> Holidays
            </span>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table holiday-table mb-0">
              <thead>
                <tr>
                  <th class="th-sl">#</th>
                  <th class="th-date">Date</th>
                  <th class="th-day">Day</th>
                  <th class="th-name">Holiday Name</th>
                  <th class="th-status text-center">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($holidays)): ?>
                  <?php $sl = 1;
                  foreach ($holidays as $h):
                    $hDate = strtotime($h->holiday_date);
                    $today = strtotime(date('Y-m-d'));
                    $isToday = (date('Y-m-d', $hDate) == date('Y-m-d'));
                    $isPast = ($hDate < $today && !$isToday);
                    $dayName = date('l', $hDate);
                    $isWeekend = in_array($dayName, ['Saturday', 'Sunday']);

                    // Determine row class
                    $rowClass = '';
                    if ($isToday) $rowClass = 'row-today';
                    elseif ($isPast) $rowClass = 'row-past';

                    // Choose emoji
                    $name = strtolower($h->holiday_name);
                    $emoji = '🎉';
                    if (strpos($name, 'new year') !== false) $emoji = '🎆';
                    elseif (strpos($name, 'christmas') !== false) $emoji = '🎄';
                    elseif (strpos($name, 'independence') !== false) $emoji = '🇮🇳';
                    elseif (strpos($name, 'republic') !== false) $emoji = '🇮🇳';
                    elseif (strpos($name, 'diwali') !== false || strpos($name, 'deepavali') !== false) $emoji = '🪔';
                    elseif (strpos($name, 'holi') !== false) $emoji = '🎨';
                    elseif (strpos($name, 'gandhi') !== false) $emoji = '🕊️';
                    elseif (strpos($name, 'eid') !== false || strpos($name, 'ramadan') !== false) $emoji = '🌙';
                    elseif (strpos($name, 'pongal') !== false || strpos($name, 'sankranti') !== false) $emoji = '🌾';
                    elseif (strpos($name, 'ganesh') !== false) $emoji = '🐘';
                    elseif (strpos($name, 'dussehra') !== false || strpos($name, 'navratri') !== false) $emoji = '🏹';
                    elseif (strpos($name, 'raksha') !== false || strpos($name, 'rakhi') !== false) $emoji = '🎀';
                    elseif (strpos($name, 'easter') !== false) $emoji = '🐣';
                    elseif (strpos($name, 'onam') !== false) $emoji = '🌸';
                    elseif (strpos($name, 'good friday') !== false) $emoji = '✝️';
                    elseif (strpos($name, 'ugadi') !== false || strpos($name, 'gudi') !== false) $emoji = '🌺';
                  ?>
                    <tr class="holiday-row <?= $rowClass ?>" style="animation-delay: <?= ($sl - 1) * 0.04 ?>s;">
                      <!-- SL -->
                      <td class="td-sl">
                        <span class="sl-badge"><?= $sl++ ?></span>
                      </td>

                      <!-- Date -->
                      <td>
                        <div class="date-cell">
                          <div class="date-box <?= $isToday ? 'date-today' : ($isPast ? 'date-past' : 'date-future') ?>">
                            <span class="date-day"><?= date('d', $hDate) ?></span>
                            <span class="date-month"><?= date('M', $hDate) ?></span>
                          </div>
                          <span class="date-full"><?= date('d-m-Y', $hDate) ?></span>
                        </div>
                      </td>

                      <!-- Day -->
                      <td>
                        <span class="day-badge <?= $isWeekend ? 'day-weekend' : 'day-weekday' ?>">
                          <?= $dayName ?>
                        </span>
                      </td>

                      <!-- Holiday Name -->
                      <td>
                        <div class="holiday-name-cell">
                          <span class="holiday-emoji"><?= $emoji ?></span>
                          <span class="holiday-name <?= $isPast ? 'text-muted' : '' ?>">
                            <?= htmlspecialchars($h->holiday_name) ?>
                          </span>
                          <?php if ($isToday): ?>
                            <span class="today-badge">TODAY</span>
                          <?php endif; ?>
                        </div>
                      </td>

                      <!-- Status -->
                      <td class="text-center">
                        <?php if ($isToday): ?>
                          <span class="status-badge status-today">
                            <i class="bx bx-sun bx-spin-hover"></i> Today
                          </span>
                        <?php elseif ($isPast): ?>
                          <span class="status-badge status-passed">
                            <i class="bx bx-check"></i> Passed
                          </span>
                        <?php else: ?>
                          <span class="status-badge status-upcoming">
                            <i class="bx bx-time-five"></i> Upcoming
                          </span>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="5">
                      <div class="empty-state">
                        <div class="empty-icon">📅</div>
                        <h5>No Holidays Found</h5>
                        <p>No company holidays are listed for <strong><?= $year ?></strong>.</p>
                        <small>Try selecting a different year above.</small>
                      </div>
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <?php if (!empty($holidays)): ?>
          <div class="card-footer holiday-footer">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
              <small>
                <i class="bx bx-info-circle me-1"></i>
                Displaying <strong><?= $total ?></strong> holidays for <strong><?= $year ?></strong>
              </small>
              <small>
                <span class="legend-dot legend-upcoming-dot"></span> Upcoming
                <span class="legend-dot legend-today-dot ms-2"></span> Today
                <span class="legend-dot legend-passed-dot ms-2"></span> Passed
              </small>
            </div>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
</div>

<!-- ========== STYLES ========== -->
<style>
  /* ---------- Page Header ---------- */
  .page-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 24px;
    box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
  }

  .page-title {
    font-weight: 700;
    color: #1e293b;
    margin: 0;
  }

  .breadcrumb {
    font-size: 13px;
  }

  .breadcrumb a {
    color: #6366f1;
    text-decoration: none;
  }

  /* ---------- Year Filter ---------- */
  .year-filter-wrapper {
    position: relative;
    display: inline-flex;
    align-items: center;
    background: #fff;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    padding: 0 12px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  }

  .year-filter-wrapper:hover,
  .year-filter-wrapper:focus-within {
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
  }

  .filter-icon {
    color: #6366f1;
    font-size: 18px;
    margin-right: 6px;
  }

  .year-select {
    border: none;
    outline: none;
    background: transparent;
    padding: 10px 8px;
    font-weight: 600;
    font-size: 15px;
    color: #334155;
    cursor: pointer;
    min-width: 90px;
    -webkit-appearance: none;
    appearance: auto;
  }

  /* ---------- Stat Cards ---------- */
  .stat-card {
    border-radius: 16px;
    overflow: hidden;
    position: relative;
    color: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: default;
  }

  .stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
  }

  .stat-total {
    background: linear-gradient(135deg, #6366f1, #818cf8);
  }

  .stat-upcoming {
    background: linear-gradient(135deg, #10b981, #34d399);
  }

  .stat-past {
    background: linear-gradient(135deg, #f59e0b, #fbbf24);
  }

  .stat-next {
    background: linear-gradient(135deg, #ef4444, #f87171);
  }

  .stat-card-body {
    display: flex;
    align-items: center;
    padding: 20px;
    position: relative;
    z-index: 2;
  }

  .stat-icon-box {
    width: 50px;
    height: 50px;
    border-radius: 14px;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-right: 15px;
    backdrop-filter: blur(4px);
  }

  .stat-label {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    opacity: 0.85;
    font-weight: 600;
  }

  .stat-value {
    font-weight: 800;
    margin: 2px 0 0 0;
    font-size: 26px;
    line-height: 1;
  }

  .stat-wave {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 40px;
    background: rgba(255, 255, 255, 0.08);
    border-radius: 100% 100% 0 0;
  }

  /* ---------- Holiday Card ---------- */
  .holiday-card {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
  }

  .holiday-card-header {
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    padding: 18px 24px;
    border: none;
  }

  .header-icon {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #fff;
  }

  .holiday-count-badge {
    background: rgba(255, 255, 255, 0.2);
    color: #fff;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    backdrop-filter: blur(4px);
  }

  /* ---------- Table ---------- */
  .holiday-table {
    border-collapse: separate;
    border-spacing: 0;
  }

  .holiday-table thead tr {
    background: #f8fafc;
  }

  .holiday-table thead th {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #64748b;
    padding: 14px 20px;
    border-bottom: 2px solid #e2e8f0;
    white-space: nowrap;
  }

  .holiday-table thead th.th-sl {
    width: 55px;
    text-align: center;
  }

  /* ---------- Table Rows ---------- */
  .holiday-row {
    transition: all 0.25s ease;
    animation: fadeInRow 0.4s ease forwards;
    opacity: 0;
    transform: translateX(-10px);
  }

  @keyframes fadeInRow {
    to {
      opacity: 1;
      transform: translateX(0);
    }
  }

  .holiday-row:hover {
    background: #f1f5f9 !important;
  }

  .holiday-row td {
    padding: 14px 20px;
    vertical-align: middle;
    border-bottom: 1px solid #f1f5f9;
  }

  /* Today Row */
  .row-today {
    background: #fffbeb !important;
    border-left: 4px solid #f59e0b !important;
  }

  .row-today:hover {
    background: #fef3c7 !important;
  }

  /* Past Row */
  .row-past {
    opacity: 0.65;
  }

  .row-past:hover {
    opacity: 1;
  }

  /* ---------- SL Badge ---------- */
  .sl-badge {
    width: 30px;
    height: 30px;
    border-radius: 8px;
    background: #f1f5f9;
    color: #64748b;
    font-size: 12px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  .td-sl {
    text-align: center;
  }

  /* ---------- Date Cell ---------- */
  .date-cell {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .date-box {
    width: 48px;
    height: 52px;
    border-radius: 12px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: transform 0.2s ease;
    flex-shrink: 0;
  }

  .holiday-row:hover .date-box {
    transform: scale(1.08);
  }

  .date-future {
    background: linear-gradient(135deg, #6366f1, #8b5cf6);
    color: #fff;
    box-shadow: 0 3px 10px rgba(99, 102, 241, 0.3);
  }

  .date-today {
    background: linear-gradient(135deg, #f59e0b, #fbbf24);
    color: #fff;
    box-shadow: 0 3px 10px rgba(245, 158, 11, 0.35);
    animation: todayPulse 2s ease-in-out infinite;
  }

  @keyframes todayPulse {
    0%, 100% {
      box-shadow: 0 3px 10px rgba(245, 158, 11, 0.35);
    }
    50% {
      box-shadow: 0 3px 20px rgba(245, 158, 11, 0.55);
    }
  }

  .date-past {
    background: #e2e8f0;
    color: #94a3b8;
  }

  .date-day {
    font-size: 18px;
    font-weight: 800;
    line-height: 1;
  }

  .date-month {
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 2px;
  }

  .date-full {
    font-weight: 600;
    color: #334155;
    font-size: 14px;
  }

  /* ---------- Day Badge ---------- */
  .day-badge {
    padding: 5px 14px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
  }

  .day-weekday {
    background: #ede9fe;
    color: #7c3aed;
  }

  .day-weekend {
    background: #fce7f3;
    color: #db2777;
  }

  /* ---------- Holiday Name Cell ---------- */
  .holiday-name-cell {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .holiday-emoji {
    font-size: 22px;
    line-height: 1;
    flex-shrink: 0;
  }

  .holiday-name {
    font-weight: 600;
    color: #1e293b;
    font-size: 14px;
  }

  .today-badge {
    background: linear-gradient(135deg, #f59e0b, #fbbf24);
    color: #fff;
    font-size: 10px;
    font-weight: 800;
    padding: 2px 8px;
    border-radius: 4px;
    letter-spacing: 1px;
    animation: blink 1.2s ease-in-out infinite;
  }

  @keyframes blink {
    0%, 100% {
      opacity: 1;
    }
    50% {
      opacity: 0.4;
    }
  }

  /* ---------- Status Badges ---------- */
  .status-badge {
    padding: 5px 14px;
    border-radius: 50px;
    font-size: 12px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    white-space: nowrap;
  }

  .status-upcoming {
    background: #ecfdf5;
    color: #059669;
    border: 1px solid #a7f3d0;
  }

  .status-today {
    background: #fffbeb;
    color: #d97706;
    border: 1px solid #fde68a;
  }

  .status-passed {
    background: #f1f5f9;
    color: #94a3b8;
    border: 1px solid #e2e8f0;
  }

  /* ---------- Footer ---------- */
  .holiday-footer {
    background: #f8fafc;
    border-top: 1px solid #f1f5f9;
    padding: 14px 24px;
    color: #64748b;
  }

  /* Legend dots */
  .legend-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
    vertical-align: middle;
    margin-right: 3px;
  }

  .legend-upcoming-dot {
    background: #10b981;
  }

  .legend-today-dot {
    background: #f59e0b;
  }

  .legend-passed-dot {
    background: #cbd5e1;
  }

  /* ---------- Empty State ---------- */
  .empty-state {
    text-align: center;
    padding: 60px 20px;
  }

  .empty-icon {
    font-size: 64px;
    margin-bottom: 16px;
    opacity: 0.4;
    animation: floatIcon 3s ease-in-out infinite;
  }

  @keyframes floatIcon {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-10px);
    }
  }

  .empty-state h5 {
    color: #475569;
    font-weight: 700;
    margin-bottom: 8px;
  }

  .empty-state p {
    color: #94a3b8;
    margin-bottom: 4px;
  }

  .empty-state small {
    color: #cbd5e1;
  }

  /* ---------- Responsive ---------- */
  @media (max-width: 768px) {
    .stat-card-body {
      padding: 14px;
    }

    .stat-value {
      font-size: 20px;
    }

    .stat-icon-box {
      width: 40px;
      height: 40px;
      font-size: 18px;
      margin-right: 10px;
    }

    .holiday-table thead th,
    .holiday-row td {
      padding: 10px 12px;
    }

    .date-box {
      width: 40px;
      height: 44px;
    }

    .date-day {
      font-size: 15px;
    }

    .date-full {
      display: none;
    }
  }
</style>