<!-- Tight, Space-Efficient Employee Registration Component -->

<style>
    /* Override default Bootstrap container padding for full width usage */
    .page-content {
        min-height: 100vh;
        padding: 1.25rem 1rem !important;
    }

    /* Tight Breadcrumb - less vertical/horizontal space */
    .breadcrumb-area {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 14px;
        padding: 14px 20px !important;
        margin-bottom: 20px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.25);
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .breadcrumb-area::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.06);
        border-radius: 50%;
    }

    .breadcrumb-area .breadcrumb-icon {
        width: 44px;
        height: 44px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        color: #fff;
        backdrop-filter: blur(8px);
        margin-right: 14px;
        flex-shrink: 0;
    }

    .breadcrumb-title {
        color: #fff;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 2px;
        line-height: 1.2;
    }

    .breadcrumb-subtitle {
        color: rgba(255, 255, 255, 0.8);
        font-size: 12px;
        margin: 0;
    }

    /* Main Card - Full width usage, no side space */
    .employee-card {
        border: none;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 4px 20px var(--shadow);
        background: var(--bg-primary);
        margin-bottom: 20px;
    }

    .employee-card .card-header {
        background: var(--bg-primary);
        border-bottom: 1px solid var(--border-color);
        padding: 14px 20px !important;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    .card-header-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .card-header-left .header-icon {
        width: 38px;
        height: 38px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 18px;
    }

    .card-header-left h5 {
        margin: 0;
        font-weight: 700;
        font-size: 16px;
        color: var(--text-primary);
    }

    .card-header-left p {
        margin: 0;
        font-size: 11px;
        color: var(--text-secondary);
    }

    .required-note {
        font-size: 11px;
        color: var(--text-secondary);
        background: var(--bg-secondary);
        padding: 4px 12px;
        border-radius: 16px;
    }

    .employee-card .card-body {
        padding: 20px 22px !important;
    }

    /* Section Dividers - Compact */
    .form-section {
        margin-bottom: 24px;
    }

    .form-section-title {
        font-size: 13px;
        font-weight: 700;
        color: var(--primary);
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 16px;
        padding-bottom: 8px;
        border-bottom: 2px solid var(--border-color);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-section-title i {
        font-size: 16px;
    }

    /* Compact Form Groups */
    .row.mb-3,
    .row.mb-4 {
        margin-bottom: 0.85rem !important;
    }

    .col-form-label {
        font-weight: 600;
        color: var(--text-secondary);
        font-size: 13px;
        padding-top: 8px;
    }

    .form-control,
    .form-select {
        border: 1.5px solid var(--border-color);
        border-radius: 10px;
        padding: 8px 12px;
        font-size: 13px;
        background-color: var(--bg-secondary);
        transition: all 0.2s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .input-icon-group .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-tertiary);
        font-size: 16px;
        z-index: 2;
    }

    .input-icon-group .form-control,
    .input-icon-group .form-select {
        padding-left: 38px;
    }

    /* Compact Avatar Upload */
    .avatar-upload {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 16px;
        padding: 12px 16px;
        border: 1.5px dashed var(--border-color);
        border-radius: 12px;
        background: var(--bg-secondary);
        cursor: pointer;
        transition: all 0.2s ease;
        max-width: 320px;
    }

    .avatar-placeholder {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 24px;
        flex-shrink: 0;
    }

    .avatar-upload p {
        margin: 0;
        font-size: 12px;
        color: var(--text-secondary);
        text-align: left;
    }

    .avatar-upload p strong {
        color: var(--primary);
        display: block;
    }

    /* Steps Indicator - Compact */
    .form-steps {
        display: flex;
        justify-content: space-between;
        margin-bottom: 28px;
        gap: 8px;
    }

    .form-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
        flex: 1;
    }

    .form-step:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 16px;
        left: 55%;
        width: 90%;
        height: 2px;
        background: var(--border-color);
        z-index: 0;
    }

    .step-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: var(--border-color);
        color: var(--text-tertiary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 13px;
        z-index: 2;
        transition: all 0.2s;
    }

    .form-step.active .step-circle {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: #fff;
        box-shadow: 0 2px 8px rgba(99, 102, 241, 0.3);
    }

    .form-step.completed .step-circle {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        color: #fff;
    }

    .step-label {
        font-size: 10px;
        font-weight: 600;
        color: var(--text-tertiary);
        margin-top: 6px;
        text-transform: uppercase;
    }

    .form-step.active .step-label {
        color: var(--primary);
    }

    /* Buttons - Compact */
    .btn-submit {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border: none;
        padding: 10px 24px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 13px;
        color: #fff;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.2s;
    }

    .btn-reset {
        background: var(--bg-secondary);
        border: 1.5px solid var(--border-color);
        padding: 10px 20px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 13px;
        color: var(--text-secondary);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    /* Invalid feedback */
    .invalid-feedback {
        font-size: 11px;
        margin-top: 4px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-content {
            padding: 0.75rem !important;
        }

        .employee-card .card-body {
            padding: 16px !important;
        }

        .avatar-upload {
            max-width: 100%;
        }

        .form-steps {
            gap: 4px;
        }
    }
</style>

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">

        <!-- Compact Breadcrumb -->
        <div class="breadcrumb-area">
            <div class="d-flex align-items-center">
                <div class="breadcrumb-icon">
                    <i class="bx bx-user-plus"></i>
                </div>
                <div>
                    <div class="breadcrumb-title">Add New Employee</div>
                    <p class="breadcrumb-subtitle">Fill in the details below to register a new team member</p>
                </div>
            </div>
            <div class="breadcrumb-nav d-none d-md-block">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>"><i class="bx bx-home-alt"></i> Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/employee') ?>">Employees</a></li>
                        <li class="breadcrumb-item active">Add New</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Flash Messages -->
        <div id="flashMessageContainer"></div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="custom-alert alert-danger" role="alert">
                <div class="alert-icon"><i class="bx bx-error-circle"></i></div>
                <div><strong>Oops!</strong> <?= $this->session->flashdata('error'); ?></div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="custom-alert alert-success" role="alert">
                <div class="alert-icon"><i class="bx bx-check-circle"></i></div>
                <div><strong>Success!</strong> <?= $this->session->flashdata('success'); ?></div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Main Content - Full Width (no side margins) -->
        <div class="row">
            <div class="col-12">
                <div class="card employee-card">

                    <!-- Card Header -->
                    <div class="card-header">
                        <div class="card-header-left">
                            <div class="header-icon">
                                <i class="bx bx-id-card"></i>
                            </div>
                            <div>
                                <h5>Employee Registration</h5>
                                <p>Please fill all the required fields</p>
                            </div>
                        </div>
                        <div class="required-note">
                            <span>*</span> Required fields
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">

                        <!-- Steps Indicator -->
                        <div class="form-steps">
                            <div class="form-step active" id="step1Indicator">
                                <div class="step-circle">1</div>
                                <span class="step-label">PERSONAL</span>
                            </div>
                            <div class="form-step" id="step2Indicator">
                                <div class="step-circle">2</div>
                                <span class="step-label">ACCOUNT</span>
                            </div>
                            <div class="form-step" id="step3Indicator">
                                <div class="step-circle">3</div>
                                <span class="step-label">DETAILS</span>
                            </div>
                        </div>

                        <form method="post"
                            action="<?= base_url('admin/employee/add') ?>"
                            class="needs-validation"
                            id="employeeForm"
                            novalidate>

                            <!-- Section 1: Personal Info -->
                            <div class="form-section">
                                <div class="form-section-title">
                                    <i class="bx bx-user"></i> PERSONAL INFORMATION
                                </div>

                                <!-- Avatar Upload - Compact Row -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <label class="avatar-upload" for="avatarInput">
                                            <div class="avatar-placeholder" id="avatarPreview">
                                                <i class="bx bx-camera"></i>
                                            </div>
                                            <p><strong>Click to upload profile photo</strong><br>PNG, JPG up to 2MB</p>
                                            <input type="file" id="avatarInput" name="avatar" accept="image/*" hidden>
                                        </label>
                                    </div>
                                </div>

                                <!-- Full Name -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">
                                        Full Name <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-user input-icon"></i>
                                            <input type="text"
                                                name="yourname"
                                                id="fullName"
                                                value="<?= set_value('yourname') ?>"
                                                class="form-control <?= form_error('yourname') ? 'is-invalid' : '' ?>"
                                                placeholder="e.g. John Doe">
                                        </div>
                                        <div class="invalid-feedback" id="nameError">Full name is required (min 2 characters).</div>
                                        <?php if (form_error('yourname')): ?>
                                            <div class="invalid-feedback d-block"><?= form_error('yourname') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">
                                        Phone Number <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-phone input-icon"></i>
                                            <input type="tel"
                                                name="phone"
                                                id="phone"
                                                value="<?= set_value('phone') ?>"
                                                class="form-control <?= form_error('phone') ? 'is-invalid' : '' ?>"
                                                placeholder="e.g. +91 98765 43210">
                                        </div>
                                        <div class="invalid-feedback" id="phoneError">Valid phone number required (min 7 characters).</div>
                                        <?php if (form_error('phone')): ?>
                                            <div class="invalid-feedback d-block"><?= form_error('phone') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 2: Account Details -->
                            <div class="form-section">
                                <div class="form-section-title">
                                    <i class="bx bx-lock-alt"></i> ACCOUNT DETAILS
                                </div>

                                <!-- Username -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">
                                        Username <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-at input-icon"></i>
                                            <input type="text"
                                                name="username"
                                                id="username"
                                                value="<?= set_value('username') ?>"
                                                class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>"
                                                placeholder="e.g. johndoe">
                                        </div>
                                        <div class="invalid-feedback" id="userError">Username must be at least 3 characters.</div>
                                        <?php if (form_error('username')): ?>
                                            <div class="invalid-feedback d-block"><?= form_error('username') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">
                                        Email Address <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-envelope input-icon"></i>
                                            <input type="email"
                                                name="email"
                                                id="email"
                                                value="<?= set_value('email') ?>"
                                                class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>"
                                                placeholder="e.g. john@company.com">
                                        </div>
                                        <div class="invalid-feedback" id="emailError">Valid email address required.</div>
                                        <?php if (form_error('email')): ?>
                                            <div class="invalid-feedback d-block"><?= form_error('email') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">
                                        Password <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <!-- <i class="bx bx-lock input-icon"></i> -->
                                            <input type="password"
                                                name="password"
                                                id="password"
                                                class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>"
                                                placeholder="Min. 8 characters">
                                        </div>
                                        <div class="invalid-feedback" id="pwError">Password must be at least 8 characters.</div>
                                        <?php if (form_error('password')): ?>
                                            <div class="invalid-feedback d-block"><?= form_error('password') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">
                                        Confirm Password <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-lock-open input-icon"></i>
                                            <input type="password"
                                                name="confirm_password"
                                                id="confirmPw"
                                                class="form-control <?= form_error('confirm_password') ? 'is-invalid' : '' ?>"
                                                placeholder="Confirm Password">
                                        </div>
                                        <div class="invalid-feedback" id="confirmError">Passwords do not match.</div>
                                        <?php if (form_error('confirm_password')): ?>
                                            <div class="invalid-feedback d-block"><?= form_error('confirm_password') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3: Bank Details -->
                            <div class="form-section">
                                <div class="form-section-title">
                                    <i class="bx bx-credit-card"></i> BANK DETAILS
                                </div>

                                <!-- Bank Name -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Bank Name</label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-buildings input-icon"></i>
                                            <input type="text"
                                                name="bank_name"
                                                id="bankName"
                                                value="<?= set_value('bank_name') ?>"
                                                class="form-control"
                                                placeholder="e.g. HDFC Bank">
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Holder Name -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Account Holder</label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-user-check input-icon"></i>
                                            <input type="text"
                                                name="account_holder_name"
                                                id="accountHolderName"
                                                value="<?= set_value('account_holder_name') ?>"
                                                class="form-control"
                                                placeholder="e.g. John Doe">
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Number -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Account Number</label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-hash input-icon"></i>
                                            <input type="text"
                                                name="account_number"
                                                id="accountNumber"
                                                value="<?= set_value('account_number') ?>"
                                                class="form-control"
                                                placeholder="Enter bank account number">
                                        </div>
                                    </div>
                                </div>

                                <!-- IFSC Code -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">IFSC Code</label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-barcode input-icon"></i>
                                            <input type="text"
                                                name="ifsc_code"
                                                id="ifscCode"
                                                value="<?= set_value('ifsc_code') ?>"
                                                class="form-control"
                                                placeholder="e.g. HDFC0001234">
                                        </div>
                                    </div>
                                </div>

                                <!-- Branch -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Branch</label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-map-alt input-icon"></i>
                                            <input type="text"
                                                name="bank_branch"
                                                id="bankBranch"
                                                value="<?= set_value('bank_branch') ?>"
                                                class="form-control"
                                                placeholder="e.g. Indore Main Branch">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section 3: Location -->
                            <div class="form-section">
                                <div class="form-section-title">
                                    <i class="bx bx-map"></i> LOCATION DETAILS
                                </div>

                                <!-- Address -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">
                                        Address <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-10">
                                        <div class="input-icon-group">
                                            <i class="bx bx-map-pin input-icon" style="top:14px;"></i>
                                            <textarea name="address"
                                                id="address"
                                                rows="2"
                                                class="form-control <?= form_error('address') ? 'is-invalid' : '' ?>"
                                                placeholder="Enter full address..."><?= set_value('address') ?></textarea>
                                        </div>
                                        <div class="invalid-feedback" id="addressError">Address is required.</div>
                                        <?php if (form_error('address')): ?>
                                            <div class="invalid-feedback d-block"><?= form_error('address') ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="row mt-3 pt-2" style="border-top: 1px solid var(--border-color);">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <div class="d-flex gap-3">
                                        <button type="submit" name="submit2" class="btn btn-submit">
                                            <i class="bx bx-check-circle"></i> Create Employee
                                        </button>
                                        <button type="button" class="btn btn-reset" id="resetBtn">
                                            <i class="bx bx-reset"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

    </div>
</div>
<!--end page wrapper -->

<script>
    // DOM Elements
    const fullName = document.getElementById('fullName');
    const phone = document.getElementById('phone');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPw = document.getElementById('confirmPw');
    const address = document.getElementById('address');

    const step1Ind = document.getElementById('step1Indicator');
    const step2Ind = document.getElementById('step2Indicator');
    const step3Ind = document.getElementById('step3Indicator');

    function updateStepStatus() {
        const nameValid = fullName && fullName.value.trim().length >= 2;
        const phoneValid = phone && phone.value.trim().length >= 7;
        const step1Ok = nameValid && phoneValid;

        const userValid = username && username.value.trim().length >= 3;
        const emailValid = email && /^[^\s@]+@([^\s@.,]+\.)+[^\s@]{2,}$/.test(email.value.trim());
        const pwValid = password && password.value.length >= 8;
        const confirmOk = confirmPw && (password.value === confirmPw.value) && (password.value !== '');
        const step2Ok = userValid && emailValid && pwValid && confirmOk;

        const addressOk = address && address.value.trim().length > 0;
        const step3Ok = addressOk;

        if (step1Ok) {
            step1Ind.classList.add('completed');
            step1Ind.classList.remove('active');
        } else {
            step1Ind.classList.remove('completed');
            if (!step2Ok && !step3Ok) step1Ind.classList.add('active');
            else step1Ind.classList.remove('active');
        }

        if (step1Ok && step2Ok) {
            step2Ind.classList.add('completed');
            step2Ind.classList.remove('active');
        } else if (step1Ok && !step2Ok) {
            step2Ind.classList.add('active');
            step2Ind.classList.remove('completed');
        } else {
            step2Ind.classList.remove('active', 'completed');
        }

        if (step1Ok && step2Ok && step3Ok) {
            step3Ind.classList.add('completed');
            step3Ind.classList.remove('active');
        } else if (step1Ok && step2Ok && !step3Ok) {
            step3Ind.classList.add('active');
            step3Ind.classList.remove('completed');
        } else {
            step3Ind.classList.remove('active', 'completed');
        }

        if (!step1Ok) {
            step2Ind.classList.remove('active', 'completed');
            step3Ind.classList.remove('active', 'completed');
        } else if (step1Ok && !step2Ok) {
            step3Ind.classList.remove('active', 'completed');
        }
    }

    function addLiveValidation() {
        const fields = [fullName, phone, username, email, password, confirmPw, address];
        fields.forEach(field => {
            if (field) {
                field.addEventListener('input', function() {
                    if (field.id === 'confirmPw') {
                        if (confirmPw.value !== password.value) confirmPw.classList.add('is-invalid');
                        else confirmPw.classList.remove('is-invalid');
                    } else if (field.id === 'password') {
                        if (password.value.length < 8) password.classList.add('is-invalid');
                        else password.classList.remove('is-invalid');
                        if (confirmPw.value !== '' && confirmPw.value !== password.value) confirmPw.classList.add('is-invalid');
                        else if (confirmPw.value !== '') confirmPw.classList.remove('is-invalid');
                    } else if (field.id === 'email') {
                        const re = /^[^\s@]+@([^\s@.,]+\.)+[^\s@]{2,}$/;
                        if (!re.test(email.value.trim())) email.classList.add('is-invalid');
                        else email.classList.remove('is-invalid');
                    } else if (field.id === 'username') {
                        if (username.value.trim().length < 3) username.classList.add('is-invalid');
                        else username.classList.remove('is-invalid');
                    } else if (field.id === 'fullName') {
                        if (fullName.value.trim().length < 2) fullName.classList.add('is-invalid');
                        else fullName.classList.remove('is-invalid');
                    } else if (field.id === 'phone') {
                        if (phone.value.trim().length < 7) phone.classList.add('is-invalid');
                        else phone.classList.remove('is-invalid');
                    } else if (field.id === 'address') {
                        if (address.value.trim() === "") address.classList.add('is-invalid');
                        else address.classList.remove('is-invalid');
                    }
                    updateStepStatus();
                });
            }
        });
    }

    function validateForm() {
        let isValid = true;
        if (fullName.value.trim().length < 2) {
            fullName.classList.add('is-invalid');
            isValid = false;
        } else fullName.classList.remove('is-invalid');
        if (phone.value.trim().length < 7) {
            phone.classList.add('is-invalid');
            isValid = false;
        } else phone.classList.remove('is-invalid');
        if (username.value.trim().length < 3) {
            username.classList.add('is-invalid');
            isValid = false;
        } else username.classList.remove('is-invalid');
        const emailRegex = /^[^\s@]+@([^\s@.,]+\.)+[^\s@]{2,}$/;
        if (!emailRegex.test(email.value.trim())) {
            email.classList.add('is-invalid');
            isValid = false;
        } else email.classList.remove('is-invalid');
        if (password.value.length < 8) {
            password.classList.add('is-invalid');
            isValid = false;
        } else password.classList.remove('is-invalid');
        if (confirmPw.value !== password.value || password.value === '') {
            confirmPw.classList.add('is-invalid');
            isValid = false;
        } else confirmPw.classList.remove('is-invalid');
        if (address.value.trim() === "") {
            address.classList.add('is-invalid');
            isValid = false;
        } else address.classList.remove('is-invalid');
        return isValid;
    }

    const avatarInput = document.getElementById('avatarInput');
    const avatarPreview = document.getElementById('avatarPreview');
    if (avatarInput) {
        avatarInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(ev) {
                    avatarPreview.innerHTML = `<img src="${ev.target.result}" style="width:60px;height:60px;border-radius:50%;object-fit:cover;">`;
                };
                reader.readAsDataURL(file);
            } else {
                avatarPreview.innerHTML = '<i class="bx bx-camera"></i>';
            }
        });
    }

    const form = document.getElementById('employeeForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            if (!validateForm()) {
                e.preventDefault();
                const container = document.getElementById('flashMessageContainer');
                if (container) {
                    container.innerHTML = `<div class="custom-alert alert-danger"><div class="alert-icon"><i class="bx bx-error-circle"></i></div><div><strong>Error!</strong> Please fill all required fields correctly.</div><button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button></div>`;
                    setTimeout(() => {
                        const alert = container.querySelector('.custom-alert');
                        if (alert) alert.remove();
                    }, 4000);
                }
            }
        });
    }

    document.getElementById('resetBtn')?.addEventListener('click', function() {
        if (form) form.reset();
        if (avatarPreview) avatarPreview.innerHTML = '<i class="bx bx-camera"></i>';
        document.querySelectorAll('.form-control, .form-select').forEach(el => el.classList.remove('is-invalid'));
        updateStepStatus();
        const container = document.getElementById('flashMessageContainer');
        if (container) container.innerHTML = '';
    });

    addLiveValidation();
    updateStepStatus();

    setTimeout(function() {
        document.querySelectorAll('.custom-alert').forEach(function(el) {
            el.style.transition = 'opacity 0.5s';
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 500);
        });
    }, 5000);
</script>
