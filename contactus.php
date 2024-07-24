<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="styles/index.css" />
  <link rel="stylesheet" href="styles/contactus.css" />
  </head>
<body>
  <navbar>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="allproducts.php">Products</a></li>
        <li><a class="active"  href="connection.php">Contact Us</a></li>
      </ul>
    </navbar>


  <section class="contact-us-section flex-container">
    <div class="contact-us-infos flex-container">
      <div class="contacts flex-container">
        <img src="image/location.svg" alt="">
        <h3>Address</h3>
        <p>Time City</p>
        <p>Kamaryut,Yangon</p>
      </div>
      <div class="contacts flex-container">
      <img src="image/phone.svg" alt="">
        <h3>Phone</h3>
        <p>09-123-345-678</p>
        <p>09-876-543-321</p>
      </div>
      <div class="contacts flex-container">
      <img src="image/email.svg" alt="">
        <h3>Email</h3>
        <p>myanbooks@gmail.com</p>
        <p>myanbooks.Cs@gmail.com</p>
      </div>
    </div>
    <div class="contact-us-form flex-container">
      <div class="intors">
        <h2 style="color:darkblue; margin-bottom:4px;">Send us a message</h2>
        <p>If you want to ask any questions or want any lastes updates feel free to message us.</p>
        <p>We would be glad to help you out.</p>
      </div>
      <form method="post">
        <input type="text" name="name" placeholder="Enter name" required>
        <input type="email" name="email" placeholder="Enter email address" required>
        <input type="text" name="phone" placeholder="Enter phone number" required>
        <textarea name="message" id="message" placeholder="Enter Message"></textarea>

        <input class="send-message-btn" type="submit" name="submit" value="Send Message">
      </form>
    </div>
  </section>


  <?php
  error_reporting(1);
  include('connection.php');

  if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $query = $con->prepare("INSERT INTO `messagelist` (`name`,`email`,`phone`,`message`) VALUES (?, ?, ?, ?)");
    $query -> bind_param("ssss",$name,$email,$phone,$message);


    if($query->execute()){
      echo "<script>window.alert('Message Sent Successfully!')</script>";
    }else {
      echo "<p style='color: red;'>Error Sending Message " . $con->error . "</p>";

    }

    $query->close();

  }
  $con->close();
  ?>
  
</body>
</html>