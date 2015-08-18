<?php

namespace DrewM\Morse\Feature;

class Data extends \DrewM\Morse\Feature
{
	public function testJson()
	{
		return (self::functionAvailable('json_encode') && self::functionAvailable('json_decode'));
	}
}
