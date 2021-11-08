<?php

class RealestateController extends BackController {

    /**
     * Index
     */
    public function actionIndex() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/content/realestate/'),
        );
        //
        $model = new RealEstate();
        //
        $this->render("index", array(
            'model' => $model,
        ));
    }

    public function actionProjectIndex() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_manager') => Yii::app()->createUrl('/content/realestate/projectIndex'),
        );
        //
        $model = new RealEstateProject();
        //
        $this->render("project_index", array(
            'model' => $model,
        ));
    }

    /**
     * Edit news category
     * @param type $id
     */
    public function actionUpdate($id) {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/content/realestate/'),
            Yii::t('realestate', 'realestate_update') => Yii::app()->createUrl('content/realestate/update', array('id' => $id)),
        );
        //
        $model = $this->loadModel($id);
        
        $option_project = RealEstateProject::getOptionProject();
        $user_id = Yii::app()->user->id;
        $listprovince = LibProvinces::getListProvinceArr();
        if (!$model->province_id) {
            $first = array_keys($listprovince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $model->province_id = $firstpro;
        }
        $listdistrict = false;

        //
        if (isset($_POST['RealEstate'])) {
            $model->attributes = $_POST['RealEstate'];
            $province = LibProvinces::getProvinceDetail($model->province_id);
            if (isset($province) && $province['name']) {
                $model->province_name = $province['name'];
            }
            $district = LibDistricts::getDistrictDetailFollowProvince($model->province_id, $model->district_id);
            if (isset($district) && $district['name']) {
                $model->district_name = $district['name'];
            }
            //$model->processPrice();
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
                    $this->redirect(array('index'));
                }
            }
        }

        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }

        $this->render("update", array(
            'model' => $model,
            'listprovince' => $listprovince,
            'listdistrict' => $listdistrict,
            'option_project' => $option_project,
            'user_id' => $user_id,
            'realestate_id' => ''
        ));

        //
    }

    public function actionCreate() {
        
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/content/realestate/'),
            Yii::t('realestate', 'realestate_create') => Yii::app()->createUrl('content/realestate/create'),
        );
        
        $model = new RealEstate;
        $model->unsetAttributes();
        $model->type = 1;
        $model->status = 1;

        $option_project = RealEstateProject::getOptionProject();
        $user_id = Yii::app()->user->id;
        $listprovince = LibProvinces::getListProvinceArr();
        if (!$model->province_id) {
            $first = array_keys($listprovince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $model->province_id = $firstpro;
        }
        $listdistrict = false;

        //
        if (isset($_POST['RealEstate'])) {
            $model->attributes = $_POST['RealEstate'];
            $province = LibProvinces::getProvinceDetail($model->province_id);
            if (isset($province) && $province['name']) {
                $model->province_name = $province['name'];
            }
            $district = LibDistricts::getDistrictDetailFollowProvince($model->province_id, $model->district_id);
            if (isset($district) && $district['name']) {
                $model->district_name = $district['name'];
            }
            //$model->processPrice();
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
                    $this->redirect(array('index'));
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
            'option_project' => $option_project,
            'user_id' => $user_id,
            'realestate_id' => ''
        ));
    }

    public function actionProjectUpdate($id) {
        $model = RealEstateProject::model()->findByPk($id);
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/content/realestate/projectIndex'),
            $model->name => Yii::app()->createUrl('/content/realestate/projectUpdate', array('id' => $id)),
        );
        $user_id = Yii::app()->user->id;
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
                    $this->redirect(array('projectIndex'));
                }
            }
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }

        $this->render("project_update", array(
            'model' => $model,
            'listprovince' => $listprovince,
            'listdistrict' => $listdistrict,
            'user_id' => $user_id,
            'id' => $id
        ));
    }
    
    public function actionProjectCreate() {
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/content/realestate/projectIndex'),
            Yii::t('realestate', 'realestate_project_create') => Yii::app()->createUrl('/content/realestate/projectCreate'),
        );
        $model = new RealEstateProject;
        $model->unsetAttributes();
        $user_id = Yii::app()->user->id;
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
                    $this->redirect(array('projectIndex'));
                }
            }
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }
		
	
        $this->render('project_create', array(
            'model' => $model,
            'listprovince' => $listprovince,
            'listdistrict' => $listdistrict,
            'user_id' => $user_id,
            'rp_id' => '',
        ));
    }

    public function actionProjectDelete($id) {
        $model = RealEstateProject::model()->findByPk($id);
        if (!$model) {
            $this->jsonResponse(204);
        }
        if ($model->site_id != $this->site_id) {
            $this->jsonResponse(403);
        }
        //
        if ($model->delete()) {
            $this->jsonResponse(200);
            return;
        }
        $this->jsonResponse(400);
    }

    /**
     * Move down
     */
    public function actionMovecat() {
        if (Yii::app()->request->isAjaxRequest) {
            $status = Yii::app()->request->getParam("status");
            $id = Yii::app()->request->getParam("id");
            $model = NewsCategories::model()->findByPk($id);
            if (!$model) {
                $this->jsonResponse(204);
            }
            if ($model->site_id != $this->site_id) {
                $this->jsonResponse(403);
            }
            //
            $category = new ClaCategory();
            $category->type = ClaCategory::CATEGORY_NEWS;
            //
            switch ($status) {
                case "movedown": {
                        Yii::app()->db->createCommand("UPDATE " . $category->getCategoryTable() . " SET cat_order=cat_order-1 WHERE cat_parent=" . $model->cat_parent . " AND cat_order=" . ($model->cat_order + 1))->execute();
                        Yii::app()->db->createCommand("UPDATE " . $category->getCategoryTable() . " SET cat_order=cat_order+1 WHERE cat_id=$id")->execute();
                        $this->jsonResponse(200);
                    }break;

                case "moveup": {

                        Yii::app()->db->createCommand("UPDATE " . $category->getCategoryTable() . " SET cat_order=cat_order+1 WHERE cat_parent=" . $model->cat_parent . " AND cat_order=" . ($model->cat_order - 1))->execute();
                        Yii::app()->db->createCommand("UPDATE " . $category->getCategoryTable() . " SET cat_order=cat_order-1 WHERE cat_id=$id")->execute();
                        $this->jsonResponse(200);
                    }break;
            }
        } else {
            $this->jsonResponse(400);
        }
    }

    //
    public function actionDelete($id) {
        $model = RealEstate::model()->findByPk($id);
        if (!$model) {
            $this->jsonResponse(204);
        }
        if ($model->site_id != $this->site_id) {
            $this->jsonResponse(403);
        }
        //
        //
        if ($model->delete()) {
            $this->jsonResponse(200);
            return;
        }
        $this->jsonResponse(400);
    }

    /**
     * delete all cats follow id
     */
    public function actionDelallcat() {
        if (Yii::app()->request->isAjaxRequest) {
            $list_id = Yii::app()->request->getParam('lid');
            if (!$list_id)
                Yii::app()->end();
            $ids = explode(",", $list_id);
            $count = (int) sizeof($ids);
            if (!$count)
                $this->jsonResponse(204);
            //
            $category = new ClaCategory();
            $category->type = ClaCategory::CATEGORY_NEWS;
            //
            for ($i = 0; $i < $count; $i++) {
                $id = $ids[$i];
                if ($id) {
                    $model = NewsCategories::model()->findByPk($id);
                    if (!$model)
                        continue;
                    if ($model->site_id == $this->site_id) {
                        if (!$category->hasChildren($id)) {
                            $model->delete();
                        }
                    }
                }
            }
        }
    }

    //
    //
    public function actionUpdateorder($id) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = NewsCategories::model()->findByPk($id);
            if (!$model) {
                $this->jsonResponse(204);
            }
            if ($model->site_id != $this->site_id) {
                $this->jsonResponse(403);
            }
            //
            $order = (int) Yii::app()->request->getParam('or');
            //
            if ($order) {
                $model->cat_order = $order;
                if ($model->save())
                    $this->jsonResponse(200);
            }
        }
    }

    /**
     * upload file
     */
    public function actionUploadfile() {
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            if ($file['size'] > 1024 * 1000)
                Yii::app()->end();
            $up = new UploadLib($file);
            $up->setPath(array($this->site_id, 'category', 'ava'));
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

    public function allowedActions() {
        return 'uploadfile';
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
        $realestate = new RealEstate();
        $realestate->setTranslate(false);
        //
        $OldModel = $realestate->findByPk($id);
        return $OldModel;
    }

    //
}
