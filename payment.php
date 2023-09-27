<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Payment Page</title>
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
        <!-- link to online fonts -->
        <script src="https://kit.fontawesome.com/44f557ccce.js"></script>
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

<?php
 if(isset($_SESSION['userId'])) {   ?> 
<main>
<?php
  if(isset($_GET['error'])) {
    if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    } else if($_GET['error'] === 'noret') {
      echo"<script>alert('No return flight available')</script>";
    } else if($_GET['error'] === 'mailerr') {
      echo"<script>alert('Mail error')</script>";
    }
  }
?>
	  <div class="container container-fluid py-3">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 mx-auto">
                    <h1 class="text-center text-dark text-capitalize">
                        PAYMENT INVOICE
                    </h1>
                    <div id="payment-invoice" class="card">
                        <div class="card-body">
                            <h4 class="text-danger text-center"> Accepted means of Payment</h4>
                            <div class="icon-container">
                                <img src="images/MPESA.jpg" alt="" style="height:50px">
                                <img src="images/Equity-till.png" alt="" style="height: 50px">
                                <img src="images/kcb-till.jpg" alt="" style="height: 50px">
                                <img src="images/cop.jpeg" alt="" style="height: 50px">
                            </div>
                            <hr>
                            <form action="includes/payment.inc.php" method="post" novalidate="novalidate" class="needs-validation">
                                <div class="form-group">
                                    <label for="" class="control-label mb-1">Payment method</label>
                                    <select class="form-control" aria-label="Default select example" name="payment_method">
                                        <option value="Mpesa">Mpesa</option>
                                        <option value="equity">Equity</option>
                                        <option value="KCB">KCB</option>
                                        <option value="cooperative">CO-OP</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Phone number" class="control-label mb-1">Phone number</label>
                                    <input id="" name="phone_number" type="text" class="form-control cc-number identified visa" required autocomplete="off" >
                                    <span class="invalid-feedback">Enter the Phone Number</span>
                                </div>
                        
                                        <div class="form-group">
                                            <label for="payment-date" class="control-label mb-1">Payment Date</label>
                                            <input id="payment-date" name="payment_date" type="date" class="form-control payment-date" required placeholder=" DD / MM / YY" autocomplete="payment-date" >
                                            <span class="invalid-feedback">Enter the Phone Number</span>   
                                        </div>
                                   

                                <div class="form-row">
                                <div class="d-grid col-10 mx-auto mt-3">
                                    <button class="btn btn-primary" name="payment_but"  type="submit">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Pay </span>
                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                    </button>
                                        
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
</main>
<?php } ?>