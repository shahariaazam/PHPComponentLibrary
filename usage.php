<?php
/**
 * Define few directory for fast test the usage
 */
define('ROOT',__DIR__);
define('SRC_DIR',ROOT.DIRECTORY_SEPARATOR."src");
define('MEDIA_CLASS',SRC_DIR.DIRECTORY_SEPARATOR."Multimedia".DIRECTORY_SEPARATOR."MediaUpload.php");

/**
 * Running test usage
 */
require MEDIA_CLASS;
$obj = new Multimedia\Image\Upload\ImageUpload();
var_dump($obj -> DirectoryPermission(ROOT));