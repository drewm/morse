<?php

namespace DrewM\Morse\Feature;

class Crypto extends \DrewM\Morse\Feature
{
	public function testOpenssl()
	{
		return (defined('X509_PURPOSE_ANY') && function_exists('openssl_open'));
	}

	public function testMcrypt()
	{
		return (defined('MCRYPT_ENCRYPT') && function_exists('mcrypt_encrypt'));
	}	

	public function testPassword()
	{
		return (defined('PASSWORD_BCRYPT') && function_exists('password_hash'));
	}
}