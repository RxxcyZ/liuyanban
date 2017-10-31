<?php 
//check SYY
/*function checkdef() {
	if ( !defined('SYY') ) {
		exit('警告：非法调用！');
	}
	return true;
}*/

//浏览器UA 不会正则暂时只能这样写了
function getUA() {
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$sua = substr($ua,13,15).','.substr($ua,33,2).'位';
	return $sua;
}

//获取真实IP
function getIP() { 
	if (getenv('HTTP_CLIENT_IP')) { 
	$ip = getenv('HTTP_CLIENT_IP'); 
	} 
	elseif (getenv('HTTP_X_FORWARDED_FOR')) { 
	$ip = getenv('HTTP_X_FORWARDED_FOR'); 
	} 
	elseif (getenv('HTTP_X_FORWARDED')) { 
	$ip = getenv('HTTP_X_FORWARDED'); 
	} 
	elseif (getenv('HTTP_FORWARDED_FOR')) { 
	$ip = getenv('HTTP_FORWARDED_FOR'); 

	} 
	elseif (getenv('HTTP_FORWARDED')) { 
	$ip = getenv('HTTP_FORWARDED'); 
	} 
	else { 
	$ip = $_SERVER['REMOTE_ADDR']; 
	} 
	return $ip; 
}