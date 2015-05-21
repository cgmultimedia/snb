<?php

$menu = array();

$i=0;
$menu[$i++] = array("title" => "About",      "url" => "?page_id=23");
$menu[$i++] = array("title" => "On Tour",    "url" => "?page_id=5");
$menu[$i++] = array("title" => "Videos",     "url" => "?page_id=6");
$menu[$i++] = array("title" => "Press",      "url" => "?page_id=7");
$menu[$i++] = array("title" => "Pictures",   "url" => "?page_id=13");
$menu[$i++] = array("title" => "News",       "url" => "?page_id=12");
$menu[$i++] = array("title" => "Contact",    "url" => "?page_id=14");
$menu[$i++] = array("title" => "Store",      "url" => "http://store.splashnboots.com/merch");


?>

<ul>
    <li class="navExtraSpaceTop">
        &nbsp;
    </li>
    <?php
        for($i=0; $i<count($menu); $i++) {
            $class = "menu_item";
            if($activePage == $menu[$i]["title"]) {
                $class = $class . " u-isActive";
            }
            echo "<li>";
            echo "<span><a href='".$menu[$i]["url"]."' class='".$class."' >".$menu[$i]["title"]."</a></span>";
            echo "</li>";
        }
    ?>
    <!-- <li>
        <span><a href="./?v=2" class="menu_item" id="menu_about">About</a></span>
    </li>
    <li>
        <span><a href="./?v=3" class="menu_item" id="menu_ontour">On Tour</a></span>
    </li>
    <li>
        <span><a href="./?page_id=6" class="menu_item" id="menu_videos">Videos</a></span>
    </li>
    <li>
        <span><a href="./" class="menu_item" id="menu_press">Press</a></span>
    </li>
    <li>
        <span><a href="./instagram.php" class="menu_item" id="menu_pictures">Pictures</a></span>
    </li>
    <li>
        <span><a href="./instagram.php?v=2" class="menu_item" id="menu_blog">News</a></span>
    </li>
    <li>
        <span><a href="./instagram.php?v=3" class="menu_item" id="menu_contact">Contact</a></span>
    </li>
    <li>
        <span><a href="./instagram.php?v=4" class="menu_item" id="menu_store">Store</a></span>
    </li> -->
    <li class="navExtraSpaceBottom">
        &nbsp;
    </li>
</ul>