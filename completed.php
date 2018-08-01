<?php 
session_start();

include_once "dbconnect.php";

    // when marked button is pressed
    if(isset($_POST['order'])){

   if(isset($_GET['id'])){

    $update = "UPDATE orders SET completed = 1 ";
    $res = $conn->query($update);
    if($res){
      echo "Successfully updated";
      header("Location: processorders.php");
      exit();
    }

}

    }

?>