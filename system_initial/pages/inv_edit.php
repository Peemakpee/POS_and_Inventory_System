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

$opt = "<select class='form-control' name='category'>
        <option disabled selected>Select Category</option>";
  while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
  }

$opt .= "</select>";
$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier order by COMPANY_NAME asc";
$result2 = mysqli_query($db, $sql2) or die ("Bad SQL: $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Select Supplier</option>";
  while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
  }

$sup .= "</select>";

  $query = 'SELECT INVENTORY_ID, p.NAME,c.CNAME, QTY, s.COMPANY_NAME, PRICE, i.DATE_STOCK FROM inventory i join category c on i.CATEGORY_ID=c.CATEGORY_ID JOIN supplier s ON i.SUPPLIER_ID=s.SUPPLIER_ID JOIN product p ON i.PRODUCT_ID=p.PRODUCT_ID WHERE INVENTORY_ID ='.$_GET['id'];
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
    while($row = mysqli_fetch_array($result))
    {   
      $zz = $row['INVENTORY_ID'];
      $zzz = $row['NAME'];
      $A = $row['CNAME'];
      $B = $row['QTY'];
      $C = $row['COMPANY_NAME'];
      $D = $row['PRICE'];
      $E = $row['DATE_STOCK'];
    
    }
      $id = $_GET['id'];
?>

  <center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit <?php echo $zzz ?></h4>
            </div>
            <a type="button" class="btn btn-primary bg-gradient-primary" href="inventory.php?action=edit & id='<?php echo $zz; ?>'"><i class="fas fa-fw fa-flip-horizontal fa-share"></i> Back</a>
                
            <div class="card-body">

            <form role="form" method="post" action="inv_edit1.php">
              <input type="hidden" name="id" value="<?php echo $zz; ?>" />
              <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
              <div class="form-group row text-center text-warning">
                <div class="col-sm-20" style="padding-top: 5px;">
                 Quantity:
                </div>
                <div class="col-sm-20">
                  <input class="form-control" placeholder="Quantity"  value="<?php echo $B; ?>" required>
                  <br>
                </div>
                <div class="col-sm-20">
                  <input class="form-control" placeholder="Enter New Quantity" name="qty"  required>
                </div>
              </div>
              <div class="form-group row text-center text-warning">
                <div class="col-sm-20" style="padding-top: 5px;"> 
                 Price:
                </div>
                <div class="col-sm-20">
                  <input class="form-control" placeholder="Price" value="<?php echo $D; ?>" required>
                </div>
                <br>
                <div class="col-sm-20">
                  <input class="form-control" placeholder="Enter New Price" name="price"  required>
                </div>
              </div>
     

                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
              </form>  
            </div>
          </div></center>

<?php
include'../includes/footer.php';
?>