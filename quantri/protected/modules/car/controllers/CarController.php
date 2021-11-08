<?php

class CarController extends BackController {

    public $category = null;

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('car', 'car_manager') => Yii::app()->createUrl('/car/car'),
            Yii::t('car', 'car_create') => Yii::app()->createUrl('/car/car/create'),
        );
        $model = new Car;
        $model->unsetAttributes();
        $model->site_id = $this->site_id;
        $model->isnew = Car::STATUS_ACTIVED;
        $model->position = Car::POSITION_DEFAULT;
        $carInfo = new CarInfo;
        $carInfo->site_id = $this->site_id;
        //
        $category = new ClaCategory();
        $category->type = ClaCategory::CATEGORY_CAR;
        $category->generateCategory();
        //
        if (isset($_POST['Car'])) {
            $model->attributes = $_POST['Car'];
            $model->processPrice();
            if ($model->name) {
                $model->alias = HtmlFormat::parseToAlias($model->name);
            }
            if (isset($_POST['CarInfo'])) {
                $carInfo->attributes = $_POST['CarInfo'];
            }
            if (!$category->checkCatExist($model->car_category_id)) {
                $this->sendResponse(400);
            }
            if ($model->validate()) {
                // các danh mục cha của danh mục select lưu vào db
                $categoryTrack = array_reverse($category->saveTrack($model->car_category_id));
                $categoryTrack = implode(ClaCategory::CATEGORY_SPLIT, $categoryTrack);
                //
                $model->category_track = $categoryTrack;
                //
                if ($model->save(false)) {
                    $carInfo->car_id = $model->id;
                    $carInfo->save();
                    $newimage = Yii::app()->request->getPost('newimage');
                    $countimage = count($newimage);
                    if ($newimage && $countimage >= 1) {
                        $setava = Yii::app()->request->getPost('setava');
                        $simg_id = str_replace('new_', '', $setava);
                        $recount = 0;
                        $car_avatar = array();
                        //
                        foreach ($newimage as $order_stt => $image_code) {
                            $imgtem = ImagesTemp::model()->findByPk($image_code);
                            if ($imgtem) {
                                $nimg = new CarImages;
                                $nimg->attributes = $imgtem->attributes;
                                $nimg->img_id = NULL;
                                unset($nimg->img_id);
                                $nimg->site_id = $this->site_id;
                                $nimg->car_id = $model->id;
                                $nimg->order = $order_stt;
                                if ($nimg->save()) {
                                    if ($recount == 0)
                                        $car_avatar = $nimg->attributes;
                                    if ($imgtem->img_id == $simg_id)
                                        $car_avatar = $nimg->attributes;
                                    $recount++;
                                    $imgtem->delete();
                                }
                            }
                        }
                        //
                        // update avatar of car
                        if ($car_avatar && count($car_avatar)) {
                            $model->avatar_path = $car_avatar['path'];
                            $model->avatar_name = $car_avatar['name'];
                            $model->avatar_id = $car_avatar['img_id'];
                            //
                            $model->save();
                        }
                    }
                    //
                    if (Yii::app()->request->isAjaxRequest) {
                        $this->jsonResponse(200, array(
                            'redirect' => $this->createUrl('/car/car'),
                        ));
                    } else {
                        $this->redirect(array('index'));
                    }
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'category' => $category,
            'carInfo' => $carInfo,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('car', 'car') => Yii::app()->createUrl('/car/car'),
            Yii::t('car', 'car_edit') => Yii::app()->createUrl('/car/car/update', array('id' => $id)),
        );
        //
        $model = $this->loadModel($id);
        $carInfo = $this->loadModelCarInfo($id);
        if ($model->price) {
            $model->price = HtmlFormat::money_format($model->price);
        }
        if ($model->price_market) {
            $model->price_market = HtmlFormat::money_format($model->price_market);
        }
        // get car category
        $category = new ClaCategory();
        $category->type = ClaCategory::CATEGORY_CAR;
        $category->generateCategory();
        //
        if (isset($_POST['Car'])) {
            $model->attributes = $_POST['Car'];
            $model->processPrice();
            if ($model->name && !$model->alias)
                $model->alias = HtmlFormat::parseToAlias($model->name);
            if (isset($_POST['CarInfo'])) {
                $carInfo->attributes = $_POST['CarInfo'];
            }
            if (!$category->checkCatExist($model->car_category_id)) {
                $this->sendResponse(400);
            }
            //
            if ($model->validate()) {
                // các danh mục cha của danh mục select lưu vào db
                $categoryTrack = array_reverse($category->saveTrack($model->car_category_id));
                $categoryTrack = implode(ClaCategory::CATEGORY_SPLIT, $categoryTrack);
                //
                $model->category_track = $categoryTrack;
                //
                if ($model->save(false)) {
                    //save info
                    $carInfo->save();

                    $newimage = Yii::app()->request->getPost('newimage');
                    $order_img = Yii::app()->request->getPost('order_img');
                    $countimage = $newimage ? count($newimage) : 0;
                    //
                    $setava = Yii::app()->request->getPost('setava');
                    //
                    $simg_id = str_replace('new_', '', $setava);
                    $recount = 0;
                    $model_avatar = array();

                    if ($newimage && $countimage > 0) {
                        foreach ($newimage as $type => $arr_image) {
                            if(count($arr_image)) {
                                foreach($arr_image as $order_new_stt => $image_code) {
                                    $imgtem = ImagesTemp::model()->findByPk($image_code);
                                    if ($imgtem) {
                                        $nimg = new CarImages();
                                        $nimg->attributes = $imgtem->attributes;
                                        $nimg->img_id = NULL;
                                        unset($nimg->img_id);
                                        $nimg->site_id = $this->site_id;
                                        $nimg->car_id = $model->id;
                                        $nimg->order = $order_new_stt;
                                        $nimg->type = $type;
                                        if ($nimg->save()) {
                                            if ($imgtem->img_id == $simg_id && $setava) {
                                                $model_avatar = $nimg->attributes;
                                            } elseif ($recount == 0 && !$setava) {
                                                $model_avatar = $nimg->attributes;
                                            }
                                            $recount++;
                                            $imgtem->delete();
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if ($order_img) {
                        foreach ($order_img as $order_stt => $img_id) {
                            $img_id = (int) $img_id;
                            if ($img_id != 'newimage') {
                                $img_sub = CarImages::model()->findByPk($img_id);
                                $img_sub->order = $order_stt;
                                $img_sub->save();
                            }
                        }
                    }
                    if ($model_avatar && count($model_avatar)) {
                        $model->avatar_path = $model_avatar['path'];
                        $model->avatar_name = $model_avatar['name'];
                        $model->avatar_id = $model_avatar['img_id'];
                    } else {
                        if ($simg_id != $model->avatar_id) {
                            $imgavatar = CarImages::model()->findByPk($simg_id);
                            if ($imgavatar) {
                                $model->avatar_path = $imgavatar->path;
                                $model->avatar_name = $imgavatar->name;
                                $model->avatar_id = $imgavatar->img_id;
                            }
                        }
                    }
                    //update 1 lần nữa
                    $model->save();
                    if (Yii::app()->request->isAjaxRequest) {
                        $this->jsonResponse(200, array(
                            'redirect' => $this->createUrl('/car/car'),
                        ));
                    } else {
                        $this->redirect(array('index'));
                    }
                }
            }
            //
        }

        $this->render('update', array(
            'model' => $model,
            'category' => $category,
            'carInfo' => $carInfo,
        ));
    }

    public function actionRenderImageConfig() {
        if (Yii::app()->request->isAjaxRequest) {
            $count_new = Yii::app()->request->getParam('count_new', 0);
            $html = $this->renderPartial('render_uploadimage_config', array('count_new' => $count_new), true);
            $this->jsonResponse(200, array(
                'html' => $html,
            ));
        }
    }

    public function actionValidate() {
        if (Yii::app()->request->isAjaxRequest) {
            $model = new Car;
            $model->unsetAttributes();
            if (isset($_POST['Car'])) {
                $model->attributes = $_POST['Car'];
                if ($model->name && !$model->alias)
                    $model->alias = HtmlFormat::parseToAlias($model->name);
                $model->processPrice();
            }
            if ($model->validate()) {
                $this->jsonResponse(200);
            } else {
                $this->jsonResponse(400, array(
                    'errors' => $model->getJsonErrors(),
                ));
            }
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $car = $this->loadModel($id);
        if ($car->site_id != $this->site_id)
            $this->jsonResponse(400);
        $pro_id = $car->id;
        if ($car->delete()) {
            $carInfo = CarInfo::model()->findByPk($pro_id);
            $carInfo->delete();
        }
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionDelimage($iid) {
        if (Yii::app()->request->isAjaxRequest) {
            $image = CarImages::model()->findByPk($iid);
            if (!$image)
                $this->jsonResponse(404);
            if ($image->site_id != $this->site_id)
                $this->jsonResponse(400);
            $car = Car::model()->findByPk($image->car_id);
            if ($image->delete()) {
                if ($car->avatar_id == $image->img_id) {
                    $navatar = $car->getFirstImage();
                    if (count($navatar)) {
                        $car->avatar_id = $navatar['img_id'];
                        $car->avatar_path = $navatar['path'];
                        $car->avatar_name = $navatar['name'];
                    } else { // Khi xóa hết ảnh
                        $car->avatar_id = '';
                        $car->avatar_path = '';
                        $car->avatar_name = '';
                    }
                    $car->save();
                }
                $this->jsonResponse(200);
            }
        }
    }

    /**
     * delete image configurable
     * @param type $iid
     */
    public function actionDelimageConfig($iid) {
        if (Yii::app()->request->isAjaxRequest) {
            $image = CarConfigurableImages::model()->findByPk($iid);
            if (!$image) {
                $this->jsonResponse(404);
            }
            if ($image->site_id != $this->site_id) {
                $this->jsonResponse(400);
            }
            if ($image->delete()) {
                $this->jsonResponse(200);
            }
        }
    }

    /**
     * Xóa các sản phẩm được chọn
     */
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
                    $pro_id = $model->id;
                    if ($model->site_id == $this->site_id) {
                        if ($model->delete()) {
                            $carInfo = CarInfo::model()->findByPk($pro_id);
                            $carInfo->delete();
                        }
                    }
                }
            }
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('car', 'car_manager') => Yii::app()->createUrl('/car/car'),
        );
        //
        $model = new Car('search');
        $model->unsetAttributes();  // clear any default values        
        if (isset($_GET['Car']))
            $model->attributes = $_GET['Car'];
        $model->site_id = $this->site_id;

        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Car the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        //
        $Car = new Car();
        $Car->setTranslate(false);
        //
        $OldModel = $Car->findByPk($id);
        //
        if ($OldModel === NULL)
            throw new CHttpException(404, 'The requested page does not exist.');
        if ($OldModel->site_id != $this->site_id)
            throw new CHttpException(404, 'The requested page does not exist.');
        if (ClaSite::getLanguageTranslate()) {
            $Car->setTranslate(true);
            $model = $Car->findByPk($id);
            if (!$model) {
                $model = new Car();
                $model->id = $id;
                $model->attribute_set_id = $OldModel->attribute_set_id;
                $model->ishot = $OldModel->ishot;
                $model->car_category_id = $OldModel->car_category_id;
                $model->status = $OldModel->status;
                $model->state = $OldModel->state;
                $model->isnew = $OldModel->isnew;
                $model->avatar_id = $OldModel->avatar_id;
                $model->avatar_path = $OldModel->avatar_path;
                $model->avatar_name = $OldModel->avatar_name;
            }
        } else
            $model = $OldModel;
        //
        return $model;
    }

    public function loadModelCarInfo($id) {
        //
        $CarInfo = new CarInfo();
        $CarInfo->setTranslate(false);
        //
        $OldModel = $CarInfo->findByPk($id);
        //
        if ($OldModel === NULL)
            throw new CHttpException(404, 'The requested page does not exist.');
        if ($OldModel->site_id != $this->site_id)
            throw new CHttpException(404, 'The requested page does not exist.');
        if (ClaSite::getLanguageTranslate()) {
            $CarInfo->setTranslate(true);
            $model = $CarInfo->findByPk($id);
            if (!$model) {
                $model = new CarInfo();
                $model->car_id = $id;
            }
        } else
            $model = $OldModel;
        //
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Car $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'car-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    function beforeAction($action) {
        //
        if ($action->id != 'uploadfile') {
            $category = new ClaCategory();
            $category->type = ClaCategory::CATEGORY_CAR;
            $category->generateCategory();
            $this->category = $category;
        }
        //
        return parent::beforeAction($action);
    }

}
