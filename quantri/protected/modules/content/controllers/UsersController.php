<?php

class UsersController extends BackController {

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        if ($model->site_id != $this->site_id) {
            if (Yii::app()->request->isAjaxRequest)
                $this->jsonResponse(400);
            else
                $this->sendResponse(400);
        }
        $model->delete();
		

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Lists all models.
     */
	
    public function actionIndex() {
        $this->breadcrumbs = array(
            Yii::t('user', 'manager_user') => Yii::app()->createUrl('content/users'),
        );
        $model = new Users('search');
        $model->unsetAttributes();
		Yii::import('ext.ECSVExport');

		
        $this->render('index', array(
            'model' => $model,
        ));
		
    }
   
    public function actionReport () {
        
         $this->breadcrumbs = array(
            Yii::t('user', 'Thống Kế Người Dùng') => Yii::app()->createUrl('content/users'),
        );
        $site_id = Yii::app()->controller->site_id;
        
        $data = Yii::app()->db->createCommand()->select('*')
                ->from(ClaTable::getTable('users'))
                ->where('site_id=:site_id', array(':site_id' => $site_id))
                ->queryAll();
                
        $dateWeek = strtotime(date("Y-m-d", strtotime("-1 week")));
        $dateNow = strtotime(date("Y-m-d"));
        $dateMonth = strtotime(date("Y-m-d", strtotime("-1 month")));        
        
        $dataNow = Yii::app()->db->createCommand()->select('*')
                ->from(ClaTable::getTable('users'))
                ->where('site_id="'.$site_id.'" AND created_time='.$dateNow)
                ->queryAll();
        
        $dataWeek = Yii::app()->db->createCommand()->select('*')
                ->from(ClaTable::getTable('users'))
                ->where('site_id = "'.$site_id.'" AND created_time <= "'.$dateNow.'" AND created_time >='.$dateWeek)
                ->queryAll();
                
        $dataMonth = Yii::app()->db->createCommand()->select('*')
                ->from(ClaTable::getTable('users'))
                ->where('site_id = "'.$site_id.'" AND created_time <= "'.$dateNow.'" AND created_time >='.$dateMonth)
                ->queryAll();
                
        $dataActive = Yii::app()->db->createCommand()->select('*')
                ->from(ClaTable::getTable('users'))
                ->where('site_id="'.$site_id.'" AND active= 1')
                ->queryAll();
                
        $dataNotActive = Yii::app()->db->createCommand()->select('*')
                ->from(ClaTable::getTable('users'))
                ->where('site_id="'.$site_id.'" AND active= 0')
                ->queryAll();
        
        $dataArr = Yii::app()->db->createCommand()->select('level')
                ->from(ClaTable::getTable('users'))
                ->where('site_id=:site_id', array(':site_id' => $site_id))                
                ->queryAll();         
                
        foreach ($dataArr as $key=>$value) {            
            $dataLevel[] = $value['level'];
        }
        $dataLevel = array_count_values($dataLevel);

        $dataTemp = array();
        $dataArr = array();
        foreach ($dataLevel as $key => $value) {
              $dataTemp['name'] = 'Level '.$key;
              $dataTemp['y'] =  $value;
              $dataArr[] = $dataTemp;
        }
        $dataLevelArr = json_encode($dataArr);
     
        $this->render('report', array(
            'dataLevelArr' => $dataLevelArr,
            'data' => count($data),
            'dataNow' => count($dataNow),
            'dataWeek' => count($dataWeek),
            'dataMonth' => count($dataMonth),
            'dataActive' => count($dataActive),
            'dataNotActive' => count($dataNotActive),
        ));
    }
    
    public function actionIndexNormal() {

        $this->breadcrumbs = array(
            Yii::t('user', 'manager_user') => Yii::app()->createUrl('content/users'),
        );
        $model = new Users('search');
		
		
        $model->unsetAttributes();
		if (isset($_GET['Users']))
            $model->attributes = $_GET['Users'];
		
		$userInfo = ClaUser::getUserInfoData();
		
		$sql = '';
		foreach($userInfo as $val)
		{
			$level = ClaInvoice::getLevel($val['bank_id']);
			
			if ($level['revenue'] != null) {
				$point = $level['revenue']/10000;
				
					if ($point < '500') 
					{
						$point_data = 'Hội viên';
					} elseif ( $point >= '500' &&  $point < '1000') 
					{
						 $point_data = 'Silver';
					} elseif ( $point >= '1000' &&  $point < '2000') 
					{
						 $point_data = 'Gold';
					} elseif ( $point >= '2000' &&  $point < '3000') {
						 $point_data = 'Platinum';
					} else {
						 $point_data = 'Diamond';
					}
				if ($val['zocoin'] == 'Fan Cứng') {
					//$sql .= "UPDATE users SET zocoin = 'Fan Cứng' WHERE user_id = ".$val['user_id']."; ";
					//$sql .= "UPDATE users SET zoda_granted = '".$point."' WHERE user_id = ".$val['user_id']."; ";
				} else {
					//$sql .= "UPDATE users SET zocoin = '".$point_data."' WHERE user_id = ".$val['user_id']."; ";
					//$sql .= "UPDATE users SET zoda_granted = '".$point."' WHERE user_id = ".$val['user_id']."; ";
				}				
			}
		   
			
		
		}
		//Yii::app()->db->createCommand($sql)->execute();
		
        $this->render('index_normal', array(
            'model' => $model,
        ));
    }
	public function updateData($id) {
		
		$userInfo = ClaUser::getUserInfo($id);
		$level = ClaInvoice::getLevel($userInfo['bank_id']);
		
		if ($level['revenue'] != null) {
				$point = $level['revenue']/10000;
				
				if ($point < '500') 
				{
					$point_data = 'Hội viên';
				} elseif ( $point >= '500' &&  $point < '1000') 
				{
					 $point_data = 'Silver';
				} elseif ( $point >= '1000' &&  $point < '2000') 
				{
					 $point_data = 'Gold';
				} elseif ( $point >= '2000' &&  $point < '3000') {
					 $point_data = 'Platinum';
				} else {
					 $point_data = 'Diamond';
				}
				
				$sql .= "UPDATE users SET zocoin = '".$point_data."' WHERE user_id = ".$userInfo['user_id']."; ";
				$sql .= "UPDATE users SET zoda_granted = '".$point."' WHERE user_id = ".$userInfo['user_id']."; ";
				Yii::app()->db->createCommand($sql)->execute();
			
		}
		  
	}
     public function actionIndexTest() {

        $this->breadcrumbs = array(
            Yii::t('user', 'manager_user') => Yii::app()->createUrl('content/users'),
        );
        $model = new Users('search');
		
		
        $model->unsetAttributes();
		if (isset($_GET['Users']))
            $model->attributes = $_GET['Users'];
		
		$userInfo = ClaUser::getUserInfoData();
		
		$sql = '';
		foreach($userInfo as $val)
		{
			$level = ClaInvoice::getLevel($val['bank_id']);
			
			if ($level['revenue'] != null) {
				$point = $level['revenue']/10000;
				
					if ($point < '500') 
					{
						$point_data = 'Hội viên';
					}
					if ( $point >= '500' &&  $point < '1000') 
					{
						 $point_data = 'Silver';
					} 
					if ( $point >= '1000' &&  $point < '2000') 
					{
						 $point_data = 'Gold';
					}
					if ( $point >= '2000' &&  $point < '3000') {
						 $point_data = 'Platinum';
					} 
					if ( $point >= '3000') {
						 $point_data = 'Diamond';
					}
				
				
				$sql .= "UPDATE users SET zocoin = '".$point."' WHERE user_id = ".$val['user_id']."; ";
				//$sql .= "UPDATE users SET zoda_granted = '".$point."' WHERE user_id = ".$val['user_id']."; ";
			}
		   
			
		
		}
		Yii::app()->db->createCommand($sql)->execute();
		
        $this->render('index_normal', array(
            'model' => $model,
        ));
    }
    public function actionUpdateNormal($id) {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('user', 'manager_user') => Yii::app()->createUrl('content/users'),
            Yii::t('user', 'user_update_profile') => Yii::app()->createUrl('/content/news/update', array('id' => $id)),
        );
        //
		
		$this->updateData($id);
		
        $model = $this->loadModel($id);
	
		
		$district_id = Yii::app()->db->createCommand()
		->select('*')
		->from('district')
		->where('district_id=:district_id', array(':district_id'=>$model->district_id))
		->queryRow(); 
		
		$province_id = Yii::app()->db->createCommand()
		->select('*')
		->from('province')
		->where('province_id=:province_id', array(':province_id'=>$model->province_id))
		->queryRow(); 
		
        //
        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
		
			if ($model->zocoin == 'Fan Cứng') {
				$model->point = 'Fan Cứng';
			}
			
            $user_introduce = Users::model()->findByAttributes(array(
                'site_id' => $this->site_id,
                'phone' => $model->phone_introduce,
                'zoda_granted' => $model->zoda_granted
            ));

            $model->user_introduce_id = $user_introduce->user_id;
		
            if($model->save(false)) {
                $this->redirect(array('indexNormal'));
            }
        }
	

        $this->render('update_normal', array(
            'model' => $model,
            'district_id' => $district_id,
            'province_id' => $province_id,
        ));
    }

    public function actionUpdate($id) {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('user', 'manager_user') => Yii::app()->createUrl('content/users'),
            Yii::t('user', 'user_update_profile') => Yii::app()->createUrl('/content/news/update', array('id' => $id)),
        );
        //
        $model = $this->loadModel($id);
        //
        if (isset($_POST['Users'])) {
            $model->attributes = $_POST['Users'];
            $user_introduce = Users::model()->findByAttributes(array(
                'site_id' => $this->site_id,
                'phone' => $model->phone_introduce,
            ));
            $model->user_introduce_id = $user_introduce->user_id;
            if($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return News the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        //
        $user = new Users();
        $user->setTranslate(false);
        //
        $OldModel = $user->findByPk($id);
        //
        if ($OldModel === NULL) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        if ($OldModel->site_id != $this->site_id) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $user = $OldModel;
        return $user;
    }

    /**
     * Performs the AJAX validation.
     * @param News $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function allowedActions() {
        return 'uploadfile';
    }

    function beforeAction($action) {
        //
        return parent::beforeAction($action);
    }
    
    public function actionUserIntroduce() {
        $this->breadcrumbs = array(
            'Mạng lưới' => Yii::app()->createUrl('content/users/userIntroduce'),
        );
        $site_id = Yii::app()->controller->site_id;
        $data = Yii::app()->db->createCommand()->select('user_id, name, user_introduce_id')
                ->from(ClaTable::getTable('users'))
                ->where('site_id=:site_id', array(':site_id' => $site_id))
                ->queryAll();
        $this->process_data($data, 0, $result);
        
        $html = json_encode($result);
        $this->render('user_introduce', array(
            'html' => $html,
        ));
    }

    public function process_data($data, $parent_id, &$result) {
        if (count($data) > 0) {
            foreach ($data as $key => $val) {
                if ($parent_id == $val['user_introduce_id']) {
                    $temp['id'] = $val['user_id'];
                    $temp['parent'] = ($val['user_introduce_id'] == 0) ? '#' : $val['user_introduce_id'];
                    $temp['text'] = $val['name'];
                    $temp['state'] = array('opened' => true);
                    $result[] = $temp;
                    $_parent_id = $val['user_id'];
                    unset($data[$key]);
                    $this->process_data($data, $_parent_id, $result);
                }
            }
        }
    }

}
