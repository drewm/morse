<?php
 
use DrewM\Morse\Morse;
 
class CacheTest extends PHPUnit_Framework_TestCase {
 
	public function testMemcache()
	{
		$result = Morse::featureExists('cache/memcache');
		$this->assertTrue($result===true || $result===false);
	}

	public function testMemcached()
	{
		$result = Morse::featureExists('cache/memcached');
		$this->assertTrue($result===true || $result===false);
	}

	public function testApc()
	{
		$result = Morse::featureExists('cache/apc');
		$this->assertTrue($result===true || $result===false);
	}	

	public function testOpcache()
	{
		$result = Morse::featureExists('cache/opcache');
		$this->assertTrue($result===true || $result===false);
	}


}