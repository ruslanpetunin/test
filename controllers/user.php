<?php
namespace app\controllers;

use app\helpers\AbstractController;
use app\models\Image;

class user
	extends AbstractController{

		public function actionLogin(){
			return $this->render('index.php',[]);
		}

		public function actionProfile(){
			$user = \app\models\user::is_login();
			$UserName = $user->login;
			$Images = Image::getAll_forUser($user->id);
			
			return $this->render('profile.php', ['UserName' => $UserName, 'Images' => $Images]);

		}

		public function actionLogout(){
			\app\models\user::Logout();
			return $this->redirect('user', 'login');
		}

		public function actionUploadImage(){

			if(!empty($_FILES['image'])){

				$Image = new Image();
				$user = \app\models\user::is_login();
				$Image->id_user = $user->id;
				$Image->name_image = !empty($_POST['name_image'])?$_POST['name_image'] : 'Неизвестный';				
				$Image->path = '/test/img/'.$Image::UploadFile($_FILES['image']);
				$Image->save();
				


			}
			return $this->redirect('user', 'profile');
		}
	}
?>