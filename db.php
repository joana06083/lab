<?php
$dbms='mysql';     //資料庫類型
$servername='localhost'; //資料庫IP
$dbname='message'; //資料庫
$username='root';      //連接帳號
$password='';          //密碼
$dsn="$dbms:host=$servername;dbname=$dbname";

try {
  // $db = new PDO($dsn, $username, $password); //初始化PDO物件
  // $db = null;
  //資料庫長連結，需要最後加上個參數：array(PDO::ATTR_PERSISTENT => true) 
  $db = new PDO($dsn, $username, $password, array(PDO::ATTR_PERSISTENT => true));
  // echo "Connected successfully！ \n";
  
} catch (PDOException $e) {
  die ("Error!: " . $e->getMessage() . "<br/>");
}


?>