<?php
session_start();
include __DIR__.'\function_db.php';
function isLogin(){
	if(isset($_COOKIE['user'])){$_SESSION['user'] = $_COOKIE['user'];}
	return isset($_COOKIE['user'])||isset($_SESSION['user']);
}

function site_return($adress){
	header('Location: '.__DIR__.'\..\controls'.$adress);
	die();
}

function autorize(){
	if($_POST['login'] == ''||$_POST['password'] == ''){
		return false;
	}

	//запрос к бд
	
	if(empty($row) && $row['login']==$_POST['login']){
			setcookie('user', $_POST['login'], time()+3600);
			$_SESSION['user'] = $_POST['login'];
			return true;
		}
	

	return false;
}

function User_Exit(){
	setcookie('user', '', time()-55600);
	unset($_SESSION['user']);
}
?>