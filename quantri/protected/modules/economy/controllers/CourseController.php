<?php

class CourseController extends BackController {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
	 
    public function actionCreate() {
		
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('course', 'course_manager') => Yii::app()->createUrl('/economy/course'),
            Yii::t('course', 'course_create') => Yii::app()->createUrl('/economy/course/create'),
        );

        $model = new Course();
        $model->unsetAttributes();

        $courseInfo = new CourseInfo();
        //
        $category = new ClaCategory();
        $category->type = ClaCategory::CATEGORY_COURSE;
        $category->generateCategory();

        if (isset($_POST['Course'])) {
            $model->attributes = $_POST['Course'];
			
            /* $model->processPrice();
            if ($model->name) {
                $model->alias = HtmlFormat::parseToAlias($model->name);
            }
            if ($model->course_open && $model->course_open != '' && (int) strtotime($model->course_open)) {
                $model->course_open = (int) strtotime($model->course_open);
            } else {
                $model->course_open = time();
            }
            if ($model->course_finish && $model->course_finish != '' && (int) strtotime($model->course_finish)) {
                $model->course_finish = (int) strtotime($model->course_finish);
            } else {
                $model->course_finish = time();
            }
            //
            if (isset($_POST['CourseInfo'])) {
                $courseInfo->attributes = $_POST['CourseInfo'];
            }
            //

            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            } */
            //
            //
            if ($model->save()) {
                //
                //$courseInfo->course_id = $model->id;
                //$courseInfo->save();
                //
             /*    if ($_POST['Course']['lecturer_id']) {

                    $rel_course_lecturer = new RelCourseLecturer();
                    $rel_course_lecturer->lecturer_id = $_POST['Course']['lecturer_id'];
                    $rel_course_lecturer->course_id = $model->id;
                    $rel_course_lecturer->save();
                } */

                //unset(Yii::app()->session[$model->avatar]);
                $this->redirect(array('index'));
            }
        }
		if ($this->site_id == '1250') {
			 $this->render('create1', array(
				'model' => $model,
				'courseInfo' => $courseInfo,
				'category' => $category,
			));
		} else {
			 $this->render('create', array(
				'model' => $model,
				'courseInfo' => $courseInfo,
				'category' => $category,
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
            Yii::t('course', 'course_manager') => Yii::app()->createUrl('/economy/course'),
            Yii::t('course', 'course_create') => Yii::app()->createUrl('/economy/course/create'),
        );

        $model = $this->loadModel($id);
		
		/* 
        if ($model->price) {
            $model->price = HtmlFormat::money_format($model->price);
        }
        if ($model->price_market) {
            $model->price_market = HtmlFormat::money_format($model->price_market);
        }

        $courseInfo = CourseInfo::model()->findByPk($id);

        $rel_course_lecturer = RelCourseLecturer::model()->findByAttributes(array('course_id' => $id));
        if ($rel_course_lecturer) {
            $model->lecturer_id = $rel_course_lecturer->lecturer_id;
        } */
        //
        $category = new ClaCategory();
        $category->type = ClaCategory::CATEGORY_COURSE;
        $category->generateCategory();

        if (isset($_POST['Course'])) {

            $model->attributes = $_POST['Course'];
			
           /*  $model->processPrice();
            if ($model->name) {
                $model->alias = HtmlFormat::parseToAlias($model->name);
            }
            if ($model->course_open && $model->course_open != '' && (int) strtotime($model->course_open)) {
                $model->course_open = (int) strtotime($model->course_open);
            } else {
                $model->course_open = time();
            }
            if ($model->course_finish && $model->course_finish != '' && (int) strtotime($model->course_finish)) {
                $model->course_finish = (int) strtotime($model->course_finish);
            } else {
                $model->course_finish = time();
            }
            //
            if (isset($_POST['CourseInfo'])) {
                $courseInfo->attributes = $_POST['CourseInfo'];
            }
            //

            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            } */
            //
            //
            if ($model->save()) {
                /* //
                $courseInfo->course_id = $model->id;
                $courseInfo->save();
                //
                if ($_POST['Course']['lecturer_id']) {
                    $old_rel = RelCourseLecturer::model()->findByAttributes(array('course_id' => $model->id));
                    if ($old_rel) {
                        $old_rel->delete();
                    }
                    $rel_course_lecturer = new RelCourseLecturer();
                    $rel_course_lecturer->lecturer_id = $_POST['Course']['lecturer_id'];
                    $rel_course_lecturer->course_id = $model->id;
                    $rel_course_lecturer->save();
                } else {
                    $old_rel = RelCourseLecturer::model()->findByAttributes(array('course_id' => $model->id));
                    if ($old_rel) {
                        $old_rel->delete();
                    }
                }

                unset(Yii::app()->session[$model->avatar]); */
                $this->redirect(array('index'));
            }
        }
		if ($this->site_id == '1250') {
			 $this->render('create1', array(
				'model' => $model,
				'courseInfo' => $courseInfo,
				'category' => $category,
			));
		} else {
			 $this->render('create', array(
				'model' => $model,
				'courseInfo' => $courseInfo,
				'category' => $category,
			));
		}
       
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $sql = 'DELETE FROM edu_course_register WHERE site_id = '.  $this->site_id. ' AND course_id = '.$id;
        Yii::app()->db->createCommand($sql)->execute();
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('course', 'course_manager') => Yii::app()->createUrl('/economy/course'),
        );
        $model = new Course('search');
        $model->unsetAttributes();  // clear any default values        
        if (isset($_GET['Course'])) {
            $model->attributes = $_GET['Course'];
        }
        $model->site_id = $this->site_id;
		
		
		if ($this->site_id == '1250') {
			 $this->render('index1', array(
				'model' => $model,
			));
		} else {
			$this->render('index', array(
				'model' => $model,
			));
		}
		
        
    }
	 /**
     * Lists all models.
     */
    public function actionTest2() {
		echo 1212; die;
		
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('course', 'course_manager') => Yii::app()->createUrl('/economy/course'),
        );
        $model = new Course('search');
        $model->unsetAttributes();  // clear any default values        
        if (isset($_GET['Course'])) {
            $model->attributes = $_GET['Course'];
        }
        $model->site_id = $this->site_id;
		
		
		if ($this->site_id == '1250') {
			 $this->render('index1', array(
				'model' => $model,
			));
		} else {
			$this->render('index', array(
				'model' => $model,
			));
		}
		
        
    }
	

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Course('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Course']))
            $model->attributes = $_GET['Course'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Course the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Course::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        if ($model->site_id != $this->site_id)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Course $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'course-form') {
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
            if ($file['size'] > 1024 * 1000) {
                Yii::app()->end();
            }
            $up = new UploadLib($file);
            $up->setPath(array($this->site_id, 'course', 'ava'));
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

    public function actionListRegister() {

        $this->breadcrumbs = array(
            Yii::t('course', 'course_register_list') => Yii::app()->createUrl('/economy/course/listRegister'),
        );

        $model = new CourseRegister('search');

        $model->unsetAttributes();  // clear any default values        

        if (isset($_GET['CourseRegister'])) {
            $model->attributes = $_GET['CourseRegister'];
        }

        $model->site_id = $this->site_id;

        $this->render('list_register', array(
            'model' => $model,
        ));
    }

    public function getCourseName($id) {
        $model = $this->loadModel($id);
        if ($model) {
            return $model->name;
        }
        return '';
    }

    public function actionUpdateCourseRegiter($id) {

        $this->breadcrumbs = array(
            Yii::t('course', 'course_register_list') => Yii::app()->createUrl('/economy/course/listRegister'),
        );

        $model = CourseRegister::model()->findByPk($id);

        if (isset($_POST['CourseRegister'])) {

            $model->attributes = $_POST['CourseRegister'];
            if ($model->save()) {
                $this->redirect(array('listRegister'));
            }
        }

        $option_course = Course::getOptionCourse();
        $this->render('update_register', array(
            'model' => $model,
            'option_course' => $option_course
        ));
    }

    public function actionDeleteCourseRegister($id) {
        $course_register = CourseRegister::model()->findByPk($id);
        $course_register->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('listRegister'));
        }
    }

}
