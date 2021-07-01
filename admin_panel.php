<!DOCTYPE html>
<?php ob_start(); ?>
<?php session_start();?>
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
                        <a class="nav-link text-black" href="categories.php" tabindex="-1" aria-disabled="true">Categories</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-black" href="contact.php" tabindex="-1" aria-disabled="true">Contact</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <a class="nav-link text-black" href="about.php" tabindex="-1" aria-disabled="true">About</a>
                    </li>
                    <li class="nav-item mt-1 mr-lg-4">
                        <div class="row col-12 justify-content-center ml-1 justify-content-md-start mb-3  bg-theme">
                            <button class="btn pill badge-pill px-3 pill-design2" type="button" onclick="location.href = 'includes/end_session.php'";>Log Out</button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="row col-12 justify-content-center m-0 p-0 mt-5 pt-5">
            <div class="row col-12 col-md-10 adminMenu bg-white m-0 p-0">
                <div class="navbar navbar-expand">  
                    <ul class="navbar-nav ">
                        <li class="nav-item active mx-5">
                            <button class="btn bg-white nav-link category-switch text-black" href="#">Category</button>
                        </li>
                        <li class="nav-item">
                            <button class="btn bg-white nav-link item-switch text-black" href="#">Items</button>
                        </li>
                    </ul>
                </div>
            </div>
            <script>
                $(document).ready(function(){
                    $('.category-switch').click(function (e) { 
                        e.preventDefault();
                        $('.items-section').addClass('d-none');
                        $('.categories-section').removeClass('d-none')
                    });
                    $('.item-switch').click(function (e) { 
                        e.preventDefault();
                        $('.categories-section').addClass('d-none')
                        $('.items-section').removeClass('d-none');
                    });
                });
            </script>
        </div>
        <div class="cartSection row col-12 justify-content-center m-0 p-0">
            <div class="row col-12 col-md-10 justify-content-center">
            <?php include 'adminIncludes/categories.php'?>
            <?php include 'adminIncludes/items.php'?>
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