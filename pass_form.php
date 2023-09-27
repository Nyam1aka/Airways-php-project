<?php 
require 'includes/dbconn.php';                      
?>
<?php 
session_start(); 
$user_id = $_SESSION['userId'];
$username = $_SESSION['userUid'];
$email = $_SESSION['userMail'];                     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Passenger Page</title>
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
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'invdate') {
          echo '<script>alert("Invalid date of birth")</script>';
      } else if($_GET['error'] === 'moblen') {
          echo '<script>alert("Invalid contact info")</script>';
      } else if($_GET['error'] === 'sqlerror') {
          echo"<script>alert('Database error')</script>";
      } else if($_GET['error'] === 'idlen') {
        echo '<script>alert("Invalid id number")</script>';
      }
      echo"<script>location.replace(document.referer)</script>";
    }
    ?>
<?php if(isset($_SESSION['userId']) && isset($_POST['book_but'])) {   
    $flight_id = $_POST['flight_id'];
    $passengers = $_POST['passengers']; 
    $price = $_POST['price'];
    $class = $_SESSION['class'] ;
?>    
<main>
    <div class="container mb-5">
    <div class="col-md-12 main-col">
        <h1 class="text-center text-secondary">PASSENGER DETAILS</h1>  
        <form action="includes/pass_form.inc.php" class="needs-validation mt-4" 
            method="POST">

            <input type="hidden" name="class" value=<?php echo $class; ?>>   
            <input type="hidden" name="passengers" value=<?php echo $passengers; ?>>   
            <input type="hidden" name="price" value=<?php echo $price; ?>>   
            <input type="hidden" name="flight_id" value=<?php echo $flight_id; ?>>   
        <?php for($i=1;$i<=$passengers;$i++) {
            echo' 
            <div class="pass-form">   
                <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="firstname'.$i.'">First Name </label>
                            </div>
                            
                            <div class="form-group col-md-2">
                                <input type="text" name="firstname[]" id="firstname'.$i.'" class="pl-0 pr-0" 
                                    required style="width: 100%;">
                            </div>
                
                            <div class="form-group col-md-2">
                                <label for="midname'.$i.'">Middle Name</label>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="midname[]" id="midname'.$i.'" class="pl-0 pr-0"
                                    required style="width: 100%;">
                            </div>
                    
                            <div class="form-group col-md-2">
                                <label for="lastname'.$i.'">Last Name</label>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" name="lastname[]" id="lastname'.$i.'" class="pl-0 pr-0"
                                    required style="width: 100%;">
                            </div>
                </div>

                <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="mobile'.$i.'">Contact No</label>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="number" name="mobile[]" min="0" id="mobile'.$i.'" 
                                required style="width: 100%;">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="dob">DOB</label>
                        </div>

                        <div class="form-group col-md-2">
                            <input id="date" name="date[]" type="date"
                             required style="width: 100%;">
                        </div>
                        

                        <div class="form-group col-md-2">
                            <label for="idno">Id Number</label>
                        </div>
                        <div class="form-group col-md-2">
                            <input id="idno" name="idno[]" type="number"
                                 style="width: 100%;">
                        </div>
                </div>
            </div>'; }  ?>    
            <div class="col text-center">
                <button name="passenger_button" type="submit" 
                class="btn btn-primary mt-4">
                <div>
                <i class="fa fa-lg fa-arrow-right"></i> Proceed  
                </div>
                </button>
            </div>         
        </form>              
    </div>
    </div>
<script>
$(document).ready(function(){
  $('.input-group input').focus(function(){
    me = $(this) ;
    $("label[for='"+me.attr('id')+"']").addClass("animate-label");
  }) ;
  $('.input-group input').blur(function(){
    me = $(this) ;
    if ( me.val() == ""){
      $("label[for='"+me.attr('id')+"']").removeClass("animate-label");
    }
  }) ;
});
</script>
</main>
<?php } ?> 
</body>
</html>
