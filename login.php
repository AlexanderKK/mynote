<?php
	require_once 'inc/db.php';

	if(isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(isset($username) && isset($password)) {
			if ($username !== "" && $password !== "" &&
			!preg_match('/\s/', $username) && !preg_match('/\s/', $password)) {
				$query = "SELECT ";
		}
	}
?>