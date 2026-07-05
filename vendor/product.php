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
                    <div class="card-title">Products</div>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">SI NO</th>
                          <th scope="col">Image</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Category</th>
                          <th scope="col">Price</th>
                          <th scope="col">Stock</th>
                          <th scope="col">Action</th>

                       
                        </tr>
                      </thead>
                      <tbody>
                        <?php $product_table = $admin->ret("SELECT * FROM `product` WHERE `v_id`='$v_id'");
                        $index=1;
                        while($product_row = $product_table->fetch(PDO::FETCH_ASSOC)){
                        ?>
<tr>
                          <td><?php echo $index; ?></td>
                          <td><img style="height:200px; width:150px;" src="controller/<?php echo $product_row['p_image']; ?>" alt="image"></td>
                          <td><?php echo $product_row['p_name']; ?></td>
                          <td><?php echo $product_row['c_name']; ?></td>
                          <td><?php echo $product_row['p_price']; ?></td>
                          <td><?php echo $product_row['p_stock']; ?></td>
                          <td><a href="edit_product.php?p_id=<?php echo $product_row['p_id'];?>" class="btn btn-success">Edit</a> <a href="controller/delete.php?p_id=<?php echo $product_row['p_id']; ?>" class="btn btn-danger" >Delete</a>  </td>
                        
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
