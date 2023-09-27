<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Add flight Page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/addflight.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
    <style>
        input[type="date"],
        input[type="time"],
        input[type="name"],
        input[type="number"]
        {
        margin: 6px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    </style>

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
        if($_GET['error'] === 'destless') {
            echo "<script>alert('Dest. date/time is less than src.');</script>";
        } else if($_GET['error'] === 'sqlerr') {
          echo "<script>alert('Database error');</script>";
        } else if($_GET['error'] === 'same') {
          echo "<script>alert('Same Destination specified in source and destination');</script>";
        }
    } else if(isset($_GET['success'])) {
        if($_GET['success'] === 'succ') {
            echo "<script>alert('Registration was Successful');</script>";
        }
    }
    ?>

<div class="container">
        <h1 class="text-center">ADD FLIGHT</h1> 
        <form action="includes/add-flight.inc.php" method="POST">

        <div class="form-row">
            <div class="form-row">
                <div class="form-group col-md-1">
                <label for="source">From:</label>
                </div>
                <div class="form-group col-md-5">
                    <select class="form-control" id="source" name="selectedOption">
                             <option value="Kisumu">Kisumu</option>
                            <option value="Nairobi">Nairobi</option>
                            <option value="Mombasa">Mombasa</option>
                            <option value="Malindi">Malindi</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Kitale">Kitale</option>
                            <option value="Lodwar">Lodwar</option>
                            <option value="Nakuru">Nakuru</option>
                            <option value="Naivasha">Naivasha</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-1">
                <label for="destination">To:</label>
                </div>
                <div class="form-group col-md-5">
                    <select class="form-control" id="destination" name="selected">
                            <option value="Kisumu">Kisumu</option>
                            <option value="Nairobi">Nairobi</option>
                            <option value="Mombasa">Mombasa</option>
                            <option value="Malindi">Malindi</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Kitale">Kitale</option>
                            <option value="Lodwar">Lodwar</option>
                            <option value="Nakuru">Nakuru</option>
                            <option value="Naivasha">Naivasha</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-row">
                    <div class="form-group col-md-1">
                    <label for="departure">Departure:</label>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="date" name = "source_date" class="form-control" required >
                    </div>
                    <div class="form-group col-md-2">
                        <input type="time" name = "source_time" class="form-control" required >
                    </div>

                    <div class="form-group col-md-1">
                    <label for="arrival">Arrival:</label>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="date" name = "dest_date" class="form-control" required >
                    </div>
                    <div class="form-group col-md-2">
                        <input type="time" name = "dest_time" class="form-control" required >
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="price">Flight Name:</label>
                </div>
                <div class="form-group col-md-9">
                    <input type="name" name = "FlightName" class="form-control" required > 
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="class_seat">Class A Seats:</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name = "ASeats" class="form-control" required > 
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="price">Class A price:</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name = "APrice" class="form-control" required > 
                </div>
            </div>
       
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="class_seat">Class B Seats:</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name = "BSeats" class="form-control" required > 
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="price">Class B price:</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name = "BPrice" class="form-control" required > 
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="class_seat">Class C Seats:</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name = "CSeats" class="form-control" required > 
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="price">Class C price:</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="number" name = "CPrice" class="form-control" required > 
                </div>
            </div>

            
            <div class="row mt-4"> 
                <div class="text-center">
                        <button name="flight_but" type="submit" 
                            class="btn btn-success mt-3">
                            <div style="font-size: 2.7rem;">
                            <i class="fa fa-lg fa-arrow-right"></i> Complete 
                            </div>
                        </button>                            
                    </div>
            </div>

      </div>
    </form> 
</div>
</body>
</html>