<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order</title>
  <link rel="stylesheet" href="styles/order.css">
  <script src="order.js" defer></script>
</head>

<body>
  <center>
    <h1>Place an Order</h1>
  </center>
<a href="allproducts.php"><button class="go-back-btn">Go Back</button></a>

  <section>
    <div class="book-img-container">
      <img src="admin/img/<?php echo $_GET['img'] ?>" alt="book-pic">
    </div>
    <div class="book-info">
      <div>
        <h1><?php echo $_GET['name'] ?></h1>
      </div>
      <div class="price-div">
        <label for="price">Price </label>
        <input class="price-input" name="price" type="number" value=<?php echo $_GET['price'] ?> readonly>
      </div>
      <form method="post">
        <label for="customer-name">Name</label>
        <input type="text" name="customer-name" placeholder="Enter Your Name">

        <label for="phone">Phone</label>
        <input type="text" name="phone" placeholder="Enter Phone Number">

        <label for="address">Address</label>
        <textarea name="address" placeholder="Enter Address"></textarea>

        <label for="quantity">Quantity</label>
        <input class="quantity" type="number" name="quantity" id="quantity" min="1">

        <h3 class='total'>Total:</h3>

        <input class="order-btn" type="submit" name="submit" value="Add To Purchase">
      </form>
    </div>
  </section>
  <?php
  include ('connection.php');

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
      $name = $_GET['name'];
      $price = $_GET['price'];
      $customer = $_POST['customer-name'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];
      $quantity = $_POST['quantity'];
      $total = $price * $quantity;

      if (empty($name) || empty($price) || empty($customer) || empty($phone) || empty($address) || empty($quantity)) {
        echo "<p style='color: red;'>All fields are required.</p>";
      } else {
        $query = $con->prepare("INSERT INTO `orderlist` (`name`, `customer`, `address`, `phone`, `quantity`, `total`) VALUES (?, ?, ?, ?, ?, ?)");
        $query->bind_param("ssssii", $name, $customer, $address, $phone, $quantity, $total);

        if ($query->execute()) {
          header('location: ordersuccess.php');
        } else {
          echo "<p style='color: red;'>Error placing order: " . $con->error . "</p>";
        }

        $query->close();
      }
    }
  } else {
    echo "Expected POST request but received " . $_SERVER['REQUEST_METHOD'];
  }

  $con->close();
  ?>



</body>


</html>