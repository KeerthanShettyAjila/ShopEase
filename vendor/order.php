<?php include 'configuration.php' ?>
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
               
       
            
                            <div class="col-12">
                                <div class="card shadow-lg">
                                    <div class="card-header bg-gradient-primary p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h4 class="text-black mb-0">Orders</h4>
                                            <span class="badge bg-light text-dark rounded-pill">
                                                <i class="fas fa-shopping-cart me-1"></i> Order Management
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <!-- <div class="table-responsive"> -->
                                            <div>
                                            <?php
                                            $ordered_table = $admin->ret("
                                                SELECT op.*, u.u_name 
                                                FROM `ordered_products` op
                                                JOIN `product` p ON op.p_id = p.p_id
                                                JOIN `user` u ON op.u_id = u.u_id
                                                WHERE p.v_id = '$v_id'
                                                ORDER BY op.op_id DESC
                                            ");
                                            if ($ordered_table->rowCount() > 0) {
                                            ?>
                                                <div class="orders-list">
                                                    <?php
                                                    while ($ordered_row = $ordered_table->fetch(PDO::FETCH_ASSOC)) {
                                                        $u_id = $ordered_row['u_id'];
                                                        $op_id = $ordered_row['op_id'];
                                                        $username = $ordered_row['u_name'];
                                                        $status = $ordered_row['op_status'];
                                                    ?>
                                                        <div class="card order-card mb-4 border-0 shadow-sm">
                                                            <div class="card-header bg-light p-3">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-8">
                                                                        <div class="d-flex align-items-center">

                                                                            <div>
                                                                                <h5 class="mb-0"><?php echo $username; ?></h5>
                                                                                <p class="text-muted mb-0">Order
                                                                                    #<?php echo $op_id; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 text-md-end">
                                                                        <?php
                                                                        $statusBadge = 'bg-warning';
                                                                        $statusText = 'Pending';

                                                                        if ($status == 'ordered') {
                                                                            $statusBadge = 'bg-info';
                                                                            $statusText = 'New Order';
                                                                        } else if ($status == 'accepted') {
                                                                            $statusBadge = 'bg-primary';
                                                                            $statusText = 'Accepted';
                                                                        } else if ($status == 'delivery') {
                                                                            $statusBadge = 'bg-warning';
                                                                            $statusText = 'Out for Delivery';
                                                                        } else if ($status == 'delivered') {
                                                                            $statusBadge = 'bg-success';
                                                                            $statusText = 'Delivered';
                                                                        }
                                                                        ?>
                                                                        <span
                                                                            class="badge <?php echo $statusBadge; ?> rounded-pill px-3 py-2">
                                                                            <?php echo $statusText; ?>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-body">
                                                                <div class="row mb-4">
                                                                    <div class="col-md-3">
                                                                        <p class="text-muted mb-1 small">Customer Address</p>
                                                                        <p class="mb-0 fw-bold">
                                                                            <?php echo htmlspecialchars($ordered_row['add1'] . ', ' . $ordered_row['add2'] . ', ' . $ordered_row['city'] . ', ' . $ordered_row['state'] . ' - ' . $ordered_row['zip']); ?>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <p class="text-muted mb-1 small">Contact Number</p>
                                                                        <p class="mb-0 fw-bold">
                                                                            <?php echo $ordered_row['num']; ?></p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p class="text-muted mb-1 small">Payment Method</p>
                                                                        <p class="mb-0 fw-bold">
                                                                            <?php 
                                                                            if ($ordered_row['payment'] == 'Online') {
                                                                                echo 'Transaction ID: ' . $ordered_row['transaction'];
                                                                            } else {
                                                                                echo 'Cash on Delivery';
                                                                            }
                                                                            ?>
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="table-responsive">
                                                                    <table class="table align-items-center mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                                    Product</th>
                                                                                <th
                                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                                    Quantity</th>
                                                                                <th
                                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                                    Unit Price</th>
                                                                                <th
                                                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                                    Subtotal</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $oproduct_table = $admin->ret("
                                                                                SELECT op.*, p.p_name, p.p_price 
                                                                                FROM `ordered_products` op
                                                                                JOIN `product` p ON op.p_id = p.p_id
                                                                                WHERE op.op_id = '$op_id'
                                                                            ");
                                                                            $total = 0;
                                                                            while ($oproduct_row = $oproduct_table->fetch(PDO::FETCH_ASSOC)) {
                                                                                $p_id = $oproduct_row['p_id'];
                                                                                $product_price = $oproduct_row['p_price'];
                                                                                $oproduct_quantity = $oproduct_row['p_quantity'];
                                                                                $subtotal = $product_price * $oproduct_quantity;
                                                                                $total = $total + $subtotal;
                                                                            ?>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="d-flex px-2 py-1">
                                                                                            <div
                                                                                                class="d-flex flex-column justify-content-center">
                                                                                                <h6 class="mb-0 text-sm">
                                                                                                    <?php echo $oproduct_row['p_name']; ?>
                                                                                                </h6>
                                                                                                <p
                                                                                                    class="text-xs text-secondary mb-0">
                                                                                                    ID: #<?php echo $p_id; ?></p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                                            <?php echo $oproduct_quantity; ?></p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                                            ₹<?php echo number_format($product_price, 2); ?>
                                                                                        </p>
                                                                                    </td>
                                                                                    <td>
                                                                                        <p class="text-sm font-weight-bold mb-0">
                                                                                            ₹<?php echo number_format($subtotal, 2); ?>
                                                                                        </p>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                                <div class="row mt-4">
                                                                    <div class="col-md-6">
                                                                        <div class="card bg-light border-0">
                                                                            <div class="card-body p-3">
                                                                                <div class="d-flex justify-content-between">
                                                                                    <span class="text-dark fw-bold">Total
                                                                                        Amount:</span>
                                                                                    <span
                                                                                        class="text-primary fw-bold">₹<?php echo number_format($total, 2); ?></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-md-6 d-flex align-items-center justify-content-end">
                                                                        <?php if ($status == 'ordered') { ?>
                                                                            <a href="controller/update.php?op_id=<?php echo $op_id; ?>&op_status=ordered"
                                                                                class="btn btn-primary btn-lg">
                                                                                <i class="fas fa-check me-2"></i> Accept Order
                                                                            </a>
                                                                        <?php } else if ($status == 'accepted') { ?>
                                                                            <a href="controller/update.php?op_id=<?php echo $op_id; ?>&op_status=accepted"
                                                                                class="btn btn-info btn-lg">
                                                                                <i class="fas fa-truck me-2"></i> Mark as Out for
                                                                                Delivery
                                                                            </a>
                                                                        <?php } else if ($status == 'delivery') { ?>
                                                                            <a href="controller/update.php?op_id=<?php echo $op_id; ?>&op_status=delivery"
                                                                                class="btn btn-success btn-lg">
                                                                                <i class="fas fa-box-open me-2"></i> Mark as
                                                                                Delivered
                                                                            </a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            <?php } else { ?>
                                                <div class="text-center py-5">
                                                    <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                                                    <h4 class="text-muted">No orders found</h4>
                                                    <p class="text-muted">There are currently no orders in the system.</p>
                                                </div>
                                            <?php } ?>
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
