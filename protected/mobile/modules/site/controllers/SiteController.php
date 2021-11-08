<?php

class SiteController extends PublicController {

    public $layout = '//layouts/site';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }
   public function actionTest() {
		$name = $this->postPram('name');
		$phone =$this->postPram('phone');
		  
		$subject = 'Thông báo có khách hàng đăng ký dùng thử Accare!';
		$content = '<div><b>Họ và Tên<b>: '.$name.'</div><div> <b>Số Điện Thoại<b>: '.$phone.'</div>';
		
		if ($content && $subject) {
			Yii::app()->mailer->send('', 'hieuit88@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'minhtt83@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'luongvanquan@oceanspa.vn', $subject, $content);
		}
        $this->respondStatus("Đăng Ký thành công");
	
    }
	public function actionComplete() {
		 $this->layout = 'disable';
		 
		 $name = Yii::app()->request->getQuery('name');
		 $phone = Yii::app()->request->getQuery('phone');
		 
		 $subject = 'Thông báo có khách hàng đăng ký dùng thử Accare!';
		 $content = '<div><b>Họ và Tên<b>: '.$name.'</div><div> <b>Số Điện Thoại<b>: '.$phone.'</div>';
		
		 if ($phone != '' && $name != '') {
			Yii::app()->mailer->send('', 'hieuit88@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'minhtt83@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'luongvanquan@oceanspa.vn', $subject, $content);
		 }
		 
         $this->render('complete1');
    }
	public function actionComplete2() {
		 $this->layout = 'disable';
		 
		  $name = Yii::app()->request->getQuery('name');
		 $phone = Yii::app()->request->getQuery('phone');
		 
		 $subject = 'Thông báo có khách hàng đăng ký dùng thử Accare!';
		 $content = '<div><b>Họ và Tên<b>: '.$name.'</div><div> <b>Số Điện Thoại<b>: '.$phone.'</div>';
		
		 if ($phone != '' && $name != '') {
			Yii::app()->mailer->send('', 'hieuit88@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'minhtt83@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'luongvanquan@oceanspa.vn', $subject, $content);
		 }
		 
		 
         $this->render('complete1');
    }
	public function actionComplete3() {
		 $this->layout = 'disable';
		 
		  $name = Yii::app()->request->getQuery('name');
		 $phone = Yii::app()->request->getQuery('phone');
		 
		 $subject = 'Thông báo có khách hàng đăng ký dùng thử Accare!';
		 $content = '<div><b>Họ và Tên<b>: '.$name.'</div><div> <b>Số Điện Thoại<b>: '.$phone.'</div>';
		
		 if ($phone != '' && $name != '') {
			Yii::app()->mailer->send('', 'hieuit88@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'minhtt83@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'luongvanquan@oceanspa.vn', $subject, $content);
		 }
		 
		 
         $this->render('complete1');
    }
	public function actionComplete4() {
		 $this->layout = 'disable';
		 
		 
		 $name = Yii::app()->request->getQuery('name');
		 $phone = Yii::app()->request->getQuery('phone');
		 
		 $subject = 'Thông báo có khách hàng đăng ký dùng thử Accare!';
		 $content = '<div><b>Họ và Tên<b>: '.$name.'</div><div> <b>Số Điện Thoại<b>: '.$phone.'</div>';
		
		 if ($phone != '' && $name != '') {
			Yii::app()->mailer->send('', 'hieuit88@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'minhtt83@gmail.com', $subject, $content);
			Yii::app()->mailer->send('', 'luongvanquan@oceanspa.vn', $subject, $content);
		 }
		 
		 
         $this->render('complete1');
    }
	
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    function actionNotfound() {
        $this->render('notfound');
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('common', 'contact') => Yii::app()->createUrl('/site/site/contact'),
        );
        //
        $model = new Contacts;
        if (isset($_POST['Contacts'])) {
            $model->attributes = $_POST['Contacts'];
            if ($model->validate()) {
                $model->save(false);
                Yii::app()->user->setFlash('contact', Yii::t('contact', 'contact_success_msg'));
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Giới thiệu về site
     */
    public function actionIntroduce() {
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('common', 'introduce') => Yii::app()->createUrl('/site/site/introduce'),
        );
        //
        $introduce = SiteIntroduces::getIntroduce();
        //
        $data = $introduce['description'];
        //
        $this->render('introduce', array(
            'data' => $data,
        ));
    }

    /**
     * bảng giá
     */
    function actionPricing() {
        //$this->layout = '//layouts/price';
        if ($this->site_id != ClaSite::ROOT_SITE_ID)
            Yii::app()->end();
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('site', 'pricing') => Yii::app()->createUrl('/site/site/pricing'),
        );
        $this->render('price');
    }

}
