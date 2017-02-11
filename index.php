<?php

include __DIR__.'\autoload.php';

use app\models\user;


$user = new user();
$flag_user = false;

if(user::is_login()){
	$flag_user = true;
}
elseif(!empty($_POST['login']) && !empty($_POST['password'])){
	$flag_user = true;
	$user->login = $_POST['login'];
	$user->password = $_POST['password'];
	if(!$user->autorization()){
	$flag_user = false;
}
}
else{
	$flag_user = false;		
}

if($flag_user === true){
	$controller = isset($_GET['controller'])? $_GET['controller'] : 'user';
	$action = isset($_GET['action'])? $_GET['action'] : 'profile';}
else{
	$controller = 'user';
	$action = 'login';
}

$action = 'action'.$action;
$controller = 'app\controllers\\'.$controller;
$page = new $controller;
$page->$action();
?>