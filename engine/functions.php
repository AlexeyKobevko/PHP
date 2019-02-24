<?php

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

function addImages($img) {
    $result = '';
    foreach ($img as $item) {
        $info = new SplFileInfo($item);
        if ($info->getExtension() == 'jpeg' || $info->getExtension() == 'jpg'){
            $result .= "<img src=\"$item\" width=\"200\">";
        }
    }
    return $result;
}