<?php
  include_once("cardFunctions.php");
?>

<div class="VideosPage">
	<div id="container">

    <!--
      These are our filter options. The "data-filter" classes are used to identify which
      grid items to show.
      -->
    <br/>
    <div>
	    <ol class="GridFilters VideosPage-gridFilters" id="filters">
	      <!-- <li data-filter="all" class="active">All</li> -->
        <li data-filter="videos-musicvideos" class="active">Music Videos</li>
        <li data-filter="videos-byb">Big Yellow Boot</li>
        <li data-filter="videos-fanvideos">Live Shows</li>
        <li data-filter="videos-kitchenjams">Kitchen Jams</li>
	      <li data-filter="videos-fanvideos">Fan Videos</li>
	      <li data-filter="videos-vlogs">Vlogs</li>
	    </ol>
    </div>
    <br/>

    <div id="main" role="main">
      <?php // NOTE: just by having Grid will make the masonry grid initialize ?>
      <ul class="Grid clearfix">
        <!--
          These are our grid items. Notice how each one has classes assigned that
          are used for filtering. The classes match the "data-filter" properties above.
          -->
        <?php printVideoContent(); ?>
      </ul>
    </div>
  </div>
</div>