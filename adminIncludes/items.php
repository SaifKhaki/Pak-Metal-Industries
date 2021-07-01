<script>
function del_edit_btn(id){
    if(confirm('Press OK to delete the entry. Press CANCEL to edit the entry.')){
        location.href='admin_panel.php?delete='+id;
    }else{
        location.href = 'edititem.php?edit='+id;
    }
}
</script>
<div class="items-section cart row col-12 justify-content-end bg-white border-1 border-secondary m-0 p-0 mb-3 mt-2">
    <div class="row col-12 col-lg-8 m-0 p-0">
        <div class="row col-12 justify-content-start p-0 mt-5 mx-3 mx-md-5 mb-2">
            <div class="row col-12 m-0 p-0">
                <h1 class="theme-heading">Items</h1>
            </div>
        </div>
        <div class="row col-12 m-0 p-0 pb-0 pb-md-5">
            <div class="row col-12 m-0 p-0 justify-content-center px-2 pl-md-3 pb-5">
                <div class="m-0 p-0 table-responsive">
                    <table id="items_table" class="table table-hover m-0 p-0 text-nowrap">
                        <thead>
                            <tr>
                            <th scope="col"></th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                    
                            <?php 
                    
                                $query = "SELECT * FROM products";
                                $select_query = mysqli_query($connection,$query);
                    
                                while($row = mysqli_fetch_assoc($select_query)){
                                    $product_name = $row['product_name'];
                                    $product_id = $row['product_id'];
                                    $product_price = $row['product_price'];
                                    $product_desp = substr($row['product_desp'],0,5);
                                    $product_cat_id = $row['product_cat_id'];
                                    $product_image = $row['product_image'];
                                    echo "<tr id={$product_id}>";
                                    echo "<th><button style='border:none; background:none;' onclick='del_edit_btn({$product_id})'><img src='images/negative.svg'></button></th>";
                                    echo "<td><img width = '100' src = './images/$product_image' alt='images'</td>";
                                    echo "<td>{$product_name}</td>";
                                    $query = "SELECT * FROM categories WHERE cat_id = $product_cat_id";
                                    $select_cat_name = mysqli_query($connection,$query);
                                    while($row = mysqli_fetch_assoc($select_cat_name)){
                                        $cat_name = $row['cat_name'];
                                        echo "<td>{$cat_name}</td>";
                                    }
                                    echo "<td>$".$product_price."</td>";
                                    echo "<td>".$product_desp."...</td>";
                                    echo "</tr>";
                                }                 
                            ?>
                        </tbody>
                        <?php 
                            if(isset($_GET['delete'])){
                                    $del_id = $_GET['delete'];
                                $query = "DELETE FROM products WHERE product_id = {$del_id}";
                                $del_query = mysqli_query($connection,$query);
                                header('Location: admin_panel.php');
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-12 col-lg-4 m-0 p-0 order-first order-md-last">
        <div class="row col-12 mt-5">
            <?php 
                if(isset($_POST['product_submit'])){
                    global $connection;
                    $countfiles = count($_FILES['file']['name']);
                    $images = '';
                    for($i=0;$i<$countfiles;$i++){
                        $filename = $_FILES['file']['name'][$i];
                        move_uploaded_file($_FILES['file']['tmp_name'][$i],'./images/'.$filename);
                        $images .= $filename.',';
                    }
                    $product_name = $_POST['product_name'];
                    $product_desp = $_POST['product_desp'];
                    $product_cat_id = $_POST['product_cat_id'];
                    $product_price = $_POST['product_price'];
                    $product_image = $_FILES['product_image']['name'];
                    $product_image_temp = $_FILES['product_image']['tmp_name'];
                    $target_dir = "./images/";
                    move_uploaded_file($product_image_temp, $target_dir . $product_image);
                    $query = "INSERT INTO products(product_name,product_price,product_cat_id,product_desp,product_image, other_images)";
                    $query .= " VALUES('{$product_name}', '{$product_price}', '{$product_cat_id}', '{$product_desp}', '{$product_image}', '{$images}')";
                    $ceate_product_query = mysqli_query($connection,$query);
                    if(!$ceate_product_query){
                        die('QUERY FAILED' . mysqli_error($connection));
                    }
                    header("Location: admin_panel.php");                    
                }         
            ?>
            <div class="row col-12 justify-content-start ml-2">
                <h1 class="theme-heading" >Add Item</h1>
            </div>
            <div class="col-12 m-0 p-0 justify-content-center">
                <form id="item_form" class="row col-12 m-0 p-0 justify-content-center" method="post" enctype="multipart/form-data">
                    <div class="row col-12 justify-content-center mb-3">
                        <input class="pill-input form-control py-2 mr-1 pr-5" type="search" name="product_name" placeholder="Item Name" id="example-search-input">
                    </div>
                    <div class="row col-12 justify-content-center mb-3">
                        <input class="pill-input form-control py-2 mr-1 pr-5" type="search" name="product_desp" placeholder="Describe Your Item" id="example-search-input">
                    </div>
                    <div class="row col-12 justify-content-center mb-3">
                        <select class="pill-input2 col-6 form-control py-2" style="height:auto"name="product_cat_id">
                            <?php 

                                $query = "SELECT * FROM categories";
                                $select_cat = mysqli_query($connection,$query);

                                while($row=mysqli_fetch_assoc($select_cat)){
                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name'];

                                    echo "<option value='{$cat_id}'>$cat_name</option>";
                                }
                            ?>

                        </select>

                        <input class="pill-input3 col-6 form-control py-2" type="search" name="product_price" placeholder="Price" id="example-search-input">
                    </div>
                    <div class="row col-12 justify-content-start mb-3">
                        <input class="" type="file" name="product_image" placeholder="Add Thumbnail" id="example-search-input">
                    </div>

                    <div class="row col-12 justify-content-start mb-3">
                        <input type="file" name="file[]" id="file" placeholder="Add other images" multiple>
                    </div>


                    <div class="row col-12 justify-content-start mb-3">
                        <input id="submit" class="btn pill badge-pill px-4 pill-design" type="submit" name="product_submit" value="Add Item">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>