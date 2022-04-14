<?php
    include_once "db.php";
    session_start();
    if(empty($_SESSION["id"])==false){
?>
    <a>Hi!<?php echo $_SESSION["id"] ?></a>
    <a href="config.php?method=logout">登出</a>｜
    <a href="add_mes.php">新增留言</a>

    <form action="index.php" method="POST">
        <input type="text" class="form-control" id="search" placeholder="id search" name="search"/>
        <button type="submit" class="btn btn-primary">查詢</button>
    </form>

    <hr/>
<?php }else{?>
    <a href="login.php">登入</a>｜
    <a href="signup.php">註冊</a>
    <hr/>
<?php }?>

<?php
    if(@$_POST["search"]!=""){
        $sql = $db->prepare("SELECT * FROM `message＿board` WHERE id = {$_POST['search']}");
        $sql->execute();
    }else{
        $sql = $db->prepare("SELECT * FROM `message＿board`");
        $sql->execute();
    }

    $row = $sql->fetchAll();
    /* 获取结果集中所有剩余的行 */
    // print("Fetch all of the remaining rows in the result set:\n");
    // print_r($row);
    
     foreach($row AS $arr){
?>
    <div class="card">
        <h4 class="card-header">標題：<?php echo $arr['title'];?>
        <?php if(@$_SESSION["id"]===$arr['id']){?>
            <a href="mes.php?method=del&id=<?php echo $arr['id']?>&no=<?php echo $arr['no']?>">刪除</a>
            <a href="update_mes.php?id=<?php echo $arr['id']?>&no=<?php echo $arr['no']?>">編輯</a>
        <?php }?>
        </h4>
        <div class="card-body">
            <a class="card-title">作者：<?php echo $arr['id'];?></a>
            <p class="card-title">時間：<?php echo $arr['time'];?></p>
            <p>留言內容：</p>
            <?php echo $arr['content'];?>
            <hr/>
        </div>
    </div>
<?php
     }
?>