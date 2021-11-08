<?php

/**
 * @author minhbn <minhcoltech@gmail.com>
 * 
 */
class VideoController extends PublicController {

    public $layout = "//layouts/video";

    /**
     * Lists all models.
     */
    public function actionAll() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('video', 'video') => Yii::app()->createUrl('/media/video/all'),
        );
        //
        $this->pageTitle = Yii::t('video', 'video');
        //
        $pagesize = MediaHelper::helper()->getPageSize();
        $page = MediaHelper::helper()->getCurrentPage();
        //
        $videos = Videos::getVideoInSite(array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
        ));
        //
        $totalitem = Videos::countVideoInSite();
        //
        $this->render('all', array(
            'videos' => $videos,
            'totalitem' => $totalitem,
        ));
    }

    public function actionDetail($id) {
        $video = $this->loadModel($id);
        if (!$video)
            $this->sendResponse(404);
        if ($video->site_id != $this->site_id)
            $this->sendResponse(404);
        //
        $this->pageTitle = $video->video_title;
        $this->metakeywords = $video->video_title;
        $this->metadescriptions = $video->video_description;
        if (isset($video->meta_keywords) && $video->meta_keywords)
            $this->metakeywords = $video->meta_keywords;
        if (isset($video->meta_description) && $video->meta_description)
            $this->metadescriptions = $video->meta_description;
        //
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('video', 'video') => Yii::app()->createUrl('/media/video/all'),
        );
        //
        $this->render('detail', array(
            'video' => $video,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Videos the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Videos::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Videos $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'videos-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
