<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  
?>
     <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h2 class="m-2 font-weight-bold text-primary">Weekly Sales Report</h2>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th>Transaction ID</th>
                    <th>aqeqwe</th>
                     <th>aqeqwe</th>
                     <th>Quantity</th>
                     
                     
                   </tr>
               </thead>
          <tbody>

<?php                  
    //$query = 'SELECT INVENTORY_ID, p.PRODUCT_ID, p.NAME, SUM(`QTY`), c.CNAME, PRICE, s.COMPANY_NAME, i.DATE_STOCK_IN FROM inventory i join product p on i.PRODUCT_ID=p.PRODUCT_ID  JOIN category c ON i.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON i.SUPPLIER_ID=s.SUPPLIER_ID GROUP BY p.PRODUCT_ID DESC';
   // $query = 'SELECT TRANS_ID, GRAND_TOTAL FROM transaction WHERE CAST(date as date) BETWEEN "20121211" and "20121213" GROUP BY TRANS_ID';
   // $query = 'SELECT * From transaction Where DATE BETWEEN DATE_ADD(DAY, -7, GET_DATE()) AND DATE_ADD(DAY, 1, GET_DATE()) GROUP BY TRANS_ID';
        $query = 'SELECT td.TRANS_D_ID,t.DATE, td.PRODUCTS, GRANDTOTAL FROM transaction t join transaction_details td on t.TRANS_D_ID = td.TRANS_D_ID GROUP BY td.TRANS_D_ID';
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
    
      
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $row['DATE'].'</td>';
                echo '<td>'. $row['GRANDTOTAL'].'</td>';
              //  echo '<td>'. $row['GRANDTOTAL)'].'</td>';
              //  echo '<td>'. $row['COMPANY_NAME'].'</td>';
              
               // echo '<td>'. $row['DATE'].'</td>';
                    //  echo '<td align="right">
                      //        <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_searchfrm1.php?action=edit & id='.$row['PRODUCT_ID'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
                        //  </div> </td>';
                //echo '</tr> ';
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