<?php

class SearchController extends PublicController {

    public $layout = '//layouts/search';

    /**
     * tìm kiếm
     */
    public function actionSearch() {
        $keyword = trim(Yii::app()->request->getParam(ClaSite::SEARCH_KEYWORD));

		$area = trim(Yii::app()->request->getParam('area'));
		$category = trim(Yii::app()->request->getParam('category'));
		$city = trim(Yii::app()->request->getParam('city'));
		$price = trim(Yii::app()->request->getParam('price'));
		$name = trim(Yii::app()->request->getParam('name'));
		$code = trim(Yii::app()->request->getParam('code'));
		$hotel =  trim(Yii::app()->request->getParam('hotel'));
		$province_id =  trim(Yii::app()->request->getParam('province_id'));
		$district_id =  trim(Yii::app()->request->getParam('district_id'));
		$imei =  trim(Yii::app()->request->getParam('imei'));
		
		$keyword = trim(Yii::app()->request->getParam('t'));
		
        $site_id = Yii::app()->controller->site_id;
		
        if (!$keyword) {
            $keyword = '';
        }
		
        //if ($keyword && mb_strlen($keyword) >= ClaSite::SEARCH_MIN_LENGHT) {
            $data = array();
            $totalcount = 0;
            $pagesize = (isset(Yii::app()->siteinfo['pagesize'])) ? Yii::app()->siteinfo['pagesize'] : Yii::app()->params['defaultPageSize'];
            $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
            $view = '';
            $type = Yii::app()->request->getParam(ClaSite::SEARCH_TYPE);
            $sitetypes = ClaSite::getSiteTypes();
            if (!isset($sitetypes[$type])) {
                $type = '';
            }
            $cat = Yii::app()->request->getParam(ClaCategory::CATEGORY_KEY);
            //
            if (!$type) {
                $type = Yii::app()->siteinfo['site_type'];
            }
            switch ($type) {
                case ClaSite::SITE_TYPE_INTRODUCE: {
						if ($site_id == 1240) {
							$view = 'news';
							$data = News::SearchNews(array(
										ClaSite::SEARCH_KEYWORD => $keyword,
										ClaSite::PAGE_VAR => $page,
										'limit' => 100,
										ClaCategory::CATEGORY_KEY => $cat,
							));
						
							$totalcount = count($data);
							if ($totalcount || $page != 1) {
								$totalcount = News::searchTotalCount(array(
											ClaSite::SEARCH_KEYWORD => $keyword,
											ClaCategory::CATEGORY_KEY => $cat,
								));
							}
						
						} elseif ($site_id == 912) {
							$view = 'realestate';
							 // Ưu tiên tìm sản phẩm
							$view = 'realestate';
							$data = RealEstate::SearchRealestate(array(
										'name' => $name,
										'area' => $area,
										'category' => $category,
										'city' => $city,
										'price' => $price,
										'code' => $code,
										'province_id' => $province_id,
										'district_id' => $district_id,
										ClaSite::PAGE_VAR => $page,
										'limit' => $pagesize,
										ClaCategory::CATEGORY_KEY => $cat,
							));
							$totalcount = count($data);
							if ($totalcount || $page != 1) {
								$totalcount = RealEstate::searchTotalCount(array(
											'name' => $name,
											'area' => $area,
											'category' => $category,
											'city' => $city,
											'price' => $price,
											'code' => $code,
											'province_id' => $province_id,
											'district_id' => $district_id,
											ClaCategory::CATEGORY_KEY => $cat,
								));
							}
							
						} elseif ($site_id == 1121) {
							// Ưu tiên tìm sản phẩm
							$view = 'imei';
							$data1 = Product::SearchProductsImei(array(
										'imei' => $imei,
										ClaSite::PAGE_VAR => $page,
										'limit' => $pagesize,
										ClaCategory::CATEGORY_KEY => $cat,
							));
							$totalcount = count($data);
							if ($totalcount || $page != 1) {
								$totalcount = Product::searchTotalCount(array(
											'imei' => $imei,
											ClaCategory::CATEGORY_KEY => $cat,
								));
							}
									
							
						} else {
							// Ưu tiên tìm sản phẩm
							$view = 'product';
							$data = Product::SearchProducts(array(
										ClaSite::SEARCH_KEYWORD => $keyword,
										ClaSite::PAGE_VAR => $page,
										'limit' => $pagesize,
										ClaCategory::CATEGORY_KEY => $cat,
							));
							$totalcount = count($data);
							if ($totalcount || $page != 1) {
								$totalcount = Product::searchTotalCount(array(
											ClaSite::SEARCH_KEYWORD => $keyword,
											ClaCategory::CATEGORY_KEY => $cat,
								));
							}
							
							
							 
							// Nếu không tìm thấy sản phẩm nào thì sẽ tìm tin tức
							if (!$totalcount) {
								$view = 'news';
								$data = News::SearchNews(array(
											ClaSite::SEARCH_KEYWORD => $keyword,
											ClaSite::PAGE_VAR => $page,
											'limit' => $pagesize,
											ClaCategory::CATEGORY_KEY => $cat,
								));
								$totalcount = count($data);
								if ($totalcount || $page != 1) {
									$totalcount = News::searchTotalCount(array(
												ClaSite::SEARCH_KEYWORD => $keyword,
												ClaCategory::CATEGORY_KEY => $cat,
									));
								}
							}
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
				'order' => $data1,			
									
            ));
            //
        // } else {
            // $this->render('error', array(
                // 'error' => Yii::t('common', 'search_keyword_invalid'),
            // ));
        // }
    }

}
