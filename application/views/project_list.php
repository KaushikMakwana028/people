<div class="page-wrapper">
    <div class="page-content">


        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2 small">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('index.php/dashboard') ?>" class="text-decoration-none">
                                <i class="bx bx-home-alt"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </nav>

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div>
                        <h4 class="mb-0 fw-bold d-flex align-items-center gap-2">
                            <span class="header-icon-box">
                                <i class="bx bx-folder-open"></i>
                            </span>
                            Project Hub
                        </h4>
                        <p class="text-muted mb-0 mt-1 small">
                            Manage, track &amp; organize all your projects in one place
                        </p>
                    </div>

                    <div class="d-flex gap-2 flex-wrap">
                        <!-- Export Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary radius-30 px-3" data-bs-toggle="dropdown"
                                data-bs-auto-close="true">
                                <i class="bx bx-download me-1"></i> Export
                                <i class="bx bx-chevron-down ms-1 small"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 animate-dropdown">
                                <li class="dropdown-header fw-bold small text-uppercase">Export As</li>
                                <li>
                                    <a class="dropdown-item rounded-2" href="#" onclick="exportTo('csv')">
                                        <i class="bx bx-file text-success me-2"></i> CSV Spreadsheet
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-2" href="#" onclick="exportTo('excel')">
                                        <i class="bx bx-table text-primary me-2"></i> Excel Workbook
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-2" href="#" onclick="exportTo('pdf')">
                                        <i class="bx bxs-file-pdf text-danger me-2"></i> PDF Document
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item rounded-2" href="#" onclick="window.print()">
                                        <i class="bx bx-printer me-2"></i> Print View
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Add Project -->
                        <a href="<?= base_url('index.php/project/add') ?>"
                            class="btn btn-primary radius-30 px-4 btn-add-project">
                            <i class="bx bx-plus me-1"></i> New Project
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= FLASH MESSAGES ================= -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm flash-alert" role="alert"
                id="flashMsg">
                <div class="d-flex align-items-center gap-2">
                    <div class="alert-icon-box bg-success bg-opacity-25 rounded-circle p-1">
                        <i class="bx bx-check-circle text-success fs-5"></i>
                    </div>
                    <div>
                        <strong>Success!</strong> <?= $this->session->flashdata('success') ?>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm flash-alert" role="alert"
                id="flashMsg">
                <div class="d-flex align-items-center gap-2">
                    <div class="alert-icon-box bg-danger bg-opacity-25 rounded-circle p-1">
                        <i class="bx bx-error-circle text-danger fs-5"></i>
                    </div>
                    <div>
                        <strong>Oops!</strong> <?= $this->session->flashdata('error') ?>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- ================= STAT CARDS ================= -->
        <?php
        $total = count($projects ?? []);
        $active = 0;
        $completed = 0;
        $onHold = 0;
        $totalTasks = 0;

        if (!empty($projects)) {
            foreach ($projects as $p) {
                $s = $p->status ?? 'active';
                if ($s === 'active' || $s === 'in_progress')
                    $active++;
                elseif ($s === 'completed')
                    $completed++;
                elseif ($s === 'on_hold')
                    $onHold++;
                if (isset($p->task_count))
                    $totalTasks += $p->task_count;
            }
        }
        ?>
        <div class="row g-3 mb-4">
            <!-- Total -->
            <div class="col-xl-3 col-sm-6">
                <div class="card stat-card border-0 shadow-sm overflow-hidden" onclick="filterByStatus('all')"
                    role="button">
                    <div class="card-body position-relative">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-icon-box bg-primary-subtle text-primary">
                                <i class="bx bx-folder"></i>
                            </div>
                            <div>
                                <div class="stat-number" data-target="<?= $total ?>">0</div>
                                <div class="stat-label">Total Projects</div>
                            </div>
                        </div>
                        <div class="stat-wave">
                            <svg viewBox="0 0 200 40" preserveAspectRatio="none">
                                <path d="M0 20 Q50 0 100 20 T200 20 V40 H0Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active -->
            <div class="col-xl-3 col-sm-6">
                <div class="card stat-card border-0 shadow-sm overflow-hidden" onclick="filterByStatus('active')"
                    role="button">
                    <div class="card-body position-relative">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-icon-box bg-success-subtle text-success">
                                <i class="bx bx-play-circle"></i>
                            </div>
                            <div>
                                <div class="stat-number" data-target="<?= $active ?>">0</div>
                                <div class="stat-label">Active</div>
                            </div>
                        </div>
                        <div class="stat-wave text-success">
                            <svg viewBox="0 0 200 40" preserveAspectRatio="none">
                                <path d="M0 20 Q50 0 100 20 T200 20 V40 H0Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed -->
            <div class="col-xl-3 col-sm-6">
                <div class="card stat-card border-0 shadow-sm overflow-hidden" onclick="filterByStatus('completed')"
                    role="button">
                    <div class="card-body position-relative">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-icon-box bg-info-subtle text-info">
                                <i class="bx bx-check-double"></i>
                            </div>
                            <div>
                                <div class="stat-number" data-target="<?= $completed ?>">0</div>
                                <div class="stat-label">Completed</div>
                            </div>
                        </div>
                        <div class="stat-wave text-info">
                            <svg viewBox="0 0 200 40" preserveAspectRatio="none">
                                <path d="M0 20 Q50 0 100 20 T200 20 V40 H0Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- On Hold -->
            <div class="col-xl-3 col-sm-6">
                <div class="card stat-card border-0 shadow-sm overflow-hidden" onclick="filterByStatus('on_hold')"
                    role="button">
                    <div class="card-body position-relative">
                        <div class="d-flex align-items-center gap-3">
                            <div class="stat-icon-box bg-warning-subtle text-warning">
                                <i class="bx bx-pause-circle"></i>
                            </div>
                            <div>
                                <div class="stat-number" data-target="<?= $onHold ?>">0</div>
                                <div class="stat-label">On Hold</div>
                            </div>
                        </div>
                        <div class="stat-wave text-warning">
                            <svg viewBox="0 0 200 40" preserveAspectRatio="none">
                                <path d="M0 20 Q50 0 100 20 T200 20 V40 H0Z" fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= MAIN CARD ================= -->
        <div class="card border-0 shadow-sm main-card">

            <!-- TOOLBAR -->
            <div class="card-header bg-transparent border-0 py-3">
                <div class="row g-3 align-items-center">
                    <!-- Search -->
                    <div class="col-lg-4 col-md-6">
                        <div class="search-box position-relative">
                            <i class="bx bx-search search-icon"></i>
                            <input type="text" class="form-control search-input" id="searchInput"
                                placeholder="Search projects... (Ctrl+K)" autocomplete="off">
                            <button class="search-clear d-none" id="searchClear" type="button">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div class="col-lg-2 col-md-3">
                        <select class="form-select custom-select" id="statusFilter">
                            <option value="all">All Status</option>
                            <option value="active">Active</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="on_hold">On Hold</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <!-- Sort -->
                    <div class="col-lg-2 col-md-3">
                        <select class="form-select custom-select" id="sortBy">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="az">Name A → Z</option>
                            <option value="za">Name Z → A</option>
                            <option value="progress_high">Progress ↑</option>
                            <option value="progress_low">Progress ↓</option>
                        </select>
                    </div>

                    <!-- Spacer -->
                    <div class="col-lg-2 d-none d-lg-block"></div>

                    <!-- View Toggle + Counter -->
                    <div class="col-lg-2 col-md-12">
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <span class="badge bg-light text-dark rounded-pill px-3 py-2 small" id="resultCounter">
                                <i class="bx bx-hash"></i>
                                <span id="visibleNum"><?= $total ?></span> projects
                            </span>

                            <div class="btn-group view-toggle" role="group">
                                <button class="btn btn-sm active" id="btnTableView" data-bs-toggle="tooltip"
                                    title="Table View">
                                    <i class="bx bx-list-ul"></i>
                                </button>
                                <button class="btn btn-sm" id="btnGridView" data-bs-toggle="tooltip" title="Grid View">
                                    <i class="bx bx-grid-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Filters -->
                <div class="active-filters mt-3 d-none" id="activeFilters">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <small class="text-muted me-1">Active filters:</small>
                        <span class="filter-tag d-none" id="filterTagSearch">
                            <i class="bx bx-search me-1"></i>
                            "<span id="filterSearchText"></span>"
                            <button onclick="clearSearch()"><i class="bx bx-x"></i></button>
                        </span>
                        <span class="filter-tag d-none" id="filterTagStatus">
                            <i class="bx bx-filter me-1"></i>
                            <span id="filterStatusText"></span>
                            <button onclick="clearStatusFilter()"><i class="bx bx-x"></i></button>
                        </span>
                        <button class="btn btn-link btn-sm text-danger p-0 ms-2" onclick="clearAllFilters()">
                            Clear All
                        </button>
                    </div>
                </div>

                <!-- Bulk Actions -->
                <div class="bulk-bar mt-3 d-none" id="bulkBar">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bulk-count-badge">
                                <span id="selectedCount">0</span>
                            </div>
                            <span class="fw-semibold small">items selected</span>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="bulkDelete()">
                                <i class="bx bx-trash me-1"></i> Delete
                            </button>
                            <button class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                                onclick="clearSelection()">
                                <i class="bx bx-x me-1"></i> Clear
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">

                <!-- ====== TABLE VIEW ====== -->
                <div id="tableViewContainer">
                    <div class="table-responsive">
                        <table class="table project-table align-middle mb-0" id="projectTable">
                            <thead>
                                <tr>
                                    <th width="40">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                        </div>
                                    </th>
                                    <th class="th-sortable" data-sort="id" width="55">#</th>
                                    <th class="th-sortable" data-sort="name">Project</th>
                                    <th>Status</th>
                                    <th class="th-sortable" data-sort="progress">Progress</th>
                                    <th>Tasks</th>
                                    <th class="th-sortable" data-sort="date">Created</th>
                                    <th class="text-center" width="100">Actions</th>
                                </tr>
                            </thead>

                            <tbody id="tableBody">
                                <?php if (!empty($projects)): ?>
                                    <?php
                                    $idx = 0;
                                    foreach ($projects as $p):
                                        $idx++;
                                        $status = $p->status ?? 'active';
                                        $progress = $p->progress ?? 0;
                                        $taskCount = $p->task_count ?? 0;
                                        $doneTasks = $p->done_tasks ?? 0;
                                        $created = $p->created_at ?? '';
                                        $deadline = $p->deadline ?? '';
                                        $priority = $p->priority ?? 'medium';

                                        // Status config
                                        $statusCfg = [
                                            'active' => ['bg-soft-success', 'text-success', 'bx-play-circle', 'Active'],
                                            'in_progress' => ['bg-soft-primary', 'text-primary', 'bx-loader-circle', 'In Progress'],
                                            'completed' => ['bg-soft-info', 'text-info', 'bx-check-double', 'Completed'],
                                            'on_hold' => ['bg-soft-warning', 'text-warning', 'bx-pause-circle', 'On Hold'],
                                            'cancelled' => ['bg-soft-danger', 'text-danger', 'bx-x-circle', 'Cancelled'],
                                        ];
                                        $sc = $statusCfg[$status] ?? $statusCfg['active'];

                                        // Priority
                                        $prioCfg = [
                                            'low' => ['text-success', 'bxs-chevrons-down'],
                                            'medium' => ['text-warning', 'bxs-minus-circle'],
                                            'high' => ['text-orange', 'bxs-chevrons-up'],
                                            'critical' => ['text-danger', 'bxs-error'],
                                        ];
                                        $pc = $prioCfg[$priority] ?? $prioCfg['medium'];

                                        // Progress bar color
                                        if ($progress >= 80)
                                            $progClass = 'progress-success';
                                        elseif ($progress >= 50)
                                            $progClass = 'progress-info';
                                        elseif ($progress >= 25)
                                            $progClass = 'progress-warning';
                                        else
                                            $progClass = 'progress-danger';

                                        // Avatar
                                        $pallete = ['#6366f1', '#8b5cf6', '#ec4899', '#f43f5e', '#f97316', '#eab308', '#22c55e', '#14b8a6', '#06b6d4', '#3b82f6'];
                                        $cIdx = abs(crc32($p->project_name ?? 'X')) % count($pallete);
                                        $bgColor = $pallete[$cIdx];
                                        $ini = strtoupper(mb_substr($p->project_name ?? '?', 0, 2));

                                        // Deadline
                                        $isOverdue = ($deadline && strtotime($deadline) < time() && $status !== 'completed');
                                        $daysLeft = $deadline ? (int) ceil((strtotime($deadline) - time()) / 86400) : null;
                                    ?>
                                        <tr class="project-row" data-id="<?= $p->id ?>"
                                            data-name="<?= htmlspecialchars(strtolower($p->project_name)) ?>"
                                            data-status="<?= $status ?>" data-progress="<?= $progress ?>"
                                            data-date="<?= $created ?>" style="--delay: <?= $idx * 0.04 ?>s">

                                            <!-- Checkbox -->
                                            <td>
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input row-check" type="checkbox"
                                                        value="<?= $p->id ?>">
                                                </div>
                                            </td>

                                            <!-- ID -->
                                            <td>
                                                <span class="id-badge"><?= $p->id ?></span>
                                            </td>

                                            <!-- Project Info -->
                                            <td>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="project-avatar flex-shrink-0"
                                                        style="--avatar-bg: <?= $bgColor ?>">
                                                        <?= $ini ?>
                                                    </div>
                                                    <div class="overflow-hidden">
                                                        <a href="<?= base_url('index.php/project/view/' . $p->id) ?>"
                                                            class="project-name text-truncate d-block" style="max-width: 250px"
                                                            title="<?= htmlspecialchars($p->project_name) ?>">
                                                            <?= htmlspecialchars($p->project_name) ?>
                                                        </a>
                                                        <div class="project-desc text-truncate" style="max-width: 250px">
                                                            <?= htmlspecialchars($p->project_description ?: 'No description') ?>
                                                        </div>
                                                        <?php if ($priority): ?>
                                                            <span class="priority-tag <?= $pc[0] ?>">
                                                                <i class="bx <?= $pc[1] ?>"></i>
                                                                <?= ucfirst($priority) ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Status -->
                                            <td>
                                                <span class="status-badge <?= $sc[0] ?> <?= $sc[1] ?>">
                                                    <i class="bx <?= $sc[2] ?> me-1"></i>
                                                    <?= $sc[3] ?>
                                                </span>
                                            </td>

                                            <!-- Progress -->
                                            <td style="min-width: 150px">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="progress-ring" data-progress="<?= $progress ?>">
                                                        <svg viewBox="0 0 36 36">
                                                            <path class="ring-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831
                                                                 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                            <path class="ring-fill <?= $progClass ?>"
                                                                stroke-dasharray="<?= $progress ?>, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831
                                                                 a 15.9155 15.9155 0 0 1 0 -31.831" />
                                                        </svg>
                                                        <span class="ring-text"><?= $progress ?>%</span>
                                                    </div>
                                                    <div class="progress flex-grow-1" style="height: 5px">
                                                        <div class="progress-bar <?= $progClass ?>"
                                                            style="width: <?= $progress ?>%"></div>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Tasks -->
                                            <td>
                                                <div class="task-badge">
                                                    <i class="bx bx-check-square"></i>
                                                    <span><?= $doneTasks ?>/<?= $taskCount ?></span>
                                                </div>
                                            </td>

                                            <!-- Created / Deadline -->
                                            <td>
                                                <div class="date-info">
                                                    <span class="date-main">
                                                        <?= $created ? date('M d, Y', strtotime($created)) : '—' ?>
                                                    </span>
                                                    <?php if ($deadline): ?>
                                                        <span class="date-deadline <?= $isOverdue ? 'overdue' : '' ?>">
                                                            <?php if ($isOverdue): ?>
                                                                <i class="bx bx-error-circle"></i>
                                                                Overdue
                                                            <?php elseif ($daysLeft !== null && $daysLeft <= 7): ?>
                                                                <i class="bx bx-time-five"></i>
                                                                <?= $daysLeft ?> days left
                                                            <?php else: ?>
                                                                <i class="bx bx-calendar"></i>
                                                                Due <?= date('M d', strtotime($deadline)) ?>
                                                            <?php endif; ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>

                                            <!-- Actions -->
                                            <td class="text-center">
                                                <div class="action-dropdown">
                                                    <button class="action-btn"
                                                        onclick="openProjectActions(
<?= $p->id ?>,
'<?= addslashes(htmlspecialchars($p->project_name)) ?>'
)">
                                                        <i class="bx bx-dots-horizontal-rounded"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 action-menu">
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="<?= base_url('index.php/project/view/' . $p->id) ?>">
                                                                <i class="bx bx-show text-info"></i> View Details
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="<?= base_url('index.php/project/edit/' . $p->id) ?>">
                                                                <i class="bx bx-edit text-primary"></i> Edit Project
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="<?= base_url('index.php/task/index/' . $p->id) ?>">
                                                                <i class="bx bx-task text-success"></i> View Tasks
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="duplicateProject(<?= $p->id ?>)">
                                                                <i class="bx bx-copy text-secondary"></i> Duplicate
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider my-1">
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item text-danger" href="#"
                                                                onclick="openDeleteModal(<?= $p->id ?>, '<?= addslashes(htmlspecialchars($p->project_name)) ?>')">
                                                                <i class="bx bx-trash"></i> Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- ====== GRID VIEW (hidden by default) ====== -->
                <div id="gridViewContainer" class="d-none">
                    <div class="row g-3" id="gridBody">
                        <?php if (!empty($projects)): ?>
                            <?php foreach ($projects as $p):
                                $status = $p->status ?? 'active';
                                $progress = $p->progress ?? 0;
                                $taskCount = $p->task_count ?? 0;
                                $doneTasks = $p->done_tasks ?? 0;
                                $deadline = $p->deadline ?? '';

                                $statusCfg = [
                                    'active' => ['bg-soft-success', 'text-success', 'Active'],
                                    'in_progress' => ['bg-soft-primary', 'text-primary', 'In Progress'],
                                    'completed' => ['bg-soft-info', 'text-info', 'Completed'],
                                    'on_hold' => ['bg-soft-warning', 'text-warning', 'On Hold'],
                                    'cancelled' => ['bg-soft-danger', 'text-danger', 'Cancelled'],
                                ];
                                $sc = $statusCfg[$status] ?? $statusCfg['active'];

                                if ($progress >= 80)
                                    $progClass = 'progress-success';
                                elseif ($progress >= 50)
                                    $progClass = 'progress-info';
                                elseif ($progress >= 25)
                                    $progClass = 'progress-warning';
                                else
                                    $progClass = 'progress-danger';

                                $pallete = ['#6366f1', '#8b5cf6', '#ec4899', '#f43f5e', '#f97316', '#eab308', '#22c55e', '#14b8a6', '#06b6d4', '#3b82f6'];
                                $bgColor = $pallete[abs(crc32($p->project_name ?? 'X')) % count($pallete)];
                            ?>
                                <div class="col-xxl-3 col-lg-4 col-md-6 grid-item"
                                    data-name="<?= htmlspecialchars(strtolower($p->project_name)) ?>"
                                    data-status="<?= $status ?>">
                                    <div class="grid-card h-100">
                                        <!-- Colored Top Bar -->
                                        <div class="grid-card-accent" style="background: <?= $bgColor ?>"></div>

                                        <div class="grid-card-body">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div class="project-avatar flex-shrink-0"
                                                    style="--avatar-bg: <?= $bgColor ?>; width:38px; height:38px; font-size:12px">
                                                    <?= strtoupper(mb_substr($p->project_name ?? '?', 0, 2)) ?>
                                                </div>
                                                <span class="status-badge <?= $sc[0] ?> <?= $sc[1] ?> small">
                                                    <?= $sc[2] ?>
                                                </span>
                                            </div>

                                            <a href="<?= base_url('index.php/project/view/' . $p->id) ?>"
                                                class="grid-card-title">
                                                <?= htmlspecialchars($p->project_name) ?>
                                            </a>

                                            <p class="grid-card-desc">
                                                <?= htmlspecialchars($p->project_description ?: 'No description available') ?>
                                            </p>

                                            <!-- Progress -->
                                            <div class="mb-3">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <small class="text-muted">Progress</small>
                                                    <small class="fw-bold"><?= $progress ?>%</small>
                                                </div>
                                                <div class="progress" style="height: 6px">
                                                    <div class="progress-bar <?= $progClass ?>"
                                                        style="width: <?= $progress ?>%"></div>
                                                </div>
                                            </div>

                                            <!-- Meta -->
                                            <div class="d-flex justify-content-between align-items-center text-muted small">
                                                <span><i
                                                        class="bx bx-check-square me-1"></i><?= $doneTasks ?>/<?= $taskCount ?></span>
                                                <?php if ($deadline): ?>
                                                    <span><i
                                                            class="bx bx-calendar me-1"></i><?= date('M d', strtotime($deadline)) ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="grid-card-footer">
                                            <a href="<?= base_url('index.php/project/view/' . $p->id) ?>" class="grid-action"
                                                title="View">
                                                <i class="bx bx-show"></i>
                                            </a>
                                            <a href="<?= base_url('index.php/project/edit/' . $p->id) ?>" class="grid-action"
                                                title="Edit">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                            <a href="<?= base_url('index.php/task/index/' . $p->id) ?>" class="grid-action"
                                                title="Tasks">
                                                <i class="bx bx-task"></i>
                                            </a>
                                            <button class="grid-action text-danger" title="Delete"
                                                onclick="openDeleteModal(<?= $p->id ?>, '<?= addslashes(htmlspecialchars($p->project_name)) ?>')">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ====== EMPTY STATE ====== -->
                <?php if (empty($projects)): ?>
                    <div class="empty-state" id="emptyState">
                        <div class="empty-illustration">
                            <div class="empty-folder">
                                <div class="folder-back"></div>
                                <div class="folder-front"></div>
                                <div class="folder-paper p1"></div>
                                <div class="folder-paper p2"></div>
                                <div class="folder-paper p3"></div>
                            </div>
                        </div>
                        <h5 class="fw-bold mt-4 mb-2">No Projects Yet</h5>
                        <p class="text-muted mb-4 small" style="max-width: 360px">
                            Get started by creating your first project.<br>
                            Organize tasks, track progress, and collaborate.
                        </p>
                        <a href="<?= base_url('index.php/project/add') ?>" class="btn btn-primary radius-30 px-4">
                            <i class="bx bx-plus me-1"></i> Create First Project
                        </a>
                    </div>
                <?php endif; ?>

                <!-- ====== NO RESULTS (search/filter) ====== -->
                <div class="empty-state d-none" id="noResults">
                    <div class="no-results-icon">
                        <i class="bx bx-search-alt"></i>
                    </div>
                    <h5 class="fw-bold mt-3 mb-2">No Matching Projects</h5>
                    <p class="text-muted small mb-3">
                        Try adjusting your search or filters
                    </p>
                    <button class="btn btn-outline-primary radius-30 px-4 btn-sm" onclick="clearAllFilters()">
                        <i class="bx bx-refresh me-1"></i> Reset Filters
                    </button>
                </div>

                <!-- ====== FOOTER INFO ====== -->
                <?php if (!empty($projects)): ?>
                    <div class="table-footer mt-3 pt-3">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <small class="text-muted">
                                Showing <strong id="showCount"><?= count($projects) ?></strong>
                                of <strong><?= count($projects) ?></strong> projects
                            </small>

                            <div class="d-flex align-items-center gap-2 small text-muted">
                                <kbd class="small">Ctrl</kbd> + <kbd class="small">K</kbd> to search
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>
</div>


<!-- ================= DELETE MODAL ================= -->
<div class="modal fade" id="deleteModal" tabindex="-1" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg overflow-hidden delete-modal-content">
            <!-- Danger Header -->
            <div class="delete-modal-header">
                <div class="delete-icon-wrapper">
                    <div class="delete-icon-outer">
                        <div class="delete-icon-inner">
                            <i class="bx bx-trash"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-body text-center px-4 pb-2">
                <h5 class="fw-bold mb-2">Delete Project?</h5>
                <p class="text-muted mb-1">
                    You're about to permanently delete
                </p>
                <p class="fw-bold text-dark fs-6 mb-2" id="delProjectName"></p>
                <div class="delete-warning">
                    <i class="bx bx-error-circle me-1"></i>
                    This action will also remove <strong>all associated tasks</strong>
                    and cannot be undone.
                </div>
            </div>

            <div class="modal-footer border-0 justify-content-center gap-2 pb-4">
                <button type="button" class="btn btn-light px-4 radius-30" data-bs-dismiss="modal">
                    <i class="bx bx-x me-1"></i> Cancel
                </button>
                <a href="#" class="btn btn-danger px-4 radius-30" id="confirmDeleteBtn">
                    <i class="bx bx-trash me-1"></i> Yes, Delete
                </a>
            </div>
        </div>
    </div>
</div>


<!-- ================= BULK DELETE MODAL ================= -->
<div class="modal fade" id="bulkDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-body text-center py-4">
                <div class="bulk-del-icon mb-3">
                    <i class="bx bx-error text-danger"></i>
                </div>
                <h6 class="fw-bold mb-2">Delete <span id="bulkCount">0</span> projects?</h6>
                <p class="text-muted small mb-0">
                    All tasks in selected projects will be removed permanently.
                </p>
            </div>
            <div class="modal-footer border-0 justify-content-center gap-2 pb-4">
                <button class="btn btn-light px-3 radius-30 btn-sm" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-danger px-3 radius-30 btn-sm" id="confirmBulkDelete">
                    <i class="bx bx-trash me-1"></i> Delete All
                </button>
            </div>
        </div>
    </div>
</div>


<!-- ================= STYLES ================= -->
<style>
    /* ===== HEADER ===== */
    .header-icon-box {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 20px;
    }

    .btn-add-project {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border: none;
        box-shadow: 0 4px 15px rgba(99, 102, 241, .3);
        transition: all .3s;
    }

    .btn-add-project:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99, 102, 241, .4);
    }

    /* ===== STAT CARDS ===== */
    .stat-card {
        transition: all .3s ease;
        cursor: pointer;
        border-radius: 16px !important;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, .08) !important;
    }

    .stat-icon-box {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        flex-shrink: 0;
    }

    .bg-primary-subtle {
        background: rgba(99, 102, 241, .12);
    }

    .bg-success-subtle {
        background: rgba(34, 197, 94, .12);
    }

    .bg-info-subtle {
        background: rgba(6, 182, 212, .12);
    }

    .bg-warning-subtle {
        background: rgba(234, 179, 8, .12);
    }

    .stat-number {
        font-size: 28px;
        font-weight: 800;
        line-height: 1.1;
        background: linear-gradient(135deg, #1e293b, #475569);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-label {
        font-size: 12px;
        color: #94a3b8;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .stat-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 30px;
        opacity: .06;
    }

    .stat-wave svg {
        width: 100%;
        height: 100%;
    }

    /* ===== SEARCH BOX ===== */
    .search-box {
        position: relative;
    }

    .search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: #94a3b8;
        z-index: 2;
        transition: color .2s;
    }

    .search-input {
        padding-left: 42px;
        padding-right: 36px;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        transition: all .3s;
        height: 42px;
        font-size: 14px;
    }

    .search-input:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .1);
    }

    .search-input:focus~.search-icon,
    .search-box:focus-within .search-icon {
        color: #6366f1;
    }

    .search-clear {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        background: #f1f5f9;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 16px;
        color: #64748b;
        transition: all .2s;
    }

    .search-clear:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    .custom-select {
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        height: 42px;
        font-size: 14px;
        transition: all .3s;
    }

    .custom-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .1);
    }

    /* ===== VIEW TOGGLE ===== */
    .view-toggle .btn {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        color: #94a3b8;
        padding: 6px 10px;
        transition: all .2s;
    }

    .view-toggle .btn.active {
        background: #6366f1;
        border-color: #6366f1;
        color: #fff;
    }

    .view-toggle .btn:first-child {
        border-radius: 8px 0 0 8px;
    }

    .view-toggle .btn:last-child {
        border-radius: 0 8px 8px 0;
    }

    /* ===== FILTER TAGS ===== */
    .filter-tag {
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

    .filter-tag button {
        background: none;
        border: none;
        padding: 0;
        color: #6366f1;
        cursor: pointer;
        font-size: 14px;
        line-height: 1;
    }

    /* ===== BULK BAR ===== */
    .bulk-bar {
        background: linear-gradient(135deg, rgba(99, 102, 241, .08), rgba(139, 92, 246, .08));
        border: 1px solid rgba(99, 102, 241, .15);
        border-radius: 12px;
        padding: 12px 16px;
    }

    .bulk-count-badge {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-radius: 50%;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
    }

    /* ===== TABLE ===== */
    .main-card {
        border-radius: 20px !important;
        overflow: hidden;
    }

    .project-table thead th {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .8px;
        font-weight: 700;
        color: #64748b;
        border: none;
        padding: 14px 12px;
        background: #f8fafc;
        white-space: nowrap;
    }

    .project-table tbody td {
        padding: 14px 12px;
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .project-row {
        animation: slideIn .4s ease forwards;
        animation-delay: var(--delay);
        opacity: 0;
        transition: background .2s, transform .2s;
    }

    .project-row:hover {
        background: #fafbff !important;
    }

    .project-row.selected {
        background: #eef2ff !important;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-12px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .th-sortable {
        cursor: pointer;
        user-select: none;
        transition: color .2s;
    }

    .th-sortable:hover {
        color: #6366f1;
    }

    /* ===== PROJECT AVATAR ===== */
    .project-avatar {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: var(--avatar-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        transition: transform .25s, box-shadow .25s;
        box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
    }

    .project-row:hover .project-avatar,
    .grid-card:hover .project-avatar {
        transform: scale(1.1) rotate(-3deg);
        box-shadow: 0 6px 16px rgba(0, 0, 0, .12);
    }

    .project-name {
        font-weight: 700;
        font-size: 14px;
        color: #1e293b;
        text-decoration: none;
        transition: color .2s;
    }

    .project-name:hover {
        color: #6366f1;
    }

    .project-desc {
        font-size: 12px;
        color: #94a3b8;
        line-height: 1.3;
        margin-top: 2px;
    }

    .priority-tag {
        font-size: 11px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 2px;
        margin-top: 3px;
    }

    .id-badge {
        background: #f1f5f9;
        padding: 4px 10px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 12px;
        color: #64748b;
    }

    /* ===== STATUS BADGE ===== */
    .status-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        white-space: nowrap;
    }

    .bg-soft-success {
        background: rgba(34, 197, 94, .1);
    }

    .bg-soft-primary {
        background: rgba(99, 102, 241, .1);
    }

    .bg-soft-info {
        background: rgba(6, 182, 212, .1);
    }

    .bg-soft-warning {
        background: rgba(234, 179, 8, .1);
    }

    .bg-soft-danger {
        background: rgba(239, 68, 68, .1);
    }

    /* ===== PROGRESS RING ===== */
    .progress-ring {
        width: 38px;
        height: 38px;
        position: relative;
        flex-shrink: 0;
    }

    .progress-ring svg {
        width: 100%;
        height: 100%;
        transform: rotate(-90deg);
    }

    .ring-bg {
        fill: none;
        stroke: #e2e8f0;
        stroke-width: 3;
    }

    .ring-fill {
        fill: none;
        stroke-width: 3;
        stroke-linecap: round;
        transition: stroke-dasharray .8s ease;
    }

    .ring-fill.progress-success {
        stroke: #22c55e;
    }

    .ring-fill.progress-info {
        stroke: #06b6d4;
    }

    .ring-fill.progress-warning {
        stroke: #f59e0b;
    }

    .ring-fill.progress-danger {
        stroke: #ef4444;
    }

    .ring-text {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 9px;
        font-weight: 800;
        color: #475569;
    }

    .progress {
        background: #f1f5f9;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-bar {
        border-radius: 10px;
        transition: width .8s ease;
    }

    .progress-bar.progress-success {
        background: linear-gradient(90deg, #22c55e, #4ade80);
    }

    .progress-bar.progress-info {
        background: linear-gradient(90deg, #06b6d4, #22d3ee);
    }

    .progress-bar.progress-warning {
        background: linear-gradient(90deg, #f59e0b, #fbbf24);
    }

    .progress-bar.progress-danger {
        background: linear-gradient(90deg, #ef4444, #f87171);
    }

    /* ===== TASK BADGE ===== */
    .task-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #f8fafc;
        padding: 5px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #64748b;
    }

    .task-badge i {
        color: #22c55e;
    }

    /* ===== DATE INFO ===== */
    .date-info {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .date-main {
        font-size: 13px;
        color: #475569;
        font-weight: 500;
    }

    .date-deadline {
        font-size: 11px;
        color: #94a3b8;
        display: flex;
        align-items: center;
        gap: 3px;
    }

    .date-deadline.overdue {
        color: #ef4444;
        font-weight: 700;
    }

    /* ===== ACTION MENU ===== */
    .action-btn {
        width: 36px;
        height: 36px;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        background: #fff;
        color: #64748b;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        cursor: pointer;
        transition: all .2s;
    }

    .action-btn:hover {
        background: #6366f1;
        border-color: #6366f1;
        color: #fff;
        transform: scale(1.05);
    }

    .action-menu {
        border-radius: 14px !important;
        padding: 8px !important;
        min-width: 180px;
        animation: dropIn .2s ease;
    }

    @keyframes dropIn {
        from {
            opacity: 0;
            transform: translateY(-8px) scale(.95);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .action-menu .dropdown-item {
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 13px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all .15s;
    }

    .action-menu .dropdown-item:hover {
        background: #f1f5f9;
        transform: translateX(4px);
    }

    .action-menu .dropdown-item i {
        font-size: 16px;
        width: 18px;
        text-align: center;
    }

    /* ===== GRID VIEW ===== */
    .grid-card {
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        overflow: hidden;
        background: #fff;
        transition: all .3s ease;
        display: flex;
        flex-direction: column;
    }

    .grid-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, .08);
        border-color: transparent;
    }

    .grid-card-accent {
        height: 4px;
        transition: height .3s;
    }

    .grid-card:hover .grid-card-accent {
        height: 6px;
    }

    .grid-card-body {
        padding: 20px;
        flex: 1;
    }

    .grid-card-title {
        font-weight: 700;
        font-size: 15px;
        color: #1e293b;
        text-decoration: none;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color .2s;
        margin-bottom: 6px;
    }

    .grid-card-title:hover {
        color: #6366f1;
    }

    .grid-card-desc {
        font-size: 12px;
        color: #94a3b8;
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.5;
    }

    .grid-card-footer {
        display: flex;
        border-top: 1px solid #f1f5f9;
        padding: 0;
    }

    .grid-action {
        flex: 1;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: #94a3b8;
        text-decoration: none;
        border: none;
        background: none;
        cursor: pointer;
        transition: all .2s;
        border-right: 1px solid #f1f5f9;
    }

    .grid-action:last-child {
        border-right: none;
    }

    .grid-action:hover {
        background: #f8fafc;
        color: #6366f1;
    }

    .grid-action.text-danger:hover {
        color: #ef4444 !important;
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 60px 20px;
        text-align: center;
    }

    /* CSS-only folder illustration */
    .empty-illustration {
        position: relative;
        width: 140px;
        height: 120px;
    }

    .empty-folder {
        position: relative;
        width: 100%;
        height: 100%;
    }

    .folder-back {
        position: absolute;
        bottom: 0;
        left: 10px;
        right: 10px;
        height: 75px;
        background: #c7d2fe;
        border-radius: 4px 4px 8px 8px;
    }

    .folder-front {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 70px;
        background: #818cf8;
        border-radius: 0 8px 8px 8px;
        box-shadow: 0 4px 12px rgba(129, 140, 248, .3);
    }

    .folder-front::before {
        content: '';
        position: absolute;
        top: -15px;
        left: 0;
        width: 50px;
        height: 15px;
        background: #818cf8;
        border-radius: 6px 6px 0 0;
    }

    .folder-paper {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        background: #fff;
        border-radius: 4px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, .06);
    }

    .folder-paper.p1 {
        width: 70px;
        height: 50px;
        bottom: 55px;
        animation: paperFloat 3s ease-in-out infinite;
    }

    .folder-paper.p2 {
        width: 60px;
        height: 40px;
        bottom: 50px;
        left: calc(50% + 5px);
        animation: paperFloat 3s ease-in-out infinite .5s;
    }

    .folder-paper.p3 {
        width: 50px;
        height: 35px;
        bottom: 48px;
        left: calc(50% - 8px);
        animation: paperFloat 3s ease-in-out infinite 1s;
    }

    @keyframes paperFloat {

        0%,
        100% {
            transform: translateX(-50%) translateY(0);
        }

        50% {
            transform: translateX(-50%) translateY(-6px);
        }
    }

    .no-results-icon {
        width: 80px;
        height: 80px;
        background: #f1f5f9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
    }

    .no-results-icon i {
        font-size: 36px;
        color: #94a3b8;
    }

    /* ===== TABLE FOOTER ===== */
    .table-footer {
        border-top: 1px solid #f1f5f9;
    }

    kbd {
        background: #f1f5f9;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 2px 6px;
        font-size: 11px;
        color: #64748b;
    }

    /* ===== DELETE MODAL ===== */
    .delete-modal-content {
        border-radius: 20px !important;
    }

    .delete-modal-header {
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        padding: 30px 20px 20px;
        text-align: center;
    }

    .delete-icon-outer {
        width: 80px;
        height: 80px;
        background: rgba(239, 68, 68, .1);
        border-radius: 50%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: deletePulse 2s ease-in-out infinite;
    }

    .delete-icon-inner {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 26px;
    }

    @keyframes deletePulse {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(239, 68, 68, .15);
        }

        50% {
            box-shadow: 0 0 0 16px rgba(239, 68, 68, 0);
        }
    }

    .delete-warning {
        background: #fef3c7;
        border: 1px solid #fde68a;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 12px;
        color: #92400e;
        display: flex;
        align-items: center;
        margin-top: 12px;
    }

    .bulk-del-icon {
        width: 64px;
        height: 64px;
        background: #fee2e2;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        font-size: 28px;
    }

    /* ===== FLASH ALERTS ===== */
    .flash-alert {
        border-radius: 14px !important;
        animation: flashSlide .4s ease;
    }

    @keyframes flashSlide {
        from {
            opacity: 0;
            transform: translateY(-12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== CHECKBOX ===== */
    .form-check-input {
        border-radius: 5px;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: #6366f1;
        border-color: #6366f1;
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .15);
    }

    /* ===== DROPDOWN ANIMATE ===== */
    .animate-dropdown {
        border-radius: 14px !important;
        padding: 8px !important;
    }

    .animate-dropdown .dropdown-item {
        border-radius: 8px;
        padding: 8px 14px;
        font-size: 13px;
        transition: all .15s;
    }

    .animate-dropdown .dropdown-item:hover {
        background: #f1f5f9;
        transform: translateX(3px);
    }

    /* ===== TEXT COLOR ===== */
    .text-orange {
        color: #f97316;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .stat-number {
            font-size: 22px;
        }

        .stat-icon-box {
            width: 42px;
            height: 42px;
            font-size: 22px;
            border-radius: 10px;
        }

        .project-avatar {
            width: 36px !important;
            height: 36px !important;
            font-size: 12px !important;
            border-radius: 10px;
        }

        .project-table thead th {
            font-size: 10px;
            padding: 10px 8px;
        }

        .project-table tbody td {
            padding: 10px 8px;
        }
    }

    /* ===== PRINT ===== */
    @media print {

        .btn,
        .dropdown,
        .form-check,
        .card-header,
        .view-toggle,
        .stat-card,
        .breadcrumb,
        .search-box,
        .custom-select,
        #bulkBar,
        .action-dropdown,
        .table-footer,
        .flash-alert {
            display: none !important;
        }

        .card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }

        .main-card {
            border-radius: 0 !important;
        }
    }

    /* ===== SCROLLBAR ===== */
    .table-responsive::-webkit-scrollbar {
        height: 6px;
    }

    .table-responsive::-webkit-scrollbar-track {
        background: #f1f5f9;
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>


<!-- ================= SCRIPTS ================= -->
<script>
    document.addEventListener('DOMContentLoaded', function() {

        /* === ELEMENTS === */
        const searchInput = document.getElementById('searchInput');
        const searchClear = document.getElementById('searchClear');
        const statusFilter = document.getElementById('statusFilter');
        const sortBy = document.getElementById('sortBy');
        const checkAll = document.getElementById('checkAll');
        const rows = document.querySelectorAll('.project-row');
        const gridItems = document.querySelectorAll('.grid-item');
        const bulkBar = document.getElementById('bulkBar');
        const selectedCount = document.getElementById('selectedCount');
        const noResults = document.getElementById('noResults');
        const showCount = document.getElementById('showCount');
        const visibleNum = document.getElementById('visibleNum');
        const activeFilters = document.getElementById('activeFilters');
        const filterTagSearch = document.getElementById('filterTagSearch');
        const filterTagStatus = document.getElementById('filterTagStatus');
        const filterSearchText = document.getElementById('filterSearchText');
        const filterStatusText = document.getElementById('filterStatusText');
        const tableBody = document.getElementById('tableBody');

        /* === ANIMATED COUNTERS === */
        document.querySelectorAll('.stat-number').forEach(el => {
            const target = parseInt(el.dataset.target) || 0;
            let current = 0;
            const step = Math.max(1, Math.ceil(target / 30));
            const interval = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(interval);
                }
                el.textContent = current;
            }, 30);
        });

        /* === SEARCH === */
        let searchTimer;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => {
                searchClear.classList.toggle('d-none', !this.value);
                applyFilters();
            }, 150);
        });

        searchClear.addEventListener('click', () => {
            searchInput.value = '';
            searchClear.classList.add('d-none');
            applyFilters();
        });

        /* === STATUS FILTER === */
        statusFilter.addEventListener('change', applyFilters);

        /* === SORT === */
        sortBy.addEventListener('change', function() {
            const arr = Array.from(rows);
            arr.sort((a, b) => {
                switch (this.value) {
                    case 'newest':
                        return (b.dataset.date || '').localeCompare(a.dataset.date || '');
                    case 'oldest':
                        return (a.dataset.date || '').localeCompare(b.dataset.date || '');
                    case 'az':
                        return a.dataset.name.localeCompare(b.dataset.name);
                    case 'za':
                        return b.dataset.name.localeCompare(a.dataset.name);
                    case 'progress_high':
                        return (parseInt(b.dataset.progress) || 0) - (parseInt(a.dataset.progress) || 0);
                    case 'progress_low':
                        return (parseInt(a.dataset.progress) || 0) - (parseInt(b.dataset.progress) || 0);
                }
            });
            arr.forEach(row => tableBody.appendChild(row));
        });

        /* === FILTER LOGIC === */
        function applyFilters() {
            const q = searchInput.value.toLowerCase().trim();
            const status = statusFilter.value;
            let visible = 0;
            let hasActiveFilter = false;

            // Update filter tags
            if (q) {
                filterTagSearch.classList.remove('d-none');
                filterSearchText.textContent = q;
                hasActiveFilter = true;
            } else {
                filterTagSearch.classList.add('d-none');
            }

            if (status !== 'all') {
                filterTagStatus.classList.remove('d-none');
                filterStatusText.textContent = statusFilter.options[statusFilter.selectedIndex].text;
                hasActiveFilter = true;
            } else {
                filterTagStatus.classList.add('d-none');
            }

            activeFilters.classList.toggle('d-none', !hasActiveFilter);

            // Filter rows
            rows.forEach(row => {
                const matchQ = !q || row.dataset.name.includes(q);
                const matchS = status === 'all' || row.dataset.status === status;
                const show = matchQ && matchS;
                row.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            // Filter grid
            gridItems.forEach(item => {
                const matchQ = !q || item.dataset.name.includes(q);
                const matchS = status === 'all' || item.dataset.status === status;
                item.style.display = (matchQ && matchS) ? '' : 'none';
            });

            // Update counters
            if (showCount) showCount.textContent = visible;
            if (visibleNum) visibleNum.textContent = visible;

            // Show/hide no results
            noResults.classList.toggle('d-none', visible > 0 || rows.length === 0);

            // Update "Showing" text
            document.querySelectorAll('.project-row').forEach((r, i) => {
                if (r.style.display !== 'none') {
                    r.style.setProperty('--delay', (i * 0.03) + 's');
                }
            });
        }

        /* === SELECT ALL === */
        checkAll.addEventListener('change', function() {
            document.querySelectorAll('.row-check').forEach(cb => {
                const row = cb.closest('tr');
                if (row.style.display !== 'none') {
                    cb.checked = this.checked;
                    row.classList.toggle('selected', this.checked);
                }
            });
            updateBulkBar();
        });

        document.querySelectorAll('.row-check').forEach(cb => {
            cb.addEventListener('change', function() {
                this.closest('tr').classList.toggle('selected', this.checked);
                const allChecks = document.querySelectorAll('.row-check');
                checkAll.checked = [...allChecks].every(c => c.checked);
                checkAll.indeterminate = [...allChecks].some(c => c.checked) && !checkAll.checked;
                updateBulkBar();
            });
        });

        function updateBulkBar() {
            const checked = document.querySelectorAll('.row-check:checked').length;
            selectedCount.textContent = checked;
            bulkBar.classList.toggle('d-none', checked === 0);
        }

        /* === VIEW TOGGLE === */
        const btnTable = document.getElementById('btnTableView');
        const btnGrid = document.getElementById('btnGridView');
        const tableView = document.getElementById('tableViewContainer');
        const gridView = document.getElementById('gridViewContainer');

        btnTable.addEventListener('click', () => {
            tableView.classList.remove('d-none');
            gridView.classList.add('d-none');
            btnTable.classList.add('active');
            btnGrid.classList.remove('active');
        });

        btnGrid.addEventListener('click', () => {
            gridView.classList.remove('d-none');
            tableView.classList.add('d-none');
            btnGrid.classList.add('active');
            btnTable.classList.remove('active');
        });

        /* === KEYBOARD SHORTCUT === */
        document.addEventListener('keydown', function(e) {
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
        const flash = document.getElementById('flashMsg');
        if (flash) {
            setTimeout(() => {
                flash.style.transition = 'opacity .5s, transform .5s';
                flash.style.opacity = '0';
                flash.style.transform = 'translateY(-10px)';
                setTimeout(() => flash.remove(), 500);
            }, 4500);
        }

        /* === TOOLTIPS === */
        const tooltipEls = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        tooltipEls.forEach(el => new bootstrap.Tooltip(el));
    });

    /* === DELETE MODAL === */
    function openDeleteModal(id, name) {
        document.getElementById('delProjectName').textContent = name;
        document.getElementById('confirmDeleteBtn').href =
            '<?= base_url("index.php/project/delete/") ?>' + id;
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }

    /* === BULK DELETE === */
    function bulkDelete() {
        const checked = document.querySelectorAll('.row-check:checked');
        document.getElementById('bulkCount').textContent = checked.length;
        const modal = new bootstrap.Modal(document.getElementById('bulkDeleteModal'));
        modal.show();

        document.getElementById('confirmBulkDelete').onclick = function() {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?= base_url("index.php/project/bulk_delete") ?>';
            checked.forEach(cb => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'ids[]';
                input.value = cb.value;
                form.appendChild(input);
            });
            document.body.appendChild(form);
            form.submit();
        };
    }

    /* === CLEAR SELECTION === */
    function clearSelection() {
        document.querySelectorAll('.row-check').forEach(cb => {
            cb.checked = false;
            cb.closest('tr').classList.remove('selected');
        });
        document.getElementById('checkAll').checked = false;
        document.getElementById('checkAll').indeterminate = false;
        document.getElementById('bulkBar').classList.add('d-none');
    }

    /* === CLEAR FILTERS === */
    function clearSearch() {
        document.getElementById('searchInput').value = '';
        document.getElementById('searchClear').classList.add('d-none');
        document.getElementById('searchInput').dispatchEvent(new Event('input'));
    }

    function clearStatusFilter() {
        document.getElementById('statusFilter').value = 'all';
        document.getElementById('statusFilter').dispatchEvent(new Event('change'));
    }

    function clearAllFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('searchClear').classList.add('d-none');
        document.getElementById('statusFilter').value = 'all';
        document.getElementById('sortBy').value = 'newest';

        document.querySelectorAll('.project-row').forEach(r => r.style.display = '');
        document.querySelectorAll('.grid-item').forEach(g => g.style.display = '');
        document.getElementById('noResults').classList.add('d-none');
        document.getElementById('activeFilters').classList.add('d-none');

        const total = document.querySelectorAll('.project-row').length;
        const showCount = document.getElementById('showCount');
        const visibleNum = document.getElementById('visibleNum');
        if (showCount) showCount.textContent = total;
        if (visibleNum) visibleNum.textContent = total;
    }

    /* === FILTER BY STATUS (from stat cards) === */
    function filterByStatus(status) {
        const filter = document.getElementById('statusFilter');
        filter.value = status;
        filter.dispatchEvent(new Event('change'));

        document.querySelector('.main-card').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    /* === DUPLICATE === */
    function duplicateProject(id) {
        Swal.fire({
            icon: 'warning',
            title: 'Are you sure?',
            text: 'Create a duplicate of this project?',
            showCancelButton: true,
            confirmButtonColor: '#5f61f6',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then(result => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url("index.php/project/duplicate/") ?>' + id;
            }
        });
    }

    /* === EXPORT === */
    function exportTo(type) {
        window.location.href = '<?= base_url("index.php/project/export/") ?>' + type;
    }
</script>


<script>

function openProjectActions(projectId, projectName){

Swal.fire({
    title: `<b>${projectName}</b>`,
    html: `
        <div style="display:flex;flex-direction:column;gap:10px;margin-top:10px;">

            <a href="<?= base_url('index.php/project/view/') ?>${projectId}"
            class="btn btn-info btn-sm w-100">
            👁 View Details
            </a>

            <a href="<?= base_url('index.php/project/edit/') ?>${projectId}"
            class="btn btn-primary btn-sm w-100">
            ✏ Edit Project
            </a>

            <a href="<?= base_url('index.php/task/index/') ?>${projectId}"
            class="btn btn-success btn-sm w-100">
            📋 View Tasks
            </a>

            <button onclick="deleteProjectSwal(${projectId})"
            class="btn btn-danger btn-sm w-100">
            🗑 Delete Project
            </button>

        </div>
    `,
    showConfirmButton:false
});

}

</script>


<script>

function deleteProjectSwal(id){

Swal.fire({
title: "Are you sure?",
text: "You want to delete this project!",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#e11d48",
cancelButtonColor: "#6b7280",
confirmButtonText: "Yes Delete"
}).then((result) => {

if (result.isConfirmed) {

window.location.href =
"<?= base_url('index.php/project/delete/') ?>" + id;

}

});

}

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
