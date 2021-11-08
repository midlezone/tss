<?php

/**
 * @author Jason <pmhai90@gmail.com>
 *
 * The followings are the available columns in table 'sites':
 * @property integer $id
 * @property varchar $domain
 * @property double $price
 * @property double $old_price
 * @property int $created_time
 * @property int $updated_time
 */
class SiteDomainPrices extends ActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('site_domain_prices');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, domain, price, old_price, created_time, updated_time', 'safe'),
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
            'domain' => Yii::t('setting', 'domain'),
            'price' => Yii::t('setting', 'price'),
            'old_price' => Yii::t('setting', 'old_price'),
            'created_time' => Yii::t('setting', 'created_time'),
            'updated_time' => Yii::t('setting', 'updated_time'),
        );
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->created_time = time();
        } else
            $this->updated_time = time();
        //
        return parent::beforeSave();
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('domain', $this->domain);
        $criteria->compare('price', $this->price);
        $criteria->compare('old_price', $this->old_price);

        $criteria->order = 'created_time DESC';

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
     * @return SiteSettings the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function findByDomain($domain='')
    {
        if (!empty($domain)) {
            $item=self::model()->findByAttributes(['domain'=>$domain]);
            return isset($item)?$item:'';
        }
        return '';
    }
}
