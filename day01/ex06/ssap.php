#!/usr/bin/php
<?PHP
$string = " ";
$i = 0;
while (++$i < $argc)
{
	$string = $string . " " . $argv[$i];
}
$arr = explode(" ",trim($string));
sort($arr);
$i = 0;
while ($i < count($arr))
{
	echo $arr[$i] . "\n";
	$i++;
}
?>