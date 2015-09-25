<html dir="rtl">
<head>
<META content="text/html;charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Front page</title>

</head>
<body>
<span id="main">
<div class="tab-pane fade in active" id="smart-green-demo">
<form action="buy.php" method="post" class="smart-green" name="F1">
    <h1>فاتورة بيع </h1>
    
     <label>
        <span>اسم القطعة</span><select name="id" >
		<option value='none'></option>
        <?php
		
		require_once("config.php");
		$conn = mysql_connect(HOST,USERNAME,PASSWORD);
		mysql_select_db(DATABASE_NAME,$conn);

		mysql_query("SET NAMES utf8;");
		mysql_query("SET CHARACTER_SET utf8;");
		$sql = "SELECT id,name FROM products where count > 0";

		$result = mysql_query($sql, $conn);
		//get row data as an associative array
		
		while ($row = mysql_fetch_array($result,MYSQL_NUM)){

		echo "<option value='$row[0]' >$row[1]</option>";
		
		}
		
		?>
        </select>
    </label>
	<label>
        <span>العدد</span>
        <input type="number" id="name" name="count" autocomplete="off" min="1" value="1" required=true />
    </label>
	<label>
        <span>اسم الزبون</span>
        <input type="text" id="name" name="customer_name" autocomplete="off" />
    </label>
     <label>
        <span>&nbsp;</span> 
        <input type="submit" class="button" value="إضافة" /> 
    </label>    
</form>
</div>
</span>
</body>
</html>
