<?php
	
	class image_gallery_page{

		function user_identification(){
			$user = new user();

			if(isset($_POST['login']) && isset($_POST['password'])){
			$user->autorization($_POST['login'], $_POST['password']);
			}
			if(!$user->check_log()){
			header("Location: /test/index.php");
			die();
			}
			return true;
		}

		function view(){
			$page = new view();
			$page->UserName = $_SESSION['user'];
			echo $page->render('profile.php');

		}
	}
?>