<?php 
include 'configuration.php';
$category = isset($_GET['category']) ? $_GET['category'] : null;
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

            <!-- Shop Product Start -->

            <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" id="searchInput" class="form-control"
                                        placeholder="Search by name or vendor" />
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <?php if ($category): ?>
            <a href="shop.php" class="btn btn-primary">Clear Filter</a>
        <?php endif; ?>
                        </div>
                    </div>

                    <?php
$query = "SELECT product.*, vendor.v_name FROM `product` 
          INNER JOIN `vendor` ON product.v_id = vendor.v_id";

if ($category) {
    $query .= " WHERE product.c_name = '$category'";
}

$product_table = $admin->ret($query);
$index = 1;
                    while ($product_row = $product_table->fetch(PDO::FETCH_ASSOC)) { ?>
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1 product-item">
                            <div class="card border-0 mb-4">
                                <a href="detail.php?p_id=<?php echo $product_row['p_id']; ?>"
                                    class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid" style="height: 400px; width: 400px;"
                                        src="./vendor/controller/<?php echo $product_row['p_image']; ?>" alt="img" />
                                </a>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3 product-name"><?php echo $product_row['p_name'] ?></h6>
                                    <h6 class="text-truncate mb-3 vendor-name"><?php echo $product_row['v_name'] ?></h6>
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

            <!-- Shop Product End -->

     <!-- JavaScript for Search Functionality -->
    <script>
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let searchValue = this.value.toLowerCase();
            let productItems = document.querySelectorAll(".product-item");

            productItems.forEach(function(item) {
                let productName = item.querySelector(".product-name").textContent.toLowerCase();
                let vendorName = item.querySelector(".vendor-name").textContent.toLowerCase();
                if (productName.includes(searchValue) || vendorName.includes(searchValue)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        });
    </script>


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