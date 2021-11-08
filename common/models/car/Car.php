<?php

/**
 * This is the model class for table "car".
 *
 * The followings are the available columns in table 'car':
 * @property string $id
 * @property string $name
 * @property string $code
 * @property string $price
 * @property string $price_market
 * @property integer $include_vat
 * @property integer $quantity
 * @property integer $status
 * @property integer $position
 * @property string $sortdesc
 * @property string $avatar_path
 * @property string $avatar_name
 * @property string $currency
 * @property integer $avatar_id
 * @property integer $site_id
 * @property integer $created_user
 * @property integer $modified_user
 * @property integer $created_time
 * @property integer $modified_time
 * @property string $category_track
 * @property integer $ishot
 * @property string $alias
 * @property integer $isnew
 */
class Car extends ActiveRecord {

    const CAR_HOT = 1;
    const CAR_NEW = 1;
    const CAR_DEFAUTL_LIMIT = 5;
    const CAR_UNIT_TEXT_DEFAULT = 'đ';
    const VIEWED_CAR_NAME = 'Viewed_Car';
    const VIEWED_CAR_LIMIT = 8; // Chỉ lưu tối đa 10 car xem sau cùng
    const POSITION_DEFAULT = 1000;
    
    public $description = '';

    //
    public static $_dataCurrency = array('VND' => 'VND', 'USD' => 'USD');

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return ClaTable::getTable('car');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, car_category_id', 'required'),
            array('include_vat, quantity, status, position, avatar_id, site_id, created_user, modified_user, created_time, modified_time, ishot, isnew', 'numerical', 'integerOnly' => true),
            array('name, sortdesc, alias', 'length', 'max' => 500),
            array('code', 'length', 'max' => 50),
            array('price, price_market', 'length', 'max' => 16),
            array('avatar_path, category_track', 'length', 'max' => 255),
            array('avatar_name', 'length', 'max' => 200),
            array('currency', 'length', 'max' => 3),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, code, price, price_market, include_vat, quantity, status, position, sortdesc, avatar_path, avatar_name, currency, avatar_id, site_id, created_user, modified_user, created_time, modified_time, category_track, ishot, alias, isnew, car_category_id', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'car_info' => array(self::HAS_ONE, 'CarInfo', 'car_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('product', 'product_name'),
            'code' => Yii::t('product', 'product_code'),
            'price' => Yii::t('product', 'product_price'),
            'price_market' => Yii::t('product', 'product_price_market'),
            'include_vat' => Yii::t('product', 'product_include_vat'),
            'quantity' => Yii::t('product', 'product_quantity'),
            'status' => Yii::t('common', 'status'),
            'position' => Yii::t('product', 'product_position'),
            'sortdesc' => Yii::t('product', 'product_sortdescription'),
            'avatar_path' => 'Avatar Path',
            'avatar_name' => 'Avatar Name',
            'currency' => Yii::t('product', 'product_currency'),
            'avatar_id' => 'Avatar',
            'site_id' => 'Site',
            'created_user' => 'Created User',
            'modified_user' => 'Modified User',
            'created_time' => Yii::t('common', 'created_time'),
            'modified_time' => 'Modified Time',
            'car_category_id' => Yii::t('common', 'category'),
            'category_track' => 'Category Track',
            'ishot' => Yii::t('product', 'product_ishot'),
            'alias' => Yii::t('common', 'alias'),
            'isnew' => Yii::t('product', 'isnew'),
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
        if ($this->car_category_id == 0) {
            $this->car_category_id = null;
        }
        $criteria->compare('id', $this->id, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('price_market', $this->price_market, true);
        $criteria->compare('include_vat', $this->include_vat);
        $criteria->compare('quantity', $this->quantity);
        $criteria->compare('status', $this->status);
        $criteria->compare('position', $this->position);
        $criteria->compare('sortdesc', $this->sortdesc, true);
        $criteria->compare('avatar_path', $this->avatar_path, true);
        $criteria->compare('avatar_name', $this->avatar_name, true);
        $criteria->compare('currency', $this->currency, true);
        $criteria->compare('avatar_id', $this->avatar_id);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('created_user', $this->created_user);
        $criteria->compare('modified_user', $this->modified_user);
        $criteria->compare('created_time', $this->created_time);
        $criteria->compare('modified_time', $this->modified_time);
        $criteria->compare('category_track', $this->category_track, true);
        $criteria->compare('ishot', $this->ishot);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('isnew', $this->isnew);

        $criteria->order = 'position, created_time DESC';
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Car the static model class
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
            $this->modified_user = Yii::app()->user->id;
        }
        //
        return parent::beforeSave();
    }
    
    /**
     * Xử lý giá
     */
    function processPrice() {
        if ($this->price) {
            $this->price = floatval(str_replace(array('.', ','), array('', '.'), $this->price + ''));
        }
        if ($this->price_market) {
            $this->price_market = floatval(str_replace(array('.', ','), array('', '.'), $this->price_market + ''));
        }
    }
    
    public function getImages() {
        $result = array();
        if ($this->isNewRecord)
            return $result;
        $result = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('car_images'))
                ->where('car_id=:car_id AND site_id=:site_id', array(':car_id' => $this->id, ':site_id' => Yii::app()->controller->site_id))
                ->order('order ASC, img_id ASC')
                ->queryAll();

        return $result;
    }
    
    public static function getHotCars($options = array()) {
        if (!isset($options['limit'])) {
            $options['limit'] = self::CAR_DEFAUTL_LIMIT;
        }
        $siteid = Yii::app()->controller->site_id;
        $cars = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('car'))
                ->where("site_id=$siteid AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND ishot=" . self::CAR_HOT)
                ->order('position, created_time DESC')
                ->limit($options['limit'])
                ->queryAll();
        $results = array();
        foreach ($cars as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('car/car/detail', array('id' => $p['id'], 'alias' => $p['alias']));
            $results[$p['id']]['price_text'] = self::getPriceText($p);
            $results[$p['id']]['price_market_text'] = self::getPriceText($p, 'price_market');
            $results[$p['id']]['price_save_text'] = self::getPriceText($p, 'price_save');
        }
        return $results;
    }
    
    
    static function getPriceText($car = array(), $type = 'price') {
        switch ($type) {
            case 'price_market': {
                    $price = isset($car['price_market']) ? $car['price_market'] : 0;
                }break;
            case 'price_save': {
                    $_price_market = isset($car['price_market']) ? $car['price_market'] : 0;
                    $_price = isset($car['price']) ? $car['price'] : 0;
                    $price = abs($_price - $_price_market);
                }break;
            default: {
                    $price = isset($car['price']) ? $car['price'] : 0;
                }break;
        }
        //
        $price = HtmlFormat::money_format($price);
        //
        $currency = self::getCarCurrency($car);
        //
        return '<span class="pricetext">' . $price . '</span><span class="currencytext">' . $currency . '</span>';
    }
    
    static function getCarCurrency($car = array()) {
        $currency = '';
        $text = self::CAR_UNIT_TEXT_DEFAULT;
        if (isset($car['currency']) && trim($car['currency']) != '')
            $currency = $car['currency'];
        switch ($currency) {
            case 'USD': {
                    $text = '$';
                }break;
        }
        //
        return $text;
    }

}
