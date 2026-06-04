	<!--start overlay-->
	<div class="overlay mobile-toggle-icon"></div>
	<!--end overlay-->
</div>
<!--end wrapper-->


<!-- search modal -->
<div class="modal" id="SearchModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
		<div class="modal-content">
			<div class="modal-header gap-2">
				<div class="position-relative popup-search w-100">
					<input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
					<span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i class='bx bx-search'></i></span>
				</div>
				<button type="button" class="btn-close d-md-none" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="search-list">
					<p class="mb-1">Html Templates</p>
					<div class="list-group">
						<a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i class='bx bxl-angular fs-4'></i>Best Html Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
					</div>
					<p class="mb-1 mt-3">Web Designe Company</p>
					<div class="list-group">
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-windows fs-4'></i>Best Html Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-dropbox fs-4'></i>Html5 Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
					</div>
					<p class="mb-1 mt-3">Software Development</p>
					<div class="list-group">
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
					</div>
					<p class="mb-1 mt-3">Online Shoping Portals</p>
					<div class="list-group">
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-slack fs-4'></i>Best Html Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-skype fs-4'></i>Html5 Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
						<a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end search modal -->


<!--start switcher-->
<button class="btn btn-primary position-fixed bottom-0 end-0 m-3 d-flex align-items-center gap-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop">
	<i class='bx bx-cog bx-spin'></i>Customize
</button>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="staticBackdrop">
	<div class="offcanvas-header border-bottom h-60">
		<div class="">
			<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<div>
			<p>Theme variation</p>
			<div class="row g-3">
				<div class="col-12 col-xl-6">
					<input type="radio" class="btn-check" name="theme-options" id="LightTheme" checked>
					<label class="btn btn-outline-secondary d-flex flex-column gap-2 align-items-center justify-content-center p-3" for="LightTheme">
						<span><i class='bx bx-sun fs-2'></i></span>
						<span>Light</span>
					</label>
				</div>
				<div class="col-12 col-xl-6">
					<input type="radio" class="btn-check" name="theme-options" id="DarkTheme">
					<label class="btn btn-outline-secondary d-flex flex-column gap-2 align-items-center justify-content-center p-3" for="DarkTheme">
						<span><i class='bx bx-moon fs-2'></i></span>
						<span>Dark</span>
					</label>
				</div>
				<div class="col-12 col-xl-6">
					<input type="radio" class="btn-check" name="theme-options" id="SemiDarkTheme">
					<label class="btn btn-outline-secondary d-flex flex-column gap-2 align-items-center justify-content-center p-3" for="SemiDarkTheme">
						<span><i class='bx bx-brightness-half fs-2'></i></span>
						<span>Semi Dark</span>
					</label>
				</div>
				<div class="col-12 col-xl-6">
					<input type="radio" class="btn-check" name="theme-options" id="BoderedTheme">
					<label class="btn btn-outline-secondary d-flex flex-column gap-2 align-items-center justify-content-center p-3" for="BoderedTheme">
						<span><i class='bx bx-border-all fs-2'></i></span>
						<span>Bordered</span>
					</label>
				</div>
			</div><!--end row-->
		</div>
	</div>
</div>
<!--end switcher-->

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<!--plugins-->
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/simplebar/js/simplebar.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/metismenu/js/metisMenu.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') ?>"></script>
<!--app JS-->
<script src="<?= base_url('assets/js/app.js?v=1.0.1') ?>"></script>
<script src="<?= base_url('assets/plugins/peity/jquery.peity.min.js') ?>"></script>

<!-- Peity donut charts -->
<script>
	$(document).ready(function() {
		$(".data-attributes span").peity("donut");
	});
</script>

<!-- Notification bell toggle -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var bell = document.getElementById('notifBell');
		var popup = document.getElementById('notifPopup');

		if (bell && popup) {
			bell.addEventListener('click', function(e) {
				e.preventDefault();
				popup.style.display = (popup.style.display === 'block') ? 'none' : 'block';
			});

			document.addEventListener('click', function(e) {
				if (!bell.contains(e.target) && !popup.contains(e.target)) {
					popup.style.display = 'none';
				}
			});
		}
	});
</script>

<!-- Firebase Cloud Messaging (FCM) -->
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-messaging-compat.js"></script>

<script>
	(function() {
		var firebaseConfig = {
			apiKey: "PASTE_API_KEY",
			authDomain: "suju-5d220.firebaseapp.com",
			projectId: "suju-5d220",
			messagingSenderId: "216054181280",
			appId: "PASTE_APP_ID"
		};

		firebase.initializeApp(firebaseConfig);
		var messaging = firebase.messaging();

		if ('serviceWorker' in navigator) {
			navigator.serviceWorker.register('/suju/firebase-messaging-sw.js')
				.then(function(reg) {
					console.log('SW registered:', reg.scope);
				})
				.catch(function(err) {
					console.error('SW registration failed:', err);
				});
		}

		Notification.requestPermission().then(function(permission) {
			if (permission === 'granted') {
				messaging.getToken({
					vapidKey: "BHi5xStcGaRzQPhs9I-suzKcnL8N3PISRJtta2iNkdVbnWuElbE_NcQxWNidrOdoiFHqUdk8n_o4xCpjFaB-mc"
				}).then(function(token) {
					fetch("<?= base_url('sales/save-fcm-token') ?>", {
						method: "POST",
						headers: {
							"Content-Type": "application/json"
						},
						body: JSON.stringify({
							token: token
						})
					}).catch(function(err) {
						console.error('FCM token save failed:', err);
					});
				}).catch(function(err) {
					console.error('FCM getToken failed:', err);
				});
			}
		}).catch(function(err) {
			console.error('Notification permission error:', err);
		});

		messaging.onMessage(function(payload) {
			if (Notification.permission === 'granted' && payload.notification) {
				new Notification(payload.notification.title, {
					body: payload.notification.body,
					icon: "/assets/images/logo-icon.png"
				});
			}
		});
	})();
</script>

<!-- Logo toggle on sidebar collapse -->
<script>
	(function() {
		function updateLogo() {
			var wrapper = document.querySelector('.wrapper');
			var logoFull = document.getElementById('logoFull');
			var logoIcon = document.getElementById('logoIcon');
			if (!wrapper || !logoFull || !logoIcon) return;

			if (window.innerWidth >= 992) {
				if (wrapper.classList.contains('toggled')) {
					logoFull.style.display = 'none';
					logoIcon.style.display = 'block';
				} else {
					logoIcon.style.display = 'none';
					logoFull.style.display = 'block';
				}
			} else {
				logoIcon.style.display = 'none';
				logoFull.style.display = 'block';
			}
		}

		// Run on load
		updateLogo();

		// Watch for sidebar toggle clicks instead of polling with setInterval
		var sidebarToggle = document.getElementById('toggleSidebar') || document.querySelector('[data-toggle="sidebar"], .sidebar-toggle, #menu-btn');
		if (sidebarToggle) {
			sidebarToggle.addEventListener('click', function() {
				// Small delay to allow class to be applied first
				setTimeout(updateLogo, 50);
			});
		}

		// MutationObserver as a reliable fallback (no polling)
		var wrapper = document.querySelector('.wrapper');
		if (wrapper && window.MutationObserver) {
			var observer = new MutationObserver(updateLogo);
			observer.observe(wrapper, {
				attributes: true,
				attributeFilter: ['class']
			});
		}
	})();
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  	(function() {
  		var nativeAlert = window.alert ? window.alert.bind(window) : function(message) {
  			console.log(message);
  		};

  		function cleanMessage(message) {
  			return String(message || '').replace(/\n/g, '<br>');
  		}

  		function alertTitle(type) {
  			if (type === 'success') return 'Success';
  			if (type === 'error') return 'Error';
  			if (type === 'warning') return 'Warning';
  			return 'Notice';
  		}

  		function removeLegacyFlashAlerts() {
  			var selectors = [
  				'.alert',
  				'.lead-flash',
  				'.exp-alert',
  				'.txn-alert',
  				'.pay-alert',
  				'.pm-alert',
  				'.pd-alert',
  				'.adm-manual-alert',
  				'.pl-alert'
  			];
  			document.querySelectorAll(selectors.join(',')).forEach(function(el) {
  				el.remove();
  			});
  		}

  		var nativeConfirm = window.confirm ? window.confirm.bind(window) : function() {
  			return true;
  		};

  		window.showSweetAlert = function(message, type, title) {
  			type = type || 'info';
  			if (window.Swal && typeof window.Swal.fire === 'function') {
  				return window.Swal.fire({
  					icon: type,
  					title: title || alertTitle(type),
  					html: cleanMessage(message),
  					confirmButtonColor: '#5f61f6'
  				});
  			}

  			nativeAlert(String(message || ''));
  		};

  		window.alert = function(message) {
  			return window.showSweetAlert(message, 'info');
  		};

  		window.confirmSweetAction = function(element, message, title) {
  			if (!window.Swal || typeof window.Swal.fire !== 'function') {
  				return nativeConfirm(message);
  			}

  			window.Swal.fire({
  				icon: 'warning',
  				title: title || 'Are you sure?',
  				text: message,
  				showCancelButton: true,
  				confirmButtonColor: '#ef4444',
  				cancelButtonColor: '#64748b',
  				confirmButtonText: 'Yes',
  				cancelButtonText: 'Cancel'
  			}).then(function(result) {
  				if (!result.isConfirmed || !element) return;

  				if (element.tagName && element.tagName.toLowerCase() === 'form') {
  					element.submit();
  					return;
  				}

  				var href = element.getAttribute ? element.getAttribute('href') : '';
  				if (href && href !== 'javascript:;') {
  					window.location.href = href;
  				}
  			});

  			return false;
  		};

  		document.addEventListener('DOMContentLoaded', function() {
  			var flashMessages = [
  				{type: 'success', message: <?= json_encode($this->session->flashdata('success')) ?>},
  				{type: 'error', message: <?= json_encode($this->session->flashdata('error')) ?>},
  				{type: 'error', message: <?= json_encode($this->session->flashdata('login_error')) ?>}
  			];

  			flashMessages.forEach(function(item) {
  				if (item.message) {
  					removeLegacyFlashAlerts();
  					window.showSweetAlert(item.message, item.type);
  				}
  			});
  		});
  	})();
  </script>

</body>

</html>
