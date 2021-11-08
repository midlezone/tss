<?php

class ShoppingcartController extends PublicController {

    public $layout = '//layouts/shopping';
	
	public $url_api = 'https://www.nganluong.vn/checkout.api.nganluong.post.php';
    public $merchant_id = '63103';
    public $merchant_password = '8856c99910c77dcb085e22ea93f8e004';
    public $receiver_email = 'minhtt83@gmail.com';
	
	public $merchant_id2 = '64173';
    public $merchant_password2 = 'c99f04967cd15db659221b58b8c05720';
	public $receiver_email2 = 'trutienh5vn113@gmail.com';
	public $cur_code = 'vnd';
    public $version ='3.1';
	
	
	
    public function actionIndex() {
		
		$id = Yii::app()->user->id;
		$user = ClaUser::getUserInfo(Yii::app()->user->id);
		
		$data = Yii::app()->db->createCommand()->select('*,SUM(invoice_price) AS revenue')
                ->from(ClaTable::getTable('invoice'))
                ->where('client_id=:client_id', array(':client_id' => $user['bank_id']))
                ->queryRow();
		if ($user['zocoin'] == '') {
			if ($data['revenue'] < '5000000') {
			 $data['bonus'] = '0%';
			}
			if ($data['revenue'] >= '5000000' &&  $data['revenue'] < '10000000') {
				 $data['bonus'] = '10%';
			}
			if ($data['revenue'] >= '10000000' &&  $data['revenue'] < '20000000') {
				$data['bonus'] = '15%';
			}
			if ($data['revenue'] >= '20000000' &&  $data['revenue'] < '30000000') {
				$data['bonus'] = '20%';
			}
			if ($data['revenue'] > '30000000') {
				$data['bonus'] = '25%';
			}
		} else {
			if ($user['zocoin'] == 'Hội viên') {
				$data['bonus'] = '0%';
			}
			if ($user['zocoin'] == 'Silver' ) {
				 $data['bonus'] = '10%';
			}
			if ($user['zocoin'] == 'Gold') {
				$data['bonus'] = '15%';
			}
			if ($user['zocoin'] == 'Platinum') {
				$data['bonus'] = '20%';
			}
			if ($user['zocoin'] == 'Diamond') {
				$data['bonus'] = '25%';
			}
			if ($user['zocoin'] == 'Fan Cứng') {
				$data['bonus'] = '20%';
			}
		}
		
	
        $shoppingCart = Yii::app()->customer->getShoppingCart();		
	
		$model = new Product;
        $model->site_id = $this->site_id;
		
		if ($this->site_id == 1121) {
			 $this->render('index1', array(
				'shoppingCart' => $shoppingCart
			));
		} 
		if ($this->site_id == 1145) {
			$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/checkout', array('step' => 's2', 'user' => 'guest')));
		} else {
			 $this->render('index', array(
				'shoppingCart' => $shoppingCart,
				'revenue' => $data['revenue'],
				'bonus' => $data['bonus'],
			));
		}
      
    }
	
	
    public function actionCheckout() {
	
        $step = Yii::app()->request->getParam('step');
        if (!$step)
            $step = 's1';
		
		if ($this->site_id == 1121) {
			$view = 'checkout_s11';
		} else {
			 $view = 'checkout_s1';
		}		
		$shoppingCart = Yii::app()->customer->getShoppingCart();		
	
		$rose = Yii::app()->session['refcode'];
		$token_introduce = Yii::app()->session['token'];

        $params = array();

        switch ($step) {
            case 's1': {
					$code = Yii::app()->request->getParam('code');				
                    if (Yii::app()->user->isGuest)
                        break;
                }
            default: {
					if ($this->site_id == 1121) {
						$view = 'checkout_s21';
					} 
					if($this->site_id == 1145) {
						$view = 'checkout_g2s';
					} elseif ($this->site_id == 1204 || $this->site_id == 1227) {
						$view = 'checkout_chuspa';
					}elseif ($this->site_id == 1248) {
						$view = 'checkout_pro168';
					} else {
						$view = 'checkout_s2';
					} 
                    $billing = new Billing();
                    $billing->billtoship = 1;
					
					$userinfo = ClaUser::getUserInfo(Yii::app()->user->id);
              
                    if (!Yii::app()->user->isGuest) {
                        if ($userinfo) {
                            $billing->name = $userinfo['name'];
							$billing->point = $userinfo['point'];
                            if ($userinfo['address'])
                                $billing->address = $userinfo['address'];
                            if ($userinfo['email'])
                                $billing->email = $userinfo['email'];
                            if ($userinfo['phone'])
                                $billing->phone = $userinfo['phone'];
                            if ($userinfo['province_id'])
                                $billing->city = $userinfo['province_id'];
                        }
                    }
						
                    $shipping = new Shipping();
                    $order = new Orders();
					
					$usermodel = new Users();
				    $usermodel->site_id = $this->site_id;
		
					
					if ($this->site_id == 1204) {
						 if (Yii::app()->request->isPostRequest) {
								$siteId = $this->site_id;
							    //assign billing
								$usermodel->attributes = $_POST['Users'];							
								$usermodel->name = $usermodel->name;
								$usermodel->email = $usermodel->email;
								$usermodel->phone = $usermodel->phone;
								$usermodel->active = 1;
								$usermodel->password = $random = substr(md5(mt_rand()), 0, 8);
								$usermodel->created_time = $usermodel->modified_time = strtotime(date("Y-m-d"));
								
								$checkEmail = Yii::app()->db->createCommand()->select('email')
								->from(ClaTable::getTable('users'))
								->where('email=:email', array(':email' => $usermodel->email))
								->queryAll();
								
								if (!empty($checkEmail)) {							
									$error_email = 'Email đã tồn tại, Vui lòng chọn email khác!';
								} else {

									if ($usermodel->save()) {
										$email = $usermodel->email;
										$data = array(
											'link' => '<a href="' . Yii::app()->createAbsoluteUrl('/economy/shoppingcart/complete', array('email' => $email)) . '">Link</a>',
										);
										
										$content = '<p>Chào '.$usermodel->name.'</p>

											<div><span style="line-height: 20.8px;">Cảm Ơn Bạn Đã Đăng Ký Thành Công Khóa Học Của Chúng Tôi!</span></div>
											<div>&nbsp;</div>
											<div><span style="line-height: 20.8px;">Thông Tin Đăng Nhập Của Bạn Là:</span></div>
											<div>&nbsp;</div>
											<div><span style="line-height: 20.8px;">Username: '.$usermodel->email.'</span></div>
											<div>&nbsp;</div>
											<div><span style="line-height: 20.8px;">Mật Khẩu Sẽ Gửi Lại Cho Quý Khách Khi Chúng Tôi Xác Nhận Bạn Chuyển Khoản Thành Công!</span></div>
											<div>&nbsp;</div>
											<div><span style="font-weight: bold;">THÔNG TIN TÀI KHOẢN NGÂN HÀNG:</span></div>
											<div><span style="font-weight: bold;">- NGÂN HÀNG VIETCOMBANK</span></div>
											<div><span style="font-weight: bold;">- Chi nhánh: Thanh Xuân - Hà Nội</span></div>
											<div><span style="">Tên tài khoản nhận: <strong>Lê Vân Anh</strong></span></div>
											<div><span style="">Số tài khoản nhận: <strong>0711000274835</strong></span></div>
											<div><span style="">Số tiền thanh toán: <strong>1.390.000 VNĐ</strong></div>
											<div><span style="">Nội dung chuyển khoản: <strong>ghi email của bạn</strong></div>
											<div>&nbsp;</div>
											
											<div><span style="line-height: 20.8px;">Thanks!</span></div>
											<div>&nbsp;</div>

											<div>
											<table border="0" cellpadding="0" cellspacing="0" style="color: rgb(34, 34, 34); line-height: normal; font-size: 0.75em; font-family: Verdana;" width="700">
												<tbody>
													<tr>
														<td align="left" style="font-family: arial, sans-serif; margin: 0px;">
															<img alt="" src="http://donnhakieunhat.com/mediacenter/media/images/1204/logo/546_1546834689_4945c32d3014b905.png" style="width: 170px; height: 70px;" />
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

														<div style="clear: both; min-height: 10px;">Website: www.donnhakieunhat.com</div>
														</div>
														</td>
													</tr>
												</tbody>
											</table>
											</div>
											';
											$subject = 'Thông báo đăng ký khóa học thành công!';
											
											$content_admin = '<p>Chào Admin</p>
											
											<div><span style="font-weight: bold;">Có khách đặt hàng trên website <b>donnhakieunha.com</b> của bạn</span></div>
											<div><span style="font-weight: bold;"><b>Thông Tin Khách Hàng Đăng Ký:</b></span></div>
											<div><span style="font-weight: bold;"><b>Họ Và Tên: '.$usermodel->name.'</b></span></div>
											<div><span style="font-weight: bold;"><b>Email: '.$usermodel->email.'</b></span></div>
											<div><span style="font-weight: bold;"><b>Số Điện Thoại: '.$usermodel->phone.'</b></span></div>
											<div><span style="font-weight: bold;">Nếu đã xác nhận chuyển tiền thành công vui lòng nhấn vào '.$data['link'].' sau để gửi mật khẩu cho khách hàng!</span></div>
											

											<div><span style="line-height: 20.8px;">Thanks!</span></div>
											<div>&nbsp;</div>

											<div>
											<table border="0" cellpadding="0" cellspacing="0" style="color: rgb(34, 34, 34); line-height: normal; font-size: 0.75em; font-family: Verdana;" width="700">
												<tbody>
													<tr>
														<td align="left" style="font-family: arial, sans-serif; margin: 0px;">
															<img alt="" src="http://donnhakieunhat.com/mediacenter/media/images/1204/logo/546_1546834689_4945c32d3014b905.png" style="width: 170px; height: 70px;" />
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

														<div style="clear: both; min-height: 10px;">Website: www.donnhakieunhat.com</div>
														</div>
														</td>
													</tr>
												</tbody>
											</table>
											</div>
											';
										$subject_admin = 'Thông báo có khách hàng đăng ký khóa học!';
										if ($content && $subject) {
											Yii::app()->mailer->send('', $email, $subject, $content);
										}
										if ($content_admin && $subject_admin) {
											Yii::app()->mailer->send('', 'minhtt83@gmail.com', $subject_admin, $content_admin);
										}
									
										$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/order', array(
													
										)));
													
									}
								}
								
							 
						 }
						   $params = array(
								'billing' => $usermodel,
								'error_email' => $error_email
							);						 
						
					} elseif ($this->site_id == 1227) {
						 if (Yii::app()->request->isPostRequest) {
								$siteId = $this->site_id;
							    //assign billing
								$usermodel->attributes = $_POST['Users'];							
								$usermodel->name = $usermodel->name;
								$usermodel->email = $usermodel->email;
								$usermodel->phone = $usermodel->phone;
								$usermodel->active = 1;
								$usermodel->password = $random = substr(md5(mt_rand()), 0, 8);
								$usermodel->created_time = $usermodel->modified_time = strtotime(date("Y-m-d"));
								
								$checkEmail = Yii::app()->db->createCommand()->select('email')
								->from(ClaTable::getTable('users'))
								->where('users.email="'.$usermodel->email.'" AND users.site_id='.$siteId )
								->queryAll();
								
								if (!empty($checkEmail)) {							
									$error_email = 'Email đã tồn tại, Vui lòng chọn email khác!';
								} else {
									if ($usermodel->save()) {
										$email = $usermodel->email;
										$data = array(
											'link' => '<a href="' . Yii::app()->createAbsoluteUrl('/economy/shoppingcart/complete', array('email' => $email)) . '">Link</a>',
										);
										
										$content = '<p>Chào '.$usermodel->name.'</p>

											<div><span style="line-height: 20.8px;">Cảm Ơn Bạn Đã Đăng Ký Thành Công Website Chuspa.vn Của Chúng Tôi!</span></div>
											<div>&nbsp;</div>
											<div><span style="line-height: 20.8px;">Thông Tin Đăng Nhập Của Bạn Là:</span></div>
											<div>&nbsp;</div>
											<div><span style="line-height: 20.8px;">Username: '.$usermodel->email.'</span></div>
											<div>&nbsp;</div>
											<div><span style="line-height: 20.8px;">Mật Khẩu Sẽ Gửi Lại Cho Quý Khách Khi Chúng Tôi Xác Nhận Bạn Chuyển Khoản Thành Công!</span></div>
											<div>&nbsp;</div>
											<div><span style="font-weight: bold;">THÔNG TIN TÀI KHOẢN NGÂN HÀNG:</span></div>
											<div><span style="font-weight: bold;">- NGÂN HÀNG Vpbank</span></div>
											<div><span style="font-weight: bold;">- Chi Nhánh Ngô Quyền, Hà Nội</span></div>
											<div><span style="">Tên tài khoản nhận: <strong>Trương Thanh Minh </strong></span></div>
											<div><span style="">Số tài khoản nhận: <strong>19455 8888</strong></span></div>
											<div><span style="">Số tiền thanh toán: <strong>4.999.000 VNĐ</strong></div>
											<div><span style="">Nội dung chuyển khoản: <strong>ghi email của bạn</strong></div>
											<div>&nbsp;</div>
											
											<div><span style="line-height: 20.8px;">Thanks!</span></div>
											<div>&nbsp;</div>

											<div>
											<table border="0" cellpadding="0" cellspacing="0" style="color: rgb(34, 34, 34); line-height: normal; font-size: 0.75em; font-family: Verdana;" width="700">
												<tbody>
													<tr>
														<td align="left" style="font-family: arial, sans-serif; margin: 0px;">
															<img alt="" src="" style="width: 170px; height: 70px;" />
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
														<div style="clear: both; min-height: 10px;">@2019 Chuspa.vn</div>
														<div style="clear: both; min-height: 10px;">Tel: 090.793.8866 - Fax:&nbsp;<span style="line-height: 14.4px;">090.793.8866</span></div>

														<div style="clear: both; min-height: 10px;"><span style="line-height: 14.4px;">Email: info@chuspa.vn - Hotline: 090.793.8866</span></div>

														<div style="clear: both; min-height: 10px;">Website: www.chuspa.vn</div>
														</div>
														</td>
													</tr>
												</tbody>
											</table>
											</div>
											';
											$subject = 'Thông báo đăng ký Website Chuspa.vn thành công!';
											
											$content_admin = '<p>Chào Admin</p>
											
											<div><span style="font-weight: bold;">Có khách đặt hàng trên website <b>chuspa.vn</b> của bạn</span></div>
											<div><span style="font-weight: bold;"><b>Thông Tin Khách Hàng Đăng Ký:</b></span></div>
											<div><span style="font-weight: bold;"><b>Họ Và Tên: '.$usermodel->name.'</b></span></div>
											<div><span style="font-weight: bold;"><b>Email: '.$usermodel->email.'</b></span></div>
											<div><span style="font-weight: bold;"><b>Số Điện Thoại: '.$usermodel->phone.'</b></span></div>
											<div><span style="font-weight: bold;">Nếu đã xác nhận chuyển tiền thành công vui lòng nhấn vào '.$data['link'].' sau để gửi mật khẩu cho khách hàng!</span></div>
											

											<div><span style="line-height: 20.8px;">Thanks!</span></div>
											<div>&nbsp;</div>

											<div>
											<table border="0" cellpadding="0" cellspacing="0" style="color: rgb(34, 34, 34); line-height: normal; font-size: 0.75em; font-family: Verdana;" width="700">
												<tbody>
													<tr>
														<td align="left" style="font-family: arial, sans-serif; margin: 0px;">
															<img alt="" src="http://chuspa.vn/mediacenter/media/images/1227/logo/217_1569466520_295d8c2898afd31.png" style="width: 170px; height: 70px;" />
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
														<div style="clear: both; min-height: 10px;">@2019 Chuspa.vn</div>
														<div style="clear: both; min-height: 10px;">Tel: 090.793.8866 - Fax:&nbsp;<span style="line-height: 14.4px;">090.793.8866</span></div>

														<div style="clear: both; min-height: 10px;"><span style="line-height: 14.4px;">Email: info@chuspa.vn - Hotline: 090.793.8866</span></div>

														<div style="clear: both; min-height: 10px;">Website: www.chuspa.vn</div>
														</div>
														</td>
													</tr>
												</tbody>
											</table>
											</div>
											';
										$subject_admin = 'Thông báo có khách hàng đăng ký Chủ Spa!';
										if ($content && $subject) {
											Yii::app()->mailer->send('', $email, $subject, $content);
										}
										if ($content_admin && $subject_admin) {
											Yii::app()->mailer->send('', 'minhtt83@gmail.com', $subject_admin, $content_admin);
											Yii::app()->mailer->send('', 'hieuit88@gmail.com', $subject_admin, $content_admin);
										}
									
										$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/order', array(												
										)));
													
									}
								}
							 
						 }
						   $params = array(
								'billing' => $usermodel,
								'error_email' => $error_email
							);						 
						
					} elseif ($this->site_id == 1248) {
						 if (Yii::app()->request->isPostRequest) {						 
								
								$order = new Orders();
								 
								$siteId = $this->site_id;
								$usermodel->attributes = $_POST['Users'];
						
								$payment_method = $_POST['Orders']['payment_method'];
							
								if ($usermodel->phone == '') {
									$error_phone = 'Bạn Chưa Nhập Số Điện Thoại';
								}
								if ($payment_method == '') {									
									$error_payment = 'Bạn Chưa Chọn Ngân Hàng';
								} else {
									
									$order->billing_name = 'qqq';
									$order->billing_address = 'qqq';
									$order->billing_email = 'qqq@gmail.com';
									$order->billing_phone = $usermodel->phone;
									$order->billing_city = 'qqq';
									$order->transport_method = $payment_method;
									//assign shipping
									$order->shipping_name = 'qqq';
									$order->shipping_phone = $usermodel->phone;
									$order->shipping_address = 'qqq';
									$order->shipping_city = 'qqq';
									//
									$order->payment_method = 1;
									$order->token_introduce = 1;
								
									$order->site_id = $this->site_id;
									
									if (!Yii::app()->user->isGuest)
										$order->user_id = Yii::app()->user->id;
									//
									$order->ip_address = Yii::app()->request->userHostAddress;
									$order->key = ClaGenerate::getUniqueCode(array('prefix' => 'o'));
									
									$order->order_total = $shoppingCart->getTotalPrice();									
									
									if ($order->save()) {										
												Yii::app()->user->setFlash('success', Yii::t('shoppingcart', 'order_success_notice'));												
												$products = $shoppingCart->findAllProducts();
												foreach ($products as $key => $product) {
													$orderProduct = new OrderProducts();
													$orderProduct->product_id = $product['id'];
													$orderProduct->order_id = $order->order_id;
													$orderProduct->product_qty = $shoppingCart->getQuantity($key);
													$orderProduct->product_price = $order->order_total;
													//$orderProduct->rose = $rose;
													
													$atts = $shoppingCart->getAttributesByKey($key);
													if ($atts)
														$orderProduct->product_attributes = json_encode($atts);
													$orderProduct->save();
												}
													
												// send mail 
												$mailSetting = MailSettings::model()->mailScope()->findByAttributes(array(
													'mail_key' => 'ordernotice',
												));
												
												
												if ($mailSetting) {

													$data = array(
														'link' => '<a href="' . Yii::app()->createAbsoluteUrl('/economy/shoppingcart/order', array('id' => $order->order_id, 'key' => $order->key)) . '">Link</a>',
													);
													$content = $mailSetting->getMailContent($data);
													$subject = $mailSetting->getMailSubject($data);
													if ($content && $subject) {
														
														Yii::app()->mailer->send('','hieuit88@gmail.com', $subject, $content);
													}
													
												}
												
												Yii::app()->customer->deleteShoppingCart();
												$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/order', array(
															'id' => $order->order_id,
															'key' => $order->key,
												)));
									} 
									
								}
							 
						 }
						   $params = array(
								'billing' => $usermodel,
								'error_phone' => $error_phone,
								'error_payment' => $error_payment,
								'error_payment_bank' => $error_payment_bank
							);						 
						
					}
					else {
						 if (Yii::app()->request->isPostRequest) {
							 
								
									
							$billing->attributes = Yii::app()->request->getPost('Billing');
							if ($billing->billtoship) {
								$shipping->attributes = $billing->attributes;
							} else
								$shipping->attributes = Yii::app()->request->getPost('Shipping');

							$order->attributes = Yii::app()->request->getPost('Orders');
							
					
							if ($billing->validate() && $shipping->validate()) {
								//assign billing
								$order->billing_name = $billing->name;
								$order->billing_address = $billing->address;
								$order->billing_email = $billing->email;
								$order->billing_phone = $billing->phone;
								$order->billing_city = $billing->city;
								
								//assign shipping
								$order->shipping_name = $shipping->name;
								$order->shipping_phone = $shipping->phone;
								$order->shipping_address = $shipping->address;
								$order->shipping_city = $shipping->city;
								//
						

								$transportMethod = Orders::getTranportMethod();
								$paymentMethod = Orders::getPaymentMethod();
						
							    if (!isset($transportMethod[$order->transport_method]))
								$order->transport_method = null;
								if (!isset($paymentMethod[$order->payment_method]))
									$order->payment_method = null;
								//
								
								if ($order->payment_method == 4 && Yii::app()->user->isGuest) {							
									$error_pm_point = 'Bạn Cần Đăng Nhập Để Sử Dụng Chức Năng Thanh Toán Này';
									
								} else {
									$point_pm = $shoppingCart->getTotalPoint();								
									if ($userinfo['point'] < $point_pm && $order->payment_method == 4) {
										$error_pm_point1 = 'Bạn Không Đủ Số Điểm Để Thanh Toán Vui Lòng Nạp Điểm <a target="_blank" href="/economy/shoppingcart/exchange">Click</a>';
									} else {
										$order->site_id = $this->site_id;
										if (!Yii::app()->user->isGuest)
											$order->user_id = Yii::app()->user->id;
										//
										$order->ip_address = Yii::app()->request->userHostAddress;
										$order->key = ClaGenerate::getUniqueCode(array('prefix' => 'o'));
										$bonus = $this->bonus();
										
										if ($order->payment_method == 4) {							
											$order->order_total = $shoppingCart->getTotalPrice1();
											
										} else {
											$order->order_total = $shoppingCart->getTotalPrice() - ($shoppingCart->getTotalPrice()*$bonus)/100;
											//$order->order_total = $shoppingCart->getTotalPrice();
										}
									
										if (isset($userinfo) && !empty($userinfo) ){
											$order->token_introduce = $userinfo['token'];	
										} else {
											$order->token_introduce = $token_introduce;	
										}
									
											//
											if ($order->save()) {
												
												Yii::app()->user->setFlash('success', Yii::t('shoppingcart', 'order_success_notice'));
												$products = $shoppingCart->findAllProducts();
												foreach ($products as $key => $product) {
													$orderProduct = new OrderProducts();
													$orderProduct->product_id = $product['id'];
													$orderProduct->order_id = $order->order_id;
													$orderProduct->product_qty = $shoppingCart->getQuantity($key);
													$orderProduct->product_price = $order->order_total;
													$orderProduct->rose = $rose;
													$atts = $shoppingCart->getAttributesByKey($key);
													if ($atts)
														$orderProduct->product_attributes = json_encode($atts);
													$orderProduct->save();
												}
													
												// send mail 
												$mailSetting = MailSettings::model()->mailScope()->findByAttributes(array(
													'mail_key' => 'ordernotice',
												));
												
												// send mail 
												$mailSetting1 = MailSettings::model()->mailScope()->findByAttributes(array(
													'mail_key' => 'ordernoticekhachhang',
												));
												if ($mailSetting) {

													$data = array(
														'link' => '<a href="' . Yii::app()->createAbsoluteUrl('/economy/shoppingcart/order', array('id' => $order->order_id, 'key' => $order->key)) . '">Link</a>',
													);
													$content = $mailSetting->getMailContent($data);
													$subject = $mailSetting->getMailSubject($data);
													if ($content && $subject) {
														Yii::app()->mailer->send('', 'levananh@lisse.com.vn', $subject, $content);
														Yii::app()->mailer->send('','levananh@oceanspa.vn', $subject, $content);
														Yii::app()->mailer->send('','hieuit88@gmail.com', $subject, $content);
														Yii::app()->mailer->send('','minhtt83@gmail.com', $subject, $content);
														Yii::app()->mailer->send('','hoangbichdiep@oceanspa.vn', $subject, $content);
													}
												}
												if ($mailSetting1) {
													$data = array(
														'link' => '<a href="' . Yii::app()->createAbsoluteUrl('/economy/shoppingcart/order', array('id' => $order->order_id, 'key' => $order->key)) . '">Link</a>',
													);
													$content = $mailSetting1->getMailContent($data);
													$subject = $mailSetting1->getMailSubject($data);
													if ($content && $subject) {
														Yii::app()->mailer->send('',$billing->email, $subject, $content);
													}
												}
												
												// delete cart
												Yii::app()->customer->deleteShoppingCart();

												//payment online
												if ($order->payment_method == Orders::PAYMENT_METHOD_ONLINE) {
													$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/order', array(
																	'id' => $order->order_id,
																	'key' => $order->key,
																	//'guide' => base64_encode($payonline['guide']),
														)));
														
													//$config = SitePayment::model()->getConfigPayment('baokim');
													
													//$payonline = BaokimHelper::helper()->mergeConfig($config)->paymentOnline($order);												
													
													//if (isset($payonline['guide']) && $payonline['guide']) {
														//$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/guide', array(
															//		'id' => $order->order_id,
															//		'key' => $order->key,
															//		'guide' => base64_encode($payonline['guide']),
														//)));
													//}
													//if (isset($payonline['pmbk_error'])) {
													//	Yii::app()->user->setFlash('error', "Bảo Kim lỗi : " . $payonline['pmbk_error'] . ". Chúng tôi đã lưu đơn hàng của bạn vào hệ thống. Rất xin lỗi vì sự cố này.");
													//}
												}
												//
												$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/order', array(
															'id' => $order->order_id,
															'key' => $order->key,
												)));
											} 
									
									}
									
									
								}
									
								
							}
						}
						
						$params = array(
							'billing' => $billing,
							'shipping' => $shipping,
							'order' => $order,
							'value_pura_vnd' => $value_pura_vnd,
							'error_pm_point' => $error_pm_point,
							'error_pm_point1' => $error_pm_point1,
							
						);
					
					}
                   

                }break;
        }
		
		$user = ClaUser::getUserInfo(Yii::app()->user->id);
		$data = Yii::app()->db->createCommand()->select('*,SUM(invoice_price) AS revenue')
                ->from(ClaTable::getTable('invoice'))
                ->where('client_id=:client_id', array(':client_id' => $user['bank_id']))
                ->queryRow();
		if ($user['zocoin'] == '') {
			if ($data['revenue'] < '5000000') {
			 $data['bonus'] = '0%';
			}
			if ($data['revenue'] >= '5000000' &&  $data['revenue'] < '10000000') {
				 $data['bonus'] = '10%';
			}
			if ($data['revenue'] >= '10000000' &&  $data['revenue'] < '20000000') {
				$data['bonus'] = '15%';
			}
			if ($data['revenue'] >= '20000000' &&  $data['revenue'] < '30000000') {
				$data['bonus'] = '20%';
			}
			if ($data['revenue'] > '30000000') {
				$data['bonus'] = '25%';
			}
		} else {
			if ($user['zocoin'] == 'Hội viên') {
				$data['bonus'] = '0%';
			}
			if ($user['zocoin'] == 'Silver' ) {
				 $data['bonus'] = '10%';
			}
			if ($user['zocoin'] == 'Gold') {
				$data['bonus'] = '15%';
			}
			if ($user['zocoin'] == 'Platinum') {
				$data['bonus'] = '20%';
			}
			if ($user['zocoin'] == 'Diamond') {
				$data['bonus'] = '25%';
			}
			if ($user['zocoin'] == 'Fan Cứng') {
				$data['bonus'] = '20%';
			}
		}
		
        $arr = array('shoppingCart' => $shoppingCart,'code' => $code,'revenue' => $data['revenue'],'bonus' => $data['bonus'],) + $params;

        $this->render($view, $arr);
    }
   
	public function productPrice($priceFloat) {
		$symbol = ' VNĐ';
		$symbol_thousand = '.';
		$decimal_place = 0;
		$price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);
		return $price.$symbol;
	}
    /**
     * Thêm sp vào giỏ hàng
     */
    public function actionAdd() {
		$price_gold = (int) Yii::app()->request->getParam('price_gold');
		
        $product_id = (int) Yii::app()->request->getParam('pid');
        $quantity = (int) Yii::app()->request->getParam('qty');
        $attributes = Yii::app()->request->getParam(ClaShoppingCart::PRODUCT_ATTRIBUTE_CONFIGURABLE_KEY);
		
        if (!$quantity || $quantity < 0)
            $quantity = 1;
        if ($product_id) {
            $product = Product::model()->findByPk($product_id);

            if ($product && $product->site_id == $this->site_id) {
                $saveAttributes = array();
                $key = $product_id;
                if ($attributes && count($attributes)) {
                    foreach ($attributes as $attribute_id => $configurable_value) {
                        $attr = ProductAttribute::model()->findByPk($attribute_id);
                        if ($attr->site_id != $this->site_id)
                            continue;
                        $attrOption = AttributeHelper::helper()->getSingleAttributeOption($attribute_id, $configurable_value);
                        if (!$attrOption)
                            continue;
                        $saveAttributes['attributes'][$attribute_id]['name'] = $attr['name'];
                        $saveAttributes['attributes'][$attribute_id]['value'] = $attrOption['value'];
                        $saveAttributes['attributes'][$attribute_id]['type_option'] = $attr['type_option'];
                        $saveAttributes['attributes'][$attribute_id]['ext'] = $attrOption['ext'];
                        $saveAttributes['attributes'][$attribute_id]['field_configurable'] = 'attribute' . $attr['field_configurable'] . '_value';
                        $saveAttributes['attributes'][$attribute_id]['field_configurable_value'] = $configurable_value;
                        $key.= $configurable_value;
                    }
                    //
                }
                //
                $shoppingCart = Yii::app()->customer->getShoppingCart();
                $shoppingCart->add($key, array('product_id' => $product_id, 'qty' => intval($quantity), 'price' => $product->price, ClaShoppingCart::MORE_INFO => $saveAttributes));
				if (Yii::app()->request->isAjaxRequest) {
                    $this->jsonResponse('200', array(
                        'message' => 'success',
                        'total' => Yii::app()->customer->getShoppingCart()->countProducts(),
                        'products' => Yii::app()->customer->getShoppingCart()->countOnlyProducts(),
                        'redirect' => Yii::app()->createUrl('/economy/shoppingcart'),
                        'cartTitle' => Yii::t('shoppingcart', 'shoppingcart') . ' (' . Yii::app()->customer->getShoppingCart()->countOnlyProducts() . ')',
                        'cart' => $this->renderPartial('cart_ajax', array(
                            'shoppingCart' => $shoppingCart,
                                ), true),
                    ));

                } else
                    $this->redirect(Yii::app()->createUrl('/economy/shoppingcart'));
            }
        }
	
    }
	
	/**
     * Cập nhật giỏ hàng
     */
    public function actionUpdateCode() {
		$shoppingCart = Yii::app()->customer->getShoppingCart();
		if (Yii::app()->request->isAjaxRequest) {
			$code = Yii::app()->request->getParam('code');
			
			$dataCode = Yii::app()->db->createCommand()->select('code')
                ->from(ClaTable::getTable('code'))
                ->where('code=:code', array(':code' => $code))
                ->queryAll();
			
			if (!empty($dataCode)) {
				$shoppingCart = Yii::app()->customer->getShoppingCart();
				foreach ($shoppingCart->findAllProducts() as $key=>$value) {
					$cartInfo = $shoppingCart->getInfoByKey($key);
					$product = Product::model()->findByPk($cartInfo['product_id']);
					$price = $product->price - ($product->price*30)/100;
					$shoppingCart->update($key, array('qty' => $cartInfo['qty'],'price' => $price, 'product_id' => $product['id']));
				}
				$this->jsonResponse('200', array(
					'message' => 'Bạn đã nhập mã khuyễn mãi thành công',
					'status' => 1,
				));
				
			} else {
				$this->jsonResponse('200', array(
					'message' => 'Mã Không Chính Xác',
					'status' => 0,
				));
			}
			
			
		} else {
		   $code = Yii::app()->request->getParam(code);
		   $this->redirect(Yii::app()->createUrl('/thanh-toan?code='.$code));
		}
    }

	
    /**
     * Cập nhật giỏ hàng
     */
    public function actionUpdate() {
        $key = (int) Yii::app()->request->getParam('key');
        $quantity = (int) Yii::app()->request->getParam('qty');
        if ($quantity <= 0)
            $quantity = 1;
        if ($key && $quantity) {
            $shoppingCart = Yii::app()->customer->getShoppingCart();
            $cartInfo = $shoppingCart->getInfoByKey($key);
            $product = Product::model()->findByPk($cartInfo['product_id']);
            if ($product && $product->site_id == $this->site_id) {
                $shoppingCart->update($key, array('qty' => $quantity, 'price' => $product->price, 'product_id' => $product['id']));
                //
                if (Yii::app()->request->isAjaxRequest) {
                    $this->jsonResponse('200', array(
                        'message' => 'success',
                        'total' => Yii::app()->customer->getShoppingCart()->countProducts(),
                    ));
                } else
                    $this->redirect(Yii::app()->createUrl('/economy/shoppingcart'));
            }
        }
    }

    /**
     * xóa product khỏi shopping cart
     */
    public function actionDelete() {
        $key = (int) Yii::app()->request->getParam('key');
        if ($key) {
            $shoppingCart = Yii::app()->customer->getShoppingCart();
            $cartInfo = $shoppingCart->getInfoByKey($key);
            $product = Product::model()->findByPk($cartInfo['product_id']);
            //
            if ($product && $product->site_id == $this->site_id) {
                $shoppingCart->remove($key);
                //
                if (Yii::app()->request->isAjaxRequest) {
                    $this->jsonResponse('200', array(
                        'message' => 'success',
                        'total' => Yii::app()->customer->getShoppingCart()->countProducts(),
                    ));
                } else
                    $this->redirect(Yii::app()->createUrl('/economy/shoppingcart'));
            }
        }
    }

    public function actionOrder() {
		
		$site_id = Yii::app()->controller->site_id;

		if ($site_id == 1204) {
			$this->render('order_donnha', array());
		}elseif ($site_id == 1227) {
			$this->render('order_chuspa', array());
		} else {
				$id = Yii::app()->request->getParam('id');
				$key = Yii::app()->request->getParam('key');
			
			 if ($id && $key) {
				 
				$order = Orders::model()->findByPk($id);
							
				if (!$order)
					$this->sendResponse(404);
				if ($order->key != $key)
					$this->sendResponse(404);
				$products = OrderProducts::getProductsDetailInOrder($id);
				//
				$paymentmethod = Orders::getPaymentMethodInfo($order->payment_method);			
				
				$transportmethod = Orders::getTransportMethodInfo($order->transport_method);
				//
				
				if ($this->site_id == 1121) {
					 $this->render('order1', array(
						'order' => $order->attributes,
						'products' => $products,
						'paymentmethod' => $paymentmethod,
						'transportmethod' => $transportmethod,
					));
				} 
				if ($this->site_id == 1182) {
					 $this->render('order_lva', array(
							'order' => $order->attributes,
							'products' => $products,
							'paymentmethod' => $paymentmethod,
							'transportmethod' => $transportmethod,
						));
				} elseif($this->site_id == 1145) {
						 $this->render('order_g2s', array(
							'order' => $order->attributes,
							'products' => $products,
							'paymentmethod' => $paymentmethod,
							'transportmethod' => $transportmethod,
						));
				} elseif($this->site_id == 1248) {
						 $this->render('order_pro', array(
							'order' => $order->attributes,
							'products' => $products,
							'paymentmethod' => $paymentmethod,
							'transportmethod' => $transportmethod,
						));
				}else {
					$this->render('order_g2s', array(
						'order' => $order->attributes,
						'products' => $products,
						'paymentmethod' => $paymentmethod,
						'paymentmethod' => $paymentmethod,
						'transportmethod' => $transportmethod,
					));
				}

			   
				//
			}
		}

      
    }
	public function bonus() {
		
		$user = ClaUser::getUserInfo(Yii::app()->user->id);
					$data = Yii::app()->db->createCommand()->select('*,SUM(invoice_price) AS revenue')
						->from(ClaTable::getTable('invoice'))
						->where('client_id=:client_id', array(':client_id' => $user['bank_id']))
						->queryRow();
					if ($user['zocoin'] == '') {
						if ($data['revenue'] < '5000000') {
						 $data['bonus'] = '0';
						}
						if ($data['revenue'] >= '5000000' &&  $data['revenue'] < '10000000') {
							 $data['bonus'] = '10';
						}
						if ($data['revenue'] >= '10000000' &&  $data['revenue'] < '20000000') {
							$data['bonus'] = '15';
						}
						if ($data['revenue'] >= '20000000' &&  $data['revenue'] < '30000000') {
							$data['bonus'] = '20';
						}
						if ($data['revenue'] > '30000000') {
							$data['bonus'] = '25';
						}
					} else {
						if ($user['zocoin'] == 'Hội viên') {
							$data['bonus'] = '0';
						}
						if ($user['zocoin'] == 'Silver' ) {
							 $data['bonus'] = '10';
						}
						if ($user['zocoin'] == 'Gold') {
							$data['bonus'] = '15';
						}
						if ($user['zocoin'] == 'Platinum') {
							$data['bonus'] = '20';
						}
						if ($user['zocoin'] == 'Diamond') {
							$data['bonus'] = '25';
						}
						if ($user['zocoin'] == 'Fan Cứng') {
							$data['bonus'] = '20';
						}
					}
		return $data['bonus'];
	}
	public function actionComplete() {
		$email = Yii::app()->request->getParam('email');
		$site_id = Yii::app()->controller->site_id;
		$user = Users::model()->findByAttributes(array(
                'site_id' => $site_id,
                'email' =>$email
            ));
		if (empty($user)) {
			$this->redirect(Yii::app()->createUrl('/san-pham'));
		}
		if (Yii::app()->request->isPostRequest) {
			if ($site_id == '1227') {
					$pass = ClaGenerate::encrypPassword($user['password']);
			
								$update = Yii::app()->db->createCommand()
								->update('users', array('password'=>$pass),'email=:email',array(':email'=>$email));
								
								$token = ClaToken::register('public_resetpass_' . $email, array('email' => $email));
								$link = Yii::app()->createAbsoluteUrl('login/login/recoverpass', array('tk' => $token));
								$data = array(
											'link' => '<a href="' . $link . '" target="_blank">' . $link . '</a>',
											'site' => $site_id,
								);
								
								$content = '<p>Chào Quý Khách!</p>
										<div><span style="font-weight: bold;">Chúng tôi đã xác nhận giao dịch của Quý Khách thành công</span></div>
										<div><span style="font-weight: bold;">Quý khách có thể sử dụng mật khẩu để đăng nhập ngay bây giờ</span></div>
										<div><span style="font-weight: bold;">Username: '.$user['email'].'</span></div>
										<div><span style="font-weight: bold;">Mật khẩu của bạn là: '.$user['password'].'</span></div>
										<div>&nbsp;</div>
										<div><span style="font-weight: bold;">Quý khách nên thay đổi lại mật khẩu sau lần đăng nhập đầu tiên bằng cách vào liên kết thay đổi thông tin.</span></div>
										<div>&nbsp;</div>
										<div><span style="font-weight: bold;">Link: '.$data['link'].'</span></div>
										<div>&nbsp;</div>
										<div><span style="line-height: 20.8px;">Đây là email tự động vui lòng không phản hồi lại, vì phản hồi lại chúng tôi sẽ không tiếp nhận được thông tin. 
					</div>
										<div><span style="line-height: 20.8px;">Cảm Ơn Quý Khách!</span></div>
										<div>&nbsp;</div>
										<div>
										<table border="0" cellpadding="0" cellspacing="0" style="color: rgb(34, 34, 34); line-height: normal; font-size: 0.75em; font-family: Verdana;" width="700">
											<tbody>
												<tr>
													<td align="left" style="font-family: arial, sans-serif; margin: 0px;">
														<img alt="" src="http://chuspa.vn/mediacenter/media/images/1227/logo/217_1569466520_295d8c2898afd31.png" style="width: 170px; height: 70px;" />
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
														<div style="clear: both; min-height: 10px;">@2019 Chuspa.vn</div>

														<div style="clear: both; min-height: 10px;">Địa chỉ: Số 55 Pháo Đài Láng, Đống Đa, Hà Nội</div>

														<div style="clear: both; min-height: 10px;">Tel: 090.793.8866 - Fax:&nbsp;<span style="line-height: 14.4px;">090.793.8866</span></div>

														<div style="clear: both; min-height: 10px;"><span style="line-height: 14.4px;">Email: info@chuspa.vn - Hotline: 090.793.8866</span></div>

														<div style="clear: both; min-height: 10px;">Website: www.chuspa.vn</div>
														</div>
														</td>
													</tr>
											</tbody>
										</table>
										</div>
					';
						$subject = 'Thông báo mật khẩu đăng nhập!';
						if ($content && $subject) {
							Yii::app()->mailer->send('', $email, $subject, $content);
						}
						$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/completePass/', array(
																	'email' => $email
														)));
			} else {
				$pass = ClaGenerate::encrypPassword($user['password']);
			
						$update = Yii::app()->db->createCommand()
						->update('users', array('password'=>$pass),'email=:email',array(':email'=>$email));
						
						$token = ClaToken::register('public_resetpass_' . $email, array('email' => $email));
						$link = Yii::app()->createAbsoluteUrl('login/login/recoverpass', array('tk' => $token));
						$data = array(
									'link' => '<a href="' . $link . '" target="_blank">' . $link . '</a>',
									'site' => $site_id,
						);
						
						$content = '<p>Chào Quý Khách!</p>
								<div><span style="font-weight: bold;">Chúng tôi đã xác nhận giao dịch của Quý Khách thành công</span></div>
								<div><span style="font-weight: bold;">Quý khách có thể sử dụng mật khẩu để đăng nhập ngay bây giờ</span></div>
								<div><span style="font-weight: bold;">Username: '.$user['email'].'</span></div>
								<div><span style="font-weight: bold;">Mật khẩu của bạn là: '.$user['password'].'</span></div>
								<div>&nbsp;</div>
								<div><span style="font-weight: bold;">Quý khách nên thay đổi lại mật khẩu sau lần đăng nhập đầu tiên bằng cách vào liên kết thay đổi thông tin.</span></div>
								<div>&nbsp;</div>
								<div><span style="font-weight: bold;">Link: '.$data['link'].'</span></div>
								<div>&nbsp;</div>
								<div><span style="line-height: 20.8px;">Đây là email tự động vui lòng không phản hồi lại, vì phản hồi lại chúng tôi sẽ không tiếp nhận được thông tin. 
			</div>
								<div><span style="line-height: 20.8px;">Cảm Ơn Quý Khách!</span></div>
								<div>&nbsp;</div>
								<div>
								<table border="0" cellpadding="0" cellspacing="0" style="color: rgb(34, 34, 34); line-height: normal; font-size: 0.75em; font-family: Verdana;" width="700">
									<tbody>
										<tr>
											<td align="left" style="font-family: arial, sans-serif; margin: 0px;">
												<img alt="" src="http://donnhakieunhat.com/mediacenter/media/images/1204/logo/546_1546834689_4945c32d3014b905.png" style="width: 170px; height: 70px;" />
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

											<div style="clear: both; min-height: 10px;">Website: www.donnhakieunhat.com</div>
											</div>
											</td>
										</tr>
									</tbody>
								</table>
								</div>
								';
							$subject = 'Thông báo mật khẩu đăng nhập!';
							if ($content && $subject) {
								Yii::app()->mailer->send('', $email, $subject, $content);
							}
							$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/completePass/', array(
																		'email' => $email
															)));
			}
			
		}
        $this->render('complete', array(
                'email' => $email,
            ));
    }
	public function actionCompletePass() {
        $email = Yii::app()->request->getParam('email');
		$site_id = Yii::app()->controller->site_id;
		$user = Users::model()->findByAttributes(array(
                'site_id' => $site_id,
                'email' =>$email
            ));
		if (empty($user)) {
			$this->redirect(Yii::app()->createUrl('/san-pham'));
		}
		
        $this->render('complete_pass', array(
                'email' => $email,
            ));
    }
    public function actionGuide() {
        $id = Yii::app()->request->getParam('id');
        $key = Yii::app()->request->getParam('key');
        $guide = Yii::app()->request->getParam('guide');
        if ($id && $key && $guide) {
            $link_order = Yii::app()->createUrl('/economy/shoppingcart/order', array(
                'id' => $id,
                'key' => $key,
            ));
            $guide = base64_decode($guide);
            $this->render('guide', array(
                'link_order' => $link_order,
                'guide' => $guide,
            ));
        }
    }

    /**
     * for template chọn món ăn
     */
    public function actionUpdateAjax() {
        $product_id = (int) Yii::app()->request->getParam('pid');
        $quantity = (int) Yii::app()->request->getParam('qty');
        $type = Yii::app()->request->getParam('type');
        if (!$quantity || $quantity < 0) {
            $quantity = 1;
        }
        if ($product_id) {
            $product = Product::model()->findByPk($product_id);
            if ($product && $product->site_id == $this->site_id) {
                $saveAttributes = array();
                $key = $product_id;
                $shoppingCart = Yii::app()->customer->getShoppingCart();
                if ($type == 'delete') {
                    $shoppingCart->remove($product_id);
                } else if ($type == 'update') {
                    $shoppingCart->update($key, array('qty' => $quantity, 'price' => $product->price, 'product_id' => $product_id));
                } else {
                    $shoppingCart->add($key, array('product_id' => $product_id, 'qty' => intval($quantity), 'price' => $product->price, ClaShoppingCart::MORE_INFO => $saveAttributes));
                }
                if (Yii::app()->request->isAjaxRequest) {
                    $count_products = count($shoppingCart->findAllProducts());
                    $html = $this->renderPartial('pack', array(
                        'shoppingCart' => $shoppingCart,
                        'count_product' => $count_products,
                            ), true);
                    $this->jsonResponse('200', array(
                        'html' => $html,
                        'type' => $type,
                        'count_product' => $count_products,
                    ));
                }
            }
        }
    }

    public function actionOtp() {
        $transaction_id = 1;
        Yii::app()->user->getState('pmbk_transaction_id');
        $order_id = 1;
        Yii::app()->user->getState('pmbk_otp_order_id');
        $order_key = 1;
        Yii::app()->user->getState('order_key');
        if ($transaction_id) {
            if (isset($_POST['otp'])) {
                $otp = $_POST['otp'];
                $resultVerify = BaokimHelper::helper()->verifyOTP($transaction_id, $otp);
                if ($resultVerify['success']) {
                    Yii::app()->user->setState('pmbk_transaction_id', null);
                    Yii::app()->user->setState('pmbk_otp_order_id', null);
                    Yii::app()->user->setState('pmbk_order_key', null);
                    Yii::app()->user->setFlash('otp_successs', true);
                    $this->redirect(array('/economy/shoppingcart/order', 'id' => $order_id, 'key' => $order_key));
                } else {
                    Yii::app()->user->setFlash('otp_error', $resultVerify['error']);
                }
            }
            $this->render('confirmOTP', array());
        } else {
            Yii::app()->user->setFlash('error', "Không tồn tại mã giao dịch với bảo kim");
            $this->redirect(array('/economy/shoppingcart/order', 'id' => $order_id, 'key' => $order_key));
        }
    }
	

}
