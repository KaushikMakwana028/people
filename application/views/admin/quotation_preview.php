<div class="page-wrapper">
    <div class="page-content">
        
        <!-- Page Header -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Quotations Management</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/quotations') ?>">Quotations</a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Details</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Main Quotation Card -->
        <div class="card radius-10">
            <div class="card-header bg-transparent border-bottom py-3">
                <div class="d-flex align-items-center justify-content-between flex-wrap">
                    <div>
                        <h5 class="mb-1 fw-bold">Quotation Details</h5>
                        <p class="mb-0 text-muted small"><?= $quotation['quotation_no'] ?></p>
                    </div>
                    <div class="mt-2 mt-sm-0">
                        <span class="badge bg-<?= getStatusBadgeClass($quotation['status']) ?> px-3 py-2 fs-6">
                            <?= ucfirst($quotation['status']) ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="card-body p-3 p-md-4">
                
                <!-- Customer Information -->
                <div class="info-section mb-4">
                    <div class="section-header mb-3">
                        <h6 class="section-title">
                            <i class="bx bx-user me-2"></i>Customer Information
                        </h6>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="info-label">Customer Name</label>
                                <p class="info-value">
                                    <i class="bx bx-user text-primary me-2"></i>
                                    <?= $quotation['customer_name'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="info-label">Company Name</label>
                                <p class="info-value">
                                    <i class="bx bx-buildings text-primary me-2"></i>
                                    <?= $quotation['company_name'] ?: 'N/A' ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="info-label">Email Address</label>
                                <p class="info-value">
                                    <i class="bx bx-envelope text-primary me-2"></i>
                                    <a href="mailto:<?= $quotation['customer_email'] ?>" class="text-decoration-none">
                                        <?= $quotation['customer_email'] ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="info-label">Phone Number</label>
                                <p class="info-value">
                                    <i class="bx bx-phone text-primary me-2"></i>
                                    <a href="tel:<?= $quotation['customer_phone'] ?>" class="text-decoration-none">
                                        <?= $quotation['customer_phone'] ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Quotation Details -->
                <div class="info-section mb-4">
                    <div class="section-header mb-3">
                        <h6 class="section-title">
                            <i class="bx bx-file me-2"></i>Quotation Details
                        </h6>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="info-label">Quotation Number</label>
                                <p class="info-value">
                                    <i class="bx bx-hash text-primary me-2"></i>
                                    <span class="badge bg-light text-dark"><?= $quotation['quotation_no'] ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-item">
                                <label class="info-label">Status</label>
                                <p class="info-value">
                                    <i class="bx bx-flag text-primary me-2"></i>
                                    <span class="badge bg-<?= getStatusBadgeClass($quotation['status']) ?>">
                                        <?= ucfirst($quotation['status']) ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="info-item">
                                <label class="info-label">Total Amount</label>
                                <div class="amount-display">
                                    <span class="currency-symbol">₹</span>
                                    <span class="amount-value"><?= number_format($quotation['total_amount'], 2) ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(!empty($quotation['notes'])): ?>
                <hr class="my-4">

                <!-- Additional Notes -->
                <div class="info-section mb-4">
                    <div class="section-header mb-3">
                        <h6 class="section-title">
                            <i class="bx bx-note me-2"></i>Notes & Comments
                        </h6>
                    </div>
                    <div class="notes-content">
                        <p class="mb-0"><?= nl2br(htmlspecialchars($quotation['notes'])) ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Action Buttons -->
                <div class="action-buttons mt-4 pt-3 border-top">
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="<?= base_url('admin/quotations') ?>" class="btn btn-light px-4">
                            <i class="bx bx-arrow-back me-1"></i>Back to List
                        </a>
                        <a href="<?= base_url('admin/quotations/edit/'.$quotation['id']) ?>" class="btn btn-primary px-4">
                            <i class="bx bx-edit me-1"></i>Edit
                        </a>
                        <button type="button" class="btn btn-success px-4" onclick="printQuotation()">
                            <i class="bx bx-printer me-1"></i>Print
                        </button>
                        <button type="button" class="btn btn-info px-4" onclick="downloadPDF()">
                            <i class="bx bx-download me-1"></i>Download PDF
                        </button>
                        <button type="button" class="btn btn-danger px-4 ms-auto" onclick="deleteQuotation(<?= $quotation['id'] ?>)">
                            <i class="bx bx-trash me-1"></i>Delete
                        </button>
                    </div>
                </div>

            </div>
        </div>

        <!-- Timeline Card -->
        <div class="card radius-10 mt-4">
            <div class="card-header bg-transparent border-bottom py-3">
                <h6 class="mb-0 fw-bold">
                    <i class="bx bx-history me-2"></i>Activity Timeline
                </h6>
            </div>
            <div class="card-body p-3 p-md-4">
                <div class="activity-timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-success"></div>
                        <div class="timeline-content">
                            <p class="mb-1 fw-semibold">Quotation Created</p>
                            <small class="text-muted">
                                <i class="bx bx-calendar me-1"></i>
                                <?= date('F d, Y \a\t h:i A', strtotime($quotation['created_at'] ?? 'now')) ?>
                            </small>
                        </div>
                    </div>
                    <?php if(isset($quotation['updated_at']) && $quotation['updated_at'] != $quotation['created_at']): ?>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-info"></div>
                        <div class="timeline-content">
                            <p class="mb-1 fw-semibold">Quotation Updated</p>
                            <small class="text-muted">
                                <i class="bx bx-calendar me-1"></i>
                                <?= date('F d, Y \a\t h:i A', strtotime($quotation['updated_at'])) ?>
                            </small>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-<?= getStatusBadgeClass($quotation['status']) ?>"></div>
                        <div class="timeline-content">
                            <p class="mb-1 fw-semibold">Current Status: <?= ucfirst($quotation['status']) ?></p>
                            <small class="text-muted">Status updated</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
// Helper function for status badge colors
function getStatusBadgeClass($status) {
    $classes = [
        'draft' => 'secondary',
        'pending' => 'warning',
        'accepted' => 'success',
        'rejected' => 'danger'
    ];
    return $classes[$status] ?? 'secondary';
}
?>

<style>
    /* Card Styling */
    .card.radius-10 {
        border-radius: 12px;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
        border: none;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        border-bottom: 2px solid #e9ecef !important;
    }

    /* Breadcrumb */
    .page-breadcrumb {
        background: #fff;
        padding: 15px 20px;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .breadcrumb {
        background: transparent;
        font-size: 14px;
    }

    .breadcrumb-item a {
        color: #6c757d;
        text-decoration: none;
        transition: color 0.3s;
    }

    .breadcrumb-item a:hover {
        color: #0d6efd;
    }

    .breadcrumb-item.active {
        color: #495057;
    }

    /* Section Headers */
    .section-header {
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 10px;
    }

    .section-title {
        font-size: 15px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
        letter-spacing: 0.3px;
    }

    .section-title i {
        color: #0d6efd;
        font-size: 18px;
    }

    /* Info Items */
    .info-item {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        border-left: 3px solid #0d6efd;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        background: #e9ecef;
        transform: translateX(5px);
    }

    .info-label {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        color: #6c757d;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 15px;
        color: #2c3e50;
        margin: 0;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .info-value a {
        color: #0d6efd;
        transition: color 0.3s;
    }

    .info-value a:hover {
        color: #0a58ca;
        text-decoration: underline !important;
    }

    .info-value i {
        font-size: 18px;
    }

    /* Amount Display */
    .amount-display {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        color: white;
        padding: 20px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 15px rgba(13, 110, 253, 0.3);
    }

    .currency-symbol {
        font-size: 24px;
        font-weight: 600;
    }

    .amount-value {
        font-size: 32px;
        font-weight: 700;
    }

    /* Notes Content */
    .notes-content {
        background: #fff9e6;
        border-left: 4px solid #ffc107;
        padding: 20px;
        border-radius: 8px;
        font-size: 14px;
        line-height: 1.8;
        color: #495057;
    }

    /* Badges */
    .badge {
        font-weight: 500;
        padding: 6px 12px;
        font-size: 13px;
    }

    /* Timeline */
    .activity-timeline {
        padding: 10px 0;
    }

    .timeline-item {
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        position: relative;
    }

    .timeline-item:not(:last-child)::after {
        content: '';
        position: absolute;
        left: 7px;
        top: 25px;
        bottom: -25px;
        width: 2px;
        background: #e9ecef;
    }

    .timeline-marker {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 3px;
        box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.1);
    }

    .timeline-content {
        flex: 1;
    }

    .timeline-content p {
        font-size: 14px;
        color: #2c3e50;
    }

    .timeline-content small {
        font-size: 12px;
        color: #6c757d;
    }

    /* Buttons */
    .btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 10px 20px;
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
    }

    .btn i {
        font-size: 16px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        box-shadow: 0 2px 8px rgba(13, 110, 253, 0.2);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.3);
    }

    .btn-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.2);
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }

    .btn-info {
        background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        box-shadow: 0 2px 8px rgba(23, 162, 184, 0.2);
    }

    .btn-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(23, 162, 184, 0.3);
    }

    .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.2);
    }

    .btn-danger:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
    }

    .btn-light {
        background-color: #f8f9fa;
        border: 1.5px solid #dee2e6;
        color: #495057;
    }

    .btn-light:hover {
        background-color: #e2e6ea;
        border-color: #dae0e5;
        color: #495057;
    }

    /* Horizontal Rule */
    hr {
        border: 0;
        border-top: 1.5px solid #e9ecef;
        opacity: 1;
        margin: 1.5rem 0;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .page-breadcrumb {
            padding: 12px 15px;
            margin-bottom: 15px !important;
        }

        .breadcrumb-title {
            font-size: 14px;
        }

        .card-body {
            padding: 20px 15px !important;
        }

        .card-header {
            padding: 15px !important;
        }

        .card-header h5 {
            font-size: 18px;
        }

        .section-title {
            font-size: 14px;
        }

        .section-title i {
            font-size: 16px;
        }

        .info-item {
            padding: 12px;
        }

        .info-label {
            font-size: 11px;
        }

        .info-value {
            font-size: 14px;
        }

        .amount-display {
            padding: 15px;
            width: 100%;
            justify-content: center;
        }

        .currency-symbol {
            font-size: 20px;
        }

        .amount-value {
            font-size: 26px;
        }

        .notes-content {
            padding: 15px;
            font-size: 13px;
        }

        .btn {
            width: 100%;
            margin-bottom: 8px;
        }

        .action-buttons .d-flex {
            flex-direction: column;
        }

        .btn.ms-auto {
            margin-left: 0 !important;
        }

        .timeline-item {
            gap: 10px;
        }

        .timeline-marker {
            width: 14px;
            height: 14px;
        }
    }

    @media (max-width: 576px) {
        .page-breadcrumb {
            display: block !important;
        }

        .page-breadcrumb .breadcrumb-title {
            padding: 0 !important;
            margin-bottom: 8px;
        }

        .page-breadcrumb .ps-3 {
            padding-left: 0 !important;
        }

        .card.radius-10 {
            border-radius: 8px;
        }

        .info-section {
            margin-bottom: 1.5rem !important;
        }

        .badge {
            font-size: 12px;
            padding: 5px 10px;
        }
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card.radius-10 {
        animation: fadeIn 0.4s ease-out;
    }

    /* Print Styles */
    @media print {
        .page-breadcrumb,
        .action-buttons,
        .btn {
            display: none !important;
        }

        .card {
            box-shadow: none !important;
            border: 1px solid #dee2e6 !important;
        }

        .card-header {
            background: #f8f9fa !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
    }
</style>

<script>
    // Print functionality
    function printQuotation() {
        window.print();
    }

    // Download PDF functionality
    function downloadPDF() {
        showSweetAlert('PDF download functionality would be implemented here.\nThis requires a PDF generation library like jsPDF or server-side PDF generation.', 'info');
        // Implementation would go here
        // window.location.href = '<?= base_url('admin/quotations/download-pdf/'.$quotation['id']) ?>';
    }

    // Delete functionality
    function deleteQuotation(id) {
        Swal.fire({
            icon: 'warning',
            title: 'Are you sure?',
            text: 'Are you sure you want to delete this quotation? This action cannot be undone.',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Yes',
            cancelButtonText: 'Cancel'
        }).then(result => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('admin/quotations/delete/') ?>' + id;
            }
        });
    }

    // Copy quotation number to clipboard
    document.addEventListener('DOMContentLoaded', function() {
        const quotationBadges = document.querySelectorAll('.badge.bg-light');
        quotationBadges.forEach(badge => {
            badge.style.cursor = 'pointer';
            badge.title = 'Click to copy';
            badge.addEventListener('click', function() {
                const text = this.textContent.trim();
                navigator.clipboard.writeText(text).then(() => {
                    const originalText = this.textContent;
                    this.textContent = 'Copied!';
                    setTimeout(() => {
                        this.textContent = originalText;
                    }, 2000);
                });
            });
        });
    });
</script>
