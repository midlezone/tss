<?php

/**
 * This is the model class for table "widgets".
 *
 * The followings are the available columns in table 'widgets':
 * @property integer $widget_id
 * @property string $widget_key
 * @property string $widget_name
 * @property string $widget_title
 * @property integer $widget_status
 * @property string $widget_template
 * @property integer $widget_right
 * @property string $alias
 * @property integer $created_time
 * @property integer $modified_time
 * @property integer $order
 * 
 */
class Widgets extends ActiveRecord {

    const POS_LEFT = 1;
    const POS_RIGHT = 2;
    const POS_LEFT_OUT = 6; // Ngoài layout bên trái
    const POS_RIGHT_OUT = 8; // Ngoài layout bên phải
    const POS_CENTER = 5;
    const POS_CENTER_BOTTOM = 9; // Ở giữa center và bottom
    const POS_CENTER_BLOCK1 = 41;
    const POS_CENTER_BLOCK2 = 42;
    const POS_CENTER_BLOCK3 = 43;
    const POS_CENTER_BLOCK4 = 44;
    const POS_CENTER_BLOCK5 = 45;
    const POS_CENTER_BLOCK6 = 46;
    const POS_CENTER_BLOCK7 = 47;
    const POS_BEGIN_CONTENT = 11;
    const POS_HEADER = 3;
    const POS_HEADER_BOTTOM = 31;
    const POS_HEADER_RIGHT = 12;
    const POS_HEADER_LEFT = 13;
    const POS_FOOTER = 4;
    const POS_FOOTER_BLOCK1 = 14;
    const POS_FOOTER_BLOCK2 = 15;
    const POS_FOOTER_BLOCK3 = 16;
    const POS_FOOTER_BLOCK4 = 17;
    const POS_FOOTER_BLOCK5 = 18;
    const POS_FOOTER_BLOCK6 = 19;
    const POS_TOP = 21; // ở trên cùng và bên trên header
    const POS_TOP_HEADER = 10; // Ở trên cùng và header
    const POS_TOP_CENTER = 7; // Ở giữa top va center
    const POS_TOP_LEFT = 22; // O tren cung va ben trai
    const POS_TOP_RIGHT = 23; // O tren cung va ben phai
    const POS_WIGET_BLOCK1 = 2501; // các widget ở trong widget
    const POS_WIGET_BLOCK2 = 2502; // các widget ở trong widget
    const POS_WIGET_BLOCK3 = 2503; // các widget ở trong widget
    const POS_WIGET_BLOCK4 = 2504; // các widget ở trong widget
    const POS_WIGET_BLOCK5 = 2505; // các widget ở trong widget
    const POS_WIGET_BLOCK6 = 2506; // các widget ở trong widget
    const POS_WIGET_BLOCK7 = 2507; // các widget ở trong widget
    const POS_WIGET_BLOCK8 = 2508; // các widget ở trong widget
    const POS_FACEBOOK_COMMENT = 3000; // vị trí của module facebook comment trong trang detail
    const POS_MENU_MAIN = 3001; // vị trí của module menu
    const POS_SHOPPING_CART = 3002; // vị trí của module shopping cart
    const POS_SEARCH_BOX = 3003; // vị trí của module search box
    const POS_BANNER_MAIN = 3004; // vị trí của module search box
    const POS_SOCIAL = 3005; // vị trí của module social
    const POS_DETAIL_BLOCK1 = 4000; // vị trí của module social
    const POS_DETAIL_BLOCK2 = 4001; // vị trí của module social
    const POS_DETAIL_BLOCK3 = 4002; // vị trí của module social
    const WIDGET_TYPE_CUSTOM = 0;
    const WIDGET_TYPE_SYSTEM = 1;
    const WIDGET_TYPE_CUSTOM_NAME = 'wcustom';
    const WIDGET_TYPE_SYSTEM_NAME = 'wsystem';
    const WIDGET_CONFIG_KEY = 'config';
    const WIDGET_SHOWALL_TRUE = 1;
    const WIDGET_SHOWALL_FALSE = 0;
    const WIDGEt_LIMIT_DEFAULT = 200;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('widgets');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('widget_name, alias', 'required'),
            array('widget_status, created_time, modified_time', 'numerical', 'integerOnly' => true),
            //array('widget_template', 'length', 'max' => 3000),
            array('widget_name', 'length', 'max' => 255),
            array('alias', 'length', 'max' => 500),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('widget_id, widget_key, widget_name, widget_status, widget_template, alias, created_time, modified_time, widget_type,showallpage', 'safe'),
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
            'widget_id' => 'Widget',
            'widget_key' => 'Widget Key',
            'widget_name' => Yii::t('widget', 'widget_name'),
            'widget_status' => 'Widget Status',
            'widget_template' => Yii::t('widget', 'widget_template'),
            'alias' => Yii::t('common', 'alias'),
            'created_time' => 'Created Time',
            'modified_time' => 'Modified Time',
            'widget_type' => Yii::t('widget', 'widget_type'),
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
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('widget_id', $this->widget_id);
        $criteria->compare('widget_key', $this->widget_key, true);
        $criteria->compare('widget_name', $this->widget_name, true);
        $criteria->compare('widget_title', $this->widget_title, true);
        $criteria->compare('widget_status', $this->widget_status);
        $criteria->compare('widget_template', $this->widget_template, true);
        $criteria->compare('widget_right', $this->widget_right);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('created_time', $this->created_time);
        $criteria->compare('modified_time', $this->modified_time);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Widgets the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * 
     * @return type
     */
    static function getAllowPosition() {
        return array(
            self::POS_LEFT => self::POS_LEFT,
            self::POS_RIGHT => self::POS_RIGHT,
            self::POS_CENTER => self::POS_CENTER,
            self::POS_CENTER_BLOCK1 => self::POS_CENTER_BLOCK1,
            self::POS_CENTER_BLOCK2 => self::POS_CENTER_BLOCK2,
            self::POS_CENTER_BLOCK3 => self::POS_CENTER_BLOCK3,
            self::POS_CENTER_BLOCK4 => self::POS_CENTER_BLOCK4,
            self::POS_CENTER_BLOCK5 => self::POS_CENTER_BLOCK5,
            self::POS_CENTER_BLOCK6 => self::POS_CENTER_BLOCK6,
            self::POS_CENTER_BLOCK7 => self::POS_CENTER_BLOCK7,
            self::POS_HEADER => self::POS_HEADER,
            self::POS_CENTER_BOTTOM => self::POS_CENTER_BOTTOM,
            self::POS_TOP_CENTER => self::POS_TOP_CENTER,
            self::POS_TOP_HEADER => self::POS_TOP_HEADER,
            self::POS_HEADER_BOTTOM => self::POS_HEADER_BOTTOM,
            self::POS_BEGIN_CONTENT => self::POS_BEGIN_CONTENT,
            self::POS_HEADER_LEFT => self::POS_HEADER_LEFT,
            self::POS_HEADER_RIGHT => self::POS_HEADER_RIGHT,
            self::POS_LEFT_OUT => self::POS_LEFT_OUT,
            self::POS_RIGHT_OUT => self::POS_RIGHT_OUT,
            self::POS_FOOTER => self::POS_FOOTER,
            self::POS_FOOTER_BLOCK1 => self::POS_FOOTER_BLOCK1,
            self::POS_FOOTER_BLOCK2 => self::POS_FOOTER_BLOCK2,
            self::POS_FOOTER_BLOCK3 => self::POS_FOOTER_BLOCK3,
            self::POS_FOOTER_BLOCK4 => self::POS_FOOTER_BLOCK4,
            self::POS_FOOTER_BLOCK5 => self::POS_FOOTER_BLOCK5,
            self::POS_FOOTER_BLOCK6 => self::POS_FOOTER_BLOCK6,
            self::POS_TOP => self::POS_TOP,
            self::POS_TOP_CENTER => self::POS_TOP_CENTER,
            self::POS_TOP_LEFT => self::POS_TOP_LEFT,
            self::POS_TOP_RIGHT => self::POS_TOP_RIGHT,
            self::POS_WIGET_BLOCK1 => self::POS_WIGET_BLOCK1,
            self::POS_WIGET_BLOCK2 => self::POS_WIGET_BLOCK2,
            self::POS_WIGET_BLOCK3 => self::POS_WIGET_BLOCK3,
            self::POS_WIGET_BLOCK4 => self::POS_WIGET_BLOCK4,
            self::POS_WIGET_BLOCK5 => self::POS_WIGET_BLOCK5,
            self::POS_WIGET_BLOCK6 => self::POS_WIGET_BLOCK6,
            self::POS_WIGET_BLOCK7 => self::POS_WIGET_BLOCK7,
            self::POS_WIGET_BLOCK8 => self::POS_WIGET_BLOCK8,
            self::POS_FACEBOOK_COMMENT => self::POS_FACEBOOK_COMMENT,
            self::POS_MENU_MAIN => self::POS_MENU_MAIN,
            self::POS_SHOPPING_CART => self::POS_SHOPPING_CART,
            self::POS_SEARCH_BOX => self::POS_SEARCH_BOX,
            self::POS_BANNER_MAIN => self::POS_BANNER_MAIN,
            self::POS_SOCIAL => self::POS_SOCIAL,
            self::POS_DETAIL_BLOCK1 => self::POS_DETAIL_BLOCK1,
            self::POS_DETAIL_BLOCK2 => self::POS_DETAIL_BLOCK2,
            self::POS_DETAIL_BLOCK3 => self::POS_DETAIL_BLOCK3,
        );
    }

    /**
     * get All postion title
     * @return type
     */
    static function getAllowPositionTitle() {
        return array(
            self::POS_HEADER => Yii::t('widget', 'widget_header_layout'),
            self::POS_HEADER_RIGHT => Yii::t('widget', 'widget_header_right_layout'),
            self::POS_HEADER_LEFT => Yii::t('widget', 'widget_header_left_layout'),
            self::POS_HEADER_BOTTOM => Yii::t('widget', 'widget_header_bottom_layout'),
            self::POS_TOP_HEADER => Yii::t('widget', 'widget_top_header_layout'),
            self::POS_LEFT => Yii::t('widget', 'widget_left_layout'),
            self::POS_LEFT_OUT => Yii::t('widget', 'widget_left_out_layout'),
            self::POS_RIGHT => Yii::t('widget', 'widget_right_layout'),
            self::POS_RIGHT_OUT => Yii::t('widget', 'widget_right_out_layout'),
            self::POS_CENTER => Yii::t('widget', 'widget_center_layout'),
            self::POS_CENTER_BLOCK1 => Yii::t('widget', 'widget_center_block1_layout'),
            self::POS_CENTER_BLOCK2 => Yii::t('widget', 'widget_center_block2_layout'),
            self::POS_CENTER_BLOCK3 => Yii::t('widget', 'widget_center_block3_layout'),
            self::POS_CENTER_BLOCK4 => Yii::t('widget', 'widget_center_block4_layout'),
            self::POS_CENTER_BLOCK5 => Yii::t('widget', 'widget_center_block5_layout'),
            self::POS_CENTER_BLOCK6 => Yii::t('widget', 'widget_center_block6_layout'),
            self::POS_CENTER_BLOCK7 => Yii::t('widget', 'widget_center_block7_layout'),
            self::POS_TOP_CENTER => Yii::t('widget', 'widget_top_center_layout'),
            self::POS_BEGIN_CONTENT => Yii::t('widget', 'widget_begin_content_layout'),
            self::POS_CENTER_BOTTOM => Yii::t('widget', 'widget_center_footer_layout'),
            self::POS_FOOTER => Yii::t('widget', 'widget_footer_layout'),
            self::POS_FOOTER_BLOCK1 => Yii::t('widget', 'widget_footer_block1_layout'),
            self::POS_FOOTER_BLOCK2 => Yii::t('widget', 'widget_footer_block2_layout'),
            self::POS_FOOTER_BLOCK3 => Yii::t('widget', 'widget_footer_block3_layout'),
            self::POS_FOOTER_BLOCK4 => Yii::t('widget', 'widget_footer_block4_layout'),
            self::POS_FOOTER_BLOCK5 => Yii::t('widget', 'widget_footer_block5_layout'),
            self::POS_FOOTER_BLOCK6 => Yii::t('widget', 'widget_footer_block6_layout'),
            self::POS_TOP_LEFT => Yii::t('widget', 'widget_top_left_layout'),
            self::POS_TOP_RIGHT => Yii::t('widget', 'widget_top_right_layout'),
            self::POS_WIGET_BLOCK1 => Yii::t('widget', 'widget_widget_block1_layout'),
            self::POS_WIGET_BLOCK2 => Yii::t('widget', 'widget_widget_block2_layout'),
            self::POS_WIGET_BLOCK3 => Yii::t('widget', 'widget_widget_block3_layout'),
            self::POS_WIGET_BLOCK4 => Yii::t('widget', 'widget_widget_block4_layout'),
            self::POS_WIGET_BLOCK5 => Yii::t('widget', 'widget_widget_block5_layout'),
            self::POS_WIGET_BLOCK6 => Yii::t('widget', 'widget_widget_block6_layout'),
            self::POS_WIGET_BLOCK7 => Yii::t('widget', 'widget_widget_block7_layout'),
            self::POS_WIGET_BLOCK8 => Yii::t('widget', 'widget_widget_block8_layout'),
            self::POS_FACEBOOK_COMMENT => Yii::t('widget', 'widget_facebook_comment'),
            self::POS_MENU_MAIN => Yii::t('widget', 'widget_menu_main'),
            self::POS_SHOPPING_CART => Yii::t('widget', 'widget_shopping_cart'),
            self::POS_SEARCH_BOX => Yii::t('widget', 'widget_search_box'),
            self::POS_BANNER_MAIN => Yii::t('widget', 'widget_banner_main'),
            self::POS_SOCIAL => Yii::t('widget', 'widget_social'),
            self::POS_DETAIL_BLOCK1 => Yii::t('widget', 'widget_detail_block1'),
            self::POS_DETAIL_BLOCK2 => Yii::t('widget', 'widget_detail_block2'),
            self::POS_DETAIL_BLOCK3 => Yii::t('widget', 'widget_detail_block3'),
        );
    }

    /**
     * 
     * @param type $widget_id
     * @return type
     */
    static function getCustomWidgetInfo($widget_id = '') {
        if ($widget_id == '')
            return array();
        $widget = Widgets::model()->findByPk($widget_id);
        if ($widget)
            return $widget->attributes;
        return array();
    }

    /**
     * 
     * @param type $widget
     * @return type
     */
    static function getWidgetInfo($widget = array()) {
        if (!isset($widget['widget_type']))
            return array();
        switch ($widget['widget_type']) {
            case Widgets::WIDGET_TYPE_CUSTOM: return self::getCustomWidgetInfo($widget['widget_id']);
        }
    }

    /**
     * Lấy đường dẫn của các modules dùng chung cho các loại site
     * @return type
     */
    static function getAllCommonSystemWidgetPath() {
        return array(
            'breadcrumb' => 'common.widgets.modules.breadcrumb.breadcrumb', // breacumb
            'menu' => 'common.widgets.modules.menu.menu',
            'menu_vertical' => 'common.widgets.modules.menu_vertical.menu_vertical',
            'menufooter' => 'common.widgets.modules.menufooter.menufooter',
            'wcustom' => 'common.widgets.modules.wcustom.wcustom',
            'introduce' => 'common.widgets.modules.introduce.introduce',
            'banner' => 'common.widgets.modules.banner.banner',
            'bannergroup' => 'common.widgets.modules.bannergroup.bannergroup',
            'bannergroup' => 'common.widgets.modules.bannergroup.bannergroup',
            'newnews' => 'common.widgets.modules.news.newnews.newnews',
            'hotproduct' => 'common.widgets.modules.hotproduct.hotproduct',
            'categorybox' => 'common.widgets.modules.categorybox.categorybox',
            'categoryinhome' => 'common.widgets.modules.categoryinhome.categoryinhome',
            'productall' => 'common.widgets.modules.productall.productall',
            'productIncategory' => 'common.widgets.modules.productIncategory.productIncategory',
            'hotnews' => 'common.widgets.modules.news.hotnews.hotnews',
            'homenewscategorydetail' => 'common.widgets.modules.news.homenewscategorydetail.homenewscategorydetail',
            'newsall' => 'common.widgets.modules.newsall.newsall',
            'yahoobox' => 'common.widgets.modules.yahoobox.yahoobox',
            'customform' => 'common.widgets.modules.customform.customform',
            'onebanner' => 'common.widgets.modules.onebanner.onebanner',
            'html' => 'common.widgets.modules.html.html',
            'social' => 'common.widgets.modules.social.social',
            'newsrelation' => 'common.widgets.modules.newsrelation.newsrelation',
            'productsrelation' => 'common.widgets.modules.productsrelation.productsrelation',
            'newproducts' => 'common.widgets.modules.newproducts.newproducts',
            'useraccess' => 'common.widgets.modules.useraccess.useraccess',
            'map' => 'common.widgets.modules.map.map',
            'searchbox' => 'common.widgets.modules.searchbox.searchbox',
            'facebookcomment' => 'common.widgets.modules.facebookcomment.facebookcomment',
            'introducebox' => 'common.widgets.modules.introducebox.introducebox',
            'productgroup' => 'common.widgets.modules.productgroup.productgroup',
            'productviewed' => 'common.widgets.modules.productviewed.productviewed', // viewed product
            'newsletter' => 'common.widgets.modules.newsletter.newsletter', // viewed product
            'logobox' => 'common.widgets.modules.logobox.logobox', // Hiển thị logo của site
            'shoppingcart' => 'common.widgets.modules.shoppingcart.shoppingcart', // Hiển thị logo của site
            'productpromotioninhome' => 'common.widgets.modules.productpromotioninhome.productpromotioninhome', // Hiển thị logo của site
            'productsetnew' => 'common.widgets.modules.productsetnew.productsetnew', // Hiển thị những sản phẩm được set là is new
            'productcategoryinhome' => 'common.widgets.modules.productcategoryinhome.productcategoryinhome', // Hiển thị những sản phẩm được set là is new
            'videohot' => 'common.widgets.modules.videohot.videohot', // Hiển thị những video dc set là nổi bật
            'videonew' => 'common.widgets.modules.videonew.videonew', // Hiển thị những video mới nhất của site
            'pagesize' => 'common.widgets.modules.pagesize.pagesize', // Hiển thị số bản ghi trên trang
            'productsort' => 'common.widgets.modules.productsort.productsort', // product order
            'productpricerange' => 'common.widgets.modules.productpricerange.productpricerange', // product price range
            'jobnew' => 'common.widgets.modules.jobnew.jobnew', // list jobs
            'albumnew' => 'common.widgets.modules.albumnew.albumnew', // list album
            'newsIncategory' => 'common.widgets.modules.newsIncategory.newsIncategory', // news in the category
            'imagenew' => 'common.widgets.modules.imagenew.imagenew', // images in site
            'productFilterInCat' => 'common.widgets.modules.productFilterInCat.productFilterInCat', // images in site
            'homepostcategorydetail' => 'common.widgets.modules.homepostcategorydetail.homepostcategorydetail', // post categories show in home
            'languages' => 'common.widgets.modules.languages.languages', // languages for site
            'scrollup' => 'common.widgets.modules.scrollup.scrollup', // scroll to top
            'support' => 'common.widgets.modules.support.support', // hỗ trợ online
            'productNewAndGroup' => 'common.widgets.modules.productNewAndGroup.productNewAndGroup', // sản phẩm mới và nhóm
            'productCategoryWithBackground' => 'common.widgets.modules.productCategoryWithBackground.productCategoryWithBackground', // box product category with background of category
            'categoryPageSub' => 'common.widgets.modules.categoryPageSub.categoryPageSub',
            'categoryProductSelectFull' => 'common.widgets.modules.categoryProductSelectFull.categoryProductSelectFull',
            'productNewAndHot' => 'common.widgets.modules.productNewAndHot.productNewAndHot', // sản phẩm mới và sản phẩm nổi bật
            'albumsrelation' => 'common.widgets.modules.albumsrelation.albumsrelation', // album liên quan
            'albumsIncategory' => 'common.widgets.modules.albumsIncategory.albumsIncategory', // album thuộc danh mục
            'courseNew' => 'common.widgets.modules.courseNew.courseNew', // khóa học mới
            'lecturers' => 'common.widgets.modules.lecturers.lecturers', // các giảng viên
            'courseNearOpen' => 'common.widgets.modules.courseNearOpen.courseNearOpen', // khóa học sắp khai giảng
            'courseRelation' => 'common.widgets.modules.courseRelation.courseRelation', // khóa học sắp khai giảng
            'supportUser' => 'common.widgets.modules.supportUser.supportUser', 
            'courseall' => 'common.widgets.modules.courseall.courseall', 
            'lecturerall' => 'common.widgets.modules.lecturerall.lecturerall', 
            'albumshot' => 'common.widgets.modules.albumshot.albumshot', 
            'realestateall' => 'common.widgets.modules.realestateall.realestateall',
			'realestateProject' => 'common.widgets.modules.realestateProject.realestateProject', 
            'courseCategoryInHome' => 'common.widgets.modules.courseCategoryInHome.courseCategoryInHome', 
            'pageContent' => 'common.widgets.modules.pageContent.pageContent', 
            'shopall' => 'common.widgets.modules.shopall.shopall', 
            'hotcar' => 'common.widgets.modules.hotcar.hotcar', 
        );
    }

    /**
     * Lấy đường dẫn của một widget key
     * @param type $widget_key
     * @return string
     */
    static function getCommonSystemWidgetPath($widget_key = null) {
        $all = self::getAllCommonSystemWidgetPath();
        if (isset($all[$widget_key]))
            return $all[$widget_key];
        return '';
    }

    /**
     * get path of system widget
     * @param type $widget_id
     * @param type $sitetypename
     * @return string
     */
    static function getSystemWidgetPath($widget_key = '', $sitetypename = '') {
        if ($widget_key == '')
            return '';
        //Kiểm tra xem nó có phải là module dùng chung cho các loại site không
        $path = self::getCommonSystemWidgetPath($widget_key);
        if ($path != '')
            return $path;
        //
        if (!$sitetypename)
            $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
        return 'common.widgets.modules.' . $sitetypename . '.' . $widget_key . '.' . $widget_key;
    }

    /**
     * get custom widget path
     * @return type
     */
    static function getCustomWidgetPath() {
        return 'common.widgets.modules.' . self::WIDGET_TYPE_CUSTOM_NAME . '.' . self::WIDGET_TYPE_CUSTOM_NAME;
    }

    /**
     * get Widgets of site 
     * @return type
     */
    static function getWidgets($options = array()) {
        //
        $site_id = isset($options['site_id']) ? $options['site_id'] : Yii::app()->controller->site_id;
        $return = array();
        //
        $data = Yii::app()->db->createCommand()->select()->from(ClaTable::getTable('pagewidget'))
                ->where("site_id=$site_id")
                ->queryAll();
        if ($data && count($data)) {
            foreach ($data as $wid) {
                $return[$wid['page_widget_id']] = $wid;
            }
        }
        return $return;
    }

    /**
     * get widget follow position as: header, footer, lef, right, center
     * @param type $position
     * @return type
     */
    static function getWidgetsFollowPositionKey($position, $key = null) {
        $results = array();
        if ($key === null)
            $key = ClaSite::getLinkKey();
        if (in_array($position, self::getAllowPosition()) && $key) {
            $data = self::getWidgetsFromPage($key);
            if (isset($data[$position]))
                $results = $data[$position];
        }
        return $results;
    }

    /**
     * render widget 
     * @param type $widget
     * @param type $data (sitetypename = null)
     * @param type $return
     * @return boolean
     */
    static function renderWidget($widget = null, $data = null, $return = false) {
        if (!$widget && !isset($widget['widget_id']))
            return false;
        if (!isset($data['sitetypename'])) {
            $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
        }
        $position = isset($data['position']) ? $data['position'] : '';
        $key = ClaSite::getLinkKey();
        $key = ClaGenerate::encrypt($key);
        //
        $showaction = false;
        if (ClaSite::ShowModule())
            $showaction = true;
        //
        switch ($widget['widget_type']) {
            case Widgets::WIDGET_TYPE_SYSTEM: {
                    $path = self::getSystemWidgetPath($widget['widget_id'], $sitetypename);
                    $properties = array(
                        'page_widget_id' => isset($widget['page_widget_id']) ? $widget['page_widget_id'] : null,
                        'showaction' => $showaction,
                        'key' => $key,
                        'position' => $position,
                    );
                }break;
            case Widgets::WIDGET_TYPE_CUSTOM: {
                    $path = self::getCustomWidgetPath();
                    $properties = array(
                        'page_widget_id' => isset($widget['page_widget_id']) ? $widget['page_widget_id'] : null,
                        'widget_id' => $widget['widget_id'],
                        'showaction' => $showaction,
                        'key' => $key,
                        'position' => $position,
                    );
                }break;
        }
        //
        if (isset($path) && $path) {
            if ($return)
                return Yii::app()->controller->widget($path, $properties, $return);
            else
                Yii::app()->controller->widget($path, $properties, $return);
        }
    }

    /**
     *  Lấy các loại modules
     */
    static function getWidgetTypes() {
        // system widget 
        $systemwidget = self::getSystemWidget();
        // custom widget
        $customwidget = self::getCustomWidget();
        $return = array();
        if ($systemwidget && count($systemwidget))
            $return = array_merge($return, array(Yii::t('widget', 'widget_system') => $systemwidget));
        if ($customwidget && count($customwidget)) {
            $return = array_merge($return, array(Yii::t('widget', 'widget_custom') => $customwidget));
        }
        return $return;
    }

    /**
     * get system widget
     * @return array
     */
    static function getSystemWidget() {
        //Những widget do theme quy định
        $themewidget = ClaTheme::getWidgetTypes();
        // Widget get đặc biệt của hệ thống để cho phép người dùng tạo ra các widget khác
        $customcreatewidget = self::getCustomCreateWidget();
        //
        $systemwidget = array_merge($themewidget, $customcreatewidget);
        return $systemwidget;
    }

    /**
     * get widget that is created by user
     * @return array
     */
    static function getCustomWidget() {
        $data = Yii::app()->db->createCommand()->select()->from(ClaTable::getTable('widget'))
                ->where('site_id=' . (int) Yii::app()->controller->site_id)
                ->queryAll();
        $return = array();
        if ($data && count($data)) {
            foreach ($data as $widget) {
                $return[json_encode(array('widget_type' => self::WIDGET_TYPE_CUSTOM, 'widget_id' => $widget['widget_id']))] = $widget['widget_name'];
            }
        }
        return $return;
    }

    /**
     *  lấy module để người dùng tạo ra các module khác
     * @return array
     */
    static function getCustomCreateWidget() {
        return array(
            self::WIDGET_TYPE_CUSTOM_NAME => Yii::t('widget', 'wcustom')
        );
    }

    //
    /**
     * get All widget follow page
     * @param type $page
     * @return array(position=>array())
     */
    static function getWidgetsFromPage($page = null) {
        $return = Yii::app()->controller->WidgetsFromPage;
        if (!$return) {
            if (!$page)
                $page = ClaSite::getLinkKey();
            $return = array();
            $data = Yii::app()->db->createCommand()->select()->from(ClaTable::getTable('pagewidget') . ' pw')
                    ->where('pw.page_key=:page_key AND pw.site_id=:site_id OR (pw.site_id=:site_id && pw.page_key!=:page_key && showallpage=:showallpage)', array(':page_key' => $page, ':site_id' => Yii::app()->controller->site_id, ':showallpage' => self::WIDGET_SHOWALL_TRUE))
                    //->join(ClaTable::getTable('widget') . ' w', 'pw.widget_id = w.widget_id')
                    ->limit(self::WIDGEt_LIMIT_DEFAULT)
                    ->order('worder')
                    ->queryAll();
            if ($data && count($data)) {
                foreach ($data as $wid) {
                    $return[$wid['position']][$wid['page_widget_id']] = $wid;
                }
            }
        }
        return $return;
    }

    /**
     * lấy module cho cấu hình của widget
     * @param type $class_name
     * @return \modelname|boolean
     */
    static function getWidgetConfigModel($class_name = '') {
        if ($class_name) {
            $modelname = self::WIDGET_CONFIG_KEY . "_" . $class_name;
            return new $modelname;
        }
        return false;
    }

    /**
     * Lấy widtet sau cùng của 1 page theo vị trí
     * @param type $page
     * @param type $position
     * @return type
     */
    static function getLastWidgetsFromPagePosition($page = null, $position = 0) {
        $widget = array();
        if (!$page)
            $page = ClaSite::getLinkKey();
        $widget = Yii::app()->db->createCommand()->select()->from(ClaTable::getTable('pagewidget') . ' pw')
                ->where('(pw.page_key=:page_key AND pw.site_id=:site_id OR (pw.site_id=:site_id AND pw.page_key!=:page_key AND showallpage=:showallpage)) AND position=:position', array(':page_key' => $page, ':position' => $position, ':site_id' => Yii::app()->controller->site_id, ':showallpage' => self::WIDGET_SHOWALL_TRUE))
                ->order('worder DESC')
                ->limit(1)
                ->queryRow();
        return $widget;
    }

    /**
     * Đếm số widget trong một trang ở một vị trí nào đó
     * @param type $page
     * @return array(position=>array())
     */
    static function countWidgetsFromPagePosition($page = null, $position = 0) {
        $count = 0;
        if (!$page)
            $page = ClaSite::getLinkKey();
        $count = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('pagewidget') . ' pw')
                ->where('(pw.page_key=:page_key AND pw.site_id=:site_id OR (pw.site_id=:site_id AND pw.page_key!=:page_key AND showallpage=:showallpage)) AND position=:position', array(':page_key' => $page, ':position' => $position, ':site_id' => Yii::app()->controller->site_id, ':showallpage' => self::WIDGET_SHOWALL_TRUE))
                ->queryScalar();
        return $count;
    }

}
