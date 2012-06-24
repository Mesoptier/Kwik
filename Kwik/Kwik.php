<?php

namespace kwik;

require "Autoloader.php";

use kwik\Autoloader;
use kwik\Lexer;

class Kwik {

	public static function getHTML($data){
		print_r(Lexer::tokenize($data));
	}

}

?>