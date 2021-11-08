<?php

class LecturerController extends BackController {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        
        $this->breadcrumbs = array(
            Yii::t('course', 'lecturer_manager') => Yii::app()->createUrl('/economy/lecturer/'),
            Yii::t('course', 'lecturer_add_new') => Yii::app()->createUrl('/economy/courseCategories/create'),
        );
        
        $model = new Lecturer;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Lecturer'])) {
            $model->attributes = $_POST['Lecturer'];
            if ($model->bod && $model->bod != '' && (int) strtotime($model->bod)) {
                $model->bod = (int) strtotime($model->bod);
            } else {
                $model->bod = time();
            }
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->avatar_path = $avatar['baseUrl'];
                    $model->avatar_name = $avatar['name'];
                }
            }
            
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Lecturer'])) {
            $model->attributes = $_POST['Lecturer'];
            if ($model->bod && $model->bod != '' && (int) strtotime($model->bod)) {
                $model->bod = (int) strtotime($model->bod);
            } else {
                $model->bod = time();
            }
            
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->avatar_path = $avatar['baseUrl'];
                    $model->avatar_name = $avatar['name'];
                }
            }
            
            if ($model->save()) {
                $this->redirect(array('index'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {

        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('banner', 'banner_manager') => Yii::app()->createUrl('banner/banner/'),
        );
        //
        $model = new Lecturer('search');
        $model->unsetAttributes();  // clear any default values
        $model->site_id = $this->site_id;
        if (isset($_GET['Lecturer'])) {
            $model->attributes = $_GET['Lecturer'];
        }

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Lecturer('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Lecturer']))
            $model->attributes = $_GET['Lecturer'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Lecturer the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $lecturer = new Lecturer();
        $lecturer->setTranslate(false);
        //
        $OldModel = $lecturer->findByPk($id);
        //
        if ($OldModel === NULL) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        if ($OldModel->site_id != $this->site_id) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        if (ClaSite::getLanguageTranslate()) {
            $lecturer->setTranslate(true);
            $model = $lecturer->findByPk($id);
        } else {
            $model = $OldModel;
        }
        //
        return $model;
        
    }

    /**
     * Performs the AJAX validation.
     * @param Lecturer $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'lecturer-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    /**
     * upload file
     */
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
            $up->setPath(array($this->site_id, 'lecturer', 'ava'));
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
