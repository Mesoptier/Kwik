<?php

namespace kwik\nodes;

use kwik\Tokens;
use kwik\Parser;
use kwik\iNode;

class HeadingNode implements iNode {
	
	protected $inline = array();
	protected $level = 1;

	public function __construct($lines){
		// Multiline heading
		if (count($lines) == 2){
			$this->inline = Parser::getInlineNodes($lines[0]);
			$this->level = $lines[1][0] == '=' ? 1 : 2;
		// Single line heading
		} else {
			// Get heading level and the inline content
			preg_match('/^(#{1,6})\s*(.*)(?<!(?<!\\\)#|\s)\s*#*$/', $lines[0], $matches);
			$this->inline = Parser::getInlineNodes($matches[2]);
			$this->level = strlen($matches[1]);
		}
	}

	public static function match($tokens){
		if (count($tokens) > 1 && 
				$tokens[1] === Tokens::HEAD_UNDERLINE && 
				$tokens[0] !== Tokens::BLANK){
			return 2;
		} else if ($tokens[0] === Tokens::HEAD){
			return 1;
		}
	}

	public function getHTML(){
		return '<h' . $this->level . '>' . $this->inline . '</h' . $this->level . '>';
	}

}

?>