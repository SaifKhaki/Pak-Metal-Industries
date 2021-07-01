<?php session_start(); ?>
<?php include 'includes/db.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>About us</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--bootstrap CSS-->    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!--External CSS-->
	<link rel="stylesheet" type="text/css" href="css\main.css">
	<!--Jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Bootstrap JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!--My JS-->
    <script type="text/javascript" src="js\common.js"></script>
    <!--Google font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <!--JS for increasing the height of textarrea-->
    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
</head>
<body class="m-0 p-0">
    <div class="firstSection row col-12 m-0 p-0">
        <?php include 'includes/navigation2.php'?>
        <div class="cartSection row col-12 justify-content-center m-0 p-0 my-5">
            <div class="row col-12 col-md-10 justify-content-center mt-5">
                <div class="cart row col-12 bg-white border-1 border-secondary m-0 p-0 mt-5">
                    <div class="row col-12 justify-content-start mt-5 mb-3 ml-0 ml-md-4">
                        <div class="row col-12">
                            <h1 class="theme-heading text-left">Pakistan Metal Industries</h1>
                        </div>
                    </div>
                    <div class="row col-12 justify-content-center mb-3 ml-0 ml-md-4">
                        <div class="row col-12 col-md-10">
                            <p class="theme-p text-left">We are a manufacturing company of beauty care instruments for Beauty Industryand Institutes. All of our specialized and general-purpose instruments are manufactures through technical documentations, mechanized and systemized process. Broad range of instruments allows us to supply constumers with best performance required for their work.</p>
                            <p class="theme-p text-left">We are active in this field of instrumentation with muchsuccess and prosperity.Customer's requirements, requests and needs are still a daily challenge for metal Industry's team.</p>
                            <p class="theme-p text-left">The manufacturing of beauty care instruments is a long tradition of Sialkot and our company is a part of it, making us proud of manufacturing instruments of excellent quality. We always seek reliable partners through whom our company gets broaden exposure to the world of beauty, ultimately giving benefitsto us nd our costumers. We are glad to welcome you, that you tour on-line product display center of <a href="HomePage.php">PakMetalIndustries</a>.</p>
                            <p class="theme-p text-left">Hopefully you will find products of your need and assistance, please contact us <a href="contact.php">here</a>.</p>
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
