<?php
namespace TPH\Controller;
//控制器基类

class Controller {
	//渲染模板
	protected function display($viewPath){
		$viewPathArray = explode( '/',$viewPath);
		$viewName = $viewPathArray[0];
		$fullViewPath = VIEW_PATH.$viewName.'/'.$viewPathArray[1].VIEW_TEMPLATE_SUFFIX;
		include $fullViewPath;
	} 
	
	//注册变量
	protected function assign(){
		
	}
	
}
?>