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
 * @property string $icon_path
 * @property string $icon_name
 * @property string $background_path
 * @property string $background_name
 */
class Menus extends ActiveRecord {

    const LINKTO_OUTER = 0;
    const LINKTO_INNER = 1;
    const TARGET_BLANK = 0;
    const TARGET_UNBLANK = 1;
    const FILE_SIZE_MIN = 1; // file size min 1bit 
    const FILE_SIZE_MAX = 200000; // file size max 100Kb
    // group for menu
    //const MENU_GROUP_MAIN = 1;
    //const MENU_GrOUP_FOOTER = 2;
    //
    const MENU_TYPE_MAIN = 1;
    const MENU_TYPE_CUSTOM = 0;
    //
    const MENUTYPE_MAX = 2;
    //
    const MENUTYPE_NORMAL = 1; // Normal as: about us, 
    const MENUTYPE_NEWS = 2; // News
    const MENUTYPE_PRODUCT = 4; // Product
    const MENUTYPE_CATEGORYPAGE = 3; // Trang chuyên mục
    const MENUTYPE_POST = 9; // Post
    const MENUTYPE_ALBUMS = 17; // Albums
    const MENUTYPE_COURSE = 18; // Course
    const MENUTYPE_REALESTATE = 19; // Bất động sản
    const MENUTYPE_REALESTATENEWS = 20; // Tin bất động sản rao vặt
    //
    //
    const MENUTYPE_OBJECT_NEWSCATEGORY = 5;
    const MENUTYPE_OBJECT_PRODUCTCATEGORY = 6;
    const MENUTYPE_OBJECT_NEWSDETAIL = 7;
    const MENUTYPE_OBJECT_PRODUCTDETAIL = 8;
    const MENUTYPE_OBJECT_PRODUCTGROUP = 81;
    const MENUTYPE_OBJECT_POSTCATEGORY = 91;
    const MENUTYPE_OBJECT_POSTDETAIL = 92;
    const MENUTYPE_OBJECT_ALBUMSCATEGORY = 97;
    const MENUTYPE_OBJECT_COURSECATEGORY = 98;
    const MENUTYPE_OBJECT_REALESTATECATEGORY = 99;
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
    const MENU_WORK = 13;
    const MENU_PRICING = 19;
    const MENU_CHOICETHEME = 20;
    const MENU_FOLDER = 21;
    const MENU_COURSE = 29;
    const MENU_SITE_CONTACT_FORM = 30;
    const MENU_LECTURER = 31;
    const MENU_REALESTATE_PROJECT = 32;
    const MENU_REALESTATE_CREATE = 33;
    const MENU_REALESTATE_PROJECT_CREATE = 34;
    const MENU_REALESTATE_ADVERTISING = 35;
    const MENU_TOUR = 36;
    //
    const MENU_DIRECT_LEFT = 'left';
    const MENU_DIRECT_RIGHT = 'right';
    const MENU_DEFAULT_LIMIT = 200;
    const MENU_COLSMAX = 12;

    public $iconFile = '';
    public $backgroundFile = '';

    //
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('menus');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('menu_title, menu_linkto,menu_group', 'required'),
            array('site_id, user_id, menu_linkto, menu_order, status, menu_target, created_time, modified_time, modified_by', 'numerical', 'integerOnly' => true),
            array('menu_title, menu_basepath', 'length', 'max' => 255),
            array('menu_link', 'length', 'max' => 5000),
            array('alias', 'length', 'max' => 500),
            array('alias', 'isAlias'),
            array('menu_pathparams', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('menu_id, site_id, user_id, menu_title, parent_id, menu_linkto, menu_link, menu_basepath, menu_pathparams, menu_order, alias, status, menu_target, created_time, modified_time, modified_by, menu_values, menu_group, description, is_default_page, type_site', 'safe'),
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
            'menu_group' => Yii::t('menu', 'menu_group'),
            'iconFile' => Yii::t('menu', 'iconFile'),
            'backgroundFile' => Yii::t('menu', 'backgroundFile'),
            'description' => Yii::t('common', 'description'),
            'is_default_page' => Yii::t('setting', 'is_default_page'),
            'type_site' => Yii::t('site', 'type_site'),
        );
    }

    /**
     * Cho phép những loại file nào
     * @return type
     */
    static function allowExtensions() {
        return array(
            'image/jpeg' => 'image/jpeg',
            'image/gif' => 'image/gif',
            'image/png' => 'image/png',
            'image/bmp' => 'image/bmp',
            'image/x-icon' => 'image/x-icon',
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
        $model = new Menus;
        $model->menu_target = Menus::TARGET_UNBLANK;
        $clamenu = new ClaMenu(array(
            'create' => true,
            'group_id' => $this->menu_group,
            'showAll' => true,
        ));
        //
        $data = $clamenu->createArrayDataProvider(ClaMenu::MENU_ROOT);
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
     * @return Menus the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    function beforeSave() {
        $this->site_id = Yii::app()->controller->site_id;
        if ($this->isNewRecord) {
            $this->created_time = time();
            $this->user_id = Yii::app()->user->id;
            $this->modified_time = $this->created_time;
        } else {
            if (ClaSite::isDemoDomain()) {
                $this->created_time = time();
            }
            $this->modified_by = Yii::app()->user->id;
            $this->modified_time = time();
            if (!trim($this->alias) && $this->menu_title)
                $this->alias = HtmlFormat::parseToAlias($this->menu_title);
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

    static function getMenuGroupArr() {
        $results = array();
        $groups = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('menu_group'))
                ->where('site_id=' . Yii::app()->siteinfo['site_id'])
                ->queryAll();
        foreach ($groups as $group) {
            $results[$group['menu_group_id']] = $group['menu_group_name'];
        }
        //
        return $results;
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
        $array[Yii::t('menu', 'menu_type_normal')] = self::getNormalLink();
        $array[Yii::t('realestate', 'realestate')] = self::getRealestateLink();
		
        if (!isset($options['siteinfo']))
            $options['siteinfo'] = Yii::app()->siteinfo;
	
        $array = array_merge($array, self::getLinkFollowSiteType($options['siteinfo']['site_type']));
        $categoriespage = self::getCategoryPageLink();
        if (count($categoriespage))
            $array = array_merge($array, array(Yii::t('menu', 'menu_type_categorypage') => $categoriespage));
	
		
        return $array;
    }

    /**
     * Get Normal link
     * @return type
     */
    static function getNormalLink() {
        $normal = array(
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_NONE)) => Yii::t('menu', 'menu_link_none'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_HOME)) => Yii::t('menu', 'menu_link_home'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_CONTACT)) => Yii::t('menu', 'menu_link_contact'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_INTRODUCE)) => Yii::t('menu', 'menu_link_introduce'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_WORK)) => Yii::t('menu', 'menu_link_work'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_LOGIN)) => Yii::t('menu', 'menu_link_login'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_SIGNUP)) => Yii::t('menu', 'menu_link_signup'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_FORGOTPASSS)) => Yii::t('menu', 'menu_link_forgotpass'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_PROFILE)) => Yii::t('menu', 'menu_link_profile'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_NEWS)) => Yii::t('menu', 'menu_link_news'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_PRODUCT)) => Yii::t('menu', 'menu_link_product'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_LECTURER)) => Yii::t('menu', 'menu_link_lecturer'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_COURSE)) => Yii::t('menu', 'menu_link_course'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_ALBUM)) => Yii::t('menu', 'menu_link_album'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_VIDEO)) => Yii::t('menu', 'menu_link_video'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_FOLDER)) => Yii::t('menu', 'menu_link_folder'),
            json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_SITE_CONTACT_FORM)) => Yii::t('menu', 'form_site_contact'),
			json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_TOUR)) => Yii::t('menu', 'Trang Tour'),

        );
        if (Yii::app()->controller->site_id == ClaSite::ROOT_SITE_ID) {
            $normal +=array(
                json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_CHOICETHEME)) => Yii::t('common', 'choicetheme'),
                json_encode(array('t' => self::MENUTYPE_NORMAL, 'oi' => self::MENU_PRICING)) => Yii::t('common', 'pricing'),
            );
        }
        return $normal;
    }

    static function getRealestateLink() {
        $realestate = array(
            json_encode(array('t' => self::MENUTYPE_REALESTATE, 'oi' => self::MENU_REALESTATE_PROJECT)) => Yii::t('realestate', 'page_realestate_project'),
            json_encode(array('t' => self::MENUTYPE_REALESTATE, 'oi' => self::MENU_REALESTATE_PROJECT_CREATE)) => Yii::t('realestate', 'realestate_project_create'),
            json_encode(array('t' => self::MENUTYPE_REALESTATE, 'oi' => self::MENU_REALESTATE_CREATE)) => Yii::t('realestate', 'realestate_create'),
            json_encode(array('t' => self::MENUTYPE_REALESTATE, 'oi' => self::MENU_REALESTATE_ADVERTISING)) => Yii::t('realestate', 'classifiedadvertising'),
        );
        return $realestate;
    }

    /**
     *  get category page link, link đến trang chuyên mục
     * @return type
     */
    static function getCategoryPageLink() {
        $results = array();
        $listpage = CategoryPage::getAllCategoryPage();
        foreach ($listpage as $pa) {
            $results[json_encode(array('t' => self::MENUTYPE_CATEGORYPAGE, 'oi' => (int) $pa['id']))] = $pa['title'];
        }
        return $results;
    }

    /**
     * get link follow site type
     * @param type $site_type
     * @param type $siteinfo
     * @return array
     */
    static function getLinkFollowSiteType($site_type = 0, $siteinfo = array()) {
        $site_type = (int) $site_type;
        $results = array();
        if (!$site_type)
            return $results;
        switch ($site_type) {
            case ClaSite::SITE_TYPE_ECONOMY:
            case ClaSite::SITE_TYPE_INTRODUCE: {
                    $newscategories = self::getNewsCategoryLink();
                    if ($newscategories && count($newscategories))
                        $results[Yii::t('news', 'news_category')] = $newscategories;
                    $productcategories = self::getProductCategoryLink();
                    if (count($productcategories))
                        $results[Yii::t('product', 'product_category')] = $productcategories;
                    $groups = self::getProductGroupLink();
                    if (count($groups))
                        $results[Yii::t('product', 'product_group')] = $groups;
                    //
                    $news = self::getNewsDetailLink();
                    if (count($news))
                        $results[Yii::t('news', 'news_detail')] = $news;
                    // get menu albums category
                    $albumscategories = self::getAlbumsCategoryLink();
                    if ($albumscategories && count($albumscategories)) {
                        $results[Yii::t('album', 'album_category')] = $albumscategories;
                    }
                    // get menu course category
                    $coursecategories = self::getCourseCategoryLink();
                    if ($coursecategories && count($coursecategories)) {
                        $results[Yii::t('course', 'course_category')] = $coursecategories;
                    }
                    $realestatecategories = self::getRealestateCategoryLink();
                    if ($realestatecategories && count($realestatecategories)) {
                        $results[Yii::t('realestate', 'realestate_category')] = $realestatecategories;
                    }
                }
            case ClaSite::SITE_TYPE_NEWS: {
                    $newscategories = self::getNewsCategoryLink();
                    if (count($newscategories))
                        $results[Yii::t('news', 'news_category')] = $newscategories;
                    $news = self::getNewsDetailLink();
                    if (count($news))
                        $results[Yii::t('news', 'news_detail')] = $news;
                }break;
        }

        $postcategories = self::getPostCategoryLink();
        if (count($postcategories))
            $results[Yii::t('post', 'post_category')] = $postcategories;
        //
        return $results;
    }

    /**
     * get link of post categoríe
     * @return type
     */
    static function getPostCategoryLink() {
        //
        $results = array();
        //
        $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_POST, 'showAll' => true, 'create' => true));
        //
        //
        $listcate = $category->createOptionArray();
        $listcate = ClaArray::removeFirstElement($listcate);
        //
        foreach ($listcate as $cat_id => $catname) {
            $results[json_encode(array('t' => self::MENUTYPE_POST, 'ot' => self::MENUTYPE_OBJECT_POSTCATEGORY, 'oi' => (int) $cat_id))] = $catname;
        }

        return $results;
    }

    /**
     * get link of news categoríe
     * @return type
     */
    static function getNewsCategoryLink() {
        //
        $results = array();
        //
        $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_NEWS, 'showAll' => true, 'create' => true));
        //
        //
        $listcate = $category->createOptionArray();
        $listcate = ClaArray::removeFirstElement($listcate);
        //
        foreach ($listcate as $cat_id => $catname) {
            $results[json_encode(array('t' => self::MENUTYPE_NEWS, 'ot' => self::MENUTYPE_OBJECT_NEWSCATEGORY, 'oi' => (int) $cat_id))] = $catname;
        }

        return $results;
    }

    /**
     * get link of albums categories
     */
    static function getAlbumsCategoryLink() {
        $results = array();
        $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_ALBUMS, 'showAll' => true, 'create' => true));
        $listcate = $category->createOptionArray();
        $listcate = ClaArray::removeFirstElement($listcate);

        foreach ($listcate as $cat_id => $catname) {
            $results[json_encode(array('t' => self::MENUTYPE_ALBUMS, 'ot' => self::MENUTYPE_OBJECT_ALBUMSCATEGORY, 'oi' => (int) $cat_id))] = $catname;
        }

        return $results;
    }

    /**
     * get link of course categories
     */
    static function getCourseCategoryLink() {
        $results = array();
        $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_COURSE, 'showAll' => true, 'create' => true));
        $listcate = $category->createOptionArray();
        $listcate = ClaArray::removeFirstElement($listcate);

        foreach ($listcate as $cat_id => $catname) {
            $results[json_encode(array('t' => self::MENUTYPE_COURSE, 'ot' => self::MENUTYPE_OBJECT_COURSECATEGORY, 'oi' => (int) $cat_id))] = $catname;
        }

        return $results;
    }

    /**
     * get link of realestate categories
     */
    static function getRealestateCategoryLink() {
        $results = array();
        $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_REAL_ESTATE, 'showAll' => true, 'create' => true));
        $listcate = $category->createOptionArray();
        $listcate = ClaArray::removeFirstElement($listcate);

        foreach ($listcate as $cat_id => $catname) {
            $results[json_encode(array('t' => self::MENUTYPE_REALESTATENEWS, 'ot' => self::MENUTYPE_OBJECT_REALESTATECATEGORY, 'oi' => (int) $cat_id))] = $catname;
        }

        return $results;
    }

    /**
     * Lấy link đến chi tiết tin tức
     */
    static function getNewsDetailLink() {
        $news = News::getNewNews(array('limit' => self::MENU_DEFAULT_LIMIT));
        //
        $results = array();
        //
        foreach ($news as $news_id => $ne) {
            $results[json_encode(array('t' => self::MENUTYPE_NEWS, 'ot' => self::MENUTYPE_OBJECT_NEWSDETAIL, 'oi' => (int) $ne['news_id']))] = $ne['news_title'];
        }
        return $results;
    }

    /**
     * get link of news categoríe
     * @return type
     */
    static function getProductCategoryLink() {
        //
        $results = array();
        //
        $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_PRODUCT, 'showAll' => true, 'create' => true));
        //
        $listcate = $category->createOptionArray();
        $listcate = ClaArray::removeFirstElement($listcate);
        //
        foreach ($listcate as $cat_id => $catname) {
            $results[json_encode(array('t' => self::MENUTYPE_PRODUCT, 'ot' => self::MENUTYPE_OBJECT_PRODUCTCATEGORY, 'oi' => (int) $cat_id))] = $catname;
        }

        return $results;
    }

    static function getProductGroupLink() {
        //
        $results = array();
        //
        $groups = ProductGroups::getProductGroupArr();
        foreach ($groups as $group_id => $group_name) {
            $results[json_encode(array('t' => self::MENUTYPE_PRODUCT, 'ot' => self::MENUTYPE_OBJECT_PRODUCTGROUP, 'oi' => (int) $group_id))] = $group_name;
        }
        return $results;
    }

    /**
     * Get info of link
     * @param type $linkinfo
     * @return boolean
     */
    static function getMenuLinkInfo($linkinfo = array()) {
        if (!isset($linkinfo['t'])) {
            return false;
        }
        $return = array();
        switch ($linkinfo['t']) {
            case self::MENUTYPE_NORMAL: {
                    $return = self::getMenuLinkNormal($linkinfo);
                }break;
            case self::MENUTYPE_NEWS: {
                    $return = self::getMenuLinkNews($linkinfo);
                }break;
            case self::MENUTYPE_PRODUCT: {
                    $return = self::getMenuLinkProduct($linkinfo);
                }break;
            case self::MENUTYPE_CATEGORYPAGE: {
                    $return = self::getMenuLinkCategoryPage($linkinfo);
                }break;
            case self::MENUTYPE_POST: {
                    $return = self::getMenuLinkPost($linkinfo);
                }break;
            case self::MENUTYPE_ALBUMS: {
                    $return = self::getMenuLinkAlbum($linkinfo);
                }break;
            case self::MENUTYPE_COURSE: {
                    $return = self::getMenuLinkCourse($linkinfo);
                }break;
            case self::MENUTYPE_REALESTATE: {
                    $return = self::getMenuLinkRealestate($linkinfo);
                }break;
            case self::MENUTYPE_REALESTATENEWS: {
                    $return = self::getMenuLinkRealestateNews($linkinfo);
                }break;
        }

        return $return;
    }

    /**
     * get url of category page
     * @param type $linkinfo
     * @return boolean
     */
    static function getMenuLinkCategoryPage($linkinfo = array()) {
        $oid = (int) $linkinfo['oi'];
        if (!$oid)
            return false;
        $return = array();
        $page = CategoryPage::model()->findByPk($oid);
        if ($page) {
            if ($page->site_id == Yii::app()->controller->site_id) {
                $return = array(
                    'menu_basepath' => '/page/category/detail',
                    'menu_pathparams' => json_encode(array(
                        'id' => $oid,
                        'alias' => $page->alias,
                    )),
                );
            }
        }
        return $return;
    }

    //
    /**
     * Get info of news link
     * @param type $linkinfo
     * @return boolean
     */
    static function getMenuLinkNews($linkinfo = array()) {
        $oid = (int) $linkinfo['oi'];
        if (!isset($linkinfo['ot']) || !$oid)
            return false;
        $return = array();
        switch ($linkinfo['ot']) {
            case self::MENUTYPE_OBJECT_NEWSCATEGORY: {
                    $newscate = NewsCategories::model()->findByPk($oid);
                    if ($newscate) {
                        if ($newscate->site_id == Yii::app()->controller->site_id) {
                            $return = array(
                                'menu_basepath' => '/news/news/category',
                                'menu_pathparams' => json_encode(array(
                                    'id' => $oid,
                                    'alias' => $newscate->alias,
                                )),
                            );
                        }
                    }
                }break;
            case self::MENUTYPE_OBJECT_NEWSDETAIL: {
                    $news = News::model()->findByPk($oid);
                    if ($news) {
                        if ($news->site_id == Yii::app()->controller->site_id) {
                            $return = array(
                                'menu_basepath' => '/news/news/detail',
                                'menu_pathparams' => json_encode(array(
                                    'id' => $oid,
                                    'alias' => $news->alias,
                                )),
                            );
                        }
                    }
                }break;
        }
        return $return;
    }

    /**
     * Lấy thông tin về link đến danh mục album
     * @param type $linkinfo
     */
    static function getMenuLinkAlbum($linkinfo = array()) {
        $oid = (int) $linkinfo['oi'];
        if (!isset($linkinfo['ot']) || !$oid)
            return false;
        $return = array();
        switch ($linkinfo['ot']) {
            case self::MENUTYPE_OBJECT_ALBUMSCATEGORY: {
                    $albumcate = AlbumsCategories::model()->findByPk($oid);
                    if ($albumcate) {
                        if ($albumcate->site_id == Yii::app()->controller->site_id) {
                            $return = array(
                                'menu_basepath' => '/media/album/category',
                                'menu_pathparams' => json_encode(array(
                                    'id' => $oid,
                                    'alias' => $albumcate->alias,
                                )),
                            );
                        }
                    }
                }break;
        }
        return $return;
    }

    /**
     * Lấy thông tin về link đến danh mục course
     * @param type $linkinfo
     */
    static function getMenuLinkCourse($linkinfo = array()) {
        $oid = (int) $linkinfo['oi'];
        if (!isset($linkinfo['ot']) || !$oid)
            return false;
        $return = array();
        switch ($linkinfo['ot']) {
            case self::MENUTYPE_OBJECT_COURSECATEGORY: {
                    $coursecate = CourseCategories::model()->findByPk($oid);
                    if ($coursecate) {
                        if ($coursecate->site_id == Yii::app()->controller->site_id) {
                            $return = array(
                                'menu_basepath' => '/economy/course/category',
                                'menu_pathparams' => json_encode(array(
                                    'id' => $oid,
                                    'alias' => $coursecate->alias,
                                )),
                            );
                        }
                    }
                }break;
        }
        return $return;
    }

    /**
     * Lấy thông tin về link đến danh mục realestate news
     * @param type $linkinfo
     */
    static function getMenuLinkRealestateNews($linkinfo = array()) {
        $oid = (int) $linkinfo['oi'];
        if (!isset($linkinfo['ot']) || !$oid)
            return false;
        $return = array();
        switch ($linkinfo['ot']) {
            case self::MENUTYPE_OBJECT_REALESTATECATEGORY: {
                    $realestatecategory = RealEstateCategories::model()->findByPk($oid);
                    if ($realestatecategory) {
                        if ($realestatecategory->site_id == Yii::app()->controller->site_id) {
                            $return = array(
                                'menu_basepath' => '/news/realestateNews/category',
                                'menu_pathparams' => json_encode(array(
                                    'id' => $oid,
                                    'alias' => $realestatecategory->alias,
                                )),
                            );
                        }
                    }
                }break;
        }
        return $return;
    }

    /**
     * Lấy thông tin về link đến danh mục sản phẩm
     * @param type $linkinfo
     * @return boolean
     */
    static function getMenuLinkProduct($linkinfo = array()) {
        $oid = (int) $linkinfo['oi'];
        if (!isset($linkinfo['ot']) || !$oid)
            return false;
        $return = array();
        switch ($linkinfo['ot']) {
            case self::MENUTYPE_OBJECT_PRODUCTCATEGORY: {
                    $productcate = ProductCategories::model()->findByPk($oid);
                    if ($productcate) {
                        if ($productcate->site_id == Yii::app()->controller->site_id) {
                            if ($linkinfo['type_site'] == ActiveRecord::TYPE_SITE_NORMAL) {
                                $return = array(
                                    'menu_basepath' => '/economy/product/category',
                                    'menu_pathparams' => json_encode(array(
                                        'id' => $oid,
                                        'alias' => $productcate->alias,
                                    )),
                                );
                            } elseif($linkinfo['type_site'] == ActiveRecord::TYPE_SITE_B2B_FASHION) {
                                $return = array(
                                    'menu_basepath' => '/economy/shop/category',
                                    'menu_pathparams' => json_encode(array(
                                        'id' => $oid,
                                        'alias' => $productcate->alias,
                                    )),
                                );
                            }
                        }
                    }
                }break;
            case self::MENUTYPE_OBJECT_PRODUCTGROUP: {
                    $group = ProductGroups::model()->findByPk($oid);
                    if ($group && $group->site_id == Yii::app()->controller->site_id) {
                        $return = array(
                            'menu_basepath' => '/economy/product/group',
                            'menu_pathparams' => json_encode(array(
                                'id' => $oid,
                                'alias' => $group->alias,
                            )),
                        );
                    }
                }break;
            case self::MENUTYPE_OBJECT_PRODUCTDETAIL: {
                    
                }break;
        }
        return $return;
    }

    /**
     * Lấy thông tin về link đến danh mục bài viết
     * @param type $linkinfo
     * @return boolean
     */
    static function getMenuLinkPost($linkinfo = array()) {
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
                                'menu_basepath' => '/content/post/category',
                                'menu_pathparams' => json_encode(array(
                                    'id' => $oid,
                                    'alias' => $postcate->alias,
                                )),
                            );
                        }
                    }
                }break;
            case self::MENUTYPE_OBJECT_POSTDETAIL: {
                    $posts = Posts::model()->findByPk($oid);
                    if ($posts) {
                        if ($posts->site_id == Yii::app()->controller->site_id) {
                            $return = array(
                                'menu_basepath' => '/content/post/detail',
                                'menu_pathparams' => json_encode(array(
                                    'id' => $oid,
                                    'alias' => $posts->alias,
                                )),
                            );
                        }
                    }
                }
        }
        return $return;
    }

    static function getMenuLinkRealestate($linkinfo = array()) {
        if (!isset($linkinfo['oi'])) {
            return false;
        }
        $return = array();
        switch ($linkinfo['oi']) {
            case self::MENU_REALESTATE_PROJECT: {
                    $return = array(
                        'menu_basepath' => '/news/realestateProject/list',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_REALESTATE_CREATE: {
                    $return = array(
                        'menu_basepath' => '/news/realestate/create',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_REALESTATE_PROJECT_CREATE: {
                    $return = array(
                        'menu_basepath' => '/news/realestateProject/create',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_REALESTATE_ADVERTISING: {
                    $return = array(
                        'menu_basepath' => '/news/realestate/classifiedAdvertising',
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
                        'menu_pathparams' => '',
                    );
                }break;
            case self::MENU_HOME: {
                    $return = array(
                        'menu_basepath' => '',
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
            case self::MENU_FOLDER: {
                    $return = array(
                        'menu_basepath' => '/media/media/folder',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_WORK: {
                    $return = array(
                        'menu_basepath' => '/work/job',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_CHOICETHEME: {
                    $return = array(
                        'menu_basepath' => 'site/build/choicetheme',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_PRICING: {
                    $return = array(
                        'menu_basepath' => 'site/site/pricing',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_COURSE: {
                    $return = array(
                        'menu_basepath' => 'economy/course',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_SITE_CONTACT_FORM: {
                    $return = array(
                        'menu_basepath' => 'media/media/siteContactForm',
                        'menu_pathparams' => json_encode(array()),
                    );
                }break;
            case self::MENU_LECTURER: {
                    $return = array(
                        'menu_basepath' => 'economy/lecturer',
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
        if ($site_id) {
            $results = Yii::app()->db->createCommand()->select()
                    ->from(ClaTable::getTable('menus'))
                    ->where('site_id=' . $site_id)
                    ->order($order)
                    ->queryAll();
        }

        return $results;
    }

    /**
     * 
     * @param type $site_id
     * @param type $menu_group
     * @return type
     */
    static function getAllMenuInSiteOfGroup($site_id = 0, $menu_group = 0) {
        $site_id = (int) $site_id;
        $menu_group = (int) $menu_group;
        $results = array();
        if ($site_id && $menu_group) {
            $results = Yii::app()->db->createCommand()->select()
                    ->from(ClaTable::getTable('menus'))
                    ->where('site_id=' . $site_id . ' AND menu_group=' . $menu_group)
                    ->order('menu_order')
                    ->queryAll();
        }
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
//        $currenturl = explode('?', $currenturl);
//        $currenturl = $currenturl[0];
        //
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

    /**
     * 
     * @return type
     */
    static function getDirectFromArr() {
        return array(
            self::MENU_DIRECT_LEFT => Yii::t('common', 'left'),
            self::MENU_DIRECT_RIGHT => Yii::t('common', 'right'),
        );
    }

    /**
     * 
     * @param type $menu
     */
    static function prepareDataForBuild($menu = array(), $store = array()) {
        if (!isset($menu['menu_values']))
            return $menu;
        //
        $linkinfo = json_decode($menu['menu_values'], true);
        //
        $mysql_variable = '';
        $mysql_table = '';
        switch ($linkinfo['t']) {
            case self::MENUTYPE_NEWS: {
                    switch ($linkinfo['ot']) {
                        case self::MENUTYPE_OBJECT_NEWSCATEGORY: {
                                $mysql_table = ClaTable::getTable('newcategory');
                            }break;
                        case self::MENUTYPE_OBJECT_NEWSDETAIL: {
                                $mysql_table = ClaTable::getTable('news');
                            }break;
                    }
                }break;
            case self::MENUTYPE_PRODUCT: {
                    switch ($linkinfo['ot']) {
                        case self::MENUTYPE_OBJECT_PRODUCTCATEGORY: {
                                $mysql_table = ClaTable::getTable('productcategory');
                            }break;
                        case self::MENUTYPE_OBJECT_PRODUCTDETAIL: {
                                $mysql_table = ClaTable::getTable('product');
                            }break;
                    }
                }break;
            case self::MENUTYPE_POST: {
                    switch ($linkinfo['ot']) {
                        case self::MENUTYPE_OBJECT_POSTCATEGORY: {
                                $mysql_table = ClaTable::getTable('postcategory');
                            }break;
                        case self::MENUTYPE_OBJECT_POSTDETAIL: {
                                $mysql_table = ClaTable::getTable('post');
                            }break;
                    }
                }break;
            case self::MENUTYPE_CATEGORYPAGE: {
                    $mysql_table = ClaTable::getTable('categorypage');
                }break;
        }
        if ($mysql_table)
            $mysql_variable = $mysql_table . $linkinfo['oi'];
        //
        if ($mysql_variable) {
            $linkinfo['oi'] = 'msql_variable';
            $menu['menu_values'] = json_encode($linkinfo);
            $temp = explode('"msql_variable"', $menu['menu_values']);
            if (isset($store[$mysql_variable][$mysql_table][$linkinfo['oi']]))
                $menu['menu_values'] = "CONCAT('" . implode("',@" . $mysql_variable . ",'", $temp) . "')";
            else
                $menu['menu_values'] = ClaGenerate::quoteValue('');
            //
            $menuparam = json_decode($menu['menu_pathparams'], true);
            $menuparam['id'] = 'msql_variable';
            $menu['menu_pathparams'] = json_encode($menuparam);
            $temp = explode('"msql_variable"', $menu['menu_pathparams']);
            $menu['menu_pathparams'] = "CONCAT('" . implode("',@" . $mysql_variable . ",'", $temp) . "')";
        } else {
            $menu['menu_values'] = ClaGenerate::quoteValue($menu['menu_values']);
            $menu['menu_pathparams'] = ClaGenerate::quoteValue($menu['menu_pathparams']);
        }
        //
        return $menu;
    }

    static function generateUrlPageContent($params) {
        $menu_pathparams = array();
        if ($params['menu_pathparams']) {
            $menu_pathparams = json_decode($params['menu_pathparams'], true);
        }
        if (!$menu_pathparams) {
            $menu_pathparams = array();
        }
        return str_replace(ClaSite::getAdminEntry() . '/', '', Yii::app()->createUrl($params['menu_basepath'], $menu_pathparams));
    }

    public static function cleanIsDefaultPage() {
        $site_id = Yii::app()->controller->site_id;
        $sql = "UPDATE menus SET is_default_page = 0 WHERE site_id=" . $site_id;
        Yii::app()->db->createCommand($sql)->execute();
        return;
    }

}
