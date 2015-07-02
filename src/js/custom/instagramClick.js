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
            _initCardIndex = 0, // Initial Card Index
            _initSwiperIndex = 0, // The initial index for the swiper.
            _cardToSwiperIndexDiff = 0, // The index difference between the Card and the swiper (e.g cardIdx = 6; swiperIdx = 1; So, diff = 5)
            _numCardBufs = 3; // 3 cards on either side of main (selected) index.
            _maxSwiperIndex = _numCardBufs * 2; // e.g. 012 3 456 (if buf is 3, so 3*2 = 6)

        window.aa = $allPictureCards;

        // Returns the min and max card index values.
        function setInitGlobalVars($card) {
            try {
                setInitCardIndex($card.index());
                var minCardIndex = Math.max(_initCardIndex - _numCardBufs,0); // Ensure smallest possible val is 0
                var maxCardIndex = Math.min(_initCardIndex + _numCardBufs,_numCards - 1); // Ensure smallest possible val is 0
                
                // Set the initial value for the swiper's index to be the appropriate value.
                setInitSwiperIndex(_initCardIndex - minCardIndex);

                setCardToSwiperIndexDiff(_initCardIndex - _initSwiperIndex);

                return {min : minCardIndex, max: maxCardIndex};
            } catch(e) {
                console.log("Err in setInitGlobalVars:" + e);
                return {min : 0, max: 0};
            }
        }

        function setInitCardIndex(index) {
            _initCardIndex = index;
        }

        function setInitSwiperIndex(index) {
            _initSwiperIndex = index;
        }

        function setCardToSwiperIndexDiff(diffVal) {
            _cardToSwiperIndexDiff = diffVal;
        }

        // Using the active Index... refresh all global values and add / remove any slides
        // ... and update indexes
        function updateSlides() {
            // Only updateSlides if the swiper has been initialized.
            if (_swiperIsInit) {
                console.log("up");
                //swiper
                var actIdx      = _swiper.activeIndex;

                // Difference from the the center to the new active position
                // E.g. buf is 3 so swiper indexes is 012 3 456...
                /// Then the new active index is 2.. so the diff is 3 - 2 = -1
                var swiperActBufDiff  = actIdx - _numCardBufs; 

                // E.g. If _cardToSwiperIndexDiff = 20...
                // When moving from swiper index 3 to 2, is like moving from card index 23 to 22.
                // the "newCardIndex" is that value (e.g. in example above 22)
                var newCardIndex      = swiperActBufDiff + _cardToSwiperIndexDiff; 
                
                console.log("swiperActBufDiff: "+swiperActBufDiff);

                // Vars for the following left or right shift
                var maxPossibleAddDel,
                    numToAddDel,
                    newCardToSwiperIndexDiff;

                // If moved left... 
                if (swiperActBufDiff < 0) { //_numCardBufs) {

                    // The max number you can delete / add (without going past first card)
                    var maxPossibleAddDel = Math.max(0, newCardIndex - _numCardBufs); 

                    // The actual number to add / delete 
                    var numToAddDel = Math.min(Math.abs(swiperActBufDiff), maxPossibleAddDel);

                    newCardToSwiperIndexDiff = _cardToSwiperIndexDiff - numToAddDel;

                    console.log("L Add/Del: "+numToAddDel);
                    console.log("n1: "+newCardIndex);
                    console.log("n2: "+_numCardBufs);
                    // Do nothing if the new card index is less than the _numCardBufs

                    // Do nothing...
                    // ... except at least ensure that the slides are showing properly...

                } else if (swiperActBufDiff > 0) { // If it moved right.

                    // The max number you can delete / add (without going past first card)
                    var maxPossibleAddDel = Math.max(0, (_numCards - newCardIndex - _numCardBufs) ); 

                    // The actual number to add / delete 
                    var numToAddDel = Math.min(Math.abs(swiperActBufDiff), maxPossibleAddDel);

                    newCardToSwiperIndexDiff = _cardToSwiperIndexDiff + numToAddDel;

                    console.log("R Add/Del: "+numToAddDel);                

                    // Also do nothing... or maybe at least ensure that the new values are correct.
                    // ... Although to get to the very end shouldn't even happen in real life.
                }

                // NOTE: the swiper index should always be adjusted to be the buf number...
                // ... and if so make adjustments to add / remove slides...
                // But if the Card index approaches 0 or max, then don't do anything.
                // ... or 0 or max number

                //setCardToSwiperIndexDiff(newCardToSwiperIndexDiff);
            }
        }

        function onNextSlide() {

            // swiper.appendSlide('<div class="swiper-slide">Slide ' + (++appendNumber) + '</div>');

        }

        function onPrevSlide() {

        }

        function getCardDivByIndex(idx) {
            try {
                var $card = $allPictureCards.eq(idx);
                var imgSrc = $card.find(".Card-img").data("img");
                var title = $card.find(".Card-title").html();
                var date = $card.find(".Card-date").html();

                return getCard(imgSrc,title,date);
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


        function getInitImgData() {
            //var least card

            var longText = "Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things. \
                Lots of long text for saying things perhaps for the saying of things";

            var date = "Jan 2, 2015";

            var imgSrc = "http://lorempixel.com/600/600/nature/1/";

            return getCard(imgSrc,longText,date) +'\
                    '+getCard(imgSrc,longText,date) +'\
                    '+getCard(imgSrc,longText,date) +'\
                    '+getCard(imgSrc,longText,date);
        } 

        function getCard(imgSrc, title, date) {
            return '<div class="swiper-slide"> \
                        <div class="swiper-slide-container"> \
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
                            initialSlide : _initSwiperIndex,
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
                                console.log("onSlideChangeStart");
                            },
                            onSlideChangeEnd : function(_swiper) {
                                console.log("onSlideChangeEnd");
                            },
                            onTransitionStart : function(_swiper) {
                                console.log("onTransitionStart "+_swiper.activeIndex);
                                updateSlides();
                            },
                            onTransitionEnd : function(_swiper) {
                                console.log("onTransitionEnd "+_swiper.activeIndex);
                            },
                            onTouchStart : function(_swiper) {
                                console.log("onTouchStart");
                            },
                            // onTouchMove : function(swiper) {
                            //     console.log("onTouchMove");
                            // },
                            // onSliderMove : function(swiper) {
                            //     console.log("onSliderMove");
                            // }
                        });
                        resizeModal();

                        window.ss = _swiper;
                    }); 
                });
            }
        }

        $(document).on("click", ".CardTile--pictures", function() {
            var $this = $(this);
            window.$t = $this;
            openModal($this);
        });

        $(document).on("click", ".PicturesPage-backdrop", function() {
            closeModal();
        });
    });
})(jQuery);

