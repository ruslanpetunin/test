<?php

	function __autoload($class){

		if(file_exists(__DIR__.'/class/class_'.$class.'.php')){
			include __DIR__.'/class/class_'.$class.'.php';
		}
		elseif(file_exists(__DIR__.'/models/class_'.$class.'.php')){
			include __DIR__.'/models/class_'.$class.'.php';
		}
	}

?>