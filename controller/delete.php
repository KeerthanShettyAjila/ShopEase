<?php
include '../config.php';
$admin = new Admin();

if (isset($_GET['ca_id'])) {
    $ca_id = $_GET['ca_id'];
    $admin->cud("DELETE FROM `cart` WHERE `ca_id`='$ca_id'", "deleted");
    echo "<script>
    window.location.href='../cart.php';
    </script>";
}
