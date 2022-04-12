<?php
    include_once "db.php";
    session_start();
    $sql = "SELECT * FROM `message_board`";
	$result = mysqli_query($con , $sql) or die('MySQL query error');
?>
<?php if(isset($_SESSION["id"])){?>
    <a href="config.php?method=logout">登出</a>
    <a href="add_mes.php">新增留言</a>
<?php }else{?>
    <a href="login.php">登入</a>
    <a href="signup.php">註冊</a>
<?php }?>

<?php
    while($row = mysqli_fetch_array($result)){
?>
    <div class="card">
        <h4 class="card-header">標題：<?php echo $row['title'];?>
        <?php if(@$_SESSION["id"]===$row["uid"]){?>
            <a href="mes.php?method=del&id=<?php echo $row["id"]?>" class="btn btn-danger mybtn">刪除</a>
            <a href="update_mes.php?id=<?php echo $row["id"]?>" class="btn btn-primary mybtn">編輯</a>
        <?php }?>
        </h4>
        <div class="card-body">
            <h5 class="card-title">作者：<?php echo $row["uid"];?></h5>
            <p class="card-text">
                <?php echo $row["content"];?>
            </p>
        </div>
    </div>
<?php
    }
?>