/*jshint strict: false */
/*global console */
/*global $ */
(function() {
    var NavAreaFns = {   
        setOnScrollStickyNav : function() {
            var onScrollStickyFn = function() { 
                var $navArea = $('.NavArea').eq(0);
                var $navAreaLine = $('#NavAreaLine').eq(0);
                //var $nav = $('.NavArea-container').eq(0);
                //var navH = $nav.height();
                //var $tabContent = $('.NavArea container.tab-content');

                var origOffsetY = $navAreaLine.offset().top;
                if ($(window).scrollTop() >= origOffsetY) {
                    $navArea.addClass('NavArea--sticky').removeClass('NavArea--nonSticky');
                    //$navArea.containercss('padding-top',navH+'px');
                } else {
                    $navArea.addClass('NavArea--nonSticky').removeClass('NavArea--sticky');
                    //$navArea.containercss('padding-top',0);
                }
            };

            onScrollStickyFn();
            document.onscroll = onScrollStickyFn;
            $(window).resize(function () {
                onScrollStickyFn();
            });
        },
        initStickyNav : function() {
            try {
                // If the browser doesn't supports position:sticky... 
                //if (!window.getComputedStyle(document.querySelector('.NavArea containernav')).position.match('sticky')) {
                    // On scroll set the nav to be sticky.
                    this.setOnScrollStickyNav();
                //}
            } catch(e) {
                // If there was an issue trying to run the query...
                // ... fallback to using the scroll sticky nav.
                this.setOnScrollStickyNav();
            }
        },
        toggleNavAreaMobile : function() {
            var $NAM = $("#NavAreaMobile"),
                $burger = $("#burger"),
                $lWrapper = $("#l-wrapper");

            // If the showFixedNavList was true...
            // Then close it.
            if ($NAM.data("showFixedNavList") === true) {
                $NAM.data("showFixedNavList",false);
                $lWrapper.removeClass("showFixedNavList");
                $burger.removeClass("active");
                $NAM.removeClass("showFixedNavList");

            } else {
                $NAM.data("showFixedNavList",true);
                $lWrapper.addClass("showFixedNavList");
                $burger.addClass("active");
                $NAM.addClass("showFixedNavList");

            }
        }
    };

    window.NavAreaFns = NavAreaFns;
})();
 /*******************************/ 
// Init Foundation
//$(document).foundation();
$(document).ready(function() {
	document.addEventListener('DOMContentLoaded', function () { 
		new FastClick(document.body); 
	});

	$('html').addClass('js-on');

	// Init the sticky nav / headroom
	window.NavAreaFns.initStickyNav(); 
});

// Init any .Grid (masonry pages)
(function($) {
	// http://masonry.desandro.com/appendix.html
    var $Grid = $('.Grid');
    if ($Grid.length > 0) {
	    $Grid.imagesLoaded(function() {
	        // Prepare layout options.
	        var options = {
	            autoResize: true, // This will auto-update the layout when the browser window is resized.
	            container: $('#main'), // Optional, used for some extra CSS styling
	            offset: 10, //4, // Optional, the distance between grid items
	            //itemWidth: 300, // Optional, the width of a grid item
	            fillEmptySpace: false, // Optional, fill the bottom of each column with widths of flexible height
	            //flexibleWidth : true
	            //onLayoutChanged: function() { console.log("rest")}
	        };

	        // Get a reference to your grid items.
	        // var handler = $('#tiles li'),
	        //     filters = $('#filters li');
	        var handler = $('.Grid li'),
	            filters = $('.GridFilters li');

	        // Call the layout function.
	        // http://www.wookmark.com/jquery-plugin
	        handler.wookmark(options);

	        // When a filter is clicked, toggle it's active state and refresh.
	        function onClickFilter(e) {
	            var $item = $(e.currentTarget),
	                activeFilters = [],
	                filterType = $item.data('filter');

	            if (filterType === 'all') {
	                filters.removeClass('active');
	                $item.toggleClass('active');
	            } else {
	            	filters.removeClass('active');
	                $item.toggleClass('active');

	                // Collect active filter strings
	                filters.filter('.active').each(function() {
	                    activeFilters.push($(this).data('filter'));
	                });
	            }

	            handler.wookmarkInstance.filter(activeFilters, 'or');
	        }

	        // Capture filter click events.
	        $('.GridFilters').on('click.wookmark-filter', 'li', onClickFilter);
	    });
    }
})(jQuery);
 /*******************************/ 
// Initially set value of isNonDragMouseClick to true...
// ... so touch devices can act accordingly (as if a click is a non-drag click)...
// ... Since the touch events will know if it's a drag or a click.
window.isNonDragMouseClick = true;

// This handler will ensure that the global variable 'isNonDragMouseClick'...
// ... will be true if the mouse wasn't dragged before mouseup...
// ... or false if it had.
// NOTE: a mouse is considered dragged if it exceeded a threshold of pixel movements.
$('body').on('mousedown', function(evt) {
	var $body                  = $(this);
	var distanceMoved          = 0;
	var maxMoveForDrag         = 4;
	var isMouseDrag            = false;
	window.isNonDragMouseClick = true; 		// Set initial value of isNonDragMouseClick to 'true'.

    $body.on('mousemove', function handler(evt) {
    	window.evtt = evt;
    	// Check if it was already determined that the mouse movement is a 'drag'
    	if (isMouseDrag === false) {
    		// If the drag distance threshold wasn't exceeded...
    		// ... increment the distanceMoved variable.
    		if (distanceMoved < maxMoveForDrag) {
    			distanceMoved++;	
    		} else {
    			// If the drag distance threshold was exceeded...
    			// ... set isNonDragMouseClick to 'false'
    			isMouseDrag = true;
    			window.isNonDragMouseClick = false;
    			$body.off('mousemove');
    		}
    	}
    });

    // Remove handles on mouseup
    $body.on('mouseup', function handler(evt) {
        $body.off('mouseup mousemove');
    });
});

 /*******************************/ 
function youTubeVideoPopupAdd(youTubeId) {

    var $YouTubePopup = $('<div class="YouTubeVideos-video-modalWindow u-modal-window u-modal-window--fixed">');
    var src = "http://www.youtube.com/embed/"+youTubeId+"?rel=0&html5=1&vq=hd720&autoplay=1&wmode=transparent&showinfo=0&color=white";
    var contents = ' \
        <div class="YouTubeVideos-video-modalWindow-container"> \
            <div class="YouTubeVideos-video-modalWindow-containerRelative"> \
                <div id="YouTubeVideos-video-modalWindow-closeButton" class="YouTubeVideos-video-modalWindow-closeButton" style="display: block;"> \
                    <a class="CloseButton CloseButton--half" href="javascript:youTubeVideoPopupRemove()"> \
                        Close \
                    </a> \
                </div> \
                <div class="YouTubeVideos-video-iframeContainer"> \
                    <iframe src="'+src+'" class="YouTubeVideos-video-iframeContainer-iframe" frameborder="0" allowscriptaccess="always" allowfullscreen="true"></iframe> \
                </div> \
            </div> \
        </div> \
    ';

    $YouTubePopup.html(contents);

    // Stop any running audiojs
    //audiojsStopAll();

    // Add iframed video to body
    $YouTubePopup.appendTo($("body"));
    $YouTubePopup.fadeIn();
    $YouTubePopup.on("click", function() {
        youTubeVideoPopupRemove();
    });
    youTubeVideoScrimFadeIn();
}

function youTubeVideoPopupRemove() {
    var $YouTubePopup = $(".YouTubeVideos-video-modalWindow").first();
    $YouTubePopup.fadeOut(function() {
        $(".YouTubeVideos-video-iframeContainer-iframe").each(function() {
            $(this).attr("src","");
        })
        $(this).remove();
    });
    youTubeVideoScrimFadeOut();
}

// Fade in the scrim overlay
function youTubeVideoScrimFadeIn() {
    var $overlay = $(".u-modal-overlay").first();

    if ($overlay.length <= 0) {
        $overlay = $("<div class='u-modal-overlay'>");    
        $("body").append($overlay);
    }
    
    $overlay.fadeIn();
    $overlay.on("click", function() {
        youTubeVideoPopupRemove();
    });
}

// Fade out the scrim overlay
function youTubeVideoScrimFadeOut() {
    var $overlay = $(".u-modal-overlay");
    $overlay.fadeOut(function() {
        $(this).remove();
    });
}