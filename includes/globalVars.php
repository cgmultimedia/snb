<?php
// NOTE: This must be placed INSIDE the template file, not the header file.
// E.g. inside template_videos.php

//$curURL = $_SERVER['REQUEST_URI'];
$curURLA     = explode('?',$_SERVER['REQUEST_URI'],2);
$curURL      = $curURLA[0];
//$rootDir     = $curURL."..";
//$templateDir = get_template_directory_uri();
//$rootDir     = "http://10.0.1.4:8888/web%20dev/5-splashnboots/2015/2015-02-10%20new%20site/splashnboots";
//$templateDir = "http://10.0.1.4:8888/web%20dev/5-splashnboots/2015/2015-02-10%20new%20site/splashnboots/wp-content/themes/splashnboots";
$rootDir     = site_url();
$templateDir = get_stylesheet_directory_uri();
// $foundPos   = strpos($templateDir, "/wp-content");
// $templateDir = ".".substr($foundPos);

// $templateDir = "http://10.0.1.4:8888/web%20dev/5-splashnboots/2015/2015-02-10%20new%20site/splashnboots";
