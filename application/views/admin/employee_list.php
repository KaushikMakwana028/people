<style>
    /* ─── Page Background ─── */
    .page-content {
        min-height: 100vh;
    }

    /* ─── Header Section ─── */
    .list-header {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 16px;
        padding: 28px 32px;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(99, 102, 241, 0.35);
    }

    .list-header::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -15%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.06);
        border-radius: 50%;
    }

    .list-header::after {
        content: '';
        position: absolute;
        bottom: -70%;
        right: 15%;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.04);
        border-radius: 50%;
    }

    .list-header .header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        z-index: 1;
        flex-wrap: wrap;
        gap: 16px;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .header-icon-box {
        width: 56px;
        height: 56px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        color: #fff;
        backdrop-filter: blur(10px);
        flex-shrink: 0;
    }

    .header-left h4 {
        color: #fff;
        font-weight: 700;
        font-size: 22px;
        margin: 0;
    }

    .header-left p {
        color: rgba(255, 255, 255, 0.75);
        font-size: 13px;
        margin: 4px 0 0;
    }

    .header-left .breadcrumb {
        background: transparent;
        margin: 0;
        padding: 0;
    }

    .header-left .breadcrumb-item a {
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        font-size: 13px;
    }

    .header-left .breadcrumb-item a:hover {
        color: #fff;
    }

    .header-left .breadcrumb-item.active {
        color: #fff;
        font-size: 13px;
    }

    .header-left .breadcrumb-item+.breadcrumb-item::before {
        color: rgba(255, 255, 255, 0.5);
        content: "›";
        font-size: 16px;
    }

    .btn-add-employee {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        padding: 12px 24px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        text-decoration: none;
        white-space: nowrap;
    }

    .btn-add-employee:hover {
        background: #fff;
        color: var(--primary);
        border-color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    /* ─── Stats Cards ─── */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 28px;
    }

    .stat-card {
        background: var(--bg-primary);
        border-radius: 16px;
        padding: 22px 24px;
        display: flex;
        align-items: center;
        gap: 16px;
        box-shadow: 0 4px 20px var(--shadow);
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 30px var(--shadow-lg);
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        opacity: 0.06;
        transform: translate(20px, -20px);
    }

    .stat-card.total::after { background: var(--primary); }
    .stat-card.active::after { background: #22c55e; }
    .stat-card.new::after { background: #f59e0b; }
    .stat-card.inactive::after { background: #ef4444; }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .stat-card.total .stat-icon {
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary);
    }

    .stat-card.active .stat-icon {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
    }

    .stat-card.new .stat-icon {
        background: rgba(245, 158, 11, 0.1);
        color: #f59e0b;
    }

    .stat-card.inactive .stat-icon {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
    }

    .stat-info h3 {
        font-size: 24px;
        font-weight: 800;
        margin: 0;
        color: var(--text-primary);
        line-height: 1;
    }

    .stat-info p {
        font-size: 12px;
        font-weight: 600;
        color: var(--text-secondary);
        margin: 4px 0 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-badge {
        font-size: 11px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 6px;
        margin-left: auto;
    }

    .stat-badge.up {
        background: rgba(34, 197, 94, 0.15);
        color: #22c55e;
    }

    .stat-badge.down {
        background: rgba(239, 68, 68, 0.15);
        color: #ef4444;
    }

    /* ─── Table Card ─── */
    .table-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 50px var(--shadow);
        background: var(--bg-primary);
    }

    .table-card .card-header-custom {
        background: var(--bg-primary);
        border-bottom: 1px solid var(--border-color);
        padding: 24px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
    }

    .card-header-left-table {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header-left-table .table-icon {
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 18px;
    }

    .card-header-left-table h6 {
        margin: 0;
        font-weight: 700;
        font-size: 16px;
        color: var(--text-primary);
    }

    .card-header-left-table span {
        font-size: 13px;
        color: var(--text-secondary);
    }

    .header-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-export {
        padding: 8px 16px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease;
        border: 2px solid var(--border-color);
        background: var(--bg-secondary);
        color: var(--text-secondary);
    }

    .btn-export:hover {
        border-color: var(--primary);
        color: var(--primary);
        background: rgba(99, 102, 241, 0.1);
        transform: translateY(-1px);
    }

    .btn-export.excel:hover { border-color: #22c55e; color: #22c55e; background: rgba(34, 197, 94, 0.1); }
    .btn-export.pdf:hover { border-color: #ef4444; color: #ef4444; background: rgba(239, 68, 68, 0.1); }
    .btn-export.print:hover { border-color: var(--primary); color: var(--primary); background: rgba(99, 102, 241, 0.1); }

    .table-card .card-body {
        padding: 0 28px 28px !important;
    }

    /* ─── DataTables Overrides ─── */
    div.dataTables_wrapper {
        padding-top: 0;
    }

    div.dataTables_wrapper .row:first-child {
        padding: 20px 0 16px;
        align-items: center;
    }

    div.dataTables_length select {
        border: 2px solid var(--border-color);
        border-radius: 10px;
        padding: 6px 12px;
        font-size: 13px;
        color: var(--text-primary);
        background-color: var(--bg-secondary);
        transition: all 0.3s;
        appearance: auto;
        min-width: 70px;
    }

    div.dataTables_length select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        outline: none;
    }

    div.dataTables_length label {
        font-size: 13px;
        color: var(--text-secondary);
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    div.dataTables_filter input {
        border: 2px solid var(--border-color) !important;
        border-radius: 10px !important;
        padding: 8px 14px 8px 36px !important;
        font-size: 13px !important;
        color: var(--text-primary);
        background-color: var(--bg-secondary);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23a0aec0' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Ccircle cx='11' cy='11' r='8'%3E%3C/circle%3E%3Cline x1='21' y1='21' x2='16.65' y2='16.65'%3E%3C/line%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: 10px center;
        background-size: 16px;
        transition: all 0.3s;
        min-width: 220px;
    }

    div.dataTables_filter input:focus {
        border-color: var(--primary) !important;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1) !important;
        outline: none;
        background-color: var(--bg-primary);
    }

    div.dataTables_filter label {
        font-size: 13px;
        color: var(--text-secondary);
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    div.dataTables_info {
        font-size: 13px;
        color: var(--text-secondary);
        font-weight: 500;
        padding-top: 16px !important;
    }

    /* ─── Pagination ─── */
    .dataTables_paginate {
        padding-top: 16px !important;
    }

    .dataTables_paginate .paginate_button {
        border: none !important;
        border-radius: 10px !important;
        padding: 8px 14px !important;
        margin: 0 3px !important;
        font-size: 13px !important;
        font-weight: 600 !important;
        color: var(--text-secondary) !important;
        background: var(--bg-secondary) !important;
        transition: all 0.3s ease !important;
    }

    .dataTables_paginate .paginate_button:hover {
        background: rgba(99, 102, 241, 0.1) !important;
        color: var(--primary) !important;
        box-shadow: none !important;
        transform: translateY(-1px);
    }

    .dataTables_paginate .paginate_button.current {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%) !important;
        color: #fff !important;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35) !important;
    }

    .dataTables_paginate .paginate_button.current:hover {
        color: #fff !important;
    }

    .dataTables_paginate .paginate_button.disabled {
        opacity: 0.4 !important;
        cursor: not-allowed !important;
    }

    /* ─── Table Styles ─── */
    .enhanced-table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100% !important;
    }

    .enhanced-table thead th {
        background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
        border: none !important;
        padding: 14px 18px !important;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--text-secondary);
        white-space: nowrap;
        position: relative;
    }

    .enhanced-table thead th:first-child {
        border-radius: 12px 0 0 12px;
    }

    .enhanced-table thead th:last-child {
        border-radius: 0 12px 12px 0;
    }

    .enhanced-table thead th.sorting::after,
    .enhanced-table thead th.sorting_asc::after,
    .enhanced-table thead th.sorting_desc::after {
        opacity: 0.6;
    }

    .enhanced-table tbody td {
        border: none !important;
        border-bottom: 1px solid var(--border-color) !important;
        padding: 16px 18px !important;
        font-size: 14px;
        color: var(--text-primary);
        vertical-align: middle;
    }

    .enhanced-table tbody tr {
        transition: all 0.2s ease;
    }

    .enhanced-table tbody tr:hover {
        background: rgba(99, 102, 241, 0.04) !important;
    }

    .enhanced-table tbody tr:last-child td {
        border-bottom: none !important;
    }

    /* ─── Row Number Badge ─── */
    .row-number {
        width: 30px;
        height: 30px;
        background: var(--bg-tertiary);
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        color: var(--text-secondary);
    }

    /* ─── Employee Name Cell ─── */
    .employee-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .emp-avatar {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
        text-transform: uppercase;
    }

    .emp-name {
        font-weight: 600;
        color: var(--text-primary);
        font-size: 14px;
        line-height: 1.3;
    }

    .emp-username {
        font-size: 12px;
        color: var(--text-tertiary);
    }

    /* ─── Contact Info ─── */
    .contact-info {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: var(--text-secondary);
    }

    .contact-info i {
        color: var(--text-tertiary);
        font-size: 16px;
    }

    .email-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s;
    }

    .email-link:hover {
        color: var(--secondary);
        text-decoration: underline;
    }

    /* ─── Status Badge ─── */
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .status-badge.active {
        background: rgba(34, 197, 94, 0.15);
        color: #22c55e;
    }

    .status-badge.active::before {
        content: '';
        width: 6px;
        height: 6px;
        background: #22c55e;
        border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }

    .status-badge.inactive {
        background: rgba(239, 68, 68, 0.15);
        color: #ef4444;
    }

    .status-badge.inactive::before {
        content: '';
        width: 6px;
        height: 6px;
        background: #ef4444;
        border-radius: 50%;
    }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }

    /* ─── Action Buttons ─── */
    .action-btns {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: none;
        font-size: 16px;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        position: relative;
    }

    .btn-action.view {
        background: rgba(99, 102, 241, 0.1);
        color: var(--primary);
    }

    .btn-action.view:hover {
        background: var(--primary);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    }

    .btn-action.edit {
        background: rgba(139, 92, 246, 0.1);
        color: var(--secondary);
    }

    .btn-action.edit:hover {
        background: var(--secondary);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
    }

    .btn-action.delete {
        background: rgba(239, 68, 68, 0.1);
        color: #ef4444;
    }

    .btn-action.delete:hover {
        background: #ef4444;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }

    /* Tooltip for action buttons */
    .btn-action[data-tooltip] {
        position: relative;
    }

    .btn-action[data-tooltip]::after {
        content: attr(data-tooltip);
        position: absolute;
        bottom: calc(100% + 8px);
        left: 50%;
        transform: translateX(-50%) translateY(4px);
        background: var(--text-primary);
        color: var(--bg-primary);
        font-size: 11px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 6px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s ease;
        pointer-events: none;
    }

    .btn-action[data-tooltip]::before {
        content: '';
        position: absolute;
        bottom: calc(100% + 2px);
        left: 50%;
        transform: translateX(-50%);
        border: 4px solid transparent;
        border-top-color: var(--text-primary);
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s ease;
    }

    .btn-action[data-tooltip]:hover::after,
    .btn-action[data-tooltip]:hover::before {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(0);
    }

    /* ─── Empty State ─── */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }

    .empty-state-icon {
        width: 80px;
        height: 80px;
        background: var(--bg-secondary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 36px;
        color: var(--primary);
    }

    .empty-state h5 {
        color: var(--text-primary);
        font-weight: 700;
        margin-bottom: 8px;
    }

    .empty-state p {
        color: var(--text-secondary);
        font-size: 14px;
        max-width: 300px;
        margin: 0 auto;
    }

    /* ─── Delete Confirmation Modal ─── */
    .modal-confirm .modal-content {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: var(--bg-primary);
    }

    .modal-confirm .modal-body {
        padding: 40px 32px;
        text-align: center;
    }

    .modal-confirm .delete-icon-box {
        width: 72px;
        height: 72px;
        background: rgba(239, 68, 68, 0.15);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 32px;
        color: #ef4444;
        animation: shake 0.5s ease;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20% { transform: translateX(-5px); }
        40% { transform: translateX(5px); }
        60% { transform: translateX(-3px); }
        80% { transform: translateX(3px); }
    }

    .modal-confirm h5 {
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 10px;
    }

    .modal-confirm p {
        color: var(--text-secondary);
        font-size: 14px;
        margin-bottom: 28px;
    }

    .btn-cancel-modal {
        background: var(--bg-secondary);
        border: 2px solid var(--border-color);
        color: var(--text-secondary);
        padding: 10px 28px;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-cancel-modal:hover {
        background: var(--bg-tertiary);
        border-color: var(--border-color);
        color: var(--text-primary);
    }

    .btn-delete-modal {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border: none;
        color: #fff;
        padding: 10px 28px;
        border-radius: 10px;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
        transition: all 0.3s;
    }

    .btn-delete-modal:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
        color: #fff;
    }

    /* ─── Select All Checkbox ─── */
    .custom-check {
        width: 18px;
        height: 18px;
        border-radius: 5px;
        border: 2px solid var(--border-color);
        cursor: pointer;
        accent-color: var(--primary);
    }

    /* ─── Floating Animation ─── */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .floating {
        animation: float 3s ease-in-out infinite;
    }

    /* ─── Responsive Overrides ─── */
    @media (max-width: 768px) {
        .list-header {
            padding: 20px;
        }

        .list-header .header-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-add-employee {
            width: 100%;
            justify-content: center;
        }

        .stats-row {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .stat-card {
            padding: 16px;
        }

        .stat-info h3 {
            font-size: 20px;
        }

        .card-header-custom {
            flex-direction: column;
            align-items: flex-start !important;
        }

        .header-actions {
            width: 100%;
        }

        .header-actions .btn-export {
            flex: 1;
            justify-content: center;
        }

        .table-card .card-body {
            padding: 0 16px 16px !important;
        }

        .employee-info {
            min-width: 180px;
        }
    }

    @media (max-width: 576px) {
        .stats-row {
            grid-template-columns: 1fr 1fr;
        }

        div.dataTables_wrapper .row:first-child {
            flex-direction: column;
            gap: 12px;
        }

        div.dataTables_filter {
            width: 100%;
        }

        div.dataTables_filter input {
            width: 100% !important;
            min-width: unset !important;
        }

        div.dataTables_length {
            width: 100%;
        }

        div.dataTables_wrapper .row {
            padding: 0;
            margin: 0;
        }

        .action-btns {
            gap: 4px;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            font-size: 14px;
        }
    }

    /* ─── Row entry animation ─── */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .enhanced-table tbody tr {
        animation: fadeInUp 0.4s ease forwards;
    }

    .enhanced-table tbody tr:nth-child(1) { animation-delay: 0.05s; }
    .enhanced-table tbody tr:nth-child(2) { animation-delay: 0.1s; }
    .enhanced-table tbody tr:nth-child(3) { animation-delay: 0.15s; }
    .enhanced-table tbody tr:nth-child(4) { animation-delay: 0.2s; }
    .enhanced-table tbody tr:nth-child(5) { animation-delay: 0.25s; }
    .enhanced-table tbody tr:nth-child(6) { animation-delay: 0.3s; }
    .enhanced-table tbody tr:nth-child(7) { animation-delay: 0.35s; }
    .enhanced-table tbody tr:nth-child(8) { animation-delay: 0.4s; }
    .enhanced-table tbody tr:nth-child(9) { animation-delay: 0.45s; }
    .enhanced-table tbody tr:nth-child(10) { animation-delay: 0.5s; }
</style>

<!-- ════════════════════════════════════════════════════════════ -->
<!--                    PAGE CONTENT                             -->
<!-- ════════════════════════════════════════════════════════════ -->

<div class="page-wrapper">
    <div class="page-content">

        <!-- ─── Header Section ─── -->
        <div class="list-header">
            <div class="header-content">
                <div class="header-left">
                    <div class="header-icon-box floating">
                        <i class="bx bx-group"></i>
                    </div>
                    <div>
                        <h4>Employee Directory</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url('admin/dashboard') ?>">
                                        <i class="bx bx-home-alt"></i> Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Employees</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <a href="<?= base_url('admin/employee/add') ?>" class="btn-add-employee">
                    <i class="bx bx-plus-circle"></i> Add Employee
                </a>
            </div>
        </div>

        <!-- ─── Flash Messages ─── -->
        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger d-flex align-items-center gap-2 border-0 shadow-sm"
             style="border-radius:12px; border-left:4px solid #e53e3e !important; background:#fff5f5;">
            <i class="bx bx-error-circle" style="font-size:20px; color:#e53e3e;"></i>
            <?= $this->session->flashdata('error'); ?>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" style="font-size:11px;"></button>
        </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success d-flex align-items-center gap-2 border-0 shadow-sm"
             style="border-radius:12px; border-left:4px solid #38a169 !important; background:#f0fff4;">
            <i class="bx bx-check-circle" style="font-size:20px; color:#38a169;"></i>
            <?= $this->session->flashdata('success'); ?>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" style="font-size:11px;"></button>
        </div>
        <?php endif; ?>

        <!-- ─── Stats Cards ─── -->
        <div class="stats-row">
            <div class="stat-card total">
                <div class="stat-icon">
                    <i class="bx bx-group"></i>
                </div>
                <div class="stat-info">
                    <h3><?= count($employees) ?></h3>
                    <p>Total Employees</p>
                </div>
                <span class="stat-badge up">
                    <i class="bx bx-trending-up"></i> All
                </span>
            </div>
            <div class="stat-card active">
                <div class="stat-icon">
                    <i class="bx bx-user-check"></i>
                </div>
                <div class="stat-info">
                    <h3><?= count($employees) ?></h3>
                    <p>Active</p>
                </div>
                <span class="stat-badge up">
                    <i class="bx bx-trending-up"></i> 100%
                </span>
            </div>
            <div class="stat-card new">
                <div class="stat-icon">
                    <i class="bx bx-user-plus"></i>
                </div>
                <div class="stat-info">
                    <h3>0</h3>
                    <p>New This Month</p>
                </div>
            </div>
            <div class="stat-card inactive">
                <div class="stat-icon">
                    <i class="bx bx-user-x"></i>
                </div>
                <div class="stat-info">
                    <h3>0</h3>
                    <p>Inactive</p>
                </div>
            </div>
        </div>

        <!-- ─── Table Card ─── -->
        <div class="card table-card">

            <!-- Card Header -->
            <div class="card-header-custom">
                <div class="card-header-left-table">
                    <div class="table-icon">
                        <i class="bx bx-list-ul"></i>
                    </div>
                    <div>
                        <h6>All Employees</h6>
                        <span><?= count($employees) ?> records found</span>
                    </div>
                </div>
               
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table enhanced-table" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:50px;">#</th>
                                <th>Employee</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th style="width:60px;">Status</th>
                                <th style="width:140px; text-align:center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $colors = ['#667eea','#764ba2','#48bb78','#ed8936','#e53e3e','#3182ce','#d69e2e','#38b2ac','#9f7aea','#ed64a6'];
                            $i = 1;
                            foreach ($employees as $emp):
                                $initials = strtoupper(substr($emp->name, 0, 1));
                                if (strpos($emp->name, ' ') !== false) {
                                    $parts = explode(' ', $emp->name);
                                    $initials = strtoupper(substr($parts[0], 0, 1) . substr(end($parts), 0, 1));
                                }
                                $colorIndex = ($i - 1) % count($colors);
                            ?>
                            <tr>
                                <!-- Row Number -->
                                <td>
                                    <span class="row-number"><?= $i++ ?></span>
                                </td>

                                <!-- Employee Info -->
                                <td>
                                    <div class="employee-info">
                                        <?php if (!empty($emp->photo) && file_exists(FCPATH . 'uploads/profile/' . $emp->photo)): ?>
                                            <img class="emp-avatar" src="<?= base_url('uploads/profile/' . $emp->photo) ?>" alt="<?= htmlspecialchars($emp->name) ?>" style="object-fit: cover;">
                                        <?php else: ?>
                                            <div class="emp-avatar"
                                                 style="background: linear-gradient(135deg, <?= $colors[$colorIndex] ?>, <?= $colors[($colorIndex + 1) % count($colors)] ?>);">
                                                <?= $initials ?>
                                            </div>
                                        <?php endif; ?>
                                        <div>
                                            <div class="emp-name"><?= htmlspecialchars($emp->name) ?></div>
                                            <div class="emp-username">
                                                <i class="bx bx-id-card" style="font-size:12px;"></i>
                                                ID: EMP-<?= str_pad($emp->id, 4, '0', STR_PAD_LEFT) ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Role -->
                                <td>
                                    <?php if ($emp->role == 2): ?>
                                        <span class="badge text-white" style="font-size: 11px; padding: 5px 10px; border-radius: 12px; background-color: #8b5cf6 !important;">Sales</span>
                                    <?php else: ?>
                                        <span class="badge text-white" style="font-size: 11px; padding: 5px 10px; border-radius: 12px; background-color: #6366f1 !important;">Developer</span>
                                    <?php endif; ?>
                                </td>

                                <!-- Phone -->
                                <td>
                                    <div class="contact-info">
                                        <i class="bx bx-phone"></i>
                                        <?= htmlspecialchars($emp->phone) ?>
                                    </div>
                                </td>

                                <!-- Email -->
                                <td>
                                    <div class="contact-info">
                                        <i class="bx bx-envelope"></i>
                                        <a href="mailto:<?= htmlspecialchars($emp->email) ?>" class="email-link">
                                            <?= htmlspecialchars($emp->email) ?>
                                        </a>
                                    </div>
                                </td>

                                <!-- Status -->
                                <td>
                                    <span class="status-badge active">Active</span>
                                </td>

                                <!-- Actions -->
                                <td>
                                    <div class="action-btns">
                                        <a href="<?= base_url('admin/employee/view_profile/' . $emp->id) ?>"
                                           class="btn-action view"
                                           data-tooltip="View Details">
                                            <i class="bx bx-show"></i>
                                        </a>
                                        <a href="<?= base_url('admin/employee/edit/' . $emp->id) ?>"
                                           class="btn-action edit"
                                           data-tooltip="Edit">
                                            <i class="bx bx-edit-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                           class="btn-action delete"
                                           data-tooltip="Delete"
                                           onclick="confirmDelete('<?= base_url('admin/employee/delete/' . $emp->id) ?>', '<?= htmlspecialchars($emp->name, ENT_QUOTES) ?>')">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end page wrapper -->

<!-- ─── Delete Confirmation Modal ─── -->
<div class="modal fade modal-confirm" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="delete-icon-box">
                    <i class="bx bx-trash"></i>
                </div>
                <h5>Delete Employee?</h5>
                <p>Are you sure you want to delete <strong id="deleteEmpName"></strong>? This action cannot be undone.</p>
                <div class="d-flex justify-content-center gap-3">
                    <button type="button" class="btn btn-cancel-modal" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <a href="#" id="deleteConfirmBtn" class="btn btn-delete-modal">
                        <i class="bx bx-trash me-1"></i> Delete
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ─── Scripts ─── -->
<script>
$(document).ready(function () {
    // Initialize DataTable
    $('#example').DataTable({
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        responsive: true,
        language: {
            search: "",
            searchPlaceholder: "Search employees...",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ employees",
            infoEmpty: "No employees found",
            emptyTable: `
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="bx bx-user-x"></i>
                    </div>
                    <h5>No Employees Yet</h5>
                    <p>Start by adding your first employee to the system</p>
                </div>
            `,
            paginate: {
                first: '<i class="bx bx-chevrons-left"></i>',
                last: '<i class="bx bx-chevrons-right"></i>',
                next: '<i class="bx bx-chevron-right"></i>',
                previous: '<i class="bx bx-chevron-left"></i>'
            }
        },
        columnDefs: [
            { orderable: false, targets: [-1] } // Disable sorting on Actions column
        ],
        drawCallback: function () {
            // Re-apply tooltips after table redraw
            $('[data-bs-toggle="tooltip"]').tooltip();
        }
    });

    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Auto-dismiss flash messages
    setTimeout(function () {
        $('.alert').fadeOut(500, function () { $(this).remove(); });
    }, 5000);
});

// Delete confirmation modal
function confirmDelete(url, name) {
    document.getElementById('deleteEmpName').textContent = name;
    document.getElementById('deleteConfirmBtn').href = url;
    var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}

// Export placeholder functions
function exportTable(type) {
    if (type === 'excel') {
        // Implement Excel export
        showSweetAlert('Excel export feature - integrate with SheetJS or server-side export', 'info');
    } else if (type === 'pdf') {
        // Implement PDF export
        showSweetAlert('PDF export feature - integrate with jsPDF or server-side export', 'info');
    }
}
</script>
