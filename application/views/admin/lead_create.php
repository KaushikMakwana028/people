<div class="page-wrapper">
    <div class="page-content">

        <!-- Page Header -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-4">
            <div class="breadcrumb-title pe-3">Leads Management</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/leads') ?>">Leads</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Lead</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="card radius-10">
            <div class="card-header bg-transparent border-bottom py-3">
                <div class="d-flex align-items-center flex-wrap">
                    <div class="flex-grow-1">
                        <h5 class="mb-1 fw-bold">Add New Lead</h5>
                        <p class="mb-0 text-muted small">Fill in the details to create a new lead</p>
                    </div>
                    <div class="mt-2 mt-sm-0">
                        <a href="<?= base_url('admin/leads') ?>" class="btn btn-sm btn-outline-secondary">
                            <i class="bx bx-arrow-back me-1"></i>Back to List
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body p-3 p-md-4">
                <form method="post" action="<?= base_url('admin/leads/store') ?>" id="leadForm">

                    <!-- Personal Information Section -->
                    <div class="form-section mb-4">
                        <div class="section-header mb-3">
                            <h6 class="section-title">
                                <i class="bx bx-user me-2"></i>Personal Information
                            </h6>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text"
                                        name="name"
                                        class="form-control"
                                        placeholder="Enter full name"
                                        required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="example@email.com">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                    <input type="text"
                                        name="phone"
                                        class="form-control"
                                       placeholder="+91 98765 43210">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Company</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input type="text"
                                        name="company"
                                        class="form-control"
                                        placeholder="Company name">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Lead Details Section -->
                    <div class="form-section mb-4">
                        <div class="section-header mb-3">
                            <h6 class="section-title">
                                <i class="bx bx-detail me-2"></i>Lead Details
                            </h6>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Source</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-radar"></i></span>
                                    <select name="source" class="form-select">
                                        <option value="Website">Website</option>
                                        <option value="Referral">Referral</option>
                                        <option value="LinkedIn">LinkedIn</option>
                                        <option value="Cold Call">Cold Call</option>
                                        <option value="Email Campaign">Email Campaign</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Status</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-flag"></i></span>
                                    <select name="status" class="form-select">
                                        <option value="new">New</option>
                                        <option value="contacted">Contacted</option>
                                        <option value="qualified">Qualified</option>
                                        <option value="lost">Lost</option>
                                        <option value="converted">Converted</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- Additional Information Section -->
                    <div class="form-section mb-4">
                        <div class="section-header mb-3">
                            <h6 class="section-title">
                                <i class="bx bx-note me-2"></i>Additional Information
                            </h6>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes"
                                    rows="5"
                                    class="form-control"
                                    placeholder="Add any additional notes or comments about this lead..."></textarea>
                                <small class="text-muted d-block mt-2">Optional: Any relevant information about the lead</small>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <div class="d-flex gap-2 flex-column flex-sm-row justify-content-end">
                            <a href="<?= base_url('admin/leads') ?>" class="btn btn-light px-4 order-2 order-sm-1">
                                <i class="bx bx-x me-1"></i>Cancel
                            </a>
                            <button type="reset" class="btn btn-secondary px-4 order-3 order-sm-2">
                                <i class="bx bx-reset me-1"></i>Reset
                            </button>
                            <button type="submit" class="btn btn-success px-4 order-1 order-sm-3">
                                <i class="bx bx-check me-1"></i>Save Lead
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

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

    /* Form Elements */
    .form-label {
        font-size: 14px;
        font-weight: 500;
        color: #495057;
        margin-bottom: 8px;
    }

    .form-control,
    .form-select {
        border: 1.5px solid #dee2e6;
        border-radius: 8px;
        padding: 11px 14px;
        font-size: 14px;
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.1);
        background-color: #fff;
    }

    .form-control::placeholder {
        color: #adb5bd;
        font-size: 13px;
    }

    /* Input Groups */
    .input-group-text {
        border: 1.5px solid #dee2e6;
        background-color: #f8f9fa;
        color: #6c757d;
        border-radius: 8px 0 0 8px;
        padding: 0 12px;
        transition: all 0.3s ease;
    }

    .input-group .form-control,
    .input-group .form-select {
        border-left: none;
        border-radius: 0 8px 8px 0;
    }

    .input-group:focus-within .input-group-text {
        border-color: #0d6efd;
        background-color: #e7f1ff;
        color: #0d6efd;
    }

    .input-group-text i {
        font-size: 16px;
    }

    /* Textarea */
    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    /* Horizontal Rule */
    hr {
        border: 0;
        border-top: 1.5px solid #e9ecef;
        opacity: 1;
        margin: 1.5rem 0;
    }

    /* Buttons */
    .btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 11px 24px;
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
    }

    .btn i {
        font-size: 16px;
    }

    .btn-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.2);
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
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

    .btn-secondary {
        background-color: #6c757d;
        box-shadow: 0 2px 8px rgba(108, 117, 125, 0.2);
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 117, 125, 0.3);
    }

    .btn-outline-secondary {
        border: 1.5px solid #6c757d;
        color: #6c757d;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: #fff;
    }

    /* Form Validation */
    .form-control.is-invalid,
    .form-select.is-invalid {
        border-color: #dc3545;
    }

    .form-control.is-invalid:focus,
    .form-select.is-invalid:focus {
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.1);
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

        .form-label {
            font-size: 13px;
        }

        .form-control,
        .form-select {
            padding: 10px 12px;
            font-size: 13px;
        }

        .input-group-text {
            padding: 0 10px;
        }

        .input-group-text i {
            font-size: 14px;
        }

        hr {
            margin: 1rem 0;
        }

        .btn {
            width: 100%;
            padding: 12px 20px;
            font-size: 14px;
        }

        .form-actions .d-flex {
            gap: 10px !important;
        }

        .btn-sm {
            width: 100%;
            margin-top: 10px;
        }

        textarea.form-control {
            min-height: 100px;
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

        .form-section {
            margin-bottom: 1.5rem !important;
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

    /* Smooth Transitions */
    * {
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    /* Focus States */
    .form-control:focus,
    .form-select:focus,
    .btn:focus {
        outline: none;
    }

    /* Small Text */
    small.text-muted {
        font-size: 12px;
        color: #6c757d;
    }

    /* Gap Utility Enhancement */
    .gap-2 {
        gap: 0.5rem !important;
    }

    @media (max-width: 575.98px) {
        .gap-2 {
            gap: 0.75rem !important;
        }
    }
</style>

<script>
    // Form validation and enhancement
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('leadForm');

        // Form submission validation
        form.addEventListener('submit', function(e) {
            const requiredFields = form.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                e.preventDefault();

                // Scroll to first invalid field
                const firstInvalid = form.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    firstInvalid.focus();
                }

                // Show alert
                showAlert('Please fill in all required fields', 'error');
            }
        });

        // Remove validation class on input
        const inputs = form.querySelectorAll('.form-control, .form-select');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('is-invalid');
            });

            input.addEventListener('change', function() {
                this.classList.remove('is-invalid');
            });
        });

        // Phone number formatting (optional)
        const phoneInput = form.querySelector('input[name="phone"]');
        if (phoneInput) {
            phoneInput.addEventListener('input', function(e) {
                // Remove non-numeric characters except + and ()
                let value = e.target.value.replace(/[^\d+() -]/g, '');
                e.target.value = value;
            });
        }

        // Email validation
        const emailInput = form.querySelector('input[name="email"]');
        if (emailInput) {
            emailInput.addEventListener('blur', function() {
                if (this.value && !isValidEmail(this.value)) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        }


    });

    // Email validation function
    function isValidEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Alert function
    function showAlert(message, type) {
        showSweetAlert(message, type || 'info');
    }
</script>
