<?php

class Flashes extends CWidget {

    public $time = 5000;

    public function run() {
        $errors = Yii::app()->user->getFlashes();
        foreach ($errors as $k => $v) {
            $class = 'success';
            switch ($k) {
                case 'error': {
                        $class = 'error';
                    }break;
                case 'notice': {
                        $class = 'notice';
                    }break;
                case 'warning': {
                        $class = 'warning';
                    }break;
                default : break;
            }
            echo '<div id="alert-box"><div id="yj-alert" class="alert-box ' . $class . '">' . $v . '<a href="#" class="yj-closeFlash" onclick="jQuery(this).closest(\'#alert-box\').remove(); return false;">x</a></div></div>';
            Yii::app()->clientScript->registerScript(
                    'NotificationEffect', 'setTimeout(function(){
            				$("#alert-box").animate({opacity: 0.9}, ' . $this->time . ').fadeOut("slow", function () {jQuery(this).remove();});
                        }, 10);', CClientScript::POS_READY
            );
        }
    }

}
