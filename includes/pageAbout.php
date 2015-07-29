<?php
    include_once("cardFunctions.php");

    global $templateDir;
    $aboutImgDir = $templateDir."/media/img/about/";
?>      

<div class="AboutPage">

    <!-- <div class="AboutPage-cell AboutPage-cell- -worldMap">
        <div class="AboutPage-cell-wrapper">
            <div class="AboutPage-cell- -worldMap-title AboutPage-cell-title">
                Map Coming Soon!
            </div>
        </div>
    </div> -->

    <div class="AboutPage-cell AboutPage-cell--splash">
        <div class="AboutPage-cell-wrapper">
            <img class="AboutPage-cell--splash-paper" src="<?php echo $aboutImgDir."splash-paper-high.jpg";?>"/>
            <img class="AboutPage-cell--splash-photo" src="<?php echo $aboutImgDir."splash-photo-high.jpg";?>"/>
            <div class="AboutPage-cell--splash-title AboutPage-cell-title">Meet Splash!</div>
        </div>
    </div>
    <div class="AboutPage-cell AboutPage-cell--boots">
        <div class="AboutPage-cell-wrapper">
            <img class="AboutPage-cell--boots-paper" src="<?php echo $aboutImgDir."boots-paper-high.jpg";?>"/>
            <img class="AboutPage-cell--boots-photo" src="<?php echo $aboutImgDir."boots-photo-high.jpg";?>"/>
            <div class="AboutPage-cell--boots-title AboutPage-cell-title">Meet Boots...</div>
        </div>
    </div>
    <div class="AboutPage-cell AboutPage-cell--bigyellowboot">
        <?php // wrapper not needed ?>
        <div class="AboutPage-cell--bigyellowboot-text">
            <div class="AboutPage-cell--bigyellowboot-text-header">
                Moving into Treehouse's<br/>
                BIG YELLOW BOOT!
            </div>
            <div class="AboutPage-cell--bigyellowboot-text-reg">
                We’re so excited about our new <br/>
                home on Treehouse TV!
            </div>
        </div>
    </div>
    <div class="AboutPage-cell AboutPage-cell--friends">
        <div class="AboutPage-cell-wrapper">
            <img class="AboutPage-cell--friends-sharonloisbram" src="<?php echo $aboutImgDir."friends-sharonloisbram.jpg";?>"/>
            <img class="AboutPage-cell--friends-treehouse"      src="<?php echo $aboutImgDir."friends-treehouse.jpg";?>"/>
            <img class="AboutPage-cell--friends-fred"           src="<?php echo $aboutImgDir."friends-fred.jpg";?>"/>
            <img class="AboutPage-cell--friends-wiggles"        src="<?php echo $aboutImgDir."friends-wiggles.jpg";?>"/>
            <div class="AboutPage-cell--friends-title AboutPage-cell-title">
                <div class="AboutPage-cell--friends-title-text">
                    Big shows, big dreams<br/>
                    great friends!
                </div>
                <img class="AboutPage-cell--friends-title-img" src="<?php echo $aboutImgDir."friends-yellowblot.png";?>"/>
            </div>
        </div>
    </div>
    <div class="AboutPage-cell AboutPage-cell--awards">
        <div class="AboutPage-cell-wrapper">
            <img class="AboutPage-cell--awards-juno1"  src="<?php echo $aboutImgDir."awards-juno1.jpg";?>"/>
            <img class="AboutPage-cell--awards-juno2"  src="<?php echo $aboutImgDir."awards-juno2.jpg";?>"/>
            <img class="AboutPage-cell--awards-indies" src="<?php echo $aboutImgDir."awards-indies.jpg";?>"/>
            <img class="AboutPage-cell--awards-juno3"  src="<?php echo $aboutImgDir."awards-juno3.jpg";?>"/>
            <div class="AboutPage-cell--awards-title">
                <div class="AboutPage-cell--awards-title-header AboutPage-cell-title">
                    Awards!
                </div>
                <div class="AboutPage-cell--awards-title-reg">
                    2015 and 2104 JUNO Nominees for Children’s Album of the Year<br/>
                    Thrice Crowned Chilmtmtdren’s Group of the Year (INDIES)
                </div>
            </div>
        </div>
    </div>
    <div class="AboutPage-cell AboutPage-cell--worldMap">">
    
        <div class="AboutPage-cell--worldMap-title AboutPage-cell-title">
            Map of Wonders!
        </div>
        <div class="AboutPage-cell--worldMap-text">
            Check out some of the places we've been! 
        </div>
        
        <div class="AboutPage-cell-wrapper">
            <div class="AboutPage-cell--worldMap-map">
                <?php include('pageAboutMap.php'); ?>
            </div>
        </div>
    </div>
    <div class="AboutPage-cell AboutPage-cell--albums">
        <div class="AboutPage-cell-wrapper">
            <div class="AboutPage-cell--albums-title AboutPage-cell-title">
                Albums!
            </div>
            <div class="AboutPage-cell--albums-albums">
                <?php 
                function makeAlbum($fileTitle, $url) { 
                    global $aboutImgDir;
                ?>
                    <a class="AboutPage-cell--albums-album" target=_blank href="<?php echo $url;?>">
                        <img class="AboutPage-cell--albums-album-img " src="<?php echo $aboutImgDir.$fileTitle.".jpg";?>"/>
                    </a>
                <?php
                }

                makeAlbum("albums-happytimes",                  "http://store.splashnboots.com/album/happy-times");
                makeAlbum("albums-coconuts-dont-fall",          "http://store.splashnboots.com/album/coconuts-dont-fall-far-from-the-tree");
                makeAlbum("albums-keepin-it-green",             "http://store.splashnboots.com/album/keepin-it-green");
                makeAlbum("albums-back-in-yellow",              "http://store.splashnboots.com/album/back-in-yellow");
                makeAlbum("albums-razoo",                       "http://store.splashnboots.com/album/razoo");
                makeAlbum("albums-popcorn-pickles-and-parrots", "http://store.splashnboots.com/album/popcorn-pickles-and-parrots");
                makeAlbum("albums-manatee-bay",                 "http://store.splashnboots.com/album/manatee-bay");
                makeAlbum("albums-getting-our-feet-wet",        "http://store.splashnboots.com/album/getting-our-feet-wet");

                ?>
            </div>
        </div>
    </div>
    <div class="AboutPage-cell AboutPage-cell--babysplash">
        <div class="AboutPage-cell-wrapper">
            
            <div class="AboutPage-cell--babysplash-baby">
                <img class="AboutPage-cell--babysplash-baby-img"  src="<?php echo $aboutImgDir."babysplash-baby1.jpg";?>"/>
                <img class="AboutPage-cell--babysplash-baby-frame"  src="<?php echo $aboutImgDir."babysplash-yellowframe.png";?>"/>
            </div>
            <img class="AboutPage-cell--babysplash-teen"  src="<?php echo $aboutImgDir."babysplash-teen.jpg";?>"/>
            <img class="AboutPage-cell--babysplash-tape1"     src="<?php echo $aboutImgDir."tape.png";?>"/>
            <img class="AboutPage-cell--babysplash-tape2"     src="<?php echo $aboutImgDir."tape.png";?>"/>

            <div class="AboutPage-cell--babysplash-title">
                <div class="AboutPage-cell--babysplash-title-header AboutPage-cell-title">
                    Hi Baby Nick!
                </div>
            </div>

            <div class="AboutPage-cell--babysplash-title2">
                <div class="AboutPage-cell--babysplash-title2-header AboutPage-cell-title">
                    Cool teen Nick make a ‘Splash’ mastering the guitar.

                </div>
                <div class="AboutPage-cell--babysplash-title2-reg">
                    He has obviously not mastered<br/>cleaning his room, though.
                </div>
            </div>
        </div>
    </div>

    <div class="AboutPage-cell AboutPage-cell--babyboots">
        <div class="AboutPage-cell-wrapper">
            <img class="AboutPage-cell--babyboots-baby1"  src="<?php echo $aboutImgDir."babyboots-baby1.jpg";?>"/>
            <img class="AboutPage-cell--babyboots-baby2"  src="<?php echo $aboutImgDir."babyboots-baby2.jpg";?>"/>
            <img class="AboutPage-cell--babyboots-tape"     src="<?php echo $aboutImgDir."tape.png";?>"/>

            <div class="AboutPage-cell--babyboots-title">
                <div class="AboutPage-cell--babyboots-title-header AboutPage-cell-title">
                    Taes is born!
                </div>
                <div class="AboutPage-cell--babyboots-title-reg">
                    Look out footsie pyjamas... one day soon Taes will opt for a fine pair of ‘Boots’.
                </div>
            </div>

            <div class="AboutPage-cell--babyboots-title2">
                <div class="AboutPage-cell--babyboots-title2-header AboutPage-cell-title">
                    Taes quickly learns the love of dance!
                </div>
                <div class="AboutPage-cell--babyboots-title2-reg">
                    Still no boots though.
                </div>
            </div>
        </div>
    </div>

    <div class="AboutPage-cell AboutPage-cell--recording">
        <div class="AboutPage-cell-wrapper">
            <img class="AboutPage-cell--recording-img1"  src="<?php echo $aboutImgDir."recording-img1.jpg";?>"/>
            <div class="AboutPage-cell--recording-record" >
                <img class="AboutPage-cell--recording-record-img"  src="<?php echo $aboutImgDir."recording-record.jpg";?>"/>
                <div class="AboutPage-cell--recording-record-asterix">
                    *
                </div>
            </div>
            <img class="AboutPage-cell--recording-tape1"     src="<?php echo $aboutImgDir."tape.png";?>"/>
            <img class="AboutPage-cell--recording-tape2"     src="<?php echo $aboutImgDir."tape.png";?>"/>

            <div class="AboutPage-cell--recording-title">
                <div class="AboutPage-cell--recording-title-header AboutPage-cell-title">
                    Recording the first Album!
                </div>
                <div class="AboutPage-cell--recording-title-reg">
                    “Getting Our Feet Wet” was <br/>
                    recorded in one afternoon. <br/>
                    One.
                </div>
            </div>

            <div class="AboutPage-cell--recording-goldAsterix">
                *
            </div>

            <div class="AboutPage-cell--recording-goldText">
                * Not an actual gold record.
            </div>
        </div>
    </div>

    <!-- <div class="AboutPage-cell AboutPage-cell--final"> -->
    <div class="AboutPage-cell--final">
        <img class="AboutPage-cell--final-img" src="<?php echo $aboutImgDir."final-img.jpg";?>"/>
    </div>
</div>
