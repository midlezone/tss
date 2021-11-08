<?php

/**
 * Description of AutoForm
 *
 * @author minhbn
 */
class AutoForm extends FormModel {

    public $data = array(); // Save field data that is not initialization
    public $fields = array(); // fields

    /**
     * 
     * @param type $name
     * @param type $value
     */

    public function __set($name, $value) {
        //
        $this->$name = $value;
        $this->data[$name] = $value;
        //
        $class = get_class($this);
        if (property_exists($class, $name)) {
            parent::__set($name, $value);
        }
    }

    /**
     * 
     * @param type $name
     * @return type
     */
    public function __get($name) {
        $class = get_class($this);
        if (!property_exists($class, $name)) {
            if (isset($this->$name))
                return $this->$name;
            else if (isset($this->data[$name]))
                return $this->data[$name];
        } else
            return parent::__get($name);
    }

    /**
     * Load fields fro form
     * @param type $fields
     */
    public function loadFields($fields = array()) {
        foreach ($fields as $field) {
            if ($field['field_key'])
                $this->$field['field_key'] = NULL;
        }
        $this->fields = $fields;
    }

    public function validateFields() {
        $hasError = false;
        $NotInputFields = FormFields::getNotInputFields();

        //
        foreach ($this->fields as $field) {
            if (!in_array($field['field_type'], $NotInputFields)) {
                $value = $this->$field['field_key'];
                if (is_string($value))
                    $value = trim($value);
                if ($this->getError($field['field_key']))
                    continue;
                if ($field['field_required']) {
                    if (!$value) {
                        $this->addError($field['field_key'], Yii::t('errors', 'cannot_blank', array('{name}' => Yii::t('common',$field['field_label']))));
                        $hasError = true;
                    }
                }
                /**
                 * validate special fields
                 */
                switch ($field['field_type']) {
                    case FormFields::TYPE_EMAIL: {
                            if ($value) {
                                $emailValidate = new CEmailValidator;
                                if (!$emailValidate->validateValue($this->$field['field_key'])) {
                                    $this->addError($field['field_key'], Yii::t('errors', 'email_invalid', array('{name}' => Yii::t('common',$field['field_label']))));
                                    $hasError = true;
                                }
                            }
                        }break;
                }
            }
        }
        //
        return !$hasError;
    }

//
}
