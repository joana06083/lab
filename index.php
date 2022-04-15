<?php
    include_once "db.php";
    session_start();
    if(empty($_SESSION["user_id"])==false){
?>
    <label>Hi!
        <?php 
            global $db;
            $sql = $db->prepare("SELECT user_name FROM `user` WHERE user_no = '{$_SESSION['user_id']}'");
            $sql->execute();
            $row = $sql->fetchColumn();
            echo $row;
        ?>
    </label>
    <a href="config.php?method=logout">登出</a>
    <a href="add_art.php">新增文章</a>
    <form action="index.php" method="POST">
        
        <input type="text" class="form-control" id="search" placeholder="search" name="search"/>
        <button type="submit" class="btn btn-primary">查詢</button>
    </form>

    <hr/>
<?php }else{?>
    <a href="login.php">登入</a>｜
    <a href="signup.php">註冊</a>
    <hr/>
<?php }?>

<?php
    if(@$_POST['search']!=""){
        $sql = $db->prepare("SELECT a.*,user_name FROM `article` a lEFT JOIN `user` u ON a.user_no=u.user_no WHERE user_name LIKE '%{$_POST['search']}%' OR article_title LIKE '%{$_POST['search']}%' OR update_time LIKE '%{$_POST['search']}%'");
        
        $sql->execute();
    }else{
        $sql = $db->prepare("SELECT * FROM `article`");
        $sql->execute();
    }

    $row = $sql->fetchAll();
    // print("\n");
    // print_r($row);
    
     foreach($row AS $arr){
?>
    <div>
        <a href="art_index.php?uid=<?php echo $arr['user_no']?>&artno=<?php echo $arr["article_no"]?>&loginid=<?php echo $_SESSION["user_id"]?>">
            文章標題：
            <?php echo $arr['article_title'];?>
        </a>
        <a>作者：
            <?php 
                global $db;
                $sql = $db->prepare("SELECT user_name FROM `user` WHERE user_no = '{$arr['user_no']}'");
                $sql->execute();
                $row = $sql->fetchColumn();
                echo $row;
            ?>
        </a>
        <a>最後修改時間：<?php echo $arr['update_time'];?></a>
        <?php if(@$_SESSION["user_id"]===$arr['user_no']){?>
            <a href="update_art.php?uid=<?php echo $arr['user_no']?>&artno=<?php echo $arr["article_no"]?>">編輯</a>
            <a href="art.php?method=del&uid=<?php echo $arr['user_no']?>&artno=<?php echo $arr["article_no"]?>">刪除</a>
        <?php }?>
        
        <hr/>
    </div>
<?php
     }
?>