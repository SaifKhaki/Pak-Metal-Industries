<?php session_start();?>
<!DOCTYPE html>
<?php include 'includes/db.php'?>
<html>
<head>
<title>Items</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--bootstrap CSS-->    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--External CSS-->
     

	<link rel="stylesheet" type="text/css" href="css\items.css">
    <link rel="stylesheet" type="text/css" href="css\overlay.css">
    <!-- <link rel="stylesheet" type="text/css" href="css\home.css"> -->
	<!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Bootstrap JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<!--My JS-->
    <!-- <script type="text/javascript" src="js\overlay.js"></script> -->
    <!--Google font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <!--JS for increasing the height of textarrea-->
    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
    
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/style.css">  
    
    <!-- aos library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    
      
</head>
<body class="m-0 p-0">

    <div class="firstSection row col-12 m-0 p-0 mb-4" style="overflow-x:hidden;">
        
        <!-- Navigation Panle Starts here -->
        <?php include 'includes/navigation.php'?>
        <!-- Navigation Panel Ends here -->
        
        <?php 
        
            if( isset($_GET['pc_id'])){
                $product_cat_id = $_GET['pc_id']; ?>

                <div class="row col-12 justify-content-center m-0 p-0 mt-5 pt-5">
                    <div class="row col-9 justify-content-start text-white my-5 ">

                        <?php 
                            $query = "SELECT cat_name FROM categories WHERE cat_id = $product_cat_id";
                            $select_query = mysqli_query($connection,$query);

                            $row = mysqli_fetch_array($select_query);
                            $cat_name = $row['cat_name'];
                        ?>
                        <h3 class="theme-heading"><span>Categories</span> > <span><?php echo $cat_name?></span></h3>
                    </div>
                    <div  class="display-items row col-9 justify-content-center text-white m-0 p-0 p-md-5 mb-4">
                        <div class="row col-12 m-0 p-0 mt-0 my-md-1 justify-content-center">

                            <?php
                            
                            $query = "SELECT * FROM products WHERE product_cat_id = $product_cat_id ORDER BY product_id DESC";
                            $select_query = mysqli_query($connection,$query);

                            if(mysqli_num_rows($select_query) != 0){
                                while($row = mysqli_fetch_assoc($select_query)){

                                    $product_image = $row['product_image'];
                                    $product_id = $row['product_id']; 
                                    $product_name = $row['product_name']; ?>

                                    <?php include 'includes/Modal2.php'?>

                                    <div data-aos="zoom-in" class="item bg-primary col-12 col-md-5 col-lg-4 m-0 p-0 mx-1 my-1 my-md-1 row justify-content-center justify-content-md-end"   data-toggle="modal" data-target="#exampleModal<?php echo $product_id?>" >
                                        <img src="images\<?php echo $product_image?>" alt="work1" width="100%">
                                        <div class="hover-grad">
                                            <h1 class="item-text"><?php echo $product_name?></h1>
                                        </div>
                                    </div>

                            <?php  
                                     } 
                                } else { echo "<h4 class='text-center m-3 m-md-0'>There are currently no items in this category.</h4>";}?>
                    
                        </div>
                        
                    </div>
                </div>

        <?php  } else {  ?> 
            
            <div class="row col-12 justify-content-center m-0 p-0 mt-5 pt-5">
                <div class="row col-9 justify-content-start text-white my-5 ">
                    <h3 class="theme-heading"><span>Categories</span> > <span>All Categories</span></h3>
                </div>
                <div  class="display-items row col-9 justify-content-center text-white p-0 p-md-5 pt-2">
                    <div class="row col-12 m-0 p-0 mt-0 my-md-1 justify-content-center">

                        <?php
                        
                        $query = "SELECT * FROM products ORDER BY product_id DESC";
                        $select_query = mysqli_query($connection,$query);
                        
                        if(mysqli_num_rows($select_query) != 0){
                        while($row = mysqli_fetch_assoc($select_query)){

                            $product_image = $row['product_image'];
                            $product_id = $row['product_id']; 
                            $product_name = $row['product_name']; ?>

                            <?php include 'includes/Modal2.php'?>

                            <div data-aos="zoom-in" class="item bg-primary col-12 col-md-5 col-lg-4 m-0 p-0 mx-1 my-1 my-md-1 row justify-content-center justify-content-md-end"  data-toggle="modal" data-target="#exampleModal<?php echo $product_id?>"  >
                                <img src="images\<?php echo $product_image?>" alt="work1" width="100%">
                                <div class="hover-grad" >
                                    <h1 class="item-text"><?php echo $product_name?></h1>
                                </div>
                                
                            </div>

                        <?php  } 
                        
                        } else { echo "<h4 class='text-center'>There are currently no items in this category.</h4>"; }
                        ?>
                
                    </div>
                    
                </div>
            </div>
            
        <?php }?>
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
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script src="js/index.js"></script>
    <script>
        AOS.init({
            duration : 900,
        });
    </script>
    
</body>
</html>