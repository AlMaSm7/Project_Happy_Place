<?php
require_once "data.php";

?>
<!doctype html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
  <style>
    * {
      margin: 0;
      padding: 0;
    }

    .map {
      height: 100vh;
      width: 100%;
    }

    form {
      position: absolute;
      padding: 1rem;
      top: 0;
      right: 0;
    }

    input {
      display: block;
    }

    label {
      display: block;
      margin-top: .5rem;
      font-size: .75rem;
    }
    .nav{
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      background-color: #606060;
      height: 3rem;
      align-self: top;
    }
    .table, tr, th, td{
        border: 1px solid black;
        background-color: #C3BDBD;
        font-family: Arial, Helvetica, sans-serif;
    }
    a{
      color: #E0E0E0;
      text-decoration: none;
    }
    a:hover{
      text-decoration-line: underline;
      text-decoration-style: solid;
    }
    button{
      background-color: #606060;
      color: #E0E0E0;
      height: 100%;
      border-radius: 2px;
      border:none;
      font-family: Arial;
    }
    button:hover{
      text-decoration: underline;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
  <title>ol example</title>
</head>

<body>
  <div id="map" class="map"></div>
  <form method="POST" action="insert.php">
    <div>
      <label for="lat">Latitude</label>
      <input id="lat" name="lat" />
    </div>
    <div>
      <label for="lng">Longitude</label>
      <input id="lng" name="lng" />
    </div>
    <button type="submit">Add Marker</button>
  </form>
  <div class="nav"> 
    <tr>
      <a href="register.html"><th>Register Location | </th></a>
      <a href="login.html"><th>  Login | </th></a>
      <a href="account.html"><th>  Register Account |  </th></a>
    </tr>
    <button onclick="show_table()" id="btn_show">Show Table of Apprenitces</button>
    <button onclick="hide_table()" id="btn_hide">Hide Table of Apprentices</button>
  </div>
  <div>
    <?php
    /*
    $names = "SELECT prename, lastname FROM apprentices;";
    $result = mysqli_query($database, $names);

    $place = "SELECT name FROM places;";
    $result_place = mysqli_query($database, $place);

    $join = "SELECT a.prename, a.lastname, p.name FROM places p INNER JOIN apprentices a ON a.place_id = p.id;";
    $result = mysqli_query($database, $join);

    echo "<table id = table class = table >";
    echo "<tr><th> Vorname: </th> <th> Nachname:  </th> <th> Ortschaft:  </th> </tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["prename"] . "</td>  ";
      echo "<td>" . $row["lastname"] . "</td>  ";
      echo "<td>" . $row["name"] . "</td>  ";
      echo "</tr>\n";
      //echo "<td>" . $row_place["place"] . "</td>  ";
    }
    echo "</table>";
*/
    ?>
  </div>
  <script type="text/javascript">
    var markerPoints = [<?php
                        foreach ($markers as $marker) {
                          print $marker->toJson();
                          print ",\n\n";
                        }
                        ?>];

    var markers = [];

    for (let marker of markerPoints) {
      markers.push(new ol.Feature({
        geometry: new ol.geom.Point(ol.proj.fromLonLat([marker.lng, marker.lat]))
      }));
    }

    var markers = new ol.layer.Vector({
      source: new ol.source.Vector({
        features: markers
      }),
      style: new ol.style.Style({
        image: new ol.style.Icon({
          anchor: [0.5, 46],
          anchorXUnits: 'fraction',
          anchorYUnits: 'pixels',
          src: '../Bilder/pin.png'
        })
      })
    })

    var map = new ol.Map({
      target: 'map',
      layers: [
        new ol.layer.Tile({
          source: new ol.source.OSM()
        }),
        markers
      ],
      view: new ol.View({
        center: ol.proj.fromLonLat([8.5208324, 47.360127]),
        zoom: 10
      })
    });

    /*const table = document.getElementById('table');
    const table_show_btn = document.getElementById('btn_show');
    const table_hide_btn = document.getElementById('btn_hide');

    table_hide_btn.classList.add("hide");
    table.classList.add("hide");

    function show_table(){
      table.classList.remove("hide");
      table_show_btn.classList.add("hide");
      table_hide_btn.classList.remove("hide");
    }

    function hide_table(){
      table.classList.add("hide");
      table_show_btn.classList.remove("hide");
      table_hide_btn.classList.add("hide");
    }*/
  </script>
</body>

</html>
