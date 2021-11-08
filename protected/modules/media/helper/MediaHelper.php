<?php

/**
 * 
 * Enter description here ...
 * @author minhbn
 *
 */
class MediaHelper extends BaseHelper {

    public static function helper($className = __CLASS__) {
        return parent::helper($className);
    }
    /**
     * 
     * @return int
     */
    function getCurrentPage() {
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        if (!$page)
            $page = 1;
        return $page;
    }

    function getPageSize() {
        $pagesize = Yii::app()->request->getParam(ClaSite::PAGE_SIZE_VAR);
        if (!$pagesize)
            $pagesize = (isset(Yii::app()->siteinfo['pagesize'])) ? Yii::app()->siteinfo['pagesize'] : Yii::app()->params['defaultPageSize'];
        return $pagesize;
    }

}
