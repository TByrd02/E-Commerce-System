<?php 
//session start
session_start();
if(isset($_SESSION['user'])!=""){
    header("Location: home.php");
}
//db connection
require_once 'dbconnect.php';

if(isset($_POST['btn-signup'])){
    
    $name = strip_tags($_POST['name']);
    $name = $conn->real_escape_string($name);

    $username = strip_tags($_POST['username']);
    $username = $conn->real_escape_string($username);

    // $email = strip_tags($_POST['email']);
    // $email = $conn->real_escape_string($email);

    $pass = strip_tags($_POST['pass']);
    $pass = $conn->real_escape_string($pass);

    $password = md5($pass);

   // $check_email = $conn->query("SELECT email FROM users WHERE email = '$email'");
   // $count = $check_email->num_rows;

   $check_username = $conn->query("SELECT username FROM users WHERE username = '$username'");
   $ucount = $check_username->num_rows;

   if($count==0 && $ucount==0){
       $query = "INSERT INTO users(username, display_name, password) VALUES('$username','$name', '$password')";
       if($conn->query($query)){
           $Msg = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered!!! </div>";
       }else{
        $Msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering*** </div>";
       }
   }else{
       $Msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Email or username already taken ! </div>";
   }

   $conn->close();

}
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Registration</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
        <div class="signin-form">
         
            
        <div class="row">
          <div class="col-lg-4"></div>
          <div class = "col-lg-4">  
            <div id="container">
                <form class="form-signin" method="post" id="register-form" >
                    <h2 class="registering-heading">Register</h2>
                    <?php 
                        if(isset($Msg)){
                            echo $Msg;
                        }
                    ?>
       
             
                <div class ="jumbotron" style = "margin-top: 150px">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name" name="name" required/>
                    </div>
                    <!-- <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email address" name="email" required/>
                        <span id="check-e"></span>
                    </div> -->
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" required/>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info" name="btn-signup" >
                            <span class="glyphicon glyphicon-log-in"></span>&nbsp; Register
                        </button>
                         <a href="index.php" class="btn btn-info" style="float:right;">Log In</a>
                     </div>
                 </div>
                </form>
              </div>
            </div>
            <div class="col-lg-4"></div>
          </div>
        </div>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

    </body>
</html>