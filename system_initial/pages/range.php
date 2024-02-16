<?php
include'../includes/connection.php'?><?php
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
   