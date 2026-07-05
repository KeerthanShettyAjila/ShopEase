<?php include 'configuration.php' ;
$p_id=$_GET['p_id'];
$product_table = $admin->ret("SELECT * FROM `product` WHERE `p_id`='$p_id'");
$product_row = $product_table->fetch(PDO::FETCH_ASSOC)
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

      

        <div class="row">
              <div class="col-md-12">
                <form class="card" method="post" enctype="multipart/form-data" action="controller/update.php" >
                  <input type="hidden" name="p_id" value="<?php echo $p_id;?>">
                  <div class="card-header">
                    <div class="card-title">Category</div>
                  </div>
                  <div class="card-body">
                    <div class="row d-flex flex-column">
                        <input type="hidden" name="v_id" value="<?php echo $v_id; ?>">
                    <div class="col-md-6 col-lg-4">
                      <div class="form-group">
                          <label for="email3">Product Image</label>
                          <input
                            type="file"
                            class="form-control"
                            id="email3"
                            name="img"
                          />
                        </div>
                        </div>

                      <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                          <label for="email2">Name</label>
                          <input
                            type="text"
                            class="form-control"
                            id="email2"
                            placeholder="Enter product name"
                            name="name"
                            value="<?php echo $product_row['p_name'] ?>"
                          />
                        
                        </div>
                      </div>


                      <div class="col-md-12 col-lg-8">
                      <div class="form-group">
                          <label for="email3">Description</label>
                          <input
                            type="text"
                            class="form-control"
                            id="email3"
                            placeholder="Enter product description"
                            name="des"
                            value="<?php echo $product_row['p_description'] ?>"
                          />
                        </div>
                        </div>

                        <div class="col-md-12 col-lg-8">
                      <div class="form-group">
                          <label for="email3">Complete Description</label>
                          <input
                            type="text"
                            class="form-control"
                            id="email3"
                            placeholder="Enter complete product description"
                            name="cdesc"
                            value="<?php echo $product_row['p_complete_description'] ?>"
                          />
                        </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                      <div class="form-group">
                          <label for="email3">Price</label>
                          <input
                            type="number"
                            class="form-control"
                            id="email3"
                            placeholder="Enter product price"
                            name="price"
                            value="<?php echo $product_row['p_price'] ?>"
                          />
                        </div>
                        </div>
                    
                        <div class="col-md-6 col-lg-4">
                      <div class="form-group">
                          <label for="email3">Stock</label>
                          <input
                            type="number"
                            class="form-control"
                            id="email3"
                            placeholder="Enter product stock"
                            name="stock"
                            value="<?php echo $product_row['p_stock'] ?>"
                          />
                        </div>
                        </div> 
                        
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="largeSelect">Category</label>
                                <select
                                class="form-select form-control-lg"
                                id="largeSelect"
                                name="category"
                                >
                                
                                <option disabled>select category</option>
                                <?php $category_table = $admin->ret("SELECT * FROM `category`");
                        while($category_row = $category_table->fetch(PDO::FETCH_ASSOC)){
                            $selected= ($product_row['c_name']==$category_row['c_name']) ? 'selected':'';
                        ?>

                                <option value="<?php echo $category_row['c_name']; ?>" <?php echo $selected;?> ><?php echo $category_row['c_name']; ?></option>
                                <?php }?>
                       
                            </select>
                        </div> 
                    </div>




                    </div>
                  </div>
                  <div class="card-action">
                   
                    <button class="btn btn-primary" name="update-product">Update</button>
                  </div>
</form>
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
