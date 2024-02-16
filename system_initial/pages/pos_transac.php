<?php
include'../includes/connection.php';
session_start();

              $date = $_POST['date'];
              $customer = $_POST['customer'];
              $subtotal = $_POST['subtotal'];
              $lessvat = $_POST['lessvat'];
              $netvat = $_POST['netvat'];
              $addvat = $_POST['addvat'];
              $total = $_POST['total'];
              $cash = $_POST['cash'];
              $emp = $_POST['employee'];
              $rol = $_POST['role'];
              //imma make it trans uniq id
              $today = date("mdGis"); 
              $qun= $_POST['quantity'];
              $name= $_POST['name'];
              $countID = count(($_POST['name']));
              // echo "<table>";
    
            
              switch($_GET['action']){
                case 'add':  
                for($i=1; $i<=$countID; $i++)
                  {
                
                    $query = "INSERT INTO `transaction_details`
                               (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`,`DATE`,`INVENTORY_ID` )
                               VALUES (Null, '{$today}', '".$_POST['name'][$i-1]."', '".$_POST['quantity'][$i-1]."', '".$_POST['price'][$i-1]."', '{$emp}', '{$rol}', '{$date}','".$_POST['id'][$i-1]."' )";
                           
                           mysqli_query($db,$query)or die (mysqli_error($db));}
  //update inventory product quantity
                     $update = "SELECT INVENTORY.INVENTORY_ID, INVENTORY.QTYREM, TRANSACTION_DETAILS.QTY, TRANSACTION_DETAILS.TRANS_D_ID  FROM TRANSACTION_DETAILS INNER JOIN INVENTORY ON TRANSACTION_DETAILS.INVENTORY_ID = INVENTORY.INVENTORY_ID WHERE TRANSACTION_DETAILS.TRANS_D_ID= '$today'";
                         $result = mysqli_query($db, $update) or die (mysqli_error($db));
                             while ($row = mysqli_fetch_assoc($result)) {
                                $updateid = $row['INVENTORY_ID'];
                                $data = $row['QTYREM'];
                                $minusdata = $row['QTY']; 
                                $updatedata = $data - $minusdata;

                                $inventory = "UPDATE `INVENTORY` SET `QTYREM` = $updatedata WHERE `INVENTORY_ID` = $updateid ";
                                mysqli_query($db,$inventory)or die (mysqli_error($db));
                   
                   }

                    $query111 = "INSERT INTO `transaction`
                               (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`)
                               VALUES (Null,'{$customer}','{$countID}','{$subtotal}','{$lessvat}','{$netvat}','{$addvat}','{$total}','{$cash}','{$date}','{$today}')";
                    
                    mysqli_query($db,$query111)or die (mysqli_error($db));
              
              }
        
                    unset($_SESSION['pointofsale']);
               ?>
              <script type="text/javascript">
                alert("Generate Receipt.");
                window.location = "receipt.php";
              </script>
              </script>
          </div>





