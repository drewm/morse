<?php

namespace DrewM\Morse\Feature;

class System extends \DrewM\Morse\Feature
{
	public function testExec()
	{
		return self::functionAvailable('exec');
	}

	public function testShell_exec()
	{
		return self::functionAvailable('shell_exec');
	}

	public function testIni_set()
	{
		return self::functionAvailable('ini_set');
	}

	public function testSet_time_limit()
	{
		return self::functionAvailable('set_time_limit');
	}

	public function testIgnore_user_abort()
	{
		return self::functionAvailable('ignore_user_abort');
	}

	public function testPassthru()
	{
		return self::functionAvailable('passthru');
	}

	public function testSystem()
	{
		return self::functionAvailable('system');
	}

	public function testPopen()
	{
		return self::functionAvailable('popen');
	}

	public function testProc_open()
	{
		return self::functionAvailable('proc_open');
	}

}
