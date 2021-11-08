<?php

class realestateProject extends WWidget {

    public $data = array(); 	
	public $realestate;
    public $limit = 10;
    public $totalitem = 0;
    protected $name = 'realestateProject'; // name of widget
    protected $view = 'view'; // view of widget
	public $url_return;

    public function init() {
		 // set name for widget, default is class name
        if ($this->name == '') {
            $this->name = get_class($this);
        }
        // Load config
        $config_realestateProject = new config_realestateProject('', array('page_widget_id' => $this->page_widget_id));
        if (isset($config_realestateProject->limit)) {
            $this->limit = (int) $config_realestateProject->limit;
        }
        if ($config_realestateProject->widget_title) {
            $this->widget_title = $config_realestateProject->widget_title;
        }
        if (isset($config_realestateProject->show_wiget_title)) {
            $this->show_widget_title = $config_realestateProject->show_wiget_title;
        }
        //
        $viewname = $this->getViewAlias(array(
            'view' => $this->view,
            'name' => $this->name,
        ));
        if ($viewname != '') {
            $this->view = $viewname;
        }
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        if (!$page) {
            $page = 1;
        }
        //
        // get realestateall
        $this->realestate = RealEstate::getAllRealestate(array(
                    'limit' => $this->limit,
                    ClaSite::PAGE_VAR => $page,
        ));
        //
        $this->totalitem = RealEstate::countAllRealestate();
		
        parent::init();
    }

    public function run() {
        $site_id = Yii::app()->controller->site_id;
        $projects = array();
        $data = Yii::app()->db->createCommand()->select()
                ->from(ClaTable::getTable('real_estate_project'))
                ->where('site_id=:site_id AND status=:status', array(':site_id' => $site_id, ':status' => ActiveRecord::STATUS_ACTIVED))
                ->queryAll();
        $pagesize = 10000;
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
         if (count($data)) {
            foreach ($data as $project) {
                $projects[$project['id']] = $project;
                $projects[$project['id']]['link'] = Yii::app()->createUrl('news/realestateProject/detail', array('id' => $project['id'], 'alias' => $project['alias']));
                $projects[$project['id']]['realestates'] = RealEstate::getRealestateInProject($project['id'], array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
                ));
            }
        } 
        
        $this->render($this->view, array(
            'projects' => $projects,
        ));
    }

}
