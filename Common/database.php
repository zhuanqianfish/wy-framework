<?php
return [
	// required
	'database_type' => 'mysql',
	'database_name' => 'dbname',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
 
	// [optional]
	'port' => 3306,
 
	// [optional] Table prefix
	'prefix' => 'ims_',
 
	// [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	]
];
?>