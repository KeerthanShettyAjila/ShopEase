<?php include 'configuration.php' ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'head.php' ?>
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <?php include 'sidebar.php' ?>
      <!-- End Sidebar -->

      <div class="main-panel">
        <?php include'navbar.php'; ?>

        <div class="container">
          <div class="page-inner">

       
                            <div class="col-md-12">
                                <div class="card shadow-lg border-0">
                                    <div class="card-header bg-gradient-light pb-0">
                                        <div class="d-flex align-items-center justify-content-between" style="height: 32px;">
                                            <h4 class="text-dark font-weight-bold mb-0">Customer Feedback</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <p class="text-uppercase text-sm font-weight-bold text-dark">Customer Opinions</p>
                                            <span class="badge bg-light text-dark px-3 py-2"><?php echo $admin->ret("SELECT COUNT(*) FROM `feedback` INNER JOIN `product` ON `feedback`.`p_id` = `product`.`p_id` WHERE v_id = '$v_id'")->fetchColumn(); ?> Entries</span>
                                        </div>

                                        <div class="">
                                            <table class="table table-hover align-middle">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th class="text-dark fw-bold ps-4" width="5%">S.No</th>
                                                        <th class="text-dark fw-bold" width="15%">Order No</th>
                                                        <th class="text-dark fw-bold" width="15%">Customer</th>
                                                        <th class="text-dark fw-bold" width="15%">Rating</th>
                                                        <th class="text-dark fw-bold" width="50%">Feedback</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $feedback_table = $admin->ret("SELECT * FROM `feedback` INNER JOIN `product` ON `feedback`.`p_id` = `product`.`p_id` WHERE v_id = '$v_id'");
                                                    $index = 1;
                                                    while ($feedback_row = $feedback_table->fetch(PDO::FETCH_ASSOC)) {
                                                        $u_id = $feedback_row['u_id'];
                                                        $user_table = $admin->ret("SELECT * FROM `user` WHERE `u_id`='$u_id'");
                                                        $user_row = $user_table->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                        <tr class="border-bottom">
                                                            <td class="ps-4"><?php echo $index; ?></td>
                                                            <td>
                                                                <span class="badge bg-primary text-white px-3 py-2">#<?php echo $feedback_row['op_id']; ?></span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar me-3 bg-info text-white rounded-circle" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; margin-right: 8px;">
                                                                        <?php echo strtoupper(substr($user_row['u_name'], 0, 1)); ?>
                                                                    </div>
                                                                    <div>
                                                                        <h6 class="mb-0 fw-medium"><?php echo $user_row['u_name']; ?></h6>
                                                                        <small class="text-muted">Customer</small>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="rating">
                                                                    <?php
                                                                    $rating = $feedback_row['rating'];
                                                                    for ($i = 1; $i <= 5; $i++) {
                                                                        if ($i <= $rating) {
                                                                            echo '<i class="fas fa-star text-warning"></i>';
                                                                        } else {
                                                                            echo '<i class="far fa-star text-warning"></i>';
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="feedback-text p-3 bg-light rounded">
                                                                    <p class="mb-0"><?php echo $feedback_row['f_feedback']; ?></p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        $index++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
          </div>
        </div>
        <?php include 'footer.php' ?>
      </div>

      <!-- Custom template | don't include it in your project! -->
      <?php include 'custom_template.php' ?>
      <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <?php include 'script.php' ?>
  </body>
</html>
