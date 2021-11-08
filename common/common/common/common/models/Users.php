<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $user_id
 * @property integer $site_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property integer $sex
 * @property integer $birthday
 * @property string $address
 * @property integer $status
 * @property string $phone
 * @property string $province_id
 * @property integer $created_time
 * @property integer $modified_time
 */
class Users extends ActiveRecord {
    
    public $captcha;

    /**
     * @return string the associated database table name
     */
    public $passwordConfirm = '';
    public $oldPassword = '';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, email, password, address, phone, created_time', 'required'),
            array('name, email, password, address, phone, created_time, phone_introduce', 'required', 'on' => 'signupRealestate'),
            array('name, email, password, address, phone, created_time, identity_card, front_identity_card, back_identity_card', 'required', 'on' => 'signupRverify'),
            array('site_id, sex, status, created_time, modified_time', 'numerical', 'integerOnly' => true),
            array('name, email, password, salt', 'length', 'max' => 100),
            array('captcha', 'required', 'on' => 'signupRealestate'),
            array('captcha', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements(), 'on' => 'signupRealestate'),
            array('password', 'length', 'min' => 6),
            array('address', 'length', 'max' => 255),
            array('phone', 'length', 'max' => 20),
            array('phone', 'isPhone', 'on' => 'signup'),
            array('phone_introduce', 'isPhone', 'on' => 'signupRealestate'),
            array('email', 'checkEmailInsite', 'on' => 'signup'),
            array('email', 'checkEmailInsite', 'on' => 'signupRverify'),
            array('email', 'checkEmailInsite', 'on' => 'signupRealestate'),
            array('phone', 'checkPhoneInsite', 'on' => 'signupRealestate'),
            array('phone_introduce', 'checkPhoneIntroduceInsite', 'on' => 'signupRealestate'),
            array('province_id,district_id', 'length', 'max' => 4),
            array('birthday', 'isDate'),
            array('identity_card, created_identity_card, address_identity_card, front_identity_card, back_identity_card, bank_id, bank_name, bank_branch, phone_introduce, user_id, site_id, name, email, password, salt, sex, birthday, address, status, phone, province_id, district_id, created_time, modified_time, passwordConfirm, active, type, user_introduce_id, is_leader', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => 'User',
            'site_id' => 'Site',
            'name' => Yii::t('user', 'name'),
            'email' => Yii::t('user', 'email'),
            'password' => Yii::t('common', 'password'),
            'salt' => 'Salt',
            'sex' => Yii::t('user', 'sex'),
            'birthday' => Yii::t('user', 'birthday'),
            'address' => Yii::t('user', 'user_address'),
            'status' => Yii::t('common', 'status'),
            'phone' => Yii::t('user', 'user_phone'),
            'province_id' => Yii::t('common', 'province'),
            'district_id' => Yii::t('common', 'district'),
            'created_time' => 'Created Time',
            'modified_time' => 'Modified Time',
            'passwordConfirm' => Yii::t('user', 'confirm_password'),
            'oldPassword' => Yii::t('user','oldpassword'),
            'identity_card' => Yii::t('user','identity_card'),
            'created_identity_card' => Yii::t('user','created_identity_card'),
            'address_identity_card' => Yii::t('user','address_identity_card'),
            'front_identity_card' => Yii::t('user','front_identity_card'),
            'back_identity_card' => Yii::t('user','back_identity_card'),
            'bank_id' => Yii::t('user','bank_id'),
            'bank_name' => Yii::t('user','bank_name'),
            'bank_branch' => Yii::t('user','bank_branch'),
            'phone_introduce' => Yii::t('user','phone_introduce'),
            'type' => Yii::t('user','type'),
            'captcha' => Yii::t('common', 'captcha'),
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
        $this->site_id = Yii::app()->controller->site_id;
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('salt', $this->salt, true);
        $criteria->compare('sex', $this->sex);
        $criteria->compare('birthday', $this->birthday);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('province_id', $this->province_id, true);
        $criteria->compare('created_time', $this->created_time);
        $criteria->compare('modified_time', $this->modified_time);
        $criteria->compare('identity_card', $this->identity_card, true);
        $criteria->compare('address_identity_card', $this->address_identity_card, true);
        $criteria->compare('front_identity_card', $this->front_identity_card, true);
        $criteria->compare('back_identity_card', $this->back_identity_card, true);
        $criteria->compare('bank_id', $this->bank_id, true);
        $criteria->compare('bank_name', $this->bank_name, true);
        $criteria->compare('bank_branch', $this->bank_branch, true);
        $criteria->compare('phone_introduce', $this->phone_introduce, true);
        $criteria->order = 'created_time DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
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

    /**
     * add rule: checking phone number
     * @param type $attribute
     * @param type $params
     */
    public function isDate($attribute, $params) {
        if ($this->$attribute) {
            $format = 'Y-m-d';
            $d = DateTime::createFromFormat($format, $this->$attribute);
            if (!$d || !$d->format($format) == $this->$attribute)
                $this->addError($attribute, Yii::t('errors', 'date_invalid'));
        }
    }

    /**
     * 
     * @param type $attribute
     * @param type $params
     */
    public function checkEmailInsite($attribute, $params) {
        $site_id = $this->site_id;
        $user = $this->findByAttributes(array(
            'site_id' => $site_id,
            'email' => $this->$attribute,
        ));
        if ($user) {
            $this->addError($attribute, Yii::t('errors', 'existinsite', array('{name}' => $this->$attribute)));
        }
    }
    
    public function checkPhoneInsite($attribute, $params) {
        $site_id = $this->site_id;
        $user = $this->findByAttributes(array(
            'site_id' => $site_id,
            'phone' => $this->$attribute,
        ));
        if ($user) {
            $this->addError($attribute, Yii::t('errors', 'existinsite', array('{name}' => $this->$attribute)));
        }
    }
    
    public function checkPhoneIntroduceInsite($attribute, $params) {
        $site_id = $this->site_id;
        $user = $this->findByAttributes(array(
            'site_id' => $site_id,
            'phone' => $this->$attribute,
        ));
        if (!$user) {
            $this->addError($attribute, Yii::t('errors', 'not_phone_introduce_exist_insite', array('{name}' => $this->$attribute)));
        }
    }

    public static function allowExtensions() {
        return array(
            'image/jpeg' => 'image/jpeg',
            'image/gif' => 'image/gif',
            'image/png' => 'image/png',
        );
    }
    
    public static function getCurrentUser() {
        $id = Yii::app()->user->id;
        $user = array();
        if($id) {
            $user = self::model()->findByPk($id);
        } 
        return $user;
    }

}
