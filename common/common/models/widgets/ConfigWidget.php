<?php

/**
 * Description of ConfigWidget
 *
 * @author minhbn
 */
class ConfigWidget extends FormModel {

    public $config_name = ''; // Tên của loại config như banner, menu...
    public $page_widget_id = 0; // page widget id
    public $widget_title = ''; // widget title để hiển thị trên widget header 
    public $showallpage = Widgets::WIDGET_SHOWALL_FALSE; // show all page?
    public $show_wiget_title = self::STAtUS_FALSE; // có hiển thị widget title không?
    public $config_data = array();
    public $isnew = true;
    public $table = '';

    public function __construct($scenario = '', $options = array()) {
        if (isset($options['page_widget_id']))
            $this->page_widget_id = $options['page_widget_id'];
        $this->table = ClaTable::getTable('pagewidgetconfig');
        $this->loadDefaultConfig();
        $this->loadConfig();
        return parent::__construct($scenario);
    }

    public function rules() {
        return array(
            array('widget_title', 'required'),
            array('showallpage, page_widget_id,widget_title,show_wiget_title', 'safe'),
        );
    }

    // hàm abstract
    public function loadDefaultConfig() {
        
    }

    public function loadConfig() {
        $this->attributes = $this->loadConfigInDB();
    }

    /**
     * Load những cấu hình lưu trong db
     * @param type $page_widget_id
     * @return boolean
     */
    public function loadConfigInDB($page_widget_id = 0) {
        $page_widget_id = (int) $page_widget_id;
        if (!$page_widget_id)
            $page_widget_id = $this->page_widget_id;
        //
        if (!$page_widget_id)
            return array();
        //Mỗi một widget có 1 config
        $data = Yii::app()->db->createCommand()->select()
                ->from($this->table)
                ->where('page_widget_id=:page_widget_id', array(':page_widget_id' => $page_widget_id))
                ->queryRow();
        if (!$data) {
            return $data;
        }
        $this->isnew = false;
        $config_data = json_decode($data['config_data'], true);
        return $config_data;
    }

    public function save($runValidation = true, $attributes = null) {
        if (!$runValidation || $this->validate($attributes))
            return $this->getIsNewRecord() ? $this->insert($attributes) : $this->update($attributes);
        else
            return false;
    }

    public function insert($attributes = null) {
        if ($this->beforeSave()) {
            $builder = $this->getCommandBuilder();
            if (!$attributes)
                $attributes = $this->buildConfigAttributes();
            $command = $builder->createInsertCommand($this->table, $attributes);
            if ($command->execute()) {
                $this->page_widget_id = $builder->getLastInsertID($this->table);
                $this->afterSave();
                $this->isnew = false;
                return true;
            }
        }
        return false;
    }

    public function update($attributes = null) {
        if ($this->getIsNewRecord())
            throw new CDbException(Yii::t('yii', 'The active record cannot be updated because it is new.'));
        if ($this->beforeSave()) {
            $builder = $this->getCommandBuilder();
            if (!$attributes)
                $attributes = $this->buildConfigAttributes();
            $command = $builder->createUpdateCommand($this->table, $attributes, new CDbCriteria(array(
                "condition" => "page_widget_id = :page_widget_id",
                "params" => array(
                    "page_widget_id" => $this->page_widget_id,
                ))
                    )
            );
            if ($command->execute()) {
                $this->afterSave();
                return true;
            }
        } else
            return false;
    }

    function buildConfigAttributes() {
        return array_merge(array('site_id' => Yii::app()->controller->site_id, 'page_widget_id' => $this->page_widget_id), $this->getIsNewRecord() ? array('created_time' => time(), 'modified_time' => time(),) : array('modified_time' => time()));
    }

    function getIsNewRecord() {
        return $this->isnew;
    }

    public function getCommandBuilder() {
        return $this->getDbConnection()->getSchema()->getCommandBuilder();
    }

    //
    public function getDbConnection() {
        $db = Yii::app()->getDb();
        return $db;
    }

    /**
     * trả về khóa chính của đối tượng
     * @return string
     */
    public function getPrimaryKey() {
        return '';
    }

    /**
     * trả về tên table mà đói tượng config trỏ đến
     * @return string
     */
    public function getTableName() {
        return '';
    }

    //
    public function beforeSave() {
        return true;
    }

    //
    public function afterSave() {
        
    }

}
