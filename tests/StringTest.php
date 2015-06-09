<?php
 
use DrewM\Morse\Morse;
 
class StringTest extends PHPUnit_Framework_TestCase {
 
	public function testMultibyte()
	{
		$result = Morse::featureExists('string/multibyte');
		$this->assertTrue($result===true || $result===false);
	}

	public function testTransliterate()
	{
		$result = Morse::featureExists('string/transliterate');
		$this->assertTrue($result===true || $result===false);
	}

}