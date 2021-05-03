<?php
include 'fileslogic.php';
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

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 500px;
            height: 360px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
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
            <img src="images/po.ico" width="30" height="30"><a
                style="font-family: 'Times New Roman', Times, serif; font-size: 30; color: white;">PaperlessOffice</a>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="employeedashboard.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link btn btn-outline-info" href="logout.php">LOG OUT</a>
                </li>
            </ul>
        </div>

    </nav>

    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" action="submittasks.php" method="post" enctype="multipart/form-data">
                            <h3 class="text-center text-info">Upload Your Task</h3>
                            <div class="form-group">
                                <label class="text-info">To:</label>
                                <input type="text" name="toaddr" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="text-info">Upload:</label>
                                <input type="file" name="myfile" class="form-control">
                            </div>
                            <div class="form-group" align="center">
                                <br>
                                <input type="submit" name="save" class="btn btn-info btn-md"
                                    value="Submit task">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>