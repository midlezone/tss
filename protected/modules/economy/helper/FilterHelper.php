<?php

/**
 * 
 * Enter description here ...
 * @author tony
 *
 */
class FilterHelper extends BaseHelper {

    public $attributesFilter = null;
    public $attributesOptions = null;
    public $filterRequest = null;
    public $filtered = null;
    public static $priceVal = array();
    public static $priceWhere = array();

    public static function helper($className = __CLASS__) {
        return parent::helper($className);
    }

    public function getAttributesFilter($att_set_id) {
        if (is_null($this->attributesFilter)) {
            $atttibutes = ProductAttribute::model()->findAll(
                    'site_id=' . Yii::app()->siteinfo['site_id'] . ' AND is_filterable=1 AND (frontend_input=:frontend_input_select OR frontend_input=:frontend_input_multiselect OR frontend_input=:frontend_input_textnumber OR frontend_input=:frontend_input_price) AND attribute_set_id=:attribute_set_id order by sort_order asc limit 30', array(':frontend_input_select' => 'select', ':frontend_input_multiselect' => 'multiselect', ':frontend_input_textnumber' => 'textnumber', ':frontend_input_price' => 'price', ':attribute_set_id' => $att_set_id)
            );
            if (count($atttibutes)) {
                foreach ($atttibutes as $att) {
                    $this->attributesFilter[$att->id] = $att;
                }
            }
        }
        return $this->attributesFilter;
    }

    public function getAttributesOptions($att_set_id) {
        if (is_null($this->attributesOptions)) {
            $result = array();
            //$result['price'] = $this->getAttributePrice();
            $attributes = $this->getAttributesFilter($att_set_id);
            foreach ($attributes as $key => $attribute) {
                $result[$attribute->id]['att'] = $attribute;
                $result[$attribute->id]['unset_link'] = $this->createUrlUnset($attribute);
                $result[$attribute->id]['options'] = $this->getAttributeOption($attribute);
            }
            $this->attributesOptions = $result;
        }
        return $this->attributesOptions;
    }

    public function getAttributeOption($attribute) {
        $result = array();
        $attOptions = $attribute->getAttributeOption();
        $optionRequest = $this->getOptionRequest();
        if (!empty($attOptions)) {
            foreach ($attOptions as $option) {
                $checked = ((isset($optionRequest[$attribute['id']])) && in_array($option['index_key'], $optionRequest[$attribute['id']])) ? true : false;
                $link = $this->createUrlFilter($attribute, $option, $checked);
                $result[$option['id']]['name'] = $option['value'];
                $result[$option['id']]['text'] = $this->getAttributeOptionText($attribute, $option);
                $result[$option['id']]['checked'] = $checked;
                $result[$option['id']]['link'] = $link;
                $result[$option['id']]['index_key'] = $option['index_key'];
                // Sắp xếp Các attribute được chọn lên đầu
                if ($checked && $attribute['frontend_input'] != 'multiselect') {
                    $temp = array($option['id'] => $result[$option['id']]);
                    unset($result[$option['id']]);
                    $result = ClaArray::AddArrayToBegin($result, $temp);
                }
                //$result[$option['id']]['extend'] = $option['extend'];                                                                			
            }
        }
        return $result;
    }
    
    public function getAttributesManufacturers($cat_id) {
        $result = array();
        $optionRequest = $this->getOptionRequest();
        $manufacturers = Manufacturer::getManufacturersInCate($cat_id);
        if(isset($manufacturers) && count($manufacturers) > 0) {
            foreach($manufacturers as $key => $value) {
                $checked = (isset($optionRequest['mnf']) && in_array($value['id'], $optionRequest['mnf'])) ? true : false;
                $link = $this->createUrlFilterPrice('mnf', $value['id'], $checked);
                $result[$key]['name'] = CHtml::encode($value['name']);
                $result[$key]['checked'] = $checked;
                $result[$key]['link'] = $link;
                $result[$key]['extend'] = '';
                $result[$key]['option'] = $value;
            }
        }
        return $result;
    }

    public function getAttributePrice() {
        $result = array();
        $optionRequest = $this->getOptionRequest();
        if (!empty(FilterHelper::$priceVal)) {
            foreach (FilterHelper::$priceVal as $key => $value) {
                $checked = ((isset($optionRequest['price'])) && in_array($key, $optionRequest['price'])) ? true : false;
                $link = $this->createUrlFilterPrice('price', $key, $checked);
                $result[$key]['name'] = CHtml::encode($value) . 'đ';
                $result[$key]['checked'] = $checked;
                $result[$key]['link'] = $link;
                $result[$key]['extend'] = '';
            }
        }

        return $result;
    }

    public function getOptionRequest() {
        $result = array();
        parse_str(Yii::app()->request->getQueryString(), $paramsRequest);
        foreach ($paramsRequest as $k => $v) {
            if (substr($k, 0, 3) == 'fi_') {
                $result[substr($k, 3)] = explode(',', $v);
            }
        }
        return $result;
    }

    private function createUrlFilter($attribute, $option, $checked = false) {
        $url = '';
        $val = $option->index_key;
        $key = 'fi_' . $attribute->id;
        $curentOption = Yii::app()->request->getParam($key, '');
        if (!empty($curentOption)) {
            $curentOption = explode(',', $curentOption);
            if ($checked) {
                $kUnset = array_keys($curentOption, $option->index_key);
                if (isset($kUnset[0])) {
                    unset($curentOption[$kUnset[0]]);
                }
                if (!empty($curentOption)) {
                    $val = implode(',', $curentOption);
                } else {
                    $keyUnset = array($key);
                    return $this->createUrl(array(), $keyUnset);
                }
            } else {
                $curentOption[] = $val;
                $val = implode(',', $curentOption);
            }
        }
        $params[$key] = $val;
        $url = $this->createUrl($params);

        return $url;
    }

    private function createUrlFilterPrice($key, $valule, $checked = false) {
        $url = '';
        $val = $valule;
        $key = 'fi_' . $key;
        $curentOption = Yii::app()->request->getParam($key, '');
        if (!empty($curentOption)) {
            $curentOption = explode(',', $curentOption);
            if ($checked) {
                $kUnset = array_keys($curentOption, $valule);
                if (isset($kUnset[0])) {
                    unset($curentOption[$kUnset[0]]);
                }
                if (!empty($curentOption)) {
                    $val = implode(',', $curentOption);
                } else {
                    $keyUnset = array($key);
                    return $this->createUrl(array(), $keyUnset);
                }
            } else {
                //$curentOption[] = $val;
                //$val = implode(',',$curentOption);		    		
            }
        }
        $params[$key] = $val;
        $url = $this->createUrl($params);

        return $url;
    }

    /**
     * bo loc theo thuoc tinh nay
     * @param type $attribute
     * @return string
     */
    function createUrlUnset($attribute = null) {
        if (!isset($attribute) || !isset($attribute->id))
            return '';
        $key = 'fi_' . $attribute->id;
        return $this->createUrl(array(), array($key));
    }

    private function createUrl($params = array(), $unsetKey = array()) {
        $rounte = Yii::app()->getBaseUrl(true) . '/' . Yii::app()->request->getPathInfo();
        parse_str(Yii::app()->request->getQueryString(), $paramsNew);
        $paramsNew = array_merge($paramsNew, $params);
        if (!empty($unsetKey)) {
            foreach ($unsetKey as $v)
                unset($paramsNew[$v]);
        }
        if (key_exists(ClaSite::PAGE_VAR, $paramsNew))
            unset($paramsNew[ClaSite::PAGE_VAR]);
        $queryString = http_build_query($paramsNew);

        $url = $rounte . ((!empty($queryString)) ? '?' . $queryString : '');

        return $url;
    }

    public function buildFilterWhere($att_set_id) {
        $where = array();
        $params = $this->getFilterRequest();
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $itemW = $this->buildFilterItem($key, $value, $att_set_id);
                if ($itemW)
                    $where[] = $itemW;
            }
        }
        $where = (!empty($where)) ? implode(' and ', $where) : '';
        return $where;
    }

    public function getFilterRequest() {
        if (is_null($this->filterRequest)) {
            $result = array();
            parse_str(Yii::app()->request->getQueryString(), $paramsRequest);
            foreach ($paramsRequest as $k => $v) {
                if (substr($k, 0, 3) == 'fi_') {
                    $result[substr($k, 3)] = $v;
                }
            }
            $this->filterRequest = $result;
        }
        return $this->filterRequest;
    }

    public function buildFilterItem($key, $value, $att_set_id) {
        $where = '';
        if ($key && !empty($value)) {
            if ($key == 'mnf') {
                $where = ($key == 'mnf') && is_numeric($value) ? 'manufacturer_id=' . $value : '';
            }
            if ($key == 'pmin') {
                $where = ($key == 'pmin' && is_numeric($value)) ? 'price>' . $value : '';
            } elseif ($key == 'pmax') {
                $where = ($key == 'pmax' && is_numeric($value)) ? 'price<' . $value : '';
            } elseif (strpos($key, 'amin') !== false) {
                $key = str_replace('amin_', '', $key);
                $key = (int) $key;
                $attributes = $this->getAttributesFilter($att_set_id);
                $attribute = (isset($attributes[$key])) ? $attributes[$key] : null;
                if ($attribute && $attribute->field_product) {
                    $value = is_numeric($value) ? $value : 0;
                    if ($attribute->frontend_input == 'textnumber' || $attribute->frontend_input == 'price') {
                        $where = 'cus_field' . $attribute->field_product . '>' . $value;
                    }
                }
            } elseif (strpos($key, 'amax') !== false) {
                $key = str_replace('amax_', '', $key);
                $key = (int) $key;
                $attributes = $this->getAttributesFilter($att_set_id);
                $attribute = (isset($attributes[$key])) ? $attributes[$key] : null;
                if ($attribute && $attribute->field_product) {
                    $value = is_numeric($value) ? $value : 0;
                    if ($attribute->frontend_input == 'textnumber' || $attribute->frontend_input == 'price') {
                        $where = 'cus_field' . $attribute->field_product . '<' . $value;
                    }
                }
            } else {
                $key = (int) $key;
                $attributes = $this->getAttributesFilter($att_set_id);
                $attribute = (isset($attributes[$key])) ? $attributes[$key] : null;
                if ($attribute && $attribute->field_product) {
                    if (!empty($value)) {
                        $value = explode(',', $value);
                        //minhbn: e them tam multiselect vào de test
                        if ($attribute->frontend_input == 'select' || $attribute->frontend_input == 'multiselect') {
                            $compare = ($attribute->frontend_input == 'multiselect') ? '&' : '='; // & so sanh bit
                            if (count($value) > 1) {
                                $temp = array();
                                foreach ($value as $v1) {
                                    if ((int) $v1) {
                                        $temp[] = 'cus_field' . $attribute->field_product . $compare . (int) $v1;
                                    }
                                }
                                if (!empty($temp))
                                    $where = '(' . implode(' OR ', $temp) . ')';
                            } else {
                                $where = 'cus_field' . $attribute->field_product . $compare . (int) $value[0];
                            }
                        }
                    }
                }
            }
        }
        return $where;
    }

    public function buildFilterOrder() {
        $order = array();
        $params = $this->getFilterRequest();
        if (isset($params['sort'])) {
            if (is_numeric($params['sort'])) {
                $params['sort'] = (int) $params['sort'];
                if ($params['sort'] > 0) {
                    if (in_array($params['sort'], ProductAttribute::$_dataFieldDefine)) {
                        $order[] = 'cus_field' . $params['sort'] . ' ASC';
                    }
                } else {
                    $params['sort'] = abs($params['sort']);
                    if (in_array($params['sort'], ProductAttribute::$_dataFieldDefine)) {
                        $order[] = 'cus_field' . $params['sort'] . ' DESC';
                    }
                }
            } elseif (is_string($params['sort'])) {
                switch ($params['sort']) {
                    case 'price':
                        $order[] = 'price ASC';
                        break;
                    case '-price':
                        $order[] = 'price DESC';
                        break;
                }
            }
        }
        $order = (!empty($order)) ? implode(',', $order) : '';
        return $order;
    }

    /**
     * 
     * @param type $attribute
     */
    public function getAttributeOptionText($attribute = array(), $attributeOption = array()) {
        $text = isset($attributeOption['value']) ? $attributeOption['value'] : '';
        if (isset($attributeOption['ext']) && $attributeOption['ext']) {
            switch ($attribute['type_option']) {
                case ProductAttribute::TYPE_OPTION_IMAGE: $text = '<img class="attr-image" src="' . $attributeOption['ext'] . '" title="' . $text . '" />';
                    break;
                case ProductAttribute::TYPE_OPTION_COLOR: $text = '<span class="attr-color" style="background-color:' . $attributeOption['ext'] . ';" title="' . $text . '"></span>';
                    break;
            }
        }

        return $text;
    }

}
