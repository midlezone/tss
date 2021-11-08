<?php

/**
 * Description of config_banner
 *
 * @author minhbn
 */
class ForgotForm extends CFormModel {

    public $email = '';
    public $phone = '';
    public $userInfo = null;

    public function rules() {
        return array(
            array('phone', 'required'),
            array('email', 'required'),
            array('email', 'email'),
            array('phone', 'phoneexist'),
        );
    }

    /**
     * validate email exist
     * @param type $attribute
     * @param type $params
     */
    function phoneexist($attribute, $params) {
        $user = Yii::app()->db->createCommand()->select('*')
                ->from(ClaTable::getTable('user'))
                ->where('phone =:phone AND active=' . ActiveRecord::STATUS_ACTIVED . ' AND site_id=:site_id', array(':phone' => $this->$attribute, ':site_id' => Yii::app()->controller->site_id))
                ->queryRow();
        if (!$user) {
            $this->addError($attribute, Yii::t('user', 'số điện thoại không tồn tại trong hệ thống', array('{phone}' => $this->$attribute)));
            return false;
        }
        $this->userInfo = $user;
        //
        return true;
    }

    public function attributeLabels() {
        return array(
			'email' => Yii::t('common', 'email'),
			'phone' => Yii::t('common', 'phone')
		);
    }

}
