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

            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Newsletter</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">SI NO</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Mail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $contact_table = $admin->ret("SELECT * FROM `newsletter`");
                        $index=1;
                        while($contact_row = $contact_table->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo $contact_row['n_name']; ?></td>
                          <td><?php echo $contact_row['n_email']; ?></td>
                          <td>
                            <a href="mailto:<?php echo urlencode($contact_row['n_email']); ?>?subject=<?php echo urlencode('Newsletter from Shopease'); ?>&body=<?php echo urlencode('Dear ' . $contact_row['n_name'] . ",\n\nThank you for subscribing to our newsletter.\n\nBest regards,\nShopease Team"); ?>" class="btn btn-primary">Mail</a>
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
