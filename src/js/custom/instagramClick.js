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
                
                var j ="<div class='PicturesPage-modal-content'> \
                            <div class='PicturesPage-modal-content-img PicturesPage-modal-content-img--center'> \
                                <img src='"+imgSrc+"'/> \
                            </div> 
                        </div>";

                // tempImg.src = imgSrc;

                //$(tempImg).addClass("PicturesPage-modal-img");

                $pm.html(j);

                // Resize the modal
                resizeModal();
                $(window).resize(resizeModal);

                // Fade in or animate them in.
                $pb.fadeIn(function() {
                    $pm.fadeIn(function() {
                        console.log("fade2");
                    });
                });

                
            }
        }

        function closeModal($this) {

        }

        $(document).on("click", ".CardTile--pictures", function() {
            var $this = $(this);
            openModal($this);
            
            console.log("Goodbye!");
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
