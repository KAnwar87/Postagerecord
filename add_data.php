<?php
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Postage Records</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>
<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">KAWM<br>Postage Records</div>
            <div class="list-group list-group-flush">
            <a href="home.php" class="list-group-item list-group-item-action bg-light">Home</a>
            <a href="add_data.php" class="list-group-item list-group-item-action bg-light">Add Record</a>
            <a href="update.php" class="list-group-item list-group-item-action bg-light">View & Edit Record</a>

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
                    <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Menu<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li> -->
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <!-- <a class="dropdown-item" href="#">My Details</a> -->
                            <a class="dropdown-item" href="reset-password.php">Reset password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <h1 class="mt-4">Add New Record</h1>

                <?php require_once('config.php');?>

            <div class="container">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <?php
            // Set Variable as Blank
            $Issue_Date = isset($Issue_Date) ? $Issue_Date : '';
            $Tracking_No = isset($Tracking_No) ? $Tracking_No : '';
            $User_Name = isset($User_Name) ? $User_Name : '';
            ?>

            <br>
                <div class="row">
                    <div class="col-sm-4">
                    <label for="nama">Issue Date</label></div>
                    <div class="col-sm-8">
                    <input type="date" id="Issue_Date" name="Issue_Date" value="<?php echo date('Y-m-d');?>" min="2021-01-01" class="form-control"></div>
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
                
                    if (isset($_POST['Issue_Date']) && isset($_POST['Tracking_No']) && isset($_POST['User_Name'])){
                        $Issue_Date = $_POST['Issue_Date'];
                        $Tracking_No = $_POST['Tracking_No'];
                        $User_Name = $_POST['User_Name'];}
                    $sql = "INSERT INTO citylink (date, tracking_number, user_name)
                        VALUES ('$Issue_Date', '$Tracking_No', '$User_Name')";
                    if (mysqli_query($link, $sql)){
                        echo '<div class="alert alert-success" role="alert">
                                Data Successfully Recorded!</div>';
                    }else{
                        //console_log("Error: Incorrect date value: '' for column 'issue_date' at row 1");
                        //echo 'Error: '.mysqli_error($link);
                    }
                    mysqli_close($link);
                    
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