<?php

class productIncategory extends WWidget {

    public $products;
    public $limit = 10;
    public $cat_id = 0;
    public $category = null;
    protected $name = 'productcategory'; // name of widget
    protected $view = 'view'; // view of widget

    public function init() {
        // set name for widget, default is class name
        if ($this->name == '') {
            $this->name = get_class($this);
        }
        // Load config
		

        // $config_productcategory = new config_productcategory('', 
			// array('page_widget_id' => $this->page_widget_id)
		// );
        // if (isset($config_productcategory->limit))
            // $this->limit = (int) $config_productcategory->limit;
        // if ($config_productcategory->widget_title)
            // $this->widget_title = $config_productcategory->widget_title;
        // if (isset($config_productcategory->show_wiget_title))
            // $this->show_widget_title = $config_productcategory->show_wiget_title;
        //
//        $themename = Yii::app()->theme->name;
//        $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
//        $viewname = 'webroot.themes.' . $sitetypename . '.' . $themename . '.views.modules.' . $this->name . '.view';
//        if ($this->controller->getViewFile($viewname)) {
//            $this->view = $viewname;
//            // get hot news
//            if (!count($this->products) && $this->cat_id) {
//                $this->products = Product::getAllProducts(array('limit' => $this->limit));
//            }
//        }
        $viewname = $this->getViewAlias(array(
            'view' => $this->view,
            'name' => $this->name,
        ));
        if ($viewname != '') {
            $this->view = $viewname;
            // get hot news
            if (!count($this->products) && $this->cat_id) {
                $this->products = Product::getAllProducts(array('limit' => $this->limit));
            }
        }
        parent::init();
    }

    public function run() {
        $this->render($this->view, array(
            'products' => $this->products,
            'category' => $this->category,
        ));
    }

}
