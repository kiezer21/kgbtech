<div class="container p-5">

<h4>Edit Product Detail</h4>
<?php
    include_once "../config/dbconnect.php";
	$product_id=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * FROM product WHERE product_id='$product_id'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){
     ?>
<form id="update-Items" onsubmit="updateItems()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" class="form-control" id="product_id" value="<?=$row1['product_id']?>" hidden>
    </div>
    <div class="form-group">
      <label for="name">Product Name:</label>
      <input type="text" class="form-control" id="product_name" value="<?=$row1['product_name']?>">
    </div>
    <div class="form-group">
      <label for="price">Unit Price:</label>
      <input type="number" class="form-control" id="price" value="<?=$row1['price']?>">
    </div>
      <div class="form-group">
         <img width='200px' height='150px' src='<?=$row1["product_image"]?>'>
         <div>
            <label for="file">Choose Image:</label>
            <input type="text" id="existingImage" class="form-control" value="<?=$row1['product_image']?>" hidden>
            <input type="file" id="newImage" value="">
         </div>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Update Item</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>

    </div>