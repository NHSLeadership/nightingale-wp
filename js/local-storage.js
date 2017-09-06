window.onload = function(){
	// Cookie ribbon
	var cookieRibbon = document.getElementById('jsCookieRibbon');
	var cookieBtn = document.getElementById('jsCookieBtn');

	// Don't show ribbon if cookie permission granted
	if(localStorage.getItem("cookie-enable")=="1"){
		cookieRibbon.parentNode.removeChild(cookieRibbon);
	}

	cookieBtn.addEventListener('click', function () {
		cookieRibbon.parentNode.removeChild(cookieRibbon);
		// Store cookie permission
		localStorage.setItem("cookie-enable", "1");
	});

}();