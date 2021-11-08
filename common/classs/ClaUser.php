<?php

/**
 * @desc get actions of user
 *
 * @author minhbachngoc
 * @since 10/23/2013 11:10
 */
class ClaUser {

    const SUPPER_ADMIN_ID = 1;
    const SEX_UNDEFINE = 0;
    const SEX_MALE = 1;
    const SEX_FEMALE = 2;

    /**
     * return id of supper admin
     */
    static function getSupperAdmin() {
        return self::SUPPER_ADMIN_ID;
    }

    static function isSupperAdmin() {
        $user_id = Yii::app()->user->id;
        if ($user_id == self::getSupperAdmin())
            return true;
        return false;
    }

    /**
     * @desc get user infomation
     * @return array the infomation of user with $userid
     */
    public static function getUserInfo($userid) {
        $userid = (int) $userid;
        if (!$userid)
            return false;
        try {
            $info = Yii::app()->db->createCommand("SELECT * FROM " . ClaTable::getTable('user') . " WHERE user_id=$userid")->queryRow();
            return $info;
        } catch (Exception $e) {
            return false;
        }
    }
	/**
     * @desc get user infomation
     * @return array the infomation of user with $userid
     */
    public static function getUserInfoData() {
        $site_id = Yii::app()->controller->site_id;
		$info = Yii::app()->db->createCommand("SELECT * FROM " . ClaTable::getTable('user') . " WHERE site_id=$site_id")->queryAll();
		return $info;
        
    }
	
	 /**
     * @desc get user infomation
     * @return array the infomation of user with $userid
     */
    public static function updateUserlevel($data,$userid) {
        $userid = (int) $userid;
		$info = Yii::app()->db->createCommand("SELECT * FROM " . ClaTable::getTable('user') . " WHERE user_id=$userid")->queryRow();
		
        if (!$userid && $info['zoda_granted'] != '')
            return false;
        try {
            //$info = Yii::app()->db->createCommand("UPDATE " . ClaTable::getTable('user') . " FROM " . ClaTable::getTable('user') . " WHERE user_id=$userid AND zoda_granted =$data")->queryRow();
			$update = Yii::app()->db->createCommand()
				->update(ClaTable::getTable('user'), 
				array('zoda_granted'=>$data),'user_id=:user_id',array(':user_id'=>$userid));
			
            return $update;
        } catch (Exception $e) {
            return false;
        }
    }
	
    /**
     * get list sex array
     * @return type
     */
    static function getListSexArr() {
        return array(
            self::SEX_UNDEFINE => Yii::t('user', 'sex_undefine'),
            self::SEX_MALE => Yii::t('user', 'sex_male'),
            self::SEX_FEMALE => Yii::t('user', 'sex_female'),
        );
    }

}
