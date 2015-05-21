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