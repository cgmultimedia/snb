<?php
/*
Template Name: Template - About
*/
	//---------- GLOBAL VARS ----------
	include_once('includes/globalVars.php');

	// ---------- CUSTOM HEADER FN ----------
	//$PageTitle="New Page Title";
	function customPageHeader() { 
		global $templateDir;
		?>
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&amp;v=3"></script>
		<?php
		// Put page specific css here.
		// ... Or page specific CSS that NEEDS to be in head...
		// ... otherwise put it in the customerPageFooter function.
	}

	//---------- HEADER ----------
	$titleBanner = "About";
	get_header();


	//========== PAGE CONTENT =========== 
	include('includes/pageAbout.php');

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