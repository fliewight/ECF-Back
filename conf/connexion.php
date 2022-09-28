<?php
try {
	$db = new PDO('mysql: host=localhost; dbname=ecf-back','root','');
}
catch(Exception $e) {
	echo $e->getMessage();
	exit;
}
$db->exec('SET NAMES utf8');
?>