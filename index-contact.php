<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Contact page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/global.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
    <!--jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
            $(document).ready(function(){
                $("input").focus(function(){
                    $(this).css("background-color", "skyblue");
                });
                $("input").blur(function(){
                    $(this).css("background-color", "blueviolet");
                });
            });
    </script>
        
    </head>
<body>
<section id="header">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand col_1" href="index.php"><span style="margin-bottom:10px;"><i class="fa fa-plane"></i></span> Kenya airways</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="index-contact.php">Contact us</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="index-help.php">Help</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="index-about.php">About us</a>
                </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                      <ul class="dropdown-menu drop_1 " aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="pas-login.php">Passenger</a></li>
                          <li><a class="dropdown-item" href="admin-login.php">Admin</a></li>
                      </ul>
                    </li>
                </ul>
                               
            </div>
  </nav>
</section>

<section id="center" class="center_o">
 <div class="container">
  <div class="row center_o1 text-center">
   <div class="col-md-12">
     <h1 class="text-white">Contact Us</h1>
   </div>
  </div>
 </div>
</section>

<section id="contact">
<form  method="post" name="sentMessage">
<div class="row contact_2 mt-5">
    <div class="col-md-6">
	 <div class="contact_2l">
		 <h1 class="text-white text-center">WRITE US A MESSAGE</h1>
		<div class="row quote_2 mt-3">
            <div class="col-md-6">
                <div class="quote_2l">
                <input type="text" class="form-control" placeholder=" First Name" name="Firstname" id="Firstname" pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters" required value="<?php if (isset($_POST['Firstname']))	echo htmlspecialchars($_POST['Firstname'], ENT_QUOTES); ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="quote_2l">
                <input type="text" class="form-control" placeholder="Last Name"  name="Lastname" id="Lastname" pattern="[a-zA-Z][a-zA-Z\s]*" title="Alphabetic and space only max of 30 characters" required value="<?php if (isset($_POST['Lastname']))	echo htmlspecialchars($_POST['Lastname'], ENT_QUOTES); ?>">
                </div>
            </div> 
		</div>

		<div class="row quote_2 mt-4">
            <div class="col-md-6">
                <div class="quote_2l">
                <input type="tel" class="form-control" name="Phone"  placeholder="Phone number" id="Phone" maxlength="15" required value="<?php if (isset($_POST['Phone'])) echo htmlspecialchars($_POST['Phone'], ENT_QUOTES); ?>">
                </div>
            </div>
            <div class="col-md-6">
                 <div class="quote_2l">
                 <input type="email" class="form-control" placeholder="Email Address" name="Email" id="Email" maxlength="60" required  value="<?php if (isset($_POST['Email']))	echo htmlspecialchars($_POST['Email'], ENT_QUOTES); ?>">
                 </div>
            </div>
		</div>

		<div class="row quote_2 mt-4">
            <div class="col-md-12">
                <div class="quote_2l">
                <textarea style="height:200px;" placeholder="Write a message" name="Message" id="Message" class="form-control"></textarea>
                </div>
            </div>
		</div>

		<div class="row quote_2 mt-3">
            <div class="col-md-12">
                <div class="quote_2l">
                <input type="submit" name="sub" value="Send Now" class="btn btn-primary d-inline-block mt-3 mb-0">	
                </div>
            </div>
		</div>

	 </div>
	</div>
 

	<div class="col-md-6">
	 <div class="contact_2r text-center">
       <img style="border-radius:5px;" src="images/plane1.jpg" alt="abc">
	   <h4 class="col_1 mt-4">GET IN TOUCH WITH US</h4>
		<h2>HAVE QUESTION?</h2>
		<p>If you have any questions or suggestions you can contact us through the details provided below.</p>
        <p class="contact-agile1"><strong>Phone :</strong>+25 (79)048-75-04</p>
        <p class="contact-agile1"><strong>Email :</strong> <a href="mailto:name@example.com">kenyaairways@info.com</a></p>
                            
		 <h5><a class="btn btn-primary" href="about.php">Learn More</a></h5>
	 </div>
	</div>
	
  </div>
  </div>
 </form>
                            <?php
                                if(isset($_POST['sub']))
                                {
                                    require 'includes/dbconn.php';

                                    $errors = array(); // Initialize an error array.
                                    // Check for a first name:
                                    $Firstname = filter_var( $_POST['Firstname'], FILTER_SANITIZE_STRING);
                                    if (empty($Firstname)) {
                                        $errors[] = 'You forgot to enter your first name.';
                                    }
                                    
                                    // Check for a Last name:
                                    $Lastname = filter_var( $_POST['Lastname'], FILTER_SANITIZE_STRING);
                                    if (empty($Lastname)) {
                                        $errors[] = 'You forgot to enter your first name.';
                                    }
                                    
                                    $errors = array(); // Initialize an error array.
                                    // Check for a Phone Number:
                                    $Phone = filter_var( $_POST['Phone'], FILTER_SANITIZE_STRING);
                                    if (empty($Phone)) {
                                        $errors[] = 'You forgot to enter your first name.';
                                    }
                                    
                                    // Check for an Email:
                                    $Email = filter_var( $_POST['Email'], FILTER_SANITIZE_STRING);
                                    if (empty($Email)) {
                                        $errors[] = 'You forgot to enter your first name.';
                                    }
                                    
                                    $Message = filter_var( $_POST['Message'], FILTER_SANITIZE_STRING);
                                    if (empty($Message)) {
                                        $errors[] = 'You forgot to type your feedback text.';
                                    }

                                    $query = "INSERT INTO contact ( Firstname, Lastname, Phone, Email,Message, registration_date) 
                                    VALUES ('$Firstname', '$Lastname', '$Phone', '$Email', '$Message', now() )" ;
                            
                            
                                    if(mysqli_query($conn,$query)){
                                    
                                        echo '<script>alert("Feedback send Successfully")</script>';
                                    } else {
                                        echo "Error: " . mysqli_error($conn);
                                    }
                                }
            
						    ?>
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
