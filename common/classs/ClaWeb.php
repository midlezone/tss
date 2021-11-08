<?php

/**
 * Description of ClaWeb
 *
 * @author minhbn
 */
class ClaWeb {

    //
    static public $web3nhatDomains = array('tss-software.com.vn', 'tss-software.com.vn');
    static public $nanowebDomains = array('tss-software.com.vn');
    //
    static public $nanowebKey = array('tss-software.com.vn');
    static public $web3nhatKey = array('web3nhat');

    // replace web3nhat <=> nanoweb
    static function replaceWebText($str = '', $web3nhatKey = null, $nanowebKey = null) {
        if (!$str)
            return $str;
        //
        $currentDomain = ClaSite::getServerName();
        //
        if (!$web3nhatKey)
            $web3nhatKey = self::$web3nhatKey;
        if (!$nanowebKey)
            $nanowebKey = self::$nanowebKey;
        //
        $search = array();
        $replace = array();
        if (in_array($currentDomain, self::$nanowebDomains)) {
            $search = $web3nhatKey;
            $replace = $nanowebKey;
        } elseif (in_array($currentDomain, self::$web3nhatDomains)) {
            $search = $nanowebKey;
            $replace = $web3nhatKey;
        }

        return str_replace($search, $replace, $str);
    }

    /**
     * check domain is web3nhat domain
     * @param type $domain
     * @return boolean
     */
    static function isWeb3nhatDomain($domain = '') {
        if (!$domain)
            $domain = ClaSite::getServerName();
        if (in_array($domain, self::$web3nhatDomains))
            return true;
        return false;
    }

    /**
     * check domain is Nanoweb domain
     * @param type $domain
     * @return boolean
     */
    static function isNanoWebDomain($domain = '') {
        if (!$domain)
            $domain = ClaSite::getServerName();
        if (in_array($domain, self::$nanowebDomains))
            return true;
        return false;
    }

}
