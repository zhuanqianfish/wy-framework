<?php
//加载文件夹下所有类库
defined("BASE_PATH") or exit('Access Denied');

//仅获取文件列表
function getFileList($directory){
	$files = [];        
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
	$ignoreFileList = ['index.html','index.htm'];	//忽略加载文件列表
	$fileArray = getFileList($baseDir);
	foreach($fileArray as $file){
		if(!array_search($file, $ignoreFileList)){
			require $baseDir.$file;
		}
	}
}


fishAudoLoad(LIB_PATH);
fishAudoLoad(CORE_PATH);
?>