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
            <a href="add_record.php" class="list-group-item list-group-item-action bg-light">Insert</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Insert Ganda</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Update</a>
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
                <h1 class="mt-4">Insert Record To Database</h1>
                
                <?php require_once('config.php');?>


            <div class="container">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onSubmit="return Register('insert')">

            <br>
                <div class="row">
                    <div class="col-sm-4">
                    <label for="nama">Issue Date</label></div>
                    <div class="col-sm-8">
                    <input type="date" id="Issue_Date" name="Issue_Date" placeholder="dd-mm-yyyy" value="" min="2021-01-01" class="form-control"></div>
                </div>
                    
                <div class="row">
                    <div class="col-sm-4">
                    <label for="nama">Tracking No</label></div>
                    <div class="col-sm-8">
                    <input type="text" id="Tracking_No" name="Tracking_No" value="" class="form-control"></div>
                </div>
                
                <div class="row">
                    <div class="col-sm-4">
                    <label for="nama">User</label></div>
                    <div class="col-sm-8">
                    <input type="text" id="User_Name" name="User_Name" value="" class="form-control"></div>
                </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <br>

                <?php 
                    if (isset($_POST)){
                        $sql = sprintf("INSERT INTO citylink (issue_date, tracking_no, user_name)
                        VALUES ('%s', '%s', '%s')", $_POST['Issue_Date'], $_POST['Tracking_No'], $_POST['User_Name']);
                    if (mysqli_query($conn, $sql)){
                        echo '<div class="alert alert-success" role="alert">
                            Data Berjaya Direkodkan!</div>';
                    }else{
                        echo 'Error: '.mysqli_error($conn);
                    }
                    mysqli_close($conn);
                    }
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