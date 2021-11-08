<?php

/**
 * Regular Expression
 *
 * @author minhbn
 */
class ClaRE {

    /**
     * validate domain
     * @param type $attribute
     * @param type $params
     */
    static function checkDomain($domain = '') {
        if (preg_match("/^((?!-)[A-Za-z0-9-]{1,63}(?<!-)\\.)+[A-Za-z]{2,6}$/", $domain))
            return true;
        return false;
    }

    /**
     * validate phone number
     * @param type $phone
     */
    static function isPhoneNumber($phone = '') {
        $pattern = '/^(\([\d]{3}\))?[\d\.]{9,13}$/';
        if (preg_match($pattern, $phone)) {
            return true;
        }
        return false;
    }
    
    static function isPhoneNumberSms($phone = '') {
        $pattern = '/^[0-9]{9,13}$/';
        if (preg_match($pattern, $phone)) {
            return true;
        }
        return false;
    }

    /**
     * validate alias 
     * @param type $alias
     */
    static function isAlias($alias = '') {
        switch (Yii::app()->siteinfo['language']) {
            case 'jp': {
                    $pattern = '/^[一-龠ぁ-ゔァ-ヴa-zA-Z0-9々〆〤.+\-]*$/';
                }break;
            default : {
                    $pattern = '/^[a-z0-9\-_]*$/';
                }
        }
        if (preg_match($pattern, $alias))
            return true;
        return false;
    }

    /**
     * validate Url
     * @param type $url
     */
    static function isUrl($url = '') {
        $pattern = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        if (preg_match($pattern, $url))
            return true;
        return false;
    }

    /**
     * validate ip address
     * @param type $ip
     * @return boolean
     */
    static function isIPAddress($ip = '') {
        $pattern = '/^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/';
        if (preg_match($pattern, $ip))
            return true;
        return false;
    }

    /**
     * validate html tag
     * @param type $tag
     * @return boolean
     */
    static function isHtmlTag($tag = '') {
        $pattern = '/^<([a-z]+)([^<]+)*(?:>(.*)<\/\1>|\s+\/>)$/';
        if (preg_match($pattern, $tag))
            return true;
        return false;
    }

}
