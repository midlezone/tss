<?php

class IntroduceController extends PublicController {

    public $layout = '//layouts/introduce';

    public function actionIndex() {
        $this->render('index');
    }

}
