<?php

class ClaCache extends CMemCache {

    //Lấy dữ liệu trong CCache
    public function get($id) {
        if (isset(SiteGlobal::$cacheArr[$id])) {
            return SiteGlobal::$cacheArr[$id];
        }
        $value = parent::get($id);
        if ($value)
            SiteGlobal::setCacheArr($id, $value);
        return $value;
    }

    //Thêm dữ liệu
    public function add($id, $value, $expire = 0, $dependency = null) {
        if (isset(SiteGlobal::$cacheArr[$id])) {
            SiteGlobal::deleteCacheArr($id);
        }
        return parent::add($id, $value, $expire, $dependency);
    }

    //
    public function set($id, $value, $expire = 0, $dependency = null) {
        if (isset(SiteGlobal::$cacheArr[$id])) {
            SiteGlobal::deleteCacheArr($id);
        }
        return parent::set($id, $value, $expire, $dependency);
    }

    //Xóa dữ liệu trong CCache
    public function delete($id) {
        SiteGlobal::deleteCacheArr($id);
        return parent::delete($id);
    }

    //Lấy dữ liệu trong CMemCache
    protected function getValue($key) {
        if (isset(SiteGlobal::$cacheArr[$key])) {
            return SiteGlobal::$cacheArr[$key];
        }
        $value = parent::getValue($key);
        if ($value)
            SiteGlobal::setCacheArr($key, $value);
        return $value;
    }

    //Xóa dữ liệu trong CMemCache
    protected function deleteValue($key) {
        SiteGlobal::deleteCacheArr($key);
        return parent::deleteValue($key);
    }

}
