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
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Users</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $users = $admin->ret("SELECT * FROM user ORDER BY u_id DESC");
                          while($row = $users->fetch(PDO::FETCH_ASSOC)){
                              echo "<tr>";
                              echo "<td><div class='avatar-sm'><span class='avatar-title rounded-circle border border-primary'>" . substr($row['u_name'],0,1) . "</span></div>" . $row['u_name'] . "</td>";
                              echo "<td>".$row['u_email']."</td>";
                              echo "<td>".$row['u_number']."</td>";
                              echo "<td>".$row['u_address']."</td>";
                              echo "</tr>";
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