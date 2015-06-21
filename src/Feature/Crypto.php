<?php

namespace DrewM\Morse\Feature;

class Crypto extends \DrewM\Morse\Feature
{
	public function testOpenssl()
	{
		return (defined('X509_PURPOSE_ANY') && self::functionAvailable('openssl_open'));
	}

	public function testMcrypt()
	{
		return (defined('MCRYPT_ENCRYPT') && self::functionAvailable('mcrypt_encrypt'));
	}	

	public function testPassword()
	{
		return (defined('PASSWORD_BCRYPT') && self::functionAvailable('password_hash'));
	}
}