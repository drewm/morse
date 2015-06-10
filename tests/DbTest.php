<?php
 
use DrewM\Morse\Morse;
 
class DbTest extends PHPUnit_Framework_TestCase 
{
	public function testPdo()
	{
		$result = Morse::featureExists('db/pdo');
		$this->assertTrue($result===true || $result===false);
	}

	public function testPdo_Mysql()
	{
		$result = Morse::featureExists('db/pdo-mysql');
		$this->assertTrue($result===true || $result===false);
	}

	public function testPdo_Sqlite()
	{
		$result = Morse::featureExists('db/pdo-sqlite');
		$this->assertTrue($result===true || $result===false);
	}

	public function testPdo_Mysqli()
	{
		$result = Morse::featureExists('db/mysqli');
		$this->assertTrue($result===true || $result===false);
	}

}