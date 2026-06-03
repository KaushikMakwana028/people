<?php
$startDatetime = !empty($task->start_time)
    ? date('Y-m-d\TH:i', strtotime($task->start_time))
    : '';
$dueDate = $task->due_date ?? '';
$dueTime = $task->due_time ?? '';
?>

<style>
    /* ===================== BASE ===================== */
    .task-edit-wrapper {
        min-height: 100vh;
        background: linear-gradient(160deg, #f0f2f9 0%, #f8f9fc 50%, #eef0f7 100%);
    }

    /* ============== PAGE HEADER ============== */
    .task-page-header {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
        border-radius: 18px;
        padding: 2rem 2.25rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(78, 84, 200, 0.25);
    }

    .task-page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -8%;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        pointer-events: none;
    }

    .task-page-header::after {
        content: '';
        position: absolute;
        bottom: -55%;
        left: 8%;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.04);
        pointer-events: none;
    }

    .header-breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.45rem;
        margin-bottom: 0.6rem;
        position: relative;
        z-index: 2;
    }

    .header-breadcrumb a,
    .header-breadcrumb span {
        font-size: 0.78rem;
        color: rgba(255, 255, 255, 0.55);
        text-decoration: none;
        transition: color 0.2s;
    }

    .header-breadcrumb a:hover {
        color: #fff;
    }

    .header-breadcrumb .bc-sep {
        font-size: 0.65rem;
    }

    .header-breadcrumb .bc-current {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 600;
    }

    .task-page-header h4 {
        color: #fff;
        font-size: 1.45rem;
        font-weight: 700;
        letter-spacing: -0.3px;
        margin-bottom: 0.15rem;
        position: relative;
        z-index: 2;
    }

    .task-page-header .header-sub {
        color: rgba(255, 255, 255, 0.65);
        font-size: 0.85rem;
        position: relative;
        z-index: 2;
    }

    .btn-header-back {
        background: rgba(255, 255, 255, 0.14);
        backdrop-filter: blur(12px);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 0.5rem 1.3rem;
        border-radius: 50px;
        font-size: 0.84rem;
        font-weight: 500;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        position: relative;
        z-index: 2;
    }

    .btn-header-back:hover {
        background: rgba(255, 255, 255, 0.24);
        color: #fff;
        transform: translateX(-3px);
    }

    /* ============== FORM CARD ============== */
    .task-form-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 45px rgba(0, 0, 0, 0.06),
                    0 2px 12px rgba(0, 0, 0, 0.03);
        overflow: hidden;
        background: #fff;
        animation: formSlideUp 0.55s ease forwards;
    }

    @keyframes formSlideUp {
        from { opacity: 0; transform: translateY(24px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .task-form-card .card-body {
        padding: 2.5rem;
    }

    /* Card Top Banner */
    .form-card-banner {
        text-align: center;
        margin-bottom: 2.25rem;
        padding-bottom: 2rem;
        border-bottom: 1px solid #f0f1f5;
        position: relative;
    }

    .form-card-banner .banner-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: linear-gradient(135deg, rgba(78, 84, 200, 0.1), rgba(143, 148, 251, 0.12));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: #4e54c8;
        position: relative;
    }

    .form-card-banner .banner-icon::after {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 20px;
        border: 2px dashed rgba(78, 84, 200, 0.15);
    }

    .form-card-banner h5 {
        font-size: 1.2rem;
        font-weight: 700;
        color: #1e1e2d;
        margin-bottom: 0.3rem;
    }

    .form-card-banner p {
        font-size: 0.82rem;
        color: #9ca3af;
        margin: 0;
    }

    .form-card-banner .task-id-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        margin-top: 0.75rem;
        padding: 0.3rem 0.9rem;
        background: #f5f6fa;
        border-radius: 50px;
        font-size: 0.72rem;
        font-weight: 600;
        color: #6b7280;
    }

    .form-card-banner .task-id-badge i {
        color: #4e54c8;
    }

    /* ============== SECTION HEADERS ============== */
    .section-heading {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        margin-bottom: 0.3rem;
    }

    .section-heading .sec-icon {
        width: 30px;
        height: 30px;
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    .section-heading .sec-icon.blue   { background: rgba(78, 84, 200, 0.1);  color: #4e54c8; }
    .section-heading .sec-icon.green  { background: rgba(16, 185, 129, 0.1); color: #10b981; }
    .section-heading .sec-icon.amber  { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
    .section-heading .sec-icon.rose   { background: rgba(244, 63, 94, 0.1);  color: #f43f5e; }

    .section-heading h6 {
        font-size: 0.95rem;
        font-weight: 700;
        color: #1e1e2d;
        margin: 0;
    }

    .section-sub {
        font-size: 0.76rem;
        color: #a1a5b0;
        margin-bottom: 1.25rem;
        padding-left: 2.85rem;
    }

    .section-divider {
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, #ebebf0, transparent);
        margin: 1.75rem 0;
    }

    /* ============== FIELD GROUPS ============== */
    .field-group {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .field-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.45rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .field-label .lbl-icon {
        color: #a1a5b0;
        font-size: 1rem;
    }

    .field-label .req {
        width: 6px;
        height: 6px;
        background: #ef4444;
        border-radius: 50%;
        display: inline-block;
    }

    .field-label .opt-tag {
        font-size: 0.62rem;
        padding: 0.1rem 0.5rem;
        background: #f3f4f6;
        color: #9ca3af;
        border-radius: 20px;
        font-weight: 500;
        margin-left: 0.15rem;
    }

    /* Input Wrapper for icon */
    .input-wrap {
        position: relative;
    }

    .input-wrap .iw-icon {
        position: absolute;
        left: 0.95rem;
        top: 50%;
        transform: translateY(-50%);
        color: #b0b5c0;
        font-size: 1.1rem;
        transition: color 0.3s;
        z-index: 3;
        pointer-events: none;
    }

    .input-wrap textarea ~ .iw-icon {
        top: 1rem;
        transform: none;
    }

    .input-wrap .f-input {
        border: 2px solid #e8eaef;
        border-radius: 12px;
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        font-size: 0.88rem;
        background: #fafbfd;
        color: #1e1e2d;
        transition: all 0.3s ease;
        width: 100%;
        appearance: none;
    }

    .input-wrap select.f-input {
        cursor: pointer;
        padding-right: 2.5rem;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%239ca3af' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
    }

    textarea.f-input {
        resize: vertical;
        min-height: 60px;
        line-height: 1.6;
    }

    .f-input::placeholder {
        color: #c0c4cd;
    }

    .f-input:focus {
        border-color: #4e54c8;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(78, 84, 200, 0.08);
        outline: none;
    }

    .f-input:hover:not(:focus) {
        border-color: #d0d3db;
    }

    .input-wrap .f-input:focus ~ .iw-icon {
        color: #4e54c8;
    }

    .field-hint {
        font-size: 0.7rem;
        color: #b0b5c0;
        margin-top: 0.35rem;
        padding-left: 0.2rem;
    }

    /* ============== PRIORITY CARDS ============== */
    .priority-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75rem;
    }

    .priority-card input[type="radio"] { display: none; }

    .priority-card label {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.4rem;
        padding: 0.9rem 0.5rem;
        border: 2px solid #e8eaef;
        border-radius: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #fafbfd;
        text-align: center;
    }

    .priority-card label:hover {
        border-color: #d0d3db;
        background: #fff;
    }

    .priority-card label .pr-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        background: #f3f4f6;
        color: #9ca3af;
        transition: all 0.3s;
    }

    .priority-card label .pr-text {
        font-size: 0.78rem;
        font-weight: 600;
        color: #6b7280;
        transition: color 0.3s;
    }

    /* Low */
    .priority-card.pr-low input:checked + label {
        border-color: #10b981;
        background: rgba(16, 185, 129, 0.04);
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.12);
    }
    .priority-card.pr-low input:checked + label .pr-icon {
        background: rgba(16, 185, 129, 0.15);
        color: #10b981;
    }
    .priority-card.pr-low input:checked + label .pr-text { color: #10b981; }

    /* Medium */
    .priority-card.pr-med input:checked + label {
        border-color: #f59e0b;
        background: rgba(245, 158, 11, 0.04);
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.12);
    }
    .priority-card.pr-med input:checked + label .pr-icon {
        background: rgba(245, 158, 11, 0.15);
        color: #f59e0b;
    }
    .priority-card.pr-med input:checked + label .pr-text { color: #f59e0b; }

    /* High */
    .priority-card.pr-high input:checked + label {
        border-color: #ef4444;
        background: rgba(239, 68, 68, 0.04);
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.12);
    }
    .priority-card.pr-high input:checked + label .pr-icon {
        background: rgba(239, 68, 68, 0.15);
        color: #ef4444;
    }
    .priority-card.pr-high input:checked + label .pr-text { color: #ef4444; }

    /* ============== STATUS PILLS ============== */
    .status-row {
        display: flex;
        gap: 0.65rem;
        flex-wrap: wrap;
    }

    .status-pill input[type="radio"] { display: none; }

    .status-pill label {
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        padding: 0.55rem 1.15rem;
        border: 2px solid #e8eaef;
        border-radius: 50px;
        cursor: pointer;
        font-size: 0.8rem;
        font-weight: 600;
        transition: all 0.3s;
        background: #fafbfd;
        color: #6b7280;
    }

    .status-pill label:hover {
        border-color: #d0d3db;
        background: #fff;
    }

    .status-pill label .s-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #d1d5db;
        transition: all 0.3s;
    }

    .status-pill.st-pending input:checked + label {
        border-color: #f59e0b;
        background: rgba(245, 158, 11, 0.05);
        color: #d97706;
    }
    .status-pill.st-pending input:checked + label .s-dot {
        background: #f59e0b;
        box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
    }

    .status-pill.st-completed input:checked + label {
        border-color: #10b981;
        background: rgba(16, 185, 129, 0.05);
        color: #059669;
    }
    .status-pill.st-completed input:checked + label .s-dot {
        background: #10b981;
        box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
    }

    /* ============== DATE / TIME GRID ============== */
    .datetime-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .datetime-grid.single {
        grid-template-columns: 1fr;
    }

    /* ============== SIDE PANEL ============== */
    .side-panel {
        position: sticky;
        top: 2rem;
    }

    .side-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        margin-bottom: 1.25rem;
        background: #fff;
        animation: formSlideUp 0.55s ease forwards;
    }

    .side-card .card-body {
        padding: 1.25rem;
    }

    .side-card .sc-title {
        font-size: 0.85rem;
        font-weight: 700;
        color: #374151;
        margin-bottom: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    /* Summary Items */
    .summary-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.55rem 0;
        border-bottom: 1px solid #f5f6f8;
    }

    .summary-item:last-child {
        border-bottom: none;
    }

    .summary-item .si-label {
        font-size: 0.78rem;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }

    .summary-item .si-label i {
        font-size: 0.95rem;
        color: #a1a5b0;
    }

    .summary-item .si-value {
        font-size: 0.82rem;
        font-weight: 600;
        color: #1e1e2d;
    }

    .si-badge {
        padding: 0.2rem 0.65rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .si-badge.pending   { background: rgba(245, 158, 11, 0.1); color: #d97706; }
    .si-badge.completed { background: rgba(16, 185, 129, 0.1); color: #059669; }
    .si-badge.low       { background: rgba(16, 185, 129, 0.1); color: #10b981; }
    .si-badge.medium    { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
    .si-badge.high      { background: rgba(239, 68, 68, 0.1);  color: #ef4444; }

    /* Tip Items */
    .tip-row {
        display: flex;
        gap: 0.6rem;
        padding: 0.45rem 0;
    }

    .tip-row .tip-ic {
        width: 22px;
        height: 22px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.65rem;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .tip-row .tip-txt {
        font-size: 0.76rem;
        color: #6b7280;
        line-height: 1.5;
    }

    /* Shortcut Row */
    .shortcut-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.35rem 0;
    }

    .shortcut-row span {
        font-size: 0.76rem;
        color: #6b7280;
    }

    .shortcut-row kbd {
        font-size: 0.66rem;
        padding: 0.15rem 0.5rem;
        background: #f3f4f6;
        border-radius: 5px;
        color: #6b7280;
        font-family: inherit;
        font-weight: 600;
    }

    /* ============== FORM ACTIONS ============== */
    .form-action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1.75rem;
        margin-top: 0.5rem;
        border-top: 1px solid #f0f1f5;
    }

    .btn-act-cancel {
        padding: 0.65rem 1.5rem;
        border-radius: 12px;
        border: 2px solid #e8eaef;
        background: #fff;
        color: #6b7280;
        font-weight: 600;
        font-size: 0.84rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }

    .btn-act-cancel:hover {
        border-color: #d0d3db;
        background: #f9fafb;
        color: #374151;
    }

    .btn-act-submit {
        padding: 0.65rem 2rem;
        border-radius: 12px;
        border: none;
        background: linear-gradient(135deg, #4e54c8, #8f94fb);
        color: #fff;
        font-weight: 600;
        font-size: 0.88rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 18px rgba(78, 84, 200, 0.3);
        position: relative;
        overflow: hidden;
    }

    .btn-act-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        transition: left 0.5s;
    }

    .btn-act-submit:hover::before {
        left: 100%;
    }

    .btn-act-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 28px rgba(78, 84, 200, 0.4);
    }

    .btn-act-submit:active {
        transform: translateY(0);
    }

    .btn-act-submit .btn-spinner {
        display: none;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spin 0.6s linear infinite;
    }

    .btn-act-submit.loading .btn-spinner { display: inline-block; }
    .btn-act-submit.loading .btn-label  { display: none; }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* ============== RESPONSIVE ============== */
    @media (max-width: 992px) {
        .side-panel {
            position: static;
            margin-top: 1.5rem;
        }
    }

    @media (max-width: 768px) {
        .priority-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .datetime-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 576px) {
        .task-form-card .card-body {
            padding: 1.5rem;
        }

        .task-page-header {
            padding: 1.25rem 1.5rem;
            border-radius: 14px;
        }

        .task-page-header h4 {
            font-size: 1.15rem;
        }

        .form-action-bar {
            flex-direction: column-reverse;
            gap: 0.75rem;
        }

        .form-action-bar .btn-act-cancel,
        .form-action-bar .btn-act-submit {
            width: 100%;
            justify-content: center;
        }

        .priority-grid {
            grid-template-columns: 1fr 1fr 1fr;
            gap: 0.5rem;
        }

        .status-row {
            flex-direction: column;
        }
    }
</style>

<div class="page-wrapper task-edit-wrapper">
    <div class="page-content">

        <!-- =============== PAGE HEADER =============== -->
        <div class="task-page-header d-flex justify-content-between align-items-center">
            <div>
                <div class="header-breadcrumb">
                    <a href="<?= site_url('dashboard'); ?>">
                        <i class="bx bx-home-alt"></i> Dashboard
                    </a>
                    <span class="bc-sep"><i class="bx bx-chevron-right"></i></span>
                    <a href="<?= site_url('task'); ?>">Tasks</a>
                    <span class="bc-sep"><i class="bx bx-chevron-right"></i></span>
                    <span class="bc-current">Edit Task</span>
                </div>
                <h4>Edit Task</h4>
                <span class="header-sub">Update task information and assignments</span>
            </div>
            <a href="<?= site_url('task'); ?>" class="btn-header-back">
                <i class="bx bx-arrow-back"></i> Back to Tasks
            </a>
        </div>

        <!-- =============== MAIN CONTENT =============== -->
        <div class="row">

            <!-- LEFT — FORM -->
            <div class="col-lg-8 col-12">
                <div class="card task-form-card">
                    <div class="card-body">

                        <!-- Banner -->
                        <div class="form-card-banner">
                            <div class="banner-icon">
                                <i class="bx bx-edit-alt"></i>
                            </div>
                            <h5>Update Task Details</h5>
                            <p>Modify the fields below and save your changes</p>
                            <span class="task-id-badge">
                                <i class="bx bx-hash"></i> TASK-<?= str_pad($task->id, 4, '0', STR_PAD_LEFT); ?>
                            </span>
                        </div>

                        <form method="post"
                              action="<?= site_url('task/update/' . $task->id); ?>"
                              id="taskForm">

                            <!-- ====== SECTION 1: BASIC INFO ====== -->
                            <div class="section-heading">
                                <span class="sec-icon blue"><i class="bx bx-info-circle"></i></span>
                                <h6>Basic Information</h6>
                            </div>
                            <p class="section-sub">Core details about this task</p>

                            <!-- Title -->
                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-text lbl-icon"></i>
                                    Task Title
                                    <span class="req"></span>
                                </label>
                                <div class="input-wrap">
                                    <i class="bx bx-task iw-icon"></i>
                                    <input type="text"
                                           name="title"
                                           class="f-input"
                                           placeholder="Enter task title"
                                           required
                                           id="taskTitle"
                                           value="<?= htmlspecialchars($task->title); ?>">
                                </div>
                                <div class="field-hint">Use a clear, actionable task name</div>
                            </div>

                            <!-- Project -->
                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-folder lbl-icon"></i>
                                    Project
                                    <span class="req"></span>
                                </label>
                                <div class="input-wrap">
                                    <i class="bx bx-briefcase iw-icon"></i>
                                    <select name="project_id" class="f-input" id="taskProject">
                                        <?php foreach ($projects as $p): ?>
                                            <option value="<?= $p->id; ?>"
                                                <?= $p->id == $task->project_id ? 'selected' : ''; ?>>
                                                <?= htmlspecialchars($p->project_name); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Assign To -->
                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-user lbl-icon"></i>
                                    Assign To
                                    <span class="req"></span>
                                </label>
                                <div class="input-wrap">
                                    <i class="bx bx-user-circle iw-icon"></i>
                                    <select name="user_id" class="f-input" id="taskUser">
                                        <?php foreach ($users as $u): ?>
                                            <option value="<?= $u->id; ?>"
                                                <?= $u->id == $task->assigned_to ? 'selected' : ''; ?>>
                                                <?= htmlspecialchars($u->name); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <hr class="section-divider">

                            <!-- ====== SECTION 2: PRIORITY & STATUS ====== -->
                            <div class="section-heading">
                                <span class="sec-icon amber"><i class="bx bx-flag"></i></span>
                                <h6>Priority & Status</h6>
                            </div>
                            <p class="section-sub">Set urgency and current progress</p>

                            <!-- Priority -->
                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-flag lbl-icon"></i>
                                    Priority Level
                                </label>
                                <div class="priority-grid">
                                    <div class="priority-card pr-low">
                                        <input type="radio" name="priority" value="low"
                                               id="prLow"
                                               <?= $task->priority == 'low' ? 'checked' : ''; ?>>
                                        <label for="prLow">
                                            <span class="pr-icon"><i class="bx bx-down-arrow-alt"></i></span>
                                            <span class="pr-text">Low</span>
                                        </label>
                                    </div>
                                    <div class="priority-card pr-med">
                                        <input type="radio" name="priority" value="medium"
                                               id="prMed"
                                               <?= $task->priority == 'medium' ? 'checked' : ''; ?>>
                                        <label for="prMed">
                                            <span class="pr-icon"><i class="bx bx-minus"></i></span>
                                            <span class="pr-text">Medium</span>
                                        </label>
                                    </div>
                                    <div class="priority-card pr-high">
                                        <input type="radio" name="priority" value="high"
                                               id="prHigh"
                                               <?= $task->priority == 'high' ? 'checked' : ''; ?>>
                                        <label for="prHigh">
                                            <span class="pr-icon"><i class="bx bx-up-arrow-alt"></i></span>
                                            <span class="pr-text">High</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Status -->
                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-loader-circle lbl-icon"></i>
                                    Status
                                </label>
                                <div class="status-row">
                                    <div class="status-pill st-pending">
                                        <input type="radio" name="status" value="pending"
                                               id="stPend"
                                               <?= $task->status == 'pending' ? 'checked' : ''; ?>>
                                        <label for="stPend">
                                            <span class="s-dot"></span> Pending
                                        </label>
                                    </div>
                                    <div class="status-pill st-completed">
                                        <input type="radio" name="status" value="completed"
                                               id="stComp"
                                               <?= $task->status == 'completed' ? 'checked' : ''; ?>>
                                        <label for="stComp">
                                            <span class="s-dot"></span> Completed
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr class="section-divider">

                            <!-- ====== SECTION 3: SCHEDULE ====== -->
                            <div class="section-heading">
                                <span class="sec-icon green"><i class="bx bx-calendar"></i></span>
                                <h6>Schedule & Timeline</h6>
                            </div>
                            <p class="section-sub">Define when this task starts and ends</p>

                            <!-- Start Date & Time -->
                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-play-circle lbl-icon"></i>
                                    Start Date & Time
                                    <span class="opt-tag">Optional</span>
                                </label>
                                <div class="input-wrap">
                                    <i class="bx bx-calendar-event iw-icon"></i>
                                    <input type="datetime-local"
                                           name="start_time"
                                           class="f-input"
                                           id="startTime"
                                           value="<?= $startDatetime; ?>">
                                </div>
                            </div>

                            <!-- Due Date + Time -->
                            <div class="datetime-grid">
                                <div class="field-group mb-0">
                                    <label class="field-label">
                                        <i class="bx bx-calendar-check lbl-icon"></i>
                                        Due Date
                                        <span class="opt-tag">Optional</span>
                                    </label>
                                    <div class="input-wrap">
                                        <i class="bx bx-calendar iw-icon"></i>
                                        <input type="date"
                                               name="due_date"
                                               class="f-input"
                                               id="dueDate"
                                               value="<?= $dueDate; ?>">
                                    </div>
                                </div>

                                <div class="field-group mb-0">
                                    <label class="field-label">
                                        <i class="bx bx-time-five lbl-icon"></i>
                                        Due Time
                                        <span class="opt-tag">Optional</span>
                                    </label>
                                    <div class="input-wrap">
                                        <i class="bx bx-time iw-icon"></i>
                                        <input type="time"
                                               name="due_time"
                                               class="f-input"
                                               id="dueTime"
                                               value="<?= $dueTime; ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Duration Badge -->
                            <div class="text-center mt-3">
                                <span id="durationBadge"
                                      class="si-badge pending"
                                      style="font-size:0.74rem; padding:0.35rem 1rem; border-radius:20px;">
                                    <i class="bx bx-time-five"></i> Set dates to see duration
                                </span>
                            </div>

                            <!-- ====== ACTION BAR ====== -->
                            <div class="form-action-bar">
                                <a href="<?= site_url('task/list'); ?>" class="btn-act-cancel">
                                    <i class="bx bx-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn-act-submit" id="submitBtn">
                                    <span class="btn-spinner"></span>
                                    <span class="btn-label">
                                        <i class="bx bx-check-circle"></i> Update Task
                                    </span>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- RIGHT — SIDE PANEL -->
            <div class="col-lg-4 col-12">
                <div class="side-panel">

                    <!-- Live Summary -->
                    <div class="card side-card" style="animation-delay:0.1s;">
                        <div class="card-body">
                            <div class="sc-title">
                                <i class="bx bx-list-check" style="color:#4e54c8;"></i>
                                Live Summary
                            </div>

                            <div class="summary-item">
                                <span class="si-label">
                                    <i class="bx bx-hash"></i> Task ID
                                </span>
                                <span class="si-value">#<?= str_pad($task->id, 4, '0', STR_PAD_LEFT); ?></span>
                            </div>

                            <div class="summary-item">
                                <span class="si-label">
                                    <i class="bx bx-text"></i> Title
                                </span>
                                <span class="si-value" id="sumTitle"
                                      style="max-width:140px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                    <?= htmlspecialchars($task->title); ?>
                                </span>
                            </div>

                            <div class="summary-item">
                                <span class="si-label">
                                    <i class="bx bx-flag"></i> Priority
                                </span>
                                <span class="si-badge <?= $task->priority; ?>" id="sumPriority">
                                    <?= ucfirst($task->priority); ?>
                                </span>
                            </div>

                            <div class="summary-item">
                                <span class="si-label">
                                    <i class="bx bx-loader-circle"></i> Status
                                </span>
                                <span class="si-badge <?= $task->status; ?>" id="sumStatus">
                                    <?= ucfirst($task->status); ?>
                                </span>
                            </div>

                            <div class="summary-item">
                                <span class="si-label">
                                    <i class="bx bx-user"></i> Assigned
                                </span>
                                <span class="si-value" id="sumUser">
                                    <?php
                                    foreach ($users as $u) {
                                        if ($u->id == $task->assigned_to) {
                                            echo htmlspecialchars($u->name);
                                            break;
                                        }
                                    }
                                    ?>
                                </span>
                            </div>

                            <div class="summary-item">
                                <span class="si-label">
                                    <i class="bx bx-folder"></i> Project
                                </span>
                                <span class="si-value" id="sumProject"
                                      style="max-width:140px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                    <?php
                                    foreach ($projects as $p) {
                                        if ($p->id == $task->project_id) {
                                            echo htmlspecialchars($p->project_name);
                                            break;
                                        }
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Tips -->
                    <div class="card side-card" style="animation-delay:0.2s;">
                        <div class="card-body">
                            <div class="sc-title">
                                <i class="bx bx-bulb" style="color:#f59e0b;"></i>
                                Quick Tips
                            </div>

                            <div class="tip-row">
                                <div class="tip-ic" style="background:rgba(16,185,129,0.1); color:#10b981;">
                                    <i class="bx bx-check"></i>
                                </div>
                                <div class="tip-txt">
                                    Use clear, actionable titles like "Design homepage banner" instead of vague names.
                                </div>
                            </div>

                            <div class="tip-row">
                                <div class="tip-ic" style="background:rgba(59,130,246,0.1); color:#3b82f6;">
                                    <i class="bx bx-check"></i>
                                </div>
                                <div class="tip-txt">
                                    Set realistic due dates with some buffer for review and revisions.
                                </div>
                            </div>

                            <div class="tip-row">
                                <div class="tip-ic" style="background:rgba(139,92,246,0.1); color:#8b5cf6;">
                                    <i class="bx bx-check"></i>
                                </div>
                                <div class="tip-txt">
                                    Only mark tasks as "High" priority when they truly block other work.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shortcuts -->
                    <div class="card side-card" style="animation-delay:0.3s;">
                        <div class="card-body">
                            <div class="sc-title">
                                <i class="bx bx-keyboard" style="color:#6366f1;"></i>
                                Shortcuts
                            </div>
                            <div class="shortcut-row">
                                <span>Save Changes</span>
                                <kbd>Ctrl + Enter</kbd>
                            </div>
                            <div class="shortcut-row">
                                <span>Cancel</span>
                                <kbd>Escape</kbd>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<!-- =============== JAVASCRIPT =============== -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ---- Live Summary Updates ----
    const titleInput   = document.getElementById('taskTitle');
    const projectSel   = document.getElementById('taskProject');
    const userSel      = document.getElementById('taskUser');
    const sumTitle     = document.getElementById('sumTitle');
    const sumProject   = document.getElementById('sumProject');
    const sumUser      = document.getElementById('sumUser');
    const sumPriority  = document.getElementById('sumPriority');
    const sumStatus    = document.getElementById('sumStatus');

    titleInput.addEventListener('input', () => {
        sumTitle.textContent = titleInput.value || '—';
    });

    projectSel.addEventListener('change', () => {
        sumProject.textContent = projectSel.options[projectSel.selectedIndex].text;
    });

    userSel.addEventListener('change', () => {
        sumUser.textContent = userSel.options[userSel.selectedIndex].text;
    });

    // Priority
    document.querySelectorAll('input[name="priority"]').forEach(radio => {
        radio.addEventListener('change', function () {
            sumPriority.textContent = this.value.charAt(0).toUpperCase() + this.value.slice(1);
            sumPriority.className = 'si-badge ' + this.value;
        });
    });

    // Status
    document.querySelectorAll('input[name="status"]').forEach(radio => {
        radio.addEventListener('change', function () {
            sumStatus.textContent = this.value.charAt(0).toUpperCase() + this.value.slice(1);
            sumStatus.className = 'si-badge ' + this.value;
        });
    });

    // ---- Duration Calculator ----
    const startTime    = document.getElementById('startTime');
    const dueDate      = document.getElementById('dueDate');
    const dueTime      = document.getElementById('dueTime');
    const durationBadge = document.getElementById('durationBadge');

    function calcDuration() {
        if (!startTime.value || !dueDate.value) {
            durationBadge.innerHTML = '<i class="bx bx-time-five"></i> Set dates to see duration';
            durationBadge.className = 'si-badge pending';
            return;
        }

        const start = new Date(startTime.value);
        const endStr = dueDate.value + 'T' + (dueTime.value || '23:59');
        const end   = new Date(endStr);
        const diff  = end - start;

        if (diff < 0) {
            durationBadge.innerHTML = '<i class="bx bx-error-circle"></i> Due date is before start';
            durationBadge.className = 'si-badge high';
            return;
        }

        const days  = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

        let text = '';
        if (days > 0) text += days + 'd ';
        if (hours > 0) text += hours + 'h';
        if (!text) text = 'Less than 1 hour';

        durationBadge.innerHTML = '<i class="bx bx-time-five"></i> Duration: ' + text.trim();
        durationBadge.className = 'si-badge completed';
    }

    startTime.addEventListener('change', calcDuration);
    dueDate.addEventListener('change', calcDuration);
    dueTime.addEventListener('change', calcDuration);
    calcDuration();

    // ---- Submit Loading ----
    const form      = document.getElementById('taskForm');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', function () {
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
    });

    // ---- Keyboard Shortcuts ----
    document.addEventListener('keydown', function (e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            submitBtn.click();
        }
        if (e.key === 'Escape') {
            window.location.href = '<?= site_url("task/list"); ?>';
        }
    });
});
</script>