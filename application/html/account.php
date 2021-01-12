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
$password_confirm = mysqli_real_escape_string($database, $_POST['password_confirm']);

if ($password === $password_confirm) {

    $query_user = "INSERT INTO Users (username, password) VALUES ('$username', '$password');";
    mysqli_query($database, $query_user);
    $user_id = mysqli_insert_id($database);
}else{
    echo "<p>Passwörter stimmen nicht überein</p>";
}

if (mysqli_query($database, $query_user)) {

    echo "Sucess back to website...";
    header("Location: map.php");
} else {
    echo $query_user . "<br>";
    header("Location: account.php");
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
</body>

</html>