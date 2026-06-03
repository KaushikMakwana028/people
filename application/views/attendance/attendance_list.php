<style>
.att-page{--att-primary:#6366f1;--att-secondary:#8b5cf6;--att-success:#10b981;--att-danger:#ef4444;--att-warning:#f59e0b;--att-text:var(--text-primary,#0f172a);--att-muted:var(--text-secondary,#64748b);--att-faint:var(--text-tertiary,#94a3b8);--att-bg:var(--bg-secondary,#f8fafc);--att-card:var(--bg-primary,#fff);--att-soft:var(--bg-tertiary,#f1f5f9);--att-border:var(--border-color,#e2e8f0);--att-shadow:0 16px 42px rgba(15,23,42,.08);font-family:'Poppins',sans-serif;background:var(--att-bg);min-height:calc(100vh - 73px)}
[data-bs-theme=dark] .att-page{--att-shadow:0 16px 42px rgba(0,0,0,.32)}
.att-page .page-content{padding:26px 20px}.att-shell{max-width:1320px;margin:0 auto}.att-breadcrumb{display:flex;align-items:center;gap:8px;margin-bottom:22px;color:var(--att-muted);font-size:13px}.att-breadcrumb a{color:var(--att-primary);text-decoration:none}.att-head{display:flex;justify-content:space-between;align-items:center;gap:16px;margin-bottom:24px}.att-title{display:flex;align-items:center;gap:15px}.att-icon{width:56px;height:56px;border-radius:16px;display:grid;place-items:center;background:linear-gradient(135deg,var(--att-primary),var(--att-secondary));color:#fff;font-size:28px;box-shadow:0 10px 24px rgba(99,102,241,.28)}.att-title h1{font-size:28px;font-weight:850;color:var(--att-text);letter-spacing:-.04em;margin:0 0 5px}.att-title p{color:var(--att-muted);margin:0}.att-stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px;margin-bottom:24px}.att-stat{background:var(--att-card);border:1px solid var(--att-border);border-radius:18px;box-shadow:var(--att-shadow);padding:20px;display:flex;align-items:center;gap:16px;border-left:4px solid var(--stat-color)}.att-stat-icon{width:48px;height:48px;border-radius:14px;display:grid;place-items:center;background:var(--stat-bg);color:var(--stat-color);font-size:24px}.att-stat-num{font-size:28px;font-weight:900;color:var(--att-text);line-height:1}.att-stat-label{font-size:12px;font-weight:800;text-transform:uppercase;letter-spacing:.06em;color:var(--att-faint);margin-top:7px}.att-card{background:var(--att-card);border:1px solid var(--att-border);border-radius:20px;box-shadow:var(--att-shadow);overflow:hidden}.att-card-head{display:flex;justify-content:space-between;align-items:center;gap:16px;padding:20px 22px;border-bottom:1px solid var(--att-border)}.att-card-title{display:flex;align-items:center;gap:10px;font-size:18px;font-weight:850;color:var(--att-text)}.att-count{display:inline-flex;align-items:center;justify-content:center;min-width:28px;height:28px;border-radius:999px;background:linear-gradient(135deg,var(--att-primary),var(--att-secondary));color:#fff;font-size:13px}.att-tools{display:flex;align-items:center;gap:10px}.att-search{position:relative}.att-search i{position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--att-faint)}.att-search input{height:44px;width:280px;border:1px solid var(--att-border);border-radius:13px;background:var(--att-soft);color:var(--att-text);padding:0 14px 0 40px;outline:0}.att-filter{height:44px;border:1px solid var(--att-border);border-radius:13px;background:var(--att-card);color:var(--att-muted);padding:0 16px;font-weight:600}.att-table-wrap{overflow-x:auto}.att-table{width:100%;min-width:760px;border-collapse:collapse}.att-table th,.att-table td{padding:16px 22px;border-bottom:1px solid var(--att-border);vertical-align:middle}.att-table th{background:var(--att-bg);color:var(--att-faint);font-size:12px;font-weight:850;text-transform:uppercase;letter-spacing:.07em}.att-table td{color:var(--att-text)}.serial-num{width:32px;height:32px;border-radius:9px;background:var(--att-soft);display:grid;place-items:center;color:var(--att-muted);font-weight:800}.emp-cell{display:flex;align-items:center;gap:12px}.emp-avatar{position:relative;width:44px;height:44px}.emp-avatar img,.avatar-initial{width:44px;height:44px;border-radius:13px;object-fit:cover}.avatar-initial{display:grid;place-items:center;background:linear-gradient(135deg,var(--att-primary),var(--att-secondary));color:#fff;font-weight:850}.online-dot{position:absolute;right:-1px;bottom:-1px;width:12px;height:12px;border-radius:50%;background:var(--att-success);border:2px solid var(--att-card)}.emp-name{font-weight:850;margin:0;color:var(--att-text)}.emp-role{margin:2px 0 0;color:var(--att-faint);font-size:12px}.status-pill{display:inline-flex;align-items:center;gap:7px;padding:7px 12px;border-radius:999px;font-weight:850;font-size:12px}.status-pill .dot{width:7px;height:7px;border-radius:50%;background:currentColor}.status-pill.active{background:rgba(16,185,129,.12);color:var(--att-success)}.status-pill.inactive{background:rgba(239,68,68,.12);color:var(--att-danger)}.btn-view-details{display:inline-flex;align-items:center;gap:8px;border-radius:12px;background:linear-gradient(135deg,var(--att-primary),var(--att-secondary));color:#fff;text-decoration:none;font-weight:800;padding:10px 15px}.btn-view-details:hover{color:#fff}.att-footer{display:flex;justify-content:space-between;align-items:center;gap:12px;padding:16px 22px;color:var(--att-muted);font-size:13px}.empty-state{text-align:center;padding:50px;color:var(--att-faint)}.empty-state i{font-size:42px;margin-bottom:12px}
@media(max-width:992px){.att-stats{grid-template-columns:repeat(2,1fr)}}@media(max-width:720px){.att-page .page-content{padding:18px 12px}.att-head,.att-card-head,.att-footer{flex-direction:column;align-items:stretch}.att-stats{grid-template-columns:1fr}.att-tools{flex-direction:column}.att-search input,.att-filter{width:100%}.btn-view-details{justify-content:center}}
</style>

<div class="page-wrapper att-page">
  <div class="page-content">
    <div class="att-shell">
      <div class="att-breadcrumb">
        <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Home</a>
        <i class='bx bx-chevron-right'></i>
        <span>Employee Attendance</span>
      </div>

      <div class="att-head">
        <div class="att-title">
          <div class="att-icon"><i class='bx bx-calendar-check'></i></div>
          <div>
            <h1>Employee Attendance</h1>
            <p>Track and manage attendance records for all employees</p>
          </div>
        </div>
      </div>

      <div class="att-stats">
        <div class="att-stat" style="--stat-color:var(--att-primary);--stat-bg:rgba(99,102,241,.12)"><div class="att-stat-icon"><i class='bx bx-group'></i></div><div><div class="att-stat-num"><?= !empty($employees) ? count($employees) : 0 ?></div><div class="att-stat-label">Total Employees</div></div></div>
        <div class="att-stat" style="--stat-color:var(--att-success);--stat-bg:rgba(16,185,129,.12)"><div class="att-stat-icon"><i class='bx bx-check-circle'></i></div><div><div class="att-stat-num"><?= (int) $present_today ?></div><div class="att-stat-label">Present Today</div></div></div>
        <div class="att-stat" style="--stat-color:var(--att-danger);--stat-bg:rgba(239,68,68,.12)"><div class="att-stat-icon"><i class='bx bx-x-circle'></i></div><div><div class="att-stat-num"><?= (int) $absent_today ?></div><div class="att-stat-label">Absent Today</div></div></div>
        <div class="att-stat" style="--stat-color:var(--att-warning);--stat-bg:rgba(245,158,11,.12)"><div class="att-stat-icon"><i class='bx bx-time-five'></i></div><div><div class="att-stat-num">—</div><div class="att-stat-label">Late Arrivals</div></div></div>
      </div>

      <div class="att-card">
        <div class="att-card-head">
          <div class="att-card-title"><i class='bx bx-list-ul' style="color:var(--att-primary)"></i> Employee List <span class="att-count" id="employeeCount"><?= !empty($employees) ? count($employees) : 0 ?></span></div>
          <div class="att-tools">
            <div class="att-search"><i class='bx bx-search'></i><input type="text" id="employeeSearch" placeholder="Search employees..." autocomplete="off"></div>
            <button type="button" class="att-filter"><i class='bx bx-filter-alt'></i> Filter</button>
          </div>
        </div>

        <?php if (!empty($employees)): ?>
          <div class="att-table-wrap">
            <table class="att-table" id="attendanceTable">
              <thead><tr><th style="width:70px">#</th><th>Employee</th><th>Status</th><th style="width:180px">Action</th></tr></thead>
              <tbody>
                <?php $index = 0; foreach ($employees as $emp): $index++;
                  $name = trim($emp->emp_name ?? '');
                  $parts = preg_split('/\s+/', $name);
                  $initials = count($parts) > 1 ? strtoupper(substr($parts[0], 0, 1) . substr(end($parts), 0, 1)) : strtoupper(substr($name ?: '-', 0, 1));
                ?>
                  <tr class="emp-row">
                    <td><span class="serial-num"><?= $index ?></span></td>
                    <td>
                      <div class="emp-cell">
                        <div class="emp-avatar">
                          <?php if (!empty($emp->photo)): ?>
                            <img src="<?= base_url('uploads/profile/' . $emp->photo) ?>" alt="<?= htmlspecialchars($name) ?>">
                          <?php else: ?>
                            <div class="avatar-initial"><?= htmlspecialchars($initials) ?></div>
                          <?php endif; ?>
                          <span class="online-dot"></span>
                        </div>
                        <div><p class="emp-name"><?= htmlspecialchars(ucfirst($name)) ?></p><p class="emp-role">Employee</p></div>
                      </div>
                    </td>
                    <td>
                      <?php if ($emp->today_status === 'Present'): ?>
                        <span class="status-pill active"><span class="dot"></span> Present</span>
                      <?php else: ?>
                        <span class="status-pill inactive"><span class="dot"></span> Absent</span>
                      <?php endif; ?>
                    </td>
                    <td><a href="<?= site_url('admin/attendance/view_details/' . $emp->id) ?>" class="btn-view-details"><span>View Details</span><i class='bx bx-right-arrow-alt'></i></a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="att-footer"><span>Showing <strong id="visibleCount"><?= count($employees) ?></strong> of <strong><?= count($employees) ?></strong> employees</span><span>Page 1</span></div>
        <?php else: ?>
          <div class="empty-state"><i class='bx bx-calendar-x'></i><h5>No Attendance Data Found</h5><p>No employee attendance records are available.</p></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('employeeSearch');
  if (!searchInput) return;

  searchInput.addEventListener('input', function () {
    const query = this.value.toLowerCase().trim();
    let visibleCount = 0;

    document.querySelectorAll('.emp-row').forEach(function (row) {
      const visible = row.textContent.toLowerCase().includes(query);
      row.style.display = visible ? '' : 'none';
      if (visible) visibleCount++;
    });

    document.getElementById('employeeCount').textContent = visibleCount;
    document.getElementById('visibleCount').textContent = visibleCount;
  });
});
</script>
