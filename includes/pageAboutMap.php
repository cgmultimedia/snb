<?php $mapHeight = "500px";

?>
<div id="googft-mapCanvas"></div>

<style type="text/css">
  #googft-mapCanvas {
  height: <?php echo $mapHeight;?>; /*//100%;*/
  margin: 0;
  padding: 0;
  width: 100%;
}
</style>

<script type="text/javascript">

  function getW() {
    var w = window,
      d = document,
      e = d.documentElement,
      g = d.getElementsByTagName('body')[0],
      x = w.innerWidth || e.clientWidth || g.clientWidth;
      //y = w.innerHeight|| e.clientHeight|| g.clientHeight;

      return x;
  }

  window.lat = -0.20834721874996376;
  function initialize() {
    google.maps.visualRefresh = true;
    var isMobile = (navigator.userAgent.toLowerCase().indexOf('android') > -1) ||
      (navigator.userAgent.match(/(iPod|iPhone|iPad|BlackBerry|Windows Phone|iemobile)/));
    // if (isMobile) {
    //   var viewport = document.querySelector("meta[name=viewport]");
    //   viewport.setAttribute('content', 'initial-scale=1.0, user-scalable=no');
    // }
    var mapDiv = document.getElementById('googft-mapCanvas');
    // mapDiv.style.width = isMobile ? '100%' : '500px';
    // mapDiv.style.height = isMobile ? '100%' : '300px';
    mapDiv.style.width = isMobile ? '100%' : '100%';
    mapDiv.style.height = "<?php echo $mapHeight;?>"; //isMobile ? '500px' : '500px';
    //mapDiv.style.height = isMobile ? '100%' : '100%';

    // Calculate the position based on width of browser:
    // -90 for 320
    // -90 for 500
    // 0 at 1000
    // This follows formula: (90/500) * w - 180 = y (where w is width, and y - slongitude val)
    // This follows formula: (0.18) * w - 180 = y (where w is width, and y - slongitude val)

    var w = getW();
    var longitude;
    // var rightMostLong = -0.2;
    // var rightMostWidth = 1000;
    // var leftMostLong = -90;
    // var leftMostWidth = 500;
    var rml = -0.2;
    var rmw = 1000;
    var lml = -90;
    var lmw = 500;
    var a = (lml - rml) / (lmw - rmw); // NOTE lmw - rmw cannot be zero.
    var b = a * rmw + rml;

    if (w <= lmw) {
      longitude = lml;
    } else if (w >= rmw) {
      longitude = rml;
    } else {
      longitude = w * a + b;
    }


    var map = new google.maps.Map(mapDiv, 
      {
        //center: new google.maps.LatLng(37.48266968013531, -0.20834721874996376),
        center: new google.maps.LatLng(37.48266968013531, longitude),
        zoom: 2,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false
      }
    );
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend-open'));
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('googft-legend'));

    map.set('styles', [
      // {
      //   featureType: 'road',
      //   elementType: 'geometry',
      //   stylers: [
      //     { color: '#000000' },
      //     { weight: 1.6 }
      //   ]
      // }, {
      //   featureType: 'road',
      //   elementType: 'labels',
      //   stylers: [
      //     { saturation: -100 },
      //     { invert_lightness: true }
      //   ]
      // }, {
      {
        featureType: 'landscape',
        elementType: 'geometry',
        stylers: [
          //{ hue: '#ffff00' },
          { color: '#F9EB30' }, // SNB yellow
          // { gamma: 0.3 },
          // { saturation: 582 },
          { lightness: 45 }
        ]
      }, {
        featureType: 'poi.school',
        elementType: 'geometry',
        stylers: [
          { hue: '#fff700' },
          { lightness: -15 },
          { saturation: 99 }
        ]
      }, {
        featureType: "water", 
        stylers: [ 
            { color: "#428ada" }, // #428ada = SNB blue
            // { saturation: 20 }, 
            // { lightness: -50 }, 
        ]
      }
    ]);

    // Disable scroll wheel

    layer = new google.maps.FusionTablesLayer({
      map: map,
      heatmap: { enabled: false },
      query: {
        select: "col3",
        from: "1gkf-eY5aQ5hz-BHF54Ae72SOCULlHNrmIrXiAzxY",
        where: ""
      },
      options: {
        styleId: 2,
        templateId: 2,
        scrollwheel: false,
      }
    });

// options = $.extend({
//     scrollwheel: false,
//     navigationControl: false,
//     mapTypeControl: false,
//     scaleControl: false,
//     draggable: false,
//     mapTypeId: google.maps.MapTypeId.ROADMAP
// }, options);

    // if (isMobile) {
    //   var legend = document.getElementById('googft-legend');
    //   var legendOpenButton = document.getElementById('googft-legend-open');
    //   var legendCloseButton = document.getElementById('googft-legend-close');
    //   if (legend && legend.style) {
    //     legend.style.display = 'none';
    //   }
    //   legendOpenButton.style.display = 'block';
    //   legendCloseButton.style.display = 'block';
    //   legendOpenButton.onclick = function() {
    //     legend.style.display = 'block';
    //     legendOpenButton.style.display = 'none';
    //   }
    //   legendCloseButton.onclick = function() {
    //     legend.style.display = 'none';
    //     legendOpenButton.style.display = 'block';
    //   }
    // }
  }

  google.maps.event.addDomListener(window, 'load', initialize);

  // function initialize() {
  //   var mapOptions = {
  //       zoom: 9,
  //       center: new google.maps.LatLng(28.9285745, 77.09149350000007),
  //       mapTypeId: google.maps.MapTypeId.TERRAIN
  //    };
 
  //   var map = new google.maps.Map(document.getElementById('location-canvas'), mapOptions);
 
  //   var marker = new google.maps.Marker({
  //       map: map,
  //       draggable: false,
  //       position: new google.maps.LatLng(28.9285745, 77.09149350000007)
  //   });
  // }
   
  google.maps.event.addDomListener(window, 'resize', initialize);
  //google.maps.event.addDomListener(window, 'load', initialize)
</script>
