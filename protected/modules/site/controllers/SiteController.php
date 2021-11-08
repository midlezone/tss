<?php

class SiteController extends PublicController {

    public $layout = '//layouts/site';
    public $requestCheck = 'http://www.whois.net.vn/whois.php?domain=';
    public $requestInfo  = 'https://www.matbao.net/ViewWhois.aspx?domain=';

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

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layoutForAction = '//layouts/site_error';
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else {
                if ($error['code'] == 404)
                    Yii::app()->clientScript->registerScript('notfound', 'setTimeout(function(){window.location.href="' . Yii::app()->homeUrl . '"},3500)');
                $this->render('error', $error);
            }
        }
    }

    function actionNotfound() {
        $this->layoutForAction = '//layouts/site_notfound';
        Yii::app()->clientScript->registerScript('notfound', 'setTimeout(function(){window.location.href="' . Yii::app()->homeUrl . '"},3500)');
        $this->render('notfound');
    }
	
	
    /**
     * nhận mail
     */
    function actionReceivenewsletter() {
        //
        $this->layoutForAction = '//layouts/site_receivenewsletter';
        //
        $model = new Newsletters();
        $isAjax = Yii::app()->request->isAjaxRequest;
        $model->site_id = $this->site_id;
        //
        if (isset($_POST['Newsletters'])) {
            $model->attributes = $_POST['Newsletters'];
            if ($model->save()) {
                if ($isAjax)
                    $this->jsonResponse(200, array(
                        'message' => '<p class="text-success">' . Yii::t('notice', 'receive_newsletter_success') . '</p>',
                    ));
                else {
                    Yii::app()->user->setFlash('success', Yii::t('common', 'sendsuccess'));
                    $this->redirect(Yii::app()->homeUrl);
                }
            } else {
                if ($isAjax)
                    $this->jsonResponse(400, array(
                        'errors' => $model->getJsonErrors(),
                    ));
            }
        }
    }
	 public function actionTest() {
	
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
     * Displays the contact page
     */
    public function actionContact() {
        //
		
        $this->layoutForAction = '//layouts/site_contact';
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
        $this->render('contact');
    }

    public function actionIntroduce() {
        //
        $this->layoutForAction = '//layouts/site_introduce';
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

    function actionPricing() {
        //
        $this->layoutForAction = '//layouts/site_price';
        //
        if ($this->site_id != ClaSite::ROOT_SITE_ID)
            Yii::app()->end();
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('site', 'pricing') => Yii::app()->createUrl('/site/site/pricing'),
        );
        $this->render('price');
    }

    function actionReseller() {
        //
        $this->layoutForAction = '//layouts/site_reseller';
        //
        if ($this->site_id != ClaSite::ROOT_SITE_ID)
            Yii::app()->end();
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('site', 'reseller') => Yii::app()->createUrl('/site/site/reseller'),
        );
        $this->render('reseller');
    }
    /**
     * set language for site
     */
    function actionDomain() {
        //
        $this->layoutForAction = '//layouts/site_domain';
        //
        if ($this->site_id != ClaSite::ROOT_SITE_ID)
            Yii::app()->end();
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('site', 'domainname') => Yii::app()->createUrl('/site/site/domain'),
        );
        $this->render('domain');
    }
    /**
     * set language for site
     */
    function actionSetlanguage() {
        if (Yii::app()->request->isAjaxRequest) {
            if (ClaSite::isMultiLanguage()) {
                $language = Yii::app()->request->getParam(ClaSite::LANGUAGE_KEY);
                $actionKey = Yii::app()->request->getParam(ClaSite::LANGUAGE_ACTION_KEY);
                if ($actionKey) {
                    $actionKey = json_decode(base64_decode($actionKey), true);
                }
                $languages = ClaSite::getLanguagesForSite();
                if (isset($languages[$language])) {
                    if (ClaSite::setPublicLanguageSession($language)) {
                        Yii::app()->language = $language;
                        Yii::app()->urlManager->addRules(ClaSite::getPublicSiteRules(), false);
                    }
                    $redirect = '';
                    if (isset($actionKey['url']) && isset($actionKey['params'])) {
                        unset($actionKey['params'][ClaSite::LANGUAGE_KEY]);
                        unset($actionKey['params'][ClaSite::LANGUAGE_ENCRYPTION]);
                        $redirect = Yii::app()->createUrl($actionKey['url'], $actionKey['params']);
                    }
                    $this->jsonResponse(200, array('redirect' => $redirect));
                }
            }
        }
    }

    /**
     * disable site
     */
    function actionDisable() {
        $this->layout = 'disable';
        $this->render('disable');
    }

    function actionCopyMailsettings() {
        $sql = 'SELECT site_id FROM sites';
        $ids = Yii::app()->db->createCommand($sql)->queryColumn();
        $model_mails = new MailSettings();
        $sql_mail = 'SELECT * FROM mail_settings';
        $mails = Yii::app()->db->createCommand($sql_mail)->queryAll();

        foreach ($mails as $mail) {
            foreach ($ids as $id) {
                if ($mail['site_id'] != $id) {
                    $model_mails = new MailSettings();
                    $model_mails->attributes = $mail;
                    $model_mails->mail_attribute = $mail['mail_attribute'];
                    $model_mails->site_id = $id;
                    $model_mails->save();
                }
            }
        }
        echo 'xong xeng';
        die();
    }

    public function actionCheckDomain() {
        //
        $this->layoutForAction = '//layouts/check-domain';
        $domain=isset($_GET['domain'])?$_GET['domain']:'';
        if ($this->site_id != ClaSite::ROOT_SITE_ID)
            Yii::app()->end();
        //breadcrumb
        $this->breadcrumbs = array(
            Yii::t('site', 'domainname') => Yii::app()->createUrl('/site/site/check-domain'),
        );
        $this->render('check-domain', ['domain'=>$domain]);
    }

    //Remove UTF8 Bom
    function remove_utf8_bom($text)
    {
        $bom = pack('H*','EFBBBF');
        $text = preg_replace("/^$bom/", '', $text);
        return $text;
    }

    public function actionProcessCheckDomain() {
        $success = false;
        $code=2;
        $price=0;
        $tr ='';

        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['domain'])) {
                $domainPrice=SiteDomainPrices::findByDomain($_POST['ext']);
                $success = true;
                $domain=$_POST['domain'];
                $ext=$_POST['ext'];
                $url=$this->requestCheck.$domain.'.'.$ext;
                $content = file_get_contents($url);
                $return=$this->remove_utf8_bom($content);
                $initialPrice=!empty($domainPrice)?Yii::app()->numberFormatter->format('#,##0', $domainPrice->price):0;
                $maintainPrice=!empty($domainPrice)?Yii::app()->numberFormatter->format('#,##0', $domainPrice->maintain_price):0;
                $oldPrice=!empty($domainPrice)?Yii::app()->numberFormatter->format('#,##0', $domainPrice->old_price):0;

                if ($initialPrice==0) {
                    $initialPrice='Miễn phí';
                }
                if ($maintainPrice==0) {
                    $maintainPrice='Miễn phí';
                }
                if ($oldPrice==0) {
                    $oldPrice='Miễn phí';
                }

                if ($return==1) {
                    $code=3;//not available <strong class="text-success">'.$initialPrice.'</strong>
                    $tr .='<tr id="domainItem'.$ext.'">
                        <td class=""><span class="lineT text-danger">'.$domain.'<strong>.'.$ext.'</strong></span></td>
                        <td class=""><span class="lineT mr5">'.$initialPrice.'</span> </td>
                        <td class=""><span class="lineT mr5 through">'.$oldPrice.'</span> <strong class="text-success">'.$maintainPrice.'</strong></td>
                        <td class="text-center"><a class="text-danger" href="javascript:ht_whois(\''.$domain.'\''.",".'\''.$ext.'\')" ><i class="fa fa-eye mr5"></i> Xem thông tin</a>
                        </td>
                    </tr>';
                }
                else{
                    $code=4;//available   <strong class="text-success">'.$initialPrice.'</strong>
                    $tr .='<tr id="domainItem'.$ext.'">
                        <td class=""><span class="lineT text-success">'.$domain.'<strong>.'.$ext.'</strong></span></td>
                        <td class=""><span class="lineT mr5">'.$initialPrice.'</span> </td>
                        <td class=""><span class="lineT mr5 through">'.$oldPrice.'</span> <strong class="text-success">'.$maintainPrice.'</strong></td>
                        <td class="text-center"><a id="webmoicomvn" class="text-success" href="#"><i class="fa fa-shopping-cart mr5"></i> <span class="cart-status">Thêm vào giỏ hàng</span><span class="cart-alert"></span></a></td>
                    </tr>';
                }
            } 
        }
        echo CJSON::encode(array(
            'success'=> $success,
            'code'=>$code,
            'price'=>$price,
            'tr'=>$tr
        ));
    }

    public function actionProcessGetInfoDomain() {
        $success = false;
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_POST['domain'])) {
                $success = true;
                $domain=$_POST['domain'];
                $ext=$_POST['ext'];
                $url= $this->requestInfo.$domain.'.'.$ext;
                $content = file_get_contents($url);
                $message=$this->remove_utf8_bom($content);
            } 
        }
        echo CJSON::encode(array(
            'success'=> $success,
            'message'=>$message
        ));
    }
}
