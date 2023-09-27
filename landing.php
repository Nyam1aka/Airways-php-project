<?php 
    require 'includes/dbconn.php';  
                   
?> 	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Booking Page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/landing.css">
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
                <li class="nav-item">
                        <a class="nav-link" href="landing.php">Book</a>
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
                        <a class="nav-link" href="history.php">Travel history</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="includes/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
<!-- Navigation end -->
<body>
<?php
    if(isset($_GET['error'])) {
        if($_GET['error'] === 'sameval') {
		  echo '<script>alert("Select different value for departure city and arrival city")</script>';
      } else if($_GET['error'] === 'seldep') {
          echo '<script>alert("Select Departure city")</script>';
      } else if($_GET['error'] === 'selarr') {
          echo"<script>alert('Select Arrival city')</script>";
    }
}
?>
        <section class="bg-danger">
            <div class="container-fluid" style="height: 200px; background-color:#404a3d;">
                <div class="row text-center text-white text-capitalize">
                    <h3 class="mt-4 mb-4">Book, Pay and Travel</h3>
                </div>
                <form action="search.php" method="POST">
                <div class="row">
                    <div class="col-sm-3">
                        <select class="form-control" aria-label="Default select example" name="dep_city">
                            <option selected>From</option>
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
                    <div class="col-sm-3">
                        <select class="form-control" aria-label="Default select example" name="arr_city">
                            <option selected>To</option>
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
                    <div class="col-sm-1">
                        <select class="form-control" aria-label="Default select example" name="f_class">
                            <option selected>Class</option>
                            <option value="A">Class A</option>
                            <option value="B">Class B</option>
                            <option value="C">Class C</option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <select  class="form-control" aria-label="Default select example" name="passengers">
                            <option selected>Passengers</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input class="form-control" type="date" name="date" id="date" placeholder="Date">                        
                    </div>
                    
                    <div class="col-sm-2">
                        <button class="btn btn-primary text-dark btn-outline-success" type="submit" name="search-flight">Search</button>
                    </div>
                </div>
                </form>
            </div>
        </section>
        <section>
            <div class="container-fluid text-center">
                <h4></h4>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row mx-5">
                            <img src="images/mpesa.png" class="img-fluid" alt="" style="width: 100px; width: 150px; margin-left: 100px;">
                        </div>
                        <div class=".row text-dark">
                            <h5>Lipa na Mpesa</h5>
                        </div>
                        <p>
                            We have introduced several options to book from <br> the comfort of your home or from whichever location <br> you are. e.g Lipa Na Mpesa, online booking
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <img src="images/airplane.webp" class="img-fluid" alt="" style="width: 100px; width: 150px; margin-left: 100px;">
                        </div>
                        <div class="div">
                            <h5>We Care</h5>
                        </div>
                        <div>
                            <p>
                                We have the most comfortable plane on the kenyan <br> air with lot of legroom to ensure that you <br> reach your destination fully relaxed
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <h2 class="text-capitalize text-center mt-5">kenya airways</h2>
                        </div>
                        <div class="row mt-5">
                            <h5>The pride of africa</h5>
                        </div>
                        <div class="row">
                            <p class="text-center">
                                Kenya Airways has been leading public air <br> transporter for the past 48 years in Kenya
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="row">
                            <img src="images/seat.jpg" class="img-fluid" alt="..." style="height: 80px; width: 100px; border-radius: 10px; margin-left: 170px;">
                        </div>
                        <div class="row text-center text-capitalize">
                            <h5>sleeping seats</h5>
                        </div>
                        <div class="row">
                            <p>Kenya Airways plane has sleeping coach in eastern africa  <br>region with the largest seat to provide you with <br> luxurious travelling experience</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <img src="images/amenties.png" class="img-fluid" alt="" style="height: 80px; width: 100px; border-radius: 10px; margin-left: 170px;">
                        </div>
                        <div class="row text-center text-capitalize">
                            <h5>full amanities</h5>
                        </div>
                        <div class="row">
                            <p class="text-center">
                                Our planes are fitted with Air Conditioning, <br> high speed internet connection via wifi and <br> power outlets to charge your devices on the go
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <img src="images/banner.jpg" class="img-fluid" alt="" style="height: 80px; width: 100px; border-radius: 10px; margin-left: 170px;">
                        </div>
                        <div class="row text-center text-capitalize">
                            <h5>Comfort</h5>
                        </div>
                        <p class="text-center">
                            We have the most comfortable planes on the kenyan <br> air with lots of legroom to ensure that you reach <br> your destination fully relaxed
                        </p>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>