<?php

/**
 * This is the model class for table "users_admin".
 *
 * The followings are the available columns in table 'users_admin':
 * @property integer $user_id
 * @property string $user_name
 * @property string $email
 * @property string $password
 * @property string $salt
 * @property integer $sex
 * @property integer $birthday
 * @property string $addresss
 * @property integer $status
 * @property integer $created_time
 */
class UsersAdmin extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, email, password', 'required'),
			array('user_id, sex, birthday, status, created_time', 'numerical', 'integerOnly'=>true),
			array('user_name, email, password, salt', 'length', 'max'=>100),
			array('addresss', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, user_name, email, password, salt, sex, birthday, addresss, status, created_time, site_id', 'safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'user_name' => 'User Name',
			'email' => 'Email',
			'password' => 'Password',
			'salt' => 'Salt',
			'sex' => 'Sex',
			'birthday' => 'Birthday',
			'addresss' => 'Addresss',
			'status' => 'Status',
			'created_time' => 'Created Date',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('birthday',$this->birthday);
		$criteria->compare('addresss',$this->addresss,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_time',$this->created_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersAdmin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        /**
         * @return type
         */
        function beforeSave() {
           if($this->isNewRecord){
               $this->created_time = time();
           }
            return parent::beforeSave();
        }
}
