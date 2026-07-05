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
                    <div class="card-title">Contact</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">SI NO</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Subject</th>
                          <th scope="col">Message</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $contact_table = $admin->ret("SELECT * FROM `contact` ORDER BY co_id DESC");
                        $index=1;
                        while($contact_row = $contact_table->fetch(PDO::FETCH_ASSOC)){
                        ?>
<tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo $contact_row['co_name']; ?></td>
                          <td><?php echo $contact_row['co_email']; ?></td>
                          <td><?php echo $contact_row['co_subject']; ?></td>
                          <td><?php echo $contact_row['co_message']; ?></td>
                          
                          <?php  $index++; } ?> 
                        </tr>
                        
                      
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
