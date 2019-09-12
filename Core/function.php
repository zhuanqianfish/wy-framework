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

//获取分页文件
//pageNum: 每页记录数
//count:    总记录数
//tpl : 分页模板 暂不实现
function pageHtml($pageNum, $count, $tpl=''){
    if($tpl == ''){
        $tpl = '<ul class="pagination">';
    }
    $i = 1;
    $now = $i*$pageNum;
    $tempPageIndex = 1;
    if(isset($_GET['p'])){
        $tempPageIndex = $_GET['p'];
        unset($_GET['p']);
    }
    while($now < $count + $pageNum){
        $_GET['p'] = $i;
        $url = $_SERVER['PHP_SELF'].'?'.http_build_query($_GET);
        if($tempPageIndex == $i){
            $tpl .= "<li class=\"current\" ><span>{$i}</span></li>";
        }else{
            $tpl .= '<li><a href="'.$url.'">'.$i.'</a></li>';
        }
        $i++;
        $now = $i*$pageNum;
    }
    $tpl .= '</ul>';
    return $tpl;
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
  * Clean Keys - 来自CI框架的非法字符过滤方法  Input.php
  *
  * This is a helper function. To prevent malicious users
  * from trying to exploit keys we make sure that keys are
  * only named with alpha-numeric text and a few other items.
  *
  * @access private
  * @param string
  * @return string
  */
  function _clean_input_keys($str)
  {
    if ( ! preg_match("/^[a-z0-9:!_//-]+$/i", $str))
    {
        exit('Disallowed Key Characters.');
    }
 
    return $str;
  }
/////////////////////////////////////////////////////////

