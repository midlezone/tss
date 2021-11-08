<?php

class ClaShoppingCart extends BaseHelper {

    const PRODUCT_QUANTITY_KEY = 'qty';
    const PRODUCT_ID_KEY = 'pid';
    const PRODUCT_ATTRIBUTE_CONFIGURABLE_KEY = 'attrConfig';
    const MORE_INFO = 'more';

    //
    private $_products = array();
    private $ProductInfo = array();

    /**
     * add protuct to shopping cart
     * @param type $productId
     * @param type $options
     */
    public function add($key, $options = array()) {
        $product_id = isset($options['product_id']) ? $options['product_id'] : 0;
        $quantity = isset($options['qty']) ? $options['qty'] : 0;
        $price = isset($options['price']) ? $options['price'] : 0;
        $moreInfo = isset($options[self::MORE_INFO]) ? $options[self::MORE_INFO] : array();
        if (!$product_id || !$quantity || !$price)
            return false;
        //
        if (!isset($this->_products[$key]))
            $this->_products[$key]['qty'] = $quantity;
        else
            $this->_products[$key]['qty'] += $quantity;
        $this->_products[$key]['price'] = $price;
        $this->_products[$key]['product_id'] = $product_id;
        $this->_products[$key][self::MORE_INFO] = $moreInfo;
        return true;
    }

    /**
     * update protuct in shopping cart
     * @param type $productId
     * @param type $options
     */
    public function update($key, $options = array()) {
        $quantity = isset($options['qty']) ? (int) $options['qty'] : 0;
        $price = isset($options['price']) ? $options['price'] : 0;
        $product_id = isset($options['product_id']) ? $options['product_id'] : 0;
     
       
        if ($price) {            
            $this->_products[$key]['price'] = $price;
			$this->_products[$key]['qty'] = $quantity;
        } else
            $this->remove($key);
    }

    public function remove($key) {
        if (isset($this->_products[$key]))
            unset($this->_products[$key]);
    }

    public function getProducts() {
        return $this->_products;
    }

    public function getInfoByKey($key) {
        $info = isset($this->_products[$key]) ? $this->_products[$key] : null;
        return $info;
    }

    public function getQuantity($key) {
        if (isset($this->_products[$key]['qty']))
            return $this->_products[$key]['qty'];
        else
            return null;
    }

    /**
     * trả về tổng giá cho mỗi sản phẩm
     * @param type $productId
     * @param type $formatted
     * @return int
     */
    public function getTotalPriceForProduct($key, $price,$formatted = true) {
        if (!is_null($this->getQuantity($key))) {
            $product = $this->findProduct($key);
			
            if ($product) {
                $total = $price * $this->getQuantity($key);
                if ($formatted) {
                    // TODO: format price according to store settings
                    return Product::getPriceText(array('price' => $total));
                } else
                    return $total;
            }
        }

        return 0;
    }

    public function findProduct($key) {
        if (isset($this->ProductInfo[$key]))
            $product = $this->ProductInfo[$key];
        else {
            $cartInfo = $this->getInfoByKey($key);
            $product = Product::model()->findByPk($cartInfo['product_id']);
            if ($product) {
                $attributes = $this->getAttributesByKey($key);
                if ($attributes && count($attributes)) {
                    $where = 'site_id = ' . Yii::app()->controller->site_id . ' AND product_id=' . $cartInfo['product_id'];
                    $params = array();
                    foreach ($attributes as $attr) {
                        $where .= ' AND ' . $attr['field_configurable'] . '=:' . $attr['field_configurable'];
                        $params[':' . $attr['field_configurable']] = $attr['field_configurable_value'];
                    }
                    //
                    $proConfigVal = ProductConfigurableValue::model()->find($where, $params);
                    if ($proConfigVal && $proConfigVal['price']) {
                        $product->price = $proConfigVal['price'];
                    }
                }
            }
            $this->ProductInfo[$key] = $product;
        }
        return $product;
    }

    public function findAllProducts() {
        $products = array();
		
        foreach ($this->_products as $key => $proInfo) {
            $product = $this->findProduct($key);
			
            if ($product) {
                $products[$key] = $product->attributes;
                $products[$key]['price_market'] = $proInfo['price'];
                $products[$key]['link'] = Yii::app()->createUrl('economy/product/detail', array('id' => $product['id'], 'alias' => $product['alias']));
            }
        }
	    
        return $products;
    }

    /**
     * trả về số sản phẩm
     * @return type
     */
    public function countOnlyProducts() {
        $total = count($this->_products);
        return $total;
    }

    /**
     * trả vể số lượng tất cả các sản phẩm tính cả số lượng của từng sản phẩm
     * @return type
     */
    public function countProducts() {
        $total = 0;
        foreach ($this->_products as $proInfo) {
            $total += $proInfo['qty'];
        }

        return $total;
    }

    /**
     * trả về tổng giá thanh của của tất cả sản phẩm trong giỏ hàng
     * @param type $formatted
     * @return type
     */
    public function getTotalPrice($formatted = false) {
        $total = 0;
        foreach ($this->_products as $key => $proInfo) {
            $total += $this->getTotalPriceForProduct($key,$proInfo['price'], false);
        }
		
						
        if ($formatted)
            return Product::getPriceText(array('price' => $total));
        else
            return $total;
    }
	
	  /**
     * trả về tổng giá thanh của của tất cả sản phẩm trong giỏ hàng
     * @param type $formatted
     * @return type
     */
    public function getTotalPrice1($formatted = false) {
        $total = 0;
        foreach ($this->_products as $key => $proInfo) {
            $total += $this->getTotalPriceForProduct($key, false);
        }

		$priceP = $total*2/100;
		$total1 = $total- $priceP;
		
        if ($formatted)
            return Product::getPriceText(array('price' => $total1));
        else
            return $total1;
    }
	 /**
     * trả về tổng giá thanh của của tất cả sản phẩm trong giỏ hàng
     * @param type $formatted
     * @return type
     */
    public function getTotalPoint() {
		$userinfo = ClaUser::getUserInfo(Yii::app()->user->id);
		$point = $userinfo['point'];
		
		// get pura
		$json1 = file_get_contents('https://api.coinmarketcap.com/v1/ticker/pura/');
		$value_pura = json_decode($json1);
		$value_pura = $value_pura[0]->price_usd;
					
		
		// get USD
		$json2 = file_get_contents('http://www.apilayer.net/api/live?access_key=120e1ee14bf6e88d251907196445cf90&format=1');
		$value_vnd = json_decode($json2);
		$value_vnd = $value_vnd->quotes->USDVND;
		
		$value_pura_vnd = $value_pura*$value_vnd;
		
		// one pura -> vnd
		$value_pura_vnd = $value_pura*$value_vnd;
				
					
        $total = 0;
        foreach ($this->_products as $key => $proInfo) {
            $total += $this->getTotalPriceForProduct($key, false);
        }
		$priceP = $total*2/100;
		$total1 = $total- $priceP;
		
		$count_point = round($total1/$value_pura_vnd,2);
      
        return $count_point;
    }

    /**
     * return attributes
     * @param type $key
     * @return type
     */
    public function getAttributesByKey($key = '') {
        $cartInfo = $this->getInfoByKey($key);
        $attributes = isset($cartInfo[ClaShoppingCart::MORE_INFO]['attributes']) ? $cartInfo[ClaShoppingCart::MORE_INFO]['attributes'] : array();
        return $attributes;
    }

    /**
     * 
     * @param type $attribute
     */
    public function getAttributeText($attribute = array()) {
        $text = isset($attribute['value']) ? $attribute['value'] : '';
        if (isset($attribute['ext']) && $attribute['ext']) {
            switch ($attribute['type_option']) {
                case ProductAttribute::TYPE_OPTION_IMAGE: $text = '<img class="attr-image" src="' . $attribute['ext'] . '" title="' . $text . '" />';
                    break;
                case ProductAttribute::TYPE_OPTION_COLOR: $text = '<span class="attr-color" style="background-color:' . $attribute['ext'] . ';" title="' . $text . '"></span>';
                    break;
            }
        }

        return $text;
    }

}
