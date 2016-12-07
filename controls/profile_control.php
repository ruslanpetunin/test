<?php
include __DIR__.'\..\models\function_login.php';

if(isset($_POST['login'])&&isset($_POST['password'])){
autorize($_POST['login'],$_POST['password']);}

if(!isLogin()){

	site_return('\index.php');
}


include __DIR__.'\..\view\profile.php';

?>