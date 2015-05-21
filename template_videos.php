<?php
/*
Template Name: Template - Videos
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
	$titleBanner = "Videos";
	get_header();
	//include_once('includes/headerFile.php');


	//========== PAGE CONTENT =========== 
	include('includes/pageVideos.php');

	//========== FOOTER SECTION ==========
	
	// ---------- CUSTOM FOOTER ----------
	function customPageFooter() { 
		global $rootDir;
		// Put page specific css here.
		// ... Or page specific CSS that NEEDS to be in head...
		// ... otherwise put it in the customerPageFooter function.

		// <!-- Include the imagesLoaded plug-in -->
  		// <script src="< ? php echo $rootDir; ? >/js/vendor/jquery.imagesloaded.js" type="text/javascript"></script>
	}
	
	//---------- FOOTER FILE----------
	include_once('includes/footerFile.php'); 

?>