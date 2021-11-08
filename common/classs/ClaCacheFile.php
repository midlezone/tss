<?php

class ClaCacheFile {

    protected $basepath = '';

    public function __construct() {
        $this->basepath = Yii::getPathOfAlias('common.cache');
    }

    function init() {
        $this->basepath = Yii::getPathOfAlias('common.cache');
    }

    /**
     *  get base path
     * @return type
     */
    protected function getBasePath() {
        if (!$this->basepath)
            $this->basepath = Yii::getPathOfAlias('common.cache');
        return $this->basepath;
    }

    /**
     * Stores a value identified by a file if the file does not exist.
     * @param type $filename
     * @param type $value
     * @return boolean
     */
    function add($filename = '', $value = null) {
        if ($value === NULL)
            return false;
        if ($this->checkFileExist($filename))
            return true;
        return $this->set($filename, $value);
    }

    /**
     * Stores a value identified by a file.
     * @param type $filename
     * @param type $value
     */
    function set($filename = '', $value = null) {
        if ($value === NULL)
            return false;
        return $this->writeFile($filename, $value);
    }

    /**
     * get value from cache
     */
    function get($filename = '') {
        if (!$filename)
            return false;
        return $this->getData($filename);
    }

    /**
     * delete cache
     */
    function delete($filename = '') {
        $file = $this->getFilePath($filename);
        return @unlink($file);
    }

    /**
     * write file
     */
    protected function writeFile($filename = '', $data = null) {
        if (!$filename)
            return false;
        $str = "<?php return array('value'=> '" . str_replace("'", "\'", $this->parseData($data)) . "', 'mode'=>" . (is_array($data) ? 'true' : 'false') . ');';
        $file = $this->getFilePath($filename);
        if (file_put_contents($file, $str)) {
            @chmod($file, 0777);
            return true;
        }
        return false;
    }

    /**
     * get data
     * @param type $filename
     * @return boolean
     */
    protected function getData($filename = '') {
        if (!$this->checkFileExist($filename))
            return false;
        $file = $this->getFilePath($filename);
        $value = require $file;
        if ($value && isset($value['mode']))
            return json_decode($value['value'], $value['mode']);
        return false;
    }

    /**
     * parse data
     * @param type $data
     * @return string
     */
    protected function parseData($data = null) {
        if (!$data)
            return '';
        return json_encode($data);
    }

    /**
     * using recursion
     * @param type $data
     * @return string
     */
    function parseData2($data = null) {
        if (!$data)
            return '';
        if (!is_array($data))
            return $data;
        $return = 'array(';
        $count = 0;
        $countdata = count($data);
        foreach ($data as $key => $value) {
            $count++;
            $return .= $key . "=>" . $this->parseData($value) . (($count != $countdata) ? "," : "");
        }
        $return.=')';

        return $return;
    }

    /**
     * check file exist
     */
    function checkFileExist($filename = '') {
        if (!$filename)
            return false;
        $file = $this->getFilePath($filename);
        return is_file($file);
    }

    /**
     * static new class
     */
    static function newClass() {
        return new ClaCacheFile();
    }

    function getFilePath($filename = '') {
        $basepath = $this->getBasePath();
        $file = $basepath . DIRECTORY_SEPARATOR . $filename . '.php';
        return $file;
    }

}
