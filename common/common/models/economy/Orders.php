<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $order_id
 * @property integer $user_id
 * @property string $shipping_name
 * @property string $shipping_email
 * @property string $shipping_address
 * @property string $shipping_phone
 * @property string $shipping_city
 * @property string $billing_name
 * @property string $billing_email
 * @property string $billing_address
 * @property string $billing_phone
 * @property string $billing_city
 * @property string $payment_method
 * @property string $transport_method
 * @property string $coupon_code
 * @property integer $order_status
 * @property double $order_total
 * @property string $currency
 * @property string $ip_address
 * @property string $key
 * @property integer $created_time
 * @property integer $modified_time
 * @property integer $site_id
 */
class Orders extends ActiveRecord {

    const ORDER_WAITFORPROCESS = 0;
    const ORDER_WAITFORPAYMENT = 1;
    const ORDER_WAITFORCOMPLETE = 2;
    const ORDER_WAITFORDISBURSE = 3; // Chờ xuất hàng 
    const ORDER_WAITFORRECEIVE = 4; // Chờ nhận hàng 
    const ORDER_DESTROY = 5; // Hủy đơn hàng 
    const ORDER_COMPLETE = 6; // Hoàn thành
    //
    const ORDER_PAYMENT_STATUS_NONE = 0; // chưa xử lý
    const ORDER_PAYMENT_STATUS_PAID = 1; // đã thanh toán
    const ORDER_PAYMENT_STATUS_PROCESSING = 2; // đang xử lý
    //
    const PAYMENT_METHOD_ONLINE = 3;
    //
    const ORDER_NOTVIEWED = 0;
    const ORDER_VIEWED = 1;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return ClaTable::getTable('orders');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('shipping_address, shipping_city, billing_name, billing_address, billing_city, payment_method, transport_method, ip_address, key', 'required'),
            array('user_id, order_status, created_time, modified_time', 'numerical', 'integerOnly' => true),
            array('order_total,order_total_paid,payment_status', 'numerical'),
            array('shipping_name, shipping_email, shipping_address, billing_name, billing_email, billing_address, key', 'length', 'max' => 100),
            array('shipping_city, billing_city', 'length', 'max' => 4),
            array('billing_phone, shipping_phone, coupon_code', 'length', 'max' => 32),
            array('payment_method, transport_method', 'length', 'max' => 128),
            array('payment_method_child', 'length', 'max' => 10),
            array('ip_address', 'length', 'max' => 96),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('order_id, user_id, shipping_name, shipping_email, shipping_address, shipping_phone, shipping_city, billing_name, billing_email, billing_address, billing_phone, billing_city, payment_method, payment_method_child, transport_method, coupon_code, order_status, order_total, order_total_paid, ip_address, key, created_time, modified_time,note, site_id, transport_freight', 'safe'),
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
            'order_id' => Yii::t('shoppingcart', 'order'),
            'user_id' => 'User',
            'shipping_name' => 'Shipping Name',
            'shipping_email' => 'Shipping Email',
            'shipping_address' => 'Shipping Address',
            'shipping_phone' => 'Shipping Phone',
            'shipping_city' => 'Shipping City',
            'billing_name' => 'Billing Name',
            'billing_email' => 'Billing Email',
            'billing_address' => 'Billing Address',
            'billing_phone' => 'Billing Phone',
            'billing_city' => 'Billing City',
            'payment_method' => Yii::t('shoppingcart', 'payment_method'),
            'transport_method' => Yii::t('shoppingcart', 'transport_method'),
            'coupon_code' => 'Coupon Code',
            'order_status' => Yii::t('common', 'status'),
            'order_total' => Yii::t('common', 'total'),
            'ip_address' => 'Ip Address',
            'key' => 'Key',
            'created_time' => Yii::t('common', 'created_time2'),
            'modified_time' => 'Modified Time',
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
        if (!$this->site_id)
            $this->site_id = Yii::app()->controller->site_id;
        $criteria->compare('order_id', $this->order_id);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('shipping_name', $this->shipping_name, true);
        $criteria->compare('shipping_email', $this->shipping_email, true);
        $criteria->compare('shipping_address', $this->shipping_address, true);
        $criteria->compare('shipping_phone', $this->shipping_phone, true);
        $criteria->compare('shipping_city', $this->shipping_city, true);
        $criteria->compare('billing_name', $this->billing_name, true);
        $criteria->compare('billing_email', $this->billing_email, true);
        $criteria->compare('billing_address', $this->billing_address, true);
        $criteria->compare('billing_phone', $this->billing_phone, true);
        $criteria->compare('billing_city', $this->billing_city, true);
        $criteria->compare('payment_method', $this->payment_method, true);
        $criteria->compare('transport_method', $this->transport_method, true);
        $criteria->compare('coupon_code', $this->coupon_code, true);
        $criteria->compare('order_status', $this->order_status);
        $criteria->compare('order_total', $this->order_total);
        $criteria->compare('ip_address', $this->ip_address, true);
        $criteria->compare('key', $this->key, true);
        $criteria->compare('created_time', $this->created_time);
        $criteria->compare('modified_time', $this->modified_time);
        $criteria->addCondition('order_status<>' . self::STATUS_DELETED);
        //
        $criteria->order = 'created_time DESC';
        //

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState(Yii::app()->params['pageSizeName'], Yii::app()->params['defaultPageSize']),
                'pageVar' => ClaSite::PAGE_VAR,
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Orders the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        //$this->user_id = Yii::app()->user->id;
        if ($this->isNewRecord) {
            $this->created_time = time();
        } else {
            $this->modified_time = time();
        }
        return parent::beforeSave();
    }

    /**
     * delete order
     * @return boolean
     * @throws CDbException
     */
    function delete() {
        if (!$this->getIsNewRecord()) {
            Yii::trace(get_class($this) . '.delete()', 'system.db.ar.CActiveRecord');
            if ($this->beforeDelete()) {
                $this->order_status = self::STATUS_DELETED;
                $result = $this->save();
                $this->afterDelete();
                return $result;
            } else
                return false;
        } else
            throw new CDbException(Yii::t('yii', 'The active record cannot be deleted because it is new.'));
    }

    /**
     * return payment method
     * @return type
     */
    static function getPaymentMethod() {
        // khong dung key 3 vi dang dung cho thanh toan online check bien self::PAYMENT_METHOD_ONLINE
        $res = array(
            1 => Yii::t('shoppingcart', 'payment_atshop'),
            2 => Yii::t('shoppingcart', 'payment_receive'),            
        );
        if(SitePayment::model()->checkPaymentOnline() && defined('BAOKIM_CONFIG')){
           $res[self::PAYMENT_METHOD_ONLINE] = Yii::t('shoppingcart', 'payment_online');  
        }
        return $res;
    }
	
    
    static function getPaymentMethodOnline() {
        return array(
            1 => Yii::t('shoppingcart', 'payment_online_vn'),
            //'baokim' => Yii::t('shoppingcart', 'payment_online_baokim'),            
            //3 => Yii::t('shoppingcart', 'payment_online_internet_banking'),
            //4 => Yii::t('shoppingcart', 'payment_online_atm_transfer'),
            //5 => Yii::t('shoppingcart', 'payment_online_bank_transfer'),
            //2 => Yii::t('shoppingcart', 'payment_online_visa'),
        );
    }

    /**
     * get payment method info
     * @param type $method_id
     * @return type
     */
    static function getPaymentMethodInfo($method_id) {
        if ($method_id) {
            $pm = self::getPaymentMethod();
            return isset($pm[$method_id]) ? $pm[$method_id] : null;
        }
    }

    /**
     * return transport method
     */
    static function getTranportMethod() {
        return array(
            1 => array(
                'name' => 'Miễn phí vận chuyển trong 5km',
                'price' => 0,
                'time' => 0,
            )
        );
    }

    /**
     * get transport method info
     * @param type $method_id
     * @return type
     */
    static function getTransportMethodInfo($method_id) {
        if ($method_id) {
            $tm = self::getTranportMethod();
            return isset($tm[$method_id]) ? $tm[$method_id] : null;
        }
    }

    static function getStatusArr() {
        return array(
            self::ORDER_WAITFORPROCESS => Yii::t('shoppingcart', 'order_waitforprocess'),
            self::ORDER_WAITFORPAYMENT => Yii::t('shoppingcart', 'order_waitforpayment'),
            self::ORDER_WAITFORCOMPLETE => Yii::t('shoppingcart', 'order_waitforcomplete'),
            self::ORDER_WAITFORDISBURSE => Yii::t('shoppingcart', 'order_waitfordisburse'),
            self::ORDER_WAITFORRECEIVE => Yii::t('shoppingcart', 'order_waitforreceive'),
            self::ORDER_DESTROY => Yii::t('shoppingcart', 'order_destroy'),
            self::ORDER_COMPLETE => Yii::t('shoppingcart', 'order_complete'),
        );
    }

    /**
     * return total price text
     */
    function getTotalPriceText() {
        if ($this->isNewRecord)
            return '';
        return Product::getPriceText(array('price' => $this->order_total, 'currency' => $this->currency));
    }

}
