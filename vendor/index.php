<?php 
include 'configuration.php';
$products = $admin->ret("SELECT * FROM `product` WHERE `v_id`='$v_id'");
$products_count = $products->rowCount();
$orders = $admin->ret("SELECT * FROM `ordered_products` INNER JOIN `product` ON `ordered_products`.`p_id` = `product`.`p_id` WHERE `v_id`='$v_id'");
$orders_count = $orders->rowCount();
$feedback = $admin->ret("SELECT * FROM `feedback` INNER JOIN `product` ON `feedback`.`p_id` = `product`.`p_id` WHERE v_id = '$v_id'");
$feedback_count = $feedback->rowCount();

$payment_querys = "SELECT u.u_name, v.v_name, op.op_id, op.date, op.admin_status, 
op.admin_transaction, (p.p_price * op.p_quantity) as total_amount 
FROM ordered_products op 
JOIN product p ON op.p_id = p.p_id 
JOIN user u ON op.u_id = u.u_id 
JOIN vendor v ON p.v_id = v.v_id 
WHERE op.op_status = 'delivered' AND v.v_id = '$v_id'
ORDER BY op.date DESC LIMIT 7";
$payment_tables = $admin->ret($payment_querys);
$total_payment = 0;
while($payment_rows = $payment_tables->fetch(PDO::FETCH_ASSOC)){
  $total_payment = $total_payment + $payment_rows['total_amount']*0.95;
}
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
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2"></h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2"></a>
                <a href="#" class="btn btn-primary btn-round"></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                          <i class="fas fa-box"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Products</p>
                          <h4 class="card-title"><?php echo $products_count; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-info bubble-shadow-small">
                          <i class="fas fa-shopping-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Orders</p>
                          <h4 class="card-title"><?php echo $orders_count; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                          <i class="fas fa-comments"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Feedback</p>
                          <h4 class="card-title"><?php echo $feedback_count; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-warning bubble-shadow-small">
                          <i class="fas fa-wallet"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Payment</p>
                          <h4 class="card-title">₹ <?php echo number_format($total_payment,2) ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">


              
              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Transaction History</div>
                      <div class="card-tools">
                       
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table align-items-center mb-0">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Payment Number</th>
                            <th scope="col" class="text-end">Date</th>
                            <th scope="col" class="text-end">Amount</th>
                            <th scope="col" class="text-end">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $payment_query = "SELECT u.u_name, v.v_name, op.op_id, op.date, op.admin_status, 
                                          op.admin_transaction, (p.p_price * op.p_quantity) as total_amount 
                                          FROM ordered_products op 
                                          JOIN product p ON op.p_id = p.p_id 
                                          JOIN user u ON op.u_id = u.u_id 
                                          JOIN vendor v ON p.v_id = v.v_id 
                                          WHERE op.op_status = 'delivered' AND v.v_id = '$v_id'
                                          ORDER BY op.date DESC LIMIT 7";
                          $payment_table = $admin->ret($payment_query);
                          while($payment_row = $payment_table->fetch(PDO::FETCH_ASSOC)){
                          ?>
                          <tr>
                            <th scope="row">
                              <button class="btn btn-icon btn-round <?php echo $payment_row['admin_status'] == 'paid' ? 'btn-success' : 'btn-warning'; ?> btn-sm me-2">
                                <i class="fa <?php echo $payment_row['admin_status'] == 'paid' ? 'fa-check' : 'fa-clock'; ?>"></i>
                              </button>
                              Payment from #ORDER-<?php echo $payment_row['op_id']; ?>
                            </th>
                            <td class="text-end"><?php echo date('M d, Y', strtotime($payment_row['date'])); ?></td>
                            <td class="text-end">₹<?php echo $payment_row['total_amount']*0.95; ?></td>
                            <td class="text-end">
                              <span class="badge <?php echo $payment_row['admin_status'] == 'paid' ? 'badge-success' : 'badge-warning'; ?>">
                                <?php echo ucfirst($payment_row['admin_status']); ?>
                              </span>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
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
