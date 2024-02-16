<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  $query = 'SELECT ID, t.TYPE
            FROM users u
            JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
  $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
  while ($row = mysqli_fetch_assoc($result)) {
            $Aa = $row['TYPE'];
                   
  if ($Aa=='User'){
?>
  <script type="text/javascript">
    //then it will be redirected
    alert("Restricted Page! You will be redirected to POS");
    window.location = "pos.php";
  </script>
<?php
  }           
}
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category order by CNAME asc";
$result = mysqli_query($db, $sql) or die ("Bad SQL: $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$aaa .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";

$sql3 = "SELECT DISTINCT PRODUCT_ID, NAME FROM product order by NAME asc";
$result3 = mysqli_query($db, $sql3) or die ("Bad SQL: $sql3");

$prod = "<select class='form-control' name='product'>
        <option disabled selected>Select Product</option>";
  while ($row = mysqli_fetch_assoc($result3)) {
    $prod .= "<option value='".$row['PRODUCT_ID']."'>".$row['NAME']."</option>";
  }

$prod .= "</select>";
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Product Inventory&nbsp;<a  href="#" data-toggle="modal" data-target="#iModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th>Inventory ID</th>
                     <th>Product Name</th>
                     <th>Category</th>
                     <th>Quantity Supplied</th>
                     <th>Remaining Quantity</th>
                     <th>Supplier</th>
                     <th>Supplier Price</th>
                     <th>Retail Price</th>
                     <th>Date Stock In</th>
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  
   $query = 'SELECT INVENTORY_ID, NAME, CNAME, QTY, QTYREM, COMPANY_NAME, SUP_PRICE, PRICE, PROFIT, DATE_STOCK FROM inventory i join product p on i.PRODUCT_ID=p.PRODUCT_ID join category c on i.CATEGORY_ID=c.CATEGORY_ID join supplier s ON i.SUPPLIER_ID=s.SUPPLIER_ID GROUP BY INVENTORY_ID';
  
   $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['INVENTORY_ID'].'</td>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['QTYREM'].'</td>';
                echo '<td>'. $row['COMPANY_NAME'].'</td>';
                echo '<td>'. $row['SUP_PRICE'].'</td>';
                echo '<td>'. $row['PRICE'].'</td>';
                echo '<td>'. $row['DATE_STOCK'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_searchfrm.php?action=edit & id='.$row['INVENTORY_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

     <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h2 class="m-2 font-weight-bold text-primary">Inventory Summary</h2>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th>Product Name</th>
                    
                     <th>Category</th>
                     <th>Quantity Remaining</th>
                     
                     <th>Action</th>
                   </tr>
               </thead>
          <tbody>

<?php                  

    $query = 'SELECT p.PRODUCT_ID, p.NAME, SUM(QTY),SUM(QTYREM), c.CNAME, PRICE, s.COMPANY_NAME, i.DATE_STOCK FROM inventory i join product p on i.PRODUCT_ID=p.PRODUCT_ID  JOIN category c ON i.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON i.SUPPLIER_ID=s.SUPPLIER_ID GROUP BY p.PRODUCT_ID DESC';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['NAME'].'</td>';
                echo '<td>'. $row['CNAME'].'</td>';
                echo '<td>'. $row['SUM(QTYREM)'].'</td>';
              //  echo '<td>'. $row['COMPANY_NAME'].'</td>';
              
               // echo '<td>'. $row['DATE'].'</td>';
                      echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_searchfrm1.php?action=edit & id='.$row['PRODUCT_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                          </div> </td>';
                echo '</tr> ';
                        }
?> 
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>

<?php
include'../includes/footer.php';

?>
 <!-- Inventory Modal-->
 <div class="modal fade" id="iModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Products to Inventory</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="inv_transac.php?action=add">
          <div class="form-group">
             <?php
               echo $prod;
             ?>
           </div>
           <div class="form-group">
             <input type= "number" class="form-control" placeholder="Quantity" name="qty" required>
           </div> 
            <div class="form-group">
              Supplier Price:
             <input type= "text"  class="form-control" id= "txt2" onkeyup="sum();"placeholder="Supplier Price" name="supprice" required>
           </div>
           <div class="form-group">
            Retail Price:
             <input type= "text"  class="form-control" id= "txt1" onkeyup="sum();" placeholder="Retail Price" name="price" required>
           </div>
           <div class="form-group">
             <?php
               echo $aaa;
             ?>
           </div>
           <div class="form-group">
             <?php
               echo $sup;
             ?>
           </div>
           <div class="form-group">
             <input type="date" class="form-control" placeholder="Date Stock In" name="datestock" required>
           </div>
           <hr>
            <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>      
          </form>  
        </div>
      </div>
    </div>
  </div>