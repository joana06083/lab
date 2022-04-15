<?php
	include_once "db.php";
	session_start();
	$uid = $_GET["uid"];
	$artno = $_GET["artno"];

	global $db;
	$sql = $db->prepare("SELECT * FROM `article` WHERE user_no = '$uid' and article_no = '$artno'");
	$sql->execute();
	$row = $sql->fetch();

	if($_SESSION["user_id"]!=$row['user_no']){
    	header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改文章</title>
</head>
<body>
	<h4>修改文章</h4>
	<form role="form" action="art.php?method=update&uid=<?php echo $row["user_no"]?>&artno=<?php echo $row["article_no"]?>" method="post">
		<div>
			<label for="title">標題：</label>
			<input type="text" class="form-control" id="title" name="title" value="<?php echo $row["article_title"]?>">
			<a>建立時間：<?php echo $row['create_time']; ?></a>
			<a>最後修改時間：<?php echo $row['update_time']; ?></a>
			<a>作者：
				<?php 
					global $db;
					$usql = $db->prepare("SELECT user_name FROM `user` WHERE user_no = '{$row['user_no']}'");
					$usql->execute();
					$urow = $usql->fetchColumn();
					echo $urow;
				?>
			</a>  
		</div>
		<hr/>	
		<div class="form-group">
			<p for="content">文章內容</p>
			
			<textarea type="text" class="form-control" id="content" name="content" value="<?php echo $row["article_content"]?>"><?php echo $row["article_content"]?></textarea>
		</div>
		<button type="submit" class="btn btn-primary">修改</button>
	</form>
</body>
</html>