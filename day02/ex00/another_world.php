#!/usr/bin/php
<?PHP
if ($argc == 1)
	exit();
$str = preg_replace("/(\s+)/", " ", $argv[1]);
print($str . "\n");
?>