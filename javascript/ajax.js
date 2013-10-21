//initialize an ajax request object
var ajax = false;

// choose object type based upon what's happened
if (window.XMLHttpRequest) {
	// for IE 7+, Mozilla, Safari, Firefox, Opera and most other browsers
	ajax = new XMLHttpRequest();
} else if (window.ActiveXObject) {
	// for older IE browsers
	try {
		ajax = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e1) {
		try {
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e2) {
		}
	}
}

// alert if the object cannot be created
if (!ajax) {
	alert('Some page functionality is unavailable.');
}