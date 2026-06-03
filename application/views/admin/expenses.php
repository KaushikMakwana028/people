<?php
function expense_format_rupees($amount) {
    $amount = (float) $amount;
    if ($amount >= 100000) return '&#8377;' . number_format($amount / 100000, 1) . 'L';
    if ($amount >= 1000) return '&#8377;' . number_format($amount / 1000, 0) . 'K';
    return '&#8377;' . number_format($amount, 0);
}

function expense_label($value) {
    return ucwords(str_replace('-', ' ', (string) $value));
}

function expense_status_badge($status) {
    $map = [
        'paid' => ['label' => 'Paid', 'color' => '#15803d', 'bg' => 'rgba(34,197,94,.14)', 'dot' => '#22c55e'],
        'pending' => ['label' => 'Pending', 'color' => '#b45309', 'bg' => 'rgba(245,158,11,.16)', 'dot' => '#f59e0b'],
        'cancelled' => ['label' => 'Cancelled', 'color' => '#b91c1c', 'bg' => 'rgba(239,68,68,.14)', 'dot' => '#ef4444'],
    ];
    $item = $map[$status] ?? ['label' => expense_label($status), 'color' => '#64748b', 'bg' => 'rgba(148,163,184,.16)', 'dot' => '#94a3b8'];

    return '<span class="exp-status" style="background:' . $item['bg'] . ';color:' . $item['color'] . '"><span style="background:' . $item['dot'] . '"></span>' . $item['label'] . '</span>';
}

function expense_category_icon($category) {
    $icons = [
        'office' => 'fa-building',
        'software' => 'fa-code',
        'hardware' => 'fa-laptop',
        'marketing' => 'fa-bullhorn',
        'travel' => 'fa-plane',
        'utilities' => 'fa-bolt',
        'salary' => 'fa-wallet',
        'other' => 'fa-receipt',
    ];
    return $icons[$category] ?? 'fa-receipt';
}
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
.expense-page {
    --exp-primary: #6366f1;
    --exp-primary-hover: #4f46e5;
    --exp-secondary: #8b5cf6;
    --exp-success: #16a34a;
    --exp-warning: #f59e0b;
    --exp-danger: #dc2626;
    --exp-text: var(--text-primary, #0f172a);
    --exp-muted: var(--text-secondary, #64748b);
    --exp-faint: var(--text-tertiary, #94a3b8);
    --exp-bg: var(--bg-secondary, #f8fafc);
    --exp-card: var(--bg-primary, #ffffff);
    --exp-soft: var(--bg-tertiary, #f1f5f9);
    --exp-border: var(--border-color, #e2e8f0);
    --exp-radius: 14px;
    --exp-radius-lg: 20px;
    --exp-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
    --exp-shadow-lg: 0 22px 60px rgba(15, 23, 42, 0.16);
    background: var(--exp-bg);
    min-height: calc(100vh - 73px);
    font-family: 'Poppins', sans-serif;
}

.exp-modal {
    --exp-primary: #6366f1;
    --exp-primary-hover: #4f46e5;
    --exp-secondary: #8b5cf6;
    --exp-success: #16a34a;
    --exp-warning: #f59e0b;
    --exp-danger: #dc2626;
    --exp-text: var(--text-primary, #0f172a);
    --exp-muted: var(--text-secondary, #64748b);
    --exp-faint: var(--text-tertiary, #94a3b8);
    --exp-bg: var(--bg-secondary, #f8fafc);
    --exp-card: var(--bg-primary, #ffffff);
    --exp-soft: var(--bg-tertiary, #f1f5f9);
    --exp-border: var(--border-color, #e2e8f0);
    --exp-shadow-lg: 0 22px 60px rgba(15, 23, 42, 0.16);
}

[data-bs-theme=dark] .expense-page {
    --exp-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
    --exp-shadow-lg: 0 22px 60px rgba(0, 0, 0, 0.45);
}

.expense-page .page-content {
    padding: 24px 20px;
}

.expense-shell {
    max-width: 1320px;
    margin: 0 auto;
}

.exp-breadcrumb {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--exp-faint);
    font-size: 12px;
    margin-bottom: 18px;
}

.exp-breadcrumb a {
    color: var(--exp-faint);
    text-decoration: none;
}

.exp-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 18px;
    margin-bottom: 22px;
}

.exp-title h1 {
    color: var(--exp-text);
    font-size: 28px;
    font-weight: 800;
    letter-spacing: -0.04em;
    margin: 0 0 6px;
}

.exp-title p {
    color: var(--exp-muted);
    margin: 0;
}

.exp-btn {
    border: 0;
    border-radius: 12px;
    padding: 10px 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    color: #fff;
    background: linear-gradient(135deg, var(--exp-primary), var(--exp-secondary));
    font-size: 13px;
    font-weight: 650;
    text-decoration: none;
    cursor: pointer;
    transition: transform .18s ease, box-shadow .18s ease;
}

.exp-btn:hover {
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 12px 22px rgba(99, 102, 241, .24);
}

.exp-btn-light {
    color: var(--exp-text);
    background: var(--exp-soft);
    border: 1px solid var(--exp-border);
}

.exp-btn-light:hover {
    color: var(--exp-primary);
    box-shadow: none;
}

.exp-btn-danger {
    background: var(--exp-danger);
}

.exp-stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 18px;
}

.exp-stat-card {
    padding: 18px;
    border-radius: var(--exp-radius-lg);
    background: var(--exp-card);
    border: 1px solid var(--exp-border);
    box-shadow: var(--exp-shadow);
}

.exp-stat-icon {
    width: 42px;
    height: 42px;
    display: grid;
    place-items: center;
    border-radius: 13px;
    margin-bottom: 12px;
    color: var(--stat-color);
    background: var(--stat-bg);
    font-size: 18px;
}

.exp-stat-value {
    color: var(--stat-color);
    font-size: 28px;
    line-height: 1;
    font-weight: 800;
    margin-bottom: 8px;
}

.exp-stat-label {
    color: var(--exp-muted);
    font-size: 12px;
    font-weight: 650;
    text-transform: uppercase;
    letter-spacing: .06em;
}

.exp-filter-card,
.exp-table-card {
    background: var(--exp-card);
    border: 1px solid var(--exp-border);
    border-radius: var(--exp-radius-lg);
    box-shadow: var(--exp-shadow);
    margin-bottom: 18px;
}

.exp-filter-card {
    padding: 14px;
}

.exp-filter-form {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.exp-search {
    position: relative;
    flex: 1;
    min-width: 220px;
}

.exp-search i {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: var(--exp-faint);
}

.exp-input,
.exp-select {
    width: 100%;
    min-height: 40px;
    padding: 9px 12px;
    border: 1px solid var(--exp-border);
    border-radius: 12px;
    color: var(--exp-text);
    background: var(--exp-bg);
    font-size: 13px;
    outline: 0;
    font-family: 'Poppins', sans-serif;
}

.exp-search .exp-input {
    padding-left: 36px;
}

.exp-input:focus,
.exp-select:focus,
.exp-textarea:focus {
    border-color: var(--exp-primary);
    box-shadow: 0 0 0 3px rgba(99, 102, 241, .14);
}

.exp-filter-form > .exp-select,
.exp-filter-form > .exp-input {
    width: auto;
    min-width: 150px;
}

.exp-table-head {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    padding: 16px 18px;
    border-bottom: 1px solid var(--exp-border);
}

.exp-table-head h3 {
    color: var(--exp-text);
    font-size: 15px;
    font-weight: 700;
    margin: 0;
}

.exp-count {
    color: var(--exp-faint);
    background: var(--exp-soft);
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 12px;
}

.exp-table-wrap {
    overflow-x: auto;
}

.exp-table {
    width: 100%;
    min-width: 860px;
    border-collapse: collapse;
}

.exp-table th,
.exp-table td {
    padding: 14px 16px;
    border-bottom: 1px solid var(--exp-border);
    vertical-align: middle;
}

.exp-table th {
    color: var(--exp-faint);
    background: var(--exp-bg);
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .07em;
}

.exp-table td {
    color: var(--exp-text);
    font-size: 13px;
}

.exp-table tr:hover td {
    background: var(--exp-bg);
}

.exp-main-cell {
    display: flex;
    align-items: center;
    gap: 10px;
}

.exp-category-icon {
    width: 38px;
    height: 38px;
    display: grid;
    place-items: center;
    border-radius: 12px;
    color: var(--exp-primary);
    background: rgba(99, 102, 241, .12);
}

.exp-name {
    font-weight: 700;
    color: var(--exp-text);
}

.exp-sub {
    color: var(--exp-faint);
    font-size: 12px;
    margin-top: 2px;
}

.exp-amount {
    color: var(--exp-primary);
    font-size: 16px;
    font-weight: 800;
}

.exp-chip {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 10px;
    border-radius: 999px;
    color: var(--exp-muted);
    background: var(--exp-soft);
    font-size: 12px;
    font-weight: 650;
}

.exp-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 5px 10px;
    border-radius: 999px;
    font-size: 12px;
    font-weight: 700;
}

.exp-status span {
    width: 6px;
    height: 6px;
    border-radius: 50%;
}

.exp-actions {
    display: flex;
    gap: 7px;
}

.exp-icon-btn {
    width: 34px;
    height: 34px;
    display: inline-grid;
    place-items: center;
    border-radius: 10px;
    border: 1px solid var(--exp-border);
    color: var(--exp-muted);
    background: var(--exp-card);
    cursor: pointer;
}

.exp-icon-btn:hover {
    color: var(--exp-primary);
    background: var(--exp-soft);
}

.exp-icon-btn.delete:hover {
    color: var(--exp-danger);
}

.exp-empty {
    padding: 52px 20px;
    text-align: center;
    color: var(--exp-faint);
}

.exp-empty i {
    font-size: 38px;
    margin-bottom: 12px;
}

.exp-mobile-list {
    display: none;
    padding: 12px;
}

.exp-mobile-card {
    padding: 14px;
    border: 1px solid var(--exp-border);
    border-radius: var(--exp-radius);
    background: var(--exp-card);
    margin-bottom: 10px;
}

.exp-mobile-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 10px;
}

.exp-mobile-row {
    display: flex;
    justify-content: space-between;
    gap: 12px;
    padding: 7px 0;
    border-top: 1px solid var(--exp-border);
    color: var(--exp-muted);
    font-size: 13px;
}

.exp-modal {
    position: fixed;
    inset: 0;
    z-index: 99999;
    display: none;
    align-items: center;
    justify-content: center;
    padding: 16px;
    background: rgba(15, 23, 42, .58);
}

.exp-modal.active {
    display: flex;
}

.exp-modal-box {
    width: 100%;
    max-width: 560px;
    max-height: 92vh;
    display: flex;
    flex-direction: column;
    border-radius: 22px;
    overflow: hidden;
    background: var(--exp-card);
    border: 1px solid var(--exp-border);
    box-shadow: var(--exp-shadow-lg);
}

.exp-modal-head,
.exp-modal-foot {
    padding: 16px 20px;
    border-bottom: 1px solid var(--exp-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
}

.exp-modal-foot {
    border-top: 1px solid var(--exp-border);
    border-bottom: 0;
    justify-content: flex-end;
}

.exp-modal-title {
    color: var(--exp-text);
    font-size: 18px;
    font-weight: 800;
}

.exp-modal-close {
    width: 34px;
    height: 34px;
    border: 0;
    border-radius: 10px;
    color: var(--exp-muted);
    background: var(--exp-soft);
}

.exp-modal-body {
    overflow-y: auto;
    padding: 20px;
}

.exp-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
}

.exp-field.full {
    grid-column: 1 / -1;
}

.exp-field label {
    color: var(--exp-muted);
    display: block;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 7px;
}

.exp-textarea {
    min-height: 96px;
    resize: vertical;
}

.exp-alert {
    padding: 12px 14px;
    border-radius: 12px;
    margin-bottom: 14px;
    background: var(--exp-card);
    border: 1px solid var(--exp-border);
}

.exp-alert.success {
    color: var(--exp-success);
}

.exp-alert.error {
    color: var(--exp-danger);
}

@media (max-width: 992px) {
    .exp-stats {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 720px) {
    .expense-page .page-content {
        padding: 16px 12px;
    }

    .exp-header {
        flex-direction: column;
    }

    .exp-header .exp-btn {
        width: 100%;
    }

    .exp-filter-form {
        align-items: stretch;
    }

    .exp-search,
    .exp-filter-form > .exp-select,
    .exp-filter-form > .exp-input,
    .exp-filter-form .exp-btn-light {
        width: 100%;
        min-width: 0;
    }

    .exp-table-wrap {
        display: none;
    }

    .exp-mobile-list {
        display: block;
    }

    .exp-form-grid {
        grid-template-columns: 1fr;
    }

    .exp-modal-foot {
        flex-direction: column-reverse;
    }

    .exp-modal-foot .exp-btn,
    .exp-modal-foot .exp-btn-light {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .exp-stats {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="page-wrapper expense-page">
    <div class="page-content">
        <div class="expense-shell">
            <div class="exp-breadcrumb">
                <a href="<?= base_url('admin/dashboard') ?>"><i class="fas fa-home"></i></a>
                <i class="fas fa-chevron-right"></i>
                <span>Expenses</span>
            </div>

            <?php if ($this->session->flashdata('success')): ?>
                <div class="exp-alert success"><i class="fas fa-check-circle me-1"></i><?= htmlspecialchars($this->session->flashdata('success')) ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="exp-alert error"><i class="fas fa-circle-exclamation me-1"></i><?= $this->session->flashdata('error') ?></div>
            <?php endif; ?>

            <div class="exp-header">
                <div class="exp-title">
                    <h1>Expense Management</h1>
                    <p>Track business spending, vendors, payment modes, and monthly totals in rupees.</p>
                </div>
                <button type="button" class="exp-btn" onclick="openExpenseModal('addExpenseModal')">
                    <i class="fas fa-plus"></i> Add Expense
                </button>
            </div>

            <div class="exp-stats">
                <div class="exp-stat-card">
                    <div class="exp-stat-icon" style="--stat-color:#6366f1;--stat-bg:rgba(99,102,241,.14);"><i class="fas fa-indian-rupee-sign"></i></div>
                    <div class="exp-stat-value" style="--stat-color:#6366f1;"><?= expense_format_rupees($total_this_month) ?></div>
                    <div class="exp-stat-label">Total This Month</div>
                </div>
                <div class="exp-stat-card">
                    <div class="exp-stat-icon" style="--stat-color:#16a34a;--stat-bg:rgba(34,197,94,.14);"><i class="fas fa-circle-check"></i></div>
                    <div class="exp-stat-value" style="--stat-color:#16a34a;"><?= expense_format_rupees($paid_this_month) ?></div>
                    <div class="exp-stat-label">Paid This Month</div>
                </div>
                <div class="exp-stat-card">
                    <div class="exp-stat-icon" style="--stat-color:#f59e0b;--stat-bg:rgba(245,158,11,.16);"><i class="fas fa-clock"></i></div>
                    <div class="exp-stat-value" style="--stat-color:#f59e0b;"><?= (int) $pending_count ?></div>
                    <div class="exp-stat-label">Pending Expenses</div>
                </div>
            </div>

            <div class="exp-filter-card">
                <form method="GET" action="<?= base_url('admin/expenses') ?>" class="exp-filter-form">
                    <div class="exp-search">
                        <i class="fas fa-search"></i>
                        <input type="text" class="exp-input" name="search" placeholder="Search title, vendor, notes..." value="<?= htmlspecialchars($search ?? '') ?>">
                    </div>
                    <select class="exp-select" name="category">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category ?>" <?= ($active_category ?? '') === $category ? 'selected' : '' ?>><?= expense_label($category) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select class="exp-select" name="payment_status">
                        <option value="">All Status</option>
                        <?php foreach ($payment_statuses as $status): ?>
                            <option value="<?= $status ?>" <?= ($active_payment_status ?? '') === $status ? 'selected' : '' ?>><?= expense_label($status) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="date" class="exp-input" name="date_from" value="<?= htmlspecialchars($date_from ?? '') ?>">
                    <input type="date" class="exp-input" name="date_to" value="<?= htmlspecialchars($date_to ?? '') ?>">
                    <button type="submit" class="exp-btn"><i class="fas fa-filter"></i> Filter</button>
                    <?php if (($search ?? '') || ($active_category ?? '') || ($active_payment_status ?? '') || ($date_from ?? '') || ($date_to ?? '')): ?>
                        <a href="<?= base_url('admin/expenses') ?>" class="exp-btn exp-btn-light"><i class="fas fa-xmark"></i> Clear</a>
                    <?php endif; ?>
                </form>
            </div>

            <div class="exp-table-card">
                <div class="exp-table-head">
                    <h3><i class="fas fa-receipt me-2" style="color:var(--exp-primary)"></i>All Expenses</h3>
                    <span class="exp-count"><?= count($expenses) ?> records</span>
                </div>

                <?php if (empty($expenses)): ?>
                    <div class="exp-empty">
                        <i class="fas fa-receipt"></i>
                        <h4>No expenses found</h4>
                        <p>Add a new expense or adjust your filters.</p>
                    </div>
                <?php else: ?>
                    <div class="exp-table-wrap">
                        <table class="exp-table">
                            <thead>
                                <tr>
                                    <th>Expense</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Vendor</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($expenses as $expense): ?>
                                    <tr>
                                        <td>
                                            <div class="exp-main-cell">
                                                <div class="exp-category-icon"><i class="fas <?= expense_category_icon($expense['category']) ?>"></i></div>
                                                <div>
                                                    <div class="exp-name"><?= htmlspecialchars($expense['title']) ?></div>
                                                    <div class="exp-sub"><?= htmlspecialchars($expense['notes'] ?: 'No notes') ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="exp-chip"><?= expense_label($expense['category']) ?></span></td>
                                        <td><span class="exp-amount"><?= expense_format_rupees($expense['amount']) ?></span></td>
                                        <td><?= date('d M Y', strtotime($expense['expense_date'])) ?></td>
                                        <td><span class="exp-chip"><?= expense_label($expense['payment_mode']) ?></span></td>
                                        <td><?= expense_status_badge($expense['payment_status']) ?></td>
                                        <td><?= htmlspecialchars($expense['vendor'] ?: '-') ?></td>
                                        <td>
                                            <div class="exp-actions">
                                                <button type="button" class="exp-icon-btn" onclick='openEditExpense(<?= json_encode($expense, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)' title="Edit">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <button type="button" class="exp-icon-btn delete" onclick="confirmExpenseDelete(<?= (int) $expense['id'] ?>)" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="exp-mobile-list">
                        <?php foreach ($expenses as $expense): ?>
                            <div class="exp-mobile-card">
                                <div class="exp-mobile-top">
                                    <div class="exp-main-cell">
                                        <div class="exp-category-icon"><i class="fas <?= expense_category_icon($expense['category']) ?>"></i></div>
                                        <div>
                                            <div class="exp-name"><?= htmlspecialchars($expense['title']) ?></div>
                                            <div class="exp-sub"><?= date('d M Y', strtotime($expense['expense_date'])) ?></div>
                                        </div>
                                    </div>
                                    <span class="exp-amount"><?= expense_format_rupees($expense['amount']) ?></span>
                                </div>
                                <div class="exp-mobile-row"><span>Category</span><strong><?= expense_label($expense['category']) ?></strong></div>
                                <div class="exp-mobile-row"><span>Payment</span><strong><?= expense_label($expense['payment_mode']) ?></strong></div>
                                <div class="exp-mobile-row"><span>Status</span><?= expense_status_badge($expense['payment_status']) ?></div>
                                <div class="exp-mobile-row"><span>Vendor</span><strong><?= htmlspecialchars($expense['vendor'] ?: '-') ?></strong></div>
                                <div class="exp-actions mt-2">
                                    <button type="button" class="exp-icon-btn" onclick='openEditExpense(<?= json_encode($expense, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)'><i class="fas fa-pen"></i></button>
                                    <button type="button" class="exp-icon-btn delete" onclick="confirmExpenseDelete(<?= (int) $expense['id'] ?>)"><i class="fas fa-trash"></i></button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="exp-modal" id="addExpenseModal">
    <div class="exp-modal-box">
        <form method="post" action="<?= base_url('admin/expenses/store') ?>">
            <div class="exp-modal-head">
                <div class="exp-modal-title">Add Expense</div>
                <button type="button" class="exp-modal-close" onclick="closeExpenseModal('addExpenseModal')"><i class="fas fa-times"></i></button>
            </div>
            <div class="exp-modal-body">
                <?php $this->load->view('admin/partials/expense_form_fields', compact('categories', 'payment_modes', 'payment_statuses')); ?>
            </div>
            <div class="exp-modal-foot">
                <button type="button" class="exp-btn exp-btn-light" onclick="closeExpenseModal('addExpenseModal')">Cancel</button>
                <button type="submit" class="exp-btn"><i class="fas fa-plus"></i> Save Expense</button>
            </div>
        </form>
    </div>
</div>

<div class="exp-modal" id="editExpenseModal">
    <div class="exp-modal-box">
        <form method="post" id="editExpenseForm" action="#">
            <div class="exp-modal-head">
                <div class="exp-modal-title">Edit Expense</div>
                <button type="button" class="exp-modal-close" onclick="closeExpenseModal('editExpenseModal')"><i class="fas fa-times"></i></button>
            </div>
            <div class="exp-modal-body">
                <?php $this->load->view('admin/partials/expense_form_fields', compact('categories', 'payment_modes', 'payment_statuses')); ?>
            </div>
            <div class="exp-modal-foot">
                <button type="button" class="exp-btn exp-btn-light" onclick="closeExpenseModal('editExpenseModal')">Cancel</button>
                <button type="submit" class="exp-btn"><i class="fas fa-check"></i> Update Expense</button>
            </div>
        </form>
    </div>
</div>

<div class="exp-modal" id="deleteExpenseModal">
    <div class="exp-modal-box" style="max-width:390px">
        <div class="exp-modal-head">
            <div class="exp-modal-title" style="color:var(--exp-danger)">Delete Expense</div>
            <button type="button" class="exp-modal-close" onclick="closeExpenseModal('deleteExpenseModal')"><i class="fas fa-times"></i></button>
        </div>
        <div class="exp-modal-body">
            <p class="mb-0" style="color:var(--exp-muted)">Are you sure you want to delete this expense? This action cannot be undone.</p>
        </div>
        <div class="exp-modal-foot">
            <button type="button" class="exp-btn exp-btn-light" onclick="closeExpenseModal('deleteExpenseModal')">Cancel</button>
            <a href="#" id="deleteExpenseBtn" class="exp-btn exp-btn-danger"><i class="fas fa-trash"></i> Delete</a>
        </div>
    </div>
</div>

<script>
const expenseBaseUrl = '<?= base_url() ?>';

function openExpenseModal(id) {
    document.getElementById(id).classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeExpenseModal(id) {
    document.getElementById(id).classList.remove('active');
    document.body.style.overflow = '';
}

function openEditExpense(expense) {
    const modal = document.getElementById('editExpenseModal');
    const form = document.getElementById('editExpenseForm');

    form.action = expenseBaseUrl + 'admin/expenses/update/' + expense.id;
    form.querySelector('[name="title"]').value = expense.title || '';
    form.querySelector('[name="category"]').value = expense.category || 'other';
    form.querySelector('[name="amount"]').value = expense.amount || '';
    form.querySelector('[name="expense_date"]').value = expense.expense_date || '';
    form.querySelector('[name="payment_mode"]').value = expense.payment_mode || 'cash';
    form.querySelector('[name="payment_status"]').value = expense.payment_status || 'paid';
    form.querySelector('[name="vendor"]').value = expense.vendor || '';
    form.querySelector('[name="notes"]').value = expense.notes || '';

    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function confirmExpenseDelete(id) {
    document.getElementById('deleteExpenseBtn').href = expenseBaseUrl + 'admin/expenses/delete/' + id;
    openExpenseModal('deleteExpenseModal');
}

document.querySelectorAll('.exp-modal').forEach(function (modal) {
    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            closeExpenseModal(modal.id);
        }
    });
});

document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        document.querySelectorAll('.exp-modal.active').forEach(function (modal) {
            closeExpenseModal(modal.id);
        });
    }
});
</script>
