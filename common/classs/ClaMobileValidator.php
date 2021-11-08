<?php
/**
 * Mobile validator
 * @author: MinhBN <minhcoltech@gmail.com>
 * @version: 1.0 <2012/12/07>
 */
class ClaMobileValidator {
	const LIVE_TIME=14400; // = 60*60*4 = 4 hours
	const MOBILE_DOMAIN='m.web3nhat.vn';
	const COOKIE_DOMAIN='m.web3nhat.vn';
	const APPS_DOMAIN='ma.web3nhat.vn';
	//const MOBILE_DOMAIN='localhost';
	
	public static function setMobile($livetime=null){
		if (!$livetime) $livetime=self::LIVE_TIME;
		setcookie('mobile', 'true', time()+$livetime, '/', self::COOKIE_DOMAIN);
	}
	public static function clearMobile($livetime=null){
		if (!$livetime) $livetime=self::LIVE_TIME;
		setcookie('mobile', 'false', time()+$livetime);
	}
	public static function getMobile() {
		return isset($_COOKIE['mobile']) && $_COOKIE['mobile']=='true' ? true : false;
	}
	public static function detectMobile() {
	    $is_mobile = false;
		
		if ($_SERVER['SERVER_NAME']==self::MOBILE_DOMAIN) return true;
		
	    if(preg_match('/(android|up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
	        $is_mobile=true;
	    }
		elseif((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
	        $is_mobile=true;
	    }
	    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
	    $mobile_agents = array('w3c ','acs-','alav','alca','amoi','andr','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');
	    if(in_array($mobile_ua,$mobile_agents)) {
	        $is_mobile=true;
	    }
	    if (isset($_SERVER['ALL_HTTP'])) {
	        if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) {
	            $is_mobile=true;
	        }
	    }
		elseif (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
	        $is_mobile=false;
			if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'zune')>0) {
		        $is_mobile=true;
		    }
	    }
	    return $is_mobile;
	}
 	public static function isMobile() {
		if (self::getMobile()) {
			return true;
		}
		$is_mobile=self::detectMobile();
 		if ($is_mobile) {
 			self::setMobile();
 			return true;
		}
 	}
	public static function isApp() {
		return $_SERVER['SERVER_NAME']==self::APPS_DOMAIN?true:false;
	}
}