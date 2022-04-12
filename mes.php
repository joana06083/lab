<?php
	include_once "db.php";
    session_start();
	switch ($_GET["method"]) {
		case "add":
			add();
			break;
		case "update":
			update();
			break;
		case "del":
			del();
			break;
		default:
			break;
	}

    //add
    function add(){
        $uid = $_SESSION["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $sql = "INSERT INTO `message_board` (uid, title, content) VALUES ('$uid', '$title', '$content')";
        global $db;
        $result = mysqli_query($db , $sql) or die('MySQL query error');
        echo "<script type='text/javascript'>";
        echo "alert('新增留言成功');";
        echo "location.href='index.php';";
        echo "</script>";
    }

    //update
    function update(){
        $id = $_GET["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $sql = "UPDATE `message_board` SET title = '$title', content = '$content' WHERE id = $id";
        global $db;
        $result = mysqli_query($db , $sql) or die('MySQL query error');
        echo "<script type='text/javascript'>";
        echo "alert('編輯留言成功');";
        echo "location.href='index.php';";
        echo "</script>";
    }

    //delete
    function del(){
        $id = $_GET["id"];
        $sql = "DELETE FROM `message_board` WHERE id = $id";
        global $db;
        $result = mysqli_query($db , $sql) or die('MySQL query error');
        echo "<script type='text/javascript'>";
        echo "alert('刪除留言成功');";
        echo "location.href='index.php';";
        echo "</script>";
    }