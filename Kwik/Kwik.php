<?php

namespace kwik;

require "Autoloader.php";

// Load default nodes
use kwik\nodes\HeaderNode;
use kwik\nodes\TextNode;
use kwik\nodes\EmphasisNode;

use kwik\Renderer;

class Kwik {

	protected static $data;

	public static function registerNode($class, $index){
		print_r($class);
	}

	public static function getNodes(){
		//$nodes = array(new TextNode($data));

		EmphasisNode::getNodes(static::$data);

		#print_r(preg_split("/\*((?!\*).+)\*/", static::$data, 2, 
		#	PREG_SPLIT_DELIM_CAPTURE));
	}

	public static function setContents($data){
		static::$data = $data;
	}

	public static function getHTML(){
		$nodes = static::getNodes();
		return Renderer::render($nodes);
	}

}

?>