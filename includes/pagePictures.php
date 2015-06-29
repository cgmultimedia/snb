<?php
  include_once("cardFunctions.php");
?>

<div class="PicturePage">
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
      See: <a href="http://localhost:8888/web%20dev/5-splashnboots/2015/2015-02-10%20new%20site/splashnboots/wp-content/themes/snb/test.html">http://localhost:8888/web%20dev/5-splashnboots/2015/2015-02-10%20new%20site/splashnboots/wp-content/themes/snb/test.html</a><br/>
      and: <a href="http://www.idangero.us/swiper/api/#.VY1KTFVVhHw">swiper api</a>
      <?php //<ul class="GridStatic" id="tiles"> ?>
      <ul class="GridStatic clearfix">
        <?php printPicturesContent(); ?>
        <!-- End of grid blocks -->
      </ul>
    </div>
  </div>
</div>