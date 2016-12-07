<?php
	
	

	function qdb($str){
		$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'ForImage';

	$connect = mysqli_connect($host, $user, $pass, $db);
	$res = mysqli_query($connect, $str);
	$arr = [];
	while($row = mysqli_fetch_array($res,MYSQLI_BOTH)){
		$arr[] = $row;
	}
	return $arr;
	}
?>