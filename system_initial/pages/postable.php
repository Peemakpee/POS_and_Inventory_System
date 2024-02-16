<?php


        $sql2 = "SELECT DISTINCT INVENTORY_ID, QTY, p.PRODUCT_ID, p.NAME FROM INVENTORY i join product p on i.PRODUCT_ID=p.PRODUCT_ID order by INVENTORY_ID asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$inv = "<select class='form-control' name='inventory' required>
        <option disabled selected hidden>Select Inventory ID</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $inv .= "<option value='".$row['INVENTORY_ID']."'>".$row['QTY']."".'-'."".$row['NAME']."</option>";
  }

$inv .= "</select>";?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h5 class="m-2 font-weight-bold text-primary">Products Available</i></a></h5> </div>
            <div class="card-body">

         
           <?php                  
    $query = 'SELECT INVENTORY_ID, p.PRODUCT_ID, QTYREM, PRICE, NAME, CNAME FROM inventory i join category c on i.CATEGORY_ID=c.CATEGORY_ID join product p on i.PRODUCT_ID=p.PRODUCT_ID WHERE QTYREM >=1 GROUP BY INVENTORY_ID ';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        while ($product = mysqli_fetch_assoc($result)) {
          ?>  
          
        
           
           <div class="table-responsive" width= "50%">
              <form role="form" method="post" action="pos.php?action=add&id=<?php echo $product['INVENTORY_ID']; ?>">
              <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0"> 
          
                <thead>
                   <tr>
                     <th>Product ID</th>
                     <th>Name</th>
                     <th>Category</th>
                     <th>Quantity Available</th>
                     <th>Price</th>
                     <th>Input Purchase Quantity</th>
                     <th>Action</th>
                   </tr>
               </thead>
               
          <tbody>
         
      
                <tr>
                <td>
                <input type="hidden" name="name" value="<?php echo $product['PRODUCT_ID']; ?>">
                         <?php echo $product['PRODUCT_ID']; ?>
                </td>  
                <td>
                        <input type="hidden" name="name" value="<?php echo $product['NAME']; ?>">
                        <?php echo $product['NAME']; ?>
                </td>  
                <td>
                         <?php echo $product['CNAME']; ?>
                </td>  
                 <td>
                 <input type="hidden" id="qtyrem" onkeyup="check_qty();" name="name" value="<?php echo $product['QTYREM']; ?>">
                        <?php echo $product['QTYREM']; ?>
                </td>  
                <td>
                        <input type="hidden" name="price" value="<?php echo $product['PRICE']; ?>">
                        <?php echo $product['PRICE']; ?>
                </td>  
                <td>
                        <input type="text" id="qtyvalid" name="quantity" onkeypress="return isNumberKey(event)" class="form-control" name="qtyvalids" placeholder="Please enter quantity" required/>
                        <script>
                          <?php  $available = $row['QTYREM'];
                              $qty = $row['quantity'];
                              if ($qty > $available) {
                            
                                echo '<script>alert("Insufficient Quantity");</script>';}?>
                                </script>
                </td>  
                <td>
                        <input type="submit" name="addpos" id="qtyvalid" style="margin-top:5px;" class="btn btn-info"
                                                     value="Add" />
                                                     
                </td>   
            </tr>     
            </tbody>
            </div>
            </div>
    </div>
</div>
    
           
            </table>
          
            </form>

           
    
<?php  }
          ?>       

<?php
include'../includes/footer.php';
?>