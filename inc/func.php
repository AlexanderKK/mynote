<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />

	<title></title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
</head>
<body>
	
</body>
</html>
<?php
	//Functions
	
	/**
	 * checkEncryptedPassword
	 * 
	 * @param  [Array] $array
	 * @param  [string] $password
	 * @return [string] 
	 */
	function checkEncryptedPassword($array, $password) {
		$ciphering = "BF-CBC";
		$options = 0;

		// $encryption_iv1 = $row['enc_iv2'];
		$encryption_iv1 = $array[0]['enc_iv2'];
		// $encryption_key1 = $row['enc_key2'];
		$encryption_key1 = $array[0]['enc_key2'];
		$encryption1 = openssl_encrypt($password, $ciphering, $encryption_key1, $options, $encryption_iv1);

		$prefixSalt = "я1%т*^ъ52!*ve9ь40@0е1з@3&pг(j}#&!ъ";
		// $encryption_iv2 = $row['enc_iv1'];
		$encryption_iv2 = $array[0]['enc_iv1'];
		// $encryption_key2 = $row['enc_key1'];
		$encryption_key2 = $array[0]['enc_key1'];
		$encryption2 = openssl_encrypt($prefixSalt, $ciphering, $encryption_key2, $options, $encryption_iv2);

		$suffixSalt = "и1!№§(!)]7{\$ъ*!ь?>>.ъ\"\"4:\$*п@№д9ф2з+_щ,'|";
		// $encryption_iv3 = $row['enc_iv3'];
		$encryption_iv3 = $array[0]['enc_iv3'];
		// $encryption_key3 = $row['enc_key3'];
		$encryption_key3 = $array[0]['enc_key3'];
		$encryption3 = openssl_encrypt($suffixSalt, $ciphering, $encryption_key3, $options, $encryption_iv3);

		$password = $encryption2 . $encryption1 . $encryption3;
		return $password;
	}

	/**
	 * encryptPassword
	 * 
	 * @param  [string] $password
	 * @return [string] $password
	 */
	function encryptPassword($connection, $password) {
		$ciphering = "BF-CBC";
		$options = 0;

		$iv_length1 = openssl_cipher_iv_length($ciphering);
		$encryption_iv1 = random_bytes($iv_length1);
		$encryption_key1 = openssl_digest(php_uname(), 'MD5', TRUE);
		$encryption1 = openssl_encrypt($password, $ciphering, $encryption_key1, $options, $encryption_iv1);

		$prefixSalt = "я1%т*^ъ52!*ve9ь40@0е1з@3&pг(j}#&!ъ";
		$iv_length2 = openssl_cipher_iv_length($ciphering);
		$encryption_iv2 = random_bytes($iv_length2);
		$encryption_key2 = openssl_digest(php_uname(), 'MD5', TRUE);
		$encryption2 = openssl_encrypt($prefixSalt, $ciphering, $encryption_key2, $options, $encryption_iv2);

		$suffixSalt = "и1!№§(!)]7{\$ъ*!ь?>>.ъ\"\"4:\$*п@№д9ф2з+_щ,'|";
		$iv_length3 = openssl_cipher_iv_length($ciphering);
		$encryption_iv3 = random_bytes($iv_length3);
		$encryption_key3 = openssl_digest(php_uname(), 'MD5', TRUE);
		$encryption3 = openssl_encrypt($suffixSalt, $ciphering, $encryption_key3, $options, $encryption_iv3);

		// Add encryption keys
		$query = "INSERT INTO `enc`(`enc_key1`, `enc_key2`, `enc_key3`, `enc_iv1`, `enc_iv2`, `enc_iv3`) VALUES ('$encryption_key2', '$encryption_key1', '$encryption_key3', '$encryption_iv2', '$encryption_iv1', '$encryption_iv3')";
		$result = mysqli_query($connection, $query);

		//Select enc_id
		$query = "SELECT id FROM enc WHERE enc_key1 = '$encryption_key2' AND enc_key2 = '$encryption_key1' AND enc_key3 = '$encryption_key3' AND enc_iv1 = '$encryption_iv2' AND enc_iv2 = '$encryption_iv1' AND enc_iv3 = '$encryption_iv3'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);											
		if(isset($row['id'])) {
			$enc_id = $row['id'];
		}

		$password = $encryption2 . $encryption1 . $encryption3;

		$resultArray[] = array(
			'enc_id' => $enc_id,
			'password' => $password,
		);
		return $resultArray;
	}
?>