<?php

class ProfileController extends PublicController {

    public $profileinfo = array();

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'profile';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
	public function actionSaveBank() 
    {
          $this->respondStatus("Cập nhận thành công");
    }
    
    public function actionIndex() {
		
        $this->render('view', array(
            'model' => $this->loadModel(Yii::app()->user->id),
        ));
    }
	
    public function actionTest() {
		
        $this->respondStatus("Đăng Ký thành công");
	
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $this->layoutForAction = '//layout/profile_update';
        //
        $id = Yii::app()->user->id;
        $model = $this->loadModel($id);
        $model->scenario = 'update';
        $listprivince = LibProvinces::getListProvinceArr();
        if (!$model->province_id) {
            $firstpro = reset(array_keys($listprivince));
            $model->province_id = $firstpro;
        }
        $listdistrict = false;
        if (isset($_POST['Users'])) {
            $attrs = $_POST['Users'];
            unset($attrs['email']);
            unset($attrs['password']);
            $model->attributes = $attrs;
            //
            if ($model->save())
                $this->redirect(Yii::app()->createUrl('profile/profile/view', array('id' => $model->user_id)));
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }
        //
        $this->render('update', array(
            'model' => $model,
            'listprivince' => $listprivince,
            'listdistrict' => $listdistrict,
        ));
    }

    /**
     * change password
     */
    public function actionChangepassword() {
        $this->breadcrumbs = array(            
            Yii::t('news', 'Thay đổi mật khẩu') => Yii::app()->createUrl('profile/profile/infoadvanced'),
        );
        $this->layoutForAction = '//layout/profile_changepassword';
        $user = Users::model()->findByPk(Yii::app()->user->id);
        if (!$user)
            $this->sendResponse(404);
        $model = new Users;
        if (isset($_POST['Users'])) {
            //
            $model = $user;
            //
            $attrs = $_POST['Users'];
            if ($user->password) {
                if (ClaGenerate::encrypPassword($attrs['oldPassword']) != $model->password)
                    $model->addError('oldPassword', Yii::t('user', 'user_oldPassword_invalid'));
            }
            if ($attrs['password'] != $attrs['passwordConfirm'])
                $model->addError('passwordConfirm', Yii::t('errors', 'password_dontmatch'));
            if (!$model->hasErrors()) {
                $model->password = ClaGenerate::encrypPassword($attrs['password']);
                if ($model->save()) { // create new user
                    Yii::app()->user->setFlash('success', Yii::t('user', 'user_changepass_success'));
                }
            }
        }
        
        $model = new Users();

        $this->render('changepass', array(
            'model' => $model,
            'user' => $user,
             'methodName' => $this->methodName()
        ));
    }

    /**
     * Lists all models.
     */
    public function actionOrder() {
        $this->breadcrumbs = array(            
            Yii::t('news', 'Thông tin đơn hàng') => Yii::app()->createUrl('profile/profile/infoadvanced'),
        );
        $this->layoutForAction = '//layout/profile_order';
        //
        $userID = Yii::app()->user->id;
        $sql = 'SELECT order_id AS id, shipping_address AS address , shipping_email AS email, shipping_phone AS phone,
        shipping_name, `key`, order_status AS status,order_total, created_time AS created, order_total AS total  
        FROM orders WHERE  user_id = '.$userID.' AND site_id = '.$this->profileinfo['site_id'].' ORDER BY order_id DESC';
        $orders = Yii::app()->db->createCommand($sql)->queryAll();
		
		
        $this->render('order', array(
            'orders' => $orders,
        ));
        
        //$model = new Orders();
//        $model->user_id = Yii::app()->user->id;
//        $model->unsetAttributes();  // clear any default values
//        if (isset($_GET['Orders']))
//            $model->attributes = $_GET['Orders'];
//        $this->render('order', array(
//            'model' => $model,
//        ));
    }

    public function actionRealestateIndex() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/profile/profile/realestateIndex'),
        );
        //
        $model = new RealEstate();
        //
        $this->render("realestate_index", array(
            'model' => $model,
        ));
    }

    public function actionRealestateProjectIndex() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_manager') => Yii::app()->createUrl('/profile/profile/realestateProjectIndex'),
        );
        $user = Users::getCurrentUser();
        //
        $model = new RealEstateProject();
        //
        $this->render("realestate_project_index", array(
            'model' => $model,
            'user' => $user,
        ));
    }

    public function actionRealestateNewsIndex() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/content/realestate/'),
        );
        //
        $model = new RealEstateNews();
        //
        $this->render("realestate_news_index", array(
            'model' => $model,
        ));
    }

    public function actionRealestateUpdate($realestate_id) {
        $model = RealEstate::model()->findByPk($realestate_id);
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/content/realestate/'),
            Yii::t('news', 'news_edit') => Yii::app()->createUrl('/content/news/update', array('id' => $id)),
        );

        $option_project = RealEstateProject::getOptionProject();
        $user_id = Yii::app()->user->id;
        $listprovince = LibProvinces::getListProvinceArr();
        if (!$model->province_id) {
            $first = array_keys($listprovince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $model->province_id = $firstpro;
        }
        $listdistrict = false;

        //
        if (isset($_POST['RealEstate'])) {
            $model->attributes = $_POST['RealEstate'];
            $province = LibProvinces::getProvinceDetail($model->province_id);
            if (isset($province) && $province['name']) {
                $model->province_name = $province['name'];
            }
            $district = LibDistricts::getDistrictDetailFollowProvince($model->province_id, $model->district_id);
            if (isset($district) && $district['name']) {
                $model->district_name = $district['name'];
            }
            $model->processPrice();
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            }

            $model->user_id = $user_id;
            if (!$model->getErrors()) {
                if ($model->save()) {
                    $this->redirect(array('realestateIndex'));
                }
            }
        }

        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }

        $this->render('realestate_update', array(
            'model' => $model,
            'listprovince' => $listprovince,
            'listdistrict' => $listdistrict,
            'option_project' => $option_project,
            'user_id' => $user_id,
            'realestate_id' => $realestate_id
        ));
    }

    public function actionRealestateCreate() {
        $model = new RealEstate;
        $model->unsetAttributes();
        $model->type = 1;

        $option_project = RealEstateProject::getOptionProject();
        $user_id = Yii::app()->user->id;
        $listprovince = LibProvinces::getListProvinceArr();
        if (!$model->province_id) {
            $first = array_keys($listprovince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $model->province_id = $firstpro;
        }
        $listdistrict = false;

        //
        if (isset($_POST['RealEstate'])) {
            $model->attributes = $_POST['RealEstate'];
            $province = LibProvinces::getProvinceDetail($model->province_id);
            if (isset($province) && $province['name']) {
                $model->province_name = $province['name'];
            }
            $district = LibDistricts::getDistrictDetailFollowProvince($model->province_id, $model->district_id);
            if (isset($district) && $district['name']) {
                $model->district_name = $district['name'];
            }
            $model->processPrice();
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            }

            $model->user_id = $user_id;
            $model->status = 2;
            if (!$model->getErrors()) {
                if ($model->save()) {
                    $this->redirect(array('realestateIndex'));
                }
            }
        }

        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }

        $this->render('realestate_create', array(
            'model' => $model,
            'listprovince' => $listprovince,
            'listdistrict' => $listdistrict,
            'option_project' => $option_project,
            'user_id' => $user_id,
            'realestate_id' => ''
        ));
    }

    public function actionRealestateProjectCreate() {
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/profile/profile/realestateProjectIndex'),
            $model->name => Yii::app()->createUrl('/profile/profile/realestateProjectUpdate', array('rp_id' => $rp_id)),
        );
        $model = new RealEstateProject;
        $model->unsetAttributes();
        $user_id = Yii::app()->user->id;
        $listprovince = LibProvinces::getListProvinceArr();
        if (!$model->province_id) {
            $first = array_keys($listprovince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $model->province_id = $firstpro;
        }

        $listdistrict = false;

        if (isset($_POST['RealEstateProject'])) {
            $model->attributes = $_POST['RealEstateProject'];
            $province = LibProvinces::getProvinceDetail($model->province_id);
            if (isset($province) && $province['name']) {
                $model->province_name = $province['name'];
            }
            $district = LibDistricts::getDistrictDetailFollowProvince($model->province_id, $model->district_id);
            if (isset($district) && $district['name']) {
                $model->district_name = $district['name'];
            }
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            }

            $model->user_id = $user_id;
            if (!$model->getErrors()) {
                if ($model->save()) {
                    $this->redirect(array('realestateProjectIndex'));
                }
            }
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }
        $this->render('realestate_project_create', array(
            'model' => $model,
            'listprovince' => $listprovince,
            'listdistrict' => $listdistrict,
            'user_id' => $user_id,
            'rp_id' => '',
        ));
    }

    public function actionRealestateProjectUpdate($rp_id) {
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/profile/profile/realestateProjectIndex'),
            $model->name => Yii::app()->createUrl('/profile/profile/realestateProjectUpdate', array('rp_id' => $rp_id)),
        );
        $model = RealEstateProject::model()->findByPk($rp_id);
        $user_id = Yii::app()->user->id;
        $listprovince = LibProvinces::getListProvinceArr();
        if (!$model->province_id) {
            $first = array_keys($listprovince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $model->province_id = $firstpro;
        }

        $listdistrict = false;

        if (isset($_POST['RealEstateProject'])) {
            $model->attributes = $_POST['RealEstateProject'];
            $province = LibProvinces::getProvinceDetail($model->province_id);
            if (isset($province) && $province['name']) {
                $model->province_name = $province['name'];
            }
            $district = LibDistricts::getDistrictDetailFollowProvince($model->province_id, $model->district_id);
            if (isset($district) && $district['name']) {
                $model->district_name = $district['name'];
            }
            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            }

            $model->user_id = $user_id;
            if (!$model->getErrors()) {
                if ($model->save()) {
                    $this->redirect(array('realestateProjectIndex'));
                }
            }
        }
        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }
        $this->render('realestate_project_update', array(
            'model' => $model,
            'listprovince' => $listprovince,
            'listdistrict' => $listdistrict,
            'user_id' => $user_id,
            'rp_id' => $rp_id,
        ));
    }

    public function actionRealestateNewsUpdate($realestatenews_id) {
        $model = RealEstateNews::model()->findByPk($realestatenews_id);
        $this->breadcrumbs = array(
            Yii::t('realestate', 'list_realestate') => Yii::app()->createUrl('/content/realestate/'),
            Yii::t('news', 'news_edit') => Yii::app()->createUrl('/content/news/update', array('id' => $id)),
        );

        $category = new ClaCategory();
        $category->type = ClaCategory::CATEGORY_REAL_ESTATE;
        $category->generateCategory();

        $user_id = Yii::app()->user->id;

        $listprovince = LibProvinces::getListProvinceArr();
        if (!$model->province_id) {
            $first = array_keys($listprovince);
            $firstpro = isset($first[0]) ? $first[0] : null;
            $model->province_id = $firstpro;
        }
        $listdistrict = false;

        if (isset($_POST['RealEstateNews'])) {
            $model->attributes = $_POST['RealEstateNews'];
            $province = LibProvinces::getProvinceDetail($model->province_id);
            if (isset($province) && $province['name']) {
                $model->province_name = $province['name'];
            }
            $district = LibDistricts::getDistrictDetailFollowProvince($model->province_id, $model->district_id);
            if (isset($district) && $district['name']) {
                $model->district_name = $district['name'];
            }
            $model->user_id = $user_id;
            $model->processPrice();

            if ($model->avatar) {
                $avatar = Yii::app()->session[$model->avatar];
                if (!$avatar) {
                    $model->avatar = '';
                } else {
                    $model->image_path = $avatar['baseUrl'];
                    $model->image_name = $avatar['name'];
                }
            }
            //
            if (!$model->getErrors()) {
                if ($model->save()) {
                    unset(Yii::app()->session[$model->avatar]);
                    $this->redirect(array('realestateNewsIndex'));
                }
            }
        }

        if (!$listdistrict) {
            $listdistrict = LibDistricts::getListDistrictArrFollowProvince($model->province_id);
        }

        $this->render('realestate_news_update', array(
            'model' => $model,
            'category' => $category,
            'listprovince' => $listprovince,
            'listdistrict' => $listdistrict,
            'user_id' => $user_id,
            'realestatenews_id' => $realestatenews_id
        ));
    }

    public function actionRealestateDelete($realestate_id) {
        $model = RealEstate::model()->findByPk($realestate_id);
        if ($model->user_id != Yii::app()->user->id) {
            $this->jsonResponse(403);
        }
        if (!$model) {
            $this->jsonResponse(204);
        }
        if ($model->site_id != $this->site_id) {
            $this->jsonResponse(403);
        }
        //
        //
        if ($model->delete()) {
            $this->jsonResponse(200);
            return;
        }
        $this->jsonResponse(400);
    }

    public function actionRealestateProjectDelete($rp_id) {
        $model = RealEstateProject::model()->findByPk($rp_id);
        if ($model->user_id != Yii::app()->user->id) {
            $this->jsonResponse(403);
        }
        if (!$model) {
            $this->jsonResponse(204);
        }
        if ($model->site_id != $this->site_id) {
            $this->jsonResponse(403);
        }
        //
        if ($model->delete()) {
            $this->jsonResponse(200);
            return;
        }
        $this->jsonResponse(400);
    }

    public function actionRealestateNewsDelete($realestatenews_id) {
        $model = RealEstateNews::model()->findByPk($realestatenews_id);
        if ($model->user_id != Yii::app()->user->id) {
            $this->jsonResponse(403);
        }
        if (!$model) {
            $this->jsonResponse(204);
        }
        if ($model->site_id != $this->site_id) {
            $this->jsonResponse(403);
        }
        //
        //
        if ($model->delete()) {
            $this->jsonResponse(200);
            return;
        }
        $this->jsonResponse(400);
    }

    /**
     * cancelorder
     */
    function actionCancelorder() {
        $id = Yii::app()->request->getParam('oid');
        $key = Yii::app()->request->getParam('key');
        if ($id && $key) {
            $order = Orders::model()->findByPk($id);
            if (!$order)
                $this->sendResponse(404);
            if ($order->key != $key || $order->user_id != Yii::app()->user->id || $order->order_status != Orders::ORDER_WAITFORPROCESS)
                $this->sendResponse(404);
            //
//            $order->order_status = Orders::ORDER_DESTROY;
//            $order->save();
            $order->delete();
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('order'));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Users the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Users::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function beforeAction($action) {
        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $user_id = Yii::app()->request->getParam('id');
        if (!$user_id) {
            $user_id = Yii::app()->user->id;
        }
        $this->profileinfo = ClaUser::getUserInfo($user_id);
		
		$data = Yii::app()->db->createCommand()->select('*,SUM(invoice_price) AS revenue')
                ->from(ClaTable::getTable('invoice'))
                ->where('client_id=:client_id', array(':client_id' => $this->profileinfo['bank_id']))
                ->queryAll();
				
		
        $this->profileinfo['methodName'] = $this->methodName();
        $this->profileinfo['revenue'] = $data[0]['revenue'];
		if ($this->profileinfo['revenue'] < '5000000') {
			 $this->profileinfo['rate'] = 'Hội viên';
			 $this->profileinfo['bonus'] = '0%';
		}
		if ( $this->profileinfo['revenue'] >= '5000000' &&  $this->profileinfo['revenue'] < '10000000') {
			 $this->profileinfo['rate'] = 'Silver';
			 $this->profileinfo['bonus'] = '10%';
		}
		if ( $this->profileinfo['revenue'] >= '10000000' &&  $this->profileinfo['revenue'] < '20000000') {
			 $this->profileinfo['rate'] = 'Gold';
			 $this->profileinfo['bonus'] = '15%';
		}
		if ( $this->profileinfo['revenue'] >= '20000000' &&  $this->profileinfo['revenue'] < '30000000') {
			 $this->profileinfo['rate'] = 'Platinum';
			 $this->profileinfo['bonus'] = '20%';
		}
		if ($this->profileinfo['revenue'] > '30000000') {
			 $this->profileinfo['rate'] = 'Diamond';
			 $this->profileinfo['bonus'] = '25%';
		}
		
        $this->profileinfo['serverName'] = Yii::app()->getBaseUrl(true);
		
        if (!isset($this->profileinfo['site_id']) || $this->profileinfo['site_id'] != $this->site_id) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        //
        return parent::beforeAction($action);
    }

    public function actionUserIntroduce() {
        $site_id = Yii::app()->controller->site_id;
        $data = Yii::app()->db->createCommand()->select('user_id, name, user_introduce_id')
                ->from(ClaTable::getTable('users'))
                ->where('site_id=:site_id', array(':site_id' => $site_id))
                ->queryAll();
        $user = Users::getCurrentUser();
        $result = array();

        if ($user->user_introduce_id != 0) {
            $user_introduce = Users::model()->findByPk($user->user_introduce_id);
            $result[] = array(
                'id' => $user_introduce->user_id,
                'parent' => '#',
                'text' => $user_introduce->name,
                'state' => array('opened' => true)
            );
            $result[] = array(
                'id' => $user->user_id,
                'parent' => $user_introduce->user_id,
                'text' => $user->name,
                'state' => array('opened' => true)
            );
        } else {
            $result[] = array(
                'id' => $user->user_id,
                'parent' => '#',
                'text' => $user->name,
                'state' => array('opened' => true)
            );
        }
        $this->process_data($data, $user->user_id, $result);
        $html = json_encode($result);
        $this->render('user_introduce', array(
            'html' => $html,
        ));
    }

    public function process_data($data, $parent_id, &$result) {
        if (count($data) > 0) {
            foreach ($data as $key => $val) {
                if ($parent_id == $val['user_introduce_id']) {
                    $temp['id'] = $val['user_id'];
                    $temp['parent'] = $val['user_introduce_id'];
                    $temp['text'] = $val['name'];
                    $temp['state'] = array('opened' => true);
                    $result[] = $temp;
                    $_parent_id = $val['user_id'];
                    unset($data[$key]);
                    $this->process_data($data, $_parent_id, $result);
                }
            }
        }
    }

    
    public function actionStatistic() {
        $id = Yii::app()->request->getParam('id');
        if ($id) {
            $form = $this->loadModel($id);
        } else {
            $form = Forms::model()->findByAttributes(array('site_id' => $this->site_id));
            if ($form) {
                $id = $form->form_id;
            }
        }
        //
        if ($form->site_id != $this->site_id) {
            if (Yii::app()->request->isAjaxRequest) {
                $this->jsonResponse(400);
            } else {
                $this->sendResponse(400);
            }
        }
        //
        $this->breadcrumbs = array(
            $form->form_name => Yii::app()->createUrl('custom/customform/statistic', array('id' => $id)),
        );
        //
        $pagesize_widget = $this->widget('common.extensions.PageSize.PageSize', array(
            'mGridId' => 'customform-grid', //Gridview id
            'mPageSize' => Yii::app()->request->getParam(Yii::app()->params['pageSizeName']),
            'mDefPageSize' => Yii::app()->params['defaultPageSize'],
                ), true);
        //
        $page = Yii::app()->request->getParam('page');
        $limit = Yii::app()->user->getState(Yii::app()->params['pageSizeName'], Yii::app()->params['defaultPageSize']);
        //
        $totalItem = FormSessions::countFieldDataInForm($id);

        $listfields = FormFields::getFieldsInForm($id);
        $listinputfields = FormFields::getInputFieldsInForm($listfields);
        $fieldData = array();
        $gridColumns = array();
        if ($listinputfields) {
            $cinputfield = ($listfields) ? count($listinputfields) : 0;
            //
            $fieldData = FormSessions::getFieldDataInForm(array(
                        'form_id' => $id,
                        'fields' => $listfields,
                        'page' => $page,
                        'limit' => $limit,
                        'user_id' => Yii::app()->user->id,
            ));
            //
            //
            $gridColumns = array(
                'number' => array(
                    'header' => '',
                    'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + $row + 1',
                    'htmlOptions' => array('width' => 10,),
                ),
            );
            //
            foreach ($listinputfields as $lf) {
                $gridColumns[$lf['field_id']] = array(
                    'header' => $lf['field_label'],
                    'value' => function($data) use ($lf) {
                        return isset($data[$lf['field_id']]) ? HtmlFormat::subCharacter($data[$lf['field_id']]['field_data'], ' ', 15) : '';
                    }
                );
            }
        }
        //
        //
        $dataprovider = new ArrayDataProvider($fieldData, array(
            'id' => 'cf' . $id,
            'keyField' => 'form_id',
            'keys' => array('form_id'),
            'totalItemCount' => $totalItem,
            'pagination' => array(
                'pageSize' => $limit,
                'pageVar' => 'page',
            ),
        ));
        //
        $this->render('statistic', array(
            'form' => $form,
            'dataProvider' => $dataprovider,
            'gridColumns' => $gridColumns,
            'pagesize_widget' => $pagesize_widget,
        ));
    }
    
    public function actionUserinfo()
    {    
        $this->breadcrumbs = array(            
            Yii::t('news', 'Thông tin tài khoản') => Yii::app()->createUrl('profile/profile/userinfo'),
        );
        $data['data'] = $this->getProfile();
        $this->render('showInfor', $data);
    }
    
    public function getProfile()
    {   
        $domain = Yii::app()->getBaseUrl(true);
        $id = Yii::app()->user->id;
        $user = Users::model()->findByPk($id);
        $avatar = '/mediacenter/media/images/1182/logo/326_1544169906_5305c0a29b2308e2.png';
        if (!empty($user->avatar)) {
            $avatar = $user->avatar;
        }
        
        $data = array(
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'client_id' => $user->bank_id,
            'sex' => $user->sex,
            'birthday' => $user->birthday,
            'address' => $user->address,
            'zocoin' => $user->zocoin,
            'avatar' => $domain."/".$avatar,
        );
        return $data;
    }
    
    protected function uploadFileProfile($file, $folder = 'banners')
    {   
        if (empty($file)) {
           return '';
        }
        $model = new Banners;
        $model->banner_src = 'true';
        $extensions = Banners::allowExtensions();
        if (!isset($extensions[$file['type']])) {
            $this->respondError('file invalid format');
        }
        $up = new UploadLib($file);
        $up->setPath(array($this->site_id, 'avatar'));
        $up->setForceSize(array((int) $model->banner_width, (int) $model->banner_height));
        $up->uploadFile();
        $response = $up->getResponse(true);
        
        if ($up->getStatus() != '200') {
            $this->respondError('upload error');
        } 
        
        return  "mediacenter/".$response['baseUrl'] . $response['name'];
    }
    
     public function actionDemo() 
     {
        $file = $_FILES['file'];
        echo $this->uploadFileProfile($file);
     }
    
    public function actionUpdateProfile()
    {   
        
        $email = $this->postPram('email');
        $phone = $this->postPram('phone');
        $fullName = $this->postPram('fullName');
        $birthday = $this->postPram('birthday');
        $address = $this->postPram('address');
        $sex = $this->postPram('sex');
        $file = $_FILES['file'];
        
        if (empty($email) || empty($fullName) || empty($birthday) || empty($address)) {
            $this->respondError("BÃ¡ÂºÂ¡n khÃƒÂ´ng Ã„â€˜Ã†Â°Ã¡Â»Â£c bÃ¡Â»Â trÃƒÂ´ng cÃƒÂ¡c mÃ¡Â»Â¥c cÃƒÂ³ *");
        }
     
        if (empty($sex)) {
            $sex = 0;
        }
        
        $userID = Yii::app()->user->id;
        $user=Users::model()->findByPk($userID);
        
        if (!empty($file)) {
            $user->avatar = $this->uploadFileProfile($file);
        }
       
        $user->name = $fullName;
        $user->email = $email;
        $user->sex = $sex;
           
        $user->birthday = $birthday;
        $user->address = $address;
       
        if ($user->save()) {
            $this->respondStatus("Cập nhận thành công");
        }
        $this->respondError("Sây ra lỗi vui lòng thử lại sau");
    }
    
    public function actionInfoAdvanced()
    {
        $this->breadcrumbs = array(            
            Yii::t('news', 'Thông tin nâng cao') => Yii::app()->createUrl('profile/profile/infoadvanced'),
        );
        $this->render('infoAdvanced');
    }
    
    public function actionSaveAdvanced()
    {
        $certificates = $this->postPram('certificates');
        $dateRange = $this->postPram('dateRange');
        $issuedBy = $this->postPram('issuedBy');
        $keyReferrers = $this->postPram('keyReferrers');
        $linkReferrers = $this->postPram('linkReferrers');
        $nameReferrers = $this->postPram('nameReferrers');
        $certificatesFirst = $_FILES['certificatesFirst'];
        $certificatesLast = $_FILES['certificatesLast'];
        
        if (empty($certificates) || empty($dateRange) || empty($issuedBy)) {
            $this->respondError("Bạn không được bỏ trông các mục có *");
        }
        
        if (empty($this->profileinfo['censorship']) && (empty($certificatesFirst) || empty($certificatesLast))) {
            $this->respondError("Bạn chưa có ảnh CMTND*");
        }
     
        $userID = Yii::app()->user->id;
        $user=Users::model()->findByPk($userID);
    
        if (empty($this->profileinfo['censorship'])) {
            $user->back_identity_card = $this->uploadFileProfile($certificatesLast, 'certificates');
            $user->front_identity_card = $this->uploadFileProfile($certificatesFirst, 'certificates');
            $user->identity_card = $certificates;
            $user->created_identity_card = $dateRange;
            $user->address_identity_card = $nameReferrers;
        }
        //$user->zoda_granted = $nameReferrers;
        if ($user->save()) {
            $this->respondStatus("Cập nhận thành công");
        }
        $this->respondError("Sây ra lỗi vui lòng thử lại sau");
    }
    
    public function actionBank() 
    {
        $this->breadcrumbs = array(            
            Yii::t('news', 'Thông tin ngân hàng') => Yii::app()->createUrl('profile/profile/infoadvanced'),
        );
        $this->render('bank');
    }
    
    
    public function actionShowPayment()
    {   
        $this->breadcrumbs = array(            
            Yii::t('news', 'Rút Tiền') => Yii::app()->createUrl('profile/profile/infoadvanced'),
        );
        $userID = Yii::app()->user->id;
        $sql = 'SELECT * FROM payments WHERE user_id = '. $userID.' ORDER BY id DESC';
        $payments = Yii::app()->db->createCommand($sql)->queryAll();
        //$this->printData($payments);
        $this->render('payment', array('payments' => $payments));
    }
	public function actionNew()
    {   
		$id = '6463';
		
        $sql = 'SELECT * FROM news WHERE news_category_id = '. $id.' ORDER BY news_id DESC';
        $listnews = Yii::app()->db->createCommand($sql)->queryAll();
		
		$news = array();
        if ($listnews) {
            foreach ($listnews as $n) {
                $n['news_sortdesc'] = nl2br($n['news_sortdesc']);
                $n['link'] = Yii::app()->createUrl('news/news/detail', array('id' => $n['news_id'], 'alias' => $n['alias']));
                array_push($news, $n);
            }
        }
		
		$this->render('new', array(
			'listnews' => $news,
		));
    }
    
    public function actionPayment()
    {   
       
        $numberMoney = (int)$this->postPram('numberMoney');
        if ($numberMoney <= 0) {
            $this->respondError('Bạn chưa nhập số tiền, sô tiện phải lớn hơn 0');
        }
        
        if ($numberMoney > $this->profileinfo['zocoin']) {
            $this->respondError('Bạn không được rút tiên quá số zocoin hiện có');
        }
        
        if (empty($this->profileinfo['bank_id']) || empty($this->profileinfo['bank_name']) || empty($this->profileinfo['bank_branch'])) {
            $this->respondError('Bạn chưa có tài khoản ngân hàng');
        }
        if (empty($this->profileinfo['censorship'])) {
            $this->respondError('Tài khoản của bạn chưa được sác nhận');
        }
        
        $userID = Yii::app()->user->id;
        $date = date("d-m-Y H:i:s");
        $payment = new Payments;
        $payment->user_id = $userID;
        $payment->money = $numberMoney;
        $payment->bank_number = $this->profileinfo['bank_id'];
        $payment->bank_name = $this->profileinfo['bank_name'];
        $payment->bank_branch = $this->profileinfo['bank_branch'];
        $payment->created_at = $date;
        $payment->updated_at = $date;
        
         if ($payment->save()) {
            $zocoin = $this->profileinfo['zocoin'] - $numberMoney;
            $user = Users::model()->findByPk($userID);
            $user->zocoin = $zocoin;
            $user->save();
            $data = array(
                'zocoin' => $zocoin
            ); 
            $this->respondData($data, 200, 'Yêu cầu thành công. Zoda sẽ chuyển tiền vào tài khoản ngân hàng của bạn trong vòng 24 tiếng đồng hồ.');
        }
        $this->respondError("Sây ra lỗi vui lòng thử lại sau");
        
    }
    
}
