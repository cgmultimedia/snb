// Functions for closing the desktop video player popup.
(function(scope) {
	var self = scope;

	self.youTubeVideoPopupRemove = function() {
	    var self = this;
	    var $YouTubePopup = $(".YouTubeVideo-video-modalWindow").first();
	    $YouTubePopup.fadeOut(function() {
	        $(".YouTubeVideo-video-iframeContainer-iframe").each(function() {
	            $(this).attr("src","");
	        });
	        $(this).remove();
	    });
	    self.YouTubeVideocrimFadeOut();
	};
	    // Fade in the scrim overlay
	self.YouTubeVideocrimFadeOut = function() {
	    var $overlay = $(".u-modal-overlay");
	    $overlay.fadeOut(function() {
	        $(this).remove();
	    });
	};

})(window);