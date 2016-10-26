function increaseCols() {
	let el = document.getElementById('classifieds');
	if (el.dataset.cols < 6) {
		el.dataset.cols++;
	} else {
		console.error('Cannot increase columns beyond 6.');
	}
}
function decreaseCols() {
	let el = document.getElementById('classifieds');
	if (el.dataset.cols > 1) {
		el.dataset.cols--;
	} else {
		console.error('Cannot reduce columns below 1.');
	}
}
function colResizeListeners()
{
	document.getElementById('cols-plus').addEventListener('click', increaseCols);
	document.getElementById('cols-minus').addEventListener('click', decreaseCols);
}
window.addEventListener('load', colResizeListeners);
