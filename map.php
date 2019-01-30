<?php require_once('layout.php');?>
    <div id="map"></div>
    <script>
      var map;
      function initMap() 
      {
          var myLatLng = {lat: 51.56222, lng: 17.5052};

          var map = new google.maps.Map(document.getElementById('map'), 
          {
            zoom: 8,
            center: myLatLng
          });
      


        var xmlhttp = new XMLHttpRequest(); // pobieranie danych z test.php w formacie json
        xmlhttp.onreadystatechange = function() 
        {
         if (this.readyState == 4 && this.status == 200) 
        {
              var json_data= JSON.parse(this.responseText); // parsowanie json do tablicy obiektów
              for(var i=0; i<json_data.length;i++)
              {
                var latitude=convert(json_data[i].latitude);
                var longitude =convert(json_data[i].longitude);
                var coordinates= {lat: latitude , lng: longitude};
                var title= json_data[i].name;
                var image= json_data[i].image;
                console.log(json_data[i]);
                var marker = new google.maps.Marker(
                  {
                    position: coordinates,
                    title: title,
                    image: image,
                    map: map, 
                  });
               
                marker.addListener('click', choose_marker_data);
              }
              
    
              
              function choose_marker_data()
              {
                var infowindow = new google.maps.InfoWindow();
                infowindow.setContent("<div class='card'><a href = '/excavation.php?name="+this.title+
                                      "'><img class='card-img-top' src='"+this.image+
                                      "' alt='Card image cap'><div class='card-body'><h5 class='card-title'>"+this.title+
                                      "</h5></a></div>");
                                      
                                      
                                  
  
                  
                infowindow.open(map, this);
              }

                               
              
        };
      }
        xmlhttp.open("GET", "test.php?value=x", true);
        xmlhttp.send();

        function convert(str)
        {
          var coord = parseFloat(str.substring(0, 7));
          return coord;
        }
        


      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIg_7L4iRugM2Y-BerJAYuepGQWlfLLUw&callback=initMap"
    async defer></script>
  </body>
</html>