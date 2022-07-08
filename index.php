<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>My Note</title>

	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico">

	<link rel="stylesheet" href="assets/css/style.css">
	
	<script src="assets/js/popups.js" type="application/javascript"></script>
</head>
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
					<p class="section__text">
						<span class="cursorText"></span>
					</p>
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
						<form action="">
							<div class="form__head">
								<p>Not Registered? <a href="" class="link-register">Sign up from here</a></p>
								
								<p>Please enter your username and password</p>
							</div>
							
							<div class="form__body">
								<div class="form__row">
									<label for="username" class="form__label">Username</label>
									
									<div class="form__controls">
										<input type="text" name="username" class="field">
									</div>
								</div>
								
								<div class="form__row">
									<label for="password" class="form__label">Password</label>
									
									<div class="form__controls">
										<input type="password" name="password" class="field">
									</div>
								</div>
							</div>
							
							<div class="form__actions">
								<button type="submit" class="btn form__btn">Login</button>
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
						<form action="#">
							<div class="form__body">
								<div class="form__row">
									<label for="email" class="form__label">Email</label>
									
									<div class="form__controls">
										<input type="email" id="email" name="email" class="field" placeholder="example@gmail.com" pattern=".{7,30}" required title="Email must be between 7 and 30 characters!">
									</div>
								</div>
								
								<div class="form__row">
									<label for="username" class="form__label">Username</label>
									
									<div class="form__controls">
										<input type="text" id="username" name="username" class="field" pattern=".{5,15}" required title="Username must be between 5 and 15 characters!">
									</div>
								</div>
								
								<div class="form__row">
									<label for="password" class="form__label">Password</label>
									
									<div class="form__controls">
										<input type="password" id="password" name="password" class="field" pattern=".{7,20}" required title="Password must be between 7 and 20 characters!">
									</div>
								</div>
							</div>
							
							<div class="form__actions">
								<button type="submit" class="btn form__btn">Register</button>
							</div>
							
							<div class="form__foot">
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>