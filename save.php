<?php
define('SYY', 1);
require 'config.php';
require 'include/db.class.php';
$message =array();
$message['name'] = $_POST['username'];
$message['mail'] = $_POST['mail'];
$message['url']  = $_POST['url'];
$message['umsg'] = $_POST['message'];
$message['uua']  = getUA();
$message['uip']   = getIP();
$message['utime'] = time();

$sql = "INSERT INTO `messages` (`uid`,`uname`,`umail`,`uurl`,`umsg`,`uua`,`uip`,`utime`)
		VALUES 
							   (NULL,'{$message['name']}','{$message['mail']}','{$message['url']}','{$message['umsg']}','{$message['uua']}','{$message['uip']}','{$message['utime']}')
		";
if ($con->query($sql) === TRUE) {
    echo "<script>alert('留言成功！');self.location=document.referrer;</script>";
} else {
    echo "Error: ". $con->error;
}

