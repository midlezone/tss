<?php

/*
 * Translate 
 */

class translate extends CWidget {

    public $baseUrl = '';
    public $params = array();
    public $iconClass = '';
    protected $view = 'view';

    public function init() {
        parent::init();
    }

    public function run() {
        $this->render($this->view, array(
            'baseUrl' => $this->baseUrl,
            'params' => $this->params,
            'iconClass' => $this->iconClass,
        ));
    }

}
