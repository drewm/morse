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

	public function testOpenssl()
	{
		return (defined('X509_PURPOSE_ANY') && function_exists('openssl_open'));
	}
}