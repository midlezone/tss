<?php

/**
 * @author minhbn <minhbachngoc@orenj.com>
 * @date 01/10/2014
 *
 * The followings are the available columns in table 'sites':
 * @property integer $site_id
 * @property integer $site_type
 * @property integer $user_id
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $site_logo
 * @property string $site_title
 * @property integer $expiry_date
 * @property string $time_zone
 * @property string $site_skin
 * @property string $admin_email
 * @property string $google_analytics
 * @property integer $created_time
 * @property integer $modified_time
 * @property string $contact
 * @property string $footercontent
 * @property string $domain_default
 * @property string $favicon
 * @property string $language
 * @property string $phone
 * @property string $stylecustom
 * @property interger $pagesize
 * @property string $mobile_skin_default
 * @property enum $admin_default
 * @property string $meta_title
 * @property string $languages_for_site
 * @property int $status
 * @property int $expiration_date

 */
class SiteSettings extends ActiveRecord {

    const SITE_TYPE_NEWS = 1;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return $this->getTableName('site');
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('site_title,site_skin, admin_email, domain_default', 'required'),
            array('site_title', 'length', 'max' => 255),
            array('site_logo', 'length', 'max' => 240),
            array('time_zone', 'length', 'max' => 100),
            array('site_skin', 'length', 'max' => 50),
            array('stylecustom', 'length', 'max' => 2000),
            array('google_analytics', 'length', 'max' => 2000),
            array('admin_email', 'length', 'max' => 200),
            array('admin_email', 'email'),
            array('language', 'isLanguage'),
            array('phone', 'isPhone'),
            array('pagesize', 'numerical', 'min' => 1, 'max' => 200),
            array('storage_limit, storage_used', 'numerical'),
            array('site_id, site_type, user_id, meta_keywords, meta_description,meta_title, site_logo, site_title, expiry_date, time_zone, site_skin, admin_email, google_analytics, created_time, modified_time, contact, footercontent, domain_default, favicon, language, phone, stylecustom, pagesize, mobile_skin_default,admin_default,languages_for_site,status, default_page_path, default_page_params, expiration_date, admin_language, storage_limit, storage_used', 'safe'),
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
            'site_id' => 'ID',
            'site_type' => Yii::t('setting', 'site_type'),
            'site_title' => Yii::t('setting', 'site_title'),
            'site_logo' => Yii::t('setting', 'site_logo'),
            'google_analytics' => Yii::t('setting', 'google_analytics'),
            'time_zone' => Yii::t('setting', 'time_zone'),
            'site_skin' => Yii::t('setting', 'site_skin'),
            'admin_email' => Yii::t('setting', 'admin_email'),
            'meta_keywords' => Yii::t('common', 'meta_keywords'),
            'meta_description' => Yii::t('common', 'meta_description'),
            'meta_title' => Yii::t('common', 'meta_title'),
            'contact' => Yii::t('setting', 'contact'),
            'footercontent' => Yii::t('setting', 'footercontent'),
            'favicon' => Yii::t('setting', 'site_favicon'),
            'language' => Yii::t('site', 'language'),
            'domain_default' => Yii::t('site', 'domain_default'),
            'phone' => Yii::t('common', 'phone'),
            'stylecustom' => Yii::t('site', 'style'),
            'pagesize' => Yii::t('site', 'pagesize'),
            'languages_for_site' => Yii::t('site', 'languages_for_site'),
            'status' => Yii::t('common', 'status'),
            'admin_language' => Yii::t('site', 'admin_language'),
            'expiration_date' => Yii::t('site', 'expiration_date'),
            'storage_limit' => Yii::t('site', 'storage_limit'),
            'storage_used' => Yii::t('site', 'storage_used'),
        );
    }

    /**
     * add rule: checking language
     * @param type $attribute
     * @param type $params
     */
    public function isLanguage($attribute, $params) {
        $languages = ClaSite::getLanguageSupport();
        if (!$this->$attribute)
            return true;
        if (!isset($languages[$this->$attribute])) {
            $this->addError($attribute, Yii::t('errors', 'language_invalid'));
            return false;
        }
        return true;
    }

    /**
     * add rule: checking phone number
     * @param type $attribute
     * @param type $params
     */
    public function isPhone($attribute, $params) {
        if (!$this->$attribute)
            return true;
        if (!ClaRE::isPhoneNumber($this->$attribute))
            $this->addError($attribute, Yii::t('errors', 'phone_invalid'));
    }

    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->domain_default = strtolower($this->domain_default);
            $this->created_time = time();
        } else
            $this->modified_time = time();
        //
        return parent::beforeSave();
    }

    function afterSave() {
        //
        $translate_language = ClaSite::getLanguageTranslate();
        //
        Yii::app()->cache->delete(ClaSite::CACHE_SITEINFO_PRE . $this->site_id . $translate_language);
        //
        parent::afterSave();
    }

    /**
     * get site setting
     * @return array site info
     */
    public static function getSiteSettings() {
        $site_id = ClaSite::getCurrentSiteId();
        $site = self::model()->findByPk($site_id);
        if ($site)
            return $site->attributes;
        return array();
    }

    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('site_id', $this->site_id);
        $criteria->compare('site_type', $this->site_type);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('meta_keywords', $this->meta_keywords, true);
        $criteria->compare('meta_description', $this->meta_description, true);
        $criteria->compare('site_logo', $this->site_logo, true);
        $criteria->compare('site_title', $this->site_title, true);
        $criteria->compare('expiry_date', $this->expiry_date);
        $criteria->compare('time_zone', $this->time_zone, true);
        $criteria->compare('site_skin', $this->site_skin, true);
        $criteria->compare('admin_email', $this->admin_email, true);
        $criteria->compare('google_analytics', $this->google_analytics, true);
        $criteria->compare('created_time', $this->created_time);
        $criteria->compare('modified_time', $this->modified_time);
        $criteria->compare('contact', $this->contact, true);
        $criteria->compare('footercontent', $this->footercontent, true);
        $criteria->compare('domain_default', $this->domain_default, true);
        $criteria->compare('favicon', $this->favicon, true);

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

    /**
     * delete a site
     * @param type $site_id
     */
    static function deleteSite($site_id) {
        if (!(int) $site_id)
            return false;
        if (!ClaUser::isSupperAdmin())
            return false;
        $tables = Yii::app()->params['tables'];
        $ignores = array(
            'themes' => 'themes',
            'theme_images' => 'theme_images',
            'themes' => 'themes',
            'mail_settings' => 'mail_settings',
            'district' => 'district',
            'province' => 'province',
            'tokens' => 'tokens',
            'ward' => 'ward',
            'requests' => 'requests',
            'site_types' => 'site_types',
            'trades' => 'trades',
        );
        $sql = '';
        foreach ($tables as $table) {
            if (!isset($ignores[$table]))
                $sql.='DELETE FROM ' . $table . ' WHERE site_id=' . $site_id . ";\n";
        }
        //
        if ($sql) {
            $transaction = Yii::app()->db->beginTransaction();
            try {
                Yii::app()->db->createCommand($sql)->execute();
                $transaction->commit();
                Yii::app()->cache->delete(ClaSite::CACHE_SITEINFO_PRE . $site_id);
                return true;
            } catch (Exception $e) {
                echo 'Have errors';
                $transaction->rollback();
                Yii::app()->end();
            }
        }
        return false;
    }

    /**
     * get languages_for_site of this object
     */
    function getLanguageForSite() {
        $results = array();
        if ($this->languages_for_site) {
            $languages_for_sites = explode(' ', $this->languages_for_site);
            foreach ($languages_for_sites as $lfs)
                $results[$lfs] = $lfs;
        }
        return $results;
    }

    /**
     * return status arr
     */
    function getStatusArr() {
        return array(
            1 => Yii::t('common', 'Không khóa site'),
            ClaSite::SITE_STATUS_DISABLE => Yii::t('common', 'Khóa site'),
        );
    }

}
