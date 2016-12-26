<?php

	class start_page{

		function autorization_user(){
			$user = new user;

			if(isset($_GET['check_out'])){
			$user->out();
			}elseif($user->check_log()){
			header("Location: /test/profile.php");
			die();
			}

			return false;
		}

		function view(){
			$page = new view();
			echo $page->render("index.php");
		}
	}

?>