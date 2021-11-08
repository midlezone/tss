<?php
class BaseHelper extends CComponent{
    public static $_helpers=array();
    
    public static function helper($className=__CLASS__)
	{
		if(isset(self::$_helpers[$className]))
                    return self::$_helpers[$className];
		else
		{
                    $helper=self::$_helpers[$className]=new $className(null);			
                    return $helper;
		}
	}    
}

