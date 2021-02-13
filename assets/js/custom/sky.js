/* eslint-disable yoda */
/* https://codepen.io/kloh/pen/VwKZqLa */
function drawing() {
	var c = document.getElementById('sky');
	var ctx = c.getContext('2d');
	var xMax = (c.width = window.screen.availWidth * 2);
	var yMax = (c.height = window.screen.availHeight * 2);
	var hmTimes = Math.round(xMax / 3 + yMax / 3);
	var randomX, randomY, randomSize, randomOpacityOne, randomOpacityTwo, randomHue, i;

	for (i = 0; i <= hmTimes; i++) {
		randomX = Math.floor(Math.random() * xMax + 1);
		randomY = Math.floor(Math.random() * yMax + 1);
		randomSize = Math.floor(Math.random() * 2 + 1);
		randomOpacityOne = Math.floor(Math.random() * 9 + 1);
		randomOpacityTwo = Math.floor(Math.random() * 9 + 1);
		randomHue = Math.floor(Math.random() * 360 + 1);

		if (randomSize > 1) {
			ctx.shadowBlur = Math.floor(Math.random() * 15 + 5);
			ctx.shadowColor = 'white';
		}
		ctx.fillStyle = 'hsla(' + randomHue + ', 30%, 80%, .' + randomOpacityOne + randomOpacityTwo + ')';
		ctx.fillRect(randomX, randomY, randomSize, randomSize);
	}
}
drawing();
