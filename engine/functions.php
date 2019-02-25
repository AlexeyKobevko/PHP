<?php

require_once CONFIG_DIR . 'config.php';

function render($file, $variables = []) {
	if (!is_file($file)) {
		echo "Template file . $file . not found";
		exit();
	}
	if (filesize($file) === 0) {
		echo "Template file . $file . is empty";
		exit();
	}
	$templateContent = file_get_contents($file);
	
	if (empty($variables)) {
		return $templateContent;
	}
	
	foreach ($variables as $key => $value) {
		if(empty($value) || !is_string($value)) {
			continue;
		}
		
		$key = '{{' . strtoupper($key) . '}}';
		$templateContent = str_replace($key, $value, $templateContent);
	}
	return $templateContent;
}

function addMenu($array){
    $result = '<ul>';
    foreach ($array as $elem => $element) {
        if (isset($element['title'])) {
            $result .= "<li><a href=".$element['link'].">" . $element['title'] . "</a></li>";
        }
        if (!empty(isset($element['children']))) {
            addMenu($element['children']);
        }
    }
    return $result .= '</ul>';
}

function addImages() {
    $folderImg = 'img/';
    $arrayImg = scandir($folderImg);
    $result = '';
    foreach ($arrayImg as $img) {
        $info = new SplFileInfo($img);
        if ($info->getExtension() == 'jpeg' || $info->getExtension() == 'jpg') {
            $src = $folderImg . $img;
            $result .= "<a href=\"/$src\" target=\"_blank\">" . "<img class='small' src=\"/$src\" alt='funny dog'></a>";
        }
    }
    return $result;
}

//$result = '';
//////foreach ($img as $item) {
//////    $info = new SplFileInfo($item);
//////    if ($info->getExtension() == 'jpeg' || $info->getExtension() == 'jpg'){
//////        $result .= "<a href=\"$item\" target=\"_blank\">" . "<img src=\"$item\" width=\"200\"></a>";
//////    }
//////}
//////return $result;