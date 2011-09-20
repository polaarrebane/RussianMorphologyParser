<?php
/********************************
* Автор - Inferno
* Лицензия - LGPL
* Версия: 1.0
* 15.07.2011
* 
*/ 
	function Parse($word)
	{
		$result = new Word();					// Результат работы функции
		$word = mb_strtolower($word, "cp1251"); // Перевод символов в нижний регистр
		$word1 = $word;							// Вспомогательная строковая переменная
		$flag = true;

		while($flag){ // Поиск приставок
			$flag = false;
			$prefix1 = getPrefix($word1);
			if ($prefix1) // Какая-то приставка найдена
			{
				$result -> AddPrefix($prefix1);
				$word1 = substr($word1, strlen($prefix1));
				$flag = true;
			}
		}
		
		$body = stemming($word1);
		$flex = substr($word1, strlen($body));
		
		$result -> AddBody($body);
		$result -> AddFlexia($flex);		
		
		return $result;
	}
?>