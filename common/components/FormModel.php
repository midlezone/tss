<?php

class FormModel extends CFormModel {

    const STATUS_TRUE = 1;
    const STAtUS_FALSE = 0;

    /**
     * @author  minhbn <mincoltech@gmail.com>
     * 
     * json_encode Errors
     */
    function getJsonErrors() {
        $listerrors = array();
        foreach ($this->getErrors() as $attribute => $mess)
            $listerrors[CHtml::activeId($this, $attribute)] = $mess;
        $errors = function_exists('json_encode') ? json_encode($listerrors) : CJSON::encode($listerrors);
        return $errors;
    }

}
