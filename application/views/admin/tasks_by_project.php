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
                        <li class="breadcrumb-item">
                            <a href="<?= site_url('project/my_projects') ?>" class="text-decoration-none">
                                My Projects
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Tasks</li>
                    </ol>
                </nav>

                <!-- Animated Header -->
                <div class="header-hero">
                    <div class="hero-bg-shapes">
                        <div class="hero-shape s1"></div>
                        <div class="hero-shape s2"></div>
                        <div class="hero-shape s3"></div>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 position-relative">
                        <div class="d-flex align-items-center gap-3">
                            <div class="page-icon">
                                <i class="bx bx-task"></i>
                                <div class="page-icon-pulse"></div>
                            </div>
                            <div>
                                <h4 class="mb-0 fw-bold text-white">Project Tasks</h4>
                                <p class="mb-0 mt-1 small" style="color: rgba(255,255,255,.7)">
                                    Track task progress, time &amp; performance
                                </p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 align-items-center flex-wrap">
                            <div class="live-clock d-none d-md-flex">
                                <div class="clock-dot"></div>
                                <i class="bx bx-time-five"></i>
                                <span id="liveClock">--:--:--</span>
                            </div>
                            <a href="<?= site_url('project/my_projects') ?>" class="btn btn-back radius-30 px-3">
                                <i class="bx bx-arrow-back me-1"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= FLASH MESSAGES ================= -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm flash-msg" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <div class="alert-ico success"><i class="bx bx-check-circle"></i></div>
                    <div><strong>Success!</strong> <?= $this->session->flashdata('success') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm flash-msg" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <div class="alert-ico danger"><i class="bx bx-error-circle"></i></div>
                    <div><strong>Error!</strong> <?= $this->session->flashdata('error') ?></div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- ================= QUICK STATS ================= -->
        <?php
        $totalTasks = count($tasks ?? []);
        $pending = 0;
        $inProgress = 0;
        $completed = 0;
        $onTime = 0;
        $delayed = 0;
        $totalWorked = 0;
        $totalExpected = 0;

        if (!empty($tasks)) {
            foreach ($tasks as $t) {
                if ($t->status == 'pending')
                    $pending++;
                elseif ($t->status == 'in_progress')
                    $inProgress++;
                elseif ($t->status == 'completed')
                    $completed++;

                if (isset($t->performance)) {
                    if ($t->performance == 'on_time')
                        $onTime++;
                    elseif ($t->performance == 'delayed')
                        $delayed++;
                }

                $totalWorked += (int) ($t->total_seconds ?? 0);
                $totalExpected += ((int) ($t->expected_minutes ?? 0)) * 60;
            }
        }

        $completionRate = $totalTasks > 0 ? round(($completed / $totalTasks) * 100) : 0;
        $twH = floor($totalWorked / 3600);
        $twM = floor(($totalWorked % 3600) / 60);
        $teH = floor($totalExpected / 3600);
        $teM = floor(($totalExpected % 3600) / 60);
        ?>

        <div class="row g-3 mb-4">
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat stat-total" onclick="filterByStatus('all')">
                    <div class="mini-stat-glow"></div>
                    <div class="ms-icon">
                        <i class="bx bx-list-check"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num" data-count="<?= $totalTasks ?>">0</div>
                        <div class="ms-label">Total Tasks</div>
                    </div>
                    <div class="ms-wave"><svg viewBox="0 0 120 28">
                            <path d="M0 28V16c20-8 40 4 60-2s40-10 60 2v12z" fill="currentColor" />
                        </svg></div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat stat-pending" onclick="filterByStatus('pending')">
                    <div class="mini-stat-glow"></div>
                    <div class="ms-icon">
                        <i class="bx bx-time"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num" data-count="<?= $pending ?>">0</div>
                        <div class="ms-label">Pending</div>
                    </div>
                    <div class="ms-wave"><svg viewBox="0 0 120 28">
                            <path d="M0 28V16c20-8 40 4 60-2s40-10 60 2v12z" fill="currentColor" />
                        </svg></div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat stat-progress" onclick="filterByStatus('in_progress')">
                    <div class="mini-stat-glow"></div>
                    <div class="ms-icon">
                        <i class="bx bx-loader-circle bx-spin"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num" data-count="<?= $inProgress ?>">0</div>
                        <div class="ms-label">In Progress</div>
                    </div>
                    <div class="ms-wave"><svg viewBox="0 0 120 28">
                            <path d="M0 28V16c20-8 40 4 60-2s40-10 60 2v12z" fill="currentColor" />
                        </svg></div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat stat-completed" onclick="filterByStatus('completed')">
                    <div class="mini-stat-glow"></div>
                    <div class="ms-icon">
                        <i class="bx bx-check-double"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num" data-count="<?= $completed ?>">0</div>
                        <div class="ms-label">Completed</div>
                    </div>
                    <div class="ms-wave"><svg viewBox="0 0 120 28">
                            <path d="M0 28V16c20-8 40 4 60-2s40-10 60 2v12z" fill="currentColor" />
                        </svg></div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat stat-ontime" onclick="filterByResult('on_time')">
                    <div class="mini-stat-glow"></div>
                    <div class="ms-icon">
                        <i class="bx bx-badge-check"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num" data-count="<?= $onTime ?>">0</div>
                        <div class="ms-label">On Time</div>
                    </div>
                    <div class="ms-wave"><svg viewBox="0 0 120 28">
                            <path d="M0 28V16c20-8 40 4 60-2s40-10 60 2v12z" fill="currentColor" />
                        </svg></div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat stat-delayed" onclick="filterByResult('delayed')">
                    <div class="mini-stat-glow"></div>
                    <div class="ms-icon">
                        <i class="bx bx-error-alt"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num" data-count="<?= $delayed ?>">0</div>
                        <div class="ms-label">Delayed</div>
                    </div>
                    <div class="ms-wave"><svg viewBox="0 0 120 28">
                            <path d="M0 28V16c20-8 40 4 60-2s40-10 60 2v12z" fill="currentColor" />
                        </svg></div>
                </div>
            </div>
        </div>

        <!-- ================= TIME OVERVIEW BAR ================= -->
        <div class="row g-3 mb-4">
            <div class="col-lg-4">
                <div class="time-overview-card toc-expected">
                    <div class="toc-bg-pattern"></div>
                    <div class="toc-icon">
                        <i class="bx bx-timer"></i>
                    </div>
                    <div class="toc-info">
                        <div class="toc-value"><?= "{$teH}h {$teM}m" ?></div>
                        <div class="toc-label">Total Expected</div>
                    </div>
                    <div class="toc-ring">
                        <svg width="48" height="48" viewBox="0 0 48 48">
                            <circle cx="24" cy="24" r="20" fill="none" stroke="currentColor" stroke-width="3"
                                opacity=".15" />
                            <circle cx="24" cy="24" r="20" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-dasharray="125.6" stroke-dashoffset="30" stroke-linecap="round"
                                class="toc-ring-fill" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="time-overview-card toc-worked">
                    <div class="toc-bg-pattern"></div>
                    <div class="toc-icon">
                        <i class="bx bx-stopwatch"></i>
                    </div>
                    <div class="toc-info">
                        <div class="toc-value"><?= "{$twH}h {$twM}m" ?></div>
                        <div class="toc-label">Total Worked</div>
                    </div>
                    <div class="toc-ring">
                        <svg width="48" height="48" viewBox="0 0 48 48">
                            <circle cx="24" cy="24" r="20" fill="none" stroke="currentColor" stroke-width="3"
                                opacity=".15" />
                            <circle cx="24" cy="24" r="20" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-dasharray="125.6" stroke-dashoffset="50" stroke-linecap="round"
                                class="toc-ring-fill" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="time-overview-card toc-completion">
                    <div class="toc-bg-pattern"></div>
                    <div class="toc-icon">
                        <i class="bx bx-pie-chart-alt-2"></i>
                    </div>
                    <div class="toc-info">
                        <div class="toc-value">
                            <?= $completionRate ?>%
                            <div class="toc-mini-progress">
                                <div class="toc-mini-bar" style="width: <?= $completionRate ?>%"></div>
                            </div>
                        </div>
                        <div class="toc-label">Completion Rate</div>
                    </div>
                    <div class="toc-ring">
                        <svg width="48" height="48" viewBox="0 0 48 48">
                            <circle cx="24" cy="24" r="20" fill="none" stroke="currentColor" stroke-width="3"
                                opacity=".15" />
                            <circle cx="24" cy="24" r="20" fill="none" stroke="currentColor" stroke-width="3"
                                stroke-dasharray="125.6"
                                stroke-dashoffset="<?= 125.6 - (125.6 * $completionRate / 100) ?>"
                                stroke-linecap="round" class="toc-ring-fill" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= MAIN CARD ================= -->
        <div class="card main-card border-0">

            <!-- TOOLBAR -->
            <div class="card-header bg-transparent border-0 py-3">
                <div class="row g-3 align-items-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="search-wrapper">
                            <i class="bx bx-search search-ico"></i>
                            <input type="text" class="form-control search-field" id="searchInput"
                                placeholder="Search tasks... (Ctrl+K)" autocomplete="off">
                            <button class="clear-btn d-none" id="clearBtn">
                                <i class="bx bx-x"></i>
                            </button>
                            <span class="search-shortcut d-none d-md-inline">
                                <kbd>Ctrl</kbd><kbd>K</kbd>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <select class="form-select filter-select" id="statusFilter">
                            <option value="all">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-3 col-6">
                        <select class="form-select filter-select" id="resultFilter">
                            <option value="all">All Results</option>
                            <option value="on_time">On Time</option>
                            <option value="delayed">Delayed</option>
                            <option value="none">No Result</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <select class="form-select filter-select" id="sortBy">
                            <option value="default">Default</option>
                            <option value="name_az">Name A→Z</option>
                            <option value="name_za">Name Z→A</option>
                            <option value="worked_high">Most Worked</option>
                            <option value="worked_low">Least Worked</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <span class="result-pill">
                                <i class="bx bx-hash"></i>
                                <span id="visibleCount"><?= $totalTasks ?></span>
                            </span>
                            <div class="view-switcher">
                                <button class="vs-btn active" id="listViewBtn" title="List View">
                                    <i class="bx bx-list-ul"></i>
                                </button>
                                <button class="vs-btn" id="cardViewBtn" title="Card View">
                                    <i class="bx bx-grid-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Filters -->
                <div class="filter-tags mt-3 d-none" id="filterBar">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <small class="text-muted fw-semibold"><i class="bx bx-filter-alt me-1"></i>Active:</small>
                        <span class="ftag d-none" id="ftagSearch">
                            <i class="bx bx-search"></i> "<span id="ftagSearchVal"></span>"
                            <button onclick="clearSearch()"><i class="bx bx-x"></i></button>
                        </span>
                        <span class="ftag d-none" id="ftagStatus">
                            <i class="bx bx-filter"></i> <span id="ftagStatusVal"></span>
                            <button onclick="clearStatusFilter()"><i class="bx bx-x"></i></button>
                        </span>
                        <span class="ftag ftag-result d-none" id="ftagResult">
                            <i class="bx bx-target-lock"></i> <span id="ftagResultVal"></span>
                            <button onclick="clearResultFilter()"><i class="bx bx-x"></i></button>
                        </span>
                        <a href="#" class="clear-all-link" onclick="clearAllFilters(); return false;">
                            <i class="bx bx-x-circle me-1"></i>Clear all
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0">

                <!-- ========== LIST VIEW ========== -->
                <div id="listViewContainer">
                    <div class="task-list" id="taskList">
                        <?php if (!empty($tasks)): ?>
                            <?php
                            $idx = 0;
                            foreach ($tasks as $t):
                                $idx++;
                                $expectedSeconds = ((int) $t->expected_minutes) * 60;
                                $eh = floor($expectedSeconds / 3600);
                                $em = floor(($expectedSeconds % 3600) / 60);
                                $es = $expectedSeconds % 60;

                                $workedSeconds = (int) $t->total_seconds;
                                $wh = floor($workedSeconds / 3600);
                                $wm = floor(($workedSeconds % 3600) / 60);
                                $ws = $workedSeconds % 60;

                                $timePct = ($expectedSeconds > 0)
                                    ? round(($workedSeconds / $expectedSeconds) * 100)
                                    : 0;

                                $statusMap = [
                                    'pending' => ['status-pending', 'bx-time', 'Pending', 'warning'],
                                    'in_progress' => ['status-progress', 'bx-loader-circle bx-spin', 'In Progress', 'primary'],
                                    'completed' => ['status-completed', 'bx-check-double', 'Completed', 'success'],
                                ];
                                $sc = $statusMap[$t->status] ?? $statusMap['pending'];

                                $perf = $t->performance ?? '';
                                $perfMap = [
                                    'on_time' => ['perf-success', 'bx-badge-check', 'On Time'],
                                    'delayed' => ['perf-danger', 'bx-error-alt', 'Delayed'],
                                ];
                                $pc = $perfMap[$perf] ?? null;

                                if ($timePct <= 80)
                                    $timeBarClass = 'tb-success';
                                elseif ($timePct <= 100)
                                    $timeBarClass = 'tb-warning';
                                else
                                    $timeBarClass = 'tb-danger';

                                $userName = $t->assigned_user ?? 'Unknown';
                                $colors = ['#6366f1', '#8b5cf6', '#ec4899', '#f43f5e', '#f97316', '#eab308', '#22c55e', '#14b8a6', '#06b6d4', '#3b82f6'];
                                $cIdx = abs(crc32($userName)) % count($colors);
                                $avColor = $colors[$cIdx];
                                $initials = '';
                                $parts = explode(' ', trim($userName));
                                foreach ($parts as $part) {
                                    $initials .= strtoupper(mb_substr($part, 0, 1));
                                }
                                $initials = mb_substr($initials, 0, 2);
                                ?>

                                <div class="task-item" data-name="<?= htmlspecialchars(strtolower($t->title)) ?>"
                                    data-status="<?= $t->status ?>" data-result="<?= $perf ?: 'none' ?>"
                                    data-worked="<?= $workedSeconds ?>" data-id="<?= $t->id ?>"
                                    style="--anim-delay: <?= $idx * 0.05 ?>s">

                                    <div class="ti-accent ti-accent-<?= $sc[3] ?>"></div>

                                    <div class="ti-content">
                                        <div class="ti-header">
                                            <div class="ti-title-area">
                                                <div class="ti-num">#<?= $idx ?></div>
                                                <h6 class="ti-title"><?= htmlspecialchars($t->title) ?></h6>
                                                <span class="ti-status <?= $sc[0] ?>">
                                                    <i class="bx <?= $sc[1] ?>"></i>
                                                    <?= $sc[2] ?>
                                                </span>
                                                <?php if ($pc): ?>
                                                    <span class="ti-perf <?= $pc[0] ?>">
                                                        <i class="bx <?= $pc[1] ?>"></i>
                                                        <?= $pc[2] ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="ti-meta">
                                            <div class="ti-meta-item">
                                                <div class="ti-user-avatar" style="--av-color: <?= $avColor ?>">
                                                    <?= $initials ?: '?' ?>
                                                </div>
                                                <span><?= htmlspecialchars($userName) ?></span>
                                            </div>

                                            <div class="ti-meta-item">
                                                <div class="ti-time-box expected">
                                                    <i class="bx bx-timer"></i>
                                                    <div>
                                                        <small class="ti-time-label">Expected</small>
                                                        <span class="ti-time-val"><?= "{$eh}h {$em}m {$es}s" ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ti-meta-item">
                                                <div class="ti-time-box worked">
                                                    <i class="bx bx-stopwatch"></i>
                                                    <div>
                                                        <small class="ti-time-label">Worked</small>
                                                        <span class="ti-time-val"><?= "{$wh}h {$wm}m {$ws}s" ?></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="ti-meta-item ti-time-compare">
                                                <div class="ti-compare-bar">
                                                    <div class="ti-compare-fill <?= $timeBarClass ?>"
                                                        style="width: <?= min($timePct, 100) ?>%"></div>
                                                </div>
                                                <small
                                                    class="ti-compare-pct <?= $timePct > 100 ? 'text-danger fw-bold' : '' ?>">
                                                    <?= $timePct ?>%
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ti-action">
                                        <div class="ti-action-btns">
                                            <a href="<?= site_url('task/edit/' . $t->id); ?>" class="tl-action-btn act-edit"
                                                data-tooltip="Edit Task">
                                                <i class='bx bx-edit-alt'></i>
                                            </a>
                                            <a href="<?= site_url('task/delete/' . $t->id); ?>" class="tl-action-btn act-delete"
                                                data-tooltip="Delete Task"
                                                onclick="return confirm('Are you sure you want to delete this task?');">
                                                <i class='bx bx-trash'></i>
                                            </a>
                                        </div>
                                        <a href="<?= site_url('project/task_logs/' . $t->id) ?>" class="btn-view-logs">
                                            <span class="bvl-text">
                                                <i class="bx bx-file me-1"></i> View Logs
                                            </span>
                                            <span class="bvl-arrow">
                                                <i class="bx bx-right-arrow-alt"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ========== CARD VIEW ========== -->
                <div id="cardViewContainer" class="d-none">
                    <div class="row g-3" id="taskGrid">
                        <?php if (!empty($tasks)): ?>
                            <?php foreach ($tasks as $t):
                                $expectedSeconds = ((int) $t->expected_minutes) * 60;
                                $eh = floor($expectedSeconds / 3600);
                                $em = floor(($expectedSeconds % 3600) / 60);

                                $workedSeconds = (int) $t->total_seconds;
                                $wh = floor($workedSeconds / 3600);
                                $wm = floor(($workedSeconds % 3600) / 60);

                                $timePct = ($expectedSeconds > 0) ? round(($workedSeconds / $expectedSeconds) * 100) : 0;

                                $statusMap = [
                                    'pending' => ['status-pending', 'Pending', 'warning'],
                                    'in_progress' => ['status-progress', 'In Progress', 'primary'],
                                    'completed' => ['status-completed', 'Completed', 'success'],
                                ];
                                $sc = $statusMap[$t->status] ?? $statusMap['pending'];

                                $perf = $t->performance ?? '';
                                $perfMap = [
                                    'on_time' => ['perf-success', 'On Time'],
                                    'delayed' => ['perf-danger', 'Delayed'],
                                ];
                                $pc = $perfMap[$perf] ?? null;

                                if ($timePct <= 80)
                                    $timeBarClass = 'tb-success';
                                elseif ($timePct <= 100)
                                    $timeBarClass = 'tb-warning';
                                else
                                    $timeBarClass = 'tb-danger';

                                $userName = $t->assigned_user ?? 'Unknown';
                                $colors = ['#6366f1', '#8b5cf6', '#ec4899', '#f43f5e', '#f97316', '#eab308', '#22c55e', '#14b8a6', '#06b6d4', '#3b82f6'];
                                $avColor = $colors[abs(crc32($userName)) % count($colors)];
                                $parts = explode(' ', trim($userName));
                                $initials = '';
                                foreach ($parts as $part)
                                    $initials .= strtoupper(mb_substr($part, 0, 1));
                                $initials = mb_substr($initials, 0, 2);

                                $accentColors = ['warning' => '#f59e0b', 'primary' => '#6366f1', 'success' => '#22c55e'];
                                $accent = $accentColors[$sc[2]] ?? '#94a3b8';
                                ?>
                                <div class="col-xxl-3 col-lg-4 col-md-6 grid-col"
                                    data-name="<?= htmlspecialchars(strtolower($t->title)) ?>" data-status="<?= $t->status ?>"
                                    data-result="<?= $perf ?: 'none' ?>" data-worked="<?= $workedSeconds ?>">
                                    <div class="task-card">
                                        <div class="tc-accent"
                                            style="background: linear-gradient(90deg, <?= $accent ?>, <?= $accent ?>88)"></div>
                                        <div class="tc-body">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <span class="ti-status small <?= $sc[0] ?>"><?= $sc[1] ?></span>
                                                <?php if ($pc): ?>
                                                    <span class="ti-perf small <?= $pc[0] ?>"><?= $pc[1] ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <h6 class="tc-title"><?= htmlspecialchars($t->title) ?></h6>
                                            <div class="tc-user mb-3">
                                                <div class="ti-user-avatar small-av" style="--av-color: <?= $avColor ?>">
                                                    <?= $initials ?>
                                                </div>
                                                <span class="small text-muted"><?= htmlspecialchars($userName) ?></span>
                                            </div>
                                            <div class="tc-time-grid mb-3">
                                                <div class="tc-time-item">
                                                    <i class="bx bx-timer"></i>
                                                    <div>
                                                        <small>Expected</small>
                                                        <strong><?= "{$eh}h {$em}m" ?></strong>
                                                    </div>
                                                </div>
                                                <div class="tc-time-item">
                                                    <i class="bx bx-stopwatch"></i>
                                                    <div>
                                                        <small>Worked</small>
                                                        <strong><?= "{$wh}h {$wm}m" ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tc-bar-wrap">
                                                <div class="d-flex justify-content-between mb-1">
                                                    <small class="text-muted">Time Used</small>
                                                    <small class="fw-bold <?= $timePct > 100 ? 'text-danger' : '' ?>">
                                                        <?= $timePct ?>%
                                                    </small>
                                                </div>
                                                <div class="tc-bar">
                                                    <div class="tc-bar-fill <?= $timeBarClass ?>"
                                                        style="width: <?= min($timePct, 100) ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tc-footer-wrap">
                                            <div class="tc-actions">
                                                <a href="<?= site_url('task/edit/' . $t->id); ?>" class="tc-act-btn tc-edit"
                                                    title="Edit">
                                                    <i class="bx bx-edit-alt"></i>
                                                </a>
                                                <a href="<?= site_url('task/delete/' . $t->id); ?>" class="tc-act-btn tc-delete"
                                                    title="Delete" onclick="return confirm('Are you sure?');">
                                                    <i class="bx bx-trash"></i>
                                                </a>
                                            </div>
                                            <a href="<?= site_url('project/task_logs/' . $t->id) ?>" class="tc-footer">
                                                <span><i class="bx bx-file me-1"></i>View Logs</span>
                                                <i class="bx bx-right-arrow-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ========== EMPTY STATE ========== -->
                <?php if (empty($tasks)): ?>
                    <div class="empty-state" id="emptyState">
                        <div class="empty-visual">
                            <div class="empty-ring r1"></div>
                            <div class="empty-ring r2"></div>
                            <div class="empty-ring r3"></div>
                            <div class="empty-center">
                                <i class="bx bx-task"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mt-4 mb-2">No Tasks Found</h5>
                        <p class="text-muted small mb-0" style="max-width: 340px">
                            This project doesn't have any tasks yet.<br>
                            Tasks will appear here once they're assigned.
                        </p>
                    </div>
                <?php endif; ?>

                <!-- ========== NO RESULTS ========== -->
                <div class="empty-state d-none" id="noResults">
                    <div class="no-result-icon">
                        <i class="bx bx-search-alt"></i>
                    </div>
                    <h6 class="fw-bold mt-3 mb-1">No Matching Tasks</h6>
                    <p class="text-muted small mb-3">Try different keywords or filters</p>
                    <button class="btn btn-outline-primary btn-sm radius-30 px-4" onclick="clearAllFilters()">
                        <i class="bx bx-refresh me-1"></i> Reset Filters
                    </button>
                </div>

                <!-- ========== FOOTER ========== -->
                <?php if (!empty($tasks)): ?>
                    <div class="list-footer mt-3">
                        <small class="text-muted">
                            Showing <strong id="showNum"><?= $totalTasks ?></strong>
                            of <strong><?= $totalTasks ?></strong> tasks
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
    :root {
        --clr-primary: #6366f1;
        --clr-primary-dark: #4f46e5;
        --clr-primary-light: #818cf8;
        --clr-success: #22c55e;
        --clr-warning: #f59e0b;
        --clr-danger: #ef4444;
        --clr-info: #06b6d4;
        --clr-emerald: #10b981;
        --clr-bg: #f0f2f8;
        --clr-card: #ffffff;
        --clr-border: #e8ecf3;
        --clr-text: #1e293b;
        --clr-text-muted: #94a3b8;
        --clr-text-secondary: #64748b;
        --radius-sm: 10px;
        --radius-md: 14px;
        --radius-lg: 20px;
        --radius-xl: 24px;
        --shadow-sm: 0 1px 3px rgba(0, 0, 0, .04), 0 1px 2px rgba(0, 0, 0, .06);
        --shadow-md: 0 4px 20px rgba(0, 0, 0, .06);
        --shadow-lg: 0 10px 40px rgba(0, 0, 0, .08);
        --shadow-xl: 0 20px 60px rgba(0, 0, 0, .1);
        --transition: all .3s cubic-bezier(.4, 0, .2, 1);
    }

    /* ===== HEADER HERO ===== */
    .header-hero {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #a855f7 100%);
        border-radius: var(--radius-xl);
        padding: 28px 32px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(79, 70, 229, .25);
    }

    .hero-bg-shapes {
        position: absolute;
        inset: 0;
        overflow: hidden;
        pointer-events: none;
    }

    .hero-shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, .06);
    }

    .hero-shape.s1 {
        width: 200px;
        height: 200px;
        top: -60px;
        right: -30px;
        animation: heroFloat 8s ease-in-out infinite;
    }

    .hero-shape.s2 {
        width: 150px;
        height: 150px;
        bottom: -50px;
        right: 120px;
        animation: heroFloat 10s ease-in-out infinite reverse;
    }

    .hero-shape.s3 {
        width: 80px;
        height: 80px;
        top: 10px;
        right: 250px;
        animation: heroFloat 6s ease-in-out infinite 1s;
    }

    @keyframes heroFloat {

        0%,
        100% {
            transform: translate(0, 0) scale(1);
        }

        33% {
            transform: translate(10px, -10px) scale(1.05);
        }

        66% {
            transform: translate(-5px, 8px) scale(.98);
        }
    }

    .page-icon {
        width: 52px;
        height: 52px;
        background: rgba(255, 255, 255, .2);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 26px;
        flex-shrink: 0;
        position: relative;
        border: 1px solid rgba(255, 255, 255, .15);
    }

    .page-icon-pulse {
        position: absolute;
        inset: -4px;
        border-radius: 18px;
        border: 2px solid rgba(255, 255, 255, .2);
        animation: iconPulse 2.5s ease-in-out infinite;
    }

    @keyframes iconPulse {

        0%,
        100% {
            transform: scale(1);
            opacity: .5;
        }

        50% {
            transform: scale(1.08);
            opacity: 0;
        }
    }

    .live-clock {
        display: flex;
        align-items: center;
        gap: 8px;
        background: rgba(255, 255, 255, .15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, .15);
        padding: 8px 16px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: 700;
        color: #fff;
        font-family: 'JetBrains Mono', 'Fira Code', monospace;
        letter-spacing: .5px;
    }

    .live-clock i {
        font-size: 16px;
    }

    .clock-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #4ade80;
        box-shadow: 0 0 8px rgba(74, 222, 128, .6);
        animation: clockBlink 1s ease-in-out infinite;
    }

    @keyframes clockBlink {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: .3;
        }
    }

    .btn-back {
        background: rgba(255, 255, 255, .15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, .2);
        color: #fff;
        font-weight: 600;
        font-size: 13px;
        transition: var(--transition);
    }

    .btn-back:hover {
        background: rgba(255, 255, 255, .25);
        color: #fff;
        transform: translateX(-3px);
    }

    /* ===== FLASH ===== */
    .flash-msg {
        border-radius: var(--radius-md) !important;
        animation: slideDown .5s cubic-bezier(.4, 0, .2, 1);
        backdrop-filter: blur(10px);
    }

    .alert-ico {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .alert-ico.success {
        background: rgba(34, 197, 94, .12);
        color: var(--clr-success);
    }

    .alert-ico.danger {
        background: rgba(239, 68, 68, .12);
        color: var(--clr-danger);
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== MINI STATS ===== */
    .mini-stat {
        display: flex;
        align-items: center;
        gap: 14px;
        background: var(--clr-card);
        border: 1px solid var(--clr-border);
        border-radius: var(--radius-lg);
        padding: 20px;
        cursor: pointer;
        transition: var(--transition);
        overflow: hidden;
        position: relative;
    }

    .mini-stat:hover {
        transform: translateY(-4px);
        box-shadow: var(--shadow-lg);
        border-color: transparent;
    }

    .mini-stat:active {
        transform: translateY(-2px);
    }

    .mini-stat-glow {
        position: absolute;
        top: -30px;
        right: -30px;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        opacity: .08;
        transition: var(--transition);
    }

    .mini-stat:hover .mini-stat-glow {
        transform: scale(1.5);
        opacity: .12;
    }

    .stat-total .mini-stat-glow {
        background: var(--clr-primary);
    }

    .stat-total .ms-icon {
        background: rgba(99, 102, 241, .1);
        color: var(--clr-primary);
    }

    .stat-pending .mini-stat-glow {
        background: var(--clr-warning);
    }

    .stat-pending .ms-icon {
        background: rgba(245, 158, 11, .1);
        color: var(--clr-warning);
    }

    .stat-progress .mini-stat-glow {
        background: var(--clr-info);
    }

    .stat-progress .ms-icon {
        background: rgba(6, 182, 212, .1);
        color: var(--clr-info);
    }

    .stat-completed .mini-stat-glow {
        background: var(--clr-success);
    }

    .stat-completed .ms-icon {
        background: rgba(34, 197, 94, .1);
        color: var(--clr-success);
    }

    .stat-ontime .mini-stat-glow {
        background: var(--clr-emerald);
    }

    .stat-ontime .ms-icon {
        background: rgba(16, 185, 129, .1);
        color: var(--clr-emerald);
    }

    .stat-delayed .mini-stat-glow {
        background: var(--clr-danger);
    }

    .stat-delayed .ms-icon {
        background: rgba(239, 68, 68, .1);
        color: var(--clr-danger);
    }

    .ms-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
        transition: var(--transition);
    }

    .mini-stat:hover .ms-icon {
        transform: scale(1.1) rotate(-5deg);
    }

    .ms-wave {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: .06;
        line-height: 0;
    }

    .ms-wave svg {
        width: 100%;
    }

    .ms-data {
        flex: 1;
        position: relative;
        z-index: 1;
    }

    .ms-num {
        font-size: 24px;
        font-weight: 800;
        line-height: 1.1;
        color: var(--clr-text);
        letter-spacing: -.5px;
    }

    .ms-label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .8px;
        color: var(--clr-text-muted);
        font-weight: 600;
        margin-top: 2px;
    }

    /* ===== TIME OVERVIEW ===== */
    .time-overview-card {
        display: flex;
        align-items: center;
        gap: 16px;
        background: var(--clr-card);
        border: 1px solid var(--clr-border);
        border-radius: var(--radius-lg);
        padding: 22px 24px;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .time-overview-card:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-md);
        border-color: transparent;
    }

    .toc-bg-pattern {
        position: absolute;
        inset: 0;
        opacity: .03;
        background-image: radial-gradient(circle at 1px 1px, currentColor 1px, transparent 0);
        background-size: 16px 16px;
    }

    .toc-expected {
        color: var(--clr-primary);
    }

    .toc-worked {
        color: var(--clr-info);
    }

    .toc-completion {
        color: var(--clr-success);
    }

    .toc-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
        position: relative;
        z-index: 1;
    }

    .toc-expected .toc-icon {
        background: rgba(99, 102, 241, .1);
        color: var(--clr-primary);
    }

    .toc-worked .toc-icon {
        background: rgba(6, 182, 212, .1);
        color: var(--clr-info);
    }

    .toc-completion .toc-icon {
        background: rgba(34, 197, 94, .1);
        color: var(--clr-success);
    }

    .toc-info {
        flex: 1;
        position: relative;
        z-index: 1;
    }

    .toc-value {
        font-size: 22px;
        font-weight: 800;
        color: var(--clr-text);
        display: flex;
        align-items: center;
        gap: 12px;
        letter-spacing: -.5px;
    }

    .toc-label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .8px;
        color: var(--clr-text-muted);
        font-weight: 600;
        margin-top: 2px;
    }

    .toc-mini-progress {
        width: 64px;
        height: 6px;
        background: #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .toc-mini-bar {
        height: 100%;
        border-radius: 10px;
        background: linear-gradient(90deg, #22c55e, #4ade80);
        transition: width 1s ease;
    }

    .toc-ring {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        opacity: .5;
        z-index: 0;
    }

    .toc-ring-fill {
        transition: stroke-dashoffset 1.5s ease;
        transform: rotate(-90deg);
        transform-origin: center;
    }

    /* ===== MAIN CARD ===== */
    .main-card {
        border-radius: var(--radius-xl) !important;
        overflow: hidden;
        box-shadow: var(--shadow-md);
        background: var(--clr-card);
    }

    /* ===== SEARCH & FILTERS ===== */
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
        color: var(--clr-text-muted);
        z-index: 2;
        transition: var(--transition);
    }

    .search-field {
        padding-left: 42px;
        padding-right: 110px;
        border-radius: 12px;
        border: 2px solid var(--clr-border);
        height: 44px;
        font-size: 14px;
        transition: var(--transition);
        background: #f8fafc;
    }

    .search-field:focus {
        border-color: var(--clr-primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .1);
        background: #fff;
    }

    .search-wrapper:focus-within .search-ico {
        color: var(--clr-primary);
    }

    .search-shortcut {
        position: absolute;
        right: 42px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .search-shortcut kbd {
        background: #e8ecf3;
        border: 1px solid #d4d9e4;
        border-radius: 5px;
        padding: 2px 6px;
        font-size: 10px;
        color: var(--clr-text-muted);
        font-weight: 700;
        box-shadow: 0 1px 0 #d4d9e4;
    }

    .clear-btn {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #f1f5f9;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: var(--clr-text-secondary);
        font-size: 16px;
        transition: var(--transition);
        z-index: 2;
    }

    .clear-btn:hover {
        background: #e2e8f0;
        color: var(--clr-text);
    }

    .filter-select {
        border-radius: 12px;
        border: 2px solid var(--clr-border);
        height: 44px;
        font-size: 13px;
        font-weight: 500;
        background: #f8fafc;
        transition: var(--transition);
    }

    .filter-select:focus {
        border-color: var(--clr-primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .1);
        background: #fff;
    }

    .result-pill {
        background: linear-gradient(135deg, #f0f2f8, #e8ecf3);
        padding: 7px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        color: var(--clr-text-secondary);
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .result-pill i {
        font-size: 14px;
        color: var(--clr-primary);
    }

    /* View Switcher */
    .view-switcher {
        display: flex;
        background: #f0f2f8;
        border-radius: 10px;
        padding: 3px;
        gap: 2px;
    }

    .vs-btn {
        width: 34px;
        height: 34px;
        background: transparent;
        border: none;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--clr-text-muted);
        font-size: 17px;
        cursor: pointer;
        transition: var(--transition);
    }

    .vs-btn.active {
        background: var(--clr-primary);
        color: #fff;
        box-shadow: 0 2px 8px rgba(99, 102, 241, .3);
    }

    .vs-btn:hover:not(.active) {
        background: #e2e8f0;
        color: var(--clr-primary);
    }

    /* Filter Tags */
    .ftag {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        color: var(--clr-primary);
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid rgba(99, 102, 241, .15);
        transition: var(--transition);
    }

    .ftag:hover {
        box-shadow: 0 2px 8px rgba(99, 102, 241, .15);
    }

    .ftag-result {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        color: #b45309;
        border-color: rgba(180, 83, 9, .15);
    }

    .ftag button {
        background: none;
        border: none;
        padding: 0;
        color: inherit;
        cursor: pointer;
        font-size: 15px;
        line-height: 1;
        opacity: .7;
        transition: opacity .2s;
    }

    .ftag button:hover {
        opacity: 1;
    }

    .clear-all-link {
        font-size: 12px;
        font-weight: 600;
        color: var(--clr-danger);
        text-decoration: none;
        margin-left: 8px;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
    }

    .clear-all-link:hover {
        color: #dc2626;
        text-decoration: underline;
    }

    /* ===== TASK LIST ITEMS ===== */
    .task-list {
        display: flex;
        flex-direction: column;
    }

    .task-item {
        display: flex;
        align-items: stretch;
        border: 1px solid transparent;
        border-bottom: 1px solid #f1f5f9;
        transition: var(--transition);
        animation: itemSlide .5s cubic-bezier(.4, 0, .2, 1) forwards;
        animation-delay: var(--anim-delay);
        opacity: 0;
        position: relative;
        overflow: hidden;
        border-radius: 0;
        margin: 0 -4px;
        padding: 0 4px;
    }

    .task-item:last-child {
        border-bottom: none;
    }

    .task-item:hover {
        background: linear-gradient(135deg, #fafaff, #f5f3ff);
        border-color: rgba(99, 102, 241, .08);
        border-radius: var(--radius-md);
        box-shadow: 0 4px 16px rgba(99, 102, 241, .06);
        z-index: 1;
    }

    @keyframes itemSlide {
        from {
            opacity: 0;
            transform: translateY(12px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .ti-accent {
        width: 4px;
        flex-shrink: 0;
        transition: width .3s, border-radius .3s;
        border-radius: 4px 0 0 4px;
    }

    .ti-accent-warning {
        background: linear-gradient(180deg, #f59e0b, #fbbf24);
    }

    .ti-accent-primary {
        background: linear-gradient(180deg, #6366f1, #818cf8);
    }

    .ti-accent-success {
        background: linear-gradient(180deg, #22c55e, #4ade80);
    }

    .task-item:hover .ti-accent {
        width: 6px;
    }

    .ti-content {
        flex: 1;
        padding: 18px 20px;
        min-width: 0;
    }

    .ti-header {
        margin-bottom: 12px;
    }

    .ti-title-area {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .ti-num {
        font-size: 11px;
        font-weight: 800;
        color: var(--clr-text-muted);
        background: #f0f2f8;
        padding: 2px 8px;
        border-radius: 6px;
        font-family: 'JetBrains Mono', monospace;
    }

    .ti-title {
        font-size: 15px;
        font-weight: 700;
        color: var(--clr-text);
        margin: 0;
        transition: color .2s;
    }

    .task-item:hover .ti-title {
        color: var(--clr-primary);
    }

    /* Status badges */
    .ti-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
        letter-spacing: .3px;
    }

    .status-pending {
        background: rgba(245, 158, 11, .1);
        color: #d97706;
        border: 1px solid rgba(245, 158, 11, .15);
    }

    .status-progress {
        background: rgba(99, 102, 241, .1);
        color: var(--clr-primary);
        border: 1px solid rgba(99, 102, 241, .15);
    }

    .status-completed {
        background: rgba(34, 197, 94, .1);
        color: #16a34a;
        border: 1px solid rgba(34, 197, 94, .15);
    }

    .ti-perf {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .perf-success {
        background: rgba(34, 197, 94, .1);
        color: var(--clr-success);
        border: 1px solid rgba(34, 197, 94, .15);
    }

    .perf-danger {
        background: rgba(239, 68, 68, .1);
        color: var(--clr-danger);
        border: 1px solid rgba(239, 68, 68, .15);
    }

    /* Meta Row */
    .ti-meta {
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
    }

    .ti-meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: var(--clr-text-secondary);
        font-weight: 500;
    }

    .ti-user-avatar {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        background: var(--av-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 11px;
        flex-shrink: 0;
        box-shadow: 0 3px 10px rgba(0, 0, 0, .1);
        transition: transform .3s cubic-bezier(.4, 0, .2, 1);
    }

    .ti-user-avatar.small-av {
        width: 28px;
        height: 28px;
        font-size: 10px;
        border-radius: 8px;
    }

    .task-item:hover .ti-user-avatar {
        transform: scale(1.1) rotate(-5deg);
    }

    .ti-time-box {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f8fafc;
        padding: 7px 14px;
        border-radius: var(--radius-sm);
        border: 1px solid #f1f5f9;
        transition: var(--transition);
    }

    .task-item:hover .ti-time-box {
        background: #fff;
        border-color: #e8ecf3;
    }

    .ti-time-box i {
        font-size: 18px;
    }

    .ti-time-box.expected i {
        color: var(--clr-primary);
    }

    .ti-time-box.worked i {
        color: var(--clr-info);
    }

    .ti-time-label {
        display: block;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: var(--clr-text-muted);
        font-weight: 600;
        line-height: 1;
    }

    .ti-time-val {
        font-size: 13px;
        font-weight: 700;
        color: var(--clr-text);
        display: block;
        line-height: 1.2;
        font-family: 'JetBrains Mono', monospace;
    }

    /* Time Comparison */
    .ti-time-compare {
        flex: 1;
        min-width: 120px;
        max-width: 200px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ti-compare-bar {
        flex: 1;
        height: 7px;
        background: #e8ecf3;
        border-radius: 10px;
        overflow: hidden;
    }

    .ti-compare-fill {
        height: 100%;
        border-radius: 10px;
        transition: width .8s cubic-bezier(.4, 0, .2, 1);
        position: relative;
    }

    .ti-compare-fill::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .3), transparent);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    .tb-success {
        background: linear-gradient(90deg, #22c55e, #4ade80);
    }

    .tb-warning {
        background: linear-gradient(90deg, #f59e0b, #fbbf24);
    }

    .tb-danger {
        background: linear-gradient(90deg, #ef4444, #f87171);
    }

    .ti-compare-pct {
        font-size: 12px;
        font-weight: 700;
        color: var(--clr-text-secondary);
        white-space: nowrap;
        font-family: 'JetBrains Mono', monospace;
    }

    /* Action Area */
    .ti-action {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0 20px;
        flex-shrink: 0;
    }

    .ti-action-btns {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .tl-action-btn {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        transition: var(--transition);
        text-decoration: none;
        position: relative;
    }

    .act-edit {
        background: rgba(99, 102, 241, .08);
        color: var(--clr-primary);
    }

    .act-edit:hover {
        background: var(--clr-primary);
        color: #fff;
        box-shadow: 0 4px 12px rgba(99, 102, 241, .3);
        transform: translateY(-2px);
    }

    .act-delete {
        background: rgba(239, 68, 68, .08);
        color: var(--clr-danger);
    }

    .act-delete:hover {
        background: var(--clr-danger);
        color: #fff;
        box-shadow: 0 4px 12px rgba(239, 68, 68, .3);
        transform: translateY(-2px);
    }

    .tl-action-btn[data-tooltip]:hover::after {
        content: attr(data-tooltip);
        position: absolute;
        bottom: calc(100% + 8px);
        left: 50%;
        transform: translateX(-50%);
        background: var(--clr-text);
        color: #fff;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
        z-index: 10;
        pointer-events: none;
        animation: tooltipIn .2s ease;
    }

    .tl-action-btn[data-tooltip]:hover::before {
        content: '';
        position: absolute;
        bottom: calc(100% + 4px);
        left: 50%;
        transform: translateX(-50%);
        border: 4px solid transparent;
        border-top-color: var(--clr-text);
        z-index: 10;
        animation: tooltipIn .2s ease;
    }

    @keyframes tooltipIn {
        from {
            opacity: 0;
            transform: translateX(-50%) translateY(4px);
        }

        to {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }

    .btn-view-logs {
        display: flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        color: #fff;
        text-decoration: none;
        padding: 11px 22px;
        border-radius: 14px;
        font-size: 13px;
        font-weight: 600;
        transition: var(--transition);
        box-shadow: 0 4px 14px rgba(99, 102, 241, .25);
        white-space: nowrap;
        position: relative;
        overflow: hidden;
    }

    .btn-view-logs::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, .2), transparent);
        opacity: 0;
        transition: opacity .3s;
    }

    .btn-view-logs:hover {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 8px 28px rgba(99, 102, 241, .4);
    }

    .btn-view-logs:hover::before {
        opacity: 1;
    }

    .bvl-arrow {
        display: flex;
        align-items: center;
        font-size: 18px;
        transition: transform .3s;
    }

    .btn-view-logs:hover .bvl-arrow {
        transform: translateX(4px);
    }

    /* ===== CARD VIEW ===== */
    .task-card {
        background: var(--clr-card);
        border: 1px solid var(--clr-border);
        border-radius: var(--radius-lg);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%;
        transition: var(--transition);
    }

    .task-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
        border-color: transparent;
    }

    .tc-accent {
        height: 4px;
        transition: height .3s;
    }

    .task-card:hover .tc-accent {
        height: 6px;
    }

    .tc-body {
        padding: 22px;
        flex: 1;
    }

    .tc-title {
        font-weight: 700;
        font-size: 16px;
        color: var(--clr-text);
        margin-bottom: 10px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: color .2s;
    }

    .task-card:hover .tc-title {
        color: var(--clr-primary);
    }

    .tc-user {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .tc-time-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 8px;
    }

    .tc-time-item {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #f8fafc;
        padding: 10px 12px;
        border-radius: var(--radius-sm);
        border: 1px solid #f1f5f9;
        transition: var(--transition);
    }

    .task-card:hover .tc-time-item {
        background: #f0f2f8;
        border-color: #e8ecf3;
    }

    .tc-time-item i {
        font-size: 18px;
        color: var(--clr-primary);
    }

    .tc-time-item i.bx-stopwatch {
        color: var(--clr-info);
    }

    .tc-time-item small {
        display: block;
        font-size: 10px;
        text-transform: uppercase;
        color: var(--clr-text-muted);
        font-weight: 600;
        letter-spacing: .4px;
    }

    .tc-time-item strong {
        display: block;
        font-size: 13px;
        color: var(--clr-text);
        font-family: 'JetBrains Mono', monospace;
    }

    .tc-bar {
        height: 6px;
        background: #e8ecf3;
        border-radius: 10px;
        overflow: hidden;
    }

    .tc-bar-fill {
        height: 100%;
        border-radius: 10px;
        transition: width .8s ease;
        position: relative;
    }

    .tc-bar-fill::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .3), transparent);
        animation: shimmer 2s infinite;
    }

    .tc-footer-wrap {
        border-top: 1px solid #f1f5f9;
        display: flex;
        align-items: stretch;
    }

    .tc-actions {
        display: flex;
        border-right: 1px solid #f1f5f9;
    }

    .tc-act-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        color: var(--clr-text-muted);
        text-decoration: none;
        font-size: 17px;
        transition: var(--transition);
    }

    .tc-edit:hover {
        background: rgba(99, 102, 241, .08);
        color: var(--clr-primary);
    }

    .tc-delete:hover {
        background: rgba(239, 68, 68, .08);
        color: var(--clr-danger);
    }

    .tc-act-btn+.tc-act-btn {
        border-left: 1px solid #f1f5f9;
    }

    .tc-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex: 1;
        padding: 12px 20px;
        font-size: 13px;
        font-weight: 600;
        color: var(--clr-primary);
        text-decoration: none;
        transition: var(--transition);
    }

    .tc-footer:hover {
        background: #f8fafc;
        color: var(--clr-primary-dark);
    }

    .tc-footer i:last-child {
        font-size: 18px;
        transition: transform .2s;
    }

    .tc-footer:hover i:last-child {
        transform: translateX(4px);
    }

    /* ===== EMPTY STATE ===== */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 70px 20px;
        text-align: center;
    }

    .empty-visual {
        position: relative;
        width: 140px;
        height: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-ring {
        position: absolute;
        border-radius: 50%;
        border: 2px dashed;
        animation: ringPulse 3s ease-in-out infinite;
    }

    .empty-ring.r1 {
        width: 140px;
        height: 140px;
        border-color: rgba(99, 102, 241, .15);
    }

    .empty-ring.r2 {
        width: 100px;
        height: 100px;
        border-color: rgba(139, 92, 246, .15);
        animation-delay: .5s;
    }

    .empty-ring.r3 {
        width: 64px;
        height: 64px;
        border-color: rgba(168, 85, 247, .2);
        animation-delay: 1s;
    }

    .empty-center {
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
        box-shadow: 0 6px 24px rgba(99, 102, 241, .35);
    }

    @keyframes ringPulse {

        0%,
        100% {
            transform: scale(1) rotate(0deg);
            opacity: .3;
        }

        50% {
            transform: scale(1.06) rotate(10deg);
            opacity: .6;
        }
    }

    .no-result-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f0f2f8, #e8ecf3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        color: var(--clr-text-muted);
    }

    /* ===== FOOTER ===== */
    .list-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 16px;
        border-top: 1px solid #f1f5f9;
    }

    .list-footer kbd {
        background: #f0f2f8;
        border: 1px solid #e2e8f0;
        border-radius: 5px;
        padding: 2px 6px;
        font-size: 10px;
        color: var(--clr-text-muted);
        font-weight: 700;
        box-shadow: 0 1px 0 #d4d9e4;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .ti-time-compare {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .header-hero {
            padding: 20px;
            border-radius: var(--radius-lg);
        }

        .task-item {
            flex-direction: column;
        }

        .ti-accent {
            width: 100% !important;
            height: 3px !important;
            border-radius: 0 !important;
        }

        .ti-action {
            padding: 0 20px 18px;
            flex-direction: column;
            gap: 8px;
        }

        .ti-action-btns {
            flex-direction: row;
            width: 100%;
        }

        .tl-action-btn {
            width: 100%;
        }

        .btn-view-logs {
            justify-content: center;
            width: 100%;
        }

        .ti-meta {
            gap: 10px;
        }

        .search-field {
            padding-right: 50px;
        }

        .search-shortcut {
            display: none !important;
        }

        .ms-num {
            font-size: 20px;
        }

        .mini-stat {
            padding: 14px 16px;
        }
    }

    /* ===== SCROLLBAR ===== */
    ::-webkit-scrollbar {
        width: 7px;
        height: 7px;
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

    /* ===== ANIMATIONS ===== */
    .bx-spin {
        animation: bxSpin 1.5s linear infinite;
    }

    @keyframes bxSpin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    /* ===== SELECTION ===== */
    ::selection {
        background: rgba(99, 102, 241, .15);
        color: var(--clr-primary-dark);
    }

    /* ===== PRINT ===== */
    @media print {

        .card-header,
        .mini-stat,
        .time-overview-card,
        .view-switcher,
        .result-pill,
        .btn-view-logs,
        .live-clock,
        .breadcrumb,
        .flash-msg,
        .list-footer,
        .ti-accent,
        .ti-time-compare,
        .ti-action,
        .header-hero,
        .hero-bg-shapes,
        .page-icon-pulse,
        .ms-wave,
        .toc-ring,
        .toc-bg-pattern,
        .mini-stat-glow {
            display: none !important;
        }

        .card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }

        .task-item {
            border-bottom: 1px solid #ddd !important;
        }
    }
</style>


<!-- ================= SCRIPTS ================= -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const searchInput = document.getElementById('searchInput');
        const clearBtn = document.getElementById('clearBtn');
        const statusFilter = document.getElementById('statusFilter');
        const resultFilter = document.getElementById('resultFilter');
        const sortBy = document.getElementById('sortBy');
        const items = document.querySelectorAll('.task-item');
        const gridCols = document.querySelectorAll('.grid-col');
        const noResults = document.getElementById('noResults');
        const visibleCount = document.getElementById('visibleCount');
        const showNum = document.getElementById('showNum');
        const filterBar = document.getElementById('filterBar');
        const ftagSearch = document.getElementById('ftagSearch');
        const ftagStatus = document.getElementById('ftagStatus');
        const ftagResult = document.getElementById('ftagResult');
        const ftagSearchVal = document.getElementById('ftagSearchVal');
        const ftagStatusVal = document.getElementById('ftagStatusVal');
        const ftagResultVal = document.getElementById('ftagResultVal');
        const taskList = document.getElementById('taskList');

        /* === ANIMATED COUNTERS === */
        document.querySelectorAll('.ms-num').forEach(el => {
            const target = parseInt(el.dataset.count) || 0;
            if (target === 0) { el.textContent = '0'; return; }
            let current = 0;
            const duration = 600;
            const startTime = performance.now();

            function animate(currentTime) {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const eased = 1 - Math.pow(1 - progress, 3);
                current = Math.round(eased * target);
                el.textContent = current;
                if (progress < 1) requestAnimationFrame(animate);
            }

            requestAnimationFrame(animate);
        });

        /* === LIVE CLOCK === */
        function updateClock() {
            const now = new Date();
            const el = document.getElementById('liveClock');
            if (el) {
                el.textContent = now.toLocaleTimeString('en-US', { hour12: false });
            }
        }
        updateClock();
        setInterval(updateClock, 1000);

        /* === SEARCH === */
        let debounce;
        searchInput.addEventListener('input', function () {
            clearTimeout(debounce);
            debounce = setTimeout(() => {
                clearBtn.classList.toggle('d-none', !this.value);
                if (!this.value) {
                    document.querySelector('.search-shortcut')?.classList.remove('d-none');
                } else {
                    document.querySelector('.search-shortcut')?.classList.add('d-none');
                }
                applyFilters();
            }, 150);
        });

        clearBtn.addEventListener('click', () => {
            searchInput.value = '';
            clearBtn.classList.add('d-none');
            document.querySelector('.search-shortcut')?.classList.remove('d-none');
            applyFilters();
            searchInput.focus();
        });

        /* === FILTERS === */
        statusFilter.addEventListener('change', applyFilters);
        resultFilter.addEventListener('change', applyFilters);

        /* === SORT === */
        sortBy.addEventListener('change', function () {
            const arr = Array.from(items);
            arr.sort((a, b) => {
                switch (this.value) {
                    case 'name_az': return a.dataset.name.localeCompare(b.dataset.name);
                    case 'name_za': return b.dataset.name.localeCompare(a.dataset.name);
                    case 'worked_high': return (parseInt(b.dataset.worked) || 0) - (parseInt(a.dataset.worked) || 0);
                    case 'worked_low': return (parseInt(a.dataset.worked) || 0) - (parseInt(b.dataset.worked) || 0);
                    default: return 0;
                }
            });
            arr.forEach((item, i) => {
                item.style.animationDelay = `${i * 0.03}s`;
                item.style.animation = 'none';
                item.offsetHeight;
                item.style.animation = '';
                taskList.appendChild(item);
            });
        });

        /* === MAIN FILTER === */
        function applyFilters() {
            const q = searchInput.value.toLowerCase().trim();
            const status = statusFilter.value;
            const result = resultFilter.value;
            let visible = 0;
            let hasFilter = false;

            if (q) {
                ftagSearch.classList.remove('d-none');
                ftagSearchVal.textContent = q;
                hasFilter = true;
            } else { ftagSearch.classList.add('d-none'); }

            if (status !== 'all') {
                ftagStatus.classList.remove('d-none');
                ftagStatusVal.textContent = statusFilter.options[statusFilter.selectedIndex].text;
                hasFilter = true;
            } else { ftagStatus.classList.add('d-none'); }

            if (result !== 'all') {
                ftagResult.classList.remove('d-none');
                ftagResultVal.textContent = resultFilter.options[resultFilter.selectedIndex].text;
                hasFilter = true;
            } else { ftagResult.classList.add('d-none'); }

            filterBar.classList.toggle('d-none', !hasFilter);

            items.forEach(item => {
                const matchQ = !q || item.dataset.name.includes(q);
                const matchS = status === 'all' || item.dataset.status === status;
                const matchR = result === 'all' || item.dataset.result === result;
                const show = matchQ && matchS && matchR;
                item.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            gridCols.forEach(col => {
                const matchQ = !q || col.dataset.name.includes(q);
                const matchS = status === 'all' || col.dataset.status === status;
                const matchR = result === 'all' || col.dataset.result === result;
                col.style.display = (matchQ && matchS && matchR) ? '' : 'none';
            });

            if (visibleCount) visibleCount.textContent = visible;
            if (showNum) showNum.textContent = visible;
            noResults.classList.toggle('d-none', visible > 0 || items.length === 0);
        }

        /* === VIEW TOGGLE === */
        const listBtn = document.getElementById('listViewBtn');
        const cardBtn = document.getElementById('cardViewBtn');
        const listView = document.getElementById('listViewContainer');
        const cardView = document.getElementById('cardViewContainer');

        listBtn.addEventListener('click', () => {
            listView.classList.remove('d-none');
            cardView.classList.add('d-none');
            listBtn.classList.add('active');
            cardBtn.classList.remove('active');
        });

        cardBtn.addEventListener('click', () => {
            cardView.classList.remove('d-none');
            listView.classList.add('d-none');
            cardBtn.classList.add('active');
            listBtn.classList.remove('active');
        });

        /* === KEYBOARD === */
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
                flash.style.transform = 'translateY(-16px)';
                setTimeout(() => flash.remove(), 500);
            }, 4500);
        }

        /* === INTERSECTION OBSERVER FOR CARDS === */
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: .1 });

        document.querySelectorAll('.grid-col').forEach(col => {
            col.style.opacity = '0';
            col.style.transform = 'translateY(20px)';
            col.style.transition = 'opacity .5s ease, transform .5s ease';
            observer.observe(col);
        });
    });

    /* === GLOBAL FUNCTIONS === */
    function clearSearch() {
        const inp = document.getElementById('searchInput');
        inp.value = '';
        document.getElementById('clearBtn').classList.add('d-none');
        inp.dispatchEvent(new Event('input'));
    }

    function clearStatusFilter() {
        document.getElementById('statusFilter').value = 'all';
        document.getElementById('statusFilter').dispatchEvent(new Event('change'));
    }

    function clearResultFilter() {
        document.getElementById('resultFilter').value = 'all';
        document.getElementById('resultFilter').dispatchEvent(new Event('change'));
    }

    function clearAllFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('clearBtn').classList.add('d-none');
        document.getElementById('statusFilter').value = 'all';
        document.getElementById('resultFilter').value = 'all';
        document.getElementById('sortBy').value = 'default';
        document.getElementById('filterBar').classList.add('d-none');

        document.querySelectorAll('.task-item').forEach(i => i.style.display = '');
        document.querySelectorAll('.grid-col').forEach(c => c.style.display = '');
        document.getElementById('noResults').classList.add('d-none');

        const total = document.querySelectorAll('.task-item').length;
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

    function filterByResult(result) {
        const sel = document.getElementById('resultFilter');
        sel.value = result;
        sel.dispatchEvent(new Event('change'));
        document.querySelector('.main-card').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
</script>