<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BackController extends Controller {

    /**
     * @minhbn
     * before action
     */
    public function beforeAction($action) {
        //
        if (Yii::app()->request->isAjaxRequest) {
            Yii::app()->clientScript->scriptMap = array(
                'jquery.js' => false,
                'jquery.min.js' => false,
                'jquery-ui.min.js' => false,
                'jquery-ui.js' => false,
            );
        }
        if (Yii::app()->user->isGuest && isset(Yii::app()->siteinfo['status']) && Yii::app()->siteinfo['status'] != ClaSite::SITE_STATUS_DISABLE) {
            //
            if (!isset(Yii::app()->controller->module->id) || Yii::app()->controller->module->id != 'login')
                $this->redirect(Yii::app()->createUrl('/login/login/login'));
        }
        //
        $_SESSION['site_id'] = $this->site_id;
        //
        if (!ClaSite::checkAdminSessionExist() && !Yii::app()->user->isGuest) {
            ClaSite::generateAdminSession();
        }
        /* check user locked or not */
        return parent::beforeAction($action);
    }

}
