<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<style>
    /* ─── Premium Theme Variables ─── */
    .sales-leads-page {
        --sales-bg: var(--bg-secondary, #f8fafc);
        --sales-card: var(--bg-primary, #ffffff);
        --sales-border: var(--border-color, #e2e8f0);
        --sales-text: var(--text-primary, #0f172a);
        --sales-muted: var(--text-secondary, #64748b);
        --sales-soft: var(--bg-tertiary, #f1f5f9);
        --sales-shadow: 0 4px 20px var(--shadow, rgba(0, 0, 0, 0.1));
        --sales-primary: #6366f1;
        --sales-secondary: #8b5cf6;

        --color-new: #6366f1;
        --color-contacted: #3b82f6;
        --color-followup: #f59e0b;
        --color-converted: #10b981;
        --color-notinterested: #ef4444;
    }

    [data-bs-theme=dark] .sales-leads-page {
        --sales-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    /* ─── Layout & Page wrapper ─── */
    .sales-leads-page {
        min-height: calc(100vh - 73px);
        background-color: var(--sales-bg) !important;
        color: var(--sales-text);
        padding: 24px !important;
    }

    .sales-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* ─── Breadcrumb ─── */
    .sales-breadcrumb {
        background: linear-gradient(135deg, var(--sales-primary), var(--sales-secondary));
        border-radius: 14px;
        padding: 12px 20px;
        margin-bottom: 24px;
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
    }

    .sales-breadcrumb a,
    .sales-breadcrumb span {
        color: rgba(255, 255, 255, 0.85);
        font-size: 13px;
        text-decoration: none;
    }

    .sales-breadcrumb a:hover {
        color: #fff;
    }

    .sales-breadcrumb i {
        font-size: 13px;
        margin: 0 6px;
        vertical-align: middle;
    }

    /* ─── Top Header ─── */
    .sales-header-title {
        font-size: 24px;
        font-weight: 800;
        margin: 0 0 4px;
        letter-spacing: -0.02em;
        color: var(--sales-text);
    }

    .sales-header-subtitle {
        font-size: 13px;
        color: var(--sales-muted);
        margin: 0 0 20px;
        font-weight: 500;
    }

    /* ─── KPI Cards Grid ─── */
    .kpi-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }

    .kpi-card {
        background: var(--sales-card);
        border: 1px solid var(--sales-border);
        border-radius: 16px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        box-shadow: var(--sales-shadow);
    }

    .kpi-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px var(--shadow-lg);
    }

    .kpi-card::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background-color: var(--card-color);
    }

    .kpi-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: var(--sales-soft);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: var(--card-color);
        flex-shrink: 0;
    }

    .kpi-info {
        display: flex;
        flex-direction: column;
    }

    .kpi-label {
        font-size: 11px;
        font-weight: 700;
        color: var(--sales-muted);
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .kpi-value {
        font-size: 32px;
        font-weight: 800;
        color: var(--sales-text);
        line-height: 1;
        margin-top: 4px;
    }

    /* ─── Filters & Search Toolbar ─── */
    .toolbar-card {
        background: var(--sales-card);
        border: 1px solid var(--sales-border);
        border-radius: 16px;
        padding: 16px 20px;
        margin-bottom: 24px;
        box-shadow: var(--sales-shadow);
    }

    .toolbar-flex {
        display: flex;
        gap: 12px;
        align-items: center;
        flex-wrap: wrap;
    }

    .search-input-group {
        position: relative;
        flex: 1;
        min-width: 250px;
    }

    .search-input-group i {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--sales-muted);
        font-size: 18px;
    }

    .search-input-group input {
        width: 100%;
        background-color: var(--sales-soft);
        border: 1.5px solid var(--sales-border);
        border-radius: 12px;
        padding: 10px 14px 10px 42px;
        color: var(--sales-text);
        font-size: 13px;
        outline: none;
        transition: all 0.2s;
    }

    .search-input-group input:focus {
        border-color: var(--sales-primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.15);
    }

    .filter-select {
        background-color: var(--sales-soft);
        border: 1.5px solid var(--sales-border);
        border-radius: 12px;
        padding: 10px 14px;
        color: var(--sales-text);
        font-size: 13px;
        outline: none;
        min-width: 160px;
        cursor: pointer;
    }

    .filter-select:focus {
        border-color: var(--sales-primary);
    }

    .btn-reset {
        background: var(--sales-soft);
        border: 1.5px solid var(--sales-border);
        color: var(--sales-text);
        padding: 10px 20px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-reset:hover {
        background: var(--sales-border);
        color: var(--sales-text);
    }

    /* ─── Table Structure ─── */
    .leads-card {
        background: var(--sales-card);
        border: 1px solid var(--sales-border);
        border-radius: 18px;
        overflow: hidden;
        box-shadow: var(--sales-shadow);
    }

    .leads-table-wrap {
        overflow-x: auto;
    }

    .leads-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 700px;
    }

    .leads-table th,
    .leads-table td {
        padding: 16px 20px;
        border-bottom: 1px solid var(--sales-border);
        vertical-align: middle;
    }

    .leads-table th {
        background: var(--sales-soft);
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--sales-muted);
    }

    .leads-table td {
        font-size: 13px;
        color: var(--sales-text);
    }

    .leads-table tbody tr {
        transition: background 0.2s;
    }

    .leads-table tbody tr:hover {
        background: var(--sales-soft);
    }

    .lead-name {
        font-weight: 700;
        color: var(--sales-text);
    }

    /* ─── Status Badges ─── */
    .badge-status {
        display: inline-flex;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.03em;
    }

    .badge-status.new {
        background: rgba(99, 102, 241, 0.15);
        color: var(--color-new);
    }

    .badge-status.contacted {
        background: rgba(59, 130, 246, 0.15);
        color: var(--color-contacted);
    }

    .badge-status.followup {
        background: rgba(245, 158, 11, 0.15);
        color: var(--color-followup);
    }

    .badge-status.converted {
        background: rgba(16, 185, 129, 0.15);
        color: var(--color-converted);
    }

    .badge-status.notinterested {
        background: rgba(239, 68, 68, 0.15);
        color: var(--color-notinterested);
    }

    /* ─── Action Icons Only (No Text) ─── */
    .action-icons {
        display: flex;
        gap: 8px;
        align-items: center;
        justify-content: center;
    }

    .action-icon {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        border: none;
    }

    .action-icon.whatsapp {
        background: rgba(37, 211, 102, 0.1);
        color: #25D366;
    }

    .action-icon.whatsapp:hover {
        background: #25D366;
        color: #fff;
        transform: translateY(-2px);
    }

    .action-icon.phone {
        background: rgba(59, 130, 246, 0.1);
        color: #3b82f6;
    }

    .action-icon.phone:hover {
        background: #3b82f6;
        color: #fff;
        transform: translateY(-2px);
    }

    .action-icon.edit {
        background: rgba(99, 102, 241, 0.1);
        color: #6366f1;
    }

    .action-icon.edit:hover {
        background: #6366f1;
        color: #fff;
        transform: translateY(-2px);
    }

    .action-icon.view {
        background: rgba(16, 185, 129, 0.1);
        color: #10b981;
    }

    .action-icon.view:hover {
        background: #10b981;
        color: #fff;
        transform: translateY(-2px);
    }

    /* ─── Mobile List View ─── */
    .mobile-leads-list {
        display: none;
        padding: 16px;
    }

    .mobile-lead-card {
        background: var(--sales-card);
        border: 1px solid var(--sales-border);
        border-radius: 16px;
        padding: 16px;
        margin-bottom: 12px;
        box-shadow: var(--sales-shadow);
    }

    .mobile-lead-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid var(--sales-border);
    }

    .mobile-lead-name {
        font-weight: 700;
        font-size: 15px;
        color: var(--sales-text);
    }

    .mobile-lead-row {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        font-size: 13px;
    }

    .mobile-lead-row span:first-child {
        color: var(--sales-muted);
    }

    .mobile-lead-row span:last-child {
        font-weight: 600;
        color: var(--sales-text);
    }

    .mobile-action-icons {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 12px;
        padding-top: 12px;
        border-top: 1px solid var(--sales-border);
    }

    /* ─── Modals ─── */
    .leads-modal {
        position: fixed;
        inset: 0;
        z-index: 1050;
        background: rgba(0, 0, 0, 0.65);
        backdrop-filter: blur(4px);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }

    .leads-modal.active {
        display: flex;
    }

    .leads-modal-box {
        width: 100%;
        max-width: 500px;
        background: var(--sales-card);
        border: 1px solid var(--sales-border);
        border-radius: 20px;
        overflow: hidden;
        animation: modalScale 0.25s ease;
    }

    @keyframes modalScale {
        from {
            transform: scale(0.95);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .leads-modal-header {
        padding: 18px 24px;
        border-bottom: 1px solid var(--sales-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .leads-modal-title {
        font-size: 18px;
        font-weight: 700;
        color: var(--sales-text);
    }

    .btn-modal-close {
        background: var(--sales-soft);
        border: none;
        color: var(--sales-muted);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 18px;
    }

    .btn-modal-close:hover {
        background: var(--sales-border);
        color: var(--sales-text);
    }

    .leads-modal-body {
        padding: 24px;
    }

    .status-select-grid {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 20px;
    }

    .status-opt-btn {
        background: var(--sales-soft);
        border: 1.5px solid var(--sales-border);
        border-radius: 12px;
        padding: 12px 16px;
        color: var(--sales-text);
        text-align: left;
        font-weight: 600;
        font-size: 13px;
        cursor: pointer;
        transition: all 0.25s;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .status-opt-btn:hover {
        background: var(--sales-border);
    }

    .status-opt-btn.active {
        border-color: var(--opt-color);
        background: var(--opt-bg);
        color: var(--opt-color);
    }

    .status-opt-btn i {
        font-size: 18px;
    }

    .modal-textarea {
        width: 100%;
        background-color: var(--sales-soft);
        border: 1.5px solid var(--sales-border);
        border-radius: 12px;
        padding: 12px;
        color: var(--sales-text);
        font-size: 13px;
        outline: none;
        min-height: 80px;
        resize: vertical;
        margin-top: 6px;
        font-family: inherit;
    }

    .modal-textarea:focus {
        border-color: var(--sales-primary);
    }

    .leads-empty {
        padding: 60px 20px;
        text-align: center;
        color: var(--sales-muted);
    }

    .leads-empty i {
        font-size: 48px;
        margin-bottom: 12px;
        display: block;
        opacity: 0.5;
    }

    /* ─── Responsive Queries ─── */
    @media (max-width: 1024px) {
        .kpi-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }
    }

    @media (max-width: 768px) {
        .sales-leads-page {
            padding: 16px !important;
        }

        .kpi-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 10px !important;
            margin-bottom: 16px !important;
        }
        
        .kpi-card {
            padding: 10px 12px !important;
            gap: 10px !important;
        }

        .kpi-icon-box {
            width: 36px !important;
            height: 36px !important;
            font-size: 16px !important;
            border-radius: 8px !important;
        }

        .kpi-label {
            font-size: 9px !important;
        }

        .kpi-value {
            font-size: 20px !important;
            margin-top: 2px !important;
        }

        .toolbar-flex {
            flex-direction: column;
            align-items: stretch;
        }

        .search-input-group {
            min-width: unset;
        }

        .filter-select,
        .btn-reset {
            width: 100%;
            justify-content: center;
        }

        .leads-table-wrap {
            display: none;
        }

        .mobile-leads-list {
            display: block !important;
            padding: 12px 0 !important;
        }

        .mobile-lead-card {
            margin-bottom: 12px !important;
            padding: 16px !important;
            border-radius: 16px !important;
            display: block !important;
        }

        .mobile-lead-name {
            font-size: 13px !important;
        }

        .mobile-lead-row {
            padding: 4px 0 !important;
            font-size: 11px !important;
        }

        .mobile-action-icons {
            gap: 8px !important;
            margin-top: 8px !important;
            padding-top: 8px !important;
            justify-content: center !important;
        }

        .mobile-action-icons .action-icon {
            width: 30px !important;
            height: 30px !important;
            font-size: 16px !important;
            border-radius: 8px !important;
        }
    }

    @media (max-width: 576px) {
        .kpi-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 8px !important;
        }
    }
</style>

<div class="page-wrapper sales-leads-page">
    <div class="page-content bg-transparent p-0">
        <div class="sales-container">

            <!-- Breadcrumb -->
            <div class="sales-breadcrumb">
                <a href="<?= base_url('admin/dashboard') ?>"><i class='bx bx-home-alt'></i> Dashboard</a>
                <i class='bx bx-chevron-right'></i>
                <span>My Leads</span>
            </div>

            <!-- Header Section -->
            <div>
                <h1 class="sales-header-title">My Leads</h1>
                <p class="sales-header-subtitle">
                    <?= $selected_product ? htmlspecialchars($selected_product->name) : 'All Connected Products' ?>
                </p>
            </div>

            <!-- KPI Cards Grid -->
            <div class="kpi-grid">
                <div class="kpi-card" style="--card-color: var(--color-contacted);">
                    <div class="kpi-icon-box"><i class='bx bx-phone-call'></i></div>
                    <div class="kpi-info">
                        <span class="kpi-label">Contacted</span>
                        <span class="kpi-value"><?= (int)($kpis['Contacted'] ?? 0) ?></span>
                    </div>
                </div>
                <div class="kpi-card" style="--card-color: var(--color-followup);">
                    <div class="kpi-icon-box"><i class='bx bx-time-five'></i></div>
                    <div class="kpi-info">
                        <span class="kpi-label">Follow Up</span>
                        <span class="kpi-value"><?= (int)($kpis['Follow Up'] ?? 0) ?></span>
                    </div>
                </div>
                <div class="kpi-card" style="--card-color: var(--color-converted);">
                    <div class="kpi-icon-box"><i class='bx bx-badge-check'></i></div>
                    <div class="kpi-info">
                        <span class="kpi-label">Converted</span>
                        <span class="kpi-value"><?= (int)($kpis['Converted'] ?? 0) ?></span>
                    </div>
                </div>
                <div class="kpi-card" style="--card-color: var(--color-notinterested);">
                    <div class="kpi-icon-box"><i class='bx bx-x-circle'></i></div>
                    <div class="kpi-info">
                        <span class="kpi-label">Not Interested</span>
                        <span class="kpi-value"><?= (int)($kpis['Not Interested'] ?? 0) ?></span>
                    </div>
                </div>
            </div>

            <!-- Toolbar/Filters -->
            <div class="toolbar-card">
                <form id="salesFilterForm" onsubmit="event.preventDefault(); triggerFilter();">
                    <input type="hidden" name="product_id" id="filterProductId" value="<?= htmlspecialchars($selected_product_id ?? '') ?>">
                    <input type="hidden" name="page" id="filterPage" value="<?= $page ?>">
                    <input type="hidden" name="sort_by" id="filterSortBy" value="<?= $sort_by ?>">
                    <input type="hidden" name="sort_dir" id="filterSortDir" value="<?= $sort_dir ?>">
                    <div class="toolbar-flex">
                        <div class="search-input-group">
                            <i class='bx bx-search'></i>
                            <input type="text" name="search" id="filterSearch" placeholder="Search by name, mobile, city..." value="<?= htmlspecialchars($search) ?>" oninput="debounceFilter()">
                        </div>
                        
                        <div class="date-filter-group" style="display: flex; gap: 8px; align-items: center; flex-wrap: wrap;">
                            <input type="date" name="date" id="filterDate" class="filter-select" style="min-width: 140px; padding: 8px 10px;" value="<?= htmlspecialchars($filter_date ?? '') ?>" onchange="onDateChanged()">
                            
                            <select class="filter-select" name="month" id="filterMonth" style="min-width: 130px;" onchange="onMonthYearChanged()">
                                <option value="">Select Month</option>
                                <option value="1" <?= (isset($filter_month) && $filter_month == '1') ? 'selected' : '' ?>>January</option>
                                <option value="2" <?= (isset($filter_month) && $filter_month == '2') ? 'selected' : '' ?>>February</option>
                                <option value="3" <?= (isset($filter_month) && $filter_month == '3') ? 'selected' : '' ?>>March</option>
                                <option value="4" <?= (isset($filter_month) && $filter_month == '4') ? 'selected' : '' ?>>April</option>
                                <option value="5" <?= (isset($filter_month) && $filter_month == '5') ? 'selected' : '' ?>>May</option>
                                <option value="6" <?= (isset($filter_month) && $filter_month == '6') ? 'selected' : '' ?>>June</option>
                                <option value="7" <?= (isset($filter_month) && $filter_month == '7') ? 'selected' : '' ?>>July</option>
                                <option value="8" <?= (isset($filter_month) && $filter_month == '8') ? 'selected' : '' ?>>August</option>
                                <option value="9" <?= (isset($filter_month) && $filter_month == '9') ? 'selected' : '' ?>>September</option>
                                <option value="10" <?= (isset($filter_month) && $filter_month == '10') ? 'selected' : '' ?>>October</option>
                                <option value="11" <?= (isset($filter_month) && $filter_month == '11') ? 'selected' : '' ?>>November</option>
                                <option value="12" <?= (isset($filter_month) && $filter_month == '12') ? 'selected' : '' ?>>December</option>
                            </select>
                            
                            <select name="year" id="filterYear" class="filter-select" style="min-width: 110px;" onchange="onMonthYearChanged()">
                                <option value="">Select Year</option>
                                <?php 
                                $curr_yr = (int)date('Y');
                                for ($yr = $curr_yr; $yr >= $curr_yr - 5; $yr--): ?>
                                    <option value="<?= $yr ?>" <?= (isset($filter_year) && $filter_year == $yr) ? 'selected' : '' ?>><?= $yr ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>

                        <select class="filter-select" name="product_id_selector" id="filterProductSelector" onchange="changeProduct(this.value)">
                            <option value="">All Products</option>
                            <?php foreach ($products as $p): ?>
                                <option value="<?= $p->id ?>" <?= ($selected_product_id == $p->id) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($p->name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <select class="filter-select" name="status" id="filterStatus" onchange="triggerFilter()">
                            <option value="">All Status</option>
                            <option value="New" <?= ($status_filter == 'New') ? 'selected' : '' ?>>New</option>
                            <option value="Contacted" <?= ($status_filter == 'Contacted') ? 'selected' : '' ?>>Contacted</option>
                            <option value="Follow Up" <?= ($status_filter == 'Follow Up') ? 'selected' : '' ?>>Follow Up</option>
                            <option value="Converted" <?= ($status_filter == 'Converted') ? 'selected' : '' ?>>Converted</option>
                            <option value="Not Interested" <?= ($status_filter == 'Not Interested') ? 'selected' : '' ?>>Not Interested</option>
                        </select>
                        <select class="filter-select" name="sort" id="filterSort" onchange="changeSort(this.value)">
                            <option value="pl.id|DESC" <?= ($sort_by == 'pl.id' && $sort_dir == 'DESC') ? 'selected' : '' ?>>Newest First</option>
                            <option value="pl.id|ASC" <?= ($sort_by == 'pl.id' && $sort_dir == 'ASC') ? 'selected' : '' ?>>Oldest First</option>
                            <option value="pl.name|ASC" <?= ($sort_by == 'pl.name' && $sort_dir == 'ASC') ? 'selected' : '' ?>>Name A-Z</option>
                            <option value="pl.name|DESC" <?= ($sort_by == 'pl.name' && $sort_dir == 'DESC') ? 'selected' : '' ?>>Name Z-A</option>
                            <option value="pl.city|ASC" <?= ($sort_by == 'pl.city' && $sort_dir == 'ASC') ? 'selected' : '' ?>>City A-Z</option>
                        </select>

                        <a href="javascript:void(0)" onclick="resetFilters()" class="btn-reset">
                            <i class='bx bx-refresh'></i> Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Leads List Card -->
            <div class="leads-card">
                <!-- Desktop Table View -->
                <div class="leads-table-wrap">
                    <table class="leads-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>City</th>
                                <th>Status</th>
                                <th style="text-align: center;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic Table Rows -->
                        </tbody>
                    </table>
                </div>

                <!-- Mobile List View -->
                <div class="mobile-leads-list">
                    <!-- Dynamic Cards -->
                </div>
            </div>

            <!-- Pagination container -->
            <div class="pagination-wrap" style="display: flex; justify-content: space-between; align-items: center; margin-top: 24px; padding: 12px 20px; background: var(--sales-card); border: 1px solid var(--sales-border); border-radius: 14px; box-shadow: var(--sales-shadow);">
                <div class="pagination-info" style="font-size: 13px; color: var(--sales-muted); font-weight: 500;">
                    Showing <span id="pagStart">0</span> to <span id="pagEnd">0</span> of <span id="pagTotal">0</span> entries
                </div>
                <div class="pagination-links" id="paginationLinks" style="display: flex; gap: 6px;">
                    <!-- Links dynamically generated -->
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal: Update Lead Status -->
<div class="leads-modal" id="updateStatusModal">
    <div class="leads-modal-box">
        <div class="leads-modal-header">
            <h5 class="leads-modal-title">Update Lead Status</h5>
            <button class="btn-modal-close" onclick="closeLeadsModal('updateStatusModal')"><i class='bx bx-x'></i></button>
        </div>
        <form id="updateStatusForm">
            <input type="hidden" name="lead_id" id="modalLeadId">
            <input type="hidden" name="status" id="modalStatusValue">
            <div class="leads-modal-body">
                <div class="status-select-grid">
                    <button type="button" class="status-opt-btn" data-status="New" style="--opt-color: var(--color-new); --opt-bg: rgba(99, 102, 241, 0.15);">
                        <i class='bx bx-mail-send'></i> New
                    </button>
                    <button type="button" class="status-opt-btn" data-status="Contacted" style="--opt-color: var(--color-contacted); --opt-bg: rgba(59, 130, 246, 0.15);">
                        <i class='bx bx-phone-call'></i> Contacted
                    </button>
                    <button type="button" class="status-opt-btn" data-status="Follow Up" style="--opt-color: var(--color-followup); --opt-bg: rgba(245, 158, 11, 0.15);">
                        <i class='bx bx-time-five'></i> Follow Up
                    </button>
                    <button type="button" class="status-opt-btn" data-status="Converted" style="--opt-color: var(--color-converted); --opt-bg: rgba(16, 185, 129, 0.15);">
                        <i class='bx bx-badge-check'></i> Converted
                    </button>
                    <button type="button" class="status-opt-btn" data-status="Not Interested" style="--opt-color: var(--color-notinterested); --opt-bg: rgba(239, 68, 68, 0.15);">
                        <i class='bx bx-x-circle'></i> Not Interested
                    </button>
                </div>
                <div class="mt-3">
                    <label style="font-size:11px; font-weight:700; color:var(--sales-muted); text-transform:uppercase;">Notes (Optional)</label>
                    <textarea class="modal-textarea" name="notes" id="modalNotesText" placeholder="Add notes about this status change..."></textarea>
                </div>
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <button type="button" class="btn-reset" onclick="closeLeadsModal('updateStatusModal')">Cancel</button>
                    <button type="submit" class="btn-action-update" id="submitUpdateBtn">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal: View Lead Details -->
<div class="leads-modal" id="viewDetailsModal">
    <div class="leads-modal-box">
        <div class="leads-modal-header">
            <h5 class="leads-modal-title">Lead Details</h5>
            <button class="btn-modal-close" onclick="closeLeadsModal('viewDetailsModal')"><i class='bx bx-x'></i></button>
        </div>
        <div class="leads-modal-body" id="detailsModalContent"></div>
        <div class="leads-modal-body pt-0 text-end">
            <button class="btn-reset" onclick="closeLeadsModal('viewDetailsModal')">Close</button>
        </div>
    </div>
</div>

<script>
    // Global filter parameters
    let filterDebounceTimeout = null;

    function openLeadsModal(id) {
        document.getElementById(id).classList.add('active');
    }

    function closeLeadsModal(id) {
        document.getElementById(id).classList.remove('active');
    }

    const optButtons = document.querySelectorAll('.status-opt-btn');
    optButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            optButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            document.getElementById('modalStatusValue').value = this.dataset.status;
        });
    });

    function openUpdateModal(leadId, currentStatus, currentNotes) {
        document.getElementById('modalLeadId').value = leadId;
        document.getElementById('modalStatusValue').value = currentStatus;
        document.getElementById('modalNotesText').value = currentNotes;

        optButtons.forEach(btn => {
            if (btn.dataset.status === currentStatus) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });

        openLeadsModal('updateStatusModal');
    }

    function contactLead(leadId, type, phoneNum, currentStatus) {
        const cleanPhone = phoneNum.replace(/[^0-9]/g, '');
        const link = type === 'whatsapp' ? `https://api.whatsapp.com/send?phone=${cleanPhone}` : `tel:${cleanPhone}`;
        window.open(link, '_blank');

        if (currentStatus === 'New') {
            const formData = new FormData();
            formData.append('id', leadId);
            formData.append('status', 'Contacted');
            formData.append('notes', 'Status automatically updated to Contacted via click-to-contact.');

            fetch('<?= site_url('sales/leads/update_status') ?>', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        triggerFilter(); // Reload current view without page refresh!
                    }
                })
                .catch(err => console.error(err));
        }
    }

    function viewLeadDetails(lead) {
        const wrap = document.getElementById('detailsModalContent');
        const badgeClass = lead.status.toLowerCase().replace(' ', '');
        wrap.innerHTML = `
            <div style="display:flex; flex-direction:column; gap:16px;">
                <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid var(--sales-border); padding-bottom:12px;">
                    <span style="font-size:18px; font-weight:700; color:var(--sales-text);">${lead.name}</span>
                    <span class="badge-status ${badgeClass}">${lead.status}</span>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div><span style="font-size:11px; color:var(--sales-muted); text-transform:uppercase; font-weight:700; display:block;">Mobile</span><span style="font-size:14px; font-weight:600; color:var(--sales-text);">${lead.mobile}</span></div>
                    <div><span style="font-size:11px; color:var(--sales-muted); text-transform:uppercase; font-weight:700; display:block;">City</span><span style="font-size:14px; font-weight:600; color:var(--sales-text);">${lead.city}</span></div>
                </div>
                <div><span style="font-size:11px; color:var(--sales-muted); text-transform:uppercase; font-weight:700; display:block;">Product</span><span style="font-size:14px; font-weight:600; color:var(--sales-primary);">${lead.product_name || 'N/A'}</span></div>
                <div><span style="font-size:11px; color:var(--sales-muted); text-transform:uppercase; font-weight:700; display:block;">Notes</span><p style="font-size:13px; line-height:1.5; color:var(--sales-text); margin:0;">${lead.notes || 'No notes recorded for this lead.'}</p></div>
                <div style="font-size:11px; color:var(--sales-muted); text-align:right;">Created: ${lead.created_at}</div>
            </div>
        `;
        openLeadsModal('viewDetailsModal');
    }

    document.getElementById('updateStatusForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const leadId = document.getElementById('modalLeadId').value;
        const status = document.getElementById('modalStatusValue').value;
        const notes = document.getElementById('modalNotesText').value;
        const submitBtn = document.getElementById('submitUpdateBtn');

        submitBtn.disabled = true;
        submitBtn.textContent = 'Updating...';

        const formData = new FormData();
        formData.append('id', leadId);
        formData.append('status', status);
        formData.append('notes', notes);

        fetch('<?= site_url('sales/leads/update_status') ?>', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    closeLeadsModal('updateStatusModal');
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Save Changes';
                    triggerFilter(); // Dynamic update without refresh!
                } else {
                    alert(data.message || 'Failed to update lead.');
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Save Changes';
                }
            })
            .catch(err => {
                console.error(err);
                alert('An error occurred. Please try again.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Save Changes';
            });
    });

    document.querySelectorAll('.leads-modal').forEach(m => m.addEventListener('click', e => {
        if (e.target === m) closeLeadsModal(m.id);
    }));

    // Dynamic show/hide of date inputs based on select type
    function toggleDateInputs() {
        const type = document.getElementById('filterDateType').value;
        
        // Hide all inputs first
        document.getElementById('filterSingleDate').style.display = 'none';
        document.getElementById('filterMonthYear').style.display = 'none';
        document.getElementById('filterYear').style.display = 'none';
        document.getElementById('filterRangeWrapper').style.display = 'none';
        
        // Clear value when changed to prevent mixing parameters
        if (type !== 'single') document.getElementById('filterSingleDate').value = '';
        if (type !== 'month') document.getElementById('filterMonthYear').value = '';
        if (type !== 'year') document.getElementById('filterYear').value = '';
        if (type !== 'range') {
            document.getElementById('filterStartDate').value = '';
            document.getElementById('filterEndDate').value = '';
        }

        // Show selected inputs
        if (type === 'single') {
            document.getElementById('filterSingleDate').style.display = 'inline-block';
        } else if (type === 'month') {
            document.getElementById('filterMonthYear').style.display = 'inline-block';
        } else if (type === 'year') {
            document.getElementById('filterYear').style.display = 'inline-block';
        } else if (type === 'range') {
            document.getElementById('filterRangeWrapper').style.display = 'inline-flex';
        }
        
        triggerFilter();
    }

    // AJAX leads fetcher
    function fetchLeads() {
        const productId = document.getElementById('filterProductId').value;
        const page = document.getElementById('filterPage').value;
        const sortBy = document.getElementById('filterSortBy').value;
        const sortDir = document.getElementById('filterSortDir').value;
        const search = document.getElementById('filterSearch').value;
        const status = document.getElementById('filterStatus').value;
        
        const date = document.getElementById('filterDate').value;
        const month = document.getElementById('filterMonth').value;
        const year = document.getElementById('filterYear').value;

        // Build URL parameters
        const params = new URLSearchParams({
            product_id: productId,
            page: page,
            sort_by: sortBy,
            sort_dir: sortDir,
            search: search,
            status: status,
            date: date,
            month: month,
            year: year,
            ajax: 1
        });

        // Add visual loading state
        const tbody = document.querySelector('.leads-table tbody');
        tbody.style.opacity = '0.5';
        const mobileList = document.querySelector('.mobile-leads-list');
        mobileList.style.opacity = '0.5';

        fetch(`<?= site_url('sales/leads') ?>?${params.toString()}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.json())
        .then(data => {
            tbody.style.opacity = '1';
            mobileList.style.opacity = '1';
            
            if (data.success) {
                // Update KPIs
                renderKpis(data.kpis);
                // Update Desktop Table
                renderTableRows(data.leads);
                // Update Mobile Cards
                renderMobileCards(data.leads);
                // Update Pagination Links
                renderPagination(parseInt(data.total_records), parseInt(data.page), parseInt(data.limit), parseInt(data.total_pages));
            }
        })
        .catch(err => {
            tbody.style.opacity = '1';
            mobileList.style.opacity = '1';
            console.error('Error fetching leads:', err);
        });
    }

    function renderKpis(kpis) {
        const cards = document.querySelectorAll('.kpi-card');
        cards.forEach(card => {
            const labelEl = card.querySelector('.kpi-label');
            if (labelEl) {
                const labelText = labelEl.textContent.trim();
                if (kpis[labelText] !== undefined) {
                    const valueEl = card.querySelector('.kpi-value');
                    if (valueEl) {
                        valueEl.textContent = kpis[labelText];
                    }
                }
            }
        });
    }

    function renderTableRows(leads) {
        const tbody = document.querySelector('.leads-table tbody');
        tbody.innerHTML = '';
        
        if (leads.length === 0) {
            tbody.innerHTML = `<tr><td colspan="5" style="text-align:center; padding: 40px; color: var(--sales-muted); font-weight: 500;"><i class='bx bx-message-alt-x' style="font-size:32px; display:block; opacity:0.5; margin-bottom:8px; color: var(--sales-muted);"></i>No leads found matching current criteria.</td></tr>`;
            return;
        }
        
        leads.forEach(l => {
            const badgeClass = l.status.toLowerCase().replace(' ', '');
            const tr = document.createElement('tr');
            
            const esc = (str) => {
                if (!str) return '';
                return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
            };

            const escAttr = (str) => {
                if (!str) return '';
                return str.replace(/'/g, '&#039;').replace(/"/g, '&quot;');
            };
            
            tr.innerHTML = `
                <td class="lead-name">${esc(l.name)}</td>
                <td>${esc(l.mobile)}</td>
                <td>${esc(l.city)}</td>
                <td><span class="badge-status ${badgeClass}">${esc(l.status)}</span></td>
                <td style="text-align: center;">
                    <div class="action-icons">
                        <a href="javascript:void(0)" onclick="contactLead(${l.id}, 'whatsapp', '${escAttr(l.mobile)}', '${escAttr(l.status)}')" class="action-icon whatsapp" title="WhatsApp">
                            <i class='bx bxl-whatsapp'></i>
                        </a>
                        <a href="javascript:void(0)" onclick="contactLead(${l.id}, 'phone', '${escAttr(l.mobile)}', '${escAttr(l.status)}')" class="action-icon phone" title="Call">
                            <i class='bx bx-phone'></i>
                        </a>
                        <button class="action-icon edit" onclick="openUpdateModal(${l.id}, '${escAttr(l.status)}', '${escAttr(l.notes || '')}')" title="Edit">
                            <i class='bx bx-edit-alt'></i>
                        </button>
                        <button class="action-icon view" onclick="viewLeadDetails(${JSON.stringify(l).replace(/"/g, '&quot;')})" title="View">
                            <i class='bx bx-show'></i>
                        </button>
                    </div>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    function renderMobileCards(leads) {
        const list = document.querySelector('.mobile-leads-list');
        list.innerHTML = '';
        
        if (leads.length === 0) {
            list.innerHTML = `<div style="grid-column: span 2; text-align:center; padding: 40px; color: var(--sales-muted); font-weight: 500;"><i class='bx bx-message-alt-x' style="font-size:32px; display:block; opacity:0.5; margin-bottom:8px; color: var(--sales-muted);"></i>No leads found matching current criteria.</div>`;
            return;
        }
        
        leads.forEach(l => {
            const badgeClass = l.status.toLowerCase().replace(' ', '');
            const card = document.createElement('div');
            card.className = 'mobile-lead-card';
            
            const esc = (str) => {
                if (!str) return '';
                return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
            };

            const escAttr = (str) => {
                if (!str) return '';
                return str.replace(/'/g, '&#039;').replace(/"/g, '&quot;');
            };
            
            card.innerHTML = `
                <div>
                    <div class="mobile-lead-header">
                        <span class="mobile-lead-name">${esc(l.name)}</span>
                        <span class="badge-status ${badgeClass}" style="padding: 2px 8px; font-size: 9px; line-height: 1.2;">${esc(l.status)}</span>
                    </div>
                    <div class="mobile-lead-row">
                        <span>Mobile</span>
                        <span>${esc(l.mobile)}</span>
                    </div>
                    <div class="mobile-lead-row">
                        <span>City</span>
                        <span>${esc(l.city)}</span>
                    </div>
                </div>
                <div class="mobile-action-icons">
                    <a href="javascript:void(0)" onclick="contactLead(${l.id}, 'whatsapp', '${escAttr(l.mobile)}', '${escAttr(l.status)}')" class="action-icon whatsapp" title="WhatsApp">
                        <i class='bx bxl-whatsapp'></i>
                    </a>
                    <a href="javascript:void(0)" onclick="contactLead(${l.id}, 'phone', '${escAttr(l.mobile)}', '${escAttr(l.status)}')" class="action-icon phone" title="Call">
                        <i class='bx bx-phone'></i>
                    </a>
                    <button class="action-icon edit" onclick="openUpdateModal(${l.id}, '${escAttr(l.status)}', '${escAttr(l.notes || '')}')" title="Edit">
                        <i class='bx bx-edit-alt'></i>
                    </button>
                    <button class="action-icon view" onclick="viewLeadDetails(${JSON.stringify(l).replace(/"/g, '&quot;')})" title="View">
                        <i class='bx bx-show'></i>
                    </button>
                </div>
            `;
            list.appendChild(card);
        });
    }

    function renderPagination(totalRecords, page, limit, totalPages) {
        const start = totalRecords === 0 ? 0 : (page - 1) * limit + 1;
        const end = Math.min(page * limit, totalRecords);
        
        document.getElementById('pagStart').textContent = start;
        document.getElementById('pagEnd').textContent = end;
        document.getElementById('pagTotal').textContent = totalRecords;
        
        const container = document.getElementById('paginationLinks');
        container.innerHTML = '';
        
        if (totalPages <= 1) {
            document.querySelector('.pagination-wrap').style.display = 'none';
            return;
        }
        document.querySelector('.pagination-wrap').style.display = 'flex';
        
        function addPageButton(p, active = false, disabled = false, text = null) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = text || p;
            btn.style.cssText = `
                border: 1px solid var(--sales-border);
                background: ${active ? 'linear-gradient(135deg, var(--sales-primary), var(--sales-secondary))' : 'var(--sales-soft)'};
                color: ${active ? '#fff' : 'var(--sales-text)'};
                padding: 6px 12px;
                font-size: 13px;
                font-weight: 600;
                border-radius: 8px;
                cursor: ${disabled ? 'default' : 'pointer'};
                transition: all 0.2s;
                outline: none;
            `;
            if (active) {
                btn.style.borderColor = 'var(--sales-primary)';
            }
            if (!disabled && !active) {
                btn.addEventListener('click', () => {
                    goToPage(p);
                });
            }
            container.appendChild(btn);
        }
        
        function addEllipsis() {
            const span = document.createElement('span');
            span.textContent = '...';
            span.style.cssText = 'padding: 6px 8px; font-size: 13px; color: var(--sales-muted);';
            container.appendChild(span);
        }
        
        if (page > 1) {
            addPageButton(page - 1, false, false, 'Prev');
        }
        
        if (totalPages <= 5) {
            for (let i = 1; i <= totalPages; i++) {
                addPageButton(i, i === page);
            }
        } else {
            // More than 5 pages, use dynamic ellipsis:
            if (page <= 2) {
                addPageButton(1, page === 1);
                addPageButton(2, page === 2);
                addPageButton(3, false);
                addEllipsis();
                addPageButton(totalPages, false);
            } else if (page >= totalPages - 1) {
                addPageButton(1, false);
                addEllipsis();
                addPageButton(totalPages - 2, page === totalPages - 2);
                addPageButton(totalPages - 1, page === totalPages - 1);
                addPageButton(totalPages, page === totalPages);
            } else {
                addPageButton(1, false);
                addEllipsis();
                addPageButton(page - 1, false);
                addPageButton(page, true);
                addPageButton(page + 1, false);
                addEllipsis();
                addPageButton(totalPages, false);
            }
        }
        
        if (page < totalPages) {
            addPageButton(page + 1, false, false, 'Next');
        }
    }

    function goToPage(p) {
        document.getElementById('filterPage').value = p;
        fetchLeads();
    }

    function triggerFilter() {
        document.getElementById('filterPage').value = 1; // Reset to page 1 on filter trigger
        fetchLeads();
    }

    function debounceFilter() {
        clearTimeout(filterDebounceTimeout);
        filterDebounceTimeout = setTimeout(triggerFilter, 300); // 300ms debounce
    }

    function changeProduct(val) {
        document.getElementById('filterProductId').value = val;
        // Also update sub-header text dynamically
        const selector = document.getElementById('filterProductSelector');
        const selectedText = selector.options[selector.selectedIndex].text;
        const subHeader = document.querySelector('.sales-header-subtitle');
        if (subHeader) {
            subHeader.textContent = val ? selectedText : 'All Connected Products';
        }
        triggerFilter();
    }

    function onDateChanged() {
        const dateVal = document.getElementById('filterDate').value;
        if (dateVal) {
            document.getElementById('filterMonth').value = '';
            document.getElementById('filterYear').value = '';
        }
        triggerFilter();
    }

    function onMonthYearChanged() {
        const monthVal = document.getElementById('filterMonth').value;
        const yearVal = document.getElementById('filterYear').value;
        if (monthVal || yearVal) {
            document.getElementById('filterDate').value = '';
        }
        triggerFilter();
    }

    function changeSort(val) {
        const parts = val.split('|');
        document.getElementById('filterSortBy').value = parts[0];
        document.getElementById('filterSortDir').value = parts[1];
        triggerFilter();
    }

    function resetFilters() {
        document.getElementById('filterSearch').value = '';
        document.getElementById('filterStatus').value = '';
        document.getElementById('filterSort').value = 'pl.id|DESC';
        document.getElementById('filterSortBy').value = 'pl.id';
        document.getElementById('filterSortDir').value = 'DESC';
        
        // Reset Date filters
        document.getElementById('filterDate').value = '';
        document.getElementById('filterMonth').value = '';
        document.getElementById('filterYear').value = '';
        
        triggerFilter();
    }

    // Fetch on page load
    document.addEventListener('DOMContentLoaded', function() {
        fetchLeads();
    });
</script>