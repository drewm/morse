<?php

namespace DrewM\Morse\Feature;

class File extends \DrewM\Morse\Feature
{
	public function testFinfo_Class()
	{
		return (defined('FILEINFO_MIME') && class_exists('finfo'));
	}

	public function testFinfo_Function()
	{
		return (defined('FILEINFO_MIME') && function_exists('finfo_open'));
	}


}