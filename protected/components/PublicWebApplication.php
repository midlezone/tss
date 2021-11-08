<?php

/**
 * Description of PublicWebApplication
 *
 * @author minhbn
 * @property array $siteinfo
 */
class PublicWebApplication extends WebApplication {

    public $siteinfo = array();
    public $isDemo = false;
    public $isMobile;

    //put your code here
    protected function init() {
		
        // set id for application
        $this->setId('public');
        //
		
		
        $this->isMobile = ClaSite::isMobile();
        // change db
        if (ClaSite::isDemoDomain()) {
            $this->db->setActive(false);
            $this->db->connectionString = 'mysql:host=localhost;dbname=tss';
            $this->db->username = 'root';
            $this->db->password = '@0874e33h@';
            $this->db->setActive(true);
            $this->isDemo = true;
			//
			Yii::app()->cache->keyPrefix = 'demo';
        }
        $this->siteinfo = ClaSite::getSiteInfo();
		
        if (!$this->siteinfo || !count($this->siteinfo))
            Yii::app()->end();
        if (!isset($this->siteinfo['site_id']))
            die(Yii::t('common', 'pagenotfound'));
        if ($this->siteinfo['site_title'])
            $this->name = Yii::app()->siteinfo['site_title'];
        //
        // redirect 301 to default domain
        $this->defaultController = ClaSite::getDefaultController($this->siteinfo);
        if ($this->siteinfo['domain_default'] != ClaSite::getServerName()) {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: http://" . $this->siteinfo['domain_default'] . Yii::app()->request->requestUri);
        }
        /**
         * Set language for site
         */
        $language = ClaSite::getPublicLanguage();
        if (!$language)
            $language = $this->siteinfo['language'];
        if ($language)
            $this->language = $language;
        //
        // Load theme
        $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
        //Set theme path
        Yii::app()->themeManager->setBasePath(Yii::getPathOfAlias('webroot') . '/themes/' . $sitetypename);
        //Set theme baseUrl
        Yii::app()->themeManager->setBaseUrl(Yii::app()->baseUrl . '/themes/' . $sitetypename);
        //Set theme name
        Yii::app()->theme = Yii::app()->siteinfo['site_skin'];
        //
        if ($this->isMobile) {
            if (is_dir(Yii::getPathOfAlias('webroot') . '/themes/' . $sitetypename . '/' . Yii::app()->siteinfo['site_skin'] . '/' . ClaSite::MOBILE_ALIAS))
                Yii::app()->theme = Yii::app()->siteinfo['site_skin'] . '/' . ClaSite::MOBILE_ALIAS;
            else
                $this->isMobile = null; // Nếu không có theme cho mobile thì lấy theme ban đầu và controller ban đầu
        }
        // load url rules
        $this->urlManager->addRules(ClaSite::getPublicSiteRules());
        //
        return parent::init();
    }
	
	 /**
     * 
     * @param type $route
     * @param type $params
     * @param type $ampersand
     * @return type
     * nếu là tiếng anh, nhật,... thì thêm biến lang cho params
     */
    public function createUrl($route, $params = array(), $ampersand = '&') {
        if ($this->language && $this->language != 'vi' && $route && $route != '/' && $route != $this->defaultController && ClaSite::isMultiLanguage())
            $params = $params + array(ClaSite::LANGUAGE_KEY => $this->language, ClaSite::LANGUAGE_ENCRYPTION => ClaSite::getLanguagePublicKey($this->language));
        return $this->getUrlManager()->createUrl($route, $params, $ampersand);
    }

    public function createAbsoluteUrl($route, $params = array(), $schema = '', $ampersand = '&') {
        if ($this->language && $this->language != 'vi' && $route && $route != '/' && $route != $this->defaultController && ClaSite::isMultiLanguage())
            $params = $params + array(ClaSite::LANGUAGE_KEY => $this->language, ClaSite::LANGUAGE_ENCRYPTION => ClaSite::getLanguagePublicKey($this->language));
        //
        $url = $this->createUrl($route, $params, $ampersand);
        if (strpos($url, 'http') === 0)
            return $url;
        else
            return $this->getRequest()->getHostInfo($schema) . $url;
    }
	
}
