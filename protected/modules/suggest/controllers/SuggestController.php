<?php

class SuggestController extends PublicController {

    
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
    /**
     * get district of province
     */
    function actionGetdistrict() {
        $province_id = Yii::app()->request->getParam('pid');
        $allownull = Yii::app()->request->getParam('allownull', 0);
        if ($province_id) {
            $listdistrict = LibDistricts::getListDistrictFollowProvince($province_id);
            if ($listdistrict) {
                $this->jsonResponse('200', array(
                    'html' => $this->renderPartial('ldistrict', array('listdistrict' => $listdistrict, 'allownull' => $allownull), true),
                ));
            }
        } else {
            $listdistrict = array();
            $this->jsonResponse('200', array(
                'html' => $this->renderPartial('ldistrict', array('listdistrict' => $listdistrict, 'allownull' => $allownull), true),
            ));
        }
    }

    /**
     * get ward of district
     */
    function actionGetward() {
        $district_id = Yii::app()->request->getParam('did');
        $allownull = Yii::app()->request->getParam('allownull', 0);
        if ($district_id) {
            $listward = LibWards::getListWardFollowDistrict($district_id);
            if ($listward) {
                $this->jsonResponse('200', array(
                    'html' => $this->renderPartial('lward', array('listward' => $listward, 'allownull' => $allownull), true),
                ));
            }
        } else {
            $listward = array();
            $this->jsonResponse('200', array(
                'html' => $this->renderPartial('lward', array('listward' => $listward, 'allownull' => $allownull), true),
            ));
        }
    }

}
