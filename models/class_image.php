<?php
	class Image
		extends AbstractModel{

			protected static $table = "image";

			public static function change($id, $id_user, $name_image, $path){

				$arr['id_user'] = $id_user;
				$arr['name_image'] = $name_image;
				$arr['path'] = $path;
				

				foreach ($arr as $key => $value) {
					if($value === null){
						unset($arr[$key]);
					}
				}
				
				return parent::update($id,$arr);

			}

			public static function upload($Files, $name = '', $id_user){

				$arr['id_user'] = $id_user;
				$arr['path'] = "/test/img/". parent::UploadFile($Files);
				$arr['name_image'] = basename($arr['path']);
				
				//var_dump($arr);die();
				if($name != null){$arr['name_image'] = $name; }

				return parent::insert($arr);
			}

			public static function getAll_forUser($id_user){
				$db = new db;
				$db->set_class_name(get_called_class());
				return $db->query('select * from '.static::$table.' where id_user=:id', [":id" => $id_user]);
			}
		}


?>