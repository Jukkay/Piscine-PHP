#!/usr/bin/env php
<?php

function check_weekday($day)
{
$day = strtolower($day);
if ($day != "dimanche" &&
	$day != "lundi" &&
	$day != "mardi" &&
	$day != "mercredi" &&
	$day != "jeudi" &&
	$day != "vendredi" &&
	$day != "samedi")
	return false;
return true;
}

function translate_month($month)
{
	$month = strtolower($month);
	if ($month == "janvier") return "January";
	if ($month == "février") return "February";
	if ($month == "mars") return "March";
	if ($month == "avril") return "April";
	if ($month == "mai") return "May";
	if ($month == "juin") return "June";
	if ($month == "juillet") return "July";
	if ($month == "août") return "August";
	if ($month == "septembre") return "Semptember";
	if ($month == "octobre") return "October";
	if ($month == "novembre") return "November";
	if ($month == "décembre") return "December";
}

if ($argc != 2)
	return;
$array = explode(' ', $argv[1]);
if (count($array) != 5 || !(check_weekday($array[0]))) {
	echo "Wrong Format\n";
	return;
}
$weekday = $array[0];
unset($array[0]);
$array = array_values($array);
$array[1] = translate_month($array[1]);
$dateTime = implode(' ', $array);
date_default_timezone_set("Europe/Paris");
if (strtotime($dateTime) == false) {
	echo "Wrong Format\n";
	return;
}
echo strtotime($dateTime) . "\n";