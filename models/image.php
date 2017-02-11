<?php

namespace app\models;

use app\helpers\db;
use app\helpers\AbstractModel;

	class Image
		extends AbstractModel 
			implements \Iterator{

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

			public function save(){
				if(!isset($this->data['id'])){
					parent::insert($this->data);
				}
				else{
					$id = $this->data['id'];
					unset($this->data['id']);
					foreach ($this->keys as $key => $value) {
						if($value == 'id'){unset($this->keys[$key]);}
					}
					parent::update($id, $this->data);
				}
			}

			public static function getAll_forUser($id_user){
				return parent::selectWhere(['id_user' => $id_user]);
			}
		}


?>