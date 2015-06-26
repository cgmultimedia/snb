<?php
  include_once("cardFunctions.php");
?>

<div class="HomeHub">
	<div id="container">

    <!--
      These are our filter options. The "data-filter" classes are used to identify which
      grid items to show.
      -->
    <br/>
    <!-- <div>
	    <ol class="GridFilters" id="filters">
	      <li data-filter="all" class="active">All</li>
        <li data-filter="videos-musicvideos">Music Videos</li>
        <li data-filter="videos-fanvideos">Live Shows</li>
        <li data-filter="videos-kitchenjams">Kitchen Jams</li>
	      <li data-filter="videos-fanvideos">Fan Videos</li>
	      <li data-filter="videos-vlogs">Vlogs</li>
	    </ol>
    </div> -->
    <br/>

    <div id="main" role="main">
      <div class="FullLength">
        <div class="ContactPage clearfix"">
          <div class="ContactPage-sideImg">
            <img class="ContactPage-sideImg-img" src="<?php echo $templateDir;?>/media/img/contact/iphone-5S-splash-n-boots.jpg"/>
          </div>
          <div class="ContactPage-details">
            <?php
            if (have_posts()) :
               while (have_posts()) :
                  the_post();
                  the_content();

               endwhile;
            endif;
            ?><?php
            /*
            // The Query
            query_posts( $args );

            // The Loop
            while ( have_posts() ) : the_post();
                
                the_title();
                the_content();
                
            endwhile;

            // Reset Query
            wp_reset_query();
            */
            ?>
          </div> <!-- /.Contact-details -->
        </div> <!-- /.Contact -->
      </div> <!-- /.FullLength -->
    </div>
  </div>
</div>