<?php

namespace kwik;

require "Autoloader.php";

use kwik\Autoloader;
use kwik\Parser;

class Kwik {

	public static function getHTML($data){
		$nodes = Parser::getBlockNodes($data);
		foreach ($nodes as $node){
			if ($node)
				echo $node->getHTML();
		}
	}

}

?>