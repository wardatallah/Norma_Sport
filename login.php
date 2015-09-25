<?php
session_start();

$user=$_POST['name'];
$pass=md5($_POST['pass']);
$isLogin="null";
if ( strcmp ( $user , "admin" )==0 && strcmp ( $pass , "21232f297a57a5a743894a0e4a801fc3" )==0){
		$isLogin="good";
	}
else {
		$isLogin="bad";

	}
$_SESSION['login']=$isLogin;


header('Location: index.php');
?>
