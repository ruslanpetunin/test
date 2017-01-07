<?php
include __DIR__.'\config.php';

$this_page = new image_gallery_page();

if($this_page->user_identification()){
	$this_page->getData();
	$this_page->view();
}
else{
	die();
}



?>