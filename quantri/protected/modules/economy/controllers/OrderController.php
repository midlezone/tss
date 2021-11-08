<?php

class OrderController extends BackController {

	 const SECOND_IN_DAY = 86400;
	 /***
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('shoppingcart', Yii::t('shoppingcart', 'order_manager')) => Yii::app()->createUrl('/economy/order'),
            Yii::t('shoppingcart', Yii::t('shoppingcart', 'Tao Mới Đơn Hàng')) => Yii::app()->createUrl('/economy/order/create'),
        );
	        
		$billing = new Billing();
        $order = new Orders();
		
        //
        if (Yii::app()->request->isPostRequest) {
			$order->attributes = Yii::app()->request->getPost('Orders');
			$billing->attributes = Yii::app()->request->getPost('Billing');
			//assign billing
			$order->billing_name = $billing->name;
			$order->billing_address = $billing->address;
			$order->billing_email = $billing->email;
			$order->billing_phone = $billing->phone;
			$order->billing_city = $billing->city;	
			$order->site_id = $this->site_id;
			 //assign shipping
			$order->shipping_name = $billing->name;
			$order->shipping_phone = $billing->phone;
			$order->shipping_address = $billing->address;
			$order->shipping_city = $billing->city;
			$order->transport_method = 1;
			$order->coupon_code = 1;
			$order->currency = 1;
			$order->ip_address = 1;
			$order->key = 1;	
			
		
			if ($order->save())
                $this->redirect(Yii::app()->createUrl('economy/order'));
			
        }	
		$this->render('create', array(
			'billing' => $billing,
			'order' => $order,
        ));
		
		
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('shoppingcart', Yii::t('shoppingcart', 'order_manager')) => Yii::app()->createUrl('/economy/order'),
            Yii::t('shoppingcart', Yii::t('shoppingcart', 'order_update')) => Yii::app()->createUrl('/economy/order/update', array('id' => $id)),
        );
        //
        $model = $this->loadModel($id);	   

        if ($model->site_id != $this->site_id)
            $this->sendResponse(404);
        //
        if ($model->viewed == Orders::ORDER_NOTVIEWED)
            $model->viewed = Orders::ORDER_VIEWED;
        //
        $products = OrderProducts::getProductsDetailInOrder($id);
        foreach ($products as $value) {
            $categoryID = $value['product_category_id'];
        }
        $percent = Yii::app()->db->createCommand()->select('percent')
                    ->from(ClaTable::getTable('product_categories'))
                    ->where('cat_id=:cat_id', array(':cat_id' => $categoryID))
                    ->queryRow();
        $paymentmethod = Orders::getPaymentMethodInfo($model->payment_method);
        $transportmethod = Orders::getTransportMethodInfo($model->transport_method);

        // get dữ liệu user mua hàng
        $data = $this->getUserForToken($model->token_introduce);
     
		
        if (isset($_POST['Orders'])) {            
            if ($_POST['Orders']['order_status'] == 6) {
                    if ($model->user_id == 0) {
                        $update = Yii::app()->db->createCommand()
                            ->update('users_admin', 
                                array(
                                    'zocoin'=>$zocoin
                                ),'site_id=:site_id',array(':site_id'=>$model->site_id)
                        );
                        
                    }                
                    if(!empty($data)) {

                        $model_user = new Users();
                        $model_user = $model_user->findByPk($data[0]['user_id']);
                        $price = $model->order_total;

                         $key = 2;
                         $token_introduce = $model_user['token_introduce'];
                         $zcoin = $model_user['zocoin'];
                         $user_id = $model_user['user_id'];
						 $i = 1;
                        // for($i = 1; $i < 50; $i++) {
                            //get data cấp 1
                            ${'data_level_' . 'i'} = $this->getUserForToken($token_introduce);
							$percent['percent'] = 10;
							
                            if (!empty(${'data_level_' . 'i'})) {
								
								
                                ${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
                                ${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  +  $zcoin;							
							
                                $updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
                                //get data cấp 2
                                $token_introduce = ${'data_level_' . 'i'}[0]['token_introduce'];
                                $zcoin = ${'data_level_' . 'i'}[0]['zocoin'];
                                $user_id = ${'data_level_' . 'i'}[0]['user_id'];
                                $key =  $key*2;
								
								
								
									$i = $i + 1;
									${'data_level_' . 'i'} = $this->getUserForToken($token_introduce);		
									if (!empty(${'data_level_' . 'i'})) {
										
										$percent['percent'] = 10;
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  +  $zcoin;							

										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
										//get data cấp 2
										$token_introduce = ${'data_level_' . 'i'}[0]['token_introduce'];
										$zcoin = ${'data_level_' . 'i'}[0]['zocoin'];
										$user_id = ${'data_level_' . 'i'}[0]['user_id'];
										$key =  $key*2;	
									} else {                                
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  + $zcoin;
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
									}
										$i = $i + 1;
									${'data_level_' . 'i'} = $this->getUserForToken($token_introduce);					
									if (!empty(${'data_level_' . 'i'})) {
										
										$percent['percent'] = 10;
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  +  $zcoin;							
									
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
										//get data cấp 2
										$token_introduce = ${'data_level_' . 'i'}[0]['token_introduce'];
										$zcoin = ${'data_level_' . 'i'}[0]['zocoin'];
										$user_id = ${'data_level_' . 'i'}[0]['user_id'];
										$key =  $key*2;	
									} else {                                
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  + $zcoin;
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
									}
									
									$i = $i + 1;
									${'data_level_' . 'i'} = $this->getUserForToken($token_introduce);					
									if (!empty(${'data_level_' . 'i'})) {
										
										$percent['percent'] = 10;
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  +  $zcoin;							
									
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
										//get data cấp 2
										$token_introduce = ${'data_level_' . 'i'}[0]['token_introduce'];
										$zcoin = ${'data_level_' . 'i'}[0]['zocoin'];
										$user_id = ${'data_level_' . 'i'}[0]['user_id'];
										$key =  $key*2;	
									} else {                                
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  + $zcoin;
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
									}
									
									$i = $i + 1;
									${'data_level_' . 'i'} = $this->getUserForToken($token_introduce);					
									if (!empty(${'data_level_' . 'i'})) {
										
										$percent['percent'] = 10;
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  +  $zcoin;							
									
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
										//get data cấp 2
										$token_introduce = ${'data_level_' . 'i'}[0]['token_introduce'];
										$zcoin = ${'data_level_' . 'i'}[0]['zocoin'];
										$user_id = ${'data_level_' . 'i'}[0]['user_id'];
										$key =  $key*2;	
									} else {                                
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  + $zcoin;
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
									}
									
									$i = $i + 1;
									${'data_level_' . 'i'} = $this->getUserForToken($token_introduce);					
									if (!empty(${'data_level_' . 'i'})) {
										
										$percent['percent'] = 10;
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  +  $zcoin;							
									
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
										//get data cấp 2
										$token_introduce = ${'data_level_' . 'i'}[0]['token_introduce'];
										$zcoin = ${'data_level_' . 'i'}[0]['zocoin'];
										$user_id = ${'data_level_' . 'i'}[0]['user_id'];
										$key =  $key*2;	
									} else {                                
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  + $zcoin;
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
									}
									
										$i = $i + 1;
									${'data_level_' . 'i'} = $this->getUserForToken($token_introduce);					
									if (!empty(${'data_level_' . 'i'})) {
										
										$percent['percent'] = 10;
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  +  $zcoin;							
									
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
										//get data cấp 2
										$token_introduce = ${'data_level_' . 'i'}[0]['token_introduce'];
										$zcoin = ${'data_level_' . 'i'}[0]['zocoin'];
										$user_id = ${'data_level_' . 'i'}[0]['user_id'];
										$key =  $key*2;	
									} else {                                
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  + $zcoin;
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
									}
									
									$i = $i + 1;
									${'data_level_' . 'i'} = $this->getUserForToken($token_introduce);					
									if (!empty(${'data_level_' . 'i'})) {
										
										$percent['percent'] = 10;
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  +  $zcoin;							
									
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
										//get data cấp 2
										$token_introduce = ${'data_level_' . 'i'}[0]['token_introduce'];
										$zcoin = ${'data_level_' . 'i'}[0]['zocoin'];
										$user_id = ${'data_level_' . 'i'}[0]['user_id'];
										$key =  $key*2;	
									} else {                                
										${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
										${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  + $zcoin;
										$updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
									}
									
								
                            } else {                                
                                ${'zocoin' . 'i'} = $this->payZcoin($percent['percent'],$key,$price);                                
                                ${'zocoinTotal' . 'i'} = ${'zocoin' . 'i'}  + $zcoin;
                                $updateData = $this->updateZcoin($user_id,${'zocoinTotal' . 'i'});
                            }
                         //} 
						 
                                             
                    }
            }

            $model->attributes = $_POST['Orders'];
            if ($model->save()) {
                  $this->redirect(Yii::app()->createUrl('economy/order'));
            }
        }
		
		 $this->render('update', array(
			'model' => $model,
			'products' => $products,
			'paymentmethod' => $paymentmethod,
			'transportmethod' => $transportmethod,
		));		
       
    }

    public function payZcoin ($percent,$key,$price) { 
         $zocoin= (($price*$percent/100)/$key)/1000;
         return $zocoin;
    }
    
    public function getUserForToken ($token_introduce) {
        $data = Yii::app()->db->createCommand()->select('user_id,zocoin,token_introduce')
                ->from(ClaTable::getTable('users'))
                ->where('token=:token', array(':token' => $token_introduce))
                ->queryAll();
         return $data;
    }
    public function updateZcoin ($id,$zocoin) {
        $update = Yii::app()->db->createCommand()
                    ->update('users', 
                        array(
                            'zocoin'=>$zocoin
                        ),'user_id=:user_id',array(':user_id'=>$id)
                    );
         return $update;
    }
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $order = $this->loadModel($id);
        if ($order->site_id != $this->site_id)
            $this->jsonResponse(400);
        $order->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Xóa các sản phẩm được chọn
     */
    public function actionDeleteall() {
        if (Yii::app()->request->isAjaxRequest) {
            $list_id = Yii::app()->request->getParam('lid');
            if (!$list_id)
                Yii::app()->end();
            $ids = explode(",", $list_id);
            $count = (int) sizeof($ids);
            for ($i = 0; $i < $count; $i++) {
                if ($ids[$i]) {
                    $model = $this->loadModel($ids[$i]);
                    if ($model->site_id == $this->site_id) {
                        $model->delete();
                    }
                }
            }
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('shoppingcart', Yii::t('shoppingcart', 'order_manager')) => Yii::app()->createUrl('/economy/order'),
        );
        //
        $model = new Orders('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Orders']))
            $model->attributes = $_GET['Orders'];
				
		if ($this->site_id == 1121) {
			$this->render('index1', array(
				'model' => $model,
			));
			
		} else {
			$this->render('index', array(
				'model' => $model,
			));
		}
        
    }
    /**
     * Lists all models.
     */
    public function actionPayment() {
        //breadcrumbs
        $this->breadcrumbs = array(
            Yii::t('shoppingcart', Yii::t('shoppingcart', 'Rút Tiền Zocoin')) => Yii::app()->createUrl('/economy/payment'),
        );
        
        $model = new Orders('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Orders']))
            $model->attributes = $_GET['Orders'];
				
		
		$this->render('payment', array(
			'model' => $model,
		));
		
    }
    
    public function balance(Request $request)
    {
        $from = $this->getFilterDateRange($request)['from'];
        $to = $this->getFilterDateRange($request)['to'];

        $vendor_id = (can_access('report.vendor')) ? $request->vendor_id : Auth::user()->vendor_id;

        $vendors = $this->user->vendors(false);
        $report = $this->reportService->balanceReport($from, $to, $vendor_id);

        return view('components.report.balance',
            ['report' => $report,
                'vendors' => $vendors,
                'start_date' => $from
            ]
        );
    }
    public function actionReportTransaction() 
    {

        $this->breadcrumbs = array(
            Yii::t('user', 'Thống Kế Doanh Thu') => Yii::app()->createUrl('/economy/order'),
        );

        $request_filter_days = Yii::app()->request->getQuery('filter_days');
        $request_from = Yii::app()->request->getQuery('date_from');
        $request_to = Yii::app()->request->getQuery('date_to');

        
        //$from = $this->getFilterDateRange($request_filter_days,$request_from, $request_to);
        //$to = $this->getFilterDateRange($request_filter_days,$request_from, $request_to);

        $to = strtotime('yesterday');        

        if (isset($request_filter_days) && $request_filter_days != '') {
            $from = $to - $request_filter_days* self::SECOND_IN_DAY;
        } else {
            if (isset($request_from)) {
                $from = strtotime($request_from);
            } else {
                $from = $to - 7 * self::SECOND_IN_DAY;
            }

            if (isset($request_to)) {
                $to = strtotime($request_to);
            }
        }
      
        $site_id = Yii::app()->controller->site_id;

        $data = Yii::app()->db->createCommand()->select('sum(order_total) as total,created_time')
                ->from(ClaTable::getTable('orders'))
                ->where('site_id = "'.$site_id.'" AND  order_status = "6" AND  created_time >= "'.$from.'" AND created_time <='.$to)
                ->group('created_time')
                ->queryAll();


        $date_from = date_create(date('Y-m-d',$from));
        $date_to = date_create(date('Y-m-d',$to));
        $datediff = date_diff($date_to,$date_from);
	
        $dataTotal = array();
        foreach ($data as $key=>$value) {            
             $dataTotal[date('Y-m-d',$value['created_time'])] = $value['total'];            
        }
	
        for($i = 0; $i <= $datediff->format("%a"); $i++) {
			$dataArr[date('Y-m-d',$from + $i * self::SECOND_IN_DAY)] = 0;
        }
        
        $sums = array();
        foreach (array_keys($dataTotal + $dataArr) as $key) {
            $sums[$key] = (isset($dataTotal[$key]) ? $dataTotal[$key] : 0) + (isset($dataArr[$key]) ? $dataArr[$key] : 0);
        }
        ksort($sums);

        foreach ($sums as $key=>$value) {            
             $dataTotalArr[] = $value;            
        }
 
        $this->render('report_transaction', array(            
                'report' =>json_encode($dataTotalArr),
                'start_date' => $from,
                'filter_days' =>  $request_filter_days

        ));
    }


    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Orders the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Orders::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Orders $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'orders-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
