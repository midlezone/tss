<?php

/**
 * @author minhbn <minhcoltech@gmail.com>
 * @date 09-03-2015
 * 
 * Class for manager table of site
 *
 */
class ClaTable {

    /**
     * get table with name, if name in /config/params/tables retunn tables[name];
     * return string
     */
    static function getTable($name = '', $options = array()) {
        if (!$name)
            return '';
        $tables = Yii::app()->params['tables'];
        $table = $name;
        // Nếu tên đã được định nghĩa trong /params/tables thì lấy trong đó
        if (isset($tables[$name]))
            $table = $tables[$name];
        $pre = '';
        if (!isset($options['translate']) || $options['translate']) {
            //$NoTranslateTables = self::getNoTranslateTables();
            $TranslateTables = self::getTranslateTables();
            if (isset($TranslateTables[$table])) {
                $language = '';
                // Nếu có language session thì lấy language session
                $appId = Yii::app()->getId();
                if ($appId == 'public')
                    $language = ClaSite::getPublicLanguage();
                else
                    $language = ClaSite::getBackLanguage();
                //
                if ($language && $language != 'vi')
                    $pre = $language . '_';
            }
        }
        //
        return $pre . $table;
    }

    /**
     * những table không dịch
     * @return type
     */
    static function getNoTranslateTables() {
        return array(
            'user' => 'user',
            'users_admin' => 'users_admin',
            'domains' => 'domains',
            'sites' => 'sites',
            'site_types' => 'site_types',
            'themes' => 'themes',
            'theme_images' => 'theme_images',
            'theme_categories' => 'theme_categories',
            'cache' => 'cache',
            'district' => 'district',
            'ward' => 'ward',
            'province' => 'province',
            'menus_admin' => 'menus_admin',
        );
    }

    /**
     * Những table dc translate
     */
    static function getTranslateTables() {
        return array(
            'news' => 'news',
            'news_categories' => 'news_categories',
            'posts' => 'posts',
            'post_categories' => 'post_categories',
            'categorypage' => 'categorypage',
            'menus' => 'menus',
            //'menu_groups' => 'menu_groups',
            'product_attribute_set' => 'product_attribute_set',
            'product_attribute' => 'product_attribute',
            'product_attribute_option' => 'product_attribute_option',
            'product_attribute_option_index' => 'product_attribute_option_index',
            'product' => 'product',
            'product_info' => 'product_info',
            'product_categories' => 'product_categories',
            'sites' => 'sites',
            'site_introduces' => 'site_introduces',
            //'banner_groups' => 'banner_groups',
            'banners' => 'banners',
//            'forms' => 'forms', //không dịch phần form (by dungbt)
//            'form_sessions' => 'form_sessions',
//            'form_fields' => 'form_fields',
//            'form_field_values' => 'form_field_values',
            'maps' => 'maps',
            'jobs' => 'jobs',
            'page_widgets' => 'page_widgets',
            'page_widget_config' => 'page_widget_config',
            'site_support' => 'site_support',
            'albums' => 'albums',
            'albums_categories' => 'albums_categories',
            //'images' => 'images',
            'videos' => 'videos',
            'edu_course' => 'edu_course',
            'edu_course_register' => 'edu_course_register',
            'edu_course_categories' => 'edu_course_categories',
            'edu_lecturer' => 'edu_lecturer',
            'banner_partial' => 'banner_partial',
            'site_users' => 'site_users',
            'contact_form' => 'contact_form',
            'product_configurable_images' => 'product_configurable_images',
            'real_estate' => 'real_estate',
            'real_estate_project' => 'real_estate_project',
            'real_estate_categories' => 'real_estate_categories',
            'real_estate_news' => 'real_estate_news',
            'sms_customer' => 'sms_customer',
            'sms_customer_group' => 'sms_customer_group',
            'sms' => 'sms',
            'order_tranports' => 'order_tranports',
            'sms_detail' => 'sms_detail',
            'sms_provider' => 'sms_provider',
            'shop' => 'shop',
            'shop_product_category' => 'shop_product_category',
            'shop_images' => 'shop_images',
            'car_categories' => 'car_categories',
            'car' => 'car',
            'car_info' => 'car_info',
            'car_images' => 'car_images',
            'car_attribute' => 'car_attribute',
            'likes' => 'likes',
        );
    }

}
