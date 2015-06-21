<?php
 
use DrewM\Morse\Morse;
 
class MorseTest extends PHPUnit_Framework_TestCase 
{
	public function testHelloWorld()
	{
		$morse = new Morse;
		$this->assertTrue(is_object($morse));
	}

	public function testGetFirstAvailable()
	{
		$this->assertEquals(Morse::getFirstAvailable(array(
			'image/fake-negative',
			'image/fake-negative',
			'image/fake-positive',
		)), 'fake-positive');

		$this->assertEquals(Morse::getFirstAvailable(array(
			'db/fake-positive',
			'db/fake-negative',
		)), 'fake-positive');

		$this->assertSame(Morse::getFirstAvailable(array(
			'string/fake-negative',
		)), null);
	}

	public function testDisabledFunction()
	{
		$result = Morse::functionDisabled('exec');
		$this->assertTrue($result === true || $result === false);
	}

}