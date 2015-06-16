<?php
 
use DrewM\Morse\Morse;
 
class StringTest extends PHPUnit_Framework_TestCase 
{
	public function testMultibyte()
	{
		$result = Morse::featureExists('string/multibyte');
		$this->assertTrue($result===true || $result===false);
	}

	public function testTransliterate()
	{
		$result = Morse::featureExists('string/transliterate');
		$this->assertTrue($result===Morse::CLASS_SUPPORT || $result===Morse::FUNCTION_SUPPORT || $result===false);
	}

	public function testJson()
	{
		$result = Morse::featureExists('string/json');
		$this->assertTrue($result===true || $result===false);
	}

	public function testIconv()
	{
		$result = Morse::featureExists('string/iconv');
		$this->assertTrue($result===true || $result===false);
	}

	public function testCtype()
	{
		$result = Morse::featureExists('string/ctype');
		$this->assertTrue($result===true || $result===false);
	}
}
