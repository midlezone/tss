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
class Code extends ActiveRecord {

    
	 public function tableName() {
        return $this->getTableName('code');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
  
        return array(
            array('id,code, product_id,site_id'),
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
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Orders the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
       
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
