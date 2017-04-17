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
