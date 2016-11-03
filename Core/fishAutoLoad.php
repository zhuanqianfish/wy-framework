<?php
//加载文件夹下所有类库
defined("BASE_PATH") or exit('Access Denied');

//仅获取文件列表
function getFileList($directory){
	$files = array();        
	try {        
		$dir = new \DirectoryIterator($directory);        
	} catch (Exception $e) {        
		throw new Exception($directory . ' is not readable');        
	}        
	foreach($dir as $file) {        
		if($file->isDot()) continue;        
		if($file->isDir()) continue;
		if($file->getBasename() == 'fishAutoLoad.php')  continue;      
		$files[] = $file->getFileName();
	}        
	return $files; 
}

//自动加载类库
function fishAudoLoad($baseDir){
	$fileArray = getFileList($baseDir);
	foreach($fileArray as $file){
		require $baseDir.$file;
	}
}
fishAudoLoad(LIB_PATH);
fishAudoLoad(CORE_PATH);
?>