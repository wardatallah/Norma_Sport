<?php 
session_start();
?>
<html>
<head>
<META content="text/html;charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<link rel="shortcut icon" href="./images/logoIcon.png"></link>
<title>Shop</title>

<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
<script type="text/javascript">
var currnav;


function goTo(inp,here){
    $('#prev').attr('src', here);
	if (currnav != undefined) {
			currnav.setAttribute("class", "button");
		}
		inp.setAttribute("class", "button-selected");
		currnav = inp;
}

</script>
</head>
<body>
<header>
	<div id="head">
		<img src="images/logo.png" width="100px" height="100px" style="float:left;margin:10px;" />
		<span id="site_name">سبورات نورما</span>
	</div>
</header>
<div class="leftSection">
	<div class="tab-pane fade in active" id="smart-green-demo">
		<iframe width="98%" height="100%" scrolling="auto" id="prev" src="bg.html">
		</iframe>
	</div>
</div>
<div class="rightSection">
	<?php
	if(isset($_SESSION['login'])==1 ){
		$isLogin=$_SESSION['login'];
	
	if ($isLogin=="bad")
	echo '<div class="tab-pane fade in active" id="smart-green-demo">
	<form action="login.php" method="post" class="smart-green">
		<h1>تسجيل الدخول</h1>
		<p>
			<label>
				<span style="color:#F00;font-size:15px;">خطأ في اسم المستخدم أو كلمة المرور</span>
				<input id="name" type="text" name="name" placeholder="اسم المستخدم"/>
			</label>
			<label>
				<input id="email" type="password" name="pass" placeholder="كلمة المرور"/>
			</label>
				<input type="submit" class="button" value="تسجيل الدخول"/>
		</p>
	</form>
	</div>';
	elseif ($isLogin=="good")
		echo '
			<div class="tab-pane fade in active" id="smart-green-demo">
				<form action="" method="post" class="smart-green">
					<h1>الخيارات</h1>
						<input type="button" class="button" value="بيع" onClick="goTo(this,\'customer.php\')"/>
						<input type="button" class="button" value="إضافة بضاعة جديدة" onClick="goTo(this,\'new_product.php\')"/>
						<input type="button" class="button" value="جرد البضائع المباعة" onClick="goTo(this,\'total.php\')"/>
						<input type="button" class="button" value="البضائع الموجودة" onClick="goTo(this,\'products.php\')"/>
						<a class="logout" href="logout.php">تسجيل الخروج</a>
				</form>
					
			</div>
		';
		}
	else
	echo '<div class="tab-pane fade in active" id="smart-green-demo">
	<form action="login.php" method="post" class="smart-green">
		<h1>تسجيل الدخول</h1>
		<p>
			<label>
				<input id="name" type="text" name="name" placeholder="اسم المستخدم"/>
			</label>
			<label>
				<input id="email" type="password" name="pass" placeholder="كلمة المرور"/>
			</label>
				<input type="submit" class="button" value="تسجيل الدخول"/>
		</p>
	</form>
	</div>';
	?>
</div>
</body>
</html>
