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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <title>login</title>
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
        
        <form role="form" action="config.php?method=login" method="post" class="row g-3 needs-validation" novalidate >
            <div  class="row mb-3">
                <label for="account" class="col-sm-2 col-form-label">帳號 :</label>
                <input type="text" class="form-control" id="account" placeholder="account" name="account" />
                <div class="invalid-feedback">
                    Please input a account.
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">密碼 :</label>
                <input  type="password" class="form-control" id="password" placeholder="Password" name="password">
                <div class="invalid-feedback">
                    Please input a password.
                </div>
            </div>
            <button type="submit" name="login" value="login" class="btn btn-outline-primary">登入</button>
        </form>
    </div>
</body>
</html>
