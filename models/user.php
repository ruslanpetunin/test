<?php
namespace app\models;

use app\helpers\AbstractModel;

session_start();

class user 
		extends AbstractModel
			implements \Iterator{

			protected static $table = 'users';
			protected $data = [];
			protected $keys = [];
			protected $number = 0;

			public function is_login(){
				if(isset($_SESSION['id'])){
					if($_SESSION['id'] === false){
						unset($_SESSION['id']);
						setcookie('id', '', time()-360000);
					return false;
					}
					else{
						return parent::getOne($_SESSION['id']);
					}
				}
				elseif(isset($_COOKIE['id'])){
					$_SESSION['id'] = $_COOKIE['id'];
					return parent::getOne($_SESSION['id']);
				}
				else{
					return false;
				}
			}

			public static function Logout(){
				$_SESSION['id'] = false;
				return true;
			}	


			public function autorization(){
				$login = isset($this->data['login'])? $this->data['login'] : null;
				$pass = isset($this->data['password'])? $this->data['password'] : null;

				if($user = $this->selectWhere(['login' => $login, 'password' => $pass])[0]){
					$_SESSION['id'] = 1;
			 		setcookie('id', 1, time()+3600);
			 		return true;
				}
				else{
					return false;
				}	 	
			 }

			 public function __construct(){
			 	 
			 }
			
			 public function __set($k, $v){

				$this->data[$k] = $v;
				$this->keys[] = $k;
			}

			public function __get($key){

				return $this->data[$key];
			}

			public function __isset($key){
				return isset($this->data[$key]);
			}

			public function current(){
				return $this->data[$this->keys[$this->number]];
			}

			public function key(){
				return $this->keys[$this->number];
			}

			public function next(){
				$this->number++;
			}

			public function rewind(){
				$this->number=0;
			}

			public function valid(){
				return isset($this->keys[$this->number]);
			}
		}

?>