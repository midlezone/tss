<?php

/**
 * Description of config_menu
 *
 * @author minhbn
 */
class config_menu extends ConfigWidget {

    public $group_id = 0;
    public $directfrom = '';

    public function rules() {
        return array_merge(array(
            array('group_id', 'required'),
            array('group_id,directfrom', 'safe'),
                ), parent::rules());
    }

    public function loadDefaultConfig() {
        $this->group_id = 0;
    }

    public function buildConfigAttributes() {
        return array_merge(parent::buildConfigAttributes(), array(
            'config_data' => json_encode(array(
                'group_id' => $this->group_id,
                'directfrom' => $this->directfrom,
                'showallpage' => $this->showallpage,
                'widget_title' => $this->widget_title,
                'show_wiget_title' => $this->show_wiget_title,
            ))
        ));
    }

    public function getPrimaryKey() {
        return 'group_id';
    }

    public function getTableName() {
        return ClaTable::getTable('menu_group');
    }

}
