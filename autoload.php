<?php

	function __autoload($class){

	    $path = explode('\\', $class);
	    $path[0] = __DIR__;
	    if(file_exists(implode(DIRECTORY_SEPARATOR, $path).'.php')){
	        include implode(DIRECTORY_SEPARATOR, $path).'.php';
        }}

?>