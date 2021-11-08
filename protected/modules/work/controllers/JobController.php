<?php

class JobController extends PublicController {

    public $layout = '//layouts/job';

    /**
     * hiển thị tin tuyển dụng
     */
    function actionIndex() {
        $this->pageTitle = Yii::t('work', 'work');
        $this->breadcrumbs = array(
            Yii::t('work', 'work') => Yii::app()->createUrl('/work/job'),
        );
        //
        $provinces = LibProvinces::getListProvinceArr();
        //
        //
        $pagesize = Yii::app()->params['defaultPageSize'];
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        //
        $jobs = Jobs::getJobInSite(array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
                    'full' => false,
        ));
        //
        $totalitem = Jobs::countJobInSite();
        //
        $this->render('index', array(
            'jobs' => $jobs,
            'provinces' => $provinces,
            'limit' => $pagesize,
            'totalitem' => $totalitem,
        ));
    }

    /**
     * Xem chi tiết của tin tuyển dụng
     */
    function actionDetail($id) {
        $this->breadcrumbs = array(
            Yii::t('work', 'work') => Yii::app()->createUrl('/work/job'),
        );
        $job = Jobs::getJobDetail($id);
        if (!$job)
            $this->sendResponse(404);
        if ($job['site_id'] != $this->site_id)
            $this->sendResponse(404);
        //
        $this->pageTitle = $job['position'];
        $this->metakeywords = $job['position'];
        $this->metadescriptions = $job['position'];
        if ($job['meta_keywords'])
            $this->metakeywords = $job['meta_keywords'];
        if ($job['meta_description'])
            $this->metadescriptions = $job['meta_description'];
        //
        $trades = Trades::getTradeArr();
        $provinces = LibProvinces::getListProvinceArr();
        //
        $this->render('detail', array(
            'job' => $job,
            'trades' => $trades,
            'provinces' => $provinces,
        ));
    }

}
