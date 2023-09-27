<?php
session_start();
if(isset($_POST['passenger_button']) && isset($_SESSION['userId'])) {
    require '../includes/dbconn.php';  
    $mobile_flag = false;
    $flight_id = $_POST['flight_id'];
    $passengers = $_POST['passengers'];
    $class = $_SESSION['class'];
    $pass_id=0; 
    $mob_len = count($_POST['mobile']);
    for($i=0;$i<$mob_len;$i++) {
        if(strlen($_POST['mobile'][$i]) !== 10) {
            $mobile_flag = true;
            break;            
        }
    }
    if($mobile_flag) {
        header('Location: ../pass_form.php?error=moblen');
        exit();         
    }
    $id_len = count($_POST['idno']);
    $id_flag = false;
    for($i=0;$i<$id_len;$i++) {
        if(strlen($_POST['idno'][$i]) !== 8) {
            $id_flag = true;
            break;            
        }
    }
    if($id_flag) {
        header('Location: ../pass_form.php?error=idlen');
        exit();         
    }  
    $date_len = count($_POST['date']); 
    for($i=0;$i<$date_len;$i++) {        
        $date_mnth = (int)substr($_POST['date'][$i],5,2);
        $flag = false;
        if($date_mnth > (int)date('m')){
          $flag = true;
        } else if($date_mnth == (int)date('m')){
          if((int)substr($_POST['date'][$i],8,2) >= (int)date('d')) {
            $flag = true;            
          } 
        }  
        if($flag) {
            header('Location: ../pass_form.php?error=invdate');
            exit();    
            break;
        }      
    }       
    $stmt = mysqli_stmt_init($conn);
    $sql = 'SELECT * FROM Passenger_profile where flight_id= ? and user_id = ?';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header('Location: ../pass_form.php?error=sqlerror');
        exit();            
    } else {
        $flight_id = intval($flight_id);
        $uid = intval($_SESSION['userId']);
        mysqli_stmt_bind_param($stmt,'ii', $flight_id, $uid);            
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $flag = false;
        while ($row = mysqli_fetch_assoc($result)) {
            $pass_id=$row['passenger_id'];
        }
    } 
    if(is_null($pass_id)) {
        $pass_id = 0;
        $stmt = mysqli_stmt_init($conn);
        $sql = 'ALTER TABLE Passenger_profile AUTO_INCREMENT = 1 ';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header('Location: ../pass_form.php?error=sqlerror');
            exit();            
        } else {         
            mysqli_stmt_execute($stmt);
        }        
    }
    $stmt = mysqli_stmt_init($conn);
    $flag = false;
    for($i=0;$i<$date_len;$i++) {
        $sql = 'INSERT INTO Passenger_profile (user_id,mobile,dob,Id_number,f_name,
        m_name,l_name,flight_id,class) VALUES (?,?,?,?,?,?,?,?,?)';            
        if(!mysqli_stmt_prepare($stmt,$sql)) {
            header('Location: ../pass_form.php?error=sqlerror');
            exit();            
        } else {
            
            mysqli_stmt_bind_param($stmt,'iisisssis',$_SESSION['userId'],
                $_POST['mobile'][$i],$_POST['date'][$i],$_POST['idno'][$i],$_POST['firstname'][$i],
                $_POST['midname'][$i],$_POST['lastname'][$i],$flight_id,$_SESSION['class']);                           
            mysqli_stmt_execute($stmt);  
            $flag = true;     
        }
    }   
    if($flag) {
        $_SESSION['flight_id'] = $flight_id;
        $_SESSION['class'] = $class;
        $_SESSION['passengers'] = $passengers;
        $_SESSION['price'] = $_POST['price'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['pass_id'] = $pass_id+1;
        header('Location: ../payment.php');
        exit();          
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);    

} else {
    header('Location: ../pass_form.php');
    exit();  
}