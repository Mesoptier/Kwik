<?php

namespace kwik;

abstract class Node {

	protected static $regex;
	protected static $regexCaptureCount;

	public function getNodes($data){
		$cap = preg_split(static::$regex, $data, -1, PREG_SPLIT_DELIM_CAPTURE);
		
	}

	abstract protected static function init();
	abstract public function render();
	
}

?>