/**
 * Déclaration des variables
 */
var submenu = document.querySelectorAll("#nav-menu li.menu-item-has-children");
var mobile_menu = document.getElementById("mobile-menu");
var mobile_toggle =
	'<button type="button" id="mobile-menu-toggle" aria-controls="mobile-menu" aria-expanded="false"><span>Menu</span></button>';
var timer1;
var timer2;

/**
 * Construction des éléments pour le bon fonctionnement du menu
 */
/* Si périphérique touch, on ajoute une classe CSS sur le <body> */
if ("ontouchstart" in document.documentElement) {
	document.body.classList.add("touch");
}
/* On ajoute le bouton pour afficher le menu en version mobile */
mobile_menu.insertAdjacentHTML("beforebegin", mobile_toggle);

/* On ajoute les éléments HTML et attributs ARIA utiles sur les sous-menus */
[].forEach.call(submenu, function (el) {
	var link = el.querySelector("a");
	var button =
		'<button type="button" class="menu-button" aria-haspopup="true" aria-expanded="false">' +
		"Sous-menu " +
		link.text +
		'<svg width="20" height="20" viewBox="0 0 50 50" class="svg-sprite" aria-hidden="true"><use xlink:href="#fleche" /></svg>' +
		"</button>";
	var link_href = link.getAttribute("href");

	/* On ajoute les attributs ARIA sur les liens */
	link.setAttribute("aria-expanded", "false");
	link.setAttribute("aria-haspopup", "true");
	/* Si il y a un sous-menu, on ajoute un bouton en plus du lien */
	link.insertAdjacentHTML("afterend", button);

	/* Si pas de lien, on supprime le lien et on ajoute une classe 'no-link' sur le parent*/
	if (link_href === "#") {
		link.remove();
		el.classList.add("no-link");
	}
});

/**
 * Time to play!
 */
Array.prototype.forEach.call(submenu, function (el, i) {
	/* Fonction pour afficher le sous-menu */
	var display_submenu = function (event) {
		var opened = this.parentNode.classList.contains("open");

		if (opened) {
			this.parentNode.classList.remove("open");
			this.parentNode
				.querySelector("a")
				.setAttribute("aria-expanded", "false");
			this.parentNode
				.querySelector("button")
				.setAttribute("aria-expanded", "false");
		} else {
			this.parentNode.classList.add("open");
			this.parentNode
				.querySelector("a")
				.setAttribute("aria-expanded", "true");
			this.parentNode
				.querySelector("button")
				.setAttribute("aria-expanded", "true");
		}
		event.preventDefault();
	};

	/* On active la fonction au clic / touch */
	el.querySelector("button").addEventListener(
		"click",
		display_submenu,
		false
	);
	el.querySelector("button").addEventListener(
		"touchend",
		display_submenu,
		false
	);

	/* Affichage du sous-menu au hover sur le menu */
	el.addEventListener("mouseover", function (event) {
		var opened_nav = document.querySelector(
			"#nav-menu .menu-item-has-children.open"
		);

		if (opened_nav) {
			opened_nav
				.querySelector("a")
				.setAttribute("aria-expanded", "false");
			opened_nav
				.querySelector("button")
				.setAttribute("aria-expanded", "false");
			opened_nav.classList.remove("open");
		}

		this.classList.add("open");
		this.querySelector("a").setAttribute("aria-expanded", "true");
		this.querySelector("button").setAttribute("aria-expanded", "true");

		clearTimeout(timer1);
	});

	el.addEventListener("mouseout", function (event) {
		timer1 = setTimeout(function (event) {
			el.querySelector("a").setAttribute("aria-expanded", "false");
			el.querySelector("button").setAttribute("aria-expanded", "false");
			el.classList.remove("open");
		}, 500);
	});
});

/**
 * Au focus/mouseover sur un lien de premier niveau, on ferme le sous-menu ouvert, s'il y en a un
 */
var opened_submenu_link = document.querySelectorAll("#nav-menu > ul > li > a");
var opened_submenu_button = document.querySelectorAll(
	"#nav-menu > ul > li > button"
);

var hide_submenu = function (event) {
	var opened_nav = document.querySelector(
		"#nav-menu .menu-item-has-children.open"
	);

	if (opened_nav) {
		opened_nav.querySelector("a").setAttribute("aria-expanded", "false");
		opened_nav
			.querySelector("button")
			.setAttribute("aria-expanded", "false");
		opened_nav.classList.remove("open");
	}
};

Array.prototype.forEach.call(opened_submenu_link, function (el, i) {
	el.addEventListener("focus", hide_submenu, false);
	el.addEventListener("mouseover", hide_submenu, false);
});

Array.prototype.forEach.call(opened_submenu_button, function (el, i) {
	el.addEventListener("focusin", hide_submenu, false);
	el.addEventListener("mouseover", hide_submenu, false);
});

/**
 * Meta menu mobile
 * Contient la navigation responsive et l'accès Espace Client
 * Affichage du sous-menu au clic sur le bouton
 */
var toggle_button = document.getElementById("mobile-menu-toggle");

toggle_button.addEventListener("click", function (event) {
	if (this.parentNode.classList.contains("open")) {
		this.parentNode.classList.remove("open");
		this.parentNode
			.querySelector("button")
			.setAttribute("aria-expanded", "false");
	} else {
		this.parentNode.classList.add("open");
		this.parentNode
			.querySelector("button")
			.setAttribute("aria-expanded", "true");
	}
});
