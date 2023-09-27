<?php
session_start();
include "includes/dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Travel history</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/help.css">
    <link rel="stylesheet" href="css/global.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
    <!--jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />    
</head>
 <body>
<section id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand col_1" href="index-passenger.php"><span style="margin-bottom:10px;"><i class="fa fa-plane"></i></span> Kenya airways</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index-passenger.php">Home <span class="sr-only">(current)</span></a>
                </li>

				<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Book</a>
                      <ul class="dropdown-menu drop_1 " aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="landing.php">Add Booking</a></li>
						  <li><a class="dropdown-item" href="history.php">Travel History</a></li>
                      </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="help.php">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About us</a>
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

<section id="center" class="center_o" style="margin-top: -20px;">
    <div class="container">
        <div class="row center_o1 text-center">
            <div class="col-md-12">
                <h1 class="text-white">Travel History</h1>
            </div>
        </div>
    </div>
</section>

<table class=" my-3 table table-bordered table-striped table-hover">
    <!-- Table header... -->
    <thead class="table-success text-center text-dark" style="font-size: 16px; font-weight: 700;">
            <tr>
                <td scope="col">Flight Name</td>
                <td scope="col">From</td>
                <td scope="col">To</td>
                <td scope="col">Class</td>
                <td scope="col">Date</td>
                <td scope="col">Time</td>
                <td scope="col">Amount</td>
            </tr>
        </thead>
    <tbody>
        <?php
                $userId=$_SESSION['userId'];
                
                $sql = "SELECT passenger_id,class FROM passenger_profile  WHERE user_id =$userId";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $passId= $row["passenger_id"];
                    $class= $row["class"];
                    $query = "SELECT flight_id,amount  FROM payment  WHERE passenger_id =$passId";
                    $result_query = mysqli_query($conn, $query);
                    while($row2 = mysqli_fetch_assoc($result_query)) {
                        $flight_id= $row2["flight_id"];
                        $amount= $row2["amount"];
                        $sql_query = "SELECT flightname,source,destination,DATE_FORMAT(departure,'%Y-%m-%d') AS date,DATE_FORMAT(departure,'%H:%i:%s') AS time FROM flights  WHERE flight_id=$flight_id";
                        $sql_query_result = mysqli_query($conn, $sql_query);
                        while($row3 = mysqli_fetch_assoc($sql_query_result)) {
                            echo "
                            <tr class='text-center'>
                                <td>".$row3['flightname']."</td>
                                <td>".$row3['source']."</td>
                                <td>".$row3['destination']."</td>
                                <td>".$class."</td>
                                <td>".$row3['date']."</td>
                                <td>".$row3['time']."</td>
                                <td>".$amount."</td>
                             </tr>
                            ";
                        }
                    }

                }
        ?>

    </tbody>
</table>

<!-- Footer -->
<div class="container-fluid">
  <div class="footer_2 row" style="background-color:#394336; padding-top:20px; padding-bottom:20px;">
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
</body>
</html>