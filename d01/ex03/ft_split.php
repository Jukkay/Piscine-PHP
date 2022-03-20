<?php
function ft_split($str) {
	$array = explode(" ", $str, PHP_INT_MAX);
	$array = array_filter($array);
	sort($array);
	return $array;
}
?>