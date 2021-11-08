<?php

/**
 * @author minhbn <minhcoltech@gmail.com>
 * 
 * Class for convert
 * 
 */
class ClaConvert {

    const DECIMAL_LENGTH = 2;

    /**
     * convert MB to Byte
     * @param type $mb
     */
    static function convertMBtoB($mb = 0) {
        $mb = floatval($mb);
        return $mb * pow(1024, 2);
    }

    /**
     * 
     * @param type $kb
     * @return type
     */
    static function convertKBtoB($kb = 0) {
        $kb = floatval($kb);
        return $kb * 1024;
    }

    /**
     * convert B to KB
     * 
     * @param type $b
     * @return type
     */
    static function convertBtoMB($b = 0) {
        $b = floatval($b);
        return round($b / pow(1024, 2), self::DECIMAL_LENGTH);
    }

    /**
     * convert B to KB
     * 
     * @param type $b
     */
    static function convertBtoKB($b = 0) {
        $b = floatval($b);
        return round($b / 1024, self::DECIMAL_LENGTH);
    }

}
