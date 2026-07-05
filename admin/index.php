<?php 
include 'configuration.php';

// Get counts and data for dashboard
$users = $admin->ret("SELECT * FROM user");
$users_count = $users->rowCount();

$vendors = $admin->ret("SELECT * FROM vendor WHERE v_status='accepted'");
$vendors_count = $vendors->rowCount();

$new_vendors = $admin->ret("SELECT * FROM vendor WHERE v_status='new'");
$new_vendors_count = $new_vendors->rowCount();

$categories = $admin->ret("SELECT * FROM category");
$categories_count = $categories->rowCount();

$products = $admin->ret("SELECT * FROM product");
$products_count = $products->rowCount();

$new_products = $admin->ret("SELECT * FROM product WHERE p_status='new'");
$new_products_count = $new_products->rowCount();

$feedback = $admin->ret("SELECT * FROM feedback");
$feedback_count = $feedback->rowCount();

$newsletter = $admin->ret("SELECT * FROM newsletter");
$newsletter_count = $newsletter->rowCount();

$orders = $admin->ret("SELECT * FROM ordered_products");
$orders_count = $orders->rowCount();

$pending_payments = $admin->ret("SELECT * FROM ordered_products WHERE admin_status='notpaid' AND op_status='delivered'");
$pending_payments_count = $pending_payments->rowCount();

$revenue = $admin->ret("SELECT SUM(p.p_price * op.p_quantity * 0.05) as total_revenue 
                       FROM ordered_products op 
                       JOIN product p ON op.p_id = p.p_id 
                       WHERE op.op_status = 'delivered'");
$revenue_data = $revenue->fetch(PDO::FETCH_ASSOC);
$total_revenue = $revenue_data['total_revenue'] ?? 0;

$contacts = $admin->ret("SELECT * FROM contact");
$contacts_count = $contacts->rowCount();
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
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Users</p>
                          <h4 class="card-title"><?php echo $users_count; ?></h4>
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
                          <i class="fas fa-user-plus"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">New Vendors</p>
                          <h4 class="card-title"><?php echo $new_vendors_count; ?></h4>
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
                          <i class="fas fa-store"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Vendors</p>
                          <h4 class="card-title"><?php echo $vendors_count; ?></h4>
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
                          <i class="fas fa-tags"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Categories</p>
                          <h4 class="card-title"><?php echo $categories_count; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                          <i class="fas fa-box-open"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">New Products</p>
                          <h4 class="card-title"><?php echo $new_products_count; ?></h4>
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
                        <div class="icon-big text-center icon-danger bubble-shadow-small">
                          <i class="fas fa-boxes"></i>
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
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
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
                        <div class="icon-big text-center icon-info bubble-shadow-small">
                          <i class="far fa-newspaper"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Newsletter Subs</p>
                          <h4 class="card-title"><?php echo $newsletter_count; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
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
                        <div class="icon-big text-center icon-warning bubble-shadow-small">
                          <i class="fas fa-clock"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Pending Payments</p>
                          <h4 class="card-title"><?php echo $pending_payments_count; ?></h4>
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
                          <i class="fas fa-dollar-sign"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Revenue</p>
                          <h4 class="card-title">₹<?php echo number_format($total_revenue, 2); ?></h4>
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
                        <div class="icon-big text-center icon-secondary bubble-shadow-small">
                          <i class="fas fa-address-book"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Contact</p>
                          <h4 class="card-title"><?php echo $contacts_count; ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="card card-round">
                  <div class="card-body">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">New Customers</div>
                    </div>
                    <div class="card-list py-4">
                      <?php
                      $users = $admin->ret("SELECT u_name, u_email FROM user ORDER BY u_id DESC LIMIT 6");
                      while($row = $users->fetch(PDO::FETCH_ASSOC)) {
                        $firstLetter = strtoupper(substr($row['u_name'], 0, 1));
                      ?>
                      <div class="item-list">
                        <div class="avatar">
                          <span class="avatar-title rounded-circle border border-white bg-secondary">
                            <?php echo $firstLetter; ?>
                          </span>
                        </div>
                        <div class="info-user ms-3">
                          <div class="username"><?php echo $row['u_name']; ?></div>
                          <div class="status"><?php echo $row['u_email']; ?></div>
                        </div>
                        <a href="mailto:<?php echo $row['u_email']; ?>" class="btn btn-icon btn-link op-8 me-1">
                          <i class="far fa-envelope"></i>
                        </a>
                      </div>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
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
                          $trans_query = "SELECT op.op_id, op.date, op.admin_status,
                                        (p.p_price * op.p_quantity) as amount 
                                        FROM ordered_products op 
                                        JOIN product p ON op.p_id = p.p_id 
                                        WHERE op.op_status = 'delivered'
                                        ORDER BY op.date DESC LIMIT 7";
                          $trans_table = $admin->ret($trans_query);
                          while($trans_row = $trans_table->fetch(PDO::FETCH_ASSOC)){
                          ?>
                          <tr>
                            <th scope="row">
                              <button class="btn btn-icon btn-round <?php echo $trans_row['admin_status'] == 'paid' ? 'btn-success' : 'btn-warning'; ?> btn-sm me-2">
                                <i class="fa <?php echo $trans_row['admin_status'] == 'paid' ? 'fa-check' : 'fa-clock'; ?>"></i>
                              </button>
                              Payment from #ORDER-<?php echo $trans_row['op_id']; ?>
                            </th>
                            <td class="text-end"><?php echo date('M d, Y', strtotime($trans_row['date'])); ?></td>
                            <td class="text-end">₹<?php echo number_format($trans_row['amount'], 2); ?></td>
                            <td class="text-end">
                              <span class="badge <?php echo $trans_row['admin_status'] == 'paid' ? 'badge-success' : 'badge-warning'; ?>">
                                <?php echo ucfirst($trans_row['admin_status']); ?>
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
