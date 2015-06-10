<?php
 
use DrewM\Morse\Morse;
 
class NumberTest extends PHPUnit_Framework_TestCase {
 
	public function testMultibyte()
	{
		$result = Morse::featureExists('number/bigint');
		$this->assertTrue($result===true || $result===false);
	}


}