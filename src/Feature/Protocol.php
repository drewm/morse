<?php

namespace DrewM\Morse\Feature;

class Protocol extends \DrewM\Morse\Feature
{
	public function testLdap()
	{
		return extension_loaded('ldap');
	}
}
