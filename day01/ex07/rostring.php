#!/usr/bin/php
<?PHP
$arr = explode(" ",trim($argv[1]));
$str = $arr[count($arr) - 1];
$i = 0;
while ($i < (count($arr) - 1))
{
	$str = $str . " " . $arr[$i];
	$i++;
}
echo trim($str) . "\n";
?>