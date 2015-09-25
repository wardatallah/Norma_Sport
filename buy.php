<?php
echo '<html dir="rtl">';
require_once("config.php");
$conn = mysql_connect(HOST,USERNAME,PASSWORD);
mysql_select_db(DATABASE_NAME,$conn);

mysql_query("SET NAMES utf8;");
mysql_query("SET CHARACTER_SET utf8;");

$id=$_POST['id'];
$count=$_POST['count'];
$customer=$_POST['customer_name'];
$cur_date=date('Y-m-d');
if ($id!="none"){
$newsql="SELECT count from products where id=$id";
$result1 = mysql_query($newsql,$conn);		
$row1 = mysql_fetch_array($result1, MYSQL_NUM);

if($count<=$row1[0]){
$sql = "insert into sales (prod_id,count,date,customer_name) values ($id,$count,'$cur_date','$customer')";


$result = mysql_query($sql, $conn);

$newsql="SELECT count from products where id=$id";
$result1 = mysql_query($newsql,$conn);		
$row1 = mysql_fetch_array($result1, MYSQL_NUM);

$newCount=$row1[0]-$count;

$sql2 = "UPDATE products set `count` ='". $newCount ."' where `id` = ".$id ;
mysql_query($sql2);

echo "<script type=\"text/javascript\">alert('تم !');
		window.location='customer.php';
		</script>";

}
else {
	echo "<script type=\"text/javascript\">alert('خطأ ! عدد القطع المدخلة أكبر من المتوفر (الأعظمي $row1[0])');
		history.go(-1);
		</script>";
	
}
}
else {
	echo "<script type=\"text/javascript\">alert('لم تقم بتحديد اسم القطعة !');
		history.go(-1);
		</script>";
	
}

echo '</html>';
?>
