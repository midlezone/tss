<?php

/**
 * @author minhbn <minhcoltech@gmail.com>
 * Album controller
 */
class MediaController extends PublicController {

    public $layout = '//layouts/media';

    //
    public function actionFolder() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('common', 'download') => Yii::app()->createUrl('/media/media/folder'),
        );
        //
        $folders = Folders::getAllFolders();
        //
        //
        $file = new Files();
        $file->unsetAttributes();
        $dataprovider = $file->search();
        //
        $this->render('folder', array(
            'folders' => $folders,
            'dataprovider' => $dataprovider,
        ));
    }

    public function actionFile() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('common', 'download') => Yii::app()->createUrl('/media/media/folder'),
        );
        //
        $folder_id = Yii::app()->request->getParam('fid');
        if (!$folder_id)
            $this->sendResponse(400);
        $folder = Folders::model()->findByPk($folder_id);
        if (!$folder)
            $this->sendResponse(404);
        if ($folder->site_id != $this->site_id)
            $this->sendResponse(404);

        $this->breadcrumbs = array_merge($this->breadcrumbs, array(
            $folder->folder_name => Yii::app()->createUrl('/media/media/file', array('fid' => $folder_id)),
        ));
        //
        $file = new Files();
        $file->unsetAttributes();
        $file->folder_id = $folder->folder_id;
        $dataprovider = $file->search();
        //
        $this->render('file', array(
            'folder' => $folder,
            'dataprovider' => $dataprovider,
        ));
    }

    //
    public function actionDownloadfile($id) {
        $file = Files::model()->findByPk($id);
        if ($file) {
            $up = new UploadLib();
            $up->download(array(
                'path' => $file->path,
                'name' => $file->name,
                'extension' => Files::getMimeType($file->extension),
                'realname' => HtmlFormat::parseToAlias($file->display_name) . '.' . $file->extension,
            ));
        }
        Yii::app()->end();
    }

}
