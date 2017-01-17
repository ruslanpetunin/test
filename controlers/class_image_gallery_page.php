<?php
	
	class image_gallery_page{
		protected $page;

		public function __construct(){
			$this->page = new view();
		}

		public function user_identification(){
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

		public function getData(){

			if(isset($_FILES['image'])){
				$image = new Image();
				$image->path = "/test/img/" . $image::UploadFile($_FILES['image']);
				$image->id_user = User::getMyId();
				if($_POST['name_image']!=''){$image->name_image = $_POST['name_image'];}
				$image->save();}
			
			$this->page->Images = Image::getAll_forUser(User::getMyId());
			$this->page->UserName = $_SESSION['user'];
		}

		public function view(){
		
			echo $this->page->render('profile.php');

		}
	}
?>