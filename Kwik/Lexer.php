<?php

namespace kwik;

class Lexer {
	
	protected static $default = 'PARAGRAPH';
	protected static $rules = array(
		// Empty line
		'/^\s*$/' => 'EMPTY',

		// Head
		'/^#{1,6}/' => 'HEAD',
		'/^([-=])\1*$/' => 'HEAD_UNDERLINE',

		// Blockquote
		'/^ {0,3}>/' => 'BLOCKQUOTE',

		// Lists
		'/^ {0,3}\d+\./' => 'ORDERED_LIST',
		'/^ {0,3}\*\s/' => 'UNORDERED_LIST',

		// Code
		'/^( {4}|\t)/' => 'CODE',

		// Horizontal rules
		'/^\s*([*\-])(\1| )*$/' => 'HORIZONTAL_RULE'
	);

	public static function tokenize($data){
		$tokens = array();

		// Break the data into lines
		$lines = explode("\n", $data);

		// Loop over all the lines...
		foreach ($lines as $line){
			// ... and collect tokens
			$tokens[] = static::_match($line);
		}

		return $tokens;
	}

	protected static function _match($line){
		foreach (static::$rules as $pattern => $token){
			if (preg_match($pattern, $line)){
				return $token;
			}
		}
		return static::$default;
	}

}

?>