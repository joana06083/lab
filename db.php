<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "message"; 

// Create connection
$db = new mysqli($servername, $username, $password);

// Check connection
	if ($db->connect_error){
    die("Connection failed: " . $db->connect_error);
  }
  // echo "Connected successfully<br/>";
	
  //change Connected database
  mysqli_select_db($db , $dbname);

	mysqli_query($db ,"SET NAMES utf8");
	// mysql_close($db);

?>