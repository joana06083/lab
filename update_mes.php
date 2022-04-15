<?php
	include_once "db.php";
	session_start();
	$uid = $_GET["id"];
	$no = $_GET["no"];

	global $db;
	$sql = $db->prepare("SELECT * FROM `message＿board` WHERE id = '$uid' and no = '$no'");
	$sql->execute();
	$row = $sql->fetch();

	if($_SESSION["id"]!=$row["id"]){
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
	<h4>修改留言</h4>
	<form role="form" action="mes.php?method=update&id=<?php echo $row["id"]?>&no=<?php echo $row["no"]?>" method="post">
		<div class="form-group">
			<label for="title">標題</label>
			<input type="text" class="form-control" id="title" placeholder="title" name="title" value="<?php echo $row["title"]?>">
		</div>
		<div class="form-group">
			<label for="content">文章內容</label>
			<input type="text" class="form-control" id="content" placeholder="content" name="content" value="<?php echo $row["content"]?>">
		</div>
		<button type="submit" class="btn btn-primary">修改</button>
	</form>

</body>
</html>