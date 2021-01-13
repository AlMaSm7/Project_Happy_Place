<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/css/ol.css" type="text/css">
    <link rel="icon" href="./Bilder/icom.png">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .map {
            height: 100vh;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -9;
        }

        .information,
        th,
        td {
            font-size: 20px;
        }

        .hide {
            display: none;
        }

        .nav {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background-color: #606060;
            height: 3rem;
        }

        .table,
        tr,
        th,
        td {
            border: 1px solid black;
            background-color: #C3BDBD;
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            color: #E0E0E0;
            text-decoration: none;
        }

        a:hover {
            text-decoration-line: underline;
            text-decoration-style: solid;
        }

        button {
            background-color: #606060;
            color: #E0E0E0;
            height: 100%;
            border-radius: 2px;
            border: none;
        }

        button:hover {
            text-decoration: underline;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.5.0/build/ol.js"></script>
    <title>Project Happy Place</title>
</head>

<body>
    <div class="nav">
        <tr>
            <a href="register.html">
                <th>Register Location | </th>
            </a>
            <a href="login.html">
                <th> Login | </th>
            </a>
            <a href="account.html">
                <th> Register Account | </th>
            </a>
            <a href="database.php">
                <th> Edit Database | </th>
            </a>
            <a href="Map.php">
                <th> Edit Database | </th>
            </a>
        </tr>
        <button onclick="show_table()" id="btn_show">Show Table of Apprenitces</button>
        <button onclick="hide_table()" id="btn_hide">Hide Table of Apprentices</button>
    </div>
    <div id="map" class="map"></div>
    <script type="text/javascript">
        //gets PHP variabels
        /*$.getJSON('http://localhost/map.php', function(data) {
          let lat = <?php //echo "json_encode($lat_js)";
                    ?>;
          let lng = <?php //echo "json_encode($lon_js)";
                    ?>;
        });*/
        var map = new ol.Map({
            target: 'map',
            layers: [
                new ol.layer.Tile({
                    /* Here are the different Maps
["http://a.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://b.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://c.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png"]
["http://a.tile3.opencyclemap.org/landscape/{z}/{x}/{y}.png","http://b.tile3.opencyclemap.org/landscape/{z}/{x}/{y}.png","http://c.tile3.opencyclemap.org/landscape/{z}/{x}/{y}.png"]
["http://a.tile.openstreetmap.org/{z}/{x}/{y}.png","http://b.tile.openstreetmap.org/{z}/{x}/{y}.png","http://c.tile.openstreetmap.org/{z}/{x}/{y}.png"]
["http://otile1.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png","http://otile2.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png","http://otile3.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png","http://otile4.mqcdn.com/tiles/1.0.0/osm/{z}/{x}/{y}.png"]
["http://a.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://b.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://c.tile.stamen.com/watercolor/{z}/{x}/{y}.png","http://d.tile.stamen.com/watercolor/{z}/{x}/{y}.png"]
["http://a.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://b.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png","http://c.tile2.opencyclemap.org/transport/{z}/{x}/{y}.png"]
*/
                    source: new ol.source.XYZ({
                        urls: ["http://a.tile.openstreetmap.org/{z}/{x}/{y}.png", "http://b.tile.openstreetmap.org/{z}/{x}/{y}.png", "http://c.tile.openstreetmap.org/{z}/{x}/{y}.png"]
                    })

                    /*source: new ol.source.OSM()*/
                }),
                new ol.layer.Vector({
                    source: new ol.source.Vector({
                        format: new ol.format.GeoJSON(),
                        url: './countries.geojson' // GeoCountries file from github
                    })
                })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([0, 0]),
                zoom: 0
            })
        });

        function add_map_point(lng, lat) {
            /*let lat = <?php //echo "json_encode($lat_js)";
                        ?>;
            let lng = <?php //echo "json_encode($lon_js)";
                        ?>;*/
            var vectorLayer = new ol.layer.Vector({
                source: new ol.source.Vector({
                    features: [new ol.Feature({
                        geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
                    })]
                }),
                style: new ol.style.Style({
                    image: new ol.style.Icon({
                        anchor: [0.5, 0.5],
                        anchorXUnits: "fraction",
                        anchorYUnits: "fraction",
                        src: "./Bilder/pin.png"
                    })
                })
            });
            map.addLayer(vectorLayer);
        }
        /*function zoom(lng, lat){

        }*/
    </script>
    <div class="information">
        <?php
        session_start();

        $database = mysqli_connect('mariadb', 'root', 'happyplace', 'happyplace');

        if (!$database) {
            echo "FEHLER BEI DER VERBINDUNG MIT SQL";
            echo $database;
        } else {
            echo "VERBINDUNG ERFOLGREICH <br>";
        }




        /*$lat_js = json_decode($lat, true);
    $lon_js = json_decode($lon, true);*/

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

        ?>
    </div>
    <script>
        <?php
        $query = "SELECT latitude, longitude FROM places;";
        $result = mysqli_query($database, $query);

        echo "var data = " . json_encode($result->fetch_all(MYSQLI_ASSOC)) . ";";
        ?>

        for (var point of data) {
            add_map_point(point.latitude, point.longitude);
        }

        const table = document.getElementById('table');
        const table_show_btn = document.getElementById('btn_show');
        const table_hide_btn = document.getElementById('btn_hide');

        table_hide_btn.classList.add("hide");
        table.classList.add("hide");

        function show_table() {
            table.classList.remove("hide");
            table_show_btn.classList.add("hide");
            table_hide_btn.classList.remove("hide");
        }

        function hide_table() {
            table.classList.add("hide");
            table_show_btn.classList.remove("hide");
            table_hide_btn.classList.add("hide");
        }
    </script>

</body>

</html>