<?php 
    include_once "db.php";
	session_start();
	if(isset($_SESSION["user_id"])){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h3>登入頁</h3>
    <form role="form" action="config.php?method=login" method="post">
    <div class="form-group">
    <label for="account">帳號</label>
        <input type="text" class="form-control" id="account" placeholder="account" name="account" />
    </div>
    <div class="form-group">
        <label for="password">密碼</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" />
    </div>
    <button type="submit" class="btn btn-primary">登入</button>
    <a href="signup.php">註冊</a>
    </form>
</body>
</html>
