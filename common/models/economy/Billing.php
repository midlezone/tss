<?php

/**
 * Description of Billing
 *
 * @author minhbn
 */
class Billing extends FormModel {

    public $name;
    public $email;
    public $address;
    public $phone;
    public $city;
    public $billtoship;
    public $point;

    public function rules() {
        return array(
            array('name,email,address,phone,city', 'required'),
            array('email', 'email'),
            array('phone', 'isPhone'),
            array('billtoship', 'safe'),
        );
    }

    public function attributeLabels() {
        return array(
            'name' => Yii::t('user','name'),
            'email' => Yii::t('common','email'),
            'address' => Yii::t('user','user_address'),
            'phone' => Yii::t('user','user_phone'),
            'city' => Yii::t('common','province'),
        );
    }

    /**
     * add rule: checking phone number
     * @param type $attribute
     * @param type $params
     */
    public function isPhone($attribute, $params) {
        if (!ClaRE::isPhoneNumber($this->$attribute))
            $this->addError($attribute, Yii::t('errors', 'phone_invalid'));
    }

}
