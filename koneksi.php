<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'db_sekola';

    $conn = mysqli_connect($host, $user, $pass, $db);

    if($conn){
        //echo "koneksi berasil";
    }
    mysqli_select_db($conn, $db);
    
?>