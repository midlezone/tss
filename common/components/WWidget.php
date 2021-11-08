<?php

/**
 * @author minhbn
 */
class WWidget extends CWidget {

    public $page_widget_id = null;
    public $position = ''; // Vị trí của module nằm ở đâu trên web
    public $widget_title = '';
    public $show_widget_title = 0;
    public $showaction = false;
    public $key = ''; // get key of current page
    protected $_showaction = false;
    protected $view = '';
    protected $name = '';

    /**
     * 
     * @param type $view
     */
    protected function beforeRender($view) {
        return true;
    }

    protected function afterRender($view) {
        
    }

    /**
     * Thêm các giá trị mặc định vào data
     * @param type $view
     * @param type $data
     * @param type $return
     * @return type
     */
    public function render($view, $data = null, $return = false) {
        $data = array_merge($data, array('page_widget_id' => $this->page_widget_id, 'key' => $this->key, 'widget_title' => $this->widget_title, 'show_widget_title' => $this->show_widget_title));
        $showaction = false;
        if ($this->showaction) {
            $showaction = true;
            $this->showaction = false;
        }
        $wcontent = parent::render($view, $data, true);
        $result = $wcontent;
        if ($showaction) {
            $PageWidget = PageWidgets::model()->findByPk($this->page_widget_id);
            if ($PageWidget) {
                $WidgetTypes = ClaTheme::getWidgetTypes();
                $widget_name = isset($WidgetTypes[$PageWidget->widget_id]) ? $WidgetTypes[$PageWidget->widget_id] : '';
                $data = array_merge($data, $PageWidget->attributes + array('widget_name' => $widget_name));
            }
            $html = Yii::app()->controller->renderPartial('common.components.views.moduleaction', array(
                'wcontent' => $wcontent,
                'data' => $data,
                    ), true);
            $result = $html;
        }
        //
        if ($return)
            return $result;
        echo $result;
    }

    /**
     * return path of view
     * @param type $options
     */
    function getViewAlias($options = array()) {
        $themename = isset($options['themename']) ? $options['themename'] : Yii::app()->theme->name;
        $sitetypename = isset($options['sitetype']) ? $options['sitetype'] : ClaSite::getSiteTypeName(Yii::app()->siteinfo);
        $view = isset($options['view']) ? $options['view'] : 'view';
        $name = isset($options['name']) ? $options['name'] : $this->name;
        // view mặc định
        $viewname = 'webroot.themes.' . $sitetypename . '.' . $themename . '.views.modules.' . $name . '.' . $view;
        // view theo vị trí đặt widget
        $viewfollowposition = 'webroot.themes.' . $sitetypename . '.' . $themename . '.views.modules.' . $name . '.' . $view . '_' . $this->position;
        //
        $return = '';
        if ($this->position != '' && $this->controller->getViewFile($viewfollowposition))
            $return = $viewfollowposition;
        elseif ($this->controller->getViewFile($viewname))
            $return = $viewname;
        return $return;
    }

}
