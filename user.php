<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>My Note</title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

	<link rel="stylesheet" href="assets/css/style.css">

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	<script src="ajax/post.js" type="text/javascript"></script>
</head>

<?php
	require_once('inc/db.php');

	// if(isset($_SESSION['wrongCredentials']) && $_SESSION['wrongCredentials']) {
	// 	echo $_SESSION['isPresent'];
	// }
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
									<a href="">Home</a>
								</li>

								<li>
									<a href="">About Us</a>
								</li>

								<li>
									<a href="">Contact</a>
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
	</div>

	<audio src="assets/sounds/keysound.mp3" class="keySound hidden"></audio>

	<script src="assets/js/noteScriptUser.js" type="application/javascript"></script>
</body>
</html>