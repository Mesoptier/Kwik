<?php

namespace kwik;

use kwik\Tokens;

class Lexer {
	
	protected static $defaultBlock = Tokens::PARAGRAPH;
	protected static $blockRules = array(
		// Empty line
		'/^\s*$/' => Tokens::BLANK,

		// Head
		'/^#{1,6}/' => Tokens::HEAD,
		'/^([-=])\1*$/' => Tokens::HEAD_UNDERLINE,

		// Blockquote
		'/^ {0,3}>/' => Tokens::BLOCKQUOTE,

		// Lists
		'/^ {0,3}\d+\./' => Tokens::ORDERED_LIST,
		'/^ {0,3}\*\s/' => Tokens::UNORDERED_LIST,

		// Code
		'/^( {4}|\t)/' => Tokens::CODE,

		// Horizontal rules
		'/^\s*([*\-])(\1| )*$/' => Tokens::HORIZONTAL_RULE
	);

	public static function getBlockTokens($lines){
		$tokens = array();

		// Loop over all the lines...
		foreach ($lines as $line){
			// ... and collect tokens
			$tokens[] = static::_match($line);
		}

		return $tokens;
	}

	protected static function _match($line){
		foreach (static::$blockRules as $pattern => $token){
			if (preg_match($pattern, $line)){
				return $token;
			}
		}
		return static::$defaultBlock;
	}

}

?>