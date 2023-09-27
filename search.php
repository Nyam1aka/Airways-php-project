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
	<title>Passenger booking page</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/font-awesome.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/global.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Goblin+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200&display=swap" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
        <!-- link to online fonts -->
        <script src="https://kit.fontawesome.com/44f557ccce.js"></script>

   
</head>


<style>
table {
  background-color: white;
}

h1{
  font-family :'product sans' !important;
	color:#424242 ;
	font-size:40px !important;
	margin-top:20px;
	text-align:center;
}

th {
  font-size: 22px;
}
td {
  margin-top: 10px !important;
  font-size: 16px;
  font-weight: bold;
  color: #424242;
}
</style>
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
                          <li><a class="dropdown-item" href="#">Modify Booking</a></li>
						  <li><a class="dropdown-item" href="#">Travel History</a></li>
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
    <main>
        <?php if(isset($_POST['search-flight'])) { 
            $dep_date = $_POST['date'];                          
            $dep_city = $_POST['dep_city'];  
            $arr_city = $_POST['arr_city']; 
            $f_class = $_POST['f_class'];
            $_SESSION['class'] = $f_class;
            $passengers = $_POST['passengers'];
            $status="";
            if($dep_city === $arr_city){
              header('Location: landing.php?error=sameval');
              exit();    
            }
            if($dep_city === '0') {
              header('Location: landing.php?error=seldep');
              exit(); 
            }
            if($arr_city === '0') {
              header('Location: landing.php?error=selarr');
              exit();              
            }
            ?>
<section id="center" class="center_o">
 <div class="container">
  <div class="row center_o1 text-center">
   <div class="col-md-12">
     <h1 class="text-white">FLIGHTS FROM: <br> <?php echo $dep_city; ?> 
    to <?php echo $arr_city; ?> </h1>
   </div>
  </div>
 </div>
</section>
          <div class="container-md mt-2">
            <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr class="text-center">
                  <th scope="col">Airline</th>
                  <th scope="col">Departure</th>
                  <th scope="col">Fare</th>
                  <th scope="col">Status</th>
                  <th scope="col" class="text-center">Book</th>
                </tr>
              </thead>
              <tbody>
                <?php
                 

                $sql = 'SELECT * FROM Flights WHERE source=? AND destination =? AND 
                    DATE(departure)=? ORDER BY flight_id';
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt,$sql);                
                mysqli_stmt_bind_param($stmt,'sss',$dep_city,$arr_city,$dep_date);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) { 
                  $price = 0;

                  if($f_class == 'A') {
                    $_SESSION['class'] = 'A';
                    $price += (int)$row['Aprice']*(int)$passengers;
                    if($row['Aseats'] >=$passengers)
                    {
                      $status="available";
                    } else {
                     $status="Not Available";
                    }
                  }
                  if($f_class == 'B') {
                    $_SESSION['class'] = 'B';
                    $price += (int)$row['Bprice']*(int)$passengers;

                    if($row['Bseats'] >=$passengers){
                      $status="available";

                    } else {
                      $status="Not Available";

                    }
                    
                  }
                  if($f_class == 'C') {

                    $_SESSION['class'] = 'C';
                    $price += (int)$row['Cprice']*(int)$passengers;

                    if($row['Cseats'] >=$passengers){
                      $status="available";
                    }
                    else{
                      $status="Not Available";
                    }
                    
                  }
                       
                  echo "
                  <tr class='text-center'>                  
                    <td>".$row['flightname']."</td>
                    <td>".$row['departure']."</td>                 
                    <td>Ksh ".$price."</td>
                    ";
                    if($status=="available")
                          echo " <td>available</td>";
                    else
                          echo "<td>Not available</td>";

                  if(isset($_SESSION['userId'])) {   
                    echo " <td>
                    <form action='pass_form.php' method='post'>
                    <input name='flight_id' type='hidden' value=".$row['flight_id'].">
                      <input name='passengers' type='hidden' value=".$passengers.">
                      <input name='price' type='hidden' value=".$price.">
                      <input name='class' type='hidden' value=".$f_class.">
                      ";
                      if($status=="available"){
                        echo "Click the tick to continue ";
                        echo "<button name='book_but' type='submit' 
                                class='btn btn-success mt-0'>
                                <div style=''>
                                <i class='fa fa-lg fa-check'></i>  
                                </div>
                              </button>
                              </form>
                              </td>";                                                       
                      }else{
                        echo "<span class='text-danger'>This Class seat is not available. Please <a href='landing.php' class='alert-success'>Click Here<a/> to book from a different class or the next flight.</span>";
                        echo "</td>";
                      }

                      
				  } else {
                    echo "<td>Login to continue</td>";
                  }
                  echo '</tr> ';                 
                }
                ?>

              </tbody>
            </table>

          </div>
        <?php } ?>

    </main>
   