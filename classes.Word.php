<?php
/********************************
* Автор - Inferno
* Лицензия - LGPL
* Версия: 1.0
* 15.07.2011
* 
*/ 
	class Word
	{
		private $prefix = array();	// Массив приставок
		private $body	= "";		// Корень и суффиксы
		private $flexia = "";		// Окончание
		
		#AddBody
		public function AddBody($body)		// Добавление корня+суффиксов
		{
			$this -> body = $body;
		}
		
		#AddFlexia
		public function AddFlexia($flexia)	// Добавление окончания
		{
			$this -> flexia = $flexia;
		}
		
		#AddPrefix
		public function AddPrefix($prefix)	// Добавление приставки
		{
			$this -> prefix[] = $prefix;
		}		
		
		#GetBody
		public function GetBody()			// Возвращает корень+суффиксы
		{
			return $this -> prefix;
		}
		
		#GetFlexia
		public function GetFlexia()			// Возвращает окончание
		{
			return $this -> flexia;
		}
		
		#GetPrefix
		public function GetPrefix()			// Возвращает массив приставок
		{
			return $this -> prefix;
		}		
		
		#ShowWord
		public function ShowWord()			// Вывод слова на экран
		{
			echo "Приставки: \n";		print_r($this -> prefix);
			echo "Корень и суффиксы: ";	echo $this -> body, "\n";
			echo "Окончание: ";			echo $this -> flexia, "\n";			
		}
	}
?>