<?php

/**
 * @author minhbn <minhcoltech@gmail.com>
 * @date 18-02-2014
 * 
 * Class for get info of site 
 * 
 */
class ClaSite {

    const CACHE_SITEINFO_PRE = 'siteinfo_';
    const CACHE_DOMAIN_PRE = 'domain_';
    const SITE_TYPE_NEWS = 1; // Site for news
    const SITE_TYPE_ECONOMY = 2; // Site for sale
    const SITE_TYPE_INTRODUCE = 3; // Site for introduce
    const SITE_TYPE_EDU = 4; // Site for edu
    const SITE_TYPE_B2B = 5; // Site for edu
    const SITE_TYPE_NEWS_NAME = 'news';
    const SITE_TYPE_ECONOMY_NAME = 'economy';
    const SITE_ADMIN_SESSION_NAME = 'admin_session';
    //
    const PAGE_VAR = 'page';
    const PAGE_SIZE_VAR = 'pageSize';
    const PAGE_SORT = 'sort';
    const PAGE_PRICE_FROM = 'fi_pmin';
    const PAGE_PRICE_TO = 'fi_pmax';
    //
    const SEARCH_KEYWORD = 'q';
    const SEARCH_TYPE = 't';
    const SEARCH_MIN_LENGHT = 2;
    const ROOT_SITE_ID = 1;
    const ADMIN_SESSION = 'website-user-session';
    const MOBILE_ALIAS = 'mobile';
    const MOBILE_DEFAULT_FOLDER = 'mobile_default';
    const LANGUAGE_KEY = 'lang';
    const LANGUAGE_ENCRYPTION = 'lang_enc';
    const PUBLIC_LANGUAGE_SESSION = 'p_lang_s';
    const BACK_LANGUAGE_SESSION = 'b_lang_s';
    const LANGUAGE_ACTION_KEY = 'actionKey';
    const SITE_STATUS_DISABLE = 20;

    /**
     * 
     * @return string demo domain
     */
    public static function getDemoDomain() {
        return DOMAIN_DEMO;
    }

    /**
     * validate domain is demo or not
     * @param type $name
     * @return boolean
     */
    public static function isDemoDomain($name = '') {
        if (!$name)
            $name = self::getServerName();
        $demondomain = self::getDemoDomain();
        if (strpos($name, $demondomain) !== false)
            return true;
        return false;
    }

    /**
     * Kiểm tra xem trang được vào bằng mobile hay không
     */
    static function isMobile() {
        if (isset(Yii::app()->isMobile))
            return Yii::app()->isMobile;
        //
        $mobile = new ClaMobileDetect();
        return $mobile->isMobile();
    }

    /**
     * Kiểm tra xem có show module hay không
     * @return boolean
     */
    public static function ShowModule() {
        $admin = self::getAdminSession();
        return (self::checkAdminSessionExist() && isset($admin['user_id']) && $admin['user_id'] . '' == ClaUser::getSupperAdmin());
    }

    /**
     * return urlManager rules for public application
     */
    static function getPublicSiteRules() {
        return array(
            Yii::t('url', 'checkout') => array('economy/shoppingcart/checkout', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'shoppingcart') => array('economy/shoppingcart', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'shoppingcarti') => array('economy/shoppingcart/index', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'site_request') => array('site/request/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'site_theme_order') . '-<theme>' => array('site/build/order', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'site_install') . '-<theme>' => array('site/build/install', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'choice_theme') => array('site/build/choicetheme', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'check_domain') => array('site/site/checkDomain', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'pricing') => array('site/site/pricing', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'jobs') => array('work/job', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'download') => array('media/media/folder', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'download_file') => array('media/media/downloadfile', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'statistic') => array('home/useraccess', 'urlSuffix' => '.jpg', 'caseSensitive' => false),
            Yii::t('url', 'search') => array('search/search/search', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'site_introduce') => array('site/site/introduce', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'contact') => array('site/site/contact', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'news') => array('news/news', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'newsi') => array('news/news/index', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'product') => array('economy/product/', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'lecturer') => array('economy/lecturer/', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'course') => array('economy/course/', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'site_contact_form') => array('media/media/siteContactForm', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'producti') => array('economy/product/index', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'album') => array('media/album/all', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'video') => array('media/video/all', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'login') => array('login/login/login', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'signup') => array('login/login/signup', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'site_error') => array('site/site/error', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'site_notfound') => array('site/site/notfound', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'list_realestate_project') => array('news/realestateProject/list', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'user_introduce') => array('login/login/userintroduce', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'classifiedadvertising') => array('news/realestate/classifiedAdvertising', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'realestate_news_create') => array('news/realestateNews/create', 'urlSuffix' => '', 'caseSensitive' => false),
            '<alias>-df,<fid>' => array('media/media/file', 'urlSuffix' => '', 'caseSensitive' => false), // quản lý file
            '<alias>-al,<id>' => array('media/album/detail', 'urlSuffix' => '', 'caseSensitive' => false), // album ảnh
            '<alias>-ac,<id>' => array('media/album/category', 'urlSuffix' => '', 'caseSensitive' => false), // album ảnh
            '<alias>-vd,<id>' => array('media/video/detail', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết video
            '<alias>-pc,<id>' => array('economy/product/category', 'urlSuffix' => '', 'caseSensitive' => false), // danh mục sản phẩm
            '<alias>-sc,<id>' => array('economy/shop/category', 'urlSuffix' => '', 'caseSensitive' => false), // danh mục sản phẩm
            '<alias>-pcs,<id>' => array('economy/product/categorySearch', 'urlSuffix' => '', 'caseSensitive' => false), // danh mục sản phẩm search
            '<alias>-pd,<id>' => array('economy/product/detail', 'urlSuffix' => '', 'caseSensitive' => false), // chi tiết sản phẩm
            '<alias>-sd,<id>' => array('economy/shop/detail', 'urlSuffix' => '', 'caseSensitive' => false), // chi tiết sản phẩm
            '<alias>-cd,<id>' => array('economy/course/detail', 'urlSuffix' => '', 'caseSensitive' => false), // chi tiết sản phẩm
            '<alias>-cc,<id>' => array('economy/course/category', 'urlSuffix' => '', 'caseSensitive' => false), // chi tiết sản phẩm
            '<alias>-prm,<id>' => array('/economy/product/promotion', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết khuyến mãi
            '<alias>-pg,<id>' => array('/economy/product/group', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết khuyến mãi
            '<alias>-pde,<id>' => array('page/category/detail', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết trang chuyên mục
            '<alias>-nc,<id>' => array('news/news/category', 'urlSuffix' => '', 'caseSensitive' => false), // danh mục tin tức
            '<alias>-nd,<id>' => array('news/news/detail', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết tin tức
            '<alias>-wj,<id>' => array('work/job/detail', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết tin tuyển dụng
            '<alias>-poc,<id>' => array('content/post/category', 'urlSuffix' => '', 'caseSensitive' => false), // Danh mục bài viết
            '<alias>-pod,<id>' => array('content/post/detail', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết bài viết
            '<alias>-led,<id>' => array('economy/lecturer/detail', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết giảng viên
            '<alias>-pred,<id>' => array('news/realestate/project', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết giảng viên
            '<alias>-red,<id>' => array('news/realestate/detail', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết giảng viên
            '<alias>-renc,<id>' => array('news/realestateNews/category', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết giảng viên
            '<alias>-rend,<id>' => array('news/realestateNews/detail', 'urlSuffix' => '', 'caseSensitive' => false), // Chi tiết giảng viên
            '<controller:\w+>/<id:\d+>' => '<controller>/view',
            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        );
    }

    /**
     * return urlManager rules for admin application
     */
    static function getAdminSiteRules() {
        return array(
            Yii::t('url', 'admin_news') => array('content/news', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_news_create') => array('content/news/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_news_update') => array('content/news/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_news_delete') => array('content/news/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_news_category') => array('content/newscategory', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_news_category_i') => array('content/newscategory/index', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_categorypage') => array('content/categorypage', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_categorypage_create') => array('content/categorypage/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_categorypage_update') => array('content/categorypage/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_categorypage_delete') => array('content/categorypage/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_product') => array('/economy/product', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_product_category') => array('/economy/productcategory', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_product_create') => array('/economy/product/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_product_update') => array('/economy/product/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_product_delete') => array('/economy/product/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_productattribute') => array('economy/productAttribute', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_productattribute_create') => array('economy/productAttribute/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_productattribute_update') => array('economy/productAttribute/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_productattribute_delete') => array('economy/productAttribute/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_productAttributeSet') => array('economy/productAttributeSet', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_productAttributeSet_create') => array('economy/productAttributeSet/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_productAttributeSet_update') => array('economy/productAttributeSet/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_productAttributeSet_delete') => array('economy/productAttributeSet/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_banner') => array('banner/banner', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_banner_create') => array('banner/banner/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_banner_update') => array('banner/banner/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_banner_delete') => array('banner/banner/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_bannergroup') => array('banner/bannergroup', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_bannergroup_create') => array('banner/bannergroup/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_bannergroup_update') => array('banner/bannergroup/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_bannergroup_delete') => array('banner/bannergroup/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_album') => array('media/album', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_album_create') => array('media/album/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_album_update') => array('media/album/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_album_delete') => array('media/album/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_file') => array('media/file/all', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_file_create') => array('media/file/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_file_update') => array('media/file/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_file_delete') => array('media/file/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_folder') => array('media/folder', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_folder_create') => array('media/folder/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_folder_update') => array('media/folder/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_folder_delete') => array('media/folder/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_video') => array('media/video', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_video_create') => array('media/video/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_video_update') => array('media/video/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_video_delete') => array('media/video/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_setting') => array('setting/setting', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_setting_payment') => array('setting/setting/payment', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_setting_introduce') => array('setting/setting/introduce', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_setting_domainsetting') => array('setting/setting/domainsetting', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_setting_deletedomain') => array('setting/setting/deletedomain', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_setting_changedomaindefault') => array('setting/setting/changedomaindefault', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_footersettings') => array('setting/footersettings', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_map') => array('setting/map', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_map_create') => array('setting/map/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_map_update') => array('setting/map/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_map_delete') => array('setting/map/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_jobs') => array('work/jobs', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_jobs_create') => array('work/jobs/create', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_jobs_update') => array('work/jobs/update', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_jobs_delete') => array('work/jobs/delete', 'urlSuffix' => '', 'caseSensitive' => false),
            Yii::t('url', 'admin_createsitemap') => array('/site/createsitemap', 'urlSuffix' => '', 'caseSensitive' => false),
//            '<controller:\w+>/<id:\d+>' => '<controller>/view',
//            '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//            '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        );
    }

    /**
     * 
     */
    public static function getDemoDataBaseConfig() {
        return array(
            'connectionString' => 'mysql:host=localhost;dbname=wmdemo',
            'username' => 'root',
            'password' => 'wm4E25w&w@5!0a',
        );
    }

    /**
     * return current server name
     */
    public static function getServerName() {
        $servername = Yii::app()->request->serverName;
        $servername = str_replace('www.', '', $servername);
        return $servername;
    }

    /**
     * Get domain info
     * @param type $domain
     * @return array
     */
    public static function getDomainInfo($domain = null) {
        if (!$domain)
            $domain = self::getServerName();
        $domaininfo = Yii::app()->cache->get(self::CACHE_DOMAIN_PRE . $domain);
        if (!$domaininfo) {
            $domaininfo = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('domain'))
                    ->where('domain_id=:domain_id', array(':domain_id' => $domain))
                    ->queryRow();
            if ($domaininfo)
                Yii::app()->cache->set('domain_' . $domain, $domaininfo);
        }
        return $domaininfo;
    }

    /**
     * Get site id from domain
     * @param type $domain
     */
    public static function getSiteIdFromDomain($domain = null) {
        $domaininfo = self::getDomainInfo($domain);
        if (!$domaininfo)
            return 0;
        return $domaininfo['site_id'];
    }

    /**
     * get current site id follow current domain
     */
    public static function getCurrentSiteId() {
        return self::getSiteIdFromDomain();
    }

    /**
     * get site info
     * @param type $site_id
     */
    public static function getSiteInfo($site_id = 0) {
        $site_id = (int) $site_id;
        if (!$site_id)
            $site_id = self::getSiteIdFromDomain();
        if ($site_id) {
            //
            $translate_language = self::getLanguageTranslate();
            //
            //Yii::app()->cache->delete(self::CACHE_SITEINFO_PRE . $site_id . $translate_language);
            $siteinfo = Yii::app()->cache->get(self::CACHE_SITEINFO_PRE . $site_id . $translate_language);
            //
            if (!$siteinfo) {
                $siteinfoNotranslate = Yii::app()->db->createCommand()->select("*")->from(ClaTable::getTable('site', array('translate' => false)))
                        ->where('site_id=:site_id', array(':site_id' => $site_id))
                        ->queryRow();
                if ($translate_language) {
                    $siteinfo_translate = Yii::app()->db->createCommand()->select("*")->from(ClaTable::getTable('site', array(ClaSite::LANGUAGE_KEY => $translate_language)))
                            ->where('site_id=:site_id', array(':site_id' => $site_id))
                            ->queryRow();
                    if (!$siteinfo_translate)
                        $siteinfo_translate = $siteinfoNotranslate;
                    $siteinfo = $siteinfo_translate;
                } else
                    $siteinfo = $siteinfoNotranslate;
                //
                if ($siteinfo)
                    Yii::app()->cache->set(self::CACHE_SITEINFO_PRE . $site_id . $translate_language, $siteinfo);
            }
            if ($siteinfo)
                return $siteinfo;
        }
        return array();
    }

    /**
     * get All type of site
     * @return type
     */
    static function getSiteTypes() {
        return array(
            self::SITE_TYPE_NEWS => Yii::t('site', 'site_type_news'),
            self::SITE_TYPE_ECONOMY => Yii::t('site', 'site_type_sale'),
            self::SITE_TYPE_INTRODUCE => Yii::t('site', 'site_type_introduce'),
            self::SITE_TYPE_EDU => Yii::t('site', 'site_type_edu'),
            self::SITE_TYPE_B2B => Yii::t('site', 'site_type_b2b'),
        );
    }

    /**
     * get All alias of site type
     * @return type
     */
    static function getSiteTypeAlias() {
        return array(
            self::SITE_TYPE_NEWS => 'news',
            self::SITE_TYPE_ECONOMY => 'economy',
            self::SITE_TYPE_INTRODUCE => 'introduce',
        );
    }

    /**
     * get site type name
     */
    static function getSiteTypeName($siteinfo = null) {
        if (!$siteinfo) {
            $siteinfo = self::getSiteInfo();
        }
        $sitetypealias = self::getSiteTypeAlias();
        return $sitetypealias[$siteinfo['site_type']];
    }

    /**
     * Get home key
     */
    static function getHomeKey($siteinfo = null) {
        if (!$siteinfo) {
            $siteinfo = self::getSiteInfo();
        }
        $key = '';
//        if($siteinfo['default_page_path'] != '') {
//            $key = Yii::app()->createUrl($siteinfo['default_page_path'], json_decode($siteinfo['default_page_params']));
//            $url = Yii::app()->getBaseUrl(true).$key;
//            Yii::app()->request->redirect($url);
//            return $key;
//        }
        switch ($siteinfo['site_type']) {
            case ClaSite::SITE_TYPE_NEWS: {
                    $key = 'news/news/home';
                }break;
            case ClaSite::SITE_TYPE_ECONOMY: {
                    $key = 'economy/product/home';
                }break;
            case ClaSite::SITE_TYPE_INTRODUCE: {
                    $key = 'introduce/introduce/';
                }break;
        }
        return $key;
    }

    /**
     * get default controller
     * @param type $siteinfo
     * @return type
     */
    static function getDefaultController($siteinfo = null) {
        return self::getHomeKey($siteinfo);
    }

    /**
     * get link key
     */
    static function getLinkKey($options = array()) {
        $module = isset(Yii::app()->controller->module->id) ? Yii::app()->controller->module->id . '/' : '';
        $controller = isset(Yii::app()->controller->id) ? Yii::app()->controller->id . '/' : '';
        $action = (isset(Yii::app()->controller->action->id) && Yii::app()->controller->action->id != 'index') ? Yii::app()->controller->action->id : '';
        $key = $module . $controller . $action;
        // Nếu là trang chuyên mục thì phân biệt thành các trang khác nhau
        if ($module == 'page/' && $controller == 'category/')
            array_push($options, Yii::app()->request->getParam('id'));
        //
        foreach ($options as $val) {
            $key.='_' . $val;
        }
        return $key;
    }

    /**
     * Get full curent url
     * @return type
     */
    static function getFullCurrentUrl() {
        return Yii::app()->request->hostInfo . Yii::app()->request->url;
    }

    /**
     * return id of web3nhat
     * @return type
     */
    static function getRootSiteId() {
        return self::ROOT_SITE_ID;
    }

    /**
     * 
     * @param type $isFull
     * @return type
     */
    static function getHttpMethod($isFull = true) {
        if (Yii::app()->request->getIsSecureConnection())
            $http = 'https';
        else
            $http = 'http';
        $httpString = '';
        if ($isFull)
            $httpString = $http . '://';
        else
            $httpString = $http;
        return $httpString;
    }

    static function getAdminEntry() {
        return 'quantri';
    }

    //
    static function checkAdminSessionExist() {
        $cookie = Yii::app()->request->cookies[self::ADMIN_SESSION];
        return (isset($cookie) && $cookie) ? true : false;
    }

    // create admin session
    static function generateAdminSession($options = array()) {
        if (!Yii::app()->user->isGuest) {
            $cookie = new CHttpCookie(self::ADMIN_SESSION, json_encode(array(
                        'user_id' => Yii::app()->user->id,
                        'name' => Yii::app()->user->name,
                        'website' => Yii::app()->homeUrl,
            )));
            $cookie->expire = (isset($options['rememberMe']) && $options['rememberMe']) ? (time() + (30 * 24 * 60 * 60)) : 0;
            self::setAdminSession($cookie);
        }
    }

    // return admin session
    static function getAdminSession() {
        $cookie = Yii::app()->request->cookies[self::ADMIN_SESSION];
        if ($cookie)
            return json_decode($cookie, true);
        return false;
    }

    // set admin session
    static function setAdminSession($cookie = null) {
        if ($cookie) {
            Yii::app()->request->cookies[self::ADMIN_SESSION] = $cookie;
        }
    }

    // delete admin session
    static function deleteAdminSession() {
        unset(Yii::app()->request->cookies[self::ADMIN_SESSION]);
        setcookie(self::ADMIN_SESSION, null, -1);
    }

    /**
     * get site map data from menu
     * @return string
     */
    static function getSiteMapDataFromMenu($siteinfo = array()) {
        $menus = Menus::getAllMenuInSite();
        $defaultDomain = isset($siteinfo['domain_default']) ? $siteinfo['domain_default'] : '';
        $hostInfo = ($defaultDomain) ? self::getHttpMethod() . $defaultDomain : Yii::app()->request->hostInfo;
        $temp = array();
        $str = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $str.='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:mobile="http://www.google.com/schemas/sitemap-mobile/1.0">' . "\n";
        // trang chủ
        $str.='<url>' . '
    <loc>' . $hostInfo . '</loc>' . '
    <changefreq>daily</changefreq>' . '
    <priority>0.5000</priority>' . '
</url>' . "\n";
        $temp[$hostInfo] = true;
        //
        foreach ($menus as $menu) {
            $url = '';
            if (($menu['menu_basepath'] || $menu['menu_pathparams']) && $menu['menu_linkto'] == Menus::LINKTO_INNER) {
                //$url = Yii::app()->createAbsoluteUrl($menu['menu_basepath'], json_decode($menu['menu_pathparams'], true));
                $claApi = new ClaAPI(array(
                    'domain' => $defaultDomain
                ));
                $respon = $claApi->createUrl(array('basepath' => $menu['menu_basepath'], 'params' => $menu['menu_pathparams'], 'absolute' => true));
                $claApi->closeRequest();
                if ($respon && isset($respon['url'])) {
                    $url = $respon['url'];
                }
            } else {
                if ($menu['menu_link'] && strpos($menu['menu_link'], $defaultDomain) !== false)
                    $url = $menu['menu_link'];
            }
            //
            if (!$url)
                continue;
            if (isset($temp[$url]))
                continue;
            //
            $str.='<url>' . '
    <loc>' . $url . '</loc>' . '
    <changefreq>daily</changefreq>' . '
    <priority>0.5000</priority>' . '
</url>' . "\n";
            $temp[$url] = true;
        }
        $str.='</urlset>' . "\n";
        unset($temp);
        //
        return $str;
    }

    // create site map from MENU
    static function createSiteMapFromMenu() {
        // Lấy lại site info ko dùng Yii::app()->siteinfo['domain_default']
        $siteInfo = self::getSiteInfo();
        //
        $data = self::getSiteMapDataFromMenu($siteInfo);
        //
        $file = Yii::getPathOfAlias('common') . '/../' . 'sitemap' . '/' . $siteInfo['domain_default'] . '_sitemap.xml';
        if (file_put_contents($file, $data)) {
            @chmod($file, 0777);
            return true;
        }
        return false;
    }

    // create robot.txt file
    static function createSiteRobot($siteInfo = null) {
        // Lấy lại site info ko dùng Yii::app()->siteinfo['domain_default']
        if (!$siteInfo)
            $siteInfo = self::getSiteInfo();
        //
        $data = '# Robots.txt' . "\n";
        $data.='User-agent: *' . "\n";
        $data.='Disallow: /images/' . "\n";
        //$data.='Disallow: /css/' . "\n";
        //$data.='Disallow: /js/' . "\n";
        $data.='Disallow: /dang-nhap' . "\n";
        $data.='Disallow: /dang-ky' . "\n";
        $data.='Disallow: /gio-hang' . "\n";
        $data.='Disallow: /gioi-thieu' . "\n";
        $data.='Disallow: /tuyen-dung' . "\n";
        $data.='Disallow: /album' . "\n";
        $data.='Disallow: /video' . "\n";
        $data.='Disallow: /gioi-thieu' . "\n";
        $data.='Sitemap: ' . self::getHttpMethod() . $siteInfo['domain_default'] . '/sitemap.xml' . "\n";
        //
        $file = Yii::getPathOfAlias('common') . '/../' . 'robots' . '/' . $siteInfo['domain_default'] . '_robots.txt';
        if (file_put_contents($file, $data)) {
            @chmod($file, 0777);
            return true;
        }
        return false;
    }

    /**
     * Return language which need
     */
    static function getLanguageTranslate($language = '') {
        // Nếu có language session thì lấy language session
        $appId = Yii::app()->getId();
        if ($appId == 'public') {
            $language = ClaSite::getPublicLanguage();
        } else
            $language = ClaSite::getBackLanguage();
        //
        $languageSupport = self::getLanguageSupport();
        if (isset($languageSupport[$language]))
            return $language;
        return '';
    }

    /**
     * return language was support
     */
    static function getLanguageSupport() {
        return Yii::app()->params['languages'];
    }

    /**
     * Check site is multi language
     * @return boolean
     */
    static function isMultiLanguage() {
        if (isset(Yii::app()->siteinfo['languages_for_site']) && Yii::app()->siteinfo['languages_for_site'] != '') {
            return true;
        }
        return false;
    }

    /**
     * check show translate button
     * @return boolean
     */
    static function showTranslateButton() {
        if (self::isMultiLanguage()) {
            $appId = Yii::app()->getId();

            if ($appId == 'public') {
                $language = ClaSite::getPublicLanguage();
            } else {
                $language = ClaSite::getBackLanguage();
            }
            if ($language && $language != 'vi') {
                return false;
            }
            return true;
        }
        return false;
    }

    /**
     * return languages for site
     */
    static function getLanguagesForSite() {
        $languages = array();
        $_languages = (isset(Yii::app()->siteinfo['languages_for_site']) && Yii::app()->siteinfo['languages_for_site'] != '') ? Yii::app()->siteinfo['languages_for_site'] : '';
        $languages_for_sites = explode(' ', $_languages);
        if ($languages_for_sites && is_array($languages_for_sites)) {
            foreach ($languages_for_sites as $lfs)
                $languages[$lfs] = $lfs;
        }
        return $languages;
    }

    /**
     * 
     * @param type $language
     */
    static function setPublicLanguageSession($language = '') {
        $languages = self::getLanguageSupport();
        if ($language && isset($languages[$language])) {
            Yii::app()->session[self::PUBLIC_LANGUAGE_SESSION] = $language;
            return true;
        }
        return false;
    }

    /**
     * 
     * @param type $language
     */
    static function getPublicLanguageSession() {
        $language = false;
        if (isset(Yii::app()->session[self::PUBLIC_LANGUAGE_SESSION]))
            $language = Yii::app()->session[self::PUBLIC_LANGUAGE_SESSION];
        return $language;
    }

    /**
     * return language of font-end
     */
    static function getPublicLanguage() {
        $language = Yii::app()->request->getParam(ClaSite::LANGUAGE_KEY);
        if (!$language) {
            $language = isset(Yii::app()->session[self::PUBLIC_LANGUAGE_SESSION]) ? Yii::app()->session[self::PUBLIC_LANGUAGE_SESSION] : '';
        } else {
            $language_encryption = Yii::app()->request->getParam(ClaSite::LANGUAGE_ENCRYPTION);
            if ($language_encryption != self::getLanguagePublicKey($language))
                $language = '';
            elseif (!isset(Yii::app()->session[self::PUBLIC_LANGUAGE_SESSION]) && ClaSite::isMultiLanguage())
                self::setPublicLanguageSession($language);
        }
        if ($language == 'vi')
            $language = '';
        return $language;
    }

    /**
     * 
     * @param type $language
     */
    static function setBackLanguageSession($language = '') {
        $languages = self::getLanguageSupport();
        if ($language && isset($languages[$language]))
            Yii::app()->session[self::BACK_LANGUAGE_SESSION] = $language;
    }

    /**
     * 
     * @param type $language
     */
    static function getBackLanguageSession() {
        $language = false;
        if (isset(Yii::app()->session[self::BACK_LANGUAGE_SESSION]))
            $language = Yii::app()->session[self::BACK_LANGUAGE_SESSION];
        return $language;
    }

    /**
     * return language of font-endF
     */
    static function getBackLanguage() {
        $language = Yii::app()->request->getParam(ClaSite::LANGUAGE_KEY);
        if (!$language) {
            $language = isset(Yii::app()->session[self::BACK_LANGUAGE_SESSION]) ? Yii::app()->session[self::BACK_LANGUAGE_SESSION] : '';
        } else {
            $language_encryption = Yii::app()->request->getParam(ClaSite::LANGUAGE_ENCRYPTION);
            if ($language_encryption != self::getLanguagePublicKey($language))
                $language = '';
        }
        return $language;
    }

    /**
     * trả về một public key cho dùng 
     * @param type $language
     */
    static function getLanguagePublicKey($language = '') {
        $key = self::getServerName();
        if ($language) {
            $key = md5($key . sha1($language . $key));
        }
        return $key;
    }

    /**
     * Kiểm tra xem đã hết hạn hay chưa
     */
    static function isExpiryDate() {
        if (ClaUser::isSupperAdmin())
            return false;
        if (Yii::app()->siteinfo['expiration_date'] && ((int) Yii::app()->siteinfo['expiration_date'] < time()))
            return true;
        return false;
    }

    //
}
