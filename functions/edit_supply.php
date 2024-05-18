<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['supp_name']) && isset($_POST['quantity']) && isset($_POST['unit_price']) && isset($_POST['avail_qty'])) {
        $id = $_POST['supp_id'];
        $supplyName = $_POST['supp_name'];
        $quantity = $_POST['quantity'];
        $unitPrice = $_POST['unit_price'];
        $availableQuantity = $_POST['avail_qty'];

        $sql = "UPDATE supply SET quantity = '$quantity', unit_price = '$unitPrice',supp_name = '$supplyName', avail_qty = '$availableQuantity' WHERE id = '$id'";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../pages-admin/supply.php?status=success&message=Supply added successfully');
            exit(); 
        } else {
            header('Location: ../pages-admin/supply.php?status=error&message=' . urlencode('Error adding supply: ' . $conn->error));
            exit();
        }
    } else {
        header('Location: ../pages-admin/supply.php?status=error&message=One or more fields are missing');
        exit();
    }

    $conn->close();
} else {
    header('Location: ../pages-admin/supply.php?status=error&message=Invalid request method');
    exit();
}
?>