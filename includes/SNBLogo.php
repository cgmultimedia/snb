<?php
	if ($logoStyle == "mobile") {
		$logoSrc = $templateDir . "/media/img/general/splashnboots-treehouse-logo-mobile.png";
	} else {
		$logoSrc = $templateDir . "/media/img/general/splashnboots-treehouse-logo.png";
	}
?>

<div class="SNBLogo">
	<a class="SNBLogo-link" href="/">
		<img class="SNBLogo-img" alt="Splash'N Boots Logo" src="<?php echo $logoSrc;?>" />
	</a>
</div>
