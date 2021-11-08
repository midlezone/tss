<?php

/**
 * Description of managerwidget
 *
 * @author minhbn
 */
class managerwidget extends CWidget {

    protected $show = false;
    protected $key = '';
    protected $view = 'view';
    protected $admin = null;
    protected $adminLink = '';

    public function init() {
        $this->admin = ClaSite::getAdminSession();
        if ($this->admin)
            $this->show = true;
        if ($this->show) {
            $this->registerClientScript();
        }
        $this->adminLink = ClaSite::getHttpMethod() . Yii::app()->siteinfo['domain_default'] . '/' . ClaSite::getAdminEntry();
        //
        return parent::init();
    }

    public function run() {
        if ($this->show) {
            $html = $this->render($this->view, array(
                'key' => $this->key,
                'admin' => $this->admin,
                'adminLink' => $this->adminLink,
                    ), true);
            //
            echo '<script type="text/javascript">jQuery(document).ready(function(){jQuery("body").prepend(' . json_encode($html) . ')})</script>';
            //
        }
    }

    /**
     * Register CSS and scripts.
     */
    protected function registerClientScript() {
        if (!defined("MW_REGISTERSCRIPT")) {
            define("MW_REGISTERSCRIPT", true);
            $cs = Yii::app()->clientScript;
            $assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');
            /**
             * Nếu mà bật chế độ chỉnh sửa module thì đăng ký thêm ckeditor
             */
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/plugins/ckeditor/ckeditor.js');
            //
            $cs->registerScriptFile($assets . "/js/mwmain.js");
            $cs->registerCssFile($assets . "/css/mwmain.css");
        }
    }

}
