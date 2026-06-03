<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<style>
  /* ── Attendance Page Specific Styles ── */
  .attendance-details-page .page-content {
    padding: 1.5rem 2rem !important;
    max-width: 100% !important;
  }

  /* Breadcrumb */
  .attendance-breadcrumb {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    border-radius: 14px;
    padding: 12px 20px;
    margin-bottom: 24px;
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
  }

  .breadcrumb-left a,
  .breadcrumb-left span {
    color: rgba(255, 255, 255, 0.85);
    font-size: 13px;
    text-decoration: none;
  }

  .breadcrumb-left a:hover {
    color: #fff;
  }

  .breadcrumb-left i {
    font-size: 13px;
    margin: 0 6px;
    vertical-align: middle;
  }

  .employee-badge {
    background: rgba(255, 255, 255, 0.2);
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    color: #fff;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  .employee-badge i {
    font-size: 16px;
  }

  /* Summary Cards Grid */
  .summary-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-bottom: 28px;
  }

  .summary-card {
    border-radius: var(--radius-lg);
    padding: 24px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    cursor: default;
    box-shadow: 0 4px 15px var(--shadow);
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: var(--bg-primary);
    border: 1px solid var(--border-color);
  }

  .summary-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px var(--shadow-lg);
  }

  .summary-card::before {
    content: '';
    position: absolute;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    top: -50px;
    right: -30px;
    background: rgba(99, 102, 241, 0.05);
  }

  .summary-left {
    flex: 1;
    position: relative;
    z-index: 2;
  }

  .summary-card .count {
    font-size: 42px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 8px;
    color: var(--text-primary);
  }

  .summary-card .label {
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--text-secondary);
  }

  .summary-card .month-text {
    font-size: 11px;
    margin-top: 8px;
    color: var(--text-tertiary);
    display: flex;
    align-items: center;
    gap: 4px;
  }

  .summary-icon {
    width: 60px;
    height: 60px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    position: relative;
    z-index: 2;
  }

  .summary-card.present .summary-icon {
    background: rgba(34, 197, 94, 0.1);
    color: #22c55e;
  }

  .summary-card.absent .summary-icon {
    background: rgba(239, 68, 68, 0.1);
    color: #ef4444;
  }

  /* Main Card */
  .attendance-card {
    background: var(--bg-primary);
    border-radius: var(--radius-xl);
    box-shadow: 0 4px 20px var(--shadow);
    overflow: hidden;
    border: 1px solid var(--border-color);
  }

  .attendance-card .card-body {
    padding: 28px;
  }

  /* Month Picker */
  .month-picker-wrap {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--bg-secondary);
    padding: 8px 18px;
    border-radius: 14px;
    border: 1px solid var(--border-color);
    margin-bottom: 24px;
  }

  .month-picker-wrap i {
    font-size: 20px;
    color: var(--primary);
  }

  .month-picker-wrap input[type="month"] {
    border: none;
    background: transparent;
    font-weight: 600;
    font-size: 14px;
    color: var(--text-primary);
    outline: none;
    cursor: pointer;
    font-family: 'Inter', sans-serif;
  }

  /* Professional Table */
  .att-table-wrapper {
    overflow-x: auto;
  }

  .att-table {
    border-collapse: separate;
    border-spacing: 0 10px;
    width: 100%;
  }

  .att-table thead th {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    border: none;
    padding: 14px 20px;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    font-weight: 700;
    white-space: nowrap;
  }

  .att-table thead th:first-child {
    border-radius: 12px 0 0 12px;
  }

  .att-table thead th:last-child {
    border-radius: 0 12px 12px 0;
  }

  .att-table thead th i {
    margin-right: 6px;
    font-size: 14px;
  }

  .att-table tbody tr {
    background: var(--bg-primary);
    box-shadow: 0 2px 8px var(--shadow);
    transition: all 0.2s ease;
    border: 1px solid var(--border-color);
  }

  .att-table tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px var(--shadow-lg);
  }

  .att-table tbody td {
    padding: 16px 20px;
    border: none;
    vertical-align: middle;
    font-size: 13px;
    color: var(--text-primary);
    background: var(--bg-primary);
  }

  .att-table tbody td:first-child {
    border-radius: 14px 0 0 14px;
  }

  .att-table tbody td:last-child {
    border-radius: 0 14px 14px 0;
  }

  /* Date Cell */
  .date-cell {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .day-box {
    width: 52px;
    height: 52px;
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

  .day-box .day-num {
    font-size: 20px;
  }

  .day-box .day-month {
    font-size: 9px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    opacity: 0.9;
    margin-top: 2px;
  }

  .date-text .day-name {
    font-weight: 600;
    color: var(--text-primary);
  }

  .date-text .full-date {
    font-size: 11px;
    color: var(--text-secondary);
    margin-top: 2px;
  }

  /* Time Cell */
  .time-cell {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .time-cell i {
    font-size: 18px;
    color: var(--primary);
  }

  .time-cell .time-value {
    font-weight: 500;
    color: var(--text-primary);
  }

  /* Status Pills */
  .status-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
  }

  .status-pill.present {
    background: rgba(34, 197, 94, 0.12);
    color: #22c55e;
    border: 1px solid rgba(34, 197, 94, 0.3);
  }

  .status-pill.absent {
    background: rgba(239, 68, 68, 0.12);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
  }

  .status-pill.late {
    background: rgba(245, 158, 11, 0.12);
    color: #f59e0b;
    border: 1px solid rgba(245, 158, 11, 0.3);
  }

  .status-pill.weekend {
    background: rgba(99, 102, 241, 0.12);
    color: #6366f1;
    border: 1px solid rgba(99, 102, 241, 0.3);
  }

  .status-pill.holiday {
    background: rgba(6, 182, 212, 0.12);
    color: #06b6d4;
    border: 1px solid rgba(6, 182, 212, 0.3);
  }

  .status-pill.leave {
    background: rgba(139, 92, 246, 0.12);
    color: #8b5cf6;
    border: 1px solid rgba(139, 92, 246, 0.3);
  }

  .status-pill.not-marked {
    background: rgba(148, 163, 184, 0.12);
    color: #94a3b8;
    border: 1px solid rgba(148, 163, 184, 0.3);
  }

  .status-pill i {
    font-size: 14px;
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 60px 20px;
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

  /* Animations */
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

  /* Responsive */
  @media (max-width: 768px) {
    .attendance-details-page .page-content {
      padding: 1rem !important;
    }

    .summary-grid {
      grid-template-columns: 1fr;
      gap: 16px;
    }

    .summary-card {
      padding: 20px;
    }

    .summary-card .count {
      font-size: 34px;
    }

    .att-table thead th {
      padding: 10px 12px;
      font-size: 10px;
    }

    .att-table tbody td {
      padding: 12px;
    }

    .day-box {
      width: 44px;
      height: 44px;
    }

    .day-box .day-num {
      font-size: 16px;
    }
  }

  @media (max-width: 576px) {
    .date-cell {
      flex-direction: column;
      align-items: flex-start;
    }

    .attendance-breadcrumb {
      flex-direction: column;
      align-items: flex-start;
    }
  }
</style>

<div class="page-wrapper attendance-details-page">
  <div class="page-content">

    <!-- Enhanced Breadcrumb -->
    <div class="attendance-breadcrumb fade-up">
      <div class="breadcrumb-left">
        <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Dashboard</a>
        <i class='bx bx-chevron-right'></i>
        <a href="<?= base_url('admin/attendance') ?>">Attendance</a>
        <i class='bx bx-chevron-right'></i>
        <span>View Details</span>
      </div>
      <div class="employee-badge">
        <i class='bx bx-user-circle'></i>
        <?= htmlspecialchars($employee_name ?? 'Employee') ?>
      </div>
    </div>

    <!-- Summary Cards Grid -->
    <div class="summary-grid">
      <!-- Present Card -->
      <div class="summary-card present fade-up fade-d1">
        <div class="summary-left">
          <div class="count"><?= $present_count ?></div>
          <div class="label">Present Days</div>
          <div class="month-text">
            <i class='bx bx-calendar'></i> <?= date('F Y', strtotime($year . '-' . $month . '-01')) ?>
          </div>
        </div>
        <div class="summary-icon">
          <i class='bx bx-check-circle'></i>
        </div>
      </div>

      <!-- Absent Card -->
      <div class="summary-card absent fade-up fade-d2">
        <div class="summary-left">
          <div class="count"><?= $absent_count ?></div>
          <div class="label">Absent Days</div>
          <div class="month-text">
            <i class='bx bx-calendar'></i> <?= date('F Y', strtotime($year . '-' . $month . '-01')) ?>
          </div>
        </div>
        <div class="summary-icon">
          <i class='bx bx-x-circle'></i>
        </div>
      </div>
    </div>

    <!-- Main Attendance Card -->
    <div class="attendance-card fade-up fade-d3">
      <div class="card-body">

        <!-- Month Picker -->
        <form method="get" class="mb-4">
          <div class="month-picker-wrap">
            <i class='bx bx-calendar'></i>
            <input type="month" name="month_year" value="<?= $year . '-' . $month ?>" onchange="this.form.submit()">
          </div>
        </form>

        <!-- Attendance Table -->
        <div class="att-table-wrapper">
          <table class="att-table">
            <thead>
              <tr>
                <th><i class='bx bx-calendar'></i> Date</th>
                <th><i class='bx bx-time'></i> Time</th>
                <th><i class='bx bx-info-circle'></i> Status</th>
                <th style="width: 100px; text-align: center;"><i class='bx bx-cog'></i> Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($rows)): ?>
                <?php foreach ($rows as $r):
                  $dateObj = strtotime($r->attendance_date);
                  $day = date('d', $dateObj);
                  $monthAbr = date('M', $dateObj);
                  $fullDate = date('d M Y', $dateObj);
                  $dayName = date('l', $dateObj);
                  $isPres = ($r->status == 'Present');
                ?>
                  <tr>
                    <td>
                      <div class="date-cell">
                        <div class="day-box">
                          <span class="day-num"><?= $day ?></span>
                          <span class="day-month"><?= $monthAbr ?></span>
                        </div>
                        <div class="date-text">
                          <div class="day-name"><?= $dayName ?></div>
                          <div class="full-date"><?= $fullDate ?></div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <?php if ($r->status === 'Present' || $r->status === 'Late'): ?>
                        <div class="time-cell">
                          <i class='bx bx-time-five'></i>
                          <span class="time-value"><?= date('h:i A', strtotime($r->created_at)) ?></span>
                        </div>
                      <?php else: ?>
                        <div class="time-cell no-time" style="color: var(--text-tertiary); font-style: italic; opacity: 0.65;">
                          <i class='bx bx-time-five' style="opacity: 0.5;"></i>
                          <span class="time-value">—</span>
                        </div>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php 
                        $statusLower = strtolower($r->status);
                        $pillClass = match (true) {
                          $statusLower === 'present' => 'present',
                          $statusLower === 'late'    => 'late',
                          $statusLower === 'weekend' => 'weekend',
                          $statusLower === 'holiday' => 'holiday',
                          strpos($statusLower, 'leave') !== false => 'leave',
                          $statusLower === 'not marked' => 'not-marked',
                          default => 'absent',
                        };
                        $iconClass = match (true) {
                          $statusLower === 'present' => 'bx-check-circle',
                          $statusLower === 'late'    => 'bx-time-five',
                          $statusLower === 'weekend' => 'bx-spa',
                          $statusLower === 'holiday' => 'bx-gift',
                          strpos($statusLower, 'leave') !== false => 'bx-exit',
                          $statusLower === 'not marked' => 'bx-help-circle',
                          default => 'bx-x-circle',
                        };
                        $displayStatus = $r->status;
                        if ($r->status === 'Holiday' && !empty($r->holiday_name)) {
                          $displayStatus = 'Holiday (' . $r->holiday_name . ')';
                        }
                      ?>
                      <span class="status-pill <?= $pillClass ?>">
                        <i class='bx <?= $iconClass ?>'></i>
                        <?= htmlspecialchars($displayStatus) ?>
                      </span>
                    </td>
                    <td style="text-align: center;">
                      <button type="button" 
                              class="btn-edit-att" 
                              data-date="<?= $r->attendance_date ?>" 
                              data-formatted-date="<?= $fullDate ?> (<?= $dayName ?>)" 
                              data-status="<?= $r->status ?>" 
                              title="Edit Attendance"
                              style="width: 32px; height: 32px; border-radius: 50%; border: 1px solid var(--border-color); background: var(--bg-secondary); color: var(--primary); display: inline-flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s;"
                              onmouseover="this.style.background='var(--primary)'; this.style.color='#fff';"
                              onmouseout="this.style.background='var(--bg-secondary)'; this.style.color='var(--primary)';"
                              onclick="openEditModal(this)">
                        <i class='bx bx-edit-alt' style="font-size: 16px;"></i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4">
                    <div class="empty-state">
                      <div class="empty-icon">
                        <i class='bx bx-calendar-x'></i>
                      </div>
                      <h6>No Records Found</h6>
                      <p>No attendance records found for <?= date('F Y', strtotime($year . '-' . $month . '-01')) ?></p>
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

<!-- Edit Attendance Modal -->
<div class="modal fade" id="editAttendanceModal" tabindex="-1" aria-labelledby="editAttendanceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 16px; border: 1px solid var(--border-color); background: var(--bg-primary); box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
      <form action="<?= site_url('admin/attendance/update_attendance') ?>" method="post">
        <input type="hidden" name="employee_id" value="<?= $emp->id ?>">
        <input type="hidden" name="attendance_date" id="modal_date">
        
        <div class="modal-header" style="border-bottom: 1px solid var(--border-color); padding: 18px 24px;">
          <h5 class="modal-title" id="editAttendanceModalLabel" style="font-weight: 700; color: var(--text-primary); font-family: 'Inter', sans-serif; display: flex; align-items: center; gap: 8px; margin: 0;">
            <i class='bx bx-edit-alt' style="color: var(--primary); font-size: 22px;"></i>
            Update Attendance
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; font-size: 20px; color: var(--text-secondary); cursor: pointer; display: flex; align-items: center; justify-content: center; padding: 4px;"><i class='bx bx-x' style="font-size: 24px;"></i></button>
        </div>
        
        <div class="modal-body" style="padding: 24px; text-align: left;">
          <div class="mb-3">
            <label class="form-label" style="font-weight: 600; font-size: 11px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-bottom: 6px;">Date</label>
            <input type="text" id="modal_formatted_date" class="form-control" readonly style="background: var(--bg-secondary); border: 1px solid var(--border-color); border-radius: 8px; font-weight: 600; padding: 10px 14px; color: var(--text-primary); width: 100%;">
          </div>
          
          <div class="mb-3">
            <label class="form-label" style="font-weight: 600; font-size: 11px; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.5px; display: block; margin-bottom: 6px;">Status</label>
            <select name="status" id="modal_status" class="form-select" style="border: 1px solid var(--border-color); border-radius: 8px; padding: 10px 14px; font-weight: 500; color: var(--text-primary); background: var(--bg-primary); width: 100%;">
              <option value="Present">Present</option>
              <option value="Late">Late</option>
              <option value="Absent">Absent</option>
              <option value="Not Marked">Not Marked (Remove Record)</option>
            </select>
          </div>
        </div>
        
        <div class="modal-footer" style="border-top: 1px solid var(--border-color); padding: 18px 24px; display: flex; gap: 12px; justify-content: flex-end;">
          <button type="button" class="btn btn-outline" data-bs-dismiss="modal" style="padding: 10px 20px; border-radius: 8px; border: 1.5px solid var(--border-color); background: transparent; color: var(--text-secondary); font-weight: 600; cursor: pointer; font-size: 13px;">Cancel</button>
          <button type="submit" class="btn btn-primary" style="padding: 10px 20px; border-radius: 8px; border: none; background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); color: #fff; font-weight: 600; cursor: pointer; font-size: 13px; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.25);">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function openEditModal(btn) {
  const date = btn.getAttribute('data-date');
  const formattedDate = btn.getAttribute('data-formatted-date');
  let status = btn.getAttribute('data-status');
  
  // Clean status string if it's weekend, holiday or leave
  if (status.includes('Weekend')) {
    status = 'Not Marked';
  } else if (status.includes('Holiday')) {
    status = 'Not Marked';
  } else if (status.includes('Leave')) {
    status = 'Not Marked';
  }
  
  document.getElementById('modal_date').value = date;
  document.getElementById('modal_formatted_date').value = formattedDate;
  
  const statusSelect = document.getElementById('modal_status');
  statusSelect.value = status;
  
  // Show Bootstrap modal
  const modalEl = document.getElementById('editAttendanceModal');
  const modal = new bootstrap.Modal(modalEl);
  modal.show();
}
</script>