<?php

class NewsController extends PublicController {

    public $layout = '//layouts/news';

    /**
     * Index
     */
    public function actionIndex() {
		if ($this->site_id  == '1250') {
			$site_id = 1250;
			$question = $_POST['question-'];
			
			$edu_course = Yii::app()->db->createCommand()->select('p.sort_description,p.id')
					->from(ClaTable::getTable('edu_course as p'))
					->where('p.site_id= "'.$site_id.'" ')
					->queryAll();

			foreach ($edu_course as $value) {
				$data[$value['id']] = $value['sort_description'];
			}
			
			$count = count($data);
			$score = 0;
			
			for ($i = 1; $i <= 10000; $i++) {
				$question = $_POST['question-'.$i];
				if ($question != '' && $question == $data[$i]) {
					$score += 1;
				}
			}
			
			$this->render('index2', array(
			
				'score' => $score,
				'total' => $total,
				
			));
			
		} else {
			$this->breadcrumbs = array(
						Yii::t('news', 'news') => Yii::app()->createUrl('/news/news'),
					);
					//$this->render('index');
			//        $sitetypename = ClaSite::getSiteTypeName(Yii::app()->siteinfo);
			//        $themename = Yii::app()->theme->name;
			//        $configs = ClaTheme::getThemeConfigFollowPos($sitetypename . '.' . $themename, Widgets::POS_CENTER);
			//        $linkkey = ClaSite::getLinkKey();
			//        $widgets = isset($configs[$linkkey]) ? $configs[$linkkey] : array();
					$this->render('index', array(
							//'widgets' => $widgets,
					));
		}
        
    }
	
    /**
     * news home
     */
    public function actionHome() {
        $this->breadcrumbs = array(
            Yii::t('news', 'news') => Yii::app()->createUrl('/news/news'),
        );
        $this->render('home', array());
    }

    /**
     * View news detail
     */
    public function actionDetail($id) {
        $news = News::getNewsDetaial($id);
       // if (!$news || $news['status'] == ActiveRecord::STATUS_DEACTIVED) {
            //$this->sendResponse(404);
           // Yii::app()->end();
        //}
        if ($news['site_id'] != $this->site_id)
            $this->sendResponse(404);
        //
        $this->pageTitle = $this->metakeywords = $news['news_title'];
        $this->metadescriptions = $news['news_sortdesc'];
        if (isset($news['meta_keywords']) && $news['meta_keywords'])
            $this->metakeywords = $news['meta_keywords'];
        if (isset($news['meta_description']) && $news['meta_description'])
            $this->metadescriptions = $news['meta_description'];
        if (isset($news['meta_title']) && $news['meta_title'])
            $this->metaTitle = $news['meta_title'];
        if ($news['image_path'] && $news['image_name']) {
            $this->addMetaTag(ClaHost::getImageHost() . $news['image_path'] . 's1000_1000/' . $news['image_name'], 'og:image', null, array('property' => 'og:image'));
        }
        $this->addMetaTag('article', 'og:type', null, array('property' => 'og:type'));
        //
        $category = NewsCategories::model()->findByPk($news['news_category_id']);
        $this->breadcrumbs = array(
            $category->cat_name => Yii::app()->createUrl('/news/news/category', array('id' => $category->cat_id, 'alias' => $category->alias)),
        );
		if ($this->site_id == 1136) {
			 $this->render('detail1', array('news' => $news));
		} else {
			 $this->render('detail', array('news' => $news));
		}
       
    }

    /**
     * View follow category
     */
    public function actionCategory($id) {
        $category = NewsCategories::model()->findByPk($id);
        if (!$category)
            $this->sendResponse(404);
        //
		
        $this->pageTitle = $this->metakeywords = $category->cat_name;
        $this->metadescriptions = $category->cat_description;
        if (isset($category->meta_keywords) && $category->meta_keywords)
            $this->metakeywords = $category->meta_keywords;
        if (isset($category->meta_description) && $category->meta_description)
            $this->metadescriptions = $category->meta_description;
        if (isset($category->meta_title) && $category->meta_title)
            $this->metaTitle = $category->meta_title;
        //
        $this->breadcrumbs = array(
            $category->cat_name => Yii::app()->createUrl('/news/news/category', array('id' => $category->cat_id, 'alias' => $category->alias)),
        );
        //
        $pagesize = Yii::app()->params['defaultPageSize'];
        $page = Yii::app()->request->getParam(ClaSite::PAGE_VAR);
	
        //
		if ($this->site_id == '1136') {
			    //
				$listnews = News::getNewsInCategory($id, array(
							'limit' => '100',
							ClaSite::PAGE_VAR => $page,
				));
				//
				$totalitem = News::countNewsInCate($id);
		
			$this->render('category1', array(
				'listnews' => $listnews,
				'limit' => $pagesize,
				'totalitem' => $totalitem,
				'category' => $category,
			));
		} elseif ($this->site_id == '1198') {
                //
                $listnews = News::getNewsInCategory($id, array(
                            'limit' => $pagesize,
                            ClaSite::PAGE_VAR => $page,
                ));
                //
                $totalitem = News::countNewsInCate($id);
        
            $this->render('category2', array(
                'listnews' => $listnews,
                'limit' => $pagesize,
                'totalitem' => $totalitem,
                'category' => $category,
            ));
        } else {
			    //
			if ($this->site_id == '1182') {
				
				$listnews = News::getNewsInCategory($id, array(
						'limit' => '100',
						ClaSite::PAGE_VAR => $page,
				));
			} else {
				$listnews = News::getNewsInCategory($id, array(
						'limit' => $pagesize,
						ClaSite::PAGE_VAR => $page,
				));
			}
			
			//
			$totalitem = News::countNewsInCate($id);
			
	
			$this->render('category', array(
				'listnews' => $listnews,
				'limit' => $pagesize,
				'totalitem' => $totalitem,
				'category' => $category,
			));
		}
      
    }

}
