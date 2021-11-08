<?php

/**
 * An ActiveRecord object for whole project
 * This class is extended from CActiveRecord
 * @author minhb <minhcoltech@gmail.com>
 * @date 02/03/2014
 */
class ActiveRecord extends CActiveRecord {
    /* const status for objects */

    const STATUS_ACTIVED = 1;
    const STATUS_DEACTIVED = 0;
    const STATUS_WAITING_REALESTATE = 2;
    const STATUS_DELETED = 11;
    const DEFAUT_LIMIT = 100;
    const MIN_DEFAUT_LIMIT = 10;
    const SHOW_IN_HOME = 1;
    const STATUS_WAITING = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_CANCEL = 3;
    const PAYMENT_CASH = 1;
    const PAYMENT_TRANSFER_BY_BANK = 2;
    const DELIVERY_HOME = 1;
    const NOT_DELIVERY = 2;
    const PAYMENT_STATUS_WAITING = 1;
    const PAYMENT_STATUS_SUCCESS = 2;
    const STATUS_USER_WAITING = 2;
    const TYPE_COMMERCIAL = 1;
    const TYPE_INTERNAL = 2;
    const TYPE_FOR_LEASE = 3;
    const TYPE_NEED_LEASE = 4;
    const TYPE_INTERNAL_USER = 1;
    const TYPE_NORMAL_USER = 2;
    const TYPE_LEADER_USER = 3;

    public $translate = true;
    public $language = '';

    const TYPE_SITE_NORMAL = 1;
    const TYPE_SITE_B2B_FASHION = 2;

    /**
     * array status for selectbox
     * @return array
     */
    public static function statusArray() {
        return array(
            self::STATUS_ACTIVED => Yii::t('status', self::STATUS_ACTIVED),
            self::STATUS_DEACTIVED => Yii::t('status', self::STATUS_DEACTIVED)
        );
    }

    public static function typeSite() {
        return array(
            self::TYPE_SITE_NORMAL => Yii::t('site', 'type_site_normal'),
            self::TYPE_SITE_B2B_FASHION => Yii::t('site', 'type_site_b2b_fashion'),
        );
    }

    public static function statusArrayRealestate() {
        return array(
            self::STATUS_ACTIVED => Yii::t('realestate', 'actived'),
            self::STATUS_DEACTIVED => Yii::t('realestate', 'deactived'),
            self::STATUS_WAITING_REALESTATE => Yii::t('realestate', 'waiting')
        );
    }

    public static function statusArrayUser() {
        return array(
            self::STATUS_USER_WAITING => Yii::t('user', 'user_waiting'),
            self::STATUS_DEACTIVED => Yii::t('user', 'user_block'),
            self::STATUS_ACTIVED => Yii::t('user', 'user_success'),
        );
    }

    public static function typeArrayUser() {
        return array(
            self::TYPE_INTERNAL_USER => Yii::t('user', 'user_internal'),
            self::TYPE_NORMAL_USER => Yii::t('user', 'user_normal'),
            self::TYPE_LEADER_USER => Yii::t('user', 'user_leader'),
        );
    }

    public static function typeRealestateArray() {
        return array(
            self::TYPE_COMMERCIAL => Yii::t('realestate', self::TYPE_COMMERCIAL),
            self::TYPE_INTERNAL => Yii::t('realestate', self::TYPE_INTERNAL)
        );
    }

    public static function statusPrintImageArray() {
        return array(
            self::STATUS_WAITING => Yii::t('shoppingcart', 'order_waitforprocess'),
            self::STATUS_SUCCESS => Yii::t('shoppingcart', 'order_complete'),
            self::STATUS_CANCEL => Yii::t('shoppingcart', 'order_destroy'),
        );
    }

    public static function statusPaymentMethod() {
        return array(
            self::PAYMENT_CASH => Yii::t('shoppingcart', 'payment_cash'),
            self::PAYMENT_TRANSFER_BY_BANK => Yii::t('shoppingcart', 'payment_transfer_by_bank'),
        );
    }

    public static function transportMethod() {
        return array(
            self::DELIVERY_HOME => Yii::t('shoppingcart', 'delivery_home'),
            self::NOT_DELIVERY => Yii::t('shoppingcart', 'not_delivery'),
        );
    }

    public static function statusPayment() {
        return array(
            self::PAYMENT_STATUS_WAITING => Yii::t('shoppingcart', 'order_waitforpayment'),
            self::PAYMENT_STATUS_SUCCESS => Yii::t('shoppingcart', 'order_complete'),
        );
    }

    public static function genderArray() {
        return array(
            self::STATUS_ACTIVED => Yii::t('user', 'sex_male'),
            self::STATUS_DEACTIVED => Yii::t('user', 'sex_female')
        );
    }

    public static function statisStatusArray($none = false) {
        if ($none)
            $return[''] = 'All';
        $return [self::STATUS_ACTIVED] = Yii::t('status', self::STATUS_ACTIVED);
        $return [self::STATUS_DEACTIVED] = Yii::t('status', self::STATUS_DEACTIVED);
        //
        return $return;
    }

    /**
     * add rule: checking phone number
     * @param type $attribute
     * @param type $params
     */
    public function isAlias($attribute, $params) {
        if (!ClaRE::isAlias($this->$attribute)) {
            $this->addError($attribute, Yii::t('errors', 'alias_invalid'));
            return false;
        }
        return true;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TokenCommonModel the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Overriding default, so it works correct with arrays of AR models when you
     * use JSON::encode($models) for example (by default it won't use toJSON).
     * Might be fixed by overriding JSON::encode method to use static instead of self,
     * but it'll be difficult to maintain. Waiting for Yii2.
     * @return CMapIterator
     */
    public function getIterator() {
        $attributes = $this->toJSON();
        return new CMapIterator($attributes);
    }

    public function toJSON() {
        $attributes = $this->getAttributes();
        return $attributes;
    }

    /**
     * @author: minhbn
     * endcode html for attributes
     * @param array $attributes an array attributes
     *  if array attributes is null, Chtmlencode all attributes
     * return ActiveRecord $model     
     */
    public function CHtmlEncodeAttributes($attributes = array()) {
        ClaModel::ChtmlEncodeAttributes($this, $attributes);
        return $this;
    }

    /**
     * @author  minhbn <mincoltech@gmail.com>
     * 
     * json_encode Errors
     */
    function getJsonErrors() {
        $listerrors = array();
        foreach ($this->getErrors() as $attribute => $mess)
            $listerrors[CHtml::activeId($this, $attribute)] = $mess;
        $errors = function_exists('json_encode') ? json_encode($listerrors) : CJSON::encode($listerrors);
        return $errors;
    }

    /**
     * return boolean
     * @return type
     */
    function getTranslate() {
        return $this->translate;
    }

    /**
     * set translate
     * @param boolean $translate
     */
    function setTranslate($translate = true) {
        $this->translate = $translate;
        $this->refreshMetaData();
    }

    /**
     * return table if set translate is true
     * @param type $tableName
     */
    function getTableName($tableName = '') {
        return ClaTable::getTable($tableName, array('translate' => $this->getTranslate()));
    }

    /**
     * return languate
     * @return type
     */
    function getLanguage() {
        return $this->language;
    }

    /**
     * set language
     * @param type $language
     */
    function setLanguage($language = '') {
        $languageSupport = ClaSite::getLanguageSupport();
        if (isset($languageSupport[$language])) {
            $this->language = $language;
            $this->refreshMetaData();
        }
    }

}
