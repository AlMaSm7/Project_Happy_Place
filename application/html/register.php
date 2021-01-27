<?php

require 'account.php';
require 'database_class.php';

$register = new User($connection);
//if(isset($_POST['register'])){
    $register_values = $register->get_values($_POST);
    $register_check = $register->register();
    echo $register_check;
//}







