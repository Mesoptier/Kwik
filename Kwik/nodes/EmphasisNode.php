<?php

namespace kwik\nodes;

use kwik\Node;

class EmphasisNode extends Node {

	public static function init(){
		static::$regex = '/(([_*])+)((?:(?!(?<!\\\)\2).)+)(?<!\\\)\1/';
		static::$regexCaptureCount = 3;
	}

	public function render(){
		
	}

	function __construct(){

	}

}

EmphasisNode::init();

?>