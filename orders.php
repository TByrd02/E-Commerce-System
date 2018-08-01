<?php 
session_start();
include_once 'dbconnect.php';
 require 'item.php';


?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pending Orders</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />

    </head>
   
  <body> 
     <?php 
      include_once 'navbar.php'


      ?>
      <main>
     
        <div class="container">
          <div class="table-responsive"> 
          <h2 id="pendorders">Pending Orders</h2>
          <?php
            $query = $conn->query("SELECT * FROM orders");
            $count = $query->num_rows;
            if($count> 0){
            ?>
         
            <table class="table">
              <thead>
                <tr>
                  <th><strong>Customer</strong></th>
                  <th><strong>Drink</strong></th>
                  <th><strong>Size(Oz)</strong></th>
                  <th><strong>Price</strong></th>
                  <th><strong>Quantity</strong></th>
                  <th><strong>Total</strong></th>
                  <th><strong>Status</strong></th>
                  <th></th>
                </tr>  
              </thead>  
                  <?php 
                    $k=0;
                    while($grab = $query->fetch_assoc()){
                         $q = $conn->query("SELECT user.* FROM users AS user WHERE user_id IN (SELECT user_id FROM orders WHERE order_id = ".$grab['order_id'].")");
                          $user = $q->fetch_array();
                          $r = $conn->query("SELECT prod.* FROM products AS prod WHERE product_id IN (SELECT product_id FROM orders WHERE order_id = ".$grab['order_id'].")");
                          $prod = $r->fetch_array();
                          $k += $prod['price'] * $grab['quantity'];
                          ?>
                    <tr> 
                      <td><?php echo $user['display_name']; ?></td>
                      <td><?php echo $prod['display_name'];?></td>
                      <td><?php echo $prod['size']; ?></td>
                      <td><?php echo $prod['price'];?></td>
                      <td><?php echo $grab['quantity'];?></td>
                      <td><?php echo $prod['price'] * $grab['quantity']; ?></td>

                      <?php
                      

                      $status = $grab['completed'];

                      if($status == 1){
                        ?>                      <td> <span class = 'label label-success' >Completed</span></td>;

                      <?php
                      }else {

                        ?>
                      <td> <span class = 'label label-success' >Pending</span></td>;
                      <?php
                      }
                         ?>
                    </tr>
                    <?php 
                  } 
                
                    ?>
                  <tr>
                     <td colspan = "5" align ="right"> Final Total: </td>
                     <td  align="left"><?php echo $k; ?></td>
                  </tr>   
              </table>
              <?php } ?>
                  <br>
                </div>
        </div>
      </main>
        
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

  </body>
</html>