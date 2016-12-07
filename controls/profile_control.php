<?php
include __DIR__.'\..\models\function_login.php';
//var_dump(isLogin());
autorize();
if(!isLogin()){

	site_return('\index.php');
}


include __DIR__.'\..\view\profile.php';

?>