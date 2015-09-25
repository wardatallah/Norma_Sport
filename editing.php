<?php
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

mysql_query("SET NAMES utf8;");
mysql_query("SET CHARACTER_SET utf8;");

$id=$_POST['id'];
$name=$_POST['name'];
$count=$_POST['count'];
$cost=$_POST['cost'];
$price=$_POST['price'];


if ($count >0 && $cost >0 && $price >0){
		$sql = "UPDATE products set `name` ='". $name ."' , `count` = '". $count ."' , `cost` = '". $cost ."' , `price` = '". $price ."' where `id` = ".$id ;
		mysql_query($sql,$conn);
		
		echo "<script type=\"text/javascript\">alert('تم تعديل البضاعة بنجاح !');
		window.location='products.php';
		</script>";
		
}
else {
	echo "<script type=\"text/javascript\">alert('حدث خطا! الرجاء التأكد من قيم الحقول');
	history.go(-1);
	</script>";
}


?>
