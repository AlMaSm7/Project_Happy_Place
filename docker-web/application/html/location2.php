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

        $sql_count = "SELECT COUNT(id) FROM apprentices";
        $result_count = $database->query($sql_count);
        $count = $result_count->fetch_array(MYSQLI_BOTH);
        $newid = $count[0]+1;

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


$query_place = "INSERT INTO places (id, name) VALUES ($newid, '$place');";

mysqli_query($database, $query_place);

$query_marker = "INSERT INTO markers (id) VALUES ($newid);";

mysqli_query($database, $query_marker);

$query = "INSERT INTO apprentices (id, prename, lastname, place_id, markers_id) VALUES ($newid, '$prename', '$lastname', $newid, $newid);" ;

mysqli_query($database, $query);

if (mysqli_query($database, $query)) {

    echo "Sucess";

  } else {
    echo $query_marker."<br>";
    echo $query_place."<br>";
    echo "Errors: " . $query . "<br>" . mysqli_error($database);

  }