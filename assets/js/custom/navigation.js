/* eslint-disable camelcase */
/**
 * Meta menu mobile
 * Contient la navigation responsive
 * Affichage du sous-menu au clic sur le bouton
 */
var toggle_button = document.getElementById('mobile-menu-toggle');
var mobile_menu = document.getElementById('mobile-menu');
var body = document.body;

toggle_button.addEventListener('click', function () {
	if (this.parentNode.classList.contains('open')) {
		this.parentNode.classList.remove('open');
		toggle_button.setAttribute('aria-expanded', 'false');
		mobile_menu.setAttribute('aria-expanded', 'false');
		body.classList.remove('menu-opened');
	} else {
		this.parentNode.classList.add('open');
		toggle_button.setAttribute('aria-expanded', 'true');
		mobile_menu.setAttribute('aria-expanded', 'true');
		body.classList.add('menu-opened');
	}
});
