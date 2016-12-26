<?php
include __DIR__.'\config.php';

	$this_page = new start_page();
	if(!$this_page->autorization_user()){
		$this_page->view();
	}
	else{
		die();
	}


?>