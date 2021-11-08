<?php

class RequestController extends PublicController {

    public $layout = '//layouts/request';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xEEEEEE,
            ),
        );
    }

    //
    function actionCreate() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('request', 'request') => Yii::app()->createUrl('/site/request/create'),
        );
        $model = new Requests('request');
        $model->unsetAttributes();
        $isAjax = Yii::app()->request->isAjaxRequest;
        if (isset($_POST['Requests'])) {
            $model->attributes = $_POST['Requests'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', Yii::t('notice', 'sendrequestsuccess'));
                if ($isAjax)
                    $this->jsonResponse(200, array(
                        'redirect' => Yii::app()->homeUrl,
                    ));
                else
                    $this->redirect(Yii::app()->homeUrl);
                //
            } else if ($isAjax)
                $this->jsonResponse(400, array(
                    'errors' => $model->getJsonErrors(),
                ));
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Chỉ có web3nhat.com mới chạy được controller này
     * @param type $action
     */
    function beforeAction($action) {
        if ($this->site_id . '' != ClaSite::ROOT_SITE_ID . '')
            $this->sendResponse(404);
        //
        return true;
    }

}
