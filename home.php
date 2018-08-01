<?php 
session_start();


include_once 'dbconnect.php';
//It will not let you open index.php if session is set
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}
//query the database
$query = $conn->query("SELECT * FROM users WHERE user_id=".$_SESSION['user_id']);
$userRow =$query->fetch_array();
//$conn->close();
?>
<!doctype html>
<html>
    <head>
        
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Welcome - <?php echo $userRow['display_name']; ?></title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="style.css" type="text/css" />
       
    </head>
    <body>
    <?php 
    require_once 'navbar.php';
    ?>
        <div id="wrapper"> 
            <div class="container">
                <div class="page-header">
                </div>
            </div>
        </div>
        <h1 id="welcometitle">Welcome!</h1>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

    </body>
</html> 
