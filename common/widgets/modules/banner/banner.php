<?php

class banner extends WWidget {

    public $banner_group_id = 0; // category info and its listnews
    public $banners = array();
    protected $name = 'banner';
    protected $view = 'view';
    protected $bannerLimit = null; // giới hạn số banner lấy trong nhóm

    //
    public function init() {
        // set name for widget, default is class name
        if ($this->name == '') {
            $this->name = get_class($this);
        }
        //
        // Load config
        $config_banner = new config_banner('', array('page_widget_id' => $this->page_widget_id));
        //CVarDumper::dump($config_banner);
        if ($config_banner->banner_group_id) {
            $this->banner_group_id = $config_banner->banner_group_id;
            $this->banners = Banners::getBannersInGroup($this->banner_group_id, array('limit' => $config_banner->limit));
            $this->banners = Banners::filterBanners($this->banners);
            $this->widget_title = $config_banner->widget_title;
            $this->show_widget_title = $config_banner->show_wiget_title;
        }
        // set name for widget, default is class name
//        $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
//        $themename = Yii::app()->theme->name;
//        $viewname = 'webroot.themes.' . $sitetypename . '.' . $themename . '.views.modules.banner.' . $this->view;
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
        parent::init();
    }

    public function run() {
        $this->render($this->view, array(
            'banners' => $this->banners,
            'banner_group_id' => $this->banner_group_id,
        ));
    }

}
