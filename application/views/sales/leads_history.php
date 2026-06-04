<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<style>
    /* ─── Root Variables ─────────────────────────────────────── */
    .sales-leads-page,
    .sl-drawer,
    .sl-drawer-overlay,
    .sl-modal-overlay {
        --sl-bg: var(--bg-secondary, #f8fafc);
        --sl-card: var(--bg-primary, #ffffff);
        --sl-border: var(--border-color, #e2e8f0);
        --sl-text: var(--text-primary, #0f172a);
        --sl-muted: var(--text-secondary, #64748b);
        --sl-soft: var(--bg-tertiary, #f1f5f9);
        --sl-shadow: 0 2px 12px rgba(0, 0, 0, .07);
        --sl-shadow-lg: 0 8px 32px rgba(0, 0, 0, .12);
        --sl-primary: #6366f1;
        --sl-secondary: #8b5cf6;

        --c-new: #6366f1;
        --c-con: #3b82f6;
        --c-fup: #f59e0b;
        --c-conv: #10b981;
        --c-ni: #ef4444;
    }

    [data-bs-theme=dark] .sales-leads-page,
    [data-bs-theme=dark] .sl-drawer,
    [data-bs-theme=dark] .sl-drawer-overlay,
    [data-bs-theme=dark] .sl-modal-overlay {
        --sl-shadow: 0 2px 12px rgba(0, 0, 0, .25);
        --sl-shadow-lg: 0 8px 32px rgba(0, 0, 0, .40);
    }

    /* ─── Page ───────────────────────────────────────────────── */
    .sales-leads-page {
        min-height: calc(100vh - 73px);
        background-color: var(--sl-bg) !important;
        color: var(--sl-text);
        padding: 24px !important;
    }

    .sl-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* ─── Breadcrumb ─────────────────────────────────────────── */
    .sl-breadcrumb {
        background: linear-gradient(135deg, var(--sl-primary), var(--sl-secondary));
        border-radius: 12px;
        padding: 10px 18px;
        margin-bottom: 22px;
        box-shadow: 0 4px 14px rgba(99, 102, 241, .22);
    }

    .sl-breadcrumb a,
    .sl-breadcrumb span {
        color: rgba(255, 255, 255, .85);
        font-size: 13px;
        text-decoration: none;
    }

    .sl-breadcrumb a:hover {
        color: #fff;
    }

    .sl-breadcrumb i {
        font-size: 13px;
        margin: 0 5px;
        vertical-align: middle;
    }

    /* ─── Header ─────────────────────────────────────────────── */
    .sl-h1 {
        font-size: 22px;
        font-weight: 800;
        margin: 0 0 3px;
        letter-spacing: -.02em;
        color: var(--sl-text);
    }

    .sl-h1-sub {
        font-size: 13px;
        color: var(--sl-muted);
        margin: 0 0 20px;
        font-weight: 500;
    }

    /* ─── KPI Grid ───────────────────────────────────────────── */
    .sl-kpi-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 22px;
    }

    .sl-kpi {
        background: var(--sl-card);
        border: 1px solid var(--sl-border);
        border-radius: 14px;
        padding: 18px 16px;
        display: flex;
        align-items: center;
        gap: 14px;
        position: relative;
        overflow: hidden;
        box-shadow: var(--sl-shadow);
        transition: transform .2s, box-shadow .2s;
    }

    .sl-kpi:hover {
        transform: translateY(-2px);
        box-shadow: var(--sl-shadow-lg);
    }

    .sl-kpi::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 3px;
        background: var(--kpi-c);
    }

    .sl-kpi-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: var(--sl-soft);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: var(--kpi-c);
        flex-shrink: 0;
    }

    .sl-kpi-label {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: var(--sl-muted);
    }

    .sl-kpi-value {
        font-size: 28px;
        font-weight: 800;
        color: var(--sl-text);
        line-height: 1;
        margin-top: 3px;
    }

    /* ─── Desktop Toolbar ────────────────────────────────────── */
    .sl-toolbar {
        background: var(--sl-card);
        border: 1px solid var(--sl-border);
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 24px;
        box-shadow: var(--sl-shadow);
    }

    .sl-toolbar-main {
        display: flex;
        gap: 16px;
        align-items: center;
        margin-bottom: 16px;
    }

    .sl-toolbar-filters {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 16px;
        border-top: 1px solid var(--sl-border);
        padding-top: 16px;
    }

    @media (max-width: 1200px) {
        .sl-toolbar-filters {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 992px) {
        .sl-toolbar-filters {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    .sl-filter-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .sl-filter-field label {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: var(--sl-muted);
    }

    /* Search */
    .sl-search-wrap {
        position: relative;
        flex: 1;
    }

    .sl-search-wrap i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--sl-muted);
        font-size: 18px;
        pointer-events: none;
    }

    .sl-search-wrap input {
        width: 100%;
        background: var(--sl-soft);
        border: 1.5px solid var(--sl-border);
        border-radius: 10px;
        padding: 10px 14px 10px 40px;
        color: var(--sl-text);
        font-size: 13px;
        outline: none;
        transition: all 0.2s ease;
        font-family: inherit;
    }

    .sl-search-wrap input:hover {
        border-color: rgba(99, 102, 241, 0.4);
        background: var(--sl-card);
    }

    .sl-search-wrap input:focus {
        background: var(--sl-card);
        border-color: var(--sl-primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .12);
    }

    .sl-search-wrap input::placeholder {
        color: var(--sl-muted);
    }

    /* Selects */
    .sl-select {
        width: 100%;
        background: var(--sl-soft);
        border: 1.5px solid var(--sl-border);
        border-radius: 10px;
        padding: 10px 14px;
        color: var(--sl-text);
        font-size: 13px;
        font-weight: 500;
        outline: none;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.2s ease;
    }

    .sl-select:hover {
        border-color: rgba(99, 102, 241, 0.4);
        background: var(--sl-card);
    }

    .sl-select:focus {
        background: var(--sl-card);
        border-color: var(--sl-primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .12);
    }

    /* Date input same style */
    .sl-date {
        width: 100%;
        background: var(--sl-soft);
        border: 1.5px solid var(--sl-border);
        border-radius: 10px;
        padding: 10px 14px;
        color: var(--sl-text);
        font-size: 13px;
        font-weight: 500;
        outline: none;
        cursor: pointer;
        font-family: inherit;
        transition: all 0.2s ease;
    }

    .sl-date:hover {
        border-color: rgba(99, 102, 241, 0.4);
        background: var(--sl-card);
    }

    .sl-date:focus {
        background: var(--sl-card);
        border-color: var(--sl-primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, .12);
    }

    /* Reset btn */
    .sl-btn-reset {
        background: var(--sl-card);
        border: 1.5px solid var(--sl-border);
        border-radius: 10px;
        color: var(--sl-text);
        padding: 10px 18px;
        font-size: 13px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.2s ease;
        flex: 0 0 auto;
        font-family: inherit;
    }

    .sl-btn-reset:hover {
        background: var(--sl-soft);
        border-color: rgba(99, 102, 241, 0.4);
        color: var(--sl-primary);
    }

    /* ─── Mobile Filter Button ───────────────────────────────── */
    .sl-mobile-bar {
        display: none;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .sl-mobile-search-wrap {
        position: relative;
        flex: 1;
    }

    .sl-mobile-search-wrap i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--sl-muted);
        font-size: 17px;
        pointer-events: none;
    }

    .sl-mobile-search-wrap input {
        width: 100%;
        background: var(--sl-card);
        border: 1.5px solid var(--sl-border);
        border-radius: 12px;
        padding: 10px 12px 10px 38px;
        color: var(--sl-text);
        font-size: 13px;
        outline: none;
        font-family: inherit;
    }

    .sl-mobile-search-wrap input:focus {
        border-color: var(--sl-primary);
    }

    .sl-mobile-search-wrap input::placeholder {
        color: var(--sl-muted);
    }

    .sl-filter-btn {
        width: 42px;
        height: 42px;
        background: var(--sl-card);
        border: 1.5px solid var(--sl-border);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        color: var(--sl-primary);
        cursor: pointer;
        flex-shrink: 0;
        position: relative;
        transition: background .2s;
    }

    .sl-filter-btn:hover {
        background: var(--sl-soft);
    }

    .sl-filter-btn .sl-filter-count {
        position: absolute;
        top: -5px;
        right: -5px;
        width: 16px;
        height: 16px;
        background: var(--sl-primary);
        color: #fff;
        border-radius: 50%;
        font-size: 9px;
        font-weight: 700;
        display: none;
        align-items: center;
        justify-content: center;
    }

    .sl-filter-btn.has-filters .sl-filter-count {
        display: flex;
    }

    /* ─── Filter Drawer (Mobile Bottom Sheet) ────────────────── */
    .sl-drawer-overlay {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 1100;
        background: rgba(0, 0, 0, .55);
        backdrop-filter: blur(3px);
    }

    .sl-drawer-overlay.open {
        display: block;
    }

    .sl-drawer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1101;
        background-color: #ffffff !important;
        background: var(--sl-card, #ffffff) !important;
        border-radius: 20px 20px 0 0;
        padding: 0;
        transform: translateY(100%);
        transition: transform .32s cubic-bezier(.22, .61, .36, 1);
        max-height: 88vh;
        overflow-y: auto;
        box-shadow: 0 -8px 40px rgba(0, 0, 0, .18);
    }

    [data-bs-theme=dark] .sl-drawer {
        background-color: #0f172a !important;
        background: var(--sl-card, #0f172a) !important;
    }

    .sl-drawer.open {
        transform: translateY(0);
    }

    .sl-drawer-handle {
        width: 36px;
        height: 4px;
        background: var(--sl-border);
        border-radius: 2px;
        margin: 12px auto 0;
    }

    .sl-drawer-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 20px 12px;
        border-bottom: 1px solid var(--sl-border);
    }

    .sl-drawer-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--sl-text);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sl-drawer-close {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: var(--sl-soft);
        border: none;
        color: var(--sl-muted);
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .sl-drawer-body {
        padding: 16px 20px;
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .sl-drawer-field label {
        display: block;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .07em;
        color: var(--sl-muted);
        margin-bottom: 6px;
    }

    .sl-drawer-field select,
    .sl-drawer-field input[type=date] {
        width: 100%;
        background: var(--sl-soft);
        border: 1.5px solid var(--sl-border);
        border-radius: 10px;
        padding: 10px 12px;
        color: var(--sl-text);
        font-size: 13px;
        outline: none;
        font-family: inherit;
        appearance: auto;
    }

    .sl-drawer-actions {
        display: flex;
        gap: 10px;
        padding: 0 20px 20px;
    }

    .sl-drawer-reset {
        flex: 1;
        background: var(--sl-soft);
        border: 1.5px solid var(--sl-border);
        border-radius: 10px;
        padding: 12px;
        font-size: 13px;
        font-weight: 600;
        color: var(--sl-text);
        cursor: pointer;
        font-family: inherit;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .sl-drawer-apply {
        flex: 2;
        background: linear-gradient(135deg, var(--sl-primary), var(--sl-secondary));
        border: none;
        border-radius: 10px;
        padding: 12px;
        font-size: 13px;
        font-weight: 700;
        color: #fff;
        cursor: pointer;
        font-family: inherit;
        box-shadow: 0 4px 14px rgba(99, 102, 241, .3);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    /* ─── Leads Card ─────────────────────────────────────────── */
    .sl-leads-card {
        background: var(--sl-card);
        border: 1px solid var(--sl-border);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--sl-shadow);
    }

    /* Desktop Table */
    .sl-table-wrap {
        overflow-x: auto;
    }

    .sl-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 680px;
    }

    .sl-table th,
    .sl-table td {
        padding: 14px 18px;
        border-bottom: 1px solid var(--sl-border);
        vertical-align: middle;
    }

    .sl-table th {
        background: var(--sl-soft);
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .08em;
        color: var(--sl-muted);
        white-space: nowrap;
    }

    .sl-table td {
        font-size: 13px;
        color: var(--sl-text);
    }

    .sl-table tbody tr:hover {
        background: var(--sl-soft);
    }

    .sl-table tbody tr:last-child td {
        border-bottom: none;
    }

    .sl-lead-name {
        font-weight: 700;
    }

    /* Badges */
    .sl-badge {
        display: inline-flex;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        white-space: nowrap;
    }

    .sl-badge.new {
        background: rgba(99, 102, 241, .12);
        color: var(--c-new);
    }

    .sl-badge.contacted {
        background: rgba(59, 130, 246, .12);
        color: var(--c-con);
    }

    .sl-badge.followup {
        background: rgba(245, 158, 11, .12);
        color: var(--c-fup);
    }

    .sl-badge.converted {
        background: rgba(16, 185, 129, .12);
        color: var(--c-conv);
    }

    .sl-badge.notinterested {
        background: rgba(239, 68, 68, .12);
        color: var(--c-ni);
    }

    /* Action icons */
    .sl-actions {
        display: flex;
        gap: 6px;
        align-items: center;
        justify-content: center;
    }

    .sl-act {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        cursor: pointer;
        transition: all .2s;
        border: none;
        text-decoration: none;
    }

    .sl-act.wa {
        background: rgba(37, 211, 102, .1);
        color: #25D366;
    }

    .sl-act.wa:hover {
        background: #25D366;
        color: #fff;
        transform: translateY(-1px);
    }

    .sl-act.ph {
        background: rgba(59, 130, 246, .1);
        color: #3b82f6;
    }

    .sl-act.ph:hover {
        background: #3b82f6;
        color: #fff;
        transform: translateY(-1px);
    }

    .sl-act.ed {
        background: rgba(99, 102, 241, .1);
        color: #6366f1;
    }

    .sl-act.ed:hover {
        background: #6366f1;
        color: #fff;
        transform: translateY(-1px);
    }

    .sl-act.vw {
        background: rgba(16, 185, 129, .1);
        color: #10b981;
    }

    .sl-act.vw:hover {
        background: #10b981;
        color: #fff;
        transform: translateY(-1px);
    }

    /* Mobile Card List */
    .sl-mobile-list {
        display: none;
        padding: 12px;
    }

    .sl-mob-card {
        background: var(--sl-card);
        border: 1px solid var(--sl-border);
        border-radius: 16px;
        padding: 16px;
        margin-bottom: 12px;
        box-shadow: var(--sl-shadow);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .sl-mob-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--sl-shadow-lg);
    }

    .sl-mob-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--sl-border);
    }

    .sl-mob-name {
        font-weight: 800;
        font-size: 15px;
        color: var(--sl-text);
        letter-spacing: -0.01em;
    }

    .sl-mob-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 12px;
        padding: 6px 0;
    }

    .sl-mob-row span:first-child {
        color: var(--sl-muted);
        font-weight: 500;
    }

    .sl-mob-row span:last-child {
        font-weight: 600;
        color: var(--sl-text);
    }

    .sl-mob-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
        margin-top: 14px;
        padding-top: 12px;
        border-top: 1px solid var(--sl-border);
        width: 100%;
    }

    .sl-mob-actions .sl-act {
        flex: 1;
        width: auto !important;
        height: 38px !important;
        border-radius: 10px !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 18px !important;
        margin: 0 !important;
    }

    .sl-modal-overlay {
        position: fixed;
        inset: 0;
        z-index: 1050;
        background: rgba(0, 0, 0, .6);
        backdrop-filter: blur(4px);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }

    .sl-modal-overlay.active {
        display: flex;
    }

    .sl-modal-box {
        width: 100%;
        max-width: 480px;
        background-color: #ffffff !important;
        background: var(--sl-card, #ffffff) !important;
        border: 1px solid var(--sl-border);
        border-radius: 18px;
        overflow: hidden;
        animation: slModalIn .22s ease;
    }

    [data-bs-theme=dark] .sl-modal-box {
        background-color: #0f172a !important;
        background: var(--sl-card, #0f172a) !important;
    }

    @keyframes slModalIn {
        from {
            transform: scale(.96);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .sl-modal-head {
        padding: 16px 22px;
        border-bottom: 1px solid var(--sl-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sl-modal-title {
        font-size: 17px;
        font-weight: 700;
        color: var(--sl-text);
    }

    .sl-modal-close {
        width: 30px;
        height: 30px;
        background: var(--sl-soft);
        border: none;
        color: var(--sl-muted);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 18px;
    }

    .sl-modal-body {
        padding: 22px;
    }

    .sl-status-grid {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 18px;
    }

    .sl-status-opt {
        background: var(--sl-soft);
        border: 1.5px solid var(--sl-border);
        border-radius: 10px;
        padding: 11px 14px;
        color: var(--sl-text);
        text-align: left;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: all .2s;
        font-family: inherit;
    }

    .sl-status-opt i {
        font-size: 17px;
    }

    .sl-status-opt:hover {
        background: var(--sl-border);
    }

    .sl-status-opt.active {
        border-color: var(--opt-c);
        background: var(--opt-bg);
        color: var(--opt-c);
    }

    .sl-textarea {
        width: 100%;
        background: var(--sl-soft);
        border: 1.5px solid var(--sl-border);
        border-radius: 10px;
        padding: 10px 12px;
        color: var(--sl-text);
        font-size: 13px;
        outline: none;
        min-height: 75px;
        resize: vertical;
        font-family: inherit;
        margin-top: 5px;
    }

    .sl-textarea:focus {
        border-color: var(--sl-primary);
    }

    .sl-field-label {
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .06em;
        color: var(--sl-muted);
    }

    .sl-modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 18px;
    }

    .sl-btn-cancel {
        background: var(--sl-soft);
        border: 1.5px solid var(--sl-border);
        border-radius: 10px;
        color: var(--sl-text);
        padding: 9px 18px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
    }

    .sl-btn-save {
        background: linear-gradient(135deg, var(--sl-primary), var(--sl-secondary));
        border: none;
        border-radius: 10px;
        color: #fff;
        padding: 9px 22px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        font-family: inherit;
        box-shadow: 0 4px 12px rgba(99, 102, 241, .3);
    }

    .sl-btn-save:disabled {
        opacity: .65;
        cursor: default;
    }

    /* ─── Pagination ─────────────────────────────────────────── */
    .sl-pagination-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding: 12px 18px;
        background: var(--sl-card);
        border: 1px solid var(--sl-border);
        border-radius: 12px;
        box-shadow: var(--sl-shadow);
    }

    .sl-pag-info {
        font-size: 13px;
        color: var(--sl-muted);
        font-weight: 500;
    }

    #sl-pag-links {
        display: flex;
        gap: 5px;
        flex-wrap: wrap;
    }

    /* Empty state */
    .sl-empty {
        padding: 50px 20px;
        text-align: center;
        color: var(--sl-muted);
    }

    .sl-empty i {
        font-size: 44px;
        opacity: .4;
        display: block;
        margin-bottom: 10px;
    }

    /* ─── Responsive ─────────────────────────────────────────── */
    @media (max-width: 1100px) {
        .sl-kpi-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .sales-leads-page {
            padding: 14px !important;
        }

        .sl-kpi-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 16px;
        }

        .sl-kpi {
            padding: 10px 12px;
            gap: 10px;
        }

        .sl-kpi-icon {
            width: 36px;
            height: 36px;
            font-size: 17px;
            border-radius: 8px;
        }

        .sl-kpi-label {
            font-size: 9px;
        }

        .sl-kpi-value {
            font-size: 22px;
        }

        /* Hide desktop toolbar, show mobile bar */
        .sl-toolbar {
            display: none !important;
        }

        .sl-mobile-bar {
            display: flex;
        }

        /* Hide desktop table, show mobile list */
        .sl-table-wrap {
            display: none !important;
        }

        .sl-mobile-list {
            display: block;
        }

        .sl-pagination-bar {
            flex-direction: column;
            gap: 10px;
        }
    }
</style>

<!-- ══════════════════════════════════════════════════════════
     PAGE
════════════════════════════════════════════════════════════ -->
<div class="page-wrapper sales-leads-page">
    <div class="page-content bg-transparent p-0">
        <div class="sl-container">

            <!-- Breadcrumb -->
            <div class="sl-breadcrumb">
                <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Dashboard</a>
                <i class='bx bx-chevron-right'></i>
                <span>Lead History</span>
            </div>

            <!-- Page Header -->
            <div>
                <h1 class="sl-h1">Lead History</h1>
                <p class="sl-h1-sub" id="slProductLabel">
                    <?= $selected_product ? htmlspecialchars($selected_product->name) : 'All Connected Products' ?>
                </p>
            </div>

            <!-- KPI Cards -->
            <div class="sl-kpi-grid">
                <div class="sl-kpi" style="--kpi-c: var(--c-con);">
                    <div class="sl-kpi-icon"><i class='bx bx-phone-call'></i></div>
                    <div>
                        <div class="sl-kpi-label">Contacted</div>
                        <div class="sl-kpi-value"><?= (int)($kpis['Contacted'] ?? 0) ?></div>
                    </div>
                </div>
                <div class="sl-kpi" style="--kpi-c: var(--c-fup);">
                    <div class="sl-kpi-icon"><i class='bx bx-time-five'></i></div>
                    <div>
                        <div class="sl-kpi-label">Follow Up</div>
                        <div class="sl-kpi-value"><?= (int)($kpis['Follow Up'] ?? 0) ?></div>
                    </div>
                </div>
                <div class="sl-kpi" style="--kpi-c: var(--c-conv);">
                    <div class="sl-kpi-icon"><i class='bx bx-badge-check'></i></div>
                    <div>
                        <div class="sl-kpi-label">Converted</div>
                        <div class="sl-kpi-value"><?= (int)($kpis['Converted'] ?? 0) ?></div>
                    </div>
                </div>
                <div class="sl-kpi" style="--kpi-c: var(--c-ni);">
                    <div class="sl-kpi-icon"><i class='bx bx-x-circle'></i></div>
                    <div>
                        <div class="sl-kpi-label">Not Interested</div>
                        <div class="sl-kpi-value"><?= (int)($kpis['Not Interested'] ?? 0) ?></div>
                    </div>
                </div>
            </div>

            <!-- ── DESKTOP TOOLBAR ── -->
            <div class="sl-toolbar">
                <form id="slFilterForm" onsubmit="event.preventDefault(); slTrigger();">
                    <input type="hidden" id="slProductId" value="<?= htmlspecialchars($selected_product_id ?? '') ?>">
                    <input type="hidden" id="slPage" value="<?= $page ?>">
                    <input type="hidden" id="slSortBy" value="<?= $sort_by ?>">
                    <input type="hidden" id="slSortDir" value="<?= $sort_dir ?>">

                    <div class="sl-toolbar-main">
                        <!-- Search -->
                        <div class="sl-search-wrap">
                            <i class='bx bx-search'></i>
                            <input type="text" id="slSearch" placeholder="Search by name, mobile, city…"
                                value="<?= htmlspecialchars($search) ?>"
                                oninput="slDebounce()">
                        </div>

                        <button type="button" class="sl-btn-reset" onclick="slReset()">
                            <i class='bx bx-refresh'></i> Reset Filters
                        </button>
                    </div>

                    <div class="sl-toolbar-filters">
                        <!-- Date -->
                        <div class="sl-filter-field">
                            <label>Date</label>
                            <input type="date" id="slDate" class="sl-date"
                                value="<?= htmlspecialchars($filter_date ?? '') ?>"
                                onchange="slOnDate()">
                        </div>

                        <!-- Month -->
                        <div class="sl-filter-field">
                            <label>Month</label>
                            <select id="slMonth" class="sl-select" onchange="slOnMonth()">
                                <option value="">Select Month</option>
                                <?php $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                foreach ($months as $mi => $mn): ?>
                                    <option value="<?= $mi + 1 ?>" <?= (isset($filter_month) && $filter_month == $mi + 1) ? 'selected' : '' ?>><?= $mn ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Year -->
                        <div class="sl-filter-field">
                            <label>Year</label>
                            <select id="slYear" class="sl-select" onchange="slOnMonth()">
                                <option value="">Select Year</option>
                                <?php $cy = (int)date('Y');
                                for ($y = $cy; $y >= $cy - 5; $y--): ?>
                                    <option value="<?= $y ?>" <?= (isset($filter_year) && $filter_year == $y) ? 'selected' : '' ?>><?= $y ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <!-- Product -->
                        <div class="sl-filter-field">
                            <label>Product</label>
                            <select id="slProduct" class="sl-select" onchange="slChangeProduct(this.value)">
                                <option value="">All Products</option>
                                <?php foreach ($products as $p): ?>
                                    <option value="<?= $p->id ?>" <?= ($selected_product_id == $p->id) ? 'selected' : '' ?>><?= htmlspecialchars($p->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="sl-filter-field">
                            <label>Status</label>
                            <select id="slStatus" class="sl-select" onchange="slTrigger()">
                                <option value="">All Statuses</option>
                                <option value="New" <?= ($status_filter == 'New')          ? 'selected' : '' ?>>New</option>
                                <option value="Contacted" <?= ($status_filter == 'Contacted')    ? 'selected' : '' ?>>Contacted</option>
                                <option value="Follow Up" <?= ($status_filter == 'Follow Up')    ? 'selected' : '' ?>>Follow Up</option>
                                <option value="Converted" <?= ($status_filter == 'Converted')    ? 'selected' : '' ?>>Converted</option>
                                <option value="Not Interested" <?= ($status_filter == 'Not Interested') ? 'selected' : '' ?>>Not Interested</option>
                            </select>
                        </div>

                        <!-- Sort -->
                        <div class="sl-filter-field">
                            <label>Sort By</label>
                            <select id="slSort" class="sl-select" onchange="slChangeSort(this.value)">
                                <option value="status_sequence|ASC" <?= ($sort_by == 'status_sequence' && $sort_dir == 'ASC') ? 'selected' : '' ?>>Status Sequence</option>
                                <option value="pl.id|DESC" <?= ($sort_by == 'pl.id'   && $sort_dir == 'DESC') ? 'selected' : '' ?>>Newest First</option>
                                <option value="pl.id|ASC" <?= ($sort_by == 'pl.id'   && $sort_dir == 'ASC')  ? 'selected' : '' ?>>Oldest First</option>
                                <option value="pl.name|ASC" <?= ($sort_by == 'pl.name' && $sort_dir == 'ASC')  ? 'selected' : '' ?>>Name A-Z</option>
                                <option value="pl.name|DESC" <?= ($sort_by == 'pl.name' && $sort_dir == 'DESC') ? 'selected' : '' ?>>Name Z-A</option>
                                <option value="pl.city|ASC" <?= ($sort_by == 'pl.city' && $sort_dir == 'ASC')  ? 'selected' : '' ?>>City A-Z</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <!-- ── MOBILE SEARCH + FILTER BTN ── -->
            <div class="sl-mobile-bar">
                <div class="sl-mobile-search-wrap">
                    <i class='bx bx-search'></i>
                    <input type="text" id="slMobileSearch" placeholder="Search name, mobile, city…"
                        value="<?= htmlspecialchars($search) ?>"
                        oninput="slMobileDebounce()">
                </div>
                <button class="sl-filter-btn" id="slFilterOpenBtn" onclick="slOpenDrawer()" aria-label="Open filters">
                    <i class='bx bx-slider-alt'></i>
                    <span class="sl-filter-count" id="slFilterCount">0</span>
                </button>
            </div>

            <!-- ── LEADS CARD ── -->
            <div class="sl-leads-card">
                <!-- Desktop table -->
                <div class="sl-table-wrap">
                    <table class="sl-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Status</th>
                                <th style="text-align:center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="slTableBody"></tbody>
                    </table>
                </div>
                <!-- Mobile list -->
                <div class="sl-mobile-list" id="slMobileList"></div>
            </div>

            <!-- Pagination -->
            <div class="cust-pag-container" id="slPagBar" style="display:none;">
                <div class="cust-pag-info">
                    Showing <span id="slPagStart">0</span>–<span id="slPagEnd">0</span>
                    of <span id="slPagTotal">0</span>
                </div>
                <ul class="cust-pag-list" id="sl-pag-links"></ul>
            </div>

        </div><!-- /.sl-container -->
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════
     MOBILE FILTER DRAWER
════════════════════════════════════════════════════════════ -->
<div class="sl-drawer-overlay" id="slDrawerOverlay" onclick="slCloseDrawer()"></div>
<div class="sl-drawer" id="slDrawer">
    <div class="sl-drawer-handle"></div>
    <div class="sl-drawer-header">
        <div class="sl-drawer-title">
            <i class='bx bx-slider-alt' style="color:var(--sl-primary);"></i> Filters
        </div>
        <button class="sl-drawer-close" onclick="slCloseDrawer()"><i class='bx bx-x'></i></button>
    </div>
    <div class="sl-drawer-body">
        <div class="sl-drawer-field">
            <label>Date</label>
            <input type="date" id="slDrDate" value="<?= htmlspecialchars($filter_date ?? '') ?>">
        </div>
        <div class="sl-drawer-field">
            <label>Month</label>
            <select id="slDrMonth">
                <option value="">Select Month</option>
                <?php foreach ($months as $mi => $mn): ?>
                    <option value="<?= $mi + 1 ?>" <?= (isset($filter_month) && $filter_month == $mi + 1) ? 'selected' : '' ?>><?= $mn ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="sl-drawer-field">
            <label>Year</label>
            <select id="slDrYear">
                <option value="">Select Year</option>
                <?php $cy = (int)date('Y');
                for ($y = $cy; $y >= $cy - 5; $y--): ?>
                    <option value="<?= $y ?>" <?= (isset($filter_year) && $filter_year == $y) ? 'selected' : '' ?>><?= $y ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="sl-drawer-field">
            <label>Product</label>
            <select id="slDrProduct">
                <option value="">All Products</option>
                <?php foreach ($products as $p): ?>
                    <option value="<?= $p->id ?>" <?= ($selected_product_id == $p->id) ? 'selected' : '' ?>><?= htmlspecialchars($p->name) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="sl-drawer-field">
            <label>Status</label>
            <select id="slDrStatus">
                <option value="">All Status</option>
                <option value="New" <?= ($status_filter == 'New')          ? 'selected' : '' ?>>New</option>
                <option value="Contacted" <?= ($status_filter == 'Contacted')    ? 'selected' : '' ?>>Contacted</option>
                <option value="Follow Up" <?= ($status_filter == 'Follow Up')    ? 'selected' : '' ?>>Follow Up</option>
                <option value="Converted" <?= ($status_filter == 'Converted')    ? 'selected' : '' ?>>Converted</option>
                <option value="Not Interested" <?= ($status_filter == 'Not Interested') ? 'selected' : '' ?>>Not Interested</option>
            </select>
        </div>
        <div class="sl-drawer-field">
            <label>Sort By</label>
            <select id="slDrSort">
                <option value="status_sequence|ASC" <?= ($sort_by == 'status_sequence' && $sort_dir == 'ASC') ? 'selected' : '' ?>>Status Sequence</option>
                <option value="pl.id|DESC" <?= ($sort_by == 'pl.id'   && $sort_dir == 'DESC') ? 'selected' : '' ?>>Newest First</option>
                <option value="pl.id|ASC" <?= ($sort_by == 'pl.id'   && $sort_dir == 'ASC')  ? 'selected' : '' ?>>Oldest First</option>
                <option value="pl.name|ASC" <?= ($sort_by == 'pl.name' && $sort_dir == 'ASC')  ? 'selected' : '' ?>>Name A-Z</option>
                <option value="pl.name|DESC" <?= ($sort_by == 'pl.name' && $sort_dir == 'DESC') ? 'selected' : '' ?>>Name Z-A</option>
                <option value="pl.city|ASC" <?= ($sort_by == 'pl.city' && $sort_dir == 'ASC')  ? 'selected' : '' ?>>City A-Z</option>
            </select>
        </div>
    </div>
    <div class="sl-drawer-actions">
        <button class="sl-drawer-reset" onclick="slDrawerReset()">
            <i class='bx bx-refresh'></i> Reset
        </button>
        <button class="sl-drawer-apply" onclick="slDrawerApply()">
            <i class='bx bx-check'></i> Apply Filters
        </button>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════
     MODAL: Update Status
════════════════════════════════════════════════════════════ -->
<div class="sl-modal-overlay" id="slStatusModal">
    <div class="sl-modal-box">
        <div class="sl-modal-head">
            <h5 class="sl-modal-title">Update Lead Status</h5>
            <button class="sl-modal-close" onclick="slCloseModal('slStatusModal')"><i class='bx bx-x'></i></button>
        </div>
        <div class="sl-modal-body">
            <input type="hidden" id="slModalLeadId">
            <input type="hidden" id="slModalStatus">
            <div class="sl-status-grid" id="slStatusOpts">
                <button type="button" class="sl-status-opt" data-s="New" style="--opt-c:var(--c-new);  --opt-bg:rgba(99,102,241,.12);"><i class='bx bx-mail-send'></i> New</button>
                <button type="button" class="sl-status-opt" data-s="Contacted" style="--opt-c:var(--c-con);  --opt-bg:rgba(59,130,246,.12);"><i class='bx bx-phone-call'></i> Contacted</button>
                <button type="button" class="sl-status-opt" data-s="Follow Up" style="--opt-c:var(--c-fup);  --opt-bg:rgba(245,158,11,.12);"><i class='bx bx-time-five'></i> Follow Up</button>
                <button type="button" class="sl-status-opt" data-s="Converted" style="--opt-c:var(--c-conv); --opt-bg:rgba(16,185,129,.12);"><i class='bx bx-badge-check'></i> Converted</button>
                <button type="button" class="sl-status-opt" data-s="Not Interested" style="--opt-c:var(--c-ni); --opt-bg:rgba(239,68,68,.12);"><i class='bx bx-x-circle'></i> Not Interested</button>
            </div>
            <div>
                <label class="sl-field-label">Notes (optional)</label>
                <textarea class="sl-textarea" id="slModalNotes" placeholder="Add notes about this status change…"></textarea>
            </div>
            <div class="sl-modal-footer">
                <button class="sl-btn-cancel" onclick="slCloseModal('slStatusModal')">Cancel</button>
                <button class="sl-btn-save" id="slSaveBtn" onclick="slSubmitStatus()">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════
     MODAL: View Details
════════════════════════════════════════════════════════════ -->
<div class="sl-modal-overlay" id="slViewModal">
    <div class="sl-modal-box">
        <div class="sl-modal-head">
            <h5 class="sl-modal-title">Lead Details</h5>
            <button class="sl-modal-close" onclick="slCloseModal('slViewModal')"><i class='bx bx-x'></i></button>
        </div>
        <div class="sl-modal-body" id="slViewContent"></div>
        <div style="padding: 0 22px 20px; text-align:right;">
            <button class="sl-btn-cancel" onclick="slCloseModal('slViewModal')">Close</button>
        </div>
    </div>
</div>

<!-- ══════════════════════════════════════════════════════════
     SCRIPT
════════════════════════════════════════════════════════════ -->
<script>
    (function() {
        'use strict';

        /* ── state ─────────────────────────────────────────── */
        let _debT = null,
            _mDebT = null;

        /* ── helpers ────────────────────────────────────────── */
        const $ = id => document.getElementById(id);
        const esc = s => s ? s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;') : '';
        const escA = s => s ? s.replace(/'/g, "&#039;").replace(/"/g, '&quot;') : '';

        /* ── badge class ─────────────────────────────────────── */
        function badgeClass(s) {
            return (s || '').toLowerCase().replace(/\s/g, '');
        }

        /* ── modal ──────────────────────────────────────────── */
        window.slCloseModal = id => $(id).classList.remove('active');

        function openModal(id) {
            $(id).classList.add('active');
        }
        document.querySelectorAll('.sl-modal-overlay').forEach(m =>
            m.addEventListener('click', e => {
                if (e.target === m) slCloseModal(m.id);
            })
        );

        /* ── status option buttons ───────────────────────────── */
        document.querySelectorAll('.sl-status-opt').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.sl-status-opt').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                $('slModalStatus').value = this.dataset.s;
            });
        });

        /* ── open update modal ───────────────────────────────── */
        window.slOpenUpdate = function(id, status, notes) {
            $('slModalLeadId').value = id;
            $('slModalStatus').value = status;
            $('slModalNotes').value = notes || '';
            document.querySelectorAll('.sl-status-opt').forEach(b => {
                b.classList.toggle('active', b.dataset.s === status);
            });
            openModal('slStatusModal');
        };

        /* ── submit status update ────────────────────────────── */
        window.slSubmitStatus = function() {
            const id = $('slModalLeadId').value;
            const status = $('slModalStatus').value;
            const notes = $('slModalNotes').value;
            const btn = $('slSaveBtn');

            if (!status) {
                showSweetAlert('Please select a status.', 'warning');
                return;
            }
            btn.disabled = true;
            btn.textContent = 'Saving…';

            const fd = new FormData();
            fd.append('id', id);
            fd.append('status', status);
            fd.append('notes', notes);

            fetch('<?= site_url("sales/leads/update_status") ?>', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: fd
                })
                .then(r => r.json())
                .then(d => {
                    btn.disabled = false;
                    btn.textContent = 'Save Changes';
                    if (d.success) {
                        slCloseModal('slStatusModal');
                        slFetch();
                    } else showSweetAlert(d.message || 'Update failed.', 'error');
                })
                .catch(() => {
                    btn.disabled = false;
                    btn.textContent = 'Save Changes';
                    showSweetAlert('Network error.', 'error');
                });
        };

        /* ── view details ────────────────────────────────────── */
        window.slViewDetails = function(lead) {
            const bc = badgeClass(lead.status);
            $('slViewContent').innerHTML = `
            <div style="display:flex;flex-direction:column;gap:14px;">
                <div style="display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid var(--sl-border);padding-bottom:12px;">
                    <span style="font-size:17px;font-weight:700;color:var(--sl-text);">${esc(lead.name)}</span>
                    <span class="sl-badge ${bc}">${esc(lead.status)}</span>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                    <div><span class="sl-field-label" style="display:block;margin-bottom:3px;">Mobile</span><span style="font-size:14px;font-weight:600;">${esc(lead.mobile)}</span></div>
                    <div><span class="sl-field-label" style="display:block;margin-bottom:3px;">City</span><span style="font-size:14px;font-weight:600;">${esc(lead.city)}</span></div>
                </div>
                <div><span class="sl-field-label" style="display:block;margin-bottom:3px;">Product</span><span style="font-size:14px;font-weight:600;color:var(--sl-primary);">${esc(lead.product_name||'N/A')}</span></div>
                <div><span class="sl-field-label" style="display:block;margin-bottom:3px;">Notes</span><p style="font-size:13px;line-height:1.6;margin:0;color:var(--sl-text);">${esc(lead.notes)||'No notes recorded.'}</p></div>
                <div style="font-size:11px;color:var(--sl-muted);text-align:right;">Created: ${esc(lead.created_at)}</div>
            </div>`;
            openModal('slViewModal');
        };

        /* ── contact (whatsapp / phone) ──────────────────────── */
        window.slContact = function(id, type, phone, status) {
            const clean = phone.replace(/[^0-9]/g, '');
            window.open(type === 'whatsapp' ? `https://api.whatsapp.com/send?phone=${clean}` : `tel:${clean}`, '_blank');
            if (status === 'New') {
                const fd = new FormData();
                fd.append('id', id);
                fd.append('status', 'Contacted');
                fd.append('notes', 'Auto-updated to Contacted via click-to-contact.');
                fetch('<?= site_url("sales/leads/update_status") ?>', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: fd
                }).then(r => r.json()).then(d => {
                    if (d.success) slFetch();
                });
            }
        };

        /* ── drawer ─────────────────────────────────────────── */
        window.slOpenDrawer = function() {
            $('slDrawerOverlay').classList.add('open');
            $('slDrawer').classList.add('open');
            document.body.style.overflow = 'hidden';
        };
        window.slCloseDrawer = function() {
            $('slDrawerOverlay').classList.remove('open');
            $('slDrawer').classList.remove('open');
            document.body.style.overflow = '';
        };
        window.slDrawerApply = function() {
            /* sync drawer → desktop hidden inputs (used by fetch) */
            $('slYear').value = $('slDrYear').value;
            $('slMonth').value = $('slDrMonth').value;
            $('slDate').value = $('slDrDate').value;
            $('slStatus').value = $('slDrStatus').value;
            const sortVal = $('slDrSort').value;
            const sp = sortVal.split('|');
            $('slSortBy').value = sp[0];
            $('slSortDir').value = sp[1];
            slChangeProduct($('slDrProduct').value);
            slUpdateFilterCount();
            slCloseDrawer();
            slTrigger();
        };
        window.slDrawerReset = function() {
            ['slDrDate', 'slDrMonth', 'slDrYear', 'slDrProduct', 'slDrStatus'].forEach(id => $(id).value = '');
            $('slDrSort').value = 'status_sequence|ASC';
            slCloseDrawer();
            slReset();
        };

        /* count active filters for badge */
        function slUpdateFilterCount() {
            let count = 0;
            if ($('slSearch').value || ($('slMobileSearch') && $('slMobileSearch').value)) count++;
            if ($('slStatus').value) count++;
            if ($('slDate').value) count++;
            if ($('slMonth').value) count++;
            if ($('slYear').value) count++;
            if ($('slProductId').value) count++;
            const btn = $('slFilterOpenBtn');
            const badge = $('slFilterCount');
            if (btn && badge) {
                badge.textContent = count;
                btn.classList.toggle('has-filters', count > 0);
            }
        }

        /* ── filter helpers ──────────────────────────────────── */
        window.slChangeProduct = function(val) {
            $('slProductId').value = val;
            const sel = $('slProduct');
            if (sel) sel.value = val;
            const lbl = document.getElementById('slProductLabel');
            if (lbl) {
                const opt = sel ? sel.options[sel.selectedIndex] : null;
                lbl.textContent = val ? (opt ? opt.text : val) : 'All Connected Products';
            }
        };
        window.slChangeSort = function(val) {
            const [by, dir] = val.split('|');
            $('slSortBy').value = by;
            $('slSortDir').value = dir;
            slTrigger();
        };
        window.slOnDate = function() {
            if ($('slDate').value) {
                $('slMonth').value = '';
                $('slYear').value = '';
            }
            slTrigger();
        };
        window.slOnMonth = function() {
            if ($('slMonth').value || $('slYear').value) $('slDate').value = '';
            slTrigger();
        };
        window.slTrigger = function() {
            $('slPage').value = 1;
            slUpdateFilterCount();
            slFetch();
        };
        window.slDebounce = function() {
            clearTimeout(_debT);
            _debT = setTimeout(slTrigger, 280);
        };
        window.slMobileDebounce = function() {
            clearTimeout(_mDebT);
            $('slSearch').value = $('slMobileSearch').value;
            _mDebT = setTimeout(slTrigger, 280);
        };
        window.slReset = function() {
            ['slSearch', 'slMonth', 'slYear', 'slStatus'].forEach(id => {
                if ($(id)) $(id).value = '';
            });
            ['slDrMonth', 'slDrYear', 'slDrStatus'].forEach(id => {
                if ($(id)) $(id).value = '';
            });
            if ($('slDate')) $('slDate').value = '<?= date('Y-m-d') ?>';
            if ($('slDrDate')) $('slDrDate').value = '<?= date('Y-m-d') ?>';
            if ($('slMobileSearch')) $('slMobileSearch').value = '';
            $('slSort').value = 'status_sequence|ASC';
            $('slDrSort').value = 'status_sequence|ASC';
            $('slSortBy').value = 'status_sequence';
            $('slSortDir').value = 'ASC';
            slUpdateFilterCount();
            slTrigger();
        };

        /* ── fetch leads ─────────────────────────────────────── */
        function slFetch() {
            const params = new URLSearchParams({
                product_id: $('slProductId').value,
                page: $('slPage').value,
                sort_by: $('slSortBy').value,
                sort_dir: $('slSortDir').value,
                search: $('slSearch').value,
                status: $('slStatus').value,
                date: $('slDate').value,
                month: $('slMonth').value,
                year: $('slYear').value,
                ajax: 1
            });

            const tbody = document.querySelector('.sl-table tbody');
            const mList = $('slMobileList');
            tbody.style.opacity = '0.45';
            mList.style.opacity = '0.45';

            fetch(`<?= site_url('sales/leads/history') ?>?${params}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(r => r.json())
                .then(data => {
                    tbody.style.opacity = '1';
                    mList.style.opacity = '1';
                    if (!data.success) return;
                    renderKpis(data.kpis);
                    renderTable(data.leads);
                    renderMobile(data.leads);
                    renderPag(+data.total_records, +data.page, +data.limit, +data.total_pages);
                })
                .catch(() => {
                    tbody.style.opacity = '1';
                    mList.style.opacity = '1';
                });
        }

        /* ── render KPIs ─────────────────────────────────────── */
        function renderKpis(kpis) {
            document.querySelectorAll('.sl-kpi').forEach(card => {
                const lbl = card.querySelector('.sl-kpi-label');
                if (!lbl) return;
                const key = lbl.textContent.trim();
                const val = card.querySelector('.sl-kpi-value');
                if (val && kpis[key] !== undefined) val.textContent = kpis[key];
            });
        }

        /* ── render desktop table ────────────────────────────── */
        function renderTable(leads) {
            const tbody = document.querySelector('#slTableBody') || document.querySelector('.sl-table tbody');
            tbody.innerHTML = '';
            if (!leads.length) {
                tbody.innerHTML = `<tr><td colspan="5"><div class="sl-empty"><i class='bx bx-message-alt-x'></i>No leads match the current filters.</div></td></tr>`;
                return;
            }
            leads.forEach(l => {
                const bc = badgeClass(l.status);
                const tr = document.createElement('tr');
                tr.innerHTML = `
                <td class="sl-lead-name">${esc(l.name)}</td>
                <td>${esc(l.mobile)}</td>
                <td>${esc(l.city)}</td>
                <td><span class="sl-badge ${bc}">${esc(l.status)}</span></td>
                <td>
                    <div class="sl-actions">
                        <a href="javascript:void(0)" onclick="slContact(${l.id},'whatsapp','${escA(l.mobile)}','${escA(l.status)}')" class="sl-act wa" title="WhatsApp"><i class='bx bxl-whatsapp'></i></a>
                        <a href="javascript:void(0)" onclick="slContact(${l.id},'phone','${escA(l.mobile)}','${escA(l.status)}')" class="sl-act ph" title="Call"><i class='bx bx-phone'></i></a>
                        <button class="sl-act ed" onclick="slOpenUpdate(${l.id},'${escA(l.status)}','${escA(l.notes||'')}')" title="Edit"><i class='bx bx-edit-alt'></i></button>
                        <button class="sl-act vw" onclick="slViewDetails(${JSON.stringify(l).replace(/"/g,'&quot;')})" title="View"><i class='bx bx-show'></i></button>
                    </div>
                </td>`;
                tbody.appendChild(tr);
            });
        }

        /* ── render mobile cards ─────────────────────────────── */
        function renderMobile(leads) {
            const list = $('slMobileList');
            list.innerHTML = '';
            if (!leads.length) {
                list.innerHTML = `<div class="sl-empty"><i class='bx bx-message-alt-x'></i>No leads match the current filters.</div>`;
                return;
            }
            leads.forEach(l => {
                const bc = badgeClass(l.status);
                const d = document.createElement('div');
                d.className = 'sl-mob-card';
                d.innerHTML = `
                <div class="sl-mob-head">
                    <span class="sl-mob-name">${esc(l.name)}</span>
                    <span class="sl-badge ${bc}" style="padding:3px 8px;font-size:9px;">${esc(l.status)}</span>
                </div>
                <div class="sl-mob-row"><span>Mobile</span><span>${esc(l.mobile)}</span></div>
                <div class="sl-mob-row"><span>City</span><span>${esc(l.city)}</span></div>
                <div class="sl-mob-actions">
                    <a href="javascript:void(0)" onclick="slContact(${l.id},'whatsapp','${escA(l.mobile)}','${escA(l.status)}')" class="sl-act wa" title="WhatsApp"><i class='bx bxl-whatsapp'></i></a>
                    <a href="javascript:void(0)" onclick="slContact(${l.id},'phone','${escA(l.mobile)}','${escA(l.status)}')" class="sl-act ph" title="Call"><i class='bx bx-phone'></i></a>
                    <button class="sl-act ed" onclick="slOpenUpdate(${l.id},'${escA(l.status)}','${escA(l.notes||'')}')" title="Edit"><i class='bx bx-edit-alt'></i></button>
                    <button class="sl-act vw" onclick="slViewDetails(${JSON.stringify(l).replace(/"/g,'&quot;')})" title="View"><i class='bx bx-show'></i></button>
                </div>`;
                list.appendChild(d);
            });
        }

        /* ── render pagination ───────────────────────────────── */
        function renderPag(total, page, limit, totalPages) {
            const bar = $('slPagBar');
            if (totalPages <= 1) {
                bar.style.display = 'none';
                return;
            }
            bar.style.display = 'flex';
            $('slPagStart').textContent = total === 0 ? 0 : (page - 1) * limit + 1;
            $('slPagEnd').textContent = Math.min(page * limit, total);
            $('slPagTotal').textContent = total;

            const cont = $('sl-pag-links');
            cont.innerHTML = '';

            function addBtn(p, active = false, label = null) {
                const li = document.createElement('li');
                li.className = 'cust-pag-item';

                const b = document.createElement('button');
                b.type = 'button';
                b.textContent = label || p;
                b.className = 'cust-pag-link' + (active ? ' active' : '');

                if (!active) {
                    b.addEventListener('click', () => {
                        $('slPage').value = p;
                        slFetch();
                    });
                }

                li.appendChild(b);
                cont.appendChild(li);
            }

            function addDisabled(label) {
                const li = document.createElement('li');
                li.className = 'cust-pag-item';

                const s = document.createElement('span');
                s.textContent = label;
                s.className = 'cust-pag-link disabled';

                li.appendChild(s);
                cont.appendChild(li);
            }

            function addDots() {
                const li = document.createElement('li');
                li.className = 'cust-pag-item';

                const s = document.createElement('span');
                s.textContent = '...';
                s.className = 'cust-pag-dots';

                li.appendChild(s);
                cont.appendChild(li);
            }

            if (page > 1) {
                addBtn(page - 1, false, '← Prev');
            } else {
                addDisabled('← Prev');
            }

            if (totalPages <= 5) {
                for (let i = 1; i <= totalPages; i++) addBtn(i, i === page);
            } else {
                if (page <= 3) {
                    for (let i = 1; i <= 3; i++) addBtn(i, i === page);
                    addDots();
                    addBtn(totalPages);
                } else if (page >= totalPages - 2) {
                    addBtn(1);
                    addDots();
                    for (let i = totalPages - 2; i <= totalPages; i++) addBtn(i, i === page);
                } else {
                    addBtn(1);
                    addDots();
                    for (let i = page - 1; i <= page + 1; i++) addBtn(i, i === page);
                    addDots();
                    addBtn(totalPages);
                }
            }

            if (page < totalPages) {
                addBtn(page + 1, false, 'Next →');
            } else {
                addDisabled('Next →');
            }
        }

        /* ── init ────────────────────────────────────────────── */
        document.addEventListener('DOMContentLoaded', () => {
            slUpdateFilterCount();
            slFetch();
        });
    })();
</script>
