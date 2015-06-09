<?php 

namespace DrewM\Morse;
 
class Morse 
{
 
	public static function featureExists($featurePath)
	{
		try {
			$feature = self::instantiateFromPath($featurePath);
			
			if (is_callable($feature)) {
				return call_user_func($feature);	
			}
		} catch ( Exception $e ) {
			return null;
		}

		return null;
	}

	public static function getFirstAvailable($featurePaths = array())
	{
		if (is_array($featurePaths) && count($featurePaths)) {
			foreach($featurePaths as $featurePath) {
				if (self::featureExists($featurePath)) {
					$parts = explode('/', $featurePath);
					return $parts[1];
				}
			}
		}

		return null;
	}

	private static function instantiateFromPath($featurePath)
	{
		$parts     = explode('/', $featurePath);
		$classname = __NAMESPACE__ . '\\Feature\\' . \ucwords($parts[0]);
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