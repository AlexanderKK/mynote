<?php
	$db = 'shrekofoniadev';
	$localhost = 'localhost';
	$username = 'shrek';
	$password = 'impeachment*';

	$connection = mysqli_connect($localhost, $username, $password, $db);

	if($connection) {
		// echo 'Success';
	}
	else {
		echo mysqli_connect_error();
		die();
	}
?>