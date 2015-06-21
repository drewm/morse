<?php 

namespace DrewM\Morse;
 
class Morse 
{
	const CLASS_SUPPORT = 1;
	const FUNCTION_SUPPORT = 2;

	protected static $disabled_functions = null;
 
	public static function featureExists( $featureID )
	{
		if (is_null(self::$disabled_functions)) {
			self::populate_disabled_functions_list();
		}

		try {
			$feature = self::instantiateFromFeatureID($featureID);
			
			if (is_callable($feature)) {
				return call_user_func($feature);	
			}
		} catch ( \Exception $e ) {
			return null;
		}

		return null;
	}

	public static function getFirstAvailable( $featureIDs = array() )
	{
		if (is_array($featureIDs) && count($featureIDs)) {
			foreach($featureIDs as $featureID) {
				if (self::featureExists($featureID)) {
					$parts = explode('/', $featureID);
					return $parts[1];
				}
			}
		}

		return null;
	}

	private static function instantiateFromFeatureID( $featureID )
	{
		$parts     = explode('/', $featureID);
		$classname = __NAMESPACE__ . '\\Feature\\' . \ucwords(\str_replace('-', '_', $parts[0]));
		$funcname  = 'test' . \ucwords(\str_replace('-', '_', $parts[1]));

		try {
			$class = new $classname;	
		} catch ( \Exception $e ) {
			return null;
		}		

		return array(
			new $class,
			$funcname
		);
	}

	private static function populate_disabled_functions_list()
	{
		if (function_exists('ini_get')) {
			$disabled  = ini_get('disable_functions');
			$blacklist = ini_get('suhosin.executor.func.blacklist');
			if ("$disabled$blacklist") {
				self::$disabled_functions = preg_split('/,\s*/', "$disabled,$blacklist");
				return;
			}
		}

		self::$disabled_functions = array();
		return;
	}
 
}