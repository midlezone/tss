<?php
/**
 * WebApplication.php
 *
 * From Alex Makarov boilerplate
 *
 * @author: minhbachngoc <minhcoltech@gmail.com>
 * Date: 10/28/2013
 * Time: 4:30 PM
 */
class WebApplication extends CWebApplication {
          public $siteinfo = array();
	/**
	 * This function is here because we aren't creating a locale file for every client.
	 * Thus we provide a fallback to "en".
	 */
	public function getLocale($localeID = null) {
		try {
			return parent::getLocale($localeID);
		} catch (Exception $e) {
			return CLocale::getInstance('en');
		}
	}

	/**
	 * We were getting tons of errors in the logs from OPTIONS requests for the URI "*"
	 * As it turns out, the requests were from localhost (::1) and are apparently a way
	 * that Apache polls its processes to see if they're alive. This function causes
	 * Yii to respond without logging errors.
	 */
	public function runController($route) {
		try {
			parent::runController($route);
		} catch (CHttpException $e) {
			if (@$_SERVER['REQUEST_METHOD'] == 'OPTIONS' && @$_SERVER['REQUEST_URI'] == '*') {
				Yii::app()->end('Hello, friend!');
			} else
				throw $e;
		}
	}

}
