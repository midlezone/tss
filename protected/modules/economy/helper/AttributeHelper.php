<?php

/**
 * 
 * Enter description here ...
 * @author tony
 *
 */
class AttributeHelper extends BaseHelper {

    public static function helper($className = __CLASS__) {
        return parent::helper($className);
    }

    public function getDynamicProduct($pro, $attributesShow) {
        $results = array();
        $dynamic = ($pro->product_info->dynamic_field) ? json_decode($pro->product_info->dynamic_field) : array();
        if (!empty($dynamic)) {
            foreach ($dynamic as $objAtt) {
                if (isset($attributesShow[$objAtt->id])) {
                    $results[$objAtt->id]['attribute_id'] = $attributesShow[$objAtt->id]['id'];
                    $results[$objAtt->id]['name'] = $attributesShow[$objAtt->id]['name'];
                    $results[$objAtt->id]['value'] = $this->getValueAttribute($attributesShow[$objAtt->id], $objAtt->index_key, $objAtt->value);
                }
            }
        }
        return $results;
    }

    public function getValueAttribute($attribute, $index_key, $value = "") {
        if ($attribute['frontend_input'] == 'select') {
            return ProductAttributeOption::model()->getValueByKey($index_key);
        } elseif ($attribute['frontend_input'] == 'multiselect') {
            if (is_array($index_key) && !empty($index_key)) {
                $val = array();
                foreach ($index_key as $ikey) {
                    $v = ProductAttributeOption::model()->getValueByKey($ikey, $attribute['id']);
                    if ($v)
                        $val[] = $v;
                }
                return empty($val) ? '' : $val;
            }else {
                return $value;
            }
        } else {
            return $value;
        }
    }

    /**
     * return attributes is set is_configurable equal 1 of attribute set
     */
    function getConfigurableAttributes($att_set_id = 0) {
        $atttibutes = array();
        $_atttibutes = ProductAttribute::model()->findAll(
                'site_id=' . Yii::app()->controller->site_id . ' AND is_configurable=1 AND attribute_set_id=:attribute_set_id order by sort_order asc limit 2', array(':attribute_set_id' => $att_set_id)
        );
        if (count($_atttibutes)) {
            foreach ($_atttibutes as $att) {
                $atttibutes[$att->id] = $att->attributes;
                $atttibutes[$att->id]['options'] = FilterHelper::helper()->getAttributeOption($att);
            }
        }
        //
        return $atttibutes;
    }

    /**
     * get configurable attribute values
     * @param type $attribute
     */
    function geProducttConfigurableValues($product = array(), $isArray = true) {
        $configs = array();
        if (!$isArray) {
            $proConfigs = ProductConfigurableValue::model()->findAll(
                    'site_id=' . Yii::app()->controller->site_id . ' AND product_id=:product_id  limit 30', array(':product_id' => $product['id'])
            );
        } else {
            $proConfigs = Yii::app()->db->createCommand()->select()->from(ProductConfigurableValue::model()->tableName())
                    ->where('site_id=' . Yii::app()->controller->site_id . ' AND product_id=:product_id', array(':product_id' => $product['id']))
                    ->limit(30)
                    ->queryAll();
        }
        if (count($proConfigs)) {
            foreach ($proConfigs as $conf)
                $configs[$conf['id']] = $conf;
        }
        return $configs;
    }

    //
    /**
     * Lấy ra các thuộc tính của product được set là configurable và các giá trị của nó
     * @param type $att_set_id
     * @param type $product
     */
    function getConfiguableFilter($att_set_id = 0, $product = array()) {
        // các attributes dc set là configurable của
        $attributeConfigurables = AttributeHelper::helper()->getConfigurableAttributes($att_set_id);
        //Các giá trị configurable của product
        $productConfigurableValues = AttributeHelper::helper()->geProducttConfigurableValues($product);
        //
        foreach ($attributeConfigurables as $attribute_id => $attribute) {
            $configurableField = $attribute['field_configurable'];
            if (!$configurableField)
                continue;
            $configurableField = 'attribute' . $configurableField . "_value";
            foreach ($productConfigurableValues as $config) {
                if (isset($config[$configurableField]) && (int) $config[$configurableField] && !isset($attributeConfigurables[$attribute_id]['configuable'][$config[$configurableField]])) {
                    $attributeConfigurables[$attribute_id]['configuable'][$config[$configurableField]]['value'] = $config[$configurableField];
                    $attributeConfigurables[$attribute_id]['configuable'][$config[$configurableField]]['name'] = $this->getOptionNameByIndexKey($config[$configurableField], $attributeConfigurables[$attribute_id]['options']);
                    $attributeConfigurables[$attribute_id]['configuable'][$config[$configurableField]]['text'] = $this->getOptionTextByIndexKey($config[$configurableField], $attributeConfigurables[$attribute_id]['options']);
                }
            }
        }
        //
        return $attributeConfigurables;
    }

    //
    function getOptionNameByIndexKey($index_key_value = '', $attributeOptions = array()) {
        foreach ($attributeOptions as $option)
            if ($option['index_key'] == $index_key_value)
                return isset($option['name']) ? $option['name'] : $option['value'];
        return '';
    }
    //
    function getOptionTextByIndexKey($index_key_value = '', $attributeOptions = array()) {
        foreach ($attributeOptions as $option)
            if ($option['index_key'] == $index_key_value)
                return isset($option['text']) ? $option['text'] : $option['text'];
        return '';
    }

    /**
     * 
     * @param type $attribute
     * @param type $index_key
     */
    function getSingleAttributeOption($attribute_id = 0, $index_key = '') {
        return ProductAttributeOption::model()->find('site_id=' . Yii::app()->siteinfo['site_id'] . ' AND attribute_id = :attribute_id AND index_key = :index_key', array(':attribute_id' => $attribute_id, ':index_key' => $index_key));
    }

}
