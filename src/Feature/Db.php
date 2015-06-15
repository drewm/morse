<?php

namespace DrewM\Morse\Feature;

class Db extends \DrewM\Morse\Feature
{
	public function testPdo()
	{
		return extension_loaded('pdo');
	}

	public function testPdo_Mysql()
	{
		// Due to historic PHP bugs, need to test PDO::MYSQL_ATTR_LOCAL_INFILE to ensure it's really available
		return defined('PDO::MYSQL_ATTR_LOCAL_INFILE');
	}	

	public function testPdo_Sqlite()
	{
		return extension_loaded('pdo_sqlite');
	}

	public function testMysqli()
	{
		return (defined('MYSQLI_INIT_COMMAND') && class_exists('mysqli'));
	}
	
	public function testPdo_Pgsql()
	{
		return extension_loaded('pdo_pgsql');
	}
}
