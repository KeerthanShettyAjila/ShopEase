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
                <form class="card" method="post" enctype="multipart/form-data" action="controller/add.php" >
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
                                
                                <option selected disabled>select category</option>
                                <?php $category_table = $admin->ret("SELECT * FROM `category`");
                        while($category_row = $category_table->fetch(PDO::FETCH_ASSOC)){
                        ?>

                                <option value="<?php echo $category_row['c_name']; ?>"><?php echo $category_row['c_name']; ?></option>
                                <?php }?>
                       
                            </select>
                        </div> 
                    </div>




                    </div>
                  </div>
                  <div class="card-action">
                   
                    <button class="btn btn-primary" name="add-product">Add</button>
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
