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
        $file->site_id = $this->site_id;
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
		
		 $folders1 = Folders::getAllFolders();
		 
        //
        $file = new Files();
        $file->unsetAttributes();
        $file->folder_id = $folder->folder_id;
        $dataprovider = $file->search();
        //
        $this->render('file', array(
			'folder1' => $folders1,
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

    public function actionSiteContactForm() {
        $model = new SiteContactForm();
        $model->unsetAttributes();

        if (isset($_POST['SiteContactForm'])) {
            $model->attributes = $_POST['SiteContactForm'];
            $file = $_FILES['image_src'];
            if ($file && $file['name']) {
                $model->image_src = 'true';
                $extensions = SiteContactForm::allowExtensions();
                if (!isset($extensions[$file['type']])) {
                    $model->addError('image_src', Yii::t('banner', 'banner_invalid_format'));
                }
            }
            if (!$model->getErrors()) {
                $up = new UploadLib($file);
                $up->setPath(array($this->site_id, 'print_image'));
                $up->uploadFile();
                $response = $up->getResponse(true);
                //
                if ($up->getStatus() == '200') {
                    $model->image_src = ClaHost::getMediaBasePath() . $response['baseUrl'] . $response['name'];
                } else {
                    $model->image_src = '';
                }
                //
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', Yii::t('contact', 'contact_success_msg'));
                    $this->redirect(array('siteContactForm'));
                }
            }
        }

        $this->render('contact_form', array(
            'model' => $model,
        ));
    }

}
