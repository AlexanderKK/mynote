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
	session_start();

	include_once('inc/func.php');
	// if(isset($_SESSION['wrongCredentials']) && $_SESSION['wrongCredentials']) {
	// 	echo $_SESSION['isPresent'];
	// }
	
	if(isset($_SESSION['userID']) && $_SESSION['loggedIn']) {
		header("Location: user.php");
	}
	else {
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

				<?php 
					$content = $mysqli->query("SELECT content FROM note WHERE id = 1") or die($mysqli->error);
					if($content->num_rows == 1) {
						$row = $content->fetch_array();
				?>
					<script type="text/javascript">
						const noteN = document.querySelector(".note");
						// const noteNcursor = document.querySelector(".noteCursor");

						noteN.innerHTML = '<?php echo $row['content']; ?>';
						// noteN.append(noteNcursor);
					</script>
				<?php
					}
				?>
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
						<form action="" method="POST" name="loginForm">
							<div class="form__head">
								<p>Not Registered? <a href="" class="link-register">Sign up from here</a></p>
								
								<p class="loginMsg">Please enter your username and password</p>

								<p class="errorMsg hidden">User not found</p>
							</div>
							
							<div class="form__body">
								<div class="form__row">
									<label for="username" class="form__label">Username</label>
									
									<div class="form__controls">
										<input type="text" id="usernameLogin" name="username" class="field field--login">
									</div>
								</div>
								
								<div class="form__row">
									<label for="password" class="form__label">Password</label>
									
									<div class="form__controls">
										<input type="password" id="passwordLogin" name="password" class="field field--login">
									</div>
								</div>
							</div>
							
							<div class="form__actions">
								<input type="submit" value="Log in" name="submitLoginForm" class="btn form__btn" id="login">
							</div>
							
							<div class="form__foot">
								
							</div>
						</form>

						<?php
							if(isset($_POST['submitLoginForm'])) {
								$username = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['username']));
								$password = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['password']));

								if(isset($username) && isset($password)) {
									if($username !== "" && $password !== "" &&
									!preg_match('/\s/', $username) && !preg_match('/\s/', $password)) {
										$_SESSION['username'] = $username;
										// $_SESSION['password'] = $password;

										$query = "SELECT enc_key1, enc_key2, enc_key3, enc_iv1, enc_iv2, enc_iv3 FROM enc JOIN users ON enc.id = users.enc_id WHERE username = '$username'";
										$result = mysqli_query($connection, $query);
										if(mysqli_num_rows($result) == 1) {
											$row = mysqli_fetch_assoc($result);

											$encArray[] = array(
												'enc_iv1' => $row['enc_iv1'],
												'enc_iv2' => $row['enc_iv2'],
												'enc_iv3' => $row['enc_iv3'],
												'enc_key1' => $row['enc_key1'],
												'enc_key2' => $row['enc_key2'],
												'enc_key3' => $row['enc_key3'],
											);

											/**
											 * checkEncryptedPassword
											 * 
											 * @var password
											 */
											$password = checkEncryptedPassword($encArray, $password);
										}

										$query = "SELECT users.id as userID, ranks.title as title FROM users JOIN ranks ON users.rank = ranks.id WHERE username = '$username' AND password = '$password'";
										$result = $mysqli->query($query) or die($mysqli -> error());
										$row = $result -> fetch_array();

										if($result -> num_rows == 1) {
											$_SESSION['loggedIn'] = true;
											$_SESSION['userID'] = $row['userID'];

											if($row['title'] == 'user') {
												header("Location: user.php");
											}
											else if($row['title'] == 'support') {
												header("Location: support.php");
											}
											else if($row['title'] == 'admin') {
												header("Location: admin.php");
											}
										}
										else {
											?>

											<script type="text/javascript">

												const popups = document.querySelectorAll(".popup");
												const errorMsgs = document.querySelectorAll(".errorMsg");
												const loginMsg = document.querySelector(".loginMsg");

												for	(const popup of popups) {
													const popupClasses = popup.classList;

													if(popupClasses.contains("popup--login")) {
														popup.classList.add("is-active");
													}
												}

												for	(const errorMsg of errorMsgs) {
													errorMsg.classList.remove("hidden");
													loginMsg.classList.add("hidden");
												}

												const usernameFieldLogin = document.querySelector("#usernameLogin");
												const passwordFieldLogin = document.querySelector("#passwordLogin");

												usernameFieldLogin.value = "<?php echo $_SESSION['username']; ?>";
												// passwordFieldLogin.value = "<?php //echo $_SESSION['password']; ?>";
											</script>

											<?php
										}
									}
								}
							}
						?>
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
				
					<p class="errorMsg hidden">User with the same credentials has been found</p>
				</div>

				<div class="popup__body">
					<div class="form-login">
						<form action="" method="POST" name="registerForm">
							<div class="form__body">
								<div class="form__row">
									<label for="email" class="form__label">Email</label>
									
									<div class="form__controls">
										<input type="email" id="emailRegister" name="email" class="field field--register" placeholder="example@gmail.com" pattern=".{7,50}" title="Email must be between 7 and 50 characters!">

										<p class="fieldInfo hidden">No whitespaces allowed</p>
									</div>
								</div>
								
								<div class="form__row">
									<label for="username" class="form__label">Username</label>
									
									<div class="form__controls">
										<input type="text" id="usernameRegister" name="username" class="field field--register" pattern=".{5,15}" title="Username must be between 5 and 15 characters!">

										<p class="fieldInfo hidden">No whitespaces allowed</p>
									</div>
								</div>
								
								<div class="form__row">
									<label for="password" class="form__label">Password</label>
									
									<div class="form__controls">
										<input type="password" id="passwordRegister" name="password" class="field field--register" pattern=".{7,20}" title="Password must be between 7 and 20 characters!">

										<p class="fieldInfo hidden">No whitespaces allowed</p>
									</div>
								</div>
							</div>
							
							<div class="form__actions">
								<input type="submit" value="Register" name="submitRegisterForm" class="btn form__btn" id="register">
							</div>
							
							<div class="form__foot">
								
							</div>
						</form>

						<?php
							if(isset($_POST['submitRegisterForm'])) {
								$email = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email']));
								$username = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['username']));
								$password = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['password']));

								if(isset($email) && isset($username) && isset($password)) {
									if ($email !== "" && $username !== "" && $password !== "" && 
									!preg_match('/\s/', $email) && !preg_match('/\s/', $username) && !preg_match('/\s/', $password)) {
										//If values are set and not null and with no white spaces run this code...

										$_SESSION['email'] = $email;
										$_SESSION['username'] = $username;

										//Check if user exists
										$query = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
										$result = mysqli_query($connection, $query);
										if(mysqli_num_rows($result) == 0) {
											$_SESSION['notPresent'] = true;
										}

										//Insert if is not present
										if(isset($_SESSION['notPresent']) && $_SESSION['notPresent']) {
											//Password encryption
											
											/**
											 * Encrypt Password
											 * 
											 * @var $password
											 */
											$result = encryptPassword($connection, $password);
											$enc_id = $result[0]['enc_id'];
											$password = $result[0]['password'];

											$query = "INSERT INTO `users`(`email`, `username`, `password`, `enc_id`) VALUES ('$email', '$username', '$password', '$enc_id')";
											$result = mysqli_query($connection, $query);
											
											if($result) {
												$query = "SELECT users.id as userID, ranks.title as title FROM users JOIN ranks ON users.rank = ranks.id WHERE username = '$username' AND password = '$password'";
												$result = mysqli_query($connection, $query);
												$row = mysqli_fetch_assoc($result);
												
												$_SESSION['loggedIn'] = true;
												$_SESSION['userID'] = $row['userID'];

												//Check Rank
												if($row['title'] == 'user') {
													// echo '<meta http-equiv="refresh" content="0; url=user.php">';
													header("Location: user.php");
												}
												else if ($row['title'] == 'support') {
													header("Location: support.php");
												}
												else if($row['title'] == 'admin') {
													header("Location: admin.php");
												}
											}
										}
										else {
											?>

											<script type="text/javascript">
												const popups = document.querySelectorAll(".popup");
												const errorMsgs = document.querySelectorAll(".errorMsg");

												for	(const popup of popups) {
													const popupClasses = popup.classList;

													if(popupClasses.contains("popup--register")) {
														popup.classList.add("is-active");
													}
												}

												for	(const errorMsg of errorMsgs) {
													errorMsg.classList.remove("hidden");
												}

												const emailFieldRegister = document.querySelector("#emailRegister");
												const usernameFieldRegister = document.querySelector("#usernameRegister");

												emailFieldRegister.value = "<?php echo $_SESSION['email']; ?>";
												usernameFieldRegister.value = "<?php echo $_SESSION['username']; ?>";
											</script>

											<?php
										}
									}
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<audio src="assets/sounds/keysound.mp3" class="keySound hidden"></audio>

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
	</script>

	<script src="assets/js/register.js" type="application/javascript"></script>
</body>

<?php
	}
?>
</html>