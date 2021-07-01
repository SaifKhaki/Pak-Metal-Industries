<?php session_start();?>
<!DOCTYPE html>
<?php include 'includes/db.php' ?>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--bootstrap CSS-->    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!--External CSS-->
        <link rel="stylesheet" type="text/css" href="css\home.css">
        <!--Jquery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--Bootstrap JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <!--Google font-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <!--JS for increasing the height of textarrea-->
        <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/slick-theme.css">
        <link rel="stylesheet" href="css/style.css">    
    </head>
    <body class="m-0 p-0">
        <?php $_SESSION['paymentSuccess'] = 0; ?>
        <section id="mainBody" style="overflow-x:hidden;">
                <!-- Navigation Panel Starts Here -->
                <?php 
                    include 'includes/navigation.php';
                ?>
            <!-- Navigation Panel Ends Here -->
            <div class="centerSection mt-5 pt-5">
               <div class="mainHeading my-5">
                   <h1>Pakistan <span>Metal </span>Industries</h1>
                   <p>Holding a perfect instrument in hands gives a user the confidence, control and precision it requires. We know it, talk about manufacturing, it starts from selecting the best material for the instruments and converting it to the extension of your hands for creative and reliable work.</p>
               </div>
               <div class="container m-0 p-0 pr-4">
                    <div class="itemCaro">
                       <div class="carHead mb-2">
                           <h1 class="CarouselHeading">New Arrivals</h1>
                           <div class="row col-12 m-0 p-0 mt-3 ">
                            <p class="ml-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <div class="row col-12 justify-content-start mb-3">
                                <button class="btn pill badge-pill px-3 pill-design ml-5" onclick="location.href='categories.php'" type="button">Explore All</button>
                            </div>
                        </div>
                       </div>
                       <div class="itemCarousel1 p-3">

                        <?php 
                            $query = "SELECT * FROM products ORDER BY product_id DESC LIMIT 8";
                            $select_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_query)){ 
                                $product_image = $row['product_image'];
                                $product_id = $row['product_id'];
                                $product_cat_id = $row['product_cat_id'];

                                ?>

                            <div class="homePageDiv">
                                <a href='items.php?pc_id=<?php echo $product_cat_id?>'>
                                    <img src='images/<?php echo $product_image?>' alt='Product_images' width="90%" height="100%">
                                </a>
                            </div>

                                
                        <?php } ?>

                        </div>
                        <div class="overlay"></div>
                   </div>
                   <div class="itemCaro">
                    <div class="carHead mb-2">
                        <h1 class="CarouselHeading">Best Selling</h1>
                        <div class="row col-12 m-0 p-0 mt-3 ">
                            <p class="ml-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <div class="row col-12 justify-content-start mb-3">
                                <button class="btn pill badge-pill px-3 pill-design ml-5" type="button" onclick="location.href='categories.php'">Explore All</button>
                            </div>
                        </div>
                    </div>
                    <div class="itemCarousel1 p-3">

                        <?php 
                            $query = "SELECT * FROM products ORDER BY total_sales DESC LIMIT 8";
                            $select_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_query)){ 
                                $product_image = $row['product_image'];
                                $product_id = $row['product_id'];
                                $product_cat_id = $row['product_cat_id'];

                                ?>

                            <div class="homePageDiv">
                                <a  href='items.php?pc_id=<?php echo $product_cat_id?>'>
                                    <img src='images/<?php echo $product_image?>' alt='Product_images' width="90%" height="100%">
                                </a>
                            </div>

                                
                        <?php } ?>

                        </div>
                     <div class="overlay"></div>
                </div>
               </div>
            </div>
        </section>
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
    </body>
</html>
