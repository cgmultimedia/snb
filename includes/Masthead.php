<?php 
	// globals
	global $titleBanner;
	global $titleBannerClass;
	
	$VideoFull = "VideoFull";
	if (isset($_GET['v']) && $_GET['v'] > 0 && $_GET['v'] <= 4) {
		$VideoFull = $VideoFull . $_GET['v'];
	} else {
		$VideoFull = $VideoFull . "3";
	}
?>
<div class="Masthead">
	<?php
	// ------ Logo -----
	$logoStyle = "reg"; 
    include('SNBLogo.php');
    ?>

	<?php if($isMobile) { ?>
		<div class="Masthead-img">
			<img width="100%" src="<?php echo $templateDir;?>/media/img/masthead/home.jpg" />
		</div>
	<?php } else { ?>
		<div class="Masthead-video">
			<div class="Masthead-video-aspectRatioPusher">
			</div>
				<!-- <video class="Masthead-video-video" width="100%" autoplay="true" loop="true"
					poster="<?php echo $templateDir;?>/media/img/general/1x1-white.gif" >
					<source src="<?php echo $templateDir;?>/media/videos/out2.mp4" type="video/mp4">
				</video> -->
		</div>
	<?php } ?>
	<div class="MastheadOverlays">
		<!-- <div class="MastheadOverlays-buyAlbum">
		</div>
		-->
		<div class="MastheadOverlays-title <?php echo $titleBannerClass; ?>">
			<?php echo $titleBanner;?>
		</div>
	</div>
	<script>
		console.log("fade in: http://bedford-demo.squarespace.com/");
	</script>
</div>