<?php

class wget extends CWidget {

    public $position = '';
    public $widgets = array();
    public $type = '';
    public function init() {
        parent::init();
    }

    public function run() {
        $this->render('wview', array(
            'position' => $this->position,
            'widgets' => $this->widgets,
        ));
    }

}
