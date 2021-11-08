<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $news_id
 * @property integer $news_category_id
 * @property string $news_title
 * @property string $news_sortdesc
 * @property string $news_desc
 * @property string $alias
 * @property integer $status
 * @property string $meta_keywords
 * @property string $meta_description
 * @property integer $site_id
 * @property integer $modified_time
 * @property integer $modified_by
 * @property integer $user_id
 * @property string $image_path
 * @property string $image_name
 * @property integer $created_time
 * @property integer $news_hot
 * @property integer $news_source
 * @property string $poster
 * @property integer $publicdate
 * 
 */
class News extends ActiveRecord {

    const NEWS_HOT = 1;
    const NEWS_DEFAUTL_LIMIT = 8;

    public $avatar = '';

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('news');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('news_title, news_desc, news_sortdesc, news_category_id', 'required'),
            array('news_category_id, status, site_id, modified_time, modified_by, user_id, created_time', 'numerical', 'integerOnly' => true),
            array('alias', 'isAlias'),
            array('news_title, alias', 'length', 'max' => 100),
            array('news_sortdesc', 'length', 'max' => 1000),
            array('image_name, image_path', 'length', 'max' => 255),
            array('meta_keywords, meta_description,meta_title', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('news_id, news_category_id, news_title, news_sortdesc, news_desc, alias, status, meta_keywords, meta_description, meta_title, site_id, modified_time, modified_by, user_id, image_path, image_name, created_time, news_hot, news_source, avatar, poster, publicdate', 'safe'),
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
            'news_id' => 'ID',
            'news_category_id' => Yii::t('news', 'news_category'),
            'news_title' => Yii::t('news', 'news_title'),
            'news_sortdesc' => Yii::t('news', 'news_sortdescription'),
            'news_desc' => Yii::t('news', 'news_content'),
            'alias' => Yii::t('common', 'alias'),
            'status' => Yii::t('status', 'status'),
            'meta_keywords' => Yii::t('common', 'meta_keywords'),
            'meta_description' => Yii::t('common', 'meta_description'),
            'meta_title' => Yii::t('common', 'meta_title'),
            'news_source' => Yii::t('news', 'news_source'),
            'news_hot' => Yii::t('news', 'news_hot'),
            'site_id' => 'Site',
            'modified_time' => 'Modified Time',
            'modified_by' => 'Modified By',
            'user_id' => 'User',
            'image_path' => 'Image Path',
            'image_name' => 'Image Name',
            'created_time' => Yii::t('news', 'created_time'),
            'avatar' => Yii::t('news', 'news_avatar'),
            'poster' => Yii::t('news', 'poster'),
            'publicdate' => Yii::t('news', 'publicdate'),
        );
    }

    public function beforeSave() {
        $this->user_id = Yii::app()->user->id;
        $this->site_id = Yii::app()->controller->site_id;
        if ($this->isNewRecord) {
            $this->created_time = time();
            $this->modified_time = $this->created_time;
            $this->alias = HtmlFormat::parseToAlias($this->news_title);
        } else {
            $this->modified_time = time();
            $this->modified_by = Yii::app()->user->id;
            if (!trim($this->alias) && $this->news_title)
                $this->alias = HtmlFormat::parseToAlias($this->news_title);
        }
        return parent::beforeSave();
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
        if ($this->news_category_id <= 0)
            $this->news_category_id = null;
        $criteria = new CDbCriteria;
        $this->site_id = Yii::app()->controller->site_id;
        $criteria->compare('news_id', $this->news_id);
        $criteria->compare('news_category_id', $this->news_category_id);
        $criteria->compare('news_title', $this->news_title, true);
        $criteria->compare('news_sortdesc', $this->news_sortdesc, true);
        $criteria->compare('news_desc', $this->news_desc, true);
        $criteria->compare('alias', $this->alias, true);
        //$criteria->compare('status', $this->status);
        $criteria->compare('meta_keywords', $this->meta_keywords);
        $criteria->compare('meta_description', $this->meta_description);
        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('modified_time', $this->modified_time);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('image_path', $this->image_path, true);
        $criteria->compare('image_name', $this->image_name, true);
        $criteria->compare('created_time', $this->created_time);
        //
        $criteria->order = 'publicdate DESC';
        //
//        $pageSize = Yii::app()->request->getParam(Yii::app()->params['pageSizeName']);
//        if (!$pageSize)
//            $pageSize = Yii::app()->params['defaultPageSize'];

        $dataprovider = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->user->getState(Yii::app()->params['pageSizeName'], Yii::app()->params['defaultPageSize']),
                'pageVar' => ClaSite::PAGE_VAR,
            ),
        ));
        //
        return $dataprovider;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return News the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Get hot news
     * @param type $options
     * @return array
     */
    public static function getHotNews($options = array()) {
        if (!isset($options['limit']))
            $options['limit'] = self::NEWS_DEFAUTL_LIMIT;
        //select
        $select = 'news_id,news_category_id,news_title,news_sortdesc,alias,news_desc,status,site_id,user_id,image_path,image_name,created_time,news_hot,publicdate';
        if (isset($options['full']) && $options['full'])
            $select = '*';
        //
        $siteid = Yii::app()->controller->site_id;
        $news = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                ->where("site_id=$siteid AND news_hot=" . self::NEWS_HOT . " AND status=" . self::STATUS_ACTIVED)
                ->order('publicdate DESC')
                ->limit($options['limit'])
                ->queryAll();
        $results = array();
        foreach ($news as $n) {
            $results[$n['news_id']] = $n;
            $results[$n['news_id']]['news_sortdesc'] = nl2br($results[$n['news_id']]['news_sortdesc']);
            $results[$n['news_id']]['link'] = Yii::app()->createUrl('news/news/detail', array('id' => $n['news_id'], 'alias' => $n['alias']));
        }
        return $results;
    }

    /**
     * Lấy những bài viết mới nhất của site
     * @param type $options
     * @return array
     */
    public static function getNewNews($options = array()) {
        if (!isset($options['limit']))
            $options['limit'] = self::NEWS_DEFAUTL_LIMIT;
        //select
        $select = 'news_id,news_category_id,news_title,news_sortdesc,alias,status,site_id,user_id,image_path,image_name,created_time,news_hot,publicdate,news_desc,poster,news_source';
        if (isset($options['full']) && $options['full'])
            $select = '*';
        //
        $siteid = Yii::app()->controller->site_id;
  
		if ($siteid == '1057') {
			$data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                ->order('publicdate ASC')
                ->limit($options['limit'])
                ->queryAll();
		} else {
			$data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                ->order('publicdate DESC')
                ->limit($options['limit'])
                ->queryAll();
		}
        $news = array();
        if ($data) {
            foreach ($data as $n) {
                $n['news_sortdesc'] = nl2br($n['news_sortdesc']);
                $n['link'] = Yii::app()->createUrl('news/news/detail', array('id' => $n['news_id'], 'alias' => $n['alias']));
                array_push($news, $n);
            }
        }
        return $news;
    }

    /**
     * Get news in category
     * @param type $cat_id
     * @param type $options (limit,pageVar)
     */
    public static function getNewsInCategory($cat_id, $options = array()) {
        $siteid = Yii::app()->controller->site_id;
        $condition = 'site_id=:site_id AND status=' . self::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        if (!isset($options['limit']))
            $options['limit'] = self::NEWS_DEFAUTL_LIMIT;
        $cat_id = (int) $cat_id;
        if (!$cat_id)
            return array();
        // get all level children of category
        $children = array();
        if (!isset($options['children'])) {
            $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_NEWS, 'create' => true));
            $children = $category->getChildrens($cat_id);
        } else
            $children = $options['children'];
        //
        if ($children && count($children)) {
            $children[$cat_id] = $cat_id;
            $condition.=' AND news_category_id IN ' . '(' . implode(',', $children) . ')';
        } else {
            $condition.=' AND news_category_id=:news_category_id';
            $params[':news_category_id'] = $cat_id;
        }
        //
        if (isset($options['_news_id']) && $options['_news_id']) {
            $condition.=' AND news_id<>:news_id';
            $params[':news_id'] = $options['_news_id'];
        }
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;
        //select
        $select = 'news_id,news_category_id,news_title,news_desc,news_sortdesc,alias,status,site_id,user_id,image_path,image_name,created_time,news_hot,publicdate,news_desc';
        if (isset($options['full']) && $options['full'])
            $select = '*';
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        //
	
		if ($siteid == "1057") {
			$data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                ->where($condition, $params)
                ->andWhere('publicdate >= '.strtotime(date("d-m-Y",strtotime('monday this week'))).' ')
                ->andWhere('publicdate <= '.strtotime(date("d-m-Y",strtotime('sunday this week'))).' ')
                ->order('publicdate ASC')
                ->limit($options['limit'], $offset)
                ->queryAll();
		} else {
			$data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                ->where($condition, $params)
				
                ->order('publicdate DESC')
                ->limit($options['limit'], $offset)
                ->queryAll();
		}
        
        $news = array();
        if ($data) {
            foreach ($data as $n) {
                $n['news_sortdesc'] = nl2br($n['news_sortdesc']);
                $n['link'] = Yii::app()->createUrl('news/news/detail', array('id' => $n['news_id'], 'alias' => $n['alias']));
                array_push($news, $n);
            }
        }
        return $news;
    }

    /**
     * Get product in category
     * @param type $options
     * @return array
     */
    public static function getRelationNews($cat_id = 0, $news_id = 0, $options = array()) {
        $cat_id = (int) $cat_id;
        $news_id = (int) $news_id;
        if (!$cat_id || !$news_id)
            return array();
        $siteid = Yii::app()->controller->site_id;
        //
        $condition = 'site_id=:site_id AND status=' . self::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        //
        // get all level children of category
        $children = array();
        if (!isset($options['children'])) {
            $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_NEWS, 'create' => true));
            $children = $category->getChildrens($cat_id);
        } else
            $children = $options['children'];
        //
        if ($children && count($children)) {
            $children[$cat_id] = $cat_id;
            $condition.=' AND news_category_id IN ' . '(' . implode(',', $children) . ')';
        } else {
            $condition.=' AND news_category_id=:news_category_id';
            $params[':news_category_id'] = $cat_id;
        }
        //
        $condition.=' AND news_id<>:news_id';
        $params[':news_id'] = $news_id;
        //
        if (!isset($options['limit']))
            $options['limit'] = self::PRODUCT_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[ClaSite::PAGE_VAR] = 1;
        $select = 'news_id,news_category_id,news_title,news_sortdesc,alias,status,site_id,user_id,image_path,image_name,created_time,news_hot,publicdate';
        if (isset($options['full']) && $options['full'])
            $select = '*';
        //
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options['limit'];
        $data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                ->where($condition, $params)
                ->order("ABS($news_id - news_id)")
                ->limit($options['limit'], $offset)
                ->queryAll();
        //  
        usort($data, function($a, $b) {
            return $b['created_time'] - $a['created_time'];
        });
        //
        $news = array();
        if ($data) {
            foreach ($data as $n) {
                $n['news_sortdesc'] = nl2br($n['news_sortdesc']);
                $n['link'] = Yii::app()->createUrl('news/news/detail', array('id' => $n['news_id'], 'alias' => $n['alias']));
                array_push($news, $n);
            }
        }
        return $news;
    }

    /**
     * get count news in category
     * @param type $cat_id
     * @param $options (children)
     */
    public static function countNewsInCate($cat_id = 0, $options = array()) {
        if (!$cat_id)
            return 0;
        $siteid = Yii::app()->controller->site_id;
        //
        $condition = 'site_id=:site_id AND status=' . self::STATUS_ACTIVED;
        $params = array(':site_id' => $siteid);
        //
        // get all level children of category
        $children = array();
        if (!isset($options['children'])) {
            $category = new ClaCategory(array('type' => ClaCategory::CATEGORY_NEWS, 'create' => true));
            $children = $category->getChildrens($cat_id);
        } else
            $children = $options['children'];
        //
        if ($children && count($children)) {
            $children[$cat_id] = $cat_id;
            $condition.=' AND news_category_id IN ' . '(' . implode(',', $children) . ')';
        } else {
            $condition.=' AND news_category_id=:news_category_id';
            $params[':news_category_id'] = $cat_id;
        }
        //
        $count = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('news'))
                        ->where($condition, $params)->queryScalar();
        return $count;
    }

    /**
     * Get news detail
     */
    public static function getNewsDetaial($new_id = 0) {
        $new_id = (int) $new_id;
        if (!$new_id)
            return
                    false;
        $news = self::model()->findByPk($new_id);
        if ($news) {
            $news->news_sortdesc = nl2br($news->news_sortdesc);
            return $news->attributes;
        }
        return false;
    }

    /**
     * get all new in site
     */

    /**
     * Get all news
     * @param type $options
     * @return array
     */
    public static function getAllNews($options = array()) {
        if (!isset($options['limit']))
            $options[
                    'limit'] = self::NEWS_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[
                    ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[
                    ClaSite::PAGE_VAR] = 1;
        $select = 'news_id,news_category_id,news_title,news_sortdesc,alias,status,site_id,user_id,image_path,image_name,created_time,news_hot,publicdate,news_desc';
        if (isset($options['full']) && $options ['full'])
            $select = '*';
        //
        $offset = ((int)$options[ClaSite::PAGE_VAR] - 1) * $options ['limit'];
        $siteid = Yii::app()->controller->site_id;
		if ($siteid == '1057') {
			 $data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                        ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                        ->order('publicdate ASC')
                        ->limit($options['limit'], $offset)->queryAll();
		} elseif ($siteid == '1249') {
			 $data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                        ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                        ->order('publicdate ASC')
                        ->limit($options['limit'], $offset)->queryAll();
		}  else {
			$data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                        ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                        ->order('publicdate DESC')
                        ->limit($options['limit'], $offset)->queryAll();
		}
       
        $news = array();
        if ($data) {
            foreach ($data as $n) {
                $n['news_sortdesc'] = nl2br($n['news_sortdesc']);
                $n['link'] = Yii::app()->createUrl('news/news/detail', array('id' => $n['news_id'], 'alias' => $n['alias']));
                array_push($news, $n);
            }
        }
        return $news;
    }

    /**
     * count all new of site
     * @param type $options
     * @return array
     */
    public static function countAllNews() {
        $siteid = Yii::app()->controller->site_id;
        $count = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('news'))
                ->where("site_id=$siteid AND status=" . self::STATUS_ACTIVED)
                ->queryScalar();
        return $count;
    }

    /**
     * Tìm tin tức
     * @param type $options
     */
    static function SearchNews($options = array()) {
        $results = array();
        if (!isset($options[ClaSite::SEARCH_KEYWORD]))
            return $results;
        //
        $options[ClaSite::SEARCH_KEYWORD] = str_replace(' ', '%', $options[ClaSite::SEARCH_KEYWORD]);
        //
        $siteid = Yii::app()->controller->site_id;
        $condition = "site_id=:site_id AND news_title LIKE :news_title AND status=" . self::STATUS_ACTIVED;
        $params = array(
            ':site_id' => $siteid,
            ':news_title' => '%'. $options[ClaSite::SEARCH_KEYWORD] . '%', // "like" with index
        );
        if (isset($options[ClaCategory::CATEGORY_KEY]) && $options [ClaCategory::CATEGORY_KEY]) {
            $condition.=' AND product_category_id=:category';
            $params[':category'] = $options[ClaCategory::CATEGORY_KEY];
        }
//
        if (!isset($options['limit']))
            $options[
                    'limit'] = self::NEWS_DEFAUTL_LIMIT;
        if (!isset($options[ClaSite::PAGE_VAR]))
            $options[
                    ClaSite::PAGE_VAR] = 1;
        if (!(int) $options[ClaSite::PAGE_VAR])
            $options[
                    ClaSite::PAGE_VAR] = 1;
        $select = 'news_id,news_category_id,news_title,news_sortdesc,alias,status,site_id,user_id,image_path,image_name,created_time,news_hot,publicdate';
        if (isset($options['full']) && $options ['full'])
            $select = '*';
        //
        $offset = ($options[ClaSite::PAGE_VAR] - 1) * $options ['limit'];
        $data = Yii::app()->db->createCommand()->select($select)->from(ClaTable::getTable('news'))
                        ->where($condition, $params)->order('publicdate DESC')
                        ->limit($options['limit'], $offset)->queryAll();
        $news = array();
        if ($data) {
            foreach ($data as $n) {
                $n['news_sortdesc'] = nl2br($n['news_sortdesc']);
                $n['link'] = Yii::app()->createUrl('news/news/detail', array('id' => $n['news_id'], 'alias' => $n['alias']));
                array_push($news, $n);
            }
        }
        return $news;
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
        $options[ClaSite::SEARCH_KEYWORD] = str_replace(' ', '%', $options[ClaSite::SEARCH_KEYWORD]);
        //
        $siteid = Yii::app()->controller->site_id;
        $condition = "site_id=:site_id AND news_title LIKE :news_title AND status=" . self::STATUS_ACTIVED;
        $params = array(
            ':site_id' => $siteid,
            ':news_title' => '%'.$options[ClaSite::SEARCH_KEYWORD] . '%'
        );
        if (isset($options[ClaCategory::CATEGORY_KEY]) && $options [ClaCategory::CATEGORY_KEY]) {
            $condition.=' AND product_category_id=:category';
            $params[':category'] = $options[ClaCategory::CATEGORY_KEY];
        }
//
        $news = Yii::app()->db->createCommand()->select('count(*)')->from(ClaTable::getTable('news'))
                ->where($condition, $params);
        $count = $news->queryScalar();
        //
        return $count;
    }

}
