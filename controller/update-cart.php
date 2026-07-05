<?php
include '../config.php';
$admin = new Admin();

if (isset($_GET['cart_id'])) {
    $u_id = $_SESSION['u_id'];
    $cart_id = $_GET['cart_id'];
    $action = $_GET['action'];



    $st = $admin->ret("SELECT * FROM `cart` WHERE `ca_id`='$cart_id'");
    $userCart = $st->fetch(PDO::FETCH_ASSOC);
    $cartQuantity = $userCart['ca_quantity'];

    $p_id = $userCart['p_id'];
    $product_table = $admin->ret("SELECT * FROM `product` WHERE `p_id` = '$p_id' ");
    $product_row = $product_table->fetch(PDO::FETCH_ASSOC);
    $product_quantity = $product_row['p_stock'];


    if ($cartQuantity == 1 && $action == "decrement") {
    } else if ($cartQuantity + 1 > $product_quantity && $action == "increment") {
    } else {

        $updatedCartQuantity = 0;
        if ($action == "increment") {
            $updatedCartQuantity = $cartQuantity + 1;
        } else if ($action == "decrement") {
            $updatedCartQuantity = $cartQuantity - 1;
        }
        // echo $updatedCartQuantity;
        $admin->cud("UPDATE `cart` SET `ca_quantity`='$updatedCartQuantity' WHERE `ca_id`='$cart_id'", "updated");
    }
}
?>
<div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $subTotal = 0;
                        $cart_table = $admin->ret("SELECT * FROM `cart` WHERE `u_id`='$u_id'");
                        while ($cart_row = $cart_table->fetch(PDO::FETCH_ASSOC)) {
                            $p_id = $cart_row['p_id'];
                            $product_table = $admin->ret("SELECT * FROM `product` WHERE `p_id`='$p_id'");
                            $product_row = $product_table->fetch(PDO::FETCH_ASSOC);
                            $subTotal = $subTotal + $product_row['p_price'] * $cart_row['ca_quantity'];
                        ?>

                            <tr>
                                <td class="align-middle"><img src="./vendor/controller/<?php echo $product_row['p_image']; ?>" alt="img"
                                        style="width: 50px;"><?php echo $product_row['p_name']; ?></td>
                                <td class="align-middle">₹ <?php echo $product_row['p_price'] ?></td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button onclick="decrement(<?php echo $cart_row['ca_id'] ?>)"
                                                class="btn btn-sm btn-primary btn-minus">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control form-control-sm bg-secondary text-center"
                                            value="<?php echo $cart_row['ca_quantity']; ?>">
                                        <div class="input-group-btn">
                                            <button onclick="increment(<?php echo $cart_row['ca_id'] ?>)"
                                                class="btn btn-sm btn-primary btn-plus">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">₹ <?php echo $product_row['p_price'] * $cart_row['ca_quantity']; ?>
                                </td>
                                <td class="align-middle"><a
                                        href="controller/delete.php?ca_id=<?php echo $cart_row['ca_id']; ?>"
                                        class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">₹ <?php echo $subTotal; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">₹ 50</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">₹ <?php echo $subTotal + 50; ?></h5>
                        </div>
                        <?php if ($subTotal > 0) { ?>
                            <a href="checkout.php" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                        <?php } else { ?>
                            <button class="btn btn-block btn-secondary my-3 py-3" disabled>Cart is Empty</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>