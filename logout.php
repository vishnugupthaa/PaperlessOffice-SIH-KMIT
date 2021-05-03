<?php
    // session_start();
    // // Destroy session
    // if(session_destroy()) {
    //     // Redirecting To Home Page
    //     header("Location: login.php");
    // }


    session_start();
    if (isset($_SESSION['email']))
    {
         unset($_SESSION['email']);
    }
    header("location:login.php");
?>