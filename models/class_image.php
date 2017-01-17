<?php
	class Image
		extends AbstractModel 
			implements Iterator{

			protected static $table = "image";
			protected $data = [];
			protected $keys = [];
			protected $number = 0;

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

			public function save(){

				if(!isset($this->name_image)){$this->name_image = explode('.', basename($this->path))[0];}
				return parent::insert($this->data);
			}

			public static function getAll_forUser($id_user){
				$db = new db;
				$db->set_class_name(get_called_class());
				return $db->query('select * from '.static::$table.' where id_user=:id', [":id" => $id_user]);
			}
		}


?>