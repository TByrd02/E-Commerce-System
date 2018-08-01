<?php 


session_start();
//db connection
include_once 'dbconnect.php';
//It will not let you open index.php if session is set
if(isset($_SESSION['user_id'])!=""){
    header("Location: home.php");
    exit;
}

if(isset($_POST['btn-login'])){
    //This prevent sql injection and clear user invalid inputs
    $username = strip_tags($_POST['username']);
    $username = $conn->real_escape_string($username);

    $pass = strip_tags($_POST['pass']);
    $pass = $conn->real_escape_string($pass);

    $query = $conn->query("SELECT user_id, username, password FROM users WHERE username ='$username'");
    $row = $query->fetch_array();

    $count = $query->num_rows;

    if(md5($pass, $row['password'])&&$count==1){
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: home.php");
    }else{
        $Msg = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password!!! </div>";
    }

   $conn->close(); 
}
?>
<!doctype html>
<html>
    <head>


        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css" type="text/css" />
      <div id ="navbar">
      <div class = "row">
      <div class = "brandname">
          <h1> Aroba Coffee</h1>
     </div>
     </div>
     </div>

    </head>
    <body>  

        <div class="signin-form">
            <div id="container">
                <form class="form-signin" method="post" id="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
              <center> <h2 class="form-signin-heading">Log In</h2></center>
                
                    <?php 
                        if(isset($Msg)){
                            echo $Msg;
                        }

                    ?>

                    <div class = "container">
                        <div class = "col-lg-3"></div>
                        <div class = "col-lg-6">
                            <div class ="jumbotron" style = "margin-top: 150px">
                                
               
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required/>
                  </div>

                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required/>
                  </div>

                      <button type="submit" class="btn btn-info" name="btn-login" id="btn-login" >
                        <span class="glyphicon glyphicon-log-info"></span>&nbsp; Log In </button>

                      <a href="register.php" class="btn btn-info" style="float:right;">Register Here</a>
                    
                 
                </form>
                            </div> 


                            </div>  
                        </div>
                    <div class = "col-lg-3"></div>

                    </div>
                    
                    
                    
                    
                </form>
            </div>
        </div>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

    </body>
</html>