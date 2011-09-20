<?php
/********************************
* Автор - Inferno
* Лицензия - LGPL
* Версия: 1.0
* 15.07.2011
* 
*/ 

    function getPrefix($word)
	{
		/* Функция возвращает крайнюю левую приставку слова */
		global $nouns;	
		global $prefix;
		
		foreach($prefix as $value)
		{
			// $value - одна из приставок из словаря приставок
			$prefixLength = strlen($value);
			if (substr($word, 0, $prefixLength) == $value) // Если слово начинается с подстроки, равной этой приставке
			{
				if (searchWord(substr($word, $prefixLength)))	// Если существует однокоренное слово
				{
					return $value;
				}
			}
		}
		
		return false;
    }

	function searchWord($word)
	{
		/* Функция проверяет существование однокоренного слова */
		global $nouns;	// Словарь существительных
		global $prefix;	// Словарь приставок
		foreach($nouns as $value)
		{
			$length = (strlen($word)>4)?4:3;
			if(
				(levenshtein(substr($word,0,$length), substr($value[0],0,$length))<1)
				&&
				(substr($word,0,1) == substr($value[0],0,1))
			)
			{
				return true;
			}
		}
		return false;
	}


?>