<?php
include __DIR__.'\..\models\function_login.php';


autorize($_POST['login'],$_POST['password']);
echo __FILE__;
if(!isLogin()){

	site_return('\index.php');
}


include __DIR__.'\..\view\profile.php';

?>