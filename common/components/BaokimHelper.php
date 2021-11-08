<?php

class BaokimHelper extends CComponent {

    public static $_helper;
    public $config = array();
    public $isLogResponse = true;

    public function __Construct() {
        $this->init();
    }

    public function init() {
        // chay server hay ko
        if (defined('BAOKIM_CONFIG') && !ClaSite::isDemoDomain()) {
            $this->config = Yii::app()->params[BAOKIM_CONFIG];
        } else {
            $this->config = Yii::app()->params['baokim_dev'];
        }        
    }        

    public static function helper($isNew = false) {
        if (!is_null(self::$_helper) && !$isNew)
            return self::$_helper;
        else {
            $className = __CLASS__;
            $helper = self::$_helper = new $className();
            return $helper;
        }
    }       

    public function mergeConfig($config){
        if(is_array($config)){
            $this->config = CMap::mergeArray($this->config, $config);            
        }
        return $this;
    }
    
    public function getConfig(){        
        return $this->config;
    }
    
    public function prepareCurl($url, $method_post = true, $param_post = array(), $http_auth = true) {
        $res = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        if (isset(Yii::app()->params['ca_file'])) { //certificate authority
            curl_setopt($ch, CURLOPT_CAINFO, Yii::getPathOfAlias('webroot') . Yii::app()->params['ca_file']);
        }
        if ($method_post) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param_post));
            curl_setopt($ch, CURLOPT_POST, TRUE);
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, null);
            curl_setopt($ch, CURLOPT_POST, FALSE);
            curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
        }
        if ($http_auth) {
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST | CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, $this->config['api_user'] . ':' . $this->config['api_password']);
        }
        $response = curl_exec($ch);
        //log file
        if($this->isLogResponse){
            $this->logFileResponse($response);
        }
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $res['code'] = $status;
        $res['response'] = CJSON::decode($response);
        if ($status === 200) {
            $res['success'] = true;
        } else {
            $res['success'] = false;
            $res['error'] = $this->getError($res['code'], $res['response']);
        }
        return $res;
    }

    public function getAccountInfo($access_token) {
        $result = array();
        if (!empty($this->config)) {
            $url = $this->config['host'] . $this->config['link_get_account_info'] . $access_token . '?with_mrc_promotion=true';
            //$url = 'https://www.baokim.vn/accounts/rest/sso_oauth_api/get_account_info/gn1yiax7svk3a5e22csnwa300000000300000062';
            $result = $this->prepareCurl($url, false, array(), false);
        } else {
            $result['success'] = false;
            $result['code'] = 500;
            $result['error'] = "Lỗi config";
        }
        return $result;
    }

    public function getSellerInfo() {
        $result = array();
        if (!empty($this->config)) {
            $url = $this->config['host'] . $this->config['link_get_info'];
            $paramGet = array('business' => urlencode($this->config['email_bussiness']));
            $paramPost = array();
            $signature = $this->makeBaoKimAPISignature('GET', $this->config['link_get_info'], $paramGet, $paramPost, $this->config['pri_key']);
            $params = array('signature' => $signature, 'business' => urlencode($this->config['email_bussiness']));
            $params = http_build_query($params);
            $url .='?' . $params;
            $result = $this->prepareCurl($url, false);
        } else {
            $result['success'] = false;
            $result['code'] = 500;
            $result['error'] = "Lỗi config";
        }
        return $result;
    }

    public function doPayCard($order,$type) {
        $result = array();
        if (!empty($this->config)) {
            $url = $this->config['host'] . $this->config['link_pay_card'];
            $paramGet = array();
            $paramPost = $this->buildParamPayment($order,$type);
            $signature = $this->makeBaoKimAPISignature('POST', $this->config['link_pay_card'], $paramGet, $paramPost, $this->config['pri_key']);
            $params = array('signature' => $signature);
            $params = http_build_query($params);
            $url .='?' . $params;
            $result = $this->prepareCurl($url, true, $paramPost);
        } else {
            $result['success'] = false;
            $result['code'] = 500;
            $result['error'] = "Lỗi config";
        }
        return $result;
    }

    public function doPayAccount($order) {
        $result = array();
        if (!empty($this->config)) {
            $url = $this->config['host'] . $this->config['link_pay_acc'];
            $paramGet = array();
            $paramPost = $this->buildParamPayment($order);
            $signature = $this->makeBaoKimAPISignature('POST', $this->config['link_pay_acc'], $paramGet, $paramPost, $this->config['pri_key']);
            $params = array('signature' => $signature);
            $params = http_build_query($params);
            $url .='?' . $params;
            $result = $this->prepareCurl($url, true, $paramPost);
        } else {
            $result['success'] = false;
            $result['code'] = 500;
            $result['error'] = "Lỗi config";
        }
        return $result;
    }

    public function verifyOTP($transaction_id, $otp) {
        $result = array();
        if (!empty($this->config)) {
            $url = $this->config['host'] . $this->config['link_verify_otp'];
            $paramGet = array();
            $paramPost = array('transaction_id' => $transaction_id, 'sms_otp' => urlencode($otp));
            $signatute = $this->makeBaoKimAPISignature('POST', $this->config['link_verify_otp'], $paramGet, $paramPost, $this->config['pri_key']);
            $params = array('signature' => $signatute);
            $params = http_build_query($params);
            $url .='?' . $params;
            $result = $this->prepareCurl($url, true, $paramPost);
        } else {
            $result['success'] = false;
            $result['code'] = 500;
            $result['error'] = "Lỗi config";
        }
        return $result;
    }

    public function buildParamPayment($order,$type='PRO') {
        $post = array();
        if ($order) {
            $order_id = $type.(isset($order->id)?$order->id:$order->order_id);
            $paygateCode = ($order->payment_method_child) ? $order->payment_method_child : null;
            $base_url = ClaSite::getServerName();
            $base_url = (strpos($base_url,'http') === false)?'http://'.$base_url:$base_url; 
            $paramsKey = ($type == 'PRO' && isset($order->key) && $order->key)?'/key/'.$order->key:'';            
            $url_success = $base_url.'/economy/baokim/success'.$paramsKey;
            $url_cancel = $base_url.'/economy/baokim/cancel';              
            if ($paygateCode == 'baokim') {
                //THANH TOAN ACC
                //thong tin tai khoan              
                $post['business'] = $this->config['email_bussiness'];
                $post['buyer_email'] = $order->billing_email;

                //thong tin don hang
                $post['order_id'] = $order_id;
                $post['total_amount'] = (float) $order->order_total;
                //$post['tax_fee'] = '';  //defautl
                //$post['shipping_fee'] = ''; //defautl                
                //$post['currency_code'] = ''; //defautl
                //$post['order_description'] = ''; //defautl                
                //$post['order_url_detail'] = ''; //defautl
                //thong tin giao dich
                //$post['payment_mode'] = 1; //defautl
                //$post['escrow_timeout'] = 0; //defautl
                //$post['point'] = (int)$order->vpoint_value; //default
                //$post['mrc_account_promotion_id'] = 0; //default
                //$post['use_promotion_amount'] = 0; //default double
                //thong tin giao hang         
                //$post['receiver_name'] = ''; //defautl                                                
                //$post['receiver_email'] = ''; //defautl                                                
                //$post['receiver_phone_no'] = ''; //defautl                                                
                //$post['receiver_address'] = ''; //defautl                                                
                //$post['receiver_message'] = ''; //defautl                 
            } else {
                //THANH TOAN CARD
                //thong tin don hang
                $post['order_id'] = $order_id;
                $post['business'] = $this->config['email_bussiness'];
                $post['total_amount'] = (float) $order->order_total;
                //$post['order_description'] = ''; //defautl
                //$post['shipping_fee'] = ''; //defautl
                //$post['tax_fee'] = '';  //defautl
                //$post['url_cancel'] = ''; //defautl
                $post['url_success'] = $url_success;
                //$post['url_detail'] = ''; //defautl
                //thong tin nguoi mua
                $post['payer_name'] = $order->billing_name;
                $post['payer_email'] = $order->billing_email;
                $post['payer_phone_no'] = $order->billing_phone;
                //$post['payer_address'] = ''; //default
                //$post['message'] = ''; //defautl
                //thong tin ve phuong thuc thanh toan
                $post['bank_payment_method_id'] = $paygateCode;
                //$post['transaction_mode_id'] = ''; //defautl
                //$post['escrow_timeout'] = 0; //defautl
                //$post['mui'] = '';          //defautl  
            }
        }
        return $post;
    }

    public function getError($code, $response) {
        $errors = '';
        $errorCode = array(
            '0xF00' => 'Thành công',
            '0xF01' => 'Lỗi hệ thống (lỗi code, lỗi dữ liệu…)',
            '0xF02' => 'Số dư tài khoản không đủ',
            '0xF03' => 'Số tiền giao dịch vượt quá hạn mức',
            '0xF04' => 'Số tiền giao dịch nhỏ hơn hạn mức',
            '0xF05' => 'Tài khoản bị phong tỏa',
            '0xF06' => 'Tài khoản đối tác bị phong tỏa',
            '0xF07' => 'Số lượng giao dịch vượt quá hạn mức /ngày',
            '0xF08' => 'Không được phép thanh toán an toàn với tài khoản đảm bảo',
            '0xF09' => 'Số point không đủ để thực hiện giao dịch',
            '0xF10' => 'Đơn hàng đã được thanh toán trước đó',
            '0xF11' => 'Tài khoản ghi nợ không tồn tại',
            '0xF12' => 'Tài khoản ghi có không tồn tại',
            '0xF13' => 'Không tìm thấy phương thức thanh toán ngân hàng',
            '0xF14' => 'Phương thức thanh toán ngân hàng hiện không được hỗ trợ(đang bị khóa)',
            '0xF15' => 'Xác minh gd: không tìm thấy giao dịch',
            '0xF16' => 'Xác minh gd: gd đã được xác minh trước đó',
            '0xF17' => 'Xác minh gd: gd này phải xác minh bằng OTP',
            '0xF18' => 'Xác minh gd: gd này phải xác minh bằng MKGD',
        );

        switch ($code) {
            case '450':
                $errors = ($response['error_code'] && isset($errorCode[$response['error_code']])) ? $errorCode[$response['error_code']] : ((isset($response['error'])) ? $response['error'] : '');
                break;
            case '400':
                $errors = 'Lỗi khi validate dữ liệu gửi lên';
                break;
            case '401':
                $errors = 'api account không chính xác';
                break;
            case '403':
                $errors = 'Không được quyền truy cập api';
                break;
            case '500':
                $errors = 'BaoKim server error';
                break;
            case '503':
                $errors = 'Service unavailable';
                break;
            default :
                break;
        }
        return $errors;
    }

    public function makeBaoKimAPISignature($method, $url, $getArgs = array(), $postArgs = array(), $priKeyFile) {
        if (strpos($url, '?') !== false) {
            list($url, $get) = explode('?', $url);
            parse_str($get, $get);
            $getArgs = array_merge($get, $getArgs);
        }

        ksort($getArgs);
        ksort($postArgs);
        $method = strtoupper($method);

        $data = $method . '&' . urlencode($url) . '&' . urlencode(http_build_query($getArgs)) . '&' . urlencode(http_build_query($postArgs));

        $priKey = openssl_get_privatekey($priKeyFile);
        assert('$priKey !== false');

        $x = openssl_sign($data, $signature, $priKey, OPENSSL_ALGO_SHA1);
        assert('$x !== false');

        return urlencode(base64_encode($signature));
    }

    public function getListMethod() {
        if ($res = Yii::app()->cache->get('payment_method_baokim')) {
            return $res;
        } else {
            $res = array();
            $data = BaokimHelper::helper()->getSellerInfo();
            if ($data['success']) {
                $methods = isset($data['response']['bank_payment_methods']) ? $data['response']['bank_payment_methods'] : null;
                if (!empty($methods)) {
                    foreach ($methods as $item) {
                        $res[$item['payment_method_type']][] = $item;
                    }
                }
                if (!empty($res)) {
                    //set cache 1 ngay va set vao global all site
                    Yii::app()->cache->set('payment_method_baokim', $res, 86400);
                }
            }
        }
        return $res;
    }

    public function paymentOnline($order,$type="PRO") {
        $result = array();
        $paygateCode = ($order->payment_method_child) ? $order->payment_method_child : null;
        if ($paygateCode == 'baokim') {
            //thanh toan qua tk bao kim
            $payBK = BaokimHelper::helper()->doPayAccount($order);
            if ($payBK['success']) {
                /*if (isset($payBK['response']->transaction_id)) {
                    Yii::app()->user->setState('pmbk_transaction_id', $payBK['response']['transaction_id']);
                    Yii::app()->user->setState('pmbk_otp_order_id', $order->order_id);
                    Yii::app()->user->setState('pmbk_order_key', $order->order_id);
                    Yii::app()->getController()->redirect(array('/economy/shoppingcart/otp'));
                }*/
                if (isset($payBK['response']['next_action']) && $payBK['response']['next_action'] == 'redirect') {
                    Yii::app()->getController()->redirect($payBK['response']['redirect_url']);
                } elseif (isset($payBK['response']['next_action']) && $payBK['response']['next_action'] == 'display_guide') {
                    $result['guide'] = $payBK['response']['guide_url'];
                }
            } else {
                $result['pmbk_error'] = $payBK['error'];
            }
        } else {
            $payBK = BaokimHelper::helper()->doPayCard($order,$type);
            if ($payBK['success']) {
                if (isset($payBK['response']['next_action']) && $payBK['response']['next_action'] == 'redirect') {
                    Yii::app()->getController()->redirect($payBK['response']['redirect_url']);
                } elseif (isset($payBK['response']['next_action']) && $payBK['response']['next_action'] == 'display_guide') {
                    $result['guide'] = $payBK['response']['guide_url'];
                }
            } else {
                $result['pmbk_error'] = $payBK['error'];
            }
        }
        return $result;
    }        
    
    /**
     * Cấu hình phương thức thanh toán với các tham số
     * E-mail Bảo Kim - E-mail tài khoản bạn đăng ký với BaoKim.vn.
     * Merchant ID - là “mã website” được Baokim cấp khi bạn đăng ký tích hợp.
     * Mã bảo mật - là “mật khẩu” được Baokim cấp khi bạn đăng ký tích hợp
     * Vd : 12f31c74fgd002b1
     * Server Bảo Kim
     * Trang ​Kiểm thử - server để test thử phương thức thanh. .toán
     * Trang thực tế - Server thực tế thực hiện thanh toán.
     * https://www.baokim.vn/payment/order/version11' => ('Trang thực tế'),
     * http://kiemthu.baokim.vn/payment/order/version11' => ('Trang kiểm thử')
     * Chọn Save configuration để áp dụng thay đổi
     * Hàm xây dựng url chuyển đến BaoKim.vn thực hiện thanh toán, trong đó có tham số mã hóa (còn gọi là public key)
     * @param $order_id                Mã đơn hàng
     * @param $business            Email tài khoản người bán
     * @param $total_amount            Giá trị đơn hàng
     * @param $shipping_fee            Phí vận chuyển
     * @param $tax_fee                Thuế
     * @param $order_description    Mô tả đơn hàng
     * @param $url_success            Url trả về khi thanh toán thành công
     * @param $url_cancel            Url trả về khi hủy thanh toán
     * @param $url_detail            Url chi tiết đơn hàng
     * @param null $payer_name
     * @param null $payer_email
     * @param null $payer_phone_no
     * @param null $shipping_address
     * @return url cần tạo
     */
    public function createRequestUrl($order,$type='PRO')
    {
        $order_id = $type.(isset($order->id)?$order->id:$order->order_id);
        $total_amount = (float) $order->order_total;
        $base_url = ClaSite::getServerName();
        $base_url = (strpos($base_url,'http') === false)?'http://'.$base_url:$base_url;
        $url_success = $base_url.'/economy/baokim/success';
        $url_cancel = $base_url.'/economy/baokim/cancel';        
        $currency = 'VND'; // USD
        // Mảng các tham số chuyển tới baokim.vn
        $params = array(
                'merchant_id'		=>	strval($this->config['merchan_id']),
                'order_id'		=>	strval($order_id),
                'business'		=>	strval($this->config['email_bussiness']),
                'total_amount'		=>	strval($total_amount),
                'shipping_fee'		=>      strval('0'),
                'tax_fee'               =>      strval('0'),
                'order_description'	=>	strval('Thanh toán đơn hàng từ Website '. $base_url . ' với mã đơn hàng ' . $order_id),
                'url_success'		=>	strtolower($url_success),
                'url_cancel'		=>	strtolower($url_cancel),
                'url_detail'		=>	strtolower(''),
                'payer_name'		=>      strval($order->billing_name),
                'payer_email'		=> 	strval($order->billing_email),
                'payer_phone_no'	=> 	strval($order->billing_phone),
                'shipping_address'      =>      strval(''),
                'currency'              =>      strval($currency),

        );
        ksort($params);

        $params['checksum']=hash_hmac('SHA1',implode('',$params),$this->config['secure_pass']);

        //Kiểm tra  biến $redirect_url xem có '?' không, nếu không có thì bổ sung vào
        $redirect_url = $this->config['host'] . $this->config['link_payment'];
        if (strpos($redirect_url, '?') === false)
        {
                $redirect_url .= '?';
        }
        else if (substr($redirect_url, strlen($redirect_url)-1, 1) != '?' && strpos($redirect_url, '&') === false)
        {
                // Nếu biến $redirect_url có '?' nhưng không kết thúc bằng '?' và có chứa dấu '&' thì bổ sung vào cuối
                $redirect_url .= '&';
        }
        // Tạo đoạn url chứa tham số
        $url_params = '';
        foreach ($params as $key=>$value)
        {
                if ($url_params == '')
                        $url_params .= $key . '=' . urlencode($value);
                else
                        $url_params .= '&' . $key . '=' . urlencode($value);
        }
        return $redirect_url.$url_params;
    }

    /**
     * Hàm thực hiện xác minh tính chính xác thông tin trả về từ BaoKim.vn
     * @param $url_params chứa tham số trả về trên url
     * @return true nếu thông tin là chính xác, false nếu thông tin không chính xác
     */
    public function verifyResponseUrl($url_params = array())
    {
        if(empty($url_params['checksum'])){
                echo "invalid parameters: checksum is missing";
                return FALSE;
        }

        $checksum = $url_params['checksum'];
        unset($url_params['checksum']);

        ksort($url_params);

        if(strcasecmp($checksum,hash_hmac('SHA1',implode('',$url_params),$this->config['secure_pass']))===0)
                return TRUE;
        else
                return FALSE;
    }
    

    public function logFileResponse($response,$file='baokim_response.log') {
        //Log File
        $req = "\n".date('Y-m-d H:i:s')."\n".  json_encode($response); 
        $logFile = Yii::app()->getBasePath().DS.'runtime'.DS.$file;                
        if(!file_exists($logFile)){
            $fh = fopen($logFile, 'x') or die("can't create file");
        }else{
            $fh = fopen($logFile, 'a') or die("can't open file");
        }        
        fwrite($fh, $req);
    }

//     public function sendRequest($url,$data) {		
//        // post shipment to server
//        $curl = curl_init($url);
//        curl_setopt($curl, CURLOPT_POST, 1);
//        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->buildPostFields($data));
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//        $curlResult = curl_exec($curl);
//
//        // result
//        if(curl_error($curl) == "") {
//            $response = json_decode($curlResult);
//            $response = (is_null($response))?new stdClass():$response;
//            $response->success = 1;
//        } else {
//            $response = new stdClass();
//            $response->success = 0;
//            $response->status = 0;
//            $response->mes = json_encode(array(curl_error($curl)));
//        }
//        
//        curl_close($curl);
//
//        return $response;                
//    }
}

?>
