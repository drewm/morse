<?php 

namespace DrewM\Morse;
 
class Morse 
{
	const CLASS_SUPPORT = 1;
	const FUNCTION_SUPPORT = 2;
 
	public static function featureExists( $featureID )
	{
		try {
			$feature = self::instantiateFromFeatureID($featureID);
			
			if (is_callable($feature)) {
				return call_user_func($feature);	
			}
		} catch ( Exception $e ) {
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
		} catch ( Exception $e ) {
			die ($e->getMessage());
			return null;
		}		

		return array(
			new $class,
			$funcname
		);
	}
 
}