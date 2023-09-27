<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Passenger Home Page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/passenger.css">
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
<!-- Carousel section -->
<section id="center" class="center_home">
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class="" aria-current="true"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/image1.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
         <h5 class="mb-3 col_4 big">The Best Flying Services</h5>
		<h1 class="text-white big">Welcome To Kenya Airways </h1>
		<p class="col_3 mb-4">We offer the best Flying experience in East Africa, our services are of high quality and readily available thus making our passengers' comfortable while flying with us.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/image2.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <h5 class="mb-3 col_4 big">The Best Flying Services</h5>
		<h1 class="text-white big">Welcome To Kenya Airways</h1>
		<p class="col_3 mb-4">We offer the best Flying experience in East Africa, our services are of high quality and readily available thus making our passengers' comfortable while flying with us.</p>
		</div>
    </div>
    <div class="carousel-item">
      <img src="images/image3.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
         <h5 class="mb-3 col_4 big">The Best Flying Services</h5>
		<h1 class="text-white big">48 years Of Experience </h1>
		<p class="col_3 mb-4">  Kenya Airways, a member of the Sky Team Alliance, is a leading African airline flying to 42 destinations worldwide, 
            35 of which are in Africa and carries over four million passengers annually.</p>
		</div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>

<!-- Our Services -->

<section id="serv">
  <div class="container">
   <div class="row serv_1 text-center mb-3">
     <div class="col-md-12">
	   <h5 class="col_1">WHAT WE DO</h5>
	   <h2 class="mb-0"> CUSTOMER SERVICES WE OFFER</h2>
	 </div>
   </div>
   <div class="row serv_2 ">
     <div class="col-md-3">
	   <div class="serv_2i">
	    <div class="serv_2i1">
		  <h4>CUSTOMER INQUIRY</h4>
		  <p class="mb-0">When a customer inquires about a fare or makes a reservation by calling our reservation center,
			we inform them immediately.</p>
		</div>
		<div class="serv_2i2 position-relative">
		 <div class="serv_2i2i">
		  <div class="grid">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="images/products.png" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		 </div>
		</div>
	   </div>
	 </div>
	 <div class="col-md-3">
	   <div class="serv_2i">
	    <div class="serv_2i1">
		  <h4>BUGGAGE DELIVERY</h4>
		  <p class="mb-0">We will make every possible effort to ensure that your bags travel on the same flight as you.
			 If it doesn't, we will provide it within a day.</p>
		</div>
		<div class="serv_2i2 position-relative">
		 <div class="serv_2i2i">
		  <div class="grid">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="images/services.png" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		 </div>
		 </div>
	   </div>
	 </div>
	 <div class="col-md-3">
	   <div class="serv_2i">
	    <div class="serv_2i1">
		  <h4>RESERVATIONS</h4>
		  <p class="mb-0">When you make a reservation, we will either hold your reservation at given fare
			 without payment for 24 hours or allow you to cancel it.</p>
		</div>
		<div class="serv_2i2 position-relative">
		 <div class="serv_2i2i">
		  <div class="grid">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="images/results.jpg" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		 </div>
		 </div>
	   </div>
	 </div>
	 <div class="col-md-3">
	   <div class="serv_2i">
	    <div class="serv_2i1">
		  <h4>TICKET REFUNDS</h4>
		  <p class="mb-0">We will do our best to process eligible refunds in the time according with our frame, 
			provided we receive all necessary information. </p>
		</div>
		<div class="serv_2i2 position-relative">
		 <div class="serv_2i2i">
		  <div class="grid">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="images\air.jpg" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		 </div>
		</div>
	   </div>
	 </div>
   </div>
  </div>
</section>

<!-- Grow section -->
<section id="grow">
  <div class="container">
     <div class="row grow_1">
	   <div class="col-md-5">
	    <div class="grow_1l">
		  <div class="grid clearfix">
		  <figure class="effect-jazz mb-0">
			<a href="#"><img src="images/about.jpg" class="w-100" alt="img25"></a>
		  </figure>
	  </div>
		</div>
	   </div>
	   <div class="col-md-7">
	    <div class="grow_1r">
		<h5 class="col_1">KENYA AIRWAYS</h5>
		<h2>FLYING BETTER</h2>
		<h4>48 YEARS OF OPERATION</h4>
		<p>Kenya Airways, a member of the Sky Team Alliance, is a leading African airline flying to 42 destinations worldwide, 
            35 of which are in Africa and carries over four million passengers annually. 
            In 2020 KQ was named Africa’s Leading Airline by the World Travel Awards. 
            It continues to modernize its fleet with its 32 aircraft being some of the youngest in Africa.
             Kenya Airways takes pride in being at the forefront of connecting Africa to the World and the World to Africa through its hub at the new ultra-modern Terminal 1A at the Jomo Kenyatta International Airport in Nairobi..</p>
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