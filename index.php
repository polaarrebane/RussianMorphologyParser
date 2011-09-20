<?php
/********************************
* Автор    - Inferno
* Лицензия - LGPL
* Версия: 1.0
* 15.07.2011
* 
*/
	setlocale (LC_ALL, 'ru_RU');	// Установка локали
    include "nouns.php";    		// Словарь существительных
    include "prefix.php";   		// Словарь приставок
	include "nuunstemmer.php";  	// Библиотека стемминга   
	include "prefixParser.php";		// Библиотека поиска приставки
	include "classes.Parser.php";			// Класс парсера
	include "classes.Word.php";		// Класс слова   
	
    $word	= "приподвывертнутая"; // Определяем слово, которое будем парсить	
	$MyWord	= Parse($word);
	$MyWord	-> ShowWord();
    
?>