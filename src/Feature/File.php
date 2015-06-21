<?php

namespace DrewM\Morse\Feature;

class File extends \DrewM\Morse\Feature
{
	public function testFinfo()
	{
		if (defined('FILEINFO_MIME') && class_exists('finfo')) {
			return \DrewM\Morse\Morse::CLASS_SUPPORT;
		}

		if (defined('FILEINFO_MIME') && self::functionAvailable('finfo_open')) {
			return \DrewM\Morse\Morse::FUNCTION_SUPPORT;	
		}

		return false;

	}

	public function testZip()
	{
		return class_exists('ZipArchive');
	}

}