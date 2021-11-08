<?php

class ProductController extends PublicController {

    public $layout = '//layouts/product';

    /**
     * product index
     */
    public function actionIndex() {
        //
        $this->layoutForAction = '//layouts/product_index';
        //
        $this->breadcrumbs = array(
            Yii::t('product', 'product') => Yii::app()->createUrl('/economy/product'),
        );
        $this->render('index');
    }

    /**
     * product home
     */
    public function actionHome() {
        $this->breadcrumbs = array(
            Yii::t('product', 'product') => Yii::app()->createUrl('/economy/product/home'),
        );
        $this->render('home');
    }

    /**
     * Product detail
     * @param type $id
     */
    public function actionDetail($id) {
        //
        $this->layoutForAction = '//layouts/product_detail';
        //
        $product = Product::model()->findByPk($id);
        if (!$product)
            $this->sendResponse(404);
        if ($product->site_id != $this->site_id)
            $this->sendResponse(404);
        //
        if (!$product->product_desc || $product->product_desc == '')
            $product->product_desc = $product->product_info->product_desc;
        if (!$product->product_sortdesc || $product->product_sortdesc == '')
            $product->product_sortdesc = $product->product_info->product_sortdesc;

        //
        $this->pageTitle = $this->metakeywords = $product->name;
        $this->metadescriptions = $product->product_sortdesc;
        if (isset($product->product_info->meta_keywords))
            $this->metakeywords = $product->product_info->meta_keywords;
        if (isset($product->product_info->meta_description))
            $this->metadescriptions = $product->product_info->meta_description;
        if ($product->product_info->meta_title)
            $this->metaTitle = $product->product_info->meta_title;
        //
        $category = ProductCategories::model()->findByPk($product->product_category_id);
        $attributesShow = null;
        if ($category) {
            // get product category
            $categoryClass = new ClaCategory(array('type' => ClaCategory::CATEGORY_PRODUCT, 'create' => true));
            $categoryClass->application = 'public';
            $track = $categoryClass->saveTrack($product->product_category_id);
            $track = array_reverse($track);
            //
            foreach ($track as $tr) {
                $item = $categoryClass->getItem($tr);
                if (!$item)
                    continue;
                $this->breadcrumbs [$item['cat_name']] = Yii::app()->createUrl('/economy/product/category', array('id' => $item['cat_id'], 'alias' => $item['alias']));
            }
            //
            $attributesShow = ProductAttributeSet::model()->getAttributesBySet($category->attribute_set_id);
        }
        $link = Yii::app()->createUrl('/economy/product/detail', array('id' => $id, 'alias' => $product->alias));
        //
        Yii::app()->clientScript->registerScript('prosta', ''
                . 'jQuery(document).ready(function(){ setTimeout(function(){$("body").append("<img style=\"display: none; with: 0px; height: 0px;\" rel=\"nofollow\" src=\"' . Yii::app()->createUrl('/economy/product/viewed', array('id' => $id)) . '\" />");},300);})'
        );
        //
        $albums = Albums::getImages($product['location']);

        $this->render('detail', array(
            'model' => $product,
            'product' => $product->attributes + array('price_text' => Product::getPriceText($product->attributes), 'price_market_text' => Product::getPriceText($product->attributes, 'price_market'), 'price_save_text' => Product::getPriceText($product->attributes, 'price_save')),
            'category' => $category,
            'albums' => $albums,
            'attributesShow' => $attributesShow,
            'link' => $link,
        ));
    }
    /**
     * Product info
     * @param type $id
     */
    public function actionGetproductinfo($id) {
        //
        if (Yii::app()->request->isAjaxRequest) {
            //
            $product = Product::model()->findByPk($id);
            if (!$product)
                $this->jsonResponse(404);
            if ($product->site_id != $this->site_id)
                $this->jsonResponse(404);
            //
            if (!$product->product_desc || $product->product_desc == '')
                $product->product_desc = $product->product_info->product_desc;
            if (!$product->product_sortdesc || $product->product_sortdesc == '')
                $product->product_sortdesc = $product->product_info->product_sortdesc;
            //
            $category = ProductCategories::model()->findByPk($product->product_category_id);
            $attributesShow = null;
            if ($category) {
                //
                $attributesShow = ProductAttributeSet::model()->getAttributesBySet($category->attribute_set_id);
            }
            $link = Yii::app()->createUrl('/economy/product/detail', array('id' => $id, 'alias' => $product->alias));
            //
            Yii::app()->clientScript->registerScript('prosta', ''
                    . 'jQuery(document).ready(function(){ setTimeout(function(){$("body").append("<img style=\"display: block; with: 0px; height: 0px;\" src=\"' . Yii::app()->createUrl('/economy/product/viewed', array('id' => $id)) . '\" />");},300);})'
            );
            //
            $html = $this->renderPartial('ajax-product-info', array(
                'model' => $product,
                'product' => $product->attributes + array('price_text' => Product::getPriceText($product->attributes), 'price_market_text' => Product::getPriceText($product->attributes, 'price_market')),
                'attributesShow' => $attributesShow,
                'link' => $link,
                    ), true);

            $this->jsonResponse(200, array(
                'html' => $html,
            ));
        }
    }

    /**
     * Product category
     * @param type $id
     */
    public function actionCategory($id) {
        //
        $this->layoutForAction = '//layouts/product_category';
        //
        $category = ProductCategories::model()->findByPk($id);
        if (!$category)
            $this->sendResponse(404);
        if ($category->site_id != $this->site_id)
            $this->sendResponse(404);
        $this->metakeywords = $this->metaTitle = $this->pageTitle = $category->cat_name;
        $this->metadescriptions = $category->cat_description;
        if (isset($category->meta_keywords) && $category->meta_keywords)
            $this->metakeywords = $category->meta_keywords;
        if (isset($category->meta_description) && $category->meta_description)
            $this->metadescriptions = $category->meta_description;
        if (isset($category->meta_title) && $category->meta_title)
            $this->metaTitle = $category->meta_title;
        // get product category
        $categoryClass = new ClaCategory(array('type' => ClaCategory::CATEGORY_PRODUCT, 'create' => true));
        $categoryClass->application = 'public';
        $tracks = $categoryClass->getTrackCategory($id);
        //
        foreach ($tracks as $tr) {
            $this->breadcrumbs [$tr['cat_name']] = Yii::app()->createUrl('/economy/product/category', array('id' => $tr['cat_id'], 'alias' => $tr['alias']));
        }
        //        
        $pagesize = ProductHelper::helper()->getPageSize();
        $page = ProductHelper::helper()->getCurrentPage();
        $order = ProductHelper::helper()->getOrderQuery();
        if ($category->attribute_set_id) {
            $where = FilterHelper::helper()->buildFilterWhere($category->attribute_set_id);
        } else {
            $where = '';
        }
        //
        $products = Product::getProductsInCate($id, array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
                    'order' => $order,
                    'condition' => $where,
        ));
        //
        $totalitem = Product::countProductsInCate($id, $where);
        //
        $this->render('category', array(
            'products' => $products,
            'category' => $category->attributes,
            'categoryClass' => $categoryClass,
            'totalitem' => $totalitem,
            'limit' => $pagesize,
        ));
    }

    /**
     * Product category
     * @param type $id
     */
    public function actionCategorySearch($id) {
        //        
        $this->layoutForAction = '//layouts/product_search';
        //
        $category = ProductCategories::model()->findByPk($id);
        if (!$category)
            $this->sendResponse(404);
        if ($category->site_id != $this->site_id)
            $this->sendResponse(404);
        $attributesShow = ProductAttributeSet::model()->getAttributesBySet($category->attribute_set_id, 'is_frontend=1');
        $this->metakeywords = $this->metaTitle = $this->pageTitle = $category->cat_name;
        $this->metadescriptions = $category->cat_description;
        if (isset($category->meta_keywords) && $category->meta_keywords)
            $this->metakeywords = $category->meta_keywords;
        if (isset($category->meta_description) && $category->meta_description)
            $this->metadescriptions = $category->meta_description;
        if (isset($category->meta_title) && $category->meta_title)
            $this->metaTitle = $category->meta_title;
        // get product category
        $categoryClass = new ClaCategory(array('type' => ClaCategory::CATEGORY_PRODUCT, 'create' => true));
        $categoryClass->application = 'public';
        $track = $categoryClass->saveTrack($id);
        $track = array_reverse($track);
        //
        foreach ($track as $tr) {
            $item = $categoryClass->getItem($tr);
            if (!$item)
                continue;
            $this->breadcrumbs [$item['cat_name']] = Yii::app()->createUrl('/economy/product/category', array('id' => $item['cat_id'], 'alias' => $item['alias']));
        }
        //
        $pagesize = (int) Yii::app()->request->getParam('psize', 24);
        $pagesize = ($pagesize > 0) ? $pagesize : 24;
        //$pagesize = 3;
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        //        
        if ($category->attribute_set_id) {
            $where = FilterHelper::helper()->buildFilterWhere($category->attribute_set_id);
            $order = FilterHelper::helper()->buildFilterOrder();
            if (!$order) {
                $order = 'cus_field23 DESC, created_time DESC';
            }
        } else {
            $where = '';
            $order = '';
        }
        $products = Product::getProductsInCate($id, array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
                    'condition' => $where,
                    'order' => $order,
        ));
        //
        $totalitem = Product::countProductsInCate($id, $where);
        //
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->getBaseUrl() . '/js/site/economy/global.js');
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial('category_search', array(
                'products' => $products,
                'attributesShow' => $attributesShow,
                'category' => $category->attributes,
                'totalitem' => $totalitem,
                'limit' => $pagesize,
            ));
        } else {
            $this->render('category_search', array(
                'products' => $products,
                'attributesShow' => $attributesShow,
                'category' => $category->attributes,
                'totalitem' => $totalitem,
                'limit' => $pagesize,
            ));
        }
    }

    public function actionAjaxProHover($id, $att_set_id) {
        if (!Yii::app()->request->isAjaxRequest) {
            Yii::app()->end();
        }
        $product_id = (int) Yii::app()->request->getParam('id', 0);
        $att_set_id = (int) Yii::app()->request->getParam('att_set_id', 0);
        if (!$att_set_id || !$product_id)
            Yii::app()->end();
        $product = ($product_id) ? Product::model()->findByPk($product_id) : null;
        if (!$product)
            Yii::app()->end();
        if ($product->site_id != $this->site_id)
            Yii::app()->end();

        $attributesShow = ($att_set_id) ? ProductAttributeSet::model()->getAttributesBySet($att_set_id, 'is_frontend=1') : null;
        $attributesDynamic = AttributeHelper::helper()->getDynamicProduct($product, $attributesShow);
        if (!empty($attributesShow)) {
            foreach ($attributesShow as $key => $value) {
                $attributesShow[$key]['value'] = isset($attributesDynamic[$key]['value']) ? $attributesDynamic[$key]['value'] : '';
            }
        }
        $pro = $product->getAttributes();
        $pro['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $pro['id'], 'alias' => $pro['alias']));
        $this->renderPartial('ajax_pro_hover', array('pro' => $pro, 'attributesShow' => $attributesShow));
    }

    /**
     * Lưu lại sản phẩm người dùng đã xem và tăng lượng người dùng xem sản phẩm
     */
    function actionViewed($id) {
        $product = Product::model()->findByPk($id);
        if (!$product)
            $this->sendResponse(404);
        if ($product->site_id != $this->site_id)
            $this->sendResponse(404);
        //
        $productSession = Yii::app()->user->getState('productSession');
        $productSession = ($productSession) ? $productSession : array();
        if (!isset($productSession[$id])) {
            //
            $productSession[$id] = $product['name'];
            Yii::app()->user->setState('productSession', $productSession);
            Product::setViewedProduct($id, array('id' => $id, 'alias' => $product['alias'], 'name' => $product['name'], 'price' => $product['price'], 'avatar_path' => $product['avatar_path'], 'avatar_name' => $product['avatar_name']));
            $product->viewed+=1;
            $product->save(false);
            //
        }
        Yii::app()->end();
    }

    // Xem trang chi tiết khuyến mãi của sản phẩm
    function actionPromotion($id) {
        $this->layoutForAction = '//layouts/product_promotion';
        $promotion = Promotions::model()->findByPk($id);
        if (!$promotion)
            $this->sendResponse(404);
        if ($promotion->site_id != $this->site_id)
            $this->sendResponse(404);

        $this->breadcrumbs = array(
            $promotion->name => Yii::app()->createUrl('/economy/product/promotion', array('id' => $id, 'alias' => $promotion->alias)),
        );
        //
        $this->pageTitle = $promotion->name;
        $this->metakeywords = $promotion->name;
        $this->metadescriptions = $promotion->sortdesc;
        if ($promotion->meta_keywords)
            $this->metakeywords = $promotion->meta_keywords;
        if ($promotion->meta_description)
            $this->metadescriptions = $promotion->meta_description;
        //        
        $pagesize = ProductHelper::helper()->getPageSize();
        $page = ProductHelper::helper()->getCurrentPage();
        //
        $products = Promotions::getProductInPromotion($id, array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
        ));
        $totalitem = Promotions::countProductInPromotion($id);
        //
        $this->render('promotion', array(
            'promotion' => $promotion,
            'products' => $products,
            'totalitem' => $totalitem,
            'limit' => $pagesize,
        ));
    }

    /**
     * sản phẩm trong nhóm
     * @param type $id
     */
    function actionGroup($id) {
        $this->layoutForAction = '//layouts/product_group';
        $productGroup = ProductGroups::model()->findByPk($id);
        if (!$productGroup)
            $this->sendResponse(404);
        if ($productGroup->site_id != $this->site_id)
            $this->sendResponse(404);
        $this->breadcrumbs = array(
            $productGroup->name => Yii::app()->createUrl('/economy/product/promotion', array('id' => $id, 'alias' => $productGroup->alias)),
        );
        //
        $this->pageTitle = $productGroup->name;
        $this->metakeywords = $productGroup->name;
        $this->metadescriptions = $productGroup->name;
        $this->metaTitle = $productGroup->name;
        if ($productGroup->meta_keywords)
            $this->metakeywords = $productGroup->meta_keywords;
        if ($productGroup->meta_description)
            $this->metadescriptions = $productGroup->meta_description;
        if ($productGroup->meta_title)
            $this->metaTitle = $productGroup->meta_title;
        //        
        $pagesize = ProductHelper::helper()->getPageSize();
        $page = ProductHelper::helper()->getCurrentPage();
        //
        $products = ProductGroups::getProductInGroup($id, array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
        ));
        $totalitem = ProductGroups::countProductInGroup($id);
        //
        $this->render('group', array(
            'group' => $productGroup,
            'products' => $products,
            'totalitem' => $totalitem,
            'limit' => $pagesize,
        ));
    }

}
