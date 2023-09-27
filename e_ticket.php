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
	<title>Passenger Home Page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/ticket.css">
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
<body>

    <div class="container-fluid">
        <div class="col-sm-6 card text-center mx-auto mt-5">
            <div class="card-header">
                <h1 class="text-capitalize text-center">
                    kenya airways 
                </h1>
                <h6>+254790487504 &nbsp;&nbsp;&nbsp;&nbsp;+2547456350811</h6>
            </div>

           
        <div class="card-body">
            
        <?php
            $flight_id = $_SESSION['flight_id'];
            $stmt = mysqli_stmt_init($conn);
             $sql = "SELECT source,destination,DATE_FORMAT(departure,'%Y-%m-%d') AS date,DATE_FORMAT(departure,'%H:%i:%s') AS time,flightname FROM flights  WHERE flight_id=$flight_id";
             $result = mysqli_query($conn, $sql);
          
            while($row = mysqli_fetch_assoc($result)) {

                echo '
                <div class="row">
                <div class="col-sm-6 card-title text-center">
                    <h5>From: '.$row["source"].'</h5>
                </div>
                <div class="col-sm-6 card-title text-center">
                    <h5>To: '.$row["destination"].'</h5>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-4 card-title text-center">
                    <p>'.$row["flightname"].'</p>
                </div>
                <div class="col-sm-4 card-title text-center">
                    <p>Date:'.$row["date"].' </p>
                </div>
                <div class="col-sm-4 card-title text-center">
                    <p>Departure Time: '.$row["time"].'</p>
                </div>
                 </div>
                
                ';
            }
                $ticket_code= $_SESSION["ticketCode"];
                $sql = "SELECT passenger_id  FROM ticket  WHERE ticket_code=$ticket_code";
                $result = mysqli_query($conn, $sql);
            
                while($row = mysqli_fetch_assoc($result)) {
                    $passId= $row["passenger_id"];
                    $sql = "SELECT CONCAT(f_name,' ',m_name,' ',l_name) AS name,mobile,Id_number  FROM passenger_profile  WHERE passenger_id =$passId";
                    $results = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($results)) {
                        echo '
                        <div class="row">
                            <div class="col-sm-4 card-title text-center">
                                <p><b>Name: '.$row["name"].'</b></p>
                            </div>
                            <div class="col-sm-4 card-title text-center">
                                <p>Phone: '.$row["mobile"].'</p>
                            </div>
                            <div class="col-sm-4 card-title text-center">
                                <p>Id Number: '.$row["Id_number"].'</p>
                            </div>
                        </div>
                        
                        ';
                    }    
                   
                }

                $query = "SELECT cost,class,seat_no  FROM ticket  WHERE ticket_code=$ticket_code";
                $query_result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($query_result)) {
                    echo '
                        <div class="row">
                            <div class="col-sm-4 card-title text-center">
                                <p>Amount:'.$row["cost"].' </p>
                            </div>
                            <div class="col-sm-4 card-title text-center">
                                <p>Class: '.$row["class"].'</p>
                            </div>
                            <div class="col-sm-4 card-title text-center">
                                <p>Seat number: '.$row["seat_no"].'</p>
                            </div>
                         </div>
                    ';

                }


                
            
              

        ?>
                
        </div>
        <div class="card-footer text-muted row text-center">
            <div class="col-sm-6 card-title text-center">
                <p>Ticket Id: <?php echo $_SESSION["ticketCode"]?></p>
            </div>
            <div class="col-sm-6 card-title text-center">
                <p>Booking Ref <?php echo rand(000117001002, 211008001007)?></p>
            </div>
            </div>
        </div>
    </div>
    <?php
    unset($_SESSION['flight_id']);
    unset($_SESSION['passengers']);
    unset($_SESSION['pass_id']);
    unset($_SESSION['price']);
    unset($_SESSION['class']);        
    unset($_SESSION["ticketCode"]);
    ?>
</body>
<script>
    window.print();
</script>
</html>