// Encapsulate the pagePicture.js functions an vars.
(function() { 
	var itemBatchNum = 30,
		extraScrollTrigger = 400,
		LastVisibleCardTile,
		CanLoadNextBatch = true,
		classMain = "CardTile",
		classInitial = "CardTile--initial",
		classNoShow = "CardTile--DN"; // CardTile--displayNone

	function preloadImgUrl(url, callback) {
		var img = new Image;
		img.onload = callback(img);
		img.src = url;
	}

	$.fn.initCardTilePic = function() {
		$self = $(this);

		// Fade in the initial card
		$self.fadeIn();

		if ($self.hasClass(classMain)) {
			$self.find(".ImgLoader").each(function(index) {
				var $ImgLoader = $(this);
				var imgUrl = $ImgLoader.data("img");
				var newImg = new Image();

				if (imgUrl) {
					preloadImgUrl(imgUrl, function(img) {
						//$ImgLoader.css('visibility','visible').hide().append(img)attr("src",imgUrl).removeClass("ImgLoader").fadeIn('slow');
						$ImgLoader.css('visibility','visible').hide().removeClass("ImgLoader").append(img).fadeIn('slow');
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
	    	if (boundRect && boundRect.bottom <= window.innerHeight + extraScrollTrigger) {
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
			var className = classNoShow;
			$picBatch = $("."+className).slice(0, itemBatchNum);

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
		var className = classInitial;
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