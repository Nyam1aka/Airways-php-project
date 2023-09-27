<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Admin Page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/admin.css">
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

                <!-- <li class="nav-item">
                    <a class="nav-link" href="add-flight.php">Add Flight</a>
                </li> -->
    
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
<?php
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'sqlerror') {
            echo "<script>alert('Error while deleting the record.');</script>";
        }
    } else if(isset($_GET['delete'])) {
        if($_GET['delete'] === 'success') {
            echo "<script>alert('The Record was deleted Successfully');</script>";
        }
    }
    ?>

<section id="center" class="center_o">
 <div class="container">
  <div class="row center_o1 text-center">
   <div class="col-md-12">
     <h1 class="text-white">Admin Panel</h1>
   </div>
  </div>
 </div>
</section>


<section id="benefit">
  <div class="container">
    <div class="row mb-3">

	 <div class="col-md-4">
	  <div class="benefit_1l">
	    <h4 class="col_1">OUR BENEFITS</h4>
		<h3>AIR TRANSPORT & LOGISTICS</h3>
		 </div>
	 </div>

	 <div class="col-md-8">
	  <div class="benefit_1l">
	   <p>Our Best Price Guarantee ensures that you get the best fares available on our website,
         also find our Best Flight Deals to the Rest of the World travelling in Business Class.
         Our commitment to deliver a safe travel experience to you still remains.
         If you intend to fly please check the entry requirements for the country you intend to fly to
          and fill the necesary requirements form on time.</p>
	  </div>
	 </div>

	</div>

	<div class="row">
        <div class="col-md-3">
            <div class="award text-center">
                <span style="font-size:50px;" class="col_4"><i class="fa fa-plane"></i></span>
                <h1 class="text-white mt-2">7000</h1>
                <h5 class="col_3 mb-0">+ Happy Clients</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="award text-center">
                <span style="font-size:50px;" class="col_4"><i class="fa fa-users"></i></span>
                <h1 class="text-white mt-2">2000</h1>
                <h5 class="col_3 mb-0">+ Total Members</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="award text-center">
                <span style="font-size:50px;" class="col_4"><i class="fa fa-user-plus"></i></span>
                <h1 class="text-white mt-2">600</h1>
                <h5 class="col_3 mb-0">+ Expert Instructor</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="award text-center">
                <span style="font-size:50px;" class="col_4"><i class="fa fa-trophy"></i></span>
                <h1 class="text-white mt-2">150</h1>
                <h5 class="col_3 mb-0">+ Win Awards</h5>
            </div>
        </div>
   </div>
  </div>
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
</body>
</html>