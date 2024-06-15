<?php

$viewsFolderName = "views";
$viewsPath =  "../" . $viewsFolderName . "/";

function redirect($url) {
    if(trim($url) != "/") {
        return "/" . env("DIRECTORY") . env("APP_NAME") . $url . "/";
    } else {
        return "/" . env("DIRECTORY") . env("APP_NAME") . $url;
    }
}

// Eğer CLI modunda çalıştırılıyorsa, REQUEST_URI'yi manuel olarak ayarlayın
if (php_sapi_name() == 'cli') {
    $requestUri = '/';
} else {
    $requestUri = $_SERVER['REQUEST_URI'];
    $requestUri = strtok($requestUri, '?');
}

function route($path, $file) {
    global $viewsPath;
    $nowURL = $GLOBALS['requestUri'];

    if (!empty(trim($nowURL))) {
        if (substr($nowURL, -1) !== '/') {
            $nowURL .= "/";
        }
    }

    if ($nowURL == $path) {
        if (file_exists($viewsPath . $file)) {
            include $viewsPath . $file;
            exit;
        } else {
            include $viewsPath . '404.php';
            exit;
        }
    }
}
