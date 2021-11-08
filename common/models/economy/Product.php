<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $id
 * @property string $pame
 * @property string $code
 * @property double $price
 * @property double $price_market
 * @property double $price_discount
 * @property integer $price_discount_percent
 * @property integer $include_vat
 * @property string $currency
 * @property integer $quantity
 * @property integer $status
 * @property integer $position
 * @property string $avatar_path
 * @property string $avatar_name
 * @property integer $site_id
 * @property integer $created_user
 * @property integer $modified_user
 * @property integer $created_time
 * @property integer $modified_time
 * @property string $alias
 * @property interger $viewed
 * @property interger $manufacturer_id
 */
class Product extends ActiveRecord {

    const PRODUCT_HOT = 1;
    const PRODUCT_NEW = 1;
    const PRODUCT_DEFAUTL_LIMIT = 5;
    const PRODUCT_UNIT_TEXT_DEFAULT = 'đ';
    const VIEWED_PRODUCT_NAME = 'Viewed_Product';
    const VIEWED_PRODUCT_LIMIT = 8; // Chỉ lưu tối đa 10 product xem sau cùng
    const POSITION_DEFAULT = 1000;

    public $groups = null; // Nhóm sản phẩm
    public $product_desc = '';
    public $product_sortdesc = '';
	public $avatar_id = '';
	 
    protected $_listgroupId = null; // lưu tất cả các group id của product
    //
    public static $_dataCurrency = array('VND' => 'VND', 'USD' => 'USD');

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('product');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, product_category_id', 'required'),
            array('price_discount_percent, include_vat, quantity, status, position, site_id, created_user, modified_user, created_time, modified_time', 'numerical', 'integerOnly' => true, 'min' => 0),
            array('price,price_gold,price_black,price_throat,price_silver,price_market, price_discount', 'numerical', 'min' => 0),
            array('name', 'length', 'max' => 400),
            array('code', 'length', 'max' => 50),
            array('currency, avatar_path', 'length', 'max' => 255),
            array('avatar_name', 'length', 'max' => 200),
            array('alias', 'isAlias'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, code, price,price_gold,price_black,price_throat,price_silver,price_red,price_jetblack, price_market, price_discount, price_discount_percent, include_vat, currency, quantity, status,publicdate, position,location, avatar_path, avatar_name, avatar_id, site_id, created_user, modified_user, created_time, modified_time, product_category_id, ishot, alias, viewed, isnew, category_track, manufacturer_id, state, shop_id', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product_info' => array(self::HAS_ONE, 'ProductInfo', 'product_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('product', 'product_name'),
            'location' => Yii::t('product', 'product_location'),
            'code' => Yii::t('product', 'product_code'),
            'price' => Yii::t('product', 'product_price'),
            'price_gold' => Yii::t('product', 'product_price_gold'),
            'price_black' => Yii::t('product', 'product_price_black'),
            'price_throat' => Yii::t('product', 'product_price_throat'),
            'price_silver' => Yii::t('product', 'product_price_silver'),
            'price_jetblack' => Yii::t('product', 'product_price_silver'),
            'price_red' => Yii::t('product', 'product_price_red'),
			'publicdate' => Yii::t('product', 'publicdate'),
            'price_market' => Yii::t('product', 'product_price_market'),
            'price_discount' => Yii::t('product', 'product_price_discount'),
            'price_discount_percent' => Yii::t('product', 'product_price_discount_percent', array('{text}' => 'hoặc ')),
            'include_vat' => Yii::t('product', 'product_include_vat'),
            'currency' => Yii::t('product', 'product_currency'),
            'quantity' => Yii::t('product', 'product_quantity'),
            'status' => Yii::t('common', 'status'),
            'state' => Yii::t('common', 'state'),
            'position' => Yii::t('product', 'product_position'),
            'ishot' => Yii::t('product', 'product_ishot'),
            'avatar_path' => 'Image Path',
            'avatar_name' => 'Image Name',
            'avatar_id' => Yii::t('product', 'avatar_id'),
            'site_id' => 'Site',
            'created_user' => 'Create User',
            'modified_user' => 'Update User',
            'created_time' => Yii::t('common', 'created_time'),
            'modified_time' => 'Update Time',
            'product_category_id' => Yii::t('common', 'category'),
            'alias' => Yii::t('common', 'alias'),
            'isnew' => Yii::t('product', 'isnew'),
            'manufacturer_id' => Yii::t('product', 'manufacturer'),
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
        if ($this->product_category_id == 0)
            $this->product_category_id = null;
        $criteria->compare('id', $this->id);
        $criteria->compare('product_category_id', $this->product_category_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('price', $this->price);
        $criteria->compare('price_gold', $this->price_gold);
        $criteria->compare('price_black', $this->price_black);
        $criteria->compare('price_throat', $this->price_throat);
        $criteria->compare('price_silver', $this->price_silver);
        $criteria->compare('price_jetblack', $this->price_jetblack);
        $criteria->compare('price_red', $this->price_red);
			
        $criteria->compare('price_market', $this->price_market);
        $criteria->compare('price_discount', $this->price_discount);
        $criteria->compare('price_discount_percent', $this->price_discount_percent);
        $criteria->compare('include_vat', $this->include_vat);
        $criteria->compare('currency', $this->currency, true);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('status', $this->status);
        $criteria->compare('position', $this->position);
        $criteria->compare('location', $this->location, true);
        $criteria->compare('avatar_path', $this->avatar_path, true);
        $criteria->compare('avatar_name', $this->avatar_name, true);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('created_user', $this->created_user);
        $criteria->compare('modified_user', $this->modified_user);
        $criteria->compare('created_time', $this->created_time);
        $criteria->compare('modified_time', $this->modified_time);
        $criteria->compare('manufacturer_id', $this->manufacturer_id);

        $criteria->order = 'position, created_time DESC';
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState(Yii::app()->params['pageSizeName'], Yii::app()->params['defaultPageSize']),
                'pageSize' => 30,
                'pageVar' => 'page',
            ),
        ));
    }

    public function searchByShop() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        if ($this->product_category_id == 0) {
            $this->product_category_id = null;
        }
        $current_shop = Shop::getCurrentShop();
        $this->shop_id = $current_shop['id'];
        $criteria->compare('id', $this->id);
        $criteria->compare('product_category_id', $this->product_category_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('price', $this->price);
		 $criteria->compare('price_gold', $this->price_gold);
        $criteria->compare('price_black', $this->price_black);
        $criteria->compare('price_throat', $this->price_throat);
        $criteria->compare('price_silver', $this->price_silver);
		$criteria->compare('price_jetblack', $this->price_jetblack);
        $criteria->compare('price_red', $this->price_red);
		
        $criteria->compare('price_market', $this->price_market);
        $criteria->compare('price_discount', $this->price_discount);
        $criteria->compare('price_discount_percent', $this->price_discount_percent);
        $criteria->compare('include_vat', $this->include_vat);
        $criteria->compare('currency', $this->currency, true);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('status', $this->status);
        $criteria->compare('location', $this->location,true);
        $criteria->compare('position', $this->position);
        $criteria->compare('avatar_path', $this->avatar_path, true);
        $criteria->compare('avatar_name', $this->avatar_name, true);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('created_user', $this->created_user);
        $criteria->compare('modified_user', $this->modified_user);
        $criteria->compare('created_time', $this->created_time);
        $criteria->compare('modified_time', $this->modified_time);
        $criteria->compare('manufacturer_id', $this->manufacturer_id);
        $criteria->compare('shop_id', $this->shop_id);
        
        $criteria->order = 'position, created_time DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState(Yii::app()->params['pageSizeName'], Yii::app()->params['defaultPageSize']),
                //'pageSize' => $pageSize,
                'pageVar' => 'page',
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $this->site_id = Yii::app()->controller->site_id;
        if ($this->isNewRecord) {
            $this->modified_time = $this->created_time = time();
            $this->created_user = $this->modified_user = Yii::app()->user->id;
        } else {
            $this->modified_time = time();
            $this->created_user = Yii::app()->user->id;
        }
        //
        return parent::beforeSave();
    }

    public function afterDelete() {
        // Xóa Ảnh của sản phẩm
        ProductImages::model()->deleteAllByAttributes(array('product_id' => $this->id));
        // delete products in group after delete product
        ProductToGroups::model()->deleteAllByAttributes(array('product_id' => $this->id, 'site_id' => Yii::app()->controller->site_id));
        //Delete product in promotion
        ProductToPromotions::model()->deleteAllByAttributes(array('product_id' => $this->id, 'site_id' => Yii::app()->controller->site_id));
        //
        parent::afterDelete();
    }

    /**
     * get Images of product
     * @return array
     */
    public function getImages() {
        $result = array();
        if ($this->isNewRecord)
            return $result;
        $result = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('productimage'))
                ->where('product_id=:product_id AND site_id=:site_id', array(':product_id' => $this->id, ':site_id' => Yii::app()->controller->site_id))
                ->order('order ASC, img_id ASC')
                ->queryAll();

        return $result;
    }

    /**
     * get image config of product
     * @return array
     */
    public function getImagesConfig($id_config) {
        $result = array();
        if ($this->isNewRecord) {
            return $result;
        }
        $result = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('product_configurable_images'))
                ->where('product_id=:product_id AND site_id=:site_id AND pcv_id=:pcv_id', array(':product_id' => $this->id, ':site_id' => Yii::app()->controller->site_id, ':pcv_id' => $id_config))
                ->order('created_time')
                ->queryAll();
        return $result;
    }

    /**
     * get the first image of product
     * @return array
     */
    public function getFirstImage() {
        $result = array();
        if ($this->isNewRecord)
            return $result;
        $result = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('productimage'))
                ->where('product_id=:product_id AND site_id=:site_id', array(':product_id' => $this->id, ':site_id' => Yii::app()->controller->site_id))
                ->order('created_time')
                ->limit(1)
                ->queryRow();

        return $result;
    }

    /**
     * get all image of product in site (for build)
     * @return array
     */
    static function getAllImages() {
        $result = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('productimage'))
                ->where('site_id=:site_id', array(':site_id' => Yii::app()->controller->site_id))
                ->queryAll();

        return $result;
    }

    /**
     * Get hot news
     * @param type $options
     * @return array
     */
    public static function getHotProducts($options = array()) {
        if (!isset($options['limit']))
            $options['limit'] = self::PRODUCT_DEFAUTL_LIMIT;
        $siteid = Yii::app()->controller->site_id;
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where("site_id=$siteid AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND ishot=" . self::PRODUCT_HOT)
                ->order('position, created_time DESC')
                ->limit($options['limit'])
                ->queryAll();
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }

    /**
     * Get all product
     * @param type $options
     * @return array
     */
    public static function getAllProducts($options = array()) {
        if (!isset($options['limit']))
            $options['limit'] = self::PRODUCT_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        //order
        $order = 'position, created_time DESC';
        if (isset($options['order']) && $options['order'])
            $order = $options['order'];
        //
        $siteid = Yii::app()->controller->site_id;
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where("site_id=$siteid AND `status`=" . ActiveRecord::STATUS_ACTIVED)
                ->order($order)
                ->limit($options['limit'], $offset)
                ->queryAll();
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }

    /**
     * Get product in category
     * @param type $options
     * @return array
     */
    public static function getProductsInCate($cat_id = 0, $options = array()) {
        $cat_id = (int) $cat_id;
        if (!$cat_id)
            return array();
        $siteid = Yii::app()->controller->site_id;
        //
        $condition = 'site_id=:site_id AND `status`=' . ActiveRecord::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        //
        $condition.=" AND MATCH (category_track) AGAINST ('" . $cat_id . "' IN BOOLEAN MODE)";
        // add more condition
        if (isset($options['condition']) && $options['condition'])
            $condition.=' AND ' . $options['condition'];
        if (isset($options['params']))
            $params = array_merge($params, $options['params']);
        //
        if (!isset($options['limit']))
            $options['limit'] = self::PRODUCT_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;
        //order
        $order = 'position, created_time DESC';
        if (isset($options['order']) && $options['order'])
            $order = $options['order'];
        //
        if (isset($options['_product_id']) && $options['_product_id']) {
            $condition.=' AND id<>:id';
            $params[':id'] = $options['_product_id'];
        }
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->order($order)
                ->limit($options['limit'], $offset)
                ->queryAll();
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }

    /**
     * Get product in this category
     * @param type $options
     * @return array
     */
	 
    public static function getProductsInThisCat($cat_id = 0, $options = array()) {
        $cat_id = (int) $cat_id;
        if (!$cat_id)
            return array();
        $siteid = Yii::app()->controller->site_id;
        //
        $condition = 'site_id=:site_id AND `status`=' . ActiveRecord::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        //
        $condition.=' AND product_category_id = :cat_id';
        $params[':cat_id'] = $cat_id;
        //
        if (!isset($options['limit']))
            $options['limit'] = self::PRODUCT_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;

        if (isset($options['_product_id']) && $options['_product_id']) {
            $condition.=' AND id<>:id';
            $params[':id'] = $options['_product_id'];
        }

        if (isset($options['condition']) && $options['condition'])
            $condition.=' AND ' . $options['condition'];
        if (isset($options['params']))
            $params = array_merge($params, $options['params']);

        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->order('position, created_time DESC')
                ->limit($options['limit'], $offset)
                ->queryAll();
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }

    /**
     * Get product in category
     * @param type $options
     * @return array
     */
    public static function getRelationProducts($cat_id = 0, $product_id = 0, $options = array()) {
        $cat_id = (int) $cat_id;
        $product_id = (int) $product_id;
        if (!$cat_id || !$product_id)
            return array();
        $siteid = Yii::app()->controller->site_id;
        //
        $condition = 'site_id=:site_id AND `status`=' . ActiveRecord::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        //
        $condition.=" AND MATCH (category_track) AGAINST ('" . $cat_id . "' IN BOOLEAN MODE)";
        //
        $condition.=' AND id<>:id';
        $params[':id'] = $product_id;
        //
        if (!isset($options['limit']))
            $options['limit'] = self::PRODUCT_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;

        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->order("ABS($product_id - id)")
                ->limit($options['limit'], $offset)
                ->queryAll();
        //  
        usort($products, function($a, $b) {
            return $b['created_time'] - $a['created_time'];
        });
        //
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }

    /**
     * count product in category
     * @param type $options
     * @return array
     */
    public static function countProductsInCate($cat_id = 0, $where = '') {
        $cat_id = (int) $cat_id;
        if (!$cat_id)
            return 0;
        $siteid = Yii::app()->controller->site_id;
        $condition = 'site_id=:site_id AND `status`=' . ActiveRecord::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        $condition.=" AND MATCH (category_track) AGAINST ('" . $cat_id . "' IN BOOLEAN MODE)";
        $condition .=($where) ? ' AND ' . $where : '';
        $count = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->queryScalar();
        return $count;
    }

    /**
     * count product in category
     * @param type $options
     * @return array
     */
    public static function countProductsInThisCate($cat_id = 0, $where = '') {
        $cat_id = (int) $cat_id;
        if (!$cat_id)
            return 0;

        $siteid = Yii::app()->controller->site_id;
        $condition = 'site_id=:site_id AND `status`=' . ActiveRecord::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        $condition.=' AND product_category_id = :cat_id';
        $params[':cat_id'] = $cat_id;
        $condition .=($where) ? ' AND ' . $where : '';
        $count = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->queryScalar();
        return $count;
    }

    /**
     * Tìm sản phẩm
     * @param type $options
     */
    static function SearchProducts($options = array()) {
        $results = array();
        if (!isset($options[ClaSite::SEARCH_KEYWORD]))
            return $results;
        //
        $options[ClaSite::SEARCH_KEYWORD] = str_replace(' ', '%', $options[ClaSite::SEARCH_KEYWORD]);
        //
        $siteid = Yii::app()->controller->site_id;
        $condition = "site_id=:site_id AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND (name LIKE :name or code LIKE :name)";
        $params = array(
            ':site_id' => $siteid,
            ':name' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%'
        );
        if (isset($options[ClaCategory::CATEGORY_KEY]) && $options[ClaCategory::CATEGORY_KEY]) {
            $condition.=" AND MATCH (category_track) AGAINST ('" . $options[ClaCategory::CATEGORY_KEY] . "' IN BOOLEAN MODE)";
        }
        //
        if (!isset($options['limit']))
            $options['limit'] = self::NEWS_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->order('position, created_time DESC')
                ->limit($options['limit'], $offset)
                ->queryAll();
        //
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }
	 /**
     * Tìm sản phẩm
     * @param type $options
     */
    static function SearchProductsImei($options = array()) {
        $results = array();
        if (!isset($options['imei']))
            return $results;
        //
        $options['imei'] = str_replace(' ', '%',$options['imei']);
        //
        $siteid = Yii::app()->controller->site_id;
        $condition = "site_id=:site_id AND imei = :imei";
		
        $params = array(
            ':site_id' => $siteid,
            ':imei' =>  $options['imei']
        );
      
        if (!isset($options['limit']))
            $options['limit'] = self::NEWS_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
		
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('orders'))
                ->where($condition, $params)
                ->order('created_time DESC')
                ->limit($options['limit'], $offset)
                ->queryAll();
  		
        return $products;
    }
	/**
     * Tìm sản phẩm
     * @param type $options
     */
    static function SearchHotel($options = array()) {
        $results = array();
        if (!isset($options[ClaSite::SEARCH_KEYWORD]))
            return $results;
        //
        $options[ClaSite::SEARCH_KEYWORD] = str_replace(' ', '%', $options[ClaSite::SEARCH_KEYWORD]);
        //
        $siteid = Yii::app()->controller->site_id;
		if ($options[ClaSite::SEARCH_KEYWORD] != '') {
			$condition = "site_id=:site_id AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND (name LIKE :name or code LIKE :name) OR (location LIKE :location)";
			 $params = array(
            ':site_id' => $siteid,
            ':name' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%',
			':location' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%'
			);
		} else {
			$condition = "site_id=:site_id AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND (name LIKE :name or code LIKE :name)";
			$params = array(
				':site_id' => $siteid,
				':name' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%',
			);
		}
       
        if (isset($options[ClaCategory::CATEGORY_KEY]) && $options[ClaCategory::CATEGORY_KEY]) {
            $condition.=" AND MATCH (category_track) AGAINST ('" . $options[ClaCategory::CATEGORY_KEY] . "' IN BOOLEAN MODE)";
        }
        //
        if (!isset($options['limit']))
            $options['limit'] = self::NEWS_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->order('position, created_time DESC')
                ->limit($options['limit'], $offset)
                ->queryAll();
        //
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
		
        return $results;
    }
	
    /**
     * Tìm ra id sản phẩm
     * @param type $options
     */
    static function SearchIdsProducts($options = array()) {
        $results = array();
        if (!isset($options[ClaSite::SEARCH_KEYWORD]))
            return $results;
        //
        $options[ClaSite::SEARCH_KEYWORD] = str_replace(' ', '%', $options[ClaSite::SEARCH_KEYWORD]);
        //
        $siteid = Yii::app()->controller->site_id;
        $condition = "site_id=:site_id AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND (name LIKE :name or code LIKE :name)";
        $params = array(
            ':site_id' => $siteid,
            ':name' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%'
        );
        if (isset($options[ClaCategory::CATEGORY_KEY]) && $options[ClaCategory::CATEGORY_KEY]) {
            $condition.=" AND MATCH (category_track) AGAINST ('" . $options[ClaCategory::CATEGORY_KEY] . "' IN BOOLEAN MODE)";
        }
        //
        if (!isset($options['limit']))
            $options['limit'] = self::NEWS_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        $products = Yii::app()->db->createCommand()->select('id')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->order('position, created_time DESC')
                ->limit($options['limit'], $offset)
                ->queryColumn();
        //
        $results = $products;
        return $results;
    }

    /**
     * get total count of search
     * @param type $options
     * @return int
     */
    static function searchTotalCount($options = array()) {
        $count = 0;
        if (!isset($options[ClaSite::SEARCH_KEYWORD]))
            return $count;
        //
        $options[ClaSite::SEARCH_KEYWORD] = str_replace(' ', '%', $options[ClaSite::SEARCH_KEYWORD]);
        //
        $siteid = Yii::app()->controller->site_id;
        $condition = "site_id=:site_id AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND (name LIKE :name or code LIKE :name)";
        $params = array(
            ':site_id' => $siteid,
            ':name' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%', // tận dựn index
        );
        if (isset($options[ClaCategory::CATEGORY_KEY]) && $options[ClaCategory::CATEGORY_KEY]) {
            $condition.=" AND MATCH (category_track) AGAINST ('" . $options[ClaCategory::CATEGORY_KEY] . "' IN BOOLEAN MODE)";
        }
        $products = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('product'))
                ->where($condition, $params);
        $count = $products->queryScalar();
        return $count;
    }

	 /**
     * get total count of search
     * @param type $options
     * @return int
     */
    static function searchTotalCountHotel($options = array()) {
        $count = 0;
        if (!isset($options[ClaSite::SEARCH_KEYWORD]))
            return $count;
        //
        $options[ClaSite::SEARCH_KEYWORD] = str_replace(' ', '%', $options[ClaSite::SEARCH_KEYWORD]);
        //
        $siteid = Yii::app()->controller->site_id;
        if ($options[ClaSite::SEARCH_KEYWORD] != '') {
			$condition = "site_id=:site_id AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND (name LIKE :name or code LIKE :name) OR (location LIKE :location)";
			 $params = array(
            ':site_id' => $siteid,
            ':name' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%',
			':location' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%'
			);
		} else {
			$condition = "site_id=:site_id AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND (name LIKE :name or code LIKE :name)";
			$params = array(
				':site_id' => $siteid,
				':name' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%',
			);
		}
        if (isset($options[ClaCategory::CATEGORY_KEY]) && $options[ClaCategory::CATEGORY_KEY]) {
            $condition.=" AND MATCH (category_track) AGAINST ('" . $options[ClaCategory::CATEGORY_KEY] . "' IN BOOLEAN MODE)";
        }
        $products = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('product'))
                ->where($condition, $params);
        $count = $products->queryScalar();
        return $count;
    }
    /**
     * đếm tất cả các product của trang
     */
    static function countAll() {
        $siteid = Yii::app()->controller->site_id;
        $products = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('product'))
                ->where("site_id=$siteid");
        $count = $products->queryScalar();
        return $count;
    }

    /**
     * Lấy những sản phẩm mới nhất của site
     * @param type $options
     * @return array
     */
    public static function getNewProducts($options = array()) {
        if (!isset($options['limit']))
            $options['limit'] = self::PRODUCT_DEFAUTL_LIMIT;
        $siteid = Yii::app()->controller->site_id;
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where("site_id=$siteid AND status=" . ActiveRecord::STATUS_ACTIVED)
                ->order('position, created_time DESC')
                ->limit($options['limit'])
                ->queryAll();
        //
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }

    /**
     * return array products info
     */
    static function getProductsInfoInList($listproductid) {
        $results = array();
        if (!$listproductid)
            return $results;
        $siteid = Yii::app()->controller->site_id;
        //
        if (is_array($listproductid))
            $listproductid = implode(',', $listproductid);
        if (!$listproductid)
            return $results;
        //
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where("site_id=$siteid AND id IN ($listproductid)")
                ->queryAll();
        //
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }

    /**
     * Lấy đơn vị tính của sản phẩm
     * @param type $product
     */
    static function getProductCurrency($product = array()) {
        $currency = '';
        $text = self::PRODUCT_UNIT_TEXT_DEFAULT;
        if (isset($product['currency']) && trim($product['currency']) != '')
            $currency = $product['currency'];
        switch ($currency) {
            case 'USD': {
                    $text = '$';
                }break;
        }
        //
        return $text;
    }

    /**
     * Lấy đơn vị tính của sản phẩm
     * @param type $product
     */
    static function getProductUnit($product = array()) {
        $currency = '';
        $text = self::PRODUCT_UNIT_TEXT_DEFAULT;
        if (isset($product['currency']) && trim($product['currency']) != '')
            $currency = $product['currency'];
        switch ($currency) {
            case 'USD': {
                    $text = '$';
                }break;
        }
        //
        return $text;
    }

    /**
     * Lấy nhãn của giá khi giá bằng 0 hay null
     * @return string
     */
    static function getProductPriceNullLabel() {
        return Yii::t('product', 'contact_sale');
    }

    /**
     * trả về format của giá
     * @param type $product
     * @return type
     */
    static function getFormattedPrice($product) {
        $price = isset($product['price']) ? $product['price'] : 0;
        return HtmlFormat::money_format($price);
    }

    /**
     * get total price
     * @param type $product
     * @param type $quantity
     * @param type $format
     * @return type
     */
    static function getTotalPrice($product, $quantity, $format = true) {
        $price = isset($product['price']) ? $product['price'] : 0;
        $quantity = (int) $quantity;
        $total = $price * $quantity;
        $product['price'] = $total;
        if ($format)
            $total = self::getPriceText($product);
        return $total;
    }

    /**
     * return list group id of product
     */
    function getListGroupId() {
        $results = array();
        if ($this->isNewRecord)
            return $results;
        if ($this->_listgroupId)
            return $this->_listgroupId;
        //
        $product_id = (int) $this->id;
        $groupids = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('product_to_group'))
                ->where('site_id=' . Yii::app()->controller->site_id . ' AND product_id=' . $product_id)
                ->queryAll();
        if (count($groupids)) {
            foreach ($groupids as $gid)
                $results[$gid['group_id']] = $gid['group_id'];
        }
        //
        $this->_listgroupId = $results;
        //
        return $results;
    }

    /**
     * return text of price, price_market
     * @param type $product
     * @param type $type
     */
    static function getPriceText($product = array(), $type = 'price') {
        switch ($type) {
            case 'price_market': {
                    $price = isset($product['price_market']) ? $product['price_market'] : 0;
                }break;
            case 'price_save': {
                    $_price_market = isset($product['price_market']) ? $product['price_market'] : 0;
                    $_price = isset($product['price']) ? $product['price'] : 0;
                    $price = abs($_price - $_price_market);
                }break;
            default: {
                    $price = isset($product['price']) ? $product['price'] : 0;
                }break;
        }
        //
        $price = HtmlFormat::money_format($price);
        //
        $currency = self::getProductCurrency($product);
        //
        return '<span class="pricetext">' . $price . '</span><span class="currencytext">' . $currency . '</span>';
    }

    /**
     * Get new products is seted
     * @param type $options
     * @return array
     */
    public static function getSetNewProducts($options = array()) {
        if (!isset($options['limit']))
            $options['limit'] = self::PRODUCT_DEFAUTL_LIMIT;
        $siteid = Yii::app()->controller->site_id;
        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where("site_id=$siteid AND `status`=" . ActiveRecord::STATUS_ACTIVED)
                ->order('isnew DESC, position, created_time DESC')
                ->limit($options['limit'])
                ->queryAll();
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }

    /**
     * return category id of this product
     */
    public function getCategoryId() {
        if ($this->isNewRecord)
            return 0;
        // categories as 12 13 14
        $listCategory = explode(ClaCategory::CATEGORY_SPLIT, $this->product_category_id);
        return ClaArray::getLast($listCategory);
    }

    /**
     * return all viewed products
     * @return type array
     */
    static function getViewedProducts($options = array()) {
        $limit = (isset($options['limit'])) ? (int) $options['limit'] : self::VIEWED_PRODUCT_LIMIT;
        //
        $viewed_product_cookie = Yii::app()->request->cookies[self::VIEWED_PRODUCT_NAME];
        $products = false;
        //
        if ($viewed_product_cookie) {
            $products = json_decode($viewed_product_cookie->value, true);
        }
        $products = ($products) ? $products : array();
        //
        $products_tem = array();
        $count = 1;
        foreach ($products as $product_id => $pro) {
            if ($count > $limit)
                break;
            $products_tem[$product_id] = $pro;
            $products_tem[$product_id]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $product_id, 'alias' => $pro['alias']));
            $count++;
        }
        //
        $products = $products_tem;
        //
        return $products;
    }

    /**
     * check product was viewed
     * @param type $product_id
     * @param type $options
     * @return boolean
     */
    static function checkViewedProduct($product_id = null, $options = array()) {
        if (!$product_id)
            return true;
        $viewedProducts = (isset($options['viewedProducts'])) ? $options['viewedProducts'] : self::getViewedProducts();
        if (isset($viewedProducts[$product_id]))
            return true;
        return false;
    }

    /**
     * set a product was viewed
     * @param type $product_id
     * @param type $options
     */
    static function setViewedProduct($product_id = null, $value = '', $options = array()) {
        $viewedProducts = (isset($options['viewedProducts'])) ? $options['viewedProducts'] : self::getViewedProducts();
        if (!self::checkViewedProduct($product_id, array('viewedProducts' => $viewedProducts))) {
            //$viewedProducts[$product_id] = $value;
            $viewedProducts = ClaArray::AddArrayToBegin($viewedProducts, array($product_id => $value));
            if (count($viewedProducts) > self::VIEWED_PRODUCT_LIMIT)
                $viewedProducts = ClaArray::removeLastElement($viewedProducts);
            //
            $cookie = new CHttpCookie(self::VIEWED_PRODUCT_NAME, json_encode($viewedProducts));
            $cookie->expire = time() + (7 * 24 * 60 * 60); // save cookie a week
            Yii::app()->request->cookies[self::VIEWED_PRODUCT_NAME] = $cookie;
        }
        return true;
    }

    /**
     * Xử lý giá
     */
    function processPrice() {
        if ($this->price)
            $this->price = floatval(str_replace(array('.', ','), array('', '.'), $this->price + ''));		
        if ($this->price_market)
            $this->price_market = floatval(str_replace(array('.', ','), array('', '.'), $this->price_market + ''));			
        if ($this->price_discount)
            $this->price_discount = floatval(str_replace(array('.', ','), array('', '.'), $this->price_discount + ''));
		if ($this->price_gold)
            $this->price_gold = floatval(str_replace(array('.', ','), array('', '.'), $this->price_gold + ''));	
		if ($this->price_black)
            $this->price_black = floatval(str_replace(array('.', ','), array('', '.'), $this->price_black + ''));	
		if ($this->price_throat)
            $this->price_throat = floatval(str_replace(array('.', ','), array('', '.'), $this->price_throat + ''));	
		if ($this->price_silver)
            $this->price_silver = floatval(str_replace(array('.', ','), array('', '.'), $this->price_silver + ''));	
    }

    /**
     * get just one promotion of product
     * @return array
     */
    public function getPromotion() {
        $result = array();
        if ($this->isNewRecord)
            return $result;
        $result = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('product_to_promotion') . ' ptp')
                ->join(ClaTable::getTable('promotion') . ' p', 'ptp.promotion_id=p.promotion_id')
                ->where('ptp.product_id=:product_id AND p.site_id=:site_id AND p.status<>' . Promotions::STATUS_DEACTIVED . ' AND p.startdate<' . time() . ' AND p.enddate>' . time(), array(':product_id' => $this->id, ':site_id' => Yii::app()->controller->site_id))
                ->limit(1)
                ->queryRow();
        if ($result && isset($result['promotion_id'])) {
            $result['link'] = Yii::app()->createUrl('/economy/product/promotion', array('id' => $result['promotion_id'], 'alias' => $result['alias']));
        }
        //
        return $result;
    }

    public function getMaxPrice($where = '') {
        $where = ($where) ? 'site_id=' . Yii::app()->siteinfo['site_id'] . ' AND ' . $where : 'site_id=' . Yii::app()->siteinfo['site_id'];
        return Yii::app()->db->createCommand()
                        ->select('MAX(price)')
                        ->from(ClaTable::getTable('product'))
                        ->where($where)
                        ->queryScalar();
    }

    public static function getAllProductAndCat() {
        $data = array();
        $categories = ProductCategories::getAllCategory();
        if ($categories && count($categories) > 0) {
            foreach ($categories as $category) {
                $data[$category['cat_id']] = $category;
                $products = Product::getProductsInCate($category['cat_id'], array('limit' => 1000));
                $data[$category['cat_id']]['products'] = $products;
            }
        }
        return $data;
    }

    /**
     * Get product in category
     * @param type $options
     * @return array
     */
    public static function getProductsInShop($shop_id = 0, $options = array()) {
        $shop_id = (int) $shop_id;
        if (!$shop_id) {
            return array();
        }
        $siteid = Yii::app()->controller->site_id;
        //
        $condition = 'site_id=:site_id AND `status`=' . ActiveRecord::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        // add more condition
        if (isset($options['condition']) && $options['condition']) {
            $condition.=' AND ' . $options['condition'];
        }
        if (isset($options['params'])) {
            $params = array_merge($params, $options['params']);
        }
        //
        if (!isset($options['limit'])) {
            $options['limit'] = self::PRODUCT_DEFAUTL_LIMIT;
        }
        if (!isset($options[ClaSite::PAGE_VAR])) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        if (!(int) $options[ClaSite::PAGE_VAR]) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        //order
        $order = 'position, created_time DESC';
        if (isset($options['order']) && $options['order']) {
            $order = $options['order'];
        }
        //
        if (isset($options['_product_id']) && $options['_product_id']) {
            $condition.=' AND id<>:id';
            $params[':id'] = $options['_product_id'];
        }
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];

        $condition .= ' AND shop_id=:shop_id';
        $params[':shop_id'] = $shop_id;

        $products = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->order($order)
                ->limit($options['limit'], $offset)
                ->queryAll();
        $results = array();
        foreach ($products as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }

    public static function countProductsInShop($shop_id = 0) {
        $shop_id = (int) $shop_id;
        if (!$shop_id) {
            return 0;
        }
        $siteid = Yii::app()->controller->site_id;
        $condition = 'site_id=:site_id AND `status`=' . ActiveRecord::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        $condition .= ' AND shop_id = ' . $shop_id;
        $count = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('product'))
                ->where($condition, $params)
                ->queryScalar();
        return $count;
    }

}
