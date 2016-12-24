<?php
include __DIR__.'\config.php';

$user = new user;

if(isset($_GET['check_out'])){
	$user->out();
}elseif($user->check_log()){
	header("Location: profile.php");
	die();
}

include __DIR__.'\view\index.php';

?>