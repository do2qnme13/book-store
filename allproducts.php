<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Books</title>
  <link rel="stylesheet" href="styles/index.css">
  <link rel="stylesheet" href="styles/allproducts.css">
</head>

<body>
  <navbar>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li ><a class="active" href="allproducts.php">Products</a></li>
      <li><a href="contactus.php">Contact Us</a></li>
    </ul>
  </navbar>
  <section>
    <form method="post">
      <select name="genre" required>
        <option value="*">All Genre</option>
        <option value="horror">Horror</option>
        <option value="comedy">Comedy</option>
        <option value="mystery">Mystery</option>
        <option value="action">Action</option>
        <option value="crime">Crime</option>
        <option value="fantasy">Fantasy</option>
      </select>

      <input class="submit-btn" name="submit" type="submit" value="Search">

    </form>


    
    <h1>
        <?php 
          if (isset($_POST['genre'])) {
            $genretype = htmlspecialchars($_POST['genre'], ENT_QUOTES, 'UTF-8');

            // Display the genre or "All Genre"
            if ($genretype == "*") {
                echo "All Genre";
            } else {
                echo $genretype;
            }
        } else {
            echo"ALl Genre";
        }     
        ?>
    </h1>

 

    <div class="book-container">
      <?php
      error_reporting(1);
      include('connection.php');
      if (isset($_POST['submit'])) {
          $genretype = $_POST['genre'];

          if ($genretype == "*") {
            $data = "SELECT * FROM allgenre ORDER BY id DESC";
            $val = $con->query($data);


            if ($val === false) {
              die("Error: " . $con->error);
            }
          } else {
            $data = "SELECT * FROM allgenre WHERE genre = ? ORDER BY id DESC";
            $result =  $con->prepare($data);
            $result->bind_param("s", $genretype);
            $result->execute();

            $val =  $result->get_result();
          }


          if ($val->num_rows > 0) {
            displayBook($val); //display books
          } else {
            echo "
            <h1>No data available</h1>";
          }

          $con->close();
      }else {
          $data = "SELECT * FROM allgenre ORDER BY id DESC";
          $val = $con->query($data);

          
          if ($val->num_rows > 0) {
          displayBook($val); // display books
          }
          else {
            echo "
            <h1>No data available</h1>";
          } 
      }

      ?>
    </div>
  </section>
</body>

</html>




<?php 
  function displayBook($val) {
      while (list($id, $name, $author, $date, $price, $genre, $img) = mysqli_fetch_array($val)) {

        echo "<div class='book'>
                <div class='book-img-container'>
                  <img  src='admin/img/$img' alt='image' />
                </div>
                <div class='book-info'> 
                  <h4>$name</h4>
                  <p>Author: $author</p>
                    <p>Genre: $genre</p>
                  <p>Price: $price</p>
                </div>
                <a href='order.php?id=$id&name=$name&price=$price&img=$img'><button>Buy Now</button></a>
             </div>";

      }
    } 

?>