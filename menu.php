<?php 
    session_start();
    include_once 'dbconnect.php';
    $q = $conn->query("SELECT * FROM products");
    $count = $q->num_rows;


 ?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Menu</title>
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
          <h2 id="menutitle">Menu</h2>
          <?php if($count > 0) { ?>
            <table class="table">
              <thead>
                <tr>
                  <th><strong>Drink</strong></th>
                  <th><strong>Size(Oz)</strong></th>
                  <th><strong>Price</strong></th>
                  <th></th>
                </tr>
              </thead>


                <?php 
                  while($drinks = $q->fetch_assoc()){ ?>
                    <tbody>
                      <tr>
                        <td><?php echo $drinks['display_name'];?></td>
                        <td><?php echo $drinks['size']; ?></td>
                        <td><?php echo $drinks['price']; ?></td>
                        <td><div class = "menubtn"><a href= "cart.php?id=<?php echo $drinks['product_id']; ?>">Add Cart</a></div></td>
                      </tr>
                    </tbody>
                <?php } ?>
            </table>
          <?php } ?>
          </div>
        </div>
      </main>
        
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> 
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>

  </body>
</html>