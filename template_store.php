<?php
/*
Template Name: Template - Store
*/

//redirect('http://splashnboots.bandcamp.com', 'refresh');
//define('WEB_ROOT', '/');
function redirect($location) 
{
    header('Location: ' . $location);
    die();
}
redirect('http://store.splashnboots.com/');
?>