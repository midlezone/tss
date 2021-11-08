<?php

class breadcrumb extends WWidget {

    public $data = array(); // category info and its listnews
    protected $view = 'view'; // view of widget
    protected $name = 'breadcrumb';

    public function init() {
        // set name for widget, default is class name
//        $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
//        $themename = Yii::app()->theme->name;
//        $viewname = 'webroot.themes.' . $sitetypename . '.' . $themename . '.views.modules.breadcrumb.view';
//        if ($this->controller->getViewFile($viewname)) {
//            $this->view = $viewname;
//        }
        $viewname = $this->getViewAlias(array(
            'view' => $this->view,
            'name' => $this->name,
        ));
        if ($viewname != '') {
            $this->view = $viewname;
        }
        //
		 //
		if (Yii::app()->theme->name== 'fuhaco') {
			
			if(Yii::app()->controller->breadcrumbs['Giới thiệu'] == '/gioi-thieu') {
				$About = array(
					"About US" => 'About US'
				);
				$this->data = $About;
			}else if(Yii::app()->controller->breadcrumbs['Sản phẩm'] == '/san-pham') {
				$products = array(
					"PRODUCTS" => 'PRODUCTS'
				);
				$this->data = $products;
			} else {
				$this->data = Yii::app()->controller->breadcrumbs;
			}
			
			
		} else {
			$this->data = Yii::app()->controller->breadcrumbs;
		}
        
        if (!$this->data || !count($this->data))
            return false;
		
		if (Yii::app()->theme->name== 'fuhaco') {
			  $this->data = array('Home' => Yii::app()->homeUrl) + $this->data;
		} else {
			  $this->data = array(Yii::t('common', 'homepage') => Yii::app()->homeUrl) + $this->data;
		}		
        parent::init();
    }

    public function run() {
        $this->render($this->view, array(
            'data' => $this->data,
        ));
    }

}
