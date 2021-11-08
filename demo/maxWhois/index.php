<?php 
require_once("maxWhois.class.php"); 
$whois = new maxWhois();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Max's Whois</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
    $whois->processWhois();
?>
</body>   