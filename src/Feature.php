<?php

namespace DrewM\Morse;

class Feature
{
	public function testFake_Negative()
	{
		return false;
	}

	public function testFake_Positive()
	{
		return true;
	}

	public static function functionAvailable($functionName)
	{
		return (function_exists($functionName) && !Morse::functionDisabled($functionName));
	}
}