<?php

class productall extends WWidget {

    public $products;
    public $limit = 20;
    public $totalitem = 0;
    protected $name = 'productall'; // name of widget
    protected $view = 'view'; // view of widget

    public function init() {
        // set name for widget, default is class name
        if ($this->name == '') {
            $this->name = get_class($this);
        }
        // Load config
        $config_productall = new config_productall('', array('page_widget_id' => $this->page_widget_id));
        if (isset($config_productall->limit))
            $this->limit = (int) $config_productall->limit;
        if ($config_productall->widget_title)
            $this->widget_title = $config_productall->widget_title;
        if (isset($config_productall->show_wiget_title))
            $this->show_widget_title = $config_productall->show_wiget_title;
        //
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        if (!$page)
            $page = 1;
        $order = $this->getOrderQuery();
        //
        $this->products = Product::getAllProducts(array(
                    'limit' => $this->limit,
                    ClaSite::PAGE_VAR => $page,
                    'order' => $order,
        ));
        $this->totalitem = Product::countAll();
        //
        $viewname = $this->getViewAlias(array(
            'view' => $this->view,
            'name' => $this->name,
        ));
        if ($viewname != '') {
            $this->view = $viewname;
        }
        parent::init();
    }

    public function run() {
        $this->render($this->view, array(
            'products' => $this->products,
            'limit' => $this->limit,
            'totalitem' => $this->totalitem,
        ));
    }

    /**
     * return order query
     * @param type $order
     */
    function getOrderQuery() {
        $sort = Yii::app()->request->getParam(ClaSite::PAGE_SORT);
        $order = '';
        if ($sort) {
            switch ($sort) {
                case 'new': $order = 'isnew DESC,created_time DESC';
                    break;
                case 'new_desc': $order = 'isnew,created_time';
                    break;
                case 'price': $order = 'price';
                    break;
                case 'price_desc': $order = 'price DESC';
                    break;
                case 'name': $order = 'name';
                    break;
                case 'name_desc': $order = 'name DESC';
                    break;
            }
        }
        return $order;
    }

}
