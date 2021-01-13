<?php

$database = mysqli_connect('mariadb', 'root', 'happyplace','happyplace');

if(!$database){
    echo "FEHLER BEI DER VERBINDUNG MIT SQL";
    echo $database;

}else{
    echo "VERBINDUNG ERFOLGREICH\n";
}
