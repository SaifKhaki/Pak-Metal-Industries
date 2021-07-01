<?php session_start();?>
<!DOCTYPE html>
<?php include 'includes/db.php' ?>
<html>
<head>
	<title>Categories</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--bootstrap CSS-->    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="css\items.css">
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

    <!-- aos library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</head>
<body class="m-0 p-0">
    <div class="firstSection row col-12 m-0 p-0 mb-4" style="overflow-x:hidden;">
        
        <?php include 'includes/navigation.php';?>
        <div class="row col-12 justify-content-center m-0 p-0 mt-5 pt-5">
            <div class="row col-9 justify-content-start text-white mt-5 ">
                <h3 class="theme-heading"><span>Categories</span></h3>
            </div>
            <div data-aos="fade-up" class="display-items row col-10 justify-content-center text-white mt-5 p-0 p-md-5">
                <?php
                    $query = "SELECT * FROM categories ORDER BY cat_id DESC";
                    $select_query = mysqli_query($connection,$query);
                    
                    
                ?>
                <div class="col-12 row m-0 p-0 justify-content-center">

                    <div class="col-12 row m-0 p-0 justify-content-center">
                        <div class="col-12 m-0 p-0 row  justify-content-center mr-0">

                            <?php 
                                if(mysqli_num_rows($select_query) != 0){
                                
                                    while($row = mysqli_fetch_assoc($select_query)){
                                        $cat_id = $row['cat_id'];
                                        $cat_name = $row['cat_name']; 
                                        $cat_image = $row['cat_image'];
                                        
                                        ?>

                                        <div data-aos="zoom-in" class="item col-12 col-sm-5 col-lg-3 p-0 row  justify-content-center justify-content-md-end mb-2 mx-1">
                                            <img src="images\<?php echo $cat_image?>" alt="work1" width="100%">
                                                <a href="items.php?pc_id=<?php echo $cat_id;?>">
                                                    <div class="hover-grad">
                                                        <h1 class="item-text"><?php echo $cat_name?></h1>
                                                    </div>
                                                </a>
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
    <script>
        AOS.init({
            duration : 900,
        });
    </script>
</body>
</html>