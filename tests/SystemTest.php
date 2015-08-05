<?php

use DrewM\Morse\Morse;

class SystemTest extends PHPUnit_Framework_TestCase
{
	public function testExec()
	{
		$result = Morse::featureExists('system/exec');
		$this->assertTrue($result===true || $result===false);
	}

	public function testShell_exec()
	{
		$result = Morse::featureExists('system/shell_exec');
		$this->assertTrue($result===true || $result===false);
	}

	public function testIni_set()
	{
		$result = Morse::featureExists('system/ini_set');
		$this->assertTrue($result===true || $result===false);
	}

	public function testSet_time_limit()
	{
		$result = Morse::featureExists('system/set_time_limit');
		$this->assertTrue($result===true || $result===false);
	}

	public function testIgnore_user_abort()
	{
		$result = Morse::featureExists('system/ignore_user_abort');
		$this->assertTrue($result===true || $result===false);
	}

	public function testPassthru()
	{
		$result = Morse::featureExists('system/passthru');
		$this->assertTrue($result===true || $result===false);
	}

	public function testSystem()
	{
		$result = Morse::featureExists('system/system');
		$this->assertTrue($result===true || $result===false);
	}

	public function testPopen()
	{
		$result = Morse::featureExists('system/popen');
		$this->assertTrue($result===true || $result===false);
	}

	public function testProc_open()
	{
		$result = Morse::featureExists('system/proc_open');
		$this->assertTrue($result===true || $result===false);
	}

}
