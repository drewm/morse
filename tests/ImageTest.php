<?php
 
use DrewM\Morse\Morse;
 
class ImageTest extends PHPUnit_Framework_TestCase {
 
	public function testGd()
	{
		$result = Morse::featureExists('image/gd');
		$this->assertTrue($result===true || $result===false);
	}

	public function testImagick()
	{
		$result = Morse::featureExists('image/imagick');
		$this->assertTrue($result===true || $result===false);
	}

}