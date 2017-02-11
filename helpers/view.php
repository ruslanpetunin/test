<?php

namespace app\helpers;

	class view{

		protected $data = [];

		public function __set($key, $value){
			$this->data[$key] = $value;
		}

		public function __get($key){
			return $this->data[$key];
		}

		public function render($template){
			foreach ($this->data as $key => $value) {
				$$key = $value;
			}
		ob_start();
		include __DIR__ . '\..\view\\' . $template;
		$content = ob_get_contents(); 
		ob_end_clean();
		return $content;
		}
	}

?>