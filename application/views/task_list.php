<style>
    /* ==================== TASK LIST — PROFESSIONAL UI ==================== */
    :root {
        --tl-primary: #4f46e5;
        --tl-primary-rgb: 79, 70, 229;
        --tl-primary-light: #eef2ff;
        --tl-primary-dark: #4338ca;
        --tl-success: #10b981;
        --tl-success-rgb: 16, 185, 129;
        --tl-success-light: #ecfdf5;
        --tl-warning: #f59e0b;
        --tl-warning-rgb: 245, 158, 11;
        --tl-warning-light: #fffbeb;
        --tl-danger: #ef4444;
        --tl-danger-rgb: 239, 68, 68;
        --tl-danger-light: #fef2f2;
        --tl-info: #06b6d4;
        --tl-info-rgb: 6, 182, 212;
        --tl-info-light: #ecfeff;
        --tl-purple: #8b5cf6;
        --tl-purple-rgb: 139, 92, 246;
        --tl-purple-light: #f5f3ff;
        --tl-orange: #f97316;
        --tl-orange-rgb: 249, 115, 22;
        --tl-orange-light: #fff7ed;
        --tl-dark: #0f172a;
        --tl-text: #334155;
        --tl-muted: #94a3b8;
        --tl-light: #f8fafc;
        --tl-border: #e2e8f0;
        --tl-surface: #ffffff;
        --tl-radius: 16px;
        --tl-radius-sm: 10px;
        --tl-shadow-sm: 0 1px 3px rgba(0, 0, 0, .04), 0 1px 2px rgba(0, 0, 0, .03);
        --tl-shadow: 0 4px 16px rgba(0, 0, 0, .06), 0 2px 6px rgba(0, 0, 0, .03);
        --tl-shadow-lg: 0 10px 40px rgba(0, 0, 0, .08), 0 4px 12px rgba(0, 0, 0, .04);
        --tl-transition: all .3s cubic-bezier(.4, 0, .2, 1);
    }

    .tl-page {
        animation: tlFadeIn .5s cubic-bezier(.4, 0, .2, 1);
    }

    @keyframes tlFadeIn {
        from {
            opacity: 0;
            transform: translateY(14px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes tlPulse {

        0%,
        100% {
            opacity: 1;
            transform: scale(1);
        }

        50% {
            opacity: .5;
            transform: scale(1.3);
        }
    }

    @keyframes tlBounce {
        0% {
            transform: scale(.95);
            opacity: 0;
        }

        60% {
            transform: scale(1.02);
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes tlProgressFill {
        from {
            width: 0;
        }
    }

    /* ========== HEADER BANNER ========== */
    .tl-header-banner {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 50%, #a855f7 100%);
        border-radius: var(--tl-radius);
        padding: 2rem 2.25rem;
        color: #fff;
        position: relative;
        overflow: hidden;
        margin-bottom: 1.75rem;
    }

    .tl-header-banner::before {
        content: '';
        position: absolute;
        width: 320px;
        height: 320px;
        background: rgba(255, 255, 255, .06);
        border-radius: 50%;
        top: -140px;
        right: -70px;
        pointer-events: none;
    }

    .tl-header-banner::after {
        content: '';
        position: absolute;
        width: 180px;
        height: 180px;
        background: rgba(255, 255, 255, .04);
        border-radius: 50%;
        bottom: -70px;
        left: 40px;
        pointer-events: none;
    }

    .tl-header-content {
        position: relative;
        z-index: 2;
    }

    .tl-header-content .tl-breadcrumb {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: .78rem;
        opacity: .75;
        margin-bottom: .5rem;
    }

    .tl-header-content .tl-breadcrumb i {
        font-size: .65rem;
    }

    .tl-header-content h3 {
        font-weight: 800;
        font-size: 1.55rem;
        letter-spacing: -.3px;
        margin: 0 0 .3rem;
    }

    .tl-header-content p {
        opacity: .82;
        font-size: .88rem;
        margin: 0;
    }

    .tl-header-actions {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    /* Header Buttons */
    .btn-tl-add {
        background: #fff;
        color: var(--tl-primary);
        border: none;
        padding: 10px 22px;
        border-radius: var(--tl-radius-sm);
        font-size: .85rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 7px;
        transition: var(--tl-transition);
        box-shadow: 0 4px 14px rgba(0, 0, 0, .1);
        text-decoration: none;
    }

    .btn-tl-add:hover {
        background: #f8fafc;
        color: var(--tl-primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, .15);
    }

    .btn-tl-add i {
        font-size: 1.1rem;
    }

    .btn-tl-outline {
        background: rgba(255, 255, 255, .18);
        backdrop-filter: blur(6px);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, .25);
        padding: 9px 18px;
        border-radius: var(--tl-radius-sm);
        font-size: .82rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: var(--tl-transition);
        text-decoration: none;
    }

    .btn-tl-outline:hover {
        background: rgba(255, 255, 255, .28);
        color: #fff;
    }

    /* ========== STAT MINI CARDS ========== */
    .tl-stats-row {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    @media (max-width: 1399.98px) {
        .tl-stats-row {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 767.98px) {
        .tl-stats-row {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 479.98px) {
        .tl-stats-row {
            grid-template-columns: 1fr;
        }
    }

    .tl-stat-mini {
        background: var(--tl-surface);
        border: 1px solid var(--tl-border);
        border-radius: var(--tl-radius);
        padding: 1.15rem;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: var(--tl-transition);
        box-shadow: var(--tl-shadow-sm);
        position: relative;
        overflow: hidden;
    }

    .tl-stat-mini:hover {
        transform: translateY(-3px);
        box-shadow: var(--tl-shadow);
        border-color: transparent;
    }

    .tl-stat-mini .mini-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        flex-shrink: 0;
    }

    .tl-stat-mini .mini-info {
        flex: 1;
    }

    .tl-stat-mini .mini-label {
        font-size: .68rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .7px;
        color: var(--tl-muted);
        margin: 0 0 2px;
    }

    .tl-stat-mini .mini-value {
        font-size: 1.35rem;
        font-weight: 800;
        color: var(--tl-dark);
        line-height: 1;
        letter-spacing: -.5px;
    }

    .tl-stat-mini .mini-decor {
        position: absolute;
        width: 70px;
        height: 70px;
        border-radius: 50%;
        opacity: .04;
        top: -20px;
        right: -12px;
        pointer-events: none;
    }

    /* ========== TOOLBAR ========== */
    .tl-toolbar {
        background: var(--tl-surface);
        border: 1px solid var(--tl-border);
        border-radius: var(--tl-radius) var(--tl-radius) 0 0;
        padding: 1rem 1.25rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        border-bottom: none;
    }

    .tl-toolbar-left {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .tl-toolbar-right {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    /* Search */
    .tl-search-wrap {
        position: relative;
    }

    .tl-search-wrap .tl-search-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--tl-muted);
        font-size: 1rem;
        pointer-events: none;
    }

    .tl-search-input {
        padding: 9px 14px 9px 40px;
        border: 1px solid var(--tl-border);
        border-radius: var(--tl-radius-sm);
        font-size: .84rem;
        font-weight: 500;
        color: var(--tl-text);
        background: var(--tl-light);
        min-width: 260px;
        transition: var(--tl-transition);
        outline: none;
    }

    .tl-search-input:focus {
        border-color: var(--tl-primary);
        background: #fff;
        box-shadow: 0 0 0 3px rgba(var(--tl-primary-rgb), .1);
    }

    .tl-search-input::placeholder {
        color: var(--tl-muted);
        font-weight: 400;
    }

    /* Filters */
    .tl-filter-select {
        padding: 9px 32px 9px 14px;
        border: 1px solid var(--tl-border);
        border-radius: var(--tl-radius-sm);
        font-size: .84rem;
        font-weight: 500;
        color: var(--tl-text);
        background: var(--tl-light);
        outline: none;
        cursor: pointer;
        transition: var(--tl-transition);
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
    }

    .tl-filter-select:focus {
        border-color: var(--tl-primary);
        box-shadow: 0 0 0 3px rgba(var(--tl-primary-rgb), .1);
    }

    /* Count badge */
    .tl-count-badge {
        background: var(--tl-primary-light);
        color: var(--tl-primary);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: .75rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    /* View toggle */
    .tl-view-toggle {
        display: flex;
        border: 1px solid var(--tl-border);
        border-radius: var(--tl-radius-sm);
        overflow: hidden;
    }

    .tl-view-btn {
        width: 38px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--tl-light);
        border: none;
        color: var(--tl-muted);
        font-size: 1rem;
        cursor: pointer;
        transition: var(--tl-transition);
    }

    .tl-view-btn:not(:last-child) {
        border-right: 1px solid var(--tl-border);
    }

    .tl-view-btn.active,
    .tl-view-btn:hover {
        background: var(--tl-primary);
        color: #fff;
    }

    /* ========== TABLE ========== */
    .tl-table-card {
        background: var(--tl-surface);
        border: 1px solid var(--tl-border);
        border-radius: 0 0 var(--tl-radius) var(--tl-radius);
        overflow: hidden;
        box-shadow: var(--tl-shadow-sm);
        transition: box-shadow .3s ease;
    }

    .tl-table-card:hover {
        box-shadow: var(--tl-shadow);
    }

    .tl-table {
        margin: 0;
        font-size: .86rem;
        width: 100%;
    }

    .tl-table thead th {
        background: #f8fafc;
        font-weight: 700;
        color: var(--tl-muted);
        font-size: .7rem;
        text-transform: uppercase;
        letter-spacing: .8px;
        padding: .85rem 1rem;
        border-bottom: 2px solid var(--tl-border);
        white-space: nowrap;
        position: sticky;
        top: 0;
        z-index: 1;
    }

    .tl-table tbody td {
        padding: .9rem 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        color: var(--tl-text);
        transition: background .2s ease;
    }

    .tl-table tbody tr {
        transition: background .2s ease;
    }

    .tl-table tbody tr:hover {
        background: #f8fafc;
    }

    .tl-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* Checkbox */
    .tl-table .tl-check {
        width: 18px;
        height: 18px;
        border-radius: 5px;
        border: 2px solid var(--tl-border);
        cursor: pointer;
        accent-color: var(--tl-primary);
        transition: var(--tl-transition);
    }

    /* Task Title Cell */
    .tl-task-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .tl-task-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .tl-task-title {
        font-weight: 600;
        color: var(--tl-dark);
        margin: 0;
        font-size: .86rem;
        line-height: 1.3;
    }

    .tl-task-id {
        font-size: .7rem;
        color: var(--tl-muted);
        font-weight: 500;
        margin: 0;
    }

    /* Project Chip */
    .tl-project-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--tl-light);
        border: 1px solid var(--tl-border);
        padding: 4px 12px;
        border-radius: 8px;
        font-size: .78rem;
        color: var(--tl-text);
        font-weight: 500;
        transition: var(--tl-transition);
    }

    .tl-project-chip i {
        font-size: .9rem;
        color: var(--tl-muted);
    }

    .tl-project-chip:hover {
        background: var(--tl-primary-light);
        border-color: rgba(var(--tl-primary-rgb), .15);
        color: var(--tl-primary);
    }

    /* Assigned User */
    .tl-assigned-cell {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .tl-assigned-avatar {
        width: 30px;
        height: 30px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .7rem;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }

    .tl-assigned-name {
        font-size: .82rem;
        font-weight: 500;
        color: var(--tl-text);
    }

    /* Badges */
    .tl-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        padding: 4px 12px;
        border-radius: 8px;
        font-size: .72rem;
        font-weight: 700;
        letter-spacing: .3px;
        white-space: nowrap;
    }

    .tl-badge i {
        font-size: .82rem;
    }

    /* Priority */
    .tl-badge-high {
        background: var(--tl-danger-light);
        color: var(--tl-danger);
    }

    .tl-badge-medium {
        background: var(--tl-warning-light);
        color: var(--tl-warning);
    }

    .tl-badge-low {
        background: var(--tl-success-light);
        color: var(--tl-success);
    }

    /* Status */
    .tl-badge-completed {
        background: var(--tl-success-light);
        color: var(--tl-success);
    }

    .tl-badge-pending {
        background: var(--tl-warning-light);
        color: var(--tl-warning);
    }

    .tl-badge-inprogress {
        background: var(--tl-info-light);
        color: var(--tl-info);
    }

    .tl-badge-default {
        background: var(--tl-light);
        color: var(--tl-muted);
    }

    /* Due */
    .tl-badge-overdue {
        background: var(--tl-danger-light);
        color: var(--tl-danger);
    }

    .tl-badge-duesoon {
        background: var(--tl-orange-light);
        color: var(--tl-orange);
    }

    .tl-badge-ontime {
        background: var(--tl-success-light);
        color: var(--tl-success);
    }

    .tl-badge-nodue {
        background: var(--tl-light);
        color: var(--tl-muted);
    }

    /* Time Cell */
    .tl-time-cell {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .tl-time-row {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: .78rem;
        font-weight: 500;
    }

    .tl-time-label {
        width: 18px;
        height: 18px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: .6rem;
        font-weight: 800;
        flex-shrink: 0;
    }

    .tl-time-expected .tl-time-label {
        background: var(--tl-primary-light);
        color: var(--tl-primary);
    }

    .tl-time-worked .tl-time-label {
        background: var(--tl-success-light);
        color: var(--tl-success);
    }

    .tl-time-value {
        font-family: 'SF Mono', 'JetBrains Mono', monospace;
        font-size: .78rem;
        color: var(--tl-text);
        font-weight: 600;
    }

    .tl-time-bar {
        height: 3px;
        background: #f1f5f9;
        border-radius: 3px;
        overflow: hidden;
        margin-top: 2px;
    }

    .tl-time-bar-fill {
        height: 100%;
        border-radius: 3px;
        transition: width .8s ease;
        animation: tlProgressFill .8s ease;
    }

    /* Date Cell */
    .tl-date-cell {
        display: flex;
        flex-direction: column;
        gap: 1px;
    }

    .tl-date-main {
        font-weight: 600;
        font-size: .82rem;
        color: var(--tl-dark);
    }

    .tl-date-sub {
        font-size: .68rem;
        color: var(--tl-muted);
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* Actions */
    .tl-actions {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .tl-action-btn {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        border: 1px solid var(--tl-border);
        background: var(--tl-surface);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: var(--tl-muted);
        cursor: pointer;
        transition: var(--tl-transition);
        text-decoration: none;
        position: relative;
    }

    .tl-action-btn:hover {
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 3px 10px rgba(0, 0, 0, .08);
    }

    .tl-action-btn.act-view:hover {
        background: var(--tl-info-light);
        color: var(--tl-info);
    }

    .tl-action-btn.act-edit:hover {
        background: var(--tl-primary-light);
        color: var(--tl-primary);
    }

    .tl-action-btn.act-delete:hover {
        background: var(--tl-danger-light);
        color: var(--tl-danger);
    }

    /* Tooltip */
    .tl-action-btn::before {
        content: attr(data-tooltip);
        position: absolute;
        bottom: calc(100% + 6px);
        left: 50%;
        transform: translateX(-50%) scale(.8);
        background: var(--tl-dark);
        color: #fff;
        font-size: .68rem;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 6px;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: var(--tl-transition);
        z-index: 10;
    }

    .tl-action-btn:hover::before {
        opacity: 1;
        transform: translateX(-50%) scale(1);
    }

    /* ========== TABLE FOOTER ========== */
    .tl-table-footer {
        background: var(--tl-surface);
        border: 1px solid var(--tl-border);
        border-top: none;
        border-radius: 0 0 var(--tl-radius) var(--tl-radius);
        padding: .85rem 1.25rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .tl-showing-text {
        font-size: .8rem;
        color: var(--tl-muted);
        font-weight: 500;
    }

    .tl-pagination {
        display: flex;
        align-items: center;
        gap: 4px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .tl-page-btn {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        border: 1px solid var(--tl-border);
        background: var(--tl-surface);
        color: var(--tl-text);
        font-size: .82rem;
        font-weight: 600;
        cursor: pointer;
        transition: var(--tl-transition);
        text-decoration: none;
    }

    .tl-page-btn:hover {
        background: var(--tl-primary-light);
        color: var(--tl-primary);
        border-color: transparent;
    }

    .tl-page-btn.active {
        background: var(--tl-primary);
        color: #fff;
        border-color: var(--tl-primary);
        box-shadow: 0 2px 8px rgba(var(--tl-primary-rgb), .3);
    }

    /* ========== EMPTY STATE ========== */
    .tl-empty {
        padding: 4rem 2rem;
        text-align: center;
    }

    .tl-empty-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--tl-light);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--tl-muted);
        margin-bottom: 1rem;
        animation: tlBounce .5s ease;
    }

    .tl-empty h6 {
        font-weight: 700;
        color: var(--tl-dark);
        margin: 0 0 .35rem;
    }

    .tl-empty p {
        color: var(--tl-muted);
        font-size: .88rem;
        margin: 0 0 1rem;
    }

    /* ========== DELETE MODAL ========== */
    .tl-modal .modal-content {
        border: none;
        border-radius: var(--tl-radius);
        box-shadow: var(--tl-shadow-lg);
        overflow: hidden;
    }

    .tl-modal .modal-body {
        padding: 2rem;
        text-align: center;
    }

    .tl-modal-icon {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        background: var(--tl-danger-light);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--tl-danger);
        margin-bottom: 1.25rem;
        animation: tlBounce .5s ease;
    }

    .tl-modal h5 {
        font-weight: 800;
        color: var(--tl-dark);
        margin: 0 0 .5rem;
    }

    .tl-modal p {
        color: var(--tl-muted);
        font-size: .88rem;
        margin: 0 0 1.5rem;
    }

    .tl-modal .btn-cancel {
        padding: 10px 24px;
        border-radius: var(--tl-radius-sm);
        border: 1px solid var(--tl-border);
        background: var(--tl-surface);
        color: var(--tl-text);
        font-weight: 600;
        font-size: .85rem;
        transition: var(--tl-transition);
        cursor: pointer;
    }

    .tl-modal .btn-cancel:hover {
        background: var(--tl-light);
    }

    .tl-modal .btn-confirm-del {
        padding: 10px 24px;
        border-radius: var(--tl-radius-sm);
        border: none;
        background: var(--tl-danger);
        color: #fff;
        font-weight: 600;
        font-size: .85rem;
        transition: var(--tl-transition);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        cursor: pointer;
    }

    .tl-modal .btn-confirm-del:hover {
        background: #dc2626;
        color: #fff;
        box-shadow: 0 4px 14px rgba(var(--tl-danger-rgb), .3);
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 767.98px) {
        .tl-header-banner {
            padding: 1.5rem;
        }

        .tl-header-content h3 {
            font-size: 1.25rem;
        }

        .tl-toolbar {
            flex-direction: column;
            align-items: stretch;
        }

        .tl-toolbar-left,
        .tl-toolbar-right {
            width: 100%;
        }

        .tl-search-input {
            min-width: 100%;
            width: 100%;
        }

        .tl-action-btn {
            width: 30px;
            height: 30px;
        }

        .tl-task-cell {
            gap: 6px;
        }
    }

    /* ========== DARK THEME ========== */
    [data-bs-theme="dark"] .tl-header-banner {
        background: linear-gradient(135deg, #3730a3 0%, #5b21b6 50%, #7c3aed 100%);
    }

    [data-bs-theme="dark"] .tl-stat-mini,
    [data-bs-theme="dark"] .tl-toolbar,
    [data-bs-theme="dark"] .tl-table-card,
    [data-bs-theme="dark"] .tl-table-footer {
        background: #1e1e2d;
        border-color: #2d2d3f;
    }

    [data-bs-theme="dark"] .tl-table thead th {
        background: #252536;
        color: #636674;
        border-color: #2d2d3f;
    }

    [data-bs-theme="dark"] .tl-table tbody td {
        border-color: #2d2d3f;
        color: #a1a5b7;
    }

    [data-bs-theme="dark"] .tl-table tbody tr:hover {
        background: #252536;
    }

    [data-bs-theme="dark"] .tl-task-title {
        color: #e1e3ea;
    }

    [data-bs-theme="dark"] .tl-stat-mini .mini-value {
        color: #e1e3ea;
    }

    [data-bs-theme="dark"] .tl-search-input,
    [data-bs-theme="dark"] .tl-filter-select {
        background: #252536;
        border-color: #2d2d3f;
        color: #e1e3ea;
    }

    [data-bs-theme="dark"] .tl-action-btn {
        background: #252536;
        border-color: #2d2d3f;
        color: #636674;
    }

    [data-bs-theme="dark"] .tl-project-chip {
        background: #252536;
        border-color: #2d2d3f;
        color: #a1a5b7;
    }

    [data-bs-theme="dark"] .tl-page-btn {
        background: #252536;
        border-color: #2d2d3f;
        color: #a1a5b7;
    }

    [data-bs-theme="dark"] .tl-date-main {
        color: #e1e3ea;
    }

    [data-bs-theme="dark"] .tl-modal .modal-content {
        background: #1e1e2d;
    }
</style>

<div class="page-wrapper">
    <div class="page-content tl-page">

        <?php
        /* ===== PRE-CALCULATE STATS ===== */
        $totalTasks = 0;
        $pendingCount = 0;
        $progressCount = 0;
        $completedCount = 0;
        $overdueCount = 0;

        $avatarColors = ['#4f46e5', '#10b981', '#f59e0b', '#ef4444', '#06b6d4', '#8b5cf6', '#ec4899', '#f97316'];

        if (!empty($tasks)) {
            foreach ($tasks as $t) {
                $totalTasks++;
                if ($t->status === 'pending')
                    $pendingCount++;
                if ($t->status === 'in_progress')
                    $progressCount++;
                if ($t->status === 'completed')
                    $completedCount++;
                if (!empty($t->due_date) && strtotime($t->due_date) < strtotime(date('Y-m-d'))) {
                    $overdueCount++;
                }
            }
        }
        ?>

        <!-- ================= HEADER BANNER ================= -->
        <div class="tl-header-banner">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="tl-header-content">
                    <div class="tl-breadcrumb">
                        <span>Home</span>
                        <i class='bx bx-chevron-right'></i>
                        <span>Management</span>
                        <i class='bx bx-chevron-right'></i>
                        <span style="opacity:1; font-weight:600;">Tasks</span>
                    </div>
                    <h3><i class='bx bx-task' style="margin-right:8px;opacity:.8;"></i> Task Management</h3>
                    <p>Manage all tasks, track progress and monitor deadlines across your workspace.</p>
                </div>
                <div class="tl-header-actions">
                    <a href="javascript:;" class="btn-tl-outline">
                        <i class='bx bx-download'></i> Export
                    </a>
                    <a href="<?= site_url('task/add'); ?>" class="btn-tl-add">
                        <i class='bx bx-plus'></i> Add Task
                    </a>
                </div>
            </div>
        </div>

        <!-- ================= STAT MINI CARDS ================= -->
        <div class="tl-stats-row">

            <div class="tl-stat-mini">
                <div class="mini-decor" style="background:var(--tl-primary);"></div>
                <div class="mini-icon" style="background:var(--tl-primary-light); color:var(--tl-primary);">
                    <i class='bx bx-layer'></i>
                </div>
                <div class="mini-info">
                    <p class="mini-label">Total</p>
                    <div class="mini-value">
                        <?= $totalTasks ?>
                    </div>
                </div>
            </div>

            <div class="tl-stat-mini">
                <div class="mini-decor" style="background:var(--tl-warning);"></div>
                <div class="mini-icon" style="background:var(--tl-warning-light); color:var(--tl-warning);">
                    <i class='bx bx-time-five'></i>
                </div>
                <div class="mini-info">
                    <p class="mini-label">Pending</p>
                    <div class="mini-value">
                        <?= $pendingCount ?>
                    </div>
                </div>
            </div>

            <div class="tl-stat-mini">
                <div class="mini-decor" style="background:var(--tl-info);"></div>
                <div class="mini-icon" style="background:var(--tl-info-light); color:var(--tl-info);">
                    <i class='bx bx-loader-circle'></i>
                </div>
                <div class="mini-info">
                    <p class="mini-label">In Progress</p>
                    <div class="mini-value">
                        <?= $progressCount ?>
                    </div>
                </div>
            </div>

            <div class="tl-stat-mini">
                <div class="mini-decor" style="background:var(--tl-success);"></div>
                <div class="mini-icon" style="background:var(--tl-success-light); color:var(--tl-success);">
                    <i class='bx bx-check-circle'></i>
                </div>
                <div class="mini-info">
                    <p class="mini-label">Completed</p>
                    <div class="mini-value">
                        <?= $completedCount ?>
                    </div>
                </div>
            </div>

            <div class="tl-stat-mini">
                <div class="mini-decor" style="background:var(--tl-danger);"></div>
                <div class="mini-icon" style="background:var(--tl-danger-light); color:var(--tl-danger);">
                    <i class='bx bx-error-circle'></i>
                </div>
                <div class="mini-info">
                    <p class="mini-label">Overdue</p>
                    <div class="mini-value">
                        <?= $overdueCount ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- ================= TOOLBAR ================= -->
        <div class="tl-toolbar">
            <div class="tl-toolbar-left">
                <div class="tl-search-wrap">
                    <i class='bx bx-search tl-search-icon'></i>
                    <input type="text" class="tl-search-input" id="tlSearchInput"
                        placeholder="Search tasks by title, project, assignee..." autocomplete="off">
                </div>
                <select class="tl-filter-select" id="tlStatusFilter">
                    <option value="">All Status</option>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
                <select class="tl-filter-select" id="tlPriorityFilter">
                    <option value="">All Priority</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                </select>
            </div>
            <div class="tl-toolbar-right">
                <span class="tl-count-badge">
                    <i class='bx bx-task' style="font-size:.85rem;"></i>
                    <span id="tlVisibleCount">
                        <?= $totalTasks ?>
                    </span> task
                    <?= $totalTasks !== 1 ? 's' : '' ?>
                </span>
                <div class="tl-view-toggle">
                    <button class="tl-view-btn active" title="Table View"><i class='bx bx-list-ul'></i></button>
                    <button class="tl-view-btn" title="Board View"><i class='bx bx-columns'></i></button>
                </div>
            </div>
        </div>

        <!-- ================= TABLE ================= -->
        <div class="tl-table-card">
            <div class="table-responsive">
                <table class="table tl-table" id="tlTable">
                    <thead>
                        <tr>
                            <th style="width:40px;">
                                <input type="checkbox" class="tl-check" id="tlCheckAll">
                            </th>
                            <th style="width:40px;">#</th>
                            <th>Task</th>
                            <th>Project</th>
                            <th>Assigned To</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Time Tracking</th>
                            <th>Due Date</th>
                            <th>Due Status</th>
                            <th class="text-center" style="width:130px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tlTableBody">

                        <?php if (!empty($tasks)):
                            $idx = 0;
                            foreach ($tasks as $t):
                                $idx++;

                                /* Priority */
                                $prioClass = 'tl-badge-low';
                                $prioIcon = 'bx-down-arrow-alt';
                                $dotColor = '#10b981';
                                if ($t->priority === 'high') {
                                    $prioClass = 'tl-badge-high';
                                    $prioIcon = 'bx-up-arrow-alt';
                                    $dotColor = '#ef4444';
                                } elseif ($t->priority === 'medium') {
                                    $prioClass = 'tl-badge-medium';
                                    $prioIcon = 'bx-minus';
                                    $dotColor = '#f59e0b';
                                }

                                /* Status */
                                $statClass = 'tl-badge-default';
                                $statIcon = 'bx-circle';
                                if ($t->status === 'completed') {
                                    $statClass = 'tl-badge-completed';
                                    $statIcon = 'bx-check-circle';
                                } elseif ($t->status === 'pending') {
                                    $statClass = 'tl-badge-pending';
                                    $statIcon = 'bx-time-five';
                                } elseif ($t->status === 'in_progress') {
                                    $statClass = 'tl-badge-inprogress';
                                    $statIcon = 'bx-loader-circle';
                                }

                                /* Due */
                                $dueClass = 'tl-badge-nodue';
                                $dueIcon = 'bx-calendar';
                                $dueText = 'No Due';
                                $daysLeft = null;

                                if (!empty($t->due_date)) {
                                    $today = strtotime(date('Y-m-d'));
                                    $due = strtotime($t->due_date);
                                    $diff = ($due - $today) / 86400;
                                    $daysLeft = (int) $diff;

                                    if ($diff < 0) {
                                        $dueClass = 'tl-badge-overdue';
                                        $dueIcon = 'bx-error-circle';
                                        $dueText = 'Overdue';
                                    } elseif ($diff <= 3) {
                                        $dueClass = 'tl-badge-duesoon';
                                        $dueIcon = 'bx-error';
                                        $dueText = 'Due Soon';
                                    } else {
                                        $dueClass = 'tl-badge-ontime';
                                        $dueIcon = 'bx-check-circle';
                                        $dueText = 'On Time';
                                    }
                                }

                                /* Time */
                                $expectedMin = (int) ($t->expected_minutes ?? 0);
                                $workedMin = (int) ($t->total_minutes ?? 0);
                                $eh = floor($expectedMin / 60);
                                $em = $expectedMin % 60;
                                $wh = floor($workedMin / 60);
                                $wm = $workedMin % 60;
                                $timePercent = $expectedMin > 0 ? min(100, round(($workedMin / $expectedMin) * 100)) : 0;
                                $timeBarColor = $timePercent > 100 ? '#ef4444' : ($timePercent > 75 ? '#f59e0b' : '#10b981');

                                /* Avatar */
                                $userName = $t->user_name ?? '—';
                                $initials = '';
                                $parts = explode(' ', $userName);
                                $initials = strtoupper(substr($parts[0], 0, 1));
                                if (isset($parts[1]))
                                    $initials .= strtoupper(substr($parts[1], 0, 1));
                                else
                                    $initials = strtoupper(substr($userName, 0, 2));
                                $avColor = $avatarColors[($idx - 1) % count($avatarColors)];
                                ?>
                                <tr class="tl-row" data-title="<?= strtolower(htmlspecialchars($t->title)); ?>"
                                    data-project="<?= strtolower(htmlspecialchars($t->project_name ?? '')); ?>"
                                    data-user="<?= strtolower(htmlspecialchars($userName)); ?>" data-status="<?= $t->status ?>"
                                    data-priority="<?= $t->priority ?>">

                                    <td>
                                        <input type="checkbox" class="tl-check tl-row-check" value="<?= $t->id ?>">
                                    </td>

                                    <td>
                                        <span style="font-weight:600; color:var(--tl-muted); font-size:.78rem;">
                                            <?= $idx ?>
                                        </span>
                                    </td>

                                    <!-- Task Title -->
                                    <td>
                                        <div class="tl-task-cell">
                                            <span class="tl-task-dot" style="background:<?= $dotColor ?>"></span>
                                            <div>
                                                <p class="tl-task-title">
                                                    <?= htmlspecialchars($t->title) ?>
                                                </p>
                                                <p class="tl-task-id">TASK-
                                                    <?= str_pad($t->id, 4, '0', STR_PAD_LEFT) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Project -->
                                    <td>
                                        <span class="tl-project-chip">
                                            <i class='bx bx-briefcase'></i>
                                            <?= htmlspecialchars($t->project_name ?? '—') ?>
                                        </span>
                                    </td>

                                    <!-- Assigned -->
                                    <td>
                                        <div class="tl-assigned-cell">
                                            <div class="tl-assigned-avatar" style="background:<?= $avColor ?>">
                                                <?= $initials ?>
                                            </div>
                                            <span class="tl-assigned-name">
                                                <?= htmlspecialchars($userName) ?>
                                            </span>
                                        </div>
                                    </td>

                                    <!-- Priority -->
                                    <td>
                                        <span class="tl-badge <?= $prioClass ?>">
                                            <i class='bx <?= $prioIcon ?>'></i>
                                            <?= ucfirst($t->priority) ?>
                                        </span>
                                    </td>

                                    <!-- Status -->
                                    <td>
                                        <span class="tl-badge <?= $statClass ?>">
                                            <i class='bx <?= $statIcon ?>'></i>
                                            <?= ucfirst(str_replace('_', ' ', $t->status)) ?>
                                        </span>
                                    </td>

                                    <!-- Time -->
                                    <td>
                                        <div class="tl-time-cell">
                                            <div class="tl-time-row tl-time-expected">
                                                <span class="tl-time-label">E</span>
                                                <span class="tl-time-value">
                                                    <?= $eh ?>h
                                                    <?= str_pad($em, 2, '0', STR_PAD_LEFT) ?>m
                                                </span>
                                            </div>
                                            <div class="tl-time-row tl-time-worked">
                                                <span class="tl-time-label">W</span>
                                                <span class="tl-time-value">
                                                    <?= $wh ?>h
                                                    <?= str_pad($wm, 2, '0', STR_PAD_LEFT) ?>m
                                                </span>
                                            </div>
                                            <div class="tl-time-bar">
                                                <div class="tl-time-bar-fill"
                                                    style="width:<?= $timePercent ?>%; background:<?= $timeBarColor ?>;"></div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Due Date -->
                                    <td>
                                        <?php if (!empty($t->due_date)): ?>
                                            <div class="tl-date-cell">
                                                <span class="tl-date-main">
                                                    <?= date('d M Y', strtotime($t->due_date)) ?>
                                                </span>
                                                <span class="tl-date-sub">
                                                    <i class='bx bx-calendar' style="font-size:.75rem;"></i>
                                                    <?php
                                                    if ($daysLeft === 0)
                                                        echo 'Today';
                                                    elseif ($daysLeft === 1)
                                                        echo 'Tomorrow';
                                                    elseif ($daysLeft > 1)
                                                        echo $daysLeft . ' days left';
                                                    else
                                                        echo abs($daysLeft) . ' day' . (abs($daysLeft) > 1 ? 's' : '') . ' ago';
                                                    ?>
                                                </span>
                                            </div>
                                        <?php else: ?>
                                            <span style="color:var(--tl-muted); font-size:.82rem;">—</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- Due Status -->
                                    <td>
                                        <span class="tl-badge <?= $dueClass ?>">
                                            <i class='bx <?= $dueIcon ?>'></i>
                                            <?= $dueText ?>
                                        </span>
                                    </td>

                                    <!-- Actions -->
                                    <td>
                                        <div class="tl-actions">
                                            <a href="<?= site_url('task/edit/' . $t->id); ?>" class="tl-action-btn act-edit"
                                                data-tooltip="Edit Task">
                                                <i class='bx bx-edit-alt'></i>
                                            </a>
                                            <button type="button" class="tl-action-btn act-delete" data-tooltip="Delete Task"
                                                data-id="<?= $t->id ?>" data-title="<?= htmlspecialchars($t->title) ?>"
                                                onclick="openTaskDeleteModal(this)">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </div>
                                    </td>

                                </tr>
                            <?php endforeach; endif; ?>

                        <?php if (empty($tasks)): ?>
                            <tr id="tlEmptyRow">
                                <td colspan="11">
                                    <div class="tl-empty">
                                        <div class="tl-empty-icon">
                                            <i class='bx bx-task'></i>
                                        </div>
                                        <h6>No Tasks Found</h6>
                                        <p>There are no tasks yet. Create your first task to get started.</p>
                                        <a href="<?= site_url('task/add'); ?>" class="btn-tl-add"
                                            style="color:var(--tl-primary);">
                                            <i class='bx bx-plus'></i> Create First Task
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer / Pagination -->
        <?php if ($totalTasks > 0): ?>
            <div class="tl-table-footer">
                <div class="tl-showing-text">
                    Showing <strong>1–
                        <?= $totalTasks ?>
                    </strong> of <strong>
                        <?= $totalTasks ?>
                    </strong> tasks
                </div>
                <ul class="tl-pagination">
                    <li><a href="javascript:;" class="tl-page-btn"><i class='bx bx-chevron-left'></i></a></li>
                    <li><a href="javascript:;" class="tl-page-btn active">1</a></li>
                    <li><a href="javascript:;" class="tl-page-btn"><i class='bx bx-chevron-right'></i></a></li>
                </ul>
            </div>
        <?php endif; ?>

    </div>
</div>

<!-- ================= DELETE MODAL ================= -->
<div class="modal fade tl-modal" id="deleteTaskModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="tl-modal-icon">
                    <i class='bx bx-trash'></i>
                </div>
                <h5>Delete Task?</h5>
                <p>You're about to delete <strong id="deleteTaskTitle"></strong>. This action cannot be undone and all
                    related time tracking data will be lost.</p>
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" id="deleteTaskLink" class="btn-confirm-del">
                        <i class='bx bx-trash'></i> Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ================= SCRIPTS ================= -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        /* ===== SEARCH & FILTERS ===== */
        const searchInput = document.getElementById('tlSearchInput');
        const statusFilter = document.getElementById('tlStatusFilter');
        const priorityFilter = document.getElementById('tlPriorityFilter');
        const rows = document.querySelectorAll('.tl-row');
        const countBadge = document.getElementById('tlVisibleCount');

        function filterTable() {
            const q = (searchInput?.value || '').toLowerCase().trim();
            const status = (statusFilter?.value || '').toLowerCase();
            const priority = (priorityFilter?.value || '').toLowerCase();
            let visible = 0;

            rows.forEach(function (row) {
                const title = row.getAttribute('data-title') || '';
                const project = row.getAttribute('data-project') || '';
                const user = row.getAttribute('data-user') || '';
                const rStatus = row.getAttribute('data-status') || '';
                const rPrio = row.getAttribute('data-priority') || '';

                const matchSearch = !q || title.includes(q) || project.includes(q) || user.includes(q);
                const matchStatus = !status || rStatus === status;
                const matchPriority = !priority || rPrio === priority;

                if (matchSearch && matchStatus && matchPriority) {
                    row.style.display = '';
                    visible++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (countBadge) countBadge.textContent = visible;
        }

        if (searchInput) searchInput.addEventListener('input', filterTable);
        if (statusFilter) statusFilter.addEventListener('change', filterTable);
        if (priorityFilter) priorityFilter.addEventListener('change', filterTable);

        /* ===== CHECK ALL ===== */
        const checkAll = document.getElementById('tlCheckAll');
        const rowChecks = document.querySelectorAll('.tl-row-check');

        if (checkAll) {
            checkAll.addEventListener('change', function () {
                rowChecks.forEach(function (cb) {
                    const row = cb.closest('tr');
                    if (row && row.style.display !== 'none') {
                        cb.checked = checkAll.checked;
                    }
                });
            });
        }
    });

    /* ===== DELETE MODAL ===== */
    function openTaskDeleteModal(btn) {
        const id = btn.getAttribute('data-id');
        const title = btn.getAttribute('data-title');

        document.getElementById('deleteTaskTitle').textContent = title;
        document.getElementById('deleteTaskLink').href = '<?= site_url("task/delete/") ?>' + id;

        var modal = new bootstrap.Modal(document.getElementById('deleteTaskModal'));
        modal.show();
    }
</script>