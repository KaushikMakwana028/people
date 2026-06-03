
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/images/vlogo.png') ?>" type="image/png">
    <link href="<?= base_url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/plugins/simplebar/css/simplebar.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/plugins/metismenu/css/metisMenu.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/pace.min.css') ?>" rel="stylesheet"/>
    <script src="<?= base_url('assets/js/pace.min.js') ?>"></script>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap-extended.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/sass/app.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('assets/sass/dark-theme.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/sass/semi-dark.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/sass/bordered-theme.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Vision TECHNOLABS</title>

    <style>
        .logo-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .logo-icon-big {
            height: 45px;
            width: auto;
            max-width: 180px;
            object-fit: contain;
        }

        /* ===== Enhanced Attendance Styles ===== */
        .greeting-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 16px;
            padding: 28px 32px;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .greeting-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }
        .greeting-section::after {
            content: '';
            position: absolute;
            bottom: -60%;
            right: 10%;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
        }

        .live-clock-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 16px;
            text-align: center;
            padding: 24px;
            border: none;
            position: relative;
            overflow: hidden;
        }
        .live-clock-display {
            font-size: 42px;
            font-weight: 700;
            color: #2c3e50;
            letter-spacing: 2px;
            font-family: 'Courier New', monospace;
        }
        .live-clock-date {
            font-size: 15px;
            color: #6c757d;
            font-weight: 500;
        }
        .live-clock-icon {
            font-size: 80px;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.06;
            color: #667eea;
        }

        .attendance-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .attendance-card:hover {
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }
        .attendance-card .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 18px 24px;
        }
        .attendance-card .card-body {
            padding: 28px;
        }

        .info-stat-card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden;
        }
        .info-stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        }
        .info-stat-card .stat-icon-wrap {
            width: 52px;
            height: 52px;
            min-width: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .form-control-enhanced,
        .form-select-enhanced {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #fafbfc;
        }
        .form-control-enhanced:focus,
        .form-select-enhanced:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.15);
            background-color: #fff;
        }
        .form-control-enhanced:read-only {
            background-color: #f8f9fa;
            color: #495057;
        }

        .form-label-enhanced {
            font-weight: 600;
            color: #344767;
            margin-bottom: 8px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-submit-attendance {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 14px 24px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .btn-submit-attendance:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        .btn-submit-attendance:active {
            transform: translateY(0);
        }
        .btn-submit-attendance::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .btn-submit-attendance:hover::after {
            left: 100%;
        }

        .success-card {
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border-left: 5px solid #28a745;
        }
        .success-card .success-icon {
            width: 70px;
            height: 70px;
            background: rgba(40, 167, 69, 0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            color: #28a745;
            margin: 0 auto 16px;
        }

        .status-option {
            display: none;
        }
        .status-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 20px;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 15px;
            background: #fafbfc;
        }
        .status-option:checked + .status-label.present-label {
            border-color: #28a745;
            background: rgba(40, 167, 69, 0.08);
            color: #28a745;
            box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.15);
        }
        .status-option:checked + .status-label.absent-label {
            border-color: #dc3545;
            background: rgba(220, 53, 69, 0.08);
            color: #dc3545;
            box-shadow: 0 0 0 3px rgba(220, 53, 69, 0.15);
        }
        .status-label:hover {
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.05);
        }

        .pulse-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            animation: pulseDot 1.5s ease-in-out infinite;
        }
        @keyframes pulseDot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.3); }
        }

        .attendance-timeline-item {
            position: relative;
            padding-left: 30px;
            padding-bottom: 20px;
            border-left: 2px solid #e9ecef;
        }
        .attendance-timeline-item:last-child {
            border-left: 2px solid transparent;
            padding-bottom: 0;
        }
        .attendance-timeline-item::before {
            content: '';
            position: absolute;
            left: -7px;
            top: 2px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #667eea;
            border: 2px solid #fff;
            box-shadow: 0 0 0 2px #667eea;
        }
        .attendance-timeline-item.completed::before {
            background: #28a745;
            box-shadow: 0 0 0 2px #28a745;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in {
            animation: fadeInUp 0.5s ease forwards;
        }
        .animate-delay-1 { animation-delay: 0.1s; opacity: 0; }
        .animate-delay-2 { animation-delay: 0.2s; opacity: 0; }
        .animate-delay-3 { animation-delay: 0.3s; opacity: 0; }
        .animate-delay-4 { animation-delay: 0.4s; opacity: 0; }
    </style>


<body>
    <div class="wrapper">


      
     

        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">

                <!-- Breadcrumb -->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3 fw-bold">
                        <i class="bx bx-calendar-check text-primary me-1"></i> Attendance
                    </div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url('emp/dashboard') ?>"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Add Attendance</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <!-- ===== GREETING SECTION ===== -->
                <div class="greeting-section mb-4 animate-in animate-delay-1">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="fw-bold mb-1" id="greetingText">
                                Good Morning, <?= ucfirst($this->session->userdata('user_name')) ?>! 👋
                            </h3>
                            <p class="mb-0 opacity-75" style="font-size: 15px;">
                                <?php if($already_marked): ?>
                                    Your attendance for today has been recorded. Have a productive day!
                                <?php else: ?>
                                    Don't forget to mark your attendance for today. Stay consistent!
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-md-4 text-md-end mt-3 mt-md-0">
                            <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill"
                                 style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px);">
                                <span class="pulse-dot" style="background: <?= $already_marked ? '#28a745' : '#ffc107' ?>;"></span>
                                <span class="fw-semibold" style="font-size: 14px;">
                                    <?= $already_marked ? 'Attendance Marked' : 'Pending Submission' ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== INFO STAT CARDS ===== -->
                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-lg-3 animate-in animate-delay-1">
                        <div class="card info-stat-card" style="border-left: 4px solid #667eea;">
                            <div class="card-body d-flex align-items-center py-3">
                                <div class="stat-icon-wrap me-3" style="background: rgba(102,126,234,0.1); color: #667eea;">
                                    <i class="bx bx-calendar"></i>
                                </div>
                                <div>
                                    <p class="text-muted mb-0 small fw-semibold text-uppercase">Today</p>
                                    <h6 class="fw-bold mb-0"><?= date('d M Y') ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 animate-in animate-delay-2">
                        <div class="card info-stat-card" style="border-left: 4px solid #28a745;">
                            <div class="card-body d-flex align-items-center py-3">
                                <div class="stat-icon-wrap me-3" style="background: rgba(40,167,69,0.1); color: #28a745;">
                                    <i class="bx bx-calendar-check"></i>
                                </div>
                                <div>
                                    <p class="text-muted mb-0 small fw-semibold text-uppercase">Day</p>
                                    <h6 class="fw-bold mb-0"><?= date('l') ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 animate-in animate-delay-3">
                        <div class="card info-stat-card" style="border-left: 4px solid #ffc107;">
                            <div class="card-body d-flex align-items-center py-3">
                                <div class="stat-icon-wrap me-3" style="background: rgba(255,193,7,0.1); color: #ffc107;">
                                    <i class="bx bx-time-five"></i>
                                </div>
                                <div>
                                    <p class="text-muted mb-0 small fw-semibold text-uppercase">Time</p>
                                    <h6 class="fw-bold mb-0" id="headerClock">--:--:--</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 animate-in animate-delay-4">
                        <div class="card info-stat-card" style="border-left: 4px solid <?= $already_marked ? '#28a745' : '#dc3545' ?>;">
                            <div class="card-body d-flex align-items-center py-3">
                                <div class="stat-icon-wrap me-3"
                                     style="background: <?= $already_marked ? 'rgba(40,167,69,0.1)' : 'rgba(220,53,69,0.1)' ?>;
                                            color: <?= $already_marked ? '#28a745' : '#dc3545' ?>;">
                                    <i class="bx <?= $already_marked ? 'bx-check-circle' : 'bx-x-circle' ?>"></i>
                                </div>
                                <div>
                                    <p class="text-muted mb-0 small fw-semibold text-uppercase">Status</p>
                                    <h6 class="fw-bold mb-0" style="color: <?= $already_marked ? '#28a745' : '#dc3545' ?>;">
                                        <?= $already_marked ? 'Submitted' : 'Not Marked' ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ===== MAIN CONTENT ROW ===== -->
                <div class="row g-4">

                    <!-- LEFT: Attendance Form -->
                    <div class="col-lg-7 animate-in animate-delay-2">

                        <?php if($already_marked): ?>
                            <!-- Already Marked Success Card -->
                            <div class="card success-card">
                                <div class="card-body text-center py-5">
                                    <div class="success-icon">
                                        <i class="bx bx-check"></i>
                                    </div>
                                    <h4 class="fw-bold text-success mb-2">Attendance Submitted!</h4>
                                    <p class="text-muted mb-3" style="max-width: 400px; margin: 0 auto;">
                                        Your attendance for <strong><?= date('l, d M Y') ?></strong> has been 
                                        successfully recorded. Have a great and productive day!
                                    </p>
                                    <div class="d-flex justify-content-center gap-2 mt-3">
                                        <a href="<?= base_url('emp/attendance_list') ?>" class="btn btn-outline-success rounded-pill px-4">
                                            <i class="bx bx-list-ul me-1"></i> View Attendance List
                                        </a>
                                        <a href="<?= base_url('emp/dashboard') ?>" class="btn btn-outline-primary rounded-pill px-4">
                                            <i class="bx bx-home me-1"></i> Dashboard
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <!-- Attendance Form Card -->
                            <div class="card attendance-card">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="mb-0 text-white fw-bold">
                                        <i class="bx bx-edit me-2"></i>Mark Today's Attendance
                                    </h5>
                                    <span class="badge bg-white text-dark rounded-pill px-3 py-2" style="font-size: 12px;">
                                        <i class="bx bx-calendar me-1"></i><?= date('d M Y') ?>
                                    </span>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="<?= site_url('emp/save_attendance') ?>" id="attendanceForm">

                                        <!-- Date Field -->
                                        <div class="mb-4">
                                            <label class="form-label-enhanced">
                                                <i class="bx bx-calendar text-primary"></i> Date
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text border-2" style="border-radius: 10px 0 0 10px; background: #f8f9fa;">
                                                    <i class="bx bx-calendar-event text-primary"></i>
                                                </span>
                                                <input class="form-control form-control-enhanced" 
                                                       value="<?= date('l, d-m-Y') ?>" readonly
                                                       style="border-radius: 0 10px 10px 0;">
                                            </div>
                                        </div>

                                        <!-- Time Field -->
                                        <div class="mb-4">
                                            <label class="form-label-enhanced">
                                                <i class="bx bx-time-five text-success"></i> Current Time
                                                <span class="pulse-dot ms-1" style="background: #28a745;"></span>
                                                <span class="text-muted small fw-normal">Live</span>
                                            </label>
                                            <div class="input-group">
                                                <span class="input-group-text border-2" style="border-radius: 10px 0 0 10px; background: #f8f9fa;">
                                                    <i class="bx bx-time text-success"></i>
                                                </span>
                                                <input type="text" id="currentTime"
                                                       class="form-control form-control-enhanced fw-bold"
                                                       readonly style="border-radius: 0 10px 10px 0; font-size: 18px; letter-spacing: 1px;">
                                            </div>
                                        </div>

                                        <!-- Status Selection -->
                                        <div class="mb-4">
                                            <label class="form-label-enhanced">
                                                <i class="bx bx-user-check text-warning"></i> Attendance Status
                                            </label>
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <input type="radio" name="status" value="Present" 
                                                           id="statusPresent" class="status-option" checked>
                                                    <label for="statusPresent" class="status-label present-label w-100">
                                                        <i class="bx bx-check-circle fs-4"></i>
                                                        Present
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <input type="radio" name="status" value="Absent" 
                                                           id="statusAbsent" class="status-option">
                                                    <label for="statusAbsent" class="status-label absent-label w-100">
                                                        <i class="bx bx-x-circle fs-4"></i>
                                                        Absent
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <button type="submit" class="btn btn-primary btn-submit-attendance w-100 text-white mt-2"
                                                id="submitBtn">
                                            <i class="bx bx-check-double me-2 fs-5"></i> Submit Attendance
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- RIGHT: Clock & Info Panel -->
                    <div class="col-lg-5 animate-in animate-delay-3">

                        <!-- Live Clock -->
                        <div class="card live-clock-card mb-4">
                            <div class="card-body position-relative">
                                <i class="bx bx-time live-clock-icon"></i>
                                <p class="live-clock-date mb-2">
                                    <i class="bx bx-calendar me-1"></i>
                                    <span id="fullDate"><?= date('l, d F Y') ?></span>
                                </p>
                                <div class="live-clock-display" id="bigClock">
                                    --:--:--
                                </div>
                                <p class="mb-0 mt-2" id="ampmDisplay" style="font-size: 18px; color: #667eea; font-weight: 600;">
                                    --
                                </p>
                            </div>
                        </div>

                        <!-- Today's Checklist -->
                        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">
                                    <i class="bx bx-task text-primary me-1"></i> Attendance Checklist
                                </h6>
                                <div class="attendance-timeline">
                                    <div class="attendance-timeline-item completed">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="fw-semibold mb-0 small">Login to Portal</h6>
                                                <p class="text-muted mb-0 small">Accessed the system</p>
                                            </div>
                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill">Done</span>
                                        </div>
                                    </div>
                                    <div class="attendance-timeline-item <?= $already_marked ? 'completed' : '' ?>">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="fw-semibold mb-0 small">Mark Attendance</h6>
                                                <p class="text-muted mb-0 small">Submit daily attendance</p>
                                            </div>
                                            <span class="badge <?= $already_marked ? 'bg-success bg-opacity-10 text-success' : 'bg-warning bg-opacity-10 text-warning' ?> rounded-pill">
                                                <?= $already_marked ? 'Done' : 'Pending' ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="attendance-timeline-item">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="fw-semibold mb-0 small">Start Your Work</h6>
                                                <p class="text-muted mb-0 small">Begin daily tasks</p>
                                            </div>
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill">
                                                <?= $already_marked ? 'In Progress' : 'Waiting' ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="card border-0 shadow-sm mt-4" style="border-radius: 16px;">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3">
                                    <i class="bx bx-link-alt text-primary me-1"></i> Quick Links
                                </h6>
                                <div class="d-grid gap-2">
                                    <a href="<?= base_url('emp/attendance_list') ?>"
                                       class="btn btn-light d-flex align-items-center gap-2 text-start rounded-3 py-2">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle"
                                             style="width: 36px; height: 36px; min-width: 36px; background: rgba(102,126,234,0.1);">
                                            <i class="bx bx-list-ul text-primary"></i>
                                        </div>
                                        <div>
                                            <span class="fw-semibold d-block small">Attendance List</span>
                                            <span class="text-muted" style="font-size: 11px;">View all records</span>
                                        </div>
                                        <i class="bx bx-chevron-right ms-auto text-muted"></i>
                                    </a>
                                    <a href="<?= base_url('emp/leave/add') ?>"
                                       class="btn btn-light d-flex align-items-center gap-2 text-start rounded-3 py-2">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle"
                                             style="width: 36px; height: 36px; min-width: 36px; background: rgba(40,167,69,0.1);">
                                            <i class="bx bx-log-out text-success"></i>
                                        </div>
                                        <div>
                                            <span class="fw-semibold d-block small">Apply Leave</span>
                                            <span class="text-muted" style="font-size: 11px;">Request time off</span>
                                        </div>
                                        <i class="bx bx-chevron-right ms-auto text-muted"></i>
                                    </a>
                                    <a href="<?= base_url('emp/holidays') ?>"
                                       class="btn btn-light d-flex align-items-center gap-2 text-start rounded-3 py-2">
                                        <div class="d-flex align-items-center justify-content-center rounded-circle"
                                             style="width: 36px; height: 36px; min-width: 36px; background: rgba(255,193,7,0.1);">
                                            <i class="bx bx-calendar-star text-warning"></i>
                                        </div>
                                        <div>
                                            <span class="fw-semibold d-block small">Holidays</span>
                                            <span class="text-muted" style="font-size: 11px;">View upcoming holidays</span>
                                        </div>
                                        <i class="bx bx-chevron-right ms-auto text-muted"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--end page wrapper -->

        <!-- Clock & Greeting Script -->
        <script>
            function updateAllClocks() {
                const now = new Date();
                let hours = now.getHours();
                let minutes = now.getMinutes();
                let seconds = now.getSeconds();
                let ampm = hours >= 12 ? 'PM' : 'AM';

                hours = hours % 12;
                hours = hours ? hours : 12;

                const pad = n => n.toString().padStart(2, '0');
                const timeStr = `${pad(hours)}:${pad(minutes)}:${pad(seconds)}`;

                // Update all clock displays
                const currentTime = document.getElementById('currentTime');
                if (currentTime) currentTime.value = `${timeStr} ${ampm}`;

                const bigClock = document.getElementById('bigClock');
                if (bigClock) bigClock.textContent = timeStr;

                const ampmDisplay = document.getElementById('ampmDisplay');
                if (ampmDisplay) ampmDisplay.textContent = ampm;

                const headerClock = document.getElementById('headerClock');
                if (headerClock) headerClock.textContent = `${timeStr} ${ampm}`;
            }

            function updateGreeting() {
                const hour = new Date().getHours();
                const greetingEl = document.getElementById('greetingText');
                if (!greetingEl) return;

                let greeting = 'Good Morning';
                let emoji = '☀️';

                if (hour >= 12 && hour < 17) {
                    greeting = 'Good Afternoon';
                    emoji = '🌤️';
                } else if (hour >= 17 && hour < 21) {
                    greeting = 'Good Evening';
                    emoji = '🌅';
                } else if (hour >= 21 || hour < 5) {
                    greeting = 'Good Night';
                    emoji = '🌙';
                }

                greetingEl.innerHTML = `${greeting}, <?= ucfirst($this->session->userdata('user_name')) ?>! ${emoji}`;
            }

            // Initialize
            updateAllClocks();
            updateGreeting();
            setInterval(updateAllClocks, 1000);

            // Form submit animation
            const form = document.getElementById('attendanceForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const btn = document.getElementById('submitBtn');
                    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Submitting...';
                    btn.disabled = true;
                });
            }
        </script>

        <div class="overlay toggle-icon"></div>
        <a href="javascript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    </div>



    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/simplebar/js/simplebar.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/metismenu/js/metisMenu.min.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('assets/js/app.js?v=1.0.1') ?>"></script>
</body>
</html>