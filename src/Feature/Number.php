<?php

namespace DrewM\Morse\Feature;

class Number extends \DrewM\Morse\Feature
{
	public function testBigint()
	{
		return !(PHP_INT_MAX <= 2147483647);
	}

}