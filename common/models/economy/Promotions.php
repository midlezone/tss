<?php

/**
 * This is the model class for table "promotions".
 *
 * The followings are the available columns in table 'promotions':
 * @property integer $promotion_id
 * @property integer $site_id
 * @property string $name
 * @property string $sortdesc
 * @property string $description
 * @property integer $status
 * @property integer $startdate
 * @property integer $enddate
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $created_time
 */
class Promotions extends ActiveRecord {

    const PROMOTION_DEFAUTL_LIMIT = 1;
    const PRODUCT_LIMIT_DEFAULT = 5;

    public $applydate; // Ngày áp dụng

    /**
     * @return string the associated database table name
     */

    public function tableName() {
        return ClaTable::getTable('promotions');
    }

    public function afterDelete() {
        //Xoa product in promotion
        ProductToPromotions::model()->deleteAllByAttributes(array('promotion_id' => $this->promotion_id));
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, sortdesc', 'required'),
            array('name', 'length', 'max' => 255),
            array('sortdesc', 'length', 'max' => 500),
            array('promotion_id, site_id, name, sortdesc, description, status, startdate, enddate, meta_title, meta_keywords, meta_description, created_time, alias, showinhome', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            //'products' => array(self::HAS_MANY, 'ProductToPromotions', 'promotion_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'promotion_id' => 'Promotion',
            'site_id' => 'Site',
            'name' => 'Name',
            'sortdesc' => Yii::t('product', 'promotion_sortdesc'),
            'description' => Yii::t('product', 'promotion_description'),
            'status' => Yii::t('common', 'status'),
            'startdate' => Yii::t('product', 'promotion_startdate'),
            'enddate' => Yii::t('product', 'promotion_enddate'),
            'alias' => Yii::t('common', 'alias'),
            'meta_title' => Yii::t('common', 'meta_title'),
            'meta_keywords' => Yii::t('common', 'meta_keywords'),
            'meta_description' => Yii::t('common', 'meta_description'),
            'created_time' => 'Created Time',
            'applydate' => Yii::t('product', 'promotion_applydate'),
            'showinhome' => Yii::t('common', 'showinhome'),
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

        $criteria->compare('promotion_id', $this->promotion_id);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('sortdesc', $this->sortdesc, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('startdate', $this->startdate);
        $criteria->compare('enddate', $this->enddate);
        $criteria->compare('meta_title', $this->meta_title, true);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('created_time', $this->created_time);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Promotions the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->created_time = time();
            if (!$this->site_id)
                $this->site_id = Yii::app()->controller->site_id;
        }
        return parent::beforeSave();
    }

    /**
     * validate apply date
     * @param type $attribute
     * @return boolean
     */
    public function validateApplyDate($attribute) {
        $startdate = (int) $this->getAttribute('startdate');
        $enddate = (int) $this->getAttribute('enddate');
        if ($startdate <= 0 || $enddate <= 0 || $startdate > $enddate) {
            $this->addError('applydate', Yii::t('errors', 'date_invalid'));
            return false;
        }
        return true;
    }

    /**
     * search all product and return CArrayDataProvider
     */
    public function SearchProducts() {
        $pagesize = Yii::app()->user->getState(Yii::app()->params['pageSizeName'], Yii::app()->params['defaultPageSize']);
        if ($this->isNewRecord)
            return null;
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        if (!$page)
            $page = 1;
        $products = $this->products(array(
            'limit' => $pagesize * $page,
        ));
        return new CArrayDataProvider($products, array(
            'pagination' => array(
                'pageSize' => $pagesize,
                'pageVar' => ClaSite::PAGE_VAR,
            ),
            'totalItemCount' => self::countProductInPromotion($this->promotion_id),
        ));
    }

    /**
     * return product_id list 
     * @param type $promotion_id
     */
    static function countProductInPromotion($promotion_id) {
        $promotion_id = (int) $promotion_id;
        $count = Yii::app()->db->createCommand()->select('count(*)')
                ->from(ClaTable::getTable('product_to_promotion'))
                ->where('site_id=' . Yii::app()->siteinfo['site_id'] . ' AND promotion_id=' . $promotion_id)
                ->queryScalar();
        //
        return (int) $count;
    }

    //
    /**
     * get products that it in promotion
     * return products
     * @param type $promotion_id
     */
    static function getProductInPromotion($promotion_id, $options = array()) {
        $results = array();
        if (!isset($options['limit']))
            $options['limit'] = self::PRODUCT_LIMIT_DEFAULT;
        $promotion_id = (int) $promotion_id;
        if (!$promotion_id)
            return $results;
        //
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        //
        $products = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('product_to_promotion') . ' ptp')
                ->join(ClaTable::getTable('product') . ' p', 'ptp.product_id=p.id')
                ->where('ptp.site_id=' . Yii::app()->siteinfo['site_id'] . ' AND promotion_id=' . $promotion_id)
                ->limit($options['limit'], $offset)
                ->queryAll();
        foreach ($products as $product) {
            $results[$product['product_id']] = $product;
            $results[$product['product_id']]['link'] = Yii::app()->createUrl('/economy/product/detail', array('id' => $product['product_id'], 'alias' => $product['alias']));
            $results[$product['product_id']]['price_text'] = Product::getPriceText($product);
            $results[$product['product_id']]['price_market_text'] = Product::getPriceText($product, 'price_market');
        }
        //
        return $results;
    }

    //
    /**
     * return product_id list 
     * @param type $promotion_id
     */
    static function getProductIdInPromotion($promotion_id) {
        $promotion_id = (int) $promotion_id;
        $products = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('product_to_promotion'))
                ->where('site_id=' . Yii::app()->siteinfo['site_id'] . ' AND promotion_id=' . $promotion_id)
                ->queryAll();
        foreach ($products as $product) {
            $results[$product['product_id']] = $product['product_id'];
        }
        //
        return $results;
    }

    /**
     * Get promotions that is show in home
     * @param type $options
     */
    public static function getPromotionInHome($options = array()) {
        if (!isset($options['limit']))
            $options['limit'] = self::PROMOTION_DEFAUTL_LIMIT;
        $siteid = Yii::app()->controller->site_id;
        $promotions = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('promotion'))
                ->where("site_id=$siteid AND showinhome=" . self::SHOW_IN_HOME)
                ->limit($options['limit'])
                ->queryAll();
        $results = array();
        foreach ($promotions as $pro) {
            $results[$pro['promotion_id']] = $pro;
            $results[$pro['promotion_id']]['link'] = Yii::app()->createUrl('economy/promotion/detail', array('id' => $pro['promotion_id'], 'alias' => $pro['alias']));
        }
        return $results;
    }

}
