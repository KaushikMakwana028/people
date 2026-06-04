<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		(function() {
			var savedTheme = localStorage.getItem('admin-theme') || 'light';
			document.documentElement.setAttribute('data-bs-theme', savedTheme);
		})();
	</script>
	<!--favicon-->
	<link rel="icon" href="<?= base_url('assets/images/vlogo.png') ?>" type="image/png">
	<!--plugins-->
	<link href="<?= base_url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') ?>" rel="stylesheet">
	<!-- <link href="<?= base_url('assets/plugins/simplebar/css/simplebar.css') ?>" rel="stylesheet"> -->
	<link href="<?= base_url('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/plugins/metismenu/css/metisMenu.min.css') ?>" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/bootstrap-extended.css') ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

	<link href="<?= base_url('assets/sass/app.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/icons.css') ?>" rel="stylesheet">

	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/sass/dark-theme.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/sass/semi-dark.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/sass/bordered-theme.css') ?>">


	<link rel="stylesheet" href="<?= base_url('assets/css/premium-shell.css?v=1.0.1') ?>">


	<title>VISION TECHNOLABS</title>
	<style>
		:root {
			--sidebar-width: 280px;
			--sidebar-collapsed-width: 80px;
		}

		.sidebar-wrapper .metismenu ul:not(.mm-show) {
			display: none !important;
		}

		.sidebar-wrapper .metismenu>li>a {
			position: relative;
			z-index: 2;
		}

		@media (min-width: 992px) {
			.sidebar-wrapper {
				width: var(--sidebar-width) !important;
				overflow: hidden !important;
			}

			.topbar {
				left: var(--sidebar-width) !important;
			}

			.page-wrapper {
				margin-left: var(--sidebar-width) !important;
			}

			.wrapper.toggled .sidebar-wrapper {
				width: var(--sidebar-collapsed-width) !important;
			}

			.wrapper.toggled .topbar {
				left: var(--sidebar-collapsed-width) !important;
			}

			.wrapper.toggled .page-wrapper {
				margin-left: var(--sidebar-collapsed-width) !important;
			}
		}

		body,
		.page-wrapper,
		.page-content,
		input,
		select,
		textarea,
		button,
		a {
			font-family: 'Poppins', sans-serif !important;
		}

		/* Header mobile fixes */
		.topbar {
			padding: 0 12px;
		}

		.topbar .navbar {
			min-height: 60px;
			padding: 8px 0;
		}

		/* Give the dark mode icon proper styling */
		.premium-icon-btn.dark-mode-icon {
			display: flex !important;
			align-items: center;
			justify-content: center;
			width: 38px;
			height: 38px;
			border-radius: 10px;
			border: 1.5px solid var(--border-color, #e2e8f0);
			background: var(--bg-primary, #fff);
			color: var(--text-primary, #0f172a);
			font-size: 18px;
			cursor: pointer;
			text-decoration: none;
		}

		/* Space between hamburger and right icons */
		.mobile-toggle-menu {
			padding: 6px 8px;
			font-size: 22px;
			cursor: pointer;
			color: var(--text-primary, #0f172a);
		}

		@media (max-width: 768px) {
			.topbar {
				padding: 0 8px;
			}

			.user-box.dropdown {
				padding-left: 6px !important;
				padding-right: 0 !important;
			}

			.top-menu .navbar-nav {
				gap: 6px !important;
			}
		}
	</style>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper">
			<div class="sidebar-header" style="display:flex;align-items:center;padding:15px;">

				<img id="logoFull" src="<?= base_url('assets/images/vision.png') ?>" style="width:160px;height:auto;">

				<img id="logoIcon" src="<?= base_url('assets/images/slogo.png') ?>"
					style="width:42px;height:auto;display:none;">
				<button type="button" class="premium-sidebar-toggle mobile-toggle-menu" aria-label="Toggle sidebar">
					<i class='bx bx-chevron-left'></i>
				</button>

			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">

				<li>
					<a href="<?= base_url('sales/dashboard') ?>">
						<div class="parent-icon"><i class="bx bx-home"></i></div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-magnet"></i></div>
						<div class="menu-title">Leads</div>
					</a>
					<ul>
						<li><a href="<?= base_url('sales/leads') ?>"><i class="bx bx-radio-circle"></i>All Leads</a></li>
						<?php
						$CI = &get_instance();
						$CI->load->database();
						$sidebar_products = $CI->db->get('products')->result();
						foreach ($sidebar_products as $sp):
						?>
							<li>
								<a href="<?= base_url('sales/leads?product_id=' . $sp->id) ?>">
									<i class="bx bx-radio-circle"></i>
									<?= htmlspecialchars($sp->name) ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>

				<li>
					<a href="<?= base_url('sales/leads/history') ?>">
						<div class="parent-icon"><i class="bx bx-history"></i></div>
						<div class="menu-title">History</div>
					</a>
				</li>





			</ul>
		</div>
		<!--end sidebar wrapper -->






		<!--start header -->
		<header>
			<div class="topbar">
				<!-- Replace the existing nav content inside .topbar -->
				<nav class="navbar navbar-expand gap-2 align-items-center">

					<!-- Hamburger (mobile toggle) -->
					<div class="mobile-toggle-menu d-flex">
						<i class='bx bx-menu'></i>
					</div>

					<!-- Right side icons -->
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">

							<!-- ✅ Dark/Light toggle — ALWAYS visible (removed d-none d-sm-flex) -->
							<li class="nav-item dark-mode">
								<a class="premium-icon-btn dark-mode-icon" href="javascript:;"
									title="Toggle Theme"
									style="display:flex;align-items:center;justify-content:center;
                          width:38px;height:38px;border-radius:10px;
                          border:1.5px solid var(--border-color, #e2e8f0);
                          background:var(--bg-primary, #fff);
                          color:var(--text-primary, #0f172a);
                          font-size:18px;cursor:pointer;text-decoration:none;">
									<i class='bx bx-moon'></i>
								</a>
							</li>

						</ul>
					</div>

					<!-- User box -->
					<div class="user-box dropdown px-2">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-2 dropdown-toggle-nocaret"
							href="javascript:;" role="button" data-bs-toggle="dropdown" aria-expanded="false">

							<?php
							$headerUser = null;
							$headerUserId = $this->session->userdata('user_id');
							if (!empty($headerUserId)) {
								$headerUser = $this->db
									->select('name, photo')
									->where('id', $headerUserId)
									->get('users')
									->row();
								if ($headerUser) {
									$this->session->set_userdata([
										'user_name' => $headerUser->name,
										'user_photo' => $headerUser->photo
									]);
								}
							}
							$photo = $headerUser->photo ?? $this->session->userdata('user_photo') ?? $this->session->userdata('photo');
							?>

							<img src="<?= (!empty($photo)
											? base_url('uploads/profile/' . $photo)
											: base_url('assets/default.jpg')) . '?v=' . time(); ?>"
								class="user-img rounded-circle" width="38" height="38" style="object-fit:cover;">

							<!-- Name hidden on mobile to save space -->
							<div class="user-info d-none d-md-block">
								<p class="user-name mb-0 fw-semibold" style="font-size:13px;line-height:1.2;">
									<?= htmlspecialchars(ucfirst($this->session->userdata('user_name') ?? 'User')) ?>
								</p>
								<p class="designattion mb-0 text-muted" style="font-size:11px;">Sales</p>
							</div>
						</a>

						<ul class="dropdown-menu dropdown-menu-end">
							<li>
								<a class="dropdown-item d-flex align-items-center gap-2" href="<?= site_url('sales/profile'); ?>">
									<i class="bx bx-user fs-5"></i><span>Profile</span>
								</a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li>
								<a href="<?= base_url('sales/logout') ?>"
									onclick="return confirmSweetAction(this, 'Are you sure you want to logout?')"
									class="dropdown-item d-flex align-items-center gap-2">
									<i class="bx bx-log-out-circle fs-5"></i> Logout
								</a>
							</li>
						</ul>
					</div>

				</nav>
			</div>
		</header>
		<!--end header -->
