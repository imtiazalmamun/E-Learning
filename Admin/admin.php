<?php
// session_destroy();   
// if(!isset($_SESSION)){
    //     session_start();
    //   //  $_SESSION['is_login'] = FALSE;
    // }
    
    include_once('../dbConnection.php');
    session_start();


//Admin login verification
if(isset($_POST['checkLogEmail']) && isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])){    
    $adminLogEmail=$_POST['adminLogEmail'];
    $adminLogPass=$_POST['adminLogPass'];
    $sql="SELECT admin_email, admin_pass FROM admin WHERE admin_email='".$adminLogEmail."' AND admin_pass='".$adminLogPass."'";
    $result= $conn->query($sql);
    $row=$result->num_rows;
    if($row === 1){ 
        $_SESSION['is_admin_login'] = true;
        $_SESSION['adminLogEmail'] = $adminLogEmail;
        echo json_encode($row);
    }else if($row === 0){
        echo json_encode($row);
    }
} ?>