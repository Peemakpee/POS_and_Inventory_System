<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $pc = $_POST['product'];
              $price = $_POST['price'];
              $suprice = $_POST['supprice'];
              $qty = $_POST['qty'];
              $prof = $_POST['profit'];
              $opt = $_POST['category'];
              $supp = $_POST['supplier'];
              $dats = $_POST['datestock']; 
        
                    $query = "INSERT INTO inventory
                              (INVENTORY_ID, QTY, SUP_PRICE, PRICE, PROFIT, DATE_STOCK, PRODUCT_ID , CATEGORY_ID , SUPPLIER_ID, QTYREM)
                              VALUES (Null, '{$qty}' , '{$suprice}', '{$price}' ,'{$prof}' , '{$dats}', {$pc}, {$opt}, {$supp}, '{$qty}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
              
            ?>
              <script type="text/javascript">window.location = "inventory.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>


