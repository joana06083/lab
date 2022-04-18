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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>註冊</title>
</head>
<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="color:blue;">Home</a>
        </div>
    </nav>
    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="signup.php">註冊</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">登入</a>
            </li>
        </ul>
        <form role="form" action="config.php?method=signup" method="post">
        <div  class="row mb-3">
            <label for="account" class="col-sm-2 col-form-label">帳號 :</label>
            <input type="text" class="form-control" id="account" placeholder="account" name="account" />
        </div>
        <div class="row mb-3">
            <label for="password" class="col-sm-2 col-form-label">密碼 :</label>
            <input  type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <div  class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">暱稱 :</label>
            <input type="text" class="form-control" id="name" placeholder="name" name="name" />
        </div>
        <div  class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">性別 :</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="sex" name="sex" value="male">
            <label class="form-check-label" for="sex">男性</label>
        </div>
        <div class="form-check">
            <input type="radio" class="form-check-input" id="sex" name="sex" value="female">
            <label class="form-check-label" for="sex">女性</label>
        </div>
        <div>
            <button type="submit" name="submit" value="signup" class="btn btn-outline-primary">註冊</button>
            <button type="reset"  name="reset" value="reset" class="btn btn-outline-secondary">重置</button>
        </div>
        </form>
    </div>
</body>
</html>
