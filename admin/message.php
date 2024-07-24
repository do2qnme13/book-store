<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="message.css" />
</head>

<body>
  <a href="home.html"><button class="home-btn">Home</button></a>

  <section>
    <h1>Messages</h1>

    <div class="message-container">
      <?php
      error_reporting(1);
      include ('connection.php');

      //write query
      $data = "SELECT * FROM messagelist ORDER BY id DESC";

      //get data from server
      $val = $con->query($data);
      $i = 1;

      if ($val->num_rows > 0) {
        while (list($id, $name, $email, $phone, $message) = mysqli_fetch_array($val)) {
          echo "<div class='message-div'>
              <p>From: <b>$name</b></p>
              <p>Email: <b>$email</b></p>
              <p>Phone: <b>$phone</b></p>
              <div class='message'>
                <p><b>Message</b></p>
                <p>$message</p>
              </div>
              <div class='btn-container'>
                <a href='deletemessage.php?id=$id&email=$email'><button class='delete-btn'>Delete Message</button></a>
                <a href='reply.php?id=$id&name=$name&email=$email'><button class='reply-btn'>Reply</button></a></div>
            </div>
            ";
        }
        $val->close();
      }

      $con->close();
      ?>
    </div>
  </section>
</body>

</html>