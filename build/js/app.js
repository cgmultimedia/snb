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

	        // If a 'default' exists use its value.
	        
	        handler.wookmark(options);

	        // Filter initial value
	        var $activeFilter = $("#filters .active");
        	if ($activeFilter.length > 0) {
        		var filterVal = $activeFilter.data("filter")
        		if (filterVal != "all") {
        			//options.possibleFilters = [filterVal];
        			handler.wookmarkInstance.filter([filterVal], 'or');
        		}
        	}

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
 /*******************************/ 
(function($) {
    $(document).ready(function() {

        function resizeModal($this) {
            // Add image to popup card
            var $w = $(window),
                wh = $w.height(),
                ww = $w.width();
                wr = wh / ww;

            if (wr > 1) {
                console.log("width");
            } else {
                console.log("h");
            }
        }

        function openModal($this) {
            var $pb = $(".PicturesPage-backdrop").eq(0);

            if ($pb.length <= 0) {
                $pb = $("<div class='PicturesPage-backdrop'></div>");
                $("body").append($pb);
            }

            var $pm = $(".PicturesPage-modal").eq(0);

            if ($pm.length <= 0) {
                $pm = $("<div class='PicturesPage-modal'></div>");
                $("body").append($pm);
            }

            // Get img src
            var $imgLoader = $this.find(".ImgLoader")
            if ($imgLoader.length > 0) {
                var imgSrc = $imgLoader.data("img");


                var swiperDiv = '<!-- Swiper --> \ 
                    <div class="swiper-container"> \
                        <div class="swiper-wrapper"> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/1"/></div> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/2"/></div> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/3"/></div> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/4"/></div> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/5"/></div> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/6"/></div> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/7"/></div> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/8"/></div> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/9"/></div> \
                            <div class="swiper-slide"><img class="swiper-slider-img" src="http://lorempixel.com/600/600/nature/10"/></div> \
                        </div> \
                        <!-- Add Pagination --> \
                        <div class="swiper-pagination"></div> \
                    </div>';
                
                // var j ="<div class='PicturesPage-modal-content'> \
                //             <div class='PicturesPage-modal-content-img PicturesPage-modal-content-img--center'> \
                //                 <!--<img src='"+imgSrc+"'/>  --> \
                //                 " + swiperDiv + " \
                //             </div> 
                //         </div>";

                // var j ="<div class='PicturesPage-modal-content'> \
                //                 " + swiperDiv + " \
                //         </div>";

                 var j =swiperDiv;

                // tempImg.src = imgSrc;

                //$(tempImg).addClass("PicturesPage-modal-img");

                $pm.html(j);

                // Resize the modal
                resizeModal();
                $(window).resize(resizeModal);

                // var swiper = new Swiper('.swiper-container', {
                //     pagination: '.swiper-pagination',
                //     paginationClickable: true
                // });

                // var swiper = new Swiper('.swiper-container', {
                //     //pagination: '.swiper-pagination',
                //     effect: 'coverflow',
                //     grabCursor: true,
                //     centeredSlides: true,
                //     slidesPerView: 'auto',
                //     coverflow: {
                //         rotate: 50,
                //         stretch: 0,
                //         depth: 100,
                //         modifier: 1,
                //         slideShadows : true
                //     }
                // });

                var swiper;

                // Fade in or animate them in.
                $pb.fadeIn(function() {
                    $pm.fadeIn(function() {
                        console.log("swiper");
                        swiper = new Swiper('.swiper-container', {
                            // pagination: '.swiper-pagination',
                            // paginationClickable: true
                        });
                    }); 
                });
            }
        }

        function closeModal() {
            console.log(0);
        }

        $(document).on("click", ".CardTile--pictures", function() {
            var $this = $(this);
            openModal($this);
            console.log(1);
        });

        $(document).on("click", ".PicturesPage-backdrop", function() {
            closeModal();
        });
    });
})(jQuery);

// (function ($) {

//   $.fn.materialbox = function () {

//     return this.each(function() {

//       if ($(this).hasClass('intialized')) {
//         return;
//       }

//       $(this).addClass('intialized');

//       var overlayActive = false;
//       var doneAnimating = true;
//       var inDuration = 275;
//       var outDuration = 200;
//       var origin = $(this);
//       var placeholder = $('<div></div>').addClass('material-placeholder');
//       var originalWidth = 0;
//       var originalHeight = 0;
//       origin.wrap(placeholder);


//       origin.on('click', function(){
//         var placeholder = origin.parent('.material-placeholder');
//         var windowWidth = window.innerWidth;
//         var windowHeight = window.innerHeight;
//         var originalWidth = origin.width();
//         var originalHeight = origin.height();


//         // If already modal, return to original
//         if (doneAnimating === false) {
//           returnToOriginal();
//           return false;
//         }
//         else if (overlayActive && doneAnimating===true) {
//           returnToOriginal();
//           return false;
//         }


//         // Set states
//         doneAnimating = false;
//         origin.addClass('active');
//         overlayActive = true;

//         // Set positioning for placeholder

//         placeholder.css({
//           width: placeholder[0].getBoundingClientRect().width,
//           height: placeholder[0].getBoundingClientRect().height,
//           position: 'relative',
//           top: 0,
//           left: 0
//         });



//         // Set css on origin
//         origin.css({position: 'absolute', 'z-index': 1000})
//         .data('width', originalWidth)
//         .data('height', originalHeight);

//         // Add overlay
//         var overlay = $('<div id="materialbox-overlay"></div>')
//           .css({
//             opacity: 0
//           })
//           .click(function(){
//             if (doneAnimating === true)
//             returnToOriginal();
//           });
//           // Animate Overlay
//           $('body').append(overlay);
//           overlay.velocity({opacity: 1}, {duration: inDuration, queue: false, easing: 'easeOutQuad'}
//             );


//         // Add and animate caption if it exists
//         if (origin.data('caption') !== "") {
//           var $photo_caption = $('<div class="materialbox-caption"></div>');
//           $photo_caption.text(origin.data('caption'));
//           $('body').append($photo_caption);
//           $photo_caption.css({ "display": "inline" });
//           $photo_caption.velocity({opacity: 1}, {duration: inDuration, queue: false, easing: 'easeOutQuad'})
//         }



//         // Resize Image
//         var ratio = 0;
//         var widthPercent = originalWidth / windowWidth;
//         var heightPercent = originalHeight / windowHeight;
//         var newWidth = 0;
//         var newHeight = 0;

//         if (widthPercent > heightPercent) {
//           ratio = originalHeight / originalWidth;
//           newWidth = windowWidth * 0.9;
//           newHeight = windowWidth * 0.9 * ratio;
//         }
//         else {
//           ratio = originalWidth / originalHeight;
//           newWidth = (windowHeight * 0.9) * ratio;
//           newHeight = windowHeight * 0.9;
//         }

//         // Animate image + set z-index
//         if(origin.hasClass('responsive-img')) {
//           origin.velocity({'max-width': newWidth, 'width': originalWidth}, {duration: 0, queue: false,
//             complete: function(){
//               origin.css({left: 0, top: 0})
//               .velocity(
//                 {
//                   height: newHeight,
//                   width: newWidth,
//                   left: $(document).scrollLeft() + windowWidth/2 - origin.parent('.material-placeholder').offset().left - newWidth/2,
//                   top: $(document).scrollTop() + windowHeight/2 - origin.parent('.material-placeholder').offset().top - newHeight/ 2
//                 },
//                 {
//                   duration: inDuration,
//                   queue: false,
//                   easing: 'easeOutQuad',
//                   complete: function(){doneAnimating = true;}
//                 }
//               );
//             } // End Complete
//           }); // End Velocity
//         }
//         else {
//           origin.css('left', 0)
//           .css('top', 0)
//           .velocity(
//             {
//               height: newHeight,
//               width: newWidth,
//               left: $(document).scrollLeft() + windowWidth/2 - origin.parent('.material-placeholder').offset().left - newWidth/2,
//               top: $(document).scrollTop() + windowHeight/2 - origin.parent('.material-placeholder').offset().top - newHeight/ 2
//             },
//             {
//               duration: inDuration,
//               queue: false,
//               easing: 'easeOutQuad',
//               complete: function(){doneAnimating = true;}
//             }
//             ); // End Velocity
//         }

//     }); // End origin on click


//       // Return on scroll
//       $(window).scroll(function() {
//         if (overlayActive ) {
//           returnToOriginal();
//         }
//       });

//       // Return on ESC
//       $(document).keyup(function(e) {

//         if (e.keyCode === 27 && doneAnimating === true) {   // ESC key
//           if (overlayActive) {
//             returnToOriginal();
//           }
//         }
//       });


//       // This function returns the modaled image to the original spot
//       function returnToOriginal() {

//           doneAnimating = false;

//           var placeholder = origin.parent('.material-placeholder');
//           var windowWidth = window.innerWidth;
//           var windowHeight = window.innerHeight;
//           var originalWidth = origin.data('width');
//           var originalHeight = origin.data('height');

//           origin.velocity("stop", true);
//           $('#materialbox-overlay').velocity("stop", true);
//           $('.materialbox-caption').velocity("stop", true);


//           $('#materialbox-overlay').velocity({opacity: 0}, {
//             duration: outDuration, // Delay prevents animation overlapping
//             queue: false, easing: 'easeOutQuad',
//             complete: function(){
//               // Remove Overlay
//               overlayActive = false;
//               $(this).remove();
//             }
//           });

//           // Resize Image
//           origin.velocity(
//             {
//               width: originalWidth,
//               height: originalHeight,
//               left: 0,
//               top: 0
//             },
//             {
//               duration: outDuration,
//               queue: false, easing: 'easeOutQuad'
//             }
//           );

//           // Remove Caption + reset css settings on image
//           $('.materialbox-caption').velocity({opacity: 0}, {
//             duration: outDuration, // Delay prevents animation overlapping
//             queue: false, easing: 'easeOutQuad',
//             complete: function(){
//               placeholder.css({
//                 height: '',
//                 width: '',
//                 position: '',
//                 top: '',
//                 left: ''
//               });

//               origin.css({
//                 height: '',
//                 top: '',
//                 left: '',
//                 width: '',
//                 'max-width': '',
//                 position: '',
//                 'z-index': ''
//               });

//               // Remove class
//               origin.removeClass('active');
//               doneAnimating = true;
//               $(this).remove();
//             }
//           });

//         }
//         });
// };

// $(document).ready(function(){
//   $('.materialboxed').materialbox();
// });

// }( jQuery ));
