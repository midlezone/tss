<?php

class MenuController extends BackController {

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('menu', 'menu_group_manager') => Yii::app()->createUrl('interface/menugroup'),
        );
        //
        $mgid = Yii::app()->request->getParam('mgid');
        if (!$mgid)
            $this->sendResponse(400);
        $menugroup = MenuGroups::model()->findByPk($mgid);
        if (!$menugroup)
            $this->sendResponse(404);
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(
            $menugroup->menu_group_name => Yii::app()->createUrl('interface/menugroup/list', array('mgid' => $mgid)),
            Yii::t('menu', 'menu_create') => Yii::app()->createUrl('interface/menu/create', array('mgid' => $mgid)),
        ));
        //
        $model = new Menus;
        $model->menu_target = Menus::TARGET_UNBLANK;
        $clamenu = new ClaMenu(array(
            'create' => true,
            'group_id' => $mgid,
            'showAll' => true,
        ));
		
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $model->menu_group = $mgid;
        if (isset($_POST['Menus'])) {
            $model->attributes = $_POST['Menus'];
            // Position of menu
            $listgroup = Menus::getMenuGroupArr();
			
			
            //
            if (!isset($listgroup[$model->menu_group]))
                $this->sendResponse(203);
            //
            if ($model->parent_id != 0) {
                $listmenu = $clamenu->getListItems();
                if (!isset($listmenu[$model->parent_id]))
                    $this->sendResponse(203);
            }
            if ($model->menu_linkto == Menus::LINKTO_OUTER) {
                if ($model->menu_link == '') {
                    $model->addError('menu_link', Yii::t('common', 'cannot_blank', array('{attribute}' => Yii::t('menu', 'menu_link'))));
                }
            } else {
                $data_info = json_decode($model->menu_values, true);
                $data_info['type_site'] = $model->type_site;
                $linkinfo = Menus::getMenuLinkInfo($data_info);
                if (!$linkinfo) {
                    $this->sendResponse(203);
                }
                $model->attributes = $linkinfo;
            }
            $model->alias = HtmlFormat::parseToAlias($model->menu_title);
            // icon And Background for menu
            $icon = $_FILES['iconFile'];
            $background = $_FILES['backgroundFile'];
            if ($icon && $icon['name']) {
                $extensions = Menus::allowExtensions();
                if (!isset($extensions[$icon['type']])) {
                    $model->addError('iconFile', Yii::t('errors', 'file_invalid'));
                }
                $filesize = $icon['size'];
                if ($filesize < Menus::FILE_SIZE_MIN) {
                    $model->addError('iconFile', Yii::t('errors', 'filesize_toosmall', array('{size}' => Menus::FILE_SIZE_MIN . 'B')));
                } elseif ($filesize > Menus::FILE_SIZE_MAX) {
                    $model->addError('iconFile', Yii::t('errors', 'filesize_toolarge', array('{size}' => Menus::FILE_SIZE_MAX . 'B')));
                }
            }
            if ($background && $background['name']) {
                $extensions = Menus::allowExtensions();
                if (!isset($extensions[$background['type']])) {
                    $model->addError('backgroundFile', Yii::t('errors', 'file_invalid'));
                }
                $filesize = $background['size'];
                if ($filesize < Menus::FILE_SIZE_MIN) {
                    $model->addError('backgroundFile', Yii::t('errors', 'filesize_toosmall', array('{size}' => Menus::FILE_SIZE_MIN . 'B')));
                } elseif ($filesize > Menus::FILE_SIZE_MAX) {
                    $model->addError('backgroundFile', Yii::t('errors', 'filesize_toolarge', array('{size}' => Menus::FILE_SIZE_MAX . 'B')));
                }
            }
            //
            if (!$model->hasErrors() && $model->validate()) {
                // Up icon for menu
                if ($icon && $icon['name']) {
                    $iconUp = new UploadLib($icon);
                    $iconUp->setPath(array($this->site_id, 'menu', 'icons'));
                    $iconUp->uploadImage();
                    $response = $iconUp->getResponse(true);
                    //
                    if ($iconUp->getStatus() == '200') {
                        $model->icon_path = $response['baseUrl'];
                        $model->icon_name = $response['name'];
                    }
                    //
                }
                // Up background for menu
                if ($background && $background['name']) {
                    $up = new UploadLib($background);
                    $up->setPath(array($this->site_id, 'menu', 'icons'));
                    $up->uploadImage();
                    $response = $up->getResponse(true);
                    //
                    if ($up->getStatus() == '200') {
                        $model->background_path = $response['baseUrl'];
                        $model->background_name = $response['name'];
                    }
                    //
                }
                $model->save(false);
                $this->redirect(Yii::app()->createUrl('/interface/menugroup/list', array('mgid' => $mgid)));
            }
        }
        $arr = array(0 => Yii::t('common', 'parent_0'));
        $options = $clamenu->createOptionArray(ClaMenu::MENU_ROOT, ClaMenu::MENU_BEGIN_STEP, $arr);
		
        $this->render('create', array(
            'model' => $model,
            'options' => $options,
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
            Yii::t('menu', 'menu_group_manager') => Yii::app()->createUrl('interface/menugroup'),
        );
        //
        $mgid = Yii::app()->request->getParam('mgid');
        if (!$mgid)
            $this->sendResponse(400);
        $model = $this->loadModel($id);
        $menugroup = MenuGroups::model()->findByPk($mgid);
		
        if (!$menugroup)
            $this->sendResponse(404);
        $this->breadcrumbs = array_merge($this->breadcrumbs, array(
            $menugroup->menu_group_name => Yii::app()->createUrl('interface/menugroup/list', array('mgid' => $mgid)),
            Yii::t('menu', 'menu_update') => Yii::app()->createUrl('interface/menu/create', array('mgid' => $mgid)),
        ));
        //
        $clamenu = new ClaMenu(array(
            'create' => true,
            'group_id' => $mgid,
            'showAll' => true,
        ));
        $clamenu->removeItem($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Menus'])) {
            $model->attributes = $_POST['Menus'];
            //
            $listgroup = Menus::getMenuGroupArr();
            //
			
            if (!isset($listgroup[$model->menu_group]))
                $this->sendResponse(203);
            //
            if ($model->parent_id != 0) {
                $listmenu = $clamenu->getListItems();
                if (!isset($listmenu[$model->parent_id]))
                    $this->sendResponse(203);
            }
            if ($model->menu_linkto == Menus::LINKTO_OUTER) {
                if ($model->menu_link == '')
                    $model->addError('menu_link', Yii::t('common', 'cannot_blank', array('{attribute}' => Yii::t('menu', 'menu_link'))));
            }else {
                $data_info = json_decode($model->menu_values, true);
                $data_info['type_site'] = $model->type_site;
                $linkinfo = Menus::getMenuLinkInfo($data_info);
                if (!$linkinfo)
                    $this->sendResponse(203);
                $model->attributes = $linkinfo;
            }
            //$model->alias = HtmlFormat::parseToAlias($model->menu_title);
            $model->menu_group = $mgid;
            // icon And Background for menu
            $icon = $_FILES['iconFile'];
            $background = $_FILES['backgroundFile'];
            if ($icon && $icon['name']) {
                $extensions = Menus::allowExtensions();
                if (!isset($extensions[$icon['type']])) {
                    $model->addError('iconFile', Yii::t('errors', 'file_invalid'));
                }
                $filesize = $icon['size'];
                if ($filesize < Menus::FILE_SIZE_MIN) {
                    $model->addError('iconFile', Yii::t('errors', 'filesize_toosmall', array('{size}' => Menus::FILE_SIZE_MIN . 'B')));
                } elseif ($filesize > Menus::FILE_SIZE_MAX) {
                    $model->addError('iconFile', Yii::t('errors', 'filesize_toolarge', array('{size}' => Menus::FILE_SIZE_MAX . 'B')));
                }
            }
            if ($background && $background['name']) {
                $extensions = Menus::allowExtensions();
                if (!isset($extensions[$background['type']])) {
                    $model->addError('backgroundFile', Yii::t('errors', 'file_invalid'));
                }
                $filesize = $background['size'];
                if ($filesize < Menus::FILE_SIZE_MIN) {
                    $model->addError('backgroundFile', Yii::t('errors', 'filesize_toosmall', array('{size}' => Menus::FILE_SIZE_MIN . 'B')));
                } elseif ($filesize > Menus::FILE_SIZE_MAX) {
                    $model->addError('backgroundFile', Yii::t('errors', 'filesize_toolarge', array('{size}' => Menus::FILE_SIZE_MAX . 'B')));
                }
            }
            //
            if (!$model->hasErrors() && $model->validate()) {
                // Up icon for menu
                if ($icon && $icon['name']) {
                    $iconUp = new UploadLib($icon);
                    $iconUp->setPath(array($this->site_id, 'menu', 'icons'));
                    $iconUp->uploadImage();
                    $response = $iconUp->getResponse(true);
                    //
                    if ($iconUp->getStatus() == '200') {
                        $model->icon_path = $response['baseUrl'];
                        $model->icon_name = $response['name'];
                    }
                    //
                }
                // Up background for menu
                if ($background && $background['name']) {
                    $up = new UploadLib($background);
                    $up->setPath(array($this->site_id, 'menu', 'icons'));
                    $up->uploadImage();
                    $response = $up->getResponse(true);
                    //
                    if ($up->getStatus() == '200') {
                        $model->background_path = $response['baseUrl'];
                        $model->background_name = $response['name'];
                    }
                    //
                }
                $site_setting = SiteSettings::model()->findByPk($this->site_id);
                if ($model['is_default_page']) {
                    Menus::cleanIsDefaultPage();
                    $site_setting->default_page_path = $model['menu_basepath'];
                    $site_setting->default_page_params = $model['menu_pathparams'];
                    $site_setting->save();
                } else {
                    if ($site_setting->default_page_path == $model['menu_basepath']) {
                        $site_setting->default_page_path = '';
                        $site_setting->default_page_params = '';
                        $site_setting->save();
                    }
                }
                $model->save(false);
                $this->redirect(Yii::app()->createUrl('/interface/menugroup/list', array('mgid' => $mgid)));
            }
        }
        $options = $clamenu->createOptionArray(ClaMenu::MENU_ROOT, ClaMenu::MENU_BEGIN_STEP);
		
	
        unset($options[$id]);
        $this->render('update', array(
            'model' => $model,
            'options' => $options,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        if ($model->site_id == $this->site_id) {
            $model->delete();
        }

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Menus('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Menus']))
            $model->attributes = $_GET['Menus'];
		
        $this->render('index', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Menus the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        //
        $menu = new Menus();
        $menu->setTranslate(false);
        //
        $OldModel = $menu->findByPk($id);
        //
        if ($OldModel === NULL)
            throw new CHttpException(404, 'The requested page does not exist.');
        if ($OldModel->site_id != $this->site_id)
            throw new CHttpException(404, 'The requested page does not exist.');
        if (ClaSite::getLanguageTranslate()) {
            $menu->setTranslate(true);
            $model = $menu->findByPk($id);
            if (!$model) {
                $model = new Menus();
                $model->menu_id = $id;
                $model->menu_group = $OldModel->menu_group;
                $model->parent_id = $OldModel->parent_id;
                $model->menu_order = $OldModel->menu_order;
                $model->status = $OldModel->status;
                $model->menu_target = $OldModel->menu_target;
                $model->menu_values = $OldModel->menu_values;
                $model->icon_path = $OldModel->icon_path;
                $model->icon_name = $OldModel->icon_name;
                $model->background_path = $OldModel->background_path;
                $model->background_name = $OldModel->background_name;
            }
        } else
            $model = $OldModel;
        //
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Menus $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'menus-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
