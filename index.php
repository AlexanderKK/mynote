<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>My Note</title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

	<link rel="stylesheet" href="assets/css/style.css">

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	
	<script src="assets/js/popups.js" type="application/javascript"></script>

	<script src="ajax/post.js" type="text/javascript"></script>
</head>

<?php
	require_once('inc/db.php');

	if(isset($_SESSION['wrongCredentials']) && $_SESSION['wrongCredentials']) {
		echo $_SESSION['isPresent'];
	}
?>

<body>
	<div class="wrapper">
		<header class="header">
			<div class="shell">
				<div class="header__bar">
					<div class="header__aside">
						<a href="" class="logo">
							<img src="assets/images/logo.png" alt="Logo Icon">
						</a>
						<nav class="nav header__nav">
							<ul>
								<li>
									<a href="#">Home</a>
								</li>

								<li>
									<a href="#">About Us</a>
								</li>

								<li>
									<a href="#">Contact</a>
								</li>
							</ul>
						</nav>
					</div>

					<div class="nav-utilities">
						<a href="#" class="link-login"><img src="assets/images/user.png" alt="User Icon"></a>
					</div>
				</div>
			</div>
		</header>

		<div class="hero">
			<div class="hero__inner">
				<h1 class="hero__title">Welcome to MyNote! Type or search on your demand</h1>
			</div>
		</div>

		<div class="section-note">
			<div class="section__inner">
				<div class="section__background" style="background-image: url(assets/images/desk.png);">
					
				</div>

				<div class="section__content">
					<p class="note section__text"><span class="noteCursor"></span></p>
				</div>
			</div>
		</div>

		<footer class="footer">
			
		</footer>
	</div>
	
	<div class="popups">
		<div class="popup popup--login">
			<div class="popup__inner">
				<div class="popup__close">
					<img src="assets/images/close.png" alt="Close Icon">
				</div>
				
				<div class="popup__head">
					<h2>Sign In</h2>
				</div>
			
				<div class="popup__body">
					<div class="form-login">
						<form action="mynote/login.php" method="POST" name="loginForm">
							<div class="form__head">
								<p>Not Registered? <a href="" class="link-register">Sign up from here</a></p>
								
								<p>Please enter your username and password</p>
							</div>
							
							<div class="form__body">
								<div class="form__row">
									<label for="username" class="form__label">Username</label>
									
									<div class="form__controls">
										<input type="text" name="username" class="field field--login">
									</div>
								</div>
								
								<div class="form__row">
									<label for="password" class="form__label">Password</label>
									
									<div class="form__controls">
										<input type="password" name="password" class="field field--login">
									</div>
								</div>
							</div>
							
							<div class="form__actions">
								<button type="submit" name="submit" class="btn form__btn">Login</button>
							</div>
							
							<div class="form__foot">
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="popup popup--register">
			<div class="popup__inner">
				<div class="popup__close">
					<img src="assets/images/close.png" alt="Close Icon">
				</div>
				
				<div class="popup__head">
					<h2>Register</h2>
				</div>
			
				<div class="popup__body">
					<div class="form-login">
						<form action="/mynote/register.php" method="POST" name="registerForm">
							<div class="form__body">
								<div class="form__row">
									<label for="email" class="form__label">Email</label>
									
									<div class="form__controls">
										<input type="email" id="email" name="email" class="field field--register" placeholder="example@gmail.com" pattern=".{7,30}" required title="Email must be between 7 and 30 characters!">

										<p class="fieldInfo hidden">No whitespaces allowed</p>
									</div>
								</div>
								
								<div class="form__row">
									<label for="username" class="form__label">Username</label>
									
									<div class="form__controls">
										<input type="text" id="username" name="username" class="field field--register" pattern=".{5,15}" required title="Username must be between 5 and 15 characters!">

										<p class="fieldInfo hidden">No whitespaces allowed</p>
									</div>
								</div>
								
								<div class="form__row">
									<label for="password" class="form__label">Password</label>
									
									<div class="form__controls">
										<input type="password" id="password" name="password" class="field field--register" pattern=".{7,20}" required title="Password must be between 7 and 20 characters!">

										<p class="fieldInfo hidden">No whitespaces allowed</p>
									</div>
								</div>
							</div>
							
							<div class="form__actions">
								<button type="submit" name="submit" class="btn form__btn" id="register">Register</button>
							</div>
							
							<div class="form__foot">
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<audio src="assets/sounds/keysound.mp3" class="keySound hidden"></audio>
	</div>

	<script src="assets/js/noteScript.js" type="application/javascript"></script>

	<script type="text/javascript">
		/**
		 * Note Event Listener - Click
		 * 
		 * @param {String} click - The event type to listen for
		 * @param {Function({Object} evt)} The handler to be called when the event is fired
		 * @fires note#click
		 */
		note.addEventListener("click", function() {
			popupLogin.classList.add("is-active");
		});

		// window.addEventListener("keydown", function(evt) {
		// 	if(evt.target !== note) {
		// 		popupLogin.classList.add("is-active");
		// 	}
		// });
	</script>

	<script src="assets/js/register.js" type="application/javascript"></script>
</body>
</html>