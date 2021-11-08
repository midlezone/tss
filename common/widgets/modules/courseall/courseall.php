<?php

/* * *
 * Lấy tất cả các khóa học
 */

class courseall extends WWidget {

    public $course;
    public $limit = 10;
    public $totalitem = 0;
    protected $name = 'newsall'; // name of widget
    protected $view = 'view'; // view of widget

    public function init() {
		
        // set name for widget, default is class name
        if ($this->name == '') {
            $this->name = get_class($this);
        }
     
        //
//        $themename = Yii::app()->theme->name;
//        $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
//        $viewname = 'webroot.themes.' . $sitetypename . '.' . $themename . '.views.modules.' . $this->name . '.view';
//        if ($this->controller->getViewFile($viewname)) {
//            $this->view = $viewname;
//        }
    
        // get hot news
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        if (!$page)
            $page = 1;
        //
        // get hot news
		$this->limit = 25;
		$site_id = Yii::app()->controller->site_id;
				
		$this->course = Yii::app()->db->createCommand()->select('p.*')
					->from(ClaTable::getTable('edu_course as p'))
					->where('p.site_id= "'.$site_id.'" ')
					->order('RAND()')
					->limit($this->limit)
					->queryAll();
	
        $this->totalitem = Course::countAllCourse();
        parent::init();
    }

    public function run() {
        $this->render($this->view, array(
            'listcourse' => $this->course,
            'limit' => $this->limit,
            'totalitem' => $this->totalitem,
        ));
    }

}
