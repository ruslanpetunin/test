<?php
include __DIR__.'\..\models\function_login.php';

if(isset($_GET['flag']) && $_GET['flag']==true){
	User_Exit();

	}

/*if(isLogin()){
	site_return('\profile_control.php');
}*/

include __DIR__.'\..\view\login.php';

?>