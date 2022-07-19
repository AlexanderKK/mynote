setTimeout(() => {
	
	
	const linkLogin = document.querySelector(".link-login");
	const linkRegister = document.querySelector(".link-register");
	const popups = document.querySelectorAll(".popup");
	const closeBtnLogin = document.querySelector(".popup--login .popup__close");
	const closeBtnRegister = document.querySelector(".popup--register .popup__close");
	const errorMsgs = document.querySelectorAll(".errorMsg");
	const loginMsg = document.querySelector(".loginMsg");
	
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
		this.parentElement.children[2].children[0].children[0].children[0].children[1].classList.remove("hidden");
		this.parentElement.children[2].children[0].children[0].children[0].children[2].classList.add("hidden");
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
		this.parentElement.children[1].children[1].classList.add("hidden");
		// this.parentElement.children[1].children[2].classList.remove("hidden");
	});
	
	//Miscellaneous
	
	window.addEventListener("mousedown", function(evt) {
		for	(const popup of popups) {
			if(evt.target == popup) {
				popup.classList.remove("is-active");

				for	(const errorMsg of errorMsgs) {
					errorMsg.classList.add("hidden");
				}

				if(popup.classList.contains("popup--login")) {
					loginMsg.classList.remove("hidden");
				}
			}
		}
	});

	window.addEventListener("keydown", function(evt) {
		// console.log(evt.code);
		if(evt.code == "Escape") {
			for	(const popup of popups) {
				popup.classList.remove("is-active");

				if(popup.classList.contains("popup--login")) {
					loginMsg.classList.remove("hidden");
				}
			}

			for	(const errorMsg of errorMsgs) {
				errorMsg.classList.add("hidden");
			}
		}
	});
}, 1);