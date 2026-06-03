<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tasks</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* ── Reset & Base ── */
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6366f1;
            --primary-soft: #eef2ff;
            --green: #22c55e;
            --green-soft: #f0fdf4;
            --amber: #f59e0b;
            --amber-soft: #fffbeb;
            --cyan: #06b6d4;
            --cyan-soft: #ecfeff;
            --red: #ef4444;
            --bg: #f8fafc;
            --card: #ffffff;
            --text: #1e293b;
            --text-mid: #64748b;
            --text-light: #94a3b8;
            --border: #e2e8f0;
            --radius: 12px;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.5;
            min-height: 100vh;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 32px 20px;
        }

        /* ── Header ── */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .header-icon {
            width: 42px;
            height: 42px;
            background: var(--primary);
            color: #fff;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 18px;
        }

        .header h1 {
            font-size: 24px;
            font-weight: 700;
        }

        .header p {
            font-size: 14px;
            color: var(--text-mid);
            margin-top: 2px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            font-family: inherit;
            border: none;
            cursor: pointer;
            transition: .2s ease;
            text-decoration: none;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-ghost {
            background: var(--card);
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-ghost:hover {
            border-color: var(--text-light);
            box-shadow: 0 2px 8px rgba(0, 0, 0, .06);
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 2px 10px rgba(99, 102, 241, .35);
        }

        .btn-primary:hover {
            box-shadow: 0 4px 16px rgba(99, 102, 241, .4);
            color: #fff;
        }

        .btn-soft {
            background: var(--primary-soft);
            color: var(--primary);
        }

        .btn-soft:hover {
            background: var(--primary);
            color: #fff;
        }

        .btn-outline {
            background: transparent;
            color: var(--text-mid);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            background: var(--bg);
            color: var(--text);
        }

        .btn-disabled {
            background: var(--bg);
            color: var(--text-light);
            cursor: not-allowed;
        }

        .btn-disabled:hover {
            transform: none;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .spinning {
            animation: spin .7s linear infinite;
        }

        /* ── Stats Grid ── */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 20px;
            transition: .25s ease;
        }

        .stat:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .06);
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 16px;
            margin-bottom: 14px;
        }

        .stat--total .stat-icon {
            background: var(--primary-soft);
            color: var(--primary);
        }

        .stat--pending .stat-icon {
            background: var(--amber-soft);
            color: var(--amber);
        }

        .stat--progress .stat-icon {
            background: var(--cyan-soft);
            color: var(--cyan);
        }

        .stat--completed .stat-icon {
            background: var(--green-soft);
            color: var(--green);
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            font-weight: 500;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        /* ── Card ── */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
        }

        .card-head {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
        }

        .card-head h2 {
            font-size: 16px;
            font-weight: 700;
        }

        .badge {
            background: var(--primary-soft);
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
        }

        .filters {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .filter {
            padding: 7px 14px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--card);
            font-size: 13px;
            font-weight: 500;
            font-family: inherit;
            color: var(--text-mid);
            cursor: pointer;
            transition: .2s ease;
        }

        .filter:hover,
        .filter.active {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
        }

        .filter .count {
            font-size: 11px;
            font-weight: 700;
            background: rgba(0, 0, 0, .08);
            padding: 1px 7px;
            border-radius: 8px;
            margin-left: 4px;
            transition: .2s ease;
        }

        .filter:hover .count,
        .filter.active .count {
            background: rgba(255, 255, 255, .25);
        }

        /* ── Alert Banner ── */
        .alert-banner {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 16px 20px 0;
            padding: 12px 16px;
            background: var(--amber-soft);
            border: 1px solid #fcd34d;
            border-radius: 10px;
            font-size: 13px;
            color: #92400e;
        }

        .alert-banner i:first-child {
            font-size: 16px;
            color: var(--amber);
        }

        .alert-banner span {
            flex: 1;
        }

        .alert-banner strong {
            font-weight: 700;
        }

        .alert-close {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            padding: 4px;
            opacity: .6;
            transition: .2s;
        }

        .alert-close:hover {
            opacity: 1;
        }

        /* ── Table ── */
        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            padding: 12px 24px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .6px;
            color: var(--text-light);
            background: var(--bg);
            border-bottom: 1px solid var(--border);
            text-align: left;
            white-space: nowrap;
        }

        thead th:last-child {
            text-align: center;
        }

        tbody td {
            padding: 16px 24px;
            border-bottom: 1px solid var(--border);
            font-size: 14px;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr.task-row {
            transition: background .2s;
        }

        tbody tr.task-row:hover {
            background: var(--primary-soft);
        }

        /* Project Cell */
        .project {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: grid;
            place-items: center;
            font-size: 13px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
        }

        .av-1 {
            background: #6366f1;
        }

        .av-2 {
            background: #ec4899;
        }

        .av-3 {
            background: #14b8a6;
        }

        .av-4 {
            background: #f97316;
        }

        .av-5 {
            background: #8b5cf6;
        }

        .project-name {
            font-weight: 600;
            font-size: 14px;
        }

        .task-title {
            font-weight: 500;
            color: var(--text);
        }

        .task-id {
            font-size: 11px;
            color: var(--text-light);
            font-weight: 600;
            margin-top: 2px;
        }

        /* Status */
        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
        }

        .status--pending {
            background: var(--amber-soft);
            color: #b45309;
        }

        .status--pending .dot {
            background: var(--amber);
            animation: pulse 2s infinite;
        }

        .status--progress {
            background: var(--cyan-soft);
            color: #0e7490;
        }

        .status--progress .dot {
            background: var(--cyan);
            animation: pulse 1.5s infinite;
        }

        .status--done {
            background: var(--green-soft);
            color: #15803d;
        }

        .status--done .dot {
            background: var(--green);
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .4;
                transform: scale(1.5);
            }
        }

        .action-cell {
            text-align: center;
        }

        /* ── Empty / No Results ── */
        .empty {
            padding: 60px 20px;
            text-align: center;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            background: var(--bg);
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 26px;
            color: var(--text-light);
        }

        .empty h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .empty p {
            font-size: 13px;
            color: var(--text-mid);
        }

        .no-results {
            display: none;
        }

        /* ── Footer ── */
        .card-foot {
            padding: 14px 24px;
            background: var(--bg);
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .progress-row {
            display: flex;
            align-items: center;
            gap: 10px;
            flex: 1;
            min-width: 180px;
        }

        .progress-text {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-mid);
            white-space: nowrap;
        }

        .progress-track {
            flex: 1;
            max-width: 260px;
            height: 6px;
            background: var(--border);
            border-radius: 6px;
            overflow: hidden;
        }

        .progress-bar {
            height: 100%;
            width: 0%;
            background: var(--primary);
            border-radius: 6px;
            transition: width .8s cubic-bezier(.4, 0, .2, 1);
        }

        .timestamp {
            font-size: 12px;
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* ── Animations ── */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: slideUp .4s ease both;
        }

        /* ── Responsive ── */
        @media (max-width: 768px) {
            .container {
                padding: 20px 14px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }

            .stats {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .stat {
                padding: 16px;
            }

            .stat-value {
                font-size: 22px;
            }

            .avatar {
                display: none;
            }

            thead th,
            tbody td {
                padding: 12px 16px;
            }

            .filters {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 4px;
            }
        }

        /* ── Scrollbar ── */
        .table-wrap::-webkit-scrollbar {
            height: 4px;
        }

        .table-wrap::-webkit-scrollbar-thumb {
            background: var(--text-light);
            border-radius: 4px;
        }

        /* ── SweetAlert ── */
        .swal2-popup {
            border-radius: 16px !important;
            font-family: 'Inter', sans-serif !important;
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <div class="page-content"></div>
        <div class="container">

            <!-- Header -->
            <header class="header animate-in">
                <div class="header-title">
                    <div class="header-icon"><i class="fas fa-tasks"></i></div>
                    <div>
                        <h1>My Tasks</h1>
                        <p>Track and manage your assigned tasks</p>
                    </div>
                </div>
                <button class="btn btn-ghost" onclick="handleRefresh(this)">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
            </header>

            <!-- Stats -->
            <section class="stats animate-in" style="animation-delay:.05s">
                <div class="stat stat--total">
                    <div class="stat-icon"><i class="fas fa-layer-group"></i></div>
                    <div class="stat-value" id="totalCount">0</div>
                    <div class="stat-label">Total</div>
                </div>
                <div class="stat stat--pending">
                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                    <div class="stat-value" id="pendingCount">0</div>
                    <div class="stat-label">Pending</div>
                </div>
                <div class="stat stat--progress">
                    <div class="stat-icon"><i class="fas fa-spinner"></i></div>
                    <div class="stat-value" id="progressCount">0</div>
                    <div class="stat-label">In Progress</div>
                </div>
                <div class="stat stat--completed">
                    <div class="stat-icon"><i class="fas fa-check-circle"></i></div>
                    <div class="stat-value" id="completedCount">0</div>
                    <div class="stat-label">Completed</div>
                </div>
            </section>

            <!-- Main Card -->
            <main class="card animate-in" style="animation-delay:.1s">

                <div class="card-head">
                    <div style="display:flex;align-items:center;gap:10px">
                        <h2>Task Overview</h2>
                        <span class="badge" id="taskBadge">0 tasks</span>
                    </div>
                    <div class="filters" role="tablist">
                        <button class="filter active" data-filter="all" onclick="filterTasks('all',this)">
                            All <span class="count" id="fAll">0</span>
                        </button>
                        <button class="filter" data-filter="pending" onclick="filterTasks('pending',this)">
                            Pending <span class="count" id="fPending">0</span>
                        </button>
                        <button class="filter" data-filter="in_progress" onclick="filterTasks('in_progress',this)">
                            In Progress <span class="count" id="fProgress">0</span>
                        </button>
                        <button class="filter" data-filter="completed" onclick="filterTasks('completed',this)">
                            Completed <span class="count" id="fCompleted">0</span>
                        </button>
                    </div>
                </div>

                <?php if (!empty($running_task_id)): ?>
                    <div class="alert-banner" id="runAlert">
                        <i class="fas fa-bolt"></i>
                        <span><strong>Task in progress!</strong> Stop your current task before starting a new one.</span>
                        <button class="alert-close" onclick="dismissAlert(this)"><i class="fas fa-times"></i></button>
                    </div>
                <?php endif; ?>

                <div class="table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Task</th>
                                <th>Status</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <?php if (!empty($tasks)):
                                $colors = ['av-1', 'av-2', 'av-3', 'av-4', 'av-5'];
                                $pcolors = [];
                                $ci = 0;

                                foreach ($tasks as $i => $task):
                                    $pname = $task->project_name ?? '-';

                                    if (!isset($pcolors[$pname])) {
                                        $pcolors[$pname] = $colors[$ci % 5];
                                        $ci++;
                                    }

                                    $words = explode(' ', $pname);
                                    $initials = '';
                                    foreach (array_slice($words, 0, 2) as $w)
                                        $initials .= strtoupper(mb_substr($w, 0, 1));

                                    $sid = htmlspecialchars($task->status, ENT_QUOTES, 'UTF-8');
                                    $tnum = str_pad($task->id, 4, '0', STR_PAD_LEFT);
                                    $tid = (int) $task->id;
                                    ?>
                                    <tr class="task-row animate-in" data-status="<?= $sid ?>"
                                        style="animation-delay:<?= $i * .04 ?>s">

                                        <td>
                                            <div class="project">
                                                <div class="avatar <?= $pcolors[$pname] ?>">
                                                    <?= htmlspecialchars($initials) ?>
                                                </div>
                                                <span class="project-name">
                                                    <?= htmlspecialchars($pname) ?>
                                                </span>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="task-title">
                                                <?= htmlspecialchars($task->title) ?>
                                            </div>
                                            <div class="task-id">#TASK-
                                                <?= $tnum ?>
                                            </div>
                                        </td>

                                        <td>
                                            <?php if ($task->status === 'pending'): ?>
                                                <span class="status status--pending"><span class="dot"></span>Pending</span>
                                            <?php elseif ($task->status === 'in_progress'): ?>
                                                <span class="status status--progress"><span class="dot"></span>In Progress</span>
                                            <?php else: ?>
                                                <span class="status status--done"><span class="dot"></span>Completed</span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="action-cell">
                                            <?php if ($task->status === 'pending'): ?>
                                                <?php if (!empty($running_task_id)): ?>
                                                    <button class="btn btn-disabled" onclick="alertRunning()">
                                                        <i class="fas fa-lock fa-sm"></i> Start
                                                    </button>
                                                <?php else: ?>
                                                    <a href="<?= site_url('task/start/' . $tid) ?>" class="btn btn-primary">
                                                        <i class="fas fa-play fa-sm"></i> Start
                                                    </a>
                                                <?php endif; ?>
                                            <?php elseif ($task->status === 'in_progress'): ?>
                                                <a href="<?= site_url('task/task_details/' . $tid) ?>" class="btn btn-soft">
                                                    <i class="fas fa-eye fa-sm"></i> View
                                                </a>
                                            <?php else: ?>
                                                <a href="<?= site_url('task/task_details/' . $tid) ?>" class="btn btn-outline">
                                                    <i class="fas fa-external-link-alt fa-sm"></i> Details
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                                <tr class="no-results" id="noResults">
                                    <td colspan="4">
                                        <div class="empty">
                                            <div class="empty-icon"><i class="fas fa-filter"></i></div>
                                            <h3>No tasks match this filter</h3>
                                            <p>Try a different status above.</p>
                                        </div>
                                    </td>
                                </tr>

                            <?php else: ?>
                                <tr>
                                    <td colspan="4">
                                        <div class="empty">
                                            <div class="empty-icon"><i class="fas fa-inbox"></i></div>
                                            <h3>No Tasks Assigned</h3>
                                            <p>You're all caught up! Tasks will appear here when assigned.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if (!empty($tasks)): ?>
                    <div class="card-foot">
                        <div class="progress-row">
                            <span class="progress-text" id="pLabel">0% complete</span>
                            <div class="progress-track">
                                <div class="progress-bar" id="pBar"></div>
                            </div>
                        </div>
                        <div class="timestamp">
                            <i class="fas fa-clock fa-sm"></i>
                            Updated:
                            <?= date('M d, Y h:i A') ?>
                        </div>
                    </div>
                <?php endif; ?>

            </main>
        </div>
    </div>
    </div>
    <script>
        (function () {
            'use strict';

            /* ── DOM ── */
            const $ = id => document.getElementById(id);
            const rows = [...document.querySelectorAll('.task-row')];

            /* ── Count tasks ── */
            const c = { total: 0, pending: 0, in_progress: 0, completed: 0 };
            rows.forEach(r => { c.total++; c[r.dataset.status]++; });

            /* ── Animate number ── */
            function countUp(el, to) {
                if (!el) return;
                if (to === 0) { el.textContent = '0'; return; }
                let n = 0;
                const step = Math.ceil(to / 30);
                const id = setInterval(() => {
                    n = Math.min(n + step, to);
                    el.textContent = n;
                    if (n >= to) clearInterval(id);
                }, 20);
            }

            countUp($('totalCount'), c.total);
            countUp($('pendingCount'), c.pending);
            countUp($('progressCount'), c.in_progress);
            countUp($('completedCount'), c.completed);

            /* ── Badges & filter counts ── */
            const badge = $('taskBadge');
            if (badge) badge.textContent = c.total + (c.total === 1 ? ' task' : ' tasks');

            const setText = (id, v) => { const e = $(id); if (e) e.textContent = v; };
            setText('fAll', c.total);
            setText('fPending', c.pending);
            setText('fProgress', c.in_progress);
            setText('fCompleted', c.completed);

            /* ── Progress bar ── */
            if (c.total > 0) {
                const pct = Math.round((c.completed / c.total) * 100);
                setTimeout(() => {
                    const bar = $('pBar'), label = $('pLabel');
                    if (bar) bar.style.width = pct + '%';
                    if (label) label.textContent = pct + '% complete';
                }, 400);
            }

            /* ── Filter ── */
            window.filterTasks = function (status, btn) {
                document.querySelectorAll('.filter').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                let vis = 0;
                rows.forEach(r => {
                    const show = status === 'all' || r.dataset.status === status;
                    r.style.display = show ? '' : 'none';
                    if (show) vis++;
                });

                const nr = $('noResults');
                if (nr) nr.style.display = vis === 0 ? '' : 'none';
                if (badge) badge.textContent = vis + (vis === 1 ? ' task' : ' tasks');
            };

            /* ── Alert: running task ── */
            window.alertRunning = function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Task Already Running',
                    html: 'Please <strong>stop your current task</strong> first.',
                    confirmButtonText: 'Got it',
                    confirmButtonColor: '#6366f1'
                });
            };

            /* ── Dismiss banner ── */
            window.dismissAlert = function (btn) {
                const el = btn.closest('.alert-banner');
                if (!el) return;
                el.style.transition = '.25s ease';
                el.style.opacity = '0';
                el.style.transform = 'translateY(-8px)';
                setTimeout(() => el.remove(), 250);
            };

            /* ── Refresh ── */
            window.handleRefresh = function (btn) {
                const i = btn.querySelector('.fa-sync-alt');
                if (i) i.classList.add('spinning');
                btn.disabled = true;
                setTimeout(() => location.reload(), 500);
            };
        })();
    </script>
</body>

</html>