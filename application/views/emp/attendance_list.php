<style>
/* ── CSS Variables ── */
:root {
  --grad-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  --grad-success: linear-gradient(135deg, #10b981 0%, #059669 100%);
  --grad-danger: linear-gradient(135deg, #f43f5e 0%, #e11d48 100%);
  --grad-info: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
  --soft-primary: #eef2ff;
  --soft-success: #ecfdf5;
  --soft-danger: #fff1f2;
  --soft-info: #eff6ff;
  --radius-lg: 20px;
  --radius-md: 14px;
  --radius-sm: 10px;
  --shadow-card: 0 4px 24px rgba(0,0,0,.06);
  --shadow-hover: 0 12px 40px rgba(0,0,0,.12);
  --shadow-glow-success: 0 8px 30px rgba(16,185,129,.25);
  --shadow-glow-danger: 0 8px 30px rgba(244,63,94,.25);
  --shadow-glow-primary: 0 8px 30px rgba(102,126,234,.25);
  --text-dark: #0f172a;
  --text-mid: #475569;
  --text-light: #94a3b8;
  --border-light: #f1f5f9;
}

/* ── Page Hero Banner ── */
.att-hero {
  background: var(--grad-primary);
  border-radius: var(--radius-lg);
  padding: 36px 34px;
  color: #fff;
  margin-bottom: 30px;
  position: relative;
  overflow: hidden;
  box-shadow: 0 12px 45px rgba(102,126,234,.35);
}

.att-hero::before,
.att-hero::after {
  content: '';
  position: absolute;
  border-radius: 50%;
  background: rgba(255,255,255,.07);
}

.att-hero::before {
  width: 260px; height: 260px;
  top: -100px; right: -80px;
}

.att-hero::after {
  width: 160px; height: 160px;
  bottom: -60px; left: -50px;
}

.att-hero .hero-content {
  position: relative;
  z-index: 2;
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 16px;
}

.att-hero .hero-left h3 {
  font-weight: 800;
  font-size: 24px;
  margin-bottom: 6px;
  display: flex;
  align-items: center;
  gap: 10px;
}

.att-hero .hero-left p {
  margin: 0;
  opacity: .85;
  font-size: 14px;
}

.att-hero .hero-month-badge {
  background: rgba(255,255,255,.18);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,.25);
  border-radius: 50px;
  padding: 10px 24px;
  font-weight: 700;
  font-size: 14px;
  display: flex;
  align-items: center;
  gap: 8px;
}

/* ── Stat Cards ── */
.stat-row {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
  margin-bottom: 28px;
}

@media (max-width: 768px) {
  .stat-row {
    grid-template-columns: 1fr;
  }
}

.stat-card {
  background: #fff;
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-card);
  padding: 0;
  overflow: hidden;
  transition: all .35s cubic-bezier(.4,0,.2,1);
  position: relative;
  border: 1px solid transparent;
}

.stat-card:hover {
  transform: translateY(-6px);
}

.stat-card.card-present:hover {
  box-shadow: var(--shadow-glow-success);
  border-color: rgba(16,185,129,.15);
}

.stat-card.card-absent:hover {
  box-shadow: var(--shadow-glow-danger);
  border-color: rgba(244,63,94,.15);
}

.stat-card.card-total:hover {
  box-shadow: var(--shadow-glow-primary);
  border-color: rgba(102,126,234,.15);
}

.stat-card .stat-accent {
  height: 4px;
  width: 100%;
}

.stat-card.card-present .stat-accent { background: var(--grad-success); }
.stat-card.card-absent .stat-accent  { background: var(--grad-danger); }
.stat-card.card-total .stat-accent   { background: var(--grad-primary); }

.stat-card .stat-body {
  padding: 24px;
  display: flex;
  align-items: center;
  gap: 18px;
}

.stat-icon-box {
  width: 60px;
  height: 60px;
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 26px;
  flex-shrink: 0;
  position: relative;
}

.stat-icon-box::after {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: 16px;
  opacity: 0;
  transition: opacity .3s ease;
}

.stat-card:hover .stat-icon-box::after { opacity: 1; }

.stat-icon-box.present-icon {
  background: var(--soft-success);
  color: #059669;
}

.stat-icon-box.absent-icon {
  background: var(--soft-danger);
  color: #e11d48;
}

.stat-icon-box.total-icon {
  background: var(--soft-primary);
  color: #667eea;
}

.stat-info .stat-label {
  font-size: 12px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1.2px;
  color: var(--text-light);
  margin-bottom: 4px;
}

.stat-info .stat-number {
  font-size: 32px;
  font-weight: 800;
  line-height: 1;
  margin-bottom: 6px;
}

.stat-info .stat-number.present-num { color: #059669; }
.stat-info .stat-number.absent-num  { color: #e11d48; }
.stat-info .stat-number.total-num   { color: #667eea; }

.stat-info .stat-footer {
  display: flex;
  align-items: center;
  gap: 8px;
}

.stat-info .stat-footer .stat-pct {
  font-size: 12px;
  font-weight: 700;
  padding: 2px 8px;
  border-radius: 6px;
}

.stat-pct.present-pct { background: var(--soft-success); color: #059669; }
.stat-pct.absent-pct  { background: var(--soft-danger);  color: #e11d48; }

.stat-info .stat-footer .stat-sub {
  font-size: 12px;
  color: var(--text-light);
}

/* Mini donut ring */
.stat-ring {
  width: 60px;
  height: 60px;
  flex-shrink: 0;
  margin-left: auto;
}

.stat-ring svg {
  width: 100%;
  height: 100%;
  transform: rotate(-90deg);
}

.stat-ring .ring-bg {
  fill: none;
  stroke: #f1f5f9;
  stroke-width: 5;
}

.stat-ring .ring-fill {
  fill: none;
  stroke-width: 5;
  stroke-linecap: round;
  transition: stroke-dashoffset .8s ease;
}

.stat-ring .ring-fill.present-ring { stroke: #10b981; }
.stat-ring .ring-fill.absent-ring  { stroke: #f43f5e; }
.stat-ring .ring-fill.total-ring   { stroke: #667eea; }

/* ── Filter Bar ── */
.filter-section {
  background: #fff;
  border-radius: var(--radius-md);
  padding: 18px 24px;
  box-shadow: var(--shadow-card);
  margin-bottom: 24px;
  display: flex;
  align-items: center;
  gap: 16px;
  flex-wrap: wrap;
  border: 1px solid var(--border-light);
}

.filter-section .filter-icon {
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

.filter-section .filter-text {
  font-size: 13px;
  font-weight: 700;
  color: var(--text-mid);
  text-transform: uppercase;
  letter-spacing: .8px;
}

.filter-section input[type="month"] {
  border: 2px solid #e2e8f0;
  border-radius: var(--radius-sm);
  padding: 10px 18px;
  font-weight: 600;
  font-size: 14px;
  color: var(--text-dark);
  background: #fafbfd;
  transition: all .3s ease;
  max-width: 220px;
  cursor: pointer;
}

.filter-section input[type="month"]:hover {
  border-color: #cbd5e1;
  background: #fff;
}

.filter-section input[type="month"]:focus {
  outline: none;
  border-color: #667eea;
  box-shadow: 0 0 0 4px rgba(102,126,234,.12);
  background: #fff;
}

/* ── Table Card ── */
.att-table-wrap {
  background: #fff;
  border-radius: var(--radius-lg);
  box-shadow: var(--shadow-card);
  overflow: hidden;
  border: 1px solid var(--border-light);
  animation: fadeSlideUp .5s ease both;
}

@keyframes fadeSlideUp {
  from { opacity: 0; transform: translateY(20px); }
  to   { opacity: 1; transform: translateY(0); }
}

.table-header {
  padding: 22px 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid var(--border-light);
  flex-wrap: wrap;
  gap: 12px;
}

.table-header .table-title {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 16px;
  font-weight: 700;
  color: var(--text-dark);
  margin: 0;
}

.table-header .table-title .title-icon {
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

.table-header .count-badge {
  background: var(--soft-primary);
  color: #667eea;
  font-size: 12px;
  font-weight: 700;
  padding: 6px 16px;
  border-radius: 50px;
  letter-spacing: .3px;
}

/* Table */
.att-table {
  width: 100%;
  border-collapse: collapse;
}

.att-table thead th {
  background: #fafbfd;
  color: var(--text-light);
  font-size: 11px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 1.2px;
  padding: 16px 28px;
  border-bottom: 2px solid var(--border-light);
  white-space: nowrap;
}

.att-table tbody tr {
  transition: all .25s ease;
  border-bottom: 1px solid #f8fafc;
}

.att-table tbody tr:last-child {
  border-bottom: none;
}

.att-table tbody tr:hover {
  background: #fafbfe;
}

.att-table tbody td {
  padding: 16px 28px;
  font-size: 14px;
  color: var(--text-mid);
  vertical-align: middle;
}

/* Date Cell Enhanced */
.date-cell {
  display: flex;
  align-items: center;
  gap: 14px;
}

.date-tile {
  width: 48px;
  height: 48px;
  border-radius: 14px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: all .3s ease;
}

tr:hover .date-tile {
  transform: scale(1.05);
}

.date-tile.present-tile {
  background: linear-gradient(135deg, #ecfdf5, #d1fae5);
  border: 1px solid #a7f3d0;
}

.date-tile.absent-tile {
  background: linear-gradient(135deg, #fff1f2, #ffe4e6);
  border: 1px solid #fecdd3;
}

.date-tile .tile-day {
  font-size: 18px;
  font-weight: 800;
  line-height: 1;
  color: var(--text-dark);
}

.date-tile .tile-abbr {
  font-size: 9px;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: .5px;
  color: var(--text-light);
  margin-top: 2px;
}

.date-text .date-full {
  font-weight: 600;
  color: var(--text-dark);
  font-size: 14px;
}

.date-text .date-weekday {
  font-size: 12px;
  color: var(--text-light);
  margin-top: 2px;
}

/* Time Cell */
.time-cell {
  display: flex;
  align-items: center;
  gap: 10px;
}

.time-icon-box {
  width: 34px;
  height: 34px;
  border-radius: 10px;
  background: #fdf4ff;
  color: #a855f7;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  flex-shrink: 0;
}

.time-cell .time-value {
  font-weight: 700;
  font-variant-numeric: tabular-nums;
  color: var(--text-dark);
  font-size: 14px;
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

.status-pill.pill-present {
  background: linear-gradient(135deg, #ecfdf5, #d1fae5);
  color: #059669;
  border: 1px solid #a7f3d0;
}

.status-pill.pill-absent {
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

.empty-state .empty-illustration {
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
  0%, 100% { transform: translateY(0); }
  50%      { transform: translateY(-8px); }
}

.empty-state .empty-illustration i {
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
  margin: 0;
  max-width: 320px;
  margin: 0 auto;
}

/* ── Responsive ── */
@media (max-width: 768px) {
  .att-hero { padding: 26px 22px; }
  .att-hero .hero-left h3 { font-size: 20px; }
  .att-hero .hero-content { flex-direction: column; align-items: flex-start; }
  .stat-info .stat-number { font-size: 26px; }
  .att-table thead th,
  .att-table tbody td { padding: 14px 18px; }
  .table-header { padding: 18px 20px; }
  .filter-section input[type="month"] { max-width: 100%; flex: 1; }
}

@media (max-width: 576px) {
  .stat-card .stat-body { padding: 18px; gap: 14px; }
  .stat-icon-box { width: 48px; height: 48px; font-size: 22px; }
  .stat-ring { width: 48px; height: 48px; }
  .date-tile { width: 40px; height: 40px; border-radius: 10px; }
  .date-tile .tile-day { font-size: 15px; }
  .table-header { flex-direction: column; align-items: flex-start; }
}
</style>

<div class="page-wrapper">
  <div class="page-content">

    <!-- ══════════ Hero Banner ══════════ -->
    <div class="att-hero">
      <div class="hero-content">
        <div class="hero-left">
          <h3>
            <i class="bx bx-bar-chart-alt-2"></i>
            Attendance Overview
          </h3>
          <p>Monitor your daily attendance records &amp; monthly performance</p>
        </div>
        <div class="hero-month-badge">
          <i class="bx bx-calendar"></i>
          <?= date('F Y', strtotime("$year-$month-01")) ?>
        </div>
      </div>
    </div>

    <!-- ══════════ Stat Cards ══════════ -->
    <?php
      $present = $summary->present_count ?? 0;
      $absent  = $summary->absent_count  ?? 0;
      $pctPresent = $total_days > 0 ? round(($present / $total_days) * 100) : 0;
      $pctAbsent  = $total_days > 0 ? round(($absent  / $total_days) * 100) : 0;
      $circumference = 2 * 3.14159 * 24;
    ?>
    <div class="stat-row">

      <!-- Present Card -->
      <div class="stat-card card-present">
        <div class="stat-accent"></div>
        <div class="stat-body">
          <div class="stat-icon-box present-icon">
            <i class="bx bx-check-circle"></i>
          </div>
          <div class="stat-info">
            <div class="stat-label">Present</div>
            <div class="stat-number present-num"><?= $present ?></div>
            <div class="stat-footer">
              <span class="stat-pct present-pct"><?= $pctPresent ?>%</span>
              <span class="stat-sub">of <?= $total_days ?> days</span>
            </div>
          </div>
          <div class="stat-ring">
            <svg viewBox="0 0 56 56">
              <circle class="ring-bg" cx="28" cy="28" r="24"/>
              <circle class="ring-fill present-ring" cx="28" cy="28" r="24"
                      stroke-dasharray="<?= $circumference ?>"
                      stroke-dashoffset="<?= $circumference - ($circumference * $pctPresent / 100) ?>"/>
            </svg>
          </div>
        </div>
      </div>

      <!-- Absent Card -->
      <div class="stat-card card-absent">
        <div class="stat-accent"></div>
        <div class="stat-body">
          <div class="stat-icon-box absent-icon">
            <i class="bx bx-x-circle"></i>
          </div>
          <div class="stat-info">
            <div class="stat-label">Absent</div>
            <div class="stat-number absent-num"><?= $absent ?></div>
            <div class="stat-footer">
              <span class="stat-pct absent-pct"><?= $pctAbsent ?>%</span>
              <span class="stat-sub">of <?= $total_days ?> days</span>
            </div>
          </div>
          <div class="stat-ring">
            <svg viewBox="0 0 56 56">
              <circle class="ring-bg" cx="28" cy="28" r="24"/>
              <circle class="ring-fill absent-ring" cx="28" cy="28" r="24"
                      stroke-dasharray="<?= $circumference ?>"
                      stroke-dashoffset="<?= $circumference - ($circumference * $pctAbsent / 100) ?>"/>
            </svg>
          </div>
        </div>
      </div>

      <!-- Total Card -->
      <div class="stat-card card-total">
        <div class="stat-accent"></div>
        <div class="stat-body">
          <div class="stat-icon-box total-icon">
            <i class="bx bx-calendar-event"></i>
          </div>
          <div class="stat-info">
            <div class="stat-label">Total Days</div>
            <div class="stat-number total-num"><?= $total_days ?></div>
            <div class="stat-footer">
              <span class="stat-sub"><?= date('F Y', strtotime("$year-$month-01")) ?></span>
            </div>
          </div>
          <div class="stat-ring">
            <svg viewBox="0 0 56 56">
              <circle class="ring-bg" cx="28" cy="28" r="24"/>
              <circle class="ring-fill total-ring" cx="28" cy="28" r="24"
                      stroke-dasharray="<?= $circumference ?>"
                      stroke-dashoffset="0"/>
            </svg>
          </div>
        </div>
      </div>

    </div>

    <!-- ══════════ Filter Bar ══════════ -->
    <form method="get">
      <div class="filter-section">
        <div class="filter-icon">
          <i class="bx bx-filter-alt"></i>
        </div>
        <span class="filter-text">Filter by Month</span>
        <input type="month"
               name="month_year"
               value="<?= $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT) ?>"
               onchange="this.form.submit()">
      </div>
    </form>

    <!-- ══════════ Table Card ══════════ -->
    <div class="att-table-wrap">

      <div class="table-header">
        <h6 class="table-title">
          <span class="title-icon"><i class="bx bx-list-check"></i></span>
          Attendance Records
        </h6>
        <span class="count-badge">
          <i class="bx bx-data me-1"></i>
          <?= !empty($rows) ? count($rows) : 0 ?> Records
        </span>
      </div>

      <div class="table-responsive">
        <table class="att-table" id="example">
          <thead>
            <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($rows)): ?>
              <?php foreach ($rows as $r):
                $ts        = strtotime($r->created_at);
                $dayNum    = date('d', $ts);
                $dayAbbr   = strtoupper(date('D', $ts));
                $dateFull  = date('d M Y', $ts);
                $weekday   = date('l', $ts);
                $time      = date('h:i A', $ts);
                $isPresent = ($r->status === 'Present');
              ?>
                <tr>
                  <!-- Date -->
                  <td>
                    <div class="date-cell">
                      <div class="date-tile <?= $isPresent ? 'present-tile' : 'absent-tile' ?>">
                        <span class="tile-day"><?= $dayNum ?></span>
                        <span class="tile-abbr"><?= $dayAbbr ?></span>
                      </div>
                      <div class="date-text">
                        <div class="date-full"><?= $dateFull ?></div>
                        <div class="date-weekday"><?= $weekday ?></div>
                      </div>
                    </div>
                  </td>

                  <!-- Time -->
                  <td>
                    <div class="time-cell">
                      <div class="time-icon-box">
                        <i class="bx bx-time-five"></i>
                      </div>
                      <span class="time-value"><?= $time ?></span>
                    </div>
                  </td>

                  <!-- Status -->
                  <td>
                    <span class="status-pill <?= $isPresent ? 'pill-present' : 'pill-absent' ?>">
                      <i class="bx <?= $isPresent ? 'bx-check-circle' : 'bx-x-circle' ?>"></i>
                      <?= $r->status ?>
                    </span>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3">
                  <div class="empty-state">
                    <div class="empty-illustration">
                      <i class="bx bx-calendar-x"></i>
                    </div>
                    <h5>No Records Found</h5>
                    <p>There are no attendance records for the selected month. Try selecting a different month.</p>
                  </div>
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>
    <!-- /table card -->

  </div>
</div>

<div class="overlay toggle-icon"></div>
<a href="javascript:;" class="back-to-top"><i class="bx bxs-up-arrow-alt"></i></a>