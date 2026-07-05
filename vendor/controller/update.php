<?php 
include '../../config.php';
$admin = new Admin();


if(isset($_POST['update-product'])){
    $v_id=$_POST['v_id'];
    $name = $_POST['name'];
    $p_id= $_POST['p_id'];
    $description = $_POST['des'];
    $complete_description = $_POST['cdesc'];
    $category=$_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $photo = "upload/" . basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$photo);
    
    if($photo=='upload/'){
    $admin->cud("UPDATE `product` SET `p_name`='$name',`p_description`='$description',`p_complete_description`='$complete_description',`p_price`='$price',`p_stock`='$stock',`c_name`='$category' WHERE `p_id`='$p_id'","updated");

    echo "<script>
    window.location.href='../product.php';
    </script>";

    } else {
    $admin->cud("UPDATE `product` SET `p_name`='$name',`p_description`='$description',`p_complete_description`='$complete_description',`p_price`='$price',`p_stock`='$stock',`p_image`='$photo',`c_name`='$category' WHERE `p_id`='$p_id'","updated");

    echo "<script>
    window.location.href='../product.php';
    </script>";
    
    }
    
   
}

if (isset($_GET['op_status'])) {
    $status = $_GET['op_status'];
    $o_id = $_GET['op_id'];
    if ($status == 'ordered') {
        $admin->cud("UPDATE `ordered_products` SET `op_status`='accepted' WHERE `op_id`='$o_id'", "Status updated");
        echo "<script>
        window.location.href = '../order.php';
        </script>";
    } else if ($status == 'accepted') {
        $admin->cud("UPDATE `ordered_products` SET `op_status`='delivery' WHERE `op_id`='$o_id'", "Status updated");
        echo "<script>
        window.location.href = '../order.php';
        </script>";
    } else if ($status == 'delivery') {
        $admin->cud("UPDATE `ordered_products` SET `op_status`='delivered' WHERE `op_id`='$o_id'", "Status updated");
        echo "<script>
        window.location.href = '../order.php';
        </script>";
    }
}
