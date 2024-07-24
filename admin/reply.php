<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reply</title>
  <link rel="stylesheet" href="reply.css">
</head>
<body>
<a href="home.html"><button class="home-btn">Go to Messages</button></a>

  <div class="form-container">
  <form>
        <div class="mail-div">
          <label for="email">To: </label>
          <input type="email" name="email" value="<?php echo $_GET['email'] ?>" readonly>
        </div>

        <div class="mail-div">
          <label for="admin">From:</label>
          <input type="email" value="myanbookadmin@gmail.com" readonly>
        </div>

        <label for="message">Reply:</label>
        <textarea name="message" id="message" placeholder="Enter Message" required></textarea>
        <input class="reply-btn" type="submit" name="submit" value="Reply">
      </form>
  </div>
  <?php
 
  if(isset($_GET['submit'])) {
    echo "<script>window.alert('Message Sent Successfully!')</script>";
  }

  
  ?>
</body>
</html>