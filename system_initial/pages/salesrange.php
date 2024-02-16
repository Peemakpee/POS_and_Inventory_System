<?php    
if(ISSET($_POST['search'])){      
$date1 = date("Y-m-d", strtotime($_POST['date1']));
$date2 = date("Y-m-d", strtotime($_POST['date2']));        
    $query = "SELECT ID, PRODUCTS, DATE FROM `transaction_details` td join transaction t on td.TRANS_D_ID = t.TRANS_D_ID  WHERE date(`DATE`) BETWEEN '$date1' AND '$date2'";
    $result = mysqli_query($db, $query) or die (mysqli_error($db));
      ?><?php
            while ($row = mysqli_fetch_assoc($result)) {
                                 
                echo '<tr>';
                echo '<td>'. $row['TRANS_D_ID'].'</td>';
                echo '<td>'. $row['PRODUCTS'].'</td>';
                echo '</tr> ';
                        }}
?> 