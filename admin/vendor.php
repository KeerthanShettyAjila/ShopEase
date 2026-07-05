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
                    <div class="card-title">Vendors</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">SI NO</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Address</th>
                          <th scope="col">Action</th>


                       
                        </tr>
                      </thead>
                      <tbody>
                        <?php $vendor_table = $admin->ret("SELECT * FROM `vendor`");
                        $index=1;
                        while($vendor_row = $vendor_table->fetch(PDO::FETCH_ASSOC)){
                        ?>
<tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo $vendor_row['v_name']; ?></td>
                          <td><?php echo $vendor_row['v_email']; ?></td>
                          <td><?php echo $vendor_row['v_number']; ?></td>
                          <td><?php echo $vendor_row['v_address']; ?></td>
                          <?php if($vendor_row['v_status']=='new'){ ?>
                            <td><a href="controller/update.php?v_id=<?php echo $vendor_row['v_id'];?>&action=accept" class="btn btn-success">Accept</a></td>
                          <?php } else if($vendor_row['v_status']=='accepted'){ ?>
                            <td><a href="controller/update.php?v_id=<?php echo $vendor_row['v_id'];?>&action=reject" class="btn btn-danger">Reject</a></td>

                          <?php } else if($vendor_row['v_status']=='rejected'){ ?>
                            <td><a href="controller/update.php?v_id=<?php echo $vendor_row['v_id'];?>&action=accept" class="btn btn-success">Accept</a></td>

                            <?php } ?> 
                          
                        
                        </tr>
                        <?php $index++; } ?>
                        
                        
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
