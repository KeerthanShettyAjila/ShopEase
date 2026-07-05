<?php 
include '../../config.php';
$admin = new Admin();

if(isset($_POST['add-category'])){
    $category = $_POST['category'];
    $admin->cud("INSERT INTO `category`(`c_name`) VALUES ('$category')","added category");
    echo "<script>
    // alert('category added...');
    window.location.href='../category.php';
    </script>";
}

if(isset($_POST['admin-payment'])) {
    $op_id = $_POST['op_id'];
    $transaction_id = $_POST['transaction_id'];
    
    $admin->cud("UPDATE `ordered_products` SET `admin_status`='paid', `admin_transaction`='$transaction_id' WHERE `op_id`='$op_id'","updated");
    echo "<script>
    window.location.href='../payment.php';
    </script>";
}
?>

