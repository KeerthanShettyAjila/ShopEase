<?php $current_page = basename($_SERVER['PHP_SELF']);

if (isset($_SESSION['u_id'])) {
    $u_id = $_SESSION['u_id'];
    $user_table = $admin->ret("SELECT * FROM `user` WHERE `u_id`='$u_id'");
    $user_row = $user_table->fetch(PDO::FETCH_ASSOC);
    $user_name = $user_row['u_name'];
}
?>

<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <!-- Logo aligned to the left -->
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <img
                        src="controller/upload/logos1.png"
                        alt="navbar brand"
                        height="60"
                        class="mr-3"
                    />
                </a>
                <!-- Toggler for mobile view -->
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <!-- Centered Navbar Items -->
                    <div class="navbar-nav mx-auto py-0">
                        <a href="index.php" class="nav-item nav-link <?php echo $current_page == "index.php" ? 'active': '' ?>" style="font-size: 18px;">Home</a>
                        <a href="shop.php" class="nav-item nav-link <?php echo $current_page == "shop.php" ? 'active': '' ?>" style="font-size: 18px;">Shop</a>
                        <a href="cart.php" class="nav-item nav-link <?php echo $current_page == "cart.php" ? 'active': '' ?>" style="font-size: 18px;">Cart</a>
                        <a href="checkout.php" class="nav-item nav-link <?php echo $current_page == "checkout.php" ? 'active': '' ?>" style="font-size: 18px;">Checkout</a>
                        <a href="contact.php" class="nav-item nav-link <?php echo $current_page == "contact.php" ? 'active': '' ?>" style="font-size: 18px;">Contact</a>
                        <a href="orders.php" class="nav-item nav-link <?php echo $current_page == "orders.php" ? 'active': '' ?>" style="font-size: 18px;">Orders</a>
                        <a href="feedback.php" class="nav-item nav-link <?php echo $current_page == "feedback.php" ? 'active': '' ?>" style="font-size: 18px;">Feedback</a>
                    </div>
                    <!-- Profile Dropdown aligned to the right -->
                    <div class="navbar-nav ml-auto py-0">
                        <?php if (isset($_SESSION['u_id'])) { ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-toggle="dropdown" style="font-size: 18px;">
                                    <img src="controller/upload/img23.jpg" alt="Profile Picture" class="rounded-circle" height="40" width="40" style="margin-right: 10px;">
                                    <span><?php echo $user_name; ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="controller/auth.php?logout=logout" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 18px;">Login/Register</a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="vendor/login.html" class="dropdown-item">Vendor Register</a>
                                    <a href="login.html?register" class="dropdown-item">User Register</a>
                                    <a href="login.html" class="dropdown-item">Login</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>