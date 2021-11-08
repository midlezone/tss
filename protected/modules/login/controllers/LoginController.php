<?php

/**
 * @dess Login Controller
 *
 * @author minhbachngoc
 * @since 10/21/2013 16:10
 */
class LoginController extends PublicController {

    public $layout = '//layouts/login';

    const PUBLIC_USER_SESSION = 'public-user-session';

    /**
     * Displays the login page and validate login value
     */
    public function actionLogin() {		
        $this->breadcrumbs = array(
            Yii::t('common', 'login') => Yii::app()->createUrl('/login/login/login'),
        );
        $model = new LoginForm;
		
		
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];

            // validate user input and redirect to the previous page if valid
            $shoppingCart = Yii::app()->customer->getShoppingCart();
			if (Yii::app()->controller->site_id == '1227') {
				if ($model->validate() && $model->login2()) {

						Yii::app()->session[self::PUBLIC_USER_SESSION] = Yii::app()->user->id;
						Yii::app()->session['site_id'] = Yii::app()->controller->site_id;
						if ($shoppingCart->countOnlyProducts()) {
							Yii::app()->customer->setShoppingCart($shoppingCart);
							$this->redirect(Yii::app()->createUrl('/economy/shoppingcart'));
						}
						$this->redirect(Yii::app()->user->returnUrl);						
				} else {
					$model->password = '';
				}
				
			} elseif (Yii::app()->controller->site_id == '1250') {
				
				//var_dump($model->validate()); die;
				
				if ($model->validate() && $model->login()) {

						Yii::app()->session[self::PUBLIC_USER_SESSION] = Yii::app()->user->id;
						Yii::app()->session['site_id'] = Yii::app()->controller->site_id;
						
						$this->redirect(Yii::app()->user->returnUrl);						
				} else {
					$model->password = '';
				}
				
			}else {
						
				if ($model->validate() && $model->login()) {
					
						Yii::app()->session[self::PUBLIC_USER_SESSION] = Yii::app()->user->id;
						Yii::app()->session['site_id'] = Yii::app()->controller->site_id;
						
						$this->redirect('/profile/profile/changepassword');
					
					
				} else
					$model->password = '';
				}
           
        }
		if (Yii::app()->controller->site_id == 1136) {
			// display the login form
			$this->render('login1', array('model' => $model));
		} elseif (Yii::app()->controller->site_id == 1145 ) {
            // display the login form
            $this->render('login2', array('model' => $model));
        } elseif (Yii::app()->controller->site_id == 1182) {
            // display the login form
            $this->render('login_lva', array('model' => $model));
        } elseif (Yii::app()->controller->site_id == 1227 ) {
            // display the login form
            $this->render('login_chuspa', array('model' => $model));
        } elseif (Yii::app()->controller->site_id == 1250 ) {
            // display the login form
            $this->render('login_test', array('model' => $model));
        } else {
			// display the login form
			$this->render('login', array('model' => $model));     
		}

    }

    public function actionLoginRealestate() {
        $this->breadcrumbs = array(
            Yii::t('common', 'login') => Yii::app()->createUrl('/login/login/login'),
        );
        $model = new LoginForm;

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            $shoppingCart = Yii::app()->customer->getShoppingCart();
            if ($model->validate() && $model->login()) {
                $siteinfo = ClaSite::getSiteInfo();
                Yii::app()->session[self::PUBLIC_USER_SESSION] = Yii::app()->user->id;
                Yii::app()->session['site_id'] = Yii::app()->controller->site_id;
                if ($siteinfo['default_page_path']) {
                    $this->redirect(Yii::app()->createUrl($siteinfo['default_page_path'], json_decode($siteinfo['default_page_params'])));
                } else {
                    $this->redirect(Yii::app()->user->returnUrl);
                }
            } else
                $model->password = '';
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * cho phép người dùng đăng nhập vào website của mình từ trang chủ của web3nhat
     */
    public function actionWebsitelogin() {
        if (Yii::app()->controller->site_id != ClaSite::ROOT_SITE_ID)
            Yii::app()->end();
        $this->breadcrumbs = array(
            Yii::t('common', 'login') => Yii::app()->createUrl('/login/login/websitelogin'),
        );
        $model = new WebsiteLoginForm();
        $isAjax = Yii::app()->request->isAjaxRequest;
        // collect user input data
        if (isset($_POST['WebsiteLoginForm'])) {
            $model->attributes = $_POST['WebsiteLoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                //
                $websiteIdentity = $model->getIdentity();
                $site_id = $websiteIdentity->getSiteId();
                $siteinfo = false;
                if ($site_id) {
                    $siteinfo = ClaSite::getSiteInfo($site_id);
                }
                //
                if ($siteinfo) {
                    $token = ClaGenerate::getUniqueCode();
                    $cacheFile = new ClaCacheFile();
                    $model->password = ClaGenerate::encrypPassword($model->password);
                    $cacheFile->add($token, $model->attributes);
                    //
                    $redirect = ClaSite::getHttpMethod() . $siteinfo['domain_default'] . '/' . ClaSite::getAdminEntry() . '/login/login/tklogin?tk=' . $token;
                    if ($isAjax)
                        $this->jsonResponse(200, array(
                            'redirect' => $redirect,
                        ));
                    else
                        $this->redirect($redirect);
                }
            } else {
                if ($isAjax)
                    $this->jsonResponse(400, array(
                        'errors' => $model->getJsonErrors(),
                    ));
                //
                $model->password = '';
            }
        }

        if ($isAjax) {
            $this->renderPartial('websitelogin', array('model' => $model, 'isAjax' => $isAjax));
        } else {
            // display the login form
            $this->render('websitelogin', array('model' => $model, 'isAjax' => $isAjax));
        }
    }

    public function token($user) {
        return md5(uniqid($user, true));
    }
	
	
    public function actionSignup1() {  
	

		$session = Yii::app()->session;
        $jsonData = json_decode(file_get_contents('http://online.levananh.com/api/test'));
	
		foreach ($jsonData->response as $val) {
				
				if ($val->mobile != '') {
					$phone = $val->mobile;
					$site = 1182;
						$users = Yii::app()->db->createCommand()->select('*')
							->from(ClaTable::getTable('users'))
							->where('phone=:phone', array(':phone' => $phone))
							->queryRow();
						
				
							if(empty($users)) {
								$usermodel = new Users('signup');
								$usermodel->scenario = 'signup';
								$usermodel->site_id = $this->site_id;
								
								$listprivince = LibProvinces::getListProvinceArr();
								
								if (!$usermodel->province_id) {
									$first = array_keys($listprivince);
									$firstpro = isset($first[0]) ? $first[0] : null;
									$usermodel->province_id = $firstpro;
								}
								$listdistrict = false;
								$oribirthday = '';
									
								$oribirthday = $usermodel->birthday;
								if ($usermodel->birthday) {
									$usermodel->birthday = strtotime($usermodel->birthday);
								}
								//Auto active
								$usermodel->active = ActiveRecord::STATUS_ACTIVED;
								$usermodel->created_time = $usermodel->modified_time = strtotime(date("Y-m-d"));
						
								$usermodel->password = '7299e47056ef07179df9cf0abd32121c';
								$usermodel->name = $val->name;
								$usermodel->bank_id = $val->id;
								if ($val->email == null) {
									if ($val->mobile == null) {
										$usermodel->email = $val->id.'info@levananh.com';
									} else {
										$usermodel->email = $val->mobile.'@levananh.com';
									}
									
								} else {
									$usermodel->email= $val->email;
								}
								$usermodel->phone = $val->mobile;
								if($val->sex == 'female') {
									$usermodel->sex = 2;
								} 
								if($val->sex == 'male') {
									$usermodel->sex = 1;
								} else {
									$usermodel->sex = null;
								}
								//$usermodel->save();
							}					
					
				}
				
		}
	
       
    }
	
	public function actionSignup3() {
        $token_introduce = Yii::app()->session['token'];
        $this->breadcrumbs = array(
            Yii::t('common', 'signup') => Yii::app()->createUrl('/login/login/signup'),
        );
        $usermodel = new Users('signup');
        $usermodel->scenario = 'signup';
        $usermodel->site_id = $this->site_id;
		
        $listprivince = LibProvinces::getListProvinceArr();
        if (!$usermodel->province_id) {
            $first = array_keys($listprivince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $usermodel->province_id = $firstpro;
        }
        $listdistrict = false;
        $oribirthday = '';
        if (isset($_POST['Users'])) {
            
            $usermodel->attributes = $_POST['Users'];

            $oribirthday = $usermodel->birthday;
            if ($usermodel->birthday) {
                $usermodel->birthday = strtotime($usermodel->birthday);
            }
              
           // $usermodel->passwordConfirm = $_POST['Users']['passwordConfirm'];
            //if ($usermodel->password != $usermodel->passwordConfirm) {
                //$usermodel->addError('passwordConfirm', Yii::t('errors', 'password_dontmatch'));
           // }
            $validator = new CEmailValidator();
            if (!$validator->validateValue($usermodel->email)) {
                $usermodel->addError('email', Yii::t('errors', 'email_invalid', array('{name}' => '"' . $usermodel->email . '"')));
            }
            //if (!isset($listprivince[$usermodel->province_id])) {
               // $usermodel->addError('province_id', Yii::t('errors', 'province_invalid'));
           // }
            //$listdistrict = LibDistricts::getListDistrictArrFollowProvince($usermodel->province_id);
           // if (!isset($listdistrict[$usermodel->district_id])) {
            //    $usermodel->addError('district_id', Yii::t('errors', 'district_invalid'));
           // }
            if (!$usermodel->hasErrors()) {

                $pass = $usermodel->password;
                $usermodel->password = ClaGenerate::encrypPassword($usermodel->password);
                //Auto active
                $usermodel->active = ActiveRecord::STATUS_ACTIVED;
                $usermodel->created_time = $usermodel->modified_time = strtotime(date("Y-m-d"));
                $token = $this->token($pass);
                $usermodel->token = $token;
                $usermodel->zocoin = 20;
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                $usermodel->link_introduce = $actual_link.'?token='.$token;
                $usermodel->token_introduce = $token_introduce;

                $data = Yii::app()->db->createCommand()->select('*')
                    ->from(ClaTable::getTable('users'))
                    ->where('token=:token', array(':token' => $token_introduce))
                    ->queryAll();                
                
                if (!empty($data)) {
                    $usermodel->user_introduce_id = $data[0]['user_id'];
                     $usermodel->level = $data[0]['level'] + 1;
                } else {
                    $usermodel->user_introduce_id = 0;
                    $usermodel->level = 1;
                }
				if ($usermodel->save()) { // create new user 
                   
                    Yii::app()->user->setFlash('success', Yii::t('user', 'signup_success_waiting_actived'));
                    $usermodel->unsetAttributes();
                    $this->redirect(Yii::app()->homeUrl);
                }
                
            }
            $usermodel->password = $usermodel->passwordConfirm = '';
            $usermodel->birthday = $oribirthday;
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($usermodel->province_id);
        }
		if (Yii::app()->controller->site_id == 1136) {
			 $this->render('signup1', array(
				'model' => $usermodel,
				'listprivince' => $listprivince,
				'listdistrict' => $listdistrict,
			));
		} elseif (Yii::app()->controller->site_id == 1145) {
            // display the login form
            $this->render('signup1', array(
				'model' => $usermodel,
				'listprivince' => $listprivince,
				'listdistrict' => $listdistrict,
			));    
        }  elseif (Yii::app()->controller->site_id == 1204) {
            // display the login form
            $this->render('signup2', array(
				'model' => $usermodel,
				'listprivince' => $listprivince,
				'listdistrict' => $listdistrict,
			));    
        }  else {
			 $this->render('signup', array(
				'model' => $usermodel,
				'listprivince' => $listprivince,
				'listdistrict' => $listdistrict,
			));    
		}
	}
		
    public function actionSignup() {
        $token_introduce = Yii::app()->session['token'];
        $this->breadcrumbs = array(
            Yii::t('common', 'signup') => Yii::app()->createUrl('/login/login/signup'),
        );
        $usermodel = new Users('signup');
        $usermodel->scenario = 'signup';
        $usermodel->site_id = $this->site_id;
		
        $listprivince = LibProvinces::getListProvinceArr();
        if (!$usermodel->province_id) {
            $first = array_keys($listprivince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $usermodel->province_id = $firstpro;
        }
        $listdistrict = false;
        $oribirthday = '';
        if (isset($_POST['Users'])) {
            
            $usermodel->attributes = $_POST['Users'];

            $oribirthday = $usermodel->birthday;
            if ($usermodel->birthday) {
                $usermodel->birthday = strtotime($usermodel->birthday);
            }
              
            $usermodel->passwordConfirm = $_POST['Users']['passwordConfirm'];
            if ($usermodel->password != $usermodel->passwordConfirm) {
                $usermodel->addError('passwordConfirm', Yii::t('errors', 'password_dontmatch'));
            }
            $validator = new CEmailValidator();
            if (!$validator->validateValue($usermodel->email)) {
                $usermodel->addError('email', Yii::t('errors', 'email_invalid', array('{name}' => '"' . $usermodel->email . '"')));
            }
            //if (!isset($listprivince[$usermodel->province_id])) {
               // $usermodel->addError('province_id', Yii::t('errors', 'province_invalid'));
           // }
            //$listdistrict = LibDistricts::getListDistrictArrFollowProvince($usermodel->province_id);
           // if (!isset($listdistrict[$usermodel->district_id])) {
            //    $usermodel->addError('district_id', Yii::t('errors', 'district_invalid'));
           // }
            if (!$usermodel->hasErrors()) {

                $pass = $usermodel->password;
                $usermodel->password = ClaGenerate::encrypPassword($usermodel->password);
                //Auto active
                $usermodel->active = ActiveRecord::STATUS_ACTIVED;
                $usermodel->created_time = $usermodel->modified_time = strtotime(date("Y-m-d"));
                $token = $this->token($pass);
                $usermodel->token = $token;
                $usermodel->zocoin = 20;
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                $usermodel->link_introduce = $actual_link.'?token='.$token;
                $usermodel->token_introduce = $token_introduce;

                $data = Yii::app()->db->createCommand()->select('*')
                    ->from(ClaTable::getTable('users'))
                    ->where('token=:token', array(':token' => $token_introduce))
                    ->queryAll();                
                
                if (!empty($data)) {
                    $usermodel->user_introduce_id = $data[0]['user_id'];
                     $usermodel->level = $data[0]['level'] + 1;
                } else {
                    $usermodel->user_introduce_id = 0;
                    $usermodel->level = 1;
                }
				if ($usermodel->save()) { // create new user 
                   
                    Yii::app()->user->setFlash('success', Yii::t('user', 'signup_success_waiting_actived'));
                    $usermodel->unsetAttributes();
                    $this->redirect(Yii::app()->homeUrl);
                }
                
            }
            $usermodel->password = $usermodel->passwordConfirm = '';
            $usermodel->birthday = $oribirthday;
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($usermodel->province_id);
        }

		
		 $this->render('signup2', array(
			'model' => $usermodel,
		));    
		
	}
	
    /**
     * Sign up form and validate when get data
     */
    public function actionSignupRverify() {
        $this->breadcrumbs = array(
            Yii::t('common', 'signup') => Yii::app()->createUrl('/login/login/signupRverify'),
        );

        $usermodel = new Users('signupRverify');
        $usermodel->scenario = 'signupRverify';
        $usermodel->site_id = $this->site_id;
        $listprivince = LibProvinces::getListProvinceArr();
        if (!$usermodel->province_id) {
            $first = array_keys($listprivince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $usermodel->province_id = $firstpro;
        }
        $listdistrict = false;
        if (isset($_POST['Users'])) {
            $usermodel->attributes = $_POST['Users'];
            
            $front_identity_card = $_FILES['front_identity_card'];
            if ($front_identity_card && $front_identity_card['name']) {
                $usermodel->front_identity_card = 'true';
                $extensions = Users::allowExtensions();
                if (!isset($extensions[$front_identity_card['type']])) {
                    $usermodel->addError('front_identity_card', Yii::t('user', 'identity_card_invalid_format'));
                }
            }
            $back_identity_card = $_FILES['back_identity_card'];
            if ($back_identity_card && $back_identity_card['name']) {
                $usermodel->back_identity_card = 'true';
                $extensions = Users::allowExtensions();
                if (!isset($extensions[$back_identity_card['type']])) {
                    $usermodel->addError('back_identity_card', Yii::t('user', 'identity_card_invalid_format'));
                }
            }
            $usermodel->passwordConfirm = $_POST['Users']['passwordConfirm'];
            if ($usermodel->password != $usermodel->passwordConfirm) {
                $usermodel->addError('passwordConfirm', Yii::t('errors', 'password_dontmatch'));
            }
            $validator = new CEmailValidator();
            if (!$validator->validateValue($usermodel->email)) {
                $usermodel->addError('email', Yii::t('errors', 'email_invalid', array('{name}' => '"' . $usermodel->email . '"')));
            }
            if (!isset($listprivince[$usermodel->province_id])) {
                $usermodel->addError('province_id', Yii::t('errors', 'province_invalid'));
            }
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($usermodel->province_id);
            if (!isset($listdistrict[$usermodel->district_id])) {
                $usermodel->addError('district_id', Yii::t('errors', 'district_invalid'));
            }
            if (!$usermodel->hasErrors()) {
                
                $upfront_identity_card = new UploadLib($front_identity_card);
                $upfront_identity_card->setPath(array($this->site_id, 'identity_card'));
                $upfront_identity_card->uploadFile();
                $response = $upfront_identity_card->getResponse(true);
                //
                if ($upfront_identity_card->getStatus() == '200') {
                    $usermodel->front_identity_card = ClaHost::getMediaBasePath() . $response['baseUrl'] . $response['name'];
                } else {
                    $usermodel->front_identity_card = '';
                }

                $upback_identity_card = new UploadLib($back_identity_card);
                $upback_identity_card->setPath(array($this->site_id, 'identity_card'));
                $upback_identity_card->uploadFile();
                $response = $upback_identity_card->getResponse(true);
                //
                if ($upback_identity_card->getStatus() == '200') {
                    $usermodel->back_identity_card = ClaHost::getMediaBasePath() . $response['baseUrl'] . $response['name'];
                } else {
                    $usermodel->back_identity_card = '';
                }

                $pass = $usermodel->password;
                $usermodel->password = ClaGenerate::encrypPassword($usermodel->password);
                //Auto active
                $usermodel->active = ActiveRecord::STATUS_ACTIVED;
                $usermodel->created_time = $usermodel->modified_time = time();
                $usermodel->active = ActiveRecord::STATUS_ACTIVED;
                $usermodel->status = ActiveRecord::STATUS_USER_WAITING;
                $usermodel->verified_code = time() . $usermodel->phone;
                if ($usermodel->save()) { // create new user signupnotice
                    $mailSetting = MailSettings::model()->mailScope()->findByAttributes(array(
                        'mail_key' => 'signupnotice',
                    ));
                    if ($mailSetting) {
                        $data = array(
                            'link' => '<a href="' . Yii::app()->createAbsoluteUrl('/login/login/verifiedEmailSuccess', array('verified_code' => $usermodel->verified_code)) . '">Link</a>',
                            'user_name' => $usermodel->name,
                            'user_email' => $usermodel->email,
                        );
                        //
                        $content = $mailSetting->getMailContent($data);
                        //
                        $subject = $mailSetting->getMailSubject($data);
                        //
                        if ($content && $subject) {
                            Yii::app()->mailer->send('', $usermodel->email, $subject, $content);
                        }
                    }
                    Yii::app()->user->setFlash('success', Yii::t('user', 'signup_success_waiting_actived'));
                    $usermodel->unsetAttributes();
                }
            }
            $usermodel->password = $usermodel->passwordConfirm = '';
            $usermodel->birthday = $oribirthday;
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($usermodel->province_id);
        }
        $this->render('signup_rverify', array(
            'model' => $usermodel,
            'listprivince' => $listprivince,
            'listdistrict' => $listdistrict,
        ));
    }

    /**
     * Sign up form and validate when get data
     */
    public function actionSignupRealestate() {
        $this->breadcrumbs = array(
            Yii::t('common', 'signup') => Yii::app()->createUrl('/login/login/signup'),
        );
        $usermodel = new Users('signupRealestate');
        $usermodel->scenario = 'signupRealestate';
        $usermodel->site_id = $this->site_id;
        $listprivince = LibProvinces::getListProvinceArr();
        if (!$usermodel->province_id) {
            $first = array_keys($listprivince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $usermodel->province_id = $firstpro;
        }
        $listdistrict = false;
        $oribirthday = '';
        if (isset($_POST['Users'])) {
            $usermodel->attributes = $_POST['Users'];
            $front_identity_card = $_FILES['front_identity_card'];
            if ($front_identity_card && $front_identity_card['name']) {
                $usermodel->front_identity_card = 'true';
                $extensions = Users::allowExtensions();
                if (!isset($extensions[$front_identity_card['type']])) {
                    $usermodel->addError('front_identity_card', Yii::t('user', 'identity_card_invalid_format'));
                }
            }
            $back_identity_card = $_FILES['back_identity_card'];
            if ($back_identity_card && $back_identity_card['name']) {
                $usermodel->back_identity_card = 'true';
                $extensions = Users::allowExtensions();
                if (!isset($extensions[$back_identity_card['type']])) {
                    $usermodel->addError('back_identity_card', Yii::t('user', 'identity_card_invalid_format'));
                }
            }

            $oribirthday = $usermodel->birthday;
            if ($usermodel->birthday) {
                $usermodel->birthday = strtotime($usermodel->birthday);
            }
            if (!$usermodel->password || strlen($usermodel->password) < 6) {
                $usermodel->addError('password', Yii::t('errors', 'password_empty'));
            }

            $usermodel->passwordConfirm = $_POST['Users']['passwordConfirm'];
            if ($usermodel->password != $usermodel->passwordConfirm) {
                $usermodel->addError('passwordConfirm', Yii::t('errors', 'password_dontmatch'));
            }
            $validator = new CEmailValidator();
            if (!$validator->validateValue($usermodel->email)) {
                $usermodel->addError('email', Yii::t('errors', 'email_invalid', array('{name}' => '"' . $usermodel->email . '"')));
            }
            if (!isset($listprivince[$usermodel->province_id])) {
                $usermodel->addError('province_id', Yii::t('errors', 'province_invalid'));
            }
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($usermodel->province_id);
            if (!isset($listdistrict[$usermodel->district_id])) {
                $usermodel->addError('district_id', Yii::t('errors', 'district_invalid'));
            }

            if (!$usermodel->hasErrors()) {
                $user_introduce = Users::model()->findByAttributes(array(
                    'site_id' => $this->site_id,
                    'phone' => $usermodel->phone_introduce,
                ));
                $upfront_identity_card = new UploadLib($front_identity_card);
                $upfront_identity_card->setPath(array($this->site_id, 'identity_card'));
                $upfront_identity_card->uploadFile();
                $response = $upfront_identity_card->getResponse(true);
                //
                if ($upfront_identity_card->getStatus() == '200') {
                    $usermodel->front_identity_card = ClaHost::getMediaBasePath() . $response['baseUrl'] . $response['name'];
                } else {
                    $usermodel->front_identity_card = '';
                }

                $upback_identity_card = new UploadLib($back_identity_card);
                $upback_identity_card->setPath(array($this->site_id, 'identity_card'));
                $upback_identity_card->uploadFile();
                $response = $upback_identity_card->getResponse(true);
                //
                if ($upback_identity_card->getStatus() == '200') {
                    $usermodel->back_identity_card = ClaHost::getMediaBasePath() . $response['baseUrl'] . $response['name'];
                } else {
                    $usermodel->back_identity_card = '';
                }

                $pass = $usermodel->password;
                $usermodel->password = ClaGenerate::encrypPassword($usermodel->password);
                //Auto active
                $usermodel->active = ActiveRecord::STATUS_ACTIVED;
                $usermodel->status = ActiveRecord::STATUS_USER_WAITING;
                $usermodel->created_time = $usermodel->modified_time = time();
                $usermodel->user_introduce_id = $user_introduce->user_id;
                $usermodel->verified_code = time() . $usermodel->phone;
                if ($usermodel->save()) { // create new user 
                    $mailSetting = MailSettings::model()->mailScope()->findByAttributes(array(
                        'mail_key' => 'signupnotice',
                    ));
                    if ($mailSetting) {
                        $data = array(
                            'link' => '<a href="' . Yii::app()->createAbsoluteUrl('/login/login/verifiedEmail', array('verified_code' => $usermodel->verified_code)) . '">Link</a>',
                            'user_name' => $usermodel->name,
                            'user_email' => $usermodel->email,
                        );
                        //
                        $content = $mailSetting->getMailContent($data);
                        //
                        $subject = $mailSetting->getMailSubject($data);
                        //
                        if ($content && $subject) {
                            Yii::app()->mailer->send('', $usermodel->email, $subject, $content);
                        }
                    }
                    Yii::app()->user->setFlash('success', Yii::t('user', 'signup_success_waiting_actived'));
                    $usermodel->unsetAttributes();
//                    $this->redirect(Yii::app()->homeUrl);
                }
            }
            $usermodel->password = $usermodel->passwordConfirm = '';
            $usermodel->birthday = $oribirthday;
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($usermodel->province_id);
        }
        $this->render('signup_realestate', array(
            'model' => $usermodel,
            'listprivince' => $listprivince,
            'listdistrict' => $listdistrict,
        ));
    }

    public function actionVerifiedEmailSuccess($verified_code) {
        if ($verified_code) {
            $site_id = Yii::app()->controller->site_id;
            $user = Users::model()->findByAttributes(array(
                'site_id' => $site_id,
                'verified_code' => $verified_code
            ));
            if ($user) {
                $user->verified_code = '';
                $user->verified_email = 1;
                $user->status = 1;
                $user->save();
                $this->render('verified_success_normal', array());
            } else {
                $this->sendResponse(404);
            }
        } else {
            $this->sendResponse(404);
        }
    }

    public function actionVerifiedEmail($verified_code) {
        if ($verified_code) {
            $site_id = Yii::app()->controller->site_id;
            $user = Users::model()->findByAttributes(array(
                'site_id' => $site_id,
                'verified_code' => $verified_code
            ));
            if ($user) {
                $user->verified_code = '';
                $user->verified_email = 1;
                $mailSetting = MailSettings::model()->mailScope()->findByAttributes(array(
                    'mail_key' => 'noticehasuser',
                ));
                if ($mailSetting) {
                    $data = array(
                        'user_email' => $user->email
                    );
                    //
                    $content = $mailSetting->getMailContent($data);
                    //
                    $subject = $mailSetting->getMailSubject($data);
                    //
                    if ($content && $subject) {
                        Yii::app()->mailer->send('', Yii::app()->siteinfo['admin_email'], $subject, $content);
                    }
                }
                $user->save();

                $this->render('verified_success', array());
            } else {
                $this->sendResponse(404);
            }
        } else {
            $this->sendResponse(404);
        }
    }

    public function actionUserintroduce() {
        $this->breadcrumbs = array(
            Yii::t('common', 'user_introduce') => Yii::app()->createUrl('/login/login/signup'),
        );
        $user_current = Users::getCurrentUser();
        $this->render('user_introduce', array(
            'user_current' => $user_current
        ));
    }

    /**
     * forgot password form and validate, send mail
     */
    function actionForgotpassword() {
		$site_id = Yii::app()->controller->site_id;
		
        $model = new ForgotForm();
        if (isset($_POST['ForgotForm'])) {
            $model->attributes = $_POST['ForgotForm'];
            if ($model->validate()) {
                $token = ClaToken::register('public_resetpass_' . $model->email, array('email' => $model->email));
								
                    $link = Yii::app()->createAbsoluteUrl('login/login/recoverpass', array('tk' => $token));
                    $username = $model->userInfo['name'];
                    $site = Yii::app()->siteinfo['site_title'];

                    $data = array(
                        'link' => '<a href="' . $link . '" target="_blank">' . $link . '</a>',
                        'site' => $site,
                        'username' => $model,
                    );
					
					
					$user = Users::model()->findByAttributes(array(
						'site_id' => $site_id,
						'phone' => $model->userInfo['phone']
					));
					$password = $this->rand_string(8);
					
					
					if ($user) {					
						$user->password = ClaGenerate::encrypPassword($password);
						$user->save();
					}
					
                    //
                    $content = '<p>Chào '.$username.'</p>

											<div><span style="line-height: 20.8px;">Bạn đã Đăng Ký lấy lại mật khẩu!</span></div>
											<div>&nbsp;</div>
											<div><span style="line-height: 20.8px;">Mật khẩu mới Của Bạn Là: <b>'.$password.'</b></span></div>
											<div>&nbsp;</div>
											<div><span style="line-height: 20.8px;">Vui lòng đăng nhập bằng mật khẩu mới.</span></div>
											<div>&nbsp;</div>
											<div><span style="line-height: 20.8px;">Cảm Ơn!</span></div>
											<div>&nbsp;</div>

											<div>
											<table border="0" cellpadding="0" cellspacing="0" style="color: rgb(34, 34, 34); line-height: normal; font-size: 0.75em; font-family: Verdana;" width="700">
												<tbody>
													<tr>
														<td align="left" style="font-family: arial, sans-serif; margin: 0px;">
															<img alt="" src="http://levananh.com/mediacenter/media/images/1182/logo/326_1544169906_5305c0a29b2308e2.png" style="width: 170px; height: 70px;" />
														</td>
														
													</tr>
													<tr>
														<td colspan="2" style="border-bottom-color: rgb(231, 29, 106); border-width: 0px 0px 2px; font-family: arial, sans-serif; margin: 0px; height: 10px;">&nbsp;</td>
													</tr>
													<tr>
														<td colspan="2" style="font-family: arial, sans-serif; margin: 0px; height: 10px;">&nbsp;</td>
													</tr>
													<tr>
														<td colspan="2" style="font-family: arial, sans-serif; margin: 0px;">
														<div style="color: rgb(102, 102, 102); line-height: 14.4px;">
														<div style="clear: both; min-height: 10px;">@2018 LÊ VÂN ANH - LISSE VIỆT NAM</div>

														<div style="clear: both; min-height: 10px;">Địa chỉ: Số 55 Pháo Đài Láng, Đống Đa, Hà Nội</div>

														<div style="clear: both; min-height: 10px;">Tel: 090.793.8866 - Fax:&nbsp;<span style="line-height: 14.4px;">090.793.8866</span></div>

														<div style="clear: both; min-height: 10px;"><span style="line-height: 14.4px;">Email: levananh@lisse.com.vn- Hotline: 090.793.8866</span></div>

														<div style="clear: both; min-height: 10px;">Website: www.levananh.com</div>
														</div>
														</td>
													</tr>
												</tbody>
											</table>
											</div>';
                    //
                    $subject = "Khôi phục mật khẩu người dùng";
                    //
                    if ($content && $subject) {
                        $send = Yii::app()->mailer->send('',$model->email, $subject, $content);
                        if ($send) {
                            Yii::app()->user->setFlash("success", Yii::t('user', 'user_sendpass_success'));
                            $this->redirect(Yii::app()->createUrl('login/login/login'));
                        }
                    }
					
					
            }
        }
        $model->unsetAttributes();
        $this->render('forgot', array('model' => $model));
    }
	function rand_string($length ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		return substr(str_shuffle($chars),0,$length);

	}

    /**
     * Recover password: to permit user can create new password
     */
    function actionRecoverpass() {
		$site_id = Yii::app()->controller->site_id;
        $tk = $_GET['tk'];
        $token = ClaToken::get($tk, false);
        if (!$token['email']) {
            Yii::app()->user->setFlash('error', Yii::t('errors', 'token_invalid'));
            $this->redirect(Yii::app()->createUrl('login/login/login'));
            Yii::app()->end();
        }
        $model = new ResetPassword();
        if (isset($_POST["ResetPassword"])) {
            $model->attributes = $_POST['ResetPassword'];
            if ($model->validate()) {
                //$user = UsersAdmin::model()->find('email="' . $token['email'] . '"');
				$user = Users::model()->findByAttributes(array(
					'site_id' => $site_id,
					'email' =>$token['email']
				));
                if ($user) {					
                    $user->password = ClaGenerate::encrypPassword($model->newpassword);
                    if ($user->save(false)) {							
                        ClaToken::delete($tk);
                        Yii::app()->user->setFlash("success", Yii::t('user', 'change_pass_success'));
                        $this->redirect(Yii::app()->createUrl('login/login/login'));
                    }
                }
            } else
                $model->unsetAttributes();
        }
        $this->render('getpass', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        unset(Yii::app()->session[self::PUBLIC_USER_SESSION]);
        unset(Yii::app()->session['site_id']);
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * thoát tk admin
     */
    function actionWebsitelogout() {
        ClaSite::deleteAdminSession();
        $this->redirect(Yii::app()->user->returnUrl);
    }

    function beforeAction($action) {
        if (!Yii::app()->user->isGuest && $action->id != 'logout' && $action->id != 'userintroduce') {
            $this->redirect(Yii::app()->homeUrl);
        }
        return parent::beforeAction($action);
    }

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xEEEEEE,
            ),
        );
    }
    
    public function actionUserinfo()
    {   
        //$enableCsrfValidation = false;
      
      //  $model_user = new Users();
//        $model_user = $model_user->findByPk(1145);
//        $model_user->name = 'hahah';
//        $model_user->save();
        echo "vao";
        exit;
        echo Yii::app()->user->id;
        exit;
        $post=Users::model()->findByPk(758);
        $post->name = 'hahah';
        $post->save();
        //echo $_GET['test'];
        exit;
    }

}
