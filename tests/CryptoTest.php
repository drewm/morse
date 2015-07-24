<?php

use DrewM\Morse\Morse;

class CryptoTest extends PHPUnit_Framework_TestCase
{
	public function testOpenssl()
	{
		$result = Morse::featureExists('crypto/openssl');
		$this->assertTrue($result===true || $result===false);
	}

	public function testMcrypt()
	{
		$result = Morse::featureExists('crypto/mcrypt');
		$this->assertTrue($result===true || $result===false);
	}

	public function testPassword()
	{
		$result = Morse::featureExists('crypto/password');
		$this->assertTrue($result===true || $result===false);
	}
}