(function($) {
    $(document).ready(function() {

        var swiper;

        function getCard(imgSrc, text) {
            return '<div class="swiper-slide"> \
                        <div class="swiper-slide-container"> \
                            <div class="swiper-slide-container-photoRoot"> \
                                <img class="swiper-slide-container-photoRoot-img" src="'+imgSrc+'"/> \
                            </div> \
                            <div class="swiper-slide-container-text"> \
                                '+text+' \
                            </div> \
                        </div> \
                    </div>';
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
                console.log("resize");
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


                // var swiperDiv = '<!-- Swiper --> \ 
                //     <div class="swiper-container"> \
                //         <div class="swiper-wrapper"> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/1"/></div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/2"/></div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/3"/></div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/4"/></div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/5"/></div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/6"/></div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/7"/></div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/8"/></div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/9"/></div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/10"/></div> \
                //         </div> \
                //         <!-- Add Pagination --> \
                //         <div class="swiper-pagination"></div> \
                //     </div>';


// <div style="position: relative;   top: 0;   left: 0;   right: 0px;background: blue;"> \
//                         <div style="background-color: #A86C6C;   padding-right: 335px;"> \
//                             <div style="background-color: #FF0000;   display: block;   width: 100%;"> \
//                                 <div style="display: block;   padding-bottom: 100%;"> \
//                                     before: content: ;   \
//                                 </div> \
//                             </div> \
//                         </div> \
//                     </div> \

                var longText = "Lots of long text for saying things perhaps for the saying of things.";

                var swiperDiv = '<!-- Swiper --> \ 
                    <div class="swiper-container"> \
                        <div class="swiper-wrapper"> \
                            '+getCard("http://lorempixel.com/600/600/nature/1/",longText) +'\
                            '+getCard("http://lorempixel.com/600/600/nature/1/",longText) +'\
                        </div> \
                        <!-- Add Pagination --> \
                        <div class="swiper-pagination"></div> \
                    </div>';


                // var swiperDiv = '<!-- Swiper --> \ 
                    
                //     <div class="swiper-container"> \
                //         <div class="swiper-wrapper"> \
                //             <div class="swiper-slide"> \
                //                 <div class="swiper-slide-container"> \
                //                     <div class="swiper-slide-container-photoRoot"> \
                //                         <img class="swiper-slide-container-photoRoot-img" src="http://lorempixel.com/600/600/nature/1"/> \
                //                     </div> \
                //                 </div> \
                //             </div> \
                //             <div class="swiper-slide"><img class="swiper-slide-img" src="http://lorempixel.com/600/600/nature/2"/></div> \
                //         </div> \
                //         <!-- Add Pagination --> \
                //         <div class="swiper-pagination"></div> \
                //     </div>';

                    // <img class="swiper-slide-photoRoot-img" src="http://lorempixel.com/600/600/nature/1"/> \

                // var swiperDiv = '<div class="swiper-container"> \
                //     <div class="swiper-wrapper"> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/1)"></div> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/2)"></div> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/3)"></div> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/4)"></div> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/5)"></div> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/6)"></div> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/7)"></div> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/8)"></div> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/9)"></div> \
                //         <div class="swiper-slide" style="background-image:url(http://lorempixel.com/600/600/nature/10)"></div> \
                //     </div> \
                //     <!-- Add Pagination --> \
                //     <div class="swiper-pagination"></div> \
                // </div>';
                
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

                //var swiper;

                // Fade in or animate them in.
                $pb.fadeIn(function() {
                    $pm.fadeIn(function() {
                        console.log("swiper");
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
                            }
                        });
                        resizeModal();

                        window.ss = swiper;
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
