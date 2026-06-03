<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-10">

                <!-- Page Header -->
                <div class="text-center mb-4">
                    <div class="password-icon-wrapper mx-auto mb-3">
                        <i class="bx bx-lock-alt"></i>
                    </div>
                    <h4 class="fw-bold mb-1">Change Password</h4>
                    <p class="text-muted small">Ensure your account stays secure by updating your password regularly.</p>
                </div>

                <!-- Flash Messages -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="bx bx-error-circle fs-5 me-2"></i>
                            <div><?= $this->session->flashdata('error') ?></div>
                        </div>
                        <button type="button" class="btn-close btn-close-sm" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="bx bx-check-circle fs-5 me-2"></i>
                            <div><?= $this->session->flashdata('success') ?></div>
                        </div>
                        <button type="button" class="btn-close btn-close-sm" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Card -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">

                        <form method="post" action="<?= site_url('admin/change_password/save') ?>" id="changePasswordForm">

                            <!-- Old Password -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold small text-uppercase text-muted ls-1">
                                    <i class="bx bx-key me-1"></i> Current Password
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bx bx-lock text-muted"></i>
                                    </span>
                                    <input type="password" name="old_password" id="old_password"
                                           class="form-control border-start-0 ps-0"
                                           placeholder="Enter current password" required>
                                    <button class="btn btn-light border toggle-password" type="button"
                                            data-target="old_password">
                                        <i class="bx bx-hide"></i>
                                    </button>
                                </div>
                            </div>

                            <hr class="my-4 text-muted opacity-25">

                            <!-- New Password -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold small text-uppercase text-muted ls-1">
                                    <i class="bx bx-lock-open me-1"></i> New Password
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bx bx-lock-alt text-muted"></i>
                                    </span>
                                    <input type="password" name="new_password" id="new_password"
                                           class="form-control border-start-0 ps-0"
                                           placeholder="Enter new password" required>
                                    <button class="btn btn-light border toggle-password" type="button"
                                            data-target="new_password">
                                        <i class="bx bx-hide"></i>
                                    </button>
                                </div>

                                <!-- Password Strength Bar -->
                                <div class="mt-2">
                                    <div class="progress" style="height: 4px;" id="strengthBar">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;"
                                             id="strengthProgress"></div>
                                    </div>
                                    <small class="text-muted mt-1 d-block" id="strengthText"></small>
                                </div>

                                <!-- Password Requirements -->
                                <div class="mt-3 p-3 bg-light rounded-3" id="passwordRequirements">
                                    <small class="fw-semibold text-muted d-block mb-2">Password must contain:</small>
                                    <div class="row g-1">
                                        <div class="col-6">
                                            <small class="req-item" id="req-length">
                                                <i class="bx bx-circle me-1"></i> Min 8 characters
                                            </small>
                                        </div>
                                        <div class="col-6">
                                            <small class="req-item" id="req-upper">
                                                <i class="bx bx-circle me-1"></i> Uppercase letter
                                            </small>
                                        </div>
                                        <div class="col-6">
                                            <small class="req-item" id="req-lower">
                                                <i class="bx bx-circle me-1"></i> Lowercase letter
                                            </small>
                                        </div>
                                        <div class="col-6">
                                            <small class="req-item" id="req-number">
                                                <i class="bx bx-circle me-1"></i> Number (0-9)
                                            </small>
                                        </div>
                                        <div class="col-6">
                                            <small class="req-item" id="req-special">
                                                <i class="bx bx-circle me-1"></i> Special character
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold small text-uppercase text-muted ls-1">
                                    <i class="bx bx-check-shield me-1"></i> Confirm New Password
                                </label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light border-end-0">
                                        <i class="bx bx-lock-alt text-muted"></i>
                                    </span>
                                    <input type="password" name="confirm_password" id="confirm_password"
                                           class="form-control border-start-0 ps-0"
                                           placeholder="Re-enter new password" required>
                                    <button class="btn btn-light border toggle-password" type="button"
                                            data-target="confirm_password">
                                        <i class="bx bx-hide"></i>
                                    </button>
                                </div>
                                <div class="mt-2" id="matchMessage" style="display: none;">
                                    <small id="matchText"></small>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-lg rounded-3 fw-semibold"
                                        id="submitBtn" disabled>
                                    <i class="bx bx-shield-quarter me-1"></i> Update Password
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Security Note -->
                <div class="text-center mt-3">
                    <small class="text-muted">
                        <i class="bx bx-info-circle me-1"></i>
                        You will be logged out after changing your password.
                    </small>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
    .password-icon-wrapper {
        width: 72px;
        height: 72px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
    }

    .password-icon-wrapper i {
        font-size: 32px;
        color: #fff;
    }

    .card {
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: translateY(-2px);
    }

    .form-control:focus,
    .input-group-text {
        border-color: #dee2e6;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        border-color: #667eea;
    }

    .form-control:focus + .btn.toggle-password,
    .input-group:focus-within .input-group-text {
        border-color: #667eea;
    }

    .input-group-lg .form-control {
        font-size: 0.95rem;
    }

    .toggle-password {
        cursor: pointer;
        z-index: 5;
    }

    .toggle-password:hover {
        background-color: #e9ecef;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 12px;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }

    .btn-primary:hover:not(:disabled) {
        background: linear-gradient(135deg, #5a6fd6 0%, #6a4299 100%);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        transform: translateY(-1px);
    }

    .btn-primary:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .req-item {
        display: block;
        color: #6c757d;
        padding: 2px 0;
        transition: color 0.3s ease;
    }

    .req-item.valid {
        color: #198754;
    }

    .req-item.valid i {
        color: #198754;
    }

    .req-item.invalid {
        color: #dc3545;
    }

    .ls-1 {
        letter-spacing: 0.5px;
    }

    .alert {
        border-radius: 12px;
    }

    .alert-danger {
        background: linear-gradient(135deg, #fff5f5 0%, #ffe0e0 100%);
        color: #c53030;
    }

    .alert-success {
        background: linear-gradient(135deg, #f0fff4 0%, #c6f6d5 100%);
        color: #276749;
    }

    #passwordRequirements {
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .progress {
        background-color: #e9ecef;
        border-radius: 10px;
        overflow: hidden;
    }

    /* Animate flash messages */
    .alert {
        animation: slideDown 0.4s ease;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Toggle Password Visibility ──
    document.querySelectorAll('.toggle-password').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const target = document.getElementById(this.dataset.target);
            const icon = this.querySelector('i');

            if (target.type === 'password') {
                target.type = 'text';
                icon.classList.replace('bx-hide', 'bx-show');
            } else {
                target.type = 'password';
                icon.classList.replace('bx-show', 'bx-hide');
            }
        });
    });

    const newPassword    = document.getElementById('new_password');
    const confirmPassword = document.getElementById('confirm_password');
    const strengthBar    = document.getElementById('strengthProgress');
    const strengthText   = document.getElementById('strengthText');
    const matchMessage   = document.getElementById('matchMessage');
    const matchText      = document.getElementById('matchText');
    const submitBtn      = document.getElementById('submitBtn');

    // ── Password Strength Checker ──
    newPassword.addEventListener('input', function () {
        const val   = this.value;
        let score   = 0;

        const checks = {
            length:  val.length >= 8,
            upper:   /[A-Z]/.test(val),
            lower:   /[a-z]/.test(val),
            number:  /[0-9]/.test(val),
            special: /[^A-Za-z0-9]/.test(val)
        };

        Object.keys(checks).forEach(function (key) {
            const el = document.getElementById('req-' + key);
            const icon = el.querySelector('i');

            if (checks[key]) {
                score++;
                el.classList.add('valid');
                el.classList.remove('invalid');
                icon.classList.replace('bx-circle', 'bx-check-circle');
            } else {
                el.classList.remove('valid');
                el.classList.add('invalid');
                icon.classList.replace('bx-check-circle', 'bx-circle');
            }
        });

        // Update strength bar
        const percent = (score / 5) * 100;
        strengthBar.style.width = percent + '%';

        if (score <= 1) {
            strengthBar.className = 'progress-bar bg-danger';
            strengthText.textContent = 'Weak';
            strengthText.className = 'text-danger mt-1 d-block';
        } else if (score <= 3) {
            strengthBar.className = 'progress-bar bg-warning';
            strengthText.textContent = 'Medium';
            strengthText.className = 'text-warning mt-1 d-block';
        } else if (score <= 4) {
            strengthBar.className = 'progress-bar bg-info';
            strengthText.textContent = 'Good';
            strengthText.className = 'text-info mt-1 d-block';
        } else {
            strengthBar.className = 'progress-bar bg-success';
            strengthText.textContent = 'Strong';
            strengthText.className = 'text-success mt-1 d-block';
        }

        if (val.length === 0) {
            strengthText.textContent = '';
            strengthBar.style.width = '0%';
        }

        checkMatch();
    });

    // ── Confirm Password Match ──
    confirmPassword.addEventListener('input', checkMatch);

    function checkMatch() {
        const nv = newPassword.value;
        const cv = confirmPassword.value;

        if (cv.length === 0) {
            matchMessage.style.display = 'none';
            submitBtn.disabled = true;
            return;
        }

        matchMessage.style.display = 'block';

        if (nv === cv) {
            matchText.innerHTML = '<i class="bx bx-check-circle me-1"></i> Passwords match';
            matchText.className = 'text-success';
            submitBtn.disabled = false;
        } else {
            matchText.innerHTML = '<i class="bx bx-x-circle me-1"></i> Passwords do not match';
            matchText.className = 'text-danger';
            submitBtn.disabled = true;
        }
    }

    // ── Auto-dismiss alerts after 5s ──
    document.querySelectorAll('.alert').forEach(function (alert) {
        setTimeout(function () {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script>