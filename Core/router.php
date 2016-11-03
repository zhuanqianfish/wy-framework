<?php

defined("BASE_PATH") or exit('Access Denied');
	
function getRouter(){
	$controller = empty($_GET['c']) ? 'Index' : $_GET['c'];
	$action = empty($_GET['a']) ? 'index' : $_GET['a'];
	
	$controllerPath = CONTROLLER_PATH.$controller.'Controller.php';
	
	include $controllerPath;
	//echo $controller;
	$controllerName = 'TPH\Controller\\'.$controller.'Controller';
	$controllerObj = new $controllerName();
	$controllerObj->$action();
}

function run(){
	getRouter();
}
?>