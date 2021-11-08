<?php

class NewsController extends PublicController {

    public $layout = '//layouts/news';

    /**
     * Index
     */
    public function actionIndex() {
        $this->breadcrumbs = array(
            Yii::t('news', 'news') => Yii::app()->createUrl('/news/news'),
        );
        $this->render('index');
    }

    /**
     * View news detail
     */
    public function actionDetail($id) {
        $news = News::getNewsDetaial($id);
        if (!$news || $news['status'] == ActiveRecord::STATUS_DEACTIVED) {
            $this->sendResponse(404);
            Yii::app()->end();
        }
        if ($news['site_id'] != $this->site_id)
            $this->sendResponse(404);
        //
        $this->pageTitle = $news['news_title'];
        $this->metakeywords = $news['news_title'];
        $this->metadescriptions = $news['news_sortdesc'];
        if ($news['meta_keywords'])
            $this->metakeywords = $news['meta_keywords'];
        if ($news['meta_description'])
            $this->metadescriptions = $news['meta_description'];
        //
        $category = NewsCategories::model()->findByPk($news['news_category_id']);
        $this->breadcrumbs = array(
            $category->cat_name => Yii::app()->createUrl('/news/news/category', array('id' => $category->cat_id, 'alias' => $category->alias)),
        );
        $this->render('detail', array('news' => $news));
    }

    /**
     * View follow category
     */
    public function actionCategory($id) {
        $category = NewsCategories::model()->findByPk($id);
        if (!$category)
            $this->sendResponse(400);
        //
        $this->pageTitle = $category->cat_name;
        $this->metakeywords = $category->cat_name;
        $this->metadescriptions = $category->cat_description;
        if ($category->meta_keywords)
            $this->metakeywords = $category->meta_keywords;
        if ($category->meta_description)
            $this->metadescriptions = $category->meta_description;
        //
        $this->breadcrumbs = array(
            $category->cat_name => Yii::app()->createUrl('/news/news/category', array('id' => $category->cat_id, 'alias' => $category->alias)),
        );
        //
       
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
        //
        $listnews = News::getNewsInCategory($id, array(
                    'limit' => $pagesize,
                    ClaSite::PAGE_VAR => $page,
        ));
        //
        $totalitem = News::countNewsInCate($id);
        //
		if ($this->site_id == '1198') {
			 $pagesize = Yii::app()->params['defaultPageSize'];
			 $this->render('category1', array(
				'listnews' => $listnews,
				'limit' => $pagesize,
				'totalitem' => $totalitem,
			));
		} else {
			$pagesize = 1000;
			$this->render('category', array(
				'listnews' => $listnews,
				'limit' => $pagesize,
				'totalitem' => $totalitem,
			));
		}
    }

}
