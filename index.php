<?php
    include_once "db.php";
    session_start();
    if(empty($_SESSION["id"])==false){
?>
    <a>Hi!<?php echo $_SESSION["id"] ?></a>
    <a href="config.php?method=logout">登出</a>｜
    <a href="add_mes.php">新增留言</a>
    <hr/>
<?php }else{?>
    <a href="login.php">登入</a>｜
    <a href="signup.php">註冊</a>
    <hr/>
<?php }?>

<?php
    $sql = "SELECT * FROM `message＿board`";
    $result = mysqli_query($db , $sql) or die('MySQL query error');
    $row = mysqli_fetch_all($result);
    print_r($row);
    foreach($row AS $arr){
        echo "<br/>".$arr[0];
        echo "<br/>".$arr[1];
?>
    <div class="card">
        <h4 class="card-header">標題：<?php echo $row['title'];?>
        <?php if(@$_SESSION["id"]===$row['id']){?>
            <a href="mes.php?method=del&id=<?php echo $row['id']?>" class="btn btn-danger mybtn">刪除</a>
            <a href="update_mes.php?id=<?php echo $row['id']?>" class="btn btn-primary mybtn">編輯</a>
        <?php }?>
        </h4>
        <div class="card-body">
            <h5 class="card-title">作者：<?php echo $row['id'];?></h5>
            <p class="card-text">
                <?php echo $row['content'];?>
            </p>
            <hr/>
        </div>
    </div>
<?php
    }
?>