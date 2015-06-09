<?php

namespace DrewM\Morse\Feature;

class Image extends \DrewM\Morse\Feature 
{
	public function testGd()
	{
		return extension_loaded('gd');
	}

	public function testImagick()
	{
		return (extension_loaded('imagick') && class_exists('Imagick'));
	}

}