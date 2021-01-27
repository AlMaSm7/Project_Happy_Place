<?php

session_start();

require 'database_class.php';

class User{

private $username;
private $password;
private $password_confirm;
private $location;
private $connection;
private $lastname;
private $firstname;
private $lng;
private $lat;
private $id;

/*public function check($username, $password){
    /*if ($password === $password_confirm) {
        /*$query_user = "INSERT INTO Users (username, password) VALUES ('$username', '$password');";
        mysqli_query($connection, $query_user);
        $user_id = mysqli_insert_id($database);
    }else{
        echo "<p>Passwörter stimmen nicht überein</p>";
    }
}*/

public function __construct($connection,  $id = NULL) {
    $this->connection = $connection; // Unknow user for login/register
    $this->$id = $id; // I know it.. logout/change password 7 ...
}
// public function __construct($password, $username, $id = NULL, $connection, $location, $firstname, $lastname, $lng, $lat){
//     $this->password = $password;
//     $this->username = $username;
//     $this->id = $id;
//     $this->connection = $connection;
//     $this->location = $location;
//     $this->firstname  = $firstname;
//     $this->lastname = $lastname;
//     $this->lat = $lat;
//     $this->lng = $lng;

// }
    /*
    if (mysqli_query($connection, $query_user)) {

    echo "Sucess back to website...";
    //header("Location: map.php");
    } else {
        echo $query_user . "<br>";
        //header("Location: account.php");
        echo "Errors: " . $query . "<br>" . mysqli_error($database);
    }
    */
    public function register(){
        //if ($this->password === $this->password_confirm) {
            $query_user = "INSERT INTO Users (Username, Password) VALUES ('$this->username', '$this->password');";
            //$result_register = $this->connection->query($query_user);
            print_r($query_user);
            if($result_register = mysqli_query($this->connection, $query_user)){

                //$user_id = mysqli_insert_id($this->connection);
                echo $query_user;
                echo "Sucess, back to Website.....";
                header('Location: http://localhost/crud.php');
            }else{
                mysqli_errno($result_register);
                echo "<p>Passwörter stimmen nicht überein</p>";
            }
        //}
    }

    public function login(){
        
        $verifacation = "SELECT Username, Password FROM Users WHERE Username = '$this->username' AND Password = '$this->password';";
        // echo $verifacation;
        $result = $this->connection->query($verifacation);
        print_r($result);
        if ($this->connection->num_rows) {
            //return "Acess granted";
            echo $verifacation;
            $_SESSION["logincheck"] = TRUE;
            return $verifacation;
            header("Location: http://localhost/crud.php");
        } else {
            return $verifacation;
            return  mysqli_error($this->connection);
            //header("Location: login.php");
            return "Something went wrong :-(";
        }
    }

    public function register_location(){

        $marker = "INSERT INTO markers (id, lat, lng) VALUES (NULL, $this->lat, $this->lng);";
        if( $result = $this->connection->query($marker)) {
        echo $marker_id = $this->connection->insert_id;
        echo $result;
        //   print_r($marker_id);

        $places = "INSERT INTO places (id, name, lat, lng) VALUES (NULL, '$this->location', $this->lat, $this->lng);";
        mysqli_query($this->connection, $places);
        $places_id = mysqli_insert_id($this->connection);
        
        $apprentices = "INSERT INTO apprentices (prename, lastname, place_id, markers_id) VALUES ('$this->firstname', '$this->lastname', $places_id, $marker_id);";
        mysqli_query($this->connection, $apprentices);
        }
        if (mysqli_query($this->connection, $apprentices)) {

            echo "Sucess";
            //header("Location: map.php");
        
        } else {
            echo $places."<br>";
            //header("Location: location2.php");
            echo $$marker."<br>";
            echo "Errors: " . $apprentices. "<br>" . mysqli_error($this->connection);
        
        }
    }

    public function check_password(){
        if (isset($_REQUEST['username']) && isset($_REQUEST['password'])){
            $connection = $this->connection;
            /*
            $password = $connection->real_escape_string($this->password);
            $username = $connection->real_escape_string($this->username);
            */
        }
    }
    public function get_values($params){
        $this->location = mysqli_real_escape_string($this->connection, $params['ortschaft']);
        $this->firstname = mysqli_real_escape_string($this->connection, $params['vorname']);
        $this->lastname = mysqli_real_escape_string($this->connection, $params['nachname']);
        $this->password = mysqli_real_escape_string($this->connection, $params['password']);
        $this->username = mysqli_real_escape_string($this->connection, $params['username']);
        $this->lat = mysqli_real_escape_string($this->connection, $params['lat']);
        $this->lng = mysqli_real_escape_string($this->connection, $params['lng']);
    }
}


/*
Pseudo Login
$user = new User($dblink);
$user->username = $_POST['username'];
$user->login();

*/

?>

