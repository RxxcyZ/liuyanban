<?php 
//checkdef();

$con = new mysqli($hostname,$username,$password,$dbname);
if ($con->connect_error) {
	die('数据库连接失败：'.$con->connect_error);
}

//
class DBadd {

}

class DBlis {

}

class DBdel {

}
