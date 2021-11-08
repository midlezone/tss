<?php

class ProductcategoryController extends BackController {

    /**
     * Index
     */
    public function actionIndex() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('product', 'product_category') => Yii::app()->createUrl('/economy/productcategory'),
        );
        //
        $model = new ProductCategories();
        $model->site_id = $this->site_id;
        //
        $this->render("category", array(
            'model' => $model,
        ));
    }

    /**
     * create category
     * @param type $pa
     */
    public function actionAddcat($pa) {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('product', 'product_category') => Yii::app()->createUrl('/economy/productcategory/'),
            Yii::t('category', 'category_product_create') => Yii::app()->createUrl('/economy/productcategory/', array('pa' => $pa)),
        );
        //
        if (!is_numeric($pa))
            return false;
        $pa = (int) $pa;
        if ($pa != 0) {
            $parentmodel = ProductCategories::model()->findByPk($pa);
            if (!$parentmodel)
                return false;
            if ($parentmodel->site_id != $this->site_id)
                return false;
        }
        //
        $category = new ClaCategory();
        $category->type = ClaCategory::CATEGORY_PRODUCT;
        //
        $model = new ProductCategories();
        $model->cat_parent = $pa;
        $this->setPageTitle("Tạo danh mục");
        $post = Yii::app()->request->getPost('ProductCategories');
        //
        $isAjax = Yii::app()->request->isAjaxRequest;
        //
        if (Yii::app()->request->isPostRequest && $post) {
            $model->attributes = $post;
            $model->site_id = $this->site_id;
            $model->showinhome = (isset($post["showinhome"]) && $post["showinhome"]) ? ActiveRecord::STATUS_ACTIVED : ActiveRecord::STATUS_DEACTIVED;
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            }
            if ($model->icon) {
                $icon = Yii::app()->session[$model->icon];
                if (!$icon) {
                    $model->icon = '';
                } else {
                    $model->icon_path = $icon['baseUrl'];
                    $model->icon_name = $icon['name'];
                }
            }
            if ($pa == 0) {
                $row = Yii::app()->db->createCommand("select max(cat_order) as maxorder from " . $category->getCategoryTable() . " where cat_parent=0 AND site_id=" . $this->site_id)->query()->read();
                $model->cat_order = ($row["maxorder"]) ? ((int) $row["maxorder"] + 1) : 1;
            } else {
                $model2 = ProductCategories::model()->findByPk($pa);
                if ($model2)
                    $model->cat_order = $model2->cat_countchild + 1;
                else
                    $model->cat_order = 1;
            }
            $model->cat_countchild = 0;
            if ($model->save()) {
                unset(Yii::app()->session[$model->avatar]);
                if ($isAjax) {
                    $this->jsonResponse(200);
                } else
                    $this->redirect(Yii::app()->createUrl("/economy/productcategory"));
            } else {
                if ($isAjax) {
                    $this->jsonResponse(0, array(
                        'errors' => $model->getJsonErrors(),
                    ));
                }
            }
        }

        $category->generateCategory();
        //
        $arr = array('' => Yii::t('category', 'category_parent_0'));
        $option = $category->createOptionArray(ClaCategory::CATEGORY_ROOT, ClaCategory::CATEGORY_STEP, $arr);

        if ($isAjax) {
            $this->renderPartial("addcat", array(
                "model" => $model,
                "option" => $option,
                'isAjax' => $isAjax,
                    ), false, true);
        } else {
            $this->render("addcat", array(
                "model" => $model,
                "option" => $option,
                'isAjax' => $isAjax,
            ));
        }
    }

    /**
     * Remove folder and all file 
     * @param type $dir
     */
    public static function removeDirRecursive($dir) {
        $files = glob($dir . DS . '{,.}*', GLOB_MARK | GLOB_BRACE);
        foreach ($files as $file) {
            if (basename($file) == '.' || basename($file) == '..') {
                continue;
            }
            if (substr($file, - 1) == DS) {
                self::removeDirRecursive($file);
            } else {
                unlink($file);
            }
        }
        if (is_dir($dir)) {
            rmdir($dir);
        }
    }

    /**
     * Edit news category
     * @param type $id
     */
    public function actionEditcat($id) {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('product', 'product_category') => Yii::app()->createUrl('/economy/productcategory'),
            Yii::t('category', 'category_product_update') => Yii::app()->createUrl('economy/productcategory/editcat', array('id' => $id)),
        );
        //
        $model = $this->loadModel($id);
        //
        $isAjax = Yii::app()->request->isAjaxRequest;
        $category = new ClaCategory();
        $category->type = ClaCategory::CATEGORY_PRODUCT;
        //
        $cat = Yii::app()->request->getPost('ProductCategories');
        if (isset($_POST['remove_avatar']) && $model->image_path != '' && $model->image_name != '') {
            $model->image_path = '';
            $model->image_name = '';
        }
        if (isset($_POST['remove_icon']) && $model->icon_path != '' && $model->icon_name != '') {
            $model->icon_path = '';
            $model->icon_name = '';
        }
        if (Yii::app()->request->isPostRequest) {
            $cat["cat_parent"] = (int) $cat["cat_parent"];
            if ($model->cat_id != $cat["cat_parent"]) {
                if ($model->cat_parent != $cat["cat_parent"]) {
                    if ($model->cat_parent != 0) {
                        $model_old_parent = ProductCategories::model()->findByPk($model->cat_parent);   // Thư mục cha của thư mục hiện tại chưa được gán
                        if ($model_old_parent)
                            $model_old_parent->cat_countchild = $model_old_parent->cat_countchild - 1;
                    }

                    if ($cat["cat_parent"] != 0) {
                        $model_new_parent = ProductCategories::model()->findByPk($cat["cat_parent"]);       // Thư mục cha được gán
                        if ($model_new_parent) {
                            $model->cat_order = $model_new_parent->cat_countchild + 1;
                            $model_new_parent->cat_countchild+=1;
                        }
                    } else {
                        $row = Yii::app()->db->createCommand("select max(cat_order) as maxorder from " . $category->getCategoryTable() . " where cat_parent=0 AND site_id=" . $this->site_id)->query()->read();
                        $model->cat_order = ((int) $row["maxorder"]) ? ((int) $row["maxorder"] + 1) : 1;
                    }
                }
                //
                $model->attributes = $cat;
                if ($model->avatar) {
                    $avatar = Yii::app()->session[$model->avatar];
                    if ($avatar) {
                        $model->image_path = $avatar['baseUrl'];
                        $model->image_name = $avatar['name'];
                    }
                }
                if ($model->icon) {
                    $icon = Yii::app()->session[$model->icon];
                    if ($icon) {
                        $model->icon_path = $icon['baseUrl'];
                        $model->icon_name = $icon['name'];
                    }
                }
                $model->percent = $cat["percent"];
                //
                if ($model->save()) {
                    if ($model->avatar)
                        unset(Yii::app()->session[$model->avatar]);
                    if (isset($model_new_parent))
                        $model_new_parent->save();
                    if (isset($model_old_parent))
                        $model_old_parent->save();
                    $this->redirect(Yii::app()->createUrl("economy/productcategory"));
                }
            }
        }
        // If not post
        $category->generateCategory();
        $category->removeItem($id);
        //
        $arr = array('' => Yii::t('category', 'category_parent_0'));
        $option = $category->createOptionArray(ClaCategory::CATEGORY_ROOT, ClaCategory::CATEGORY_STEP, $arr);

        $this->render("addcat", array(
            "model" => $model,
            'option' => $option,
            'isAjax' => $isAjax,
        ));

        //
    }

    /**
     * Check cat
     */
    public function actionCheckcat() {
        $cat = Yii::app()->request->getParam('cat');
        $cat_key = Yii::app()->request->getParam('cat_key');
        if ($cat_key && $cat && $cat_key == sha1(md5($cat))) {
            $cat_content = Yii::app()->request->getParam('cat_content');
            $cat_content = ProductCategories::getCatContent($cat_content);
            if ($cat_content)
                $this->jsonResponse(200);
        }
        $this->jsonResponse(404);
    }

    /**
     * Move down
     */
    public function actionMovecat() {
        if (Yii::app()->request->isAjaxRequest) {
            $status = Yii::app()->request->getParam("status");
            $id = Yii::app()->request->getParam("id");
            $model = ProductCategories::model()->findByPk($id);
            if (!$model) {
                $this->jsonResponse(204);
            }
            if ($model->site_id != $this->site_id) {
                $this->jsonResponse(403);
            }
            //
            $category = new ClaCategory();
            $category->type = ClaCategory::CATEGORY_PRODUCT;
            //
            switch ($status) {
                case "movedown": {
                        Yii::app()->db->createCommand("UPDATE " . $category->getCategoryTable() . " SET cat_order=cat_order-1 WHERE cat_parent=" . $model->cat_parent . " AND cat_order=" . ($model->cat_order + 1))->execute();
                        Yii::app()->db->createCommand("UPDATE " . $category->getCategoryTable() . " SET cat_order=cat_order+1 WHERE cat_id=$id")->execute();
                        $this->jsonResponse(200);
                    }break;

                case "moveup": {

                        Yii::app()->db->createCommand("UPDATE " . $category->getCategoryTable() . " SET cat_order=cat_order+1 WHERE cat_parent=" . $model->cat_parent . " AND cat_order=" . ($model->cat_order - 1))->execute();
                        Yii::app()->db->createCommand("UPDATE " . $category->getCategoryTable() . " SET cat_order=cat_order-1 WHERE cat_id=$id")->execute();
                        $this->jsonResponse(200);
                    }break;
            }
        } else {
            $this->jsonResponse(400);
        }
    }

    //
    public function actionDelcat($id) {
        $model = ProductCategories::model()->findByPk($id);
        if (!$model) {
            $this->jsonResponse(204);
        }
        if ($model->site_id != $this->site_id) {
            $this->jsonResponse(403);
        }
        //
        $category = new ClaCategory();
        $category->type = ClaCategory::CATEGORY_PRODUCT;
        //
        if (!$category->hasChildren($id)) {
            if ($model->delete()) {
                $this->jsonResponse(200);
                return;
            }
        }
        $this->jsonResponse(400);
    }

    /**
     * delete all cats follow id
     */
    public function actionDelallcat() {
        if (Yii::app()->request->isAjaxRequest) {
            $list_id = Yii::app()->request->getParam('lid');
            if (!$list_id)
                Yii::app()->end();
            $ids = explode(",", $list_id);
            $count = (int) sizeof($ids);
            if (!$count)
                $this->jsonResponse(204);
            //
            $category = new ClaCategory();
            $category->type = ClaCategory::CATEGORY_PRODUCT;
            //
            for ($i = 0; $i < $count; $i++) {
                $id = $ids[$i];
                if ($id) {
                    $model = ProductCategories::model()->findByPk($id);
                    if (!$model)
                        $this->jsonResponse(204);
                    if ($model->site_id == $this->site_id) {
                        if (!$category->hasChildren($id)) {
                            $model->delete();
                        }
                    }
                }
            }
        }
    }

    //
    //
    public function actionUpdateorder($id) {
        if (Yii::app()->request->isAjaxRequest) {
            $model = ProductCategories::model()->findByPk($id);
            if (!$model) {
                $this->jsonResponse(204);
            }
            if ($model->site_id != $this->site_id) {
                $this->jsonResponse(403);
            }
            //
            $order = (int) Yii::app()->request->getParam('or');
            //
            if ($order) {
                $model->cat_order = $order;
                if ($model->save())
                    $this->jsonResponse(200);
            }
        }
    }

    /**
     * upload file
     */
    public function actionUploadfile() {
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            if ($file['size'] > 1024 * 1000)
                Yii::app()->end();
            $up = new UploadLib($file);
            $up->setPath(array($this->site_id, 'category', 'ava'));
            $up->uploadImage();
            $return = array();
            $response = $up->getResponse(true);
            $return = array('status' => $up->getStatus(), 'data' => $response, 'host' => ClaHost::getImageHost(), 'size' => '');
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

    /**
     * upload file icon category product
     */
    public function actionUploadfileicon() {
        if (isset($_FILES['file'])) {
            $file = $_FILES['file'];
            if ($file['size'] > 1024 * 1000)
                Yii::app()->end();
            $up = new UploadLib($file);
            $up->setPath(array($this->site_id, 'category', 'ico'));
            $up->uploadImage();
            $return = array();
            $response = $up->getResponse(true);
            $return = array('status' => $up->getStatus(), 'data' => $response, 'host' => ClaHost::getImageHost(), 'size' => '');
            if ($up->getStatus() == '200') {
                $keycode = ClaGenerate::getUniqueCode();
                $return['data']['realurl'] = ClaHost::getImageHost() . $response['baseUrl'] . 's100_100/' . $response['name'];
                $return['data']['icon'] = $keycode;
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

    //
    //
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return News the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        //
        $ProductCategories = new ProductCategories();
        $ProductCategories->setTranslate(false);
        //
        $OldModel = $ProductCategories->findByPk($id);
        //
        if ($OldModel === NULL)
            throw new CHttpException(404, 'The requested page does not exist.');
        if ($OldModel->site_id != $this->site_id)
            throw new CHttpException(404, 'The requested page does not exist.');
        if (ClaSite::getLanguageTranslate()) {
            $ProductCategories->setTranslate(true);
            $model = $ProductCategories->findByPk($id);
            if (!$model) {
                $model = new ProductCategories();
                $model->cat_id = $id;
                $model->cat_parent = $OldModel->cat_parent;
                $pa = ($model->cat_parent) ? $model->cat_parent : 0;
                if ($pa == 0) {
                    $row = $ProductCategories->getMaxOrder();
                    $model->cat_order = ($row["maxorder"]) ? ((int) $row["maxorder"] + 1) : 1;
                } else {
                    $model2 = ProductCategories::model()->findByPk($pa);
                    if ($model2)
                        $model->cat_order = $model2->cat_countchild + 1;
                    else
                        $model->cat_order = 1;
                }
                $model->image_path = $OldModel->image_path;
                $model->image_name = $OldModel->image_name;
                $model->showinhome = $OldModel->showinhome;
            }
        } else
            $model = $OldModel;
        //
        return $model;
    }

    public function actionRemoveImageCat() {
        return 123;
    }

//
}
