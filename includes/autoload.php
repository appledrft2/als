<?php 
if($_SERVER['HTTP_HOST'] == 'localhost'){
	$geturl = 'http://'.$_SERVER['HTTP_HOST'].'/als/';
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'als';
}else{
	$geturl = 'https://'.$_SERVER['HTTP_HOST'].'/';
	$host = 'us-cdbr-east-03.cleardb.com';
	$user = 'bbd0d82f9a2f79';
	$pass = '9bd38ed5';
	$db = 'heroku_5d73865cd870e80';
}
$baseurl = $geturl;
$connection = new mysqli($host,$user,$pass,$db);

?>