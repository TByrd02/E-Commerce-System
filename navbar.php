<?php 
  session_start();
  include_once "dbconnect.php";
  $v = "SELECT * FROM user_roles WHERE user_id=".$_SESSION['user_id'];
   $d = $conn->query($v);
  //echo $d.toString();
    $user = $d->fetch_array();
    $query = $conn->query("SELECT * FROM users WHERE user_id=".$_SESSION['user_id']);
    $userRow =$query->fetch_array();

  ?>
        <div id ="navbar">
          <div class = "row">
              <div class = "brandname">
                  <h1> Aroba Coffee</h1>

                  
              </div> 


               <ul class = "main-nav nav navbar-nav navbar-right">
                  <div class = "hmlg"> 
                   <li>
                        <a href = "home.php "> <span><i class="fa fa-home" aria-hidden="true"></i></span>Home</a>
                      </li> 
                  <?php 

                    if($user['role']=='customer'){
                      ?>
                      <li><a href = "menu.php "> <span><i class="fa fa-book" aria-hidden="true"></i></span>Menu</a></li> 
                      <li><a href = "cart.php"> <span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>Check Cart</a></li> 
                     <li><a href = "orders.php"><i class="fa fa-clock-o" aria-hidden="true"></i></span>Pending Orders</a></li>
                     <?php 
                   } else{
                    ?>
                      <li><a href = "processorders.php"><i class="fa fa-clock-o" aria-hidden="true"></i></span>Process Orders</a></li>
                      <?php } ?>
                      <li class="dropdown"> 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >
                                <span class="glyphicon glyphicon-user"></span>&nbsp;Hi <?php echo $userRow['display_name']; ?>&nbsp; <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" style="background-color: black;"> 
                                <li>
                                    <a href="logout.php">
                                        <span class="glyphicon glyphicon-log-out"></span>&nbsp;Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                   
                                    
                  </div>
               </ul>
          </div>
      </div>
