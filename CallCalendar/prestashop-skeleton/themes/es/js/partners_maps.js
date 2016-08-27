  google.load('visualization', '1', {'packages':['corechart', 'table', 'geomap']});

      // this variable will collect the html which will eventually be placed in the side_bar 
      var side_bar_html = ""; 

var initialLocation = new google.maps.LatLng(48.63536183338487, 9.555786297753913);
var map;
var FusionTableID ="1EKCP8qP7jWLiyAja6lxZccycYRkAKltq2CyRPD8"; //1831322;
var gmarkers = [];

function initialize() {
  var myOptions = {
    center: new google.maps.LatLng(48.63536183338487, 9.555786297753913),
    zoom: 2,
	mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("googft-mapCanvas"), myOptions);
  map.setCenter(initialLocation);
/*  
layer = new google.maps.FusionTablesLayer({
map: map,
heatmap: { enabled: false },
query: {
select: "col2",
from: "1EKCP8qP7jWLiyAja6lxZccycYRkAKltq2CyRPD8",
where: "col5 in (\x27\x27, \x27ES\x27, \x27ES,IPR\x27)
},
options: {
styleId: 2,
templateId: 2
}
});
*/
  addMarkersQuery("SELECT col2 FROM "+FusionTableID+" where col5 in ('','ES','ES,IPR')");
/*
  google.maps.event.addListener(map, "click", function(e) {
    addMarkersQuery("SELECT geometry FROM "+FusionTableID+" ORDER BY ST_DISTANCE(geometry, LATLNG("+e.latLng.toUrlValue(6)+")) LIMIT 10");
  });*/

}

var infowindow = new google.maps.InfoWindow(
  { 
    size: new google.maps.Size(150,50)
  });
 
 function createMarker(latlng, name, html, number) {
    var contentString = "<b>"+name+"</b><br>"+html;
    if (!isNaN(number)) var icon = "https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld="+number+"|FF0000|0000FF";
    else var icon = null;
    var marker = new google.maps.Marker({
        position: latlng,
	icon: icon,
        map: map,
        title: name,
        zIndex: Math.round(latlng.lat()*-100000)<<5
        });
    //alert("createMarker("+latlng+")");
    // save the info we need to use later for the side_bar
    gmarkers.push(marker);
    // add a line to the side_bar html
    side_bar_html += '<a href="javascript:myclick(' + (gmarkers.length-1) + ')">' + name + '<\/a><br>';

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        });
}

// This function picks up the click and opens the corresponding info window
function myclick(i) {
  google.maps.event.trigger(gmarkers[i], "click");
}

function addMarkersQuery(query) {
  if (gmarkers.length > 0) {
    for (var i = 0; i < gmarkers.length; i++) {
      gmarkers[i].setMap(null)
    }
    gmarkers = [];
    side_bar_html = ""; 
  }
// zoom and center map on query results
  //set the query using the parameter
  var queryText = encodeURIComponent(query);
  var query = new google.visualization.Query('http://www.google.com/fusiontables/gvizdata?tq='  + queryText);
  

  //set the callback function
  query.send(addMarkersFromQuery);

}

function addMarkersFromQuery(response) {
if (!response) {
  alert('no response');
  return;
}
if (response.isError()) {
  alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
  return;
} 
  FTresponse = response;
  //for more information on the response object, see the documentation
  //http://code.google.com/apis/visualization/documentation/reference.html#QueryResponse
  numRows = response.getDataTable().getNumberOfRows();
  numCols = response.getDataTable().getNumberOfColumns();
  // alert("numRows="+numRows);
  var bounds = new google.maps.LatLngBounds();
  for(i = 0; i < numRows; i++) {
      var kml =  response.getDataTable().getValue(i,0);
     // create a geoXml3 parser for the click handlers
     var geoXml = new geoXML3.parser({
                   map: map,
                   zoom: false,
                   suppressInfoWindows: true,
                   singleInfoWindow: false                    
                });

     geoXml.parseKmlString("<Placemark>"+kml+"</Placemark>");
     geoXml.docs[0].placemarks[0].marker.setMap(null);
     var point = geoXml.docs[0].placemarks[0].marker.getPosition();
     createMarker(point,"Marker "+i,"Marker "+i, i);
     bounds.extend(point);
  }
  // zoom to the bounds
  map.fitBounds(bounds);
  // put the assembled side_bar_html contents into the side_bar div
  document.getElementById("right-column").innerHTML = side_bar_html;
}
google.maps.event.addDomListener(window, 'load', initialize);