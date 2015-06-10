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