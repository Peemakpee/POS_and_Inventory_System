$("#qtyvalid").on("change", function(){
                                var input = $(this).val();
                                $quantity = $product['QTYREM'];
                              if
                                (input > <?php echo $quantity ?>)
                                {
                                  alert("Please enter valid amount.");
                                  $(this).val('');
                                }
                            });</script>