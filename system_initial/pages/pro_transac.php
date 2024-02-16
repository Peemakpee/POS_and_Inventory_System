<?php
include'../includes/connection.php';
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              //$pc = $_POST['prodcode'];
              $name = $_POST['name'];
              $cat = $_POST['category'];
             // $supp = $_POST['supplier'];
              $dats = $_POST['datestock']; 
        
                    $query = "INSERT INTO product
                              (PRODUCT_ID, NAME, CATEGORY_ID, DATE_STOCK_IN)
                              VALUES (Null,'{$name}',{$cat},'{$dats}')";
                    mysqli_query($db,$query)or die ('Error in updating product in Database '.$query);
              
            ?>
              <script type="text/javascript">window.location = "product.php";</script>
          </div>

<?php
include'../includes/footer.php';
?>