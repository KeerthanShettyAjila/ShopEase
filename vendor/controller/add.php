<?php 
include '../../config.php';
$admin = new Admin();

if(isset($_POST['add-category'])){
    $category = $_POST['category'];
    $admin->cud("INSERT INTO `category`(`c_name`) VALUES ('$category')","added category");
    echo "<script>
    window.location.href='../category.php';
    </script>";
}

if(isset($_POST['add-product'])){
    $v_id=$_POST['v_id'];
    $name = $_POST['name'];
    $description = $_POST['des'];
    $complete_description = $_POST['cdesc'];
    $category=$_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $photo = "upload/" . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$photo);
    
    
    $admin->cud("INSERT INTO `product`(`p_name`,`p_description`,`p_complete_description`,`p_price`,`p_stock`,`p_image`,`c_name`,`v_id`) VALUES ('$name','$description','$complete_description','$price','$stock','$photo','$category','$v_id')","added products");
    echo "<script>
    window.location.href='../product.php';
    </script>";
}