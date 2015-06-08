<?php
  include_once("cardFunctions.php");

  // --------- CONTENT ----------
  // Top area press stuff
  function makePressCell($title, $imgSrc, $link) {
    ?>
    <a class="PressPage-content-cell" target="_blank" href="<?php echo $link;?>">
      <div class="PressPage-content-cell-title">
        <?php echo $title; ?>
      </div>
      <img class="PressPage-content-cell-img" src="<?php echo $imgSrc; ?>"/>
    </a>
    <?php
  }
?>

<div class="HomeHub">
	<div id="container">
    <!-- Page -->
    <div class="PressPage-content">
      <?php
        makePressCell("Poster", $templateDir."/media/img/press/yellowandblue_blank.jpg", "http://splashnboots.com/childrensmusic/wp-content/themes/splashnbootstour/images/press-page/press-docs/yellowandblue_blank.pdf");
        makePressCell("Images", $templateDir."/media/img/press/yellowandblue_blank.jpg", "http://splashnboots.com/childrensmusic/wp-content/themes/splashnbootstour/images/press-page/press-docs/SplashNBoots%20Promo%20Pack%202014.zip");
        makePressCell("Tour Info", $templateDir."/media/img/press/yellowandblue_blank.jpg", "http://splashnboots.com/images/press-page/press-docs/Splash'N%20Boots%20Show%20Information.pdf");
      ?>
        <div class="PressPage-content-cell">
          <div class="PressPage-content-cell-title">
            Danielle
          </div>
          <div class="PressPage-content-cell-details">
            Danielle is our publicist!<br>
            She will help you out with anything you need.<br><br>
            Contact her at:<br>
                      647-381-6709<br>
            <a href="mailto:danielle@splashnboots.com">danielle@splashnboots.com</a><br>
          </div>
        </div>
      <?php
        //========== THE LOOP =========== 
        // if (have_posts()) :
        //    while (have_posts()) :
        //       the_post();
        //       the_content();
        //    endwhile;
        // endif;
      ?>
      <div class="clearfix"></div>
    </div>

<?php 
    // <!--
    //   These are our filter options. The "data-filter" classes are used to identify which
    //   grid items to show.
    //   -->
    // <br/>
    // <!-- <div>
	   //  <ol class="GridFilters" id="filters">
	   //    <li data-filter="all" class="active">All</li>
    //     <li data-filter="videos-musicvideos">Music Videos</li>
    //     <li data-filter="videos-fanvideos">Live Shows</li>
    //     <li data-filter="videos-kitchenjams">Kitchen Jams</li>
	   //    <li data-filter="videos-fanvideos">Fan Videos</li>
	   //    <li data-filter="videos-vlogs">Vlogs</li>
	   //  </ol>
    // </div> -->
    // <br/>
?>

    <div id="main" role="main">
      <?php printPressContent(); ?>
      <?php // NOTE: just by having Grid will make the masonry grid initialize 
      /*
      <ul class="Grid">
        < ? php printPressContent(); ? >
        <!-- End of grid blocks -->
      </ul>
      */
      ?>
    </div>
  </div>
</div>