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
    if($_POST["search"]!=""){
        $sql = "SELECT * FROM `message＿board` WHERE id = '$_POST[search]' ";
    }else{
        $sql = "SELECT * FROM `message＿board`";
    }
    
    $result = mysqli_query($db , $sql) or die('MySQL query error');
    $row = mysqli_fetch_all($result);
    //print_r($row);
    foreach($row AS $arr){
?>
    <div class="card">
        <h4 class="card-header">標題：<?php echo $arr[1];?>
        <?php if(@$_SESSION["id"]===$arr[4]){?>
            <a href="mes.php?method=del&id=<?php echo $arr[4]?>&no=<?php echo $arr[0]?>">刪除</a>
            <a href="update_mes.php?id=<?php echo $arr[4]?>&no=<?php echo $arr[0]?>">編輯</a>
        <?php }?>
        </h4>
        <div class="card-body">
            <a class="card-title">作者：<?php echo $arr[4];?></a>
            <p class="card-title">時間：<?php echo $arr[3];?></p>
            <p class="card-text">
                <?php echo $arr[2];?>
            </p>
            <hr/>
        </div>
    </div>
<?php
    }
?>