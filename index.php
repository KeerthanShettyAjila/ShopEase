<?php 
include 'config.php';
$admin = new Admin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head.php'
    ?>
</head>


<body>
    <!-- Topbar Start -->
    <!-- <?php
    include 'topbar.php'
    ?> -->
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
    include 'navbar.php'
    ?>
    <!-- Navbar End -->


    <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                    <a href="shop.php" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="shop.php" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>


    <!-- Categories Start -->
    <div class="container-fluid pt-5">
    <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">CATEGORIES</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?category=Grocery" class="cat-img position-relative overflow-hidden mb-3">
                        <img style="width: 380px; height: 400px;" class="img-fluid" src="img/grocery.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Grocery</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?category=Electronics" class="cat-img position-relative overflow-hidden mb-3">
                        <img style="width: 380px; height: 400px;" class="img-fluid" src="img/electronics.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Electronics</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?category=Fashion" class="cat-img position-relative overflow-hidden mb-3">
                        <img style="width: 380px; height: 400px;" class="img-fluid" src="img/fashion.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Fashion</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?category=<?php echo urlencode('Home & Kitchen'); ?>" class="cat-img position-relative overflow-hidden mb-3">
                        <img style="width: 380px; height: 400px;" class="img-fluid" src="img/home.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Home & Kitchen</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?category=Mobiles" class="cat-img position-relative overflow-hidden mb-3">
                        <img style="width: 380px; height: 400px;" class="img-fluid" src="img/mobile.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Mobiles</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <a href="shop.php?category=<?php echo urlencode('Beauty & Personal Care'); ?>" class="cat-img position-relative overflow-hidden mb-3">
                        <img style="width: 380px; height: 400px;" class="img-fluid" src="img/glow.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Beauty & Personal Care</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->

    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Spring Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">20% off the all order</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Winter Collection</h1>
                        <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->

    <!-- Products Start -->

    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Trendy Products</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
        <?php $product_table = $admin->ret("SELECT * FROM `product` WHERE `p_status`='accepted' LIMIT 8");
                        $index=1;
                        while($product_row = $product_table->fetch(PDO::FETCH_ASSOC)){
                        ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-10 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img style="width: 300px; height: 400px;" class="img-fluid w-100" src="./vendor/controller/<?php echo $product_row['p_image']; ?>" alt="image">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3"><?php echo $product_row['p_name']; ?></h6>
                        <div class="d-flex justify-content-center">
                            <h6>₹ <?php echo $product_row['p_price']; ?></h6><h6 class="text-muted ml-2"><del>₹ <?php echo $product_row['p_price']+$product_row['p_price']/10; ?></del></h>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="detail.php?p_id=<?php echo $product_row['p_id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                        <a href="controller/add.php?p_id=<?php echo $product_row['p_id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                    </div>
                </div>
            </div>
            <?php $index++; } ?>
        </div>
    </div>


    <!-- Footer Start -->
    <?php
    include 'footer.php'
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <?php
    include 'script.php'
    ?>
</body>

</html>