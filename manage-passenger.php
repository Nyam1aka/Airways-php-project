

<?php
include "includes/dbconn.php";
//The delete page
if (isset($_POST['delete_flight'])) {
    $passengerId = $_POST['passenger_id'];
    $query = "DELETE FROM passenger_profile WHERE passenger_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $query)) {

        header('Location: manage-passenger.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, 'i', $passengerId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        //redirect back to the same page
        header('Location: manage-passenger.php?delete=success');
        exit();
    }
} 


// Pagination variables
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 6;
$startIndex = ($currentPage - 1) * $itemsPerPage;

// Query to fetch paginated flight data
$query = "SELECT * FROM passenger_profile ORDER BY passenger_id DESC LIMIT $startIndex, $itemsPerPage";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $query);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Query to fetch total count of flights
$totalFlightsQuery = "SELECT COUNT(*) AS total FROM passenger_profile";
$totalFlightsResult = mysqli_query($conn, $totalFlightsQuery);
$totalFlights = mysqli_fetch_assoc($totalFlightsResult)['total'];
$totalPages = ceil($totalFlights / $itemsPerPage);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Passenger List Page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/Mpassenger.css">
    <link rel="stylesheet" href="css/global.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>

</head>
<body>
<section id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand col_1" href="admin.php"><span style="margin-bottom:10px;"><i class="fa fa-plane"></i></span> Kenya airways</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Flights</a>
                      <ul class="dropdown-menu drop_1 " aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="add-flight.php">Add Flight</a></li>
						  <li><a class="dropdown-item" href="flight-list.php"> List flight</a></li>
                      </ul>
                </li>

               
    
                <li class="nav-item">
                    <a class="nav-link" href="ticket-report.php">Ticket Report</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="manage-flights.php">Manage Flights</a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="manage-passenger.php">Manage Passenger</a>
                </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="includes/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
<!-- Navigation end -->
<!-- Navigation end -->
<?php
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'sqlerror') {
            echo "<script>alert('Error while deleting the record.');</script>";
        }
    } else if(isset($_GET['delete'])) {
        if($_GET['delete'] === 'success') {
            echo "<script>alert('The Record was deleted Successfully');</script>";
        }
    } else if(isset($_GET['update'])) {
        if($_GET['update'] === 'success') {
            echo "<script>alert('Passenger details updated successfully.');</script>";
        }
    }
    ?>
    <main>
    <section id="center" class="center_o">
        <div class="container">
        <div class="row center_o1 text-center text-captitalize">
        <div class="col-md-12">
            <h1 class="text-white">Passenger list</h1>
        </div>
        </div>
        </div>
    </section>
    <section style=" background-color:#bdc3c7;">
            <?php if (mysqli_num_rows($result) > 0) { ?>
                        <table class="table table-bordered table-striped table-hover">
                        <!-- Table header... -->
                        <thead class="table-success text-center text-dark" style="font-size: 16px; font-weight: 700;">
                                <tr>
                                    <td scope="col">Name</td>
                                    <td scope="col">Identity card</td>
                                    <td scope="col">Phone number</td>
                                    <td scope="col">Date of birth</td>
                                    <td scope="col">Action</td>
                                    <td scope="col">Action</td>
                                </tr>
                            </thead>
                        <tbody>
                            <?php 
                                //select items from database
                                $query = "SELECT CONCAT(f_name,' ',m_name,' ',l_name) AS name,Id_number,mobile,dob,passenger_id FROM passenger_profile ORDER BY passenger_id  ASC LIMIT $startIndex, $itemsPerPage";
                                $stmt = mysqli_stmt_init($conn);
                                mysqli_stmt_prepare($stmt, $query);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                <!-- Table row with flight data... -->
                                   <?php  echo "
                                        <tr class='text-center'>
                                                <td>".$row['name']."</td>
                                                <td>".$row['Id_number']."</td>
                                                <td>".$row['mobile']."</td>
                                                <td>".$row['dob']."</td>
                                            <td>
                                                <form action='manage-passenger.php' method='post'>
                                                <input name='passenger_id' type='hidden' value=".$row['passenger_id'].">
                                                <button class='btn' type='submit' name='delete_flight'>
                                                <i class='text-danger fa fa-trash'></i>
                                                </button>
                                                </form>
                                            </td>
                                            <td>
                                                <form action='edit_pass_form.php' method='post'>
                                                <input name='passenger_id' type='hidden' value=".$row['passenger_id'].">
                                                <button class='btn' type='submit' name='edit_button'>
                                                <i class='text-danger fa fa-edit'></i>
                                                </button>
                                                </form>
                                            </td>
                                        </tr>    
                                    "; ?>

                            <?php } ?>
                        </tbody>
                    </table>
       <!-- Pagination links -->
       <nav aria-label="passenger pagination">
                        <ul class="pagination justify-content-center" style="margin-left: 50%;">
                            <?php if ($currentPage > 1) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>" tabindex="-1" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                <li class="page-item <?php echo $currentPage == $i ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>
                            <?php if ($currentPage < $totalPages) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            <?php } ?>
        </section>

    <!-- Footer -->
<section id="footer_bm">
 <div class="container">
  <div class="footer_2 row">
   <div class="col-md-8">
    <div class="footer_2l">
	  <p class="mb-0 col_3">© 2023 Colin Kebaso. All Rights Reserved | Design by <a class="col_4" href="#">Colin</a></p>
	</div>
   </div>
   <div class="col-md-4">
    <div class="footer_2r float-end">
	  <ul class="mb-0">
	  <li class="d-inline-block"><a class="text-light" href="#">Support</a></li>
      <li style="margin-left:10px; margin-right:10px;" class="d-inline-block"><a class="text-light" href="#">Terms Of Services </a></li>
	  <li class="d-inline-block"><a class="text-light" href="#">Privacy Policy</a></li>
	 </ul>
	</div>
   </div>
  </div>
 </div>
</section>
    </main>
</body>
</html>