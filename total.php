<html dir="rtl">
<head>
<META content="text/html;charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Front page</title>
<script language="Javascript" >
	function changeDate(){
		mon=document.F2.month.value;
		year=document.F2.year.value;
		url='total.php?month='+mon+'&year='+year;
		window.location=url;
	}
</script>

<?php
function isSelectedMonth($num){
	$defMonth=date("m");
	
	if (!isset($_GET['month'])){
		if ($defMonth==$num)
			echo "selected";
	}
	else if (isset($_GET['month']))
	{
		if ($_GET['month']==$num)
			echo "selected";
	}
	else if ($num=="00")
		echo "selected";
}

function isSelectedYear($num){
	$defYear=date("Y");
	if (!isset($_GET['year'])){
		if ($defYear==$num)
			echo "selected";
	}
	else if (isset($_GET['year']))
	{
		if ($_GET['year']==$num)
			echo "selected";
	}
}
?>
</head>
<body>
<span id="right">

<table id="mytable" cellspacing="0" summary="جرد البضائع المباعة">
<caption>جرد البضائع المباعة
<form action="" method="post" name="F2" style="float:left;">
	<label>السنة:</label>
	<select name="year" onchange="changeDate()" style="font-size: large">
		<option value='2015' <?php isSelectedYear("2015")?> >2015</option>
		<option value='2016' <?php isSelectedYear("2016")?> >2016</option>
		<option value='2017' <?php isSelectedYear("2017")?> >2017</option>
		<option value='2018' <?php isSelectedYear("2018")?> >2018</option>
		<option value='2019' <?php isSelectedYear("2019")?> >2019</option>
		<option value='2020' <?php isSelectedYear("2020")?> >2020</option>
		<option value='2021' <?php isSelectedYear("2021")?> >2021</option>
		<option value='2022' <?php isSelectedYear("2021")?> >2022</option>
	</select>
	<label>الشهر:</label>
	<select name="month" onchange="changeDate()" style="font-size: large">
		<option value='00' <?php isSelectedMonth("00")?> >الكل</option>
		<option value='01' <?php isSelectedMonth("01")?> >كانون الثاني</option>
		<option value='02' <?php isSelectedMonth("02")?> >شباط</option>
		<option value='03' <?php isSelectedMonth("03")?> >آذار</option>
		<option value='04' <?php isSelectedMonth("04")?> >نيسان</option>
		<option value='05' <?php isSelectedMonth("05")?> >أيار</option>
		<option value='06' <?php isSelectedMonth("06")?> >حزيران</option>
		<option value='07' <?php isSelectedMonth("07")?> >تموز</option>
		<option value='08' <?php isSelectedMonth("08")?> >آب</option>
		<option value='09' <?php isSelectedMonth("09")?> >أيلول</option>
		<option value='10' <?php isSelectedMonth("10")?> >تشرين الأول</option>
		<option value='11' <?php isSelectedMonth("11")?> >تشرين الثاني</option>
		<option value='12' <?php isSelectedMonth("12")?> >كانون الأول</option>
	</select>
</form>
</caption>
<tr>
  <!--th scope="col" abbr="Configurations" class="nobg">Configurations</th-->
  <th scope="col" abbr="name">اسم القطعة</th>
  <th scope="col" abbr="count">عدد القطع</th>
  <th scope="col" abbr="customer_name">اسم الزبون</th>
  <th scope="col" abbr="date">التاريخ</th>
  <th scope="col" abbr="gain">الربح</th>
  <th scope="col" abbr="restore"></th>
</tr>

<?php
	
	require_once("config.php");
	$conn = mysql_connect(HOST,USERNAME,PASSWORD);
	mysql_select_db(DATABASE_NAME,$conn);

	mysql_query("SET NAMES utf8;");
	mysql_query("SET CHARACTER_SET utf8;");
	$defMonth=date("m");
	$defYear=date("Y");
	
	
	if(!isset($_GET['month'])&&!isset($_GET['year'])){ // لا شيء محدد
		$monthPlus=$defMonth+1;
		$sql = "SELECT prod_id,count,customer_name,id,date FROM sales where `date` BETWEEN '$defYear-$defMonth-01' and '$defYear-$monthPlus-01'";
	}
	else if (isset($_GET['month'])&&!isset($_GET['year'])){ // الشهر محدد فقط
		$month=$_GET['month'];
		if($month=='00'){ // الشهر محدد على خيار الكل
			$sql = "SELECT prod_id,count,customer_name,id,date FROM sales where `date` LIKE '$defYear-%-%'";
		}
		else {
		$monthPlus=$month+1;
		$sql = "SELECT prod_id,count,customer_name,id,date FROM sales where `date` BETWEEN '$defYear-$month-01' and '$defYear-$monthPlus-01'";
		}
	}
	else if (!isset($_GET['month'])&&isset($_GET['year'])){ // السنة محددة فقط
		$year=$_GET['year'];
		
		$sql = "SELECT prod_id,count,customer_name,id,date FROM sales where `date` LIKE '$year-%-%";
	}
	else if (isset($_GET['month'])&&isset($_GET['year'])){ 
		$month=$_GET['month'];
		$year=$_GET['year'];
		
		$monthPlus=$month+1;
		if($month=='00'){ // الشهر محدد على خيار الكل
			$sql = "SELECT prod_id,count,customer_name,id,date FROM sales where `date` LIKE '$year-%-%'";
		}
		else{
		$sql = "SELECT prod_id,count,customer_name,id,date FROM sales where `date` BETWEEN '$year-$month-01' and '$year-$monthPlus-01'";
		}
	}
	
	
	$result = mysql_query($sql, $conn);
	//get row data as an associative array
	$total=0;
	if ($result!=null)
	while ($row = mysql_fetch_array($result,MYSQL_NUM)){
		echo "<tr>";
		
		$prod_id=$row[0];
		$count=$row[1];
		$customer=$row[2];
		$id=$row[3];
		$date=$row[4];
		
		$newsql="SELECT cost,price,name from products where id=$prod_id";
		mysql_query("SET NAMES utf8;");
		mysql_query("SET CHARACTER_SET utf8;");
		$result1 = mysql_query($newsql,$conn);
		
		$row1 = mysql_fetch_array($result1, MYSQL_NUM);
		
		$gain=$row1[1]-$row1[0];
		$allgain=$gain*$count;
		$total=$total+$allgain;
		$name=$row1[2];
		
		echo "<td>".$name."</td>";
		echo "<td>".$count."</td>";
		echo "<td>".$customer."</td>";
		echo "<td>".$date."</td>";
		echo "<td>".$allgain."</td>";
		echo "<td><a href='restore.php?id=$id&prod_id=$prod_id&count=$count' >استرجاع</a></td>";
		echo "</tr>";
		
	}
		echo "<tr><td class='totalgain' ><b>الربح الكلي</td></b></td>";
		echo "<td class='totalgain' colspan='5'><b>".$total."</b></td></tr>";
		
	?>
</table>
</span>
</body>
</html>
