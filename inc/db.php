<?php
	$db = '';
	$localhost = '';
	$username = '';
	$password = '';

	$connection = mysqli_connect($localhost, $username, $password, $db);
	$mysqli = new mysqli($localhost, $username, $password, $db);

	if($connection) {
		// echo 'Success';
	}
	else {
		echo mysqli_connect_error();
		die();
	}
?>
