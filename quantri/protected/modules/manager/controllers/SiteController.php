<?php

class SiteController extends BackController {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('site', 'site_manager') => Yii::app()->createUrl('manager/site'),
            Yii::t('site', 'site_create') => Yii::app()->createUrl('manager/site/create'),
        );
        //
        $model = new SiteSettings;
        //
        if (isset($_POST['SiteSettings'])) {
            $model->attributes = $_POST['SiteSettings'];
            $model->user_id = Yii::app()->user->id;
            $model->domain_default = $model->site_skin . '.' . ClaSite::getDemoDomain();
            if ($model->save()) {
                $domain = new Domains();
                $domain->domain_id = $model->site_skin . '.' . ClaSite::getDemoDomain();
                $domain->site_id = $model->site_id;
                $domain->user_id = Yii::app()->user->id;
                !$domain->save();
                //
                $this->redirect(Yii::app()->createUrl('/manager/site'));
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
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('site', 'site_manager') => Yii::app()->createUrl('manager/site'),
            Yii::t('site', 'site_update') => Yii::app()->createUrl('manager/site/update', array('id' => $id)),
        );
        //
        $model = $this->loadModel($id);
        //
        if (isset($_POST['SiteSettings'])) {
            $post = $_POST['SiteSettings'];
            if (!ClaUser::isSupperAdmin()) {
                if (isset($post['expiration_date']))
                    unset($post['expiration_date']);
                if (isset($post['languages_for_site']))
                    unset($post['languages_for_site']);
                if (isset($post['storage_limit']))
                    unset($post['storage_limit']);
                if (isset($post['storage_used']))
                    unset($post['storage_used']);
            }
            $model->attributes = $post;
            if ($model->expiration_date && $model->expiration_date != '' && (int) strtotime($model->expiration_date))
                $model->expiration_date = (int) strtotime($model->expiration_date);
            else {
                $model->expiration_date = 0;
            }
            // validate languages_for_site
            $_languages_for_sites = $model->languages_for_site;
            $languages_for_sites = array();
            if ($_languages_for_sites) {
                $languages = ClaSite::getLanguageSupport();
                foreach ($_languages_for_sites as $languages_for_site) {
                    if (isset($languages[$languages_for_site]))
                        $languages_for_sites[$languages_for_site] = $languages_for_site;
                }
            }
            if (count($languages_for_sites))
                $model->languages_for_site = implode(' ', $languages_for_sites);
            else
                $model->languages_for_site = '';
            if ($model->storage_limit)
                $model->storage_limit = ClaConvert::convertMBtoB($model->storage_limit);
            //
            if ($model->save())
                $this->redirect(Yii::app()->createUrl('/manager/site'));
        }
        //
        if (!$model->storage_limit)
            $model->storage_limit = null;
        else
            $model->storage_limit = ClaConvert::convertBtoMB($model->storage_limit);
        //
        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        return false;
        if (Yii::app()->isDemo) {
            SiteSettings::deleteSite($id);
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('site', 'site_manager') => Yii::app()->createUrl('manager/site'),
        );
        //
        $model = new SiteSettings('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SiteSettings']))
            $model->attributes = $_GET['SiteSettings'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * upload file
     */
    public function actionUploadfile() {
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            // Dung lượng nhỏ hơn 1Mb
            if ($file['size'] > 1024 * 1000)
                Yii::app()->end();
            $up = new UploadLib($file);
            //$up->uploadFile();
            $up->setPath(array($this->site_id, 'logo'));
            $up->uploadImage();
            $return = array();
            $response = $up->getResponse(true);
            $return = array('status' => $up->getStatus(), 'data' => $response, 'host' => ClaHost::getImageHost(), 'size' => '');
            if ($up->getStatus() == '200') {
                $return['data']['realurl'] = ClaHost::getImageHost() . $response['baseUrl'] . $response['name'];
            }
            echo json_encode($return);
            Yii::app()->end();
        }
        //
    }

    /**
     * upload file
     */
    public function actionUploadfavicon() {
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            // Dung lượng nhỏ hơn 10kb
            if ($file['size'] > 50 * 1000)
                Yii::app()->end();
            $up = new UploadLib($file);
            //$up->uploadFile();
            $up->setPath(array($this->site_id, 'favi'));
            $up->uploadImage();
            $return = array();
            $response = $up->getResponse(true);
            $return = array('status' => $up->getStatus(), 'data' => $response, 'host' => ClaHost::getImageHost(), 'size' => '');
            if ($up->getStatus() == '200') {
                $return['data']['realurl'] = ClaHost::getImageHost() . $response['baseUrl'] . $response['name'];
            }
            echo json_encode($return);
            Yii::app()->end();
        }
        //
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return SiteSettings the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = SiteSettings::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param SiteSettings $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'site-settings-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    function beforeAction($action) {
        if (!ClaUser::isSupperAdmin())
            throw new CHttpException(404, 'The requested page does not exist.');
        return parent::beforeAction($action);
    }

}
