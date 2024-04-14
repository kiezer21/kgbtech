<?php
    include_once "../config/dbconnect.php";

    $product_id=$_POST['product_id'];
    $product_name= $_POST['product_name'];
    $price= $_POST['price'];

    if( isset($_FILES['newImage']) ){
        
        $location="./uploads/";
        $img = $_FILES['newImage']['name'];
        $tmp = $_FILES['newImage']['tmp_name'];
        $dir = '../uploads/';
        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif','webp');
        $product_image =rand(1000,1000000).".".$ext;
        $final_image=$location. $product_image;
        if (in_array($ext, $valid_extensions)) {
            $path = 'UPLOAD_PATH' . $product_image;
            move_uploaded_file($tmp, $dir.$product_image);
        }
    }else{
        $final_image=$_POST['existingImage'];
    }
    $updateItem = mysqli_query($conn,"UPDATE product SET 
        product_name='$product_name', 
        price=$price,
        product_image='$final_image' 
        WHERE product_id=$product_id");


    if($updateItem)
    {
        echo "true";
    }
    // else
    // {
    //     echo mysqli_error($conn);
    // }
?>