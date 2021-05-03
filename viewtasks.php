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

    <!-- table CSS links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

     <!-- Table Script links  -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

    <!-- Link For font Awesome icon pack -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <a class="nav-link" href="managerdashboard.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
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

    <div class="container">
        <div class="card shadow mb 4" style="background-color: rgb(213, 252, 255);">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-hover table-bordered dt-responsive nowrap"
                        style="width:100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>From</th>
                                <th>Name</th>
                                <th>Size</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>

        <script>

            $(document).ready(function () {
                loadTable();
            });

            function loadTable()
            {
                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function()
                {
                    if(this.status === 200 && this.readyState === 4)
                    {
                        document.querySelector('#example > tbody').innerHTML = this.responseText;
                        $('#example').DataTable();
                    }
                }

                xhr.open('GET', 'showtasks.php');
                xhr.send();

            }

            function approve(from, name)
            {
                var xhr = new XMLHttpRequest();
                
                var data = new FormData();
                data.append('approve',0);
                data.append('from', from.trim());
                data.append('name', name.trim());

                xhr.onreadystatechange = function()
                {
                    if(this.status === 200 && this.readyState === 4)
                    {
                        if(this.responseText.trim() === "1")
                            window.alert('Approved');

                        loadTable();
                    }
                };

                xhr.open('POST', 'fileslogic.php');
                xhr.send(data);
            }
            function decline(from, name)
            {
                var xhr = new XMLHttpRequest();
                
                var data = new FormData();
                data.append('decline',0);
                data.append('from', from.trim());
                data.append('name', name.trim());

                xhr.onreadystatechange = function()
                {
                    if(this.status === 200 && this.readyState === 4)
                    {
                        if(this.responseText.trim() === "1")
                            window.alert('Declined');

                        loadTable();
                    }
                };

                xhr.open('POST', 'fileslogic.php');
                xhr.send(data);
            }
        </script>

</body>

</html>