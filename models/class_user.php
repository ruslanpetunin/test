<?php
session_start();

class user{

	function check_log(){
		if(isset($_GET['check_out'])){return false;}
		if(isset($_COOKIE['user'])){$_SESSION['user'] = $_COOKIE['user'];}
		return isset($_SESSION['user']);
	}

	function autorization($login, $password){
		$db = new db();
		$result = [];
		$result = $db->query_db("select * from users where login='".$login."' and password='".$password."'");
		if(isset($result[0]['login'])){
			setcookie('user', $login, time()+3600000);
			$_SESSION['user'] = $login;
			return true;
		}
		else{return false;}
	}

	function out(){
		unset($_SESSION['user']);
		setcookie('user', '', time()-3600000);
	}
}

?>