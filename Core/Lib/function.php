<?php
//本文件保存一些助手函数
defined("BASE_PATH") or exit('Access Denied');


//获取配置
function wyconfig(){
	return  $GLOBALS['dbConfig'];
}

//判断是否为post提交
function isPost(){
    return $_SERVER['REQUEST_METHOD']=="POST";
}


//判断是否为post提交
function isGet(){
    return $_SERVER['REQUEST_METHOD']=="GET";
}

//判断是否为post提交
function isAjax(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        return true;
    }else{
        return false;
    }
}

////////////////////////////////////////////////////////////
//获取请求参数 ,
function param($key){
    $method = $_REQUEST;
    if(strpos('post', $key) === 0){
        $method = $_POST;
    }
    if(strpos('get', $key) === 0){
        $method = $_GET;
    }
    if(strpos($key, '.') !== false){
        $key = explode('.', $key)[1];
    }
    $truKey = isset($method[$key])? $method[$key] : null;
    return _clean_input_keys($truKey);    //此处应添加自动过滤
}


/**
  * 防止sql注入
  */
  function _clean_input_keys($name)
  {
    if($name === null) return null;
      
   if (!get_magic_quotes_gpc()) // 判断magic_quotes_gpc是否为打开    
   {    
      $post = addslashes($name); // magic_quotes_gpc没有打开的时候把数据过滤    
   }    

   $name = str_replace("_", "\_", $name); // 把 '_'过滤掉  

   $name = str_replace("%", "\%", $name); // 把' % '过滤掉    

   $name = nl2br($name); // 回车转换    

   $name= htmlspecialchars($name); // html标记转换   

   return $name;
    
  }
/////////////////////////////////////////////////////////

