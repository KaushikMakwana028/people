<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
    /* ── Override theme font to Poppins ─────────────── */
    body, .page-wrapper, .page-content,
    input, select, textarea, button, a {
        font-family: 'Poppins', sans-serif !important;
    }

    :root {
        --primary: #0A84FF;
        --primary-dark: #0066CC;
        --primary-light: #E3F2FD;
        --success: #10B981;
        --warning: #F59E0B;
        --danger: #EF4444;
        --info: #3B82F6;
        --q-text: #1A202C;
        --q-text-secondary: #6B7280;
        --q-border: #E5E7EB;
        --q-bg-light: #F9FAFB;
        --q-card-bg: #FFFFFF;
        --q-radius: 12px;
        --q-radius-sm: 8px;
        --q-shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
        --q-shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
        --q-shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1);
    }

    /* ── Scoped wrapper ─────────────────────────────── */
    .q-wrap {
        padding: 28px 24px;
    }

    .q-card {
        background: var(--q-card-bg);
        border-radius: var(--q-radius);
        box-shadow: var(--q-shadow-md);
        overflow: hidden;
        animation: qFadeIn 0.3s ease;
    }

    @keyframes qFadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Page Header ────────────────────────────────── */
    .q-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 24px 28px;
        border-bottom: 1px solid var(--q-border);
        background: linear-gradient(135deg, #FAFBFC 0%, #F3F4F6 100%);
        flex-wrap: wrap;
        gap: 14px;
    }

    .q-header h3 {
        font-size: 22px;
        font-weight: 700;
        color: var(--q-text);
        letter-spacing: -0.4px;
        margin: 0;
    }

    /* ── Buttons ────────────────────────────────────── */
    .q-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        padding: 9px 18px;
        border-radius: var(--q-radius-sm);
        border: none;
        font-family: 'Poppins', sans-serif;
        font-size: 13.5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none !important;
        white-space: nowrap;
    }

    .q-btn-primary {
        background: var(--primary);
        color: #fff !important;
        box-shadow: 0 2px 8px rgba(10,132,255,0.3);
    }

    .q-btn-primary:hover {
        background: var(--primary-dark);
        box-shadow: 0 4px 12px rgba(10,132,255,0.4);
        transform: translateY(-2px);
        color: #fff !important;
    }

    .q-btn-sm {
        padding: 6px 13px;
        font-size: 12px;
        font-weight: 500;
        border-radius: 7px;
    }

    .q-btn-info    { background: var(--info);    color: #fff !important; }
    .q-btn-info:hover    { background: #2563EB; color:#fff!important; transform:translateY(-1px); }
    .q-btn-warning { background: var(--warning); color: #fff !important; }
    .q-btn-warning:hover { background: #D97706; color:#fff!important; transform:translateY(-1px); }
    .q-btn-danger  { background: var(--danger);  color: #fff !important; }
    .q-btn-danger:hover  { background: #DC2626; color:#fff!important; transform:translateY(-1px); }

    /* ── Table ──────────────────────────────────────── */
    .q-table-wrap {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .q-table-wrap::-webkit-scrollbar { height: 6px; }
    .q-table-wrap::-webkit-scrollbar-track { background: var(--q-bg-light); }
    .q-table-wrap::-webkit-scrollbar-thumb { background: var(--q-border); border-radius: 3px; }
    .q-table-wrap::-webkit-scrollbar-thumb:hover { background: var(--q-text-secondary); }

    .q-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 13.5px;
        min-width: 700px;
    }

    .q-table thead {
        background: var(--q-bg-light);
        border-bottom: 2px solid var(--q-border);
    }

    .q-table thead th {
        padding: 14px 20px;
        text-align: left;
        font-weight: 600;
        color: var(--q-text-secondary);
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: 0.5px;
        white-space: nowrap;
    }

    .q-table tbody tr {
        border-bottom: 1px solid var(--q-border);
        transition: background 0.15s ease;
    }

    .q-table tbody tr:hover {
        background-color: #F8FAFF;
    }

    .q-table tbody tr:last-child {
        border-bottom: none;
    }

    .q-table tbody td {
        padding: 16px 20px;
        color: var(--q-text);
        vertical-align: middle;
    }

    /* ── Status Badge ───────────────────────────────── */
    .q-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: capitalize;
    }

    .q-status::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
        opacity: 0.7;
    }

    .q-status-draft    { background:#F3F4F6; color:#6B7280; }
    .q-status-pending  { background:#FEF3C7; color:#92400E; }
    .q-status-sent     { background:#DBEAFE; color:#0C4A6E; }
    .q-status-accepted { background:#DCFCE7; color:#166534; }
    .q-status-rejected { background:#FEE2E2; color:#991B1B; }
    .q-status-expired  { background:#F3F4F6; color:#6B7280; }

    /* ── Action cell ────────────────────────────────── */
    .q-actions {
        display: flex;
        gap: 7px;
        flex-wrap: wrap;
    }

    /* ── Empty State ────────────────────────────────── */
    .q-empty {
        padding: 64px 32px;
        text-align: center;
    }

    .q-empty-icon {
        font-size: 46px;
        color: var(--q-border);
        margin-bottom: 16px;
    }

    .q-empty-title {
        font-size: 16px;
        font-weight: 600;
        color: var(--q-text);
        margin-bottom: 8px;
    }

    .q-empty-text {
        font-size: 13px;
        color: var(--q-text-secondary);
        margin-bottom: 22px;
    }

    /* ── Responsive ─────────────────────────────────── */
    @media (max-width: 768px) {
        .q-wrap { padding: 16px; }
        .q-header { padding: 18px 20px; }
        .q-header h3 { font-size: 18px; }
        .q-actions { flex-direction: column; }
        .q-btn-sm { width: 100%; }
    }
</style>

<!-- ╔══════════════════════════════════════════════════╗
     ║  Rendered inside theme's .page-wrapper           ║
     ║  > .page-content from header/footer.             ║
     ╚══════════════════════════════════════════════════╝ -->

<div class="page-wrapper">
    <div class="page-content">
        <div class="q-wrap">
            <div class="q-card">

                <!-- Header -->
                <div class="q-header">
                    <h3>Quotations</h3>
                    <a href="<?= base_url('admin/quotations/create') ?>" class="q-btn q-btn-primary">
                        <i class="fas fa-plus"></i> Add Quotation
                    </a>
                </div>

                <!-- Table -->
                <div class="q-table-wrap">
                    <table class="q-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Quotation No</th>
                                <th>Customer</th>
                                <th>Company</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (!empty($quotations)): ?>

                                <?php foreach ($quotations as $row): ?>
                                    <tr>

                                        <td>
                                            <span style="color:var(--q-text-secondary);font-weight:500;">
                                                #<?= str_pad($row['id'], 4, '0', STR_PAD_LEFT) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span style="font-weight:600;color:var(--primary);">
                                                <?= htmlspecialchars($row['quotation_no']) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span style="font-weight:500;">
                                                <?= htmlspecialchars($row['customer_name']) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span style="color:var(--q-text-secondary);">
                                                <?= htmlspecialchars($row['company_name']) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span style="font-weight:600;color:var(--q-text);">
                                                ₹<?= number_format($row['total_amount'], 2) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="q-status q-status-<?= strtolower($row['status']) ?>">
                                                <?= ucfirst($row['status']) ?>
                                            </span>
                                        </td>

                                        <td>
                                            <div class="q-actions">
                                                <a href="<?= base_url('admin/quotations/view/' . $row['id']) ?>"
                                                   class="q-btn q-btn-info q-btn-sm" title="View">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                                <a href="<?= base_url('admin/quotations/edit/' . $row['id']) ?>"
                                                   class="q-btn q-btn-warning q-btn-sm" title="Edit">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="<?= base_url('admin/quotations/delete/' . $row['id']) ?>"
                                                   class="q-btn q-btn-danger q-btn-sm"
                                                   onclick="return confirm('Are you sure you want to delete this quotation?')"
                                                   title="Delete">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="7">
                                        <div class="q-empty">
                                            <div class="q-empty-icon">
                                                <i class="fas fa-file-invoice-dollar"></i>
                                            </div>
                                            <div class="q-empty-title">No Quotations Found</div>
                                            <div class="q-empty-text">Get started by creating your first quotation</div>
                                            <a href="<?= base_url('admin/quotations/create') ?>" class="q-btn q-btn-primary">
                                                <i class="fas fa-plus"></i> Create Quotation
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>