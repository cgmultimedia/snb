(function($) {
    $(document).ready(function() {

        var swiper;
        var $allPictureCards = $(".CardTile--pictures");

        window.aa = $allPictureCards;

        function getCard(imgSrc, text, date) {
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
                                '+text+' \
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
            // Add image to popup card
            // var $w = $(window),
            //     wh = $w.height(),
            //     ww = $w.width();
            //     wr = wh / ww;

            // if (wr > 1) {
            //     console.log("width");
            // } else {
            //     console.log("h");
            // }

            // 468
            if (swiper !== undefined && swiper.onResize) {

                var padding = 40,
                    maxImgWidth = 640,
                    maxWidth = maxImgWidth+335, // 640 image max width, 335 the padding-right (as defined in _PicturePages.scss)
                    maxTotalWidth = maxWidth + 2 * padding,
                    maxWidthWhenNoPadding = 480,
                    // NOTE: this has to be the same as the value within '_PicturePage.scss' ...
                    // ... $switchToFullTopBottomStyle : 735px,
                    switchToFullTopBottomStyle = 735,
                    minSwiperWrapperTop = 40;
                    //switchVal1 = maxImgSize;
                    //switchVal2 = 640,

                var ww = $(window).width(),
                    wh = $(window).height(),
                    newSwiperSlideWidth,
                    newSwiperWrapperTop;

                // ----------------------------------------
                if (ww>maxTotalWidth) {
                    swiper.params.slidesPerView = 'auto';
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
                swiper.onResize();
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

                var swiperDiv = '<!-- Swiper --> \ 
                    <div class="swiper-container"> \
                        <div class="swiper-wrapper"> \
                            '+getCard("http://lorempixel.com/600/600/nature/1/",longText,date) +'\
                            '+getCard("http://lorempixel.com/600/600/nature/1/",longText,date) +'\
                            '+getCard("http://lorempixel.com/600/600/nature/1/",longText,date) +'\
                            '+getCard("http://lorempixel.com/600/600/nature/1/",longText,date) +'\
                        </div> \
                        <!-- Add Pagination --> \
                        <div class="swiper-pagination"></div> \
                        <!-- Add Arrows --> \
                        <div class="swiper-button-next"></div> \
                        <div class="swiper-button-prev"></div> \
                    </div>';


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
                        swiper = new Swiper('.swiper-container', {
                            // pagination: '.swiper-pagination',
                            // paginationClickable: true

                            //pagination: '.swiper-pagination',
                            effect: 'coverflow',
                            grabCursor: true,
                            centeredSlides: true,
                            slidesPerView: 'auto',
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
                                $(".PicturesPage-modal .swiper-container").eq(0).hide().css({"visibility" : "visible"}).fadeIn();
                                $(".PicturesPage-modal .Loading").fadeOut();
                            }
                        });
                        resizeModal();

                        window.ss = swiper;
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

