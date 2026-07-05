<?php 
include '../../config.php';
$admin = new Admin();

if(isset($_GET['p_id']) && $_GET['action']=='accept'){
    $p_id=$_GET['p_id'];
    $admin->cud("UPDATE `product` SET `p_status`='accepted' WHERE `p_id`='$p_id'","updated");
    echo "<script>
    window.location.href='../product.php';
    </script>";

}

if(isset($_GET['p_id']) && $_GET['action']=='reject'){
    $p_id=$_GET['p_id'];
    $admin->cud("UPDATE `product` SET `p_status`='rejected' WHERE `p_id`='$p_id'","updated");
    echo "<script>
    window.location.href='../product.php';
    </script>";
}

if(isset($_GET['v_id']) && $_GET['action']=='accept'){
    $v_id=$_GET['v_id'];
    $admin->cud("UPDATE `vendor` SET `v_status`='accepted' WHERE `v_id`='$v_id'","updated");
    echo "<script>
    window.location.href='../vendor.php';
    </script>";

}

if(isset($_GET['v_id']) && $_GET['action']=='reject'){
    $v_id=$_GET['v_id'];
    $admin->cud("UPDATE `vendor` SET `v_status`='rejected' WHERE `v_id`='$v_id'","updated");
    echo "<script>
    window.location.href='../vendor.php';
    </script>";
}


