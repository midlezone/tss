<?php

class NewsController extends BackController {

    public $category = null;

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('news', 'news_manager') => Yii::app()->createUrl('content/news'),
            Yii::t('news', 'news_create') => Yii::app()->createUrl('/content/news/create'),
        );
        //
        $model = new News;
        //
        $news_category_id = Yii::app()->request->getParam('cat');
        if ($news_category_id)
            $model->news_category_id = $news_category_id;
        //
        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            if (!(int) $model->news_category_id)
                $model->news_category_id = null;
		
            if ($model->publicdate && $model->publicdate != '' && (int) strtotime($model->publicdate))
                $model->publicdate = (int) strtotime($model->publicdate);
            else
                $model->publicdate = time();
			
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            }
            if ($model->save()) {
                unset(Yii::app()->session[$model->avatar]);
                $this->redirect(Yii::app()->createUrl('/content/news'));
            }
        }
		if ($this->site_id == "1057") {
			$this->render('lich', array(
				'model' => $model,
			));
		} elseif ($this->site_id == "1235") {
			$this->render('create_1235', array(
				'model' => $model,
			));
		} else {
			$this->render('create', array(
				'model' => $model,
			));
		}
        
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
		
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('news', 'news_manager') => Yii::app()->createUrl('content/news'),
            Yii::t('news', 'news_edit') => Yii::app()->createUrl('/content/news/update', array('id' => $id)),
        );
        //
        $model = $this->loadModel($id);
        //
        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];
            if (!(int) $model->news_category_id)
                $model->news_category_id = null;
            if ($model->publicdate && $model->publicdate != '' && (int) strtotime($model->publicdate) > 0)
                $model->publicdate = (int) strtotime($model->publicdate);
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if ($avatar) {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            }
            $model->avatar = 'true';
            if ($model->save()) {
                if ($model->avatar)
                    unset(Yii::app()->session[$model->avatar]);
                $this->redirect(Yii::app()->createUrl('/content/news'));
            }
        }

     
		if ($this->site_id == "1057") {
			$this->render('update_lich', array(
				'model' => $model,
			));
		} elseif ($this->site_id == "1235") {
			$this->render('update_1235', array(
				'model' => $model,
			));
		} else {
			$this->render('update', array(
				'model' => $model,
			));
		}
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        if ($model->site_id != $this->site_id) {
            if (Yii::app()->request->isAjaxRequest)
                $this->jsonResponse(400);
            else
                $this->sendResponse(400);
        }
        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    public function actionDeleteall() {
        if (Yii::app()->request->isAjaxRequest) {
            $list_id = Yii::app()->request->getParam('lid');
            if (!$list_id)
                Yii::app()->end();
            $ids = explode(",", $list_id);
            $count = (int) sizeof($ids);
            for ($i = 0; $i < $count; $i++) {
                if ($ids[$i]) {
                    $model = $this->loadModel($ids[$i]);
                    if ($model->site_id == $this->site_id) {
                        $model->delete();
                    }
                }
            }
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->breadcrumbs = array(
            Yii::t('news', 'news_manager') => Yii::app()->createUrl('content/news'),
        );
        $model = new News('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['News']))
            $model->attributes = $_GET['News'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return News the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        //
        $news = new News();
        $news->setTranslate(false);
        //
        $OldModel = $news->findByPk($id);
        //
        if ($OldModel === NULL)
            throw new CHttpException(404, 'The requested page does not exist.');
        if ($OldModel->site_id != $this->site_id)
            throw new CHttpException(404, 'The requested page does not exist.');
        if (ClaSite::getLanguageTranslate()) {
            $news->setTranslate(true);
            $model = $news->findByPk($id);
            if (!$model) {
                $model = new News();
                $model->news_id = $id;
                $model->news_category_id = $OldModel->news_category_id;
                $model->news_hot = $OldModel->news_hot;
                $model->news_source = $OldModel->news_source;
                $model->poster = $OldModel->poster;
                $model->publicdate = $OldModel->publicdate;
                $model->image_path = $OldModel->image_path;
                $model->image_name = $OldModel->image_name;
            }
        } else
            $model = $OldModel;
        //
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param News $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'news-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * upload file
     */
    public function actionUploadfile() {
        if (isset($_FILES['file'])) {
			
            $file = $_FILES['file'];
            if ($file['size'] > 1024 * 1000 * 2) {
                $this->jsonResponse('400', array(
                    'message' => Yii::t('errors', 'filesize_toolarge', array('{size}' => '2Mb')),
                ));
                Yii::app()->end();
            }
            $up = new UploadLib($file);
            $up->setPath(array($this->site_id, 'news', 'ava'));
            $up->uploadImage();
            $return = array();
            $response = $up->getResponse(true);
            $return = array('status' => $up->getStatus(), 'data' =>  $response, 'host' => ClaHost::getImageHost(), 'size' => '');
            if ($up->getStatus() == '200') {
                $keycode = ClaGenerate::getUniqueCode();
                $return['data']['realurl'] = ClaHost::getImageHost() . $response['baseUrl'] . 's100_100/' . $response['name'];
                $return['data']['avatar'] = $keycode;
                Yii::app()->session[$keycode] = $response;
            }
            echo json_encode($return);
            Yii::app()->end();
        }
        //
    }

    public function allowedActions() {
        return 'uploadfile';
    }

    function beforeAction($action) {
        //
        if ($action->id != 'uploadfile') {
            $category = new ClaCategory();
            $category->type = ClaCategory::CATEGORY_NEWS;
            $category->generateCategory();
            $this->category = $category;
        }
        //
        return parent::beforeAction($action);
    }

}
