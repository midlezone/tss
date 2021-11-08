<?php

class ShoppingcartController extends PublicController {

    public $layout = '//layouts/shopping';

    public function actionIndex() {
        $shoppingCart = Yii::app()->customer->getShoppingCart();
        $this->render('index', array(
            'shoppingCart' => $shoppingCart
        ));
    }

    public function actionCheckout() {
//        $content = "Link google.com.vn?q=dungtuman là một website";
//        $expression = "%((ftp|http|https):\/\/){1,1}(www\.)?(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&\%@!\-\/]))?%";
//        $expression1 = "%[^(http:\/\/)(ftp:\/\/)(https:\/\/)](www\.){1,1}(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&\%@!\-\/]))?%";
//
//        $content = preg_replace($expression1, " <a href=\"$0\" target=\"_blank\">$0</a> ", $content);
//        $content = preg_replace($expression, " <a href=\"$0\" target=\"_blank\">$0</a> ", $content);
//
//        echo $content;
//
//        //$text = "Link http://abcxyz.com.vn/modest.php#hoccachkhiemton là một website";
//        $text = "Link http://abcxyz.com.vn?q=dungtuman là một website";
//        
//        $text_new = preg_replace('@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)*)@', '<a href="$1" target="blank">$1</a>', $text);
//        echo $text_new;
//        die;
        $shoppingCart = Yii::app()->customer->getShoppingCart();
        if (!$shoppingCart->countOnlyProducts())
            $this->sendResponse(500);
        $step = Yii::app()->request->getParam('step');
        if (!$step)
            $step = 's1';
        $view = 'checkout_s1';
        $params = array();

        switch ($step) {
            case 's1': {
                    if (Yii::app()->user->isGuest)
                        break;
                }
            default: {
                    $view = 'checkout_s2';
                    $billing = new Billing();
                    $billing->billtoship = 1;
                    if (!Yii::app()->user->isGuest) {
                        $userinfo = ClaUser::getUserInfo(Yii::app()->user->id);
                        if ($userinfo) {
                            $billing->name = $userinfo['name'];
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
                            $order->site_id = $this->site_id;
                            if (!Yii::app()->user->isGuest)
                                $order->user_id = Yii::app()->user->id;
                            //
                            $order->ip_address = Yii::app()->request->userHostAddress;
                            $order->key = ClaGenerate::getUniqueCode(array('prefix' => 'o'));
                            //
                            $order->order_total = $shoppingCart->getTotalPrice(false);
                            //
                            if ($order->save()) {
                                Yii::app()->user->setFlash('success', 'Thanh toán và tạo hóa đơn thành công.');
                                $products = $shoppingCart->getProducts();
                                foreach ($products as $product_id => $product) {
                                    $orderProduct = new OrderProducts();
                                    $orderProduct->product_id = $product_id;
                                    $orderProduct->order_id = $order->order_id;
                                    $orderProduct->product_qty = $product['qty'];
                                    $orderProduct->product_price = $product['price'];
                                    $orderProduct->save();
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
                        'billing' => $billing,
                        'shipping' => $shipping,
                        'order' => $order,
                    );
                }break;
        }
        $arr = array('shoppingCart' => $shoppingCart) + $params;
        $this->render($view, $arr);
    }

    /**
     * Thêm sp vào giỏ hàng
     */
    public function actionAdd() {
        $product_id = (int) Yii::app()->request->getParam('pid');
        $quantity = (int) Yii::app()->request->getParam('qty');
        if (!$quantity || $quantity < 0)
            $quantity = 1;
        if ($product_id) {
            $product = Product::model()->findByPk($product_id);
            if ($product && $product->site_id == $this->site_id) {
                $shoppingCart = Yii::app()->customer->getShoppingCart();
                $shoppingCart->add($product_id, array('qty' => intval($quantity), 'price' => $product->price));
                if (Yii::app()->request->isAjaxRequest) {
                    $this->jsonResponse('200', array(
                        'message' => 'success',
                        'total' => Yii::app()->customer->getShoppingCart()->countProducts(),
                        'redirect' => Yii::app()->createUrl('/economy/shoppingcart'),
                    ));
                } else
                    $this->redirect(Yii::app()->createUrl('/economy/shoppingcart'));
            }
        }
    }

    /**
     * Cập nhật giỏ hàng
     */
    public function actionUpdate() {
        $product_id = (int) Yii::app()->request->getParam('pid');
        $quantity = (int) Yii::app()->request->getParam('qty');
        if ($quantity <= 0)
            $quantity = 1;
        if ($product_id && $quantity) {
            $product = Product::model()->findByPk($product_id);
            if ($product && $product->site_id == $this->site_id) {
                $shoppingCart = Yii::app()->customer->getShoppingCart();
                $shoppingCart->update($product_id, array('qty' => $quantity, 'price' => $product->price));
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
        $product_id = (int) Yii::app()->request->getParam('pid');
        if ($product_id) {
            $product = Product::model()->findByPk($product_id);
            if ($product && $product->site_id == $this->site_id) {
                $shoppingCart = Yii::app()->customer->getShoppingCart();
                $shoppingCart->remove($product_id);
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
            $this->render('order', array(
                'order' => $order->attributes,
                'products' => $products,
                'paymentmethod' => $paymentmethod,
                'transportmethod' => $transportmethod,
            ));
            //
        }
    }

}
