<?php

/*
function location()
{

    $ch = curl_init('https://nominatim.openstreetmap.org/search?q=Chur,Schweiz&format=json');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}*/

$firstname = "";
$lastname = "";



/*$database = mysqli_connect('localhost', 'root', 'happyplace','happyplace' );

if(!$database){
    echo "FEHLER BEI DER VERBINDUNG MIT SQL";
    echo $database;

}else{
    echo "VERBINDUNG ERFOLGREICH";
}*/

$database = mysqli_connect('mariadb', 'root', 'happyplace','happyplace' );

    // Check connection
    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

$prename = $_POST['vorname'];
$lastname = $_POST['nachname'];
$place = $_POST['ortschaft'];

//$id = "SELECT COUNT(id) + 1";
$sql_count = "SELECT COUNT(id) FROM apprentices";
        $result_count = $database->query($sql_count);
        $count = $result_count->fetch_array(MYSQLI_BOTH);
        $newid = $count[0]+1;


$query = "INSERT INTO places (id, name) VALUES ($newid, '$place');" ;

$result_instert_places = $database->query($query);

$query = "INSERT INTO markers (id) VALUES ($newid);" ;

$result_instert_marker = $database->query($query);

$query = "INSERT INTO apprentices (id, prename, lastname, place_id, markers_id ) VALUES ($newid, '$prename', '$lastname', $newid, $newid);" ;

$result_instert_apprentice = $database->query($query);

// trouble shooting
if (mysqli_query($database, $query)) {

    echo "Sucess";

  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($database);
  }

//$query_place = "INSERT INTO places (name) VALUES ($place)";

//$test = "SELECT * FROM apprentices";

/*$sql_all = "SELECT * FROM apprentices;";
    $result_all = $conn->query($sql_all);
$row = mysqli_fetch_assoc($result_all);

echo $row['prename'];
//echo $prename;*/

//mysqli_query($database, $query_place && $query);