<?php

namespace kwik;

use kwik\Lexer;

class Parser {
	
	protected static $blockNodes = array(
		'kwik\nodes\HeadingNode'
	);

	public static function getBlockNodes($data){
		$nodes = array();

		// Break the data into lines
		$lines = explode("\n", $data);

		$tokens = Lexer::getBlockTokens($lines);
		foreach ($tokens as $i => $token){
			if (count($tokens) > 0)
				$nodes[] = static::getBlockNode($tokens, $lines);
		}

		return $nodes;
	}

	protected static function getBlockNode(&$tokens, &$lines){
		foreach (static::$blockNodes as $node){
			if (($count = $node::match($tokens)) > 0){
				$tokens = array_slice($tokens, $count);
				return new $node(array_splice($lines, 0, $count));
			}
		}

		// Remove the first token and line from the arrays
		array_shift($tokens);
		array_shift($lines);
	}

	public static function getInlineNodes($data){
		// TODO: Parse inline nodes
	}

}

?>