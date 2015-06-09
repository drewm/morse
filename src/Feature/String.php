<?php

namespace DrewM\Morse\Feature;

class String extends \DrewM\Morse\Feature
{
	public function testMultibyte()
	{
		return (function_exists('mb_strpos'));
	}

	public function testTransliterate()
	{
		return class_exists('Transliterator');
	}
}