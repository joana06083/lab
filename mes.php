<?php
	include_once "db.php";
    session_start();
    echo $_GET["method"];

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
        $uid = $_GET["uid"];
        $loginid = $_GET["loginid"];
        $artno = $_GET["artno"];
        $content = $_POST["content"];
        $time=date('Y-m-d H:i:s',time());
        $msg_no=date('YmdHis',time());
        
        global $db;
        if($uid!=$loginid){
            $sql = $db->prepare("INSERT INTO `message` (message_no, message_content,create_time,user_no,article_no) VALUES ('$msg_no', '$content','$time','$loginid','$artno')");
            $sql->execute();
            print_r($sql);
         }else{
            $sql = $db->prepare("INSERT INTO `message` (message_no, message_content,create_time,user_no,article_no) VALUES ('$msg_no', '$content','$time','$uid','$artno')");
            $sql->execute();
        }
            echo "<script type='text/javascript'>";
            echo "alert('新增留言成功');";
            echo "location.href='art_index.php?uid=".$uid."&artno=".$artno."&loginid=".$loginid."'";
            echo "</script>";
    }

    //update
    function update(){
        // $uid = $_GET["uid"];
        // $no = $_GET["no"];
        // $title = $_POST["title"];
        // $content = $_POST["content"];

        // global $db;
        // $sql = $db->prepare("UPDATE `message` SET article_title = '$title', article_content = '$content' WHERE user_no = '$uid' and article_no = '$no'");
        // $sql->execute();

        // echo "<script type='text/javascript'>";
        // echo "alert('編輯留言成功');";
        // echo "location.href='art_index.php';";
        // echo "</script>";
    }

    //delete
    function del(){
        // $uid = $_GET["uid"];
        // $no = $_GET["no"];

        // global $db;
        // $sql = $db->prepare("DELETE FROM `message` WHERE user_no = '$uid' and article_no = '$no'");
        // $sql->execute();
        // echo "<script type='text/javascript'>";
        // echo "alert('刪除留言成功');";
        // echo "location.href='art_index.php';";
        // echo "</script>";
    }