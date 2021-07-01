<?php session_start(); ?>
<?php include 'includes/db.php'?>
<!DOCTYPE html>
<html>
<head>
	<title>Digital Receipt</title>
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
      
    <script>
        function downloadPdf(){
            $("footer").addClass("d-none");
            $("nav").addClass('d-none');
            $("#d-receipt-none").addClass("d-none");
            window.print();
            location.href = "includes/end_session.php";
        }
    </script>

<?php 
    if(isset($_SESSION['nameInfo'])){
        $name = $_SESSION['nameInfo'];
    }
    if(isset($_SESSION['contactInfo'])){
        $contact = $_SESSION['contactInfo'];
    }
    if(isset($_SESSION['addressInfo'])){
        $address = $_SESSION['addressInfo'];
    }

?>  
    <div class="firstSection row col-12 m-0 p-0" style="overflow-x:hidden;">
        
        <?php include 'includes/navigation2.php'?>

        <div class="cartSection row col-12 justify-content-center m-0 p-0 my-5 pt-0 pt-md-5">
            <div class="row col-12 col-md-10 m-0 p-0 justify-content-center mt-5">
                <div class="cart row col-12 bg-white justify-content-center border-1 border-secondary m-0 p-0 mt-5">
                    <div class="row col-12 justify-content-start mt-5 mb-3 ml-4">
                        <div class="row col-12">
                            <h1 class="theme-heading"><?php echo $data_array;?></h1>
                        </div>
                        <div class="row col-12">
                            <p class="desc">Your transaction was successful. Thanks for purchasing.</p>
                        </div>
                    </div>
                    <div class="row col-12 justify-content-center m-0 p-0 px-2">
                        <div class="col-12 col-lg-5 justify-content-center p-0 m-0 pl-5 pb-5 mt-4 mt-md-0">
                            <div class="row col-12 justify-content-center">
                                
                                <div class="col-12 row m-0 p-0">
                                    <p class="col-6"><span style="color: #3979F4;">Name:</span></p>
                                    <p class="col-6"><?php echo $name;?></p>
                                </div>
                                <div class="col-12 row m-0 p-0">
                                    <p class="col-6"><span style="color: #3979F4;">Contact:</span></p>
                                    <p class="col-6"><?php echo $contact;?></p>
                                </div>
                                <div class="col-12 row m-0 p-0">
                                    <p class="col-6"><span style="color: #3979F4;">Shipping Address:</span></p>
                                    <p class="col-6"><?php echo $address;?></p>
                                </div>

                            </div>
                        </div>
                        <div class="row col-12 col-lg-7 justify-content-center m-0 p-0 pb-5">
                            <div class="table-responsive">
                                <table class="col-12 table table-hover m-0 p-0 text-nowrap">
                                    <thead>
                                      <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">ProductID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price x Quan.</th>
                                        <th scope="col">Price</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                
                                    <?php 
                                        if(!empty($_SESSION['cartDetails'])){
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
                                                    <td><img src="images/<?php echo $product_image?>"  style="width: 45px; height: 40px;"></td>
                                                    <td><?php echo $pid?></td>
                                                    <td><?php echo $product_name?></td>
                                                    <td><?php echo $product_price." x ".$pSelect?></td>
                                                    <td><?php echo '$'.$totalPrice?></td>
                                                </tr>                                            
                                
                                    <?php            
                                            }?> 
                                            
                                                <tr>
                                                    <th colspan="1"></th>
                                                    <td colspan="2">Order Summary</td>
                                                    <td><?php echo $totalSelect;?></td>
                                                    <td><?php echo "$".$totalPriceS;?></td>
                                                </tr>
                                
                                            <?php
                                        }  ?>
                                </tbody>
                                </table>
                            </div>
                            
                            <div id="d-receipt-none" class="col-12 row justify-content-end justify-content-md-end m-0 p-0 mt-5">
                                <button class="btn pill badge-pill px-4 bg-secondary text-white mr-2" onclick="location.href='includes/end_session.php'" type="button">Return to Shopping</button>
                                <button class="btn pill badge-pill px-4 pill-design" onclick="downloadPdf()" type="button">Download</button>
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
        <?php
            function fetch_data($name, $address, $contact)
            {
                global $connection;
                $arr =  array(
                    'name' => $name,
                    'address' => $address,
                    'contact' => $contact,
                    'items' => array()
                );
                foreach($_SESSION['cartDetails'] as $key => $value){
                    $pid = $value['product_id'];
                    $pSelect = $value['itemSelect'];


                    $query = "SELECT * FROM products WHERE product_id = $pid";
                    $sel_query = mysqli_query($connection,$query);
                    $row = mysqli_fetch_array($sel_query);
                    $product_name = $row['product_name'];
                    $product_price = $row['product_price']; 
                    $product_cat_id = $row['product_cat_id'];

                    $cat_query = "SELECT * FROM categories WHERE cat_id = $product_cat_id";
                    $sel_cat = mysqli_query($connection,$cat_query);
                    $row = mysqli_fetch_array($sel_cat);
                    $cat_name = $row['cat_name'];        
                    
                    $totalSelect = $totalSelect + $pSelect;
                    $totalPrice =  $product_price * $pSelect;
                    $totalPriceS = $totalPriceS + $totalPrice;
                    // echo "<script>alert($product_name)</script>";
                    $arr['items'][] = array(
                        "id" => $pid,
                        "name" => $product_name,
                        "cat_name" => $cat_name,
                        "items" => $pSelect,
                        "price" => $product_price,
                        "total" => $totalPrice
                    );
                }
                return $arr;
            }
            
            $data_array = fetch_data($name, $address, $contact);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'http:/13.82.225.206:5000/sendmail');
            curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_array));   // post data
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $json = curl_exec($ch);
            $error = curl_error($ch);
            // echo '<pre>';print_r($json);die;
            curl_close ($ch);
        ?>
</body>
</html>
