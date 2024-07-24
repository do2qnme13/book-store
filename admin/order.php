<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="order.css">
</head>
<body>
<a href="home.html"><button class="gohome-btn">Home</button></a>
  <h1>Order List</h1>
  <div class="booklist-table">
    <table class="admin-table appears">
      <thead>
        <tr>
          <th>
            <h3>No</h3>
          </th>
          <th>
            <h3>ID</h3>
          </th>
          <th>
            <h3>Name</h3>
          </th>
          <th>
            <h3>Customer</h3>
          </th>
          <th>
            <h3>Address</h3>
          </th>
          <th>
            <h3>Phone</h3>
          </th>
          <th>
            <h3>Quantity</h3>
          </th>
          <th>
            <h3>Total</h3>
          </th>
          <th>
            <h3>Action</h3>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        error_reporting(1);
        include('connection.php');
        $data = "SELECT * FROM orderlist ORDER BY id DESC";
        $val = $con->query($data);
        $i = 1;
        if ($val->num_rows > 0) {
          while (list($id, $name, $customer, $address, $phone, $quantity, $total) = mysqli_fetch_array($val)) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";  // Added missing semicolon here
            echo "<td>" . $id . "</td>";
            echo "<td>" . $name . "</td>";
            echo "<td>" . $customer . "</td>";
            echo "<td>" . $address . "</td>";
            echo "<td>" . $phone . "</td>";
            echo "<td>" . $quantity . "</td>";
            echo "<td>" . $total . "</td>";
            echo "<td><a href='deleteorder.php?id=$id'><img class='delete-btn-icon' src='./img/deleteicon.svg' /></a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center'><b>No data available</b></td></tr>";
        }
        ?>
      </tbody>
    </table>

  </div>
</body>
</html>