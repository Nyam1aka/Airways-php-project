<?php
session_start();
if(isset($_POST['flight_but']) and isset($_SESSION['adminId'])) {
    require '../includes/dbconn.php';
    $source_date = $_POST['source_date'];
    $source_time = $_POST['source_time'];
    $dest_date = $_POST['dest_date'];
    $dest_time = $_POST['dest_time'];
    $selectedOption = $_POST['selectedOption'];
    $selected = $_POST['selected'];
    $FlightName = $_POST['FlightName'];
    $ASeats = $_POST['ASeats'];
    $APrice = $_POST['APrice'];
    $BSeats = $_POST['BSeats'];
    $BPrice = $_POST['BPrice'];
    $CSeats = $_POST['CSeats'];
    $CPrice = $_POST['CPrice'];

    if($selectedOption===$selected || $selected==='To' || $selected==='From') {
      header('Location: ../add-flight.php?error=same');
      exit();
    }
    $dest_date_len = strlen($dest_date);
    $dest_time_len = strlen($dest_time);
    $source_date_len = strlen($source_date);
    $source_time_len = strlen($source_time);

    $dest_date_str = '';
    for($i=$dest_date_len-2;$i<$dest_date_len;$i++) {
      $dest_date_str .= $dest_date[$i];
    }
    $source_date_str = '';
    for($i=$source_date_len-2;$i<$source_date_len;$i++) {
      $source_date_str .= $source_date[$i];
    }
    $dest_time_str = '';
    for($i=0;$i<$dest_time_len-3;$i++) {
      $dest_time_str .= $dest_time[$i];
    }
    $source_time_str = '';
    for($i=0;$i<$source_time_len-3;$i++) {
      $source_time_str .= $source_time[$i];
    }
    $dest_date_str = (int)$dest_date_str;
    $source_date_str = (int)$source_date_str;
    $dest_time_str = (int)$dest_time_str;
    $source_time_str = (int)$source_time_str;

    $time_source = $source_time.':00';
    $time_dest = $dest_time.':00';
    $arrival = $dest_date.' '.$time_dest;
    $departure = $source_date.' '.$time_source;

    $dest_mnth = (int)substr($dest_date,5,2);
    $source_mnth = (int)substr($source_date,5,2);
    $flag = false;
    if($dest_mnth > $source_mnth){
      $flag = true;
    } else if($dest_mnth == $source_mnth){
      if($dest_date_str > $source_date_str) {
        $flag = true;
      } else if($dest_date_str == $source_date_str) {
        if($dest_time_str > $source_time_str){
          $flag = true;
        }
      }
    }

    if($flag == false) {
      header('Location: ../add-flight.php?error=destless');
      exit();
    } else {
          $sql = "INSERT INTO Flights(admin_id,source,destination,departure,arrival,
          flightname,Aseats,Aprice,Bseats,Bprice,Cseats,Cprice) VALUES (?,?,?,
          ?,?,?,?,?,?,?,?,?)";
          
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
          header('Location: ../add-flight.php?error=sqlerr1');
          exit();          
        } else {      
          $admin_id = $_SESSION['adminId'];  
          mysqli_stmt_bind_param($stmt,'isssssiiiiii',$admin_id,$selectedOption,$selected,$departure,$arrival,$FlightName,$ASeats,$APrice,$BSeats,$BPrice,$CSeats,$CPrice); 
          mysqli_stmt_execute($stmt); 
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header('Location: ../add-flight.php?success=succ');
        exit();
      }
} else {
    header('Location: ../index.php');
    exit();
}
