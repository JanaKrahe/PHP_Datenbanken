document.addEventListener('DOMContentLoaded', function () {
	function ausgeben(ev) {
		document.getElementById('output')
			.value = ev.target.value;
	}
	document.getElementById('score')
		.addEventListener('input', ausgeben);
});

document.addEventListener('DOMContentLoaded', function () {
	function ausgeben(ev) {
		document.getElementById('outputG')
			.value = ev.target.value;
	}
	document.getElementById('scoreG')
		.addEventListener('input', ausgeben);
});

function aktualisiere_progressbar() {
	var anteil = document.getElementById('eineID').value;
	window.alert(anteil);
	document.getElementById('fortschritt').value = anteil;
 }
