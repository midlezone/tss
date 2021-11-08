<?php

require __DIR__ . '/phpmailer/class.phpmailer.php';
require __DIR__ . '/phpmailer/class.smtp.php';

//
class W3NPHPMailer extends CApplicationComponent {

    public $phpmailer = null;
    public $Host = '';
    public $Port = 25;
    public $Username = '';
    public $Password = '';
    public $SMTPSecure = '';
    public $From = '';
    public $FromName = 'levananh@oceanbeauty.vn';
    public $SMTPAuth = true;                  // enable SMTP authentication
    public $SMTPKeepAlive = true;                  // Keep connect to smtp
    public $isConnected = false;
    public $CharSet = 'utf-8';
    public $reply = '';
    public $addQueue = false;                // Nếu mặc định là sẽ gửi luôn ko thì thêm vào queue để gửi sau

    //Khởi tạo đối tượng phpmailer

    function __construct() {
        $this->phpmailer = new PHPMailer();
        if (isset(Yii::app()->siteinfo['domain_default']))
            $this->FromName = Yii::app()->siteinfo['domain_default'];
    }

    public function init() {
        parent::init();
        $this->connect();		
        return $this;
    }

    //Kết nối đến smtp;
    public function connect() {
        if (!$this->isConnected) {	
			
            $this->phpmailer->IsSMTP();                      // send via SMTP
            $this->phpmailer->IsHTML(true);                  // send as HTML
            //$this->phpmailer->SingleTo=true;
            $this->phpmailer->XMailer = 'W3N';
            $this->phpmailer->Host = $this->Host;
            $this->phpmailer->Port = $this->Port;
            $this->phpmailer->Username = $this->Username;
            $this->phpmailer->Password = $this->Password;
            $this->phpmailer->From = $this->From;
            $this->phpmailer->FromName = $this->FromName;
            $this->phpmailer->SMTPSecure = $this->SMTPSecure;
            $this->phpmailer->SMTPAuth = $this->SMTPAuth;
            $this->phpmailer->SMTPKeepAlive = $this->SMTPKeepAlive;
            $this->phpmailer->CharSet = $this->CharSet;
            //$this->phpmailer->AltBody    = "LoveOffice Team: To view the message, please use an HTML compatible email viewer";
        }
    }

    // cấu hình tên gửi đi của mail
    public function setFromName($fromname = "") {
        if ($fromname) {
            $this->FromName = $fromname;
            $this->phpmailer->FromName = $fromname;
            return true;
        }
        return false;
    }

    // Cấu hình plain/text
    public function setPlainText($text = '') {
        $this->phpmailer->AltBody = $text;
    }

    //
    public function send($from = '', $to = '', $subject = '', $body = '') {

        if ($from == '' || !$from)
            $from = $this->From;
        if ($to == '' || $subject == '' || $body == '')
            return false;

        if (!$this->addQueue) {
            if ($this->phpmailer->AltBody == '') {
                $this->phpmailer->AltBody = trim(strip_tags($body));
            }

            $this->phpmailer->ClearAllRecipients();
            $this->phpmailer->ClearAddresses();
            $this->phpmailer->ClearReplyTos();
            $this->phpmailer->AddAddress($to, "");
            if ($from != '')
                $this->phpmailer->AddReplyTo($from, "");
            $this->phpmailer->Subject = $subject;
            $this->phpmailer->Body = $body;
            $this->phpmailer->MsgHTML($body);
          

            if ($this->phpmailer->Send()) {

//                $userid = Yii::app()->user->id;
//                $filePath = Yii::getPathOfAlias("webroot") . "/log/mail/sendmail-" . date("d-m-Y") . ".csv";
//                $line = $from . " , $to , $subject , $userid, " . date("d-m-Y H:i:s") . "\n";
//                $fp = fopen($filePath, 'a');
//                fputs($fp, $line, strlen($line));
//                fclose($fp);
                return true;
            } else { // Nếu không gửi được thì dùng mail local gửi
//                $headers = "From: " . $this->FromName . " <" . $this->From . ">";
//                if (mail($to, $subject, $body, $headers))
//                    return true;
                echo "Mailer Error: " . $this->phpmailer->ErrorInfo;
                $this->phpmailer->IsMail();
                $this->phpmailer->Send();
                return true;
            }
            $this->phpmailer->AltBody = '';
            return false;
        } else {
            return $this->addQueue(array(
                        "from" => $from,
                        "to" => $to,
                        "subject" => $subject,
                        "body" => $body,
                        "fromname" => $this->FromName,
            ));
        }
    }

    // Thêm mail vào queue để gửi dần
    public function addQueue($data = array()) {
        if (!$data)
            return false;
        $data = json_encode($data);
        $redis = Yii::app()->redis->getConnection();
        if ($redis->rpush("sendmail", $data))
            return true;
        return false;
    }

    // Lấy mail trong queue
    public function getMailInQueue($limit = -1) {
        $offset = 0;
        $redis = Yii::app()->redis->getConnection();
        $results = array();
        $count = 0;
        if ($limit == -1)
            $count = $redis->llen("sendmail");
        else {
            $count = $limit;
        }
        for ($i = $offset; $i < $limit; $i++) {
            $data = $redis->lpop("sendmail");
            if (!$data)
                break;
            $results[] = $data;
        }
        return $results;
    }

}
