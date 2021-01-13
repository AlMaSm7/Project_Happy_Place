<?php

session_start();

$firstname = "";

$database = mysqli_connect('mariadb', 'root', 'happyplace','happyplace' );

if(!$database){
    echo "FEHLER BEI DER VERBINDUNG MIT SQL";
    echo $database;

}else{
    echo "VERBINDUNG ERFOLGREICH\n";
}

$id = $_POST['id'];

$deleted = "DELETE FROM Users WHERE id = $id;";

mysqli_query($database, $deleted);

if (mysqli_query($database, $deleted)) {

    echo "Sucess";
    //header("Location: map.php");

    } else {
    echo $query_place."<br>";
    //header("Location: delete.php");
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
    <a href="Map.php">
        <p>Here to see map...</p>
    </a>
    <a href="account.php">
        <p>Try again if failed...</p>
    </a>
</body>

</html>