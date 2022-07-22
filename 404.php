<?php
	require_once 'inc/db.php';
	session_start();

	if(isset($_SESSION['userID']) && $_SESSION['loggedIn']) {
		header("Location: user.php");
	}
	else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />

	<title></title>

	<link rel="shortcut icon" type="image/x-icon" href="css/images/favicon.ico" />

	<link rel="stylesheet" href="css/style.css" />
</head>
<body>
	<h2>Nice try :)</h2>
</body>
</html>

<?php
	}
?>