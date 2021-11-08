<?php

/**
 * Description of wglobal 
 * Widget chung để hiển thị các widget khác 
 *
 * @author minhbn
 */
class wglobal extends CWidget {

    //put your code here
    public $position = null;
    public $widgets = array();
    public $beginContent = '';
    public $endContent = '';
    protected $key = '';

    public function init() {
        //
        if (!$this->key) {
            $this->key = ClaSite::getLinkKey();
            $this->key = ClaGenerate::encrypt($this->key);
        }
        //
        if (!$this->beginContent && ClaSite::ShowModule()) {
            $this->beginContent = '<div class="module-position">';
            $this->endContent = '<div class="addmodule"><a class="addmodule-action" href="' . Yii::app()->createUrl('widget/widget/getform', array('wkey' => $this->key, 'po' => $this->position)) . '">Thêm module</a></div>' . '</div>';
        }
        if (count($this->widgets) == 0) {
            if ($this->position === null)
                return false;
            $this->widgets = Widgets::getWidgetsFollowPositionKey($this->position);
        }
        //$first = array_slice($this->widgets, 0, 1);
        $first = reset($this->widgets);
        if (!is_array($first))
            return false;
        if ($this->beginContent != '' && $this->endContent == '' || $this->beginContent == '' && $this->endContent != '') {
            echo Yii::t('errors', 'content_invalid');
            return false;
        }
        parent::init();
    }

    public function run() {
        if ($this->beginContent)
            echo $this->beginContent;
        //
        foreach ($this->widgets as $widget) {
            Widgets::renderWidget($widget, array('position' => $this->position));
        }
        //
        if ($this->endContent)
            echo $this->endContent;
    }

}
