<?php

/*
	Кодируем строку: partnerstroka_encode('134-679');
	Раскодируем строку с разделителем: partnerstroka_decode('oqrnGHJ');
	Раскодируем строку в массив: partnerstroka_decode('oqrnGHJ', true);
	
	Code the line: partnerstroka_encode ('134-679');
	Raskodiruem string with the separator: partnerstroka_decode ('oqrnGHJ');
	Raskodiruem string into an array: partnerstroka_decode ('oqrnGHJ', true);
*/

// Функция кодирования строки
// Function line coding
function partnerstroka_encode($text) {
	$delimiter = array('-', 'n');
	$table = array('a', 'B', 'p', 't', 'E', 'w', 'G', 'u', 'q', 'J');
	$str = '';
	if (!strripos($text, $delimiter[0]) || strlen($text) < 3)
		return false;
	$data = preg_split('//', $text, -1, PREG_SPLIT_NO_EMPTY);
	// print_r($data);
	foreach ($data as $key => $value) {
		if ($value != $delimiter[0]) $data[$key] = $table[$value];
		$str .= $data[$key];
	}
	return str_replace($delimiter[0], $delimiter[1], $str);
}

// Функция декодирования строки
// Row decoding function
function partnerstroka_decode($text, $array = false) {
	$delimiter = array('-', 'n');
	$table = array('a', 'B', 'p', 't', 'E', 'w', 'G', 'u', 'q', 'J');
	if (!strripos($text, $delimiter[1]) || strlen($text) < 3)
		return false;
	$data = preg_split('//', $text, -1, PREG_SPLIT_NO_EMPTY);
	// print_r($data);
	foreach ($table as $key => $value) {
		$text = str_replace($value, $key, $text);
	}
	if ($array)
		return explode($delimiter[1], $text);
	else
		return str_replace($delimiter[1], $delimiter[0], $text);
}

?>
