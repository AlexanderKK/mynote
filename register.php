<?php
	require_once 'inc/db.php';

	if(isset($_POST['submit'])) {
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(isset($email) && isset($username) && isset($password)) {
			if ($email !== "" && $username !== "" && $password !== "" && 
			!preg_match('/\s/', $email) && !preg_match('/\s/', $username) && !preg_match('/\s/', $password)) {
				//If values are set and not null and with no white spaces run this code...

				//Check if user exists
				$query = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
				$result = mysqli_query($connection, $query);
				if(mysqli_num_rows($result) == 0) {
					$_SESSION['notPresent'] = true;
				}

				//Insert if is not present
				if(isset($_SESSION['notPresent']) && $_SESSION['notPresent']) {
					$query = "INSERT INTO `users`(`email`, `username`, `password`) VALUES ('$email', '$username', '$password')";
					$result = mysqli_query($connection, $query);
					
					if($result) {
						$query = "SELECT users.id, ranks.title as title FROM users JOIN ranks ON users.rank = ranks.id WHERE username = '$username' AND password = '$password'";
						$result = mysqli_query($connection, $query);
						$row = mysqli_fetch_assoc($result);
						
						$_SESSION['loggedIn'] = true;
						$_SESSION['userID'] = $row['users.id'];

						//Check Rank
						if($row['title'] == 'user') {
							header("Location: user.php");
						}
						else if ($row['title'] == 'support') {
							header("Location: support.php");
						}
					}
				}
				else {
					?>

					<script type="text/javascript">
						
					</script>

					<?php
					$_SESSION['wrongCredentials'] = true;
					header("Location: index.php");

				}
			}
		}
	}
?>
<?php
	// 	echo '<meta http-equiv="refresh" content="0; url=inc/db.php">';

	// $email = $_POST['email'];

	
	// $email = $_POST['email'];
	// echo $email;
    // Do whatever you want with the $uid

	// $json = file_get_contents("http://localhost/mynote/");
	// $data = json_decode($json);
	// echo $data;
	// $email = $data['email'];

	// $email = $data->email;
	// $username = $data->username;
	// $password = $data->password;

	// Insert record
	// $query = "INSERT INTO `users`(`email`, `username`, `password`) VALUES ('$email', '$username', '$password')";
	// $result = mysqli_query($connection, $query);

	// if(isset($_POST['submit'])) {
	// 	$email = $_POST['email'];
	// 	$username = $_POST['username'];
	// 	$password = $_POST['password'];
	// }
?>