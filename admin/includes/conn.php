<?php
	$conn = new mysqli('localhost', 'root', '1', 'votesystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>