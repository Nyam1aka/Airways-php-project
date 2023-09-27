<?php
session_start();
if(isset($_POST['payment_but']) && isset($_SESSION['userId'])) {
    require '../includes/dbconn.php';  
    $flight_id = $_SESSION['flight_id'];
    $price = $_SESSION['price'];
    $passengers = $_SESSION['passengers'];
    $pass_id = $_SESSION['pass_id'];
    $class = $_SESSION['class'];
    $payment_method = $_POST['payment_method'];
    $phone_no = $_POST['phone_number'];
    $payment_date = $_POST['payment_date'];
    $sql = 'INSERT INTO PAYMENT (flight_id,passenger_id,payment_method,phone_no,payment_date,amount) 
        VALUES (?,?,?,?,?,?)';            
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header('Location: ../payment.php?error=sqlerror');
        exit();            
    } 
    else {
        mysqli_stmt_bind_param($stmt,'iisisi',$flight_id,$pass_id,$payment_method,$phone_no,$payment_date,$price);          
        mysqli_stmt_execute($stmt);       
        $stmt = mysqli_stmt_init($conn);
        $flag = false;
        $individual_price = $price/$passengers;
        $ticket_code=rand(0001170010, 2110080010);
        $_SESSION["ticketCode"]=$ticket_code;
        for($i=0;$i < $passengers;$i++) {
           $seatNo=rand(1,50);
                    $stmt = mysqli_stmt_init($conn);
                    $sql = 'INSERT INTO Ticket (passenger_id,flight_id,user_id,seat_no,cost,class,ticket_code) 
                    VALUES (?,?,?,?,?,?,?)';            
                    if(!mysqli_stmt_prepare($stmt,$sql)) {
                        header('Location: ../payment.php?error=sqlerror');
                        exit();            
                    } else {
                        $pid = $pass_id + $i;
                        mysqli_stmt_bind_param($stmt,'iiisisi',$pid,
                            $flight_id,$_SESSION['userId'],$seatNo,$individual_price,$class,$ticket_code);            
                        mysqli_stmt_execute($stmt);  
                        // echo mysqli_stmt_error($stmt), $class   ;           
                        $flag = true;
                    }   
                    
                    
                  
         }

         
         for($i=0;$i < $passengers;$i++) {
            $sql = 'SELECT * FROM Flights WHERE flight_id=?';
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)) {
                header('Location: ../payment.php?error=sqlerror');
                exit();            
            } else {
                mysqli_stmt_bind_param($stmt,'i',$flight_id);            
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)) {
                    if($class === 'A') {
                        $seats = $row['Aseats'];                    
                        $seats = $seats - $passengers;
                        $stmt = mysqli_stmt_init($conn);
                        $sql = "UPDATE flights SET Aseats=$seats WHERE flight_id=$flight_id";
                        mysqli_query($conn, $sql);
                               
                                   
                    } 
                     if($class === 'B') {
                        $seats = $row['Bseats'];                    
                        $seats = $seats - $passengers;
                        $stmt = mysqli_stmt_init($conn);
                        $sql = "UPDATE flights SET Bseats=$seats WHERE flight_id=$flight_id";
                        mysqli_query($conn, $sql);                      
                    }
                    if($class === 'C') {
                        $seats = $row['Cseats'];                    
                        $seats = $seats - $passengers;
                        $stmt = mysqli_stmt_init($conn);
                        $sql = "UPDATE flights SET Cseats=$seats WHERE flight_id=$flight_id";
                        mysqli_query($conn, $sql);                       
                    } 
                      
                }
            }
        }    
        if($flag) { 
            header('Location: ../e_ticket.php');
            exit();    
 
        } else {
            header('Location: ../payment.php?error=sqlerror');
            exit();               
        }
    } 
               
  
    mysqli_stmt_close($stmt);
    mysqli_close($conn);        

} else {
    header('Location: ../payment.php');
    exit();  
}    
