<?php

/**
 * This is the model class for table "form_sessions".
 *
 * The followings are the available columns in table 'form_sessions':
 * @property integer $form_session_id
 * @property integer $form_id
 * @property integer $created_time
 */
class FormSessions extends ActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('form_sessions');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('form_id, created_time', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('form_session_id, form_id, created_time', 'safe', 'on' => 'search'),
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
            'form_session_id' => 'Form Session',
            'form_id' => 'Form',
            'created_time' => 'Created Time',
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

        $criteria->compare('form_session_id', $this->form_session_id);
        $criteria->compare('form_id', $this->form_id);
        $criteria->compare('created_time', $this->created_time);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return FormSessions the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * get data of field
     */
    public static function getFieldDataInForm($options = array()) {
        //return array('abc' => array('form_id' => 1));
        $form_id = (isset($options['form_id'])) ? $options['form_id'] : 0;
        $fields = (isset($options['fields'])) ? $options['fields'] : FormFields::getFieldsInForm($form_id);
        $limit = (isset($options['limit'])) ? $options['limit'] : Yii::app()->params['defaultPageSize'];
        $page = (isset($options['page'])) ? $options['page'] : 1;
        $offset = $limit * ($page - 1);
        $user_id = (isset($options['user_id'])) ? $options['user_id'] : 0;
        /**
         * get session
         */
        $session = Yii::app()->db->createCommand()->select('form_session_id')
                ->from(ClaTable::getTable('formsession'))
                ->where('form_id=:form_id', array(':form_id' => $form_id))
                ->offset($offset)
                ->limit($limit)
                ->order('created_time')
                ->queryColumn();
        //
        $result_tem = array();
        $result = array();
        if ($session) {
            /**
             * get value
             */
            $svalue = implode(',', $session);
            $cdt = 'form_session_id IN (' . $svalue . ')'; // condition
            if ($user_id) {
                $cdt .= ' AND user_id=' . $user_id;
            }
            $data = Yii::app()->db->createCommand()->select('*')
                    ->from(ClaTable::getTable('formfieldvalue'))
                    ->where($cdt)
                    ->order('created_time DESC')
                    ->queryAll();
            //
            foreach ($data as $field) {
                $result_tem[$field['form_session_id']][$field['field_id']] = array_merge($fields[$field['field_id']], array('field_data' => $field['field_data']));
            }
            // Khởi tạo dataprovider cho gridview
            $i = 0;
            foreach ($result_tem as $sess => $re) {
                $result[$i] = $re;
                $result[$i]['form_session_id'] = $sess;
                $result[$i]['form_id'] = $form_id;
                $i++;
            }
        }
        return $result;
    }

    /**
     * count
     * @param type $form_id
     * @return type
     */
    public static function countFieldDataInForm($form_id = null) {
        $form_id = (int) $form_id;
        $count = 0;
        if ($form_id) {
            $count = Yii::app()->db->createCommand()->select('count(*)')
                    ->from(ClaTable::getTable('formsession'))
                    ->where('form_id=:form_id', array(':form_id' => $form_id))
                    ->queryScalar();
        }
        return $count;
    }

    public static function getFieldDataInSession($options = array()) {
        $form_id = (isset($options['form_id'])) ? $options['form_id'] : 0;
        $fields = (isset($options['fields'])) ? $options['fields'] : FormFields::getFieldsInForm($form_id);
        $session = (isset($options['session'])) ? $options['session'] : 0;
        $result = array();
        if ($session) {
            /**
             * get value
             */
            $data = Yii::app()->db->createCommand()->select('*')
                    ->from(ClaTable::getTable('formfieldvalue'))
                    ->where('form_session_id=:session', array(':session' => $session))
                    ->queryAll();
            //
            foreach ($data as $field) {
                $result_tem[$field['field_id']] = array_merge($fields[$field['field_id']], array('field_data' => $field['field_data']));
            }
            //
            foreach ($result_tem as $field_id => $re) {
                $result[$field_id] = $re;
                $result[$field_id]['form_session_id'] = $session;
                $result[$field_id]['form_id'] = $form_id;
            }
        }
        return $result;
    }

    public function afterDelete() {
        FormFieldValues::model()->deleteAllByAttributes(array('form_session_id' => $this->form_session_id));
        parent::afterDelete();
    }

}
