<?php

/**
 * This is the model class for table "real_estate_project".
 *
 * The followings are the available columns in table 'real_estate_project':
 * @property string $id
 * @property integer $site_id
 * @property string $name
 * @property string $alias
 * @property integer $created_time
 * @property integer $modified_time
 * @property integer $status
 * @property string $image_path
 * @property string $image_name
 */
class RealEstateProject extends ActiveRecord {
    
    public $avatar = '';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return ClaTable::getTable('real_estate_project');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('site_id, created_time, modified_time, status', 'numerical', 'integerOnly' => true),
            array('name, alias, image_path', 'length', 'max' => 255),
            array('image_name', 'length', 'max' => 200),
            array('province_id, district_id', 'length', 'max' => 4),
            array('province_name, district_name', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, site_id, name, alias, created_time, modified_time, status, image_path, image_name, user_id, avatar, province_id, district_id, address, province_name, district_name', 'safe'),
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
            'site_id' => 'Site',
            'name' => Yii::t('realestate', 'project'),
            'alias' => 'Alias',
            'created_time' => 'Created Time',
            'modified_time' => 'Modified Time',
            'status' => Yii::t('common', 'status'),
            'image_path' => 'Image Path',
            'image_name' => 'Image Name',
            'address' => Yii::t('common', 'address'),
            'province_id' => Yii::t('common', 'province'),
            'district_id' => Yii::t('common', 'district'),
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

        $this->site_id = Yii::app()->controller->site_id;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('site_id', $this->site_id);
        $criteria->order = 'created_time DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    public function searchMyProject() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $this->site_id = Yii::app()->controller->site_id;
        $criteria->compare('id', $this->id, true);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('user_id', Yii::app()->user->id);
        $criteria->order = 'created_time DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return RealEstateProject the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function beforeSave() {
        $this->site_id = Yii::app()->controller->site_id;
        if ($this->isNewRecord) {
            $this->created_time = time();
            $this->modified_time = $this->created_time;
            $this->alias = HtmlFormat::parseToAlias($this->name);
        } else {
            $this->modified_time = time();
            if (!trim($this->alias) && $this->name) {
                $this->alias = HtmlFormat::parseToAlias($this->name);
            }
        }
        return parent::beforeSave();
    }
    
    public static function getOptionProject() {
        $options = array();
        $options[0] = Yii::t('realestate', 'selectproject');
        $data = Yii::app()->db->createCommand()->select('id, name')
                ->from(ClaTable::getTable('real_estate_project'))
                ->where('site_id=:site_id AND status=:status', array(':site_id' => Yii::app()->controller->site_id, ':status' => ActiveRecord::STATUS_ACTIVED))
                ->queryAll();
        if(count($data)) {
            foreach($data as $item) {
                $options[$item['id']] = $item['name'];
            }
        }
        return $options;
    }

}
