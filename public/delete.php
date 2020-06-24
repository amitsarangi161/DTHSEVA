<?php
define('BANNER_PATH', dirname(__FILE__) . '/banners/');

$i = isset($_GET['i']) ? $_GET['i'] : null;

if ( empty($i) || !is_numeric($i) ) {
    header("Location: /add-banners");
    exit;
}

$path = BANNER_PATH . "banner_" . $i . ".jpg";

if ( !file_exists($path) ) {
    header("Location: /add-banners");
    exit;
} else {
    unlink($path);
    header("Location: /add-banners?deleted=1");
}