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
		if (class_exists('Transliterator')) {
			return \DrewM\Morse\Morse::CLASS_SUPPORT;
		}

		if (function_exists('transliterator_transliterate')) {
			return \DrewM\Morse\Morse::FUNCTION_SUPPORT;	
		}

		return false;
	}

	public function testJson()
	{
		return (function_exists('json_encode') && function_exists('json_decode'));
	}

	public function testIconv()
	{
		return (function_exists('iconv'));
	}
}
