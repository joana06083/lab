<?php
    include_once "db.php";
    session_start();
    if(isset($_SESSION["id"])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>siginup</title>
</head>
<body>
    <h3>註冊頁</h3>
    <form role="form" action="config.php?method=signup" method="post">
    <div class="form-group">
        <label for="account">帳號</label>
        <input type="text" class="form-control" id="account" placeholder="account" name="account" />
    </div>
    <div class="form-group">
        <label for="password">密碼</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" />
    </div>
    <div class="form-group">
        <label for="name">暱稱</label>
        <input type="text" class="form-control" id="name" placeholder="name" name="name" />
    </div>
    <div class="form-group">
        <label for="sex">性別</label>
        <input type="radio" class="form-control" id="sex" name="sex" value="male"/>男性
        <input type="radio" class="form-control" id="sex" name="sex" value="female"/>女性

    </div>
        
        <input type="submit" name="submit" value="註冊">
        <input type="reset" name="Reset" value="重置">
        <a href="login.php">已有帳號想登入</a>
    </form>
</body>
</html>
