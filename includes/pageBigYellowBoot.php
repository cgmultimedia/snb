<?php
include_once("cardFunctions.php");
?>

<div class="BigYellowBootPage">
	<div id="container">
    <!--
      These are our filter options. The "data-filter" classes are used to identify which
      grid items to show.
      -->
    <br/>
    <div>
	    <ol class="GridFilters" id="filters">
        <!-- <li data-filter="tour-upcoming" class="active">Upcoming Shows</li> -->
        <li data-filter="byb-upcoming" class="active">Upcoming Episodes</li>
        <li data-filter="byb-past">Past Episodes</li>
	    </ol>
    </div>
    <br/>

    <div id="main" role="main">
      <?php // NOTE: just by having Grid will make the masonry grid initialize ?>
      <ul class="Grid">
        <!--
          These are our grid items. Notice how each one has classes assigned that
          are used for filtering. The classes match the "data-filter" properties above.
          -->
        <?php printBigYellowBootContent(); ?>
      </ul>
    </div>
  </div>
</div>