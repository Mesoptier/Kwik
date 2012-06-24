<?php
namespace kwik;

require "Kwik.php";

Kwik::setContents(file_get_contents("test.md"));
echo Kwik::getHTML();

?>