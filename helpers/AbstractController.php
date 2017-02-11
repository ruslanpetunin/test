<?php
namespace app\helpers;


class AbstractController{

	public function render($file, $arr){

		$view = new view();
			foreach ($arr as $key => $value) {
			$view->$key = $value;
			}
			echo $view->render($file);
	}

	public function redirect($controller, $action){
		header('Location: '. '/test/index.php?controller='.$controller.'&action='.$action);
		die;
	}
}

?>