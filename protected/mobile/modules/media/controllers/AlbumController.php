<?php

/**
 * @author minhbn <minhcoltech@gmail.com>
 * Album controller
 */
class AlbumController extends PublicController {

    public $layout = '//layouts/album';

    /**
     * Lists all models.
     */
    public function actionAll() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('album', 'album') => Yii::app()->createUrl('/media/album/all'),
        );
        $this->pageTitle = Yii::t('album', 'album');
        //
        // get hot news
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        if (!$page)
            $page = 1;
        //
        $pagesize = Yii::app()->params['defaultPageSize'];
        $totalitem = Albums::countAllAlbum();
        //
        $albums = Albums::getAllAlbum(array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
        ));
        //
        $this->render('all', array(
            'albums' => $albums,
            'limit' => $pagesize,
            'totalitem' => $totalitem,
        ));
    }

    /**
     * hiển thị chi tiết ảnh trong album
     */
    public function actionDetail($id) {
        //
        $album = $this->loadModel($id);
        if ($album->site_id != $this->site_id) {
            if (Yii::app()->request->isAjaxRequest)
                $this->jsonResponse(400);
            else
                $this->sendResponse(400);
        }

        //
        $this->pageTitle = $album->album_name;
        $this->metakeywords = $album->album_name;
        $this->metadescriptions = $album->album_description;
        if (isset($album->meta_keywords) && $album->meta_keywords)
            $this->metakeywords = $album->meta_keywords;
        if (isset($album->meta_description) && $album->meta_description)
            $this->metadescriptions = $album->meta_description;
        //
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('album', 'album') => Yii::app()->createUrl('/media/album/all'),
            $album->album_name => Yii::app()->createUrl('/media/album/detail', array('id' => $id, 'alias' => $album->alias)),
        );
        $images = Albums::getImages($id);
        $this->render('detail', array(
            'album' => $album,
            'images' => $images,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Albums the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Albums::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Albums $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'albums-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
