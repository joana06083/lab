<?php
    include_once "db.php";
    session_start();
    if(!isset($_SESSION["user_id"])){
    	header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增文章</title>
</head>
<body>
    <h4>新增文章</h4>
    <form role="form" action="art.php?method=add" method="post">
    <div class="form-group">
        <label for="title">文章標題</label>
        <input type="text" class="form-control" id="title" placeholder="title" name="title"/>
    </div>
    <div class="form-group">
        <label for="content">文章內容</label>
        <input type="text" class="form-control" id="content" placeholder="content" name="content"/>
    </div>
    <button type="submit" class="btn btn-primary">新增</button>
    </form>
</body>
</html>