<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class PublicController extends Controller {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';
    public $layoutForAction = ''; // Layout for each action

    /**
     * defaul class for content
     */
    public $classCssContent = 'contain-gird-big';

    /**
     * những widget của page đó
     * @var type 
     */
    public $WidgetsFromPage = null;

    /**
     * default controller
     * @var type 
     */
	 
    public function init() {
		
        if (isset($_GET['debug'])&&$_GET['debug']) {
            echo "<pre>";
            print_r(Yii::app()->db);
            echo "<pre>";
            die;
        }
		
        // Access Statistic
        parent::init();
    }

	
    protected function beforeRender($view) {
        // favicon
        if (Yii::app()->siteinfo['favicon'])
            Yii::app()->clientScript->registerLinkTag('shortcut icon', null, Yii::app()->siteinfo['favicon'], null);
        // Meta keyword
        if ($this->metakeywords != '') {
            Yii::app()->clientScript->registerMetaTag($this->metakeywords, 'keywords', null, array('name' => 'keywords'));
        }
        // Meta description
        if ($this->metadescriptions != '') {
            Yii::app()->clientScript->registerMetaTag($this->metadescriptions, 'description', null, array('name' => 'description'));
        }
        // Meta description
        if ($this->metaTitle != '') {
            Yii::app()->clientScript->registerMetaTag($this->metaTitle, null, null, array('name' => 'title'));
            $this->pageTitle = $this->metaTitle;
        }
        // google analytics
        $googleanalytics = trim(Yii::app()->siteinfo['google_analytics']);
        if ($googleanalytics != '') {
            Yii::app()->clientScript->setHeadString($googleanalytics);
        }
        // Nếu trang hiện tại là link trang chủ thì chuyển layout của nó về là home
        if (ClaSite::getLinkKey() == ClaSite::getHomeKey(Yii::app()->siteinfo)) {
            //Nếu chưa có layout home thì giữ nguyên layout hiện tại
            if ($this->getLayoutFile('//layouts/home'))
                $this->layout = '//layouts/home';
        }
        //
        if ($this->layout != '//layouts/home') {
            if ($this->layoutForAction && $this->getLayoutFile($this->layoutForAction))
                $this->layout = $this->layoutForAction;
            elseif (($layoutFile = $this->getLayoutFile($this->layout)) === false)
                $this->layout = '//layouts/main';
        }
        //
        return parent::beforeRender($view);
    }

    //
    public function render($view, $data = null, $return = false) {
        if ($this->beforeRender($view)) {
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/web3nhat.min.js?v=' . VERSION, CClientScript::POS_END);
            Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/main.min.css?v=' . VERSION);
            $output = $this->renderPartial($view, $data, true);
            $output.= $this->widget('common.widgets.managerwidget.managerwidget', array(), true);
            $output.= $this->widget('common.widgets.statistic.statistic', array(), true);
            // widget nhận thông báo
            $output.= $this->widget('Flashes', array(), true);
            // add custom style to out put
            if (Yii::app()->siteinfo['stylecustom']) {
                $output = '<style type="text/css">' . Yii::app()->siteinfo['stylecustom'] . "</style>" . $output;
            }
            //
            if (($layoutFile = $this->getLayoutFile($this->layout)) !== false)
                $output = $this->renderFile($layoutFile, array('content' => $output), true);
            //
            $this->afterRender($view, $output);
            //
            $output = $this->processOutput($output);

            if ($return)
                return $output;
            else
                echo $output;
        }
    }

    //
    function beforeAction($action) {
        //
        if (Yii::app()->request->isAjaxRequest) {
            Yii::app()->clientScript->scriptMap = array(
                'jquery.js' => false,
                'jquery.min.js' => false,
                'jquery-ui.min.js' => false,
                'jquery-ui.js' => false,
            );
        }
        if (!Yii::app()->request->isAjaxRequest) {
            // Lấy tất cả các widget trong page này
            $this->WidgetsFromPage = Widgets::getWidgetsFromPage();
        }
        return parent::beforeAction($action);
    }
    
    public function respondData($data = array(), $starus = 200, $message = "")
    {   
        $resutl = array(
            "status" => $starus,
            "message" => $message,
            "data" => $data,
        );
        
        $this->respondJson($resutl);
    }

    public function respondJson($data)
    {   
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    protected function respondStatus($message = 'Success', $status = 200, $data = array())
    {   
        return $this->respondJson(array('status' => $status, 'message' => $message, "data" => $data));
    }

    protected function respondError($message = 'Your session has expired. Please login again.', $status = 400, $data = array())
    {
        return $this->respondJson(array('status' => $status, 'message' => $message, "data" => $data));
    }
    
    public function postPram($key = null, $default = null)
    {
        return $this->getRequetParam($_POST, $key);
    }

    public function getPram($key = null, $default = null)
    {
        return $this->getRequetParam($_GET, $key);
    }
    
    public function getRequetParam($method, $pram)
    {
         if (empty($method) || empty($pram)) {
            return '';
        }
        if (!isset($method[$pram]) || empty($method[$pram])) {
            return '';
        }
        return $method[$pram];
    }
    
     public function printData($data = array())
    {
        echo "<pre>";
            print_r($data);
        echo "</pre>";
        exit;
    }
    
    protected function methodName() 
    {
        return Yii::app()->controller->action->id;
    }

//
//    public function filters() {
//        return array(
//            array(
//                'common.extensions.html.ECompressHtmlFilter',
//                'gzip' => false,
//                'doStripNewlines' => true,
//                'actions' => '*'
//            ),
//        );
//    }
}
