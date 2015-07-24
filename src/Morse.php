<?php
namespace DrewM\Morse;

class Morse
{
	const CLASS_SUPPORT = 1;
	const FUNCTION_SUPPORT = 2;

	/**
	 * In-memory cache of disabled functions names.
	 */
	protected static $disabledFunctions = null;

	/**
	 * In-memory cache of test results, so that each test need only be performed once per request.
	 */
	private static $resultCache = array();

 	/**
 	 * Tests if the named feature exists in the current environment.
 	 *
 	 * @param string $featureID The identifier for the feature, e.g. 'db/pdo'.
 	 * @return bool|null Returns true or false, or null if an error occured.
 	 */
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

	/**
	 * Tests an array of feature identifiers, stopping and returnig the first that tests true.
	 *
	 * @param array $featureIDs Array of feature ID strings. If associative, the value is the ID, and the key is returned.
	 * @return string Returns the first feature ID that tests true.
	 */
	public static function getFirstAvailable(array $featureIDs = array())
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

	/**
	 * Tests if the named function is present and enabled in the current environment.
	 *
	 * @param string $functionName The name of the function to test.
	 * @return bool True if the function is disabled, false if it is available.
	 */
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


	/**
	 * Instantiates a test class for the given feature identifier.
	 *
	 *  @param string $featureID Feature identifier
	 * @return callable A callable array of class and method name.
	 */
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

	/**
	 * Populates the internal memory cache of functions that have been disabled in the current environment
	 *
	 * @return void
	 */
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