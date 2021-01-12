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

$names = "SELECT * FROM apprentices;";
$result = mysqli_query($database, $names);

$place = "SELECT * FROM places;";
$result_place = mysqli_query($database, $place);

$marker = "SELECT * FROM marker;";
$result_marker = mysqli_query($database, $marker);
?>
<html>

<head>
    <title>CRUD</title>
    <link rel="icon" href="./Bilder/icom.png">
</head>

<body>
    <div id="apprentices">
    <?php
    echo "<table id = table class = table >";
    echo "<tr> <th>id: </th> <th> Vorname: </th> <th> Nachname:  </th> <th> Ortschaft:  </th> </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>  ";
        echo "<td>" . $row["prename"] . "</td>  ";
        echo "<td>" . $row["lastname"] . "</td>  ";
        echo "<td>" . $row["place_id"] . "</td>  ";
        echo "<td>" . $row["markers_id"] . "</td>  ";
        echo "</tr>";
        //echo "<td>" . $row_place["place"] . "</td>  ";
    }
    echo "</table>";
    ?>
    </div>
    <div id="places">
    <?php
    echo "<table id = table_place class = table >";
    echo "<tr> <th>id: </th> <th> Ortschaft: </th> <th> Latitude:  </th> <th> Longitude:  </th> </tr>";
    while ($row = $result_place->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>  ";
        echo "<td>" . $row["name"] . "</td>  ";
        echo "<td>" . $row["latitude"] . "</td>  ";
        echo "<td>" . $row["longitude"] . "</td>  ";
        echo "</tr>";
        //echo "<td>" . $row_place["place"] . "</td>  ";
    }
    echo "</table>";
    ?>
    </div>
    <div id="markers">
    <?php
    echo "<table id = table_place class = table >";
    echo "<tr> <th>id: </th> <th> Description: </th> <th> Latitude:  </th> <th> Longitude:  </th> </tr>";
    while ($row = $result_marker->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>  ";
        echo "<td>" . $row["description"] . "</td>  ";
        echo "<td>" . $row["latitude"] . "</td>  ";
        echo "<td>" . $row["longitude"] . "</td>  ";
        echo "</tr>";
        //echo "<td>" . $row_place["place"] . "</td>  ";
    }
    echo "</table>";
    ?>
    </div>
    <div id="options">
        <button>Edit Value</button>
        <button>Delete row</button>
        <button>Add row</button>
    </div>
</body>

</html>