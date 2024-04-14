<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
       
        $id = $_POST['id'];
        $name= $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

         $insert = mysqli_query($conn,"INSERT INTO sorders
         (id,name,email,contact,address) VALUES ('$id','$name','$email','$contact','$address')");
 
         if(!$insert)
         {
             echo mysqli_error($conn);
             header("Location: ../index.php?service=error");
         }
         else
         {
             echo "Records added successfully.";
             header("Location: ../index.php?service=success");
         }
     
    }
        
?>