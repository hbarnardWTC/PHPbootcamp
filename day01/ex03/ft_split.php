#!/usr/bin/php
<?PHP
function ft_split($split){
	$boom = explode (" ",$split);
	sort($boom);
	return($boom);
}
?>