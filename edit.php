<?php
$id=$_GET['id'];
$name=$_GET['name'];
$count=$_GET['count'];
$cost=$_GET['cost'];
$price=$_GET['price'];

?>
<html dir="rtl">
<head>
<META content="text/html;charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Front page</title>

</head>
<body>
<span id="right">
<div class="tab-pane fade in active" id="smart-green-demo">
	<form action="editing.php" method="post" class="smart-green">
		<h1>تعديل بضاعة</h1>
		<p>
			<label>
				<input hidden autocomplete="off" id="name" type="text" name="id" placeholder="رقم القطعة" value="<?php echo $id ?>" required=true />
			</label>
			<label>اسم القطعة
				<input autocomplete="off" id="name" type="text" name="name" placeholder="اسم القطعة" value="<?php echo $name ?>" required=true />
			</label>
			<label>عدد القطع
				<input autocomplete="off" id="name" type="text" name="count" placeholder="العدد"  value="<?php echo $count ?>" required=true />
			</label>
			<label>سعر الجملة
				<input autocomplete="off" id="name" type="text" name="cost" placeholder="سعر الجملة"  value="<?php echo $cost ?>" required=true />
			</label>
			<label>سعر المبيع
				<input autocomplete="off" id="name" type="text" name="price" placeholder="سعر المبيع"  value="<?php echo $price ?>" required=true />
			</label>
				<input type="submit" class="button" value="حفظ"/>
		</p>
	</form>
</div>
</span>
</body>
</html>
