<?php

class UAssetManager extends CAssetManager {

    public function publish($path, $hashByName = false, $level = -1, $forceCopy = null) {
        return parent::publish($path, $hashByName, $level, $forceCopy);
    }
    
    protected function hash($path) {
        return sprintf('%x',crc32($path.VERSION));
    }

}