<?php
    $menu = array();

    $i=0;
    $menu[$i++] = array("title" => "About",             "url" => "?page_id=23");
    $menu[$i++] = array("title" => "On Tour",           "url" => "?page_id=5");
    $menu[$i++] = array("title" => "Videos",            "url" => "?page_id=6");
    $menu[$i++] = array("title" => "Pictures",          "url" => "?page_id=13");
    $menu[$i++] = array("title" => "Big Yellow Boot",   "url" => "?page_id=14");
    $menu[$i++] = array("title" => "News",              "url" => "?page_id=12");
    $menu[$i++] = array("title" => "Press",             "url" => "?page_id=7");
    $menu[$i++] = array("title" => "Contact",           "url" => "?page_id=14");
    $menu[$i++] = array("title" => "Store",             "url" => "http://store.splashnboots.com/merch");
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
    
    <li class="navExtraSpaceBottom">
        &nbsp;
    </li>
</ul>