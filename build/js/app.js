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
/*jshint strict: false */
/*jshint multistr: true */
/*jslint vars: true, plusplus: true, devel: true, nomen: true, indent: 4, maxerr: 50 */ 
/*global console */
(function($) {
    $(document).ready(function() {

        // Global vars within scope.
        var _swiper,
            _swiperIsInit = false;
            $allPictureCards = $(".CardTile--pictures"),
            _numCards = $allPictureCards.length,
            _prevCardIndex = 0, // Initial Card Index
            _prevSwiperIndex = 0, // The initial index for the swiper.
            _cardToSwiperIndexDiff = 0, // The index difference between the Card and the swiper (e.g cardIdx = 6; swiperIdx = 1; So, diff = 5)
            _numCardBufs = 4; // 3 cards on either side of main (selected) index.
            _maxSwiperIndex = _numCardBufs * 2; // e.g. 012 3 456 (if buf is 3, so 3*2 = 6)

        // Returns the min and max card index values.
        function setInitGlobalVars($card) {
            try {
                _prevCardIndex = $card.index();
                var minCardIndex = Math.max(_prevCardIndex - _numCardBufs,0); // Ensure smallest possible val is 0
                var maxCardIndex = Math.min(_prevCardIndex + _numCardBufs,_numCards - 1); // Ensure smallest possible val is 0
                
                // Set the initial value for the swiper's index to be the appropriate value.
                _prevSwiperIndex = _prevCardIndex - minCardIndex;

                // setCardToSwiperIndexDiff
                _cardToSwiperIndexDiff = _prevCardIndex - _prevSwiperIndex;

                return {min : minCardIndex, max: maxCardIndex};
            } catch(e) {
                console.log("Err in setInitGlobalVars:" + e);
                return {min : 0, max: 0};
            }
        }

        // Using the active Index... refresh all global values and add / remove any slides
        // ... and update indexes
        function updateSlides() {
            // Only updateSlides if the swiper has been initialized.
            if (_swiperIsInit) {
                //swiper
                var actIdx      = _swiper.activeIndex;
                
                // Difference from the the center to the new active position
                // E.g. buf is 3 so swiper indexes is 012 3 456...
                /// Then the new active index is 2.. so the diff is 3 - 2 = -1
                //var swiperActBufDiff  = actIdx - _numCardBufs; 

                var numSlides = _swiper.slides.length;

                // Relative card index for first swiper slide
                var cardIndexFirst = $(_swiper.slides[0]).find(".swiper-slide-container").data("index");
                var cardIndexLast  = $(_swiper.slides[numSlides-1]).find(".swiper-slide-container").data("index");

                // The desired number of slides to be added or removed from the left / right side.
                // ... This is not considering whether those slides even exist to be added.
                var desiredLeftChange  = _numCardBufs - actIdx;
                var desiredRightChange = _numCardBufs - (numSlides - 1 - actIdx);

                var removeSlideArray = [],
                    addSlideArray = [],
                    i = 0;

                // RIGHT changes...
                // NOTE: you have to remove from the right first....
                // ... otherwise, if it turns out that you add a card to the left...
                // ... the indexing is off when removing.

                // If it is removal.. simply remove it 
                if (desiredRightChange >= 0) {
                    // Right 
                    var maxRightChange = _numCards - 1 - cardIndexLast;

                    var numAddRight = Math.min(maxRightChange, desiredRightChange);

                    addSlideArray = [];
                    for (i=cardIndexLast+1;i<cardIndexLast+numAddRight+1;i++) {
                        addSlideArray.push(getCardDivByIndex(i));
                    }
                    if (addSlideArray.length > 0) {
                        _swiper.appendSlide(addSlideArray);
                    }
                } else if (desiredRightChange <= 0) {
                    var numRemoveRight = Math.abs(desiredRightChange);

                    removeSlideArray = [];
                    for (i=numSlides-numRemoveRight;i<numSlides;i++) {
                        removeSlideArray.push(i);
                    }
                    if (removeSlideArray.length > 0) {
                        _swiper.removeSlide(removeSlideArray);
                    }
                }

                // LEFT changes
                // If it is removal.. simply remove it 
                if (desiredLeftChange <= 0) {
                    var numRemoveLeft = Math.abs(desiredLeftChange);

                    removeSlideArray = [];
                    for (i=0;i<numRemoveLeft;i++) {
                        removeSlideArray.push(i);
                    }

                    if (removeSlideArray.length > 0) {
                        _swiper.removeSlide(removeSlideArray);
                    }
                } else if (desiredLeftChange >= 0) {
                    // Check the max number of slides that COULD be added
                    var maxLeftChange  = cardIndexFirst; // The card index for the swiper's index 0

                    var numAddLeft = Math.min(maxLeftChange, desiredLeftChange);

                    addSlideArray = [];
                    for (i=cardIndexFirst-numAddLeft;i<cardIndexFirst;i++) {
                        addSlideArray.push(getCardDivByIndex(i));
                    }
                    if (addSlideArray.length > 0) {
                        addSlideArray = addSlideArray.reverse();
                        _swiper.prependSlide(addSlideArray);
                    }
                }

                // Refresh the sliders, and resize all needed slides.
                resizeModal();
            }
        }

        function getCardDivByIndex(idx) {
            try {
                var $card = $allPictureCards.eq(idx);
                var imgSrc = $card.find(".Card-img").data("img");
                var title = $card.find(".Card-title").html();
                var date = $card.find(".Card-date").html();

                return getCard(imgSrc,title,date, idx);
            } catch(e) {
                return "";
            }
        }

        // This initialized the modal and all global variables...
        // ... for the initially clicked card.
        function getInitImgDataFromClickedCard($thisCard) {
            try {
                var minMax = setInitGlobalVars($thisCard); // Should return, e.g. {min : 0; max 7}

                var returnedCardDivs = "";
                for (var i = minMax.min; i<=minMax.max;i++) {
                    returnedCardDivs += getCardDivByIndex(i);
                }
                return returnedCardDivs;
            } catch(e) {
                console.log("getInitImgDataFromClickedCard error: "+e);
            }
        }

        function getCard(imgSrc, title, date, index) {
            return '<div class="swiper-slide" > \
                        <div class="swiper-slide-container test" data-index="'+index+'"> \
                            <div class="swiper-slide-container-photoRoot"> \
                                <img class="swiper-slide-container-photoRoot-img" src="'+imgSrc+'"/> \
                            </div> \
                            <div class="swiper-slide-container-text"> \
                                <div class="swiper-slide-container-text-value"> \
                                    <div class="swiper-slide-container-text-value-date"> \
                                    '+date+' \
                                    </div> \
                                '+title+' \
                                </div> \
                            </div> \
                        </div> \
                    </div>';
        }

        function closeModal() {
            $(".PicturesPage-backdrop").eq(0).fadeOut();
            $(".PicturesPage-modal").eq(0).fadeOut();
        }

        function resizeModal() {
            if (_swiper !== undefined && _swiper.onResize) {

                var padding = 40,
                    maxImgWidth = 640,
                    maxWidth = maxImgWidth+335, // 640 image max width, 335 the padding-right (as defined in _PicturePages.scss)
                    maxTotalWidth = maxWidth + 2 * padding,
                    maxWidthWhenNoPadding = 480,
                    // NOTE: this has to be the same as the value within '_PicturePage.scss' ...
                    // ... $switchToFullTopBottomStyle : 735px,
                    switchToFullTopBottomStyle = 735,
                    minSwiperWrapperTop = 40;

                var ww = $(window).width(),
                    wh = $(window).height(),
                    newSwiperSlideWidth,
                    newSwiperWrapperTop;

                // ----------------------------------------
                if (ww>maxTotalWidth) {
                    _swiper.params.slidesPerView = 'auto';
                    newSwiperSlideWidth = maxWidth;

                } else if (ww>maxWidthWhenNoPadding) {
                    var winWidthMinusPadding = ww - 2 * padding;
                    newSwiperSlideWidth = winWidthMinusPadding;
                } else {
                    newSwiperSlideWidth = ww;
                }

                // Set the new swiper-slide width.
                $(".swiper-slide").width(newSwiperSlideWidth);

                // ----------------------------------------
                // Set the top for .swiper-wrapper...
                // ... note if it's less than ____, set it to its min val
                
                if (ww>switchToFullTopBottomStyle) {
                    // Calc top for .swiper-wrapper
                    // ... Use maxImgWidth because that's what's used to determine height.
                    newSwiperWrapperTop = (wh - $(".swiper-wrapper").height()) / 2;
                } else {
                    // Otherwise just set value to default min top value.
                    newSwiperWrapperTop = minSwiperWrapperTop;
                }

                // Ensure the top value is at least the min value.
                if (newSwiperWrapperTop < minSwiperWrapperTop) {
                    newSwiperWrapperTop = minSwiperWrapperTop;
                }

                // Set the new swiper-slide width.
                $(".swiper-wrapper").first().css({ 'top': newSwiperWrapperTop});

                //if (ww>switchVal2 && ww<=1000) swiper.params.slidesPerView = 3;
                //if (ww<=switchVal2) swiper.params.slidesPerView = 1;

                //swiper.reInit()
                _swiper.onResize();
            }
        }

        function openModal($this) {
            // Since the swiper needs to be reinitialized...
            // ... set _swiperIsInit = false.
            _swiperIsInit = false;

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

            // Get img, title, date of selected image and images around it.
            var imgs = [];

            imgData = getInitImgDataFromClickedCard($this);

            var $imgLoader = $this.find(".Card-img");
            if ($imgLoader.length > 0) {
                var imgSrc = $imgLoader.data("img");

            
                var swiperDiv = " \
                    <div class='swiper-container'> \
                        <div class='swiper-wrapper'> \
                            "+imgData+" \
                        </div> \
                        <!-- Add Pagination --> \
                        <div class='swiper-pagination'></div> \
                        <!-- Add Arrows --> \
                        <div class='swiper-button-next'></div> \
                        <div class='swiper-button-prev'></div> \
                    </div>";


                // Close Modal button
                var $closeButton = $("<div class='Modal-closeButton'></div>");
                $closeButton.click(function() {
                    closeModal();
                });

                var $loadingGif =  $("<div class='Loading'></div>");

                //var modalContent = loadingGif+closeButton+swiperDiv;

                $pm.html(swiperDiv).append($closeButton).append($loadingGif);

                // Resize the modal
                resizeModal();
                $(window).resize(resizeModal);

                // Fade in or animate them in.
                $pb.fadeIn(function() {
                    $pm.fadeIn(function() {
                        _swiper = new Swiper('.swiper-container', {
                            // pagination: '.swiper-pagination',
                            // paginationClickable: true

                            //pagination: '.swiper-pagination',
                            effect: 'coverflow',
                            grabCursor: true,
                            centeredSlides: true,
                            slidesPerView: 'auto',
                            initialSlide : _prevSwiperIndex,
                            //slidesPerView: 5,
                            //width: "600px",
                            coverflow: {
                                rotate: 50,
                                stretch: 0,
                                depth: 100,
                                modifier: 1,
                                slideShadows : true
                            },
                            nextButton: '.swiper-button-next',
                            prevButton: '.swiper-button-prev',
                            keyboardControl : true,
                            onInit : function() {
                                _swiperIsInit = true;
                                $(".PicturesPage-modal .swiper-container").eq(0).hide().css({"visibility" : "visible"}).fadeIn();
                                $(".PicturesPage-modal .Loading").fadeOut();
                            },
                            onSlideChangeStart : function(_swiper) {
                                //console.log("onSlideChangeStart");
                            },
                            onSlideChangeEnd : function(_swiper) {
                                //console.log("onSlideChangeEnd");
                            },
                            onTransitionStart : function(_swiper) {
                                //console.log("onTransitionStart "+_swiper.activeIndex);
                                //updateSlides();
                            },
                            onTransitionEnd : function(_swiper) {
                                //console.log("onTransitionEnd "+_swiper.activeIndex);
                                updateSlides();
                            },
                            onTouchStart : function(_swiper) {
                                //console.log("onTouchStart");
                            },
                            // onTouchMove : function(swiper) {
                            //     console.log("onTouchMove");
                            // },
                            // onSliderMove : function(swiper) {
                            //     console.log("onSliderMove");
                            // }
                        });
                        resizeModal();

                        //window.ss = _swiper;
                    }); 
                });
            }
        }

        $(document).on("click", ".CardTile--pictures", function() {
            openModal($(this));
        });

        $(document).on("click", ".PicturesPage-backdrop", function() {
            closeModal();
        });
    });
})(jQuery);

