$(function() {
	$(".form-login form").bind('submit',function() {
		var email = $('#email').val();
		var username = $('#username').val();
		var password = $('#password').val();
		
		$.post('register.php', {email: email, username: username, password: password},
		function(data) {
				console.log(data);
		});

		return false;
	});
};