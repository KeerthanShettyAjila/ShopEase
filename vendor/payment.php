<?php include 'configuration.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include 'head.php';
    ?>
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <?php
      include 'sidebar.php';
      ?>
      <!-- End Sidebar -->

      <div class="main-panel">
        <?php include 'navbar.php'; ?>

        <div class="container">
          <div class="page-inner">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Payment Details</div>
                </div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">SI NO</th>
                        <th scope="col">Username</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $payment_query = "SELECT u.u_name, v.v_name, op.op_id, op.date, op.admin_status, 
                                      op.admin_transaction,
                                      (p.p_price * op.p_quantity) as total_amount 
                                      FROM ordered_products op 
                                      JOIN product p ON op.p_id = p.p_id 
                                      JOIN user u ON op.u_id = u.u_id 
                                      JOIN vendor v ON p.v_id = v.v_id 
                                      WHERE op.op_status = 'delivered' AND v.v_id = '$v_id'";
                      $payment_table = $admin->ret($payment_query);
                      $index = 1;
                      while($payment_row = $payment_table->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <tr>
                        <td><?php echo $index; ?></td>
                        <td><?php echo $payment_row['u_name']; ?></td>
                        <td>#ORDER-<?php echo $payment_row['op_id']; ?></td>
                        <td><?php echo $payment_row['date']; ?></td>
                        <td>₹<?php echo $payment_row['total_amount']*0.95; ?></td>
                        <td><?php echo $payment_row['admin_transaction'] ? $payment_row['admin_transaction'] : 'Not Paid'; ?></td>
                        <td>
                          <span class="btn btn-sm <?php echo $payment_row['admin_status'] == 'notpaid' ? 'btn-danger' : ($payment_row['admin_status'] == 'paid' ? 'btn-success' : 'btn-secondary'); ?>">
                            <?php echo ucfirst($payment_row['admin_status']); ?>
                          </span>
                        </td>
                       
                      </tr>
                      <?php $index++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php include 'footer.php'; ?>
      </div>

      <!-- Custom template | don't include it in your project! -->
      <?php
      include 'custom_template.php';
      ?>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <?php
    include 'script.php';
    ?>
  </body>
</html>
