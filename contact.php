<?php session_start(); ?>
<?php include 'includes/db.php'?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Contact</title>
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
    <!--icons-->
    <script src="https://use.fontawesome.com/4fc8552d70.js"></script>
    <!--Google font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</head>
<body class="m-0 p-0">
    <div class="firstSection row col-12 m-0 p-0" style="overflow-x:hidden;">
        <?php include 'includes/navigation2.php'?>
        <div class="cartSection row col-12 justify-content-center m-0 p-0 my-5">
            <div class="row col-12 col-md-10 justify-content-center mt-5">
                <div class="cart row col-12 bg-white border-1 border-secondary m-0 p-0 mt-5">
                    <div class="row col-12 justify-content-start mt-5 mb-3 ml-2 ml-md-4">
                        <div class="row col-12">
                            <h1 class="theme-heading">Contact Us</h1>
                        </div>
                    </div>
                    <div class="col-12 row m-0 p-0">
                        <div class="col-12 row m-0 p-0 justify-content-center d-flex no-gutters">
                            <div class="col-12 row justify-content-center align-self-center ml-5">
                                <div class="col-12 row m-0 p-0 px-0 px-lg-5 pb-5">
                                    <form method="post" class="col-12 row px-0 px-lg-5 ">
                                        <div class="form-group col-12 row px-2 px-lg-5 mb-4 pills">
                                            <div class="col-12 pill-button">
                                                <button type="button" class="btn bg-theme text-white" data-toggle="tooltip" data-placement="right" title="00923017342050">
                                                    Make a ring call 
						                            <i class="fa fa-phone" style="color: white;" aria-hidden="true" class="ml-1"></i>
						                        </button>
						                         <p class="mt-2">or email us, we will get back to you within a working day.</p>
                                            </div>
                                            <div class="col-12 pb-2 pill-button">
                                                <input id="textinput" name="nameInput" type="text" placeholder="Name" class="form-control input-md myInput">
                                                <span class="help-block d-none">help</span>  
                                            </div>
                                            <div class="col-12 pb-2 pill-button">
                                                <input id="textinput" name="emailInput" type="email" placeholder="Email" class="form-control input-md myInput">
                                                <span class="help-block d-none">help</span>  
                                            </div>
                                            <div class="col-12 pb-2 pill-button">
                                                <textarea id="textinput" name="msgInput" rows="5" placeholder="Message" class="form-control myInput"></textarea>
                                                <span class="help-block d-none">help</span>  
                                            </div>
                                            <div class="col-12 row p-0 justify-content-end pill-button">
                                                <div class="col-12 row justify-content-end float-right">
                                                    <input type="submit" id="singlebutton" name="contact_buttonSubmit" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </form>
                                    <?php
                                    if(isset($_POST['contact_buttonSubmit'])){

                                        $to      = 'metalindustries8@gmail.com';
                                        $subject = 'Personal Message From '.$_POST['nameInput'];
                                        $message = $_POST['msgInput'];
                                        $headers = 'From: '.$_POST['emailInput']. "\r\n" .
                                            'Reply-To: '.$_POST['emailInput']."\r\n" .
                                            'X-Mailer: PHP/' . phpversion();

                                        mail($to, $subject, $message, $headers);
                                        echo "<script>location.href='HomePage.php'</script>";
                                        // header('Location: HomePage.php');
                                    }
                                    ?>
                                </div>
                                
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
