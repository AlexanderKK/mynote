// const loginForms = document.querySelector('.form-login form');
// const emailField = document.querySelector("#email");
// const usernameField = document.querySelector("#username");
// const passwordField = document.querySelector("#password");
// const fieldsInfo = document.querySelectorAll(".fieldInfo");
const fields = document.querySelectorAll(".field");
const registerBtn = document.querySelector("#register");
const loginBtn = document.querySelector("#login");

function prevDefault(e) {
	event.preventDefault();
}

function hasWhiteSpace(str) {
	if(str.indexOf(' ') !== -1) {
		return true;
	}
	return false;
}

// function createInfo(current) {
// 	const info = document.createElement("p");
// 	info.style.fontSize = '16px';
// 	info.style.marginTop = '3px';
// 	info.innerText = "No whitespaces allowed";
// 	current.parentElement.appendChild(info);
// }

fields.forEach(function(field) {
	field.addEventListener("keydown", function(evt) {
		if(evt.code === "Space") {
			if(field.classList.contains("field--register")) {
				this.parentElement.children[1].classList.remove("hidden");
			}
			const newValue = this.value.replace(" ", "");
			this.value = newValue;
		}
	});

	field.addEventListener("change", function(evt) {
		const newValue = this.value.replaceAll(" ", "");
		this.value = newValue;
		if(field.classList.contains("field--register")) {
			this.parentElement.children[1].classList.add("hidden");
		}
	});
});

registerBtn.addEventListener("click", function() {
	if(document.querySelector("#emailRegister").value === "" ||
	document.querySelector("#usernameRegister").value === "" ||
	document.querySelector("#passwordRegister").value === "") {
		this.setAttribute('type', "");
	}
	else {
		this.setAttribute('type', "submit");
	}
});

loginBtn.addEventListener("click", function() {
	if(document.querySelector("#usernameLogin").value === "" ||
	document.querySelector("#passwordLogin").value === "") {
		this.setAttribute('type', "");
	}
	else {
		this.setAttribute('type', "submit");
	}
});

	/* Data which will be sent to server */
	// let postObj = {
	// 	email: emailField.innerText,
	// 	username: usernameField.innerText,
	// 	password: passwordField.innerText,
	// };

	

	// function sendData() {
	// 	var xhttp = new XMLHttpRequest();
	// 	xhttp.open("POST", "register.php");
	// 	xhttp.setRequestHeader("Content-Type", "application/json");
	// 	xhttp.onreadystatechange = function() {
	// 	   if (this.readyState == 4 && this.status == 200) {
	// 	     // Response
	// 	     var response = this.responseText;
	// 	   }
	// 	};
		// var data = {
		// 	email: emailField.value,
		// 	username: usernameField.value,
		// 	password: password.value,
		// };
		
		// xhttp.send(data);

	// 	console.log(data);
	// }

	// $(document).ready(function() {

 //        $(".form-login .form__btn").click(function() {
 //            var user = $("#username").val();
 //            //alert($(this).attr('id'));
 //            $.ajax({
 //                type: "POST",
 //                url: 'register.php',
 //                data: { user : user },
 //                success: function(data)
 //                {
 //                	console.log(data);
 //                }
 //            });
 //        });

        
 //    });