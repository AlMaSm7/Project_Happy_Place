<?php
/*
$location = $_POST('ortschaft');

function location()
{

    $ch = curl_init('https://nominatim.openstreetmap.org/search?q='+ $location +',Schweiz&format=json');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
*/
session_start();

$firstname = "";

$database = mysqli_connect('mariadb', 'root', 'happyplace','happyplace' );

if(!$database){
    echo "FEHLER BEI DER VERBINDUNG MIT SQL";
    echo $database;

}else{
    echo "VERBINDUNG ERFOLGREICH\n";
}

        

        /*$sql_count = "SELECT COUNT(id) FROM places";
        $result_count = $database->query($sql_count);
        $count = $result_count->fetch_array(MYSQLI_BOTH);
        $newid_place = $count[0]+1;

        $sql_count = "SELECT COUNT(id) FROM markers";
        $result_count = $database->query($sql_count);
        $count = $result_count->fetch_array(MYSQLI_BOTH);
        $newid_marker = $count[0]+1;*/

$prename = mysqli_real_escape_string($database, $_POST['vorname']);
$lastname = mysqli_real_escape_string($database, $_POST['nachname']);
$place = mysqli_real_escape_string($database, $_POST['ortschaft']);
$lat = mysqli_real_escape_string($database, $_POST['lat']);
$lng = mysqli_real_escape_string($database, $_POST['lng']);


$query_place = "INSERT INTO places (name, latitude, longitude) VALUES ('$place', $lat, $lng);";

mysqli_query($database, $query_place);
$place_id = mysqli_insert_id($database);

$query_marker = "INSERT INTO markers (latitude, longitude) VALUES ($lat, $lng);";
mysqli_query($database, $query_marker);
$marker_id = mysqli_insert_id($database);

echo mysqli_error($database);

$query = "INSERT INTO apprentices (prename, lastname, place_id, markers_id) VALUES ('$prename', '$lastname', $place_id, $marker_id);" ;

if (mysqli_query($database, $query)) {

    echo "Sucess";
    //header("Location: map.php");

  } else {
    echo $query_place."<br>";
    //header("Location: location2.php");
    echo $query_marker."<br>";
    echo "Errors: " . $query . "<br>" . mysqli_error($database);

  }

?>
<html>
    <head>
        <meta charset="utf-8">    
        <title>Status Data</title>
    </head>
    <body>
        <a href="Map.php"><p>Here to see map...</p></a>
        <a href="register.html"><p>If it didnt work...</p></a>
    </body>
</html>