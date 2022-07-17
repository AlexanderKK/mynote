setTimeout(() => {
	
	
	const linkLogin = document.querySelector(".link-login");
	const linkRegister = document.querySelector(".link-register");
	const popups = document.querySelectorAll(".popup");
	const closeBtnLogin = document.querySelector(".popup--login .popup__close");
	const closeBtnRegister = document.querySelector(".popup--register .popup__close");
	
	//Login Popup
	
	linkLogin.addEventListener("mousedown", function() {
		for	(const popup of popups) {
			
			const popupClasses = popup.classList;
			if(popupClasses.contains("popup--login")) {
				popup.classList.add("is-active");
			}
		}
	});
	
	closeBtnLogin.addEventListener("mousedown", function() {
		this.parentElement.parentElement.classList.remove("is-active");
	});
	
	//Register Popup
	
	linkRegister.addEventListener("mousedown", function() {
		for	(const popup of popups) {
			
			const popupClasses = popup.classList;
			if(popupClasses.contains("popup--register")) {
				popup.classList.add("is-active");
			}
			if(popup.classList.contains("popup--login")) {
				popup.classList.remove("is-active");
			}
		}
	});
	
	closeBtnRegister.addEventListener("mousedown", function() {
		this.parentElement.parentElement.classList.remove("is-active");
	});
	
	//Miscellaneous
	
	window.addEventListener("mousedown", function(evt) {
		for	(const popup of popups) {
			if(evt.target == popup) {
				popup.classList.remove("is-active");
			}
		}
	});
}, 1);