<!--changes here-->
<div class="d-none items-section cart row col-12 bg-white border-1 border-secondary  m-0 p-0 mb-3 mt-2">
    <div class="row col-12 col-md-7 m-0 p-0">
        <div class="row col-12 justify-content-start p-0 mt-5 mx-3 mx-md-5 mb-2">
            <div class="row col-12 m-0 p-0">
                <!--changes here-->
                <h1 class="theme-heading">Items</h1>
            </div>
        </div>
        <div class="row col-12 m-0 p-0">
            <div class="row col-12 justify-content-center m-0 p-0 px-2 pl-md-5">
                <div class=" m-0 p-0 table-responsive">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <!--changes here-->
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <!--changes here-->
                        <tbody  id="cat_table">
                            <?php showAllItems()?>
                            <?php deleteItems()?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-12 col-md-5 order-first order-md-last">
        <div class="row col-12 mt-5">
            <!--changes here-->
            <?php 
                if(isset($_POST['submit'])){
                    $cat_name = $_POST['cat_name'];
                    $cat_image = $_FILES['cat_image']['name'];
                    $cat_image_temp = $_FILES['cat_image']['tmp_name'];
                    $target_dir = "./images/";
                    move_uploaded_file($cat_image_temp, $target_dir . $cat_image);
                    if($cat_name == "" || empty($cat_name)){
                        echo "<h4 style='color:red'>Please Fill the Field. It should not be empty</h4>";
                    }
                    else{
                        $query = "INSERT INTO categories(cat_name, cat_image) VALUES('{$cat_name}','{$cat_image}')";
                        $create_cat_query = mysqli_query($connection,$query);
                        if(!$create_cat_query){
                            die('QUERY FAILED' . mysqli_error($connection));
                        }
                    }
                    header("Location: admin_panel.php");
                }
            ?>
            <!--changes here-->
            <div class="row col-12 justify-content-start ml-md-2">
                <h1 class="theme-heading">Add Items</h1>
            </div>
            <div class="col-12 m-0 p-0 ">
                <form id="cat_form" class="row col-12 m-0 p-0 " method="post" enctype="multipart/form-data">
                    <div class="row col-12 mb-3">
                        <input class="pill-input form-control py-2 mr-1 pr-5" type="search" name="cat_name" placeholder="Category Name" id="example-search-input">
                    </div>
                    <div class="row col-12 justify-content-start mb-3">
                        <input class="" type="file" name="cat_image" placeholder="Add Image" id="example-search-input">
                    </div>
                    <div class="row col-12 mb-3  bg-theme">
                        <button class="btn pill badge-pill px-4 pill-design" type="submit" name="submit">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>