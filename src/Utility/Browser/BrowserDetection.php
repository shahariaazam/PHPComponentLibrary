<?php
/**
 * @Author: Shaharia Azam
 * @Author URL: http://www.shahariaazam.com
 * @Project: Component Library
 * @Version: 1.0
 * @Project URL: http://www.shahariaazam.com
 * @Description: Browser Detection component
 */
require "Browscap.php";
class BrowserDetection
{
    public $browserName;
    public $browserVersion;

    /**
     * Constuctor of BrowserDetection Class
     * @param array $option
     */
    function __construct($option = array())
    {

    }
    public function test()
    {
        return $ini = parse_ini_file('browscap.ini',true);
    }
}

/**
 * Implementation
 */
$obj = new BrowserDetection();
$result = $obj->test();
$current_browser = new \Browscap\Browscap('browscap_ini');
$browser = $current_browser->getBrowser();
//var_dump($browser);
$new = (array) $browser;
//print_r($new);
foreach ($new as $key => $value){
   // print_r($new[$key]);
    echo $key." =". $new[$key];
    echo  "<br/>";
}
