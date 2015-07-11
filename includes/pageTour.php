<?php
  include_once("cardFunctions.php");
?>

<div class="PageTour">
	<div id="container">
    <!--
      These are our filter options. The "data-filter" classes are used to identify which
      grid items to show.
      -->
    <br/>
    <div>
	    <ol class="GridFilters" id="filters">
        <!-- <li data-filter="tour-upcoming" class="active">Upcoming Shows</li> -->
        <li data-filter="tour-upcoming" class="active">Upcoming Shows</li>
        <li data-filter="tour-past">Past Shows</li>
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
        <?php printTourContent(); ?>
      </ul>
    </div>
  </div>
</div>