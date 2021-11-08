<?php

/**
 * Description of HomeController
 *
 * @author bachminh
 */
class HomeController extends PublicController {

    public function actionIndex() {
		
        $siteinfo = ClaSite::getSiteInfo();
		
        switch ($siteinfo['site_type']) {
            case 1: {
                    $this->redirect(Yii::app()->createUrl('/news/news'));
                }break;
        }
    }
	

    /**
     * Lưu lại truy cập của user
     */
    public function actionUseraccess() {
        $userAccess = new ClaUserAccess();
        $userAccess->checkAccess();
        exit();
    }

}
