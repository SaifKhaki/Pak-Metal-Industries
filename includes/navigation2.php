<nav class="row col-12 navbar navbar-light navbar-expand-md m-0 p-0 pb-2 fixed-top">
    <div class="row col-12 justify-content-between justify-content-md-start ml-3 ml-lg-5 col-md-5">
        <a href="HomePage.php" class="col-xs-1 row navbar-brand text-white">
            <img src="images\logo.svg" alt="logo" style="z-index: 1000;" width="90px" height="65px"> 
        </a>
        <button class="col-xs navbar-toggler hidden-lg-up mr-4" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-xs-12 col-md-7 pl-lg-5 row justify-content-center text-center collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav row">
            <li class="nav-item mr-lg-2 order-last">
                <div class="circle text-center pt-2" style="position: relative;">
                    <a class="nav-link m-0 p-0 " href="cart.php" tabindex="-1" aria-disabled="true">
                        <img src="images\cart.svg" alt="logo">
                    </a>
                    <?php 
                        if(isset($_SESSION['cartDetails'])){
                            $count = count($_SESSION['cartDetails']);?>
                            <div class="countCart" style="background:red; width:25px; border-radius:50%; position:absolute; top:-5px; right:-5px; font-size:16px; font-weight:bold; color:white"><?php echo $count?></div>
                    <?php  } ?>
                </div>
            </li>
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
        </ul>
    </div>
</nav>
