<?php
	
?>
<html>
<head>
<META content="text/html;charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Front page</title>

</head>
<body>
<span id="right">
<div class="tab-pane fade in active" id="smart-green-demo">
	<form action="insert_product.php" method="post" class="smart-green">
		<h1>إضافة بضاعة جديدة</h1>
		<p>
			<label>
				<input autocomplete="off" id="name" type="text" name="name" placeholder="اسم القطعة" required=true />
			</label>
			<label>
				<input autocomplete="off" id="name" type="text" name="count" placeholder="عدد القطع" required=true />
			</label>
			<label>
				<input autocomplete="off" id="name" type="text" name="cost" placeholder="سعر الجملة" required=true />
			</label>
			<label>
				<input autocomplete="off" id="name" type="text" name="price" placeholder="سعر المبيع" required=true />
			</label>
				<input type="submit" class="button" value="حفظ"/>
		</p>
	</form>
</div>
</span>
</body>
</html>
