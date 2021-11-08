<?php 

// Kiểm tra sự tồn tại của tên miền

$kq= file_get_contents("http://www.whois.net.vn/whois.php?domain=webmoi.net") ;

if  ($kq==0)

{

echo "tên miền chưa được đăng ký";

}

elseif($kq==1)

{

Echo "tên miền đã được đăng ký";

// Lấy whois tên miền

echo file_get_contents( "http://www.whois.net.vn/whois.php?domain=tenmien.com&act=getwhois ");

}

?>