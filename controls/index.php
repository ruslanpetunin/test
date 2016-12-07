<?php
include __DIR__.'\..\models\function_login.php';


var_dump(isLogin());
if(isLogin()){
	site_return('\profile_control.php');
}
if(isset($_GET['flag']) && $_GET['flag']==true){
setcookie('user', '', time()-55600);
	unset($_SESSION['user']);}

	var_dump($_SESSION['user']);
	var_dump($_COOKIE['user']);
include __DIR__.'\..\view\login.php';


	/*$arr = [];
	$arr = qdb("select * from users where login='Rusik' and password='12345678';");
	var_dump($arr);*/
?>