<?php
	$options = 0;
	//AES Encryption - encrypted string does not change

	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$encryption_iv = "1271542832703629";
	$encryption_iv23 = random_bytes($iv_length);
	$encryption_key = "passwdqgehqwiheiqe";
	$encryption = openssl_encrypt($password, $ciphering, $encryption_key, $options, $encryption_iv);
	// echo "Password: " . $password . " after encryption is: " . $encryption . "\n";


	//AES Decryption - decryption string does not change

	// $decryption_iv = $encryption_iv;
	// $decryption_key = $encryption_key;
	// $decryption = openssl_decrypt($encryption, $ciphering, $decryption_key, $options, $decryption_iv);
	// echo "Password: " . $password . " after decryption is: " . $decryption . "\n";


	//BF-CBC MD5 Encryption - encrypted string randomly changes specifically
	// $ciphering2 = "BF-CBC";
	// $iv_length2 = openssl_cipher_iv_length($ciphering2);
	// $encryption_iv2 = random_bytes($iv_length2);
	// $encryption_key2 = openssl_digest(php_uname(), 'MD5', TRUE);
	// $encryption2 = openssl_encrypt($password, $ciphering2, $encryption_key2, $options, $encryption_iv2);
	// echo "Password: " . $password . " after encryption is: " . $encryption2 . "\n";

	//Salt
	$prefixSalt = "я1%т*^ъ52!*ve9ь40@0е1з@3&pг(j}#&!ъ";
	$suffixSalt = "и1!№§(!)]7{\$ъ*!ь?>>.ъ\"\"4:\$*п@№д9ф2з+_щ,'|";

	//Encrypting Salt

	//Prefix Salt
	$encryption_iv2 = "8641794615918543";
	$encryption_key2 = "prefixSaltPasswd";
	// echo $encryption_iv2 . ' | ' . $encryption_iv3 . '\n';
	// echo $encryption_key2 . ' | ' . $encryption_key3;

	$encryption2 = openssl_encrypt($prefixSalt, $ciphering, $encryption_key2, $options, $encryption_iv2);

	//Suffix Salt
	$encryption_iv3 = "1730175357982071";
	$encryption_key3 = "suffixSaltPasswd";

	$encryption3 = openssl_encrypt($suffixSalt, $ciphering, $encryption_key3, $options, $encryption_iv3);

	// echo "Password: " . $prefixSalt . $password . $suffixSalt . " after encryption is: " . $encryption3 . $encryption2 . $encryption4 . "\n";
	
	// echo "Password before encryption: " . $password . "\n";


	// if(isset($_SESSION['encOnLogin']) && $_SESSION['encOnLogin']) {
	// 	$encryption3 = openssl_encrypt($password, $ciphering2, $row['enc_key1'], $options, $row['enc_iv1']);
	// 	$encryption2 = openssl_encrypt($password, $ciphering2, $row['enc_key2'], $options, $row['enc_iv2']);
	// 	$encryption4 = openssl_encrypt($password, $ciphering2, $row['enc_key3'], $options, $row['enc_iv3']);
	// }
	// else {

	// }


	//Assigning encrypted password
	$password = $encryption;
	echo $encryption_iv23 . "\n";
	echo $encryption_iv;

	// echo "Password after encryption: " . $password . "\n";

	//BF-CBC MD5 Decryption - decrypted string randomly changes specifically
	// $decryption_iv2 = random_bytes($iv_length2);
	// $decryption_key2 = openssl_digest(php_uname(), 'MD5', TRUE);
	// $decryption2 = openssl_decrypt($encryption2, $ciphering2, $decryption_key2, $options, $encryption_iv2);

	// //Decrypted Salt
	// $decryption_iv3 = random_bytes($iv_length3);
	// $decryption_key3 = openssl_digest(php_uname(), 'MD5', TRUE);
	// $decryption3 = openssl_decrypt($encryption3, $ciphering2, $decryption_key3, $options, $encryption_iv3);

	// $decryption_iv4 = random_bytes($iv_length4);
	// $decryption_key4 = openssl_digest(php_uname(), 'MD5', TRUE);
	// $decryption4 = openssl_decrypt($encryption4, $ciphering2, $decryption_key4, $options, $encryption_iv4);


	//Assigning decrypted password
	// $password = $decryption3 . $decryption2 . $decryption4;
	

	// echo "Password after decryption: " . $password . "\n";
	// echo "Password: " . $prefixSalt . $password . $suffixSalt . " after decryption is: " . $decryption3 . $decryption2 . $decryption4 . "\n";
?>