<?php
 
use DrewM\Morse\Morse;
 
class HttpTest extends PHPUnit_Framework_TestCase {
 
	public function testCurl()
	{
		$result = Morse::featureExists('http/curl');
		$this->assertTrue($result===true || $result===false);
	}

	public function testSockets()
	{
		$result = Morse::featureExists('http/sockets');
		$this->assertTrue($result===true || $result===false);
	}

	public function testFilter()
	{
		$result = Morse::featureExists('http/filter');
		$this->assertTrue($result===true || $result===false);
	}

	public function testOpenssl()
	{
		$result = Morse::featureExists('http/openssl');
		$this->assertTrue($result===true || $result===false);
	}
}