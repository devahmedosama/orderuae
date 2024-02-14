
<!DOCTYPE html>
<html>
  <head>
    <title>Brisk Drivers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('assets/css/style.css?v=1.01')  }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chewy&display=swap" rel="stylesheet">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
   
  </head>
  <body>
      <div id="map" heigth="500" style="height: 500px"></div>
      
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSdyoCcCy9NtfBk8vqS5EO3A_hlu17fIk&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    <script type="text/javascript">
              if (window.width < 992) {
                var  h = document.getElementById('address').offsetHeight + 120;
              }else{
                var  h = document.getElementById('address').offsetHeight;
              }
              document.getElementById('map').style.height = 'calc(100% - '+h+'px)';
              

              // Note: This example requires that you consent to location sharing when
              // prompted by your browser. If you see the error "The Geolocation service
              // failed.", it means you probably did not give permission for the browser to
              // locate you. 
              let map, infoWindow;

              function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                  center: { lat: 24.493109, lng: 54.377257 },
                  zoom: 14,
                });
                const geocoder = new google.maps.Geocoder();
                const infowindow = new google.maps.InfoWindow();
                const locationButton = document.createElement("button");
                var marker;
                var address = 'Your Location';
                locationButton.textContent = "Pan to Current Location";
                locationButton.classList.add("custom-map-control-button");
                map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
                locationButton.addEventListener("click", () => {
                    // Try HTML5 geolocation.
                    if (navigator.geolocation) {
                      navigator.geolocation.getCurrentPosition(
                        (position) => {
                          const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                          };
                          setLocation(pos,'current');
                          map.setCenter(pos);
                          map.setZoom(16);
                        },
                        () => {
                          handleLocationError(true, infoWindow, map.getCenter());
                        }
                      );
                    } else {
                      // Browser doesn't support Geolocation
                      handleLocationError(false, infoWindow, map.getCenter());
                    }
                  });
                  // Try HTML5 geolocation.
                  if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                      (position) => {
                        const pos = {
                          lat: position.coords.latitude,
                          lng: position.coords.longitude,
                        };
                        // marker = new google.maps.Marker({ //on créé le marqueur
                        //       position: pos,
                        //       map: map,
                        //       title:'Your Location'
                        //   });
                        setLocation(pos,'current');
                        map.setCenter(pos);
                        map.setZoom(16);
                      },
                      () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                      }
                    );
                  } else {
                    // Browser doesn't support Geolocation
                    handleLocationError(false, infoWindow, map.getCenter());
                  }
                google.maps.event.addListener(map, "click", function (e) {
                      setLocation(e.latLng,'click');

                      });
                  function setLocation(latLng,state) {
                    if (state == 'click') {
                      
                      document.getElementById('latLng').value =  latLng.lat()+','+latLng.lng();
                    }else{
                      document.getElementById('latLng').value =  latLng.lat+','+latLng.lng;
                    }
                      geocoder.geocode({ location: latLng })
                          .then((response) => {
                            if (response.results[0]) {
                                  var  address =  response.results[0].formatted_address;
                                  document.getElementById('client_address').innerHTML = address;
                                  if (marker) {
                                      marker.setPosition(latLng);
                                  }else{
                                      marker = new google.maps.Marker({
                                        position: latLng,
                                        map: map,
                                        title:address
                                      });
                                  }
                                                  
                               infowindow.setContent(response.results[0].formatted_address);
                              infowindow.open(map, marker);
                            } else {
                              window.alert("No results found");
                            }
                          })
                          .catch((e) => window.alert("Geocoder failed due to: " + e));
                  }
              }

              function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                infoWindow.setPosition(pos);
                infoWindow.setContent(
                  browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
                );
                infoWindow.open(map);
              }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
  </body>
</html>