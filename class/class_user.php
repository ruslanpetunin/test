<?php

	class user{

		public function autorize($login){
			setcookie('user', $login, time()+3600);
			$_SESSION['user'] = $login;
			return true;
		}

		public function out(){
			setcookie('user', '', time()-55600);
			unset($_SESSION['user']);
			header('Location: index.php');
			die();
		}

		public function isLogin(){
			if(isset($_COOKIE['user'])){$_SESSION['user'] = $_COOKIE['user'];}
			if(isset($_GET['flag'])){return false;}
			return isset($_COOKIE['user'])||isset($_SESSION['user']);
		}
	}



?>