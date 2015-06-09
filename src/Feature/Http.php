<?php

namespace DrewM\Morse\Feature;

class Http extends \DrewM\Morse\Feature
{
	public function testCurl()
	{
		return (function_exists('curl_init') && function_exists('curl_exec'));
	}

	public function testSockets()
	{
		return function_exists('fsockopen');
	}

	public function testFilter()
	{
		return function_exists('filter_var');
	}
}