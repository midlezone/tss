<?php

class UseradminController extends BackController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/main';

    public function actionChangepass() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('user', 'change_password') => '',
        );

        $model = $this->loadModel();
        $model->scenario = 'Changepass';
        if (isset($_POST['UserModel'])) {
            $model->attributes = $_POST['UserModel'];
                    
            if (ClaGenerate::encrypPassword($_POST['UserModel']['current_password']) != $model->password) {
                $model->addError('current_password', Yii::t('user', 'current_password_invalid'));
            } else {
                $model->password = ClaGenerate::encrypPassword($_POST['UserModel']['new_password']);
               
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', Yii::t('user', 'change_pass_success'));
                    $this->redirect(Yii::app()->createUrl('/useradmin/useradmin/changepass'));
                }
            }
        }
        
        $this->render('changePass', array(
            'model' => $model,
        ));
    }

    public function loadModel() {

        $current_user_id = Yii::app()->user->id;
        $model = UserModel::model()->findByPk($current_user_id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
