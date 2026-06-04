<style>
    /* ================= ENHANCED PROFILE STYLES ================= */
    .profile-wrapper {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 200px;
        border-radius: 0 0 30px 30px;
        margin: -30px -25px 0 -25px;
        padding: 30px 25px;
        position: relative;
        overflow: hidden;
    }

    .profile-wrapper::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 400px;
        height: 400px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
    }

    .profile-wrapper::after {
        content: '';
        position: absolute;
        bottom: -60%;
        left: -10%;
        width: 300px;
        height: 300px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }

    .profile-wrapper .breadcrumb-title {
        color: #fff;
        font-size: 1.8rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .profile-wrapper .breadcrumb-subtitle {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.95rem;
    }

    .profile-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        overflow: hidden;
        margin-top: -60px;
        position: relative;
        z-index: 2;
    }

    .profile-card:hover {
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        transform: translateY(-5px);
    }

    .profile-card .card-body {
        padding: 2.5rem;
    }

    .profile-avatar-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 1.5rem;
    }

    .profile-avatar-wrapper img {
        border: 4px solid transparent;
        background: linear-gradient(#fff, #fff) padding-box,
            linear-gradient(135deg, #667eea, #764ba2) border-box;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
    }

    .profile-avatar-wrapper:hover img {
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.45);
        transform: scale(1.05);
    }

    .camera-btn {
        position: absolute;
        bottom: 5px;
        right: 5px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        border-radius: 50%;
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 3px solid #fff;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .camera-btn:hover {
        transform: scale(1.15);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
    }

    .profile-name {
        font-size: 1.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.3rem;
    }

    .profile-role {
        display: inline-block;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        padding: 4px 18px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 0.8rem;
    }

    .profile-stats {
        display: flex;
        justify-content: center;
        gap: 2rem;
        padding: 1.2rem 0;
        margin: 1.2rem 0;
        border-top: 1px solid rgba(0, 0, 0, 0.06);
        border-bottom: 1px solid rgba(0, 0, 0, 0.06);
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 1.3rem;
        font-weight: 700;
        color: #333;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.75rem;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-top: 4px;
    }

    .btn-profile-action {
        border-radius: 12px;
        padding: 10px 24px;
        font-weight: 600;
        font-size: 0.85rem;
        letter-spacing: 0.3px;
        transition: all 0.3s ease;
    }

    .btn-follow {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        color: #fff;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }

    .btn-follow:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.45);
        color: #fff;
    }

    .btn-message {
        border: 2px solid #667eea;
        color: #667eea;
        background: transparent;
    }

    .btn-message:hover {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        border-color: transparent;
        transform: translateY(-2px);
    }

    /* ===== Form Card Styles ===== */
    .form-card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .form-card:hover {
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
    }

    .form-card .card-header-custom {
        background: linear-gradient(135deg, #667eea, #764ba2);
        padding: 1.5rem 2rem;
        border: none;
    }

    .form-card .card-header-custom h5 {
        color: #fff;
        margin: 0;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .form-card .card-header-custom p {
        color: rgba(255, 255, 255, 0.75);
        margin: 5px 0 0;
        font-size: 0.85rem;
    }

    .form-card .card-body {
        padding: 2rem;
    }

    .form-group-custom {
        margin-bottom: 1.5rem;
        position: relative;
    }

    .form-group-custom .form-label-custom {
        font-weight: 600;
        font-size: 0.85rem;
        color: #555;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-group-custom .form-label-custom i {
        font-size: 1.1rem;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .form-group-custom .form-control,
    .form-group-custom .form-select {
        border: 2px solid #e8ecf3;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background-color: #fafbff;
    }

    .form-group-custom .form-control:focus,
    .form-group-custom .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        background-color: #fff;
    }

    .form-group-custom .form-control::placeholder {
        color: #bcc3d6;
        font-size: 0.9rem;
    }

    .section-divider {
        display: flex;
        align-items: center;
        gap: 15px;
        margin: 2rem 0 1.5rem;
        padding: 0;
    }

    .section-divider span {
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #667eea;
        white-space: nowrap;
    }

    .section-divider::before,
    .section-divider::after {
        content: '';
        flex: 1;
        height: 2px;
        background: linear-gradient(90deg, #667eea20, #667eea40, #667eea20);
        border-radius: 2px;
    }

    .btn-save {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border: none;
        border-radius: 14px;
        padding: 14px 40px;
        font-weight: 700;
        font-size: 0.95rem;
        letter-spacing: 0.5px;
        color: #fff;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.35);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-save::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .btn-save:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(102, 126, 234, 0.5);
        color: #fff;
    }

    .btn-save:hover::before {
        left: 100%;
    }

    .btn-reset {
        border: 2px solid #e8ecf3;
        border-radius: 14px;
        padding: 13px 30px;
        font-weight: 600;
        font-size: 0.95rem;
        color: #888;
        background: transparent;
        transition: all 0.3s ease;
    }

    .btn-reset:hover {
        border-color: #ff6b6b;
        color: #ff6b6b;
        background: rgba(255, 107, 107, 0.05);
    }

    /* ===== Skills Tag Input ===== */
    .skills-container {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        padding: 10px 14px;
        border: 2px solid #e8ecf3;
        border-radius: 12px;
        background: #fafbff;
        min-height: 50px;
        cursor: text;
        transition: all 0.3s ease;
    }

    .skills-container:focus-within {
        border-color: #667eea;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        background: #fff;
    }

    .skill-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: linear-gradient(135deg, #667eea15, #764ba215);
        color: #667eea;
        padding: 5px 14px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        border: 1px solid #667eea30;
        animation: tagPop 0.3s ease;
    }

    @keyframes tagPop {
        0% {
            transform: scale(0.5);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .skill-tag .remove-skill {
        cursor: pointer;
        font-size: 1rem;
        line-height: 1;
        opacity: 0.7;
        transition: all 0.2s ease;
    }

    .skill-tag .remove-skill:hover {
        opacity: 1;
        color: #ff4757;
    }

    .skills-input {
        border: none;
        outline: none;
        background: transparent;
        flex: 1;
        min-width: 120px;
        font-size: 0.9rem;
        padding: 4px 0;
    }

    .skills-input::placeholder {
        color: #bcc3d6;
    }

    /* ===== Floating Labels Effect ===== */
    .input-icon-wrapper {
        position: relative;
    }

    .input-icon-wrapper .input-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #667eea;
        font-size: 1.1rem;
        z-index: 2;
    }

    .input-icon-wrapper .form-control {
        padding-left: 46px;
    }

    /* ===== Info Cards in Sidebar ===== */
    .info-mini-card {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        border-radius: 12px;
        background: #f8f9ff;
        margin-bottom: 10px;
        transition: all 0.3s ease;
    }

    .info-mini-card:hover {
        background: #eef0ff;
        transform: translateX(5px);
    }

    .info-mini-card .icon-box {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: linear-gradient(135deg, #667eea20, #764ba220);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: #667eea;
        flex-shrink: 0;
    }

    .info-mini-card .info-content h6 {
        margin: 0;
        font-size: 0.75rem;
        color: #999;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-mini-card .info-content p {
        margin: 2px 0 0;
        font-size: 0.9rem;
        font-weight: 600;
        color: #333;
    }

    /* ===== Responsive ===== */
    @media (max-width: 992px) {
        .profile-card {
            margin-top: 0;
            margin-bottom: 1.5rem;
        }

        .profile-wrapper {
            margin: -15px -15px 0 -15px;
            padding: 20px 15px;
        }
    }

    /* ===== Smooth Scroll ===== */
    .form-card,
    .profile-card {
        animation: fadeUp 0.6s ease forwards;
        opacity: 0;
    }

    .profile-card {
        animation-delay: 0.1s;
    }

    .form-card {
        animation-delay: 0.25s;
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ===== Toast Notification ===== */
    .toast-custom {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
    }

    /* ===== Password Strength ===== */
    .strength-bar {
        height: 4px;
        border-radius: 4px;
        background: #e8ecf3;
        margin-top: 8px;
        overflow: hidden;
    }

    .strength-bar-fill {
        height: 100%;
        border-radius: 4px;
        transition: all 0.4s ease;
        width: 0%;
    }

    /* ===== Completion indicator ===== */
    .completion-ring {
        position: relative;
        width: 80px;
        height: 80px;
        margin: 0 auto 15px;
    }

    .completion-ring svg {
        transform: rotate(-90deg);
    }

    .completion-ring .ring-bg {
        fill: none;
        stroke: #e8ecf3;
        stroke-width: 6;
    }

    .completion-ring .ring-fill {
        fill: none;
        stroke: url(#gradient);
        stroke-width: 6;
        stroke-linecap: round;
        stroke-dasharray: 207;
        stroke-dashoffset: 207;
        transition: stroke-dashoffset 1s ease;
    }

    .completion-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 0.85rem;
        font-weight: 700;
        color: #667eea;
    }

    .profile-card{
        border:none;
        border-radius:16px;
        box-shadow:0 4px 24px rgba(0,0,0,.06);
        margin-top:0px !important;
        position:relative;
        z-index:1;
    }

    .profile-wrapper{
        position:relative;
        z-index:5;
    }

    .profile-wrapper::after{
        content:'';
        position:absolute;
        bottom:-40px;
        left:0;
        width:100%;
        height:40px;
        background:transparent;
    }

    .profile-avatar-wrapper{
        position:relative;
        z-index:2;
    }


    .btn-change-password{
        background: linear-gradient(135deg,#fbbf24 0%,#f59e0b 100%);
        border:none;
        padding:12px 26px;
        border-radius:12px;
        font-weight:600;
        color:#fff;
        display:inline-flex;
        align-items:center;
        gap:6px;
        transition:all .3s ease;
        height:48px;
    }

    .btn-change-password:hover{
        background: linear-gradient(135deg,#f59e0b 0%,#d97706 100%);
        box-shadow:0 6px 20px rgba(251,191,36,.4);
        transform:translateY(-1px);
        color:#fff;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">

        <!-- ================= PROFILE FORM ================= -->
        <form action="<?= base_url('sales/profile/update') ?>" method="post" enctype="multipart/form-data" id="profileForm">

            <div class="container-fluid px-lg-4">
                <div class="row g-4">

                    <!-- ===== LEFT PROFILE CARD ===== -->
                    <div class="col-lg-4">
                        <div class="card profile-card">
                            <div class="card-body text-center">

                                <!-- Profile Completion Ring -->
                                <div class="completion-ring" id="completionRing">
                                    <svg width="80" height="80" viewBox="0 0 80 80">
                                        <defs>
                                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                                <stop offset="0%" style="stop-color:#667eea" />
                                                <stop offset="100%" style="stop-color:#764ba2" />
                                            </linearGradient>
                                        </defs>
                                        <circle class="ring-bg" cx="40" cy="40" r="33" />
                                        <circle class="ring-fill" cx="40" cy="40" r="33" id="ringFill" />
                                    </svg>
                                    <span class="completion-text" id="completionText">0%</span>
                                </div>
                                <p class="text-muted mb-3" style="font-size:0.75rem;text-transform:uppercase;letter-spacing:1px;">
                                    Profile Complete
                                </p>

                                <!-- Avatar -->
                                <div class="profile-avatar-wrapper">
                                    <img id="imagePreview"
                                        src="<?= !empty($user->photo)
                                                    ? base_url('uploads/profile/' . $user->photo)
                                                    : base_url('assets/default.jpg'); ?>"
                                        class="rounded-circle"
                                        width="130"
                                        height="130"
                                        style="object-fit:cover;"
                                        alt="Profile Photo">

                                    <label for="imageUpload" class="camera-btn" title="Change Photo">
                                        <i class="bx bx-camera"></i>
                                    </label>

                                    <input type="file"
                                        name="photo"
                                        id="imageUpload"
                                        hidden
                                        accept="image/*">
                                </div>

                                <h4 class="profile-name" id="displayName">
                                    <?= htmlspecialchars($user->name); ?>
                                </h4>
                                <span class="profile-role">Sales</span>
                                <p class="text-muted mt-2 mb-0" style="font-size:0.9rem;" id="displayAddress">
                                    <i class="bx bx-map me-1"></i>
                                    <?= htmlspecialchars($user->address ?? 'No address added'); ?>
                                </p>

                                <!-- Quick Info Cards -->
                                <div class="text-start mt-4">
                                    <div class="info-mini-card">
                                        <div class="icon-box">
                                            <i class="bx bx-envelope"></i>
                                        </div>
                                        <div class="info-content">
                                            <h6>Email</h6>
                                            <p id="displayEmail"><?= htmlspecialchars($user->email); ?></p>
                                        </div>
                                    </div>
                                    <div class="info-mini-card">
                                        <div class="icon-box">
                                            <i class="bx bx-phone"></i>
                                        </div>
                                        <div class="info-content">
                                            <h6>Phone</h6>
                                            <p id="displayPhone">
                                                <?= htmlspecialchars($user->phone ?? 'Not added'); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="info-mini-card">
                                        <div class="icon-box">
                                            <i class="bx bx-briefcase"></i>
                                        </div>
                                        <div class="info-content">
                                            <h6>Designation</h6>
                                            <p id="displayDesignation">
                                                <?= htmlspecialchars($user->designation ?? 'Not added'); ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="info-mini-card">
                                        <div class="icon-box">
                                            <i class="bx bx-calendar"></i>
                                        </div>
                                        <div class="info-content">
                                            <h6>Date of Birth</h6>
                                            <p id="displayDob">
                                                <?= !empty($user->dob) ? date('d M Y', strtotime($user->dob)) : 'Not added'; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ===== RIGHT PROFILE FORM ===== -->
                    <div class="col-lg-8">

                        <!-- Personal Information Card -->
                        <div class="card form-card mb-4">
                            <div class="card-header-custom">
                                <h5><i class="bx bx-user-circle me-2"></i> Personal Information</h5>
                                <p class="mb-0">Update your personal details here</p>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <!-- Full Name -->
                                    <div class="col-md-6">
                                        <div class="form-group-custom">
                                            <label class="form-label-custom">
                                                <i class="bx bx-user"></i> Full Name
                                            </label>
                                            <div class="input-icon-wrapper">
                                                <i class="bx bx-user input-icon"></i>
                                                <input type="text"
                                                    name="name"
                                                    id="nameInput"
                                                    class="form-control"
                                                    value="<?= htmlspecialchars($user->name); ?>"
                                                    placeholder="Enter your full name"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <div class="form-group-custom">
                                            <label class="form-label-custom">
                                                <i class="bx bx-envelope"></i> Email Address
                                            </label>
                                            <div class="input-icon-wrapper">
                                                <i class="bx bx-envelope input-icon"></i>
                                                <input type="email"
                                                    name="email"
                                                    id="emailInput"
                                                    class="form-control"
                                                    value="<?= htmlspecialchars($user->email); ?>"
                                                    placeholder="Enter your email"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <div class="form-group-custom">
                                            <label class="form-label-custom">
                                                <i class="bx bx-phone"></i> Phone Number
                                            </label>
                                            <div class="input-icon-wrapper">
                                                <i class="bx bx-phone input-icon"></i>
                                                <input type="text"
                                                    name="phone"
                                                    id="phoneInput"
                                                    class="form-control"
                                                    value="<?= htmlspecialchars($user->phone ?? ''); ?>"
                                                    placeholder="Enter phone number"
                                                    maxlength="15">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="col-md-6">
                                        <div class="form-group-custom">
                                            <label class="form-label-custom">
                                                <i class="bx bx-cake"></i> Date of Birth
                                            </label>
                                            <div class="input-icon-wrapper">
                                                <i class="bx bx-cake input-icon"></i>
                                                <input type="date"
                                                    name="dob"
                                                    id="dobInput"
                                                    class="form-control"
                                                    value="<?= htmlspecialchars($user->dob ?? ''); ?>"
                                                    max="<?= date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-12">
                                        <div class="form-group-custom">
                                            <label class="form-label-custom">
                                                <i class="bx bx-map"></i> Address
                                            </label>
                                            <div class="input-icon-wrapper">
                                                <i class="bx bx-map input-icon"></i>
                                                <input type="text"
                                                    name="address"
                                                    id="addressInput"
                                                    class="form-control"
                                                    value="<?= htmlspecialchars($user->address ?? ''); ?>"
                                                    placeholder="Enter your full address">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Professional Info Divider -->
                                <div class="section-divider">
                                    <span><i class="bx bx-briefcase-alt me-1"></i> Professional Details</span>
                                </div>

                                <div class="row">
                                    <!-- Designation -->
                                    <div class="col-md-6">
                                        <div class="form-group-custom">
                                            <label class="form-label-custom">
                                                <i class="bx bx-briefcase"></i> Designation
                                            </label>
                                            <div class="input-icon-wrapper">
                                                <i class="bx bx-briefcase input-icon"></i>
                                                <input type="text"
                                                    name="designation"
                                                    id="designationInput"
                                                    class="form-control"
                                                    value="<?= htmlspecialchars($user->designation ?? ''); ?>"
                                                    placeholder="e.g. Sales Consultant">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Aadhaar Card Number -->
                                    <div class="col-md-6">
                                        <div class="form-group-custom">
                                            <label class="form-label-custom">
                                                <i class="bx bx-id-card"></i> Aadhaar Card Number
                                            </label>
                                            <div class="input-icon-wrapper">
                                                <i class="bx bx-id-card input-icon"></i>
                                                <input type="text"
                                                    name="aadhar_card"
                                                    id="aadhaarInput"
                                                    class="form-control"
                                                    value="<?= htmlspecialchars($user->aadhar_card ?? ''); ?>"
                                                    placeholder="XXXX XXXX XXXX"
                                                    maxlength="14"
                                                    pattern="\d{4}\s?\d{4}\s?\d{4}">
                                            </div>
                                            <small class="text-muted mt-1 d-block">
                                                <i class="bx bx-lock-alt me-1"></i>
                                                Your Aadhaar is encrypted & secure
                                            </small>
                                        </div>
                                    </div>

                                    <!-- Skills -->
                                    <div class="col-12">
                                        <div class="form-group-custom">
                                            <label class="form-label-custom">
                                                <i class="bx bx-star"></i> Skills
                                            </label>

                                            <!-- TAG CONTAINER -->
                                            <div class="skills-container" id="skillsContainer">
                                                <!-- IMPORTANT INPUT -->
                                                <input type="text"
                                                    class="skills-input"
                                                    id="skillInput"
                                                    placeholder="Type a skill & press Enter..."
                                                    autocomplete="off">
                                            </div>

                                            <!-- HIDDEN INPUT -->
                                            <input type="hidden"
                                                name="skills"
                                                id="skillsHidden"
                                                value="<?= htmlspecialchars($user->skills ?? ''); ?>">

                                            <small class="text-muted mt-1 d-block">
                                                Press <kbd>Enter</kbd> or <kbd>,</kbd> to add a skill
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex gap-3 mt-4 pt-3"
                                    style="border-top: 2px solid #f0f2ff;">
                                    <button type="submit" class="btn btn-save" id="saveBtn">
                                        <i class="bx bx-check-circle me-2"></i> Save Changes
                                    </button>
                                    <button type="reset" class="btn btn-reset" id="resetBtn">
                                        <i class="bx bx-reset me-2"></i> Reset
                                    </button>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </form>

        <!-- ================= SCRIPTS ================= -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {

                // ===== Image Preview =====
                const imageUpload = document.getElementById('imageUpload');
                const imagePreview = document.getElementById('imagePreview');

                imageUpload.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (!file) return;

                    if (file.size > 2 * 1024 * 1024) {
                        showToast('Image must be less than 2 MB', 'error');
                        e.target.value = '';
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function (ev) {
                        imagePreview.style.opacity = '0';
                        setTimeout(() => {
                            imagePreview.src = ev.target.result;
                            imagePreview.style.opacity = '1';
                        }, 200);
                    };
                    reader.readAsDataURL(file);
                    showToast('Photo updated! Don\'t forget to save.', 'success');
                });

                // ===== Aadhaar Formatting =====
                const aadhaarInput = document.getElementById('aadhaarInput');
                aadhaarInput.addEventListener('input', function (e) {
                    let val = e.target.value.replace(/\D/g, '');
                    if (val.length > 12) val = val.slice(0, 12);
                    let formatted = val.replace(/(\d{4})(?=\d)/g, '$1 ');
                    e.target.value = formatted;
                });

                // ===== Skills Tag System =====
                const skillsContainer = document.getElementById('skillsContainer');
                const skillInput = document.getElementById('skillInput');
                const skillsHidden = document.getElementById('skillsHidden');

                let skills = skillsHidden.value
                    ? skillsHidden.value.split(',').map(s => s.trim().toLowerCase())
                    : [];

                // Load existing skills tags
                function initExistingSkills() {
                    const existing = skillsHidden.value;
                    if (existing) {
                        existing.split(',').forEach(s => {
                            s = s.trim();
                            if (s) {
                                const tag = document.createElement('span');
                                tag.className = 'skill-tag';
                                tag.innerHTML = `${escapeHtml(s)} <span class="remove-skill">&times;</span>`;
                                tag.querySelector('.remove-skill').addEventListener('click', function () {
                                    const idx = skills.indexOf(s.toLowerCase());
                                    if (idx > -1) skills.splice(idx, 1);
                                    tag.style.transform = 'scale(0)';
                                    setTimeout(() => tag.remove(), 200);
                                    updateHiddenSkills();
                                    calculateCompletion();
                                });
                                skillsContainer.insertBefore(tag, skillInput);
                            }
                        });
                    }
                }
                initExistingSkills();

                skillInput.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ',') {
                        e.preventDefault();
                        const val = skillInput.value.replace(',', '').trim();
                        if (val && !skills.includes(val.toLowerCase())) {
                            addSkillTag(val);
                            skillInput.value = '';
                        }
                    }
                    if (e.key === 'Backspace' && !skillInput.value && skills.length) {
                        removeLastSkill();
                    }
                });

                skillsContainer.addEventListener('click', () => skillInput.focus());

                function addSkillTag(text) {
                    skills.push(text.toLowerCase());
                    updateHiddenSkills();

                    const tag = document.createElement('span');
                    tag.className = 'skill-tag';
                    tag.innerHTML = `${escapeHtml(text)} <span class="remove-skill">&times;</span>`;

                    tag.querySelector('.remove-skill').addEventListener('click', function () {
                        const idx = skills.indexOf(text.toLowerCase());
                        if (idx > -1) skills.splice(idx, 1);
                        tag.style.transform = 'scale(0)';
                        setTimeout(() => tag.remove(), 200);
                        updateHiddenSkills();
                        calculateCompletion();
                    });

                    skillsContainer.insertBefore(tag, skillInput);
                    calculateCompletion();
                }

                function removeLastSkill() {
                    const tags = skillsContainer.querySelectorAll('.skill-tag');
                    if (tags.length) {
                        const last = tags[tags.length - 1];
                        skills.pop();
                        last.style.transform = 'scale(0)';
                        setTimeout(() => last.remove(), 200);
                        updateHiddenSkills();
                        calculateCompletion();
                    }
                }

                function updateHiddenSkills() {
                    skillsHidden.value = skills.join(', ');
                }

                // ===== Live Sidebar Updates =====
                const nameInput = document.getElementById('nameInput');
                const emailInput = document.getElementById('emailInput');
                const phoneInput = document.getElementById('phoneInput');
                const addressInput = document.getElementById('addressInput');
                const designationInput = document.getElementById('designationInput');
                const dobInput = document.getElementById('dobInput');

                nameInput.addEventListener('input', function () {
                    document.getElementById('displayName').textContent = this.value || 'Your Name';
                    calculateCompletion();
                });

                emailInput.addEventListener('input', function () {
                    document.getElementById('displayEmail').textContent = this.value || 'Not added';
                    calculateCompletion();
                });

                phoneInput.addEventListener('input', function () {
                    document.getElementById('displayPhone').textContent = this.value || 'Not added';
                    calculateCompletion();
                });

                addressInput.addEventListener('input', function () {
                    const addr = this.value || 'No address added';
                    document.getElementById('displayAddress').innerHTML =
                        '<i class="bx bx-map me-1"></i>' + escapeHtml(addr);
                    calculateCompletion();
                });

                designationInput.addEventListener('input', function () {
                    document.getElementById('displayDesignation').textContent = this.value || 'Not added';
                    calculateCompletion();
                });

                dobInput.addEventListener('change', function () {
                    if (this.value) {
                        const d = new Date(this.value);
                        document.getElementById('displayDob').textContent =
                            d.toLocaleDateString('en-US', { day: '2-digit', month: 'short', year: 'numeric' });
                    } else {
                        document.getElementById('displayDob').textContent = 'Not added';
                    }
                    calculateCompletion();
                });

                // ===== Profile Completion Calculator =====
                function calculateCompletion() {
                    const fields = [
                        nameInput.value,
                        emailInput.value,
                        phoneInput.value,
                        addressInput.value,
                        designationInput.value,
                        dobInput.value,
                        aadhaarInput.value,
                        skillsHidden.value,
                    ];
                    
                    const photoChanged = imageUpload.files.length > 0 ||
                        (imagePreview.src.indexOf('avatar') === -1 && imagePreview.src.indexOf('default.jpg') === -1);

                    let filled = fields.filter(f => f && f.trim()).length;
                    if (photoChanged) filled++;
                    const total = fields.length + 1; // +1 for photo
                    const pct = Math.round((filled / total) * 100);

                    const ring = document.getElementById('ringFill');
                    const circumference = 2 * Math.PI * 33; // r=33
                    const offset = circumference - (pct / 100) * circumference;
                    ring.style.strokeDashoffset = offset;

                    document.getElementById('completionText').textContent = pct + '%';
                }

                // Initial calculation
                setTimeout(calculateCompletion, 500);

                // ===== Toast Helper =====
                function showToast(msg, type) {
                    const existing = document.querySelector('.toast-custom');
                    if (existing) existing.remove();

                    const colors = {
                        success: 'linear-gradient(135deg, #00b09b, #96c93d)',
                        error: 'linear-gradient(135deg, #ff5f6d, #ffc371)',
                        info: 'linear-gradient(135deg, #667eea, #764ba2)',
                    };

                    const toast = document.createElement('div');
                    toast.className = 'toast-custom';
                    toast.innerHTML = `
                        <div style="background:${colors[type] || colors.info};
                                    color:#fff;padding:16px 24px;border-radius:14px;
                                    box-shadow:0 10px 40px rgba(0,0,0,0.15);
                                    display:flex;align-items:center;gap:12px;
                                    font-weight:600;font-size:0.9rem;">
                            <i class="bx ${type === 'success' ? 'bx-check-circle' : 'bx-error-circle'}"
                               style="font-size:1.4rem;"></i>
                            ${msg}
                        </div>`;
                    document.body.appendChild(toast);

                    setTimeout(() => {
                        toast.style.opacity = '0';
                        toast.style.transform = 'translateX(100px)';
                        toast.style.transition = 'all 0.4s ease';
                        setTimeout(() => toast.remove(), 400);
                    }, 3000);
                }

                // ===== Save Button Animation =====
                document.getElementById('profileForm').addEventListener('submit', function () {
                    const btn = document.getElementById('saveBtn');
                    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Saving...';
                    btn.disabled = true;
                });

                // ===== Escape HTML =====
                function escapeHtml(str) {
                    const div = document.createElement('div');
                    div.textContent = str;
                    return div.innerHTML;
                }

                // ===== Input focus animations =====
                document.querySelectorAll('.form-group-custom .form-control').forEach(input => {
                    input.addEventListener('focus', function () {
                        this.closest('.form-group-custom').style.transform = 'scale(1.01)';
                        this.closest('.form-group-custom').style.transition = 'transform 0.2s ease';
                    });
                    input.addEventListener('blur', function () {
                        this.closest('.form-group-custom').style.transform = 'scale(1)';
                    });
                });

            });
        </script>

    </div>
</div>
