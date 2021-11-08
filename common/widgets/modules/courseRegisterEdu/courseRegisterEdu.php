<?php

class courseRegisterEdu extends WWidget {

    public $data = array();
    protected $view = 'view';
    public $url_return;
    public $id;

    public function init() {
        parent::init();
    }

    public function run() {

        $model = new CourseRegister();
        $model->unsetAttributes();
        $course_id = $this->id;

        $option_course = Course::getOptionCourse();
        $this->render($this->view, array(
            'model' => $model,
            'option_course' => $option_course,
            'course_id' => $course_id
        ));
    }

}
