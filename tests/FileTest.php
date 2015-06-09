<?php
 
use DrewM\Morse\Morse;
 
class FileTest extends PHPUnit_Framework_TestCase {
 
	public function testFinfo_Class()
	{
		$result = Morse::featureExists('file/finfo-class');
		$this->assertTrue($result===true || $result===false);
	}

	public function testFinfo_Function()
	{
		$result = Morse::featureExists('file/finfo-function');
		$this->assertTrue($result===true || $result===false);
	}


}