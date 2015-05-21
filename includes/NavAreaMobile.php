<?php /*
<a href="#menu" id="menuLink" class="menu-link">
    <span></span>
</a>

<div class="NavAreaMobile-container-menu">
            <span class="NavAreaMobile-container-menu-word">MENU</span><span class="NavAreaMobile-container-menu-x"><span class="NavAreaMobile-container-menu-x-char">X</span></span>
        </div>
*/ ?>

<div id="NavAreaMobile" class="NavAreaMobile">
    <header id="NavAreaMobile-mobileBar" class="NavAreaMobile-mobileBar">
        <div class="NavAreaMobile-mobileBar-logo">
            <?php $logoStyle = "mobile"; include('SNBLogo.php'); ?>
        </div>
        <button id="burger" class="visible-xs visible-sm" onclick="NavAreaFns.toggleNavAreaMobile();">
            <span class="bars">
                <span class="bar bar1"></span>
                <span class="bar bar2"></span>
                <span class="bar bar3"></span>
            </span>
        </button>
    </header>
    <div class="NavAreaMobile-container">
        <nav class="NavAreaMobile-container-nav">
            <?php include('NavListLinks.php'); ?>
            <!-- <ul>
                <li class="NavAreaMobile-container-nav-extraSpaceTop">
                    &nbsp;
                </li>
                <li>
                    <span><a href="./?v=2" class="menu_item" id="menu_about">About</a></span>
                </li>
                <li>
                    <span><a href="./?v=3" class="menu_item" id="menu_ontour">On Tour</a></span>
                </li>
                <li>
                    <span><a href="./?v=4" class="menu_item" id="menu_videos">Videos</a></span>
                </li>
                <li>
                    <span><a href="./" class="menu_item" id="menu_press">Press</a></span>
                </li>
                <li>
                    <span><a href="./instagram.php" class="menu_item" id="menu_pictures">Pictures</a></span>
                </li>
                <li>
                    <span><a href="./instagram.php?v=2" class="menu_item" id="menu_blog">Blog</a></span>
                </li>
                <li>
                    <span><a href="./instagram.php?v=3" class="menu_item" id="menu_contact">Contact</a></span>
                </li>
                <li>
                    <span><a href="./instagram.php?v=4" class="menu_item" id="menu_store">Store</a></span>
                </li>
                <li class="NavAreaMobile-container-nav-extraSpaceBottom">
                    &nbsp;
                </li>
            </ul> -->
        </nav>
    </div>
</div>
