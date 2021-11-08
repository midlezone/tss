<?php

class ClaProductCompare {

    private $_products = array();
    private $limit = 10;

    /**
     * add protuct to shopping cart
     * @param type $productId
     * @param type $options
     */
    public function add($productId, $options = array()) {
        if ($this->countProducts() >= $this->getLimit())
            return false;
        $productName = isset($options['name']) ? $options['name'] : '';
        $this->_products[$productId]['name'] = $productName;
        $this->_products[$productId]['id'] = $productId;
        return true;
    }

    /**
     * update protuct in shopping cart
     * @param type $productId
     * @param type $options
     */
    public function update($productId, $options = array()) {
        //
        if (!isset($this->_products[$productId]))
            return $this->add($productId, $options);
        $productName = isset($options['name']) ? $options['name'] : '';
        $this->_products[$productId]['name'] = $productName;
        $this->_products[$productId]['id'] = $productId;
        return true;
    }

    /**
     * remove product out of list
     * @param type $productId
     */
    public function remove($productId) {
        if (isset($this->_products[$productId]))
            unset($this->_products[$productId]);
    }

    /**
     * return product limit
     * @return type
     */
    public function getLimit() {
        return $this->limit;
    }

    /**
     * return products in list
     * @return type
     */
    public function getProducts() {
        return $this->_products;
    }

    /**
     * 
     * @param type $productId
     * @return null
     */
    public function getQuery() {
        $query = implode(',', array_keys($this->getProducts()));
        return $query;
    }

    /**
     * trả về số sản phẩm
     * @return type
     */
    public function countProducts() {
        $total = count($this->_products);
        return $total;
    }

}
