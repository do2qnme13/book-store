<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Book</title>
  <link rel="stylesheet" href="addbook.css">
</head>

<body>
  <a href="home.html"><button>Go Back</button></a>

  <div class="addbook-container scale-in">
    <h1>Add New Book</h1>


    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('connection.php');

    if (isset($_POST['submit'])) {
      $bookname = $_POST['name'];
      $author = $_POST['author'];
      $year = $_POST['year'];
      $price = $_POST['price'];
      $genre = $_POST['genre'];
      $image = $_FILES["image"]["name"];
      $query = mysqli_query($con, "insert into allgenre (name,author,date,price,genre,img) value('$bookname','$author','$year','$price','$genre','$image')");


      if ($query) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "img/" . $image);
        echo "<script>alert('Product has been added.');</script>";
        header('location: booklist.php');
      } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
      }
      $con->close();

    }
    ?>


    <form method="post" enctype="multipart/form-data">
      <label for="name">Book Name</label>
      <input type="text" name="name" placeholder="Enter book name" required>

      <label for="author">Author</label>
      <input type="text" name="author" placeholder="Enter author name" required>

      <label for="year">Release Year</label>
      <input type="text" name="year" placeholder="Enter released year" required>

      <label for="price">Price</label>
      <input type="number" name="price" placeholder="Enter price" required>

      <label for="genre">Genre</label>
      <select name="genre" required>
        <option value="horror">Horror</option>
        <option value="comedy">Comedy</option>
        <option value="mystery">Mystery</option>
        <option value="action">Action</option>
        <option value="crime">Crime</option>
        <option value="fantasy">Fantasy</option>
      </select>

      <label for="image">Image:</label>
      <input type="file" id="image" name="image" required>

      <input class="submit-btn" type="submit" name="submit" value="submit">
    </form>
  </div>
</body>

</html>