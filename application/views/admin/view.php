<style>
  /* ===== Custom Variables ===== */
  :root {
    --primary: #4e73df;
    --primary-dark: #3a56b0;
    --success: #1cc88a;
    --success-dark: #169b6b;
    --danger: #e74a3b;
    --danger-dark: #c0392b;
    --warning: #f6c23e;
    --dark: #2c3e50;
    --light-bg: #f0f2f8;
    --card-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
    --card-hover-shadow: 0 8px 32px rgba(0, 0, 0, 0.14);
  }

  .page-content {
    padding: 24px;
    background: var(--light-bg);
    min-height: 100vh;
  }

  /* ===== Page Header ===== */
  .page-header {
    margin-bottom: 28px;
  }

  .page-header h3 {
    font-weight: 700;
    color: var(--dark);
    margin: 0;
    font-size: 1.6rem;
  }

  .page-header p {
    color: #7b8a9e;
    margin: 4px 0 0;
    font-size: 0.92rem;
  }

  /* ===== Stat Cards ===== */
  .stat-card {
    border: none;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--card-shadow);
    transition: all 0.35s cubic-bezier(0.25, 0.8, 0.25, 1);
    position: relative;
  }

  .stat-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--card-hover-shadow);
  }

  .stat-card .card-body {
    padding: 28px 24px;
    position: relative;
    z-index: 1;
  }

  .stat-card.break-card {
    background: linear-gradient(135deg, #e74a3b 0%, #ff6b6b 100%);
    color: #fff;
  }

  .stat-card.work-card {
    background: linear-gradient(135deg, #1cc88a 0%, #36d7b7 100%);
    color: #fff;
  }

  .stat-card .stat-icon {
    width: 56px;
    height: 56px;
    border-radius: 14px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(4px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin: 0 auto 14px;
  }

  .stat-card .stat-label {
    font-size: 0.85rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.9;
    margin-bottom: 6px;
  }

  .stat-card .stat-value {
    font-size: 2rem;
    font-weight: 800;
    letter-spacing: 1px;
    margin: 0;
    font-family: 'Segoe UI', monospace;
  }

  .stat-card .card-decoration {
    position: absolute;
    top: -30px;
    right: -30px;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
  }

  .stat-card .card-decoration-2 {
    position: absolute;
    bottom: -20px;
    left: -20px;
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.08);
  }

  /* ===== Date Picker ===== */
  .date-picker-card {
    border: none;
    border-radius: 16px;
    box-shadow: var(--card-shadow);
    background: #fff;
    margin-top: 24px;
  }

  .date-picker-card .card-body {
    padding: 20px 24px;
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
  }

  .date-picker-card .date-icon {
    width: 44px;
    height: 44px;
    border-radius: 12px;
    background: linear-gradient(135deg, var(--primary), #6c8cff);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.2rem;
    flex-shrink: 0;
  }

  .date-picker-card label {
    font-weight: 600;
    color: var(--dark);
    margin: 0;
    font-size: 0.95rem;
  }

  .date-picker-card input[type="date"] {
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    padding: 8px 14px;
    font-size: 0.95rem;
    color: var(--dark);
    transition: all 0.3s ease;
    max-width: 200px;
  }

  .date-picker-card input[type="date"]:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(78, 115, 223, 0.15);
    outline: none;
  }

  /* ===== Report Card ===== */
  .report-card {
    border: none;
    border-radius: 16px;
    box-shadow: var(--card-shadow);
    background: #fff;
    margin-top: 24px;
    overflow: hidden;
  }

  .report-card .card-header-custom {
    background: linear-gradient(135deg, var(--primary) 0%, #6c8cff 100%);
    padding: 18px 24px;
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .report-card .card-header-custom .header-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.1rem;
  }

  .report-card .card-header-custom h5 {
    color: #fff;
    margin: 0;
    font-weight: 600;
    font-size: 1.05rem;
  }

  .report-card .card-body {
    padding: 24px;
  }

  .report-meta {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 16px;
  }

  .report-meta .meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.88rem;
    color: #7b8a9e;
    background: var(--light-bg);
    padding: 6px 14px;
    border-radius: 8px;
  }

  .report-meta .meta-item i {
    color: var(--primary);
    font-size: 0.9rem;
  }

  .report-content {
    background: var(--light-bg);
    border-radius: 12px;
    padding: 20px;
    color: #4a5568;
    line-height: 1.7;
    font-size: 0.95rem;
    border-left: 4px solid var(--primary);
  }

  .no-report {
    text-align: center;
    padding: 30px 20px;
  }

  .no-report .empty-icon {
    width: 64px;
    height: 64px;
    border-radius: 50%;
    background: var(--light-bg);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 14px;
    font-size: 1.6rem;
    color: #a0aec0;
  }

  .no-report p {
    color: #a0aec0;
    font-size: 0.95rem;
    margin: 0;
  }

  /* ===== Tables Section ===== */
  .log-section {
    margin-top: 28px;
  }

  .log-card {
    border: none;
    border-radius: 16px;
    box-shadow: var(--card-shadow);
    background: #fff;
    overflow: hidden;
  }

  .log-card .log-header {
    padding: 18px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid #edf2f7;
  }

  .log-header-left {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .log-header .header-icon {
    width: 40px;
    height: 40px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.1rem;
  }

  .log-header .header-icon.break {
    background: rgba(231, 74, 59, 0.1);
    color: var(--danger);
  }

  .log-header .header-icon.work {
    background: rgba(28, 200, 138, 0.1);
    color: var(--success);
  }

  .log-header h5 {
    margin: 0;
    font-weight: 600;
    font-size: 1.05rem;
    color: var(--dark);
  }

  .log-count {
    background: var(--light-bg);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #7b8a9e;
  }

  /* ===== Table Styles ===== */
  .custom-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
  }

  .custom-table thead th {
    background: var(--light-bg);
    color: #7b8a9e;
    font-weight: 600;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    padding: 14px 20px;
    border: none;
    white-space: nowrap;
  }

  .custom-table thead th:first-child {
    border-radius: 0;
  }

  .custom-table thead th:last-child {
    border-radius: 0;
  }

  .custom-table tbody tr {
    transition: all 0.2s ease;
  }

  .custom-table tbody tr:hover {
    background: #f8faff;
  }

  .custom-table tbody td {
    padding: 14px 20px;
    border-bottom: 1px solid #edf2f7;
    color: #4a5568;
    font-size: 0.92rem;
    vertical-align: middle;
  }

  .custom-table tbody tr:last-child td {
    border-bottom: none;
  }

  .reason-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(231, 74, 59, 0.08);
    color: var(--danger);
    padding: 5px 12px;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
  }

  .time-display {
    font-family: 'Segoe UI', monospace;
    font-weight: 500;
    color: var(--dark);
    font-size: 0.9rem;
  }

  .duration-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(28, 200, 138, 0.1);
    color: var(--success-dark);
    padding: 5px 12px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    font-family: monospace;
  }

  .duration-badge.break-duration {
    background: rgba(231, 74, 59, 0.08);
    color: var(--danger);
  }

  .badge-manual {
    background: linear-gradient(135deg, #f6c23e, #f0b90b);
    color: #fff;
    padding: 3px 10px;
    border-radius: 6px;
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-left: 8px;
  }

  .no-data-placeholder {
    font-style: italic;
    color: #cbd5e0;
  }

  /* ===== Empty Table State ===== */
  .empty-table-state {
    text-align: center;
    padding: 40px 20px;
    color: #a0aec0;
  }

  .empty-table-state i {
    font-size: 2rem;
    margin-bottom: 10px;
    display: block;
  }

  /* ===== Animations ===== */
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .animate-in {
    animation: fadeInUp 0.5s ease forwards;
  }

  .animate-delay-1 { animation-delay: 0.1s; opacity: 0; }
  .animate-delay-2 { animation-delay: 0.2s; opacity: 0; }
  .animate-delay-3 { animation-delay: 0.3s; opacity: 0; }
  .animate-delay-4 { animation-delay: 0.4s; opacity: 0; }
  .animate-delay-5 { animation-delay: 0.5s; opacity: 0; }

  /* ===== Responsive ===== */
  @media (max-width: 768px) {
    .page-content {
      padding: 16px;
    }

    .stat-card .stat-value {
      font-size: 1.5rem;
    }

    .stat-card .card-body {
      padding: 20px 16px;
    }

    .report-meta {
      flex-direction: column;
      gap: 8px;
    }

    .date-picker-card .card-body {
      flex-direction: column;
      align-items: flex-start;
    }

    .custom-table {
      font-size: 0.85rem;
    }

    .custom-table thead th,
    .custom-table tbody td {
      padding: 10px 12px;
    }

    .log-card {
      overflow-x: auto;
    }
  }
</style>

<div class="page-wrapper">
  <div class="page-content">

    <!-- ===== Page Header ===== -->
    <div class="page-header animate-in animate-delay-1">
      <h3>📊 Work History</h3>
      <p>Track daily work hours, breaks, and reports</p>
    </div>

    <!-- ===== Date Picker ===== -->
    <div class="date-picker-card animate-in animate-delay-1">
      <div class="card-body">
        <div class="date-icon">
          <i class="bx bx-calendar"></i>
        </div>
        <form method="get" style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
          <label>Select Date</label>
          <input
            type="date"
            name="date"
            value="<?= $selected_date ?>"
            onchange="this.form.submit()">
        </form>
      </div>
    </div>

    <!-- ===== Stat Cards ===== -->
    <div class="row mt-4">
      <div class="col-md-6 mb-3">
        <div class="stat-card break-card animate-in animate-delay-2">
          <div class="card-decoration"></div>
          <div class="card-decoration-2"></div>
          <div class="card-body text-center">
            <div class="stat-icon">
              <i class="bx bx-coffee-togo"></i>
            </div>
            <div class="stat-label">Total Break Time</div>
            <h4 class="stat-value"><?= gmdate('H:i:s', $total_break_seconds) ?></h4>
          </div>
        </div>
      </div>

      <div class="col-md-6 mb-3">
        <div class="stat-card work-card animate-in animate-delay-3">
          <div class="card-decoration"></div>
          <div class="card-decoration-2"></div>
          <div class="card-body text-center">
            <div class="stat-icon">
              <i class="bx bx-briefcase-alt-2"></i>
            </div>
            <div class="stat-label">Total Work Time</div>
            <h4 class="stat-value"><?= gmdate('H:i:s', $total_work_seconds) ?></h4>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== Daily Report ===== -->
    <div class="report-card animate-in animate-delay-4">
      <div class="card-header-custom">
        <div class="header-icon">
          <i class="bx bx-file"></i>
        </div>
        <h5>Daily Work Report</h5>
      </div>
      <div class="card-body">
        <?php if (!empty($report)) : ?>
          <div class="report-meta">
            <div class="meta-item">
              <i class="bx bx-calendar-check"></i>
              <span>
                Report Date:
                <strong>
                  <?= !empty($report->report_date)
                    ? date('d-m-Y', strtotime($report->report_date))
                    : '--' ?>
                </strong>
              </span>
            </div>
            <div class="meta-item">
              <i class="bx bx-time-five"></i>
              <span>
                Submitted At:
                <strong>
                  <?= !empty($report->created_at)
                    ? date('d-m-Y h:i A', strtotime($report->created_at))
                    : '--' ?>
                </strong>
              </span>
            </div>
          </div>
          <div class="report-content">
            <?= nl2br(htmlspecialchars($report->report)) ?>
          </div>
        <?php else : ?>
          <div class="no-report">
            <div class="empty-icon">
              <i class="bx bx-notepad"></i>
            </div>
            <p>No report submitted for this date.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- ===== Break Logs ===== -->
    <div class="log-section animate-in animate-delay-4">
      <div class="log-card">
        <div class="log-header">
          <div class="log-header-left">
            <div class="header-icon break">
              <i class="bx bx-coffee"></i>
            </div>
            <h5>Break Logs</h5>
          </div>
          <span class="log-count"><?= count($break_logs) ?> entries</span>
        </div>

        <?php if (!empty($break_logs)) : ?>
          <table class="custom-table">
            <thead>
              <tr>
                <th>Reason</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Duration</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($break_logs as $b): ?>
                <tr>
                  <td>
                    <span class="reason-badge">
                      <i class="bx bx-info-circle"></i>
                      <?= htmlspecialchars($b->reason) ?>
                    </span>
                  </td>
                  <td>
                    <?php if (!empty($b->start_time)): ?>
                      <span class="time-display">
                        <i class="bx bx-log-in-circle text-success me-1"></i>
                        <?= date('h:i:s A', strtotime($b->start_time)) ?>
                      </span>
                    <?php else: ?>
                      <span class="no-data-placeholder">--</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if (!empty($b->end_time)): ?>
                      <span class="time-display">
                        <i class="bx bx-log-out-circle text-danger me-1"></i>
                        <?= date('h:i:s A', strtotime($b->end_time)) ?>
                      </span>
                    <?php else: ?>
                      <span class="no-data-placeholder">--</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if (!empty($b->start_time) && !empty($b->end_time)): ?>
                      <span class="duration-badge break-duration">
                        <i class="bx bx-timer"></i>
                        <?= gmdate('H:i:s', strtotime($b->end_time) - strtotime($b->start_time)) ?>
                      </span>
                    <?php else: ?>
                      <span class="no-data-placeholder">--</span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="empty-table-state">
            <i class="bx bx-coffee-togo"></i>
            <p>No break logs recorded for this date.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- ===== Work Logs ===== -->
    <div class="log-section animate-in animate-delay-5">
      <div class="log-card">
        <div class="log-header">
          <div class="log-header-left">
            <div class="header-icon work">
              <i class="bx bx-laptop"></i>
            </div>
            <h5>Work Logs</h5>
          </div>
          <span class="log-count"><?= count($hour_logs) ?> entries</span>
        </div>

        <?php if (!empty($hour_logs)) : ?>
          <table class="custom-table">
            <thead>
              <tr>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Duration</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($hour_logs as $h): ?>
                <tr>
                  <td>
                    <?php if (!empty($h->start_time)): ?>
                      <span class="time-display">
                        <i class="bx bx-play-circle text-success me-1"></i>
                        <?= date('h:i:s A', strtotime($h->start_time)) ?>
                      </span>
                    <?php else: ?>
                      <span class="no-data-placeholder">--</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if (!empty($h->end_time)): ?>
                      <span class="time-display">
                        <i class="bx bx-stop-circle text-danger me-1"></i>
                        <?= date('h:i:s A', strtotime($h->end_time)) ?>
                      </span>
                    <?php else: ?>
                      <span class="no-data-placeholder">--</span>
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if (!empty($h->start_time) && !empty($h->end_time)): ?>
                      <span class="duration-badge">
                        <i class="bx bx-timer"></i>
                        <?= gmdate('H:i:s', strtotime($h->end_time) - strtotime($h->start_time)) ?>
                      </span>
                      <?php if ($h->source === 'manual'): ?>
                        <span class="badge-manual">
                          <i class="bx bx-edit-alt"></i> Manual
                        </span>
                      <?php endif; ?>
                    <?php else: ?>
                      <span class="no-data-placeholder">--</span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        <?php else: ?>
          <div class="empty-table-state">
            <i class="bx bx-briefcase"></i>
            <p>No work logs recorded for this date.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>

  </div>
</div>