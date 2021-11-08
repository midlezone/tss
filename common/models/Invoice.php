<?php

/**
 * This is the model class for table "users".
 *
 */
class Invoice extends ActiveRecord {
   
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'invoice';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('id, client_id, invoice_total, invoice_discount, invoice_price, location_id, status, note,date_created,used_discount,prepaid_id,voucher,created_by,updated_by,deleted_by,created_at,created_at,deleted_at,merchandise_id,employee_id', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'id',
            'client_id' => 'client_id',
            'invoice_total' => 'invoice_total',
            'invoice_discount' => 'invoice_total',
            'invoice_price' => 'invoice_price',
            'location_id' => 'location_id',
            'status' => 'status',
            'note' => 'note',
            'date_created' => 'date_created',
            'used_discount' => 'used_discount',
            'prepaid_id' => 'prepaid_id',
            'voucher' => 'voucher',
            'created_by' => 'created_by',
            'updated_by' => 'updated_by',
            'deleted_by' => 'deleted_by',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
            'deleted_at' => 'deleted_at',
            'merchandise_id' => 'merchandise_id',
            'employee_id' => 'employee_id',
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
