<?php
session_start();
include __DIR__.'\function_db.php';
function isLogin(){
	if(isset($_COOKIE['user'])){$_SESSION['user'] = $_COOKIE['user'];}
	if(isset($_GET['flag'])){return false;}
	return isset($_COOKIE['user'])||isset($_SESSION['user']);
}

function site_return($adress){
	header('Location: '.__DIR__.'\..\controls'.$adress);
	die();
}

function autorize($login,$pass){
	if($login == ''||$pass == ''){
		return false;
	}

	//запрос к бд
	
	$row = [];
	$row = qdb("select * from users where login='".$login."' and password='".$pass."';");
	
	
	if(isset($row[0]['login'])){
			setcookie('user', $login, time()+3600);
			$_SESSION['user'] = $login;
			return true;
		}
	

	return false;
}

function User_Exit(){
	setcookie('user', '', time()-55600);
	unset($_SESSION['user']);
	header('Location: index.php');
	die();
}
?>