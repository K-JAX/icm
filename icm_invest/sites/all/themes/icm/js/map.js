function createMap(lat, lng, zoomVal)
{
	  var mapOptions ={
          center: new google.maps.LatLng(lat, lng),    
          zoom: zoomVal,   
          scrollwheel: false,  
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          styles : [{featureType:'all',stylers:[{saturation:-100},{gamma:0.0}]}]
      };
      map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
      markerData = {
		  0:{
		  lat:41.408378,
		  lng:-75.664771,
		  title:"iCM",
		  data:{drive:false, 
		  		zip:"18503",
				region:"Scranton", 
				city:"Pennsylvania", 
				address:"410 Spruce Street"
				}
			}
		};
 
      for(markerId in markerData)
      {
          markers[markerId] = createMarker(markerData[markerId]);
      }
}

function createMarker(data)
{
      var myLatLng = new google.maps.LatLng(data.lat, data.lng);
	 var flagIcon_front = new google.maps.MarkerImage("/sites/all/themes/icm/images/mapmarker.png");
      var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: data.title,
          icon: flagIcon_front,
      });
    
    return marker;
}

var map;
var markers = {};

 
function initialize() {
  createMap(41.408378,-75.664771,13);
}

google.maps.event.addDomListener(window, 'load', initialize);