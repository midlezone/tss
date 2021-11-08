<?php

/*
 * @author minhbn <minhcoltech@gmail.com>
 * @date 28-03-2014
 * Class for create and show menu
 *
 */

class ClaAdminMenu {

    //
    const MENU_ROOT = 0;
    const MENU_BEGIN_STEP = 0;

    //
    public $items = array(); // list category
    public $relations = array(); // list menu relations array('parent'=>'list children');
    protected $dbname = '';
    public $type = '';   // Type of category such as: news, video,...
    public $route = '';
    public $application = 'backoffice';
    protected $showAll = false; // Hiển thị tất cả các trạng thái

    /**
     * construct
     */

    function __construct($options = array()) {
        if (isset($options['showAll']))
            $this->showAll = $options['showAll'];
        if (isset($options['create']) && $options['create'] === true) {
            $this->generateMenu();
        }
    }

    //Khởi tạo data chứa các category
    function generateMenu() {
        $dbname = $this->getMenuTable();
        //
        $data = array('items' => array(), 'relations' => array());
        //
        $site_id = ClaSite::getSiteIdFromDomain();
        //
        $dataread = Yii::app()->db->createCommand("SELECT menu_id,menu_title,parent_id,alias,menu_linkto,menu_link,menu_basepath,menu_pathparams,menu_target,menu_order,iconclass,status FROM $dbname WHERE site_id=$site_id " . (($this->showAll) ? '' : 'AND status=' . ActiveRecord::STATUS_ACTIVED . ' ') . " ORDER BY menu_order")
                ->queryAll();
        foreach ($dataread as $menu_item) {
            $data['items'][$menu_item['menu_id']] = $menu_item;
            if (($menu_item['menu_basepath'] && $menu_item['menu_pathparams']) && $menu_item['menu_linkto'] == Menus::LINKTO_INNER)
                $data['items'][$menu_item['menu_id']]['menu_link'] = Yii::app()->createUrl($menu_item['menu_basepath'], json_decode($menu_item['menu_pathparams'], true));
            elseif ($menu_item['menu_linkto'] == Menus::LINKTO_INNER)
                $data['items'][$menu_item['menu_id']]['menu_link'] = '#';
            elseif ($menu_item['menu_link'])
                $data['items'][$menu_item['menu_id']]['menu_link'] = $menu_item['menu_link'];
            else
                $data['items'][$menu_item['menu_id']]['menu_link'] = '#';
            //
            $data['relations'][$menu_item['parent_id']][] = $menu_item['menu_id'];
        }
        $this->items = $data['items'];
        $this->relations = $data['relations'];
    }

    /**
     * get category table in db
     */
    public function getMenuTable() {
        if ($this->dbname == '') {
            $this->dbname = Yii::app()->params['tables']['menu_admin'];
        }
        return $this->dbname;
    }

    /**
     * Set table name
     * @param type $table
     */
    public function setMenuTable($table = '') {
        $this->dbname = $table;
    }

    /**
     * Get list categories item
     */
    public function getListItems() {
        return $this->items;
    }

    /**
     * Get list categories relations
     */
    public function getRelations() {
        return $this->relations;
    }

// Đệ quy tạo ra một menu
    public function createMenu($parent_id, &$options = array()) {
        $return = array();
        if (isset($this->relations[$parent_id])) {
            $currenturl = Yii::app()->request->getRequestUri();
            $fullurl = Yii::app()->request->getHostInfo() . $currenturl;
            foreach ($this->relations[$parent_id] as $item_id) {
                $m_link = $this->items[$item_id]['menu_link'];
                //
                $return[$item_id]['menu_title'] = $this->items[$item_id]['menu_title'];
                $return[$item_id]['menu_link'] = $m_link;
                $return[$item_id]['target'] = Menus::getTarget($this->items[$item_id]);
                //
                $return[$item_id]['iconclass'] = $this->items[$item_id]['iconclass'];
                //
                if ($this->items[$item_id]['menu_linkto'] == Menus::LINKTO_OUTER) {
                    $return[$item_id]['active'] = ($m_link == $fullurl) ? true : false;
                } else {
                    $return[$item_id]['active'] = Menus::checkActive($m_link, array('currenturl' => $currenturl));
                }
                if ($return[$item_id]['active']) {
                    $this->saveTrack($item_id, $track);
                    $options['track'] = $track;
                }
                $return[$item_id]['items'] = $this->createMenu($item_id, $options);
            }
        }
        //
        return $return;
    }

    public function createMenu2($parent_id, $htmlOptions = array()) {
        $data = '';
        if (isset($this->relations[$parent_id])) {
            $data = ($parent_id == self::CATEGORY_ROOT) ? '<ul class="nav">' : '<ul class="sub-menu" style="overflow: hidden; height: auto; padding-top: 0px; display: none; margin-top: 0px; margin-bottom: 0px; padding-bottom: 0px;">';
            foreach ($this->relations[$parent_id] as $item_id) {
                $url = ($this->items[$item_id]['menu_link'] != '') ? $this->items[$item_id]['menu_link'] : Yii::app()->createUrl($this->items[$item_id]['menu_basepath'], json_decode($this->items[$item_id]['menu_pathparams'], true));
                $data .= '<li>'
                        . '<a href="' . $url . '">' . $this->items[$item_id]['menu_title'] . '</a>';

                // find childitems recursively
                $data .= $this->createMenu($item_id, $htmlOptions);

                $data .= '</li>';
            }
            $data .= '</ul>';
        }

        return $data;
    }

    /**
     * duyệt lại menu để active hết những item thuộc track
     * @param type $data
     * @param type $track
     */
    public function browseActive($data, $track) {
        if ($data && $track) {
            $save = array();
            foreach ($track as $pid) {
                if (!count($save)) {
                    eval('if(isset($data[' . $pid . '])) $data[' . $pid . ']["active"]=true;');
                } else {
                    $string = '$data';
                    foreach ($save as $k)
                        $string.='[' . $k . ']["items"]';
                    $string.='[' . $pid . ']';
                    eval('if(isset(' . $string . ')) ' . $string . '["active"]=true;');
                }
                $save[] = $pid;
            }
        }
        //
        return $data;
    }

    /**
     * 
     * Save track
     * @param type $id
     * @param type $savetrack
     */
    public function saveTrack($id, &$savetrack) {
        if ($savetrack === null)
            $savetrack = array();
        if ($id != 0 && isset($this->items[$id]["menu_id"])) {
            array_unshift($savetrack, $this->items[$id]["menu_id"]);
            $this->saveTrack($this->items[$id]["parent_id"], $savetrack);
        }
        return $savetrack;
    }

    /**
     * Create option of select
     */
    public function createOption($parent_id = 0, $select = null, $step = 0, $htmlOptions = array()) {
        $data = '';
        $space = '';
        for ($i = 0; $i < $step * 3; $i++) {
            $space.="&nbsp;";
        }
        $step++;
        if (isset($this->relations[$parent_id])) {
            foreach ($this->relations[$parent_id] as $item_id) {
                if ($parent_id == 0) {
                    $data.='<option value="0">|</option>';
                }
                $data .= '<option value="' . $this->items[$item_id]["menu_id"]
                        . '" ';
                if (count($htmlOptions)) {
                    foreach ($htmlOptions as $attr => $value) {
                        $data.= $attr . '="' . $value . '" ';
                    }
                }
                $data.=(($select == $this->items[$item_id]["menu_id"]) ? 'selected="selected"' : '') . '>'
                        . (($parent_id == 0) ? "|--" : '|' . $space . '|-- ')
                        . $this->items[$item_id]["menu_title"] . '</option>';
                $data.= $this->createOption($item_id, $select, $step, $htmlOptions);
            }
        }

        return $data;
    }

    /**
     * Create option array
     */
    public function createOptionArray($parent_id = 0, $step = 0, &$arr = array(0 => '|')) {
        $space = '';
        for ($i = 0; $i < $step * 3; $i++) {
            $space.=' - ';
        }
        $step++;
        if (isset($this->relations[$parent_id])) {
            foreach ($this->relations[$parent_id] as $item_id) {
                if ($parent_id == 0) {
                    $arr['0'] = isset($arr[0]) ? $arr[0] : '|';
                }
                $arr['' . $this->items[$item_id]["menu_id"]] = (($parent_id == 0) ? "" : $space) . $this->items[$item_id]["menu_title"];
                $this->createOptionArray($item_id, $step, $arr);
            }
        }
        return $arr;
    }

    /**
     * Create option array
     */
    public function createArrayDataProvider($parent_id = 0, $step = 0, &$arr = array()) {
        $space = '';
        if ($step != 0) {
            for ($i = 0; $i < 2; $i++) {
                $space.=' _ ';
            }
        }
        if ($space != '') {
            $space = '|' . $space;
            for ($i = 0; $i < $step * 5; $i++) {
                $space = '&nbsp;' . $space;
            }
        }
        $step ++;
        if (isset($this->relations[$parent_id])) {
            foreach ($this->relations[$parent_id] as $item_id) {
                $menu = $this->items[$item_id];
                $menu['menu_title'] = (($parent_id == 0) ? "" : $space) . $menu["menu_title"];
                $arr[$menu["menu_id"]] = $menu;
                $this->createArrayDataProvider($item_id, $step, $arr);
            }
        }
        return $arr;
    }

    /**
     * Tạo ra một mảng dữ liệu tuần tự
     */
    public function createArrayDataSequence($parent_id = 0, &$arr = array()) {
        if (isset($this->relations[$parent_id])) {
            foreach ($this->relations[$parent_id] as $item_id) {
                $menu = $this->items[$item_id];
                $arr[$menu["menu_id"]] = $menu;
                $this->createArrayDataSequence($item_id, $arr);
            }
        }
        return $arr;
    }

    /**
     * remove item 
     * @param type $item_id
     */
    function removeItem($item_id) {
        if (isset($this->items[$item_id])) {
            $this->relations[$this->items[$item_id]["parent_id"]] = ClaArray::deleteWithValue($this->relations[$this->items[$item_id]["parent_id"]], $item_id);
            unset($this->items[$item_id]);
        }
    }

}
