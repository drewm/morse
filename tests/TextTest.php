<?php

use DrewM\Morse\Morse;

class TextTest extends PHPUnit_Framework_TestCase
{
	public function testMultibyte()
	{
		$result = Morse::featureExists('text/multibyte');
		$this->assertTrue($result===true || $result===false);
	}

	public function testTransliterate()
	{
		$result = Morse::featureExists('text/transliterate');
		$this->assertTrue($result===Morse::CLASS_SUPPORT || $result===Morse::FUNCTION_SUPPORT || $result===false);
	}

	public function testIconv()
	{
		$result = Morse::featureExists('text/iconv');
		$this->assertTrue($result===true || $result===false);
	}

	public function testCtype()
	{
		$result = Morse::featureExists('text/ctype');
		$this->assertTrue($result===true || $result===false);
	}

	public function testIntl()
	{
		$result = Morse::featureExists('text/intl');
		$this->assertTrue($result===true || $result===false);
	}
}
