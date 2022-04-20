<?php
include_once "db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>首頁</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" href="index.php" style="color:blue;">Home</a>
                </li>
            </ul>

            <form class="d-flex" action="index.php" method="POST">
                <input class="form-control me-2" type="search" id="search" placeholder="search" name="search"/>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            <?php if (empty($_SESSION["user_id"]) == false) {?>
            <div>Hi!
<?php
$loginid = $_SESSION["user_id"];
    global $db;
    $usql = $db->prepare("SELECT user_name FROM `user` WHERE user_no = :loginid");
    $usql->execute(array(
        'loginid' => $loginid,
    ));
    $urow = $usql->fetchColumn();
    echo $urow;
    ?>
            </div>
            <a class="nav-link" href="config.php?method=logout">登出</a>
            <?php } else {?>
                <a class="nav-link" href="signup.php">註冊</a>
                <a class="nav-link" href="login.php">登入</a>
            <?php }?>
        </div>
    </div>
    </nav>

    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="add_art.php">新增文章</a>
            </li>

        </ul>

<?php

if (@$_POST['search'] != "") {
    $search = '%' . $_POST['search'] . '%';
    $sql = $db->prepare("SELECT a.*,user_name FROM `article` a
    lEFT JOIN `user` u ON a.user_no=u.user_no
    WHERE user_name LIKE :search OR article_title LIKE :search OR update_time LIKE :search");
    $sql->execute(array(
        'search' => $search,
    ));
} else {
    $sql = $db->prepare("SELECT * FROM `article`");
    $sql->execute();
}
$row = $sql->fetchAll();

foreach ($row as $arr) {
    ?>
    <div>
        <?php if (empty($_SESSION["user_id"]) == false) {?>
            <a href="art_index.php?uid=<?php echo $arr['user_no'] ?>&artno=<?php echo $arr["article_no"] ?>&loginid=<?php echo $_SESSION["user_id"] ?>">
        <?php } else {?>
            <a href="art_index.php?uid=<?php echo $arr['user_no'] ?>&artno=<?php echo $arr["article_no"] ?>">
        <?php }?>
            文章標題：
            <?php echo $arr['article_title']; ?>
        </a>
        <a>作者：
<?php
$uid = $arr['user_no'];
    global $db;
    $authorsql = $db->prepare("SELECT user_name FROM `user` WHERE user_no = :uid");
    $authorsql->execute(array(
        'uid' => $uid,
    ));
    $authorrow = $authorsql->fetchColumn();
    echo $authorrow;
    ?>
        </a>
        <a>最後修改時間：<?php echo $arr['update_time']; ?></a>
        <?php if (@$_SESSION["user_id"] === $arr['user_no']) {?>
            <a href="update_art.php?uid=<?php echo $arr['user_no'] ?>&artno=<?php echo $arr["article_no"] ?>">編輯</a>
            <a href="art.php?method=del&uid=<?php echo $arr['user_no'] ?>&artno=<?php echo $arr["article_no"] ?>">刪除</a>
        <?php }?>

        <hr/>
    </div>
    <?php }?>
</body>
</html>