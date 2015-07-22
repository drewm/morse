<?php 

namespace DrewM\Morse;
 
class Morse 
{
	const CLASS_SUPPORT = 1;
	const FUNCTION_SUPPORT = 2;

	protected static $disabledFunctions = null;

	private static $resultCache = array();
 
	public static function featureExists($featureID)
	{
		if (array_key_exists($featureID, self::$resultCache)) {
			return self::$resultCache[$featureID];
		}

		try {
			$feature = self::instantiateFromFeatureID($featureID);
			
			if (is_callable($feature)) {
				self::$resultCache[$featureID] = call_user_func($feature);	
				return self::$resultCache[$featureID];
			}
		} catch ( \Exception $e ) {
			return null;
		}

		return null;
	}

	public static function getFirstAvailable($featureIDs = array())
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

	public static function functionDisabled($functionName)
	{
		if (is_null(self::$disabledFunctions)) {
			self::populateDisabledFunctionsList();
		}

		if (in_array($functionName, self::$disabledFunctions)) {
			return true;
		}

		return false;
	}

	private static function instantiateFromFeatureID($featureID)
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

	private static function populateDisabledFunctionsList()
	{
		if (function_exists('ini_get')) {
			$disabled  = ini_get('disable_functions');
			$blacklist = ini_get('suhosin.executor.func.blacklist');
			if ("$disabled$blacklist") {
				self::$disabledFunctions = preg_split('/,\s*/', "$disabled,$blacklist");
				return;
			}
		}

		self::$disabledFunctions = array();
		return;
	}
 
}