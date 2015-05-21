<?php
/*
Template Name: Template - Home
*/
	//---------- GLOBAL VARS ----------
	include_once('includes/globalVars.php');

	// ---------- CUSTOM HEADER FN ----------
	//$PageTitle="New Page Title";
	function customPageHeader() { 
		global $templateDir;

		// Put page specific css here.
		// ... Or page specific CSS that NEEDS to be in head...
		// ... otherwise put it in the customerPageFooter function.
	}

	//---------- HEADER ----------
	$titleBanner = "Welcome!";
	get_header();


	//========== PAGE CONTENT =========== 
	//include('includes/pagePress.php');
	?>
	<div style="text-align: center; width: 100%; font-size: 24px">
	<br/>
	<br/>
	
		In progress...
		<br/>
		<br/>
		<br/>
	</div>
	<?php

	//========== FOOTER SECTION ==========
	

	// ---------- CUSTOM FOOTER ----------
	function customPageFooter() { 
		global $templateDir;
		// Put page specific css here.
		// ... Or page specific CSS that NEEDS to be in head...
		// ... otherwise put it in the customerPageFooter function.

		// <!-- Include the imagesLoaded plug-in -->
  		//<script src="< ? php echo $rootDir; ? >/js/vendor/jquery.imagesloaded.js" type="text/javascript"></script>
  		// ? ><script src="< ? php echo $templateDir; ? >/js/pagePictures.js" type="text/javascript"></script>< ? php
	}
	
	//---------- FOOTER FILE----------
	include_once('includes/footerFile.php'); 

?>