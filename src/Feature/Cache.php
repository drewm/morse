<?php

namespace DrewM\Morse\Feature;

class Cache extends \DrewM\Morse\Feature
{
	public function testMemcache()
	{
		return function_exists('memcache_get_version');
	}

	public function testMemcached()
	{
		return class_exists('Memcached');
	}	

	public function testApc()
	{
		return function_exists('apc_add');
	}

	public function testOpcache()
	{
		return function_exists('opcache_compile_file');
	}


}