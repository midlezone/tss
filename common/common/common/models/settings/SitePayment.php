<?php

/**
 * This is the model class for table "site_payment".
 *
 * The followings are the available columns in table 'site_payment':
 * @property string $site_id
 * @property string $payment_type
 * @property integer $status
 * @property string $email_bussiness
 * @property integer $merchan_id
 * @property string $params
 */
class SitePayment extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'site_payment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email_bussiness, payment_type, merchan_id, api_user, api_password, secure_pass, pri_key', 'required'),
            array('status, merchan_id', 'numerical', 'integerOnly' => true),
            array('payment_type', 'length', 'max' => 6),
            array('email_bussiness', 'length', 'max' => 100),
            array('email_bussiness', 'email'),
            array('params', 'length', 'max' => 512),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('site_id, payment_type, status, email_bussiness, merchan_id, params, api_user, api_password, secure_pass, pri_key', 'safe'),
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
            'site_id' => 'Site',
            'payment_type' => Yii::t('setting', 'setting_payment_type'),
            'status' => 'Status',
            'email_bussiness' => Yii::t('setting', 'email_bussiness'),
            'merchan_id' => 'Merchan ID',
            'params' => 'Params',
            'api_user' => 'API User',
            'api_password' => 'API Password',
            'secure_pass' => 'Secure Password',
            'pri_key' => 'Private Key',
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
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function checkPaymentOnline() {
        $res = $this->find('site_id=:site_id AND status=1', array(':site_id' => Yii::app()->siteinfo['site_id']));
        return (is_null($res)) ? false : true;
    }

    public function getEmailBussiness($payment_type) {
        $res = $this->findByPk(array('site_id' => Yii::app()->siteinfo['site_id'], 'payment_type' => $payment_type));
        if ($res && $res->email_bussiness) {
            return $res->email_bussiness;
        } else {
            return '';
        }
    }

    public function getConfigPayment($payment_type) {
        $model = $this->findByPk(array('site_id' => Yii::app()->siteinfo['site_id'], 'payment_type' => $payment_type), 'status=1');
        if ($model) {
            $res = $model->getAttributes();
            unset($res['id']);
            unset($res['params']);
            return $res;
        } else {
            return false;
        }
    }

}
