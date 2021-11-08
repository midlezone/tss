<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class BPublicController extends Controller {

    /**
     * @minhbn
     * before action
     */
    public function beforeAction($action) {
        /* check user locked or not */
        return parent::beforeAction($action);
    }

}
