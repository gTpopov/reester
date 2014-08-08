<?php

// For localhost
define('HOST_NAME','localhost');
define('DB_NAME','reester_db');
define('DB_USER','root');
define('DB_PASS','');

// For remote host
//define('HOST_NAME','reester.mysql');
//define('DB_NAME','reester_db');
//define('DB_USER','reester_mysql');
//define('DB_PASS','ycfzdtbu');

$driver = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

# MySQL с PDO_MYSQL
$DBH = new PDO('mysql:host='.HOST_NAME.';dbname='.DB_NAME.'', DB_USER, DB_PASS, $driver );

?>