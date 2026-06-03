<div class="page-wrapper">
    <div class="page-content">

        <!-- ================= HEADER ================= -->
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2 small">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('index.php/dashboard') ?>" class="text-decoration-none">
                                <i class="bx bx-home-alt"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">My Projects</li>
                    </ol>
                </nav>

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="page-icon">
                            <i class="bx bx-briefcase"></i>
                        </div>
                        <div>
                            <h4 class="mb-0 fw-bold">My Projects</h4>
                            <p class="text-muted mb-0 mt-1 small">
                                Browse your assigned projects &amp; manage tasks
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 align-items-center">
                        <!-- Live Clock -->
                        <div class="live-clock d-none d-md-flex">
                            <i class="bx bx-time-five"></i>
                            <span id="liveClock">--:--</span>
                        </div>

                        <!-- Total Badge -->
                        <div class="total-badge">
                            <span id="totalCount"><?= count($projects ?? []) ?></span>
                            <small>Projects</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= FLASH MESSAGES ================= -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm flash-msg" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <div class="alert-icon success"><i class="bx bx-check-circle"></i></div>
                    <div><strong>Success!</strong> <?= $this->session->flashdata('success') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm flash-msg" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <div class="alert-icon danger"><i class="bx bx-error-circle"></i></div>
                    <div><strong>Error!</strong> <?= $this->session->flashdata('error') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- ================= QUICK STATS ================= -->
        <?php
        $total = count($projects ?? []);
        $active = 0;
        $completed = 0;
        $totalTasks = 0;
        if (!empty($projects)) {
            foreach ($projects as $p) {
                $s = $p->status ?? 'active';
                if ($s === 'active' || $s === 'in_progress')
                    $active++;
                elseif ($s === 'completed')
                    $completed++;
                if (isset($p->task_count))
                    $totalTasks += $p->task_count;
            }
        }
        ?>
        <div class="row g-3 mb-4">
            <div class="col-lg-3 col-sm-6">
                <div class="mini-stat-card" onclick="filterByStatus('all')">
                    <div class="mini-stat-icon bg-primary-soft text-primary">
                        <i class="bx bx-folder"></i>
                    </div>
                    <div class="mini-stat-info">
                        <div class="mini-stat-number" data-count="<?= $total ?>">0</div>
                        <div class="mini-stat-label">Total Projects</div>
                    </div>
                    <div class="mini-stat-trend up">
                        <i class="bx bx-trending-up"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="mini-stat-card" onclick="filterByStatus('active')">
                    <div class="mini-stat-icon bg-success-soft text-success">
                        <i class="bx bx-play-circle"></i>
                    </div>
                    <div class="mini-stat-info">
                        <div class="mini-stat-number" data-count="<?= $active ?>">0</div>
                        <div class="mini-stat-label">Active</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="mini-stat-card" onclick="filterByStatus('completed')">
                    <div class="mini-stat-icon bg-info-soft text-info">
                        <i class="bx bx-check-double"></i>
                    </div>
                    <div class="mini-stat-info">
                        <div class="mini-stat-number" data-count="<?= $completed ?>">0</div>
                        <div class="mini-stat-label">Completed</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="mini-stat-card">
                    <div class="mini-stat-icon bg-warning-soft text-warning">
                        <i class="bx bx-task"></i>
                    </div>
                    <div class="mini-stat-info">
                        <div class="mini-stat-number" data-count="<?= $totalTasks ?>">0</div>
                        <div class="mini-stat-label">Total Tasks</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= MAIN CARD ================= -->
        <div class="card main-card border-0 shadow-sm">

            <!-- TOOLBAR -->
            <div class="card-header bg-transparent border-0 py-3">
                <div class="row g-3 align-items-center">
                    <!-- Search -->
                    <div class="col-lg-5 col-md-6">
                        <div class="search-wrapper">
                            <i class="bx bx-search search-ico"></i>
                            <input type="text" class="form-control search-field" id="searchInput"
                                placeholder="Search projects... (Ctrl+K)" autocomplete="off">
                            <button class="clear-btn d-none" id="clearBtn">
                                <i class="bx bx-x"></i>
                            </button>
                            <span class="search-shortcut d-none d-md-inline">
                                <kbd>Ctrl</kbd><kbd>K</kbd>
                            </span>
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div class="col-lg-3 col-md-3">
                        <select class="form-select filter-select" id="statusFilter">
                            <option value="all">All Status</option>
                            <option value="active">Active</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="on_hold">On Hold</option>
                        </select>
                    </div>

                    <!-- View Toggle & Info -->
                    <div class="col-lg-4 col-md-3">
                        <div class="d-flex align-items-center justify-content-end gap-3">
                            <span class="result-pill" id="resultPill">
                                <span id="visibleCount"><?= $total ?></span> results
                            </span>

                            <div class="view-switcher" role="group">
                                <button class="vs-btn active" id="listViewBtn" title="List View">
                                    <i class="bx bx-list-ul"></i>
                                </button>
                                <button class="vs-btn" id="gridViewBtn" title="Grid View">
                                    <i class="bx bx-grid-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Filter Tags -->
                <div class="filter-tags-bar mt-3 d-none" id="filterBar">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <small class="text-muted">Filters:</small>
                        <span class="ftag d-none" id="ftagSearch">
                            <i class="bx bx-search"></i> "<span id="ftagSearchVal"></span>"
                            <button onclick="clearSearch()"><i class="bx bx-x"></i></button>
                        </span>
                        <span class="ftag d-none" id="ftagStatus">
                            <i class="bx bx-filter"></i> <span id="ftagStatusVal"></span>
                            <button onclick="clearStatus()"><i class="bx bx-x"></i></button>
                        </span>
                        <a href="#" class="text-danger small ms-2" onclick="clearAllFilters(); return false;">
                            Clear all
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">

                <!-- ========== LIST VIEW ========== -->
                <div id="listViewContainer">
                    <div class="project-list" id="projectList">
                        <?php if (!empty($projects)): ?>
                            <?php
                            $idx = 0;
                            foreach ($projects as $p):
                                $idx++;
                                $status = $p->status ?? 'active';
                                $progress = $p->progress ?? 0;
                                $taskCount = $p->task_count ?? 0;
                                $doneTasks = $p->done_tasks ?? 0;
                                $deadline = $p->deadline ?? '';
                                $desc = $p->project_description ?? '';

                                // Status config
                                $statusMap = [
                                    'active' => ['bg-success-soft text-success', 'bx-play-circle', 'Active'],
                                    'in_progress' => ['bg-primary-soft text-primary', 'bx-loader-circle', 'In Progress'],
                                    'completed' => ['bg-info-soft text-info', 'bx-check-double', 'Completed'],
                                    'on_hold' => ['bg-warning-soft text-warning', 'bx-pause-circle', 'On Hold'],
                                    'cancelled' => ['bg-danger-soft text-danger', 'bx-x-circle', 'Cancelled'],
                                ];
                                $sc = $statusMap[$status] ?? $statusMap['active'];

                                // Avatar color
                                $colors = ['#6366f1', '#8b5cf6', '#ec4899', '#f43f5e', '#f97316', '#eab308', '#22c55e', '#14b8a6', '#06b6d4', '#3b82f6'];
                                $cIdx = abs(crc32($p->project_name ?? 'X')) % count($colors);
                                $avColor = $colors[$cIdx];
                                $initials = strtoupper(mb_substr($p->project_name ?? '?', 0, 2));

                                // Progress
                                if ($progress >= 80)
                                    $progClass = 'prog-success';
                                elseif ($progress >= 50)
                                    $progClass = 'prog-info';
                                elseif ($progress >= 25)
                                    $progClass = 'prog-warning';
                                else
                                    $progClass = 'prog-danger';

                                // Deadline
                                $isOverdue = ($deadline && strtotime($deadline) < time() && $status !== 'completed');
                                $daysLeft = $deadline ? (int) ceil((strtotime($deadline) - time()) / 86400) : null;
                                ?>
                                <div class="project-item" data-name="<?= htmlspecialchars(strtolower($p->project_name)) ?>"
                                    data-status="<?= $status ?>" data-id="<?= $p->id ?>"
                                    style="--anim-delay: <?= $idx * 0.05 ?>s">

                                    <!-- Left: Avatar + Info -->
                                    <div class="pi-left">
                                        <div class="pi-avatar" style="--av-color: <?= $avColor ?>">
                                            <?= $initials ?>
                                        </div>

                                        <div class="pi-info">
                                            <div class="pi-name-row">
                                                <h6 class="pi-name"><?= htmlspecialchars($p->project_name) ?></h6>
                                                <span class="pi-status <?= $sc[0] ?>">
                                                    <i class="bx <?= $sc[1] ?>"></i>
                                                    <?= $sc[2] ?>
                                                </span>
                                            </div>

                                            <?php if ($desc): ?>
                                                <p class="pi-desc"><?= htmlspecialchars($desc) ?></p>
                                            <?php endif; ?>

                                            <div class="pi-meta">
                                                <!-- Tasks -->
                                                <?php if ($taskCount > 0): ?>
                                                    <span class="pi-meta-item">
                                                        <i class="bx bx-check-square"></i>
                                                        <?= $doneTasks ?>/<?= $taskCount ?> tasks
                                                    </span>
                                                <?php endif; ?>

                                                <!-- Progress -->
                                                <?php if ($progress > 0): ?>
                                                    <span class="pi-meta-item">
                                                        <div class="mini-progress">
                                                            <div class="mini-progress-bar <?= $progClass ?>"
                                                                style="width: <?= $progress ?>%"></div>
                                                        </div>
                                                        <?= $progress ?>%
                                                    </span>
                                                <?php endif; ?>

                                                <!-- Deadline -->
                                                <?php if ($deadline): ?>
                                                    <span class="pi-meta-item <?= $isOverdue ? 'overdue' : '' ?>">
                                                        <i class="bx <?= $isOverdue ? 'bx-error-circle' : 'bx-calendar' ?>"></i>
                                                        <?php if ($isOverdue): ?>
                                                            Overdue
                                                        <?php elseif ($daysLeft !== null && $daysLeft <= 7 && $daysLeft >= 0): ?>
                                                            <?= $daysLeft ?> days left
                                                        <?php else: ?>
                                                            <?= date('M d, Y', strtotime($deadline)) ?>
                                                        <?php endif; ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right: Action -->
                                    <div class="pi-right d-flex gap-2">

                                        <!-- VIEW TASK -->
                                        <a href="<?= site_url('project/tasks_by_project/' . $p->id) ?>" class="btn-view-tasks">
                                            <i class="bx bx-task"></i>
                                        </a>

                                        <!-- EDIT -->
                                        <a href="<?= base_url('index.php/project/edit/' . $p->id) ?>"
                                            class="btn btn-sm btn-primary" title="Edit">
                                            <i class="bx bx-edit"></i>
                                        </a>

                                        <!-- DELETE -->
                                        <a href="<?= base_url('index.php/project/delete/' . $p->id) ?>"
                                            class="btn btn-sm btn-danger" title="Delete"
                                            onclick="return confirm('Are you sure to delete this project?');">
                                            <i class="bx bx-trash"></i>
                                        </a>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ========== GRID VIEW ========== -->
                <div id="gridViewContainer" class="d-none">
                    <div class="row g-3" id="projectGrid">
                        <?php if (!empty($projects)): ?>
                            <?php foreach ($projects as $p):
                                $status = $p->status ?? 'active';
                                $progress = $p->progress ?? 0;
                                $taskCount = $p->task_count ?? 0;
                                $doneTasks = $p->done_tasks ?? 0;
                                $desc = $p->project_description ?? '';
                                $deadline = $p->deadline ?? '';

                                $statusMap = [
                                    'active' => ['bg-success-soft text-success', 'Active'],
                                    'in_progress' => ['bg-primary-soft text-primary', 'In Progress'],
                                    'completed' => ['bg-info-soft text-info', 'Completed'],
                                    'on_hold' => ['bg-warning-soft text-warning', 'On Hold'],
                                    'cancelled' => ['bg-danger-soft text-danger', 'Cancelled'],
                                ];
                                $sc = $statusMap[$status] ?? $statusMap['active'];

                                $colors = ['#6366f1', '#8b5cf6', '#ec4899', '#f43f5e', '#f97316', '#eab308', '#22c55e', '#14b8a6', '#06b6d4', '#3b82f6'];
                                $avColor = $colors[abs(crc32($p->project_name ?? 'X')) % count($colors)];

                                if ($progress >= 80)
                                    $progClass = 'prog-success';
                                elseif ($progress >= 50)
                                    $progClass = 'prog-info';
                                elseif ($progress >= 25)
                                    $progClass = 'prog-warning';
                                else
                                    $progClass = 'prog-danger';
                                ?>
                                <div class="col-xxl-3 col-lg-4 col-md-6 grid-card-col"
                                    data-name="<?= htmlspecialchars(strtolower($p->project_name)) ?>"
                                    data-status="<?= $status ?>">
                                    <div class="grid-card">
                                        <div class="gc-accent" style="background: <?= $avColor ?>"></div>

                                        <div class="gc-body">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div class="pi-avatar small-av" style="--av-color: <?= $avColor ?>">
                                                    <?= strtoupper(mb_substr($p->project_name ?? '?', 0, 2)) ?>
                                                </div>
                                                <span class="pi-status small <?= $sc[0] ?>"><?= $sc[1] ?></span>
                                            </div>

                                            <h6 class="gc-title"><?= htmlspecialchars($p->project_name) ?></h6>
                                            <p class="gc-desc"><?= htmlspecialchars($desc ?: 'No description') ?></p>

                                            <!-- Progress -->
                                            <?php if ($progress > 0): ?>
                                                <div class="gc-progress-wrap mb-3">
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <small class="text-muted">Progress</small>
                                                        <small class="fw-bold"><?= $progress ?>%</small>
                                                    </div>
                                                    <div class="gc-progress">
                                                        <div class="gc-progress-bar <?= $progClass ?>"
                                                            style="width: <?= $progress ?>%"></div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <!-- Meta -->
                                            <div class="gc-meta">
                                                <span>
                                                    <i class="bx bx-check-square"></i>
                                                    <?= $doneTasks ?>/<?= $taskCount ?> tasks
                                                </span>
                                                <?php if ($deadline): ?>
                                                    <span>
                                                        <i class="bx bx-calendar"></i>
                                                        <?= date('M d', strtotime($deadline)) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>


                                        <div class="d-flex gap-2 px-3 pb-3">

                                            <a href="<?= base_url('index.php/project/edit/' . $p->id) ?>"
                                                class="btn btn-sm btn-primary flex-fill">
                                                <i class="bx bx-edit"></i> Edit
                                            </a>

                                            <a href="<?= base_url('index.php/project/delete/' . $p->id) ?>"
                                                class="btn btn-sm btn-danger flex-fill"
                                                onclick="return confirm('Delete this project?');">
                                                <i class="bx bx-trash"></i> Delete
                                            </a>

                                        </div>

                                        <a href="<?= site_url('project/tasks_by_project/' . $p->id) ?>" class="gc-footer">
                                            <span>View Tasks</span>
                                            <i class="bx bx-right-arrow-alt"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ========== EMPTY STATE ========== -->
                <?php if (empty($projects)): ?>
                    <div class="empty-state" id="emptyState">
                        <div class="empty-visual">
                            <div class="empty-circle c1"></div>
                            <div class="empty-circle c2"></div>
                            <div class="empty-circle c3"></div>
                            <div class="empty-icon-wrap">
                                <i class="bx bx-briefcase"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mt-4 mb-2">No Projects Found</h5>
                        <p class="text-muted small mb-0" style="max-width: 340px">
                            You don't have any projects assigned yet.<br>
                            Projects will appear here once they're created.
                        </p>
                    </div>
                <?php endif; ?>

                <!-- ========== NO SEARCH RESULTS ========== -->
                <div class="empty-state d-none" id="noResults">
                    <div class="no-result-icon">
                        <i class="bx bx-search-alt"></i>
                    </div>
                    <h6 class="fw-bold mt-3 mb-1">No Matching Projects</h6>
                    <p class="text-muted small mb-3">Try different keywords or filters</p>
                    <button class="btn btn-outline-primary btn-sm radius-30 px-3" onclick="clearAllFilters()">
                        <i class="bx bx-refresh me-1"></i> Reset
                    </button>
                </div>

                <!-- ========== FOOTER ========== -->
                <?php if (!empty($projects)): ?>
                    <div class="list-footer mt-3">
                        <small class="text-muted">
                            Showing <strong id="showNum"><?= count($projects) ?></strong>
                            of <strong><?= count($projects) ?></strong> projects
                        </small>
                        <div class="d-flex align-items-center gap-1 text-muted small d-none d-md-flex">
                            <kbd>Ctrl</kbd>+<kbd>K</kbd> to search
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>


<!-- ================= STYLES ================= -->
<style>
    /* ==============================
   PAGE HEADER
   ============================== */
    .page-icon {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 24px;
        box-shadow: 0 4px 14px rgba(99, 102, 241, .3);
        flex-shrink: 0;
    }

    .live-clock {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 8px 14px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
    }

    .live-clock i {
        font-size: 16px;
        color: #6366f1;
    }

    .total-badge {
        display: flex;
        flex-direction: column;
        align-items: center;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        padding: 8px 18px;
        border-radius: 14px;
        box-shadow: 0 4px 14px rgba(99, 102, 241, .25);
    }

    .total-badge span {
        font-size: 22px;
        font-weight: 800;
        line-height: 1;
    }

    .total-badge small {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .5px;
        opacity: .85;
    }

    /* ==============================
   FLASH MESSAGES
   ============================== */
    .flash-msg {
        border-radius: 14px !important;
        animation: slideDown .4s ease;
    }

    .alert-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .alert-icon.success {
        background: rgba(34, 197, 94, .15);
        color: #22c55e;
    }

    .alert-icon.danger {
        background: rgba(239, 68, 68, .15);
        color: #ef4444;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-16px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ==============================
   MINI STAT CARDS
   ============================== */
    .mini-stat-card {
        display: flex;
        align-items: center;
        gap: 14px;
        background: #fff;
        border: 1px solid #f1f5f9;
        border-radius: 16px;
        padding: 18px 20px;
        cursor: pointer;
        transition: all .3s ease;
        position: relative;
        overflow: hidden;
    }

    .mini-stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
        border-color: transparent;
    }

    .mini-stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        opacity: .04;
        transform: translate(20px, -20px);
        background: currentColor;
    }

    .mini-stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    .bg-primary-soft {
        background: rgba(99, 102, 241, .1);
    }

    .bg-success-soft {
        background: rgba(34, 197, 94, .1);
    }

    .bg-info-soft {
        background: rgba(6, 182, 212, .1);
    }

    .bg-warning-soft {
        background: rgba(234, 179, 8, .1);
    }

    .bg-danger-soft {
        background: rgba(239, 68, 68, .1);
    }

    .mini-stat-info {
        flex: 1;
    }

    .mini-stat-number {
        font-size: 26px;
        font-weight: 800;
        line-height: 1.1;
        color: #1e293b;
    }

    .mini-stat-label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .6px;
        color: #94a3b8;
        font-weight: 600;
    }

    .mini-stat-trend {
        font-size: 18px;
        padding: 4px;
    }

    .mini-stat-trend.up {
        color: #22c55e;
    }

    /* ==============================
   MAIN CARD
   ============================== */
    .main-card {
        border-radius: 20px !important;
        overflow: hidden;
    }

    /* ==============================
   SEARCH & FILTERS
   ============================== */
    .search-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .search-ico {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: #94a3b8;
        z-index: 2;
        transition: color .2s;
    }

    .search-field {
        padding-left: 42px;
        padding-right: 110px;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        height: 44px;
        font-size: 14px;
        transition: all .3s;
    }

    .search-field:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .08);
    }

    .search-field:focus~.search-ico,
    .search-wrapper:focus-within .search-ico {
        color: #6366f1;
    }

    .search-shortcut {
        position: absolute;
        right: 40px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .search-shortcut kbd {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 1px 5px;
        font-size: 10px;
        color: #94a3b8;
    }

    .clear-btn {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: #f1f5f9;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #64748b;
        font-size: 16px;
        transition: all .2s;
        z-index: 2;
    }

    .clear-btn:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .filter-select {
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        height: 44px;
        font-size: 14px;
        transition: all .3s;
    }

    .filter-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .08);
    }

    .result-pill {
        background: #f1f5f9;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        color: #64748b;
        white-space: nowrap;
    }

    /* View Switcher */
    .view-switcher {
        display: flex;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .vs-btn {
        width: 36px;
        height: 36px;
        background: #fff;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 18px;
        cursor: pointer;
        transition: all .2s;
    }

    .vs-btn+.vs-btn {
        border-left: 1px solid #e2e8f0;
    }

    .vs-btn.active {
        background: #6366f1;
        color: #fff;
    }

    .vs-btn:hover:not(.active) {
        background: #f8fafc;
        color: #6366f1;
    }

    /* Filter Tags */
    .ftag {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #eef2ff;
        color: #6366f1;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .ftag button {
        background: none;
        border: none;
        padding: 0;
        color: #6366f1;
        cursor: pointer;
        font-size: 14px;
        line-height: 1;
    }

    .ftag button:hover {
        color: #4338ca;
    }

    /* ==============================
   PROJECT LIST ITEMS
   ============================== */
    .project-list {
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .project-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 18px 20px;
        border-bottom: 1px solid #f1f5f9;
        transition: all .25s ease;
        animation: itemSlide .4s ease forwards;
        animation-delay: var(--anim-delay);
        opacity: 0;
        position: relative;
        border-radius: 0;
    }

    .project-item::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: transparent;
        border-radius: 0 3px 3px 0;
        transition: background .25s;
    }

    .project-item:hover {
        background: #fafbff;
        transform: translateX(4px);
    }

    .project-item:hover::before {
        background: linear-gradient(180deg, #6366f1, #8b5cf6);
    }

    .project-item:last-child {
        border-bottom: none;
    }

    @keyframes itemSlide {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Left side */
    .pi-left {
        display: flex;
        align-items: center;
        gap: 16px;
        flex: 1;
        min-width: 0;
    }

    .pi-avatar {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        background: var(--av-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 15px;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
        transition: transform .3s, box-shadow .3s;
    }

    .pi-avatar.small-av {
        width: 40px;
        height: 40px;
        font-size: 12px;
        border-radius: 12px;
    }

    .project-item:hover .pi-avatar {
        transform: scale(1.08) rotate(-3deg);
        box-shadow: 0 6px 18px rgba(0, 0, 0, .12);
    }

    .pi-info {
        flex: 1;
        min-width: 0;
    }

    .pi-name-row {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .pi-name {
        font-size: 15px;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 300px;
        transition: color .2s;
    }

    .project-item:hover .pi-name {
        color: #6366f1;
    }

    .pi-status {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .pi-desc {
        font-size: 12px;
        color: #94a3b8;
        margin: 3px 0 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 400px;
        line-height: 1.4;
    }

    .pi-meta {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-top: 6px;
        flex-wrap: wrap;
    }

    .pi-meta-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        color: #94a3b8;
        font-weight: 500;
    }

    .pi-meta-item i {
        font-size: 14px;
    }

    .pi-meta-item.overdue {
        color: #ef4444;
        font-weight: 700;
    }

    /* Mini progress in meta */
    .mini-progress {
        width: 50px;
        height: 4px;
        background: #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .mini-progress-bar {
        height: 100%;
        border-radius: 10px;
        transition: width .6s ease;
    }

    .mini-progress-bar.prog-success {
        background: linear-gradient(90deg, #22c55e, #4ade80);
    }

    .mini-progress-bar.prog-info {
        background: linear-gradient(90deg, #06b6d4, #22d3ee);
    }

    .mini-progress-bar.prog-warning {
        background: linear-gradient(90deg, #f59e0b, #fbbf24);
    }

    .mini-progress-bar.prog-danger {
        background: linear-gradient(90deg, #ef4444, #f87171);
    }

    /* Right side - View Tasks Button */
    .pi-right {
        flex-shrink: 0;
    }

    .btn-view-tasks {
        display: flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        text-decoration: none;
        padding: 10px 22px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 600;
        transition: all .3s ease;
        box-shadow: 0 4px 12px rgba(99, 102, 241, .2);
        position: relative;
        overflow: hidden;
    }

    .btn-view-tasks::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, .15), transparent);
        opacity: 0;
        transition: opacity .3s;
    }

    .btn-view-tasks:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, .35);
    }

    .btn-view-tasks:hover::before {
        opacity: 1;
    }

    .btn-vt-arrow {
        display: flex;
        align-items: center;
        font-size: 18px;
        transform: translateX(0);
        transition: transform .3s;
    }

    .btn-view-tasks:hover .btn-vt-arrow {
        transform: translateX(4px);
    }

    /* ==============================
   GRID VIEW
   ============================== */
    .grid-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: all .3s ease;
    }

    .grid-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, .07);
        border-color: transparent;
    }

    .gc-accent {
        height: 4px;
        transition: height .3s;
    }

    .grid-card:hover .gc-accent {
        height: 6px;
    }

    .gc-body {
        padding: 20px;
        flex: 1;
    }

    .gc-title {
        font-weight: 700;
        font-size: 15px;
        color: #1e293b;
        margin-bottom: 6px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: color .2s;
    }

    .grid-card:hover .gc-title {
        color: #6366f1;
    }

    .gc-desc {
        font-size: 12px;
        color: #94a3b8;
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.5;
    }

    .gc-progress {
        height: 5px;
        background: #f1f5f9;
        border-radius: 10px;
        overflow: hidden;
    }

    .gc-progress-bar {
        height: 100%;
        border-radius: 10px;
        transition: width .6s ease;
    }

    .gc-progress-bar.prog-success {
        background: linear-gradient(90deg, #22c55e, #4ade80);
    }

    .gc-progress-bar.prog-info {
        background: linear-gradient(90deg, #06b6d4, #22d3ee);
    }

    .gc-progress-bar.prog-warning {
        background: linear-gradient(90deg, #f59e0b, #fbbf24);
    }

    .gc-progress-bar.prog-danger {
        background: linear-gradient(90deg, #ef4444, #f87171);
    }

    .gc-meta {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        color: #94a3b8;
    }

    .gc-meta i {
        font-size: 14px;
        vertical-align: middle;
        margin-right: 2px;
    }

    .gc-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 20px;
        border-top: 1px solid #f1f5f9;
        font-size: 13px;
        font-weight: 600;
        color: #6366f1;
        text-decoration: none;
        transition: all .2s;
    }

    .gc-footer:hover {
        background: #f8fafc;
        color: #4338ca;
    }

    .gc-footer i {
        font-size: 18px;
        transition: transform .2s;
    }

    .gc-footer:hover i {
        transform: translateX(4px);
    }

    /* ==============================
   EMPTY STATES
   ============================== */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 60px 20px;
        text-align: center;
    }

    /* Animated circles */
    .empty-visual {
        position: relative;
        width: 120px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-circle {
        position: absolute;
        border-radius: 50%;
        border: 2px solid;
        opacity: .12;
        animation: emptyPulse 3s ease-in-out infinite;
    }

    .empty-circle.c1 {
        width: 120px;
        height: 120px;
        border-color: #6366f1;
        animation-delay: 0s;
    }

    .empty-circle.c2 {
        width: 90px;
        height: 90px;
        border-color: #8b5cf6;
        animation-delay: .4s;
    }

    .empty-circle.c3 {
        width: 60px;
        height: 60px;
        border-color: #a78bfa;
        animation-delay: .8s;
    }

    .empty-icon-wrap {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 26px;
        z-index: 1;
        box-shadow: 0 4px 20px rgba(99, 102, 241, .3);
    }

    @keyframes emptyPulse {

        0%,
        100% {
            transform: scale(1);
            opacity: .12;
        }

        50% {
            transform: scale(1.08);
            opacity: .2;
        }
    }

    .no-result-icon {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: #94a3b8;
    }

    /* ==============================
   FOOTER
   ============================== */
    .list-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 12px;
        border-top: 1px solid #f1f5f9;
    }

    .list-footer kbd {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 1px 5px;
        font-size: 10px;
        color: #94a3b8;
    }

    /* ==============================
   STATUS COLORS (used in badges)
   ============================== */
    .bg-success-soft {
        background: rgba(34, 197, 94, .1);
    }

    .bg-primary-soft {
        background: rgba(99, 102, 241, .1);
    }

    .bg-info-soft {
        background: rgba(6, 182, 212, .1);
    }

    .bg-warning-soft {
        background: rgba(234, 179, 8, .1);
    }

    .bg-danger-soft {
        background: rgba(239, 68, 68, .1);
    }

    /* ==============================
   RESPONSIVE
   ============================== */
    @media (max-width: 768px) {
        .project-item {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }

        .pi-right {
            align-self: stretch;
        }

        .btn-view-tasks {
            justify-content: center;
        }

        .pi-name {
            max-width: 200px;
        }

        .pi-desc {
            max-width: 250px;
        }

        .search-field {
            padding-right: 50px;
        }

        .search-shortcut {
            display: none !important;
        }

        .mini-stat-number {
            font-size: 22px;
        }
    }

    /* ==============================
   SCROLLBAR
   ============================== */
    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    ::-webkit-scrollbar-track {
        background: #f8fafc;
    }

    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }

    /* ==============================
   PRINT
   ============================== */
    @media print {

        .card-header,
        .mini-stat-card,
        .view-switcher,
        .result-pill,
        .btn-view-tasks,
        .live-clock,
        .total-badge,
        .breadcrumb,
        .flash-msg,
        .list-footer,
        .pi-meta {
            display: none !important;
        }

        .card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }
    }
</style>


<!-- ================= SCRIPTS ================= -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        /* === ELEMENTS === */
        const searchInput = document.getElementById('searchInput');
        const clearBtn = document.getElementById('clearBtn');
        const statusFilter = document.getElementById('statusFilter');
        const items = document.querySelectorAll('.project-item');
        const gridCards = document.querySelectorAll('.grid-card-col');
        const noResults = document.getElementById('noResults');
        const visibleCount = document.getElementById('visibleCount');
        const showNum = document.getElementById('showNum');
        const filterBar = document.getElementById('filterBar');
        const ftagSearch = document.getElementById('ftagSearch');
        const ftagStatus = document.getElementById('ftagStatus');
        const ftagSearchVal = document.getElementById('ftagSearchVal');
        const ftagStatusVal = document.getElementById('ftagStatusVal');

        /* === ANIMATED COUNTERS === */
        document.querySelectorAll('.mini-stat-number').forEach(el => {
            const target = parseInt(el.dataset.count) || 0;
            if (target === 0) return;
            let current = 0;
            const step = Math.max(1, Math.ceil(target / 25));
            const timer = setInterval(() => {
                current += step;
                if (current >= target) { current = target; clearInterval(timer); }
                el.textContent = current;
            }, 35);
        });

        /* === LIVE CLOCK === */
        function updateClock() {
            const now = new Date();
            const h = now.getHours().toString().padStart(2, '0');
            const m = now.getMinutes().toString().padStart(2, '0');
            const s = now.getSeconds().toString().padStart(2, '0');
            const el = document.getElementById('liveClock');
            if (el) el.textContent = h + ':' + m + ':' + s;
        }
        updateClock();
        setInterval(updateClock, 1000);

        /* === SEARCH === */
        let debounce;
        searchInput.addEventListener('input', function () {
            clearTimeout(debounce);
            debounce = setTimeout(() => {
                clearBtn.classList.toggle('d-none', !this.value);
                applyFilters();
            }, 120);
        });

        clearBtn.addEventListener('click', () => {
            searchInput.value = '';
            clearBtn.classList.add('d-none');
            applyFilters();
            searchInput.focus();
        });

        /* === STATUS FILTER === */
        statusFilter.addEventListener('change', applyFilters);

        /* === MAIN FILTER === */
        function applyFilters() {
            const q = searchInput.value.toLowerCase().trim();
            const status = statusFilter.value;
            let visible = 0;
            let hasFilter = false;

            // Filter tags
            if (q) {
                ftagSearch.classList.remove('d-none');
                ftagSearchVal.textContent = q;
                hasFilter = true;
            } else {
                ftagSearch.classList.add('d-none');
            }

            if (status !== 'all') {
                ftagStatus.classList.remove('d-none');
                ftagStatusVal.textContent = statusFilter.options[statusFilter.selectedIndex].text;
                hasFilter = true;
            } else {
                ftagStatus.classList.add('d-none');
            }

            filterBar.classList.toggle('d-none', !hasFilter);

            // List items
            items.forEach(item => {
                const matchQ = !q || item.dataset.name.includes(q);
                const matchS = status === 'all' || item.dataset.status === status;
                const show = matchQ && matchS;
                item.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            // Grid items
            gridCards.forEach(card => {
                const matchQ = !q || card.dataset.name.includes(q);
                const matchS = status === 'all' || card.dataset.status === status;
                card.style.display = (matchQ && matchS) ? '' : 'none';
            });

            // Update counts
            if (visibleCount) visibleCount.textContent = visible;
            if (showNum) showNum.textContent = visible;

            // Empty states
            noResults.classList.toggle('d-none', visible > 0 || items.length === 0);
        }

        /* === VIEW TOGGLE === */
        const listBtn = document.getElementById('listViewBtn');
        const gridBtn = document.getElementById('gridViewBtn');
        const listView = document.getElementById('listViewContainer');
        const gridView = document.getElementById('gridViewContainer');

        listBtn.addEventListener('click', () => {
            listView.classList.remove('d-none');
            gridView.classList.add('d-none');
            listBtn.classList.add('active');
            gridBtn.classList.remove('active');
        });

        gridBtn.addEventListener('click', () => {
            gridView.classList.remove('d-none');
            listView.classList.add('d-none');
            gridBtn.classList.add('active');
            listBtn.classList.remove('active');
        });

        /* === KEYBOARD SHORTCUT === */
        document.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                e.preventDefault();
                searchInput.focus();
                searchInput.select();
            }
            if (e.key === 'Escape' && document.activeElement === searchInput) {
                searchInput.blur();
            }
        });

        /* === AUTO-DISMISS FLASH === */
        const flash = document.querySelector('.flash-msg');
        if (flash) {
            setTimeout(() => {
                flash.style.transition = 'opacity .5s, transform .5s';
                flash.style.opacity = '0';
                flash.style.transform = 'translateY(-12px)';
                setTimeout(() => flash.remove(), 500);
            }, 4500);
        }
    });

    /* === GLOBAL FUNCTIONS === */
    function clearSearch() {
        const inp = document.getElementById('searchInput');
        inp.value = '';
        document.getElementById('clearBtn').classList.add('d-none');
        inp.dispatchEvent(new Event('input'));
    }

    function clearStatus() {
        const sel = document.getElementById('statusFilter');
        sel.value = 'all';
        sel.dispatchEvent(new Event('change'));
    }

    function clearAllFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('clearBtn').classList.add('d-none');
        document.getElementById('statusFilter').value = 'all';
        document.getElementById('filterBar').classList.add('d-none');

        document.querySelectorAll('.project-item').forEach(i => i.style.display = '');
        document.querySelectorAll('.grid-card-col').forEach(c => c.style.display = '');
        document.getElementById('noResults').classList.add('d-none');

        const total = document.querySelectorAll('.project-item').length;
        const vc = document.getElementById('visibleCount');
        const sn = document.getElementById('showNum');
        if (vc) vc.textContent = total;
        if (sn) sn.textContent = total;
    }

    function filterByStatus(status) {
        const sel = document.getElementById('statusFilter');
        sel.value = status;
        sel.dispatchEvent(new Event('change'));
        document.querySelector('.main-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
</script>