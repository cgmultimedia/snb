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
        <div class="ContactPage clearfix">
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
        <div class="ContactPage-facebookFeed">
          Shared details:
          <?php // Facebook feed from: https://developers.facebook.com/docs/plugins/page-plugin ?>
          <div class="fb-page" data-href="https://www.facebook.com/splashnboots" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/splashnboots"><a href="https://www.facebook.com/splashnboots">Splash&#039;N Boots</a></blockquote></div></div>
        </div>
        <div class="ContactPage-twitter">
          <a class="twitter-timeline" href="https://twitter.com/Splashnboots" data-widget-id="347391550436823040">Tweets by @Splashnboots</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
      </div> <!-- /.FullLength -->
    </div>
  </div>
</div>