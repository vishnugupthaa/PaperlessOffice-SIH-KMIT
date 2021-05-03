<?php

include("db.php");
session_start();


    $ucheck=$_SESSION['email'];
    $unameses = mysqli_query($con,"select * from register where email = '$ucheck' ");

    $row = mysqli_fetch_array($unameses,MYSQLI_ASSOC);
   
    $login_session = $row['username']; //to employee name display

    $user_from_addr= $row['email'];
    $signature = $row['sign'];
    
    $file = fopen("sample.txt","w");
    fwrite($file, $signature);
    fclose($file);

    if(!isset($_SESSION['email'])) {
        header("Location: login.php");
        die();
    }

?>