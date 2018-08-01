<!-- <h1>Product List</h1>
         
            <table class="table">
           
                <tr>
                  <th><strong>Drink</strong></th>
                  <th><strong>Size(Oz)</strong></th>
                  <th><strong>Price</strong></th>
                  <th><strong>Action</strong></th>
                  <th></th>
                </tr>
                <?php
                $sql = "SELECT * FROM products ORDER BY name ASC";
                $query = mysql_query($sql);

                  while ($row=$query->fetch_array($query)){ 

                ?>
                   <tr>
                      <td><?php echo $row['display_name'];?></td>
                      <td><?php echo $row['size']; ?></td>
                      <td><?php echo $row['price']; ?>$</td>
                      <td><div class = "menubtn"><a href= "cart.php?id=<?php echo $row{'id_pr '}; ?>"> Add Cart</a></div></td>
                   </tr>
                
              <?php 
               } 

               ?>   
            </table>
          -->