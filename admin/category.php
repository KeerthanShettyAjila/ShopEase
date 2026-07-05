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
                <form class="card" method="post" action="controller/add.php">
                  <div class="card-header">
                    <div class="card-title">Category</div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="email2">Add Category</label>
                          <input
                            type="text"
                            class="form-control"
                            id="email2"
                            placeholder="Enter category"
                            name="category"
                          />
                        
                        </div>
                       
                      </div>
                    
                    </div>
                  </div>
                  <div class="card-action">
                   
                    <button class="btn btn-primary" name="add-category">Add</button>
                  </div>
</form>
              </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Category</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">SI NO</th>
                          <th scope="col">Category Name</th>
                          <th scope="col">Action</th>
                       
                        </tr>
                      </thead>
                      <tbody>
                        <?php $category_table = $admin->ret("SELECT * FROM `category`");
                        $index=1;
                        while($category_row = $category_table->fetch(PDO::FETCH_ASSOC)){
                        ?>
<tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo $category_row['c_name']; ?></td>
                          <td><a href="controller/delete.php?c_id=<?php echo $category_row['c_id']; ?>" class="btn btn-danger" >Delete</a></td>
                        
                        </tr>
                        <?php $index++;  } ?>
                        
                        
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
