<?php
if (!function_exists('render_custom_pagination')) {
    function render_custom_pagination($total_rows, $per_page, $current_page, $prefix = 'prod', $query_param = 'page') {
        $total_pages = (int)ceil($total_rows / $per_page);
        if ($total_pages <= 1) {
            return '';
        }

        $links = [];

        $get_page_link = function($page) use ($query_param) {
            $get = $_GET;
            $get[$query_param] = $page;
            return current_url() . '?' . http_build_query($get);
        };

        // Prev link
        if ($current_page > 1) {
            $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link($current_page - 1) . '">&larr; Prev</a></li>';
        } else {
            $links[] = '<li class="cust-pag-item"><span class="cust-pag-link disabled">&larr; Prev</span></li>';
        }

        // Page items
        if ($total_pages <= 5) {
            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $current_page) {
                    $links[] = '<li class="cust-pag-item"><span class="cust-pag-link active">' . $i . '</span></li>';
                } else {
                    $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link($i) . '">' . $i . '</a></li>';
                }
            }
        } else {
            // Case 1: Near beginning (current_page <= 3) -> 1 2 3 ... total_pages
            if ($current_page <= 3) {
                for ($i = 1; $i <= 3; $i++) {
                    if ($i == $current_page) {
                        $links[] = '<li class="cust-pag-item"><span class="cust-pag-link active">' . $i . '</span></li>';
                    } else {
                        $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link($i) . '">' . $i . '</a></li>';
                    }
                }
                $links[] = '<li class="cust-pag-item"><span class="cust-pag-dots">...</span></li>';
                $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link($total_pages) . '">' . $total_pages . '</a></li>';
            }
            // Case 2: Near end (current_page >= total_pages - 2) -> 1 ... total_pages-2 total_pages-1 total_pages
            elseif ($current_page >= $total_pages - 2) {
                $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link(1) . '">1</a></li>';
                $links[] = '<li class="cust-pag-item"><span class="cust-pag-dots">...</span></li>';
                for ($i = $total_pages - 2; $i <= $total_pages; $i++) {
                    if ($i == $current_page) {
                        $links[] = '<li class="cust-pag-item"><span class="cust-pag-link active">' . $i . '</span></li>';
                    } else {
                        $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link($i) . '">' . $i . '</a></li>';
                    }
                }
            }
            // Case 3: Middle -> 1 ... page-1 page page+1 ... total_pages
            else {
                $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link(1) . '">1</a></li>';
                $links[] = '<li class="cust-pag-item"><span class="cust-pag-dots">...</span></li>';
                
                for ($i = $current_page - 1; $i <= $current_page + 1; $i++) {
                    if ($i == $current_page) {
                        $links[] = '<li class="cust-pag-item"><span class="cust-pag-link active">' . $i . '</span></li>';
                    } else {
                        $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link($i) . '">' . $i . '</a></li>';
                    }
                }
                
                $links[] = '<li class="cust-pag-item"><span class="cust-pag-dots">...</span></li>';
                $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link($total_pages) . '">' . $total_pages . '</a></li>';
            }
        }

        // Next link
        if ($current_page < $total_pages) {
            $links[] = '<li class="cust-pag-item"><a class="cust-pag-link" href="' . $get_page_link($current_page + 1) . '">Next &rarr;</a></li>';
        } else {
            $links[] = '<li class="cust-pag-item"><span class="cust-pag-link disabled">Next &rarr;</span></li>';
        }

        // Calculate record range text
        $start = $total_rows == 0 ? 0 : ($current_page - 1) * $per_page + 1;
        $end = min($current_page * $per_page, $total_rows);
        $showing_text = "Showing {$start}–{$end} of {$total_rows}";

        return '
        <div class="cust-pag-container">
            <div class="cust-pag-info">
                ' . $showing_text . '
            </div>
            <ul class="cust-pag-list">
                ' . implode('', $links) . '
            </ul>
        </div>';
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		(function () {
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

		.sidebar-wrapper .metismenu > li > a {
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
					<a href="<?= base_url('admin/dashboard') ?>">
						<div class="parent-icon"><i class="bx bx-home"></i></div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>

				<!-- USERS MENU -->
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-user"></i></div>
						<div class="menu-title">USERS</div>
					</a>
					<ul>
						<li><a href="<?= base_url('admin/employee/add') ?>">Add Employee</a></li>
						<li><a href="<?= base_url('admin/employee') ?>">List Employee</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon">
							<i class="bx bx-group"></i>
						</div>
						<div class="menu-title">Lead Management</div>
					</a>
					<ul>
						<li>
							<a href="<?= base_url('admin/leads'); ?>">
								<i class="bx bx-radio-circle"></i>
								All Leads
							</a>
						</li>
					</ul>
				</li>

				<!-- <li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon">
							<i class="bx bx-file"></i>
						</div>
						<div class="menu-title">Quotations</div>
					</a>

					<ul>
						<li>
							<a href="<?= base_url('admin/quotations'); ?>">
								<i class="bx bx-radio-circle"></i>
								All Quotations
							</a>
						</li>

						<li>
							<a href="<?= base_url('admin/quotations/create'); ?>">
								<i class="bx bx-radio-circle"></i>
								Create Quotation
							</a>
						</li>
					</ul>
				</li> -->


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon">
							<i class="bx bx-calendar"></i>
						</div>
						<div class="menu-title">Attendance</div>
					</a>
					<ul>
						<li>
							<a href="<?= base_url('admin/attendance/attendance_list') ?>">
								<i class="bx bx-radio-circle"></i>Attendance List
							</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="<?= base_url('admin/manual-logs') ?>">
						<div class="parent-icon"><i class="bx bx-time-five"></i></div>
						<div class="menu-title">Manual Logs</div>
					</a>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-log-out"></i></div>
						<div class="menu-title">Leave</div>
					</a>
					<ul>
						<!-- <li><a href="leave/add_leave">Add Leave</a></li> -->
						<li>
							<a href="<?= base_url('admin/leave') ?>">Leave List</a>

						</li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-credit-card"></i></div>
						<div class="menu-title">Payment Management</div>
					</a>
					<ul>
						<li><a href="<?= base_url('admin/payments') ?>"><i class="bx bx-radio-circle"></i>Payments</a></li>
						<li><a href="<?= base_url('admin/transactions') ?>"><i class="bx bx-radio-circle"></i>Transactions</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-envelope"></i></div>
						<div class="menu-title">Project</div>
					</a>
					<ul>
						<li><a href="<?= site_url('project/all_projects'); ?>"><i class="bx bx-radio-circle"></i>Projects</a></li>
						<li><a href="<?= site_url('project/clients'); ?>"><i class="bx bx-radio-circle"></i>Clients</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-task"></i></div>
						<div class="menu-title">Task Management</div>
					</a>
					<ul>
						<li><a href="<?= site_url('task/add'); ?>"><i class="bx bx-radio-circle"></i>Add Task</a></li>
						<li><a href="<?= site_url('task/list'); ?>"><i class="bx bx-radio-circle"></i>Task List</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-package"></i></div>
						<div class="menu-title">Products</div>
					</a>
					<ul>
						<li><a href="<?= base_url('admin/products'); ?>"><i class="bx bx-radio-circle"></i>Products</a></li>
						<li><a href="<?= base_url('admin/product_leads'); ?>"><i class="bx bx-radio-circle"></i>Product Leads</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-wallet"></i></div>
						<div class="menu-title">Expense Management</div>
					</a>
					<ul>
						<li><a href="<?= base_url('admin/expenses') ?>"><i class="bx bx-radio-circle"></i>Expenses</a></li>
					</ul>
				</li>

				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-money"></i></div>
						<div class="menu-title">Salary Management</div>
					</a>
					<ul>
						<li><a href="<?= base_url('admin/salaries') ?>"><i class="bx bx-radio-circle"></i>Salaries</a></li>
					</ul>
				</li>



				<li>
					<a href="<?= site_url('admin/history') ?>">
						<div class="parent-icon"><i class="bx bx-history"></i></div>
						<div class="menu-title">History</div>
					</a>
				</li>

				<li class="menu-item">
					<a href="<?= base_url('admin/holidays') ?>">
						<div class="parent-icon"><i class="bx bx-calendar-event"></i></div>
						<div class="menu-title"> Holidays</div>
					</a>
				</li>


				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-bell"></i></div>
						<div class="menu-title">Announcements</div>
					</a>
					<ul>
						<li>
							<a href="<?= base_url('admin/announcements') ?>">
								Announcement List
							</a>
						</li>

						<li>
							<a href="<?= base_url('admin/announcements/add') ?>">
								Add Announcement
							</a>
						</li>

					</ul>
				</li>



			</ul>
		</div>
		<!--end sidebar wrapper -->






		<!--start header -->
		<header>
			<div class="topbar">
				<nav class="navbar navbar-expand gap-2 align-items-center">
					<div class="mobile-toggle-menu d-flex"><i class='bx bx-menu'></i>
					</div>

					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<!-- <li class="nav-item">
								<a class="premium-quick-add" href="<?= base_url('admin/manual-logs') ?>">
									<i class='bx bx-plus'></i><span>Quick Add</span>
								</a>
							</li> -->
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="premium-icon-btn dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i></a>
							</li>
							<!-- <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
								data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li> -->
							<!-- <li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li> -->

							<li class="nav-item dropdown dropdown-app">
								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2">

									</div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">
								<!-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" data-bs-toggle="dropdown"><span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a> -->
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-badge">8 New</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= base_url('assets/images/avatars/avatar-1.png') ?>"
														class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson<span
															class="msg-time float-end">5 sec
															ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger">dc
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2
															min
															ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="<?= base_url('assets/default.jpg') ?>"
														class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Althea Cabardo <span
															class="msg-time float-end">14
															sec ago</span></h6>
													<p class="msg-info">Many desktop publishing packages</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success">
													<img src="assets/images/app/outlook.png" width="25"
														alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Account Created<span
															class="msg-time float-end">28 min
															ago</span></h6>
													<p class="msg-info">Successfully created new email</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info">Ss
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
															class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-4.png" class="msg-avatar"
														alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Katherine Pechon <span
															class="msg-time float-end">15
															min ago</span></h6>
													<p class="msg-info">Making this the first true generator</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i
														class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span
															class="msg-time float-end">5 hrs
															ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary">
													<img src="assets/images/app/github.png" width="25"
														alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span
															class="msg-time float-end">1 day
															ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-8.png" class="msg-avatar"
														alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Peter Costanzo <span
															class="msg-time float-end">6 hrs
															ago</span></h6>
													<p class="msg-info">It was popularised in the 1960s</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>












							<li class="nav-item dropdown dropdown-large">
								<!-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-shopping-bag'></i>
								</a> -->
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">My Cart</p>
											<p class="msg-header-badge">10 Items</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/11.png" class=""
															alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/02.png" class=""
															alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/03.png" class=""
															alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/04.png" class=""
															alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/05.png" class=""
															alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/06.png" class=""
															alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/07.png" class=""
															alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/08.png" class=""
															alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center gap-3">
												<div class="position-relative">
													<div class="cart-product rounded-circle bg-light">
														<img src="assets/images/products/09.png" class=""
															alt="product image">
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="cart-product-title mb-0">Men White T-Shirt</h6>
													<p class="cart-product-price mb-0">1 X $29.00</p>
												</div>
												<div class="">
													<p class="cart-price mb-0">$250</p>
												</div>
												<div class="cart-product-cancel"><i class="bx bx-x"></i>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<h5 class="mb-0">Total</h5>
												<h5 class="mb-0 ms-auto">$489.00</h5>
											</div>
											<button class="btn btn-primary w-100">Checkout</button>
										</div>
									</a>
								</div>
							</li>
						</ul>

					</div>






					<!-- <li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle position-relative" href="#" data-bs-toggle="dropdown">
		<i class="bx bx-bell"></i>

		<?php if ($notification_count > 0): ?>
			<span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
				<?= $notification_count ?>
			</span>
		<?php endif; ?>
	</a>

	<ul class="dropdown-menu dropdown-menu-end">
		<?php foreach ($notifications as $n): ?>
			<li>
				<a class="dropdown-item"
				   href="<?= base_url('admin/history/view/' . $n->ref_id) ?>">
					<?= $n->message ?><br>
					<small class="text-muted">
						<?= date('d M Y h:i A', strtotime($n->created_at)) ?>
					</small>
				</a>
			</li>
		<?php endforeach; ?>

		<?php if (empty($notifications)): ?>
			<li class="dropdown-item text-muted">No new notifications</li>
		<?php endif; ?>
	</ul>
</li> -->
























					<!-- <?= $this->session->userdata('user_photo'); ?> -->


					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
							href="javascript:;" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">

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
											: base_url('assets/default.jpg')) . '?v=' . time(); ?>" class="user-img rounded-circle" width="40" height="40"
								style="object-fit:cover;">


							<div class="user-info">
								<p class="user-name mb-0 fw-semibold">
									<?= htmlspecialchars(ucfirst($this->session->userdata('user_name') ?? 'User')) ?>


								</p>
								<p class="designattion mb-0 text-muted small">
									Admin
								</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item d-flex align-items-center" href="<?= site_url('admin/profile'); ?>"><i
										class="bx bx-user fs-5"></i><span>Profile</span></a>
							</li>

							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a href="<?= base_url('admin/logout') ?>"
									onclick="return confirmSweetAction(this, 'Are you sure you want to logout?')" class="dropdown-item">
									<i class="bx bx-log-out-circle"></i> Logout
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
