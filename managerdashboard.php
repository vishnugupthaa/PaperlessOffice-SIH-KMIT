<?php
include('session.php');
?>


<!DOCTYPE html>
<html>

<head>
    <title>Paperless Office</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="images/po.ico" rel="icon">

    <style>
        body {
            background-image: url("images/papof.jpeg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images/po.ico" width="30" height="30"><a style="font-family: 'Times New Roman', Times, serif; font-size: 30; color: white;">PaperlessOffice</a>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewtasks.php">View Tasks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="approvedtasks.php">Approved Tasks</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link btn btn-outline-info" href="logout.php">LOG OUT</a>
                </li>
            </ul>
        </div>

    </nav>


    <br>

    <div class="jumbotron text-center">
        <h1 class="display-4">Hello, <?php  echo $login_session;  ?></h1>
        <p class="lead">This is the part where you Approve The Employee tasks with a signature.</p>
        <hr class="my-4">
        <!-- <p>Matter pending to type.</p> -->
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="viewtasks.php" role="button">View Tasks</a>
            <a class="btn btn-primary btn-lg" href="approvedtasks.php" role="button">Approved Tasks</a>
        </p>
    </div>
    

</body>

</html>