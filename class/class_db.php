<?php
	

	class db{

		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $db = 'ForImage';

			
			public function query_db($str){

				$connect = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
				$res = mysqli_query($connect, $str);
				$arr = [];
					
					while($row = mysqli_fetch_array($res,MYSQLI_BOTH)){
					$arr[] = $row;
				}	

				return $arr;
			}
	}
?>