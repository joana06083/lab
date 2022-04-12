<?php
	include_once "db.php";
	session_start();
	$id = $_GET["id"];
    $sql="SELECT * FROM `message_board` WHERE id = '$id'";
	$result = mysqli_query($con , $sql) or die('MySQL query error');
   	$row = mysqli_fetch_array($result);
	if($_SESSION["id"]!=$row["uid"]){
    	header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改留言</title>
</head>
<body>
   
</body>
</html>