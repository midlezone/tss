<?php

/**
 * Description of ArrayDataProvider
 *
 * @author minhbn
 */
class ArrayDataProvider extends CArrayDataProvider {

    /**
     * Fetches the data from the persistent data storage.
     * @return array list of data items
     */
    protected function fetchData() {
        if (($sort = $this->getSort()) !== false && ($order = $sort->getOrderBy()) != '')
            $this->sortData($this->getSortDirections($order));

        if (($pagination = $this->getPagination()) !== false) {
            $pagination->setItemCount($this->getTotalItemCount());
        }
        //
        return $this->rawData;
    }

}
