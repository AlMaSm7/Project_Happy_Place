<html>

<head>
    <title>CRUD</title>
    <link rel="icon" href="./Bilder/icom.png">
    <style>
        .hide {
            display: none;
        }
    </style>
</head>

<body>
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
    */ ?>
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
    */ ?>
    <!--
    </div>
    <div id="tabels">
        <button onclick="places()" id="edit">Edit places</button>
        <button onclick="marker()" id="marker">Edit Markers</button>
        <button onclick="appren()" id="appren">Edit apprentices</button>
    </div>
    -->
    <div id="options">
    <form method="post" action="">
        <div class="input-group">
            <label>id (for editing)</label>
            <input type="text" name="id" value="<?php echo $id; ?>">
        </div>
        <div class="input-group">
            <label>username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>
        <div class="input-group">
            <label>password</label>
            <input type="password" name="password" value="<?php echo $password; ?>">
        </div>
        <div class="input-group">
            <?php if ($update == true) : ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;">update</button>
            <?php else : ?>
                <button class="btn" type="submit" name="save">Save</button>
            <?php endif ?>
        </div>
    </form>

    <form method="post" action="">
        <div class="input-group">
            <label>ID for DEL</label>
            <input type="float" name="id_del" value="<?php echo $id_del; ?>">
        </div>
        <div class="input-group">
            <?php if ($update == true) : ?>
                <button class="btn" type="submit" name="update" style="background: #556B2F;">update</button>
            <?php else : ?>
                <button class="btn" type="submit" name="save">delete by ID</button>
            <?php endif ?>
        </div>
    </form>
    </div>
    <?php

    session_start();

    require_once("db_connection_oop.php");
    require("entity.class.php");


    $dbms = new Database("mariadb", "root", "happyplace", "happyplace");

    //Test
    $entity = new Entity($dbms->getConnection(), "Users");
    /*
print_r($entity->columns);

$new = new stdClass();
$new->name = "Unbekannte Ortschaft";
$entity->save($new);
$id = 1;

$update = $entity->load($id);
$update->name = "Affeltrangen OOOOO";
$entity->save($update);*/
    //$id = 215;
    //print_r($entity->columns);

    $username = $_POST['username'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $id_del = $_POST['id_del'];

    if (!empty($id_del)) {
        $delete = $entity->delete($id_del);
    }

    if (empty($id)) {
        $newUser = new stdClass();
        $newUser->Username = $username;
        $newUser->Password = $password;
        $result_insert = $entity->save($newUser);
        echo $result_insert;
    } else {
        $changeuser = $entity->load($id);
        $changeuser->Username = $username;
        $changeuser->Password = $password;
        $result_edit = $entity->save($changeuser);
        echo $result_edit;
    }



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
</body>
<script>
    /*
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

    function places() {
        option.classList.add("hide");
        delete_option.classList.remove("hide");
    }

    function add() {
        option.classList.add("hide");
        insert.classList.remove("hide");
    }

    function edit() {
        option.classList.add("hide");
        insert.classList.remove("hide");
    }
    */
</script>

</html>