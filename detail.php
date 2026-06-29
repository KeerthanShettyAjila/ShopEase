<?php 
include 'configuration.php';
$p_id = $_GET['p_id'];
$product_table = $admin->ret("SELECT * FROM `product` WHERE `p_id`='$p_id'");
$product_row = $product_table->fetch(PDO::FETCH_ASSOC);
$category = $product_row['c_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'head.php'
    ?>
</head>
<body>

    <!-- Navbar Start -->
    <?php 
    include 'navbar.php'
    ?>
    <!-- Navbar End -->

    <!-- Shop Detail Start -->
    
    <div class="container-fluid py-5">
        
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="./vendor/controller/<?php echo $product_row['p_image']; ?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="./vendor/controller/<?php echo $product_row['p_image']; ?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="./vendor/controller/<?php echo $product_row['p_image']; ?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="./vendor/controller/<?php echo $product_row['p_image']; ?>" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo $product_row['p_name']; ?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                </div>
                <h3 class="font-weight-semi-bold mb-4">Price: ₹ <?php echo $product_row['p_price']; ?>/-</h3>
                
                <p class="mb-4"><?php echo $product_row['p_description']; ?></p>
               
                <div class="d-flex align-items-center mb-4 pt-2">
                    <a href="controller/add.php?p_id=<?php echo $product_row['p_id']; ?>" class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a>
                </div>
                
            </div>
        </div>




        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p><?php echo $product_row['p_complete_description']; ?></p>
                        </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <?php 
                                $feedback_query = "SELECT f.*, u.u_name 
                                                 FROM feedback f 
                                                 JOIN user u ON f.u_id = u.u_id 
                                                 WHERE f.p_id = '$p_id'";
                                $feedback_table = $admin->ret($feedback_query);
                                $feedback_count = $feedback_table->rowCount();
                                ?>
                                <h4 class="mb-4"><?php echo $feedback_count; ?> review's for "<?php echo $product_row['p_name']; ?>"</h4>
                                <?php
                                while($feedback = $feedback_table->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <div class="media mb-4">
                                    <div class="media-body">
                                        <h6><?php echo $feedback['u_name']; ?><small> - <i><?php echo date('d M Y', strtotime($feedback['f_date'])); ?></i></small></h6>
                                        <div class="text-primary mb-2">
                                            <?php 
                                            for($i = 1; $i <= 5; $i++) {
                                                if($i <= $feedback['rating']) {
                                                    echo '<i class="fas fa-star"></i>';
                                                } else {
                                                    echo '<i class="far fa-star"></i>';
                                                }
                                            }
                                            ?>
                                        </div>
                                        <p><?php echo $feedback['f_feedback']; ?></p>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
        

        <!-- Products Start -->
    <div class="container-fluid pt-5">
    <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
    <?php
                    $product_table = $admin->ret("SELECT * FROM `product` WHERE `c_name` = '$category'");
                    $index = 1;
                    while ($product_row = $product_table->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1 product-item">
                            <div class="card border-0 mb-4">
                                <a href="product-detail.php?p_id=<?php echo $product_row['p_id']; ?>"
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid" style="height: 400px; width: 400px;"
                                        src="./vendor/controller/<?php echo $product_row['p_image']; ?>" alt="img" />
                                </a>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3 product-name"><?php echo $product_row['p_name'] ?></h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>₹ <?php echo $product_row['p_price'] ?></h6>
                                        <h6 class="text-muted ml-2"><del>₹ <?php echo $product_row['p_price'] * 1.2 ?></del>
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="detail.php?p_id=<?php echo $product_row['p_id']; ?>"
                                        class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                        Detail</a>
                                    <a href="controller/add.php?p_id=<?php echo $product_row['p_id'] ?>"
                                        class="btn btn-sm text-dark p-0"><i
                                            class="fas fa-shopping-cart text-primary mr-1"></i>Add
                                        To Cart</a>
                                </div>
                            </div>
                        </div>
                    <?php $index++;
                    } ?>
                    </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


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