<style>
  /* ── General ── */
  .leave-page .card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 4px 20px var(--shadow);
    overflow: hidden;
    background: var(--bg-primary);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  /* ── Breadcrumb Compact ── */
  .page-breadcrumb {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    border-radius: 14px;
    padding: 12px 20px;
    margin-bottom: 24px;
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
  }

  .page-breadcrumb .breadcrumb-title {
    color: #fff;
    font-weight: 700;
    font-size: 18px;
  }

  .page-breadcrumb .breadcrumb-item a,
  .page-breadcrumb .breadcrumb-item.active {
    color: rgba(255, 255, 255, 0.85);
  }

  .page-breadcrumb .breadcrumb-item a:hover {
    color: #fff;
  }

  /* ── Summary Cards – Modern & Compact ── */
  .summary-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 24px;
  }

  .stat-card {
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

  .stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 28px var(--shadow-lg);
  }

  .stat-card::before {
    content: '';
    position: absolute;
    width: 120px;
    height: 120px;
    border-radius: 50%;
    top: -40px;
    right: -30px;
    background: rgba(255, 255, 255, 0.1);
  }

  .stat-left {
    flex: 1;
  }

  .stat-card .stat-count {
    font-size: 34px;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 6px;
  }

  .stat-card .stat-label {
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    opacity: 0.85;
  }

  .stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    background: rgba(255, 255, 255, 0.2);
  }

  .stat-total {
    background: linear-gradient(135deg, #6366F1 0%, #8B5CF6 100%);
    color: #fff;
  }

  .stat-pending {
    background: linear-gradient(135deg, rgba(245, 158, 11, 0.12) 0%, rgba(217, 119, 6, 0.2) 100%);
    color: #f59e0b;
    border-left: 4px solid #f59e0b;
  }

  .stat-approved {
    background: linear-gradient(135deg, rgba(34, 197, 94, 0.12) 0%, rgba(22, 163, 74, 0.2) 100%);
    color: #22c55e;
    border-left: 4px solid #22c55e;
  }

  .stat-rejected {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.12) 0%, rgba(220, 38, 38, 0.2) 100%);
    color: #ef4444;
    border-left: 4px solid #ef4444;
  }

  /* ── Table Styles – Professional & Clean ── */
  .leave-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 10px;
  }

  .leave-table thead th {
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

  .leave-table thead th:first-child {
    border-radius: 12px 0 0 12px;
  }

  .leave-table thead th:last-child {
    border-radius: 0 12px 12px 0;
  }

  .leave-table thead th i {
    margin-right: 6px;
    font-size: 14px;
  }

  .leave-table tbody tr {
    background: var(--bg-primary);
    box-shadow: 0 2px 8px var(--shadow);
    transition: all 0.2s ease;
    cursor: pointer;
  }

  .leave-table tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px var(--shadow-lg);
  }

  .leave-table tbody td {
    padding: 16px 18px;
    border: none;
    vertical-align: middle;
    font-size: 13px;
    color: var(--text-primary);
    background: var(--bg-primary);
  }

  .leave-table tbody td:first-child {
    border-radius: 14px 0 0 14px;
  }

  .leave-table tbody td:last-child {
    border-radius: 0 14px 14px 0;
  }

  /* Serial Number Badge */
  .serial-num {
    width: 34px;
    height: 34px;
    border-radius: 10px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 13px;
    box-shadow: 0 2px 8px rgba(99, 102, 241, 0.3);
  }

  /* Employee Cell */
  .emp-cell {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 600;
    color: var(--text-primary);
  }

  .emp-avatar {
    width: 40px;
    height: 40px;
    border-radius: 12px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
    flex-shrink: 0;
    box-shadow: 0 2px 8px rgba(99, 102, 241, 0.2);
  }

  .emp-info {
    display: flex;
    flex-direction: column;
  }

  .emp-name {
    font-weight: 600;
    color: var(--text-primary);
  }

  .emp-email {
    font-size: 11px;
    color: var(--text-secondary);
  }

  /* Date Cell */
  .date-cell {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .date-cell i {
    color: var(--primary);
    font-size: 20px;
  }

  .date-info {
    line-height: 1.3;
  }

  .date-main {
    font-weight: 600;
    color: var(--text-primary);
  }

  .day-name {
    font-size: 10px;
    color: var(--text-secondary);
    text-transform: uppercase;
  }

  /* Leave Type Pills */
  .type-pill {
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

  .type-pill i {
    font-size: 14px;
  }

  /* Reason Cell */
  .reason-cell {
    max-width: 220px;
    font-size: 12px;
    color: var(--text-secondary);
    line-height: 1.4;
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
  }

  /* Status Pills */
  .status-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.3px;
  }

  .status-pill.approved {
    background: rgba(34, 197, 94, 0.12);
    color: #22c55e;
    border: 1px solid rgba(34, 197, 94, 0.3);
  }

  .status-pill.rejected {
    background: rgba(239, 68, 68, 0.12);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
  }

  .status-pill.pending {
    background: rgba(245, 158, 11, 0.12);
    color: #f59e0b;
    border: 1px solid rgba(245, 158, 11, 0.3);
  }

  .status-pill i {
    font-size: 14px;
  }

  /* Action Buttons */
  .action-btns {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
  }

  .btn-approve,
  .btn-reject {
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

  .btn-approve {
    background: linear-gradient(135deg, #22c55e, #16a34a);
    color: #fff;
    box-shadow: 0 2px 8px rgba(34, 197, 94, 0.3);
  }

  .btn-approve:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(34, 197, 94, 0.4);
    color: #fff;
  }

  .btn-reject {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: #fff;
    box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
  }

  .btn-reject:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(239, 68, 68, 0.4);
    color: #fff;
  }

  .no-action {
    font-size: 11px;
    color: var(--text-tertiary);
    font-style: italic;
  }

  /* Empty State */
  .empty-state {
    text-align: center;
    padding: 60px 20px;
  }

  .empty-state i {
    font-size: 64px;
    color: var(--text-tertiary);
    display: block;
    margin-bottom: 16px;
    opacity: 0.5;
  }

  .empty-state p {
    color: var(--text-secondary);
    font-size: 14px;
    margin: 0;
  }

  /* DataTables Customization */
  .dataTables_wrapper .dataTables_filter {
    margin-bottom: 20px;
  }

  .dataTables_wrapper .dataTables_filter input {
    border: 2px solid var(--border-color);
    border-radius: 12px;
    padding: 10px 16px 10px 38px;
    font-size: 13px;
    transition: all 0.2s;
    background-color: var(--bg-secondary);
    color: var(--text-primary);
    width: 260px;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>');
    background-repeat: no-repeat;
    background-position: 12px center;
  }

  .dataTables_wrapper .dataTables_filter input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    outline: none;
    background-color: var(--bg-primary);
  }

  .dataTables_wrapper .dataTables_length select {
    border: 2px solid var(--border-color);
    border-radius: 10px;
    padding: 6px 12px;
    background-color: var(--bg-secondary);
    color: var(--text-primary);
    font-size: 13px;
  }

  .dataTables_wrapper .dataTables_info {
    color: var(--text-secondary);
    font-size: 12px;
    padding-top: 20px;
  }

  .dataTables_wrapper .dataTables_paginate {
    padding-top: 20px;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button {
    border-radius: 8px !important;
    border: none !important;
    margin: 0 3px;
    padding: 6px 12px !important;
    transition: all 0.2s;
    background: var(--bg-secondary) !important;
    color: var(--text-secondary) !important;
    font-size: 12px;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: linear-gradient(135deg, var(--primary), var(--secondary)) !important;
    color: #fff !important;
    border: none !important;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: rgba(99, 102, 241, 0.1) !important;
    color: var(--primary) !important;
    border: none !important;
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
    animation-delay: 0.05s;
    opacity: 0;
  }

  .fade-d2 {
    animation-delay: 0.1s;
    opacity: 0;
  }

  .fade-d3 {
    animation-delay: 0.15s;
    opacity: 0;
  }

  .fade-d4 {
    animation-delay: 0.2s;
    opacity: 0;
  }

  .fade-d5 {
    animation-delay: 0.25s;
    opacity: 0;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .summary-row {
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
      gap: 12px;
    }

    .stat-card {
      padding: 14px 16px;
    }

    .stat-card .stat-count {
      font-size: 28px;
    }

    .leave-table thead th {
      padding: 10px 12px;
      font-size: 10px;
    }

    .leave-table tbody td {
      padding: 12px 12px;
    }

    .action-btns {
      flex-direction: column;
    }

    .dataTables_wrapper .dataTables_filter input {
      width: 100%;
    }
  }
</style>

<div class="page-wrapper leave-page">
  <div class="page-content">

    <!-- Compact Breadcrumb -->
    <div class="page-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2 fade-up">
      <div class="d-flex align-items-center">
        <div class="breadcrumb-title pe-2">
          <i class="bx bx-calendar-edit me-1"></i> Leave Management
        </div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="<?= base_url('admin/dashboard') ?>"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active">Leave List</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Summary Cards - Modern Layout -->
    <?php
    $total = count($leaves);
    $pending_c = 0;
    $approved_c = 0;
    $rejected_c = 0;
    foreach ($leaves as $l) {
      if ($l->status == 'Pending') $pending_c++;
      elseif ($l->status == 'Approved') $approved_c++;
      elseif ($l->status == 'Rejected') $rejected_c++;
    }
    ?>
    <div class="summary-row">
      <div class="stat-card stat-total fade-up fade-d1">
        <div class="stat-left">
          <div class="stat-count"><?= $total ?></div>
          <div class="stat-label">Total Requests</div>
        </div>
        <div class="stat-icon"><i class="bx bx-list-ul"></i></div>
      </div>
      <div class="stat-card stat-pending fade-up fade-d2">
        <div class="stat-left">
          <div class="stat-count"><?= $pending_c ?></div>
          <div class="stat-label">Pending</div>
        </div>
        <div class="stat-icon"><i class="bx bx-time"></i></div>
      </div>
      <div class="stat-card stat-approved fade-up fade-d3">
        <div class="stat-left">
          <div class="stat-count"><?= $approved_c ?></div>
          <div class="stat-label">Approved</div>
        </div>
        <div class="stat-icon"><i class="bx bx-check-circle"></i></div>
      </div>
      <div class="stat-card stat-rejected fade-up fade-d4">
        <div class="stat-left">
          <div class="stat-count"><?= $rejected_c ?></div>
          <div class="stat-label">Rejected</div>
        </div>
        <div class="stat-icon"><i class="bx bx-x-circle"></i></div>
      </div>
    </div>

    <!-- Main Card -->
    <div class="card fade-up fade-d5">
      <div class="card-body" style="padding: 24px;">

        <!-- Table -->
        <div class="table-responsive">
          <table id="leaveTable" class="leave-table">
            <thead>
              <tr>
                <th><i class="bx bx-hash"></i> #</th>
                <th><i class="bx bx-user"></i> Employee</th>
                <th><i class="bx bx-calendar"></i> Date</th>
                <th><i class="bx bx-category"></i> Type</th>
                <th><i class="bx bx-message-detail"></i> Reason</th>
                <th><i class="bx bx-info-circle"></i> Status</th>
                <th><i class="bx bx-cog"></i> Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($leaves)): ?>
                <?php $i = 1;
                foreach ($leaves as $row):
                  $initial = strtoupper(substr($row->email, 0, 1));
                  $dateObj = strtotime($row->leave_date);
                  $dateDisp = date('d M Y', $dateObj);
                  $dayName = date('l', $dateObj);
                  $statusCls = 'pending';
                  $statusIcon = 'bx-time';
                  if ($row->status == 'Approved') {
                    $statusCls = 'approved';
                    $statusIcon = 'bx-check-circle';
                  } elseif ($row->status == 'Rejected') {
                    $statusCls = 'rejected';
                    $statusIcon = 'bx-x-circle';
                  }
                ?>
                  <tr>
                    <td><span class="serial-num"><?= $i++ ?></span></td>
                    <td>
                      <div class="emp-cell">
                        <div class="emp-avatar"><?= $initial ?></div>
                        <div class="emp-info">
                          <span class="emp-name"><?= $row->email ?></span>
                          <span class="emp-email">Employee</span>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="date-cell">
                        <i class="bx bx-calendar-event"></i>
                        <div class="date-info">
                          <div class="date-main"><?= $dateDisp ?></div>
                          <div class="day-name"><?= $dayName ?></div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span class="type-pill">
                        <i class="bx bx-bookmark"></i>
                        <?php
                          if ($row->leave_type == 'first_half') {
                              echo '1st Half (10 AM - 2 PM)';
                          } elseif ($row->leave_type == 'second_half') {
                              echo '2nd Half (2 PM - 7 PM)';
                          } else {
                              echo str_replace('_', ' ', ucfirst($row->leave_type));
                          }
                        ?>
                      </span>
                    </td>
                    <td>
                      <div class="reason-cell" title="<?= !empty($row->reason) ? htmlspecialchars($row->reason) : 'No reason provided' ?>">
                        <?= !empty($row->reason) ? htmlspecialchars($row->reason) : '<span class="text-muted" style="font-size: 11px; font-style: italic; opacity: 0.65;">No reason provided</span>' ?>
                      </div>
                    </td>
                    <td>
                      <span class="status-pill <?= $statusCls ?>">
                        <i class="bx <?= $statusIcon ?>"></i>
                        <?= $row->status ?>
                      </span>
                    </td>
                    <td>
                      <?php if ($row->status == 'Pending'): ?>
                        <div class="action-btns">
                          <a href="<?= base_url('admin/leave/approve/' . $row->id) ?>"
                            class="btn-approve"
                            onclick="return confirmSweetAction(this, 'Approve this leave request?')">
                            <i class="bx bx-check"></i> Approve
                          </a>
                          <a href="<?= base_url('admin/leave/reject/' . $row->id) ?>"
                            class="btn-reject"
                            onclick="return confirmSweetAction(this, 'Reject this leave request?')">
                            <i class="bx bx-x"></i> Reject
                          </a>
                        </div>
                      <?php else: ?>
                        <span class="no-action">— No action —</span>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="7">
                    <div class="empty-state">
                      <i class="bx bx-calendar-x"></i>
                      <p>No leave requests found.</p>
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

<script>
  $(document).ready(function() {
    // Initialize DataTable if table has rows
    if ($('#leaveTable tbody tr').length > 1 || ($('#leaveTable tbody tr').length === 1 && !$('#leaveTable tbody tr td .empty-state').length)) {
      $('#leaveTable').DataTable({
        pageLength: 10,
        lengthMenu: [
          [5, 10, 25, 50, 100],
          [5, 10, 25, 50, 100]
        ],
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        responsive: true,
        language: {
          search: '',
          searchPlaceholder: 'Search leave requests...',
          lengthMenu: 'Show _MENU_ entries',
          info: 'Showing _START_ to _END_ of _TOTAL_ requests',
          infoEmpty: 'No requests found',
          infoFiltered: '(filtered from _MAX_ total requests)',
          zeroRecords: '<div class="empty-state" style="padding:40px"><i class="bx bx-search-alt"></i><p>No matching leave requests found</p></div>'
        }
      });

      // Move search input styling - add custom class
      $('.dataTables_filter input').addClass('form-control form-control-sm');
      $('.dataTables_length select').addClass('form-select form-select-sm');
    }
  });
</script>
