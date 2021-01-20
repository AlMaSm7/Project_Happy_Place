<?php

session_start();

require_once("db_connection_oop.php");


$db = new Database('mariadb', 'happyplace', 'happyplace','happyplace');
var_dump($db);
exit;
require("entity.class.php");
$link = $db->connection;
$apprentices = new Entity($link, "apprentices");
$ID = 1;
// Chat öffnen :)
var_dump($apprentices->load($ID));


/*$users = "SELECT * FROM Users;";
$result = mysqli_query($connection, $users);

/*$lat_js = json_decode($lat, true);
    $lon_js = json_decode($lon, true);*/
/*
$names = "SELECT * FROM apprentices;";
$result = mysqli_query($database, $names);

$place = "SELECT * FROM places;";
$result_place = mysqli_query($database, $place);

$marker = "SELECT * FROM markers;";
$result_marker = mysqli_query($database, $marker);*/
?>
<html>

<head>
    <title>CRUD</title>
    <link rel="icon" href="./Bilder/icom.png">
    <style>
    .hide{
        display: none;
    }

    </style>
</head>

<body>
    <div id="apprentices">
    <?php
    /*echo "<table id = table class = table >";
    echo "<tr> <th>id: </th> <th> Username: </th> </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>  ";
        echo "<td>" . $row["Username"] . "</td>  ";
        echo "</tr>";
        //echo "<td>" . $row_place["place"] . "</td>  ";
    }
    echo "</table>";
    ?>
    </div>
    <div id="places">
    <?php
    /*
    echo "<table id = table_place class = table >";
    echo "<tr> <th>id: </th> <th> Ortschaft: </th> <th> Latitude:  </th> <th> Longitude:  </th> </tr>";
    while ($row = $result_place->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>  ";
        echo "<td>" . $row["name"] . "</td>  ";
        echo "<td>" . $row["latitude"] . "</td>  ";
        echo "<td>" . $row["longitude"] . "</td>  ";
        echo "</tr>";
        //echo "<td>" . $row_place["place"] . "</td>  ";
    }
    echo "</table>";
    */?>
    </div>
    <div id="markers">
    <?php
    /*
    echo "<table id = table_place class = table >";
    echo "<tr> <th>id: </th> <th> Description: </th> <th> Latitude:  </th> <th> Longitude:  </th> </tr>";
    while ($row = $result_marker->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>  ";
        echo "<td>" . $row["description"] . "</td>  ";
        echo "<td>" . $row["latitude"] . "</td>  ";
        echo "<td>" . $row["longitude"] . "</td>  ";
        echo "</tr>";
        //echo "<td>" . $row_place["place"] . "</td>  ";
    }
    echo "</table>";
    */?>
    <!--
    </div>
    <div id="tabels">
        <button onclick="places()" id="edit">Edit places</button>
        <button onclick="marker()" id="marker">Edit Markers</button>
        <button onclick="appren()" id="appren">Edit apprentices</button>
    </div>
    -->
    <div id="options">
        <button onclick="places()" id="edit">Delete</button>
        <button onclick="add()" id="delete_btn">Add</button>
        <button onclick="edit()"id="edit_btn">Edit</button>
    </div>
    <form action="delete.php" method="POST">
        <div id="delete">
            <input type="text" placeholder = "Row(id)...." name="id" required>
            <button type="submit"> Submit </button>
        </div>
    </form>
    <form action="add.php" method="POST">
        <div id="insert">
            <input type="text" placeholder = "New Username...." name="username" required>
            <input type="password" placeholder = "New Password...." name="password" required>
            <button type="submit"> Submit </button>
        </div>
    </form>
    <form action="edit.php" method="POST">
        <div id="edit">
            <input type="text" placeholder = "Id...." name="id" required>
            <input type="text" placeholder = "New Username...." name="username" required>
            <input type="password" placeholder = "New Password...." name="password" required>
            <button type="submit"> Submit </button>
        </div>
    </form>
</body>
<script>

    const option = document.getElementById("options");
    //const apprentices_input = document.getElementById("apprentices");
    const tabels = document.getElementById("tabels");
    const option = document.getElementById("options");
    const delete_option = document.getElementById("delete");
    const insert = document.getElementById("insert");
    const edit = document.getElementById("edit");


    delete_option.classList.add("hide");
    insert.classList.add("hide");
    edit.classList.add("hide");

    function places(){
        option.classList.add("hide");
        delete_option.classList.remove("hide");
    }

    function add(){
        option.classList.add("hide");
        insert.classList.remove("hide");
    }
    function edit(){
        option.classList.add("hide");
        insert.classList.remove("hide");
    }
</script>
</html>
