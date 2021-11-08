<?php

/**
 * This is the model class for table "banners".
 *
 * The followings are the available columns in table 'banners':
 * @property integer $banner_id
 * @property integer $site_id
 * @property string $banner_name
 * @property string $banner_src
 * @property integer $banner_width
 * @property integer $banner_height
 * @property string $banner_link
 * @property integer $banner_order
 * @property string $banner_rules
 * @property integer $created_time
 * @property integer $banner_type
 * @property integer $banner_showall
 */
class Banners extends ActiveRecord {

    const BANNER_TYPE_IMAGE = 1;
    const BANNER_TYPE_FLASH = 2;
    const BANNER_SHOWALL_KEY = 'all';
    const BANNER_HOME_KEY = 'home';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('banner');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('banner_type,banner_name, banner_src, banner_order', 'required'),
            array('banner_width, banner_height, banner_order, created_time, banner_type,banner_group_id', 'numerical', 'integerOnly' => true, 'min' => 0),
            array('banner_name, banner_src, banner_link', 'length', 'max' => 255),
            array('banner_link', 'url'),
            array('banner_id, site_id, banner_name, banner_src, banner_width, banner_height, banner_link, banner_order, banner_rules, created_time, banner_type, banner_rules,banner_group_id, banner_description, banner_target,banner_showall, actived', 'safe'),
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
            'banner_id' => 'Banner',
            'site_id' => 'Site',
            'banner_group_id' => Yii::t('banner', 'banner_group'),
            'banner_name' => Yii::t('banner', 'banner_name'),
            'banner_src' => Yii::t('banner', 'banner_src'),
            'banner_width' => Yii::t('banner', 'banner_width'),
            'banner_height' => Yii::t('banner', 'banner_height'),
            'banner_link' => Yii::t('banner', 'banner_link'),
            'banner_order' => Yii::t('banner', 'banner_order'),
            'banner_rules' => Yii::t('banner', 'banner_rules'),
            'created_time' => 'Created Time',
            'banner_type' => Yii::t('banner', 'banner_type'),
            'banner_description' => Yii::t('banner', 'banner_description'),
            'banner_target' => Yii::t('banner', 'banner_target'),
            'banner_size' => Yii::t('common', 'size'),
            'actived' => Yii::t('common', 'show'),
        );
    }

    function beforeSave() {
        $this->site_id = Yii::app()->controller->site_id;
        if ($this->isNewRecord) {
            $this->created_time = time();
        }
        return parent::beforeSave();
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
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('banner_id', $this->banner_id);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('banner_name', $this->banner_name, true);
        $criteria->compare('banner_src', $this->banner_src, true);
        $criteria->compare('banner_width', $this->banner_width);
        $criteria->compare('banner_height', $this->banner_height);
        $criteria->compare('banner_link', $this->banner_link, true);
        $criteria->compare('banner_order', $this->banner_order);
        $criteria->compare('banner_rules', $this->banner_rules, true);
        $criteria->compare('created_time', $this->created_time);
        $criteria->compare('banner_type', $this->banner_type);
        $criteria->compare('banner_group_id', $this->banner_group_id);

        $criteria->order = 'created_time DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState(Yii::app()->params['pageSizeName'], Yii::app()->params['defaultPageSize']),
                'pageVar' => 'page',
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Banners the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
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
            'application/x-shockwave-flash' => 'application/x-shockwave-flash',
        );
    }

    //
    /**
     * Lấy loại banner theo extension
     * @param type $extension
     * @return type
     */
    static function getBannerTypeFromEx($extension = '') {
        if (!$extension)
            return;
        switch ($extension) {
            case 'jpg':
            case 'jpeg':
            case 'jpe':
            case 'gif':
            case 'png':
            case 'bmp': return self::BANNER_TYPE_IMAGE;
            case 'swf': return self::BANNER_TYPE_FLASH;
        }
    }

    static function getBannerTypes() {
        return array(
            self::BANNER_TYPE_IMAGE => Yii::t('banner', 'banner_type_image'),
            self::BANNER_TYPE_FLASH => Yii::t('banner', 'banner_type_flash'),
        );
    }

    /**
     * Lấy loại banner theo url
     * @param type $src
     * @return type
     */
    static function getBannerTypeFromSrc($src = '') {
        $pathinfo = pathinfo($src);
        $extension = isset($pathinfo['extension']) ? $pathinfo['extension'] : '';
        return self::getBannerTypeFromEx($extension);
    }

    /**
     * Lấy tất cả banner của site
     * @param type $site_id
     * @return type
     */
    static function getBannerArr($site_id = 0) {
        if (!$site_id)
            $site_id = Yii::app()->controller->site_id;
        $data = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('banner'))
                ->where('site_id=:site_id', array(':site_id' => $site_id))
                ->queryAll();
        $result = array();
        if ($data) {
            foreach ($data as $banner) {
                $result[$banner['banner_id']] = $banner['banner_name'];
            }
        }
        return $result;
    }

    //
    /**
     * Lấy thông tin của banner theo id
     * @param type $banner_id
     */
    static function getBannerData($banner_id = 0) {
        $result = array();
        if ($banner_id) {
            $banner = Banners::model()->findByPk($banner_id);
            if ($banner)
                $result = $banner->attributes;
        }
        //
        return $result;
    }

    /**
     * Lấy tất cả banner của site
     * @param type $site_id
     * @return type
     */
    static function getAllBanner($site_id = 0) {
        if (!$site_id)
            $site_id = Yii::app()->controller->site_id;
        $data = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('banner'))
                ->where('site_id=:site_id', array(':site_id' => $site_id))
                ->queryAll();
        $result = array();
        if ($data) {
            foreach ($data as $banner) {
                $result[$banner['banner_id']] = $banner;
            }
        }
        return $result;
    }

    /**
     * Lấy tất cả các nhóm banner do người dùng tạo ra
     * @return type
     */
    static function getAllBannerGroup() {
        $results = array();
        $groups = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('banner_group'))
                ->where('site_id=' . Yii::app()->siteinfo['site_id'])
                ->queryAll();
        foreach ($groups as $group) {
            $results[$group['banner_group_id']] = $group;
        }
        //
        return $results;
    }

    /**
     * Lấy tất cả các nhóm banner do người dùng tạo ra
     * @return type
     */
    static function getBannerGroupArr() {
        $results = array();
        $groups = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('banner_group'))
                ->where('site_id=' . Yii::app()->siteinfo['site_id'])
                ->queryAll();
        foreach ($groups as $group) {
            $results[$group['banner_group_id']] = $group['banner_group_name'];
        }
        //
        return $results;
    }

    /**
     * Lấy tất cả các nhóm banner do người dùng tạo ra
     * @return type
     */
    static function getBannerGroupOptionsArr() {
        $results = array();
        $groups = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('banner_group'))
                ->where('site_id=' . Yii::app()->siteinfo['site_id'])
                ->queryAll();
        foreach ($groups as $group) {
            $results['data'][$group['banner_group_id']] = $group['banner_group_name'];
            $results['options'][$group['banner_group_id']] = array('size' => $group['width'] . '_' . $group['height']);
        }
        //
        return $results;
    }

    /**
     * Lấy tất cả banner trong group
     * @param type $group_id
     * @return array
     */
    static function getBannersInGroup($group_id = 0, $options = array()) {
        if (!isset($options['limit']) || !$options['limit'])
            $options['limit'] = self::MIN_DEFAUT_LIMIT;
        $group_id = (int) $group_id;
        $result = array();
        if ($group_id) {
            $bannes = Yii::app()->db->createCommand()->select()
                    ->from(ClaTable::getTable('banner'))
                    ->where('site_id=:site_id AND banner_group_id=:group_id AND actived=:actived', array(':site_id' => Yii::app()->siteinfo['site_id'], ':group_id' => $group_id, ':actived' => self::STATUS_ACTIVED))
                    ->limit($options['limit'])
                    ->order('banner_order')
                    ->queryAll();
            return $bannes;
        }
        return $result;
    }

    /**
     * Filter banner có thỏa mãn rules ko
     * @param type $banners
     * @param type $rules
     * @param type $options
     */
    static function filterBanners($banners = array(), $options = array()) {
        $pagekey = (isset($options['pagekey'])) ? $options['pagekey'] : ClaSite::getLinkKey();
        $homepagekey = (isset($options['homepagekey'])) ? $options['homepagekey'] : ClaSite::getHomeKey();
        //
        $results = array();
        foreach ($banners as $banner) {
            if (self::checkShowBanner($banner, array('pagekey' => $pagekey, 'homepagekey' => $homepagekey)))
                $results[$banner['banner_id']] = $banner;
        }
        //
        return $results;
    }

    /**
     * Kiểm tra xem banner này có được phép hiển thị ở trang này hay không?
     * @param type $banner
     * @param type $options
     * @return boolean
     */
    static function checkShowBanner($banner = null, $options = array()) {
        $pagekey = (isset($options['pagekey'])) ? $options['pagekey'] : ClaSite::getLinkKey();
        $homepagekey = (isset($options['homepagekey'])) ? $options['homepagekey'] : ClaSite::getHomeKey();
        if ($pagekey == $homepagekey)
            $pagekey = self::BANNER_HOME_KEY;
        //
        if ($banner['banner_showall'])
            return true;
        else {
            $_rules = $banner['banner_rules'];
            $rules = explode(',', $_rules);
            if (in_array($pagekey, $rules))
                return true;
        }
        return false;
    }

    //

    /**
     * Kiểm tra target và trả về mã
     * @param type $banner
     */
    static function getTarget($banner = null) {
        $target = '';
        if ($banner && isset($banner['banner_target'])) {
            if ($banner['banner_target'] == Menus::TARGET_BLANK)
                $target = 'target="_blank"';
        }
        return $target;
    }

    /**
     * trả về amngr các key của trang theo banner
     * @return type
     */
    static function getPageKeyArr() {
        $pages = array(
            self::BANNER_HOME_KEY => Yii::t('menu', 'menu_link_home'),
            'sanpham' => Yii::t('menu', 'menu_link_product'),
            'danhmucsanpham' => Yii::t('product', 'product_category'),
            'chitietsanpham' => Yii::t('product', 'product_detail'),
            'tintuc' => Yii::t('menu', 'menu_link_news'),
            'danhmuctintuc' => Yii::t('news', 'news_category'),
            'chitiettintuc' => Yii::t('news', 'news_detail'),
            'gioithieu' => Yii::t('menu', 'menu_link_introduce'),
            'lienhe' => Yii::t('menu', 'menu_link_contact'),
            'tuyendung' => Yii::t('work', 'work'),
            'chitiettuyendung' => Yii::t('work', 'work_detail'),
            'timkiem' => Yii::t('common', 'search'),
        );
        $listpage = CategoryPage::getAllCategoryPage();
        foreach ($listpage as $pa) {
            $pages['cpage_' . $pa['id']] = $pa['title'];
        }
        $list_category = ClaCategory::getAllProductCategoryPage();
        foreach ($list_category as $ca) {
            $pages['ppage_' . $ca['cat_id']] = $ca['cat_name'];
        }
        //
        return $pages;
    }

    /**
     * trả về key thực tế của một page theo banner
     * @param type $key
     */
    static function getRealPageKey($key = '') {
        $keys = explode('_', $key);
        switch ($keys[0]) {
            case self::BANNER_SHOWALL_KEY: return self::BANNER_SHOWALL_KEY;
            case self::BANNER_HOME_KEY: return self::BANNER_HOME_KEY;
            case 'sanpham': return 'economy/product/';
            case 'danhmucsanpham': return 'economy/product/category';
            case 'chitietsanpham': return 'economy/product/detail';
            case 'tintuc': return 'news/news/';
            case 'danhmuctintuc': return 'news/news/category';
            case 'chitiettintuc': return 'news/news/detail';
            case 'gioithieu': return 'site/site/introduce';
            case 'lienhe': return 'site/site/contact';
            case 'timkiem': return 'search/search/search';
            case 'tuyendung': return 'work/job/';
            case 'chitiettuyendung': return 'work/job/detail';
            case 'cpage': return 'page/category/detail_' . $keys[1];
            case 'ppage': return 'ppage_' . $keys[1];
        }
        //
        return '';
    }
    
    public function getImages() {
        $result = array();
        if ($this->isNewRecord)
            return $result;
        $result = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('banner_partial'))
                ->where('banner_id=:banner_id AND site_id=:site_id', array(':banner_id' => $this->banner_id, ':site_id' => Yii::app()->controller->site_id))
                ->order('created_time')
                ->queryAll();

        return $result;
    }
    
    public static function getBannerPartial($id, $limit = 1) {
        $result = array();
        $result = Yii::app()->db->createCommand()
                ->select('*')
                ->from(ClaTable::getTable('banner_partial'))
                ->where('banner_id=:banner_id', array(':banner_id' => $id))
                ->order('position ASC')
                ->limit($limit)
                ->queryAll();
        
        return $result;
    }

}
