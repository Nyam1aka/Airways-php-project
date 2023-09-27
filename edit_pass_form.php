<?php
include "includes/dbconn.php";
if (isset($_POST['editt_button'])) {
    $passengerId = $_POST['passenger_id'];
    $firstName = $_POST['firstname'];
    $middleName = $_POST['midname'];
    $lastName = $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $dob = $_POST['date'];
    $idNumber = $_POST['idno'];
    $sql = "UPDATE passenger_profile SET f_name=?,m_name=?,l_name=?,mobile=?,dob=?,Id_number=? WHERE passenger_id= $passengerId";
    $stmt = $conn -> prepare($sql);
    $stmt -> bind_param("sssisi", $firstName,$middleName,$lastName,$mobile,$dob,$idNumber);
    if (!$stmt->execute()) {

        header('Location: edit_pass_form.php?error=sqlerror');
        exit();
    } else {
        header('Location: manage-passenger.php?update=success'); 
    }
}
?>
<?php
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'sqlerror') {
            echo "<script>alert('Error while updating passenger details.');</script>";
        }
    }
?>  

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Edit Passengers</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/passForm.css">
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
<main>
    <div class="container mb-5">
    <div class="col-md-12 main-col">
        <h1 class="text-center text-secondary">PASSENGER DETAILS</h1>  
        <form action="" class="needs-validation mt-4" 
            method="POST">   
            <div class="pass-form">   
                <div class="form-row">
                <?php
                    if (isset($_POST['edit_button'])) {
                        $passengerId = $_POST['passenger_id'];
                        $query = "SELECT * FROM passenger_profile WHERE passenger_id = ?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $query)) {
                    
                            header('Location: edit_pass_form.php?error=sqlerror');
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, 'i', $passengerId);
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                                <div class="form-group col-md-2">
                                <label for="firstname">First Name </label>
                                 </div>

                                 <input type="hidden" name="passenger_id"  value="'.$passengerId.'" >

                            <div class="form-group col-md-2">
                                <input type="text" name="firstname" id="firstname" value="'.$row['f_name'].'" class="pl-0 pr-0" 
                                    required style="width: 100%;">
                            </div>
                
                            <div class="form-group col-md-2">
                                <label for="midname">Middle Name</label>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="midname" id="midname" value="'.$row['m_name'].'" class="pl-0 pr-0"
                                    required style="width: 100%;">
                            </div>
                    
                            <div class="form-group col-md-2">
                                <label for="lastname">Last Name</label>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="lastname" id="lastname" value="'.$row['l_name'].'" class="pl-0 pr-0"
                                    required style="width: 100%;">
                            </div>
                </div>

                <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="mobile">Contact No</label>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="number" name="mobile" min="0" id="mobile" value="'.$row['mobile'].'"
                                required style="width: 100%;">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="dob">DOB</label>
                        </div>

                        <div class="form-group col-md-2">
                            <input id="date" name="date" type="date" id="date" value="'.$row['dob'].'"
                             required style="width: 100%;">
                        </div>
                        

                        <div class="form-group col-md-2">
                            <label for="idno">Id Number</label>
                        </div>
                        <div class="form-group col-md-2">
                            <input id="idno" name="idno" type="number" id="idno" value="'.$row['Id_number'].'"
                                 style="width: 100%;">
                        </div>
                </div>
            </div>   
                                ';
                             }
                            mysqli_stmt_close($stmt);
                            mysqli_close($conn);
                        }
                    } 
                ?>
                           
            <div class="col text-center">
                <button name="editt_button" type="submit" 
                class="btn btn-primary mt-4">
                <div>
                <i class="fa fa-lg fa-arrow-right"></i> Proceed  
                </div>
                </button>
            </div>         
        </form>              
    </div>
    </div>
</main>
</body>
</html>
