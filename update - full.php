<?php
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
?>

<?php
    include "config.php";

    if(isset($_POST['deleteID'])) {
        $deleteRecord = mysqli_real_escape_string($link, $_POST['deleteID']);

        $deleteQuery = "DELETE FROM citylink WHERE id='$deleteRecord'";
        $deleteResult = $link->query($deleteQuery);
    }
    if(isset($_POST['updateID'])) {
        $updateRecord = mysqli_real_escape_string($link, $_POST['updateID']);
        $issueDate = mysqli_real_escape_string($link, $_POST['issueDate']);
        $trackingNo = mysqli_real_escape_string($link, $_POST['trackingNo']);
        $userName = mysqli_real_escape_string($link, $_POST['user']);
        $billingMonth = mysqli_real_escape_string($link, $_POST['billingMonth']);
        $paymentStatus = mysqli_real_escape_string($link, $_POST['paymentStatus']);

        $updateQuery = "UPDATE citylink
            SET date = '$issueDate', tracking_number = '$trackingNo', user_name = '$userName', billing_month = '$billingMonth', payment_status = '$paymentStatus'
            WHERE id = '$updateRecord'";
        $updateResult = $link->query($updateQuery);

        header("Location: update.php");
    }
?>

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

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                <h1 class="mt-4">View & Update Records</h1>

                <form action="" method="get">
            
                <?php
                    echo "<table class='table table-stripped table-hover mt-4' id='jadual'>
                    <thead style='background:rgb(26, 185, 164);'>
                        <tr>
                            <th>ID</th>
                            <th>Issue Date</th>
                            <th>Tracking No</th>
                            <th>User</th>
                            <th>Billing Month</th>
                            <th>Payment Status</th>
                            <th>Edit Record</th>
                        </tr>
                    </thead>
                    <tbody>";

                    $sql = "SELECT * FROM citylink";
                    $result = $link->query($sql);

                    if($result->num_rows > 0){

                        while($row = $result->fetch_assoc())
                        {
                            echo "<tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['date']."</td>
                                    <td>".$row['tracking_number']."</td>
                                    <td>".$row['user_name']."</td>
                                    <td>".$row['billing_month']."</td>
                                    <td>".$row['payment_status']."</td>
                                    <td>
                                        <button class='btn btn-outline-info' value='".$row['id']."' name='edit'>Edit</button>
                                        <button class='btn btn-outline-danger' value='".$row['id']."' name='delete'>Delete</button>
                                    </td>
                                </tr>";
                        }

                    } else {
                        echo "<tr><td>Data Tiada</td></tr>";
                    }

                    echo "</tbody></table>";
                ?>
                </form>
            </div>
        </div>

        <?php
            if(isset($_GET['delete'])) {
                $idToDelete = mysqli_real_escape_string($link, $_GET['delete']);

                echo "
                    <div class='modal fade' id='deleteModal' tabindex='-1' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title' id='deleteModalLabel'>Delete Record</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                </div>
                                <div class='modal-body'>
                                    <form action='update.php' method='post'>
                                        Confirm to Delete?
                                        <input type='text' value='".$idToDelete."' name='deleteID' hidden>
                                </div>
                                <div class='modal-footer'>
                                    <button type='submit' class='btn btn-danger'>Delete</button>
                                    </form>
                                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>";

                echo "<script defer>
                    var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {});
                    deleteModal.show();
                </script>";

                unset($_GET['delete']);
            }


            if(isset($_GET['edit'])) {
                $idToEdit = mysqli_real_escape_string($link, $_GET['edit']);

                $modalQuery = "SELECT * FROM citylink WHERE id='$idToEdit'";
                $modalResult = $link->query($modalQuery);

                if($modalResult->num_rows > 0) {
                    $modalData = $modalResult->fetch_assoc();

                    echo "
                        <div class='modal fade' id='editModal' tabindex='-1' role='dialog' aria-labelledby='editModalLabel' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='editModalLabel'>Edit Record</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    <div class='modal-body'>
                                        <form action='update.php' method='post'>
                                            <input type='text' name='updateID' value='".$idToEdit."' hidden>
                                            <div class='form-group'>
                                                <label>Issue Date:</label>
                                                <input type='date' class='form-control' name='issueDate' value='".$modalData['date']."'>
                                            </div>
                                            <div class='form-group'>
                                                <label>Tracking No:</label>
                                                <input type='text' class='form-control' name='trackingNo' value='".$modalData['tracking_number']."'>
                                            </div>
                                            <div class='form-group'>
                                                <label>User:</label>
                                                <input type='text' class='form-control' name='user' value='".$modalData['user_name']."'>
                                            </div>
                                            <div class='form-group'>
                                                <label>Billing Month:</label>
                                                <input type='text' class='form-control' name='billingMonth' value='".$modalData['billing_month']."'>
                                            </div>
                                            <div class='form-group'>
                                                <label>Payment Status:</label>
                                                <input type='text' class='form-control' name='paymentStatus' value='".$modalData['payment_status']."'>
                                            </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='submit' class='btn btn-primary'>Save</button>
                                        </form>
                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>";

                    echo "<script defer>
                            var editModal = new bootstrap.Modal(document.getElementById('editModal'), {});
                            editModal.show();
                        </script>";

                    unset($_GET['edit']);
                }
            }
        ?>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>