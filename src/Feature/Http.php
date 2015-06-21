<?php

namespace DrewM\Morse\Feature;

class Http extends \DrewM\Morse\Feature
{
	public function testCurl()
	{
		return (self::functionAvailable('curl_init') && self::functionAvailable('curl_exec'));
	}

	public function testSockets()
	{
		return self::functionAvailable('fsockopen');
	}

	public function testFilter()
	{
		return self::functionAvailable('filter_var');
	}

	public function testOpenssl()
	{
		return (defined('X509_PURPOSE_ANY') && self::functionAvailable('openssl_open'));
	}
}