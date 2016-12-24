<?php
include __DIR__.'\config.php';

$user = new user();

if(isset($_POST['login']) && isset($_POST['password'])){
	$user->autorization($_POST['login'], $_POST['password']);
}
if(!$user->check_log()){
	header("Location: index.php");
	die();
}

include __DIR__.'\view\profile.php';

?>