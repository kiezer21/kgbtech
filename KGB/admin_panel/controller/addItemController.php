<?php
    include_once "../config/dbconnect.php";

    if(isset($_POST['upload']))
    {
        $product_name = $_POST['product_name'];
        $price = $_POST['price'];


        $name = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $size = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];


        $allowed_types = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp');


        if(in_array($type, $allowed_types))
        {
            $location="./uploads/";
            $product_image=$location.$name;

            $target_dir="../uploads/";
            $finalImage=$target_dir.$name;

            if(move_uploaded_file($temp, $finalImage))
            {

                $insert = mysqli_query($conn, "INSERT INTO product (product_name, product_image, price) VALUES ('$product_name', '$product_image', $price)");

                if(!$insert)
                {
                    echo mysqli_error($conn);
                }
                else
                {
                    echo "Product added successfully.";
                }
            }
            else
            {
                echo "Failed to move uploaded file.";
            }
        }
        else
        {
            echo "Only JPG, JPEG, PNG, GIF, and WEBP files are allowed.";
        }
    }
?>
