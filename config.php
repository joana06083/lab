<?php
    include_once "db.php";
	switch ($_GET["method"]) {
		case "login":
			login();
			break;
		case "signup":
			signup();
			break;
		case "logout":
			logout();
			break;
		default:
			break;
	}

    //登入
    function login(){
        $sql="SELECT * FROM `user` WHERE id = '$_POST[account]' && password = '$_POST[password]'";
        global $db;
        $result = mysqli_query($db , $sql) or die('MySQL query error');
        $row = mysqli_fetch_array($result);
        if($row==""){
            echo "<script type='text/javascript'>";
            echo "alert('帳密錯誤');";
            echo "location.href='login.php';";
            echo "</script>";
        }else{
            session_start();
            $_SESSION["id"] = $row['account'];
            echo "<script type='text/javascript'>";
            echo "alert('登入成功');";
            echo "location.href='index.php';";
            echo "</script>";
        }
    }

    //註冊
    function signup(){
        $sql="SELECT * FROM `user` WHERE id = '$_POST[account]'";
        global $db;
        $result = mysqli_query($db , $sql) or die('MySQL query error');
        $row = mysqli_fetch_array($result);   //資料表沒資料為空陣列
        
        // if($row!="" ){  //空陣列時，皆會進入此判斷
        if(empty($row)==FALSE){
            echo "<script type='text/javascript'>";
            echo "alert('已經辦過帳號囉');";
            echo "location.href='login.php';";
            echo "</script>";
        }else{
            $sql="INSERT INTO `user` (id, password, name,sex) VALUES ('$_POST[account]','$_POST[password]','$_POST[name]','$_POST[sex]')";
            global $db;
            $result = mysqli_query($db , $sql) or die("MySQL query error");
    
            $sql="SELECT * FROM `user` WHERE id = '$_POST[account]' && password = '$_POST[password]'";
            global $db;
            $result = mysqli_query($db , $sql) or die('MySQL query error');
            $row = mysqli_fetch_array($result);
            session_start();
            $_SESSION["id"] = $row["account"];
            echo "<script type='text/javascript'>";
            echo "alert('註冊成功');";
            echo "location.href='index.php';";
            echo "</script>";
        }
    }

    //登出
    function logout(){
        session_start();
        if(isset($_SESSION["id"])){
            session_unset();
            echo "<script type='text/javascript'>";
            echo "alert('登出成功');";
            echo "location.href='index.php';";
            echo "</script>";
        }
    }