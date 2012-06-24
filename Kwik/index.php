<?php
namespace kwik;

require "Kwik.php";

echo Kwik::getHTML(file_get_contents("test.md"));

?>