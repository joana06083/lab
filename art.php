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
        $uid = $_SESSION["user_id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $time=date('Y-m-d H:i:s',time());
        $artno=date('YmdHis',time());
        
        global $db;
        $sql = $db->prepare("INSERT INTO `article` (article_no, article_title, article_content,create_time,user_no) 
        VALUES ('$artno', '$title', '$content','$time','$uid')");
        $sql->execute();
        print_r($sql);

        echo "<script type='text/javascript'>";
        echo "alert('新增文章成功');";
        echo "location.href='index.php';";
        echo "</script>";
    }

    //update
    function update(){
        $uid = $_GET["uid"];
        $artno = $_GET["artno"];
        $title = $_POST["title"];
        $content = $_POST["content"];

        global $db;
        $sql = $db->prepare("UPDATE `article` SET article_title = '$title', article_content = '$content' WHERE user_no = '$uid' and article_no = '$artno'");
        $sql->execute();
        print_r($sql);
        echo "<script type='text/javascript'>";
        echo "alert('編輯文章成功');";
        echo "location.href='index.php';";
        echo "</script>";
    }

    //delete
    function del(){
        $uid = $_GET["uid"];
        $artno = $_GET["artno"];

        global $db;
        $sql = $db->prepare("DELETE FROM `article` WHERE user_no = '$uid' and article_no = '$artno'");
        $sql->execute();
        echo "<script type='text/javascript'>";
        echo "alert('刪除文章成功');";
        echo "location.href='index.php';";
        echo "</script>";
    }