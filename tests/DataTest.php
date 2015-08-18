<?php

use DrewM\Morse\Morse;

class DataTest extends PHPUnit_Framework_TestCase
{
	public function testJson()
	{
		$result = Morse::featureExists('data/json');
		$this->assertTrue($result===true || $result===false);
	}
}
