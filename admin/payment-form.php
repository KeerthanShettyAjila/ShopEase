<?php include 'configuration.php';
// Get order payment ID from URL parameter
$op_id = $_GET['op_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include 'head.php'
    ?>
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <?php
    include 'sidebar.php'
      ?>
      <!-- End Sidebar -->

      <div class="main-panel">
        <?php include'navbar.php'; ?>

        <div class="container">
          <div class="page-inner">
            <div class="row">
              <div class="col-md-12 mx-auto">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Vendor Payment Details</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                    $payment_query = "SELECT v.v_name, v.v_email, v.v_photo, op.op_id,
                                    (p.p_price * op.p_quantity) as total_amount 
                                    FROM ordered_products op 
                                    JOIN product p ON op.p_id = p.p_id 
                                    JOIN vendor v ON p.v_id = v.v_id 
                                    WHERE op.op_id = '$op_id'";
                    $stmt = $admin->ret($payment_query);
                    $payment_data = $stmt->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <form method="POST" action="controller/add.php" name="admin-payment">
                      <input type="hidden" name="op_id" value="<?php echo $op_id; ?>">
                      <input type="hidden" name="action" value="paid">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Vendor Name</label>
                            <input type="text" class="form-control" value="<?php echo $payment_data['v_name']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label>Vendor Email</label>
                            <input type="email" class="form-control" value="<?php echo $payment_data['v_email']; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" value="₹<?php echo $payment_data['total_amount']*0.95; ?>" readonly>
                          </div>
                          <div class="form-group">
                            <label>Transaction ID*</label>
                            <input type="number" class="form-control" name="transaction_id" required placeholder="Enter transaction ID">
                          </div>
                        </div>
                        <div class="col-md-6 text-center">
                          <label>Scan QR Code</label>
                          <div class="qr-container mb-3">
                            <img src="../vendor/controller/<?php echo $payment_data['v_photo']; ?>" alt="Vendor QR Code" class="img-fluid" style="max-width: 200px;">
                          </div>
                        </div>
                      </div>
                      <div class="text-center mt-3">
                        <button type="submit" name="admin-payment" class="btn btn-primary btn-lg">Submit Payment</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <?php 
      include 'footer.php'
      ?>
      </div>

      <!-- Custom template | don't include it in your project! -->
    <?php
    include 'custom_template.php'
    ?>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <?php
    include 'script.php'
    ?>
  </body>
</html>
