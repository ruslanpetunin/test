<?php
session_start();
include __DIR__.'\..\config.php';

function isLogin(){
	$user = new user();
	return $user->isLogin();
}

function site_return($adress){
	header('Location: '.__DIR__.'\..\controls'.$adress);
	die();
}

function autorize($login,$pass){

	$db_users = new db();
	$row = [];
	$row = $db_users->query_db("select * from users where login='".$login."' and password='".$pass."';");
	
	if(isset($row[0]['login'])){
			$user = new user();
			return $user->autorize($login);
		}
	return false;
}

function User_Exit(){
	$user = new user();
	$user->out();
}
?>