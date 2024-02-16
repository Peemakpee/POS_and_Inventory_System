<?php
include('../includes/connection.php');
			$zz = $_POST['qty'];
            $b = $_POST['price'];
		
	 			$query = 'UPDATE inventory set QTY="'.$zz.'", PRICE="'.$b.'" 
					WHERE INVENTORY_ID ="'.$zz.'"';
					$result = mysqli_query($db, $query) or die(mysqli_error($db));
?>	
	<script type="text/javascript">
			alert("You've Update Product Successfully.");
			window.location = "inventory.php";
		</script>		