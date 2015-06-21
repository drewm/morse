<?php

namespace DrewM\Morse\Feature;

class Cache extends \DrewM\Morse\Feature
{
	public function testMemcache()
	{
		return self::functionAvailable('memcache_get_version');
	}

	public function testMemcached()
	{
		return class_exists('Memcached');
	}	

	public function testApc()
	{
		return self::functionAvailable('apc_add');
	}

	public function testOpcache()
	{
		return self::functionAvailable('opcache_compile_file');
	}


}