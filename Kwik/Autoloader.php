<?php

namespace kwik;

class Autoloader {

	static function loadClass($className){
		require __DIR__ . '/' . 
			str_replace(__NAMESPACE__ . '/' , '', 
				str_replace('\\', '/', $className)) . '.php';
	}

}

spl_autoload_register(__NAMESPACE__ . '\Autoloader::loadClass');

?>