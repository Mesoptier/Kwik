<?php

namespace kwik;

class Lexer {
	
	protected static $rules = array(
		// Empty line
		'/^\s*$/' => 'T_EMPTY',

		// Head
		'/^(?<!\\\)#{1,6}.+$/' => 'T_HEAD',
		'/^([-=])\1*$/' => 'T_HEAD_UNDERLINE'

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
		return 'T_PARAGRAPH';
	}

}

?>