<?php
  include_once("cardFunctions.php");
?>

<div class="HomeHub">
	<div id="container">
    <div id="main" role="main">
      <?php // NOTE: just by having Grid will make the wookmark / masonry grid initialize ?>
      <ul class="Grid">
        <?php printNewsContent(); ?>
        <!-- End of grid blocks -->
      </ul>
    </div>
  </div>
</div>