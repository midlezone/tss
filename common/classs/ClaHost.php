<?php

/**
 * @author minhbn <minhcoltech@gmail.com>
 * get link host, host info
 */
class ClaHost{
    /**
     * Get host upload for images and files
     */
    static function getUploadHost(){
        return 'http://levananh.com/mediacenter';
    }
    /**
     * get host view images
     */
    static function getImageHost(){
        $servername = ClaSite::getServerName();
        return 'http://'.$servername.'/mediacenter';
    }
	/**
     * tro ve duong dan tuong doi cua media
     */
    static function getMediaBasePath() {
        return '/mediacenter';
    }
}

