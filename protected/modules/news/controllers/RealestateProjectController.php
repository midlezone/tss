<?php

class RealestateProjectController extends PublicController {

    public $layout = '//layouts/real_estate_project';

    /**
     * real estate index
     */
    public function actionIndex() {
        //
        $this->layoutForAction = '//layouts/real_estate_index';
        //
        $this->breadcrumbs = array(
            Yii::t('product', 'product') => Yii::app()->createUrl('/economy/product'),
        );
        $this->render('index');
    }

    // Tạo tin bất động sản
    public function actionCreate() {
        $this->layoutForAction = '//layouts/real_estate_project_create';
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_manager') => Yii::app()->createUrl('/news/realestateProject/list'),
            Yii::t('common', 'create') => '',
        );
        $user_id = Yii::app()->user->id;
        $model = new RealEstateProject;
        $model->unsetAttributes();

        $listprovince = LibProvinces::getListProvinceArr();
        if (!$model->province_id) {
            $first = array_keys($listprovince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $model->province_id = $firstpro;
        }

        $listdistrict = false;

        if (isset($_POST['RealEstateProject'])) {
            $model->attributes = $_POST['RealEstateProject'];
            $province = LibProvinces::getProvinceDetail($model->province_id);
            if (isset($province) && $province['name']) {
                $model->province_name = $province['name'];
            }
            $district = LibDistricts::getDistrictDetailFollowProvince($model->province_id, $model->district_id);
            if (isset($district) && $district['name']) {
                $model->district_name = $district['name'];
            }
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            }

            $model->user_id = $user_id;
            if (!$model->getErrors()) {
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', Yii::t('realestate', 'create_success'));
                    $this->redirect(array('create'));
                }
            }
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }
        $this->render('create', array(
            'model' => $model,
            'listprovince' => $listprovince,
            'listdistrict' => $listdistrict,
            'user_id' => $user_id,
        ));
    }

    public function actionList() {
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_manager') => Yii::app()->createUrl('/news/realestateProject/list'),
            Yii::t('common', 'create') => '',
        );
        $user_id = Yii::app()->user->id;
		
		$site_id = Yii::app()->controller->site_id;
        $projects = array();
        $data = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('real_estate_project'))
                ->where('site_id=:site_id AND status=:status', array(':site_id' => $site_id, ':status' => ActiveRecord::STATUS_ACTIVED))
                ->queryAll();
        $pagesize = 10000;
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
		
		
        if (count($data)) {
            foreach ($data as $project) {
                $projects[$project['id']] = $project;
                $projects[$project['id']]['link'] = Yii::app()->createUrl('news/realestateProject/detail', array('id' => $project['id'], 'alias' => $project['alias']));
                $projects[$project['id']]['realestates'] = RealEstate::getRealestateInProject($project['id'], array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
                ));
            }
        } 
		
		
        $this->render('list_project', array(
            'user_id' => $user_id,
			'projects' => $projects,			
        ));
    }
	
	 public function actionDetail($id) {
        $this->breadcrumbs = array(
            Yii::t('realestate', 'Chi Tiết Dự Án') => Yii::app()->createUrl('/news/realestateProject/detail'),
        );
		
        $user_id = Yii::app()->user->id;
		
		$site_id = Yii::app()->controller->site_id;
		$real_estate_project = RealEstateProject::model()->findByPk($id);	
	
        $this->render('detail_project', array(
            'user_id' => $user_id,
			'projects' => $real_estate_project,			
        ));
    }

	
    public function actionUploadfile() {
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            if ($file['size'] > 1024 * 1000 * 2) {
                $this->jsonResponse('400', array(
                    'message' => Yii::t('errors', 'filesize_toolarge', array('{size}' => '2Mb')),
                ));
                Yii::app()->end();
            }
            $up = new UploadLib($file);
            $up->setPath(array($this->site_id, 'realestateproject', 'ava'));
            $up->uploadImage();
            $return = array();
            $response = $up->getResponse(true);
            $return = array('status' => $up->getStatus(), 'data' => $response, 'host' => ClaHost::getImageHost(), 'size' => '');
            if ($up->getStatus() == '200') {
                $keycode = ClaGenerate::getUniqueCode();
                $return['data']['realurl'] = ClaHost::getImageHost() . $response['baseUrl'] . 's100_100/' . $response['name'];
                $return['data']['avatar'] = $keycode;
                Yii::app()->session[$keycode] = $response;
            }
            echo json_encode($return);
            Yii::app()->end();
        }
        //
    }

}
