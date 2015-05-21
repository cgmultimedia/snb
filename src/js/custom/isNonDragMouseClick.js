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
