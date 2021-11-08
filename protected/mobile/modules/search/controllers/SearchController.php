<?php

class SearchController extends PublicController {

    public $layout = '//layouts/search';

    /**
     * tìm kiếm
     */
    public function actionSearch() {
        $keyword = trim(Yii::app()->request->getParam(ClaSite::SEARCH_KEYWORD));
        if (!$keyword)
            $keyword = '';
        if ($keyword && mb_strlen($keyword) >= ClaSite::SEARCH_MIN_LENGHT) {
            $data = array();
            $totalcount = 0;
            $pagesize = Yii::app()->params['defaultPageSize'];
            $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
            $view = '';
            $type = Yii::app()->request->getParam(ClaSite::SEARCH_TYPE);
            $sitetypes = ClaSite::getSiteTypes();
            if (!isset($sitetypes[$type]))
                $type = '';
            //
            if (!$type)
                $type = Yii::app()->siteinfo['site_type'];
            switch ($type) {
                case ClaSite::SITE_TYPE_INTRODUCE: {
                        // Ưu tiên tìm sản phẩm
                        $view = 'product';
                        $data = Product::SearchProducts(array(
                                    ClaSite::SEARCH_KEYWORD => $keyword,
                                    ClaSite::PAGE_VAR => $page,
                                    'limit' => $pagesize,
                        ));
                        $totalcount = count($data);
                        if ($totalcount || $page != 1) {
                            $totalcount = Product::searchTotalCount(array(
                                        ClaSite::SEARCH_KEYWORD => $keyword,
                            ));
                        }
                        // Nếu không tìm thấy sản phẩm nào thì sẽ tìm tin tức
                        if (!$totalcount) {
                            $view = 'news';
                            $data = News::SearchNews(array(
                                        ClaSite::SEARCH_KEYWORD => $keyword,
                                        ClaSite::PAGE_VAR => $page,
                                        'limit' => $pagesize,
                            ));
                            $totalcount = count($data);
                            if ($totalcount || $page != 1) {
                                $totalcount = News::searchTotalCount(array(
                                            ClaSite::SEARCH_KEYWORD => $keyword,
                                ));
                            }
                        }
                    }break;
                case ClaSite::SITE_TYPE_NEWS: {
                        $view = 'news';
                        $data = News::SearchNews(array(
                                    ClaSite::SEARCH_KEYWORD => $keyword,
                                    ClaSite::PAGE_VAR => $page,
                                    'limit' => $pagesize,
                        ));
                        $totalcount = count($data);
                        if ($totalcount || $page != 1) {
                            $totalcount = News::searchTotalCount(array(
                                        ClaSite::SEARCH_KEYWORD => $keyword,
                            ));
                        }
                    }break;

                case ClaSite::SITE_TYPE_ECONOMY: {
                        $view = 'product';
                        $data = Product::SearchProducts(array(
                                    ClaSite::SEARCH_KEYWORD => $keyword,
                                    ClaSite::PAGE_VAR => $page,
                                    'limit' => $pagesize,
                        ));
                        $totalcount = count($data);
                        if ($totalcount || $page != 1) {
                            $totalcount = Product::searchTotalCount(array(
                                        ClaSite::SEARCH_KEYWORD => $keyword,
                            ));
                        }
                    }break;
            }
            //
            $this->breadcrumbs = array(
                Yii::t('common', 'search') => Yii::app()->request->url,
            );
            //
            $this->render($view, array(
                'data' => $data,
                'totalitem' => $totalcount,
                'limit' => $pagesize,
                'keyword' => $keyword,
            ));
            //
        } else {
            $this->render('error', array(
                'error' => Yii::t('common', 'search_keyword_invalid'),
            ));
        }
    }

}
