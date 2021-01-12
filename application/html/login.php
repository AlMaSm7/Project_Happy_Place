<?php

session_start();


$database = mysqli_connect('mariadb', 'root', 'happyplace', 'happyplace');

if (!$database) {
    echo "FEHLER BEI DER VERBINDUNG MIT SQL";
    echo $database;
} else {
    echo "VERBINDUNG ERFOLGREICH\n";
}

$username = mysqli_real_escape_string($database, $_POST['username']);
$password = mysqli_real_escape_string($database, $_POST['password']);

$verifacation = "SELECT Username FROM Users WHERE Username = '$username' AND password = '$password';";

$result = mysqli_query($database, $verifacation);

if (mysqli_num_rows($result)) {
    echo "Acess granted";
    header("Location: crud.php");
} else {
    print $verifacation;
    echo mysqli_error($database);
    header("Location: login.php");
    echo "Something went wrong :-(";
}
