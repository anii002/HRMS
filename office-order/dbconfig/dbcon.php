<?php

 //core
function dbcon(){
	$user = "drmpsurh_test";
	$pass = "root@123";
	$host = "localhost";
	$db = "drmpsurh_srnew";
	@mysql_connect($host,$user,$pass);
	mysql_select_db($db);
}


 function dbcon1(){
	$user1 = "drmpsurh_test";
	$pass1 = "root@123";
	$host1 = "localhost";
	$db1 = "drmpsurh_sr";
	@mysql_connect($host1,$user1,$pass1);
	mysql_select_db($db1);
}
define('SALT1', '24859f@#$#@$');
define('SALT2', '^&@#_-=+Afda$#%');
function hashPassword($pPassword, $pSalt1="2345#$%@3e", $pSalt2="taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
?>