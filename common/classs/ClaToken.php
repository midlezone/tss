<?php

/**
 * Token class file.
 * @author minhbn <minhcoltech@gmail.com>
 * ##################
 * Chuc nang : tao va quan ly token
 * Token duoc luu trong csdl va cho phep luu kem gia tri
 * ------------------------------------------------
 * Thanh phan chinh cua token
 * + token : ma xac thuc va dinh danh token, no la mot chuoi 64 ky tu duoc tao mot cach ngau nhien chi gom chu va so
 * + token_key : mot key unique dung de phan biet va nhan dang cac token, token key la duy nhat, khi mot token duoc tao co token_key da ton tai thi token cu se bi xoa
 * + data : mot truong luu lai cac gia tri muon luu cung voi token , gia tri nay co the la mang hay doi tuong mien la co the su dung voi ham serialize cua PHP
 * + expire : thoi diem het han cua token tinh bang giay, moi thao tac cua lop nay neu phat hien token da het han token se tu dong bi xoa
 * + crete_on : thoi diem tao token, gia tri nay khong co y nghia voi token, no chi co tac dung giup quan ly thong ke cac ban ghi cua bang token trong csdl
 */
class ClaToken {

    /**
     * @var bang csdl luu token
     */
    private static $db = 'tokens';
    protected static $expire = 604800; // 1 tuần
    protected static $keyMinLength = 4;

    /**
     * Dang ky mot token moi
     * @param $key moi modul/action se phai tao cho moi nguoi dung mot key duy nhat theo cau truc phia duoi,
     * key nay se dung de xac dinh token da ton tai chua, neu da ton tai mot key nhu vay token cu se bi xoa (key co do dai lon hon 3 kt)
     * @example vd : trong action add user trong module company nen dat $key = company_company_adduser_nguoidung@gmail.com 
     * @param $arr la mot mang(recommend) luu cac gia tri muon luu cung token hoac mot doi tuong ... thoa man ham serialize, luu vao mang kieu gi thi khi lay ra se la kieu do
     * @param $expire la thoi gian ton tai cua token ke tu luc tao (tinh bang giay, gia tri mac dinh neu khong kha bao la mot tuan)
     * @return tra ve mot token 64 ky tu neu khong co loi, tra ve false neu co loi say ra
     */
    public static function register($key, array $arr = null, $expire = null) {
        $key = trim($key);
        if (strlen($key) < self::$keyMinLength)
            return false;  // key quá ngắn là ko hợp lệ
        if (!self::clear_token($key))
            return false;
        if ($expire == null)
            $expire = self::$expire; // 1 tuần
        else
            $expire = intval($expire);
        $data = serialize($arr);
        //$token = md5($key . $data . time()) . md5('Web3Nhat' . time());
        $prefix = md5($key . $data . time());
        $token = ClaGenerate::getUniqueCode(array('prefix' => $prefix));
        try {
            $query = Yii::app()->db->createCommand()->insert(self::$db, array(
                'token' => $token,
                'token_key' => $key,
                'data' => $data,
                'expire' => time() + $expire,
                'created_time' => time()
            ));
            if ($query) {
                return $token;
            }
        } catch (Exception $e) {
            return false;
        }
        return false;
    }

    /**
     * Kiem tra tinh hop le cua mot token
     * @var $token kieu string, la token can kiem tra
     * @var $option = true token se tu dong bi xoa sau khi kiem tra, bang gia tri khac token van ton tai
     * @return tra ve true neu token hop le, tra ve false neu token khong hop le
     * (token hop le duoc hieu la con ton tai, dung key va chua het han)
     */
    public static function check($token, $option = true) {
        if (!self::validate_token($token))
            return false;
        $query = Yii::app()->db->createCommand()
                ->select('token,expire')
                ->from(self::$db)
                ->where('token =:key', array(':key' => $token))
                ->queryRow();
        if (!$query)
            return false;
        if ($option === true) {
            Yii::app()->db->createCommand()
                    ->delete(self::$db, 'token=:token', array(':token' => $token));
        } elseif (intval($query['expire']) < time())
            return false;
        return true;
    }

    /**
     * Kiem tra mot token_key da ton tai chua
     * @var $key kieu string, la key can kiem tra
     * @var $option = true token se tu dong bi xoa sau khi kiem tra, bang gia tri khac token van ton tai
     * @return tra ve true neu tim thay token, tra ve false neu ko tim thay
     * (token hop le duoc hieu la con ton tai, dung key va chua het han)
     */
    public static function check_key($key, $option = null) {
        if (trim($key) == '')
            return false;
        $query = Yii::app()->db->createCommand()
                ->select('id,expire')
                ->from(self::$db)
                ->where('token_key =:key', array(':key' => $key))
                ->queryRow();
        if (!$query)
            return false;
        if ($option === true) {
            Yii::app()->db->createCommand()->delete(self::$db, 'token_key=:key', array(':key' => $key));
        } elseif (intval($query['expire']) < time())
            return false;
        return true;
    }

    /**
     * Lay ra mot token va gia tri da duoc luu cung token do
     * @var $token kieu string, la token can lay
     * @var $option = true token se bi xoa sau khi thuc hien thao tac, bang gia tri khac token van ton tai
     * @return tra ve mang du lieu da duoc luu voi token key do, truong hop key khong hop le tra ve false
     * (chu y de check token hop le khong bang ham nay phai check !== false tranh truong hop data null)
     */
    public static function get($token, $option = true) {
        if (!self::validate_token($token))
            return false;
        $query = Yii::app()->db->createCommand()
                ->select('token,token_key,data,expire')
                ->from(self::$db)
                ->where('token =:key', array(':key' => $token))
                ->queryRow();
        if (!$query)
            return false;
        if ($option === true) {
            Yii::app()->db->createCommand()
                    ->delete(self::$db, 'token=:token', array(':token' => $token));
        }
        if (intval($query['expire']) < time())
            return false;
        $rs = unserialize($query['data']);
        return $rs;
    }

    /**
     * Xoa nhanh mot key
     * @var $token token can xoa
     * @return tra ve true neu thao tac xoa thanh cong, false neu thao tac xoa khong thanh cong
     * (ham nay cung co duoc dung thay ham check neu chi muon kiem tra nhanh nhung token chi dung mot lan ma khong quan tam toi hieu luc cua token)
     */
    public static function delete($token) {
        if (!self::validate_token($token))
            return false;
        try {
            $query = Yii::app()->db->createCommand()->delete(self::$db, 'token=:token', array(':token' => $token));
            if ($query) {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
        return false;
    }

    /**
     * Xoa token co token_key tuong ung
     * */
    private static function clear_token($key) { // xoa token co key tuong ung
        if (trim($key) == '')
            return true;
        try {
            $query = Yii::app()->db->createCommand()->delete(self::$db, 'token_key=:key', array(':key' => $key));
            if ($query) {
                return true;
            }
        } catch (Exception $e) {
            //echo $e;
            return false;
        }
        return true;
    }

    /**
     * Kiem tra dinh dang token xem co hop le khong
     * */
    private static function validate_token($str) {
        if (trim($str) == '')
            return false;
        $vtr = preg_replace('/[^a-zA-Z0-9]+/i', '', $str);
        if (strlen($str) == strlen($vtr))
            return true;
        return false;
    }

}
