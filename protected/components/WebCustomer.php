<?php

class WebCustomer extends CWebUser {

    function getShoppingCart() {
        if (is_null($this->getState('shoppingCart'))) {
            $shoppingCart = new ClaShoppingCart;
            $this->setShoppingCart($shoppingCart);
        } else
            $shoppingCart = $this->getState('shoppingCart');
        //
        return $shoppingCart;
    }

    function deleteShoppingCart() {
        $this->setShoppingCart(null);
    }

    /**
     * set shopping cart
     * @param type $shoppingcart
     */
    function setShoppingCart($shoppingcart = null) {
        $this->setState('shoppingCart', $shoppingcart);
    }
    //
    // get product compare
    function getProductCompare() {
        if (is_null($this->getState('productCompare'))) {
            $productCompare = new ClaProductCompare();
            $this->setProductCompare($productCompare);
        } else
            $productCompare = $this->getState('productCompare');
        //
        return $productCompare;
    }

    function deleteProductCompare() {
        $this->setProductCompare(null);
    }

    /**
     * set shopping cart
     * @param type $shoppingcart
     */
    function setProductCompare($productCompare = null) {
        $this->setState('productCompare', $productCompare);
    }

}
