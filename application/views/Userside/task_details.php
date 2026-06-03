<?php
if (empty($task)) {
    echo '<div class="alert alert-danger m-4">Task not found.</div>';
    return;
}

$isPending = ($task->status === 'pending');
$isInProgress = ($task->status === 'in_progress');
$isCompleted = ($task->status === 'completed');

/* ── Compute total worked seconds from closed logs ── */
$totalSeconds = 0;
$logCount = 0;
if (!empty($logs)) {
    foreach ($logs as $l) {
        if (!empty($l->end_time)) {
            $totalSeconds += strtotime($l->end_time) - strtotime($l->start_time);
            $logCount++;
        }
    }
}
$workedH = floor($totalSeconds / 3600);
$workedM = floor(($totalSeconds % 3600) / 60);
$workedS = $totalSeconds % 60;

/* ── Find the active (open) log if in-progress ── */
$activeLog = null;
if ($isInProgress && !empty($logs)) {
    foreach ($logs as $l) {
        if (empty($l->end_time)) {
            $activeLog = $l;
            break;
        }
    }
}

/* ── Task number ── */
$taskNum = str_pad((int) $task->id, 4, '0', STR_PAD_LEFT);

/* ── Status label mapping ── */
$statusMap = [
    'pending' => ['label' => 'Pending', 'class' => 'pending', 'icon' => 'fa-clock'],
    'in_progress' => ['label' => 'In Progress', 'class' => 'in-progress', 'icon' => 'fa-spinner fa-pulse'],
    'completed' => ['label' => 'Completed', 'class' => 'completed', 'icon' => 'fa-check-circle'],
];
$statusInfo = $statusMap[$task->status] ?? $statusMap['pending'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task #<?= $taskNum ?> — <?= htmlspecialchars($task->title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* ═══════════════════════════════════════════
           CSS CUSTOM PROPERTIES
           ═══════════════════════════════════════════ */
        :root {
            --primary: #4f46e5;
            --primary-light: #eef2ff;
            --primary-dark: #3730a3;
            --success: #059669;
            --success-light: #ecfdf5;
            --warning: #d97706;
            --warning-light: #fffbeb;
            --info: #0891b2;
            --info-light: #ecfeff;
            --danger: #dc2626;
            --danger-light: #fef2f2;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 16px;
            --radius-xl: 20px;
            --transition-fast: 0.15s ease;
            --transition-base: 0.25s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f0f4ff 0%, #faf5ff 50%, #fef3f2 100%);
            min-height: 100vh;
            color: var(--gray-800);
        }

        .page-wrapper {
            min-height: 100vh;
        }

        .page-content {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 24px;
        }

        /* ═══════════════════════════════════════════
           BREADCRUMB / BACK NAV
           ═══════════════════════════════════════════ */
        .back-nav {
            margin-bottom: 24px;
            animation: fadeInDown 0.5s ease-out;
        }

        .back-nav a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-500);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: var(--radius-md);
            transition: all var(--transition-base);
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid transparent;
        }

        .back-nav a:hover {
            color: var(--primary);
            background: #fff;
            border-color: var(--gray-200);
            box-shadow: var(--shadow-sm);
            transform: translateX(-4px);
        }

        /* ═══════════════════════════════════════════
           TASK HEADER CARD
           ═══════════════════════════════════════════ */
        .task-header-card {
            background: #fff;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-100);
            overflow: hidden;
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out;
        }

        .task-header-inner {
            padding: 32px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
            flex-wrap: wrap;
        }

        .task-header-left {
            flex: 1;
            min-width: 280px;
        }

        .task-meta-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            flex-wrap: wrap;
        }

        .task-id-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--gray-100);
            color: var(--gray-600);
            font-size: 12px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 8px;
            font-variant-numeric: tabular-nums;
            letter-spacing: 0.5px;
        }

        .task-header-left h1 {
            font-size: 26px;
            font-weight: 800;
            color: var(--gray-900);
            letter-spacing: -0.5px;
            line-height: 1.3;
            margin-bottom: 8px;
        }

        .project-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-500);
            font-size: 14px;
            font-weight: 500;
        }

        .project-tag .dot {
            width: 10px;
            height: 10px;
            border-radius: 4px;
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            flex-shrink: 0;
        }

        /* ── Status Badge ── */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: var(--radius-sm);
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            white-space: nowrap;
        }

        .status-badge .pulse-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .status-badge.pending {
            background: var(--warning-light);
            color: var(--warning);
            border: 1px solid #fde68a;
        }

        .status-badge.pending .pulse-dot {
            background: var(--warning);
            animation: pulse-dot 2s ease-in-out infinite;
        }

        .status-badge.in-progress {
            background: var(--info-light);
            color: var(--info);
            border: 1px solid #a5f3fc;
        }

        .status-badge.in-progress .pulse-dot {
            background: var(--info);
            animation: pulse-dot 1.5s ease-in-out infinite;
        }

        .status-badge.completed {
            background: var(--success-light);
            color: var(--success);
            border: 1px solid #a7f3d0;
        }

        .status-badge.completed .pulse-dot {
            background: var(--success);
        }

        /* ── Action Buttons ── */
        .task-header-right {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .btn-task {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: var(--radius-md);
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all var(--transition-base);
            white-space: nowrap;
        }

        .btn-task:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        .btn-task.btn-start {
            background: linear-gradient(135deg, #10b981, #059669);
            color: #fff;
            box-shadow: 0 4px 14px rgba(5, 150, 105, 0.35);
        }

        .btn-task.btn-start:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(5, 150, 105, 0.45);
            color: #fff;
        }

        .btn-task.btn-stop {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #fff;
            box-shadow: 0 4px 14px rgba(217, 119, 6, 0.35);
        }

        .btn-task.btn-stop:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(217, 119, 6, 0.45);
            color: #fff;
        }

        .btn-task.btn-complete {
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            color: #fff;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.35);
        }

        .btn-task.btn-complete:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.45);
            color: #fff;
        }

        .btn-task:active {
            transform: translateY(0) !important;
        }

        /* ═══════════════════════════════════════════
           STATS ROW
           ═══════════════════════════════════════════ */
        .detail-stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out 0.1s both;
        }

        .detail-stat-card {
            background: #fff;
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow);
            border: 1px solid var(--gray-100);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .detail-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            border-radius: var(--radius-lg) var(--radius-lg) 0 0;
        }

        .detail-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .detail-stat-card.sessions::before {
            background: linear-gradient(90deg, var(--primary), #7c3aed);
        }

        .detail-stat-card.total-time::before {
            background: linear-gradient(90deg, #06b6d4, #0891b2);
        }

        .detail-stat-card.current::before {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .detail-stat-card .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            margin-bottom: 14px;
        }

        .detail-stat-card.sessions .stat-icon {
            background: var(--primary-light);
            color: var(--primary);
        }

        .detail-stat-card.total-time .stat-icon {
            background: var(--info-light);
            color: var(--info);
        }

        .detail-stat-card.current .stat-icon {
            background: var(--success-light);
            color: var(--success);
        }

        .detail-stat-card .stat-value {
            font-size: 28px;
            font-weight: 800;
            color: var(--gray-900);
            line-height: 1;
            margin-bottom: 4px;
            font-variant-numeric: tabular-nums;
        }

        .detail-stat-card .stat-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        /* ═══════════════════════════════════════════
           TIMER CARD
           ═══════════════════════════════════════════ */
        .timer-section {
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out 0.15s both;
        }

        .timer-card {
            background: linear-gradient(135deg, var(--gray-900) 0%, #1e1b4b 50%, var(--gray-900) 100%);
            border-radius: var(--radius-xl);
            padding: 40px 32px;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(17, 24, 39, 0.3);
        }

        .timer-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 30% 50%, rgba(79, 70, 229, 0.15) 0%, transparent 60%),
                radial-gradient(circle at 70% 50%, rgba(124, 58, 237, 0.1) 0%, transparent 60%);
            pointer-events: none;
        }

        .timer-card .timer-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 16px;
            position: relative;
        }

        .timer-card .timer-label .live-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ef4444;
            animation: pulse-dot 1.2s ease-in-out infinite;
        }

        .timer-card .timer-label .idle-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--gray-500);
        }

        .timer-display {
            font-size: 72px;
            font-weight: 800;
            color: #fff;
            letter-spacing: 4px;
            font-variant-numeric: tabular-nums;
            line-height: 1;
            margin-bottom: 20px;
            position: relative;
            text-shadow: 0 0 40px rgba(79, 70, 229, 0.4);
        }

        .timer-display .colon {
            opacity: 0.5;
            margin: 0 2px;
        }

        .timer-subtitle {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.4);
            font-weight: 500;
            position: relative;
        }

        .timer-subtitle span {
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
        }

        /* Colon blink for active timer */
        .timer-active .colon {
            animation: blink 1s step-end infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 0.5;
            }

            50% {
                opacity: 0.1;
            }
        }

        /* ═══════════════════════════════════════════
           COMPLETED BANNER
           ═══════════════════════════════════════════ */
        .completed-banner {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            border: 1px solid #a7f3d0;
            border-radius: var(--radius-xl);
            padding: 40px 32px;
            text-align: center;
            margin-bottom: 28px;
            animation: fadeInUp 0.6s ease-out 0.15s both;
            position: relative;
            overflow: hidden;
        }

        .completed-banner::before {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 120px;
            height: 120px;
            background: rgba(5, 150, 105, 0.08);
            border-radius: 50%;
        }

        .completed-banner::after {
            content: '';
            position: absolute;
            bottom: -40px;
            left: -20px;
            width: 100px;
            height: 100px;
            background: rgba(16, 185, 129, 0.06);
            border-radius: 50%;
        }

        .completed-banner .trophy-icon {
            width: 64px;
            height: 64px;
            background: #fff;
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 28px;
            box-shadow: var(--shadow-md);
            position: relative;
        }

        .completed-banner h3 {
            font-size: 20px;
            font-weight: 800;
            color: var(--success);
            margin-bottom: 8px;
            position: relative;
        }

        .completed-banner .time-result {
            font-size: 36px;
            font-weight: 800;
            color: var(--gray-900);
            margin: 8px 0;
            position: relative;
            font-variant-numeric: tabular-nums;
        }

        .completed-banner .time-result small {
            font-size: 16px;
            font-weight: 600;
            color: var(--gray-500);
        }

        .completed-banner p {
            font-size: 14px;
            color: var(--gray-500);
            position: relative;
        }

        /* ═══════════════════════════════════════════
           WORK LOGS CARD
           ═══════════════════════════════════════════ */
        .logs-card {
            background: #fff;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-100);
            overflow: hidden;
            animation: fadeInUp 0.6s ease-out 0.25s both;
        }

        .logs-card-header {
            padding: 24px 28px;
            border-bottom: 1px solid var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            background: linear-gradient(180deg, #fff 0%, var(--gray-50) 100%);
        }

        .logs-card-header .title-group {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logs-card-header .title-group h2 {
            font-size: 18px;
            font-weight: 700;
            color: var(--gray-900);
        }

        .logs-card-header .log-count {
            background: var(--primary-light);
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
        }

        /* ── Logs Table ── */
        .logs-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .logs-table thead th {
            background: var(--gray-50);
            padding: 14px 24px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--gray-500);
            border-bottom: 1px solid var(--gray-200);
            white-space: nowrap;
        }

        .logs-table tbody tr {
            transition: all var(--transition-base);
            position: relative;
        }

        .logs-table tbody tr:hover {
            background: linear-gradient(90deg, var(--primary-light), transparent);
        }

        .logs-table tbody tr::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 0;
            background: var(--primary);
            border-radius: 0 4px 4px 0;
            transition: width var(--transition-base);
        }

        .logs-table tbody tr:hover::after {
            width: 4px;
        }

        .logs-table tbody td {
            padding: 18px 24px;
            border-bottom: 1px solid var(--gray-100);
            font-size: 14px;
            vertical-align: middle;
        }

        .logs-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* ── Log Session Number ── */
        .session-num {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: var(--radius-sm);
            background: var(--primary-light);
            color: var(--primary);
            font-size: 13px;
            font-weight: 700;
        }

        .session-num.active {
            background: linear-gradient(135deg, var(--primary), #7c3aed);
            color: #fff;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        /* ── User Cell ── */
        .user-cell {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 13px;
            flex-shrink: 0;
        }

        .user-name {
            font-weight: 600;
            color: var(--gray-700);
            font-size: 14px;
        }

        /* ── Time Cell ── */
        .time-cell {
            font-variant-numeric: tabular-nums;
        }

        .time-cell .date-part {
            font-weight: 600;
            color: var(--gray-700);
            font-size: 13px;
        }

        .time-cell .time-part {
            color: var(--gray-400);
            font-size: 12px;
            margin-top: 2px;
        }

        /* ── Duration Cell ── */
        .duration-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 600;
            font-variant-numeric: tabular-nums;
        }

        .duration-badge.has-time {
            background: var(--primary-light);
            color: var(--primary);
        }

        .duration-badge.running {
            background: var(--success-light);
            color: var(--success);
            border: 1px solid #a7f3d0;
        }

        .duration-badge.running .pulse-sm {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--success);
            animation: pulse-dot 1.5s ease-in-out infinite;
        }

        .duration-badge.no-time {
            background: var(--gray-100);
            color: var(--gray-400);
        }

        /* ── Active Row Highlight ── */
        .logs-table tbody tr.active-row {
            background: linear-gradient(90deg, var(--success-light), transparent);
        }

        .logs-table tbody tr.active-row::after {
            width: 4px;
            background: var(--success);
        }

        /* ── Empty Logs ── */
        .empty-logs {
            padding: 60px 20px;
            text-align: center;
        }

        .empty-logs .empty-icon {
            width: 64px;
            height: 64px;
            background: var(--gray-100);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 24px;
            color: var(--gray-400);
        }

        .empty-logs h4 {
            font-size: 16px;
            font-weight: 700;
            color: var(--gray-600);
            margin-bottom: 4px;
        }

        .empty-logs p {
            font-size: 13px;
            color: var(--gray-400);
        }

        /* ── Logs Footer ── */
        .logs-card-footer {
            padding: 16px 28px;
            background: var(--gray-50);
            border-top: 1px solid var(--gray-100);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }

        .logs-card-footer .total-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-500);
        }

        .logs-card-footer .total-value {
            font-size: 14px;
            font-weight: 700;
            color: var(--gray-800);
            font-variant-numeric: tabular-nums;
        }

        /* ═══════════════════════════════════════════
           ANIMATIONS
           ═══════════════════════════════════════════ */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

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

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.4;
                transform: scale(1.6);
            }
        }

        .fade-in-row {
            animation: fadeInUp 0.4s ease-out both;
        }

        /* ═══════════════════════════════════════════
           RESPONSIVE
           ═══════════════════════════════════════════ */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px 16px;
            }

            .task-header-inner {
                padding: 24px 20px;
                flex-direction: column;
            }

            .task-header-left h1 {
                font-size: 20px;
            }

            .task-header-right {
                width: 100%;
            }

            .task-header-right .btn-task {
                flex: 1;
                justify-content: center;
            }

            .timer-display {
                font-size: 48px;
            }

            .timer-card {
                padding: 28px 20px;
            }

            .detail-stats-row {
                grid-template-columns: 1fr 1fr 1fr;
                gap: 12px;
            }

            .detail-stat-card {
                padding: 16px;
            }

            .detail-stat-card .stat-value {
                font-size: 22px;
            }

            .logs-table thead th,
            .logs-table tbody td {
                padding: 14px 16px;
            }

            .user-avatar {
                display: none;
            }

            .completed-banner .time-result {
                font-size: 28px;
            }
        }

        @media (max-width: 576px) {
            .detail-stats-row {
                grid-template-columns: 1fr;
            }

            .timer-display {
                font-size: 40px;
                letter-spacing: 2px;
            }

            .btn-task {
                padding: 10px 18px;
                font-size: 13px;
            }
        }

        /* ── Custom Scrollbar ── */
        .table-responsive::-webkit-scrollbar {
            height: 6px;
        }

        .table-responsive::-webkit-scrollbar-track {
            background: var(--gray-100);
            border-radius: 3px;
        }

        .table-responsive::-webkit-scrollbar-thumb {
            background: var(--gray-300);
            border-radius: 3px;
        }

        .table-responsive::-webkit-scrollbar-thumb:hover {
            background: var(--gray-400);
        }

        /* ── SweetAlert2 ── */
        .swal2-popup {
            border-radius: 20px !important;
            font-family: 'Inter', sans-serif !important;
        }

        .swal2-title {
            font-weight: 700 !important;
        }

        .swal2-html-container {
            font-size: 14px !important;
            color: var(--gray-600) !important;
        }
    </style>
</head>

<body>

    <!-- ── Flash Error Alert ── -->
    <?php if ($this->session->flashdata('error')): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Task Already Running',
                    text: <?= json_encode($this->session->flashdata('error')) ?>,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#4f46e5'
                });
            });
        </script>
    <?php endif; ?>

    <div class="page-wrapper">
        <div class="page-content">

            <!-- ══════════════════════════════
                 BACK NAVIGATION
                 ══════════════════════════════ -->
            <nav class="back-nav" aria-label="Breadcrumb">
                <a href="<?= site_url('task') ?>">
                    <i class="fas fa-arrow-left fa-sm"></i>
                    Back to My Tasks
                </a>
            </nav>

            <!-- ══════════════════════════════
                 TASK HEADER CARD
                 ══════════════════════════════ -->
            <div class="task-header-card">
                <div class="task-header-inner">
                    <div class="task-header-left">
                        <div class="task-meta-row">
                            <span class="task-id-badge">
                                <i class="fas fa-hashtag fa-xs" aria-hidden="true"></i>
                                TASK-<?= $taskNum ?>
                            </span>
                            <span class="status-badge <?= $statusInfo['class'] ?>">
                                <span class="pulse-dot" aria-hidden="true"></span>
                                <?= $statusInfo['label'] ?>
                            </span>
                        </div>
                        <h1><?= htmlspecialchars($task->title) ?></h1>
                        <div class="project-tag">
                            <span class="dot" aria-hidden="true"></span>
                            <?= htmlspecialchars($task->project_name ?? 'No Project') ?>
                        </div>
                    </div>

                    <div class="task-header-right">
                        <?php if ($isInProgress): ?>
                            <a href="<?= site_url('task/stop/' . (int) $task->id) ?>" class="btn-task btn-stop"
                                aria-label="Pause current task session">
                                <i class="fas fa-pause" aria-hidden="true"></i>
                                Stop
                            </a>
                            <a href="<?= site_url('task/complete/' . (int) $task->id) ?>" class="btn-task btn-complete"
                                onclick="return confirmComplete(event)" aria-label="Mark task as completed">
                                <i class="fas fa-check" aria-hidden="true"></i>
                                Complete
                            </a>
                        <?php elseif ($isPending): ?>
                            <a href="<?= site_url('task/start/' . (int) $task->id) ?>" class="btn-task btn-start"
                                aria-label="Start working on this task">
                                <i class="fas fa-play" aria-hidden="true"></i>
                                Start Task
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- ══════════════════════════════
                 STATS ROW
                 ══════════════════════════════ -->
            <div class="detail-stats-row">
                <div class="detail-stat-card sessions">
                    <div class="stat-icon" aria-hidden="true">
                        <i class="fas fa-history"></i>
                    </div>
                    <div class="stat-value"><?= count($logs ?? []) ?></div>
                    <div class="stat-label">Total Sessions</div>
                </div>
                <div class="detail-stat-card total-time">
                    <div class="stat-icon" aria-hidden="true">
                        <i class="fas fa-hourglass-half"></i>
                    </div>
                    <div class="stat-value">
                        <?php if ($workedH > 0): ?>
                            <?= $workedH ?>h <?= $workedM ?>m
                        <?php else: ?>
                            <?= $workedM ?>m <?= $workedS ?>s
                        <?php endif; ?>
                    </div>
                    <div class="stat-label">Logged Time</div>
                </div>
                <div class="detail-stat-card current">
                    <div class="stat-icon" aria-hidden="true">
                        <?php if ($isInProgress): ?>
                            <i class="fas fa-bolt"></i>
                        <?php elseif ($isCompleted): ?>
                            <i class="fas fa-trophy"></i>
                        <?php else: ?>
                            <i class="fas fa-hourglass-start"></i>
                        <?php endif; ?>
                    </div>
                    <div class="stat-value">
                        <?php if ($isInProgress): ?>
                            Live
                        <?php elseif ($isCompleted): ?>
                            Done
                        <?php else: ?>
                            Ready
                        <?php endif; ?>
                    </div>
                    <div class="stat-label">
                        <?php if ($isInProgress): ?>
                            Currently Running
                        <?php elseif ($isCompleted): ?>
                            Task Finished
                        <?php else: ?>
                            Not Started
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- ══════════════════════════════
                 TIMER (Pending / In-Progress)
                 ══════════════════════════════ -->
            <?php if (!$isCompleted): ?>
                <div class="timer-section">
                    <div class="timer-card">
                        <div class="timer-label">
                            <?php if ($isInProgress): ?>
                                <span class="live-dot" aria-hidden="true"></span>
                                Live Session
                            <?php else: ?>
                                <span class="idle-dot" aria-hidden="true"></span>
                                Session Timer
                            <?php endif; ?>
                        </div>
                        <div class="timer-display <?= $isInProgress ? 'timer-active' : '' ?>" id="timerDisplay" role="timer"
                            aria-live="polite" aria-label="Task timer">
                            <span id="hours">00</span><span class="colon">:</span><span id="minutes">00</span><span
                                class="colon">:</span><span id="seconds">00</span>
                        </div>
                        <div class="timer-subtitle">
                            <?php if ($isInProgress && $activeLog): ?>
                                Session started at
                                <span><?= date('h:i A', strtotime($activeLog->start_time)) ?></span>
                            <?php elseif ($isPending): ?>
                                Press <span>Start Task</span> to begin tracking
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- ══════════════════════════════
                 COMPLETED BANNER
                 ══════════════════════════════ -->
            <?php if ($isCompleted): ?>
                <div class="completed-banner">
                    <div class="trophy-icon">🎉</div>
                    <h3>Task Completed!</h3>
                    <p>Great work — here's how long it took</p>
                    <div class="time-result">
                        <?php if ($workedH > 0): ?>
                            <?= $workedH ?> <small>hr</small>
                            <?= $workedM ?> <small>min</small>
                        <?php else: ?>
                            <?= $workedM ?> <small>min</small>
                            <?= $workedS ?> <small>sec</small>
                        <?php endif; ?>
                    </div>
                    <p>across <?= count($logs ?? []) ?> session<?= count($logs ?? []) !== 1 ? 's' : '' ?></p>
                </div>
            <?php endif; ?>

            <!-- ══════════════════════════════
                 WORK LOGS TABLE
                 ══════════════════════════════ -->
            <div class="logs-card">
                <div class="logs-card-header">
                    <div class="title-group">
                        <h2>Work Sessions</h2>
                        <span class="log-count">
                            <?= count($logs ?? []) ?> session<?= count($logs ?? []) !== 1 ? 's' : '' ?>
                        </span>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="logs-table" aria-label="Work session logs">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($logs)):
                                $sessionNum = 1;
                                foreach ($logs as $i => $log):
                                    $isActive = empty($log->end_time);
                                    $sec = 0;
                                    if (!$isActive) {
                                        $sec = strtotime($log->end_time) - strtotime($log->start_time);
                                    }
                                    $lh = floor($sec / 3600);
                                    $lm = floor(($sec % 3600) / 60);
                                    $ls = $sec % 60;

                                    $userName = $log->user_name ?? '-';
                                    $userInitial = strtoupper(mb_substr($userName, 0, 1));
                                    ?>
                                    <tr class="fade-in-row <?= $isActive ? 'active-row' : '' ?>"
                                        style="animation-delay: <?= $i * 0.06 ?>s">

                                        <!-- # -->
                                        <td>
                                            <span class="session-num <?= $isActive ? 'active' : '' ?>">
                                                <?= $sessionNum++ ?>
                                            </span>
                                        </td>

                                        <!-- USER -->
                                        <td>
                                            <div class="user-cell">
                                                <div class="user-avatar" aria-hidden="true">
                                                    <?= htmlspecialchars($userInitial) ?>
                                                </div>
                                                <span class="user-name">
                                                    <?= htmlspecialchars($userName) ?>
                                                </span>
                                            </div>
                                        </td>

                                        <!-- START -->
                                        <td class="time-cell">
                                            <div class="date-part">
                                                <?= date('d M Y', strtotime($log->start_time)) ?>
                                            </div>
                                            <div class="time-part">
                                                <?= date('h:i:s A', strtotime($log->start_time)) ?>
                                            </div>
                                        </td>

                                        <!-- END -->
                                        <td class="time-cell">
                                            <?php if ($isActive): ?>
                                                <span class="duration-badge running">
                                                    <span class="pulse-sm" aria-hidden="true"></span>
                                                    Running…
                                                </span>
                                            <?php else: ?>
                                                <div class="date-part">
                                                    <?= date('d M Y', strtotime($log->end_time)) ?>
                                                </div>
                                                <div class="time-part">
                                                    <?= date('h:i:s A', strtotime($log->end_time)) ?>
                                                </div>
                                            <?php endif; ?>
                                        </td>

                                        <!-- DURATION -->
                                        <td>
                                            <?php if ($isActive): ?>
                                                <span class="duration-badge running">
                                                    <i class="fas fa-circle-notch fa-spin fa-xs" aria-hidden="true"></i>
                                                    In progress
                                                </span>
                                            <?php elseif ($sec > 0): ?>
                                                <span class="duration-badge has-time">
                                                    <i class="fas fa-clock fa-xs" aria-hidden="true"></i>
                                                    <?= "{$lh}h {$lm}m {$ls}s" ?>
                                                </span>
                                            <?php else: ?>
                                                <span class="duration-badge no-time">0s</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            else: ?>
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-logs">
                                            <div class="empty-icon" aria-hidden="true">
                                                <i class="fas fa-stopwatch"></i>
                                            </div>
                                            <h4>No Sessions Yet</h4>
                                            <p>Work sessions will appear here once you start the task.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if (!empty($logs)): ?>
                    <div class="logs-card-footer">
                        <span class="total-label">
                            <i class="fas fa-sigma fa-sm" aria-hidden="true"></i>
                            Total Logged Time
                        </span>
                        <span class="total-value">
                            <?= "{$workedH}h {$workedM}m {$workedS}s" ?>
                        </span>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <!-- ═══════════════════════════════════════════
         SCRIPTS
         ═══════════════════════════════════════════ -->
    <script>
        (function () {
            'use strict';

            const $ = id => document.getElementById(id);

            const elH = $('hours');
            const elM = $('minutes');
            const elS = $('seconds');
            const display = $('timerDisplay');

            if (!elH || !elM || !elS) return;

            /* ── Base seconds from completed logs ── */
            let totalSeconds = <?= (int) $totalSeconds ?>;

            /* ── Add elapsed time from the active session ── */
            <?php if ($isInProgress && $activeLog): ?>
                const sessionStart = <?= (int) strtotime($activeLog->start_time) ?>;
                const serverNow = Math.floor(Date.now() / 1000);
                totalSeconds += Math.max(0, serverNow - sessionStart);
            <?php endif; ?>

            /* ── Render ── */
            function render(sec) {
                const t = Math.max(0, sec);
                elH.textContent = String(Math.floor(t / 3600)).padStart(2, '0');
                elM.textContent = String(Math.floor((t % 3600) / 60)).padStart(2, '0');
                elS.textContent = String(t % 60).padStart(2, '0');
            }

            render(totalSeconds);

            /* ── Tick (only when in-progress) ── */
            <?php if ($isInProgress): ?>
                let timer = setInterval(function () {
                    totalSeconds++;
                    render(totalSeconds);
                }, 1000);

                /* Update page title with timer */
                setInterval(function () {
                    const h = String(Math.floor(totalSeconds / 3600)).padStart(2, '0');
                    const m = String(Math.floor((totalSeconds % 3600) / 60)).padStart(2, '0');
                    const s = String(totalSeconds % 60).padStart(2, '0');
                    document.title = `⏱ ${h}:${m}:${s} — <?= addslashes(htmlspecialchars($task->title)) ?>`;
                }, 1000);
            <?php endif; ?>
        })();

        /* ── Confirm Complete ── */
        function confirmComplete(e) {
            e.preventDefault();
            const href = e.currentTarget.href;

            Swal.fire({
                title: 'Complete this task?',
                html: 'This will <strong>mark the task as finished</strong> and stop all tracking.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-check"></i> Yes, Complete',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#4f46e5',
                cancelButtonColor: '#6b7280',
                reverseButtons: true
            }).then(function (result) {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });

            return false;
        }
    </script>

</body>

</html>