<?php
/*
Template Name: Template - Press
*/
	//---------- GLOBAL VARS ----------
	include('includes/globalVars.php');
	global $templateDir;
	// ---------- CUSTOM HEADER FN ----------
	//$PageTitle="New Page Title";
	function customPageHeader() { 
		global $templateDir;

		// Put page specific css here.
		// ... Or page specific CSS that NEEDS to be in head...
		// ... otherwise put it in the customerPageFooter function.
	}

	//---------- HEADER ----------
	$titleBanner = "Press";
	//include_once('includes/headerFile.php');
	get_header();

	//========== PAGE CONTENT =========== 
	include('includes/pagePress.php');

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
  		?><script src="<?php echo $templateDir; ?>/js/pagePress.js" type="text/javascript"></script><?php
	}
	
	//---------- FOOTER FILE----------
	include_once('includes/footerFile.php'); 

?>