<?php
namespace WY\Controller;
use \Medoo\medoo;
//控制器基类

class Controller {
	public $varables = [];
	protected  $db;
	
	function __construct(){
		$this->db = new medoo(wyconfig());
	}
	//渲染模板
	protected function display($viewPath){
		$viewPathArray = explode( '/',$viewPath);
		$viewName = $viewPathArray[0];
		$fullViewPath = VIEW_PATH.$viewName.'/'.$viewPathArray[1].VIEW_TEMPLATE_SUFFIX;
		include $fullViewPath;
	} 
	
	//注册变量
	protected function assign($name, $value){
		$this->varables[$name] = $value;
	}

	//读取变量
	public function val($name){
		return $this->varables[$name];
	}
}
?>