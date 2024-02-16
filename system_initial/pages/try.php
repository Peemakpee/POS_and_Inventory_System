$query = 'SELECT INVENTORY_ID, p.PRODUCT_ID, SUM(`QTY`), PRICE, NAME, CNAME, DATE_STOCK_IN FROM inventory i join category c on i.CATEGORY_ID=c.CATEGORY_ID join product p on i.PRODUCT_ID=p.PRODUCT_ID  GROUP BY PRODUCT_ID';
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
            while ($row = mysqli_fetch_assoc($result)) {
                             ?>    
                <tr>
                <td>
            <input type="hidden" name="NAME[]" value="<?php echo $row['NAME']; ?>">
            <?php echo $row['NAME']; ?>
          </td>  
        
            
                          </tr>          
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>


                  <?  //echo '<tr>';
               // echo '<td>'. $row['PRODUCT_ID'].'</td>';
              //  echo '<td>'. $row['NAME'].'</td>';
              //  echo '<td>'. $row['CNAME'].'</td>';
              //  echo '<td>'. $row['SUM(`QTY`)'].'</td>';
              //  echo '<td>'. $row['PRICE'].'</td>';
               // echo '<td>'. $row['PRICE'].'</td>';
               // echo '<td input type="text" name="quantity" class="form-control" value="1" </td>';

                   //   echo '<td align="right"> <div class="btn-group">
                      //        <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit"><i class="fa fa-cart-plus""></i>Add</a>
                            
                    //      </div> </td>';
                echo '</tr> ';?>