<?php

namespace app\helpers;

use app\helpers\db;

	abstract class AbstractModel{
		protected static $table;

		public static function getAll(){

			$db = new db();
			$db->set_class_name(get_called_class());
			return $db->query("select * from ".static::$table);
		}

		public static function UploadFile($Files){
			$code = rand(1000000,9999999);
			$newName = __DIR__.'\..'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$code.basename($Files['name']);
			if(is_uploaded_file($Files['tmp_name'])){
				$res = move_uploaded_file($Files['tmp_name'], $newName);
			}
			if($res){
				return $code.basename($Files['name']);
			}
		}

		public static function getOne($id){

			$db = new db();
			$db->set_class_name(get_called_class());
			return $db->query("select * from ".static::$table." where id=".$id)[0];
		}


		public function selectWhere($arr){
			if(is_array($arr)){
				$db = new db();
				$db->set_class_name(get_called_class());
				$lookup = [];
				$query = "select * from ".static::$table." where ";
				$i = 1;
				$len = count($arr);

				foreach ($arr as $key => $value) {

					$lookup[":".$key] = is_string($value)?"'".$value."'" : $value;

					if($i<$len){
							$query .= $key."=".$lookup[':'.$key]." and ";
						}
					else{
							$query .= $key."=".$lookup[':'.$key];
						}
					$i++;
				}
			
				return $db->query($query, $lookup);
				
			}
			else{return false;}
		}

		public function insert($array){

			$db = new db();
			$db->set_class_name(get_called_class());
			$lookup = [];

			foreach ($array as $key => $value) {

				$lookup[":".$key] = $value;
			}

			$query ="insert into ". static::$table ." (".implode(', ', array_keys($array)).") values (".implode(", ", array_keys($lookup)).");";
	
			return $db->query($query,$lookup);
		}



		public function update($id, $array){

			if(!is_array($array) || count($array)==0 ){return false;}
			$db = new db();
			$db->set_class_name(get_called_class());
			$query = "update ".static::$table." set";
			$lookup = []; 

			foreach ($array as $key => $value) {
				$query = $query." ".$key."=:".$key.",";
				$lookup[":".$key] = $value;
			}

			$query = substr($query, 0, strlen($query)-1);
			$query = $query." where id=:id";
			$lookup[':id'] = $id;
			$db->query($query, $lookup);

			return true;
			
			}
	}
?>