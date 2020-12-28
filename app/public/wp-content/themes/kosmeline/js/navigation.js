/**
 * Meta menu mobile
 * Contient la navigation responsive et l'accès Espace Client
 * Affichage du sous-menu au clic sur le bouton
 */
var toggle_button = document.getElementById("mobile-menu-toggle");
var mobile_menu = document.getElementById("mobile-menu");

toggle_button.addEventListener("click", function (event) {
	if (this.parentNode.classList.contains("open")) {
		this.parentNode.classList.remove("open");
		toggle_button.setAttribute("aria-expanded", "false");
		mobile_menu.setAttribute("aria-expanded", "false");
	} else {
		this.parentNode.classList.add("open");
		toggle_button.setAttribute("aria-expanded", "true");
		mobile_menu.setAttribute("aria-expanded", "true");
	}
});
