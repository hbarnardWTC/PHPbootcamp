#!/usr/bin/php
<?PHP
if ($argc == 2)
{
	$fixed = trim(preg_replace('/(\s+)/',' ',$argv[1]));
	echo $fixed, "\n";
}
else
{
	echo "Incorrect amount of arguments\n";
}
?>