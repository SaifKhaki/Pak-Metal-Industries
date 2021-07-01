<!DOCTYPE html>
<?php ob_start(); ?>
<?php include 'includes/db.php'?>
<?php include 'adminIncludes/functions.php'?>
<html>
<head>
	<title>Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--bootstrap CSS-->    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="css\admin_panel.css">
	<!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--My JS-->
    <script type="text/javascript" src="js\common.js"></script>
    <!--Google font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <!--JS for increasing the height of textarrea-->
    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
    <!--Bootstrap JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
</head>
<body class="m-0 p-0">
    <div class="firstSection row col-12 m-0 p-0" style="overflow-x:hidden;">
        <nav class="row col-12 navbar navbar-light navbar-expand-md m-0 p-0 pb-2 fixed-top">
            <div class="row col-12 justify-content-between justify-content-md-start ml-3 ml-lg-5 col-md-5">
                <a href="HomePage.php" class="col-xs-1 row navbar-brand text-white">
                    <img src="images\logo.svg" alt="logo">
                </a>
                <button class="col-xs navbar-toggler hidden-lg-up mr-4" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="col-xs-12 col-md-7 pl-lg-5 row justify-content-center text-center collapse navbar-collapse align-items-center" id="collapsibleNavId">
                <ul class="navbar-nav row">
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-black" href="HomePage.php" tabindex="-1" aria-disabled="true">Home</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-black" href="categories.php" tabindex="-1" aria-disabled="true">Products</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-black" href="contact.php" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-black" href="about.php" tabindex="-1" aria-disabled="true">About</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <div class="row col-12 justify-content-center ml-1 justify-content-md-start mb-3  bg-theme">
                            <button class="btn pill badge-pill px-3 pill-design2" type="button" onclick="location.href='HomePage.php'">Log Out</button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row col-12 justify-content-center m-0 p-0 mt-5 pt-5">
        </div>
        <div class="cartSection row col-12 justify-content-center m-0 p-0">
            <div class="row col-12 col-md-10 justify-content-center">
                
<div class="items-section cart row col-12 justify-content-end bg-white border-1 border-secondary m-0 p-0 mb-3 mt-2">
            <div class=" col-12 m-0 p-0 ">
        <div class="row col-12 mt-5 justify-content-center">
            <div class="row col-12 justify-content-center" style="height: 80px;">
                <h1 class="theme-heading" >Edit Item</h1>
            </div>
            <div class="col-12  col-lg-4 m-0 p-0 justify-content-center">


                <?php 
                
                if(isset($_GET['edit'])){
                    $edit_id = $_GET['edit'];
                    
                    $query = "SELECT * FROM products WHERE product_id = {$edit_id}";
                    $sel_edit_query = mysqli_query($connection, $query);
                    $row = mysqli_fetch_array($sel_edit_query);
                    
                    $nameEdit = $row['product_name'];
                    $catEdit_id = $row['product_cat_id'];
                    $despEdit = $row['product_desp'];
                    $imageEdit = $row['product_image'];
                    $priceEdit = $row['product_price'];
                    $images = $row['other_images'];
                    
                    if(isset($_POST['update_submit'])){
                    global $connection;

                    // Count total files
                    $countfiles = count($_FILES['file']['name']);
                    
                    // Looping all files
                    $images = '';
                    for($i=0;$i<$countfiles;$i++){
                    $filename = $_FILES['file']['name'][$i];
                    
                    // Upload file
                    move_uploaded_file($_FILES['file']['tmp_name'][$i],'./images/'.$filename);
                    $images .= $filename.',';
                    
                    }

                    // echo ("<script>alert('the add button is clicked')</script>");
                    $id = $_GET['edit'];

                    $product_name = $_POST['product_name'];
                    $product_desp = $_POST['product_desp'];
                    $product_cat_id = $_POST['product_cat_id'];
                    $product_price = $_POST['product_price'];

                    $product_image = $_FILES['product_image']['name'];
                    $product_image_temp = $_FILES['product_image']['tmp_name'];

                    $target_dir = "./images/";
                    move_uploaded_file($product_image_temp, $target_dir . $product_image);

                    echo ("<script>alert('{$product_name}, {$images}')</script>");
                    // print_r ($connection);
                    
                    $query = '';
                    
                    if(!empty($images) and !empty($product_image)){
                    $query = "UPDATE products SET product_name = '{$product_name}',product_price= '{$product_price}',product_cat_id='{$product_cat_id}',product_desp='{$product_desp}',product_image='{$product_image}', other_images = '{$images}' WHERE product_id = {$id}";
                    }else{
                        $query = "UPDATE products SET product_name = '{$product_name}',product_price= '{$product_price}',product_cat_id='{$product_cat_id}',product_desp='{$product_desp}' WHERE product_id = {$id}";    
                    }

                    $ceate_product_query = mysqli_query($connection,$query);
                    header("Location: admin_panel.php");                    
                }
                
                }
            
            
                ?>
                <form id="item_form" class="row col-12 m-0 p-0 justify-content-center" method="post" enctype="multipart/form-data">
                    <div class="row col-12 justify-content-center mb-3">
                        <input class="pill-input form-control py-2 mr-1 pr-5" type="search" name="product_name" value="<?php echo $nameEdit?>" placeholder="Item Name" id="example-search-input">
                    </div>
        
                    <div class="row col-12 justify-content-center mb-3">
                        <input class="pill-input form-control py-2 mr-1 pr-5" type="search" name="product_desp" placeholder="Describe Your Item" value="<?php echo $despEdit?>" id="example-search-input">
                    </div>
                    <div class="row col-12 justify-content-center mb-3">
                        <select class="pill-input2 col-6 form-control py-2" style="height:auto" value= "<?php echo $catEdit_id;?>"name="product_cat_id">
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

                        <input class="pill-input3 col-6 form-control py-2" type="search" name="product_price" value="<?php echo $priceEdit;?>"placeholder="Price" id="example-search-input">
                    </div>
                    <div class="row col-12 justify-content-start mb-3">
                        <input class="" type="file" name="product_image" value="<?php echo $imageEdit?>"placeholder="Add Thumbnail" id="example-search-input">
                    </div>

                    <div class="row col-12 justify-content-start mb-3">
                        <input type="file" name="file[]" id="file" value="<?php echo $images?>" placeholder="Add other images" multiple>
                    </div>


                    <div class="row col-12 justify-content-start mb-3">
                        <input id="submit" class="btn pill badge-pill px-4 pill-design" type="submit" name="update_submit" value="Update Item">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                
            </div>
        </div>
    </div>
    <footer class="p-0 m-0">
            <div class="footer row col-12 m-0 p-0 pt-3 pt-md-5 text-white">
                <div class="row col-12 justify-content-center mb-0 mb-md-4">
                    <div class="row col-12 col-md-7 justify-content-center m-0 p-0 ml-4">
                        <div id="about" class="row col-12 col-md-6 text-left m-0 p-0">
                            <h2>About Us</h2>
                            <p class="col-12">Holding a perfect instrument in hands gives a user the confidence, control and precision it requires.</p>
                        </div>
                    </div>
                    <div class="row col-12 col-md-5 justify-content-center">
                        <div class="row col-12 m-0 p-0 text-left">
                            <div class="row col-12 text-center">
                                <h2 class="m-0 p-0">Navigation</h2>
                            </div>
                            <div class="row col-12 m-0 p-0">
                                <a href="HomePage.php" class="col-12">> Home</a>
                                <a href="categories.php" class="col-12">> Products</a>
                                <a href="contact.php" class="col-12">> Contact</a>
                                <a href="about.php" class="col-12">> About</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-12 mt-4 mt-md-0">
                    <div class="col-12 row justify-content-center">
                        <div class="col-6 line"></div>
                    </div>
                </div>
                <div class="row col-12 m-0 p-0 justify-content-center mt-3">
                    <div class="row col-10 m-0 p-0 mb-3 ml-0 ml-md-2 pl-0 pl-md-4 align-items-center justify-content-center">
                        <div class="row col-12 col-lg-2 justify-content-center text-center pl-0 mb-3 mb-lg-0">
                            <a href="HomePage.php" class="text-white ml-2">
                                <img src="images\logo.svg" alt="logo" width="90px" height="65px">
                            </a>
                        </div>
                        <div class="row col-12 col-lg-4 m-0 p-0 justify-content-center order-lg-last">
                            <div class="col-12 row p-0 m-0 p-2 text-center justify-content-center">
                                <div class="col-auto m-0 p-0">
                                    <a href="" target="_blank" class="mr-3">
                                        <img src="images\linkedin.svg" alt="Whatsapp">
                                    </a>
                                </div>
                                <div class="col-auto m-0 p-0">
                                    <a href="" target="_blank" class="mr-3">
                                        <img src="images\twitter.svg" alt="Behance">
                                    </a>
                                </div>
                                <div  class="col-auto m-0 p-0">
                                    <a href="" target="_blank" class="mr-3">
                                        <img src="images\instagram.svg" alt="Facebook">
                                    </a>
                                </div>
                                <div  class="col-auto m-0 p-0">
                                    <a href="" target="_blank" class="mr-3">
                                        <img src="images\facebook.svg" alt="Github">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row col-12 col-lg-6 justify-content-center m-0 p-0 mt-3 mt-lg-0">
                            <h2 class="text-center">The Undeviating Quality</h2>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>