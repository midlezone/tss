<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    public $classCssContent;
    public $site_id = 0;
    public $metakeywords = '';
    public $metadescriptions = '';
    public $metaTitle = '';
    protected $metaTags = array();

    public function __construct($id, $module = null) {
        $this->site_id = ClaSite::getCurrentSiteId();
        parent::__construct($id, $module);
    }

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    protected function beforeRender($view) {
        if ($this->pageTitle && !isset($this->metaTags['og:title'])) {
            $this->addMetaTag($this->pageTitle, 'og:site_name', null, array('property' => 'og:site_name'));
            $this->addMetaTag($this->pageTitle, 'og:title', null, array('property' => 'og:title'));
        }
        if ($this->metadescriptions && !isset($this->metaTags['og:description'])) {
            $this->addMetaTag($this->metadescriptions, 'og:description', null, array('property' => 'og:description'));
        }
        if (!isset($this->metaTags['og:type'])) {
            $this->addMetaTag('website', 'og:type', null, array('property' => 'og:type'));
        }
        if (!isset($this->metaTags['og:url'])) {
            $this->addMetaTag(ClaSite::getFullCurrentUrl(), 'og:url', null, array('property' => 'og:url'));
        }
        if (!isset($this->metaTags['og:image']) && Yii::app()->siteinfo['site_logo']) {
            $this->addMetaTag(Yii::app()->request->hostInfo . Yii::app()->siteinfo['site_logo'], 'og:image', null, array('property' => 'og:image'));
        }
        if ($this->metaTags['og:image'] && !isset($this->metaTags['og:image:type'])) {
            $pathinfo = pathinfo($this->metaTags['og:image']['content']);
            //
            $mimeType = Files::getMimeType($pathinfo['extension']);
            if ($mimeType)
                $this->addMetaTag($mimeType, 'og:image:type', null, array('property' => 'og:image:type'));
        }
        //
        if ($this->metaTags && count($this->metaTags)) {
            foreach ($this->metaTags as $meta)
                Yii::app()->clientScript->registerMetaTag($meta['content'], $meta['name'], $meta['httpEquiv'], $meta['options'], $meta['id']);
        }
        return parent::beforeRender($view);
    }

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    /**
     * messeage response
     * @param type $status
     * @return type
     */
    public function _getStatusCodeMessage($status) {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            306 => '(Unused)',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Requested Range Not Satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
        );
        return (isset($codes[$status])) ? $codes[$status] : 'Unknown Result';
    }

    /**
     * return pagenotfound
     * @throws CHttpException
     */
    public function pageNotFound($mess = '') {
        //$m = trim($mess);
        //$m = $m == '' ? $this->_getStatusCodeMessage(404) : $m;
        //throw new CHttpException(404, $m);
        $this->redirect(Yii::app()->createUrl('site/site/notfound'));
    }

    /**
     * return pagedenied
     * @throws CHttpException
     */
    public function pageDenied($mess = '') {
        $m = trim($mess);
        $m = $m == '' ? $this->_getStatusCodeMessage(403) : $m;
        throw new CHttpException(403, $m);
        $this->redirect('site/error');
    }

    /**
     * render page error with custom error
     * @throws CHttpException
     */
    public function pageError($code, $mess = '') {
        $m = trim($mess);
        $m = $m == '' ? $this->_getStatusCodeMessage($code) : $m;
        throw new CHttpException($code, $m);
        $this->redirect('site/error');
    }

    /**
     * Send raw HTTP response
     * @param int $status HTTP status code
     * @param string $body The body of the HTTP response
     * @param string $contentType Header content-type
     * @return HTTP response
     */
    public function sendResponse($status = 200, $body = '', $contentType = 'application/json') {
        if ($status == 404)
            $this->pageNotFound();
        // Set the status
        $statusHeader = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($statusHeader);
        // Set the content type
        header('Content-type: ' . $contentType);

        echo $body;
        Yii::app()->end();
    }

    /**
     * using for ajax response
     * @param type $code 200 => 'OK',<br/>
      400 => 'Bad Request',<br/>
      401 => 'Unauthorized',<br/>
      402 => 'Payment Required',<br/>
      403 => 'Forbidden',<br/>
      404 => 'Not Found',<br/>
      500 => 'Internal Server Error',<br/>
      501 => 'Not Implemented',<br/>
     * @param type $messages
     */
    public function jsonResponse($code, $data = array()) {
        $d = is_array($data) ? $data : array();
        $msgdefault['msgdefault'] = $this->_getStatusCodeMessage($code);
        echo json_encode(array('code' => $code) + $d + $msgdefault);
        Yii::app()->end();
    }

    /**
     * json response: page's not found
     */
    public function jsonResponseNotFound() {
        echo $this->jsonResponse(404);
    }

    /**
     * json response: page's denied
     */
    public function jsonResponsePageDenied() {
        echo $this->jsonResponse(403);
    }

    /**
     * get single param
     * for POST, GET method
     * @param string $name Description
     * @return string
     */
    public function getParam($name) {
        $value = Yii::app()->request->getParam($name);
        if (!is_array($value)) {
            $value = CHtml::encode(trim($value));
            if ($value == '') {
                $value = NULL;
            }
        }
        return $value;
    }

    /**
     * add meta tag
     */
    public function addMetaTag($content = '', $name = NULL, $httpEquiv = NULL, $options = array(), $id = NULL) {
        if (!$name)
            $name = ClaGenerate::randomCode();
        $this->metaTags[$name] = array('content' => $content, 'name' => $name, 'httpEquiv' => $httpEquiv, 'options' => $options, 'id' => $id);
    }

    /**
     * 
     */
    function beforeAction($action) {
        // Nếu khóa trang thì redirect to trang khóa
        if (Yii::app()->siteinfo['status'] == ClaSite::SITE_STATUS_DISABLE || ClaSite::isExpiryDate()) {
            $linkKey = ClaSite::getLinkKey();
            $appId = Yii::app()->getId();
            if ($appId == 'public') {
                if ($linkKey != 'site/site/disable')
                    $this->redirect(Yii::app()->createUrl('site/site/disable'));
            } else {
                if ($linkKey != 'site/disable' && isset(Yii::app()->controller->module->id) && Yii::app()->controller->module->id != 'login')
                    $this->redirect(Yii::app()->createUrl('site/disable'));
            }
        }
        return parent::beforeAction($action);
    }
    
    public $logMessage = NULL;
    public $writeLog = false;
    
    function afterAction($action) {
        if ($this->writeLog) {
            $sql = 'INSERT INTO tbl_logs VALUES (\'' . Yii::app()->user->name . '\',\'' . $_SERVER['REMOTE_ADDR'] . '\',\'' . date("Y-m-d H:i:s") . '\',\'' . $this->getId() . '\',\'' . $this->getAction()->getId() . '\',\'' . $this->logMessage . '\', \''.Yii::app()->controller->site_id.'\')';
            $command = Yii::app()->db->createCommand($sql);
            $command->execute();
        }
    }

}
