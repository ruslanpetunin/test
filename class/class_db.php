<?php
	

	class db{

		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $db = 'ForImage';
		private $class_name;
		private $connection;

			public function __construct(){
				$dsn = 'mysql:dbname='.$this->db.';host='.$this->host;
				$this->connection = new Pdo($dsn, $this->user, $this->pass);
			}

			
			public function query($query,$arr = []){
				
				$sth = $this->connection->prepare($query);
				$sth->execute($arr);		
				$result = $sth->fetchAll(Pdo::FETCH_CLASS, $this->class_name);
				
				return $result;
			}
			public function set_class_name($name){
				$this->class_name = $name;
			}
	}
?>