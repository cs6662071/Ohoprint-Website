<?php

    $con = mysqli_connect("localhost", "ohoprint_db", "w1WYVa9d", "ohoprint_db");

    //check connection
    if (mysqli_connect_error()) {
        echo "Failed to connnect to MySQL: " .mysqli_connect_error();
    }

?>