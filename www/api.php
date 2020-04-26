<?php

include './vendor/autoload.php';

// DB Connection
$api = new PHP_CRUD_API(array(
 	'dbengine'=>'MySQL',
 	'hostname'=>'db',
 	'username'=>'user',
 	'password'=>'test',
	'database'=>'web_project',
	'charset'=>'utf8'
));
$api->executeCommand();