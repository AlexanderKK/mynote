<?php
	require_once 'inc/db.php';

	$q = $_REQUEST['q'];
	// $q = str_replace('%0A','\n', $q);

	$query = "UPDATE note SET content = '$q' WHERE id = 1";
	$result = mysqli_query($connection, $query);

	// $query = "UPDATE note SET content = REPLACE(content, '. ', '.\r\n')";
	// $result = mysqli_query($connection, $query);
?>