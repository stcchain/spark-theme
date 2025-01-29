       var $mapEl = document.getElementById("googleMap");
       var $lat = $mapEl.getAttribute('data-lat');
       var $lng = $mapEl.getAttribute('data-lng');
       var $templateDir = $mapEl.getAttribute('data-template-dir');

       var myCenter=new google.maps.LatLng($lat,$lng);

        function initialize()
        {
        var mapProp = {
        center:myCenter,
        scrollwheel: false,
        zoom:10,    
        zoomControl:false,
        mapTypeControl:false,
        streetViewControl:false,
        mapTypeId:google.maps.MapTypeId.ROADMAP,
    styles: [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{ "color": "#ffffff" }, {"visibility": "on"} ]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{ "color": "#ffffff" },{"visibility":"off"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{ "color": "#ffffff" }]},{"featureType":"water","elementType":"geometry","stylers":[{ "color": "#ededed" }, {"visibility": "on"} ]}]
          };

        var map=new google.maps.Map($mapEl,mapProp);

        var marker=new google.maps.Marker({
          position:myCenter,
          icon: $templateDir + '/img/icon/marker.png'
          });
        marker.setMap(map);
        }
    
        google.maps.event.addDomListener(window, 'load', initialize);
    