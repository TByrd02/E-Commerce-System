<?php 

error_reporting(~E_DEPRECATED & ~E_NOTICE);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'coffee');

$conn = new MySQLi(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if($conn->connect_errno){
    die("ERROR : -> ".$conn->connect_error);
}
?>