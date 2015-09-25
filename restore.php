<?php
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

mysql_query("SET NAMES utf8;");
mysql_query("SET CHARACTER_SET utf8;");


$id=$_GET['id'];
$prod_id=$_GET['prod_id'];
$count=$_GET['count'];


$sql = "SELECT count FROM products where id=$prod_id";

$result = mysql_query($sql, $conn);

$row = mysql_fetch_array($result,MYSQL_NUM);

$oldCount=$row[0];
$newCount=$oldCount+$count;

$sql = "UPDATE products set `count` = '". $newCount ."' where `id` = ".$prod_id ;
mysql_query($sql,$conn);

$sql= "DELETE from sales where id=$id";
mysql_query($sql,$conn);

echo "<script type=\"text/javascript\">alert('تم استرجاع البضاعة بنجاح');
		window.location='total.php';
</script>";


?>
