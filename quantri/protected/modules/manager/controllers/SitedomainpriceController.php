<?php

class SitedomainpriceController extends BackController {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('site', 'site_domain_price') => Yii::app()->createUrl('manager/site/domainprice'),
            Yii::t('site', 'site_domain_price_create') => Yii::app()->createUrl('manager/site/domainprice/create'),
        );
        //
        $model = new SiteDomainPrices;
        //
        if (isset($_POST['SiteDomainPrices'])) {
            $model->attributes = $_POST['SiteDomainPrices'];
            if ($model->save()) {
                $domain = new SiteDomainPrices();
                !$domain->save();
                //
                $this->redirect(Yii::app()->createUrl('/manager/site/domainprice'));
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
            Yii::t('site', 'site_manager') => Yii::app()->createUrl('manager/site/domainprice'),
            Yii::t('site', 'site_update') => Yii::app()->createUrl('manager/site/domainprice/update', array('id' => $id)),
        );
        //
        $model = $this->loadModel($id);
        //
        if (isset($_POST['SiteDomainPrices'])) {
            $post = $_POST['SiteDomainPrices'];
            //
            if ($model->save())
                $this->redirect(Yii::app()->createUrl('/manager/site/domainprice'));
        }
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
            SiteDomainPrices::deleteSite($id);
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
            Yii::t('site', 'site_domain_price') => Yii::app()->createUrl('manager/site/domainprice'),
        );
        //
        $model = new SiteDomainPrices('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['SiteDomainPrices']))
            $model->attributes = $_GET['SiteDomainPrices'];

        $this->render('index', array(
            'model' => $model,
        ));
    }


    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return SiteSettings the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = SiteDomainPrices::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param SiteSettings $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'site-domain-prices-form') {
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
