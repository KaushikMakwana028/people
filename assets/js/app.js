$(function () {
	"use strict";

	let sidebarPS = null;

	if (document.querySelector(".app-container")) {
		sidebarPS = new PerfectScrollbar(".app-container", {
			suppressScrollX: true,
		});
	}
	if ($(".header-message-list").length) {
		new PerfectScrollbar(".header-message-list");
	}
	if ($(".header-notifications-list").length) {
		new PerfectScrollbar(".header-notifications-list");
	}

	const applyTheme = function (theme) {
		theme = theme || "light";
		$("html").attr("data-bs-theme", theme);
		localStorage.setItem("admin-theme", theme);
		$(".dark-mode-icon i").attr(
			"class",
			theme === "dark" ? "bx bx-sun" : "bx bx-moon",
		);
		$("#LightTheme").prop("checked", theme === "light");
		$("#DarkTheme").prop("checked", theme === "dark");
		$("#SemiDarkTheme").prop("checked", theme === "semi-dark");
		$("#BoderedTheme").prop("checked", theme === "bodered-theme");
	};

	applyTheme(
		localStorage.getItem("admin-theme") ||
			$("html").attr("data-bs-theme") ||
			"light",
	);

	$(".dark-mode").on("click", function () {
		applyTheme($("html").attr("data-bs-theme") === "dark" ? "light" : "dark");
	});

	$("#LightTheme").on("click", function () {
		applyTheme("light");
	});
	$("#DarkTheme").on("click", function () {
		applyTheme("dark");
	});
	$("#SemiDarkTheme").on("click", function () {
		applyTheme("semi-dark");
	});
	$("#BoderedTheme").on("click", function () {
		applyTheme("bodered-theme");
	});

	$(".mobile-toggle-menu").on("click", function (event) {
		event.preventDefault();
		$(".wrapper").toggleClass("toggled");
	});

	$(document).on("click", ".overlay", function () {
		$(".wrapper").removeClass("toggled");
	});

	$(window).on("scroll", function () {
		$(this).scrollTop() > 300
			? $(".back-to-top").fadeIn()
			: $(".back-to-top").fadeOut();
	});

	$(".back-to-top").on("click", function () {
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	});

	$("#menu").metisMenu();

	$("#menu").on("shown.metisMenu hidden.metisMenu", function () {
		if (sidebarPS) {
			sidebarPS.update();
		}
	});

	const currentUrl = window.location.href.split("#")[0];
	let exactMatch = null;
	const prefixMatches = [];

	$(".metismenu li a").each(function () {
		const linkUrl = this.href.split("#")[0];
		if (linkUrl === currentUrl) {
			exactMatch = this;
		} else if (currentUrl.indexOf(linkUrl + "/") === 0) {
			prefixMatches.push({ el: this, len: linkUrl.length });
		}
	});

	let targetEl = null;
	if (exactMatch) {
		targetEl = exactMatch;
	} else if (prefixMatches.length > 0) {
		prefixMatches.sort((a, b) => b.len - a.len);
		targetEl = prefixMatches[0].el;
	}

	if (targetEl) {
		$(targetEl).parent().addClass("mm-active");
		$(targetEl)
			.parents("ul")
			.addClass("mm-show")
			.parents("li")
			.addClass("mm-active");
	}

	$(".chat-toggle-btn").on("click", function () {
		$(".chat-wrapper").toggleClass("chat-toggled");
	});
	$(".chat-toggle-btn-mobile").on("click", function () {
		$(".chat-wrapper").removeClass("chat-toggled");
	});

	$(".email-toggle-btn").on("click", function () {
		$(".email-wrapper").toggleClass("email-toggled");
	});
	$(".email-toggle-btn-mobile").on("click", function () {
		$(".email-wrapper").removeClass("email-toggled");
	});
	$(".compose-mail-btn").on("click", function () {
		$(".compose-mail-popup").show();
	});
	$(".compose-mail-close").on("click", function () {
		$(".compose-mail-popup").hide();
	});

	$(".switcher-btn").on("click", function () {
		$(".switcher-wrapper").toggleClass("switcher-toggled");
	});
	$(".close-switcher").on("click", function () {
		$(".switcher-wrapper").removeClass("switcher-toggled");
	});

	const customModalSelector =
		".pm-modal, .pd-modal, .pay-modal, .exp-modal, .lead-modal";
	const customActiveModalSelector =
		".pm-modal.active, .pd-modal.active, .pay-modal.active, .exp-modal.active, .lead-modal.active";

	const syncCustomModalScroll = function () {
		document.body.style.overflow = document.querySelector(
			customActiveModalSelector,
		)
			? "hidden"
			: "";
	};

	document.addEventListener("click", function (event) {
		if (event.target.matches(customModalSelector)) {
			event.target.classList.remove("active");
			syncCustomModalScroll();
		}
	});

	document.addEventListener("keydown", function (event) {
		if (event.key !== "Escape") return;
		document
			.querySelectorAll(customActiveModalSelector)
			.forEach(function (modal) {
				modal.classList.remove("active");
			});
		syncCustomModalScroll();
	});

	const modalObserver = new MutationObserver(syncCustomModalScroll);
	document.querySelectorAll(customModalSelector).forEach(function (modal) {
		modalObserver.observe(modal, {
			attributes: true,
			attributeFilter: ["class"],
		});
	});
	syncCustomModalScroll();
});
