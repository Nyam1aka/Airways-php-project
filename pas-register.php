<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Passenger Register page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
	<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
if(isset($_GET['error'])) {
    if($_GET['error'] === 'invalidemail') {
        echo '<script>alert("Invalid email")</script>';
    } else if($_GET['error'] === 'pwdnotmatch') {
        echo '<script>alert("Passwords do not match")</script>';
    } else if($_GET['error'] === 'sqlerror') {
        echo"<script>alert('Database error')</script>";
    } else if($_GET['error'] === 'usernameexists') {
        echo"<script>alert('Username already exists')</script>";
    } else if($_GET['error'] === 'emailexists') {
        echo"<script>alert('Email already exists')</script>";
    }
}
?>

<div class="container">
        <!-- <div class="legend">
            <img src="images/airtic.png" alt="Plane Image">
        </div> -->
        <h1>USER REGISTER</h1> 
        <form action="includes/pas-register.inc.php" method="POST">
            <div class="form-row">
                   
                    <div class="input-text">  
                        <div class="input-group">
                            <label for="user_id">Username:</label>
                            <input type="text" name="username" id="username" placeholder="Username"  required>
                        </div>
                    
                        <div class="input-group">
                            <label for="email_id">Email:</label>
                            <input type="text" name="email_id" id="email_id" placeholder="Enter your Email"  required>
                        </div>

                        <div class="input-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                             placeholder="Enter Your Password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                        </div>

                        <div class="input-group">
                            <label for="password_repeat">Confirm password:</label>
                            <input type="password" name="password_repeat" placeholder="Repeat Your Password" id="password_repeat" required>
                        </div>

                    </div>
            </div>

                <div class="row mt-4">
                    <div class="text-center">
                        <button name="signup_submit" type="submit" 
                            class="btn btn-info mt-2">
                            <div style="font-size: 1.5rem;">
                            <i class="fa fa-lg fa-arrow-right"></i>Register  
                            </div>
                        </button>                            
                    </div>
                 </div>
        </form> 
<div class="col-md-3"></div>             
</div> 
</body>