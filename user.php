<!DOCTYPE html>
<html lang="en" onkeyup="saveToDatabase(note.innerHTML)">
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
	session_start();

	if(isset($_SESSION['userID']) && $_SESSION['loggedIn']) {
		?>

		<body>
			<div class="wrapper">
				<header class="header">
					<div class="shell">
						<div class="header__bar">
							<div class="header__aside">
								<a href="index.php" class="logo">
									<img src="assets/images/logo.png" alt="Logo Icon">
								</a>
								<nav class="nav header__nav">
									<ul>
										<li>
											<a href="index.php">Home</a>
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
								<form action="" method="POST" name="formLogout">
									<button type="submit" name="submitFormLogout"><a href="#" class="link-logout"><img src="assets/images/user.png" alt="Log Out"></a></button>
								</form>
							</div>
						</div>
					</div>
				</header>

				<div class="hero hero--user">
					<div class="hero__inner">
						<h1 class="hero__title">Welcome, <span class="userSpan">
							<?php 
								$result = $mysqli->query("SELECT username FROM users WHERE id = '{$_SESSION['userID']}'") or die($mysqli->error);
								$row = $result->fetch_array();
								echo $row['username'];
							?></span><br> Type or search on your demand</h1>
					</div>
				</div>

				<div class="section-note">
					<div class="section__inner">
						<div class="section__background" style="background-image: url(assets/images/desk.png);">
							
						</div>

						<div class="section__content">
							<p class="note section__text"><span class="noteCursor"></span></p>
							<!-- <input type="text" id="q" name="q"> -->
						</div>

						<?php 
							$content = $mysqli->query("SELECT content FROM note WHERE id = 1") or die($mysqli->error);
							if($content->num_rows == 1) {
								$row = $content->fetch_array();
						?>
							<script type="text/javascript">
								const noteN = document.querySelector(".note");
								// const noteNcursor = document.querySelector(".noteCursor");

								noteN.innerHTML = '<?php echo "{$row['content']}"; ?>';
								// note.removeChild(noteCursor);
								// noteN.append(noteNcursor);

							</script>
						<?php
							}
						?>

						<script type="text/javascript">
							// function saveToDatabase(content) {
							// 	if (content.length == 0) {
							// 		// document.getElementById("txtHint").innerHTML = "";
							// 		return;
							// 	} else {
							// 		var xmlhttp = new XMLHttpRequest();
							// 		xmlhttp.onreadystatechange = function() {
							// 		if (this.readyState == 4 && this.status == 200) {
							// 		// document.getElementById("txtHint").innerHTML = this.responseText;
							// 		}
							// 		};
							// 		xmlhttp.open("GET", "register.php?q=" + content, true);
							// 		xmlhttp.send();
							// 	}
							// 	console.log(0);
							// }

							// const qa = document.querySelector("#q");
							function saveToDatabase(query1) {
								var query = encodeURIComponent(query1);
								if (query == "") {
									// $(".result").innerHTML = "";
									return;
								}
								else {
									var xmlhttp = new XMLHttpRequest();
									xmlhttp.onreadystatechange = function() {
										if (this.readyState == 4 && this.status == 200) {
											// console.log(this.responseText);
										}
									};
									xmlhttp.open("GET","note.php?q=" + query, true);
									xmlhttp.send();
								}
							};
							
						</script>
					</div>
				</div>

				<footer class="footer">
					
				</footer>
			</div>
			
			<div class="popups">
			</div>

			<audio src="assets/sounds/keysound.mp3" class="keySound hidden"></audio>

			<script src="assets/js/noteScriptUser.js" type="application/javascript"></script>

			<?php
				if(isset($_POST['submitFormLogout'])) {
					session_destroy();
					header("Location: index.php");
				}
			?>
		</body>

		<?php
	}
	else {
		header("Location: 404.php");
	}
	// echo $_SESSION['userID'];
	// echo $_SESSION['loggedIn'];
	// echo $_SESSION['notPresent'];

	// if(isset($_SESSION['wrongCredentials']) && $_SESSION['wrongCredentials']) {
	// 	echo $_SESSION['isPresent'];
	// }
?>
</html>