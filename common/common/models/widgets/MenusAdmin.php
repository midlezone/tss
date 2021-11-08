<?php

/**
 *
 * The followings are the available columns in table 'menus':
 * @property integer $menu_id
 * @property integer $site_id
 * @property integer $user_id
 * @property string $menu_title
 * @property integer $parent_id
 * @property integer $menu_linkto
 * @property string $menu_link
 * @property string $menu_basepath
 * @property string $menu_pathparams
 * @property integer $menu_order
 * @property string $alias
 * @property integer $status
 * @property integer $menu_target
 * @property string $menu_values
 * @property integer $created_time
 * @property integer $modified_time
 * @property integer $modified_by
 * @property integer $menu_group
 */
class MenusAdmin extends ActiveRecord {

    const LINKTO_OUTER = 0;
    const LINKTO_INNER = 1;
    const TARGET_BLANK = 0;
    const TARGET_UNBLANK = 1;
    //
    const MENU_TYPE_MAIN = 1;
    const MENU_TYPE_CUSTOM = 0;
    //
    const MENUTYPE_MAX = 2;
    //
    const MENUTYPE_NORMAL = 1; // Normal as: about us, 
    const MENUTYPE_MODULE = 5; // Các controler trong module
    const MENUTYPE_POST = 6;  // Danh mục bài viết
    //
    //
    const MENUTYPE_OBJECT_NEWSCATEGORY = 5;
    const MENUTYPE_OBJECT_PRODUCTCATEGORY = 6;
    const MENUTYPE_OBJECT_NEWSDETAIL = 7;
    const MENUTYPE_OBJECT_PRODUCTDETAIL = 8;
    const MENUTYPE_OBJECT_POSTCATEGORY = 9;
    //
    const MENU_NONE = 0;
    const MENU_HOME = 1;
    const MENU_CONTACT = 2;
    const MENU_INTRODUCE = 3;
    const MENU_LOGIN = 4;
    const MENU_SIGNUP = 5;
    const MENU_FORGOTPASSS = 6;
    const MENU_PROFILE = 7;
    const MENU_NEWS = 8;
    const MENU_PRODUCT = 9;
    const MENU_INTRODUCEPAGE = 10;
    const MENU_ALBUM = 11;
    const MENU_VIDEO = 12;
    const MENU_DIRECT_LEFT = 'left';
    const MENU_DIRECT_RIGHT = 'right';
    const MENU_DEFAULT_LIMIT = 30;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return ClaTable::getTable('menus_admin');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('menu_title, menu_linkto, alias', 'required'),
            array('site_id, user_id, menu_linkto, menu_order, status, menu_target, created_time, modified_time, modified_by', 'numerical', 'integerOnly' => true),
            array('menu_title, menu_basepath', 'length', 'max' => 255),
            array('menu_link', 'length', 'max' => 5000),
            array('alias', 'length', 'max' => 500),
            array('menu_pathparams', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, alias, status, menu_target, created_time, modified_time, modified_by, menu_values, iconclass', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'menu_id' => 'Menu',
            'site_id' => 'Site',
            'user_id' => 'User',
            'menu_title' => Yii::t('menu', 'menu_title'),
            'parent_id' => Yii::t('menu', 'menu_parent'),
            'menu_linkto' => Yii::t('menu', 'menu_linkto'),
            'menu_link' => Yii::t('menu', 'menu_link'),
            'menu_basepath' => 'Base path',
            'menu_pathparams' => 'Params',
            'menu_order' => Yii::t('common', 'order'),
            'alias' => Yii::t('common', 'alias'),
            'status' => Yii::t('status', 'status'),
            'menu_target' => Yii::t('menu', 'menu_target'),
            'created_time' => 'Created Time',
            'modified_time' => 'Modified Time',
            'modified_by' => 'Modified By',
            'iconclass' => Yii::t('common', 'icon'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        $model = new MenusAdmin;
        $model->menu_target = MenusAdmin::TARGET_UNBLANK;
        $clamenu = new ClaAdminMenu(array(
            'create' => true,
            'showAll' => true,
        ));
        //
        $data = $clamenu->createArrayDataProvider(ClaAdminMenu::MENU_ROOT);
        //
        return new CArrayDataProvider($data, array(
            'id' => 'NewsCategories',
            'keyField' => 'cat_id',
            'keys' => array('cat_id'),
            'pagination' => array(
                'pageSize' => count($data),
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MenusAdmin the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    function beforeSave() {
        if ($this->isNewRecord) {
            $this->created_time = time();
            $this->user_id = Yii::app()->user->id;
            $this->modified_time = $this->created_time;
        } else {
            $this->modified_by = Yii::app()->user->id;
            $this->modified_time = time();
        }
        return parent::beforeSave();
    }

    /**
     * Sau khi xóa menu thì xóa các menu con của nó
     */
    function afterDelete() {
        $menus = self::model()->findAllByAttributes(array(
            'parent_id' => $this->menu_id,
        ));
        if ($menus) {
            foreach ($menus as $menu)
                $menu->delete();
        }
    }

    /**
     * get array link to
     * @return type
     */
    public static function getLinkToArr() {
        return array(
            self::LINKTO_OUTER => Yii::t('menu', 'menu_linkto_outer'),
            self::LINKTO_INNER => Yii::t('menu', 'menu_linkto_inner'),
        );
    }

    /**
     * get target arr
     * @return type
     */
    public static function getTagetArr() {
        return array(
            self::TARGET_UNBLANK => Yii::t('menu', 'menu_target_unblank'),
            self::TARGET_BLANK => Yii::t('menu', 'menu_target_blank'),
        );
    }

    /**
     * get Inner Link
     * @param type $options
     * @return type
     */
    static function getInnerLinks($options = array()) {
        $array = self::getNormalLink();
        if (!isset($options['siteinfo'])) {
            $options['siteinfo'] = Yii::app()->siteinfo;
        }
        $array = array_merge($array, self::getModuleLink());
        //
        $postcategories = self::getPostCategoryLink();
        if (count($postcategories)) {
            $array = array_merge($array, array(Yii::t('post', 'post_category') => $postcategories));
        }
        //
        return $array;
    }

    static function getModuleLink() {
        $return = array(
            Yii::t('menu', 'left_module_content') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'news.index')) => Yii::t('news', 'news_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'newscategory.index')) => Yii::t('news', 'news_category'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'categorypage.index')) => Yii::t('categorypage', 'categorypage_manager'),
            ),
            Yii::t('menu', 'left_module_product') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'product.index')) => Yii::t('product', 'product_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'productcategory.index')) => Yii::t('product', 'product_category'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'product.create')) => Yii::t('product', 'product_create'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'productAttribute.index')) => Yii::t('attribute', 'attribute'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'productAttributeSet.index')) => Yii::t('attribute_set', 'attribute_set'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'productgroups.index')) => Yii::t('product', 'product_group'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'promotion.index')) => Yii::t('product', 'promotion_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'manufacturer.index')) => Yii::t('product', 'manufacturer'),
            ),
            Yii::t('menu', 'left_module_realestate') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'realestate.index')) => Yii::t('realestate', 'realestate_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'realestate.projectIndex')) => Yii::t('realestate', 'list_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'realestateCategories.index')) => Yii::t('realestate', 'realestatenews_category'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'realestateNews.index')) => Yii::t('realestate', 'classifiedadvertising_manager'),
            ),
            Yii::t('menu', 'sms') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'smsCustomerGroup.index')) => Yii::t('sms', 'customer_group'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'smsCustomer.index')) => Yii::t('sms', 'customer'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'sms.index')) => Yii::t('sms', 'message_sended'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'sms.sendsms')) => Yii::t('sms', 'sendsms'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'smsPayment.index')) => Yii::t('sms', 'payment'),
            ),
            Yii::t('menu', 'left_module_user') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'users.index')) => Yii::t('user', 'manager_user_realestate'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'users.indexNormal')) => Yii::t('user', 'manager_user_normal'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'users.userIntroduce')) => Yii::t('realestate', 'user_netting'),
            ),
            Yii::t('banner', 'banner') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'banner.index')) => Yii::t('banner', 'banner_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'bannergroup.index')) => Yii::t('banner', 'banner_group_manager'),
            ),
            Yii::t('menu', 'left_module_media') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'album.index')) => Yii::t('album', 'album_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'albumsCategories.index')) => Yii::t('album', 'album_category_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'video.index')) => Yii::t('video', 'video_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'folder.index')) => Yii::t('file', 'folder_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'file.all')) => Yii::t('file', 'file_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'media.index')) => Yii::t('contact', 'site_contact_form'),
            ),
            Yii::t('common', 'interface') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'menugroup.index')) => Yii::t('menu', 'menu_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'sitesettings.contact')) => Yii::t('common', 'setting_contact'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'setting.map')) => Yii::t('map', 'map'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'sitesettings.footersetting')) => Yii::t('common', 'setting_footer'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'sitesettings.stylecustom')) => Yii::t('site', 'stylecustom'),
            ),
            Yii::t('common', 'setting') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'setting.index')) => Yii::t('common', 'setting_site'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'setting.domainsetting')) => Yii::t('domain', 'domain_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'setting.introduce')) => Yii::t('common', 'introduce'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'setting.support')) => Yii::t('site', 'site_support'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'site.createsitemap')) => Yii::t('site', 'site_createsitemap'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'widget.pagewidgetlist')) => Yii::t('common', 'page_widget_list'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'setting.payment')) => Yii::t('common', 'setting_payment'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'siteUsers.index')) => Yii::t('common', 'siteUsers'),
            ),
            Yii::t('common', 'customer') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'customform.statistic')) => Yii::t('common', 'contact'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'newsletter.index')) => Yii::t('news', 'newsletter'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'customform')) => Yii::t('form', 'form_manager'),
            ),
            Yii::t('shoppingcart', 'order') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'economy.order')) => Yii::t('shoppingcart', 'order_manager'),
            ),
            Yii::t('work', 'work') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'jobs.index')) => Yii::t('work', 'work_manager'),
            ),
            Yii::t('course', 'name') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'economy.courseCategories')) => Yii::t('course', 'course_category'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'economy.course')) => Yii::t('course', 'name'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'economy.lecturer')) => Yii::t('course', 'lecturer'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'economy.course.listRegister')) => Yii::t('course', 'course_register_list'),
            ),
            Yii::t('transportmethod', 'name') => array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'economy.transportmethod.index')) => Yii::t('transportmethod', 'transportmethod_index'),
            ),
        );
        if (Yii::app()->controller->site_id == ClaSite::ROOT_SITE_ID) {
            $return[Yii::t('common', 'setting')]+=array(
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'mailsettings.index')) => Yii::t('common', 'setting_mail'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'themesetting.index')) => Yii::t('theme', 'theme_manager'),
                json_encode(array('t' => self::MENUTYPE_MODULE, 'oi' => 'request.index')) => Yii::t('request', 'request_manager'),
            );
        }
        return $return;
    }

    /**
     * Get Normal link
     * @return type
     */
    static function getNormalLink() {
        return array(
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_NONE)) => Yii::t('menu', 'menu_link_none'),
        );
    }

    /**
     * get link of post categoríe
     * @return type
     */
    static function getPostCategoryLink() {
        //
        $results = array();
        //
        $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_POST, 'create' => true));
        //
        $listcate = $category->getListItems();
        foreach ($listcate as $cat_id => $catinfo) {
            $results[json_encode(array('t' => self::MENUTYPE_POST, 'ot' => self::MENUTYPE_OBJECT_POSTCATEGORY, 'oi' => $cat_id))] = $catinfo['cat_name'];
        }

        return $results;
    }

    /**
     * Get info of link
     * @param type $linkinfo
     * @return boolean
     */
    static function getMenuLinkInfo($linkinfo = array()) {
        if (!isset($linkinfo['t']))
            return false;
        $return = array('menu_pathparams' => json_encode(array()));
        switch ($linkinfo['t']) {
            case self::MENUTYPE_NORMAL: {
                    $return = self::getMenuLinkNormal($linkinfo);
                }break;
            case self::MENUTYPE_MODULE: {
                    $return = self::getModuleLinkInfo($linkinfo);
                }break;
            case self::MENUTYPE_POST: {
                    $return = self::getPostCategoryLinkInfo($linkinfo);
                }break;
        }

        return $return;
    }

    /**
     * return info of post category link
     * @param type $linkinfo
     */
    static function getPostCategoryLinkInfo($linkinfo = array()) {
        $oid = (int) $linkinfo['oi'];
        if (!isset($linkinfo['ot']) || !$oid)
            return false;
        $return = array();
        switch ($linkinfo['ot']) {
            case self::MENUTYPE_OBJECT_POSTCATEGORY: {
                    $postcate = PostCategories::model()->findByPk($oid);
                    if ($postcate) {
                        if ($postcate->site_id == Yii::app()->controller->site_id) {
                            $return = array(
                                'menu_basepath' => '/content/post/index',
                                'menu_pathparams' => json_encode(array(
                                    'cid' => $oid,
                                    'alias' => $postcate->alias,
                                )),
                            );
                        }
                    }
                }break;
        }
        return $return;
    }

    /**
     * get info of module link
     * @param type $linkinfo
     */
    static function getModuleLinkInfo($linkinfo = array()) {
        if (!isset($linkinfo['oi']))
            return false;
        $return = array();
        switch ($linkinfo['oi']) {
            case 'news.index': {
                    $return = array(
                        'menu_basepath' => 'content/news',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'newscategory.index': {
                    $return = array(
                        'menu_basepath' => 'content/newscategory',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'categorypage.index': {
                    $return = array(
                        'menu_basepath' => 'content/categorypage',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'product.index': {
                    $return = array(
                        'menu_basepath' => 'economy/product',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'productcategory.index': {
                    $return = array(
                        'menu_basepath' => 'economy/productcategory',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'product.create': {
                    $return = array(
                        'menu_basepath' => 'economy/product/create',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'banner.index': {
                    $return = array(
                        'menu_basepath' => 'banner/banner',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'bannergroup.index': {
                    $return = array(
                        'menu_basepath' => 'banner/bannergroup',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'album.index': {
                    $return = array(
                        'menu_basepath' => 'media/album',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'albumsCategories.index': {
                    $return = array(
                        'menu_basepath' => 'media/albumsCategories',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'video.index': {
                    $return = array(
                        'menu_basepath' => 'media/video',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'folder.index': {
                    $return = array(
                        'menu_basepath' => 'media/folder',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'file.all': {
                    $return = array(
                        'menu_basepath' => 'media/file/all',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'menugroup.index': {
                    $return = array(
                        'menu_basepath' => 'interface/menugroup',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'sitesettings.contact': {
                    $return = array(
                        'menu_basepath' => 'interface/sitesettings/contact',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'sitesettings.footersetting': {
                    $return = array(
                        'menu_basepath' => 'interface/sitesettings/footersetting',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'sitesettings.stylecustom': {
                    $return = array(
                        'menu_basepath' => 'interface/sitesettings/stylecustom',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'setting.index': {
                    $return = array(
                        'menu_basepath' => 'setting/setting',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'mailsettings.index': {
                    $return = array(
                        'menu_basepath' => 'setting/mailsettings',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'setting.domainsetting': {
                    $return = array(
                        'menu_basepath' => 'setting/setting/domainsetting',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'request.index': {
                    $return = array(
                        'menu_basepath' => 'manager/request',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'themesetting.index': {
                    $return = array(
                        'menu_basepath' => 'setting/themesetting',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'customform.statistic': {
                    $return = array(
                        'menu_basepath' => 'custom/customform/statistic',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'customform': {
                    $return = array(
                        'menu_basepath' => '/custom/customform',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'widget.index': {
                    $return = array(
                        'menu_basepath' => 'widget/widget',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'widget.pagewidgetlist': {
                    $return = array(
                        'menu_basepath' => 'widget/widget/pagewidgetlist',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'economy.order': {
                    $return = array(
                        'menu_basepath' => 'economy/order',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'jobs.index': {
                    $return = array(
                        'menu_basepath' => 'work/jobs',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'setting.map': {
                    $return = array(
                        'menu_basepath' => 'setting/map',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'setting.introduce': {
                    $return = array(
                        'menu_basepath' => 'setting/setting/introduce',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'productAttribute.index': {
                    $return = array(
                        'menu_basepath' => 'economy/productAttribute',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'productAttributeSet.index': {
                    $return = array(
                        'menu_basepath' => 'economy/productAttributeSet',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'productgroups.index': {
                    $return = array(
                        'menu_basepath' => 'economy/productgroups',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'promotion.index': {
                    $return = array(
                        'menu_basepath' => 'economy/promotion',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'manufacturer.index': {
                    $return = array(
                        'menu_basepath' => 'economy/manufacturer',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'newsletter.index': {
                    $return = array(
                        'menu_basepath' => 'content/newsletter',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'setting.support': {
                    $return = array(
                        'menu_basepath' => 'setting/support',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'site.createsitemap': {
                    $return = array(
                        'menu_basepath' => '/site/createsitemap',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'setting.payment': {
                    $return = array(
                        'menu_basepath' => 'setting/setting/payment',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'economy.courseCategories': {
                    $return = array(
                        'menu_basepath' => '/economy/courseCategories',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'economy.transportmethod.index': {
                    $return = array(
                        'menu_basepath' => '/economy/transportmethod',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'economy.course': {
                    $return = array(
                        'menu_basepath' => '/economy/course',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'economy.lecturer': {
                    $return = array(
                        'menu_basepath' => '/economy/lecturer',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'siteUsers.index': {
                    $return = array(
                        'menu_basepath' => '/economy/siteUsers',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'economy.course.listRegister': {
                    $return = array(
                        'menu_basepath' => '/economy/course/listRegister',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'media.index': {
                    $return = array(
                        'menu_basepath' => '/media/media/index',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'realestate.index': {
                    $return = array(
                        'menu_basepath' => '/content/realestate/index',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'realestate.projectIndex': {
                    $return = array(
                        'menu_basepath' => '/content/realestate/projectIndex',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'users.index': {
                    $return = array(
                        'menu_basepath' => '/content/users/index',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'users.indexNormal': {
                    $return = array(
                        'menu_basepath' => '/content/users/indexNormal',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'users.userIntroduce': {
                    $return = array(
                        'menu_basepath' => '/content/users/userIntroduce',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'realestateCategories.index': {
                    $return = array(
                        'menu_basepath' => '/content/realestateCategories/index',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'realestateNews.index': {
                    $return = array(
                        'menu_basepath' => '/content/realestateNews/index',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'smsCustomerGroup.index': {
                    $return = array(
                        'menu_basepath' => '/sms/smsCustomerGroup/index',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'smsCustomer.index': {
                    $return = array(
                        'menu_basepath' => '/sms/smsCustomer/index',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'sms.index': {
                    $return = array(
                        'menu_basepath' => '/sms/sms/index',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'sms.sendsms': {
                    $return = array(
                        'menu_basepath' => '/sms/sms/sendsms',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case 'smsPayment.index': {
                    $return = array(
                        'menu_basepath' => '/sms/smsPayment/index',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
        }
        return $return;
    }

    //
    /**
     * get Info of normal link
     * @param type $linkinfo
     * @return string|boolean
     */
    static function getMenuLinkNormal($linkinfo = array()) {
        if (!isset($linkinfo['oi']))
            return false;
        $return = array();
        switch ($linkinfo['oi']) {
            case self::MENU_NONE: {
                    $return = array(
                        'menu_basepath' => '',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_HOME: {
                    $return = array(
                        'menu_basepath' => '/',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_CONTACT: {
                    $return = array(
                        'menu_basepath' => '/site/site/contact',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_INTRODUCE: {
                    $return = array(
                        'menu_basepath' => '/site/site/introduce',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_LOGIN: {
                    $return = array(
                        'menu_basepath' => '/site/login/login',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_SIGNUP: {
                    $return = array(
                        'menu_basepath' => '/site/login/signup',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_FORGOTPASSS: {
                    $return = array(
                        'menu_basepath' => '/site/login/forgotpass',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_PROFILE: {
                    $return = array(
                        'menu_basepath' => '/profile/profile',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_NEWS: {
                    $return = array(
                        'menu_basepath' => '/news/news',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_INTRODUCEPAGE: {
                    $return = array(
                        'menu_basepath' => '/introduce/introduce',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_PRODUCT: {
                    $return = array(
                        'menu_basepath' => '/economy/product',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_ALBUM: {
                    $return = array(
                        'menu_basepath' => '/media/album/all',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_VIDEO: {
                    $return = array(
                        'menu_basepath' => '/media/video/all',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
        }
        return $return;
    }

    /**
     * get all menu of site
     * @param type $site_id
     * @return type
     */
    static function getAllMenuInSite($site_id = 0, $order = "menu_order") {
        $site_id = (int) $site_id;
        if (!$site_id)
            $site_id = Yii::app()->controller->site_id;
        $results = array();
//        if ($site_id) {
//            $results = Yii::app()->db->createCommand()->select()
//                    ->from(Yii::app()->params['tables']['menu_admin'])
//                    ->where('site_id=' . $site_id)
//                    ->order($order)
//                    ->queryAll();
//        }
        $clamenu = new ClaAdminMenu(array(
            'create' => true,
        ));
        $results = $clamenu->createArrayDataSequence(ClaAdminMenu::MENU_ROOT);
        //
        return $results;
    }

    /**
     * check url is active or not
     * @param type $url
     */
    static function checkActive($url, $options = array()) {
        $currenturl = '';
        if ($options['currenturl'])
            $currenturl = $options['currenturl'];
        else
            $currenturl = Yii::app()->request->requestUri;
        return (str_replace('/', '', $url) == str_replace('/', '', $currenturl)) ? true : false;
    }

    /**
     * Kiểm tra target và trả về mã
     * @param type $menu
     */
    static function getTarget($menu = null) {
        $target = '';
        if ($menu && isset($menu['menu_target'])) {
            if ($menu['menu_target'] == self::TARGET_BLANK) {
                $target = 'target="_blank"';
            }
        }
        return $target;
    }

    static function getDirectFromArr() {
        return array(
            self::MENU_DIRECT_LEFT => Yii::t('common', 'left'),
            self::MENU_DIRECT_RIGHT => Yii::t('common', 'right'),
        );
    }

    /**
     * prepare data
     * @param type $menu
     */
    static function prepareDataForBuild($menu = array(), $store = array()) {
        if (!isset($menu['menu_basepath']))
            return $menu;
        if (trim($menu['menu_basepath']) == '/content/post') {
            $menuparam = json_decode($menu['menu_pathparams'], true);
            if ($menuparam['cid']) {
                $category_id = $menuparam['cid'];
                $mysql_table = ClaTable::getTable('postcategory');
                $mysql_variable = $mysql_table . $category_id;
                //
                $menuparam['cid'] = 'msql_variable';
                $menu['menu_pathparams'] = json_encode($menuparam);
                $temp = explode('"msql_variable"', $menu['menu_pathparams']);
                if (isset($store[$mysql_table][$category_id]))
                    $menu['menu_pathparams'] = "CONCAT('" . implode("',@" . $mysql_variable . ",'", $temp) . "')";
                else
                    $menu['menu_pathparams'] = ClaGenerate::quoteValue('');
            }
        } else {
            $menu['menu_pathparams'] = ClaGenerate::quoteValue($menu['menu_pathparams']);
        }
        //
        return $menu;
    }

}
