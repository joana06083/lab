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
        $time=date('Y-m-d H:i:s',time());
        $no=date('YmdHis',time());
        
        global $db;
        $sql = $db->prepare("INSERT INTO `message＿board` (no, title, content,time,id) VALUES ('$no', '$title', '$content','$time','$uid')");
        $sql->execute();

        echo "<script type='text/javascript'>";
        echo "alert('新增留言成功');";
        echo "location.href='index.php';";
        echo "</script>";
    }

    //update
    function update(){
        $id = $_GET["id"];
        $no = $_GET["no"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $time = date('Y-m-d H:i:s',time()); 

        global $db;
        $sql = $db->prepare("UPDATE `message＿board` SET title = '$title', content = '$content',time='$time' WHERE id = '$id' and no = '$no'");
        $sql->execute();

        echo "<script type='text/javascript'>";
        echo "alert('編輯留言成功');";
        echo "location.href='index.php';";
        echo "</script>";
    }

    //delete
    function del(){
        $id = $_GET["id"];
        $no = $_GET["no"];

        global $db;
        $sql = $db->prepare("DELETE FROM `message＿board` WHERE id = '$id' and no = '$no'");
        $sql->execute();

        echo "<script type='text/javascript'>";
        echo "alert('刪除留言成功');";
        echo "location.href='index.php';";
        echo "</script>";
    }