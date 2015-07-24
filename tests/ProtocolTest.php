<?php

use DrewM\Morse\Morse;

class ProtocolTest extends PHPUnit_Framework_TestCase
{
	public function testLdap()
	{
		$result = Morse::featureExists('protocol/ldap');
		$this->assertTrue($result===true || $result===false);
	}
}
