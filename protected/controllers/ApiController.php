<?php

/**
 * Description of ApiController
 *
 * @author bachminh
 */
class ApiController extends PublicController {

	public $urlApiTestDev = 'https://sandbox.nganluong.vn:8088/nl35/checkout.api.nganluong.post.php';
    public $merchantIDev = '36680';
    public $merchantPasswordDev = 'matkhauketnoi';
    public $receiverEmailDev = 'demo@nganluong.vn';
	
	public $url_api = 'https://www.nganluong.vn/checkout.api.nganluong.post.php';
    public $merchant_id = '63103';
    public $merchant_password = '8856c99910c77dcb085e22ea93f8e004';
    public $receiver_email = 'minhtt83@gmail.com';
	
	public $merchant_id2 = '63439';
    public $merchant_password2 = '6a748e637ca257477ebc2ae5fc337ec5';
	public $receiver_email2 = 'hieutv@tendo.vn';
	public $cur_code = 'vnd';
    public $version ='3.1';
    public $orderCode ="";
	public $keyDecrypt = 'tendodecryptkeysdkall';
	public $test = false;
	
	public function cancelPay() {

		$data = array(
			   "status" => 200,
			   "message" => "Hủy Thanh Toán"			  
		);
	
		$response = json_encode($data);
		echo $response;		
		
	}
	
	
	public function actionCheckoutTip() {	
		
		$id = Yii::app()->request->getParam('id');
		$this->deleteCart($id);
		$this->addProduct($id);
		$this->redirect(Yii::app()->createUrl('/thanh-toan?step=s2&user=guest', array(							
										)));
	}
	
	public function addProduct($product_id) {
		$price_gold = (int) Yii::app()->request->getParam('price_gold');
				
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
					
			    }  
				$shoppingCart = Yii::app()->customer->getShoppingCart();
				$shoppingCart->add($key, array('product_id' => $product_id, 'qty' => intval($quantity), 'price' => $product->price, ClaShoppingCart::MORE_INFO => $saveAttributes));				
            }
        }
	
    }
	public function deleteCart($product_id) {        
            $shoppingCart = Yii::app()->customer->getShoppingCart();
            $product = Product::model()->findByPk($product_id);
            //
            if ($product && $product->site_id == $this->site_id) {
                $shoppingCart->remove($product_id);                
            }
       
    }
	public function actioncheckOutPay()
    {
       
        $urlLocal = 'http://tss-software.com.vn/';
        $orderCode = $this->generateRandomString(6).time();
		
		$phone = $_GET['phone'];		
		$type =  $_GET['type'];
		$bank_code =  $_GET['bank_code'];

        if (empty($type)) {
            $data = array(
			   "status" => 200,
			   "message" => "Không tồn tại loại thanh toán"			  
			);
	
			$response = json_encode($data);
			echo $response;		
        }

        if (empty($phone)) {
			$data = array(
			   "status" => 200,
			   "message" => "không tồn tại số điện thoại"			  
			);
	
			$response = json_encode($data);
			echo $response;		
			
        }

		$returnUrl = $urlLocal.'api/callback/';
        $cancelUrl = $urlLocal."api/cancelPay/";
		
        $checkOutNganluong = '';
        $isTest =  $this->test;
		$description = 'Thanh toán Online';
		$email = 'hieutv@tendo.vn';
		$name = $phone;
		$invoice_price =  50000;
		
		
		$array_items = null;
        if ($type == 'bank') {
            $checkOutNganluong = $this->BankCheckout($isTest, $orderCode, (int)$invoice_price, $bank_code, 0, $description, 0, 0, 0,
                $returnUrl, $cancelUrl, $name, $email, $phone, '', $array_items);

        } else {
            $checkOutNganluong = $this->VisaCheckout($isTest, $orderCode, (int)$invoice_price, $description, 0, 0, 0,
                $returnUrl, $cancelUrl, $name, $email, $phone, '', $array_items, '');
        }
	
        if (empty($checkOutNganluong)) {
			$data = array(
			   "status" => 200,
			   "message" => "có lỗi xảy ra vui lòng thử lại sau"			  
			);
	
			$response = json_encode($data);
			echo $response;		
			
        }
		$this->redirect($checkOutNganluong->checkout_url);
		
		
    }
	public function actioncheckOutPay1()
    {
       
        $urlLocal = 'http://pro168.tss-software.com.vn/';
        $orderCode = $this->generateRandomString(6).time();
		
		$phone = $_GET['phone'];		
		$type =  $_GET['type'];
		$bank_code =  $_GET['bank_code'];
		$order_description =  $_GET['order_description'];
		$price =  $_GET['price'];

        if (empty($type)) {
            $data = array(
			   "status" => 200,
			   "message" => "Không tồn tại loại thanh toán"			  
			);
	
			$response = json_encode($data);
			echo $response;		
        }

        if (empty($phone)) {
			$data = array(
			   "status" => 200,
			   "message" => "không tồn tại số điện thoại"			  
			);
	
			$response = json_encode($data);
			echo $response;		
			
        }

		$returnUrl = $urlLocal.'api/callback1/';
        $cancelUrl = $urlLocal."api/cancelPay1/";
		
        $checkOutNganluong = '';
        $isTest =  $this->test;
		$description = $order_description;
		$email = 'hieutv@tendo.vn';
		$name = $phone;
		$invoice_price =  '10000';
		
		
		
		$array_items = null;
        if ($type == 'bank') {
            $checkOutNganluong = $this->BankCheckout($isTest, $orderCode, (int)$invoice_price, $bank_code, 0, $description, 0, 0, 0,
                $returnUrl, $cancelUrl, $name, $email, $phone, '', $array_items);

        } else {
            $checkOutNganluong = $this->VisaCheckout($isTest, $orderCode, (int)$invoice_price, $description, 0, 0, 0,
                $returnUrl, $cancelUrl, $name, $email, $phone, '', $array_items, '');
        }
	
        if (empty($checkOutNganluong)) {
			$data = array(
			   "status" => 200,
			   "message" => "có lỗi xảy ra vui lòng thử lại sau"			  
			);
	
			$response = json_encode($data);
			echo $response;		
			
        }
		$this->redirect($checkOutNganluong->checkout_url);
		
		
    }
	
	
	public function actioncancelPay1() {			
			
	}
	
	public function actioncallback1() {
		$error_code = $_GET['error_code'];
		$token = $_GET['token'];
		$order_code = $_GET['order_code']; 
		$order_id = $_GET['order_id'];
		
		$isTest = $this->test;
		$transaction = $this->GetTransactionDetail($token, $isTest);
		$message = $this->GetErrorMessage($transaction->transaction_status);
		
		$email = $transaction->receiver_email;
		$total_amount = $transaction->total_amount;
		$payment_method = $transaction->payment_method;
		$bank_code = $transaction->bank_code;
		$order_description = $transaction->order_description;
		$buyer_mobile = $transaction->buyer_mobile;
		$buyer_address = $transaction->buyer_address;
		$token = $transaction->token;
		$error_code = $transaction->error_code;
				
				
		$this->redirect(Yii::app()->createUrl('/economy/shoppingcart/order/', array(
			'email' => $email,
			'total_amount' => $total_amount,
			'payment_method' => $payment_method,
			'bank_code' => $bank_code,
			'order_description' => $order_description,
			'buyer_mobile' => $buyer_mobile,
			'buyer_address' => $buyer_address,
			'token' => $token,
			'error_code' => $error_code,
			'message' => $message,
		)));		
		
		
    }
	
	public function actioncallback() {
		$error_code = $_GET['error_code'];
		$token = $_GET['token'];
		$order_code = $_GET['order_code']; 
		$order_id = $_GET['order_id'];
		
		$isTest = $this->test;
		$transaction = $this->GetTransactionDetail($token, $isTest);		
		$message = $this->GetErrorMessage($transaction->transaction_status);		
		$data = array(
		   "status" => 200,
			'url' => $message		  
		);
	
		$response = json_encode($data);
		echo $response;	
		
    }
	
	function GetTransactionDetail($token, $isTest)
    {
        ###################### BEGIN #####################
        $merchantID = $this->merchant_id2;
        $merchantPassword = $this->merchant_password2;
        $url = $this->url_api;

        if($isTest) {
            $merchantID = $this->merchantIDev;
            $merchantPassword = $this->merchantPasswordDev;
            $url = $this->urlApiTestDev;
        }

        $params = array(
            'merchant_id' => $merchantID,
            'merchant_password' => MD5($merchantPassword),
            'version' => $this->version,
            'function' => 'GetTransactionDetail',
            'token' => $token
        );

        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        if ($result != '' && $status == 200) {
            $nl_result = simplexml_load_string($result);
            return $nl_result;
        }

        return false;
        ###################### END #####################

    }
	
	function BankCheckout($isTest, $order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount,
                          $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile,
                          $buyer_address, $array_items)
    {

        $merchantID = $this->merchant_id2;
        $receiverEmail = $this->receiver_email2;
        $merchantPassword = $this->merchant_password2;
        $url = $this->url_api;
		
        if($isTest) {
            $merchantID = $this->merchantIDev;
            $receiverEmail = $this->receiverEmailDev;
            $merchantPassword = $this->merchantPasswordDev;
            $url = $this->urlApiTestDev;
        }
		
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $merchantID, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $receiverEmail,
            'merchant_password' => md5($merchantPassword), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'ATM_ONLINE', //Phương thức thanh toán, nhận một trong các giá trị 'ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code' => $bank_code, //Mã Ngân hàng
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items)
        );
		
        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
		
        $nl_result = $this->CheckoutCall($post_field, $url);
        return $nl_result;
    }
	
	function CheckoutCall($post_field, $url = '')
    {
        if(empty($url)) {
            $url = $this->url_api;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field);
        $result = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
		
		
        if ($result != '' && $status == 200) {
            $xml_result = str_replace('&', '&amp;', (string)$result);
            $nl_result = simplexml_load_string($xml_result);
            $nl_result->error_message = $this->GetErrorMessage($nl_result->error_code);
        } else $nl_result->error_message = $error;
        return $nl_result;

    }
	
    function GetErrorMessage($error_code)
    {
        $arrCode = array(
            '00' => 'Thanh toán thành công',
            '99' => 'Lỗi chưa xác minh',
            '06' => 'Mã merchant không tồn tại hoặc bị khóa',
            '02' => 'Địa chỉ IP truy cập bị từ chối',
            '03' => 'Mã checksum không chính xác, truy cập bị từ chối',
            '04' => 'Tên hàm API do merchant gọi tới không hợp lệ (không tồn tại)',
            '05' => 'Sai version của API',
            '07' => 'Sai mật khẩu của merchant',
            '08' => 'Địa chỉ email tài khoản nhận tiền không tồn tại',
            '09' => 'Tài khoản nhận tiền đang bị phong tỏa giao dịch',
            '10' => 'Mã đơn hàng không hợp lệ',
            '11' => 'Số tiền giao dịch lớn hơn hoặc nhỏ hơn quy định',
            '12' => 'Loại tiền tệ không hợp lệ',
            '29' => 'Token không tồn tại',
            '80' => 'Không thêm được đơn hàng',
            '81' => 'Đơn hàng chưa được thanh toán',
            '110' => 'Địa chỉ email tài khoản nhận tiền không phải email chính',
            '111' => 'Tài khoản nhận tiền đang bị khóa',
            '113' => 'Tài khoản nhận tiền chưa cấu hình là người bán nội dung số',
            '114' => 'Giao dịch đang thực hiện, chưa kết thúc',
            '115' => 'Giao dịch bị hủy',
            '118' => 'tax_amount không hợp lệ',
            '119' => 'discount_amount không hợp lệ',
            '120' => 'fee_shipping không hợp lệ',
            '121' => 'return_url không hợp lệ',
            '122' => 'cancel_url không hợp lệ',
            '123' => 'items không hợp lệ',
            '124' => 'transaction_info không hợp lệ',
            '125' => 'quantity không hợp lệ',
            '126' => 'order_description không hợp lệ',
            '127' => 'affiliate_code không hợp lệ',
            '128' => 'time_limit không hợp lệ',
            '129' => 'buyer_fullname không hợp lệ',
            '130' => 'buyer_email không hợp lệ',
            '131' => 'buyer_mobile không hợp lệ',
            '132' => 'buyer_address không hợp lệ',
            '133' => 'total_item không hợp lệ',
            '134' => 'payment_method, bank_code không hợp lệ',
            '135' => 'Lỗi kết nối tới hệ thống ngân hàng',
            '140' => 'Đơn hàng không hỗ trợ thanh toán trả góp',
		);

        return $arrCode[(string)$error_code];
    }
	
	function VisaCheckout($isTest, $order_code, $total_amount, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile,
                          $buyer_address, $array_items, $bank_code)
    {
        $payment_type = 0;
        $merchantID = $this->merchant_id2;
        $receiverEmail = $this->receiver_email2;
        $merchantPassword = $this->merchant_password2;
        $url = $this->url_api;
		
        if(!empty($isTest)) {
            $merchantID = $this->merchantIDev;
            $receiverEmail = $this->receiverEmailDev;
            $merchantPassword = $this->merchantPasswordDev;
            $url = $this->urlApiTestDev;
        }
		
        $params = array(
            'cur_code' => $this->cur_code,
            'function' => 'SetExpressCheckout',
            'version' => $this->version,
            'merchant_id' => $merchantID, //Mã merchant khai báo tại NganLuong.vn
            'receiver_email' => $receiverEmail,
            'merchant_password' => MD5($merchantPassword), //MD5(Mật khẩu kết nối giữa merchant và NganLuong.vn)
            'order_code' => $order_code, //Mã hóa đơn do website bán hàng sinh ra
            'total_amount' => $total_amount, //Tổng số tiền của hóa đơn
            'payment_method' => 'VISA', //Phương thức thanh toán, nhận một trong các giá trị 'VISA','ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'bank_code' => $bank_code, //Phương thức thanh toán, nhận một trong các giá trị 'VISA','ATM_ONLINE', 'ATM_OFFLINE' hoặc 'NH_OFFLINE'
            'payment_type' => $payment_type, //Kiểu giao dịch: 1 - Ngay; 2 - Tạm giữ; Nếu không truyền hoặc bằng rỗng thì lấy theo chính sách của NganLuong.vn
            'order_description' => $order_description, //Mô tả đơn hàng
            'tax_amount' => $tax_amount, //Tổng số tiền thuế
            'fee_shipping' => $fee_shipping, //Phí vận chuyển
            'discount_amount' => $discount_amount, //Số tiền giảm giá
            'return_url' => $return_url, //Địa chỉ website nhận thông báo giao dịch thành công
            'cancel_url' => $cancel_url, //Địa chỉ website nhận "Hủy giao dịch"
            'buyer_fullname' => $buyer_fullname, //Tên người mua hàng
            'buyer_email' => $buyer_email, //Địa chỉ Email người mua
            'buyer_mobile' => $buyer_mobile, //Điện thoại người mua
            'buyer_address' => $buyer_address, //Địa chỉ người mua hàng
            'total_item' => count($array_items)
        );
		
        $post_field = '';
        foreach ($params as $key => $value) {
            if ($post_field != '') $post_field .= '&';
            $post_field .= $key . "=" . $value;
        }
        if (count($array_items) > 0) {
            foreach ($array_items as $array_item) {
                foreach ($array_item as $key => $value) {
                    if ($post_field != '') $post_field .= '&';
                    $post_field .= $key . "=" . $value;
                }
            }
        }
        //die($post_field);
		
        $nl_result = $this->CheckoutCall($post_field, $url);
        return $nl_result;
    }
	
	public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
	
    public function actionIndex() {
		
    }
	
	public function actionNew() {
		
		$site_id = 1182;
		$news_category_id = 6606;
		$new = Yii::app()->db->createCommand()->select('news_id,news_category_id,news_title,news_desc,news_sortdesc,image_name,image_path,alias,news_source')
                ->from(ClaTable::getTable('news'))
				->where('site_id="'.$site_id.'" AND news_category_id='.$news_category_id)
				->order('news_source asc')
                ->queryAll();
				
		$dataTemArr = array();	
		$dataArr = array();	
		foreach ($new as $value) {
			$dataArr['news_id'] = $value['news_id'];
			$dataArr['news_category_id'] = $value['news_category_id'];
			$dataArr['news_title'] = $value['news_title'];
			//$dataArr['news_desc'] = $value['news_desc'];
			$dataArr['news_sortdesc'] = $value['news_sortdesc'];
			$dataArr['link_image'] = ClaHost::getImageHost() . $value['image_path'] . 's500_500/' . $value['image_name'];
			$dataArr['link_detail'] = 'http://levananh.com'. Yii::app()->createUrl('news/news/detail', array('id' => $value['news_id'], 'alias' => $value['alias']));
			$dataArr['image_name'] = $value['image_name'];
			$dataArr['image_path'] = $value['image_path'];
			$dataTemArr[] = $dataArr;
		}
		
		$data = array(
			   "status" => 200,
			   "message" => "Success",
			   "data" => $dataTemArr
		);
	
		$response = json_encode($data);
		echo $response;		
		
    }
	public function actionNoti() {
		
		$site_id = 1235;
		$news_category_id = 6626;
		$new = Yii::app()->db->createCommand()->select('*')
                ->from(ClaTable::getTable('news'))
				->where('site_id="'.$site_id.'" AND news_category_id='.$news_category_id)
				->order('news_source asc')
                ->queryAll();
					
		
		$dataTemArr = array();	
		$dataArr = array();	
		foreach ($new as $value) {
			$dataArr['noti_id'] = $value['news_id'];
			$dataArr['noti_title'] = $value['news_title'];
			$dataArr['noti_detail'] = $value['news_sortdesc'];
			$dataArr['noti_link'] = $value['poster'];
			$dataArr['link_image'] = ClaHost::getImageHost() . $value['image_path'] . 's500_500/' . $value['image_name'];
			$dataArr['image_name'] = $value['image_name'];
			$dataArr['image_path'] = $value['image_path'];
			$dataArr['noti_date'] = $value['created_time'];
			$dataTemArr[] = $dataArr;
		}
		
	
		$data = array(
			   "status" => 200,
			   "message" => "Success",
			   "data" => $dataTemArr
		);
	
		$response = json_encode($data);
		echo $response;		
		
    }
	public function actionVideo() {
		$site_id = 1182;
		$news_category_id = 6607;
		$new = Yii::app()->db->createCommand()->select('news_id,news_category_id,news_title,news_desc,news_sortdesc,image_name,image_path,news_source')
                ->from(ClaTable::getTable('news'))
				->where('site_id="'.$site_id.'" AND news_category_id='.$news_category_id)
				->order('news_source asc')
                ->queryAll();
	
		
		$dataTemArr = array();	
		$dataArr = array();	
		foreach ($new as $value) {
			$dataArr['news_id'] = $value['news_id'];
			$dataArr['news_category_id'] = $value['news_category_id'];
			$dataArr['news_title'] = $value['news_title'];
			$dataArr['link_image'] = ClaHost::getImageHost() . $value['image_path'] . 's500_500/' . $value['image_name'];
			$dataArr['link_video'] = $value['news_sortdesc'];
			$dataArr['image_name'] = $value['image_name'];
			$dataArr['image_path'] = $value['image_path'];
			$dataTemArr[] = $dataArr;
		}
		
		$data = array(
			   "status" => 200,
			   "message" => "Success",
			   "data" => $dataTemArr
		);
		$response = json_encode($data);
		echo $response;	
		
    }
	public function actionBlog() {
		
		$site_id = 1182;
		$news_category_id = 6608;
		$new = Yii::app()->db->createCommand()->select('news_id,news_category_id,news_title,news_desc,news_sortdesc,image_name,image_path,alias,news_source')
                ->from(ClaTable::getTable('news'))
				->where('site_id="'.$site_id.'" AND news_category_id='.$news_category_id)
				->order('news_source asc')
                ->queryAll();

		
		$dataTemArr = array();	
		$dataArr = array();	
		foreach ($new as $value) {
			$dataArr['news_id'] = $value['news_id'];
			$dataArr['news_category_id'] = $value['news_category_id'];
			$dataArr['news_title'] = $value['news_title'];
			//$dataArr['news_desc'] = $value['news_desc'];
			$dataArr['news_sortdesc'] = $value['news_sortdesc'];
			$dataArr['link_image'] = ClaHost::getImageHost() . $value['image_path'] . 's500_500/' . $value['image_name'];
			$dataArr['link_detail'] = 'http://levananh.com'. Yii::app()->createUrl('news/news/detail', array('id' => $value['news_id'], 'alias' => $value['alias']));
			$dataArr['image_name'] = $value['image_name'];
			$dataArr['image_path'] = $value['image_path'];
			$dataTemArr[] = $dataArr;
		}
		
		$data = array(
			   "status" => 200,
			   "message" => "Success",
			   "data" => $dataTemArr
		);
		$response = json_encode($data);
		echo $response;	
    }
	public function actionCheckCode() {
		
		$site_id = 1182;
		$code =  Yii::app()->getRequest()->getQuery('code');
		
		if ($code == '') {
			$data = array(
			   "status" => 400,
			   "message" => "mã giảm giá rỗng",
			);
			$response = json_encode($data);
			echo $response;
			
		} elseif (!is_numeric($code)) {
			$data = array(
			   "status" => 400,
			   "message" => "mã giảm giá không đúng định dạng",
			);
			$response = json_encode($data);
			echo $response;
			
		} else {
			
			$dataCode = Yii::app()->db->createCommand()->select('*')
                ->from(ClaTable::getTable('promotions'))
				->where('site_id="'.$site_id.'" AND name='.$code)
                ->queryRow();
		
			if (empty($dataCode)) {
				$data = array(
				   "status" => 400,
				   "message" => "không tồn tại mã giảm giá",
				   "code" => $code
				);
				$response = json_encode($data);
				echo $response;
			} else {
								
				$dataArr = array(
					'code' => $dataCode['name'],
					'discount' => $dataCode['sortdesc'].'%',
					'applyVip' => $dataCode['showinhome']
				);	 
			
				$data = array(
					   "status" => 200,
					   "message" => "Success",
					   "data" => $dataArr
				);
				$response = json_encode($data);
				echo $response;	
			}
			
		}
		
		
    }
	public function actionGetProduct() {
		
		$id = $_GET['id'];
		$site_id = 1182;
		
		$product = Yii::app()->db->createCommand()->select('p.price,p.include_vat')
                ->from(ClaTable::getTable('product as p'))
				->join('product_categories AS c','p.product_category_id=c.cat_id')
				->where('p.site_id='.$site_id)
				->where('p.id='.$id)
                ->queryAll();
		
		$response = json_encode($product);
		echo $response;	
		
	}	
	
	public function actionProduct() {
		
		$site_id = 1235;
		$news_category_id = 11383;
		$news_category_id_2 = 11394;
		
		$product1 = Yii::app()->db->createCommand()->select('p.*,c.cat_name')
                ->from(ClaTable::getTable('product as p'))
				->join('product_categories AS c','p.product_category_id=c.cat_id')
				->where('p.site_id= "'.$site_id.'" AND p.product_category_id='.$news_category_id)
				->order('p.position asc')
                ->queryAll();
		
		
		$product2 = Yii::app()->db->createCommand()->select('p.*,c.cat_name')
                ->from(ClaTable::getTable('product as p'))
				->join('product_categories AS c','p.product_category_id=c.cat_id')
				->where('p.site_id= "'.$site_id.'" AND p.product_category_id='.$news_category_id_2)
				->order('p.position asc')
                ->queryAll();
		
		$news_category_id_3 = 11476;
		$product3 = Yii::app()->db->createCommand()->select('p.*,c.cat_name')
                ->from(ClaTable::getTable('product as p'))
				->join('product_categories AS c','p.product_category_id=c.cat_id')
				->where('p.site_id= "'.$site_id.'" AND p.product_category_id='.$news_category_id_3)
				->order('p.position asc')
                ->queryAll();
				
		$dataTemArr = array();	
		$dataArr = array();	
		foreach ($product1 as $value) {
			$dataArr['id'] = $value['id'];
			$dataArr['product_category_id'] = $value['product_category_id'];
			$dataArr['cat_name'] = $value['cat_name'];
			$dataArr['name'] = $value['name'];
			$dataArr['price'] = $value['price'];
			$dataArr['price_market'] = $value['price_market'];
			$dataArr['price_discount'] = $value['price_discount'];
			$dataArr['isApplyDiscount'] = $value['include_vat'];
			$dataArr['icon_hot'] = $value['ishot'];
			$dataArr['product_sortdesc'] = $value['product_sortdesc'];
			//$dataArr['product_desc'] = $value['product_desc'];
			$dataArr['price_discount'] = $value['price_discount'];
			$dataArr['link_image'] = ClaHost::getImageHost() . $value['avatar_path'] . 's500_500/' . $value['avatar_name'];
			$dataArr['link_detail'] = 'http://levananh.tss-software.com.vn/'. Yii::app()->createUrl('economy/product/detail', array('id' => $value['id'], 'alias' 	=> $value['alias']));
			
			$dataArr['image_name'] = $value['image_name'];
			$dataArr['image_path'] = $value['image_path'];
			$dataTemArr[] = $dataArr;
		}
	
		$dataTemArr2 = array();	
		$dataArr2 = array();	
		foreach ($product2 as $value) {
			$dataArr2['id'] = $value['id'];
			$dataArr2['product_category_id'] = $value['product_category_id'];
			$dataArr2['cat_name'] = $value['cat_name'];
			$dataArr2['name'] = $value['name'];
			$dataArr2['price'] = $value['price'];
			$dataArr2['price_market'] = $value['price_market'];
			$dataArr2['price_discount'] = $value['price_discount'];
			$dataArr2['isApplyDiscount'] = $value['include_vat'];
			$dataArr['icon_hot'] = $value['ishot'];
			$dataArr2['product_sortdesc'] = $value['product_sortdesc'];
			//$dataArr['product_desc'] = $value['product_desc'];
			$dataArr2['price_discount'] = $value['price_discount'];
			$dataArr2['link_image'] = ClaHost::getImageHost() . $value['avatar_path'] . 's500_500/' . $value['avatar_name'];
			$dataArr2['link_detail'] = 'http://levananh.tss-software.com.vn/'. Yii::app()->createUrl('economy/product/detail', array('id' => $value['id'], 'alias' => $value['alias']));
			
			$dataArr2['image_name'] = $value['image_name'];
			$dataArr2['image_path'] = $value['image_path'];
			$dataTemArr2[] = $dataArr2;
		}
		
		$dataTemArr3 = array();	
		$dataArr3 = array();	
		foreach ($product3 as $value) {
			$dataArr3['id'] = $value['id'];
			$dataArr3['product_category_id'] = $value['product_category_id'];
			$dataArr3['cat_name'] = $value['cat_name'];
			$dataArr3['name'] = $value['name'];
			$dataArr3['price'] = $value['price'];
			$dataArr3['price_market'] = $value['price_market'];
			$dataArr3['price_discount'] = $value['price_discount'];
			$dataArr['icon_hot'] = $value['ishot'];
			$dataArr3['isApplyDiscount'] = $value['include_vat'];
			$dataArr3['product_sortdesc'] = $value['product_sortdesc'];
			//$dataArr['product_desc'] = $value['product_desc'];
			$dataArr3['price_discount'] = $value['price_discount'];
			$dataArr3['link_image'] = ClaHost::getImageHost() . $value['avatar_path'] . 's500_500/' . $value['avatar_name'];
			$dataArr3['link_detail'] = 'http://levananh.tss-software.com.vn/'. Yii::app()->createUrl('economy/product/detail', array('id' => $value['id'], 'alias' => $value['alias']));
			
			$dataArr3['image_name'] = $value['image_name'];
			$dataArr3['image_path'] = $value['image_path'];
			$dataTemArr3[] = $dataArr3;
		}
		
		$data1 = array(
		   "Category_name" => "	Chăm Sóc Da",
		   "Category_id" => $news_category_id,
		   "data" => $dataTemArr
		);
		$data2 = array(
			   
			   "Category_name" => "Make Up",
			   "Category_id" => $news_category_id_2,
			   "data" => $dataTemArr2
		);
		$data3 = array(
			   
			   "Category_name" => "Thực Phẩm Chức Năng",
			   "Category_id" => $news_category_id_3,
			   "data" => $dataTemArr3
		);
		$dataArr = array(
		   "0" => $data1,
		   "1" => $data2,
		   "2" => $data3,
		);
		$data = array(
			"status" => 200,
			"message" => "Success",
		    "data" => $dataArr,
		);
		
		$response = json_encode($data);
		echo $response;	
    }
	public function actionLogin() {
		
		if (isset($_POST['Users'])) {
			
		}
		
	}
	public function actionHistory() {
		
		
	}
	public function actionTest() {
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

		
	}
	
	/**
     * process reponse result
     * assign to some properties
     * @return void
     */
    public function processResponse($data) {
		$data = array(
			   "status" => 200,
			   "message" => "Success",
			   "data" => $data
		);
        return json_decode($response, true);
    }
	
}
