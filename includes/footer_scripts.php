<!-- Footer Scripts -->
<?php 
//$rootDir = get_template_directory_uri();

// Vendor scripts
?>
<script src="<?php echo $templateDir;?>/build/js/vendors.min.js" type="text/javascript"></script>
<!--[CDATA[
// - - - - - - - - - - jQuery - - - - - - - - - - ?>
<script src="https://code.jquery.com/jquery-1.11.2.min.js" type="text/javascript"></script>
<?php //---------- Fast Click ----------?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.3/fastclick.min.js" type="text/javascript"></script>
<?php //---------- Pure menu ui.js ---------- ?>
<script src="<?php echo $rootDir;?>/js/vendor/headroom.min.js" type="text/javascript"></script>
-->
<?php //USER ?>
<?php if (isset($_GET['dev']) && $_GET['dev']==1) { ?>
	<script src="<?php echo $templateDir;?>/build/js/app.js" type="text/javascript"></script>
<?php } else { ?>
	<script src="<?php echo $templateDir;?>/build/js/app.min.js" type="text/javascript"></script>
<?php } ?>

