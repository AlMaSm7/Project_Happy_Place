<?php

session_start();

if($_SESSION["logincheck"]==FALSE){
    die('Have to login first?');
}


$database = mysqli_connect('mariadb', 'root', 'happyplace','happyplace');

if(!$database){
    echo "FEHLER BEI DER VERBINDUNG MIT SQL";
    echo $database;

}else{
    echo "VERBINDUNG ERFOLGREICH\n";
}

$username = mysqli_real_escape_string($database, $_POST['username']);
$password = mysqli_real_escape_string($database, $_POST['password']);
$id = $_POST['id'];


$edit = "UPDATE Users SET Username ='$username', Password ='$password' WHERE id = $id;";

$result = mysqli_query($database, $edit);

if (mysqli_query($database, $edit)) {

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
    <a href="crud.php">
        <p>Here to see map...</p>
    </a>
    <a href="database.php">
        <p>Try again if failed...</p>
    </a>
</body>

</html>