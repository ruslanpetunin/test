<?php
session_start();

class user{

	protected $id;
	protected $login;
	protected $password;

	public function check_log(){
		if(isset($_GET['check_out'])){return false;}
		if(isset($_COOKIE['user'])){$_SESSION['user'] = $_COOKIE['user'];}
		return isset($_SESSION['user']);
	}

	public static function getMyId(){
		$db = new db();
		$db->set_class_name(get_called_class());
		$me = $db->query("select id from users where login=:log", [":log" => $_SESSION['user']]);
		return $me[0]->id;
	}

	public function autorization($login, $password){

		$db = new db();
		$result = [];
		$db->set_class_name(get_called_class());
		$user = $db->query("select * from users where login=:log and password=:pass",[':log' => $login, ':pass' => $password]);
		
		if(isset($user[0]->login)){
			setcookie('user', $login, time()+3600000);
			$_SESSION['user'] = $login;
			return true;
		}
		else{return false;}
	
	}

	public function out(){
		unset($_SESSION['user']);
		setcookie('user', '', time()-3600000);
	}
}

?>