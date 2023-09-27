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
	<title>Ticket Report</title>
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

<section id="center" class="center_o" style="margin-top: -20px;">
    <div class="container">
        <div class="row center_o1 text-center">
            <div class="col-md-12">
                <h1 class="text-white">Ticket Report</h1>
            </div>
        </div>
    </div>
</section>
<div class="TicketReport" id="ticketReport">
<table class="my-3 table table-bordered table-striped table-hover" >
    <!-- Table header... -->
    <thead class="table-success text-center text-dark" style="font-size: 16px; font-weight: 700;">
            <tr>
                <td scope="col">Flight Name</td>
                <td scope="col">Source</td>
                <td scope="col">Destination</td>
                <td scope="col">Date</td>
                <td scope="col">Time</td>
                <td scope="col">Passenger Name</td>
                <td scope="col">Id number</td>
                <td scope="col">Phone number</td>
                <td scope="col">Class</td>
                <td scope="col">Seat Number</td>
                <td scope="col">Amount</td>
                <td scope="col">Ticket Number</td>
                
            </tr>
        </thead>
    <tbody>
        <?php      
                $sql = "SELECT * FROM ticket";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    $passId = $row["passenger_id"];
                    $class = $row["class"];
                    $flight_id= $row["flight_id"];
                    $amount= $row["cost"];
                    $query = "SELECT CONCAT(f_name,' ',m_name,' ',l_name) AS name,mobile,Id_number  FROM passenger_profile  WHERE passenger_id =$passId";
                    $result_query = mysqli_query($conn, $query);
                    while($row2 = mysqli_fetch_assoc($result_query)) {
                        $sql_query = "SELECT flightname,source,destination,DATE_FORMAT(departure,'%Y-%m-%d') AS date,DATE_FORMAT(departure,'%H:%i:%s') AS time FROM flights  WHERE flight_id=$flight_id";
                        $sql_query_result = mysqli_query($conn, $sql_query);
                        while($row3 = mysqli_fetch_assoc($sql_query_result)) {
                            echo "
                            <tr class='text-center'>
                                <td>".$row3['flightname']."</td>
                                <td>".$row3['source']."</td>
                                <td>".$row3['destination']."</td>
                                <td>".$row3['date']."</td>
                                <td>".$row3['time']."</td>
                                <td>".$row2['name']."</td>
                                <td>".$row2['Id_number']."</td>
                                <td>".$row2['mobile']."</td>
                                <td>".$class."</td>
                                <td>".$row['seat_no']."</td>
                                <td>".$amount."</td>
                                <td>".$row['ticket_code']."</td>
                             </tr>
                            ";
                        }
                    }

                }
        ?>

    </tbody>
</table>
</div>
<div class="col text-center">
    <button type="button" onclick="printReport()" class="btn btn-info mt-3">
        <div style="font-size: 1.5rem;"> Print</div>
    </button>
</div>

<!-- Footer -->
<div class="container-fluid my-3">
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
<script>
    function printReport(){
        // var newwin= open('','windowName','height=300,width=300');
        //  newwin.document.write(document.getElementById('ticketReport').innerHTML);
        //  newwin.print();  
        //   }

        const originalContents= document.body.innerHTML;
        const tableContent = document.querySelector('.table').outerHTML;
        document.body.innerHTML = '<div class="container mt-5">' + tableContent + '</div>';
        window.print();
        document.body.innerHTML = originalContent;
    }
  
</script>
</html>