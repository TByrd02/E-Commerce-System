<?php 
session_start();
include_once 'dbconnect.php';
 require 'item.php';
if(isset($_GET['id'])){
    $result = $conn->query("SELECT * FROM products WHERE product_id =".$_GET['id']."");
    $drink = mysqli_fetch_array($result);
    $item = new Item();
    $item ->product_id =$drink['product_id'];
    $item ->display_name = $drink['display_name'];
    $item ->size = $drink['size'];
    $item ->price = $drink['price'];
    $item ->quantity = 1; 

    $index =-1;
    $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0; $i<count($cart); $i++)
        if($cart[$i]->id==$_GET['id']){

          $index = $i;
          break;

        }
      if ($index==-1)
          $_SESSION['cart'] [] = $item;

      else{
         $cart[$index]->quantity++;
         $_SESSION['cart'] = $cart;

       }

        

   } 

//delete within cart
if(isset($_GET['index'])){
  $cart = unserialize(serialize($_SESSION['cart']));
  unset($cart[$_GET['index']]);
  $cart = array_values($cart);
  $_SESSION['cart'] = $cart;

}


 
/* function saveOrder($cart){
    for($i=0; $i<count($cart); $i++){
        $userId = $_SESSION['user'];
        $prod = $cart[$i]->product_id;
        $quant = $cart[$i]->quantity;
        $bool = $conn->query("INSERT INTO orders(user_id, product_id, quantity) VALUES('$userId','$prod', '$quant')");  
      }
      if($bool){
        echo "<div class='alert alert-success'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered!!! </div>";
      }
  }*/
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css" type="text/css" />
<!-- 
<script type = "text/javascript">
        $(function (){

    });
</script> -->
    </head>
   
  <body> 
  <?php

      require_once 'navbar.php';

      ?>
      <main>
      
        <div class="container">
          <div class="table-responsive">
         <h2 id="carttitle">Cart</h2>
            <table class="table">
              
                <tr>
                  <th><strong>Drink</strong></th>
                  <th><strong>Size(Oz)</strong></th>
                  <th><strong>Price</strong></th>
                  <th><strong>Quantity</strong></th>
                  <th><strong>Total</strong></th>
                  <th><strong>Option</strong></th>
                  <th></th>
                </tr>
                  <?php

                  $cart = unserialize(serialize($_SESSION['cart']));
                  $k = 0;
                  $index = 0;
                  for($i=0; $i<count($cart); $i++){
                    $k += $cart[$i]->price * $cart[$i]->quantity; 
                  ?>          
                    <tr> 
                      <td><?php echo $cart[$i]->display_name; ?></td>
                      <td><?php echo $cart[$i]->size; ?></td>
                      <td><?php echo $cart[$i]->price; ?></td>
                      <td><?php echo $cart[$i]->quantity; ?></td>
                      <td><?php echo $cart[$i]->price * $cart[$i]->quantity; ?></td>
                      <td><div class = "cartbtn"><a href="cart.php?index=<?php echo $index; ?>" onclick ="return confirm('Delete?')"> Delete</a></td>
                      </tr>
                      <?php 
                          
                            $index++;

                            } 

                          if(isset($_POST['order'])){
                            for($i=0; $i<count($cart); $i++){

                              $userId = $_SESSION['user_id'];
                              $prod = $cart[$i]->product_id;
                              $quant = $cart[$i]->quantity;
                              $bool = $conn->query("INSERT INTO orders(user_id, product_id, quantity) VALUES('$userId','$prod', '$quant')"); 
                            }
                        }
                      ?> 
                  <tr>
                     <td colspan = "5" align ="right"> Final Total: </td>
                     <td  align="left"><?php echo $k; ?></td>
                  </tr>   
              </table>
                  <br>
                     
                     <div class="row">
                        <div class="col-md-6">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                          <input type="submit" class = "submitbtn btn btn-info" name="order" id="order" value="Submit Orders">
                        </form>
                          </div>
                          <div class="col-md-6">
                        <div class = "contshpbtn btn btn-info"><a href= "menu.php?id=<?php echo $product->id; ?>">Continue Shopping</a></div></div>
                    </div>

          </div>
        </div>
      </main>
        
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

  </body>
</html>