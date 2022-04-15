<?php
    include_once "db.php";
    session_start();
    $uid = $_GET["uid"];
    $loginid = $_GET["loginid"];
    $artno = $_GET["artno"];
    $sql = $db->prepare("SELECT * FROM `article` WHERE user_no = '$uid' AND article_no = '$artno'");
    $sql->execute();
    $row = $sql->fetch();
    // print("\n");
    // print_r($row);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['article_title']; ?></title>
</head>
<body>
    <!-- 文章內文 -->
    <a href="index.php?>">首頁</a>
    <h4>文章標題：<?php echo $row['article_title']; ?></h4>
    <div>
        <a>建立時間：<?php echo $row['create_time']; ?></a>
        <a>最後修改時間：<?php echo $row['update_time']; ?></a>
        <a>作者：
            <?php 
                global $db;
                $usql = $db->prepare("SELECT user_name FROM `user` WHERE user_no = '{$row['user_no']}'");
                $usql->execute();
                $urow = $usql->fetchColumn();
                echo $urow;
            ?>
        </a>  
    </div>
    <hr/>
    <div>
        <?php echo $row['article_content']; ?>
    </div>
    <hr/>
    <hr/>
    <!-- 新增留言 -->
    <form role="form" action="mes.php?method=add&uid=<?php echo $uid ?>&loginid=<?php echo $loginid ?>&artno=<?php echo $row["article_no"]?>" method="post">
        <div>
            <label for="content">留言內容</label>
            <input type="text" id="content" placeholder="content" name="content"/>
            <button type="submit">新增</button>
        </div>
    </form>

    <hr/>
    <!-- 留言內容 -->
    <?php
        $artno = $_GET["artno"];
        $messql = $db->prepare("SELECT * FROM `message` WHERE article_no = '$artno'");
        $messql->execute();
        $mesrow = $messql->fetchAll();
        foreach($mesrow AS $mesarr){
    ?>
    <div>
        <a>留言者：
            <?php 
                global $db;
                $sql = $db->prepare("SELECT user_name FROM `user` WHERE user_no = '{$mesarr['user_no']}'");
                $sql->execute();
                $row = $sql->fetchColumn();
                echo $row;
            ?>
        </a>
        <a>最後修改時間：<?php echo $mesarr['update_time'];?></a>
        <?php if(@$_SESSION["user_id"]===$mesarr['user_no']){?>
            <a href="update_art.php?uid=<?php echo $mesarr['user_no']?>&artno=<?php echo $mesarr["article_no"]?>">編輯</a>
            <a href="art.php?method=del&uid=<?php echo $mesarr['user_no']?>&artno=<?php echo $mesarr["article_no"]?>">刪除</a>
        <?php }?>
    </div>
    <div>
        <a>留言內容 ：<?php echo $mesarr['message_content'];?></a>
    </div>
    <hr/>

    <?php }?>
</body>
</html>