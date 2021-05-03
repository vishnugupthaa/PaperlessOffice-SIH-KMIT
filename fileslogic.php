<?php
include('session.php');
// connect to the database
require('db.php');
$conn=$con;

$sql = "SELECT * FROM filesys WHERE toaddr='$ucheck' and status='0'";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql1 = "SELECT * FROM filesys WHERE toaddr='$ucheck' and status='1'";
$result1 = mysqli_query($conn, $sql1);

$files1 = mysqli_fetch_all($result1, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination =  $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    //writing toadderess for digital signature
    $toaddr = stripslashes($_REQUEST['toaddr']);
    $toaddr = mysqli_real_escape_string($con, $toaddr);

    //writing from address to show to manager
    $fromaddr =  $user_from_addr;


    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $time = date("h:i:sa");

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 6000000) { // file shouldn't be larger than 6Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO filesys (date,toaddr,name, size,time,fromaddr,status) VALUES ('$date','$toaddr', '$filename', $size, '$time', '$fromaddr',0)";
            if (mysqli_query($conn, $sql)) {
                echo "<script>window.alert('Sucessfully uploaded.');</script>";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

if(isset($_POST['approve']))
{

    $user_from_addr = $_POST['from'];
    $filename = $_POST['name'];

    $edit="UPDATE filesys SET status=1 WHERE toaddr='$ucheck' AND fromaddr='$user_from_addr' AND name='$filename'";
    echo $edit;
    $re=mysqli_query($conn,$edit);
    
    
    $myfile = fopen("message", "w") or die("Unable to open file!");
    $txt = $login_session;
    fwrite($myfile, $txt);
    fclose($myfile);


    $file = fopen("sample.txt","r");
    $signature = fgets($file);
    
    //PDF Sign
    $command1 = escapeshellcmd("pdfedit.py ".$_POST['name']." ".$signature);
    $output1 = shell_exec($command1);
    echo $output1;
    
    
    //  Mail Thing Approve
    $command = escapeshellcmd("MailApprove.py ".$_POST['from']." ".$_SESSION['email']." ".$_POST['name']);
    $output = shell_exec($command);
    echo $output;
    fclose($file);

    if($re)
    {
        echo "1";
    }
}

if(isset($_POST['decline']))
{
    $user_from_addr = $_POST['from'];
    $filename = $_POST['name'];

    $edit="DELETE from filesys WHERE toaddr='$ucheck' AND fromaddr='$user_from_addr' AND name='$filename'";
    echo $edit;
    $re=mysqli_query($conn,$edit);

    // Mail Thing Decline
    $command = escapeshellcmd("MailDecline.py ".$_POST['from']." ".$_SESSION['email']." ".$_POST['name']);
    $output = shell_exec($command);
    echo $output;

    if($re)
    {
        echo "1";
    }
}

?>