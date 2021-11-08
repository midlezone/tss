<?php

/**
 * Description of PublicWebApplication
 *
 * @author minhbn
 * @property array $siteinfo
 */
class BackofficeWebApplication extends WebApplication {

    public $siteinfo = array();
    public $themeinfo = array();
    public $isDemo = false;

    //put your code here
    protected function init() {
        // change db
        if (ClaSite::isDemoDomain()) {
            $this->db->setActive(false);
            $this->db->connectionString = 'mysql:host=localhost;dbname=wmdemo';
            $this->db->username = 'root';
            $this->db->password = 'wm4E25w&w@5!0a';
            $this->db->setActive(true);
            $this->isDemo = true;
			//
			Yii::app()->cache->keyPrefix = 'demo';
        }
        //
         $this->siteinfo = ClaSite::getSiteInfo();
        if (!$this->siteinfo || !count($this->siteinfo))
            Yii::app()->end();
        if ($this->siteinfo['admin_language'])
            $this->language = $this->siteinfo['admin_language'];
		
        if ($this->siteinfo['site_title'])
            $this->name = Yii::app()->siteinfo['site_title'];
        if ($this->siteinfo['site_skin']) {
            $theme = Themes::model()->findByPk($this->siteinfo['site_skin']);
            if ($theme) {
                //$theme->rules = json_decode($theme->rules,true);
                $this->themeinfo = $theme->attributes;
            }
        }
//        if (isset($this->siteinfo['widgets']))
//            $this->siteinfo['widgets'] = json_decode($this->siteinfo['widgets'], true);
        if ($this->siteinfo['site_type'] == ClaSite::SITE_TYPE_ECONOMY || (isset($this->siteinfo['admin_default']) && $this->siteinfo['admin_default']=='economy'))
            $this->defaultController = 'economy/product';
        else
            $this->defaultController = 'content/news';
        //
        // if (!Yii::app()->request->isAjaxRequest) {
            // if ($this->siteinfo['domain_default'] != ClaSite::getServerName()) {
                // header("HTTP/1.1 301 Moved Permanently");
                // header("Location: http://" . $this->siteinfo['domain_default'] . Yii::app()->request->requestUri);
            // }
        // }
		// load url rules
        $this->urlManager->addRules(ClaSite::getAdminSiteRules());
        //
        return parent::init();
    }

}
