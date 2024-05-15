<?php

    $host = "localhost";
    $dbname = "blog_app";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (!$conn) {
        echo " Connection failed";
    }
    

   