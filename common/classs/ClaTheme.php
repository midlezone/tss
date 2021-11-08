<?php

/**
 * Manage theme and config of it
 *
 * @author minhbn
 */
class ClaTheme {

    /**
     * Get loại module
     * @param type $theme_name
     * @return array
     */
    static function getWidgetTypes($theme_name = null) {
        if (!$theme_name)
            $theme_name = Yii::app()->theme->name;
        $moduletypes = array(
            'w3n0010' => array(
                'html' => Yii::t('widget', 'html'),
                'menu' => Yii::t('widget', 'menu'),
                'menu_vertical' => Yii::t('widget', 'menu_vertical'),
                'menufooter' => Yii::t('widget', 'menufooter'),
                'banner' => Yii::t('widget', 'banner'),
                'bannergroup' => Yii::t('widget', 'bannergroup'),
                'categorybox' => Yii::t('widget', 'category'),
                'categoryinhome' => Yii::t('widget', 'categoryinhome'),
                'homenewscategorydetail' => Yii::t('widget', 'homenewscategorydetail'),
                'hotnews' => Yii::t('widget', 'hotnews'),
                'newnews' => Yii::t('widget', 'newnews'),
                'newsall' => Yii::t('widget', 'newsall'),
                'newsrelation' => Yii::t('widget', 'newsrelation'),
                'hotproduct' => Yii::t('widget', 'hotproduct'),
                'productall' => Yii::t('widget', 'productall'),
                'productIncategory' => Yii::t('widget', 'productIncategory'),
                'productsrelation' => Yii::t('widget', 'productsrelation'),
                'newproducts' => Yii::t('widget', 'newproduct'),
                'productgroup' => Yii::t('widget', 'productgroup'),
                'productviewed' => Yii::t('widget', 'productviewed'),
                'productpromotioninhome' => Yii::t('widget', 'productpromotioninhome'),
                'productsetnew' => Yii::t('widget', 'productsetnew'),
                'productNewAndGroup' => Yii::t('widget', 'productNewAndGroup'),
                'productCategoryWithBackground' => Yii::t('widget', 'productCategoryWithBackground'),
                'categoryProductSelectFull' => Yii::t('widget', 'categoryProductSelectFull'),
                'categoryPageSub' => Yii::t('widget', 'categoryPageSub'),
                'productcategoryinhome' => Yii::t('widget', 'productcategoryinhome'),
                'productFilterInCat' => Yii::t('widget', 'productFilterInCat'),
                'useraccess' => Yii::t('widget', 'useraccess'),
                'yahoobox' => Yii::t('widget', 'yahoobox'),
                'customform' => Yii::t('widget', 'customform'),
                'onebanner' => Yii::t('widget', 'onebanner'),
                'social' => Yii::t('widget', 'social'),
                'map' => Yii::t('widget', 'map'),
                'searchbox' => Yii::t('widget', 'searchbox'),
                'introducebox' => Yii::t('widget', 'introducebox'),
                'newsletter' => Yii::t('widget', 'newsletter'),
                'logobox' => Yii::t('widget', 'logobox'),
                'shoppingcart' => Yii::t('widget', 'shoppingcart'),
                'videohot' => Yii::t('widget', 'videohot'),
                'pagesize' => Yii::t('widget', 'pagesize'),
                'scrollup' => Yii::t('widget', 'scrollup'),
                'support' => Yii::t('widget', 'support'),
                'productNewAndHot' => Yii::t('widget', 'productNewAndHot'),
                'albumsrelation' => Yii::t('widget', 'albumsrelation'),
                'albumsIncategory' => Yii::t('widget', 'albumsIncategory'),
                'courseNew' => Yii::t('widget', 'courseNew'),
                'lecturers' => Yii::t('widget', 'lecturers'),
                'courseNearOpen' => Yii::t('widget', 'courseNearOpen'),
                'courseRelation' => Yii::t('widget', 'courseRelation'),
                'supportUser' => Yii::t('widget', 'supportUser'),
                'courseall' => Yii::t('widget', 'courseall'),
                'lecturerall' => Yii::t('widget', 'lecturerall'),
                'albumshot' => Yii::t('widget', 'albumshot'),
                'realestateall' => Yii::t('widget', 'realestateall'),
                'courseCategoryInHome' => Yii::t('widget', 'courseCategoryInHome'),
                'pageContent' => Yii::t('widget', 'pageContent'),
                'shopall' => Yii::t('widget', 'shopall'),
                'hotcar' => Yii::t('widget', 'hotcar'),
            ),
            'default' => array(
                'html' => Yii::t('widget', 'html'),
                'menu' => Yii::t('widget', 'menu'),
                'menu_vertical' => Yii::t('widget', 'menu_vertical'),
                'menufooter' => Yii::t('widget', 'menufooter'),
                'banner' => Yii::t('widget', 'banner'),
                'bannergroup' => Yii::t('widget', 'bannergroup'),
                'categorybox' => Yii::t('widget', 'category'),
                'categoryinhome' => Yii::t('widget', 'categoryinhome'),
                'homenewscategorydetail' => Yii::t('widget', 'homenewscategorydetail'),
                'hotnews' => Yii::t('widget', 'hotnews'),
                'newnews' => Yii::t('widget', 'newnews'),
                'newsall' => Yii::t('widget', 'newsall'),
                'newsrelation' => Yii::t('widget', 'newsrelation'),
                'newsIncategory' => Yii::t('widget', 'newsIncategory'),
                'homepostcategorydetail' => Yii::t('widget', 'homepostcategorydetail'),
                'hotproduct' => Yii::t('widget', 'hotproduct'),
                'productall' => Yii::t('widget', 'productall'),
                'productIncategory' => Yii::t('widget', 'productIncategory'),
                'productsrelation' => Yii::t('widget', 'productsrelation'),
                'newproducts' => Yii::t('widget', 'newproduct'),
                'productgroup' => Yii::t('widget', 'productgroup'),
                'productviewed' => Yii::t('widget', 'productviewed'),
                'productpromotioninhome' => Yii::t('widget', 'productpromotioninhome'),
                'productsetnew' => Yii::t('widget', 'productsetnew'),
                'productNewAndGroup' => Yii::t('widget', 'productNewAndGroup'),
                'productCategoryWithBackground' => Yii::t('widget', 'productCategoryWithBackground'),
                'categoryProductSelectFull' => Yii::t('widget', 'categoryProductSelectFull'),
                'categoryPageSub' => Yii::t('widget', 'categoryPageSub'),
                'productcategoryinhome' => Yii::t('widget', 'productcategoryinhome'),
                'productsort' => Yii::t('widget', 'productsort'),
                'productpricerange' => Yii::t('widget', 'productpricerange'),
                'productFilterInCat' => Yii::t('widget', 'productFilterInCat'),
                'useraccess' => Yii::t('widget', 'useraccess'),
                'yahoobox' => Yii::t('widget', 'yahoobox'),
                'customform' => Yii::t('widget', 'customform'),
                'onebanner' => Yii::t('widget', 'onebanner'),
                'social' => Yii::t('widget', 'social'),
                'map' => Yii::t('widget', 'map'),
                'searchbox' => Yii::t('widget', 'searchbox'),
                'facebookcomment' => Yii::t('widget', 'Box bình luận qua facebook'),
                'introducebox' => Yii::t('widget', 'introducebox'),
                'newsletter' => Yii::t('widget', 'newsletter'),
                'logobox' => Yii::t('widget', 'logobox'),
                'shoppingcart' => Yii::t('widget', 'shoppingcart'),
                'videohot' => Yii::t('widget', 'videohot'),
                'videonew' => Yii::t('widget', 'videonew'),
                'pagesize' => Yii::t('widget', 'pagesize'),
                'jobnew' => Yii::t('widget', 'jobnew'),
                'albumnew' => Yii::t('widget', 'albumnew'),
                'imagenew' => Yii::t('widget', 'imagenew'),
                'languages' => Yii::t('widget', 'languages'),
                'scrollup' => Yii::t('widget', 'scrollup'),
                'support' => Yii::t('widget', 'support'),
                'productNewAndHot' => Yii::t('widget', 'productNewAndHot'),
                'albumsrelation' => Yii::t('widget', 'albumsrelation'),
                'albumsIncategory' => Yii::t('widget', 'albumsIncategory'),
                'courseNew' => Yii::t('widget', 'courseNew'),
                'lecturers' => Yii::t('widget', 'lecturers'),
                'courseNearOpen' => Yii::t('widget', 'courseNearOpen'),
                'courseRelation' => Yii::t('widget', 'courseRelation'),
                'supportUser' => Yii::t('widget', 'supportUser'),
                'courseall' => Yii::t('widget', 'courseall'),
                'lecturerall' => Yii::t('widget', 'lecturerall'),
                'albumshot' => Yii::t('widget', 'albumshot'),
                'realestateall' => Yii::t('widget', 'realestateall'),
				'realestateProject' => Yii::t('widget', 'realestateProject'),//add hieu
                'courseCategoryInHome' => Yii::t('widget', 'courseCategoryInHome'),
                'pageContent' => Yii::t('widget', 'pageContent'),
                'shopall' => Yii::t('widget', 'shopall'),
                'hotcar' => Yii::t('widget', 'hotcar'),
            ),
        );

        if (isset($moduletypes[$theme_name]))
            return $moduletypes[$theme_name];
        elseif ($moduletypes['default'])
            return $moduletypes['default'];
        return array();
    }

//    /**
//     * get all theme config
//     */
//    static function getAllConfig() {
//        //theme_type.theme_name
//        $postleft = Widgets::POS_LEFT;
//        $postright = Widgets::POS_RIGHT;
//        $postheader = Widgets::POS_HEADER;
//        $postfooter = Widgets::POS_FOOTER;
//        $postcenter = Widgets::POS_CENTER;
//        $configs = array(
//            'news.news' => array(
//                $postheader => array(
//                    'news/news/' => array(),
//                    'news/news/category' => array(),
//                    'news/news/detail' => array(),
//                    '/site/site/contact' => array(),
//                    '/site/site/introduce' => array(),
//                    '/site/site/qa' => array(), // Hỏi đáp
//                ),
//                $postright => array(
//                    'news/news/' => array(),
//                    'news/news/category' => array(),
//                    'news/news/detail' => array(),
//                    '/site/site/contact' => array(),
//                    '/site/site/introduce' => array(),
//                    'site/site/qa' => array(), // Hỏi đáp
//                ),
//                $postcenter => array(
//                    'news/news/' => array(
//                        array('widget_type' => Widgets::WIDGET_TYPE_SYSTEM, 'widget_id' => 'hotnews'),
//                        array('widget_type' => Widgets::WIDGET_TYPE_SYSTEM, 'widget_id' => 'homenewscategorydetail'),
//                    )
//                ),
//            ),
//            'news.w3n0010' => array(
//                $postheader => array(
//                    'news/news/' => array(),
//                    'news/news/category' => array(),
//                    'news/news/detail' => array(),
//                    '/site/site/contact' => array(),
//                    '/site/site/introduce' => array(),
//                    '/site/site/qa' => array(), // Hỏi đáp
//                ),
//                $postright => array(
//                    'news/news/' => array(),
//                    'news/news/category' => array(),
//                    'news/news/detail' => array(),
//                    '/site/site/contact' => array(),
//                    '/site/site/introduce' => array(),
//                    'site/site/qa' => array(), // Hỏi đáp
//                ),
//                $postcenter => array(
//                    'news/news/' => array(
//                        array('widget_type' => Widgets::WIDGET_TYPE_SYSTEM, 'widget_id' => 'homenewscategorydetail'),
//                    )
//                ),
//            ),
//            'introduce.w3nhat' => array(
//                $postheader => array(
//                    '/introduce/introduce' => array(),
//                    '/site/site/contact' => array(),
//                    'site/site/introduce' => array(),
//                ),
//                $postleft => array(
//                    '/introduce/introduce' => array(),
//                    '/site/site/contact' => array(),
//                    'site/site/introduce' => array(),
//                ),
//                $postfooter => array(
//                    '/introduce/introduce' => array(),
//                    '/site/site/contact' => array(),
//                    'site/site/introduce' => array(),
//                ),
//            )
//        );
//
//        return $configs;
//    }
//
//    /**
//     * get them config
//     * @param type $key
//     */
//    static function getThemConfig($key = '') {
//        $themes = self::getAllConfig();
//        if (isset($themes[$key]))
//            return $themes[$key];
//        return array();
//    }
//
//    /**
//     * 
//     * @param type $key
//     * @param type $pos
//     */
//    static function getThemeConfigFollowPos($key = '', $pos = '') {
//        $config = self::getThemConfig($key);
//        if (isset($config[$pos]))
//            return $config[$pos];
//        return array();
//    }
}
