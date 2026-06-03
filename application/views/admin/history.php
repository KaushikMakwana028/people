<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
  /* ── General ── */
  .history-page .card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 4px 20px var(--shadow);
    overflow: hidden;
    background: var(--bg-primary);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  /* ── Breadcrumb Compact ── */
  .history-page .page-breadcrumb {
    background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
    border-radius: 14px;
    padding: 12px 20px;
    margin-bottom: 24px;
    box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
  }

  .history-page .page-breadcrumb .breadcrumb-title {
    color: #fff;
    font-weight: 700;
    font-size: 18px;
  }

  .history-page .page-breadcrumb .breadcrumb-item a,
  .history-page .page-breadcrumb .breadcrumb-item.active {
    color: rgba(255, 255, 255, 0.85);
  }

  .history-page .page-breadcrumb .breadcrumb-item a:hover {
    color: #fff;
  }

  /* ── Header Section ── */
  .history-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 2px solid var(--border-color);
  }

  .history-header h5 {
    font-size: 20px;
    font-weight: 800;
    color: var(--text-primary);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .history-header h5 i {
    font-size: 24px;
    color: var(--primary);
  }

  .employee-count-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 20px;
    border-radius: 40px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    font-size: 13px;
    font-weight: 600;
    box-shadow: 0 2px 8px rgba(99, 102, 241, 0.3);
  }

  .employee-count-badge i {
    font-size: 16px;
  }

  /* ── Search Bar ── */
  .search-wrap {
    position: relative;
    max-width: 380px;
    margin-bottom: 24px;
  }

  .search-wrap i {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
    color: var(--text-tertiary);
    transition: color 0.3s;
    z-index: 2;
  }

  .search-wrap input {
    width: 100%;
    padding: 12px 18px 12px 48px;
    border: 2px solid var(--border-color);
    border-radius: 14px;
    font-size: 14px;
    outline: none;
    transition: all 0.3s ease;
    background: var(--bg-secondary);
    color: var(--text-primary);
    font-weight: 500;
  }

  .search-wrap input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
    background: var(--bg-primary);
  }

  .search-wrap input:focus+i {
    color: var(--primary);
  }

  .search-wrap input::placeholder {
    color: var(--text-tertiary);
    font-weight: 400;
  }

  /* ── Professional Table Styles ── */
  .history-table-wrapper {
    overflow-x: auto;
  }

  .history-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0 8px;
  }

  .history-table thead th {
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

  .history-table thead th:first-child {
    border-radius: 12px 0 0 12px;
  }

  .history-table thead th:last-child {
    border-radius: 0 12px 12px 0;
  }

  .history-table thead th i {
    margin-right: 6px;
    font-size: 14px;
  }

  .history-table tbody tr {
    background: var(--bg-primary);
    box-shadow: 0 2px 8px var(--shadow);
    transition: all 0.2s ease;
  }

  .history-table tbody tr:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 18px var(--shadow-lg);
  }

  .history-table tbody td {
    padding: 16px 18px;
    border: none;
    vertical-align: middle;
    font-size: 13px;
    color: var(--text-primary);
    background: var(--bg-primary);
  }

  .history-table tbody td:first-child {
    border-radius: 14px 0 0 14px;
  }

  .history-table tbody td:last-child {
    border-radius: 0 14px 14px 0;
  }

  /* Employee Cell with Avatar */
  .employee-cell {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .employee-avatar {
    width: 44px;
    height: 44px;
    border-radius: 14px;
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 16px;
    flex-shrink: 0;
    box-shadow: 0 2px 8px rgba(99, 102, 241, 0.3);
  }

  .employee-info .employee-name {
    font-weight: 700;
    color: var(--text-primary);
    margin-bottom: 4px;
  }

  .employee-info .employee-email {
    font-size: 11px;
    color: var(--text-secondary);
  }

  /* ID Badge */
  .id-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 12px;
    border-radius: 20px;
    background: var(--bg-secondary);
    color: var(--primary);
    font-size: 12px;
    font-weight: 600;
    border: 1px solid var(--border-color);
  }

  .id-badge i {
    font-size: 12px;
  }

  /* Date Cell */
  .date-cell {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .date-cell i {
    font-size: 16px;
    color: var(--primary);
  }

  .date-info {
    line-height: 1.3;
  }

  .date-main {
    font-weight: 600;
    color: var(--text-primary);
  }

  .date-sub {
    font-size: 10px;
    color: var(--text-secondary);
  }

  /* Status Badge */
  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
  }

  .status-active {
    background: rgba(34, 197, 94, 0.12);
    color: #22c55e;
    border: 1px solid rgba(34, 197, 94, 0.3);
  }

  .status-inactive {
    background: rgba(239, 68, 68, 0.12);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
  }

  /* Action Buttons */
  .action-buttons {
    display: flex;
    gap: 8px;
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

  .btn-view {
    background: linear-gradient(135deg, #3b82f6, #2563eb);
    color: #fff;
    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
  }

  .btn-view:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(59, 130, 246, 0.4);
    color: #fff;
  }

  .btn-edit {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: #fff;
    box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
  }

  .btn-edit:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 14px rgba(245, 158, 11, 0.4);
    color: #fff;
  }

  /* ── Empty State ── */
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

  /* No Results */
  #noResults {
    text-align: center;
    padding: 40px 20px;
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

  /* ── Responsive ── */
  @media (max-width: 768px) {
    .history-table thead th {
      padding: 10px 12px;
      font-size: 10px;
    }

    .history-table tbody td {
      padding: 12px 12px;
    }

    .employee-avatar {
      width: 36px;
      height: 36px;
      font-size: 14px;
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

<div class="page-wrapper history-page">
  <div class="page-content">

    <!-- Enhanced Breadcrumb -->
    <div class="page-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2 fade-up">
      <div class="d-flex align-items-center">
        <div class="breadcrumb-title pe-2">
          <i class="bx bx-history me-1"></i> Employee History
        </div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="<?= base_url('admin/dashboard') ?>"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active">History</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Main Card -->
    <div class="card fade-up fade-d1">
      <div class="card-body" style="padding: 28px;">

        <!-- Header with Count -->
        <div class="history-header">
          <h5>
            <i class="bx bx-group"></i>
            Employee History
          </h5>
          <?php if (!empty($employees)): ?>
            <span class="employee-count-badge">
              <i class="bx bx-user"></i>
              <?= count($employees) ?> Employee<?= count($employees) > 1 ? 's' : '' ?>
            </span>
          <?php endif; ?>
        </div>

        <?php if (!empty($employees)): ?>

          <!-- Search Bar -->
          <div class="search-wrap fade-up fade-d2">
            <i class="bx bx-search-alt"></i>
            <input type="text" id="empSearch" placeholder="Search by name, email or ID...">
          </div>

          <!-- Professional Table -->
          <div class="history-table-wrapper fade-up fade-d3">
            <table class="history-table" id="employeeTable">
              <thead>
                <tr>
                  <th><i class="bx bx-user"></i> Employee</th>
                  <th><i class="bx bx-id-card"></i> Employee ID</th>
                  <th><i class="bx bx-calendar"></i> Joined Date</th>
                  <th><i class="bx bx-briefcase"></i> Department</th>
                  <th><i class="bx bx-check-circle"></i> Status</th>
                  <th><i class="bx bx-cog"></i> Actions</th>
                </tr>
              </thead>
              <tbody id="employeeTableBody">
                <?php foreach ($employees as $e):
                  $initial = strtoupper(substr($e->email, 0, 1));
                  $nameParts = explode('@', $e->email);
                  $displayName = $nameParts[0];
                  $joinedDate = date('M d, Y', strtotime($e->created_at ?? 'now'));
                  $department = $e->department ?? 'General';
                  $status = $e->status ?? 'active';
                ?>
                  <tr data-name="<?= strtolower($e->email) ?>" data-id="<?= $e->id ?>">
                    <td>
                      <div class="employee-cell">
                        <div class="employee-avatar"><?= $initial ?></div>
                        <div class="employee-info">
                          <div class="employee-name"><?= htmlspecialchars($displayName) ?></div>
                          <div class="employee-email"><?= htmlspecialchars($e->email) ?></div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span class="id-badge">
                        <i class="bx bx-id-card"></i> #<?= str_pad($e->id, 4, '0', STR_PAD_LEFT) ?>
                      </span>
                    </td>
                    <td>
                      <div class="date-cell">
                        <i class="bx bx-calendar"></i>
                        <div class="date-info">
                          <div class="date-main"><?= $joinedDate ?></div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span style="display: flex; align-items: center; gap: 6px;">
                        <i class="bx bx-briefcase" style="color: var(--primary);"></i>
                        <?= htmlspecialchars($department) ?>
                      </span>
                    </td>
                    <td>
                      <span class="status-badge <?= $status == 'active' ? 'status-active' : 'status-inactive' ?>">
                        <i class="bx <?= $status == 'active' ? 'bx-check-circle' : 'bx-x-circle' ?>"></i>
                        <?= ucfirst($status) ?>
                      </span>
                    </td>
                    <td>
                      <div class="action-buttons">
                        <a href="<?= base_url('admin/history/view/' . $e->id) ?>" class="btn-action btn-view">
                          <i class="bx bx-show"></i> View
                        </a>
                        <a href="<?= base_url('admin/employee/edit/' . $e->id) ?>" class="btn-action btn-edit">
                          <i class="bx bx-edit"></i> Edit
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <!-- No Results Message -->
          <div id="noResults" style="display: none;">
            <div class="empty-state">
              <div class="empty-icon">
                <i class="bx bx-search-alt"></i>
              </div>
              <h6>No Employees Found</h6>
              <p>No employees match your search criteria.</p>
              <button class="btn-create" id="clearSearchBtn" style="background: linear-gradient(135deg, var(--primary), var(--secondary)); color: #fff; border: none; padding: 10px 24px; border-radius: 12px; cursor: pointer; margin-top: 16px;">
                <i class="bx bx-refresh"></i> Clear Search
              </button>
            </div>
          </div>

        <?php else: ?>

          <!-- Empty State -->
          <div class="empty-state">
            <div class="empty-icon">
              <i class="bx bx-user-x"></i>
            </div>
            <h6>No Employees Found</h6>
            <p>There are no employees to display history for.</p>
            <a href="<?= base_url('admin/employee/add') ?>" class="btn-create" style="background: linear-gradient(135deg, var(--primary), var(--secondary)); color: #fff; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; padding: 10px 24px; border-radius: 12px; margin-top: 16px;">
              <i class="bx bx-plus-circle"></i> Add New Employee
            </a>
          </div>

        <?php endif; ?>

      </div>
    </div>

  </div>
</div>

<script>
  $(document).ready(function() {

    // Live search filter function
    function filterEmployees() {
      var val = $('#empSearch').val().toLowerCase().trim();
      var visible = 0;

      if (val === '') {
        $('#employeeTableBody tr').show();
        $('#noResults').hide();
        return;
      }

      $('#employeeTableBody tr').each(function() {
        var name = $(this).data('name') || '';
        var empId = $(this).data('id')?.toString() || '';
        var email = $(this).find('.employee-email').text().toLowerCase();
        var displayName = $(this).find('.employee-name').text().toLowerCase();

        if (displayName.indexOf(val) > -1 ||
          email.indexOf(val) > -1 ||
          empId.indexOf(val) > -1 ||
          name.indexOf(val) > -1) {
          $(this).show();
          visible++;
        } else {
          $(this).hide();
        }
      });

      if (visible === 0) {
        $('#noResults').fadeIn(200);
      } else {
        $('#noResults').hide();
      }
    }

    // Debounced search input
    var searchTimeout;
    $('#empSearch').on('keyup', function() {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(filterEmployees, 250);
    });

    // Clear search button
    $('#clearSearchBtn').on('click', function() {
      $('#empSearch').val('').trigger('keyup');
      $('#empSearch').focus();
    });

    // Auto-focus search on page load
    <?php if (!empty($employees)): ?>
      setTimeout(function() {
        $('#empSearch').focus();
      }, 500);
    <?php endif; ?>

  });
</script>