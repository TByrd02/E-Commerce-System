<?php

    session_start();
    // if(!isset($_SESSION['user_id'])){
    //     header("Location: index.php");
    //     exit();
    // }else if(isset($_SESSION['user_id'])!==""){
    //     header("Location: home.php");
    //     exit();
    // }

     
    //    unset($_SESSION['user_id']);
    //     session_unset();
    //     session_destroy();  
    //     $_SESSION = array();  
    session_unset();
    session_destroy(); 
    $_SESSION = array(); 
    header("Location: index.php");
    exit();
      
    
 ?>