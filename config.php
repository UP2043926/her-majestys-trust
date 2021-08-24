<?php

	$servername = "localhost";
	$username = "id17395443_root";
	$password = "longLiveTheQueen@21";
	$dbname = "id17395443_hermajestystrust";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>