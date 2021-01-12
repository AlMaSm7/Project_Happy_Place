<?php
            session_start();

            $database = mysqli_connect('mariadb', 'root', 'happyplace','happyplace' );

            $values = "SELECT prename, lastname * FROM apprentices;";
            $result = mysqli_query($database, $values);
            $place = "SELECT name * FROM places;";
            $result_place = mysqli_query($database, $place);

            if(mysqli_num_rows($result)){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<p> Name: ". $row['prename'] ."Nachname:". $row['lastname'];
                }
            }else{
                echo '0 resultate';
            }


            ?>