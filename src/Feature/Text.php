<?php

namespace DrewM\Morse\Feature;

class Text extends \DrewM\Morse\Feature
{
	public function testMultibyte()
	{
		return (self::functionAvailable('mb_strpos'));
	}

	public function testTransliterate()
	{
		if (class_exists('Transliterator')) {
			return \DrewM\Morse\Morse::CLASS_SUPPORT;
		}

		if (self::functionAvailable('transliterator_transliterate')) {
			return \DrewM\Morse\Morse::FUNCTION_SUPPORT;
		}

		return false;
	}

	public function testJson()
	{
		return (self::functionAvailable('json_encode') && self::functionAvailable('json_decode'));
	}

	public function testIconv()
	{
		return (self::functionAvailable('iconv'));
	}

	public function testCtype()
	{
		return (self::functionAvailable('ctype_alnum') && self::functionAvailable('ctype_lower'));
	}

	public function testIntl()
	{
		return (class_exists('Locale'));
	}
}
