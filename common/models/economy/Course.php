<?php

/**
 * This is the model class for table "edu_course".
 *
 * The followings are the available columns in table 'edu_course':
 * @property string $id
 * @property integer $cat_id
 * @property integer $site_id
 * @property string $name
 * @property string $alias
 * @property string $price
 * @property string $price_market
 * @property integer $status
 * @property integer $order
 * @property string $image_path
 * @property string $image_name
 * @property integer $created_time
 * @property integer $modified_time
 * @property integer $viewed
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $meta_title
 * @property string $time_for_study
 * @property integer $number_of_students
 * @property string $school_schedule
 * @property integer $course_open
 * @property integer $course_finish
 * @property string $sort_description
 * @property string $description
 * @property integer $ishot
 */
class Course extends ActiveRecord {

    public $avatar = '';
    public $applydate;
    public $lecturer_id;

    const COURSE_DEFAUTL_LIMIT = 8;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('edu_course');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('cat_id, site_id, status, order, created_time, modified_time, viewed, number_of_students, ishot', 'numerical', 'integerOnly' => true),
            array('name, alias, image_path, image_name, time_for_study, school_schedule,score4', 'length', 'max' => 255),
            array('price, price_market', 'length', 'max' => 16),
            array('sort_description', 'length', 'max' => 500),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, cat_id, site_id, name, alias, price, price_market,score4, status, order, image_path, image_name, created_time, modified_time, viewed, time_for_study, number_of_students, school_schedule, course_open, course_finish, sort_description, description, avatar, ishot,number_lession', 'safe'),
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
            'cat_id' => Yii::t('common', 'category'),
            'site_id' => 'Site',
            'name' => Yii::t('course', 'name'),
            'alias' => 'Alias',
            'price' => Yii::t('course', 'course_price'),
            'price_market' => Yii::t('course', 'course_price_market'),
            'status' => Yii::t('common', 'status'),
            'order' => 'Order',
            'image_path' => 'Image Path',
            'image_name' => 'Image Name',
            'created_time' => 'Created Time',
            'modified_time' => 'Modified Time',
            'viewed' => 'Viewed',
            'time_for_study' => Yii::t('course', 'time_for_study'),
            'number_of_students' => Yii::t('course', 'number_of_students'),
            'school_schedule' => Yii::t('course', 'school_schedule'),
            'score4' => Yii::t('course', 'score4'),
            'course_open' => Yii::t('course', 'course_open'),
            'course_finish' => Yii::t('course', 'course_finish'),
            'sort_description' => Yii::t('common', 'sort_description'),
            'avatar' => Yii::t('common', 'avatar'),
            'number_lession' => Yii::t('course', 'number_lession'),
            'lecturer_id' => Yii::t('course', 'lecturer'),
            'ishot' => Yii::t('course', 'ishot'),
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('cat_id', $this->cat_id);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('price', $this->price, true);
        $criteria->compare('price_market', $this->price_market, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('order', $this->order);
        $criteria->compare('image_path', $this->image_path, true);
        $criteria->compare('image_name', $this->image_name, true);
        $criteria->compare('created_time', $this->created_time);
        $criteria->compare('modified_time', $this->modified_time);
        $criteria->compare('viewed', $this->viewed);
        $criteria->compare('time_for_study', $this->time_for_study, true);
        $criteria->compare('number_of_students', $this->number_of_students);
        $criteria->compare('school_schedule', $this->school_schedule, true);
        $criteria->compare('course_open', $this->course_open);
        $criteria->compare('course_finish', $this->course_finish);
        $criteria->compare('sort_description', $this->sort_description, true);
        $criteria->compare('ishot', $this->ishot, true);
        $criteria->order = 'created_time DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Course the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function beforeSave() {
        $this->site_id = Yii::app()->controller->site_id;
        if ($this->isNewRecord) {
            $this->created_time = time();
            $this->modified_time = $this->created_time;
        } else {
            $this->modified_time = time();
        }
        return parent::beforeSave();
    }

    /**
     * Lấy những khoá học mới nhất
     * @param type $options
     * @return array
     */
    public static function getCourseNew($options = array()) {
        if (!isset($options['limit'])) {
            $options['limit'] = self::COURSE_DEFAUTL_LIMIT;
        }
        //select
        $select = '*';
        //
        $siteid = Yii::app()->controller->site_id;
        $data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('edu_course'))
                ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                ->order('created_time DESC')
                ->limit($options['limit'])
                ->queryAll();
        $courses = array();
        if ($data) {
            foreach ($data as $c) {
                $c['sort_description'] = nl2br($c['sort_description']);
                $c['link'] = Yii::app()->createUrl('economy/course/detail', array('id' => $c['id'], 'alias' => $c['alias']));
                array_push($courses, $c);
            }
        }
        return $courses;
    }

    /**
     * Lấy những khoá học sắp khai giảng
     * @param type $options
     * @return array
     */
    public static function getCourseNearOpen($options = array()) {
        if (!isset($options['limit'])) {
            $options['limit'] = self::COURSE_DEFAUTL_LIMIT;
        }
        //select
        $select = '*';
        //
        $siteid = Yii::app()->controller->site_id;
        $data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('edu_course'))
                ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                ->order('course_open DESC')
                ->limit($options['limit'])
                ->queryAll();
        $courses = array();
        if ($data) {
            foreach ($data as $c) {
                $c['sort_description'] = nl2br($c['sort_description']);
                $c['link'] = Yii::app()->createUrl('economy/course/detail', array('id' => $c['id'], 'alias' => $c['alias']));
                array_push($courses, $c);
            }
        }
        return $courses;
    }

    /**
     * Get course in category
     * @param type $cat_id
     * @param type $options (limit,pageVar)
     */
    public static function getCourseInCategory($cat_id, $options = array()) {
        $siteid = Yii::app()->controller->site_id;
        $condition = 'site_id=:site_id AND status=' . self::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        if (!isset($options['limit'])) {
            $options['limit'] = self::COURSE_DEFAUTL_LIMIT;
        }
        $cat_id = (int) $cat_id;
        if (!$cat_id) {
            return array();
        }
        // get all level children of category
        $children = array();
        if (!isset($options['children'])) {
            $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_COURSE, 'create' => true));
            $children = $category->getChildrens($cat_id);
        } else {
            $children = $options['children'];
        }
        //
        if ($children && count($children)) {
            $children[$cat_id] = $cat_id;
            $condition.=' AND cat_id IN ' . '(' . implode(',', $children) . ')';
        } else {
            $condition.=' AND cat_id=:cat_id';
            $params[':cat_id'] = $cat_id;
        }
        //
        if (isset($options['_course_id']) && $options['_course_id']) {
            $condition.=' AND id<>:course_id';
            $params[':course_id'] = $options['_course_id'];
        }
        if (!isset($options[ClaSite::PAGE_VAR])) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        if (!(int) $options[ClaSite::PAGE_VAR]) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        //select
        $select = '*';
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        //
        $data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('edu_course'))
                ->where($condition, $params)
                ->order('course_open DESC')
                ->limit($options['limit'], $offset)
                ->queryAll();
				
        $courses = array();
        if ($data) {
            foreach ($data as $n) {
                $n['sort_description'] = nl2br($n['sort_description']);
                $n['link'] = Yii::app()->createUrl('economy/course/detail', array('id' => $n['id'], 'alias' => $n['alias']));
                array_push($courses, $n);
            }
        }
        return $courses;
    }

    /**
     * get count course in category
     * @param type $cat_id
     * @param $options (children)
     */
    public static function countCourseInCate($cat_id = 0, $options = array()) {
        if (!$cat_id) {
            return 0;
        }
        $siteid = Yii::app()->controller->site_id;
        //
        $condition = 'site_id=:site_id AND status=' . self::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        //
        // get all level children of category
        $children = array();
        if (!isset($options['children'])) {
            $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_COURSE, 'create' => true));
            $children = $category->getChildrens($cat_id);
        } else {
            $children = $options['children'];
        }
        //
        if ($children && count($children)) {
            $children[$cat_id] = $cat_id;
            $condition.=' AND cat_id IN ' . '(' . implode(',', $children) . ')';
        } else {
            $condition.=' AND cat_id=:cat_id';
            $params[':cat_id'] = $cat_id;
        }
        //
        $count = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('edu_course'))
                        ->where($condition, $params)->queryScalar();
        return $count;
    }

    /**
     * Get course detail
     */
    public static function getCourseDetail($id = 0) {
        $id = (int) $id;
        if (!$id) {
            return false;
        }
        $course = self::model()->findByPk($id);
        if ($course) {
            $course->sort_description = nl2br($course->sort_description);
            return $course->attributes;
        }
        return false;
    }

    /**
     * Get course relation 
     * @param type $options
     * @return array
     */
    public static function getCourseRelation($cat_id = 0, $course_id = 0, $options = array()) {
        $cat_id = (int) $cat_id;
        $course_id = (int) $course_id;
        if (!$cat_id || !$course_id) {
            return array();
        }
        $siteid = Yii::app()->controller->site_id;
        //
        $condition = 'site_id=:site_id AND status=' . self::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        //
        // get all level children of category
        $children = array();
        if (!isset($options['children'])) {
            $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_COURSE, 'create' => true));
            $children = $category->getChildrens($cat_id);
        } else
            $children = $options['children'];
        //
        if ($children && count($children)) {
            $children[$cat_id] = $cat_id;
            $condition.=' AND cat_id IN ' . '(' . implode(',', $children) . ')';
        } else {
            $condition.=' AND cat_id=:cat_id';
            $params[':cat_id'] = $cat_id;
        }
        //
        $condition.=' AND id<>:id';
        $params[':id'] = $course_id;
        //
        if (!isset($options['limit'])) {
            $options['limit'] = self::COURSE_DEFAUTL_LIMIT;
        }
        if (!isset($options[ClaSite::PAGE_VAR])) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        if (!(int) $options[ClaSite::PAGE_VAR]) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        $select = '*';
        //
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        $data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('edu_course'))
                ->where($condition, $params)
                ->limit($options['limit'], $offset)
                ->queryAll();
        //  
        usort($data, function($a, $b) {
            return $b['created_time'] - $a['created_time'];
        });
        //
        $courses = array();
        if ($data) {
            foreach ($data as $c) {
                $c['sort_description'] = nl2br($c['sort_description']);
                $c['link'] = Yii::app()->createUrl('economy/course/detail', array('id' => $c['id'], 'alias' => $c['alias']));
                array_push($courses, $c);
            }
        }
        return $courses;
    }

    public static function getOptionCourse() {
        $option = array('' => 'Chọn khóa học');
        $site_id = Yii::app()->controller->site_id;
        $array_option = Yii::app()->db->createCommand()
                ->select('id, name')
                ->from(ClaTable::getTable('edu_course'))
                ->where('site_id=:site_id AND status=:status', array(':site_id' => $site_id, ':status' => ActiveRecord::STATUS_ACTIVED))
                ->queryAll();
        foreach ($array_option as $item) {
            $option[$item['id']] = $item['name'];
        }
        return $option;
    }

    /**
     * Get all course
     * @param type $options
     * @return array
     */
    public static function getAllCourse($options = array()) {
        if (!isset($options['limit'])) {
            $options['limit'] = self::COURSE_DEFAUTL_LIMIT;
        }
        if (!isset($options[ClaSite::PAGE_VAR])) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        if (!(int) $options[ClaSite::PAGE_VAR]) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        $select = '*';
        //
        $offset = ((int) $options[ClaSite::PAGE_VAR] - 1) * $options ['limit'];
        $siteid = Yii::app()->controller->site_id;
        $data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('edu_course'))
                        ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                        ->order('course_open DESC')
                        ->limit($options['limit'], $offset)->queryAll();
        $course = array();
        if ($data) {
            foreach ($data as $n) {
                $n['sort_description'] = nl2br($n['sort_description']);
                $n['link'] = Yii::app()->createUrl('economy/course/detail', array('id' => $n['id'], 'alias' => $n['alias']));
                array_push($course, $n);
            }
        }
        return $course;
    }

    /**
     * count all new of site
     * @param type $options
     * @return array
     */
    public static function countAllCourse() {
        $siteid = Yii::app()->controller->site_id;
        $count = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('edu_course'))
                ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                ->queryScalar();
        return $count;
    }
    
    function processPrice() {
        if ($this->price) {
            $this->price = floatval(str_replace('.', '', $this->price));
        }
        if ($this->price_market) {
            $this->price_market = floatval(str_replace('.', '', $this->price_market));
        }
    }
    
    /**
     * Tìm sản phẩm
     * @param type $options
     */
    static function SearchCourses($options = array()) {
        $results = array();
        if (!isset($options[ClaSite::SEARCH_KEYWORD]))
            return $results;
        //
        $options[ClaSite::SEARCH_KEYWORD] = str_replace(' ', '%', $options[ClaSite::SEARCH_KEYWORD]);
        //
        $siteid = Yii::app()->controller->site_id;
        $condition = "site_id=:site_id AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND (name LIKE :name)";
        $params = array(
            ':site_id' => $siteid,
            ':name' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%'
        );
        //
        if (!isset($options['limit'])) {
            $options['limit'] = self::COURSE_DEFAUTL_LIMIT;
        }
        if (!isset($options[ClaSite::PAGE_VAR])) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        if (!(int) $options[ClaSite::PAGE_VAR]) {
            $options[ClaSite::PAGE_VAR] = 1;
        }
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        $courses = Yii::app()->db->createCommand()->select('*')->from(ClaTable::getTable('edu_course'))
                ->where($condition, $params)
                ->order('created_time DESC')
                ->limit($options['limit'], $offset)
                ->queryAll();
        //
        $results = array();
        foreach ($courses as $p) {
            $results[$p['id']] = $p;
            $results[$p['id']]['link'] = Yii::app()->createUrl('economy/course/detail', array('id' => $p['id'], 'alias' => $p['alias']));
        }
        return $results;
    }
    
    /**
     * get total count of search
     * @param type $options
     * @return int
     */
    static function searchTotalCount($options = array()) {
        $count = 0;
        if (!isset($options[ClaSite::SEARCH_KEYWORD]))
            return $count;
        //
        $options[ClaSite::SEARCH_KEYWORD] = str_replace(' ', '%', $options[ClaSite::SEARCH_KEYWORD]);
        //
        $siteid = Yii::app()->controller->site_id;
        $condition = "site_id=:site_id AND `status`=" . ActiveRecord::STATUS_ACTIVED . " AND (name LIKE :name)";
        $params = array(
            ':site_id' => $siteid,
            ':name' => '%' . $options[ClaSite::SEARCH_KEYWORD] . '%', // tận dựn index
        );
        $count = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('edu_course'))
                ->where($condition, $params)
                ->queryScalar();
        return $count;
    }
    

}
