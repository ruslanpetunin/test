<?php
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

		public static function insert($array){

			$db = new db();
			$db->set_class_name(get_called_class());
			/*$query1 = "insert into ".static::$table." (";
			$query2 = ' values (';
			$lookup = [];

			foreach ($array as $key => $value) {
				$query1 = $query1." ".$key.",";
				$query2 = $query2." '".$value."',";
				$lookup[":".$key] = $value;
			}
			$query1 = substr($query1, 0, strlen($query1)-1);
			$query2 = substr($query2, 0, strlen($query2)-1);
			$query1 =$query1.")";
			$bary = $query1.$query2.")";*/
			$lookup = [];

			foreach ($array as $key => $value) {

				$lookup[":".$key] = $value;
			}

			$query ="insert into ". static::$table ." (".implode(', ', array_keys($array)).") values (".implode(", ", array_keys($lookup)).");";
	
			return $db->query($query,$lookup);
		}

		public static function update($id, $array){

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
			
			/*
			return $db->query("update ".static::$table." set path=:path where id=:id",[":path" => "авыаывп", ":id" => $id]);*/
			}
	}
?>