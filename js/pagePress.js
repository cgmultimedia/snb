// Encapsulate the pagePicture.js functions an vars.
(function() { 
	var PicBatchNum = 15;
	var LastVisibleCardTile;
	var CanLoadNextBatch = true;

	function preloadImgUrl(url, callback) {
		var img = new Image;
		img.onload = callback();
		img.src = url;
	}

	$.fn.initCardTilePic = function() {
		$self = $(this);

		// Fade in the initial card
		$self.fadeIn();

		if ($self.hasClass("CardTile")) {
			$self.find(".ImgLoader").each(function(index) {
				var $ImgLoader = $(this);
				var imgUrl = $ImgLoader.data("img");

				if (imgUrl) {
					preloadImgUrl(imgUrl, function() {
						$ImgLoader.css('visibility','visible').hide().attr("src",imgUrl).fadeIn('slow');
					});
				}
			});
		}
	};

	// The scrollHandler for the Picture Page
	var picGridScrollHandler = function() {
	    // NOTE: 'LastVisibleCardTile' is a global value.
	    // Which is set by $("...").reinitScrollShowPicBatch()
	    if (LastVisibleCardTile) {
	    	var boundRect = LastVisibleCardTile.getBoundingClientRect();

	    	// If the last visible cardtile is visible on the page...
	    	// ... then load int he next batch/
	    	if (boundRect && boundRect.bottom <= window.innerHeight +100) {
	    		showNextPicBatch();
	    	}
	    }
	}

	// For for 15  div.CardTile--display, show it...
	// And then load it's 
	function showNextPicBatch() {
		if (CanLoadNextBatch === true) {
			// Set the global value of 'CanLoadNextBatch' to false..
			CanLoadNextBatch = false;
			var className = "CardTile--displayNone";
			$picBatch = $("."+className).slice(0,15);

			// Remove the scroll handler if there are no more pic batches to display.
			if ($picBatch.length <= 0) {
				$(window).off("scroll", picGridScrollHandler);
			} else {
				$picBatch.each(function(i) {
					$(this).removeClass(className).initCardTilePic();
				});

				// Use the last image CardTile as the point for loading next batch.
				$picBatch.last().reinitScrollShowPicBatch();
			}

			// Set a timeout to disable the next patch load until this one had a chance to load up...

			setTimeout(function() { 
				CanLoadNextBatch = true;
				picGridScrollHandler();
			}, 1000);
		}
	}

	// $("#itemBind").click(function(){
	//     $(window).scroll(scrollHandler);
	// }).click(); // .click() will execute this handler immediately

	// $("#itemUnbind").click(function(){
	//     $(window).off("scroll", scrollHandler);
	// });

	// Initialize the Picture Grid.
	function initPicGrid() {
		var className = "CardTile--initial";
		$picBatch = $("."+className);

		$picBatch.each(function(i) {
			$(this).removeClass(className).initCardTilePic();
		});

		$(window).scroll(picGridScrollHandler);

		// Setup the last image as the point for loading next batch.
		$picBatch.last().reinitScrollShowPicBatch();
	}

	// Taking the last .CardTile that has been displayed...
	// Set it as the scroll 
	$.fn.reinitScrollShowPicBatch = function() {
		LastVisibleCardTile = $(this)[0];
		// var boundRed = $(this).getBoundingClientRect();
		// window.scroll
	};

	initPicGrid();
})();