<?php

class RequestController extends BackController {

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('request', 'request_manager') => Yii::app()->createUrl('manager/request'),
            Yii::t('request', 'request_edit') => Yii::app()->createUrl('manager/request/update', array('id' => $id)),
        );
        //
        //
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Requests'])) {
            $model->attributes = $_POST['Requests'];
            if ($model->save())
                $this->redirect(array('index'));
        }

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
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('request', 'request_manager') => Yii::app()->createUrl('manager/request'),
        );
        //
        $model = new Requests('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Requests']))
            $model->attributes = $_GET['Requests'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Requests the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Requests::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Requests $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'requests-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    function beforeAction($action) {
        if ($this->site_id . '' != ClaSite::ROOT_SITE_ID . '')
            $this->sendResponse(404);
        //
        return true;
    }

}
