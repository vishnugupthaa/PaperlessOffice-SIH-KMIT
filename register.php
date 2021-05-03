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

<?php
    require('db.php');

    // if (isset($_REQUEST['username'])) {
    if (isset($_POST['imageupload'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $gender = stripslashes($_REQUEST['gender']);
        $gender = mysqli_real_escape_string($con, $gender);
        $designation = stripslashes($_REQUEST['designation']);
        $designation = mysqli_real_escape_string($con, $designation);

        $filename = $_FILES["signature"]["name"];
        $tempname = $_FILES["signature"]["tmp_name"];    
        $folder = $filename;

        $query    = "INSERT into `register` (username, email, password, gender, designation, sign)
                     VALUES ('$username', '$email' , '$password' ,'$gender' ,'$designation', '$filename')";
        $result   = mysqli_query($con, $query);
        
        move_uploaded_file($tempname, $folder);

        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
       
?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images/po.png" width="30" height="30"><a
                style="font-family: 'Times New Roman', Times, serif; font-size: 30; color: white;">PaperlessOffice</a>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>

    </nav>
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <header class="card-header">
                        <h4 class="card-title mt-2">Sign up</h4>
                    </header>
                    <article class="card-body">
                        <form method="POST" action="register.php" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col form-group">
                                    <label>Username </label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter your full name" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your company email" required>
                                <small class="form-text text-muted">We'll never share your email with anyone
                                    else.</small>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Gender</label>
                                    <select id="inputState" class="form-control" name="gender">
                                        <option selected="">--</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            <!-- </div> 
                            <div class="form-row"> -->
                                <div class="form-group col-md-6">
                                    <label>Designation</label>
                                    <select id="inputState" class="form-control" name="designation">
                                        <option selected="">--</option>
                                        <option>Employee</option>
                                        <option>Manager</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label>Create password</label>
                                <input class="form-control" name="password" type="text" required>
                            </div> 
                            <div class="form-group">
                                <label>Add Signature</label>
                                <input class="form-control" name="signature" type="file" required>
                            </div> 
                            <div class="form-group" align="center">
                                <button type="submit" name="imageupload" class="btn btn-primary btn-md"> Register </button>
                            </div> 
                            <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our
                                <br> Terms of use and Privacy Policy.</small>
                        </form>
                    </article>
                    <div class="border-top card-body text-center">Have an account? <a href="login.php">Log In</a></div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>

<?php
}
?>

</body>

</html>