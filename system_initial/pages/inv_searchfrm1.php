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
$query2 = 'SELECT INVENTORY_ID FROM inventory i join category c on i.CATEGORY_ID=c.CATEGORY_ID where INVENTORY_ID ='.$_GET['id'].' limit 1';
        $result2 = mysqli_query($db, $query2) or die (mysqli_error($db));
?>
            
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Inventory ID Number  <?php while ($row = mysqli_fetch_assoc($result2)) { echo $row['INVENTORY_ID']; } ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                   <th>Product Name</th>
                     <th>Category</th>
                     <th>Quantity</th>
                     
                   </tr>
               </thead>
          <tbody>

<?php   
$query = 'SELECT p.PRODUCT_ID, p.NAME, SUM(QTY),SUM(QTYREM), c.CNAME, PRICE, s.COMPANY_NAME, i.DATE_STOCK FROM inventory i join product p on i.PRODUCT_ID=p.PRODUCT_ID  JOIN category c ON i.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON i.SUPPLIER_ID=s.SUPPLIER_ID WHERE p.PRODUCT_ID ='.$_GET['id'].' limit 1';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

      while ($row = mysqli_fetch_assoc($result)) {
                           
          echo '<tr>';
          echo '<td>'. $row['NAME'].'</td>';
          echo '<td>'. $row['CNAME'].'</td>';
          echo '<td>'. $row['SUM(QTYREM)'].'</td>';
        //  echo '<td>'. $row['COMPANY_NAME'].'</td>';
        
         // echo '<td>'. $row['DATE'].'</td>';
                
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
