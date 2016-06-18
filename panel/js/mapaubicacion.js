   var map = null;
   var marker = null;
   var geocoder = null;
   var infowindow = null;
   // posicion predeterminada
   var ini_lat = 23;
   var ini_lng = -102;

   // traducciones del tipo de localización
   var a_locations_type = new Array('APPROXIMATE', 'GEOMETRIC_CENTER', 'RANGE_INTERPOLATED', 'ROOFTOP');
   a_locations_type[a_locations_type[0]] = ['El resultado devuelto es aproximado.'];
   a_locations_type[a_locations_type[1]] = ['El resultado devuelto es el centro geométrico de un resultado como una línea (por ejemplo, una calle) o un polígono (una región).'];
   a_locations_type[a_locations_type[2]] = ['El resultado devuelto refleja una aproximación (normalmente en una carretera) interpolada entre dos puntos precisos (por ejemplo, intersecciones). Normalmente, los resultados interpolados se devuelven cuando los códigos geográficos de la parte superior no están disponibles para una dirección postal.'];
   a_locations_type[a_locations_type[3]] = ['El resultado devuelto refleja un código geográfico preciso.'];

   // traducciones del estatus de la geocodificación
   var a_geocode_status = new Array('ERROR', 'INVALID_REQUEST', 'OK', 'OVER_QUERY_LIMIT', 'REQUEST_DENIED', 'UNKNOWN_ERROR', 'ZERO_RESULTS');
   a_geocode_status[a_geocode_status[0]] = ['Se ha producido un error al establecer la comunicación con los servidores de Google.'];
   a_geocode_status[a_geocode_status[1]] = ['La solicitud GeocoderRequest no es válida.'];
   a_geocode_status[a_geocode_status[2]] = ['Indica que la respuesta contiene un valor GeocoderResponse válido.'];
   a_geocode_status[a_geocode_status[3]] = ['La página web ha superado el límite de solicitudes en un período de tiempo demasiado breve.'];
   a_geocode_status[a_geocode_status[4]] = ['No se permite que la página web utilice el geocoder.'];
   a_geocode_status[a_geocode_status[5]] = ['No se pudo procesar una solicitud de codificación geográfica debido a un error del servidor. Puede que la solicitud se realice correctamente si lo intentas de nuevo.'];
   a_geocode_status[a_geocode_status[6]] = ['No se ha encontrado ningún resultado para esta solicitud GeocoderRequest.'];

   // funciones para nuestro mapa
   function initGMaps() {
      // crear los objetos necesarios, primero el mapa
      map = new google.maps.Map(document.getElementById("mapa_ubicacion"), {
         'zoom': 5
         , 'center': new google.maps.LatLng(ini_lat, ini_lng)
         , 'mapTypeId': google.maps.MapTypeId.ROADMAP
         , 'scaleControl': true
         , 'scrollwheel': false
      });
      // el marcador (pin)
      marker = new google.maps.Marker({
         map: map
         , position: new google.maps.LatLng(ini_lat, ini_lng)
         , draggable: true
         , visible: false
      });
      // la ventana de info (globo)
      infowindow = new google.maps.InfoWindow();
      // el geocodificador
      geocoder = new google.maps.Geocoder();
      // crear los eventos para acciones del mouse sobre el marcador (pin)
      google.maps.event.addListener(marker, "dragend", function() {
         showLatLongPos();
      });
      google.maps.event.addListener(marker, "click", function() {
         showLatLongPos();
      });
   }

   function showAddress(address) {
      if (geocoder) {
         // obtener la Geo-Codificación Forward,
         // introduciendo un dato string (address)
         geocoder.geocode({'address': address, 'region': 'MX'}
         , function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
               if (results[0]) {
                  // preparar la info de la posición latitud y longitud
                  var input = results[0].geometry.location.toUrlValue();
                  var latlngStr = input.split(",", 2);
                  var lat_mx = parseFloat(latlngStr[0]);
                  var lng_mx = parseFloat(latlngStr[1]);
                  var latLong_mx = new google.maps.LatLng(lat_mx, lng_mx);
                  // centrar el mapa en la posición encontrada
                  map.setZoom(16);
                  map.setCenter(latLong_mx);
                  marker.setPosition(latLong_mx);
                  marker.setVisible(true);
                  //
                  google.maps.event.trigger(marker, 'click');
                  // llenar con la info de la codificación inversa, o sea, la dirección humanamente legible
                  var location_type_mx = results[0].geometry.location_type
                  infowindow.setContent('<b>' + results[0].formatted_address + '</b>' + '<br/><br/><i style="color: #777;">' + a_locations_type[location_type_mx] + '</i>');
                  infowindow.open(map, marker);
				  //Actualiza la direccion completa en un campo input
				  document.getElementById("address").value = results[0].formatted_address;

               } else {
                  alert(a_geocode_status[status]);
               }
            } else {
               alert(a_geocode_status[status]);
            }
         });
      } // endif
   }

   function showLatLongPos(){
      // preparar la info de la posición latitud y longitud
      var location = marker.getPosition().toUrlValue(7);
      var latlngStr = location.split(",", 2);
      var lat_mx = parseFloat(latlngStr[0]);
      var lng_mx = parseFloat(latlngStr[1]);
      var latLong_mx = new google.maps.LatLng(lat_mx, lng_mx);

      // obtener la Geo-Codificación Inversa, o sea, la dirección humanamente legible
      // introduciendo un dato latLong
      geocoder.geocode({'latLng': latLong_mx, 'region': 'MX'}
      , function(results) {
         var location_type_mx = results[0].geometry.location_type
         infowindow.setContent('<strong id="indicacionmapa">Arrastre el marcador <br />rojo para mejorar la<br /> exactitud de la ubicación.</strong>');
         infowindow.open(map, marker);
		//Agrega direccion completa en un campo input
		document.getElementById("address").value = results[0].formatted_address;
      });
      // llenar los campos de texto con los valores latitud y longitud respectivamente
      document.getElementById("latitud").value = lat_mx;
      document.getElementById("longitud").value = lng_mx;
   }

   // cargar el mapa automáticamente cuando se carga la página
   // es el equivalente a poner <body onload="initGMaps();">
   google.maps.event.addDomListener(window, 'load', initGMaps);

   var gmap;

