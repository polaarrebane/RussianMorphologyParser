<?php
/********************************
* јвтор - insideone@cyberforum.ru
* Ћицензи€ - LGPL
* ¬ерси€: 2.0
* 27.07.2010
*
* ƒоработка: Inferno
* 
*/ 
 
 
define('MODE', 's');
define('RVRE', '/^(.*?[аеЄиоуыэю€])(.*)$/'.MODE);
define('ADJECTIVE', '/(ее|ие|ые|ое|ими|ыми|ей|ий|ый|ой|ем|им|ым|ом|его|ого|ему|ому|их|ых|ую|юю|а€|€€|ою|ею)$/'.MODE);
define('NOUN', '/(а|ев|ов|ие|ье|е|и€ми|€ми|ами|еи|ии|и|ией|ей|ой|ий|й|и€м|€м|ием|ем|ам|ом|о|у|ах|и€х|€х|ы|ь|ию|ью|ю|и€|ь€|€)$/'.MODE);
define('DERIVATIONAL', '/[^аеЄиоуыэю€][аеЄиоуыэю€]+[^аеЄиоуыэю€]+[аеЄиоуыэю€].*(?<=о)сть?$/'.MODE);

class stem
{
	public static $LowerMode = FALSE;
	public static $RV = '';
 
	private static function clear($pattern)
	{
		$uncleared = self::$RV;
		self::$RV = preg_replace($pattern, '', self::$RV);
		$replaced = str_replace(self::$RV, '', $uncleared); 
		return $uncleared !== self::$RV;
	}
 
	public static function word(&$word)
	{
			if ( self::$LowerMode ) $word = mb_strtolower($word);
			
			//ƒл€ каждого слова: 
			// RV Ч это часть слова после первого гласного
			// R1 Ч это часть слова после первого согласного, следующего после гласного
			// R2 Ч это часть слова после первого согласного, следующего после гласного в R1
			if (!preg_match(RVRE, $word, $word_parts) || !$word_parts[2]) return;
			list( ,$start, self::$RV) = $word_parts;

			self::clear(ADJECTIVE);
			self::clear(NOUN);

			// [Ўј√ 2]
			// ≈сли слово оканчиваетс€ на символ 'и' , то удалить его.
			self::clear('/и$/'.MODE);
			
			// [Ўј√ 3]
			// Ќайти —Ћќ¬ќќЅ–ј«”ёў≈≈ окончание в R2, если окончание найдено, то удалить его.
			if ( preg_match(DERIVATIONAL, self::$RV) ) // —ловообразующее
					self::clear('/ость?$/'.MODE);
			
			$word = $start.self::$RV;
			self::$RV = '';
	}
};

/* ‘ункци€, с помощью которой нужно работать с классом */
function stemming($word){
	$result = $word;
	stem::word($result);
	return $result;
}

?>