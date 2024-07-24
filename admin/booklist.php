<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booklist</title>
  <link rel="stylesheet" href="booklist.css">
</head>

<body>

<h1>Instocks</h1>

  <a href="home.html"><button class="gohome-btn">Go to Home</button></a>
  <a href="addbook.php"><button class="addbook-btn">Add Book</button></a>
  <div class="booklist-table">
    <table class="admin-table appears">
      <thead>
        <tr>
          <th>
            <h3>No</h3>
          </th>
          <th>
            <h3>Name</h3>
          </th>
          <th>
            <h3>Author</h3>
          </th>
          <th>
            <h3>Date</h3>
          </th>
          <th>
            <h3>Price</h3>
          </th>
          <th>
            <h3>Genre</h3>
          </th>
          <th>
            <h3>Image</h3>
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
        $data = "SELECT * FROM allgenre ORDER BY id DESC";
        $val = $con->query($data);
        $i = 1;
        if ($val->num_rows > 0) {
          while (list($id, $name, $author, $date, $price, $genre, $img) = mysqli_fetch_array($val)) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";  // Added missing semicolon here
            echo "<td>" . $name . "</td>";
            echo "<td>" . $author . "</td>";
            echo "<td>" . $date . "</td>";
            echo "<td>" . $price . " ks </td>";
            echo "<td>" . $genre . "</td>";
            echo "<td><img src='./img/$img' height='100' width='100' style='border-radius:5px; box-shadow:0 0 5px rgba(0,0,0,0.5);' /></td>";
            echo "<td><a href='deletebook.php?id=$id&img=$img&genre=$genre'><img class='delete-btn-icon' src='./img/deleteicon.svg' /></a></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8' class='text-center'><b>No data available</b></td></tr>";
        }
        $con->close();

        ?>
      </tbody>
    </table>

  </div>
</body>

</html>