<div class="modal fade" id="exampleModal<?php echo $product_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    
    <?php 
        $query = "SELECT * FROM products WHERE product_id = $product_id";
        $sel_query = mysqli_query($connection,$query);

        $row = mysqli_fetch_array($sel_query);
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_desp = $row['product_desp'];
        $product_image = $row['product_image'];
        $product_cat_id = $row['product_cat_id'];
        // echo "<script>alert('{$product_name}')</script>";
    ?>

    <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button class="myButton"  data-dismiss="modal" aria-label="Close">
                <img src="https://img.icons8.com/metro/26/000000/back.png"/>
            </button>
        </div>
        <div class="modal-body">
        <div class="col-12 sideSection align-self-center justify-content-left m-0 p-0" style="overflow-y: scroll; overflow-x:hidden;">
                <div class="row col-12 m-0 p-0 mb-3">
                    <div class="col-12 col-md-6 m-0 p-0 mt-3">
                        <p class="overlayTitle text-center text-md-left web-field col-auto"><?php echo $product_name?></p>
                    </div>
                    <div id="d-receipt-none" class="col-12 col-md-6 row  justify-content-center justify-content-md-end m-0 p-0 pr-0 pr-md-3">
                    <div class="col-12 row m-0 p-0  justify-content-center justify-content-md-end d-flex align-items-center">
                        <div class="row col-12 p-0 m-0 justify-content-center justify-content-md-end">
                            <div class="col-12 row  justify-content-center justify-content-md-end m-0 p-0 mt-3">
                                <form class="row col-12 m-0 p-0  justify-content-center justify-content-md-end" action="items.php?p_id=<?php echo $product_id?>&pc_id=<?php echo $product_cat_id?> " method="post">
                                    <?php 
                                        if(isset($_POST['addCart'.$product_id])){
                                            
                                                $query = "SELECT * FROM products WHERE product_cat_id = {$product_cat_id}";
                                                $sel_query = mysqli_query($connection,$query);
                                                $result = mysqli_num_rows($sel_query);
                                            
                                                $_SESSION['cartDetails'] = array_map("unserialize",array_unique(array_map("serialize", $_SESSION['cartDetails'])));

                                                
                                                $outputValues = array_column($_SESSION['cartDetails'], 'product_id');
                                                $_SESSION['outputValue'] = $outputValues;

                                                $id = $product_id;
                                                
                                                
                                                if(!in_array($id, $outputValues)){
                                                
                                                
                                                    $count = count($_SESSION['cartDetails']);

                                                    $item_id['product_id'] = $id;
                                                    $item_array['product_id'] = $id;
                                                    $item_array['itemSelect'] = $_POST['itemSelect'];
                                                    $_SESSION['cartDetails'][$count] = $item_array;
                                                    echo "<script>window.location='items.php?pc_id={$product_cat_id}'</script>";
                                                }else{
                                                    
                                                    foreach($_SESSION['cartDetails'] as $key => $value){
                                                        
                                                        if($value['product_id'] == $id){
                                                            $_SESSION['cartDetails'][$key]['itemSelect'] += $_POST['itemSelect'];
                                                            break;
                                                        }
                                                    }
                                                    
                                                    echo "<script>window.location='items.php?pc_id={$product_cat_id}'</script>";
                                                }
                                                
                                        }
                                        
                                    ?>
                                
                                    <div class="form-group row justify-content-center justify-content-md-end d-flex align-items-center col-12 m-0 p-0">
                                        <div class="row col-4 col-md-6 d-flex align-items-center m-0 p-0 mb-3 text-right">
                                            <input type="number" placeholder="Select items:" name="itemSelect" id="selectbasic" class="form-control" min="1" required>
                                        </div>
                                        <div class="row col-auto d-flex align-items-center m-0 p-0 mb-3 text-right">
                                            <button class="btn pill badge-pill px-4 ml-2 pill-design" type="submit" name="addCart<?php echo $product_id?>"><img src="images/cart_add.svg" alt="cart" class="mr-2">  Add to Cart</button>
                                        </div>
                                        <div class="row col-0 col-md-2">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </form>
                            </div>
                        </div>  
                        
                    </div>
                </div>
                </div>
                <div class="row col-12 m-0 p-0">
                    <div class="col-12 col-md-9 row overlayDescription">
                        <p class="ml-3 ml-md-5"><?php echo $product_desp; ?></p>
                    </div>
                    <div class="col-12 col-md-3">
                        <p class="text-right"><span id="price"><?php echo $product_price?></span><span class="perItem">$/item</span></p>
                    </div>
                </div>
<div class="row col-lg-12 p-2 justify-content-center mt-4 ml-1 ml-md-0 mr-2 mr-md-0">

                <?php 

                
                    $query = "SELECT * FROM products WHERE product_id = $product_id";
                    $sel_query = mysqli_query($connection, $query);
                    $row = mysqli_fetch_array($sel_query);
                    $imagesArray = explode(',', $row['other_images']);
                                        
                    for($i=0; $i< sizeof($imagesArray); $i++){
                        if($imagesArray[$i]){
                        
                            ?>
                            <div class="col-md-3 col-12 mb-2 mb-md-0 border border-secondary mr-2" >
                                <img src="images/<?php echo $imagesArray[$i]?>" alt="image" width="100%" height="100%"/>
                            </div>

                            <?php
                            
                        }    
                        
                    }
                
                ?>
                    
                    
                </div>
            </div>
        </div>
        </div>
    </div>
</div>