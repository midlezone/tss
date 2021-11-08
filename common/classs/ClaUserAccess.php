<?php

/**
 * Thông kê số người truy cập và online
 *
 * @author minhbn
 */
class ClaUserAccess {

    //
    public $directory_separator; // separator
    protected $basePathAlias = 'webroot.data.useraccess';
    protected $basePath; // đường dẫn tới folder lưu
    protected $site_id; // site id
    protected $folderPath; // path of folder, that is contain file
    protected $sessionName = ''; // session name
    protected $sessionTimeLimit = 0; // Session time limit
    protected $totalAccessName = 'totalAccess';
    protected $fileAccessName = 'access'; // Name of file that it is store data
    protected $fileTotalName = 'total';
    protected $session_id; // Session ID
    protected $totalAccess; // Lưu dữ liệu của tổng truy cập
    protected $limit = 100000; // Lưu trữ tối đa 100,000 session trong 1 file

    //
    public function __construct() {
        //
        $this->session_id = $this->getSessionID();
        //
        $this->basePath = Yii::getPathOfAlias($this->basePathAlias);
        //
        $this->site_id = Yii::app()->controller->site_id;
        //
        $this->sessionName = 'UserAccess_' . $this->site_id;
        $this->sessionTimeLimit = 10 * 60;
        //
        $this->directory_separator = DIRECTORY_SEPARATOR;
        //
        if (!$this->rmkdir($this->basePath))
            exit(0);
        if (!$this->rmkdir($this->basePath . $this->directory_separator . $this->site_id))
            exit(0);
        $this->folderPath = $this->basePath . $this->directory_separator . $this->site_id;
        //
        $fileTotal = $this->getFileTotalAccess();
        $this->createFile($fileTotal);
        $total = $this->getData($fileTotal);
        if ($total) {
            $this->totalAccess = $total;
            if (!isset($total[$this->totalAccessName]))
                $this->totalAccess[$this->totalAccessName] = 0;
        }elseif ($total === false)
            $this->totalAccess[$this->totalAccessName] = false;
        else
            $this->totalAccess[$this->totalAccessName] = 0;
        //
    }

    /**
     * Kiểm tra xem folder đã tồn tại hay chưa, nếu chưa thì tạo folder
     * @param type $path
     * @param type $mode
     * @return type
     */
    public function rmkdir($path, $mode = 0777) {
        return is_dir($path) || ( $this->rmkdir(dirname($path), $mode) && $this->mkdir($path, $mode) );
    }

    /**
     * @minhbn <minhcoltech@grmail.com>
     * Creates directory
     *
     * @access private
     * @param  string  $path Path to create
     * @param  integer $mode Optional permissions
     * @return boolean Success
     */
    public function mkdir($path, $mode = 0777) {
        $old = umask(0);
        $res = @mkdir($path, $mode);
        umask($old);
        return $res;
    }

    ///////////////////////
    function checkAccess() {
        if ($this->session_id) {
            //
            $sid = $this->session_id;
            $user_id = (!Yii::app()->user->isGuest) ? Yii::app()->user->id : 0;
            //
            $file = $this->getFileAccess();
            $this->createFile($file);
            //
            $data = $this->getData($file);
            // Nếu file tồn tại nhưng không đọc được file thì dừng lại
            if ($data === false)
                return false;
            //
            if (!isset($data[$sid])) {
                if (!$data)
                    $data = array();
                $data[$sid]['lt'] = time(); // last time
                $data[$sid]['ft'] = time(); // first time
                $data[$sid]['u'] = $user_id; // Lưu lại người truy cập
                //
                $this->updateTotalAcess();
                //
                $this->writeFile($file, $data);
                Yii::app()->session[$this->sessionName] = time();
            } else {
                $lasttime = $data[$sid]['lt'];
                // check online, if not online so update lasttime
                if (time() - ($lasttime + $this->sessionTimeLimit) > 0) {
                    $firsttime = $data[$sid]['ft'];
                    //cập nhật số lần truy cập
                    if (time() - ($firsttime + $this->sessionTimeLimit * 6 / 2)) {
                        $this->updateTotalAcess();
                        $data[$sid]['ft'] = time();
                    }
                    //
                    $data[$sid]['lt'] = time();
                    $data[$sid]['u'] = $user_id; // Lưu lại người truy cập
                    $this->writeFile($file, $data);
                    Yii::app()->session[$this->sessionName] = time();
                }
            }
            return true;
        } else {
            echo "Haven't session";
        }
    }

    /**
     * Thống kê số lượt truy cập
     */
    function statistic($checkonline = true) {
        $results = array();
        //
        $results['totalAccess'] = (int) $this->totalAccess[$this->totalAccessName];
        //
        $file = $this->getFileAccess();
        //
        $data = $this->getData($file);
        if ($data) {
            if ($checkonline) {
                $results['online'] = 0;
                $results['today'] = 0;
                $results['member'] = array();
                $results['guest'] = 0;
                $startDate = strtotime(Date('d-m-Y 00:00:00'));
                $endDate = $startDate + 24 * 60 * 60 - 1;
                $present = time();
                foreach ($data as $val) {
                    if ($present - ($val['lt'] + $this->sessionTimeLimit) < 0) {
                        $results['online'] +=1;
                        if (isset($val['u']) && $val['u'])
                            array_push($results['member'], $val['u']);
                        else
                            $results['guest'] +=1;
                    }
                    if ($startDate < $val['lt'] && $val['lt'] < $endDate)
                        $results['today'] +=1;
                }
                //
            }
        }
        //
        return $results;
    }

    /**
     * cập nhật tổng truy cập
     * @param type $data
     */
    function updateTotalAcess() {
        if ($this->totalAccess[$this->totalAccessName] === false)
            return false;
        $this->totalAccess[$this->totalAccessName]+=1;
        return $this->writeFile($this->getFileTotalAccess(), $this->totalAccess);
    }

    /**
     * get data
     * @param type $filename
     * @return boolean
     */
    protected function getData($file = '') {
        $fileExist = $this->checkFileExist($file);
        if (!$fileExist)
            return 0;
        $value = require $file;
        if ($value && isset($value['mode']))
            return json_decode($value['value'], $value['mode']);
        // File exist but empty
        if ($fileExist)
            return 0;
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
     * create file
     * @param type $file
     */
    function createFile($file) {
        if (!$this->checkFileExist($file)) {
            $f = fopen($file, 'a');
            @chmod($file, 0777);
            fclose($f);
        }
        return true;
    }

    /**
     * write file
     */
    protected function writeFile($file = '', $data = null) {
        if (!$this->checkFileExist($file))
            return false;
        $str = "<?php return array('value'=> '" . str_replace("'", "\'", $this->parseData($data)) . "', 'mode'=>" . (is_array($data) ? 'true' : 'false') . ');';
        if (file_put_contents($file, $str)) {
            return true;
        }
        return false;
    }

    /**
     * check file exist
     */
    function checkFileExist($file = '') {
        return is_file($file);
    }

    /**
     * trả về file lữu trữ các lượt truy cập
     * @return type
     */
    function getFileAccess() {
        $fileOrder = (int) ceil($this->totalAccess[$this->totalAccessName] / $this->limit);
        $filealias = '';
        if ($fileOrder > 1)
            $filealias.=$fileOrder;
        return $this->getFilePath($this->fileAccessName . $filealias);
    }

    /**
     * Trả về file lưu trữ totalAccess
     * @return type
     */
    function getFileTotalAccess() {
        return $this->getFilePath($this->fileTotalName);
    }

    /**
     * Trả về đường dẫn tuyệt đối của file
     * @param type $filename
     * @return string
     */
    function getFilePath($filename = '') {
        if (!$filename)
            return false;
        $file = $this->folderPath . $this->directory_separator . $filename . '.php';
        return $file;
    }

    /**
     * trả về session id 
     */
    function getSessionID() {
        $session = Yii::app()->request->cookies['uc-session-id'];
        if ($session) {
            $session_id = $session->value;
        }
        if (!isset($session_id) || !$session_id) {
            $session_id = ClaGenerate::getUniqueCode();
            $this->setSessionID($session_id);
        }
        return $session_id;
    }

    /**
     * set session id
     * @param type $id
     */
    function setSessionID($id = '') {
        if ($id) {
            $cookie = new CHttpCookie('uc-session-id', $id);
            $cookie->expire = time() + (24 * 60 * 60); //
            Yii::app()->request->cookies['uc-session-id'] = $cookie;
            return true;
        }
        return false;
    }

}
