<?php

class CategoryController extends PublicController {

    public $layout = '//layouts/page';

    public function actionDetail($id) {
        $model = CategoryPage::model()->findByPk($id);
        if (!$model)
            $this->sendResponse(404);
        //breadcrumb
         $this->breadcrumbs = array(
            $model->title => Yii::app()->createUrl('/page/category/detail',array('id'=>$model->id,'alias'=>$model->alias)),
        );
         //
        $this->render('detail', array(
            'model' => $model,
        ));
    }

}
