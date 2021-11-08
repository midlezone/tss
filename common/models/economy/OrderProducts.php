<?php

/**
 * This is the model class for table "order_products".
 *
 * The followings are the available columns in table 'order_products':
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $product_qty
 * @property double $product_price
 * @property string $product_attributes
 * @property integer $site_id
 */
class OrderProducts extends ActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return ClaTable::getTable('order_products');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('order_id, product_id, product_qty, product_price', 'required'),
            array('order_id, product_id, product_qty', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, order_id, product_id, product_qty, product_price, product_attributes, site_id', 'safe'),
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
            'order_id' => 'Order',
            'product_id' => 'Product',
            'product_qty' => 'Product Qty',
            'product_price' => 'Product Price',
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

        $criteria->compare('order_id', $this->order_id);
        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('product_qty', $this->product_qty);
        $criteria->compare('product_price', $this->product_price);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    function beforeSave() {
        $this->site_id = Yii::app()->controller->site_id;
        return parent::beforeSave();
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OrderProducts the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * get products and its info
     * @param type $order_id
     */
    static function getProductsDetailInOrder($order_id) {
        $order_id = (int) $order_id;
        if ($order_id) {
            $products = Yii::app()->db->createCommand()->select()
                    ->from(ClaTable::getTable('orderproduct') . ' op')
                    ->join(ClaTable::getTable('product') . ' p', 'op.product_id=p.id')
                    ->where('op.order_id=' . $order_id)
                    ->queryAll();
            $results = array();
            foreach ($products as $product) {
                $results[$product['id']] = $product;
                $results[$product['id']]['link'] = Yii::app()->createUrl('economy/product/detail', array(
                    'id' => $product['id'],
                    'alias' => $product['alias'],
                ));
            }
            return $results;
        }
        return array();
    }
	/**
     * get products and its info
     * @param type $order_id
     */
    static function getInfoProducts($product_id) {
        $product_id = (int) $product_id;
        if ($product_id) {
            $products = Yii::app()->db->createCommand()->select()
                    ->from(ClaTable::getTable('orderproduct') . ' op')
                    ->join(ClaTable::getTable('product') . ' p', 'op.product_id=p.id')
                    ->where('op.product_id=' . $product_id)
                    ->queryAll();
           
            return $products;
        }
        return array();
    }
    
	
    
    public static function countOrderProducts($product_id) {
        $site_id = Yii::app()->controller->site_id;
        $count = Yii::app()->db->createCommand()
                ->select('sum(product_qty)')
                ->from('order_products')
                ->where('site_id=:site_id AND product_id=:product_id', array(':site_id' => $site_id, ':product_id' => $product_id))
                ->queryScalar();
        return $count;
    }
    
   	/**
     * get products and its info
     * @param type $order_id
     */
    public function getAllProducts($id) {
		$products = Yii::app()->db->createCommand()->select('sum(product_price)')
				->from(ClaTable::getTable('orderproduct'))
				//->join(ClaTable::getTable('product') . ' p', 'op.product_id=p.id')
				->where('rose='. $id)
				->queryAll();
	   
		return $products;
    }
	/**
     * get products and its info
     * @param type $order_id
     */
    public function getAllProductsSiteId($site_id) {
		$products = Yii::app()->db->createCommand()->select('sum(product_price)')
				->from(ClaTable::getTable('orderproduct'))
				//->join(ClaTable::getTable('product') . ' p', 'op.product_id=p.id')
				->where('site_id='. $site_id)
				->queryAll();
		return $products;
    }
	
}
