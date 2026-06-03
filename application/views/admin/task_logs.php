<div class="page-wrapper">
    <div class="page-content">

        <?php
        // Detect task status
        $taskCompleted = (!empty($logs) && $logs[0]->task_status == 'completed');
        $taskTitle = !empty($logs) ? ($logs[0]->task_title ?? 'Task') : 'Task';
        $projectName = !empty($logs) ? ($logs[0]->project_name ?? '') : '';
        $userName = !empty($logs) ? ($logs[0]->user_name ?? '') : '';
        $totalLogs = count($logs ?? []);

        // Calculate totals
        $totalSeconds = 0;
        $longestSession = 0;
        $shortestSession = PHP_INT_MAX;
        $runningSessions = 0;

        if (!empty($logs)) {
            foreach ($logs as $l) {
                // Parse total_time HH:MM:SS
                $parts = explode(':', $l->total_time ?? '00:00:00');
                $sec = (isset($parts[0]) ? (int) $parts[0] * 3600 : 0)
                    + (isset($parts[1]) ? (int) $parts[1] * 60 : 0)
                    + (isset($parts[2]) ? (int) $parts[2] : 0);
                $totalSeconds += $sec;

                if ($l->end_time) {
                    if ($sec > $longestSession)
                        $longestSession = $sec;
                    if ($sec < $shortestSession)
                        $shortestSession = $sec;
                } else {
                    $runningSessions++;
                }
            }
        }
        if ($shortestSession === PHP_INT_MAX)
            $shortestSession = 0;

        // Format total
        $ttH = floor($totalSeconds / 3600);
        $ttM = floor(($totalSeconds % 3600) / 60);
        $ttS = $totalSeconds % 60;

        // Format longest
        $lsH = floor($longestSession / 3600);
        $lsM = floor(($longestSession % 3600) / 60);
        $lsS = $longestSession % 60;

        // Average per session
        $completedSessions = $totalLogs - $runningSessions;
        $avgSeconds = ($completedSessions > 0) ? round($totalSeconds / $completedSessions) : 0;
        $avH = floor($avgSeconds / 3600);
        $avM = floor(($avgSeconds % 3600) / 60);
        $avS = $avgSeconds % 60;
        ?>

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
                            <a href="<?= site_url('project/my_projects') ?>" class="text-decoration-none">Projects</a>
                        </li>
                        <?php if ($projectName): ?>
                            <li class="breadcrumb-item">
                                <a href="javascript:history.back()"
                                    class="text-decoration-none"><?= htmlspecialchars($projectName) ?></a>
                            </li>
                        <?php endif; ?>
                        <li class="breadcrumb-item active">Logs</li>
                    </ol>
                </nav>

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="page-icon">
                            <i class="bx bx-file"></i>
                        </div>
                        <div>
                            <h4 class="mb-0 fw-bold"><?= htmlspecialchars($taskTitle) ?></h4>
                            <p class="text-muted mb-0 mt-1 small">
                                <?php if ($projectName): ?>
                                    <i class="bx bx-folder me-1"></i><?= htmlspecialchars($projectName) ?>
                                    <span class="mx-2">·</span>
                                <?php endif; ?>
                                Time tracking logs &amp; session history
                            </p>
                        </div>
                    </div>

                    <div class="d-flex gap-2 align-items-center flex-wrap">
                        <!-- Live Clock -->
                        <div class="live-clock d-none d-md-flex">
                            <i class="bx bx-time-five"></i>
                            <span id="liveClock">--:--:--</span>
                        </div>

                        <!-- Back Button -->
                        <a href="javascript:history.back()" class="btn btn-outline-secondary radius-30 px-3">
                            <i class="bx bx-arrow-back me-1"></i> Back
                        </a>
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

        <!-- ================= STATUS BANNER ================= -->
        <div class="status-banner <?= $taskCompleted ? 'completed' : 'in-progress' ?> mb-4">
            <div class="sb-content">
                <div class="sb-icon-wrap">
                    <?php if ($taskCompleted): ?>
                        <div class="sb-icon success">
                            <i class="bx bx-check-double"></i>
                        </div>
                    <?php else: ?>
                        <div class="sb-icon warning">
                            <i class="bx bx-loader-circle bx-spin"></i>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="sb-text">
                    <?php if ($taskCompleted): ?>
                        <h5 class="fw-bold mb-1">Task Completed</h5>
                        <p class="mb-0 small">This task has been successfully completed. Great work!</p>
                    <?php else: ?>
                        <h5 class="fw-bold mb-1">Task In Progress</h5>
                        <p class="mb-0 small">This task is still being worked on. Time is being tracked.</p>
                    <?php endif; ?>
                </div>

                <div class="sb-extra d-none d-md-flex">
                    <?php if ($taskCompleted): ?>
                        <div class="sb-badge-done">
                            <i class="bx bx-trophy"></i>
                            <span>Done</span>
                        </div>
                    <?php else: ?>
                        <div class="sb-live-pulse">
                            <span class="pulse-dot"></span>
                            <span class="pulse-text">LIVE</span>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Decorative -->
            <div class="sb-pattern"></div>
        </div>

        <!-- ================= STAT CARDS ================= -->
        <div class="row g-3 mb-4">
            <!-- Total Sessions -->
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat">
                    <div class="ms-icon bg-primary-soft text-primary">
                        <i class="bx bx-list-ol"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num" data-count="<?= $totalLogs ?>">0</div>
                        <div class="ms-label">Sessions</div>
                    </div>
                </div>
            </div>

            <!-- Total Time -->
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat">
                    <div class="ms-icon bg-info-soft text-info">
                        <i class="bx bx-timer"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num-text"><?= "{$ttH}h {$ttM}m" ?></div>
                        <div class="ms-label">Total Time</div>
                    </div>
                </div>
            </div>

            <!-- Average Session -->
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat">
                    <div class="ms-icon bg-success-soft text-success">
                        <i class="bx bx-bar-chart-alt-2"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num-text"><?= "{$avH}h {$avM}m" ?></div>
                        <div class="ms-label">Avg Session</div>
                    </div>
                </div>
            </div>

            <!-- Longest Session -->
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat">
                    <div class="ms-icon bg-warning-soft text-warning">
                        <i class="bx bx-expand-alt"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num-text"><?= "{$lsH}h {$lsM}m" ?></div>
                        <div class="ms-label">Longest</div>
                    </div>
                </div>
            </div>

            <!-- Completed Sessions -->
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat">
                    <div class="ms-icon bg-emerald-soft text-emerald">
                        <i class="bx bx-check-circle"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num" data-count="<?= $completedSessions ?>">0</div>
                        <div class="ms-label">Finished</div>
                    </div>
                </div>
            </div>

            <!-- Running -->
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <div class="mini-stat <?= $runningSessions > 0 ? 'has-running' : '' ?>">
                    <div class="ms-icon bg-danger-soft text-danger">
                        <i class="bx bx-play-circle"></i>
                    </div>
                    <div class="ms-data">
                        <div class="ms-num" data-count="<?= $runningSessions ?>">0</div>
                        <div class="ms-label">Running</div>
                    </div>
                    <?php if ($runningSessions > 0): ?>
                        <span class="running-dot"></span>
                    <?php endif; ?>
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
                                placeholder="Search logs... (Ctrl+K)" autocomplete="off">
                            <button class="clear-btn d-none" id="clearBtn">
                                <i class="bx bx-x"></i>
                            </button>
                            <span class="search-shortcut d-none d-md-inline">
                                <kbd>Ctrl</kbd><kbd>K</kbd>
                            </span>
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div class="col-lg-2 col-md-3 col-6">
                        <select class="form-select filter-select" id="sessionFilter">
                            <option value="all">All Sessions</option>
                            <option value="completed">Completed</option>
                            <option value="running">Running</option>
                        </select>
                    </div>

                    <!-- Sort -->
                    <div class="col-lg-2 col-md-3 col-6">
                        <select class="form-select filter-select" id="sortBy">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="longest">Longest First</option>
                            <option value="shortest">Shortest First</option>
                        </select>
                    </div>

                    <!-- Counter + View -->
                    <div class="col-lg-3 col-md-12">
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <span class="result-pill">
                                <span id="visibleCount"><?= $totalLogs ?></span> logs
                            </span>
                            <div class="view-switcher">
                                <button class="vs-btn active" id="listViewBtn" title="List">
                                    <i class="bx bx-list-ul"></i>
                                </button>
                                <button class="vs-btn" id="timelineViewBtn" title="Timeline">
                                    <i class="bx bx-git-branch"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Filters -->
                <div class="filter-tags mt-3 d-none" id="filterBar">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <small class="text-muted">Filters:</small>
                        <span class="ftag d-none" id="ftagSearch">
                            <i class="bx bx-search"></i> "<span id="ftagSearchVal"></span>"
                            <button onclick="clearSearch()"><i class="bx bx-x"></i></button>
                        </span>
                        <span class="ftag d-none" id="ftagSession">
                            <i class="bx bx-filter"></i> <span id="ftagSessionVal"></span>
                            <button onclick="clearSessionFilter()"><i class="bx bx-x"></i></button>
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
                    <div class="log-list" id="logList">
                        <?php if (!empty($logs)): ?>
                            <?php
                            $idx = 0;
                            foreach ($logs as $l):
                                $idx++;
                                $isRunning = empty($l->end_time);

                                // Parse duration
                                $parts = explode(':', $l->total_time ?? '00:00:00');
                                $durSec = (isset($parts[0]) ? (int) $parts[0] * 3600 : 0)
                                    + (isset($parts[1]) ? (int) $parts[1] * 60 : 0)
                                    + (isset($parts[2]) ? (int) $parts[2] : 0);
                                $dH = floor($durSec / 3600);
                                $dM = floor(($durSec % 3600) / 60);
                                $dS = $durSec % 60;

                                // Duration percentage of total
                                $durPct = ($totalSeconds > 0) ? round(($durSec / $totalSeconds) * 100) : 0;

                                // User avatar
                                $uName = $l->user_name ?? 'Unknown';
                                $colors = ['#6366f1', '#8b5cf6', '#ec4899', '#f43f5e', '#f97316', '#eab308', '#22c55e', '#14b8a6', '#06b6d4', '#3b82f6'];
                                $avColor = $colors[abs(crc32($uName)) % count($colors)];
                                $uParts = explode(' ', trim($uName));
                                $initials = '';
                                foreach ($uParts as $part)
                                    $initials .= strtoupper(mb_substr($part, 0, 1));
                                $initials = mb_substr($initials, 0, 2);

                                // Session number (reverse)
                                $sessionNum = $totalLogs - $idx + 1;
                                ?>

                                <div class="log-item <?= $isRunning ? 'is-running' : '' ?>"
                                    data-search="<?= htmlspecialchars(strtolower($uName . ' ' . ($l->project_name ?? '') . ' ' . ($l->task_title ?? ''))) ?>"
                                    data-session="<?= $isRunning ? 'running' : 'completed' ?>" data-duration="<?= $durSec ?>"
                                    data-date="<?= $l->start_time ?>" style="--anim-delay: <?= $idx * 0.04 ?>s">

                                    <!-- Session Number -->
                                    <div class="li-number">
                                        <span class="session-num">#<?= $sessionNum ?></span>
                                    </div>

                                    <!-- Status Indicator -->
                                    <div class="li-indicator">
                                        <div class="li-dot <?= $isRunning ? 'dot-running' : 'dot-done' ?>">
                                            <?php if ($isRunning): ?>
                                                <span class="dot-pulse"></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($idx < $totalLogs): ?>
                                            <div class="li-line"></div>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Content -->
                                    <div class="li-content">
                                        <!-- Header -->
                                        <div class="li-header">
                                            <div class="li-info-left">
                                                <!-- User -->
                                                <div class="li-user">
                                                    <div class="li-avatar" style="--av-color: <?= $avColor ?>">
                                                        <?= $initials ?>
                                                    </div>
                                                    <div>
                                                        <span class="li-user-name"><?= htmlspecialchars($uName) ?></span>
                                                        <span class="li-project-name">
                                                            <i class="bx bx-folder"></i>
                                                            <?= htmlspecialchars($l->project_name ?? '-') ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="li-info-right">
                                                <?php if ($isRunning): ?>
                                                    <span class="li-status-badge running">
                                                        <span class="badge-pulse"></span>
                                                        Running
                                                    </span>
                                                <?php else: ?>
                                                    <span class="li-status-badge done">
                                                        <i class="bx bx-check"></i>
                                                        Completed
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Task Name -->
                                        <div class="li-task">
                                            <i class="bx bx-task"></i>
                                            <span><?= htmlspecialchars($l->task_title ?? '-') ?></span>
                                        </div>

                                        <!-- Time Details -->
                                        <div class="li-time-row">
                                            <!-- Start -->
                                            <div class="li-time-box">
                                                <div class="ltb-icon start">
                                                    <i class="bx bx-log-in-circle"></i>
                                                </div>
                                                <div class="ltb-info">
                                                    <small class="ltb-label">Start</small>
                                                    <span
                                                        class="ltb-value"><?= date('d M Y', strtotime($l->start_time)) ?></span>
                                                    <span
                                                        class="ltb-time"><?= date('H:i:s', strtotime($l->start_time)) ?></span>
                                                </div>
                                            </div>

                                            <!-- Arrow -->
                                            <div class="li-arrow">
                                                <div class="arrow-line">
                                                    <div class="arrow-fill <?= $isRunning ? 'arrow-running' : '' ?>"
                                                        style="width: <?= $isRunning ? '60' : '100' ?>%"></div>
                                                </div>
                                                <i class="bx bx-right-arrow-alt"></i>
                                            </div>

                                            <!-- End -->
                                            <div class="li-time-box">
                                                <div class="ltb-icon end">
                                                    <i
                                                        class="bx <?= $isRunning ? 'bx-loader-circle bx-spin' : 'bx-log-out-circle' ?>"></i>
                                                </div>
                                                <div class="ltb-info">
                                                    <small class="ltb-label">End</small>
                                                    <?php if ($isRunning): ?>
                                                        <span class="ltb-value text-warning fw-bold">In Progress</span>
                                                        <span class="ltb-time running-timer"
                                                            data-start="<?= $l->start_time ?>">--:--:--</span>
                                                    <?php else: ?>
                                                        <span class="ltb-value"><?= date('d M Y', strtotime($l->end_time)) ?></span>
                                                        <span class="ltb-time"><?= date('H:i:s', strtotime($l->end_time)) ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Duration -->
                                            <div class="li-duration <?= $isRunning ? 'dur-running' : '' ?>">
                                                <div class="dur-main">
                                                    <i class="bx bx-stopwatch"></i>
                                                    <?php if ($isRunning): ?>
                                                        <span class="dur-value running-timer"
                                                            data-start="<?= $l->start_time ?>">--:--:--</span>
                                                    <?php else: ?>
                                                        <span
                                                            class="dur-value"><?= sprintf('%02d:%02d:%02d', $dH, $dM, $dS) ?></span>
                                                    <?php endif; ?>
                                                </div>
                                                <?php if (!$isRunning && $totalSeconds > 0): ?>
                                                    <div class="dur-bar">
                                                        <div class="dur-bar-fill" style="width: <?= $durPct ?>%"></div>
                                                    </div>
                                                    <small class="dur-pct"><?= $durPct ?>% of total</small>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ========== TIMELINE VIEW ========== -->
                <div id="timelineViewContainer" class="d-none">
                    <div class="timeline" id="timelineBody">
                        <?php if (!empty($logs)): ?>
                            <?php
                            $tIdx = 0;
                            foreach ($logs as $l):
                                $tIdx++;
                                $isRunning = empty($l->end_time);

                                $parts = explode(':', $l->total_time ?? '00:00:00');
                                $durSec = (isset($parts[0]) ? (int) $parts[0] * 3600 : 0)
                                    + (isset($parts[1]) ? (int) $parts[1] * 60 : 0)
                                    + (isset($parts[2]) ? (int) $parts[2] : 0);

                                $uName = $l->user_name ?? 'Unknown';
                                $colors = ['#6366f1', '#8b5cf6', '#ec4899', '#f43f5e', '#f97316', '#eab308', '#22c55e', '#14b8a6', '#06b6d4', '#3b82f6'];
                                $avColor = $colors[abs(crc32($uName)) % count($colors)];
                                $uParts = explode(' ', trim($uName));
                                $initials = '';
                                foreach ($uParts as $part)
                                    $initials .= strtoupper(mb_substr($part, 0, 1));
                                $initials = mb_substr($initials, 0, 2);
                                ?>

                                <div class="tl-item <?= $isRunning ? 'tl-running' : '' ?>"
                                    data-search="<?= htmlspecialchars(strtolower($uName . ' ' . ($l->task_title ?? ''))) ?>"
                                    data-session="<?= $isRunning ? 'running' : 'completed' ?>">

                                    <div class="tl-marker">
                                        <div class="tl-dot <?= $isRunning ? 'tl-dot-running' : '' ?>">
                                            <?php if ($isRunning): ?>
                                                <span class="tl-pulse"></span>
                                            <?php else: ?>
                                                <i class="bx bx-check"></i>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="tl-card">
                                        <div class="tl-card-header">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="li-avatar small-av" style="--av-color: <?= $avColor ?>">
                                                    <?= $initials ?>
                                                </div>
                                                <div>
                                                    <div class="fw-bold small"><?= htmlspecialchars($uName) ?></div>
                                                    <div class="text-muted" style="font-size:11px">
                                                        <?= date('d M Y · H:i', strtotime($l->start_time)) ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php if ($isRunning): ?>
                                                <span class="li-status-badge running small">
                                                    <span class="badge-pulse"></span> Running
                                                </span>
                                            <?php else: ?>
                                                <span class="tl-duration-badge">
                                                    <i class="bx bx-stopwatch"></i>
                                                    <?= $l->total_time ?? '00:00:00' ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="tl-card-body">
                                            <div class="tl-task-name">
                                                <i class="bx bx-task"></i>
                                                <?= htmlspecialchars($l->task_title ?? '-') ?>
                                            </div>

                                            <div class="tl-time-range">
                                                <span>
                                                    <i class="bx bx-log-in-circle text-success"></i>
                                                    <?= date('H:i:s', strtotime($l->start_time)) ?>
                                                </span>
                                                <i class="bx bx-right-arrow-alt text-muted"></i>
                                                <span>
                                                    <?php if ($isRunning): ?>
                                                        <i class="bx bx-loader-circle bx-spin text-warning"></i>
                                                        <span class="running-timer text-warning fw-bold"
                                                            data-start="<?= $l->start_time ?>">--:--:--</span>
                                                    <?php else: ?>
                                                        <i class="bx bx-log-out-circle text-danger"></i>
                                                        <?= date('H:i:s', strtotime($l->end_time)) ?>
                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- ========== EMPTY STATE ========== -->
                <?php if (empty($logs)): ?>
                    <div class="empty-state" id="emptyState">
                        <div class="empty-visual">
                            <div class="empty-ring r1"></div>
                            <div class="empty-ring r2"></div>
                            <div class="empty-ring r3"></div>
                            <div class="empty-center">
                                <i class="bx bx-file"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold mt-4 mb-2">No Logs Found</h5>
                        <p class="text-muted small mb-0" style="max-width: 340px">
                            No time tracking sessions have been recorded for this task yet.
                        </p>
                    </div>
                <?php endif; ?>

                <!-- ========== NO RESULTS ========== -->
                <div class="empty-state d-none" id="noResults">
                    <div class="no-result-icon">
                        <i class="bx bx-search-alt"></i>
                    </div>
                    <h6 class="fw-bold mt-3 mb-1">No Matching Logs</h6>
                    <p class="text-muted small mb-3">Try different keywords or filters</p>
                    <button class="btn btn-outline-primary btn-sm radius-30 px-3" onclick="clearAllFilters()">
                        <i class="bx bx-refresh me-1"></i> Reset
                    </button>
                </div>

                <!-- ========== FOOTER ========== -->
                <?php if (!empty($logs)): ?>
                    <div class="list-footer mt-3">
                        <small class="text-muted">
                            Showing <strong id="showNum"><?= $totalLogs ?></strong>
                            of <strong><?= $totalLogs ?></strong> logs
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
    /* ===== PAGE HEADER ===== */
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

    /* ===== FLASH ===== */
    .flash-msg {
        border-radius: 14px !important;
        animation: slideDown .4s ease;
    }

    .alert-ico {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .alert-ico.success {
        background: rgba(34, 197, 94, .15);
        color: #22c55e;
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

    /* ===== STATUS BANNER ===== */
    .status-banner {
        border-radius: 16px;
        overflow: hidden;
        position: relative;
        padding: 24px 28px;
    }

    .status-banner.completed {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        border: 1px solid #bbf7d0;
    }

    .status-banner.in-progress {
        background: linear-gradient(135deg, #fefce8, #fef9c3);
        border: 1px solid #fde68a;
    }

    .sb-content {
        display: flex;
        align-items: center;
        gap: 18px;
        position: relative;
        z-index: 1;
    }

    .sb-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        flex-shrink: 0;
    }

    .sb-icon.success {
        background: rgba(34, 197, 94, .15);
        color: #22c55e;
    }

    .sb-icon.warning {
        background: rgba(234, 179, 8, .15);
        color: #eab308;
    }

    .sb-text {
        flex: 1;
    }

    .sb-text h5 {
        color: #1e293b;
    }

    .sb-text p {
        color: #64748b;
    }

    .sb-badge-done {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #22c55e;
        color: #fff;
        padding: 8px 18px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 13px;
        box-shadow: 0 4px 12px rgba(34, 197, 94, .25);
    }

    .sb-badge-done i {
        font-size: 18px;
    }

    .sb-live-pulse {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #fef3c7;
        border: 1px solid #fde68a;
        padding: 8px 18px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 13px;
        color: #b45309;
    }

    .pulse-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #f59e0b;
        animation: pulseDot 1.5s ease-in-out infinite;
    }

    @keyframes pulseDot {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(245, 158, 11, .4);
        }

        50% {
            box-shadow: 0 0 0 6px rgba(245, 158, 11, 0);
        }
    }

    .sb-pattern {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 200px;
        background: radial-gradient(circle at 80% 50%, rgba(255, 255, 255, .4) 0%, transparent 60%);
    }

    /* ===== MINI STATS ===== */
    .mini-stat {
        display: flex;
        align-items: center;
        gap: 12px;
        background: #fff;
        border: 1px solid #f1f5f9;
        border-radius: 14px;
        padding: 16px 18px;
        transition: all .3s;
        overflow: hidden;
        position: relative;
    }

    .mini-stat:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, .06);
        border-color: transparent;
    }

    .mini-stat.has-running {
        border-color: rgba(239, 68, 68, .2);
    }

    .ms-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
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

    .bg-emerald-soft {
        background: rgba(16, 185, 129, .1);
    }

    .text-emerald {
        color: #10b981;
    }

    .ms-data {
        flex: 1;
    }

    .ms-num {
        font-size: 22px;
        font-weight: 800;
        line-height: 1.1;
        color: #1e293b;
    }

    .ms-num-text {
        font-size: 18px;
        font-weight: 800;
        line-height: 1.1;
        color: #1e293b;
    }

    .ms-label {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        color: #94a3b8;
        font-weight: 600;
    }

    .running-dot {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #ef4444;
        animation: pulseDot 1.5s ease-in-out infinite;
    }

    /* ===== MAIN CARD ===== */
    .main-card {
        border-radius: 20px !important;
        overflow: hidden;
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
        color: #94a3b8;
        z-index: 2;
        transition: color .2s;
    }

    .search-field {
        padding-left: 42px;
        padding-right: 110px;
        border-radius: 12px;
        border: 2px solid #e2e8f0;
        height: 42px;
        font-size: 14px;
        transition: all .3s;
    }

    .search-field:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .08);
    }

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
        height: 42px;
        font-size: 13px;
        transition: all .3s;
    }

    .filter-select:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .08);
    }

    .result-pill {
        background: #f1f5f9;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        color: #64748b;
    }

    .view-switcher {
        display: flex;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .vs-btn {
        width: 34px;
        height: 34px;
        background: #fff;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #94a3b8;
        font-size: 17px;
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
        color: inherit;
        cursor: pointer;
        font-size: 14px;
        line-height: 1;
    }

    /* ===== LOG LIST ITEMS ===== */
    .log-list {
        display: flex;
        flex-direction: column;
    }

    .log-item {
        display: flex;
        align-items: stretch;
        gap: 0;
        border-bottom: 1px solid #f1f5f9;
        animation: itemSlide .4s ease forwards;
        animation-delay: var(--anim-delay);
        opacity: 0;
        transition: all .25s;
    }

    .log-item:last-child {
        border-bottom: none;
    }

    .log-item:hover {
        background: #fafbff;
    }

    .log-item.is-running {
        background: #fffbeb;
    }

    .log-item.is-running:hover {
        background: #fef9c3;
    }

    @keyframes itemSlide {
        from {
            opacity: 0;
            transform: translateY(8px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Session Number */
    .li-number {
        display: flex;
        align-items: flex-start;
        padding: 20px 0 20px 16px;
        flex-shrink: 0;
    }

    .session-num {
        background: #f1f5f9;
        padding: 4px 10px;
        border-radius: 8px;
        font-size: 11px;
        font-weight: 700;
        color: #94a3b8;
    }

    /* Indicator / Timeline Dot */
    .li-indicator {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 16px;
        flex-shrink: 0;
    }

    .li-dot {
        width: 14px;
        height: 14px;
        border-radius: 50%;
        flex-shrink: 0;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .dot-done {
        background: #22c55e;
    }

    .dot-running {
        background: #f59e0b;
    }

    .dot-pulse {
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        border: 2px solid #f59e0b;
        animation: dotPulse 2s ease-in-out infinite;
    }

    @keyframes dotPulse {

        0%,
        100% {
            transform: scale(1);
            opacity: .6;
        }

        50% {
            transform: scale(1.4);
            opacity: 0;
        }
    }

    .li-line {
        width: 2px;
        flex: 1;
        margin-top: 6px;
        background: #e2e8f0;
        border-radius: 10px;
    }

    /* Content */
    .li-content {
        flex: 1;
        padding: 18px 20px 18px 0;
        min-width: 0;
    }

    .li-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 8px;
        flex-wrap: wrap;
    }

    .li-user {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .li-avatar {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: var(--av-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: 700;
        font-size: 12px;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
        transition: transform .3s;
    }

    .li-avatar.small-av {
        width: 30px;
        height: 30px;
        font-size: 11px;
        border-radius: 8px;
    }

    .log-item:hover .li-avatar {
        transform: scale(1.08) rotate(-3deg);
    }

    .li-user-name {
        display: block;
        font-weight: 700;
        font-size: 14px;
        color: #1e293b;
    }

    .li-project-name {
        display: block;
        font-size: 12px;
        color: #94a3b8;
    }

    .li-project-name i {
        font-size: 12px;
        vertical-align: middle;
    }

    .li-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .li-status-badge.done {
        background: rgba(34, 197, 94, .1);
        color: #22c55e;
    }

    .li-status-badge.running {
        background: rgba(245, 158, 11, .1);
        color: #d97706;
    }

    .badge-pulse {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #d97706;
        animation: pulseDot 1.5s ease-in-out infinite;
    }

    /* Task name */
    .li-task {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #64748b;
        font-weight: 600;
        margin-bottom: 12px;
    }

    .li-task i {
        color: #94a3b8;
        font-size: 16px;
    }

    /* Time Row */
    .li-time-row {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .li-time-box {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f8fafc;
        border: 1px solid #f1f5f9;
        padding: 10px 14px;
        border-radius: 12px;
        min-width: 160px;
    }

    .ltb-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .ltb-icon.start {
        background: rgba(34, 197, 94, .1);
        color: #22c55e;
    }

    .ltb-icon.end {
        background: rgba(239, 68, 68, .1);
        color: #ef4444;
    }

    .ltb-label {
        display: block;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .4px;
        color: #94a3b8;
        font-weight: 600;
    }

    .ltb-value {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: #1e293b;
        line-height: 1.2;
    }

    .ltb-time {
        display: block;
        font-size: 12px;
        color: #64748b;
        font-weight: 600;
        font-family: 'Courier New', monospace;
    }

    /* Arrow */
    .li-arrow {
        display: flex;
        align-items: center;
        gap: 4px;
        flex-shrink: 0;
    }

    .arrow-line {
        width: 40px;
        height: 3px;
        background: #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .arrow-fill {
        height: 100%;
        border-radius: 10px;
        background: linear-gradient(90deg, #22c55e, #4ade80);
        transition: width .6s ease;
    }

    .arrow-fill.arrow-running {
        background: linear-gradient(90deg, #f59e0b, #fbbf24);
        animation: arrowPulse 2s ease-in-out infinite;
    }

    @keyframes arrowPulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: .4;
        }
    }

    .li-arrow i {
        color: #94a3b8;
        font-size: 18px;
    }

    /* Duration */
    .li-duration {
        display: flex;
        flex-direction: column;
        gap: 4px;
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        padding: 10px 16px;
        border-radius: 12px;
        min-width: 130px;
    }

    .li-duration.dur-running {
        background: #fef3c7;
        border-color: #fde68a;
    }

    .dur-main {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 16px;
        color: #1e293b;
    }

    .dur-main i {
        font-size: 18px;
        color: #22c55e;
    }

    .dur-running .dur-main i {
        color: #f59e0b;
    }

    .dur-value {
        font-weight: 800;
        font-family: 'Courier New', monospace;
    }

    .dur-bar {
        height: 4px;
        background: #d1fae5;
        border-radius: 10px;
        overflow: hidden;
    }

    .dur-bar-fill {
        height: 100%;
        border-radius: 10px;
        background: linear-gradient(90deg, #22c55e, #4ade80);
        transition: width .6s ease;
    }

    .dur-pct {
        font-size: 10px;
        color: #64748b;
        font-weight: 600;
    }

    /* ===== TIMELINE VIEW ===== */
    .timeline {
        position: relative;
        padding-left: 30px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 14px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e2e8f0;
        border-radius: 10px;
    }

    .tl-item {
        display: flex;
        gap: 16px;
        margin-bottom: 20px;
        position: relative;
    }

    .tl-item:last-child {
        margin-bottom: 0;
    }

    .tl-marker {
        flex-shrink: 0;
        position: relative;
        z-index: 1;
        margin-left: -30px;
    }

    .tl-dot {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #22c55e;
        border: 3px solid #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 14px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
    }

    .tl-dot-running {
        background: #f59e0b;
        position: relative;
    }

    .tl-pulse {
        position: absolute;
        inset: -6px;
        border-radius: 50%;
        border: 2px solid #f59e0b;
        animation: dotPulse 2s ease-in-out infinite;
    }

    .tl-card {
        flex: 1;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        overflow: hidden;
        transition: all .3s;
    }

    .tl-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, .06);
        border-color: transparent;
    }

    .tl-running .tl-card {
        border-color: #fde68a;
        background: #fffbeb;
    }

    .tl-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 18px;
        border-bottom: 1px solid #f1f5f9;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tl-duration-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        background: #f0fdf4;
        color: #22c55e;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        font-family: 'Courier New', monospace;
    }

    .tl-card-body {
        padding: 14px 18px;
    }

    .tl-task-name {
        font-size: 14px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .tl-task-name i {
        color: #94a3b8;
    }

    .tl-time-range {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: #64748b;
        font-family: 'Courier New', monospace;
        font-weight: 600;
    }

    /* ===== EMPTY STATES ===== */
    .empty-state {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 60px 20px;
        text-align: center;
    }

    .empty-visual {
        position: relative;
        width: 120px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .empty-ring {
        position: absolute;
        border-radius: 50%;
        border: 2px solid;
        opacity: .12;
        animation: ringPulse 3s ease-in-out infinite;
    }

    .empty-ring.r1 {
        width: 120px;
        height: 120px;
        border-color: #6366f1;
    }

    .empty-ring.r2 {
        width: 90px;
        height: 90px;
        border-color: #8b5cf6;
        animation-delay: .4s;
    }

    .empty-ring.r3 {
        width: 60px;
        height: 60px;
        border-color: #a78bfa;
        animation-delay: .8s;
    }

    .empty-center {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 24px;
        z-index: 1;
        box-shadow: 0 4px 20px rgba(99, 102, 241, .3);
    }

    @keyframes ringPulse {

        0%,
        100% {
            transform: scale(1);
            opacity: .12;
        }

        50% {
            transform: scale(1.06);
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

    /* ===== FOOTER ===== */
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

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
        .li-time-row {
            flex-direction: column;
            align-items: stretch;
        }

        .li-arrow {
            justify-content: center;
            padding: 4px 0;
        }

        .arrow-line {
            width: 30px;
        }

        .li-duration {
            min-width: auto;
        }
    }

    @media (max-width: 768px) {
        .log-item {
            flex-direction: column;
        }

        .li-number {
            padding: 14px 16px 0;
        }

        .li-indicator {
            flex-direction: row;
            padding: 0 16px;
            gap: 0;
        }

        .li-line {
            width: auto;
            height: 2px;
            flex: 1;
            margin-top: 0;
            margin-left: 6px;
        }

        .li-content {
            padding: 14px 16px;
        }

        .sb-content {
            flex-direction: column;
            text-align: center;
        }

        .sb-icon-wrap {
            margin: 0 auto;
        }

        .search-field {
            padding-right: 50px;
        }

        .search-shortcut {
            display: none !important;
        }

        .ms-num {
            font-size: 18px;
        }

        .li-time-box {
            min-width: auto;
        }
    }

    /* ===== SCROLLBAR ===== */
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

    /* ===== SPINNING ===== */
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

    /* ===== PRINT ===== */
    @media print {

        .card-header,
        .mini-stat,
        .status-banner,
        .view-switcher,
        .result-pill,
        .live-clock,
        .breadcrumb,
        .flash-msg,
        .list-footer,
        .li-indicator,
        .li-number,
        .li-arrow,
        .dur-bar,
        .dur-pct {
            display: none !important;
        }

        .card {
            box-shadow: none !important;
            border: 1px solid #ddd !important;
        }

        .log-item {
            border-bottom: 1px solid #ddd !important;
        }
    }
</style>


<!-- ================= SCRIPTS ================= -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        /* === ELEMENTS === */
        const searchInput = document.getElementById('searchInput');
        const clearBtn = document.getElementById('clearBtn');
        const sessionFilter = document.getElementById('sessionFilter');
        const sortBy = document.getElementById('sortBy');
        const items = document.querySelectorAll('.log-item');
        const tlItems = document.querySelectorAll('.tl-item');
        const noResults = document.getElementById('noResults');
        const visibleCount = document.getElementById('visibleCount');
        const showNum = document.getElementById('showNum');
        const filterBar = document.getElementById('filterBar');
        const ftagSearch = document.getElementById('ftagSearch');
        const ftagSession = document.getElementById('ftagSession');
        const ftagSearchVal = document.getElementById('ftagSearchVal');
        const ftagSessionVal = document.getElementById('ftagSessionVal');
        const logList = document.getElementById('logList');

        /* === ANIMATED COUNTERS === */
        document.querySelectorAll('.ms-num').forEach(el => {
            const target = parseInt(el.dataset.count) || 0;
            if (target === 0) { el.textContent = '0'; return; }
            let current = 0;
            const step = Math.max(1, Math.ceil(target / 20));
            const timer = setInterval(() => {
                current += step;
                if (current >= target) { current = target; clearInterval(timer); }
                el.textContent = current;
            }, 40);
        });

        /* === LIVE CLOCK === */
        function updateClock() {
            const el = document.getElementById('liveClock');
            if (el) el.textContent = new Date().toLocaleTimeString('en-US', { hour12: false });
        }
        updateClock();
        setInterval(updateClock, 1000);

        /* === RUNNING TIMERS === */
        function updateRunningTimers() {
            document.querySelectorAll('.running-timer').forEach(el => {
                const start = new Date(el.dataset.start).getTime();
                const now = Date.now();
                const diff = Math.max(0, Math.floor((now - start) / 1000));
                const h = Math.floor(diff / 3600).toString().padStart(2, '0');
                const m = Math.floor((diff % 3600) / 60).toString().padStart(2, '0');
                const s = (diff % 60).toString().padStart(2, '0');
                el.textContent = h + ':' + m + ':' + s;
            });
        }
        updateRunningTimers();
        setInterval(updateRunningTimers, 1000);

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

        /* === FILTERS === */
        sessionFilter.addEventListener('change', applyFilters);

        /* === SORT === */
        sortBy.addEventListener('change', function () {
            const arr = Array.from(items);
            arr.sort((a, b) => {
                switch (this.value) {
                    case 'newest': return (b.dataset.date || '').localeCompare(a.dataset.date || '');
                    case 'oldest': return (a.dataset.date || '').localeCompare(b.dataset.date || '');
                    case 'longest': return (parseInt(b.dataset.duration) || 0) - (parseInt(a.dataset.duration) || 0);
                    case 'shortest': return (parseInt(a.dataset.duration) || 0) - (parseInt(b.dataset.duration) || 0);
                    default: return 0;
                }
            });
            arr.forEach(item => logList.appendChild(item));
        });

        /* === MAIN FILTER === */
        function applyFilters() {
            const q = searchInput.value.toLowerCase().trim();
            const session = sessionFilter.value;
            let visible = 0;
            let hasFilter = false;

            // Filter tags
            if (q) {
                ftagSearch.classList.remove('d-none');
                ftagSearchVal.textContent = q;
                hasFilter = true;
            } else { ftagSearch.classList.add('d-none'); }

            if (session !== 'all') {
                ftagSession.classList.remove('d-none');
                ftagSessionVal.textContent = sessionFilter.options[sessionFilter.selectedIndex].text;
                hasFilter = true;
            } else { ftagSession.classList.add('d-none'); }

            filterBar.classList.toggle('d-none', !hasFilter);

            // List items
            items.forEach(item => {
                const matchQ = !q || item.dataset.search.includes(q);
                const matchS = session === 'all' || item.dataset.session === session;
                const show = matchQ && matchS;
                item.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            // Timeline items
            tlItems.forEach(item => {
                const matchQ = !q || (item.dataset.search || '').includes(q);
                const matchS = session === 'all' || item.dataset.session === session;
                item.style.display = (matchQ && matchS) ? '' : 'none';
            });

            if (visibleCount) visibleCount.textContent = visible;
            if (showNum) showNum.textContent = visible;
            noResults.classList.toggle('d-none', visible > 0 || items.length === 0);
        }

        /* === VIEW TOGGLE === */
        const listBtn = document.getElementById('listViewBtn');
        const tlBtn = document.getElementById('timelineViewBtn');
        const listView = document.getElementById('listViewContainer');
        const tlView = document.getElementById('timelineViewContainer');

        listBtn.addEventListener('click', () => {
            listView.classList.remove('d-none');
            tlView.classList.add('d-none');
            listBtn.classList.add('active');
            tlBtn.classList.remove('active');
        });

        tlBtn.addEventListener('click', () => {
            tlView.classList.remove('d-none');
            listView.classList.add('d-none');
            tlBtn.classList.add('active');
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
                flash.style.transform = 'translateY(-12px)';
                setTimeout(() => flash.remove(), 500);
            }, 4500);
        }
    });

    /* === GLOBAL === */
    function clearSearch() {
        const inp = document.getElementById('searchInput');
        inp.value = '';
        document.getElementById('clearBtn').classList.add('d-none');
        inp.dispatchEvent(new Event('input'));
    }

    function clearSessionFilter() {
        document.getElementById('sessionFilter').value = 'all';
        document.getElementById('sessionFilter').dispatchEvent(new Event('change'));
    }

    function clearAllFilters() {
        document.getElementById('searchInput').value = '';
        document.getElementById('clearBtn').classList.add('d-none');
        document.getElementById('sessionFilter').value = 'all';
        document.getElementById('sortBy').value = 'newest';
        document.getElementById('filterBar').classList.add('d-none');

        document.querySelectorAll('.log-item').forEach(i => i.style.display = '');
        document.querySelectorAll('.tl-item').forEach(i => i.style.display = '');
        document.getElementById('noResults').classList.add('d-none');

        const total = document.querySelectorAll('.log-item').length;
        const vc = document.getElementById('visibleCount');
        const sn = document.getElementById('showNum');
        if (vc) vc.textContent = total;
        if (sn) sn.textContent = total;
    }
</script>