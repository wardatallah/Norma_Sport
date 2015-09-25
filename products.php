<html dir="rtl">
<head>
<META content="text/html;charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Front page</title>
</head>
<body>
<span id="right">
<table id="mytable" cellspacing="0" summary="البضائع الموجودة">
<caption>البضائع الموجودة</caption>
<tr>
  <!--th scope="col" abbr="Configurations" class="nobg">Configurations</th-->
  <th scope="col" abbr="name">اسم القطعة</th>
  <th scope="col" abbr="count">عدد القطع</th>
  <th scope="col" abbr="price">سعر الجملة</th>
  <th scope="col" abbr="cost">سعر المبيع</th>
  <th scope="col" abbr="change"></th>
</tr>

<?php
	
	require_once("config.php");
	$conn = mysql_connect(HOST,USERNAME,PASSWORD);
	mysql_select_db(DATABASE_NAME,$conn);

	mysql_query("SET NAMES utf8;");
	mysql_query("SET CHARACTER_SET utf8;");
	$sql = "SELECT id,name,count,price,cost FROM products";

	$result = mysql_query($sql, $conn);
	//get row data as an associative array
	
	while ($row = mysql_fetch_array($result,MYSQL_NUM)){
		echo "<tr>";
		
		$prod_id=$row[0];
		$name=$row[1];
		$count=$row[2];
		$price=$row[3];
		$cost=$row[4];
		
		
		echo "<td>".$name."</td>";
		echo "<td>".$count."</td>";
		echo "<td>".$cost."</td>";
		echo "<td>".$price."</td>";
		echo "<td><a href='edit.php?id=$prod_id&name=$name&count=$count&cost=$cost&price=$price'>تعديل</a></td>";
		echo "</tr>";
	}
	?>
</table>
</span>
</body>
</html>
