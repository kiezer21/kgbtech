<div>
  <h2>Services Available</h2>
  <table class="table">
    <thead>
      <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Customer Name</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Total Price</th>
        <th class="text-center">Order Status</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
    include_once "../config/dbconnect.php";
    $sql = "SELECT * FROM orders INNER JOIN product ON orders.product_id = product.product_id";
    $result = $conn->query($sql);
    $count = 1;
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?= $count ?></td>
          <td><a href="#" onclick="showPopup('<?= $row['name'] ?>', '<?= $row['email'] ?>', <?= $row['contact'] ?>, '<?= $row['address'] ?>')"><?= $row["name"] ?></a></td>
          <td><?= $row["product_name"] ?></td>
          <td>₱<?= $row["price"] ?></td>
          <?php 
                if($row["order_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$row['id']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['id']?>')">Delivered</button></td>
        
            <?php
            }
            ?>
          <td><button class="btn btn-danger" style="height:40px" onclick="confirmDelete('<?= $row['id'] ?>')">Delete</button></td>
        </tr>
    <?php
        $count++;
      }
    }
    ?>
  </table>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal()">&times;</span>
    <p style="text-align: center; font-weight: bold;">Customer Details</p>
    <p id="customerName"></p>
    <p id="email"></p>
    <p id="contact"></p>
    <p id="address"></p>
  </div>
</div>

<script>
  function showPopup($name, $email, $contact, $address) {
    var modal = document.getElementById("myModal");
    var span = document.getElementsByClassName("close")[0];
    document.getElementById("customerName").innerHTML = "Customer Name: " + $name;
    document.getElementById("email").innerHTML = "Email: " + $email;
    document.getElementById("contact").innerHTML = "Contact Number: " + $contact;
    document.getElementById("address").innerHTML = "Address: " + $address;
    modal.style.display = "block";

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  }

  function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }
</script>

<!-- CSS -->
<style>
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 50%; 
    max-width: 400px; 
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
</style>