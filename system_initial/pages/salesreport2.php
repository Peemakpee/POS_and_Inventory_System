<?php
include'../includes/connection.php';
include'../includes/sidebar.php';
  
?>
 <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h2 class="m-2 font-weight-bold text-primary">Weekly Sales Report</h2>
            </div>
            <div class="card-body">
            <form class="form-inline" method="POST" action="">
			<label>Date From :</label>
			<input type="date" class="form-control" placeholder="Start"  name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
			<label> To : </label>
			<input type="date" class="form-control" placeholder="End"  name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"/>
			<button class="btn btn-primary" name="search"><i class="fas fa-search-dollar"></i></button> <a href="salesreport2.php" type="button" class="btn btn-success"><i class = "fa fa-refresh"></i></a>
		</form>
        <br /><br />
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                    <th>Number of Transaction/s</th>
                    <th>Total Amount</th>
                     <th>Total Number of Products Sold</th>
                     <th>Action</th>
                     
                     
                   </tr>
               </thead>
          <tbody>
          <?php

	if(ISSET($_POST['search'])){
    
		$date1 = date("Y-m-d", strtotime($_POST['date1']));
		$date2 = date("Y-m-d", strtotime($_POST['date2']));
		$query=mysqli_query($db, "SELECT COUNT(TRANS_ID), ROUND(SUM(GRANDTOTAL), 2), SUM(`NUMOFITEMS`), DATE FROM `transaction` WHERE date(`DATE`) BETWEEN '$date1' AND '$date2'") or die(mysqli_error());
		$row=mysqli_num_rows($query);
		if($row>0){
			while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['COUNT(TRANS_ID)']?></td>
		<td><?php echo $fetch['ROUND(SUM(GRANDTOTAL), 2)']?></td>
		<td><?php echo $fetch['SUM(`NUMOFITEMS`)']?></td>
		<?php echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="salesreport_view.php"><i class="fas fa-fw fa-th-list"></i> View</a>
                          </div> </td>';?>
	</tr>
<?php
			}
		}else{
			echo'
			<tr>
				<td colspan = "4"><center>Record Not Found</center></td>
			</tr>';
		}

		
	}else{
		$query=mysqli_query($db, "SELECT COUNT(TRANS_ID),  ROUND(SUM(GRANDTOTAL), 2),SUM(`NUMOFITEMS`), DATE FROM `transaction`") or die(mysqli_error());
		while($fetch=mysqli_fetch_array($query)){
?>
	<tr>
		<td><?php echo $fetch['COUNT(TRANS_ID)']?></td>
		<td><?php echo $fetch['ROUND(SUM(GRANDTOTAL), 2)']?></td>
		<td><?php echo $fetch['SUM(`NUMOFITEMS`)']?></td>
		<?php echo '<td align="right">
                              <a type="button" class="btn btn-primary bg-gradient-primary" href="salesreport_view.php"><i class="fas fa-fw fa-th-list"></i> View</a>
                          </div> </td>';?>
	</tr>
<?php
		}
	}
?>
            </tbody>
                            </table>
                        </div>
                    </div>
                  </div>
				  
				  <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h2 class="m-2 font-weight-bold text-primary">Sales Per Product</h2>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0"> 
               <thead>
                   <tr>	
                    <th>Product Name</th>
                     <th>Quantity Sold</th>
					 <th>Total Amount</th>
                     
                   </tr>
               </thead>
          <tbody>
		  <?php                  

$query = "SELECT td.ID, t.TRANS_D_ID, QTY, SUM(QTY), PRODUCTS, td.PRICE, td.DATE FROM `transaction_details` td join transaction t on td.TRANS_D_ID = t.TRANS_D_ID GROUP BY PRODUCTS";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
  
		while ($row = mysqli_fetch_assoc($result)) {
							 
			echo '<tr>';
			echo '<td>'. $row['PRODUCTS'].'</td>';
			echo '<td>'. $row['SUM(QTY)'].'</td>';
			echo '<td>'. $row['QTY'] * $row['PRICE'].'</td>';

			// echo '<td>'. $row['PROFIT'].'</td>';

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