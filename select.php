<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Postage Records</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>
<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Postage Records</div>
            <div class="list-group list-group-flush">
            <a href="index.html" class="list-group-item list-group-item-action bg-light">Connect To DB</a>
            <a href="select.php" class="list-group-item list-group-item-action bg-light">Select</a>
            <a href="insert_data.php" class="list-group-item list-group-item-action bg-light">Insert</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Insert Ganda</a>
            <a href="update.php" class="list-group-item list-group-item-action bg-light">Update</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Delete</a>
            </div>
        </div>
    <!-- /#sidebar-wrapper -->


    <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-menu-button-wide-fill" viewBox="0 0 16 16">
                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1zm9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/></svg></button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                    <a class="nav-link" href="#">Menu<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User Name</a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">My Details</a>
                            <a class="dropdown-item" href="#">View Report</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </li>
                </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4">Select Data From Database</h1>
                
                <?php require_once('config.php');?>

                <?php
                $sql = "SELECT id,issue_date,tracking_no,user_name,billing_month,payment_status FROM citylink LIMIT 50";
                $result = $conn->query($sql);

                echo "<table class='table table-striped table-hover mt-4' id='jadual'>
                    <tr style='background:rgb(26, 185, 164);'>
                        <th>ID</th>
                        <th>Issue Date</th>
                        <th>Tracking No</th>
                        <th>User</th>
                        <th>Billing Month</th>
                        <th>Payment Status</th>
                    </tr>";
                if ($result->num_rows>0){
                    
                    //print data
                    while ($row=$result->fetch_assoc()) {
                        echo "<tr><td>".$row["id"]."</td><td>".$row["issue_date"]."</td><td>".$row["tracking_no"]."</td><td>".$row["user_name"]."</td><td>".$row["billing_month"]."</td><td>".$row["payment_status"]."</td></tr>";
                    }

                }else{
                    echo "<tr><td>Data Tiada</td></tr>";
                }
                echo "</table>";
                ?>

            </div>
        </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->


        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        </script>

</body>
</html>