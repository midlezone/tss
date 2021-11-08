<?php

/**
 * This is the model class for table "product_attribute".
 *
 * The followings are the available columns in table 'product_attribute':
 * @property string $id
 * @property string $name
 * @property string $code
 * @property integer $attribute_set_id
 * @property string $type
 * @property string $frontend_input
 * @property string $frontend_label
 * @property string $default_value
 * @property integer $is_configurable
 * @property integer $is_filterable
 * @property integer $field_product
 * @property integer $is_frontend
 * @property integer $is_system
 * @property integer $site_id
 */
class ProductAttribute extends ActiveRecord {

    const TYPE_OPTION_NONE = 0;
    const TYPE_OPTION_IMAGE = 1;
    const TYPE_OPTION_COLOR = 2;

    public static $_dataType = array('static' => 'static', 'datetime' => 'datetime', 'decimal' => 'decimal', 'int' => 'int', 'text' => 'text');
    public static $_dataTypeInput = array('text' => 'Text Field', 'textnumber' => 'Text Field (Number)', 'textarea' => 'Text Area', 'date' => 'Ngày', 'select' => 'Lựa chọn một giá trị', 'multiselect' => 'Lựa chọn nhiều giá trị',
        'price' => 'Giá', 'price_gold' => 'Giá Màu Vàng','none' => 'None');
    public static $_dataTypeOption = array(self::TYPE_OPTION_NONE => 'None', self::TYPE_OPTION_IMAGE => 'Image', self::TYPE_OPTION_COLOR => 'Color');
    public static $_dataFieldDefine = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38);
    public static $_dataConfiguableDefine = array(1, 2);
    public $attributeOption;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('product_attribute');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, site_id, type, attribute_set_id', 'required'),
            array('attribute_set_id, is_configurable, is_filterable, field_product, is_frontend, is_system, sort_order, site_id', 'numerical', 'integerOnly' => true),
            array('name, code', 'length', 'max' => 128),
            array('type', 'length', 'max' => 20),
            array('frontend_input', 'length', 'max' => 20),
            array('frontend_label, default_value', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, name, code, attribute_set_id, type, frontend_input, frontend_label, default_value, is_configurable, is_filterable, field_product, is_frontend, is_system, sort_order, field_configurable, type_option, site_id', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => Yii::t('attribute', 'attribute_name'),
            'code' => Yii::t('attribute', 'attribute_code'),
            'attribute_set_id' => Yii::t('attribute', 'attribute_att_set'),
            'type' => Yii::t('attribute', 'attribute_type'),
            'frontend_input' => Yii::t('attribute', 'attribute_frontend_input'),
            'frontend_label' => Yii::t('attribute', 'attribute_frontend_label'),
            'default_value' => Yii::t('attribute', 'attribute_default_value'),
            'is_configurable' => Yii::t('attribute', 'attribute_is_configurable'),
            'is_filterable' => Yii::t('attribute', 'attribute_is_filterable'),
            'field_product' => Yii::t('attribute', 'attribute_field_product'),
            'is_frontend' => Yii::t('attribute', 'attribute_is_frontend'),
            'is_system' => Yii::t('attribute', 'attribute_is_system'),
            'sort_order' => Yii::t('attribute', 'attribute_sort_order'),
            'type_option' => Yii::t('attribute', 'attribute_type_option'),
            'site_id' => 'Site',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('attribute_set_id', $this->attribute_set_id);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('frontend_input', $this->frontend_input, true);
        $criteria->compare('frontend_label', $this->frontend_label, true);
        $criteria->compare('default_value', $this->default_value, true);
        $criteria->compare('is_configurable', $this->is_configurable);
        $criteria->compare('is_filterable', $this->is_filterable);
        $criteria->compare('field_product', $this->field_product);
        $criteria->compare('is_frontend', $this->is_frontend);
        $criteria->compare('is_system', $this->is_system);
        $criteria->compare('site_id', $this->site_id);

        $criteria->order = 'id DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState(Yii::app()->params['pageSizeName'], Yii::app()->params['defaultPageSize']),
                'pageVar' => ClaSite::PAGE_VAR,
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductAttribute the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getAttributeOption() {
        if (is_null($this->attributeOption)) {
            $this->attributeOption = ProductAttributeOption::model()->findAll('site_id=' . Yii::app()->siteinfo['site_id'] . ' AND attribute_id = :attribute_id', array(':attribute_id' => $this->id));
        }
        return $this->attributeOption;
    }

    public function getMaxSort() {
        return Yii::app()->db->createCommand()
                        ->select('MAX(sort_order)')
                        ->from(ClaTable::getTable('product_attribute'))
                        ->where('site_id=' . Yii::app()->siteinfo['site_id'])
                        ->queryScalar();
    }

    public function generateFieldProduct($attribute_set_id, $frontend_input) {
        if (!$attribute_set_id) {
            return 0;
        }
        $fieldDefine = self::$_dataFieldDefine;
        $fieldExist = Yii::app()->db->createCommand()
                ->select('field_product')
                ->from(ClaTable::getTable('product_attribute'))
                ->where('site_id=' . Yii::app()->siteinfo['site_id'] . ' AND attribute_set_id=:attribute_set_id', array(':attribute_set_id' => $attribute_set_id))
                ->queryColumn();
        $fieldList = array_diff($fieldDefine, $fieldExist);
        if (!empty($fieldList)) {
            if ($frontend_input == 'multiselect') {
                return array_pop($fieldList);
            } elseif ($frontend_input == 'textnumber' || $frontend_input == 'price' || $frontend_input == 'price_gold' ) {
                $arr = array(26, 25, 24, 23, 22, 21, 20, 19);
                $arr = array_intersect($arr, $fieldList);
                if (count($arr) > 0) {
                    return array_shift($arr);
                } else {
                    return array_shift($fieldList);
                }
            } else {
                return array_shift($fieldList);
            }
        }
        return 0;
    }

    public function generateFieldConfigurable($attribute_set_id, $is_configurable, $frontend_input) {
        if (!$attribute_set_id || !$is_configurable || ($frontend_input != 'multiselect' && $frontend_input != 'select')) {
            return 0;
        }
        $fieldDefine = self::$_dataConfiguableDefine;
        $fieldExist = Yii::app()->db->createCommand()
                ->select('field_configurable')
                ->from(ClaTable::getTable('product_attribute'))
                ->where('site_id=' . Yii::app()->siteinfo['site_id'] . ' AND attribute_set_id=:attribute_set_id', array(':attribute_set_id' => $attribute_set_id))
                ->queryColumn();
        $fieldList = array_diff($fieldDefine, $fieldExist);
        if (!empty($fieldList)) {
            return array_shift($fieldList);
        }
        return 0;
    }

}
