<?php

class ProductAttributeController extends BackController {
    
    public function beforeAction($action) {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl.'/js/bootstrap-colorpicker.min.js');
        Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/colorpicker.css');
        return parent::beforeAction($action);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('attribute', 'attribute_manager') => Yii::app()->createUrl('/economy/productAttribute'),
            Yii::t('attribute', 'attribute_create') => Yii::app()->createUrl('/economy/productAttribute/create'),
        );
        //
        $model = new ProductAttribute;
        $model->sort_order = (int) $model->getMaxSort() + 2;
        $model->site_id = $this->site_id;
        if (isset($_POST['ProductAttribute'])) {
            $model->attributes = $_POST['ProductAttribute'];
            $model->code = ($model->code) ? HtmlFormat::parseToAlias($model->code) : HtmlFormat::parseToAlias($model->name);
            $model->field_product = $model->generateFieldProduct($model->attribute_set_id, $model->frontend_input);
            $model->field_configurable = $model->generateFieldConfigurable($model->attribute_set_id, $model->is_configurable,$model->frontend_input);
            if ($model->site_id !== $this->site_id)
                throw new CHttpException(403, "You don't have permission");
            if ($model->save()) {
                $options_post = $_POST['aoptions'];
                $this->saveAttributeOption($model, $options_post);
                Yii::app()->user->setFlash('success', 'Thêm mới thành công');
                if (Yii::app()->request->isAjaxRequest) {
                    $this->jsonResponse(200, array(
                        'redirect' => $this->createUrl('/economy/productAttribute'),
                    ));
                } else {
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('attribute', 'attribute_manager') => Yii::app()->createUrl('/economy/productAttribute'),
            Yii::t('attribute', 'attribute_edit') => Yii::app()->createUrl('/economy/productAttribute/update', array('id' => $id)),
        );
        //
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ProductAttribute'])) {
            $model->attributes = $_POST['ProductAttribute'];
            $model->code = ($model->code) ? HtmlFormat::parseToAlias($model->code) : HtmlFormat::parseToAlias($model->name);
            if((int)$model->is_configurable && !(int)$model->field_configurable){
                $model->field_configurable = $model->generateFieldConfigurable($model->attribute_set_id, $model->is_configurable,$model->frontend_input);
            }
            if ($model->save()) {
                $options_post = $_POST['aoptions'];                
                $this->saveAttributeOption($model, $options_post,$_FILES);
                Yii::app()->user->setFlash('success', Yii::t('common', 'updatesuccess'));
                if (Yii::app()->request->isAjaxRequest) {
                    $this->jsonResponse(200, array(
                        'redirect' => $this->createUrl('/economy/productAttribute'),
                    ));
                } else {
                    $this->redirect(array('index'));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function saveAttributeOption($attribute, $options_post,$files=null) {        
        if (count($options_post)) {            
            $default_value = isset($_POST['aoptions']['default_value']) ? $_POST['aoptions']['default_value'] : null;
            foreach ($options_post as $key => $oplist) {
                if ($key == 'new') {
                    if (is_array($oplist) && count($oplist)) {
                        foreach ($oplist as $key1 => $opitem) {
                            if ($opitem['value']) {
                                $modelOp = new ProductAttributeOption;
                                $modelOp->attribute_id = $attribute->id;
                                $modelOp->value = trim($opitem['value']);
                                $modelOp->sort_order = $opitem['sort_order'];                                
                                if($attribute->type_option == 1){                                    
                                    if(isset($files['aoptions_new_'.$key1.'_ext_image']) && $files['aoptions_new_'.$key1.'_ext_image']['name']){                                        
                                        $modelOp->ext = $this->uploadFile($files['aoptions_new_'.$key1.'_ext_image']);                                        
                                    }
                                }else{
                                    $modelOp->ext = $opitem['ext'];
                                }
                                $modelOp->site_id = $this->site_id;
                                if ($modelOp->save()) {
                                    $modelOp->index_key = ($attribute->frontend_input == 'multiselect') ? $modelOp->generateKeyMulti($modelOp->attribute_id) : $modelOp->id;
                                    $modelOp->save();
                                    if ($default_value == 'n-' . $key1) {
                                        $default_value = $modelOp->index_key;
                                    }
                                }
                            }
                        }
                    }
                } elseif ($key == 'update') {
                    if (is_array($oplist) && count($oplist)) {
                        foreach ($oplist as $key1 => $opitem) {
                            if ($opitem['value']) {
                                $modelOp = ProductAttributeOption::model()->findByPk($key1);
                                if ($modelOp && $modelOp->site_id == $this->site_id) {
                                    $modelOp->value = trim($opitem['value']);
                                    $modelOp->sort_order = $opitem['sort_order'];
                                    if($attribute->type_option == 1){
                                        if(isset($files['aoptions_update_'.$modelOp->id.'_ext_image']) && $files['aoptions_update_'.$modelOp->id.'_ext_image']['name']){
                                            $modelOp->ext = $this->uploadFile($files['aoptions_update_'.$modelOp->id.'_ext_image']);
                                        }
                                    }else{
                                        $modelOp->ext = $opitem['ext'];
                                    }
                                    if ($modelOp->save()) {
                                        if ($default_value == 'u-' . $key1) {
                                            $default_value = $modelOp->index_key;
                                        }
                                    }
                                }
                            }
                        }
                    }
                } elseif ($key == 'delete') {
                    foreach ($oplist as $key1 => $opitem) {
                        $modelOp = ProductAttributeOption::model()->findByPk($key1);
                        if ($modelOp && $modelOp->site_id == $this->site_id) {
                            $modelOp->delete();
                        }
                    }
                }
            }
            if (is_numeric($default_value) && $default_value != $attribute->default_value) {
                $attribute->default_value = $default_value;
                $attribute->save();
            }
        }
    }
    
    public function uploadFile($file){
        if ($file && $file['name']) {            
            $extensions = EconomyHelper::helper()->allowExtensions();
            if (isset($extensions[$file['type']])){
                $up = new UploadLib($file);
                $up->setPath(array($this->site_id, 'attribute_options'));
                //$up->setForceSize(array((int) $model->banner_width, (int) $model->banner_height));
                $up->uploadFile();
                $response = $up->getResponse(true);
                //
                if ($up->getStatus() == '200') {
                    return ClaHost::getMediaBasePath() . $response['baseUrl'] . $response['name'];                    
                }
            }                            
        }
        return '';
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $attribute = $this->loadModel($id);
        if ($attribute->delete()) {
            Yii::app()->user->setFlash('success', 'Xóa thuộc tính thành công');
        }
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
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('attribute', 'attribute_manager') => Yii::app()->createUrl('/economy/productAttribute'),
        );
        //
        $model = new ProductAttribute('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ProductAttribute']))
            $model->attributes = $_GET['ProductAttribute'];
        $model->site_id = $this->site_id;

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionAjaxAddOption() {
        if (Yii::app()->request->isAjaxRequest) {
            $attrid = Yii::app()->request->getParam('attrid', 0);
            $name = Yii::app()->request->getParam('name', '');
            $mes = "Có lỗi khi lưu dữ liệu";
            $attribute = ProductAttribute::model()->findByPk($attrid);
            if ($attribute && $attribute->site_id == $this->site_id) {
                if (!ProductAttributeOption::model()->isExitName($name, $attrid)) {
                    $modelOp = new ProductAttributeOption;
                    $modelOp->attribute_id = $attrid;
                    $modelOp->value = $name;
                    $modelOp->sort_order = (int) $modelOp->getMaxSort($attrid) + 2;
                    $modelOp->site_id = $this->site_id;
                    if ($modelOp->save()) {
                        $modelOp->index_key = $modelOp->id;
                        $modelOp->save();
                        $data = ProductAttributeOption::model()->findAllByAttributes(array(), 'attribute_id = :attribute_id order by sort_order asc', array(':attribute_id' => $attrid));
                        $html = '';
                        if ($data) {
                            foreach ($data as $item) {
                                if ($item->index_key == $modelOp->index_key) {
                                    $html.= '<option value="' . $item->index_key . '" selected="selected">' . $item->value . '</option>';
                                }
                            }
                        }
                        //$html = ($attribute->frontend_input == 'select')?'<option value="">-- Hãy chọn--</option>' . $html:$html;
                        exit(json_encode(array('action' => "success", 'content' => $html)));
                    } else {
                        $mes = "Giá trị thuộc tính đã tồn tại";
                    }
                } else {
                    $mes = "Tên thuộc tính đã được sử dụng";
                }
            }
            exit(json_encode(array('action' => "error", 'content' => $mes)));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ProductAttribute the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        //
        $ProductAttribute = new ProductAttribute();
        $ProductAttribute->setTranslate(false);
        //
        $OldModel = $ProductAttribute->findByPk($id);
        //
        if ($OldModel === NULL)
            throw new CHttpException(404, 'The requested page does not exist.');
        if ($OldModel->site_id != $this->site_id)
            throw new CHttpException(404, 'The requested page does not exist.');
        if (ClaSite::getLanguageTranslate()) {
            $ProductAttribute->setTranslate(true);
            $model = $ProductAttribute->findByPk($id);
            if (!$model) {
                $model = new ProductAttribute();
                $model->attributes = $OldModel->attributes;
                $model->id = $id;
                $model->name = '';
            }
        } else
            $model = $OldModel;
        //
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ProductAttribute $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'product-attribute-set-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
