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