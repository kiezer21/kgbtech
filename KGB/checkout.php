<?php
include_once "admin_panel/config/dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST["product_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $sql = "INSERT INTO orders (product_id, name, email, contact, address) VALUES ('$product_id', '$name', '$email', '$contact', '$address')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Order placed successfully!'); window.location.href='product.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
