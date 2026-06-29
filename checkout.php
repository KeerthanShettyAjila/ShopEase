<?php 
include 'configuration.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <?php
   include 'head.php';
   ?>
   <style>
       .card-header {
           background: #D19C97;
           color: #D19C97;
       }
       .card-footer {
           background: #D19C97;
           color: #D19C97;
       }
       .form-label {
           
           color:rgb(0, 0, 0);
       }
       .btn-primary {
           background: #D19C97;
           border: none;
       }
       .btn-primary:hover {
           background: #D19C97;
       }
       .qr-code-container {
           border: 2px dashed #6c757d;
           padding: 15px;
           border-radius: 10px;
           background-color: #f8f9fa;
       }
       .qr-code-container img {
           width: 200px;
           height: 200px;
           border-radius: 10px;
       }
   </style>
</head>
<body>

    <!-- Navbar Start -->
    <?php
    include 'navbar.php';
    ?>
    <!-- Navbar End -->

    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form class="row px-xl-5" method="post" action="controller/add.php">
            <!-- Billing Address -->
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input name="fname" class="form-control" type="text" placeholder="Enter First Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input name="lname" class="form-control" type="text" placeholder="Enter Last Name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">E-mail</label>
                            <input name="email" class="form-control" type="email" placeholder="Enter E-mail" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mobile No</label>
                            <input name="mnum" class="form-control" type="tel" placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address Line 1</label>
                            <input name="add1" class="form-control" type="text" placeholder="Enter your Address" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address Line 2</label>
                            <input name="add2" class="form-control" type="text" placeholder="Enter your Address" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input name="city" class="form-control" type="text" placeholder="Enter your City" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">State</label>
                            <input name="state" class="form-control" type="text" placeholder="Enter your State" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">ZIP Code</label>
                            <input name="zip" class="form-control" type="number" placeholder="Enter your ZIP Code" required>
                        </div>
                        <div class="col-md-6" id="transactionDiv">
                            <label class="form-label">Transaction ID</label>
                            <input name="transaction" id="transaction" class="form-control" type="text" placeholder="Enter Transaction ID">
                        </div>
                        <div class="col-md-4" id="qrCodeDiv">
                            <label class="form-label">QR Code</label>
                            <div class="qr-code-container text-center">
                                <img id="qrCodeDisplay" src="controller/upload/qr1.jpg" alt="QR Code">
                                <p class="mt-2 text-muted">Scan this QR code for payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card border-secondary mb-4">
                    <div class="card-header">
                        <h4 class="font-weight-semi-bold m-0">Order Summary</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <?php 
                        $subTotal = 0;
                        $product_table = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON cart.p_id = product.p_id WHERE `p_status`='accepted'");
                        while($product_row = $product_table->fetch(PDO::FETCH_ASSOC)) { 
                            $quantity = $product_row['ca_quantity'];
                            $price = $product_row['p_price'];
                            $subTotal += $price * $quantity;
                        ?>
                            <div class="d-flex justify-content-between">
                                <p><?php echo $product_row['p_name']; ?> (x<?php echo $quantity; ?>)</p>
                                <p>₹<?php echo $price * $quantity; ?></p>
                            </div>
                        <?php } ?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">₹<?php echo $subTotal; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">₹50</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">₹<?php echo $subTotal + 50; ?></h5>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">₹<?php echo $subTotal + 50; ?></h5>
                        </div>
                    </div>
                </div>

                <!-- Payment Options -->
                <div class="card border-secondary">
                    <div class="card-header">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="payment" value="Online" id="bankTransfer" onclick="togglePaymentFields()">
                            <label class="form-check-label" for="bankTransfer">Bank Transfer</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="payment" value="COD" id="cod" onclick="togglePaymentFields()">
                            <label class="form-check-label" for="cod">Cash on Delivery</label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button name="add_checkout" type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold" id="checkoutButton">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->

    <!-- Footer Start -->
    <?php
    include 'footer.php';
    ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <?php
    include 'script.php';
    ?>
    <script>
        function togglePaymentFields() {
            const transactionDiv = document.getElementById('transactionDiv');
            const qrCodeDiv = document.getElementById('qrCodeDiv');
            const transactionInput = document.getElementById('transaction');
            const bankTransfer = document.getElementById('bankTransfer');

            if (bankTransfer.checked) {
                transactionDiv.style.display = 'block';
                qrCodeDiv.style.display = 'block';
                transactionInput.setAttribute('required', 'required');
            } else {
                transactionDiv.style.display = 'none';
                qrCodeDiv.style.display = 'none';
                transactionInput.removeAttribute('required');
            }
        }

        function toggleCheckoutButton() {
            const checkoutButton = document.getElementById('checkoutButton');
            const hasProducts = <?php echo $hasProducts ? 'true' : 'false'; ?>;

            if (!hasProducts) {
                checkoutButton.disabled = true;
            }
        }

        // Initialize visibility on page load
        document.addEventListener('DOMContentLoaded', () => {
            togglePaymentFields();
            toggleCheckoutButton();
        });
    </script>
</body>

</html>