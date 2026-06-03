<style>
    /* ===================== BASE ===================== */
    .task-add-wrapper {
        min-height: 100vh;
        background: var(--bg-secondary);
    }

    /* Remove any container constraints for full width */
    .task-add-wrapper .page-content {
        padding: 1.25rem 1.5rem !important;
        max-width: 100% !important;
    }

    /* ============== PAGE HEADER ============== */
    .task-page-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 18px;
        padding: 1.5rem 2rem;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(99, 102, 241, 0.25);
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
        font-size: 1.4rem;
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

    /* ============== FLASH MESSAGES ============== */
    .flash-msg {
        border: none;
        border-radius: 14px;
        padding: 0.85rem 1.25rem;
        font-size: 0.85rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        margin-bottom: 1.5rem;
        animation: flashSlide 0.4s ease;
    }

    @keyframes flashSlide {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .flash-msg.success {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
        border-left: 4px solid #22c55e;
    }

    .flash-msg.error {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
        border-left: 4px solid #ef4444;
    }

    .flash-msg i {
        font-size: 1.2rem;
    }

    /* ============== MAIN LAYOUT - FULL WIDTH ============== */
    .task-main-grid {
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 1.5rem;
    }

    /* ============== FORM CARD ============== */
    .task-form-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 45px var(--shadow);
        overflow: hidden;
        background: var(--bg-primary);
        animation: formSlideUp 0.55s ease forwards;
    }

    @keyframes formSlideUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .task-form-card .card-body {
        padding: 2rem;
    }

    /* Card Banner */
    .form-card-banner {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--border-color);
    }

    .form-card-banner .banner-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(139, 92, 246, 0.12));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: var(--primary);
        position: relative;
    }

    .form-card-banner .banner-icon::after {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 20px;
        border: 2px dashed rgba(99, 102, 241, 0.15);
    }

    .form-card-banner h5 {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.3rem;
    }

    .form-card-banner p {
        font-size: 0.82rem;
        color: var(--text-secondary);
        margin: 0;
    }

    /* ============== SECTION HEADERS ============== */
    .section-heading {
        display: flex;
        align-items: center;
        gap: 0.55rem;
        margin-bottom: 0.3rem;
    }

    .section-heading .sec-icon {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .section-heading .sec-icon.blue {
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary);
    }

    .section-heading .sec-icon.green {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
    }

    .section-heading .sec-icon.amber {
        background: rgba(245, 158, 11, 0.1);
        color: #f59e0b;
    }

    .section-heading .sec-icon.purple {
        background: rgba(139, 92, 246, 0.1);
        color: #8b5cf6;
    }

    .section-heading h6 {
        font-size: 0.95rem;
        font-weight: 700;
        color: var(--text-primary);
        margin: 0;
    }

    .section-sub {
        font-size: 0.75rem;
        color: var(--text-secondary);
        margin-bottom: 1.25rem;
        padding-left: 2.7rem;
    }

    .section-divider {
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--border-color), transparent);
        margin: 1.5rem 0;
    }

    /* ============== FIELD GROUPS ============== */
    .field-group {
        margin-bottom: 1.25rem;
        position: relative;
    }

    .field-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: var(--text-secondary);
        margin-bottom: 0.45rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .field-label .lbl-icon {
        color: var(--text-tertiary);
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
        background: var(--bg-secondary);
        color: var(--text-tertiary);
        border-radius: 20px;
        font-weight: 500;
        margin-left: 0.15rem;
    }

    /* Input Wrapper */
    .input-wrap {
        position: relative;
    }

    .input-wrap .iw-icon {
        position: absolute;
        left: 0.95rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-tertiary);
        font-size: 1.1rem;
        transition: color 0.3s;
        z-index: 3;
        pointer-events: none;
    }

    .input-wrap textarea~.iw-icon {
        top: 1rem;
        transform: none;
    }

    .input-wrap .f-input {
        border: 2px solid var(--border-color);
        border-radius: 12px;
        padding: 0.7rem 1rem 0.7rem 2.75rem;
        font-size: 0.88rem;
        background: var(--bg-secondary);
        color: var(--text-primary);
        transition: all 0.3s ease;
        width: 100%;
        appearance: none;
    }

    .input-wrap select.f-input {
        cursor: pointer;
        padding-right: 2.5rem;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
    }

    textarea.f-input {
        resize: vertical;
        min-height: 90px;
        line-height: 1.6;
    }

    .f-input::placeholder {
        color: var(--text-tertiary);
    }

    .f-input:focus {
        border-color: var(--primary);
        background: var(--bg-primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.08);
        outline: none;
    }

    .f-input:hover:not(:focus) {
        border-color: var(--border-color);
    }

    .input-wrap .f-input:focus~.iw-icon {
        color: var(--primary);
    }

    .field-hint {
        font-size: 0.7rem;
        color: var(--text-tertiary);
        margin-top: 0.35rem;
        padding-left: 0.2rem;
    }

    /* ============== GRID LAYOUTS ============== */
    .two-col-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.25rem;
    }

    .three-col-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    /* ============== PRIORITY CARDS ============== */
    .priority-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.75rem;
    }

    .priority-card input[type="radio"] {
        display: none;
    }

    .priority-card label {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.4rem;
        padding: 0.8rem 0.5rem;
        border: 2px solid var(--border-color);
        border-radius: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: var(--bg-secondary);
        text-align: center;
    }

    .priority-card label:hover {
        border-color: var(--text-tertiary);
        background: var(--bg-primary);
    }

    .priority-card label .pr-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        background: var(--bg-tertiary);
        color: var(--text-secondary);
        transition: all 0.3s;
    }

    .priority-card label .pr-text {
        font-size: 0.75rem;
        font-weight: 600;
        color: var(--text-secondary);
        transition: color 0.3s;
    }

    .priority-card.pr-low input:checked+label {
        border-color: #22c55e;
        background: rgba(34, 197, 94, 0.04);
        box-shadow: 0 4px 15px rgba(34, 197, 94, 0.12);
    }

    .priority-card.pr-low input:checked+label .pr-icon {
        background: rgba(34, 197, 94, 0.15);
        color: #22c55e;
    }

    .priority-card.pr-low input:checked+label .pr-text {
        color: #22c55e;
    }

    .priority-card.pr-med input:checked+label {
        border-color: #f59e0b;
        background: rgba(245, 158, 11, 0.04);
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.12);
    }

    .priority-card.pr-med input:checked+label .pr-icon {
        background: rgba(245, 158, 11, 0.15);
        color: #f59e0b;
    }

    .priority-card.pr-med input:checked+label .pr-text {
        color: #f59e0b;
    }

    .priority-card.pr-high input:checked+label {
        border-color: #ef4444;
        background: rgba(239, 68, 68, 0.04);
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.12);
    }

    .priority-card.pr-high input:checked+label .pr-icon {
        background: rgba(239, 68, 68, 0.15);
        color: #ef4444;
    }

    .priority-card.pr-high input:checked+label .pr-text {
        color: #ef4444;
    }

    /* ============== DURATION INPUT ============== */
    .duration-box {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1rem;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        background: var(--bg-secondary);
        transition: all 0.3s;
    }

    .duration-box:focus-within {
        border-color: var(--primary);
        background: var(--bg-primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.08);
    }

    .duration-box .dur-icon {
        color: var(--text-tertiary);
        font-size: 1.1rem;
        transition: color 0.3s;
    }

    .duration-box:focus-within .dur-icon {
        color: var(--primary);
    }

    .duration-box input {
        border: none;
        outline: none;
        background: transparent;
        width: 50px;
        font-size: 0.88rem;
        font-weight: 600;
        color: var(--text-primary);
        text-align: center;
        padding: 0;
    }

    .duration-box input::-webkit-inner-spin-button {
        opacity: 0;
    }

    .duration-box .dur-label {
        font-size: 0.75rem;
        color: var(--text-secondary);
        font-weight: 500;
    }

    .duration-box .dur-sep {
        font-size: 1rem;
        color: var(--text-tertiary);
        font-weight: 300;
    }

    /* ============== SIDE PANEL ============== */
    .side-panel {
        position: sticky;
        top: 1.5rem;
    }

    .side-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 20px var(--shadow);
        margin-bottom: 1.25rem;
        background: var(--bg-primary);
        animation: formSlideUp 0.55s ease forwards;
    }

    .side-card .card-body {
        padding: 1.25rem;
    }

    .side-card .sc-title {
        font-size: 0.85rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 0.85rem;
        display: flex;
        align-items: center;
        gap: 0.4rem;
        padding-bottom: 0.65rem;
        border-bottom: 1px solid var(--border-color);
    }

    /* Summary Items */
    .summary-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0.55rem 0;
        border-bottom: 1px solid var(--border-color);
    }

    .summary-item:last-child {
        border-bottom: none;
    }

    .summary-item .si-label {
        font-size: 0.78rem;
        color: var(--text-secondary);
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }

    .summary-item .si-label i {
        font-size: 0.95rem;
        color: var(--text-tertiary);
    }

    .summary-item .si-value {
        font-size: 0.82rem;
        font-weight: 600;
        color: var(--text-primary);
        max-width: 150px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .si-badge {
        padding: 0.2rem 0.65rem;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }

    .si-badge.low {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
    }

    .si-badge.medium {
        background: rgba(245, 158, 11, 0.1);
        color: #f59e0b;
    }

    .si-badge.high {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
    }

    .si-badge.none {
        background: var(--bg-tertiary);
        color: var(--text-secondary);
    }

    /* Tip Items */
    .tip-row {
        display: flex;
        gap: 0.6rem;
        padding: 0.5rem 0;
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
        font-size: 0.75rem;
        color: var(--text-secondary);
        line-height: 1.45;
    }

    /* ============== FORM ACTIONS ============== */
    .form-action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1.5rem;
        margin-top: 0.5rem;
        border-top: 1px solid var(--border-color);
    }

    .btn-act-cancel {
        padding: 0.6rem 1.5rem;
        border-radius: 12px;
        border: 2px solid var(--border-color);
        background: var(--bg-secondary);
        color: var(--text-secondary);
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
        border-color: var(--text-tertiary);
        background: var(--bg-tertiary);
        color: var(--text-primary);
    }

    .btn-act-submit {
        padding: 0.6rem 2rem;
        border-radius: 12px;
        border: none;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: #fff;
        font-weight: 600;
        font-size: 0.88rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 18px rgba(99, 102, 241, 0.3);
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
        box-shadow: 0 6px 28px rgba(99, 102, 241, 0.4);
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

    .btn-act-submit.loading .btn-spinner {
        display: inline-block;
    }

    .btn-act-submit.loading .btn-label {
        display: none;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    /* ============== RESPONSIVE ============== */
    @media (max-width: 992px) {
        .task-main-grid {
            grid-template-columns: 1fr;
        }

        .side-panel {
            position: static;
            margin-top: 0;
        }
    }

    @media (max-width: 768px) {

        .two-col-grid,
        .three-col-grid {
            grid-template-columns: 1fr;
        }

        .priority-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .task-add-wrapper .page-content {
            padding: 1rem !important;
        }
    }

    @media (max-width: 576px) {
        .task-form-card .card-body {
            padding: 1.25rem;
        }

        .task-page-header {
            padding: 1rem 1.25rem;
        }

        .task-page-header h4 {
            font-size: 1.1rem;
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
            gap: 0.5rem;
        }

        .header-breadcrumb {
            flex-wrap: wrap;
        }
    }
</style>

<div class="page-wrapper task-add-wrapper">
    <div class="page-content">

        <!-- =============== PAGE HEADER =============== -->
        <div class="task-page-header d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <div class="header-breadcrumb">
                    <a href="<?= site_url('dashboard'); ?>">
                        <i class="bx bx-home-alt"></i> Dashboard
                    </a>
                    <span class="bc-sep"><i class="bx bx-chevron-right"></i></span>
                    <a href="<?= site_url('task'); ?>">Tasks</a>
                    <span class="bc-sep"><i class="bx bx-chevron-right"></i></span>
                    <span class="bc-current">Add New Task</span>
                </div>
                <h4>Add New Task</h4>
                <span class="header-sub">Create and assign a new task to your team</span>
            </div>
            <a href="<?= site_url('task/list'); ?>" class="btn-header-back">
                <i class="bx bx-arrow-back"></i> Back to Tasks
            </a>
        </div>

        <!-- =============== FLASH MESSAGES =============== -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="flash-msg success">
                <i class="bx bx-check-circle"></i>
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="flash-msg error">
                <i class="bx bx-error-circle"></i>
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- =============== FULL WIDTH MAIN CONTENT =============== -->
        <div class="task-main-grid">

            <!-- LEFT — FORM (Full Width) -->
            <div>
                <div class="card task-form-card">
                    <div class="card-body">

                        <!-- Banner -->
                        <div class="form-card-banner">
                            <div class="banner-icon">
                                <i class="bx bx-task"></i>
                            </div>
                            <h5>New Task Details</h5>
                            <p>Fill in the information below to create and assign a task</p>
                        </div>

                        <form method="post" action="<?= site_url('task/store'); ?>" id="taskForm">

                            <!-- ====== SECTION 1: ASSIGNMENT ====== -->
                            <div class="section-heading">
                                <span class="sec-icon blue"><i class="bx bx-user-plus"></i></span>
                                <h6>Assignment</h6>
                            </div>
                            <p class="section-sub">Select the project and team member</p>

                            <div class="two-col-grid">
                                <div class="field-group mb-0">
                                    <label class="field-label">
                                        <i class="bx bx-folder lbl-icon"></i>
                                        Project
                                        <span class="req"></span>
                                    </label>
                                    <div class="input-wrap">
                                        <i class="bx bx-briefcase iw-icon"></i>
                                        <select name="project_id" class="f-input" id="taskProject" required>
                                            <option value="">Select Project</option>
                                            <?php foreach ($projects as $p): ?>
                                                <option value="<?= $p->id; ?>">
                                                    <?= htmlspecialchars($p->project_name); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="field-group mb-0">
                                    <label class="field-label">
                                        <i class="bx bx-user lbl-icon"></i>
                                        Assign To
                                        <span class="req"></span>
                                    </label>
                                    <div class="input-wrap">
                                        <i class="bx bx-user-circle iw-icon"></i>
                                        <select name="assigned_to" class="f-input" id="taskUser" required>
                                            <option value="">Select User</option>
                                            <?php foreach ($users as $u): ?>
                                                <option value="<?= $u->id; ?>">
                                                    <?= htmlspecialchars($u->name); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <hr class="section-divider">

                            <!-- ====== SECTION 2: TASK DETAILS ====== -->
                            <div class="section-heading">
                                <span class="sec-icon purple"><i class="bx bx-detail"></i></span>
                                <h6>Task Details</h6>
                            </div>
                            <p class="section-sub">Describe what needs to be done</p>

                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-text lbl-icon"></i>
                                    Task Title
                                    <span class="req"></span>
                                </label>
                                <div class="input-wrap">
                                    <i class="bx bx-task iw-icon"></i>
                                    <input type="text" name="title" class="f-input"
                                        placeholder="e.g. Design homepage banner" required id="taskTitle">
                                </div>
                                <div class="field-hint">
                                    <i class="bx bx-info-circle"></i> Use a clear, actionable task name
                                </div>
                            </div>

                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-align-left lbl-icon"></i>
                                    Description
                                    <span class="opt-tag">Optional</span>
                                </label>
                                <div class="input-wrap">
                                    <i class="bx bx-notepad iw-icon"></i>
                                    <textarea name="description" class="f-input" rows="3"
                                        placeholder="Add details, requirements, or notes for this task..."
                                        id="taskDesc"></textarea>
                                </div>
                            </div>

                            <hr class="section-divider">

                            <!-- ====== SECTION 3: PRIORITY ====== -->
                            <div class="section-heading">
                                <span class="sec-icon amber"><i class="bx bx-flag"></i></span>
                                <h6>Priority Level</h6>
                            </div>
                            <p class="section-sub">Set how urgent this task is</p>

                            <div class="field-group">
                                <div class="priority-grid">
                                    <div class="priority-card pr-low">
                                        <input type="radio" name="priority" value="low" id="prLow">
                                        <label for="prLow">
                                            <span class="pr-icon"><i class="bx bx-down-arrow-alt"></i></span>
                                            <span class="pr-text">Low</span>
                                        </label>
                                    </div>
                                    <div class="priority-card pr-med">
                                        <input type="radio" name="priority" value="medium" id="prMed" checked>
                                        <label for="prMed">
                                            <span class="pr-icon"><i class="bx bx-minus"></i></span>
                                            <span class="pr-text">Medium</span>
                                        </label>
                                    </div>
                                    <div class="priority-card pr-high">
                                        <input type="radio" name="priority" value="high" id="prHigh">
                                        <label for="prHigh">
                                            <span class="pr-icon"><i class="bx bx-up-arrow-alt"></i></span>
                                            <span class="pr-text">High</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr class="section-divider">

                            <!-- ====== SECTION 4: SCHEDULE ====== -->
                            <div class="section-heading">
                                <span class="sec-icon green"><i class="bx bx-calendar"></i></span>
                                <h6>Schedule & Duration</h6>
                            </div>
                            <p class="section-sub">Define timeline and estimated effort</p>

                            <div class="two-col-grid" style="margin-bottom: 1.25rem;">
                                <div class="field-group mb-0">
                                    <label class="field-label">
                                        <i class="bx bx-play-circle lbl-icon"></i>
                                        Start Date & Time
                                        <span class="req"></span>
                                    </label>
                                    <div class="input-wrap">
                                        <i class="bx bx-calendar-event iw-icon"></i>
                                        <input type="datetime-local" name="start_time" class="f-input" required id="startTime">
                                    </div>
                                </div>

                                <div class="field-group mb-0">
                                    <label class="field-label">
                                        <i class="bx bx-calendar-check lbl-icon"></i>
                                        Due Date
                                        <span class="opt-tag">Optional</span>
                                    </label>
                                    <div class="input-wrap">
                                        <i class="bx bx-calendar iw-icon"></i>
                                        <input type="date" name="due_date" class="f-input" id="dueDate">
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mb-4">
                                <span id="durationBadge" class="si-badge none"
                                    style="font-size:0.74rem; padding:0.35rem 1rem; border-radius:20px;">
                                    <i class="bx bx-time-five"></i> Set dates to see duration
                                </span>
                            </div>

                            <div class="field-group">
                                <label class="field-label">
                                    <i class="bx bx-timer lbl-icon"></i>
                                    Estimated Duration
                                    <span class="opt-tag">Optional</span>
                                </label>
                                <div class="duration-box">
                                    <i class="bx bx-time dur-icon"></i>
                                    <input type="number" name="duration_hours" value="0" min="0" id="durHours">
                                    <span class="dur-label">hrs</span>
                                    <span class="dur-sep">:</span>
                                    <input type="number" name="duration_minutes" value="0" min="0" max="59" id="durMins">
                                    <span class="dur-label">mins</span>
                                </div>
                                <div class="field-hint">How long you expect this task to take</div>
                            </div>

                            <!-- ====== ACTION BAR ====== -->
                            <div class="form-action-bar">
                                <a href="<?= site_url('task'); ?>" class="btn-act-cancel">
                                    <i class="bx bx-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn-act-submit" id="submitBtn">
                                    <span class="btn-spinner"></span>
                                    <span class="btn-label">
                                        <i class="bx bx-plus-circle"></i> Create Task
                                    </span>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <!-- RIGHT — SIDE PANEL -->
            <div class="side-panel">
                <!-- Live Summary Card -->
                <div class="side-card">
                    <div class="card-body">
                        <div class="sc-title">
                            <i class="bx bx-list-check" style="color: var(--primary);"></i>
                            Live Preview
                        </div>

                        <div class="summary-item">
                            <span class="si-label"><i class="bx bx-text"></i> Title</span>
                            <span class="si-value" id="sumTitle">—</span>
                        </div>

                        <div class="summary-item">
                            <span class="si-label"><i class="bx bx-folder"></i> Project</span>
                            <span class="si-value" id="sumProject">—</span>
                        </div>

                        <div class="summary-item">
                            <span class="si-label"><i class="bx bx-user"></i> Assigned</span>
                            <span class="si-value" id="sumUser">—</span>
                        </div>

                        <div class="summary-item">
                            <span class="si-label"><i class="bx bx-flag"></i> Priority</span>
                            <span class="si-badge medium" id="sumPriority">Medium</span>
                        </div>

                        <div class="summary-item">
                            <span class="si-label"><i class="bx bx-timer"></i> Est. Duration</span>
                            <span class="si-value" id="sumDuration">0h 0m</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Tips Card -->
                <div class="side-card">
                    <div class="card-body">
                        <div class="sc-title">
                            <i class="bx bx-bulb" style="color: #f59e0b;"></i>
                            Quick Tips
                        </div>

                        <div class="tip-row">
                            <div class="tip-ic" style="background: rgba(34, 197, 94, 0.1); color: #22c55e;">
                                <i class="bx bx-check"></i>
                            </div>
                            <div class="tip-txt">
                                Write clear, actionable titles — "Design homepage banner" is better than "Do design."
                            </div>
                        </div>

                        <div class="tip-row">
                            <div class="tip-ic" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                                <i class="bx bx-check"></i>
                            </div>
                            <div class="tip-txt">
                                Set realistic due dates and leave buffer time for reviews and revisions.
                            </div>
                        </div>

                        <div class="tip-row">
                            <div class="tip-ic" style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6;">
                                <i class="bx bx-check"></i>
                            </div>
                            <div class="tip-txt">
                                Reserve "High" priority for tasks that genuinely block other work.
                            </div>
                        </div>

                        <div class="tip-row">
                            <div class="tip-ic" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                                <i class="bx bx-check"></i>
                            </div>
                            <div class="tip-txt">
                                Add time estimates so the team can plan their workload effectively.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Keyboard Shortcuts Card -->
                <div class="side-card">
                    <div class="card-body">
                        <div class="sc-title">
                            <i class="bx bx-keyboard" style="color: #6366f1;"></i>
                            Keyboard Shortcuts
                        </div>
                        <div class="shortcut-row" style="display: flex; justify-content: space-between; margin-bottom: 0.5rem;">
                            <span>Submit Task</span>
                            <kbd style="padding: 0.2rem 0.6rem; background: var(--bg-secondary); border-radius: 6px; font-size: 0.7rem;">Ctrl + Enter</kbd>
                        </div>
                        <div class="shortcut-row" style="display: flex; justify-content: space-between;">
                            <span>Cancel / Back</span>
                            <kbd style="padding: 0.2rem 0.6rem; background: var(--bg-secondary); border-radius: 6px; font-size: 0.7rem;">Esc</kbd>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Live Summary Elements
        const titleInput = document.getElementById('taskTitle');
        const projectSel = document.getElementById('taskProject');
        const userSel = document.getElementById('taskUser');
        const durHours = document.getElementById('durHours');
        const durMins = document.getElementById('durMins');
        const startTime = document.getElementById('startTime');
        const dueDate = document.getElementById('dueDate');
        const durationBadge = document.getElementById('durationBadge');

        const sumTitle = document.getElementById('sumTitle');
        const sumProject = document.getElementById('sumProject');
        const sumUser = document.getElementById('sumUser');
        const sumPriority = document.getElementById('sumPriority');
        const sumDuration = document.getElementById('sumDuration');

        // Title Preview
        titleInput.addEventListener('input', () => {
            sumTitle.textContent = titleInput.value.trim() || '—';
        });

        // Project Preview
        projectSel.addEventListener('change', () => {
            const txt = projectSel.options[projectSel.selectedIndex]?.text.trim() || '—';
            sumProject.textContent = projectSel.value ? txt : '—';
        });

        // User Preview
        userSel.addEventListener('change', () => {
            const txt = userSel.options[userSel.selectedIndex]?.text.trim() || '—';
            sumUser.textContent = userSel.value ? txt : '—';
        });

        // Priority Preview
        document.querySelectorAll('input[name="priority"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const val = this.value;
                sumPriority.textContent = val.charAt(0).toUpperCase() + val.slice(1);
                sumPriority.className = 'si-badge ' + val;
            });
        });

        // Duration Preview
        function updateDurationPreview() {
            const h = parseInt(durHours.value) || 0;
            const m = parseInt(durMins.value) || 0;
            sumDuration.textContent = h + 'h ' + m + 'm';
        }
        durHours.addEventListener('input', updateDurationPreview);
        durMins.addEventListener('input', updateDurationPreview);

        // Date Duration Calculator
        function calcDateDuration() {
            if (!startTime.value || !dueDate.value) {
                durationBadge.innerHTML = '<i class="bx bx-time-five"></i> Set dates to see duration';
                durationBadge.className = 'si-badge none';
                return;
            }

            const start = new Date(startTime.value);
            const end = new Date(dueDate.value + 'T23:59');
            const diff = end - start;

            if (diff < 0) {
                durationBadge.innerHTML = '<i class="bx bx-error-circle"></i> Due date is before start';
                durationBadge.className = 'si-badge high';
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

            let text = '';
            if (days > 0) text += days + ' day' + (days > 1 ? 's' : '') + ' ';
            if (hours > 0) text += hours + ' hr' + (hours > 1 ? 's' : '');
            if (!text) text = 'Less than 1 hour';

            durationBadge.innerHTML = '<i class="bx bx-time-five"></i> Duration: ' + text.trim();
            durationBadge.className = 'si-badge completed';
        }

        startTime.addEventListener('change', calcDateDuration);
        dueDate.addEventListener('change', calcDateDuration);

        // Form Submit Loading State
        const form = document.getElementById('taskForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function() {
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
        });

        // Keyboard Shortcuts
        document.addEventListener('keydown', function(e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                submitBtn.click();
            }
            if (e.key === 'Escape') {
                window.location.href = '<?= site_url("task"); ?>';
            }
        });
    });
</script>