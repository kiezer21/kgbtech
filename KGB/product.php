<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>KGB Store</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="index.php"><img width="250" src="images/logo.png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item">
                           <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                           <ul class="dropdown-menu">
                              <li><a href="about.php">About</a></li>
                              <li><a href="testimonial.php">Testimonial</a></li>
                           </ul>
                        </li>
                        <li class="nav-item active">
                           <a class="nav-link" href="product.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="service.php">Services</a>
                        <li>
                        <li class="nav-item">
                           <a class="nav-link" href="blog_list.php">About Us</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="contact.php">Reviews</a>
                        </li>
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Products Section</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Available <span>Products</span>
               </h2>
            </div>

<?php
// Include database connection
include_once "admin_panel/config/dbconnect.php";

// Fetch products from the database
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Check if there are products
if ($result && $result->num_rows > 0) {
    $products = $result->fetch_all(MYSQLI_ASSOC); // Fetch all products as an associative array
} else {
    $products = []; // If no products found, initialize empty array
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
    .acontainer {
        max-width: 1200px; /* Adjust max-width as needed */
        min-height: fit-content;
        margin: 0 auto; /* Center the container horizontally */
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .product {
        width: calc(50% - 10px); /* Adjust width for two columns */
        margin-bottom: 20px; /* Adjust margin as needed */
        padding: 10px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        text-align: center; /* Center product content */
    }

    .product p {
        margin: 0;
        padding: 5px 0;
    }

    .product .image-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
        text-align: center;
    }

    .product img {
        max-width: 100%;
        max-height: 100%;
        height: auto;
        width: auto;
    }

    .product button {
        background-color: #f7444e;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>
</head>
<body>

<div class="acontainer">
    <?php
    // Iterate through each product
    foreach ($products as $product) {
        // Output product details and button for each product
        echo "<div class='product'>";
        echo "<div class='image-container'>";
        echo "<img src='" . str_replace('./uploads/', 'admin_panel/uploads/', $product['product_image']) . "' alt='" . $product["product_name"] . "'>";
        echo "</div>";
        echo "<p>" . $product["product_name"] . "</p>";
        echo "<p><strong>Price:</strong> ₱" . $product["price"] . "</p>";
        echo "<a href='order.php?product_id=" . $product["product_id"] . "'><button>Buy Now</button></a>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>





            <!--div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>
      <!-- end product section -->
      <!-- footer section -->
      <!---?php
      <footer class="footer_section">
         <div class="container">
            <div class="row">
               <div class="col-md-4 footer-col">
                  <div class="footer_contact">
                     <h4>
                        Reach at..
                     </h4>
                     <div class="contact_link_box">
                        <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>
                        Location
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                        Call +01 1234567890
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                        demo@gmail.com
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="footer_detail">
                     <a href="index.php" class="footer-logo">
                     Famms
                     </a>
                     <p>
                        Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
                     </p>
                     <div class="footer_social">
                        <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="map_container">
                     <div class="map">
                        <div id="googleMap"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-info">
               <div class="col-lg-7 mx-auto px-0">
                  <p>
                     &copy; <span id="displayYear"></span> All Rights Reserved By
                     <a href="https://html.design/">Free Html Templates</a>
                  </p>
               </div>
            </div>
         </div>
      </footer>
      ?---!>
      <!-- footer section -->
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>