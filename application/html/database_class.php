<?php

$connection = new mysqli('mariadb', 'root', 'happyplace','happyplace');

if ($connection->connect_errno) {
  die($connection->connect_error);
}
