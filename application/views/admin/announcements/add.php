<div class="page-wrapper">
    <div class="page-content">

        <!-- Breadcrumb -->
        <div class="d-flex align-items-center mb-4">
            <a href="<?= base_url('admin/announcements') ?>" class="text-decoration-none text-muted me-2">
                <i class="bx bx-chevron-left fs-4"></i>
            </a>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none">
                            <i class="bx bx-home-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('admin/announcements') ?>" class="text-decoration-none">
                            Announcements
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Add New</li>
                </ol>
            </nav>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">

                <!-- Header Card -->
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-4 announcement-header-card">
                    <div class="card-body p-0">
                        <div class="bg-gradient-primary p-4 pb-5 position-relative overflow-hidden">
                            <!-- Decorative Circles -->
                            <div class="decorative-circle circle-1"></div>
                            <div class="decorative-circle circle-2"></div>
                            <div class="decorative-circle circle-3"></div>

                            <div class="d-flex align-items-center position-relative z-1">
                                <div class="icon-wrapper me-3">
                                    <i class="bx bxs-megaphone fs-1"></i>
                                </div>
                                <div>
                                    <h4 class="text-white mb-1 fw-bold">Create New Announcement</h4>
                                    <p class="text-white-50 mb-0 small">
                                        Fill in the details below to publish a new announcement
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Card -->
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden form-card">
                    <div class="card-body p-4 p-md-5">

                        <form method="post" action="<?= base_url('admin/announcements/store') ?>" id="announcementForm">

                            <!-- Title Field -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="bx bx-heading text-primary me-1"></i>
                                    Announcement Title
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-lg custom-input-group">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bx bx-edit text-muted"></i>
                                    </span>
                                    <input type="text"
                                           name="title"
                                           class="form-control border-start-0 ps-0"
                                           placeholder="Enter a clear, concise title..."
                                           required
                                           maxlength="150"
                                           id="titleInput">
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <small class="text-muted">Make it descriptive and attention-grabbing</small>
                                    <small class="text-muted">
                                        <span id="titleCount">0</span>/150
                                    </small>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="my-4 text-muted opacity-25">

                            <!-- Description Field -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="bx bx-detail text-primary me-1"></i>
                                    Description
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="custom-textarea-wrapper">
                                    <textarea name="description"
                                              class="form-control custom-textarea"
                                              rows="6"
                                              placeholder="Write your announcement details here. Include all relevant information..."
                                              required
                                              maxlength="2000"
                                              id="descInput"></textarea>
                                    <div class="textarea-toolbar">
                                        <i class="bx bx-text text-muted" title="Plain text"></i>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <small class="text-muted">Provide complete details for your audience</small>
                                    <small class="text-muted">
                                        <span id="descCount">0</span>/2000
                                    </small>
                                </div>
                            </div>

                            <!-- Preview Toggle -->
                            <div class="mb-4">
                                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill px-3"
                                        id="previewToggle" onclick="togglePreview()">
                                    <i class="bx bx-show me-1"></i> Preview
                                </button>
                            </div>

                            <!-- Preview Box -->
                            <div class="preview-box mb-4" id="previewBox" style="display: none;">
                                <div class="card bg-light border-0 rounded-3">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <span class="badge bg-primary bg-opacity-10 text-primary me-2">
                                                <i class="bx bx-bell me-1"></i> Preview
                                            </span>
                                            <small class="text-muted">This is how it will appear</small>
                                        </div>
                                        <h5 class="fw-bold" id="previewTitle">
                                            <span class="text-muted fst-italic">Title will appear here...</span>
                                        </h5>
                                        <p class="text-muted mb-0" id="previewDesc">
                                            <span class="fst-italic">Description will appear here...</span>
                                        </p>
                                        <div class="mt-3 pt-3 border-top">
                                            <small class="text-muted">
                                                <i class="bx bx-calendar me-1"></i>
                                                <?= date('F d, Y') ?> •
                                                <i class="bx bx-time-five me-1"></i>
                                                <?= date('h:i A') ?>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex flex-wrap gap-3 pt-3">
                                <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm btn-submit"
                                        id="submitBtn">
                                    <i class="bx bx-check-circle me-2"></i>
                                    Publish Announcement
                                </button>
                                <a href="<?= base_url('admin/announcements') ?>"
                                   class="btn btn-outline-secondary btn-lg px-4 rounded-pill">
                                    <i class="bx bx-x me-1"></i>
                                    Cancel
                                </a>
                            </div>

                        </form>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="card border-0 shadow-sm rounded-4 mt-4 tips-card">
                    <div class="card-body p-4">
                        <h6 class="fw-bold text-dark mb-3">
                            <i class="bx bx-bulb text-warning me-2"></i>
                            Tips for a Great Announcement
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <div class="tip-icon bg-success bg-opacity-10 text-success rounded-circle me-2 mt-1">
                                        <i class="bx bx-check"></i>
                                    </div>
                                    <small class="text-muted">Use a clear and specific title</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <div class="tip-icon bg-success bg-opacity-10 text-success rounded-circle me-2 mt-1">
                                        <i class="bx bx-check"></i>
                                    </div>
                                    <small class="text-muted">Include dates and deadlines if any</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-start">
                                    <div class="tip-icon bg-success bg-opacity-10 text-success rounded-circle me-2 mt-1">
                                        <i class="bx bx-check"></i>
                                    </div>
                                    <small class="text-muted">Keep the description concise</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<style>
    /* Gradient Background */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 50%, #1a3a8a 100%);
    }

    /* Decorative Circles */
    .decorative-circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
    }

    .circle-1 {
        width: 200px;
        height: 200px;
        top: -60px;
        right: -40px;
    }

    .circle-2 {
        width: 120px;
        height: 120px;
        bottom: -30px;
        right: 80px;
    }

    .circle-3 {
        width: 80px;
        height: 80px;
        top: 10px;
        right: 200px;
    }

    .z-1 {
        z-index: 1;
    }

    /* Icon Wrapper */
    .icon-wrapper {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Custom Input Group */
    .custom-input-group .form-control,
    .custom-input-group .input-group-text {
        border-color: #e2e8f0;
        transition: all 0.3s ease;
    }

    .custom-input-group:focus-within .form-control,
    .custom-input-group:focus-within .input-group-text {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.15);
    }

    .custom-input-group .form-control:focus {
        box-shadow: none;
    }

    .custom-input-group .input-group-text {
        border-radius: 10px 0 0 10px;
    }

    .custom-input-group .form-control {
        border-radius: 0 10px 10px 0;
        font-size: 1rem;
    }

    /* Custom Textarea */
    .custom-textarea-wrapper {
        position: relative;
    }

    .custom-textarea {
        border-color: #e2e8f0;
        border-radius: 12px !important;
        resize: vertical;
        min-height: 140px;
        padding: 16px;
        font-size: 0.95rem;
        line-height: 1.7;
        transition: all 0.3s ease;
    }

    .custom-textarea:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.15);
    }

    .textarea-toolbar {
        position: absolute;
        bottom: 10px;
        right: 12px;
        opacity: 0.5;
    }

    /* Form Card */
    .form-card {
        animation: slideUp 0.5s ease-out;
    }

    .announcement-header-card {
        animation: slideUp 0.3s ease-out;
    }

    .tips-card {
        animation: slideUp 0.7s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Submit Button */
    .btn-submit {
        background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        border: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(78, 115, 223, 0.4) !important;
        background: linear-gradient(135deg, #5a7fe6 0%, #2a56cc 100%);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    /* Tip Icon */
    .tip-icon {
        width: 22px;
        height: 22px;
        min-width: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    /* Preview Box Animation */
    .preview-box {
        animation: fadeIn 0.3s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Character Count Warning */
    .count-warning {
        color: #e74a3b !important;
        font-weight: 600;
    }

    /* Hover effects on cards */
    .form-card {
        transition: transform 0.2s ease;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .card-body.p-md-5 {
            padding: 1.5rem !important;
        }

        .d-flex.flex-wrap.gap-3 {
            flex-direction: column;
        }

        .btn-lg {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<script>
    // Character Counter for Title
    const titleInput = document.getElementById('titleInput');
    const titleCount = document.getElementById('titleCount');

    titleInput.addEventListener('input', function () {
        titleCount.textContent = this.value.length;
        if (this.value.length > 130) {
            titleCount.classList.add('count-warning');
        } else {
            titleCount.classList.remove('count-warning');
        }
        updatePreview();
    });

    // Character Counter for Description
    const descInput = document.getElementById('descInput');
    const descCount = document.getElementById('descCount');

    descInput.addEventListener('input', function () {
        descCount.textContent = this.value.length;
        if (this.value.length > 1800) {
            descCount.classList.add('count-warning');
        } else {
            descCount.classList.remove('count-warning');
        }
        updatePreview();
    });

    // Preview Toggle
    function togglePreview() {
        const previewBox = document.getElementById('previewBox');
        const toggleBtn = document.getElementById('previewToggle');

        if (previewBox.style.display === 'none') {
            previewBox.style.display = 'block';
            toggleBtn.innerHTML = '<i class="bx bx-hide me-1"></i> Hide Preview';
            toggleBtn.classList.remove('btn-outline-secondary');
            toggleBtn.classList.add('btn-outline-primary');
            updatePreview();
        } else {
            previewBox.style.display = 'none';
            toggleBtn.innerHTML = '<i class="bx bx-show me-1"></i> Preview';
            toggleBtn.classList.remove('btn-outline-primary');
            toggleBtn.classList.add('btn-outline-secondary');
        }
    }

    // Update Preview Content
    function updatePreview() {
        const title = titleInput.value.trim();
        const desc = descInput.value.trim();

        document.getElementById('previewTitle').innerHTML = title
            ? title
            : '<span class="text-muted fst-italic">Title will appear here...</span>';

        document.getElementById('previewDesc').innerHTML = desc
            ? desc.replace(/\n/g, '<br>')
            : '<span class="fst-italic">Description will appear here...</span>';
    }

    // Form Submit Animation
    document.getElementById('announcementForm').addEventListener('submit', function () {
        const btn = document.getElementById('submitBtn');
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Publishing...';
        btn.disabled = true;
    });
</script>