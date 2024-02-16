<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
?>
             <a href="salesreport2.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Sales Report Details<a></i></a></h4>
             
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th>Transaction ID</th>
                     <th>Products Sold</th>
                     <th>Quantity</th>
                     <th>Date</th>
                   </tr>
               </thead>
          <tbody>

<?php    
	
    $query = "SELECT td.ID,t.TRANS_D_ID, td.QTY, PRODUCTS, td.DATE FROM `transaction_details` td join transaction t on td.TRANS_D_ID = t.TRANS_D_ID GROUP BY TRANS_D_ID";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
      ?><?php
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '<td>'. $row['QTY'].'</td>';
                echo '<td>'. $row['DATE'].'</td>';
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