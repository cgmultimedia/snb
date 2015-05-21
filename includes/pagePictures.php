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
      <?php //<ul class="GridStatic" id="tiles"> ?>
      <ul class="GridStatic">
        <?php printPicturesContent(); ?>
        <!-- End of grid blocks -->
      </ul>
    </div>
  </div>
</div>