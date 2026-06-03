<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/images/vlogo.png') ?>" type="image/png">
    <link href="<?= base_url('assets/plugins/simplebar/css/simplebar.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/plugins/metismenu/css/metisMenu.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/pace.min.css') ?>" rel="stylesheet" />
    <script src="<?= base_url('assets/js/pace.min.js') ?>"></script>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>VISION TECHNOLABS - Sign In</title>
    <link rel="manifest" href="/suju/manifest.json">
    <meta name="theme-color" content="#667eea">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            overflow: hidden;
        }

        /* === ANIMATED GRADIENT BACKGROUND === */
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
            position: relative;
            overflow: hidden;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* === FLOATING PARTICLES === */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            animation: floatUp linear infinite;
        }

        .particle:nth-child(1) {
            width: 80px; height: 80px;
            left: 10%; bottom: -100px;
            animation-duration: 20s; animation-delay: 0s;
        }
        .particle:nth-child(2) {
            width: 40px; height: 40px;
            left: 25%; bottom: -100px;
            animation-duration: 15s; animation-delay: 2s;
        }
        .particle:nth-child(3) {
            width: 120px; height: 120px;
            left: 50%; bottom: -150px;
            animation-duration: 25s; animation-delay: 4s;
        }
        .particle:nth-child(4) {
            width: 60px; height: 60px;
            left: 70%; bottom: -100px;
            animation-duration: 18s; animation-delay: 1s;
        }
        .particle:nth-child(5) {
            width: 90px; height: 90px;
            left: 85%; bottom: -120px;
            animation-duration: 22s; animation-delay: 3s;
        }
        .particle:nth-child(6) {
            width: 50px; height: 50px;
            left: 40%; bottom: -80px;
            animation-duration: 16s; animation-delay: 5s;
        }
        .particle:nth-child(7) {
            width: 70px; height: 70px;
            left: 60%; bottom: -100px;
            animation-duration: 19s; animation-delay: 6s;
        }
        .particle:nth-child(8) {
            width: 35px; height: 35px;
            left: 15%; bottom: -60px;
            animation-duration: 14s; animation-delay: 7s;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% {
                transform: translateY(-110vh) rotate(720deg);
                opacity: 0;
            }
        }

        /* === GLOWING ORB DECORATIONS === */
        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.3;
            animation: orbPulse 6s ease-in-out infinite alternate;
        }

        .glow-orb-1 {
            width: 300px; height: 300px;
            background: #667eea;
            top: -100px; right: -50px;
            animation-delay: 0s;
        }

        .glow-orb-2 {
            width: 250px; height: 250px;
            background: #764ba2;
            bottom: -80px; left: -60px;
            animation-delay: 3s;
        }

        .glow-orb-3 {
            width: 200px; height: 200px;
            background: #f093fb;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: 1.5s;
            opacity: 0.1;
        }

        @keyframes orbPulse {
            0% { transform: scale(1); opacity: 0.2; }
            100% { transform: scale(1.3); opacity: 0.4; }
        }

        /* === LOGIN CARD === */
        .login-card {
            width: 100%;
            max-width: 440px;
            position: relative;
            z-index: 10;
            animation: cardEntry 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
            transform: translateY(40px);
        }

        @keyframes cardEntry {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.1) inset;
            overflow: hidden;
        }

        .card-inner {
            padding: 48px 40px;
        }

        /* === LOGO SECTION === */
        .logo-container {
            text-align: center;
            margin-bottom: 8px;
            animation: logoFade 1s ease 0.3s forwards;
            opacity: 0;
        }

        @keyframes logoFade {
            to { opacity: 1; }
        }

        .logo-container img {
            max-width: 180px;
            height: auto;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.05);
        }

        /* === WELCOME TEXT === */
        .welcome-section {
            text-align: center;
            margin-bottom: 36px;
            animation: textSlide 0.8s ease 0.5s forwards;
            opacity: 0;
            transform: translateY(10px);
        }

        @keyframes textSlide {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .welcome-section h4 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1a1a2e;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .welcome-section p {
            font-size: 0.9rem;
            color: #6b7280;
            margin: 0;
            font-weight: 400;
        }

        /* === FORM ELEMENTS === */
        .form-section {
            animation: formFade 0.8s ease 0.7s forwards;
            opacity: 0;
        }

        @keyframes formFade {
            to { opacity: 1; }
        }

        .form-floating-group {
            position: relative;
            margin-bottom: 24px;
        }

        .form-floating-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.2rem;
            transition: color 0.3s ease;
            z-index: 2;
        }

        .form-control-modern {
            width: 100%;
            padding: 14px 16px 14px 48px;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            color: #1f2937;
            background: #f3f4f6;
            border: 2px solid transparent;
            border-radius: 14px;
            outline: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .form-control-modern::placeholder {
            color: #9ca3af;
        }

        .form-control-modern:hover {
            background: #eef0f4;
        }

        .form-control-modern:focus {
            background: #fff;
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.12);
        }

        .form-control-modern:focus ~ .input-icon,
        .form-control-modern:focus ~ .toggle-password .input-icon-right {
            color: #667eea;
        }

        /* Password toggle */
        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            transition: color 0.3s ease;
            z-index: 2;
        }

        .toggle-password:hover {
            color: #667eea;
        }

        .password-input {
            padding-right: 52px !important;
        }

        /* === EXTRAS ROW === */
        .extras-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .remember-check {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .remember-check input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #667eea;
            border-radius: 4px;
            cursor: pointer;
        }

        .remember-check span {
            font-size: 0.85rem;
            color: #6b7280;
            font-weight: 500;
        }

        .forgot-link {
            font-size: 0.85rem;
            font-weight: 600;
            color: #667eea;
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
        }

        .forgot-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #667eea;
            transition: width 0.3s ease;
        }

        .forgot-link:hover::after {
            width: 100%;
        }

        .forgot-link:hover {
            color: #4f5fd6;
        }

        /* === SIGN IN BUTTON === */
        .btn-signin {
            width: 100%;
            padding: 15px 24px;
            font-size: 1rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            color: #fff;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 14px;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-signin::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent,
                rgba(255, 255, 255, 0.2),
                transparent
            );
            transition: left 0.6s ease;
        }

        .btn-signin:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(102, 126, 234, 0.45);
        }

        .btn-signin:hover::before {
            left: 100%;
        }

        .btn-signin:active {
            transform: translateY(0);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .btn-signin .btn-icon {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }

        .btn-signin:hover .btn-icon {
            transform: translateX(4px);
        }

        /* === DIVIDER === */
        .divider {
            display: flex;
            align-items: center;
            margin: 28px 0;
            gap: 16px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: linear-gradient(to right, transparent, #d1d5db, transparent);
        }

        .divider span {
            font-size: 0.78rem;
            color: #9ca3af;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* === SOCIAL BUTTONS === */
        .social-buttons {
            display: flex;
            gap: 12px;
            justify-content: center;
        }

        .social-btn {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            border: 2px solid #e5e7eb;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-btn:hover {
            border-color: #667eea;
            color: #667eea;
            background: rgba(102, 126, 234, 0.05);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.15);
        }

        /* === BOTTOM ACCENT BAR === */
        .accent-bar {
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb, #667eea);
            background-size: 300% 100%;
            animation: accentFlow 3s ease infinite;
        }

        @keyframes accentFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* === FOOTER TEXT === */
        .footer-text {
            text-align: center;
            margin-top: 24px;
            animation: footerFade 0.8s ease 1s forwards;
            opacity: 0;
        }

        .footer-text p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.8rem;
            font-weight: 400;
        }

        .footer-text a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 600;
        }

        @keyframes footerFade {
            to { opacity: 1; }
        }

        /* === RESPONSIVE === */
        @media (max-width: 480px) {
            .card-inner {
                padding: 36px 24px;
            }

            .login-card {
                margin: 16px;
            }

            .welcome-section h4 {
                font-size: 1.3rem;
            }

            .extras-row {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
        }

        /* === LOADING SPINNER FOR BUTTON === */
        .btn-signin .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .btn-signin.loading .spinner {
            display: block;
        }

        .btn-signin.loading .btn-text,
        .btn-signin.loading .btn-icon {
            display: none;
        }

        /* === INPUT VALIDATION STATES === */
        .form-control-modern:valid:not(:placeholder-shown) {
            border-color: rgba(16, 185, 129, 0.3);
        }

        .form-control-modern:valid:not(:placeholder-shown):focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.12);
        }

        /* === SECURITY BADGE === */
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 20px;
            padding: 8px;
            color: #9ca3af;
            font-size: 0.75rem;
        }

        .security-badge i {
            font-size: 0.85rem;
            color: #10b981;
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <!-- Floating Particles -->
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <!-- Glowing Orbs -->
        <div class="glow-orb glow-orb-1"></div>
        <div class="glow-orb glow-orb-2"></div>
        <div class="glow-orb glow-orb-3"></div>

        <div class="login-card">
            <div class="card-glass">
                <div class="card-inner">
                    <!-- Logo -->
                    <div class="logo-container">
                        <img src="assets/images/vision.png" alt="Vision Technolabs">
                    </div>

                    <!-- Welcome Text -->
                    <div class="welcome-section">
                        <h4>Welcome Back</h4>
                        <p>Please sign in to your account to continue</p>
                    </div>

                    <!-- Login Form -->
                    <div class="form-section">
                        <form method="post" action="<?= base_url('sign_in/login') ?>" id="loginForm">
                            <!-- Email Field -->
                            <div class="form-floating-group">
                                <label>Email Address</label>
                                <div class="input-wrapper">
                                    <i class='bx bx-envelope input-icon'></i>
                                    <input 
                                        type="email" 
                                        name="email" 
                                        class="form-control-modern" 
                                        placeholder="Enter your email"
                                        required 
                                        autocomplete="email"
                                    >
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="form-floating-group">
                                <label>Password</label>
                                <div class="input-wrapper">
                                    <i class='bx bx-lock-alt input-icon'></i>
                                    <input 
                                        type="password" 
                                        name="password" 
                                        id="passwordInput"
                                        class="form-control-modern password-input" 
                                        placeholder="Enter your password"
                                        required
                                        autocomplete="current-password"
                                    >
                                    <button type="button" class="toggle-password" id="togglePassword">
                                        <i class='bx bx-hide' id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Remember & Forgot -->
                            <!-- <div class="extras-row">    
                                <label class="remember-check">
                                    <input type="checkbox">
                                    <span>Remember me</span>
                                </label>
                                <a href="auth-basic-forgot-password.html" class="forgot-link">Forgot Password?</a>
                            </div> -->

                            <!-- Submit Button -->
                            <button type="submit" class="btn-signin" id="signinBtn">
                                <span class="btn-text">Sign In</span>
                                <i class='bx bx-right-arrow-alt btn-icon'></i>
                                <div class="spinner"></div>
                            </button>

                            <!-- Security Badge -->
                            <div class="security-badge"> 
                                <i class='bx bx-shield-quarter'></i>
                                <span>Secured with 256-bit SSL encryption</span>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Accent Bar -->
                <div class="accent-bar"></div>
            </div>

            <!-- Footer -->
            <div class="footer-text">
                <p>&copy; 2025 <a href="#">Vision Technolabs</a>. All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/simplebar/js/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/metismenu/js/metisMenu.min.js') ?>"></script>

    <script>
        // Password Toggle
        document.getElementById('togglePassword').addEventListener('click', function () {
            const input = document.getElementById('passwordInput');
            const icon = document.getElementById('eyeIcon');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bx-hide');
                icon.classList.add('bx-show');
            } else {
                input.type = 'password';
                icon.classList.remove('bx-show');
                icon.classList.add('bx-hide');
            }
        });

        // Button loading state on submit
        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('signinBtn');
            btn.classList.add('loading');
            btn.disabled = true;
        });

        // Subtle input focus animations
        document.querySelectorAll('.form-control-modern').forEach(input => {
            input.addEventListener('focus', function () {
                this.closest('.form-floating-group').querySelector('label').style.color = '#667eea';
            });
            input.addEventListener('blur', function () {
                this.closest('.form-floating-group').querySelector('label').style.color = '#374151';
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php $error = $this->session->flashdata('login_error'); ?>

<?php if (!empty($error)): ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '<?= $error ?>',
        confirmButtonText: 'Try Again',
        confirmButtonColor: '#667eea'
    });
});
</script>
<?php endif; ?>

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/suju/firebase-messaging-sw.js')
                .then(reg => console.log('✅ SW registered', reg.scope))
                .catch(err => console.error('❌ SW error', err));
        }
    </script>
</body>

</html>