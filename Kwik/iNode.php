<?php

namespace kwik;

interface iNode {
	
	public function __construct($lines);
	public function getHTML();
	public static function match($tokens);

}