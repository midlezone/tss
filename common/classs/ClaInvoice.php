<?php

/**
 * @desc get actions of invoice
 *
 * @author hieu
 */
class ClaInvoice {

    const SUPPER_ADMIN_ID = 1;
    const SEX_UNDEFINE = 0;
    const SEX_MALE = 1;
    const SEX_FEMALE = 2;

    /**
     * @desc get user infomation
     * @return array the infomation of user with $userid
     */
	 public function actionSignup() {  
	
		$session = Yii::app()->session;
        $jsonData = json_decode(file_get_contents('http://online.levananh.com/api/test'));
	
		foreach ($jsonData->response as $val) {
				
				if ($val->mobile != '') {
					$phone = $val->mobile;
					$site = 1182;
						$users = Yii::app()->db->createCommand()->select('*')
							->from(ClaTable::getTable('users'))
							->where('phone=:phone', array(':phone' => $phone))
							->queryRow();
							if(empty($users)) {
								
								$usermodel = new Users('signup');
								$usermodel->scenario = 'signup';
								$usermodel->site_id = $this->site_id;
								
								$listprivince = LibProvinces::getListProvinceArr();
								
								if (!$usermodel->province_id) {
									$first = array_keys($listprivince);
									$firstpro = isset($first[0]) ? $first[0] : null;
									$usermodel->province_id = $firstpro;
								}
								$listdistrict = false;
								$oribirthday = '';
									
								$oribirthday = $usermodel->birthday;
								if ($usermodel->birthday) {
									$usermodel->birthday = strtotime($usermodel->birthday);
								}
								//Auto active
								$usermodel->active = ActiveRecord::STATUS_ACTIVED;
								$usermodel->created_time = $usermodel->modified_time = strtotime(date("Y-m-d"));
						
								$usermodel->password = '7299e47056ef07179df9cf0abd32121c';
								$usermodel->name = $val->name;
								$usermodel->bank_id = $val->id;
								if ($val->email == null) {
									if ($val->mobile == null) {
										$usermodel->email = $val->id.'info@levananh.com';
									} else {
										$usermodel->email = $val->mobile.'@levananh.com';
									}
									
								} else {
									$usermodel->email= $val->email;
								}
								$usermodel->phone = $val->mobile;
								if($val->sex == 'female') {
									$usermodel->sex = 2;
								} 
								if($val->sex == 'male') {
									$usermodel->sex = 1;
								} else {
									$usermodel->sex = null;
						}
					}					
					
				}
		}
	
       
    }
	
    public static function getLevel($userid) {
        $userid = (int) $userid;
        if (!$userid)
            return false;
        try {
			
            $info = Yii::app()->db->createCommand()->select('*,SUM(invoice_price) AS revenue')
                ->from(ClaTable::getTable('invoice'))
                ->where('client_id=:client_id', array(':client_id' => $userid))
                ->queryRow();
			
            return $info;
        } catch (Exception $e) {
            return false;
        }
    }
	/**
     * @desc get user infomation
     * @return array the infomation of user with $userid
     */
    public static function getLevelAll($userid) {
        $userid = (int) $userid;
        if (!$userid)
            return false;
        try {
			
            $info = Yii::app()->db->createCommand()->select('*,SUM(invoice_price) AS revenue')
                ->from(ClaTable::getTable('invoice'))
                ->where('client_id=:client_id', array(':client_id' => $userid))
                ->queryAll();
            return $info;
        } catch (Exception $e) {
            return false;
        }
    }
	/**
     * @desc get user infomation
     * @return array the infomation of user with $userid
     */
    public static function getCategoryName($id) {
        $id = (int) $id;
        if (!$id)
            return false;
        try {
            $info = Yii::app()->db->createCommand()->select('cat_name')
                ->from(ClaTable::getTable('news_categories'))
                ->where('cat_id=:cat_id', array(':cat_id' => $id))
                ->queryRow();

            return $info;
        } catch (Exception $e) {
            return false;
        }
    }
	
	/**
     * @desc get user infomation
     * @return array the infomation of user with $userid
     */
    public static function getPoint($userid) {
        $userid = (int) $userid;
        if (!$userid)
            return false;
        try {
			
            $info = Yii::app()->db->createCommand()->select('*,SUM(invoice_price) AS revenue')
                ->from(ClaTable::getTable('invoice'))
                ->where('client_id=:client_id', array(':client_id' => $userid))
                ->queryRow();
			
            return $info;
        } catch (Exception $e) {
            return false;
        }
    }

}
