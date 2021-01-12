<!DOCTYPE HTML>
<?php

?>
<html>

<head>
    <title>OpenLayers Demo</title>
    <link rel="stylesheet" href="style.css">
    <script src="OpenLayers.js"></script>
    <script>
        /*
        function init() {
            map = new OpenLayers.Map("basicMap");
            var mapnik = new OpenLayers.Layer.OSM();
            var fromProjection = new OpenLayers.Projection("EPSG:4326"); // Transform from WGS 1984
            var toProjection = new OpenLayers.Projection("EPSG:900913"); // to Spherical Mercator Projection
            var position = new OpenLayers.LonLat(8.52, 47.36).transform(fromProjection, toProjection);
            var zoom = 10;

            map.addLayer(mapnik);
            map.setCenter(position, zoom);

        }*/
    </script>
    <meta charset="utf-8"/>
</head>



<body onload="init();">
    <form action="location.php" method="POST">
        <div class="information">
            <?php
            session_start();

            $database = mysqli_connect('mariadb', 'root', 'happyplace','happyplace' );

            if(!$database){
                echo "FEHLER BEI DER VERBINDUNG MIT SQL";
                echo $database;
            
            }else{
                echo "VERBINDUNG ERFOLGREICH\n";
            }


            $values = "SELECT prename, lastname * FROM apprentices;";
            $result = mysqli_query($database, $values);
            $place = "SELECT name * FROM places;";
            $result_place = mysqli_query($database, $place);

            echo $result;
            echo $result_place;

            if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_assoc($result)){
                    echo $row['prename'];
                    echo "<p> Name: ". $row['prename'] ."Nachname:". $row['lastname'];
                }
            }else{
                echo '0 resultate';
            }

            echo $row['prename'];
            ?>
        </div>
    </form>
    <div id="basicMap"></div>
</body>