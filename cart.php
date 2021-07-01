<?php session_start(); ?>
<?php include 'includes/db.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<!--bootstrap CSS-->    
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <script>
    $(document).ready(function () {
        if($('#total_items').text() < 10){
            $('#d-itemscount-none').addClass('d-none');
            $('#d-itemscount-none').parent().append( "<p class='text-center'>You must have at least 10 total items.</p>" );
        }
    });
</script>
<?php 
    if($_POST['payNow_submit']){
        if(!empty($_POST['nameInfo']) and !empty($_POST['contactInfo']) and !empty($_POST['addressInfo'])){
            $name = $_POST['nameInfo'];
            $contact = $_POST['contactInfo'];
            $address = $_POST['addressInfo'];
            $_SESSION['nameInfo'] = $name;
            $_SESSION['contactInfo'] = $contact;
            $_SESSION['addressInfo'] = $address;
        }
        else{
        echo "<script>alert('Kindly fill all the information.')</script>";
        }
        header("Location: receipt.php");
    }
?>
    <div class="firstSection row col-12 m-0 p-0">
        <?php include 'includes/navigation2.php'?>
        <div class="cartSection row col-12 justify-content-center m-0 p-0 mt-5 pt-5">
            <div class="row col-12 col-md-10 justify-content-center my-5">
                <div class="cart col-12 col-lg-8 bg-white border-1 border-secondary m-0 p-0 mr-0 mr-md-4 mt-5" style="z-index: 1000;">
                    <div class="row col-12 justify-content-center mt-5 mb-3">
                        <h1 class="theme-heading">Cart</h1>
                    </div>
                    <div class="row col-12 justify-content-center m-0 p-0 px-2 px-md-5 pb-5">
                        <div class="table-responsive">
                            <table class="col-12 table table-hover m-0 p-0 text-nowrap">
                                <?php 
                                        if(!empty($_SESSION['cartDetails'])){
                                            echo '<thead>
                                            <tr>
                                              <th scope="col"></th>
                                              <th scope="col">Image</th>
                                              <th scope="col">ProductID</th>
                                              <th scope="col">Name</th>
                                              <th scope="col">Price x Quan.</th>
                                              <th scope="col">Total Price</th>
                                            </tr>
                                          </thead>
                                          <tbody>';
                                            $totalSelect = 0;
                                            $totalPriceS = 0;
                                            
                                            foreach($_SESSION['cartDetails'] as $key => $value){
                                                $pid = $value['product_id'];
                                                $pSelect = $value['itemSelect'];
                            
                                                $query = "SELECT * FROM products WHERE product_id = $pid";
                                                $sel_query = mysqli_query($connection,$query);
                                                $row = mysqli_fetch_array($sel_query);
                                                $product_image = $row['product_image'];
                                                $product_name = $row['product_name'];
                                                $product_price = $row['product_price']; 
                                                
                                                $totalSelect = $totalSelect + $pSelect;
                                                $totalPrice =  $product_price * $pSelect;
                                                $totalPriceS = $totalPriceS + $totalPrice;
                                                
                                                ?>
                                                <tr>
                            
                                                <?php 
                                                    if(isset($_GET['action'])){
                                                        if($_GET["action"] == "delete"){
                                                            foreach($_SESSION['cartDetails'] as $key => $value){
                                                                if($value['product_id'] == $_GET['id']){
                                                                    unset($_SESSION['cartDetails'][$key]);
                                                                    echo "<script>alert('Product is Removed Sucessfully')</script>";
                                                                    echo "<script>window.location='cart.php'</script>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                
                                                
                                                ?>
                                                    <th scope="row"><a href="cart.php?action=delete&id=<?php echo $value['product_id']?>"><img src="images\negative.svg" alt="logo"></a></th>
                                                    <td><img src="images/<?php echo $product_image?>"  style="width: 45px; height: 40px;"></td>
                                                    <td><?php echo $pid?></td>
                                                    <td><?php echo $product_name?></td>
                                                    <td><?php echo $product_price." x ".$pSelect?></td>
                                                    <td><?php echo '$'.$totalPrice?></td>
                                                </tr>                                            
                            
                                    <?php            
                                            }?> 
                                            
                                                <tr>
                                                    <th colspan="2"></th>
                                                    <td colspan="2">Order Summary</td>
                                                    <td id="total_items"><?php echo $totalSelect;?></td>
                                                    <td><?php echo "$".$totalPriceS;?></td>
                                                </tr>
                            
                                            <?php
                                        } else {
                            
                                            echo "<p class='text-center'>The Cart is Empty. Start Adding items in the cart.</p>";
                                        } ?>
                                        
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
                <div class="payment row col-12 col-lg-4 bg-white mt-5">
                    <div class="col-12">
                        <div class="row col-12 justify-content-center mt-5 mb-3">
                            <h1 class="theme-heading" >Payment</h1>
                        </div>
                        <div class="col-12 m-0 p-0 justify-content-center mb-3">
                            <form action="cart.php" id="d-itemscount-none" class="row col-12 m-0 p-0 justify-content-center" method="post">
                                
                                
                                <div id="d-onclick-none" class="col-12 row justify-content-center m-0 p-0">
                                    <div class="row col-12 justify-content-center mb-3">
                                        <input class="pill-input form-control py-2 mr-1 pr-5" name="nameInfo" type="search" placeholder="Full Name" id="example-search-input" required>
                                    </div>
                                    <div class="row col-12 justify-content-center mb-3">
                                        <input class="pill-input form-control py-2 mr-1 pr-5" name=contactInfo type="tel" pattern="[^a-zA-Z]+" placeholder="Contact" id="example-search-input" required>
                                    </div>
                                    <div class="row col-12 justify-content-center mb-3">
                                        <input class="pill-input form-control py-2 mr-1 pr-5" name="addressInfo" type="search" placeholder="Shipping Address" id="example-search-input" required>
                                    </div>
                                    <div class="row col-12 pt-3">
                                        <div class="col-6 text-left mt-1">
                                            <p>Total Amount</p>
                                        </div>
                                        <div class="col-6 text-right total-price">
                                            <p>$ <?php if(isset($totalPriceS)){echo $totalPriceS;}else{echo 0;}?></p>
                                        </div>
                                    </div>
                                    <input id="paynow_btn" class="btn pill badge-pill px-4 pill-design" type="submit" name="payNow_submit" value="Pay Now">
                                </div>
                                
                            </form>
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
                            <p class="col-12">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ipsum urna, auctor eu augue et, auctor dictum nulla. </p>
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
