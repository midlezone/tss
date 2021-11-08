<?php

class FileController extends BackController {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->breadcrumbs = array(
            Yii::t('file', 'file_manager') => Yii::app()->createUrl('media/file/all'),
        );
        $model = new Files;
        $model->site_id = $this->site_id;
        $folder_id = (int) Yii::app()->request->getParam('fid');
        if ($folder_id) {
            $model->folder_id = $folder_id;
        }
        //
        if (isset($_POST['Files'])) {
            $model->attributes = $_POST['Files'];
            $file = $_FILES['file_src'];
            if ($file && $file['name']) {
                $model->file_src = 'true';
                $model->size = $file['size'];
            }
            //
			
			if ($model->publicdate && $model->publicdate != '' && (int) strtotime($model->publicdate))
                $model->publicdate = (int) strtotime($model->publicdate);
            else
                $model->publicdate = time();
		
				
            if ($model->folder_id) {
                $folder = Folders::model()->findByPk($model->folder_id);
                if (!$folder)
                    $model->folder_id = null;
                if ($folder->site_id != $this->site_id)
                    $model->folder_id = null;
            }
			
            if ($model->validate()) {
                set_time_limit(0);
                $model->id = ClaGenerate::getUniqueCode(array('prefix' => 'f'));
                $up = new UploadLib($file);
                $up->setPath(array($this->site_id, date('m-Y')));
                $up->uploadFile();
                $response = $up->getResponse(true);
                //
                if ($up->getStatus() == '200') {
                    $model->path = $response['baseUrl'];
                    $model->name = $response['name'];
                    $model->extension = $response['ext'];
                    $model->file_src = 'true';
                } else
                    $model->file_src = '';
                $model->user_id = Yii::app()->user->id;
                if ($model->save()) {
                    if ($model->folder_id)
                        $this->redirect(Yii::app()->createUrl('media/folder/list', array('fid' => $model->folder_id)));
                    else
                        $this->redirect(Yii::app()->createUrl('media/file/all'));
                }
            }
        }
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(Yii::t('file', 'file_create') => Yii::app()->createUrl('media/file/all'),));
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
        $this->breadcrumbs = array(
            Yii::t('file', 'file_manager') => Yii::app()->createUrl('media/file/all'),
        );
        $model = $this->loadModel($id);
        if ($model->site_id != $this->site_id)
            $this->sendResponse(400);
        if (isset($_POST['Files'])) {
            $model->file_src = 'true';
            $model->attributes = $_POST['Files'];
            //
			if ($model->publicdate && $model->publicdate != '' && (int) strtotime($model->publicdate) > 0)
                $model->publicdate = (int) strtotime($model->publicdate);
			
            if ($model->folder_id) {
                $folder = Folders::model()->findByPk($model->folder_id);
                if (!$folder)
                    $model->folder_id = null;
                if ($folder->site_id != $this->site_id)
                    $model->folder_id = null;
            }
            //
            if ($model->save()) {
                if ($model->folder_id)
                    $this->redirect(Yii::app()->createUrl('media/folder/list', array('fid' => $model->folder_id)));
                else
                    $this->redirect(Yii::app()->createUrl('media/file/all'));
            }
        }
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(Yii::t('file', 'file_update') => Yii::app()->createUrl('media/file/all'),));
        $this->render('update', array(
            'model' => $model,
        ));
    }

    //
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
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Xóa nhiều bản ghi
     */
    public function actionDeleteall() {
        if (Yii::app()->request->isAjaxRequest) {
            $list_id = Yii::app()->request->getParam('lid');
            if (!$list_id)
                Yii::app()->end();
            $ids = explode(",", $list_id);
            $count = (int) sizeof($ids);
            for ($i = 0; $i < $count; $i++) {
                if ($ids[$i]) {
                    $model = $this->loadModel($ids[$i]);
                    if ($model->site_id == $this->site_id) {
                        $model->delete();
                    }
                }
            }
        }
    }

    /**
     * 
     */
    public function actionAll() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('file', 'file_manager') => Yii::app()->createUrl('media/file/all'),
        );
        $model = new Files('search');
        $model->unsetAttributes();  // clear any default values
        $model->site_id = $this->site_id;
        if (isset($_GET['Files']))
            $model->attributes = $_GET['Files'];
        //
        $this->render('list', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Files the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Files::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Files $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'files-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
